<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('updated_at', 'DESC')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|numeric|digits:1',
        ];

        if ($request->role == User::LECTURER) {
            $rules['identity'] = 'required|string|max:18|unique:lecturers,nip';
        } else if ($request->role == User::STUDENT) {
            $rules['identity'] = 'required|string|max:10|unique:students,nrp';
        }

        $request->validate($rules);

        $user = User::create($request->merge([
            'password' => Hash::make($request->password),
            'is_validated' => true
        ])->only('name', 'email', 'password', 'role', 'is_validated'));

        if ($request->role == User::LECTURER) {
            $user->lecturer()->create(['nip' => $request->identity]);
        } else if ($request->role == User::STUDENT) {
            $user->student()->create(['nrp' => $request->identity]);
        }

        return redirect()->route('users.index')->withSuccess('Data user berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed'
        ];

        if ($user->hasRole(User::LECTURER)) {
            $rules['identity'] = 'required|string|max:18|unique:lecturers,nip,' . $user->lecturer->id;
        } else if ($user->hasRole(User::STUDENT)) {
            $rules['identity'] = 'required|string|max:10|unique:students,nrp,' . $user->student->id;
        }

        $request->validate($rules);

        if ($request->filled('password')) {
            $user->update($request->merge([
                'password' => Hash::make($request->password)
            ])->only('name', 'email', 'password'));
        } else {
            $user->update($request->except('password', 'password_confirmation'));
        }

        if ($user->hasRole(User::LECTURER)) {
            $user->lecturer()->update(['nip' => $request->identity]);
        } else if ($user->hasRole(User::STUDENT)) {
            $user->student()->update(['nrp' => $request->identity]);
        }

        return redirect()->route('users.index')->withSuccess('Data user berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index')->withError('Tidak bisa menghapus user yang sedang login.');
        }

        $user->delete();

        return redirect()->route('users.index')->withSuccess('Data user berhasil dihapus.');
    }

    public function validation(User $user)
    {
        $user->update([
            'is_validated' => true
        ]);

        return redirect()->route('users.index')->withSuccess('Data user berhasil divalidasi.');
    }
}
