<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('home', ['mahasiswa' => $mahasiswa, 'title' => 'Home']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insert', ['title' => 'Tambah Data']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMahasiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMahasiswaRequest $request)
    {
        $mahasiswa = $request->validate([
            'nama' => 'required|min:3|max:255',
            'nrp' => 'required|unique:mahasiswas|min:12|max:12',
            'email' => 'required|email|unique:mahasiswas|max:255',
            'alamat' => 'required|max:255'
        ]);

        Mahasiswa::create($mahasiswa);

        return (redirect()->route('home'))->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('edit', [
            'title' => 'Edit Data',
            'mhs' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMahasiswaRequest  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $rules = [
            'nama' => 'required|min:3|max:255',
            'alamat' => 'required|max:255'
        ];

        if ($request->nrp != $mahasiswa->nrp) {
            $rules['nrp'] = 'required|unique:mahasiswas|min:12|max:12';
        }

        if ($request->email != $mahasiswa->email) {
            $rules['email'] = 'required|email|unique:mahasiswas|max:255';
        }

        $data = $request->validate($rules);

        Mahasiswa::where('id', $mahasiswa->id)
            ->update($data);

        return redirect()->route('home')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        Mahasiswa::destroy($mahasiswa->id);
        return redirect()->route('home')->with('success', 'Data berhasil dihapus');
    }
}
