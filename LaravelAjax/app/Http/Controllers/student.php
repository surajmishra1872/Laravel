<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\StudentReg;
class student extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=StudentReg::all();
        return response()->json(['students'=>$data,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'error'=>$validator->messages(),
            ]);
        }
        else
        {
            StudentReg::create([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);

            return response()->json([
                'status'=>200,
                'message'=>"Student Added Successfully",
            ]);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=StudentReg::find($id);
        if($student)
        {
            return response()->json([
                'status'=>200,
                'student'=>$student,
            ]); 
        }
        else
        {
            return response()->json([
                'status'=>400,
                'message'=>"Student Data Not Found",
            ]);
        }
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
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'error'=>$validator->messages(),
            ]);
        }
        else
        {
           $student=StudentReg::find($id);

           if($student)
           {
            $student->name=$request->input('name');
            $student->name=$request->input('email');
            $student->update();
                 return response()->json([
                 'status'=>200,
                 'message'=>"Student updated Successfully",
             ]); 
           }
           else
           {
               return response()->json([
                   'status'=>400,
                   'message'=>"Student Data Not Updated",
               ]);
           }
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
        $student=StudentReg::find($id);
        $student->delete();
        return response()->json([
            'status'=>200,
            'message'=>"Student Deleted Successfully",
        ]);
    }
}
