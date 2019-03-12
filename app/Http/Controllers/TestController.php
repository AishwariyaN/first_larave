<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Auth;
use App\school_details;
use Image;




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
			'fname'=>'required|max:50|regex:/^[\pL\s\-]+$/u',
			'lname'=>'regex:/^[\pL\s\-]+$/u',
			'emailid'=>'required|email',
			'sname'=>'required',
			'srating'=>'required|numeric|between:1,5',
		],
		['fname.required'=>'First Name cannot be empty',
		 'emailid.required'=>'Email Id Name cannot be empty',
		 'sname.required'=>'School Name cannot be empty',
		 'srating.required'=>'School Rating cannot be empty',
		 'srating.between'=>'School Rating should be between 1-5',
		 'emailid.email'=>'Email Id should be a proper email address',
		 'fname.regex'=>'First Name cannot contain Numbers',
		 'lname.regex'=>'Last Name cannot contain Numbers',
		 'fname.max'=>'First Name cannot exceed 50 characters',
		 'lname.max'=>'Last Name cannot exceed 50 characters',

		]);	

	    $fname = $request->input('fname');
		$lname = $request->lname;
	    $emailid= $request->emailid;
		$schl_name = $request->sname;
		$schl_rating = $request->srating;


		$details= new school_details();
		$details->first_name=$fname;
		$details->last_name=$lname;
		$details->email=$emailid;
		$details->school_name=$schl_name;
		$details->school_rating=$schl_rating;
		$details->created_at= \Carbon\Carbon::now();

		if($request->hasFile('disp_img')){

          $image = $request->file('disp_img');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->resize(100, 100)->save( storage_path('app/public/uploads/' . $filename ));
          
       	  $details->user_image = '/storage/uploads/'.$filename;
          $details->save();
        };
		

		$details->save();
		if($details->id > 0)
		{
			$result='success';
		}
		else
		{
			$result='failure';
		}

		//dd($result);
		//return $result;
		return redirect('user/register/show')->with('successmsg',$result);
		
	     
	}

  	public function showForm(Request $request){


 		//$id = $request->id;
		return view('register');

	   }

	   public function showTable(Request $request){
 		//$id = $request->id;
 		//echo "Laravel	";

 		//dd($request->result);
 		//$a=$this->postRegister
 		$query= DB::table('school_details')->orderby('created_at','desc')->paginate(6);
 			
		return view('showtable',compact('query'));
	

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
			'fname'=>'required|max:50|regex:/^[\pL\s\-]+$/u',
			'lname'=>'regex:/^[\pL\s\-]+$/u',
			'emailid'=>'required|email',
			'sname'=>'required',
			'srating'=>'required|numeric|between:1,5',

		],
		['fname.required'=>'First Name cannot be empty',
		 'emailid.required'=>'Email Id Name cannot be empty',
		 'sname.required'=>'School Name cannot be empty',
		 'srating.required'=>'School Rating cannot be empty',
		 'srating.between'=>'School Rating should be between 1-5',
		 'emailid.email'=>'Email Id should be a proper email address',
		 'fname.regex'=>'First Name cannot contain Numbers',
		 'lname.regex'=>'Last Name cannot contain Numbers',
		 'fname.max'=>'First Name cannot exceed 50 characters'

		]);	

		$id = $request->id;
		$fname = $request->input('fname');
		$lname = $request->lname;
	    $emailid= $request->emailid;
		$schl_name = $request->sname;
		$schl_rating = $request->srating;

		if($request->hasFile('disp_img')){

          $image = $request->file('disp_img');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          Image::make($image)->resize(100, 100)->save( storage_path('app/public/uploads/' . $filename ));
          
       	  $details = '/storage/uploads/'.$filename;
       
        };
		
	    $id=DB::table('school_details')->where('id',$id)->update([
	    	'user_image'=>$details,
	    	'first_name'=>$fname,
	    	'last_name'=>$lname,
	    	'email'=>$emailid,
	    	'school_name'=>$schl_name,
	    	'school_rating'=>$schl_rating,
	    	 'updated_at' => \Carbon\Carbon::now(),  # \Datetime()
	    ]);

	    return redirect('user/register/show');
	    
	   }
	   	public function deleteTable(Request $request){
		$id = $request->id;
		if($request->img !="")
		{

		$filename= public_path($request->img);
		unlink($filename);
		}

	  	$id=DB::table('school_details')->where('id',$id)->delete();
	    return "true";

	   }

	   	public function eloquenttest(Request $request){

	   		//$complains= \App\Resident::get();
	   		$complains= \App\Resident::with('complain')->get();
	   		//dd($complains);
	   	    //dd($complains[0]->complain);
			return view('residentcomplains')->with('complains',$complains);
	   }

	public function emailtest(Request $request){

		return view('emails');

	   }

	   public function sendemail(Request $request){

	   	$sendid=$request->emailid;
	   	$username=Auth::user()->name;


		Mail::to($sendid)->send(new TestMail($username));
		return redirect('user/register/show');

	   	/*	Mail::send('emails',[], function ($m) {
            $m->from('antony.george@neosofttech.com');

            $m->to("aishwariyanaidu17@gmail.com")->subject('Your Reminder!');
        });*/
	   }
	
	   

}

