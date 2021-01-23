<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = DB::table('students')->get();
        return view('practice1.showall',['a'=>$a]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('practice1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flag = DB::table('students')->insert(['name'=>$request->name, 'lastname'=>$request->lastname, 'email'=>$request->email, 'password'=>$request->password]);
        if($flag)
        {
            return redirect()->back();
        }
        else
        {
            return "failed to submit data";
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
        $d = DB::table('students')->where('id',$id)->get();
        return view('practice1.show',['d'=>$d]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = DB::table('students')->where('id',$id)->first();
        return view('practice1.edit',compact('students'));
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
        $flag= DB::table('students')->where('id',$id)->update(['name'=>$request->name, 'lastname'=>$request->lastname, 'email'=>$request->email, 'password'=>$request->password]);
        if($flag)
        {
            return "Data submitted successfully";
        }
        else
        {
            return "failed to submit data";
        }   
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
    }
}
