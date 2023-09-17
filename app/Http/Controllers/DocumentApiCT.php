<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentsCreateApiR;
use App\Http\Requests\DocumentsUpdateApiR;
use App\Http\Requests\send_email_actionApiR;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DocumentApiCT extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $model = Document::query();


        $title = $request->input('title');
        if ($title) {
            $model->where('title', $title);
        }
        $tanggal_signing = $request->input('tanggal_signing');
        if ($tanggal_signing) {
            $model->where('tanggal_signing', $tanggal_signing);
        }
        $jabatan_signing = $request->input('jabatan_signing');
        if ($jabatan_signing) {
            $model->where('jabatan_signing', $jabatan_signing);
        }
        $nama_signing = $request->input('nama_signing');
        if ($nama_signing) {
            $model->where('nama_signing', $nama_signing);
        }

        // Paginate the results
        $perPage = $request->input('per_page', 10); // Default per page is 10, you can change it
        $model = $model->paginate($perPage);

        return response()->json(compact('model'));

        //
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
     */
    public function store(DocumentsCreateApiR $request)
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

        return response()->json([
            'message' => 'Document berhasil diinput.',
            'document' => $model,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Document::find($id);
        if (!$model) {
            return response()->json([
                'message' => 'Document tidak ditemukan.',
            ], 404);
        }
        return response()->json([
            'document' => $model,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentsUpdateApiR $request, string $id)
    {
        $model = Document::find($id);
        if (!$model) {
            return response()->json([
                'message' => 'Document tidak ditemukan.',
            ], 404);
        }
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

        return response()->json([
            'message' => 'Document berhasil Diedit.',
            'document' => $model,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Document::find($id);
        if (!$model) {
            return response()->json([
                'message' => 'Document tidak ditemukan.',
            ], 404);
        }

        $model->delete();
        return response()->json([
            'message' => 'Document berhasil Dihapus.',
        ], 200);
    }


    public function send_email_action(send_email_actionApiR $request, $id)
    {

        $model = Document::find($id);
        if (!$model) {
            return response()->json([
                'message' => 'Document tidak ditemukan.',
            ], 404);
        }

        foreach ($request->email as $key => $value) {
            Mail::to($value)->send(new \App\Mail\SendEmail($model));
        }

        return response()->json([
            'message' => 'Document berhasil Send Email.',
        ], 200);
    }
}
