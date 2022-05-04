<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'nip' => [Rule::requiredIf(array_key_exists('nip', $data)), 'string', 'max:18', 'unique:lecturers'],
            'nrp' => [Rule::requiredIf(array_key_exists('nrp', $data)), 'string', 'max:10', 'unique:students'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if (array_key_exists('nip', $data)) {
            tap($user)->update(['role' => User::LECTURER])
                ->lecturer()->create(['nip' => $data['nip']]);
        } elseif (array_key_exists('nrp', $data)) {
            tap($user)->update(['role' => User::STUDENT])
                ->student()->create(['nrp' => $data['nrp']]);
        } else {
            $user->delete();
            abort(401);
        }

        return $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm(string $type)
    {
        if (!in_array($type, ['lecturer', 'student'])) {
            abort(404);
        }

        return view('auth.register');
    }
}
