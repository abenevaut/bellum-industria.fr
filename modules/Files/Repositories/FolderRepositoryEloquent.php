<?php

namespace Modules\Files\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Files\Repositories\FolderRepository;
use Modules\Files\Entities\Folder;

/**
 * Class FolderRepositoryEloquent
 * @package namespace App\Repositories;
 */
class FolderRepositoryEloquent extends BaseRepository implements FolderRepository
{
    const DEFAULT_COLLECTION = 'default';
    const DISK_LOCAL = 'local';
    const DISK_PUBLIC = 'public';
    const DISK_CLOUD = 'cloud';

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Folder::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param Folder $folder The folder to associate the file
     * @param string $file Valid file path
     * @param string $collection Collection name
     * @param bool $preserving_original If true copy/paste the file else move file
     */
    protected function recordFile(Folder $folder, $file, $collection, $preserving_original)
    {
        $preserving_original
            ? $folder->addMedia($file)->preservingOriginal()->toMediaLibrary($collection, $folder->disk)
            : $folder->addMedia($file)->toMediaLibrary($collection, $folder->disk);
    }

    /**
     * @param Folder $folder The folder to associate the file
     * @param string $url Valid URL
     * @param string $collection Collection name
     * @throws \Spatie\MediaLibrary\Exceptions\UrlCouldNotBeOpened
     */
    protected function recordURL(Folder $folder, $url, $collection)
    {
        $folder->addMediaFromUrl($url)->toMediaLibrary($collection, $folder->disk);
    }
}
