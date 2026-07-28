<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $address = $user->addresses()->first();

        $isEditing = false;

        return view('profile.addresses', compact('address', 'isEditing'));
    }

    public function edit()
    {
        /** @var User $user */
        $user = Auth::user();

        $address = $user->addresses()->first();

        $isEditing = true;

        return view('profile.addresses', compact('address', 'isEditing'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'label'              => 'required|string|max:255',
            'country'            => 'required|string|max:255',
            'city'               => 'required|string|max:255',
            'street'             => 'required|string|max:255',
            'building_number'    => 'required|string|max:255',
            'floor'              => 'nullable|string|max:255',
            'apartment_number'   => 'nullable|string|max:255',
            'postal_code'        => 'nullable|string|max:255',
        ]);

        /** @var User $user */
        $user = Auth::user();

        $user->addresses()->create([
            'label'              => $request->label,
            'country'            => $request->country,
            'city'               => $request->city,
            'street'             => $request->street,
            'building_number'    => $request->building_number,
            'floor'              => $request->floor,
            'apartment_number'   => $request->apartment_number,
            'postal_code'        => $request->postal_code,
        ]);

        return redirect()->route('profile.address');
    }

    public function update(Request $request)
    {
        $request->validate([
            'label'              => 'required|string|max:255',
            'country'            => 'required|string|max:255',
            'city'               => 'required|string|max:255',
            'street'             => 'required|string|max:255',
            'building_number'    => 'required|string|max:255',
            'floor'              => 'nullable|string|max:255',
            'apartment_number'   => 'nullable|string|max:255',
            'postal_code'        => 'nullable|string|max:255',
        ]);

        /** @var User $user */
        $user = Auth::user();

        $address = $user->addresses()->first();

        if ($address) {
            $address->update([
                'label'              => $request->label,
                'country'            => $request->country,
                'city'               => $request->city,
                'street'             => $request->street,
                'building_number'    => $request->building_number,
                'floor'              => $request->floor,
                'apartment_number'   => $request->apartment_number,
                'postal_code'        => $request->postal_code,
            ]);
        }

        return redirect()->route('profile.address');
    }

    public function destroy()
    {
        /** @var User $user */
        $user = Auth::user();

        $address = $user->addresses()->first();

        if ($address) {
            $address->delete();
        }

        return redirect()->route('profile.address');
    }
}