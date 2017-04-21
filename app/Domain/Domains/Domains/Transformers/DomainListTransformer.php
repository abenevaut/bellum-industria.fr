<?php namespace cms\Domain\Domains\Domains\Transformers;

use League\Fractal\TransformerAbstract;
use cms\Domain\Domains\Domains\Domain;

class DomainListTransformer extends TransformerAbstract
{

	/**
	 * @param Domain $env
	 *
	 * @return array
	 */
	public function transform(Domain $env)
	{
		return [
			'id'         => (int)$env->id,
			'name'       => $env->name,
			'reference'  => $env->reference,
			'domain'     => $env->domain,
			'deleted_at' => $env->deleted_at,
		];
	}
}
