<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cara mendapatkan data users menerusi kaedah Query Builder
        // $senaraiAdmin = DB::table('users')->get();

        // Cara mendapatkan data users menerusi kaedah Eloquent / Model
        // $senaraiAdmin = User::all();
        // Cara 1 sorting data
        // $senaraiAdmin = User::orderBy('id', 'desc')->get(); // asc / desc

        // Cara 2 sorting data
        $senaraiAdmin = User::latest('id')->get();

        return view('admin.template-senarai', compact('senaraiAdmin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.template-daftar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:filter'],
            'password' => ['required', 'confirmed'],
            'phone' => ['required'],
            'status' => ['required']
        ]);

        // Simpan Data Ke dalam Table Users
        // Cara 1 Simpan Data Menggunakan Model menerusi new Object
        $admin = new User();
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->password = $data['password']; // bcrypt($data['password'])
        $admin->phone = $data['phone'];
        $admin->status = $data['status'];
        $admin->save();
        // Cara 2 Simpan Data Menggunakan Model menerusi method create()
        // User::create($data);

        // Redirect client ke halaman senarai admin
        return redirect()->route('admin.index')->with('mesej-berjaya', 'Rekod berjaya disimpan');
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
        // Kaedah query builder untuk dapatkan data user berdasarkan ID daripada table users
        // $admin = DB::table('users')->where('id', '=', $id)->first();
        // $admin = User::where('id', '=', $id)->first();
        // $admin = User::whereId($id)->first();
        // $admin = User::find($id); // Gunakan find() JIKA ada condition yang ingin dilakukan sekiranya ID tidak dijumpai
        $admin = User::findOrFail($id); // Gunakan findOrFail() jika ingin paparkan page 404 jika ID tidak dijumpai

        return view('admin.template-edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:filter'],
            'phone' => ['required'],
            'status' => ['required']
        ]);

        // Semak sekiranya input password diisi?
        // Jika diisi, maka lakukan validasi password
        // Attach password ke $data
        if ($request->filled('password'))
        {
            $request->validate([
                // 'password' => ['confirmed', Password::min(3)->uncompromised()]
                'password' => ['confirmed', Password::min(3)]
            ]);

            $data['password'] = $request->input('password');
        }

        // Cari akaun User/Admin yang ingin dikemaskini
        $admin = User::findOrFail($id);
        // Update data
        $admin->update($data);

        return redirect()->route('admin.index')->with('mesej-berjaya', 'Rekod berjaya dikemaskini');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin)
    {
        $admin->delete();

        return redirect()->route('admin.index')->with('mesej-berjaya', 'Rekod berjaya dipadam');
    }
}
