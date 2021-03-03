<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Award;
use App\Models\User;
use DB;
use DataTables;
class AwardController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}

	public function index(Request $request)
	{
		$user=User::where('user_type',2)->get(['id', 'name']);
		if ($request->ajax()) {
            $data = DB::table('awards')->join('users','awards.user_id','users.id')->select('awards.*','users.name')->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm" data-id="'.$row->id.'" data-toggle="modal" data-target="#edit_modal_award"><i class="icon-pencil7"> </i></a> 
                    <a href="'. route('award.delete', [$row->id]) .'"  class="delete btn btn-danger btn-sm"><i class="icon-trash-alt"> </i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    	return view('admin.award.index',compact('user'));
	}

	//award store
	public function store(Request $request)
	{
		 $validated = $request->validate([
    	      'user_id' => 'required',
    	  ]);

		 $data=array();
		 $data['user_id']=$request->user_id;
		 $data['award_name']=$request->award_name;
		 $data['award_description']=$request->award_description;
		 $data['award_by']=$request->award_by;
		 $data['gift_item']=$request->gift_item;
		 $data['date']=$request->date;
		 $data['month']=date('F');
		 $data['year']=date('Y');
		 DB::table('awards')->insert($data);
		 return response()->json('Successfully Award Insert!'); 
	}

	//award delete
	public function delete($id)
	{
		DB::table('awards')->where('id',$id)->delete();
		return response()->json('Successfully Award Deleted!');
	}

	//award edit
	public function edit($id)
	{
		$award=DB::table('awards')->where('id',$id)->first();
		return response()->json($award);
	}

	//json user response
	public function getUser()
	{
		$user=User::where('user_type',2)->get(['id', 'name']);
		return response()->json($user);
	}


}
