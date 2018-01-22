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
        $avd = Schedule::query();

        $packagesq = DB::table('packages')
                        ->leftJoin('prices', 'packages.id', '=', 'prices.package_id')
                        ->selectRaw('* , packages.id as pid')
                        ->where('prices.is_display','=',1)
                        ->whereNull('packages.deleted_at');

        if(!is_null($request->query('difficulty'))) {
            if($request->query('difficulty') == 'all') {

                $packagesq = DB::table('packages')
                                ->leftJoin('prices', 'packages.id', '=', 'prices.package_id')
                                ->selectRaw('* , packages.id as pid')
                                ->where('prices.is_display','=',1)
                                ->whereNull('packages.deleted_at');

            } else {

                $packagesq = DB::table('packages')
                                ->leftJoin('prices', 'packages.id', '=', 'prices.package_id')
                                ->selectRaw('* , packages.id as pid')
                                ->where('prices.is_display','=',1)
                                ->whereNull('packages.deleted_at')
                                ->where('difficulty','=',$request->query('difficulty'));
            }
        }

        if(!is_null($request->query('type'))) {
            if($request->query('type') == 'all') {
                $packagesq = $packagesq;
            } else {

                $packagesq = DB::table('packages')
                                ->leftJoin('prices', 'packages.id', '=', 'prices.package_id')
                                ->selectRaw('* , packages.id as pid')
                                ->where('prices.is_display','=',1)
                                ->whereNull('packages.deleted_at')
                                ->where('adventure_type','like','%'.$request->query('type').'%');
            }
        }

        if(!is_null($request->query('date'))) {
            $packagesq = Package::selectRaw('* , packages.id as pid');
            $dateselect = $request->query('date');
            $flag = 1;
            $dateselect = date("Y-m-d", strtotime($dateselect));
            if($request->query('date') == 'all') {
                $packagesq = $packagesq;
            } else {
                $packagesq = $packagesq->whereHas('schedules', function ($q) use($dateselect){
                    $q->where('date', $dateselect);
                })->whereHas('prices',function($q) use($flag){
                    $q->where('is_display',$flag);
                })->leftJoin('prices', 'packages.id', '=', 'prices.package_id')->where('prices.is_display','=',1);
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
        return DB::table('packages')
                                ->leftJoin('prices', 'packages.id', '=', 'prices.package_id')
                                ->selectRaw('* , packages.id as pid')
                                ->where('prices.is_display','=',1)
                                ->whereNull('packages.deleted_at')
                                ->get();
    }
   
    public function loadPackage($pid)
    {
        $package = Package::find($pid);
        $schedules = Package::find($pid)->schedules;
        $includeds = Package::find($pid)->includeds; 
        $images = Package::find($pid)->images;
        $content = Package::find($pid)->contents;
        $comments = DB::table('comments')->select('comment','user_fullname')
                                         ->join('users','users.id','=','comments.user_id')
                                         ->where(['comments.package_id' => $pid])
                                         ->get();
        $bookings = Booking::where('package_id', $pid);
        $prices = Package::find($pid)->prices;

    
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
            'content' => $content,
            'prices' =>  $prices
        );
        return view('package.package')->with('pagedata',$data); 
    }

}
