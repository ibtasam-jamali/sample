<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller{
 
  public function index($id=0){
 
    // Fetch all records
    $productData['data'] = Products::getproductData();
 
    $productData['edit'] = $id;

    // Fetch edit record
    if($id>0){
      $productData['editData'] = Products::getproductData($id);
    }

    // Pass to view
    return view('index')->with("productData",$productData);
  }

  public function save(Request $request){
 
    if ($request->input('submit') != null ){

      // Update record
      if($request->input('editid') !=null ){
        $name = $request->input('name');
        $product_desc = $request->input('product_desc');
        $editid = $request->input('editid');

        if($name !='' && $product_desc != ''){
           $data = array('name'=>$name,"product_desc"=>$product_desc);
 
           // Update
           Products::updateData($editid, $data);

           Session::flash('message','Update successfully.');
 
        }
 
      }else{ // Insert record
         $name = $request->input('name');
         $product_id = $request->input('product_id');
         $product_desc = $request->input('product_desc');

         if($name !='' && $product_id !='' && $product_desc != ''){
            $data = array('name'=>$name,"product_id"=>$product_id,"product_desc"=>$product_desc);
 
            // Insert
            $value = Products::insertData($data);
            if($value){
              Session::flash('message','Insert successfully.');
            }else{
              Session::flash('message','Product ID already exists.');
            }
 
         }
      }
 
    }
    return redirect()->action('ProductsController@index',['id'=>0]);
  }

  public function deleteProduct($id=0){

    if($id != 0){
      // Delete
      Products::deleteData($id);

      Session::flash('message','Delete successfully.');
      
    }
    return redirect()->action('ProductsController@index',['id'=>0]);
  }
}