<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user(); // تم النقل لأول الدالة لضمان عدم مسح البيانات التعديلية

        $request->validate([

            'name' => [
                'required',
                'string',
                'min:3',   // لا يقل عن 3 حروف
                'max:255'  // لا يزيد عن 255 حرف
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],

            'phone' => [
                'required',
                'string',
                'max:20',
                Rule::unique('users')->ignore($user->id),
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'current_password' => [
                'nullable',
                'required_with:password',
            ],

            'password' => [
                'nullable',
                'confirmed',
                'min:8', // لا يقل عن 8 حروف بدون أي شروط معقدة إضافية
            ],

        ]);

        /*
        |----------------------------
        | Change Password
        |----------------------------
        */
        if ($request->filled('password')) {

            if (!Hash::check($request->current_password, $user->password)) {
                return back()
                    ->withErrors([
                        'current_password' => 'Current password is incorrect.'
                    ])
                    ->withInput();
            }

            $user->password = Hash::make($request->password);
        }

        /*
        |----------------------------
        | Upload Image
        |----------------------------
        */
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images/profile'), $imageName);

            $user->image = 'images/profile/'.$imageName;
        }

        /*
        |----------------------------
        | Update Data
        |----------------------------
        */
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile updated successfully.');
    }
}