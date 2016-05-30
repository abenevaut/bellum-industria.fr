<?php namespace Modules\Pages\Http\Outputters\Admin;

use Core\Http\Outputters\AdminOutputter;
use Core\Http\Requests\FormRequest as IFormRequest;
use Modules\Dashboard\Repositories\SettingsRepository;
use Modules\Pages\Repositories\PagesRepositoryEloquent;

/**
 * Class PageOutputter
 * @package Modules\Pages\Http\Outputters\Admin
 */
class PageOutputter extends AdminOutputter
{
	/**
	 * @var string Outputter header title
	 */
	protected $title = 'Pages';

	/**
	 * @var string Outputter header description
	 */
	protected $description = 'page redaction';

	/**
	 * @var PagesRepositoryEloquent|null
	 */
	protected $r_page = null;

	public function __construct(
	 SettingsRepository $r_settings,
	 PagesRepositoryEloquent $r_page
	) {
	
		parent::__construct($r_settings);
		$this->r_page = $r_page;
		$this->set_current_module('pages');
		$this->addBreadcrumb('Pages', 'admin/pages');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$pages = $this->r_page->all();

		return $this->output(
	  'pages.admin.index',
	  [
	  'pages' => $pages
	  ]
		);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return $this->output(
	  'pages.admin.create',
	  [
	  ]
		);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(IFormRequest $request)
	{
		$title = $request->get('title');
		$slug = slugify($title);
		$uri = $slug; // xABE Todo : when page parent in place, construct child URI
		$is_home = $request->get('is_home');

		// if ($is_home) {
		// xABE Todo : on bascule la page home courante vers 0
		//}

		$page = $this->r_page->create([
			'title' => $title,
			'content' => $request->get('content'),
			'is_home' => $is_home,
			'slug' => $slug,
			'uri' => $uri
		]);

		return $this->redirectTo('admin/pages');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param $id
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		$page = $this->r_page->find($id);

		return $this->output(
	  'pages.admin.edit',
	  [
	  'page' => $page
	  ]
		);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id, IFormRequest $request)
	{
		$title = $request->get('title');
		$slug = slugify($title);
		$uri = $slug; // xABE Todo : when page parent in place, construct child URI
		$is_home = $request->get('is_home');

		// if ($is_home) {
		// xABE Todo : on bascule la page home courante vers 0
		//}

		$page = $this->r_page->update([
			'title' => $title,
			'content' => $request->get('content'),
			'is_home' => $is_home,
			'slug' => $slug,
			'uri' => $uri
		], $id);

		return $this->redirectTo('admin/pages');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}
}
