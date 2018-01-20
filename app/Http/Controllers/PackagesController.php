<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Booking;
use App\Schedule;
use App\Package;
use App\Comment;
use Response;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Adventures';
        $packagesq = Package::query();
        $avd = Schedule::query();


        if(!is_null($request->query('difficulty'))) {
            if($request->query('difficulty') == 'all') {
                $packagesq->orderBy('difficulty')->get();
            } else {
            $packagesq->where('difficulty','=',$request->query('difficulty'));
            }
        }

        if(!is_null($request->query('type'))) {
            if($request->query('type') == 'all') {
                $packagesq->orderBy('location')->get();
            } else {
                $packagesq->where('adventure_type','like','%'.$request->query('type').'%');
            }
        }

        if(!is_null($request->query('date'))) {
            $dateselect = $request->query('date');
            $dateselect = date("Y-m-d", strtotime($dateselect));
            if($request->query('date') == 'all') {
                $packagesq->orderBy('location')->get();
            } else {
                $packagesq = Package::whereHas('schedules', function ($q) use($dateselect){
                    $q->where('date', $dateselect);
                });
            }
        }

        $packages = $packagesq->paginate(20);

        $data = array(
            'packages'   => $packages,
            'title'     => $title
        ); 
        
        if ($request->ajax()) {          
            return Response::json(view('Packages.renderpackages')->with('packages',$data['packages'])->render() );
        } else {
            return view('Packages.packages')->with('pagedata',$data);
        }


    }

    public function loadpackages()
    {
        return Package::all();
    }
   
    public function loadPackage($pid)
    {
        $package = Package::find($pid);
        $schedules = $this->getSchedules($pid);
        $includeds = Package::find($pid)->includeds; 
        $images = Package::find($pid)->images;
        $content = Package::find($pid)->contents;
        $comments = DB::table('comments')->select('comment','user_fullname')
                                         ->join('users','users.id','=','comments.user_id')
                                         ->where(['comments.package_id' => $pid])
                                         ->get();
        $bookings = Booking::where('package_id', $pid);
        $spaceleft = [];
        $prices = [];

        for($i=1;$i<=$package->adventurer_limit;$i++) {
            switch ($i) {
                case 1:
                    array_push($prices, $package->price*($package->adventurer_limit/2)-800);
                    break;
                case 2:
                    array_push($prices, $package->price*3);
                    break;
                case 3:
                    array_push($prices, $package->price*2+3500);
                    break;
                case 4:
                    array_push($prices, $package->price*2+400);
                    break;
                case 5:
                    array_push($prices, $package->price*2);
                    break;
                case 6:
                    array_push($prices, $package->price+1000);
                    break;
                case 7:
                    array_push($prices, $package->price+900);
                    break;
                case 8:
                    array_push($prices, $package->price+800);
                    break;
                case 9:
                    array_push($prices, $package->price+700);
                    break;
                case 10:
                    array_push($prices, $package->price+600);
                    break;
                case 11:
                    array_push($prices, $package->price+500);
                    break;
                case 12:
                  \ array_push($prices, $package->price+400);
                    break;
                default:
                    array_push($prices, $package->price);

            }
        }

        foreach($schedules as $s) {
            $bookings = Booking::where('package_id',$pid)->where('schedule_id' , '=', $s->id);
            $sl = $package->adventurer_limit - $bookings->count(); 
            array_push($spaceleft,$sl);
        }

        
        $videos = Package::find($pid)->videos;
        $title = $package->name;
        $data = array(
            'package'  => $package,
            'schedules'   => $schedules,
            'title' => $title,
            'videos'=>$videos,
            'includes' => $includeds,
            'images' => $images,
            'comments' => $comments,
            'spaceleft' => $spaceleft,
            'content' => $content,
            'prices' =>  $prices
        );
        return view('package.package')->with('pagedata',$data); 
    }


    private function getSchedules($pid)
    {
        return $schedules = Package::find($pid)->schedules;
    }
}
