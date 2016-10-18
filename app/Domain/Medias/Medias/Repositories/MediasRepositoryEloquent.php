<?php namespace cms\Domain\Medias\Medias\Repositories;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use cms\Infrastructure\Abstractions\Repositories\RepositoryEloquentAbstract;
use cms\Domain\Medias\Medias\Repositories\MediasRepository;
use cms\Domain\Medias\Medias\Media;

/**
 * Class MediasRepositoryEloquent
 * @package cms\Domain\Medias\Medias\Repositories
 */
class MediasRepositoryEloquent extends RepositoryEloquentAbstract implements MediasRepository
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return Media::class;
	}

	/**
	 * @param string $hash
	 *
	 * @seealso https://laracasts.com/discuss/channels/general-discussion/opening-files-online-using-laravel
	 *
	 * @return mixed
	 */
	public function mediasShowDocumentByHash($hash = '')
	{
		$data = $this->decodeHash(
			base64_decode($hash) // remove base64 encoding for URL
		);

		$raw_media_file = $this->find($data['id']);

		$file = storage_path(
			'app/' . $raw_media_file->id . '/' . $raw_media_file->file_name
		);

		if (File::isFile($file))
		{
			return $this->streamDocument($raw_media_file, $file);
		}

		return abort('404');
	}

	/**
	 * @param $file
	 *
	 * @return mixed
	 */
	protected function streamDocument(Media $raw_media_file, $file_path)
	{
		$path_parts = pathinfo($file_path);
		$extension = $path_parts['extension'];
		$content_types = config('content.types');

		$file_path = File::get($file_path);
		$response = Response::make($file_path, 200);

		// using this will allow you to do some checks on it (if pdf/docx/doc/xls/xlsx)
		$response->header('Content-Type', $content_types[$extension]);
		$response->header('Content-disposition', 'filename="' . $raw_media_file->file_name . '"');

		return $response;
	}

	/**
	 * @param $hash
	 *
	 * @return mixed
	 */
	protected function decodeHash($hash)
	{
		$mcrypt_media = config('mcrypt.keys.media');

		$str_decrypt = decrypt_tripledes(
			$hash,
			$mcrypt_media['encrypt_key'],
			$mcrypt_media['iv'],
			$mcrypt_media['bit_check']
		);

		return unserialize($str_decrypt);
	}

}
