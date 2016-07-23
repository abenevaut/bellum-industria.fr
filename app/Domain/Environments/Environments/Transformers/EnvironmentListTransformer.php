<?php namespace cms\Domain\Users\Permissions\Transformers;

use League\Fractal\TransformerAbstract;
use cms\Domain\Environments\Environments\Environment;

/**
 * Class EnvironmentListTransformer
 * @package cms\Domain\Users\Permissions\Transformers
 */
class EnvironmentListTransformer extends TransformerAbstract
{

	/**
	 * @param Environment $env
	 *
	 * @return array
	 */
	public function transform(Environment $env)
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
