<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        // Task: fill in the code here to update name and email
        // Also, update the password if it is set
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ];
        
        if($request->has('password')){
            auth()->user()->update->array_merge([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->password
            ]);
        }else{
            auth()->user()->update->array_merge([
                'name' => $request->input('name'),
                'email' => $request->input('email')
            ]);
        }
              

        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}
