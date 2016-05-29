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
use App\Models\Contend;
use App\Models\Catalog;
use App\Models\OrderProduct;



class ShopController extends Controller
{

        private $core;

        public function __construct(){

            $this->core =  new CoreController();
        }


      public function getIndex(){
            $data =  Contend::where('category_id', '=', '3')->get();
            foreach($data as  $key => $value){
                $data[$key]->file_image = "menu_{$value->file_image}";
                $data[$key]->offsetSet('catalog', ( $value->catalog->count() > 1 )? "tienda/catalogo/{$value->catalog[0]->contend_id}" : "tienda/productos/{$value->catalog[0]->id}" );
                $data[$key] = $this->core->getLanguaje($value);
            }

            return View::make('shop.index', compact('data'));
        }


        public function getCatalogo(){
            return View::make('shop.catalog');
        }

        public function  getProductos($id){

            $Product = Product::where('catalog_id', '=', $id)->get();
            $Catalog = Catalog::findOrFail($id);
            $count = $Product->count() - 1;
             foreach( $Product as $k => $value  ){
                 $Product[$k] = $this->core->getLanguaje($value);
                 $value->description = str_replace("PROactil", '<span class="textRosa bold">PROactil</span>', $value->description);
                 foreach($value->composition as $key => $composition){
                     $value->composition[$key]->offsetSet('pink', ($composition->chemical == "PROactil" )? "textRosa" : "" );
                 }
                 $value->offsetSet('last', ($count == $k)? "bg-footer-catalog" : "" );



             }

            if( $id == 3 or $id == 4){
                return View::make('shop.products-grey', compact('Product', 'id', 'Catalog'));
            }
            return View::make('shop.products', compact('Product', 'id', 'Catalog'));
        }



        public function postProduct(){

            $this->_postProduct();
            Session::flash('success', "Producto agregado al carrito");
            return Redirect::back();
        }


        private function _postProduct(){

            $quantity  = Request::input('quantity', 1);
            $product_id  = Request::input('product_id', 1);


            $_getCart  =  $this->_getCart();



            if( empty($_getCart [$product_id])) {
                $_getCart [$product_id] =  array( 'quantity'=>$quantity,
                    'product_id'=>$product_id);
            }else{
                $_getCart [$product_id]["quantity"] = $quantity;
            }


            Session::put('cart', $_getCart );
            return  Redirect::to('tienda/productos/1');
        }





        public function getCarrito()
        {
            $_getCart = $this->_getCart();

            $products = array();


            $allproducts = "";
            if (count($_getCart) > 0) {

                foreach ($_getCart as $value) {

                    $product = Product::findOrFail($value['product_id']);
                    $product->offsetSet('quantity', $value['quantity']);
                    $product->offsetSet('subtotal', $this->_getSubTotal($product->price, $value['quantity']));

                    $products[] = $product;

                    $product->file_image = $this->getImageProduct($product->file_image, $product->catalog_id);

                    $allproducts .= " $product->name,";
                }
                $allproducts = substr($allproducts, 0, -1);
            }

            $paypal = $this->core->paypal;

            $_getCartTotal = $this->_getCartTotal($products);

            return View::make('shop.cart', compact('products',
                                                   '_getCartTotal',
                                                    'paypal',
                                                    'allproducts'));
        }


        private function _getCart(){
            (Session::has('cart') !== null)?  Session::put('cart', Session::get('cart') ) :  Session::put('cart', array());
            return Session::get('cart');
        }

        private function _getCartTotal($products){

            $subtotal = 0;
            foreach($products as $value) {
                $subtotal += $value->subtotal;
            }

            $_getTax =  $this->_getTax($subtotal);
            $total = $this->_getTotal($subtotal, $_getTax);

            return array("subtotal" => $subtotal,
                         "tax"  => $_getTax,
                         "total" => $total);
        }

        private function _getTax($price, $tax = 0){
            return  number_format( $price*$tax, 2);
        }

        private function _getSubTotal($price, $quantity= 1){
            return number_format( $price*$quantity, 2);
        }

        private function _getTotal($subtotal, $tax){
            return number_format( $subtotal  + $tax, 2);
        }






    public function deleteProduct(){

       $this->_deleteProduct();
       return Redirect::back();
    }

    private function _deleteProduct(){

        $product_id  = Request::input('product_id', 1);
        $_getCart  =  $this->_getCart();

        if( isset($_getCart[$product_id]) ){
            unset($_getCart[$product_id]);
        }

        Session::put('cart', $_getCart );
    }



    public function putProduct(){

        $this->_putProdcut();
        return Redirect::back();
    }

    private function _putProdcut(){

        $product_id  = Request::input('product_id', 1);
        $_getCart  =  $this->_getCart();


        if( isset($_getCart[$product_id]) ){
            $_getCart[$product_id] = array( 'quantity'=>Request::input('quantity', 1),
                                            'product_id'=>$product_id);
        }


        Session::put('cart', $_getCart );
    }


    public function anySuccess(){

        $_getCart  =  $this->_getCart();


        $insert = DB::table("orders")->insertGetId(Request::all());
        foreach($_getCart as $value ){
            $OrderProdcut = new OrderProduct();
            $OrderProdcut->order_id = $insert;
            $OrderProdcut->product_id   =  $value["product_id"];
            $OrderProdcut->quantity   =  $value["quantity"];
            $OrderProdcut->save();
        }
        Session::put('cart', array() );


        $configEmail["subject"] = "Compra recibida";
        $configEmail["title"] = "Compra recibida";
        $configEmail["from"] = "no-replay@prosisa.com";
        $configEmail["to"] = $this->core->email;
        $configEmail["blade"] = 'email.orders';

        $order_id = str_pad($insert, 9, "0", STR_PAD_LEFT);
        $dataEmail["order_id"] = $order_id;
        $this->core->sendEmailSMTP($configEmail, $dataEmail);


        return View::make('shop.success', compact('order_id'));
    }

    public function anyError(){
        return View::make('shop.error');
    }










    /************
     * PRIVATE
     ************/

    private function  getImageProduct($file,$catalog_id){
        $path= "assets/images/productos_carrito/{$file}";
        if( file_exists($path) and !empty($file) ){
            return  $file;
        }
        return "icono{$catalog_id}.png";
    }
}