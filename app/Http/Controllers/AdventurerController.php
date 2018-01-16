<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;
use App\Comment;
use App\Rate;
use Response;
use Image; 

class AdventurerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = new User;

        return $client::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Adventurer.editprofile', ['title' => 'Edit Profile']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = User::findorFail($id);

        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->birthdate = $request->input('birthdate');
        $client->gender = $request->input('gender');
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');
        $client->userabout = $request->input('describe');

        $client->save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword(Request $request, $id)
    {

        $client = User::findorFail($id);

        $oldpassword = $client->password;
        $uopi = $request->input('oldpassword');
        
        if(Hash::check($uopi,$oldpassword)) {
            $client->password = Hash::make($request->input('newpassword'));
            $client->save();
            return response()->json([
                'changepassword' => true,
            ]);
        } else {
            return response()->json([
                'changepassword' => false,
            ]);
        }
        
    }


    public function comment($pid,$userid,Request $request)
    {
        $c = new Comment;
        $id = $userid;

        $validate = $request->validate([
          'comment' => 'required',
        ]);

        $c->user_id = $id;
        $c->package_id = $pid;
        $c->comment = $request->comment;

        $saved = $c->save();

        if($saved) {
            return response()->json([
                'success' => $saved,
            ]);
        }

    }


    public function editcomment($pid,$cid)
    {
        $c = App\Comment::find($cid);
        $id = Auth::id();

        $c->user_id = $id;
        $c->package_id = $pid;
        $c->comment = $request->comment;

        $c->save();

        //return

    }


    public function updateAvatar(Request $request)
    {
        if($request->hasFile('user-avatar')){
            $fileNameExt = $request->file('user-avatar')->getClientOriginalName();
            $filename = pathinfo($fileNameExt,PATHINFO_FILENAME);
            $ext = $request->file('user-avatar')->getClientOriginalExtension();
            $storedFileName = $filename.'_'.time().'.'.$ext;
            Image::make($request->file('user-avatar'))->resize(285, 200)->save('storage/user_avatars/'.$storedFileName);

            $u = User::find(Auth::guard('user')->user()->id);

            $u->avatar = $storedFileName;

            $saved = $u->save();

            return Response::json(array('success' => $saved,'avatar' => $u->avatar));  

        }
    }


    public function showProfile($id)
    {
        $u = User::find($id);

        return view('Adventurer.myprofile')->with('data',$u);
    }

}
