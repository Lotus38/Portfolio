<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class loginController extends Controller{

    public function home(Request $request){
        return view('login');
    }

    public function signup(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required|string|unique:customers|max:255',
        'password' => 'required|min:4',
    ]);

    $existingUser = Customer::firstWhere('first_name', $validatedData['first_name']);
    
    if ($existingUser) {
        return redirect()->route('login.home')->with('signup_error', 'Deze naam is al in gebruik.');
    }
    
    if ($validatedData['password'] !== $request->input('password_confirmation')) {
        session()->flash('pass.error', 'Aanmelding mislukt. Mogelijk is het wachtwoord ongeldig. Zorg ervoor dat deze minimaal 4 tekens bevat.');
        return redirect()->route('login.home');
    }

    $newCustomer = Customer::create([
        'first_name' => $validatedData['first_name'],
        'password' => Hash::make($validatedData['password']),
    ]);

    $customerRole = Role::where('name', 'customer')->first();
    $newCustomer->assignRole($customerRole);

    return redirect()->route('login.home')->with('success', 'Aanmelding succesvol voltooid!');
}

    public function login(Request $request){
            
        $credentials = $request->only('first_name', 'password');

        if (! Auth::attempt($credentials)) {
                return redirect('/')->with(['naam', 'ongeldige combinatie']);
            }else {           

                if (auth()->check()) {
                        $user = auth()->user();
                }
                if ($user->hasRole('admin')) {
                    return redirect()->route('ad.page');
                } 
                if ($user->hasRole('customer')) {
                    return redirect()->route('log.in');
                }
                else{
                    return redirect()->route('login.home')->with('login.fail', 'failed to login; check your credentials');
                }
            }
    }  

    public function logout(){

        Auth::logout();

        return redirect('/')->with('logout', 'Log-out Succesful');
    }
}