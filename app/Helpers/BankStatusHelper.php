<?php

namespace App\Helpers;

use App\Models\Order;
use App\Models\Design;
use App\Models\Measure;
use App\Models\Customer;
use App\Models\Assetlookup;

class BankStatusHelper {

    public static function getCustomer(){   //static untuk panggil guna doubledot (::)
        $data=Customer::whereDate('created_at', today())->get(); 

        $plucked=$data->pluck('name','cust_id');  //pluck lebih kurang mcam foreach
        return $plucked;
    }

    public static function getDesign(){   //static untuk panggil guna doubledot (::)
        $data=Design::whereDate('created_at', today())->get(); 

        $plucked=$data->pluck('code','design_id');  //pluck lebih kurang mcam foreach
        return $plucked;
    }

    public static function getMeasure(){   //static untuk panggil guna doubledot (::)
        $data=Measure::whereDate('created_at', today())->get(); 

        $plucked=$data->pluck('meas_code','measure_id');  //pluck lebih kurang mcam foreach
        return $plucked;
    }

    public static function countFrom($data) {
        $currentPage=null;
        $perPage=null;
     
                    $currentPage=$data->currentPage();
                    $perPage=$data->perPage();
                    if($currentPage !=1){
                        $currentPage=$currentPage-1;
                        $startcount=$currentPage*$perPage;
                    }else{
                        $startcount=0;
                    }

                    return $startcount; 
    }

    // public static function codeDesign($model, $length, $prefix) {
    //     $code=$model::count();
    //     if(!$code) {
    //         $no = $length;
    //         $number = $prefix . $no;
           
    //     } else {
    //         $take = $model::all()->last();
    //         $no = (int)substr($take->code, -6) + 1;
    //         $number = $prefix . $no;
    //     }
    //     return $number;

    // }

    public static function baju(){

        $data=Assetlookup::where(['group'=>'baju'])->get();

        $plucked = $data->pluck('description', 'id');

       return $plucked ;

    } 

    public static function material(){

        $data=Assetlookup::where(['group'=>'jeniskain'])->get();

        $plucked = $data->pluck('description', 'id');

       return $plucked ;

    } 

    public static function pilihan(){

        $data=Assetlookup::where(['group'=>'sendiri'])->get();

        $plucked = $data->pluck('description', 'id');

       return $plucked ;

    } 

    public static function carianDesign($request){



        $data=Design::whereNotNull('id');



    if($request->choice??''){
     
        $data->where(['choice'=>$request->choice]);

    }

    if($request->id_material??''){
     
        $data->where(['id_material'=>$request->id_material]);

    }

    

    $data->latest();
    $datareturn= $data->paginate(10);


   return $datareturn;

}

     public static function carianOrder($request){



        $data=Order::whereNotNull('order_id');



    if($request->date??''){
     
        $data->where(['date'=>$request->date]);

    }

    if($request->deadline??''){
     
        $data->where(['deadline'=>$request->deadline]);

    }

    

    $data->latest();
    $datareturn= $data->paginate(10);


   return $datareturn;

}

}


?>