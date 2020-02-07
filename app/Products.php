<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Products extends Model {
  public static function getproductData($id=0){

    if($id==0){
      $value=DB::table('products')->orderBy('id', 'asc')->get(); 
    }else{
      $value=DB::table('products')->where('id', $id)->first();
    }
    return $value;
  }


  public static function insertData($data){
    $value=DB::table('products')->where('product_id', $data['product_id'])->get();
    if($value->count() == 0){
      DB::table('products')->insert($data);
      return 1;
     }else{
       return 0;
     }
 
  }

  public static function updateData($id,$data){
    DB::table('products')
      ->where('id', $id)
      ->update($data);
  }

  public static function deleteData($id){
    DB::table('products')->where('id', '=', $id)->delete();
  }
 
}