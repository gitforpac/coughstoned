<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
  


  public function addCrewManager(Request $request)
  {


  	$fileNameExt = $request->avatar->getClientOriginalName();
    $filename = pathinfo($fileNameExt,PATHINFO_FILENAME);
    $ext = $request->avatar->getClientOriginalExtension();
    $storedFileName = $filename.'_'.time().'.'.$ext;
    $path = $request->avatar->storeAs('public/manager_avatars', $storedFileName);

    if ($request->hasFile('avatar')) {
	    $fileNameExt = $request->avatar->getClientOriginalName();
	    $filename = pathinfo($fileNameExt,PATHINFO_FILENAME);
	    $ext = $request->avatar->getClientOriginalExtension();
	    $storedFileName = $filename.'_'.time().'.'.$ext;
	    $path = $request->avatar->storeAs('public/manager_avatars', $storedFileName);
	} else {
		$storedFileName = 'default_avatar.png';
	}

  	$a = DB::table('users')->insert(
		    ['username' => $request->username, 
		     'password' => bcrypt($request->password),
		     'avatar' => $storedFileName ]
		);

    return Response::json(array('success' => $a)); 

  }




}
