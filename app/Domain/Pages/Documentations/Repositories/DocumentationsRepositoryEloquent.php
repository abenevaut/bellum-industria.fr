<?php

namespace bellumindustria\Domain\Pages\Documentations\Repositories;

use Illuminate\Support\
{
	Collection
};
use bellumindustria\Infrastructure\Contracts\
{
	Repositories\RepositoryEloquentAbstract,
	Request\RequestAbstract
};
use bellumindustria\Domain\Pages\Documentations\
{
	Repositories\DocumentationsRepository,
	Documentation,
	Events\DocumentationCreatedEvent,
	Events\DocumentationUpdatedEvent,
	Events\DocumentationDeletedEvent
};
use Carbon\Carbon;

class DocumentationsRepositoryEloquent extends RepositoryEloquentAbstract implements DocumentationsRepository
{

	const DOCUMENTATIONS_PUBLIC_PATH = 'app/documentations/public';
	const DOCUMENTATIONS_PRIVATE_PATH = 'app/documentations/private';

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model(): string
	{
		return Documentation::class;
	}

	/**
	 * Create contact request and fire event "DocumentationCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event bellumindustria\Domain\Pages\Documentations\Events\DocumentationCreatedEvent
	 * @return \bellumindustria\Domain\Pages\Documentations\Documentation
	 */
	public function create(array $attributes): Documentation
	{

		$documentation = parent::create($attributes);

		event(new DocumentationCreatedEvent($documentation));

		return $documentation;
	}

	/**
	 * Update contact request and fire event "DocumentationUpdatedEvent".
	 *
	 * @param array $attributes
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Pages\Documentations\Events\DocumentationUpdatedEvent
	 * @return \bellumindustria\Domain\Pages\Documentations\Documentation
	 */
	public function update(array $attributes, $id): Documentation
	{

		$documentation = parent::update($attributes, $id);

		event(new DocumentationUpdatedEvent($documentation));

		return $documentation;
	}

	/**
	 * Delete contact request and fire event "DocumentationDeletedEvent".
	 *
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Pages\Documentations\Events\DocumentationDeletedEvent
	 * @return \bellumindustria\Domain\Pages\Documentations\Documentation
	 */
	public function delete($id): Documentation
	{

		$documentation = $this->find($id);

		parent::delete($documentation->id);

		event(new DocumentationDeletedEvent($documentation));

		return $documentation;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function frontendShowDocumentationIndexView()
	{
		return view('frontend.documentations.index', [
			'files' => $this->publicFiles(),
			'metadata' => [
				'title' => 'Documentation',
			]
		]);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function frontendShowDocumentationPage($path)
	{

		$file = storage_path(self::DOCUMENTATIONS_PUBLIC_PATH . $path);

		if (\File::exists($file)) {
			$data = $this->parseFile($file);

			return view('frontend.documentations.show', [
				'title' => $data['title'],
				'content' => $data['text'],
				'url' => $path,
				'metadata' => [
					'title' => 'Documentation',
				]
			]);
		}

		return abort('404');
	}

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function publicFiles(): Collection
	{
		return $this->getFiles(self::DOCUMENTATIONS_PUBLIC_PATH);
	}

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function privateFiles(): Collection
	{
		return $this->getFiles(self::DOCUMENTATIONS_PRIVATE_PATH);
	}

	/**
	 * @param $filesType
	 *
	 * @return \Illuminate\Support\Collection
	 */
	private function getFiles($filesType): Collection
	{
		if (in_array($filesType, [self::DOCUMENTATIONS_PRIVATE_PATH, self::DOCUMENTATIONS_PUBLIC_PATH])) {
			$files = \File::allFiles(storage_path($filesType));

			return collect($files)
				->map(function ($file) use ($filesType) {
					if ('file' === $file->getType()) {
						$url = str_replace(
							storage_path($filesType),
							'',
							$file->getRealPath()
						);

						$data = $this->parseFile($file);
						$data['url'] = $url;

						return $data;
					}
				})
				->sortBy('title');
		}
	}

	/**
	 * @param $filePath
	 *
	 * @return array
	 */
	private function parseFile($filePath): array
	{

		$data = [];
		$cacheKey = str_replace('/', '-', $filePath);

		if (\Cache::has($cacheKey)) {
			$data = \Cache::get($cacheKey);
		} else {
			$keys = [];
			$content = \File::get($filePath);
			$fields = preg_split('!\n----\s*\n*!', $content);

			foreach ($fields as $field) {
				$pos = strpos($field, ':');
				$key = str_replace(
					['-', ' '],
					'_',
					strtolower(trim(substr($field, 0, $pos)))
				);

				if (empty($key)) {
					continue;
				}

				$keys[] = $key;
				$data[$key] = trim(substr($field, ($pos + 1)));
			}

			if (array_key_exists('text', $data)) {
				$data['text'] = \Markdown::convertToHtml($data['text']);
			}

			$expiresAt = Carbon::now()->addMinutes(360);
			\Cache::put($cacheKey, $data, $expiresAt);
		}

		return $data;
	}
}
