<?php namespace Core\Domain\Files\Access;

/**
 * Class DontShowFilesStartingWithDot
 * @package Module\Files\Access
 */
class DontShowFilesStartingWithDot
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
