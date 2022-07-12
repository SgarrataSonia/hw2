<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;    //PER OGNI TABELLA CHE SFRUTTO
use App\Models\Content;
use App\Models\Prefer;

class HomeController extends BaseController
{
    public function home()
    {
        //Controllo accesso  
        if(!Session::get('user_id')) 
        { 
            return view('login');
        } 

        $user = User::find(Session::get("user_id"));
        return view('home')->with('username', $user->username);
    }
    
    public function logout() 
    {
        Session::flush();
        return redirect('login');
    }

    public function carica_contenuti()
    {
        //Controllo accesso  
        if(!Session::get('user_id')) 
        { 
            return view('login');
        }

        //Paaso tutte le ricette
        $ricette = Content::all();
        return $ricette; //conversione automatica in JSON
    }

    public function add_ricettario()
    {
        //Controllo accesso  
        if(!Session::get('user_id')) 
        { 
            return view('login');
        } 

        //Aggiunta della ricetta al DB
        $prefer = new Prefer;
        $prefer->user_id = Session::get('user_id');
        $prefer->immagine = request('immagine');
        $prefer->titolo = request('titolo');
        $prefer->descrizione = request('descrizione');
        
        if($prefer->save())
        {
            $response = array('esito' => true);
        }
        else
        {
            $response = array('esito' => false);
        }

        return $response;
    }

}

?>