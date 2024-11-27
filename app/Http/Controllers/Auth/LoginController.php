<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Method ini akan memaparkan borang login
    public function paparBorangLogin()
    {
        return view('authentication.template-borang-login'); // cari folder resources/views
    }

    // Method ini akan memproses data daripada borang login
    public function semakanDataLogin(Request $request)
    {
        // Dapatkan SEMUA data daripada borang
        // $data = $request->all();
        // $data = $request->only('email', 'password');
        // $data = $request->except('email');
        // $email = $request->input('email'); // $request->email;
        $data = $request->validate([
            'email' => 'required|email', // Cara 1 tulis validation rules kaedah string
            'password' => ['required', 'string', 'min:3'] // Cara 2 tulis validation rules kaedah array
        ]);

        // Paparkan data
        return $data;
    }

}
