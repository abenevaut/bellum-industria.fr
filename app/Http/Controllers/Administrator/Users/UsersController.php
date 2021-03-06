<?php

namespace template\Http\Controllers\Administrator\Users;

use League\Csv\Writer;
use Illuminate\Support\Facades\Auth;
use template\Domain\Users\Users\User;
use template\Infrastructure\Contracts\Controllers\ControllerAbstract;
use template\Http\Request\Administrator\Users\Users\
{
    UserFormRequest,
    UsersFiltersFormRequest
};
use template\Domain\Users\Users\Repositories\UsersRepositoryEloquent;

class UsersController extends ControllerAbstract
{

    /**
     * @var null
     */
    protected $r_users = null;

    /**
     * UsersController constructor.
     *
     * @param UsersRepositoryEloquent $r_users
     */
    public function __construct(UsersRepositoryEloquent $r_users)
    {
        $this->r_users = $r_users;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function dashboard()
    {
        try {
            return view('administrator.users.users.dashboard', []);
        } catch (\Exception $exception) {
            app('sentry')->captureException($exception);
        }

        return abort('404');
    }

    /**
     * Display list of resources.
     *
     * @param UsersFiltersFormRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function index(UsersFiltersFormRequest $request)
    {
        try {
            $users = $this->r_users->getPaginatedUsers();

            return view('administrator.users.users.index', ['users' => $users]);
        } catch (\Exception $exception) {
            app('sentry')->captureException($exception);
        }

        return abort('404');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        try {
            $user = $this->r_users->getUser($user->id);

            return view('administrator.users.users.show', ['user' => $user]);
        } catch (\Exception $exception) {
            app('sentry')->captureException($exception);
        }

        return abort('404');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function create()
    {
        try {
            return view(
                'administrator.users.users.create',
                [
                    'civilities' => $this->r_users->getCivilities(),
                    'roles' => $this->r_users->getRoles(),
                    'locales' => $this->r_users->getLocales(),
                    'locale' => User::DEFAULT_LOCALE,
                    'timezones' => $this->r_users->getTimezones(),
                    'timezone' => User::DEFAULT_TZ,
                ]
            );
        } catch (\Exception $exception) {
            app('sentry')->captureException($exception);
        }

        return abort('404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserFormRequest $request)
    {
        try {
            $this
                ->r_users
                ->createUser(
                    $request->get('civility'),
                    $request->get('first_name'),
                    $request->get('last_name'),
                    $request->get('email'),
                    $request->get('role'),
                    $request->get('locale'),
                    $request->get('timezone')
                );

            return redirect(route('administrator.users.users.index'));
        } catch (\Prettus\Validator\Exceptions\ValidatorException $exception) {
            app('sentry')->captureException($exception);
        }

        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param integer $id User id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $user = $this->r_users->getUser($user->id);

        return view('administrator.users.users.edit', [
            'user' => $user,
            'civilities' => $this->r_users->getCivilities(),
            'roles' => $this->r_users->getRoles(),
            'locales' => $this->r_users->getLocales(),
            'timezones' => $this->r_users->getTimezones(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param UserFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(User $user, UserFormRequest $request)
    {
        try {
            $this
                ->r_users
                ->update(
                    [
                        'role' => $request->get('role'),
                        'civility' => $request->get('civility'),
                        'first_name' => $request->get('first_name'),
                        'last_name' => $request->get('last_name'),
                        'email' => $request->get('email'),
                        'locale' => $request->get('locale'),
                        'timezone' => $request->get('timezone'),
                    ],
                    $user->id
                )
                ->updateProfile();
        } catch (\Prettus\Validator\Exceptions\ValidatorException $exception) {
            app('sentry')->captureException($exception);
        }

        return redirect(route('administrator.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {
        if ($this->r_users->isUserDeletingHisAccount(Auth::user(), $user)) {
            return redirect(route('administrator.users.index'));
        }

        $this->r_users->delete($user->id);

        return redirect(route('administrator.users.index'));
    }

    /**
     * Export resources from storage.
     */
    public function export()
    {
        $this->r_users->with(['lead']);

        $fd = fopen('php://output', 'w');
        $csv = Writer::createFromStream($fd);
        $csv->setDelimiter(';');

        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Description: File Transfer');
        header("Content-type: text/csv");
        header(
            "Content-Disposition: attachment; filename="
            . trans('users.export_sheet_title', ['date' => date('Y-m-d_H-i-s')])
        );
        header("Expires: 0");
        header("Pragma: public");

        $nb_users = $this->r_users->count();

        $csv->insertOne([
            trans('global.id'),
            trans('users.civility'),
            trans('users.last_name'),
            trans('users.first_name'),
            trans('profiles.family_situation'),
            trans('profiles.maiden_name'),
            trans('profiles.birth_date'),
            trans('global.email'),
            trans('users.role'),
            trans('users.locale'),
            trans('users.timezone'),
        ]);

        $this
            ->r_users
            ->all()
            ->each(function ($model) use ($csv) {
                $csv->insertOne([
                    $model->uniqid,
                    trans('users.civility.' . $model->civility),
                    $model->last_name,
                    $model->first_name,
                    trans('profiles.family_situation.' . $model->profile->family_situation),
                    $model->profile->maiden_name,
                    is_null($model->profile->birth_date_carbon)
                        ?: $model
                        ->profile
                        ->birth_date_carbon
                        ->format(trans('global.date_format')),
                    $model->email,
                    trans('users.role.' . $model->role),
                    $model->locale,
                    $model->timezone,
                ]);
            });

        $csv->insertOne([
            trans('users.export_total_user', ['nb_users' => $nb_users]),
        ]);
        exit;
    }
}
