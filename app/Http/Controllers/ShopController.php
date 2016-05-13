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

use App\Models\Product;
use App\Models\Composition;


class ShopController extends Controller
{


        public function getCatalogo(){
            return View::make('shop.catalog');
        }

        public function  getProductos($id){

            $Product = Product::where('catalog_id', '=', $id)->get();

             foreach( $Product as $value  ){
                 $value->description = str_replace("PROactil", '<span class="textRosa bold">PROactil</span>', $value->description);
                 foreach($value->composition as $key => $composition){
                     $value->composition[$key]->offsetSet('pink', ($composition->chemical == "PROactil" )? "textRosa" : "" );
                 }
             }

            return View::make('shop.products', compact('Product'));
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



            if (count($_getCart) > 0) {

                foreach ($_getCart as $value) {

                    $product = Product::findOrFail($value['product_id']);
                    $product->offsetSet('quantity', $value['quantity']);
                    $product->offsetSet('subtotal', $this->_getSubTotal($product->price, $value['quantity']));

                    $products[] = $product;

                }

            }


            $_getCartTotal = $this->_getCartTotal($products);

            return View::make('shop.cart', compact('products',
                                                   '_getCartTotal'));
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

        Session::put('cart', array() );
        dd(Request::all());
        return View::make('shop.success');
    }

    public function anyError(){
        return View::make('shop.error');
    }

}