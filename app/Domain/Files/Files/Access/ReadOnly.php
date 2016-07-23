<?php namespace cms\Domain\Files\Files\Access;

/**
 * Class ReadOnly
 * @package cms\Domain\Files\Files\Access
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
		if ($attr == 'write')
		{
			return false;
		}

		return !strpos(basename($path), '.')
			? !($attr == 'read' || $attr == 'write')
			: null;
	}
	
}
