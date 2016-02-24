<?php

namespace App\Admin\Outputters;

use CVEPDB\Requests\IFormRequest;
use App\Admin\Repositories\Bills\PaymentRepositoryEloquent;
use App\Admin\Repositories\Users\UserRepositoryEloquent;
use CVEPDB\Repositories\Roles\RoleRepositoryEloquent;
use App\Multigaming\Repositories\RoleRepository;

class DashboardOutputter extends AdminOutputter
{
    /**
     * @var UserRepositoryEloquent|null
     */
    private $r_user = null;

    /**
     * @var RoleRepositoryEloquent|null
     */
    private $r_role = null;

    /**
     * @var PaymentRepositoryEloquent|null
     */
    private $r_payment = null;

    public function __construct(UserRepositoryEloquent $r_user, RoleRepositoryEloquent $r_role, PaymentRepositoryEloquent $paymentRepository)
    {
        parent::__construct();

        $this->r_user = $r_user;
        $this->r_role = $r_role;
        $this->r_payment = $paymentRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        $payments = $this->r_payment->all();
//
//        $total_amount_per_year = [];
//        $total_amount_per_year['total'] = 0;
//
//        foreach ($payments as $payment) {
//
//            $year = date('Y', strtotime($payment->date));
//
//            if (!array_key_exists($year, $total_amount_per_year)) {
//                $total_amount_per_year[$year] = 0;
//            }
//
//            $total_amount_per_year[$year] += str_replace([' ', ','], ['', '.'], $payment->amount);
//            $total_amount_per_year['total'] += str_replace([' ', ','], ['', '.'], $payment->amount);
//        }
//
//        krsort($total_amount_per_year);

        return $this->output(
            'cvepdb.admin.dashboard.index',
            [
//                'total_amount_per_year' => $total_amount_per_year

                'users' => [
                    'statistiques' => [
                        'all' => $this->r_user->all()->count(),
                        'roles' => [
                            'admins' => $this->r_role->count_users_by_roles([RoleRepositoryEloquent::ADMIN]),
                            'users' => $this->r_role->count_users_by_roles([RoleRepositoryEloquent::USER]),
                            'clients' => $this->r_role->count_users_by_roles([RoleRepositoryEloquent::CLIENT]),
                            'gamers' => $this->r_role->count_users_by_roles([RoleRepository::GAMER_USER]),
                        ]
                    ]
                ]

            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}