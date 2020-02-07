<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index($CategoryID=0){
 
        // Fetch all records
        $CategoryData['data'] = Category::getCategoryData();
     
        // Pass to view
        return view('index')->with("CategoryData",$CategoryData);
      }
}
