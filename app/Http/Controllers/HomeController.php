<?php

namespace App\Http\Controllers;

use Auth;
use Config;
use Cookie;
use DB;
use File;
use Hash;
use Input;
use Mail;
use Redirect;
use Request;
use Response;
use Session;
use Storage;
use URL;
use Validator;
use View;

use  App\Http\Controllers\CoreController;

use App\User;
use App\Models\Slider;
use App\Models\Contend;

class HomeController extends Controller
{
    
    private $core;

    public function __construct(){

        $this->core =  new CoreController();
    }
    
    public function getIndex() {

        $data = Slider::orderBy('id', 'ASC')->get();

        foreach($data as $key => $value){
            
            $data[$key] = $this->core->getLanguaje($value);
            $data[$key]->offsetSet('slider_type', ( $value->texts->count() > 1 )? "multiple" : "singler" );

        }

        return View::make('home.index', compact('data'));
    }



    public function getDivisionAgricola(){
        View::share('submenu', true);


        $data = Contend::findOrFail(1);
        $data = $this->core->getLanguaje($data);
        $data->offsetSet('catalog', ( $data->catalog->count() > 1 )? "tienda/catalogo/{$data->catalog[0]->contend_id}" : "tienda/productos/{$data->catalog[0]->id}" );

        View::share('section', $data->name);
        View::share('submenu', $this->getSubMenu());
        


        return View::make('home.contend', compact('data'));
    }

    public function getDivisionIndustrial(){

        $data = Contend::findOrFail(2);
        $data->offsetSet('catalog', ( $data->catalog->count() > 1 )? "tienda/catalogo/{$data->catalog[0]->contend_id}" : "tienda/productos/{$data->catalog[0]->id}" );

        View::share('section', $data->name);
        View::share('submenu', $this->getSubMenu());

        return View::make('home.contend', compact('data'));
    }


    public function getDivisionTratamiento(){

        $data = Contend::findOrFail(3);
        $data->offsetSet('catalog', ( $data->catalog->count() > 1 )? "tienda/catalogo/{$data->catalog[0]->contend_id}" : "tienda/productos/{$data->catalog[0]->id}" );

        View::share('section', $data->name);
        View::share('submenu', $this->getSubMenu());

        return View::make('home.contend', compact('data'));
    }

    public function getQuienesSomos(){

        $data = Contend::findOrFail(5);

        return View::make('home.contend', compact('data'));
    }


    public function getContacto(){


        return View::make('home.contact');
    }
    
    public function postContacto(){
        $data = Request::all();

        $rules =  [ 'email' => 'required',
                    'message' => 'required',
                     ];
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return  Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }else {

            $configEmail["subject"] = "Contacto";
            $configEmail["title"] = "Contacto";
            $configEmail["from"] = "no-replay@prosisa.com";
            $configEmail["to"] = $this->core->email;
            $configEmail["blade"] = 'email.contact';

            $dataEmail["email"] = $data["email"];
            $dataEmail["msg"] = $data["message"];
                $this->core->sendEmailSMTP($configEmail, $dataEmail);

            Session::flash('success', "El mensaje ha sido enviado");
            return Redirect::back();
        }
    }

    
    public function getLogin(){
        /*
        $User  = new User();
        $User->username = "prosisa";
        $User->email = "prosisa";
        $User->password =Hash::make('123456');
        $User->save();
        */

        return View::make('admin.login.index');
    }
    
    
    public function postLogin(){

        $params["redirect"] = URL::to('admin/contend');
        return  $this->core->loginAuth('http',$params );
        
    }

    public function getLogout(){

        $params["redirect"] = URL::to('/');
        return $this->core->logoutAuth('http',$params );
    }
    
    
    public function getIdioma($languaje){

        $cookie = Cookie::make('languaje', $languaje, (60*24*365));

        Session::flash('success', "Idioma cambiando");
        return Redirect::back()->withCookie($cookie);
    }




    /********
     * 
     *********/
    private function getSubMenu(){

        $data = Contend::where('category_id', '=', '3')->get();
        $cookie = Cookie::get('languaje');
        if( $cookie == "english") {
            foreach ($data as $key =>$value){
                $data[$key]->name  = $value->name_english;
            }
        }
        return $data;
    }
}
