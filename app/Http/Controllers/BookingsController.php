<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Package;
use Response;
use App\Booking;
use App\Schedule;
use App\Models\User;
use App\CreditCard;
use App\Admin;
use App\Notifications\NotifyNewBooking;
use Notification;
use App\Events\NewBooking;
use App\Prices;

class BookingsController extends Controller
{

    private $bookingfee = 0.20;
    public $error = '';
    private $discount_per_person = 250;

    public function book($pid,Request $request)
    {

        $book = new Booking;

        $validateCC = $this->checkCC($request->cardnumber,$request->exp,$request->cvv,$request->total_payment);



        if($request->select_payment_method === 'Deposit') {

            $b = new Booking;

            $b->client = Auth::guard('user')->user()->id;
            $b->package_id = $pid;
            $b->num_guest = (int)$request->num_guest;
            $b->payment = $request->total_payment;
            $b->schedule_id = $request->schedule;
            $b->payment_method = 'Deposit';

            $saved = $b->save();

            if($saved) {

                $admins = Admin::all();
                $package = Package::find($pid);

                Notification::send($admins,new NotifyNewBooking($package));
                event(new NewBooking());

                return Response::json(['success' => $saved]); 

                 return redirect('home/dashboard');
            } else {
                return Response::json(['success' => false, 'error' => 'There was a problem processing booking process']);  
            }
    

        } elseif ($request->select_payment_method === 'Credit Card') {

            if(!$validateCC == false) { 

            $b = new Booking;

            $b->client = Auth::guard('user')->user()->id;
            $b->package_id = $pid;
            $b->num_guest = $request->num_guest;
            $b->payment = $request->total_payment;
            $b->schedule_id = $request->schedule;
            $b->payment_method = 'Credit Card';

            $saved = $b->save();

            if($saved) {

                $admins = Admin::all();
                $package = Package::find($pid);

                Notification::send($admins,new NotifyNewBooking($package));
                event(new NewBooking());

                return Response::json(['success' => $saved]); 
            }
            } else {
                return Response::json(['success' => $validateCC, 'error' => $this->error]);  
            }

        } else {
            return Response::json(['success' => 'error']);
        }

        


    }



    public function review($pid, Request $request)
    {
        $schedule = (int)$request->query('scheduleid');
        $schedules = Package::find($pid)->schedules->where('id','=',$schedule)->first();
        $prices = [];
  
        if($schedules){
            $package  = Package::find($pid);
            $title    = 'Review Booking';
            $contents =  Package::find($pid)->contents;

            for($i=1;$i<=$package->adventurer_limit;$i++) {
            switch ($i) {
                case 1:
                    array_push($prices, $package->price*($package->adventurer_limit/2)-800);
                    break;
                case 2:
                    array_push($prices, $package->price*3);
                    break;
                case 3:
                    array_push($prices, $package->price*2+800);
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
                    array_push($prices, $package->price+400);
                    break;
                default:
                    array_push($prices, $package->price);

            }
        }

            $data = array(
                'package'   => $package,
                'schedule'  => $schedules,
                'title'     => $title,
                'contents' => $contents,
                'prices' =>  $prices
            );


            return view('booking.step1')->with('pagedata',$data); 

        } else {
            return abort(404);
        }
       
    }


     public function confirm($pid, Request $request) 
     {
        $title    = 'Confirm Booking';
        $package  = Package::find($pid);
        $nguest = $request->input('nguest');
        $schedule = $request->input('schedule');

        $data = array(
            'package'   => $package,
            'schedule'  => $schedule,
            'nguest'    => $nguest,
            'title'     => $title
        );

        return view('booking.candpay')->with('pagedata',$data); 
     }

     public function showUserBookings()
     {
        
        $bookings = DB::table('bookings')->select('bookings.schedule_id','bookings.package_id','bookings.num_guest','bookings.id','packages.thumb_img','packages.name','schedules.date')
                                         ->join('schedules', 'schedules.id' ,'=','bookings.schedule_id')
                                         ->join('packages' ,'packages.id','=','bookings.package_id')
                                         ->where(['client' => Auth::guard('user')->user()->id])
                                         ->whereNotIn('status', ['cancelled'])
                                         ->get();

        return view('Adventurer.trips')->with('data',$bookings);
     }

     public function cancelBooking($bid)
     {
        $booking = Booking::find($bid);

        $booking->status = 'cancelled';

        $saved = $booking->save();

        return Response::json(['success' => $saved]);
    }


    public function calculatePayment($price,Request $request)
    {

        $total = ($price * $request->num_guest) * $bookingfee;

        return Response::json(['total' => $total]); 
    }


    public function getPrices($pid,Request $request)
    {

        Package::find($pid)->prices;

        $count = $request->client_count;

        $total = Prices::where('person_count',$request->client_count)
                        ->where('package_id',$pid)
                        ->get();


        return Response::json(['per' => $total->first()->price_per,'total'=>($total->first()->person_count*$total->first()->price_per)]); 

    }


    private function checkCC($cn,$exp,$cvv,$payment)
    {

        $c = CreditCard::where('cardnumber', '=', $cn)->first();

        if($c === NULL) {
            $this->error = 'Error: Credit Card Invalid'; 
            return false;
        } else {
            $myexp = $this->checkExpiry($exp,$c->expiration);
            $mycvv = $this->checkCVV($cvv,$c->cvv);

            if($myexp === true && $mycvv===true) {
                $expdate = preg_split("#/#", $exp); 
                $expiryMonth = (string)$expdate[0];
                $expiryYear = (string)$expdate[1];
                $timezone = new \DateTimeZone('Asia/Singapore');
                $expires = \DateTime::createFromFormat('my', $expiryMonth.$expiryYear,$timezone);
                $now     = new \DateTime();
                $now->setTimezone($timezone);

                if ($expires <= $now) {
                    $this->error = 'Credit Card Expired'; 
                    return false; 
                } else {
                    if($c->balance >= (float)$payment ) {
                        return true;
                        $this->error = '';
                    } else {
                        $this->error = '<small>Booking Failed:</small><br> Credit card has Insufficient Funds'; 
                        return false;
                    }
                }
            } else {
                $this->error = '<small>Booking Failed:</small> <br> Please review credit card information'; 
                return false;
            }
            
        }

        
    }

    private function checkExpiry($inpute,$dbe)
    {
        if($inpute === $dbe) {
            return true;
        } else {
            return false;
        }
    }

    private function checkCVV($inputcvv,$dbcvv)
    {
        if($inputcvv === $dbcvv) {
            return true;
        } else {
            return false;
        }
    }
}
