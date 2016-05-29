<?php

namespace App\Http\Controllers;

use Auth;
use Config;
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
use Cookie;

use App\Models\TextEnglish;
use App\Models\Contend;

class CoreController extends Controller
{

    public $email = "fersaavedra85@gmail.com";
    public $paypal = "fersaavedra85-buyer-1@hotmail.com";

    public function __construct(){

        $this->_getViewsShare();
        $this->initGetLanguage();

    }


    public function _getPathFile($path, $file){
        $path = trim($path, '/');
        return URL::to("/") . "/{$path}/{$file}";
    }




    /**************
     ** SESSIONS -> VIEWS
     **************/

    /* _getViewsShare
     *
     * crea y maneja las seciones compartidas en las vistas
     * se maneja por arrays, para manipular multiples variables
     *
     * @method
     * public
     * __construct
     *
     *
     * @params
     * null
     *
     *
     * @return
     * void
     * session
     *
     * @nota
     * viewshare => array [ welcome => string,
                            welcome => string, ]
     *
     *
     *
     * @author
     * fersaavedra85@hotmail.com
     *
     */
    public function _getViewsShare(){


        $viewshare = $this->_getWelcomen() ;
        $viewshare = array_merge($viewshare, array('site_domine' => $this->_getSiteDomine()) );


      
        
        View::share('viewshare', $viewshare);
        View::share('submenu', false);

        
    }
    
    
    
    private function _getSiteDomine($url = null){
        
        return url() . "/";
    }

    /* _getWelcomen
     *
     * regresa el saludo al usuario una vez que se
     * a logueado en el administardor
     *
     * @method
     * public
     *
     *
     * @params
     * null
     *
     *
     * @return
     * array
     *
     *
     * @author
     * fersaavedra85@hotmail.com
     *
     */
    public function _getWelcomen(){
        $return = null;

        if ( Auth::check() ) {
            $user = Auth::user();
            if($user !== null){

                $return = $user->username;
            }
        }

        return array("welcome" => $return);
    }




    /***************
     * SELECT HTML
     ***************/

    /* _setEmptySelectHTML
     *
     * agrega un elemento vacio a un elemeto select  <select></select> ,
     * para validar que el campo, y que  lleve una
     * opcion valida elegida por el usuario
     *
     * @method
     * public
     *
     *
     * @params
     * $empty => array [ array en formato array( "" => --selecionar-- ) ]
     * $array => array [ array/lista de elemtos a concatenar ]
     *
     *
     * @return
     * array
     *
     *
     * @author
     * fersaavedra85@hotmail.com
     *
     */
    public function _setEmptySelectHTML($empty, $array){

        return  $empty +  $array;

    }






    /* _getSelectedSelectHTML
     *
     * indica en un elemeto select <select></select>
     * si un elemnto debe estar marcado por default selected
     * para indicar varias opciones las opciones se separan con comas
     *
     *
     * @method
     * public
     *
     *
     * @params
     * $array => array [ key  => (string) valor llave que se usa para marcar el array de busqueda)
     *                  value => (string) valores que se marcaran como selected, requiere separar con comas
     *                                    sin no hay valores indicar como null ]
     *
     * @parmas example
     * $array = array("region_id" => null, "color_id" => null);
     * $array = array("region_id" => "1,2")
     *
     *
     * @return
     * View::share
     * $selected[$key]
     *
     * @author
     * fersaavedra85@hotmail.com
     *
     */
    public function _getSelectedSelectHTML($array = null){


        foreach($array as $key => $value){
            if($value !== null){
                $array[$key] = explode(",", $value);
            }else{
                $array[$key] = array();
            }
        }

        View::share("selected",  $array);
    }







    /****************
     * EMAIL SMTP
     ****************/

    /* sendEmailSMTP
     *
     * Envia un email, utilizando una cuenta SMTP, configurada en .env
     * la funcion permite configurarse para realizar diferentes envios
     * de diferetes templates de blade, asi como el/los destinatarios
     * tambien permite personalizar la platilla que se manda llamar
     * con sus respectivos valores
     *
     * @method
     * public
     *
     * @params
     * $configEmail => array [ subject  => (string) subject del email ,
     *                         title    => (string) title del email,
     *                         from     => (string) remitente del mail,
     *                         to       => (array) destinatario/destinarios ,
     *                         blade    => (string) pantilla blade del mensage
     *                       ]
     * $messageEmail => array [ variables a pasar a la plantilla blade en formato array(key => value) ]
     *
     *
     * @config
     *
        $configEmail["subject"] = "Recuperar contraseña";
        $configEmail["title"] = "App Danone";
        $configEmail["from"]  = "no-replay@danone.com";
        $configEmail["to"]  = $user->email;
        $configEmail["blade"] = 'email.recoverPassword';

     *
     * @return
     * void
     *
     * @author
     * fersaavedra85@hotmail.com
     *
     */
    public function sendEmailSMTP($configEmail,  $dataEmail = null){
        //$configEmail = array('subject'=>null, "title"=>null,  "from"=>null, "to"=>null,  "blade"=>null);
        Mail::send("{$configEmail['blade']}", $dataEmail, function($send) use($configEmail){
            $send->subject( $configEmail['subject'] );
            $send->from( $configEmail['from'] , $configEmail['title'] );
            $send->to( "{$configEmail['to']}" );
            //$send->cc('fersaavedra85@hotmail.com');
            //$send->attach($pathToFile);
        });

        if( count(Mail::failures()) > 0 ) {
            dd( Mail:: failures() );
        }

    }











    /*****************
     * FILE IMAGE
     ****************/

    /* _getFileName
     *
     * genera un nombre de imagen unico bassado en una
     * marca de tiempo en formato date("YmdHis")
     * permite generar la image thumbnail asi como
     * asignar un sufijo al nombre
     *
     *
     * @method
     * public
     *
     * @params
     * $getFile => file [ archivo de imagen subido ]
     * $params => array [ thumbnail => boolean (insica si se crea un nombre de imagen con elsufijo 'thumb_')
     *                    suffixe => string (sufijo que opcional a agregar al nombre)
     *                    name => string (Nombre del archivo / default (date("YmdHis") )
     *                  ]
     *
     *
     * @return
     * string
     *
     *
     * @author
     * fersaavedra85@hotmail.com
     *
     *
     */
    public function _getFileName($getFile, $params = null){
        $params["thumbnail"] = isset($params["thumbnail"])? $params["thumbnail"] : null;
        $params["suffixe"] = isset($params["suffixe"])? $params["suffixe"] : null;
        $params["name"] = isset($params["name"])? $params["name"] : date("YmdHis");


        if(Input::hasFile("{$getFile}")) {
            $n      = $params["name"];
            $e      = Input::file("{$getFile}")->getClientOriginalExtension();

            $params["name"] = "{$n}.{$e}";

            if ($params["thumbnail"]) {
                $params["name"] = "{$n}_thumb.{$e}";
                if ($params["suffixe"]) {
                    list($n, $e) = explode(".", $params["name"]);
                    $params["name"] = "{$n}_{$params["suffixe"]}.{$e}";
                }
            }

            if ($params["suffixe"]) {
                $params["name"] = "{$n}_{$params["suffixe"]}.{$e}";
            }

        }

        return $params["name"];
    }


    /* _uploadFile
     *
     * permite subir un archivo al servidor, en una ruta selecionada
     * la fucnion permite subir cualquier tipo de archivo
     *
     *
     * @method
     * public
     *
     * @params
     * $default => string [nombre por default del archivo]
     * $getFile => file
     * $name => string [ nombre del archivo ]
     * $path => string [ path donde guardadaremos el arvhivo]
     *
     * @return
     * string
     *
     * @author
     * fersaavedra85@hotmail.com
     *
     */
    public function _uploadFile($default, $getFile = null, $name = null, $path = null){
        //$file->getClientOriginalName();
        //$file->getClientMimeType();
        //$file->getClientSize();
        //$file->getClientOriginalExtension();
        //$file->getMaxFilesize();
        //$file->getErrorMessage();


        if(Input::hasFile("{$getFile}")){


            $file 	   = Input::file("{$getFile}");
            $name = empty($name)? $file->getClientOriginalName() : "{$name}.{$file->getClientOriginalExtension()}";

            //indicamos que queremos guardar un nuevo archivo en el disco local
            Storage::disk('local')->put("{$path}{$name}",  File::get($file));
            if( $file->isValid() ){
                return $name;
            }


        }


        /*
        if( !empty(Input::get("{$getFile}")) ){
            $base64 = explode('base64,', Input::get("{$getFile}")); 
            if( file_put_contents(getcwd()."/{$path}{$name}.png", base64_decode($base64[1])) ){
                return $name;
            }
        }
        */


        return $default;
    }

 




    public function _getFileExtension($params = null){
        $params = isset($params["extension"])? $params["extension"] : "jpg";

        if(Input::hasFile("{$getFile}")){

            $file 	 = Input::file("{$getFile}");
            return  ".{$file->getClientOriginalExtension()}";
        }

        return ".{$params["extension"]}";
    }

    /*
    public function _getFileName($params = null){
        $params["name"] = isset($params["name"])? : date("YmdHis");
        $params["extension"] = isset($params["extension"])? $params["extension"] : $this->_getFileExtension();
        
        return $params["name"] . $params["extension"];
    
    }
    */

    /* _uploadFileResize
    *
    * Funcion que permite redimensionar y subir una nueva imagen
    * en base a una imagen original subida o en algun path
    *
    * @NOTA
    * PASO 1
    * http://stackoverflow.com/questions/23771117/requires-ext-fileinfo-how-do-i-add-that-into-my-composer-json-file
    *
    * PASO 2
    * https://styde.net/crear-un-thumbnail-con-laravel-5-y-bootstrap/
    *
    * @DOCUMENTACION
    * http://image.intervention.io/
    *
    *
    *
    */

    public function _uploadFileResize($default, $getFile = null, $name = null, $path = "", $size= null ){
        //use Image;
        // Image::make(Input::file("file_image"))->resize(50, 30)->save("resize.png");//path [ laravel/public ]
        if(Input::hasFile("{$getFile}")){

            $file 	 = Input::file("{$getFile}");
            $name = empty($name)? $file->getClientOriginalName() : "{$name}.{$file->getClientOriginalExtension()}";
            $size["width"] = isset($size["width"])? $size["width"] : $this->imgWidth;
            $size["height"] = isset($size["height"])? $size["height"] : $this->imgHeight;

            Image::make(Input::file("{$getFile}"))
                ->resize( $size["width"], $size["height"]  )
                ->save( "{$path}{$name}" );

            return $name;
        }


        return $default;
    }






    /* _deleteFile
     *
     * permite borrar un archivo del servidor en una ruta especifica
     *
     *
     * @method
     * public
     *
     * @params
     * $getFile = file
     * $name => string [nombre del archivo a borrar]
     * $path => string [path donde se encuentra el archivo]
     *
     * @return
     * void
     *
     * @author
     * fersaavedra85@hotmail.com
     *
     */
    public function _deleteFile($getFile = null, $name = null, $path = null){


        if (File::exists("{$path}{$name}")){

            File::delete("{$path}{$name}");

            return;
        }


        if(Input::hasFile("{$getFile}")){

            File::delete("{$path}{$name}");

            return;

        }



    }




    /* validateMaxSizeFile
     *
     * valida el tamaño maximo del archivo que se esta subiendo
     *
     * @method
     * public
     *
     * @params
     * $array => array [array de imagenes con el maximo peso en mb (file_image => 5)]
     * $edit => boolean [si el registro se esta editando]
     *
     *
     * @return
     * string/boolean
     *
     * @author
     * fersaavedra85@hotmail.com
     *
     *
     */

    public function validateMaxSizeFile($array, $edit = false){

        if( count($array) > 0 ){
            foreach($array as $key => $max){

                if(Input::hasFile("{$key}")){
                    $size = Input::file("{$key}")->getClientSize();
                    $max = ($max * 1024 * 1024);
                    if($size > $max){
                        return "La imagen no puede pesar mas de {$max} MB";
                    }
                }else{

                    if( $edit ){
                        continue;
                    }else{
                        return "La imagen no existe, favor de verficicar";
                    }
                }

            }

            return !true;
        }

        return "La imagen no existe, favor de verficicar";
        //return !false;

    }







    /* validateMimeTypeImage
     *
     * permite valdar el tip de extencion del archivo,
     * para que sea un formato de archivo valdo el que se esta subiendo
     *
     * @NOTA
     * esta funcion o esta completada y solo aplica para mime-type de imagen
     * se requiere comprender y utilizar las expesiones regulares al 100
     *
     * @method
     * public
     *
     * @params
     * $array => array [array con los archivos que se esta subiendo y stensiones permitidas (file_image => "gif|jpeg|pjpeg|png|x-png|jpg")]
     * $edit => boolean [indica si se esta realizando una edicion del archivo]
     *
     * @return
     * string/boolena
     *
     * @author
     * fersaavedra85@hotmail.com
     *
     *
     *
     */
    public function validateMimeTypeImage($array, $edit = false){


        if( count($array) > 0 ){
            foreach($array as $key => $value){

                if( Input::hasFile("{$key}") ){
                    $type = Input::file("{$key}")->getClientOriginalExtension();
                    //var_dump( preg_match("/(gif|jpeg|pjpeg|png|x-png|jpg)/i", "  png es el lenguaje x-png de secuencias de comandos web preferido.") ) ;
                    if( !preg_match('/(gif|jpeg|pjpeg|png|x-png|jpg)/i', $type, $matches) ) {
                        return "La imagen debe estar en formato jpg, gif o png";
                    }

                }else{

                    if( $edit ){
                        continue;
                    }else{
                        return "La imagen no existe, favor de verficicar";
                    }

                }

            }

            return !true;
        }

        return "La imagen no existe, favor de verficicar";


    }






    /****************
     * LOGUIN
     ****************/


    /* loginAuth
     *
     * realiza el proceso de login, para user o admin o webservices
     * retorna un json o http,
     *
     *
     * @method
     * public
     *
     * @params
     * $return => string [ json/null ]
     * $params => array [ remember (string) (reordar login)
     *                    messages (string) (texto de respuesta del login)
     *                    admin (string) (usuarios de tipo administrador)
     *                    redirect => (string) url a redirecionar, el usurio logueado
     *                  ]
     *
     * @return
     * json/http
     *
     * @author
     * ferssaavedra85@hotmail.com
     *
     */
    public function loginAuth($return = null,  $params = null){
        $params["remember"] = isset($params["remember"])? $params["remember"] : false;
        $params["messages"] = isset($params["messages"])? $params["messages"] : "Usuario/contraseña incorrectos" ;



        $login = array('username'   => Input::get('username'),
                       'password' => Input::get('password'));
      
        if(isset($params["admin"])){
            $login["admin"] = true;
        }

        try {

            if (  Auth::attempt($login, $params["remember"]) ) {

                if($return === "json"){
                    return Response::json(array("success"=>true,
                        "token"=>Auth::user()->remember_token ));
                }
                else if($return === "http"){
                    return Redirect::to("{$params["redirect"]}");
                }
                else{
                    return Redirect::to("{$params["redirect"]}");
                }

            }
        } catch( \Exception $e ) {
            $exception = $e->getMessage();
        }



        $params["messages"] = isset($exception)?  $exception :$params["messages"] ;
        if($return === "json"){
            return Response::json( array("success"     => false,
                "errors"       => $params["messages"],
                "messages"     => $params["messages"]));
        }else{
            return Redirect::back()
                ->withErrors($params["messages"])
                ->withInput();
        }



    }


    /* logoutAuth
     *
     * realiza el proceso de logut, para user, admin o webservices
     * retorna un json o http,
     *
     *
     * @method
     * public
     *
     * @params
     * $return => string [ json/null ]
     * $params => array [ redirect (url a redirigir del login)
     *                    message (mensage de sesion filaizada) ]
     *
     * @return
     * json/http
     *
     * @author
     * ferssaavedra85@hotmail.com
     *
     */
    public function logoutAuth($return = "redirect", $params = null ){
        $params["messages"] = isset($params["messages"])?  $params["messages"] : "Sesion finalizada" ;
        $params["redirect"] = isset($params["redirect"])? $params["redirect"] : "/";
        $params["success"] = isset( $params["success"] )?  $params["success"]: false;

        if ( Auth::check() ) {
            Auth::logout();
            $params["success"] = true;
        }else{
            $params["messages"] = "No hay una sesion activa";
        }


        if ($return === "json") {
            return Response::json(array("success"  =>  $params["success"],
                "errors"   => $params["messages"],
                "messages" => $params["messages"]));
        } else {
            Session::flash("messages", $params["messages"]);
            return Redirect::to("{$params["redirect"]}");
        }


        dd( "No hay una sesion activa");
    }




    /* loginAuthCheck
     *
     * valida si el usuario se encentra autenticado
     *
     * @method
     * public
     *
     * @params
     * $return => string [ json/null ]
     * $params => array [ redirect (url a redirigir del login)
     *                    messages (mensage de Usuario no está autenticado) ]
     *
     *
     * @return
     * null/json
     *
     * @author
     * fersaavedra85@hotmail.com
     *
     *
     *
     */
    public function loginAuthCheck($return = null, $params = null){
        $params["messages"] = isset($params["messages"])? $params["messages"] : "El usuario no está autenticado";
        $params["redirect"] = isset($params["redirect"])? $params["redirect"] : "/";

        if ( !Auth::check() ) {

            if($return  == "json"){

                return Response::json(array("success"=>false,
                    "messages"=> $params["messages"]  ));
            }
            else if($return  == "http"){
                Session::flash("messages", $params["messages"]);
                return Redirect::to("{$params["redirect"]}");
            }
            else {

                Session::flash("messages", $params["messages"]);
                return Redirect::to("{$params["redirect"]}");

            }

        }

        return null;

    }



    public function loginAuthToken($return = "default", $params = null){
        $params["messages"] = isset($params["messages"])? $params["messages"] : "El token no es valido";
        $params["redirect"] = isset($params["redirect"])? $params["redirect"] : "/";



        $token = trim( Input::get("token") );

        $User = User::where('remember_token', '=', $token)
            ->first();


        if( $User === null or empty($token) ) {

            if ($return == "json") {

                return Response::json(array("success" => false,
                    "messages" => $params["messages"]));
            } else if ($return == "http") {
                Session::flash("messages", $params["messages"]);
                return Redirect::to("{$params["redirect"]}");
            } else {

                Session::flash("messages", $params["messages"]);
                return Redirect::to("{$params["redirect"]}");

            }
        }

        return  $User;

    }






    public function getLanguaje($data){

        $cookie = Cookie::get('languaje');
        if( $cookie == "english") {
            if (isset($data->name_english)) {
                $data->name = $data->name_english;
            }

            if (isset($data->description_english)) {
                $data->description = $data->description_english;
            }

            if ( $data->texts !== null  ) {

                if( $data->texts->count() > 1 ){
                    foreach($data->texts as $key => $text){
                        $data->texts[$key]->text = $text->text_english;
                    }
                }else {
                    $data->texts[0]->text = $data->texts[0]->text_english;

                }
            }
            
           

        }

        return $data;
    }



    public function initGetLanguage(){

        $cookie = Cookie::get('languaje');

        $fields = ($cookie == "english")? array('var', 'text_english AS text') : array('var', 'text AS text');
        $TextEnglish = TextEnglish::get($fields);
        $array=array();
        foreach($TextEnglish as $value){
            $array[$value->var] = $value->text;
        }
      
        View::share('languaje', $array);

    }



}
