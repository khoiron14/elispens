<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|numeric|digits:1',
        ]);

        User::create($request->merge([
            'is_validated' => true
        ])->all());

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
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
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
        ];

        if ($user->role != User::ADMIN) {
            // add some condition for not admin
        }
        
        if ($request->filled('password')) {
            array_push($rules, ['password' => 'string|min:8|confirmed']);
            $request->validate($rules);
            $user->update($request->all());
        } else {
            $request->validate($rules);
            $user->update($request->except('password'));
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

    public function validation(User $user) {
        $user->update([
            'is_validated' => true
        ]);

        return redirect()->route('users.index')->withSuccess('Data user berhasil divalidasi.');
    }
}
