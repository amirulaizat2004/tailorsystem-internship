<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Helpers\BankStatusHelper;

class CustomerController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd(request('search'));
        // $data=Customer::get();


        // $data = Customer::where([
        //     ['name', '!=', Null],
        //     [function ($query) use ($request) {
        //         if (($term =))
        //     }]
        // ])
        
        // $customer=Customer::all();

        $customer=Customer::where('name', 'like', "%$request->name%")->where('email', 'like', "%$request->email%")->latest();
        
        $d['data']=$customer->paginate(10);
        $d['title1']='List Customer';

        return view('customer.index',$d);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    $d['title1']='Customer Registration';


        return view('customer.create',$d);
    }

    public function add()
    {
        //



        return view('add');
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'no_phone' => 'required'
        ]);

        $data=Customer::create($request->all());
       
       
        return redirect()->route('designcreate',['id' =>$data])
            ->with('success', 'Customer adds successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Customer::find($id);
       
        
        return view('customer.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $d['data']=Customer::find($id);
        $d['title1']='Edit Customer';

         return view('customer.edit',$d);
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
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'no_phone' => 'required'
        ]);

        $data=Customer::find($id);
        $data->update($request->all());

        return redirect()->route('customer.index')->with('success','Post updated successfully');
    
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

        Customer::destroy($id);
        return redirect()->route('customer.index')->with('danger', 'Data has been deleted!');
    }

    public function softdelete()
    {
        $data = Customer::onlyTrashed()->paginate(5);

        return redirect()->route('customer.index', compact('data'))->with('danger', 'Data has been deleted!');
    }
}
