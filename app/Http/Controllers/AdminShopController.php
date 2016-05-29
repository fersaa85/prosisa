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

use App\Models\Product;
use App\Models\Composition;
use App\Models\Catalog;
use App\Models\Order;
use App\Models\OrderProduct;
class AdminShopController extends Controller
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
        $rows = Product::paginate(15);


        return View::make('admin.shop.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdd(){

        $Catalog = Catalog::join('contend', 'contend.id', '=', 'catalog.contend_id')
                            ->where('contend.category_id', '=', 3)
                            ->get(array('catalog.id', 'catalog.name'));

        $catalog_id = array();
        foreach( $Catalog as $value ){
            $catalog_id[$value->id] = $value->name;
        }

        return View::make('admin.shop.add', compact('catalog_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAdd(Request $request){

        $request = Request::all();
        $rules = ['name' => 'required',
                  'price' => 'required|numeric',
                  'catalog_id' => 'required',
            //'file_image' => 'required',
            //'file_pdf' => 'required',

                 ];
        $validator = Validator::make($request, $rules);


        if ($validator->fails()) {
            return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();

        }else{

            $image =$this->core->_uploadFile("default.jpg", 'file_image', null, 'assets/uploads/product/');
            $pdf =$this->core->_uploadFile("default.pdf", 'file_pdf', null, 'assets/uploads/product/');

            $Product = new Product();
            $Product->name = Request::input('name');
            $Product->description= Request::input('description');
            $Product->price = Request::input('price', 0);
            $Product->catalog_id = Request::input('catalog_id');
            $Product->file_image = $image;
            $Product->file_pdf = $pdf;
            $Product->save();

            Session::flash('success', 'Elemento creado exitosamente');
            return Redirect::to('admin/shop');
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
    public function getEdit($id, $english=null){
        
        $Product = Product::findOrFail($id);


        $Catalog = Catalog::join('contend', 'contend.id', '=', 'catalog.contend_id')
            ->where('contend.category_id', '=', 3)
            ->get(array('catalog.id', 'catalog.name'));

        $catalog_id = array();
        foreach( $Catalog as $value ){
            $catalog_id[$value->id] = $value->name;
        }

        if( !empty($english) ){
            $Product->description = $Product->description_english;
           // $Product->price = $Product->price_english;
        }

        return View::make('admin.shop.edit', compact('catalog_id',
                                                     'Product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function putEdit($id, $english=null) {
        $request = Request::all();
        $rules = ['name' => 'required',
            'price' => 'required|numeric',
            'catalog_id' => 'required',
            //'file_image' => 'required',
            //'file_pdf' => 'required',

        ];
        $validator = Validator::make($request, $rules);


        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();

        }else{



            $Product = Product::findOrFail($id);
            $image =$this->core->_uploadFile($Product->file_image, 'file_image', null, 'assets/uploads/product/');
            $pdf =$this->core->_uploadFile($Product->file_pdf, 'file_pdf', null, 'assets/uploads/product/');


            $Product->name = Request::input('name');

            if( !empty($english) ){
                $Product->description_english = Request::input('description');
               // $Product->price_english = Request::input('price', $Product->price);
            }else {
                $Product->description = Request::input('description');
                //$Product->price = Request::input('price', $Product->price);
            }
            $Product->catalog_id = Request::input('catalog_id');
            $Product->file_image = $image;
            $Product->file_pdf = $pdf;
            $Product->save();

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
    public function getDelete($id){

        $Product = Product::findOrFail($id);
        $delete = $Product->name;
        return View::make('admin.shop.delete', compact('delete'));
            
    }

    public function deleteDelete($id){

        $Product = Product::findOrFail($id);
        $Product->delete();
        Session::flash('success', 'Elemento eliminado exitosamente');
        return Redirect::to('admin/shop');
    }

    
    
    public function getComposition($id){

        $Product = Product::findOrFail($id);
        return View::make('admin.shop.composition', compact('Product'));
    }


    public function postComposition($id){

        $request = Request::all();
        $rules = ['chemical' => 'required',
                   'porcent' => 'required|numeric',
        ];

        $validator = Validator::make($request, $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();

        }else{

            $Composition = new Composition();
            $Composition->chemical = Request::input('chemical');
            $Composition->porcent = Request::input('porcent');
            $Composition->product_id  = $id;
            $Composition->save() ;

            Session::flash('success', 'Elemento agregado exitosamente');
            return Redirect::back();
        }

    }
    
    
    public function getDeleteComposition($id){

        $Composition = Composition::findOrFail($id);
        $delete = $Composition->chemical;
        return View::make('admin.shop.delete-composition', compact('delete'));
        
    }


    public function deleteDeleteComposition($id){
        $Composition= Composition::findOrFail($id);

        $Composition->delete();
        Session::flash('success', 'Elemento eliminado exitosamente');
        return Redirect::to("admin/shop/composition/{$Composition->product_id}");
    }



    public function getPurchases(){

        $rows = Order::orderBy('id', 'DESC')->paginate(15);

        foreach( $rows as $key => $row){
          $rows[$key]->id = str_pad($row->id, 9, "0", STR_PAD_LEFT);

            $rows[$key]->dressed = ($row->dressed == "yes")?  "Sí" : "No";

        }


        return View::make('admin.shop.purchases', compact('rows'));
    }

    
    public function getProducts($id){
        $id = trim($id, '0');
       
        $rows = OrderProduct::where('order_id', '=', $id)->get();
        return View::make('admin.shop.products', compact('rows'));
        
    }
    
    
    public function getDressed($id){
        $id = trim($id, '0');

        $data =  Order::findOrFail($id);
        $data ->dressed ="yes";
        $data ->save();

        Session::flash('success', 'La orden ha sido atendida y despachada');
        return Redirect::back();
    }

}

