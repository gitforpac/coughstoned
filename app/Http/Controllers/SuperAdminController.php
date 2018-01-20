<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Admin;
use App\Models\User;

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

  	$a = DB::table('admins')->insert(
		    ['username' => $request->username, 
		     'password' => bcrypt($request->password),
		     'avatar' => $storedFileName ]
		);

    return Response::json(array('success' => $a)); 

  }

  public function addAccountUser(Request $request) 
  {
  	$fileNameExt = $request->avatar->getClientOriginalName();
    $filename = pathinfo($fileNameExt,PATHINFO_FILENAME);
    $ext = $request->avatar->getClientOriginalExtension();
    $storedFileName = $filename.'_'.time().'.'.$ext;
    $path = $request->avatar->storeAs('public/user_avatars', $storedFileName);

    if ($request->hasFile('avatar')) {
	    $fileNameExt = $request->avatar->getClientOriginalName();
	    $filename = pathinfo($fileNameExt,PATHINFO_FILENAME);
	    $ext = $request->avatar->getClientOriginalExtension();
	    $storedFileName = $filename.'_'.time().'.'.$ext;
	    $path = $request->avatar->storeAs('public/user_avatars', $storedFileName);
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

   public function addAccountSuperAdmin(Request $request) 
  {
  	$fileNameExt = $request->avatar->getClientOriginalName();
    $filename = pathinfo($fileNameExt,PATHINFO_FILENAME);
    $ext = $request->avatar->getClientOriginalExtension();
    $storedFileName = $filename.'_'.time().'.'.$ext;
    $path = $request->avatar->storeAs('public/sa_avatars', $storedFileName);

    if ($request->hasFile('avatar')) {
	    $fileNameExt = $request->avatar->getClientOriginalName();
	    $filename = pathinfo($fileNameExt,PATHINFO_FILENAME);
	    $ext = $request->avatar->getClientOriginalExtension();
	    $storedFileName = $filename.'_'.time().'.'.$ext;
	    $path = $request->avatar->storeAs('public/sa_avatars', $storedFileName);
	} else {
		$storedFileName = 'default_avatar.png';
	}

  	$a = DB::table('superadmins')->insert(
		    ['username' => $request->username, 
		     'password' => bcrypt($request->password),
		     'avatar' => $storedFileName ]
	);

    return Response::json(array('success' => $a));
  }


  public function deleteAccCrew($id)
  {
  	$n = Admin::find($id);

  	$deleted = $n->delete();

  	return Response::json(array('success' => $deleted)); 
  }

  public function deleteAccAdventurer($id)
  {
  	$n = User::find($id);

  	$deleted = $n->delete();

  	return Response::json(array('success' => $deleted)); 
  }





}
