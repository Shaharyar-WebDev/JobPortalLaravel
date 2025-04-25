<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

require_once app_path('Helpers\Flash.php');

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {

        $credentials = $this->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role == 'user') {
                flash('response', [
                    'status' => 'success',
                    'message' => 'Logged In Successfully!'
                ]);
            } else if (Auth::user()->role == 'employer') {

                flash('response', [
                    'status' => 'success',
                    'message' => 'Employer Login Successfull'
                ]);
            }


            if (session()->has('redirect_to')) {
                $this->redirect(session()->pull('redirect_to'), navigate: true);
            } else {
                $this->redirectIntended(route('home'), navigate: true);
            }
        } else {

            flash('response', [
                'status' => 'error',
                'message' => 'Incorrect Credentials'
            ]);
        }
        // }

    }

    public function render()
    {
        return view('livewire.login');
    }
}
