<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use DB;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Image;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //all employee list
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('user_type',2)->where('soft_delete',0)->latest()->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="btn btn-success btn-sm" data-id="'.$row->id.'"><i class="icon-pencil7"> </i></a>
                    <a href="javascript:void(0)" class="view btn btn-info btn-sm" data-id="'.$row->id.'" data-toggle="modal" data-target="#view_employee"><i class="icon-eye"> </i></a> 
                    <a href="'. route('employee.delete', [$row->id]) .'"  class="delete btn btn-danger btn-sm"><i class="icon-trash-alt"> </i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.employee.index');
    }

    //create form show
    public function create()
    {
    	$department=Department::all();
    	$position=Position::all();
        $user=DB::table('users')->orderBy('id','DESC')->first();
        $employee_id=$user->id+1;
        $supervisor=DB::table('users')->where('user_type',2)->where('is_supervisor',1)->get();
    	return view('admin.employee.create',compact('department','position','employee_id','supervisor'));

    }

    //store employee 
    public function store(Request $request)
    {
        $validated = $request->validate([
           'full_name' => 'required|max:255',
           'email' => 'required|unique:users|',
           'phone' => 'required|unique:users|',
           'country' => 'required',
           'city' => 'required',
           'zipcode' => 'required',
           'division_id' => 'required',
           'position_id' => 'required',
           'supervisor_id' => 'required',
           'duty_type' => 'required',
           'hire_date' => 'required',
           'joining_date' => 'required',
           'rate_type' => 'required',
           'rate' => 'required',
           'pay_frequency' => 'required',
           'dob' => 'required',
           'gender' => 'required',
           'marital_status' => 'required',
           'present_address' => 'required',
           'permanent_address' => 'required',
           'nid' => 'required',
           'emergency_contact' => 'required',
        ]);

        //check registered person is supervisor or not
        
            $data=array();
            $data['employee_id']=$request->employee_id;
            $data['name']=$request->full_name;
            $data['full_name']=$request->full_name;
            $data['is_super']=0;
            $data['is_admin']=0;
            $data['user_type']=2;
            $data['email']=$request->email;
            $data['phone']=$request->phone;
            $data['alternative_phone']=$request->alternative_phone;
            $data['password']=Hash::make('12345678');
            $data['country']=$request->country;
            $data['city']=$request->city;
            $data['zipcode']=$request->zipcode;
            $data['division_id']=$request->division_id;
            $data['position_id']=$request->position_id;
            $data['duty_type']=$request->duty_type;
            $data['hire_date']=$request->hire_date;
            $data['joining_date']=$request->joining_date;
            $data['termination_date']=$request->termination_date;
            $data['voluntary_termination']=$request->voluntary_termination;
            $data['rate_type']=$request->rate_type;
            $data['rate']=$request->rate;
            $data['pay_frequency']=$request->pay_frequency;
            $data['pay_frequency_text']=$request->pay_frequency_text;
            $data['benefit_class_code']=$request->benefit_class_code;
            $data['benefit_details']=$request->benefit_details;
            $data['benefit_accural_date']=$request->benefit_accural_date;
            $data['benefit_status']=$request->benefit_status;
            $data['class_code']=$request->class_code;
            $data['class_details']=$request->class_details;
            $data['class_accural_date']=$request->class_accural_date;
            $data['class_status']=$request->class_status;
            if ($request->supervisor_id=='self') {
                $data['supervisor_id']=$request->employee_id;
                $data['is_supervisor']=1;
            }else{
                $data['supervisor_id']=$request->supervisor_id;
                $data['is_supervisor']=0;
            }
            $data['reference_name']=$request->reference_name;
            $data['reference_phone']=$request->reference_phone;
            $data['reference_address']=$request->reference_address;
            $data['dob']=$request->dob;
            $data['gender']=$request->gender;
            $data['marital_status']=$request->marital_status;
            $data['ssn']=$request->ssn;
            $data['present_address']=$request->present_address;
            $data['permanent_address']=$request->permanent_address;
            $data['nid']=$request->nid;
            $data['home_phone']=$request->home_phone;
            $data['emergency_contact_person']=$request->emergency_contact_person;
            $data['emergency_contact']=$request->emergency_contact;
            $data['emergency_contact_relation']=$request->emergency_contact_relation;

            if ($request->file('photo')) {
                $emp_photo = $request->file('photo');
                $emp_photo_name = $request->employee_id . '.' . $emp_photo->getClientOriginalExtension();
                Image::make($emp_photo)->resize(250, 250)->save('public/backend/images/employee/' . $emp_photo_name);
                $data['photo']='public/backend/images/employee/' . $emp_photo_name;
                DB::table('users')->insert($data);
                return redirect()->back()->with('success','Successfully Added New Employee.');
            }
            $data['photo']='public/backend/images/dummy.jpg';
            DB::table('users')->insert($data);
            return redirect()->back()->with('success','Successfully Added New Employee.');

    }

    //employee View
    public function view($id)
    {
        $employee=DB::table('users')->leftJoin('divisions','users.division_id','divisions.id')
                ->leftJoin('positions','users.position_id','positions.id')
                ->select('divisions.division_name','positions.position_name','users.*')
                ->where('users.id',$id)->first();
        return view('admin.employee.view',compact('employee'));
    }

    //soft delete
    public function delete($id)
    {
        DB::table('users')->where('id',$id)->update(['soft_delete'=>1]);
        return response()->json('Successfully Employee Delete!'); 
    }


}
