<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Position;
use DB;
use DataTables;
class PositionController extends Controller
{
     //constructor for Auth check
	public function __construct()
    {
        $this->middleware('auth');
    }

    //all position
    public function index(Request $request)
    {
    	if ($request->ajax()) {
            $data = Position::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm" data-id="'.$row->id.'" data-toggle="modal" data-target="#edit_modal_position"><i class="icon-pencil7"> </i></a> 
                    <a href="'. route('position.delete', [$row->id]) .'"  class="delete btn btn-danger btn-sm"><i class="icon-trash-alt"> </i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    	return view('admin.position.index');
    }

    //position store
    public function store(Request $request)
    {
    	$validated = $request->validate([
    	        'position_name' => 'required|unique:positions|max:255',
    	    ]);
    	Position::insert([
            'position_name' => $request->position_name,
            'position_details' => $request->position_details,
        ]);
    	return response()->json('Successfully Position Added!'); 
    }

    //position edit
    public function edit($id)
    {
    	$positions=DB::table('positions')->where('id',$id)->first();
        return response()->json($positions); 
    }

    //position update
    public function update(Request $request)
    {
    	$this->validate($request, [
            'position_name' => 'required',
        ]);
        //Query Builder
        $data=array();
        $data['position_name']=$request->position_name;
        $data['position_details']=$request->position_details;
        $update=DB::table('positions')->where('id',$request->id)->update($data);
        return response()->json('Successfully Position Update!'); 
    }

    //delete position
    public function delete($id)
    {
        DB::table('positions')->where('id',$id)->delete();
        return response()->json('Successfully Position Deleted!'); 
    }

}
