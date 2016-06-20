<?php namespace Core\Domain\Environments\Transformers;

use League\Fractal\TransformerAbstract;
use Core\Domain\Environments\Entities\Environment;

/**
 * Class EnvironmentListTransformer
 * @package Core\Domain\Environments\Transformers
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
			'id'      => (int)$env->id,
			'name'      => $env->name,
			'reference' => $env->reference,
			'domain'    => $env->domain,
		];
	}
}
