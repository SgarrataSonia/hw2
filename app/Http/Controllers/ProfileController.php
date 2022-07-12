<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;

//per la validazione email ho scaricato egulias/EmailValidator package (https://github.com/egulias/EmailValidator/blob/3.x/README.md)
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

class ProfileController extends BaseController
{
    public function credentials()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $user = User::find(Session::get("user_id"));

        return view('profile')->with(['nome' => $user->nome, 'cognome' => $user->cognome, 'username' => $user->username, 
                                        'email' => $user->email]);
    }
   
    public function modifica()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $user = User::find(Session::get('user_id'))->first();

        //echo($user."<br>");

        if(strlen(request('new_nome')) != 0) 
        {
            $new_nome = request('new_nome');

            //echo($new_nome."<br>");

            $modifica = $user->update(['nome' => $new_nome]);

            if($modifica)
            {
                $result = array("esito" => 'mod_true');
            }
            else
            {
                $result = array("esito" => 'mod_false');
            }

            return $result;
        }

        if(strlen(request('new_cognome')) != 0) 
        {
            $new_cognome = request('new_cognome');

            //echo($new_cognome."<br>");

            $modifica = $user->update(['cognome' => $new_cognome]);

            if($modifica)
            {
                $result = array("esito" => 'mod_true');
            }
            else
            {
                $result = array("esito" => 'mod_false');
            }

            return $result;
        }

        if(strlen(request('new_username')) != 0) 
        {
            $new_username = request('new_username');

            //echo($new_username."<br>");

            if(strlen($new_username) > 16)
            {
                $result = array("esito" => "error", "valore" => "Username max 16 caratteri");
            }
            else
            {
                $modifica = $user->update(['username' => $new_username]);

                if($modifica)
                {
                    $result = array("esito" => "mod_true");
                }
                else
                {
                    $result = array("esito" => "mod_false");
                }
            }

            return $result;
        }

        if(strlen(request('new_email')) != 0) 
        {
            $new_email = request('new_email');

            //echo($new_email."<br>");

            $validator = new EmailValidator();
            
            if($validator->isValid($new_email, new RFCValidation()))
            {
                $modifica = $user->update(['email' => $new_email]);

                if($modifica)
                {
                    $result = array("esito" => "mod_true");
                }
                else
                {
                    $result = array("esito" => "mod_false");
                }
            }
            else
            {
                $result = array("esito" => "error", "valore" => "Email non valida");
            }

            return $result;
        }

        if(strlen(request('new_psw')) != 0) 
        {
            $new_psw = request('new_psw');

            //echo($new_psw."<br>");

            if(strlen($new_psw) < 8)
            {
                $result = array("esito" => "error", "valore" => "Password min 8 caratteri");
            }
            else
            {
                $new_psw_crypted = password_hash($new_psw, PASSWORD_BCRYPT);

                $modifica = $user->update(['password' => $new_psw_crypted]);

                if($modifica)
                {
                    $result = array("esito" => "mod_true");
                }
                else
                {   
                    $result = array("esito" => "mod_false");
                }
            }
            
            return $result;
        }
        
    }
}

?>