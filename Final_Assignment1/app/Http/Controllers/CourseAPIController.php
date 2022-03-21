<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseAPIController extends Controller
{
    //
    public function get(Request $req){
        $c = Course::where('id',$req->id)->first();
        if($c){
            return response()->json($c,200);
        }
        return response()->json(["msg"=>"notfound"],404);
        
    }

    public function DeleteCourse(Request $req){
        $c = Course::where('id',$req->id)->first();
        $c->delete();
        
    }

    public function add(Request $req){
        try{
            $c = new Course;
            $c->name = $req->name;
            $c->d_id = $req->d_id;
            if($c->save()){

                return response()->json(["msg"=>"Added Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not add"],500);
        }
    }

    
    public function Edit(Request $req){
        try{
            $c = Course::where('id',$req->id)->first();
            $c->name = $req->name;
            $c->d_id = $req->d_id;
            if($c->save()){

                return response()->json(["msg"=>"Updated Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not update"],500);
        }
    }
}
