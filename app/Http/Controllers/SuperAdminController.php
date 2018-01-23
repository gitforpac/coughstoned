<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Package;
use App\Booking;
use App\Image;
use App\Includeds;
use App\Schedule;
use App\PackageVideos;
use App\Comment;
use App\AdventureType;
use App\Content;
use App\Notification;
use Response;
use Auth;
use View;

class SuperAdminController extends Controller
{
  public function ManageAdmin()
    {
      return view('superadmin.manageadmin');
    } 

   public function ManageCrew()
    {
      return view('superadmin.managecrew');
    } 

     public function ManageAdventurer()
    {
      return view('superadmin.manageadventurer');
    } 


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

public function upload($pid,Request $request)
    {
        $data = array();
        
        if($request->hasFile('images')){
            foreach($request->file('images') as $f) {

                $fileNameExt = $f->getClientOriginalName();

                $filename = pathinfo($fileNameExt,PATHINFO_FILENAME);

                $ext = $f->getClientOriginalExtension();

                $storedFileName = $filename.'_'.time().'.'.$ext;

                array_push($data,array('package_id'=>$pid,'imagename'=>$storedFileName,'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s')));

                $path = $f->storeAs('public/images', $storedFileName);
            }

        DB::table('package_images')->insert($data);
        }

        $images = Package::find($pid)->images;
        
        return Response::json(view('superadmin.renderimages')->with('images',$images)->render() );
    }


    public function deletePhoto($pid)
    {
        $p = Image::find($pid);

        $deleted = $p->delete();

        return Response::json(array('success' => $deleted)); 

    }

    // package details


    public function addpackage(Request $request)
    {
        
        $fileNameExt = $request->file('package_image')->getClientOriginalName();
        $filename = pathinfo($fileNameExt,PATHINFO_FILENAME);
        $ext = $request->file('package_image')->getClientOriginalExtension();
        $storedFileName = $filename.'_'.time().'.'.$ext;
        $path =$request->file('package_image')->storeAs('public/cover_images', $storedFileName);
        

        $package = new Package;

        $package->name =$request->package_name;
        $package->location = $request->package_location;
        $package->difficulty = $request->package_difficulty;
        $package->description = $request->package_dsc;
        $package->price = $request->package_price;
        $package->longitude = $request->longitude;
        $package->latitude = $request->latitude;
        $package->duration = $request->package_durnum . ' ' . $request->package_dur;
        $package->adventure_type = $request->package_type;  
        $package->adventurer_limit = $request->package_limit;  
        $package->thumb_img = $storedFileName;    

        $saved = $package->save();

        if($saved) {
            return redirect('/editpkg/'.$package->id)->with('createpackagesuccess','Creating Package Successful, You may now Edit information about this package');
        }

    }

    public function updatepackage(Request $request,$pid)
    {

        $package = Package::find($pid);

        if($request->hasFile('package_image')) {
        $fileNameExt = $request->package_image->getClientOriginalName();
        $filename = pathinfo($fileNameExt,PATHINFO_FILENAME);
        $ext = $request->package_image->getClientOriginalExtension();
        $storedFileName = $filename.'_'.time().'.'.$ext;
        $path = $request->package_image->storeAs('public/cover_images', $storedFileName);
        $package->thumb_img = $storedFileName;
        }

        $package->name = $request->package_name;
        $package->location = $request->package_location;
        $package->difficulty = $request->package_difficulty;
        $package->price = (float)$request->package_price;
        $package->description = $request->package_dsc;

        $saved = $package->save();

        if ($request->ajax()) {
             return response()->json([
            'success' => $saved,
        ]);
        } else {
            return $saved;
        } 

    }

    // package itinerary

    public function updateItinerary($pid,Request $request)
    {
        $p = Package::find($pid);

        $p->itinerary = $request->package_itinerary;

        $saved = $p->save();

        return response()->json(['success' => $saved]);
    }


    public function addSchedule($pid,Request $request)
    {
        $s = new Schedule;

        $s->date = $request->schedule;
        $s->package_id = $pid;

        $saved = $s->save();

        if($saved) {
        return Response::json(array('success' =>  $saved, 'item_id' => $s->id), 200); 
        } else {
            return Response::json(array('success' =>  $saved));
        }

    }

    public function addIncluded($pid,Request $request)
    {
        $include = new Includeds;

        $include->included_item = $request->item;
        $include->package_id = $pid;  
        
        $saved = $include->save();

        if($saved) {
        return Response::json(array('success' =>  $saved, 'item_id' => $include->id), 200); 
        } else {
            return Response::json(array('success' =>  $saved));
        }
    }


    public function deleteSchedule($sid)
    {
        $s = Schedule::find($sid);

        $deleted = $s->delete();

        return Response::json(array('success' =>$deleted)); 
    }

     public function deleteIncluded($iid)
    {
        $i = Includeds::find($iid);

        $deleted = $i->delete();

        return Response::json(array('success' =>$deleted)); 

    }



    public function deletePackage($pid)
    {
        $p = Package::find($pid);

        $deleted = $p->delete();

        return Response::json(array('success' =>$deleted)); 
        
    }



    public function deleteComment($id)
    {
        $c = App\Comment::find($id);

        $c->delete();

        return Response::json(array('success' => $deleted));
    }


    

    // package videos

    public function deleteVideo($vid)
    {
        $v = PackageVideos::find($vid);

        $deleted = $v->delete();

        return Response::json(array('success' => $deleted));
    }

    public function addVideo($pid,Request $request)
    {
        $v = new PackageVideos;

        $fileNameExt = $request->video_thumb->getClientOriginalName();
        $filename = pathinfo($fileNameExt,PATHINFO_FILENAME);
        $ext = $request->video_thumb->getClientOriginalExtension();
        $storedFileName = $filename.'_'.time().'.'.$ext;
        $path = $request->video_thumb->storeAs('public/video_thumbs', $storedFileName);

        $v->video_link = $request->video_link;
        $v->video_thumbimg = $storedFileName;
        $v->package_id = $pid;

        $vd = Package::find($pid)->videos;

        $saved = $v->save();

        if($saved == true) {
             return Response::json(view('superadmin.rendervideos')->with('v',$vd)->render() );
        } else {
            return Response::json(array('success' => $saved));
        }
    }



    // package content


    public function addContent(Request $request,$pid)
    {
        $saved = DB::table('package_content')->insert(
            ['package_id' => $pid, 'title' => $request->info_title,'content' => $request->info_body]
        );

        $id = DB::getPdo()->lastInsertId();

        if($saved) {
        return Response::json(array('success' =>  $saved, 'item_id' => $id), 200); 
        } else {
            return Response::json(array('success' =>  $saved));
        }
    }

    public function deleteContent($cid)
    {
        $c = Content::find($cid);

        $deleted = $c->delete();

        return Response::json(array('success' => $deleted)); 
    }



    // crew profiles - crud


    public function addCrew(Request $request)
    {

        $c = new Crew;


        $fileNameExt = $request->cavatar->getClientOriginalName();
        $filename = pathinfo($fileNameExt,PATHINFO_FILENAME);
        $ext = $request->cavatar->getClientOriginalExtension();
        $storedFileName = $filename.'_'.time().'.'.$ext;
        $path = $request->cavatar->storeAs('public/crew_avatars', $storedFileName);

        $c->name = $request->cname;
        $c->about = $request->cabout;
        $c->avatar = $storedFileName;

        $saved = $c->save();


        return response()->json(['success' => $saved]); 


    }

    public function deleteCrew($cid)
    {
        $c = Crew::find($cid);

        $deleted = $c->delete();

        return Response::json(array('success' => $deleted)); 

    }

    // add advenbture_type

    public function addAdventureType(Request $request)
    {

        $saved = DB::table('adventure_type')->insert(
                    ['type' => $request->adv_typee]
                );

        return Response::json(array('success' => $saved));

    }


    // page utils


    public function packageBookings($pid,Request $request)
    {
        $schedules = Package::find($pid)->schedules;

        $bookings = DB::table('bookings')->select('*')
                                         ->join('users','users.id','=','bookings.client')
                                         ->join('schedules', 'schedules.id' ,'=','bookings.schedule_id')
                                         ->where(['bookings.package_id' => $pid])
                                         ->get();

        $data = array(
                    'bookings' => $bookings,
                    'schedules' => $schedules
                    );   
                          
        if ($request->ajax()) {
            return Response::json(view('superadmin.renderbookings')->with('data',$data)->render() );
        } else {
            return $bookings;
        }
    }




    public function manage()
    {
        $packages = Package::all();
        $title = 'Staff | Manage';
        $bookingscount = array();
        
        foreach($packages as $p) {
             $bookings =  Package::find($p->id)->bookings;
             array_push($bookingscount, $bookings->count());
        }

        $data = array(
            'packages'   => $packages,
            'title'     => $title,
            'bookingscount' => $bookingscount
        ); 

        return view('superadmin.bookingspage')->with('data',$data);
    }


    public function loadNotifications()
    {

        $n = DB::table('admin_notifications')->where('status', 0);
        $nc = DB::table('admin_notifications')->where('status', 0)->count();


        $ndata = array(
                    'notification_count' => $nc,
                    'notification' => $n
                    );

        return Response::json(view('crew.rendernotifs')->with('data',$ndata)->render() );
    }


    public function update($pid)
    {
        $package = Package::find($pid);
        $schedules = Package::find($pid)->schedules;
        $includes = Package::find($pid)->includeds;
        $videos = Package::find($pid)->videos;
        $images = Package::find($pid)->images;
        $title = 'Edit - '.$package->name;
        $content  =  Package::find($pid)->contents;

        $data = array(
            'package'  => $package,
            'schedules' => $schedules,
            'includes'  => $includes,
            'title' => $title,
            'videos'=>$videos,
            'images'=>$images,
            'content'=>$content
        );

        return view('superadmin.editpackage')->with("data",$data);
    }


    public function getNotifications()
    {

        return Notification::all();
    }





}
