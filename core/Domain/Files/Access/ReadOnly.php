<?php namespace Core\Domain\Files\Access;

/**
 * Class ReadOnly
 * @package Module\Files\Access
 */
class ReadOnly
{

	/**
	 * @param $attr
	 * @param $path
	 * @param $data
	 * @param $volume
	 *
	 * @return bool|null
	 */
	public static function checkAccess($attr, $path, $data, $volume)
	{
		return !strpos(basename($path), '.')
			? !($attr == 'read' || $attr == 'write')
			: null;
	}
}
