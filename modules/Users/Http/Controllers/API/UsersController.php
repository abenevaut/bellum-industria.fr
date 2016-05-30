<?php namespace Modules\Users\Http\Controllers\Api;

use Core\Http\Controllers\CoreAdminController as Controller;
use Modules\Users\Repositories\UserRepositoryEloquent;
use Modules\Users\Http\Requests\UsersFilteredFormRequest;
use Modules\Users\Transformers\UserApiTransformer;

class UsersController extends Controller
{
    /**
     * @var UserRepositoryEloquent|null
     */
    protected $r_user = null;

    /**
     * @var TransformerAbstract The user transformer class
     */
    protected $obj_userTransformer = UserApiTransformer::class;

    /**
     * @var array
     */
    protected $apiMethods = [
        'index' => [
            'logged' => true,
            'keyAuthentication' => true,
            'level' => 10
        ],
        'show' => [
            'logged' => true,
            'keyAuthentication' => true,
            'level' => 10
        ],
        'userProfile' => [
            'logged' => true,
            'keyAuthentication' => true,
            'level' => 1
        ],
    ];

    /**
     *
     */
    public function __construct(UserRepositoryEloquent $r_user)
    {
        parent::__construct();

        $this->r_user = $r_user;
        // reset user
        $this->user = $this->r_user->find($this->user->id)->first();

        switch ($this->user->apikey->level)
        {
            case 10:
            case 9:
            case 8:
            case 7:
            case 6:
            case 5:
            case 4:
            case 3:
            case 2:
            case 1:
            default:
                $this->obj_userTransformer = UserApiTransformer::class;
        }
    }

    /**
     * $> curl --header "X-Authorization: <API_KEY>" http://localhost/v1/users?email=&name=
     *
     * @return mixed
     */
    public function index(UsersFilteredFormRequest $request)
    {
        $users = [];

        if (\Auth::user()->hasRole('admin')) {

            $name = $request->has('name')
                ? $request->get('name')
                : null;

            $email = $request->has('email')
                ? $request->get('email')
                : null;

            if (!is_null($name)) {
                $this->r_user->filterUserName($name);
            }

            if (!is_null($email)) {
                $this->r_user->filterEmail($email);
            }

            $users = $this->r_user->all();
        }

        return $this->response->withCollection($users, new $this->obj_userTransformer);
    }

    /**
     * $> curl --header "X-Authorization: <API_KEY>" http://localhost/v1/users/<ID>
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $users = [];

        try {

            if (\Auth::user()->hasRole('admin')) {
                $users = $this->r_user->find($id);
            }

            return $this->response->withItem($users, new $this->obj_userTransformer);
        }
        catch (ModelNotFoundException $e) {
            return $this->response->errorNotFound();
        }
    }

    /**
     * Return profile of current user
     *
     * $> curl --header "X-Authorization: <API_KEY>" http://localhost/v1/users/profile
     *
     * @return mixed
     */
    public function userProfile()
    {
        return $this->show($this->user->id);
    }
}