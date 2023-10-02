<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Measure;
use Illuminate\Http\Request;
use App\Helpers\BankStatusHelper;

class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $d['data']=Measure::latest()->paginate(10);
        return view('measure.index',$d);
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
        $d['model']=Design::find($id);
        

        // dd($number);
        return view('measure.create',$d);
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
        $request->validate([
            'design_id' => 'required',
            'shoulder' => 'required',
            'sleeve' => 'required',
            'chest' => 'required',
            'length_top' => 'required',
            'waist' => 'required',
            'hip' => 'required',
            'length_bot' => 'required',
            'bottom' => '',
            'waist_top' => '',
        ]);

        // dd($request);
        $data=Measure::create($request->all());

        return redirect()->route('ordercreate',['id'=>$data])
            ->with('success', 'Measure add successfully.');

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
        $data=Measure::find($id);
        
        return view('measure.show',compact('data'));
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
        $d['data']=Measure::find($id);
        $d['model']=null;
      
         return view('measure.edit',$d);
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

        // dd($_POST);
        $request->validate([
            
            'shoulder' => 'required',
            'sleeve' => 'required',
            'chest' => 'required',
            'length_top' => 'required',
            'waist' => 'required',
            'hip' => 'required',
            'length_bot' => 'required',
            'bottom' => '',
            'waist_top' => '',
        ]);

        // dd($request);
        $data=Measure::find($id);
        $data->update($request->all());

        return redirect()->route('measure.index')
            ->with('success', 'Measurement update successfully.');
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
        Measure::destroy($id);
        return redirect()->route('measure.index')->with('danger', 'Data has been deleted!');
    }
}
