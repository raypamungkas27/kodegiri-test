<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentsCreateR;
use App\Http\Requests\DocumentsUpdateR;
use App\Http\Requests\send_email_actionR;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class DocumentsCT extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return DataTables::of(Document::query())
                ->addColumn('action', function ($row) {
                    $btn = '
                            <a href="/admin/document/' . $row->id . '" class="btn m-1 btn-info btn-sm" > <i class="fa fa-eye" ></i> Lihat</a>
                            <a href="/admin/document/' . $row->id . '/edit" class="btn m-1 btn-warning btn-sm" > <i class="fa fa-edit" ></i> Edit</a>
                            <a href="#" class="delete btn m-1 btn-danger btn-sm" data-url="' . url("/") . '/admin/document/delete/' . $row->id . '"> <i class="fa fa-trash"></i> Delete</a>
                            <a href="/admin/document/send-email/' . $row->id . '" class="btn m-1 btn-secondary btn-sm" > <i class="fa fa-eye" ></i> Send Email</a>
                        ';

                    return $btn;
                })
                ->make();
        }

        return view(
            'list.list',
            [
                'judul' => 'Data Documents',
                'BtnInfo' => [
                    'url' => '/admin/document/create',
                    'name' => "Add Document"
                ],
                'Cloums' => [
                    [

                        'title' => 'title',
                        'data' => 'title',
                        'name' => 'documents.title',
                    ],
                    [

                        'title' => 'tanggal',
                        'data' => 'tanggal_signing',
                        'name' => 'documents.tanggal_signing',
                    ],
                    [

                        'title' => 'Jabatan',
                        'data' => 'jabatan_signing',
                        'name' => 'documents.jabatan_signing',
                    ],
                    [

                        'title' => 'Nama',
                        'data' => 'nama_signing',
                        'name' => 'documents.nama_signing',
                    ],
                    [
                        'data' => 'action',
                        'name' => 'action',
                    ],
                ]
            ]
        );
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentsCreateR $request)
    {

        $model = new Document();
        $model->id = (string) Str::uuid();
        $model->title = $request->title;
        $model->content = $request->content;
        $model->tanggal_signing = $request->tanggal_signing;
        $model->jabatan_signing = $request->jabatan_signing;
        $model->nama_signing = $request->nama_signing;

        $file['signing'] = Str::random(10) . '.' . $request->signing->getClientOriginalExtension();
        $request->signing->storeAs('public/signing', $file['signing']);
        $model->signing = $file['signing'];

        $model->save();

        Alert::success("Success", "Add Data Document Success");
        return redirect('admin/document');

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Document::find($id);
        if (!$model) {
            Alert::error("Error", "Data Tidak Ditemukan");
            return redirect('admin/document');
        }
        return view('admin.documents.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Document::find($id);
        if (!$model) {
            Alert::error("Error", "Data Tidak Ditemukan");
            return redirect('admin/document');
        }
        return view('admin.documents.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentsUpdateR $request, string $id)
    {
        $model = Document::find($id);
        $model->title = $request->title;
        $model->content = $request->content;
        $model->tanggal_signing = $request->tanggal_signing;
        $model->jabatan_signing = $request->jabatan_signing;
        $model->nama_signing = $request->nama_signing;

        if ($request->signing) {
            $file['signing'] = Str::random(10) . '.' . $request->signing->getClientOriginalExtension();
            $request->signing->storeAs('public/signing', $file['signing']);
            $model->signing = $file['signing'];
        }

        $model->save();

        Alert::success("Success", "Edit Data Document Success");
        return redirect('admin/document');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function send_email($id)
    {
        $model = Document::find($id);
        if (!$model) {
            Alert::error("Error", "Data Tidak Ditemukan");
            return redirect('admin/document');
        }

        return view('admin.documents.send_email', compact('model'));
    }


    public function send_email_action(send_email_actionR $request, $id)
    {
        $model = Document::find($id);
        if (!$model) {
            Alert::error("Error", "Data Tidak Ditemukan");
            return redirect('admin/document');
        }

        foreach ($request->email as $key => $value) {
            Mail::to($value)->send(new \App\Mail\SendEmail($model));
        }

        Alert::success("Success", "Send Document Success");
        return redirect('admin/document');
    }

    public function delete($id)
    {
        $model = Document::find($id);
        if (!$model) {
            Alert::error("Error", "Data Tidak Ditemukan");
            return redirect('admin/document');
        }
        $model->delete();

        return redirect('admin/document');
    }
}
