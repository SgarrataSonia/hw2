<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\Prefer;

class RecipeController extends BaseController
{
    public function ricettario()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        return view('ricettario');
    }

    public function ricette_preferite() 
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $ricette = Prefer::where("user_id", Session::get('user_id'))->get();

        return $ricette;
    }

    public function rimuovi_ricetta()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $ricetta = Prefer::find(request('id'));

        if($ricetta->delete())
        {
            $response = array('esito' => true);
        }
        else
        {
            $response = array('esito' => false);
        }

        return $response;
    }

    public function ricerca_canzone()
    {
        header('Content-Type: application/json');

        $client_id = 'c984d3431dbe4de7bedf0ff575040009';
        $client_secret = 'fea7e90e8e914027a03db1a8445cd2d8';
      
        /***** AUTENTICAZIONE *****/
      
        //inizializzazione della sessione curl
        $session_login = curl_init(); 
        //settaggio parametri
        curl_setopt($session_login, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
        curl_setopt($session_login, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($session_login, CURLOPT_POST, 1);
        curl_setopt($session_login, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($session_login, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret)));
        //avvio della sessione
        $result = curl_exec($session_login);
        //conversione da json a variabile php
        $token = json_decode($result, true);
        //chiusura sessione
        curl_close($session_login);
      
        /***** RICERCA BRANO *****/
          
        $canzone = urlencode(request('titolo')); //stringa utilizzabile nella parte query di un URL
          
        $url_search = 'https://api.spotify.com/v1/search?type=track&q='.$canzone;
          
        $session_search = curl_init();
        curl_setopt($session_search, CURLOPT_URL, $url_search);
        curl_setopt($session_search, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($session_search, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token']));
        $risultato = curl_exec($session_search);
        curl_close($session_search);
      
        return $risultato; //sto passando un JSON
    }
}

?>