<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;    //PER OGNI TABELLA CHE SFRUTTO

class RegisterController extends BaseController
{
    public function signup_form()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }

        return view('signup');
    }

    public function do_signup() 
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }

        $user = new User;
        $user->nome = request('nome');
        $user->cognome = request('cognome');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = password_hash(request('password'), PASSWORD_BCRYPT);
        $user->save();

        Session::put('user_id', $user->id);

        return redirect('home');
    }

    public function controllo_username()
    {

        $control = User::where("username", request('username'))->exists();

        if($control)
        {
            $response = array('esito' => true);
        } 
        else 
        {
            $response = array('esito' => false);
        }

        return $response;
    }

    public function controllo_email()
    {
       
        $control = User::where("email", request('email'))->exists();

        if($control)
        {
            $response = array('esito' => true);
        }
        else 
        {
            $response = array('esito' => false);
        }

        return $response;    
    }

    public function login_form()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }

        $error = Session::get('error');
        Session::forget('error');
        return view('login')->with('error', $error);
    }

    public function do_login()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }

        //CONTROLLO CREDENZIALI
        if(strlen(request("username")) == 0 || strlen(request("password")) == 0)
        {
            Session::put('error', 'empty_fields');
            return redirect('login')->withInput();
        }
        $user = User::where('username', request('username'))->first();
        if(!$user || !password_verify(request('password'), $user->password))
        {
            Session::put('error', 'wrong_credentials');
            return redirect('login')->withInput();
        }

        Session::put('user_id', $user->id);

        return redirect('home');
    }
}

?>
