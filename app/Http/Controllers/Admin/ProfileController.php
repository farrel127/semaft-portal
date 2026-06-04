<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // INI ADALAH FUNGSI YANG HILANG SEBELUMNYA!
    public function updateWidget(Request $request): RedirectResponse
    {
        $user = $request->user();
        
        $user->update([
            'show_aspirasi' => $request->has('show_aspirasi'),
            'show_agenda'   => $request->has('show_agenda'),
            'show_berita'   => $request->has('show_berita'),
            'show_himpunan' => $request->has('show_himpunan'),
        ]);

        return back()->with('status', 'widget-updated');
    }
}