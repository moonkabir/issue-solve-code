<?php

// get all data from database using model
$brands = App\Models\Lookup::all();

// get data from database using model with id
Product::find($products_id);

// static function get from model 
public static function moonkabir(){
    return "moon kabir";
}
$moonkabir = App\Models\Lookup::moonkabir();
echo $moonkabir;

// function get from model 
public function moon(){
    return "moon";
}
$moon =  new App\Models\Lookup;
echo $moon->moon();

// Multiple condition pass in where condition in model object
App\Models\Lookup::where(['name'=> 'unit','value'=>$product->unit])->value('title')