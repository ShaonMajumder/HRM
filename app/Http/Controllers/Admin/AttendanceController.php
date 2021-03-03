<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Position;
use App\Models\Attendance;
use Auth;
use DB;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //create form show
    public function create()
    {
        
    	$department=Department::all();
    	$position=Position::all();
        $user=DB::table('users')->orderBy('id','DESC')->first();
        $employee_id=$user->id+1;
        $supervisor=DB::table('users')->where('user_type',2)->where('is_supervisor',1)->get();
        
        $user_id = Auth::user()->id;
        $time = time();
        $date = date("d",$time);
        $month = date("m",$time);
        $year = date("Y",$time);
    	return view('admin.attendance.create',compact('user_id','date','month','year','department','position','employee_id','supervisor'));
        
        //
        //return view('admin.attendance.create',compact('user_id'));
    }

    public function time_track($user_id){
        
#        $clock_in = , $clock_out
        
    }
}
