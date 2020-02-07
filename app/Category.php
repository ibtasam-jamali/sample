<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function getCategoryData($CategoryID=0){

        if($CategoryID==0){
          $value=DB::table('product_categories')->orderBy('CategoryID', 'asc')->get(); 
        }else{
          $value=DB::table('product_categories')->where('CategoryID', $CategoryID)->first();
        }
        return $value;
      }
}
