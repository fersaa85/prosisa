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


use  App\Http\Controllers\CoreController;

use App\Models\Contend;
use App\Models\Category;

class AdminContendController extends Controller
{

    private $core;

    public function __construct(){

        $this->core =  new CoreController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(){

        $rows = Contend::paginate(15);


        return View::make('admin.contend.index', compact('rows'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdd()
    {
        $category_id = Category::lists('name', 'id');
        return View::make('admin.contend.add', compact('category_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $request)
    {
        $request = Request::all();
        $rules = ['name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'file_image' => 'required',
        ];

        $validator = Validator::make($request, $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();

        }else {


            $image = $this->core->_uploadFile("default.jpg", 'file_image', date('YmdHis'), 'assets/uploads/contend/');
            $data = new Contend();
            $data->name = Request::input('name', "");
            $data->description = Request::input('description', "");
            $data->file_image = $image;
            $data->category_id = Request::input('category_id', "");
            $data->save();

                    /*
            if( $data->category_id ){

            }

            if( $data->category_id ){

            }
                    */



            Session::flash('success', 'Elemento creado exitosamente');
            return Redirect::to('contend');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id, $english=null) {

        $form = Contend::findOrFail($id);
        $category_id = Category::lists('name', 'id');

        if( !empty($english) ){
            $form->name = $form->name_english;
            $form->description = $form->description_english;
        }

        return View::make('admin.contend.edit', compact('category_id', 'form'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit($id, $english=null)
    {
        $request = Request::all();
        $rules = ['name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            //'file_image' => 'required',
        ];

        $validator = Validator::make($request, $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();

        }else {

            $data = Contend::findOrFail($id);
            $image = $this->core->_uploadFile($data->file_image, 'file_image', date('YmdHis'), 'assets/uploads/contend/');

            if( !empty($english) ){
                $data->name_english = Request::input('name', "");
                $data->description_english = Request::input('description', "");
            }else{
                $data->name = Request::input('name', "");
                $data->description = Request::input('description', "");
            }

            $data->file_image = $image;
            $data->category_id = Request::input('category_id', "");
            $data->save();

            /*
    if( $data->category_id ){

    }

    if( $data->category_id ){

    }
            */



            Session::flash('success', 'Elemento actualizado exitosamente');
            return Redirect::back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        $data = Contend::findOrFail($id);
        $delete = $data ->name;
        return View::make('admin.contend.delete', compact('delete'));
    }


    public function postDelete($id){

        $data = Contend::findOrFail($id);


        if(  $data->category_id  ){
            //BORRADO RECURSIVO DE LOS PRODUCTOS DE LA TIENDA

        }
        unlink ("assets/uploads/contend/{$data->file_image}");
        $data->delete();

        Session::flash('success', 'Registro eliminado exitosamente');
        return Redirect::to('contend');

    }


}

