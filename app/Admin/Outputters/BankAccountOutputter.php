<?php

namespace App\CVEPDB\Admin\Outputters;

use App\CVEPDB\Interfaces\Outputters\AbsLaravelOutputter;
use Illuminate\Http\Request as Request;

use App\CVEPDB\Admin\Repositories\BankAccountRepository;

class BankAccountOutputter extends AbsLaravelOutputter
{
    /**
     * @var null LogContact repository
     */
    private $r_BankAccount = null;

    public function __construct(BankAccountRepository $bankAccountRepository)
    {
        parent::__construct();

        $this->r_BankAccount = $bankAccountRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view(
            'cvepdb.admin.bankaccounts.index',
            [
                'bankaccounts' => $this->r_BankAccount->all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cvepdb.admin.bankaccounts.create');
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
        $validator = $this->r_BankAccount->store($request);
        if ($validator->passes()) {
            return redirect('admin/bankaccounts');
        }
        return \Redirect::back()->withErrors($validator);
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

    public function postAjaxGetBankAccount()
    {
        return ['results' => $this->r_BankAccount->all()];
    }
}