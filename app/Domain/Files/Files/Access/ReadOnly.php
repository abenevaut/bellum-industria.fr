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
//	public static function checkAccess($attr, $path, $data, $volume)
//	{
//		if ($attr == 'write')
//		{
//			return false;
//		}
//
//		return !strpos(basename($path), '.')
//			? !($attr == 'read' || $attr == 'write')
//			: null;
//	}

	public static function checkAccess($attr, $path, $data, $volume) {
		return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
			? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
			:  null;                                    // else elFinder decide it itself
	}
	
}
