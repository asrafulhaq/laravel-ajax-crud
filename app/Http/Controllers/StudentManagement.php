<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DataTables;

class StudentManagement extends Controller
{
    /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */


    public function index(Request $req)
    {


        if( $req -> ajax() ){
            $all_student_data = Student::latest() -> get();
            return DataTables::of($all_student_data) -> addColumn('action', function($all_student_data ){
                $button = '<button type="button" name="edit" id="'.$all_student_data ->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$all_student_data ->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            })
                ->rawColumns(['action']) ->  make(true);
        }

        return view('student.index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    


    public function store(Request $request)
    {


        Student::create([
            'fname'     => $request -> fname,
            'lname'     => $request -> lname
        ]);

        return $request -> fname . $request -> lname;


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
        //
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
