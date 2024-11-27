<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        // Dapatkan rekod profile user berdasarkan session user yang sedang login
        $admin = User::findOrFail( auth()->id() );

        return view('template-profile', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:filter'],
            'phone' => ['required']
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
        $admin = User::findOrFail(auth()->id());
        // Update data
        $admin->update($data);

        return redirect()->route('profile.edit')->with('mesej-berjaya', 'Profile berjaya dikemaskini');
    }
}
