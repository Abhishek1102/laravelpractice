<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Students;
use Facade\FlareClient\Http\Response;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::latest()->paginate(4);
        return view('students.index',compact('students'))->with('i',(\request()->input('page',1) - 1) * 4);
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
       $r=$request->validate([
           'name'=>'required',
           'lastname'=>'required',
           'email'=>'required',
           'password'=>'password'
       ]);

       $studId = $request->stud_id;
        Students::updateOrCreate(['id'=>$studId],['name'=>$request->name,'lastname'=>$request->lastname,'email'=>$request->email,'password'=>$request->password]);
        if(empty($request->stud_id))
        {
            $msg = 'Student entry created successfully';
        }
        else
        {
            $msg = 'Student data updated successfully';
        }
        return redirect()->route('Students.index')->with('success',$msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('students.show',compact('students'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $student = Students::where($where)->first();
        return response()->json($student);
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stud = Students::where('id',$id)->delete();
        return response()->json($stud);
    }
}
