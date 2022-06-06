<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $Student = Student::all();
        return view('index',['students'=>$Student]);
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'roll_number' => 'required|unique:students,roll_number',
            'subject' => 'required',
            'class' => 'required',
            'score' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) 
        {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['images'] = "$profileImage";
        }
    
        Student::create($input);
     
        return redirect()->route('index')
                        ->with('success','Student created successfully.');
    }

    public function edit(Request $request, $id)
    {
        //echo $id;die();
        $model = Student::find($id);
        return view('edit',['student'=>$model]);
    }

     public function update(Request $request, $id)
    {
       $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'class' => 'required',
            'score' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['images'] = "$profileImage";
        }else{
            unset($input['images']);
        }
        $model = Student::find($id);
        $model->name = $request->get('name');
        $model->roll_number= $request->get('roll_number');
        $model->subject= $request->get('subject');
        $model->class= $request->get('class');
        $model->subject= $request->get('subject');
        $model->score= $request->get('score');
        $model->save();
        return redirect()->route('index')
                        ->with('success','Student updated successfully');
    }

     public function destroy(Request $request, $id)
    {
        //$student->delete();
        Student::destroy($id);
        return redirect()->route('index')
                        ->with('success','Student deleted successfully');
    }
}
