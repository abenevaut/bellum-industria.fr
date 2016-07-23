<?php namespace cms\Domain\Files\Files\Access;

/**
 * Class DontShowFilesStartingWithDot
 * @package cms\Domain\Files\Files\Access
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
