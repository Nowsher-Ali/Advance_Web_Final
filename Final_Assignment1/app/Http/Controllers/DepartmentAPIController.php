<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Course;

class DepartmentAPIController extends Controller
{
    //
    public function get(Request $req){
        $d = Department::where('id',$req->id)->first();
        if($d){
            $s = [
                "id" => $d->id,
                "name" => $d->name,
                "courses" => $d->courses
            ];
            return response()->json($s,200);
        }
        return response()->json(["msg"=>"notfound"],404);
        
    }

    public function add(Request $req){
        try{
            $d = new Department;
            $d->name = $req->name;
            if($d->save()){

                return response()->json(["msg"=>"Added Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not add"],500);
        }
    }

    public function Edit(Request $req){
        try{
            $d = Department::where('id',$req->id)->first();
            $d->name = $req->name;
            if($d->save()){

                return response()->json(["msg"=>"Updated Successfully"],200);
            }
        }
        catch(\Exception $ex){
            return response()->json(["msg"=>"Could not update"],500);
        }
    }

    public function DeleteDepartment(Request $req){
        while(1)
        {
            $c = Course::where('d_id',$req->id)->first();
            if($c)
            {
                $c->delete();
            }
            else
            {
                break;
            }
        }
        
        $d = Department::where('id',$req->id)->first();
        $d->delete();
    }
}
