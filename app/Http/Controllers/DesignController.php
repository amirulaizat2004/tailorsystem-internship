<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Design;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Helpers\BankStatusHelper;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $d['data']= BankStatusHelper::carianDesign($request);
        $d['model']=new Design;
        // $d['data']=Design::where(['choice'=>$request->choice])->paginate(10);

        $d['baju']= BankStatusHelper::baju();
        $d['material']= BankStatusHelper::material();
        $d['pilihan']= BankStatusHelper::pilihan();
        

        return view('design.index',$d);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        // $codes=BankStatusHelper::codeDesign(new Design, 5, 'DES');   
        
        $d['id']=$id;

        $d['model']=new Design();
        $d['baju']= BankStatusHelper::baju();
        $d['material']= BankStatusHelper::material();
        $d['pilihan']= BankStatusHelper::pilihan();

        // dd($number);
        return view('design.create', $d);
    }

    public function add($id)
    {
        //
        // $codes=BankStatusHelper::codeDesign(new Design, 5, 'DES');   
        
        $d['models']=Order::find($id);

        $d['model']=new Design();
        $d['baju']= BankStatusHelper::baju();
        $d['material']= BankStatusHelper::material();
        $d['pilihan']= BankStatusHelper::pilihan();

        // dd($number);
        return view('design.add', $d);
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

        $validate=$request->validate([
            'choice' => 'required',
            'color' => '',
            'code' => '',
            'id_material' => 'required',
            'id_style' => 'required',
           
            'cust_id' => 'required',
        ]);

        // dd($validate);

        $data=Design::create($validate);

        return redirect()->route('measurecreate',['id'=>$data])
            ->with('success');
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
        $data=Design::find($id);
        
        return view('design.show',compact('data'));
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

        $d['model']=Design::find($id);
        $d['baju']= BankStatusHelper::baju();
        $d['material']= BankStatusHelper::material();
        $d['pilihan']= BankStatusHelper::pilihan();
        $d['title1']='Edit Design';
      
         return view('design.edit',$d);
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
            'choice' => 'required',
            'color' => '',
            'code' => '',
            'id_material' => 'required',
            'id_style' => 'required',
        ]);

        $data=Design::find($id);
        $data->update($request->all());

        return redirect()->route('design.index')->with('success','Design updated successfully');
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
        Design::destroy($id);
        return redirect()->route('design.index')->with('danger', 'Data has been deleted!');
    }
}
