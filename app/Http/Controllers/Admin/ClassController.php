<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ClassController extends Controller
{
   
    //Constructor 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

       $class = DB::table('classes')->get();
        return view('admin.class.index', compact('class'));
    }

    public function create()
    {
        return view('admin.class.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|unique:classes',
        ]);

        $data = array(
            'class_name' => $request->class_name,
        );
        DB::table('classes')->insert($data);
        return redirect()->back()->with('success', 'Successfully Inserted');
    }

    //Detele Method
    public function delete($id)
    {
        DB::table('classes')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    //Edit method
    public function edit($id)
    {   
        $data = DB::table('classes')->where('id', $id)->first();
        return view('admin.class.edit', compact('data'));
    }

    //update method
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_name' => 'required',
        ]);

        $data = array(
            'class_name' => $request->class_name,
        );

        DB::table('classes')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Successfully updated');
    }
}

