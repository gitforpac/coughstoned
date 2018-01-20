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

class BookingsController extends Controller
{

    private $bookingfee = 0.20;
    public $error = '';
    private $discount_per_person = 250;

    public function book($pid,Request $request)
    {

        $book = new Booking;

        $validateCC = $this->checkCC($request->cardnumber,$request->exp,$request->cvv,$request->payment);

        if(!$validateCC == false) { 

            $b = new Booking;

            $b->client = Auth::guard('user')->id();
            $b->num_guest = $request->guest;
            $b->payment = $request->total_payment;
            $b->schedule_id = $request->schedule;
            $b->package_id = $pid;

            $b->save();

            $admins = Admin::all();
            $package = Package::find($pid);

            Notification::send($admins,new NotifyNewBooking($package));

            return Response::json(['booked' => $validateCC]); 
        } else {
            return Response::json(['success' => $validateCC, 'error' => $this->error]);  
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

        //  private $bookingfee = 0.20;
        // public $error = '';
        // private $max_person = 12;
        // private $discount_per_person = 250;
        $package = Package::find($pid)->first();

        for($count = 0; $count < $request->num_guest; $count++){
            $total = $package->price;
            $per_head = $total;
            $booking_fee = $total*$this->bookingfee;
            if($count >= 1){
                $total = ($package->price*($count+1))-($this->discount_per_person*$count);
                $per_head = $package->price-($this->discount_per_person*$count);
                $booking_fee = $total*$this->bookingfee;
            }
        }
        
        
        // switch ($request->num_guest) {
        //     case 1:
        //         $total = $package->price*($package->adventurer_limit/2)-800;
        //         break;
        //     case 2:
        //         $total = ($package->price*3)*$request->num_guest;
        //         break;
        //     case 3:
        //         $total = ($package->price*2+800)*$request->num_guest;
        //         break;
        //     case 4:
        //         $total = ($package->price*2+400)*$request->num_guest;
        //         break;
        //     case 5:
        //          $total = ($package->price*2)*$request->num_guest;
        //         break;
        //     case 6:
        //         $total = ($package->price+1000)*$request->num_guest;
        //         break;
        //     case 7:
        //          $total = ($package->price+900)*$request->num_guest;
        //         break;
        //     case 8:
        //          $total = ($package->price+800)*$request->num_guest;
        //         break;
        //     case 9:
        //          $total = ($package->price+700)*$request->num_guest;
        //         break;
        //     case 10:
        //          $total = ($package->price+600)*$request->num_guest;
        //         break;
        //     case 11:
        //          $total = ($package->price+500)*$request->num_guest;
        //         break;
        //     case 12:
        //          $total = ($package->price+400)*$request->num_guest;
        //         break;
        //     default:
        //          $total = $package->price;

        // }

         return Response::json(['total' => $booking_fee]);

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
