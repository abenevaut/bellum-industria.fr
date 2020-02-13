<?php namespace bellumindustria\Domain\Organizations\Quotes\Repositories;

use bellumindustria\Infrastructure\Contracts\
{
	Repositories\RepositoryEloquentAbstract,
	Request\RequestAbstract
};
use bellumindustria\Domain\Organizations\Quotes\
{
	Repositories\QuotesRepositoryInterface,
	Quote,
	Events\QuoteCreatedEvent,
	Events\QuoteUpdatedEvent,
	Events\QuoteDeletedEvent
};

class QuotesRepositoryEloquent extends RepositoryEloquentAbstract implements QuotesRepositoryInterface
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model(): string
	{
		return Quote::class;
	}

	/**
	 * Create quote request and fire event "QuoteCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event bellumindustria\Domain\Organizations\Quotes\Events\QuoteCreatedEvent
	 * @return \bellumindustria\Domain\Organizations\Quotes\Quote
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function create(array $attributes): Quote
	{
		$quote = parent::create($attributes);

		event(new QuoteCreatedEvent($quote));

		return $quote;
	}

	/**
	 * Update quote request and fire event "QuoteUpdatedEvent".
	 *
	 * @param array $attributes
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Organizations\Quotes\Events\QuoteUpdatedEvent
	 * @return \bellumindustria\Domain\Organizations\Quotes\Quote
	 *
	 * @throws \Prettus\Validator\Exceptions\ValidatorException
	 */
	public function update(array $attributes, $id): Quote
	{
		$quote = parent::update($attributes, $id);

		event(new QuoteUpdatedEvent($quote));

		return $quote;
	}

	/**
	 * Delete quote request and fire event "QuoteDeletedEvent".
	 *
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Organizations\Quotes\Events\QuoteDeletedEvent
	 * @return \bellumindustria\Domain\Organizations\Quotes\Quote
	 */
	public function delete($id): Quote
	{
		$quote = $this->find($id);

		parent::delete($quote->id);

		event(new QuoteDeletedEvent($quote));

		return $quote;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function backendIndexView()
	{
		$quotes = $this
//			->setPresenter()
//			->orderBy('published_at', 'desc')
			->paginate();

		return view('backend.quotes.quotes.index', [
			'quotes' => $quotes,
		]);
	}
}
