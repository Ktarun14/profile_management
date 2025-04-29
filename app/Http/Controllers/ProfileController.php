<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Auth::user()->profiles;
        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'profile_type' => 'required|in:personal,professional',
            'email' => 'required|email',
            'mobile_number' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('profile_type', 'email', 'mobile_number');
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('profile_images', 'public');
        }

        UserProfile::create($data);

        return redirect()->route('profiles.index')->with('success', 'Profile created successfully.');
    }

    public function edit($id)
    {
        $profile = UserProfile::findOrFail($id);

        // Manual Authorization
        if ($profile->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = UserProfile::findOrFail($id);

        if ($profile->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'email' => 'required|email,' . $profile->id,
            'mobile_number' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('email', 'mobile_number');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('profile_images', 'public');
        }

        $profile->update($data);

        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully.');
    }



    public function setDefault($id)
    {
        $user = Auth::user();

        $profile = $user->profiles()->findOrFail($id);

        $user->profiles()->update(['is_default' => false]);

        $profile->update(['is_default' => true]);

        session([
            'default_profile_id' => $profile->id,
            'default_profile_type' => $profile->profile_type,
        ]);

        return redirect()->route('profiles.index')->with('status', 'Default profile updated.');
    }
}
