<?php

namespace App\Http\Controllers;

use App\Helpers\BankStatusHelper;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        

        $d['orders']= BankStatusHelper::carianOrder($request);

        // $d['orders']=Order::paginate(10);

        // $namecustomer=BankStatusHelper::getCustomer();
        // $codedesign=BankStatusHelper::getDesign();
        // $codemeasure=BankStatusHelper::getMeasure();
        
        return view('order.index',$d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $d['id']=$id;
        $d['namecustomer']=BankStatusHelper::getCustomer();
        $d['codedesign']=BankStatusHelper::getDesign();
        $d['codemeasure']=BankStatusHelper::getMeasure();


        $d['title1']='Add Order';

        return view('order.create',$d);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($_POST);
        
        $total= $request->price*$request->quantity;
        $message=[
            'cust_id.required'=>'sila isi nama pelajar'
        ];

        $validate=$request->validate([
            'deadline' => 'required',
            'date' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'meas_id' => 'required',
            'status' => 'required',
        ],$message);

;      
        $validate['total']=$total;
        $statuscode=$request->statuscode;
       
        
            // dd($validate);

            $data=Order::create($validate);
           if($statuscode=='simpan') {
            return redirect()->route('order.index')
            ->with('success','Order Telah Berjaya Ditambah');
           } else {
            return redirect()->route('designadd', ['id'=>$data]);
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

        $d['data']=Order::find($id);

        return view('order.show',$d);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $d['data']=Order::find($id);
        $d['title1']='Edit Order';
      
         return view('order.edit',$d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($_POST);

        $total= $request->price*$request->quantity;
        $message=[
            'cust_id.required'=>'sila isi nama pelajar'
        ];

        $validate=$request->validate([
            'deadline' => 'required',
            'date' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            
            'status' => 'required',
        ],$message);

;      
        $validate['total']=$total;
        
        
            // dd($validate);

            $data=Order::find($id);
            $data->update($request->all());

          
            return redirect()->route('order.index')
            ->with('success','Order Telah Berjaya Diedit');
           
        
    }

    public function updatestatus(Request $request, $id)
    {
        // dd($_POST);

        $total= $request->price*$request->quantity;
        $message=[
            'cust_id.required'=>'sila isi nama pelajar'
        ];

        $validate=$request->validate([
            'deadline' => 'required',
            'date' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            
            'status' => 'required',
        ],$message);

;      
        $validate['total']=$total;
        
        
            // dd($validate);

            $data=Order::find($id);
            $data->update($request->all());

          
            return redirect()->route('dashboardtailor')
            ->with('success','Order Telah Berjaya Diedit');
           
        
    }

    public function status(Request $request, $id)
    {
        // dd($_POST);

        $d['data']=Order::find($id);
        $d['title1']='Edit Order';
      
         return view('order.status',$d);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // DB::delete('delete from customer where cust_id = ?',[$id]);

        Order::destroy($id);
        return redirect()->route('order.index')->with('danger', 'Data has been deleted!');
    }

    public function softdelete()
    {
        $data = Order::onlyTrashed()->paginate(5);

        return redirect()->route('order.index', compact('data'))->with('danger', 'Data has been deleted!');
    }
}
