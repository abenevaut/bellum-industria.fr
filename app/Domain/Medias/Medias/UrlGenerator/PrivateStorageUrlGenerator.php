<?php namespace cms\Domain\Medias\Medias\UrlGenerator;

use Spatie\MediaLibrary\UrlGenerator\LocalUrlGenerator;

/**
 * Class PrivateStorageUrlGenerator
 * @package cms\Domain\Medias\Medias\UrlGenerator
 */
class PrivateStorageUrlGenerator extends LocalUrlGenerator
{

	/**
	 * Get the url for the profile of a media item.
	 *
	 * @return string
	 */
	public function getUrl() : string
	{
		$data = [
			'id'        => $this->media->id,
			'timestamp' => time()
		];
		$data = serialize($data);

		$mcrypt_media = config('mcrypt.keys.media');

		$hash = encrypt_tripledes(
			$data,
			$mcrypt_media['encrypt_key'],
			$mcrypt_media['iv'],
			$mcrypt_media['bit_check']
		);

		return url(route('medias.index', ['hash' => base64_encode($hash)]));
	}

}
