<?php

namespace bellumindustria\Domain\Files\Medias\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use bellumindustria\Infrastructure\Contracts\Repositories\RepositoryEloquentAbstract;
use bellumindustria\App\Traits\SecurityHashTrait;
use bellumindustria\Domain\Files\Medias\Repositories\MediasRepository;
use bellumindustria\Domain\Files\Medias\Media;

class MediasRepositoryEloquent extends RepositoryEloquentAbstract implements MediasRepository
{

	use SecurityHashTrait;

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
	 * @param $path
	 *
	 * @return mixed
	 */
	public function streamPublicDocument($path)
	{
		$path = storage_path('app/public/' . $path);

		if (!\File::exists($path))
		{
			abort(404);
		}

		$file = \File::get($path);
		$type = \File::mimeType($path);

		$response = \Response::make($file, 200);
		$response->header("Content-Type", $type);

		return $response;
	}

	/**
	 * @param $path
	 */
	public function outputPublicThumbnails($path)
	{
		$server = \League\Glide\ServerFactory::create([
			'source' => app('filesystem')->disk('public')->getDriver(),
			'cache'  => storage_path('app/thumbnails'),
		]);

		$server->outputImage($path, \Illuminate\Support\Facades\Input::query());
	}

//	/**
//	 * @param string $hash
//	 *
//	 * @seealso https://laracasts.com/discuss/channels/general-discussion/opening-files-online-using-laravel
//	 *
//	 * @return mixed
//	 */
//	public function mediasShowDocumentByHash($hash = '')
//	{
//		$data = $this->readHash($hash);
//
//		$raw_media_file = $this->find($data['id']);
//
//		$file = storage_path(
//			'app/' . $raw_media_file->id . '/' . $raw_media_file->file_name
//		);
//
//		if (File::isFile($file))
//		{
//			if ($this->checkDocumentAccessRightForCurrentUser($raw_media_file))
//			{
//				return $this->streamDocument($raw_media_file, $file);
//			}
//
//			return abort('403');
//		}
//
//		return abort('404');
//	}
//
//	/**
//	 * @param $file
//	 *
//	 * @return mixed
//	 */
//	protected function streamDocument(Media $raw_media_file, $file_path)
//	{
//		$path_parts = pathinfo($file_path);
//		$extension = $path_parts['extension'];
//		$content_types = config('content.types');
//
//		$file_path = File::get($file_path);
//		$response = Response::make($file_path, 200);
//
//		// using this will allow you to do some checks on it (if pdf/docx/doc/xls/xlsx)
//		$response->header('Content-Type', $content_types[$extension]);
//		$response->header('Content-disposition', 'filename="' . $raw_media_file->file_name . '"');
//
//		return $response;
//	}
//
//	/**
//	 * @param $raw_media_file
//	 *
//	 * @return bool
//	 */
//	protected function checkDocumentAccessRightForCurrentUser(Media $raw_media_file)
//	{
//		return (Auth::user()->is_admin)
//			/*
//			 * User profiles show document to related user
//			 */
//			|| (
//				'bellumindustria\Domain\Users\Profiles\Profile' == $raw_media_file->model_type
//				&& Auth::user()->profile->id == $raw_media_file->model_id
//			)
//			/*
//			 * CustomersRequestsComments show document to related customer
//			 */
//			|| (
//				Auth::user()->is_customer
//				&& 'bellumindustria\Domain\Customers\RequestsComments\RequestComment' == $raw_media_file->model_type
//				&& (
//				Auth::user()
//					->profilecustomer
//					->requests
//					->filter(function ($request) use ($raw_media_file)
//					{
//						return isset($request->comments)
//							&& $request->comments->contains($raw_media_file->model_id);
//					})
//					->first()
//					->id
//				)
//			)
//			/*
//			 * ProjectComment show document to related customer
//			 */
//			|| (
//				Auth::user()->is_customer
//				&& 'bellumindustria\Domain\Trainings\ProjectsComments\ProjectComment' == $raw_media_file->model_type
//				&& (
//				Auth::user()
//					->profilecustomer
//					->projects
//					->filter(function ($request) use ($raw_media_file)
//					{
//						return isset($request->comments)
//							&& $request->comments->contains($raw_media_file->model_id);
//					})
//					->first()
//					->id
//				)
//			);
//	}
}
