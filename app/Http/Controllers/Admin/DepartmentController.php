<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use DataTables;
use DB;

class DepartmentController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    //index page for department
    public function index(Request $request)
    {
    	if ($request->ajax()) {
            $data = Department::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm" data-id="'.$row->id.'" data-toggle="modal" data-target="#edit_modal_department"><i class="icon-pencil7"> </i></a> 
                    <a href="'. route('department.delete', [$row->id]) .'"  class="delete btn btn-danger btn-sm"><i class="icon-trash-alt"> </i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    	return view('admin.department.index');
    }

    //store department
    public function store(Request $request)
    {
    	   $validated = $request->validate([
    	        'department_name' => 'required|unique:departments|max:255',
    	    ]);

    	   // $department=new Department;
    	   // $department->department_name=$request->department_name;
    	   // $department->save();

    	   // $data=array();
    	   // $data['department_name']=$request->department_name;
    	   // DB::table('departments')->insert($data);

    	   Department::insert([
                'department_name' => $request->department_name,
            ]);

    	   return response()->json('Successfully Department Added!'); 
    }

    //edit department
    public function edit($id)
    {
    	$departments=DB::table('departments')->where('id',$id)->first();
        //$departments=Department::find($id);
        return response()->json($departments);    
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'department_name' => 'required',
        ]);

        //query builder
        $data=array();
        $data['department_name']=$request->department_name;
        $update=DB::table('departments')->where('id',$request->id)->update($data);

        //eloquent
        // $updateDepartment = Department::where('id',$request->id)->first();
        //     $updateDepartment->update([
        //         'department_name' => $request->department_name,
        //     ]);
         return response()->json('Successfully Department Update!'); 


    }

    //delete method
    public function delete($id)
    {
        $deleteDepartment = Department::find($id);
        $deleteDepartment->delete();  

       // DB::table('departments')->where('id',$id)->delete();
        return response()->json('Successfully Department Deleted!'); 
    }


}
