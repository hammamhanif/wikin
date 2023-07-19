<?php

namespace App\Http\Controllers;

use App\Models\FormPemas;
use App\Models\Notification;
use App\Http\Requests\StoreFormPemasRequest;
use App\Http\Requests\UpdateFormPemasRequest;

class FormPemasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formpemas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormPemasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormPemasRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'description' => 'required',
        ]);

        $formpemas = new FormPemas();
        $formpemas->name = $request->name;
        $formpemas->nik = $request->nik;
        $formpemas->email = $request->email;
        $formpemas->location = $request->location;
        $formpemas->phone = $request->phone;
        $formpemas->description = $request->description;
        $formpemas->save();

        $notification = new Notification();
        $notification->model()->associate($formpemas); // Menghubungkan dengan model FormPemas
        $notification->content = 'Pengajuan Formulir Pengabdian Masyarakat baru telah dibuat.';
        $notification->save();

        return redirect()->route('pengmas')->with('success', 'Formulir Pengajuan Pengabdian Masyarakat Berhasil Diajukan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormPemas  $formPemas
     * @return \Illuminate\Http\Response
     */
    public function show(FormPemas $formPemas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormPemas  $formPemas
     * @return \Illuminate\Http\Response
     */
    public function edit(FormPemas $formPemas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormPemasRequest  $request
     * @param  \App\Models\FormPemas  $formPemas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormPemasRequest $request, FormPemas $formPemas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormPemas  $formPemas
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormPemas $formPemas)
    {
        //
    }
}
