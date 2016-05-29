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
use App\Models\Slider;
use App\Models\SliderText;

class AdminSliderController extends Controller
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
    public function getIndex()
    {
        $rows = Slider::paginate(15);

        foreach($rows as $key => $row){

        if( $row->texts !== null){
            $texts = "";
            foreach($row->texts as $value){
                $texts .= " $value->text,";
            }
            $rows[$key]->texts = trim(substr($texts, 0, -1));

        }
    }


        return View::make('admin.slider.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdd()
    {
        $contend_id= Contend::lists('name', 'id');

        return View::make('admin.slider.add', compact('contend_id'));
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
        $rules = ['file_image' => 'required',
                  'contend_id' => 'required',
                 ];

        $validator = Validator::make($request, $rules);
         if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();

        }else{

             $image = $this->core->_uploadFile("default.jpg", 'file_image', date('YmdHis'), 'assets/uploads/slider/');
             $data = new Slider();
             $data->file_image = $image;
             $data->contend_id = Request::input('contend_id', 0);
             $data->save();

             $texts = Request::input('texts', null);
            if( !empty($texts) ){
                $array = explode(',', $texts);

                foreach($array as $value){
                   $insert = new SliderText();
                    $insert->text = $value;
                    $insert->slider_id = $data->id;
                    $insert->save();
                }

                //$data->texts->saveMany($array);
            }



             Session::flash('success', 'Elemento creado exitosamente');
             return Redirect::to('slider');
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id, $english = null) {


        $form = Slider::findOrFail($id);
        if( $form->texts !== null){
            $texts = "";
            foreach($form->texts as $value){
                $texts .= (empty($english))? " $value->text," : " $value->text_english,";
            }
            $form->texts = trim(substr($texts, 0, -1));

        }

        $contend_id= Contend::lists('name', 'id');



        return View::make('admin.slider.edit', compact('contend_id', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit($id, $english = null)
    {
        $request = Request::all();
        $rules = [
            //'file_image' => 'required',
            'contend_id' => 'required',
        ];

        $validator = Validator::make($request, $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();

        }else{


            $data = Slider::findOrFail($id);
            $image = $this->core->_uploadFile($data->file_image, 'file_image', date('YmdHis'), 'assets/uploads/slider/');



            $data->file_image = $image;
            $data->contend_id = Request::input('contend_id', 0);
            $data->save();


            $texts = Request::input('texts', null);
            if( empty($english) ) {
                SliderText::where('slider_id', '=', $data->id)->where('text_english', '=', '')->delete();
                if (!empty($texts)) {

                    $array = explode(',', $texts);
                    foreach ($array as $value) {
                        $insert = new SliderText();
                        $insert->text = $value;
                        $insert->slider_id = $data->id;
                        $insert->save();
                    }

                    //$data->texts->saveMany($array);
                }
            }else{
                $SliderText = SliderText::where('slider_id', '=', $data->id)->get();
                if (!empty($texts)) {
                    $array = explode(',', $texts);
                    foreach ($SliderText as $key => $value) {
                        $insert = SliderText::findOrFail($value->id);
                        $insert->text_english = isset($array[$key])? $array[$key] : "";
                        $insert->save();
                    }
                    
                }
            }


            Session::flash('success', 'Elemento creado exitosamente');
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
        $data = Slider::findOrFail($id);
        $delete = $data ->file_image;
        return View::make('admin.slider.delete', compact('delete'));
    }



    public function postDelete($id){

        $data = Slider::findOrFail($id);
        SliderText::where('slider_id', '=', $data->id)->delete();
        unlink ("assets/uploads/slider/{$data->file_image}");
        $data->delete();

        Session::flash('success', 'Registro eliminado exitosamente');
        return Redirect::to('slider');

    }


}
