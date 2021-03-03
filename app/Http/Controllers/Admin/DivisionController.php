<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Department;
use DB;
use DataTables;
class DivisionController extends Controller
{
    //constructor for Auth check
	public function __construct()
    {
        $this->middleware('auth');
    }

	//all division
    public function index(Request $request)
    {
    	if ($request->ajax()) {
            $data = DB::table('divisions')->join('departments','divisions.department_id','departments.id')
                   ->select('departments.department_name','divisions.*')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm" data-id="'.$row->id.'" data-toggle="modal" data-target="#edit_modal_division"><i class="icon-pencil7"> </i></a> 
                    <a href="'. route('division.delete', [$row->id]) .'"  class="delete btn btn-danger btn-sm"><i class="icon-trash-alt"> </i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);

        }
        $department=Department::all();
    	return view('admin.division.index',compact('department'));
    }

    //store division
    public function store(Request $request)
    {
    	 $validated = $request->validate([
    	        'division_name' => 'required',
    	        'department_id' => 'required',
    	  ]);

    	 Division::insert([
                'division_name' => $request->division_name,
                'department_id' => $request->department_id,
         ]);

        return response()->json('Successfully Division Added!'); 
    }

    //edit request
    public function edit($id)
    {
    	$divisions=DB::table('divisions')->where('id',$id)->first();
        return response()->json($divisions); 
    }

    //get department list for edit
    public function getDepartment()
    {
    	$departments=DB::table('departments')->get();
        return response()->json($departments); 
    }

    //update division
    public function update(Request $request)
    {
    	 $this->validate($request, [
            'department_id' => 'required',
            'division_name' => 'required',
        ]);

        //query builder
        $data=array();
        $data['department_id']=$request->department_id;
        $data['division_name']=$request->division_name;
        $update=DB::table('divisions')->where('id',$request->id)->update($data);
        return response()->json('Successfully Division Update!'); 
    }

    //delete method
    public function delete($id)
    {
        DB::table('divisions')->where('id',$id)->delete();
        return response()->json('Successfully Divisions Deleted!'); 
    }



}
