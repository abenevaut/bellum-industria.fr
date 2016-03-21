<?php namespace Modules\Themes\Outputters;

use Config;
use App\Http\Admin\Outputters\AdminOutputter;
use CVEPDB\Requests\IFormRequest;

class ThemeAdminOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'Themes';

    /**
     * @var string Outputter header description
     */
    protected $description = 'theme selection';


    public function __construct()
    {
        parent::__construct();

        $this->set_current_module('themes');

        $this->addBreadcrumb('Themes', 'admin/themes');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $themes = [
            'backend' => [],
            'frontend' => []
        ];

        foreach (\Theme::all() as $theme) {

            $theme_config = $theme->getPath() . '/theme.json';

            if (file_exists($theme_config)) {
                $theme_config = json_decode(
                    file_get_contents($theme_config)
                );
                $themes[$theme_config->type][$theme->name] = [
                    'name' => $theme->name,
                    'preview' => !empty($theme_config->preview) ? $theme_config->preview : '',
                    'preview_path' => 'themes/' . $theme->name . '/img/',
                    'path' => $theme->getPath(),
                    'active' => config('app.themes.' . $theme_config->type) === $theme->name
                ];
            }
        }

        return $this->output(
            'themes.admin.index',
            [
                'themes' => $themes
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $id Theme ID to set active
     * @return Response
     */
    public function edit($id)
    {
        $themes = [
            'backend' => [],
            'frontend' => []
        ];

        foreach (\Theme::all() as $theme) {

            $theme_config = $theme->getPath() . '/theme.json';

            if (file_exists($theme_config)) {
                $theme_config = json_decode(
                    file_get_contents($theme_config)
                );
                array_push($themes[$theme_config->type], $theme->name);
            }
        }

        $theme_config = [
            'backend' => '',
            'frontend' => ''
        ];

        if (file_exists(config('themes.config.file'))) {
            $theme_config = file_get_contents(config('themes.config.file'));
            $theme_config = json_decode($theme_config);
        }

        if (
            array_key_exists('frontend', $themes)
            && in_array($id, $themes['frontend'])
        ) {
            $theme_config->frontend = $id;
        }
        else if (!file_exists(config('themes.config.file'))) {
            $theme_config->frontend = config('app.themes.frontend');
        }


        if (
            array_key_exists('backend', $themes)
            && in_array($id, $themes['backend'])
        ) {
            $theme_config->backend = $id;
        }
        else if (!file_exists(config('themes.config.file'))) {
            $theme_config->backend = config('app.themes.backend');
        }

        file_put_contents(
            config('themes.config.file'),
            json_encode($theme_config)
        );

        return redirect('admin/themes');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, IFormRequest $request)
    {
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