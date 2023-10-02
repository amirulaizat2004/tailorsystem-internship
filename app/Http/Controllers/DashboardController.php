<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    //

    public function index() {

        
        $d['model']=new Customer();
        $d['models']=new Order();

        $fdate = \Carbon\Carbon::now()->format('Y.m.d');
        $d['data']=Order::where('deadline' , '>=', $fdate)->orderBy('deadline')->paginate(5);
       

        return view('dashboardtailor',$d);
    }

    public function fullcalendar() {

        
       
        
        $model=new Order();
        $d['data']= $model->get();
 
        // $data = $query->getResult();
 
    //    foreach ($data as $key => $value) {
    //         $d['data'][$key]['title'] = $value->measurement->designs;
    //         $d['data'][$key]['start'] = $value->deadline;
    //         // $d['data'][$key]['end'] = $value->end;
           
    //     }   
       

        return view('calendar',$d);
    }
}
