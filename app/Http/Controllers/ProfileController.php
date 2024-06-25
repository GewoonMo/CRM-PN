<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Render the create profile form
        return view('profile.create');
    }

    public function showNoProfile()
    {
        if (auth()->check()) {
            $users = User::doesntHave('profile')->get();
            return view('profile.noProfile', compact('users'));
        } else {
            return redirect()->route('login');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function createForUser(User $user)
    {
        // Render the create profile form
        return view('profile.create', compact('user'));
    }



    public function storeForUser(User $user, StoreProfileRequest $request)
    {
        // Validate the form data
        $data = $request->validate([
            'userName' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'biography' => 'nullable|string',
            'experience' => 'nullable|string',
            'education' => 'nullable|string',
            'skills' => 'nullable|string',
            'visibility' => 'required|boolean',
        ]);

        // Create a new profile for the authenticated user

        $profile = new Profile($data);
        $profile->user()->associate($user);

        // Handle the file upload
        if ($request->hasFile('profile_photo')) {
            $filenameToStore = time() . '_' . $request->file('profile_photo')->getClientOriginalName();
            $request->file('profile_photo')->storeAs('public/profile_photos', $filenameToStore);
            $profile->profile_photo = $filenameToStore;
        }

        // Save the updated profile
        $profile->save();

        return redirect()->route('profile.all', $user)
            ->with('status', 'Het profiel voor '.$user->name.'is aangemaakt!');
    }

    public function editForUser(User $user)
    {
        // Render the edit profile form

        $profile = $user->profile()->firstOrFail();
        return view('profile.edit', compact('profile'));
    }

    public function updateForUser(User $user, StoreProfileRequest $request)
    {
        // Validate the form data
        $data = $request->validate([
            'userName' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'biography' => 'nullable|string',
            'experience' => 'nullable|string',
            'education' => 'nullable|string',
            'skills' => 'nullable|string',
            'visibility' => 'required|boolean',
        ]);

        // Create a new profile for the authenticated user

        $profile = $user->profile()->firstOrFail();
        $profile->fill($data);

        // Handle the file upload
        if ($request->hasFile('profile_photo')) {
            $filenameToStore = time() . '_' . $request->file('profile_photo')->getClientOriginalName();
            $request->file('profile_photo')->storeAs('public/profile_photos', $filenameToStore);
            $profile->profile_photo = $filenameToStore;
        }

        // Save the updated profile
        $profile->save();

        return redirect()->route('profile.show', $user)
            ->with('status', 'De profiel voor'.$user->name.' is aangepast!');
    }
    // delete profile of another user
    public function destroyForUser(User $user)
    {
        $profile = $user->profile()->firstOrFail();
        $profile->delete();
        return redirect()->route('profile.all')
            ->with('status', 'De profiel voor '.$user->name.'is verwijderd!');
    }

    // -----------------------------

    public function store(StoreProfileRequest $request)
    {
        // Validate the form data
        $data = $request->validate([
            'userName' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'biography' => 'nullable|string',
            'experience' => 'nullable|string',
            'education' => 'nullable|string',
            'skills' => 'nullable|string',
            'visibility' => 'required|boolean',
        ]);

        // Create a new profile for the authenticated user

        $user = auth()->user();

        $profile = new Profile($data);
        $profile->user()->associate($user);

        // Handle the file upload
        if ($request->hasFile('profile_photo')) {
            $filenameToStore = time() . '_' . $request->file('profile_photo')->getClientOriginalName();
            $request->file('profile_photo')->storeAs('public/profile_photos', $filenameToStore);
            $profile->profile_photo = $filenameToStore;
        }

        // Save the updated profile
        $profile->save();

        return redirect()->route('profile.all', $user)
            ->with('status', 'Het profiel voor '.$user->name.' is aangemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        if (auth()->check()) {
        $user = auth()->user();
        $profile = auth()->user()->profile;
        return view('profile.show', compact('user','profile'));
        } else {
            return redirect()->route('login');
        }
    }

    public function showProfile(User $user)
    {
        // Fetch the user's profile data from the database
        $profile = $user->profile;

        // Check if the profile exists
        if (!$profile) {
            return redirect()->route('home')->with('error', 'Profiel niet gevonden.');
        }

        // Check if the profile is public
        if (auth()->user()->isAdmin()){
            return view('profile.show', [
                'profile' => $profile,
                'user' => $user,

            ]);
        }
        elseif (!$profile->visibility) {
            return redirect()->route('home')->with('error', 'U bent niet toegestaan om dit profiel te bekijken.');
        }

        // Pass the profile data to the view
        return view('profile.show', [
            'profile' => $profile,
            'user' => $user,

        ]);
    }

    public function all()
    {
        if (auth()->check()) {

            auth()->user()->role_id == '1' ? $profiles = Profile::all() : $profiles = Profile::where('visibility', true)->get();

            return view('profile.all', compact('profiles'));
        } else {
            return redirect()->route('login');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $profile = auth()->user()->profile;
        return view('profile.edit', ['profile' => $profile]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $this->authorize('update-profile', $profile);

        $data = $request->validate([
            'userName' => ['required', 'string', 'max:255'],
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'biography' => ['nullable', 'string'],
            'experience' => ['nullable', 'string'],
            'education' => ['nullable', 'string'],
            'skills' => ['nullable', 'string'],

        ]);

        if ($request->filled('visibility')) {
            $data['visibility'] = $request->input('visibility');
        } else {
            $data['visibility'] = 0;
        }

        if ($request->hasFile('profile_photo')) {
            $filenameToStore = time() . '_' . $request->file('profile_photo')->getClientOriginalName();
            $request->file('profile_photo')->storeAs('public/profile_photos', $filenameToStore);
            $profile->profile_photo = $filenameToStore;
        }

        $profile->update($data);

        return redirect()->route('profile.all', $profile)
            ->with('status', 'Het profiel is met succes gewijzigd!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $this->authorize('delete', $profile);

        $profile->delete();

        return redirect()->route('profile.all')
            ->with('status', 'Het profiel is met succes verwijderd!');
    }
}
