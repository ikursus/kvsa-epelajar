<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Dapatkan senarai pelajar daripada table pelajar
        $senaraiPelajar = DB::table('pelajar')->get();

        // Beri respon paparkan template senarai pelajar
        // dan attachkan data $senaraiPelajar
        return view('pelajar.template-senarai', compact('senaraiPelajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelajar.template-daftar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email:filter'],
            'phone' => ['required'],
            'alamat' => ['required'],
            'no_kp' => ['required', 'digits:12'],
            'no_pelajar' => ['required'],
            'course' => ['required'],
            'status' => ['required']
        ]);

        // Simpan data ke dalam table pelajar menggunakan Query Builder
        DB::table('pelajar')->insert($data);

        // Bagi response data berjaya disimpan
        // Redirect client ke halaman senarai pelajar
        return redirect('pelajar/senarai')->with('mesej-berjaya', 'Rekod berjaya disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data daripada table pelajar berdasarkan ID pelajar
        $pelajar = DB::table('pelajar')->where('id', '=', $id)->first(); // LIMIT 1

        return view('pelajar.template-edit', compact('pelajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
