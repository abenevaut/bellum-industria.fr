<?php

namespace App\CVEPDB\Admin\Controllers;

use Carbon\Carbon;

use App\CVEPDB\Admin\Controllers\Abs\AbsController as Controller;
use App\CVEPDB\Admin\Models\Bill;
use App\CVEPDB\Admin\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        return view(
            'cvepdb.admin.documents.index',
            [
                'documents' => Document::all()
            ]
        );
    }

    public function create()
    {
        //
    }

    public function store(BillFormRequest $request)
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param BillFormRequest $request
     * @return Response
     */
    public function update($id, BillFormRequest $request)
    {
        //
    }

    /**
     * @param App\CVEPDB\Admin\Models\Bill $id
     * @return mixed
     */
    public function postAjaxDocumentBill($id)
    {
        $input = \Input::all();
        $rules = array(
            'file' => 'mimes:pdf,png,doc,docx|max:10000',
        );

        $validation = \Validator::make($input, $rules);

        if ($validation->fails())
        {
            return \Response::make($validation->errors->first(), 400);
        }

        $file = \Input::file('file');

        if (is_null($file)) {
            return \Response::json('error', 400);
        }

        $bill = Bill::findOrFail($id);

        Document::create([
            'reference' => $bill->reference,
            'type' => 'bill',
            'path' => storage_path() . '/cvepdb/bills/' . date('Y', strtotime($bill->date_emission)) . '/' . $bill->reference . '/',
            'filename' => $file->getClientOriginalName(),
            'extension' => $file->guessClientExtension()
        ]);

        $file->move(
            storage_path() . '/cvepdb/bills/' . date('Y', strtotime($bill->date_emission)) . '/' . $bill->reference,
            $file->getClientOriginalName()
        );

        return \Response::json('success', 200);
    }
}