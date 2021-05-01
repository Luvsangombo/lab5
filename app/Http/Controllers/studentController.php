<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{
    //
    public $students =array(array("B180910809", "Luka", "23", "Male","UB"),
    array("B160910809", "Bold", "28", "Male","UB"),
    array("B171010809", "Luuvan", "21", "Female","UV"),);
    public function list_student(){
        $a=$this->students;
        return view('list_student', compact('a'));
    }
    public function get_student($id){
        foreach($this->students as $student){
            if($student[0]==$id)
            return $student;
        }
    }
    public function search(){
        return view('search_form');
    }
    public function search_by_id(Request $request){
        $validated = $request->validate([
            'studentId'=>'required'
        ]);
        $result= array();
        foreach($this->students as $student){
            if($student[0]==$request->studentId)
            {
                $result=$student;
                break;
            }
        }
        return view('search_form', compact('result'));

    }
}
