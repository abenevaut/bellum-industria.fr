<?php

namespace App\Admin\Controllers;

use CVEPDB\Controllers\AbsController as Controller;
use App\Admin\Repositories\Bills\Payment;
use App\Admin\Requests\PaymentFormRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view(
            'cvepdb.admin.payments.index',
            [
                'payments' => Payment::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cvepdb.admin.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(PaymentFormRequest $request)
    {
        Payment::create([
            'bill_id' => $request->get('bill_id'),
            'bank_account_id' => $request->get('bank_account_id'),
            'date' => $request->get('date'),
        ]);
        return redirect('admin/payments');
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