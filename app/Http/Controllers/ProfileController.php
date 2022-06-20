<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $userLogin = auth()->user();

        if (!($userLogin->hasRole(User::ADMIN) || $userLogin->id == $user->id)) {
            abort(401);
        } elseif ($user->hasRole(User::ADMIN)) {
            abort(404);
        }

        if ($user->hasRole(User::LECTURER)) {
            $user = User::with('lecturer')->find($user->id);
            $studyPrograms = StudyProgram::all();
            return view('profile.lecturer', compact('user', 'studyPrograms'));
        } elseif ($user->hasRole(User::STUDENT)) {
            $user = User::with('student')->find($user->id);
        }
    }

    public function update(Request $request, User $user)
    {
        // dd($user->photo);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'nip' => 'sometimes|required|string|max:18|unique:lecturers,nip,' . $user->lecturer?->id,
            'nrp' => 'sometimes|required|string|max:10|unique:students,nrp,' . $user->student?->id,
            'study_program_id' => 'nullable|integer|exists:study_programs,id',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'gender' => 'nullable|in:M,F',
            'photo' => 'image|mimes:jpeg,png,jpg,svg|max:2560'
        ]);

        if ($request->filled('password')) {
            $user->update($request->merge([
                'password' => Hash::make($request->password)
            ])->only('name', 'email', 'password'));
        } else {
            $user->update($request->except('password', 'password_confirmation'));
        }

        if ($request->hasFile('photo')) {
            Image::updateOrCreate(
                ['imageable_id' => $user->id, 'imageable_type' => 'App\Models\User'],
                ['url' => $this->upload('profile', $request->file('photo'), $user->photo) ]
            );
        }

        if ($user->hasRole(User::LECTURER)) {
            $user->lecturer()->update($request->only(
                'nip', 'study_program_id', 'address', 'phone', 'gender'
            ));
        } else if ($user->hasRole(User::STUDENT)) {
            //
        }

        return redirect()->route('profile.index', $user)->withSuccess('Data user berhasil diubah.');
    }
}
