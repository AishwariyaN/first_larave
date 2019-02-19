<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    	public function index()
	{
		echo "<br>Test controller";
	}
	
	public function showid($id)
	{
		echo "id:".$id;
	}

	public function postRegister(Request $request) 
	{

		$validaterequest=$request->validate([
			'fname'=>'required|max:50|alpha',
			'lname'=>'max:50|alpha',
			'emailid'=>'required|email',
			'sname'=>'required',
			'srating'=>'required|numeric|digits_between:1,5',

		],
		['fname.required'=>'First cannot be empty']);	
		
		$fname = $request->input('fname');
		$lname = $request->lname;
	    $emailid= $request->emailid;
		$schl_name = $request->sname;
		$schl_rating = $request->srating;


	    $id=DB::table('school_details')->insertGetId([
	    	'first_name'=>$fname,
	    	'last_name'=>$lname,
	    	'email'=>$emailid,
	    	'school_name'=>$schl_name,
	    	'school_rating'=>$schl_rating
	    ]);

	    if($id>0)
	    {
	    	echo 'Entry succesfull';
	    	return redirect('user/register/show');
	    }
	    else
	    {
	    	echo 'Entry Failed.Try Again';
	    }
	     
	}

  	public function showForm(Request $request){
 		//$id = $request->id;
		return view('register');

	   }

	   public function showTable(Request $request){
 		//$id = $request->id;	

 		$query= DB::table('school_details')->paginate(5);
 		//dd($query->toArray());
		return view('showtable',compact('query'));
		//echo 'hi';

	   }

	    public function editTable(Request $request){
 		$id = $request->id;

 		//echo "ddf:".$id;
 		$queryedit= DB::table('school_details')->where('id',$id)->get();
 		//dd($queryedit->toArray());
		return view('editregister',compact('queryedit'));
		//echo 'hi';

	   }

	   	public function updTable(Request $request){
			 		
			$validaterequest=$request->validate([
			'fname'=>'required|max:50|alpha',
			'lname'=>'max:50|alpha',
			'emailid'=>'required|email',
			'sname'=>'required',
			'srating'=>'required|numeric|digits_between:1,5',

		],
		['fname.required'=>'First cannot be empty']);	

		$id = $request->id;
		$fname = $request->input('fname');
		$lname = $request->lname;
	    $emailid= $request->emailid;
		$schl_name = $request->sname;
		$schl_rating = $request->srating;


	    $id=DB::table('school_details')->where('id',$id)->update([
	    	'first_name'=>$fname,
	    	'last_name'=>$lname,
	    	'email'=>$emailid,
	    	'school_name'=>$schl_name,
	    	'school_rating'=>$schl_rating
	    ]);

	    return redirect('user/register/show');
	    
	   }
	   	public function deleteTable(Request $request){
			 			
		$id = $request->id;
	    $id=DB::table('school_details')->where('id',$id)->delete();
	    return redirect('user/register/show');

	   }

	   	public function eloquenttest(Request $request){

	   		$complains= \App\Resident::with('complain')->get();
	   		//dd($complains);
			return view('residentcomplains')->with('complains',$complains);
	   }


}

