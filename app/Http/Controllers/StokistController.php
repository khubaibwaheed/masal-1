<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\masalMail;
use App\products;
use App\User;
use App\emails;
class StokistController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }


 // Stokist Page
    public function index()
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $stokist=User::where([
            ['userRole', '=', 2],
            ['status', '!=', 0], 
        ])->get();
        return view('admin.stockist')->with('stokist',$stokist);
    }

    // Stokist Request
    public function stockistsrequest()
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
       
         $stokist=User::where([
             ['userRole', '=', 2],
             ['status', '=', 0], 
         ])->get();

         return view('admin.stockistsrequest')->with('stokist',$stokist);

    }


    //Stokist Account status

    public function account($id,$value)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $stokist=User::find($id);
         $stokist->status=$value;
         $stokist->save();
         $email=$stokist->email;
         if($stokist->save())
            {
                if($value == 1)
                {
                    $temp=emails::where('name','Accept_account')->first();
                    if($temp->status == 1)
                    {
                    $details=[
                        'title'=>$temp->subject,
                        'body'=>$temp->message
                    ];
                    $subject=$temp->subject;
                    Mail::to($email)->send(new masalMail($details,$subject));
                    }
                    return redirect()->back()->with('success', 'Stokist Account Accepted');
                }
                if($value == 2)
                {
                    $temp=emails::where('name','Reject_account')->first();
                    if($temp->status == 1)
                    {
                    $details=[
                        'title'=>$temp->subject,
                        'body'=>$temp->message
                    ];
                    $subject=$temp->subject;
                    Mail::to($email)->send(new masalMail($details,$subject));
                    }
                    return redirect()->back()->with('success', 'Stokist Account Rejected');
                }
            }
         else
         {
            return redirect()->back()->with('error', 'Stokist Not Updated');
         }

    }

    //Stokist Delete
    public function stokistdelete($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
       
         $stokist=User::find($id);
         if($stokist->status==1 || $stokist->status==2)
         {
            $stokist->status=3;
            $stokist->save();
            if($stokist->save())
            {
                    return redirect()->back()->with('success', 'Stokist Account Suspended');
            }
         else
         {
            return redirect()->back()->with('error', 'Stokist Account Not Suspended');
         }
         }
         if($stokist->status==3)
         {
            $stokist->delete();
            return redirect()->back()->with('success', 'Stokist Account Deleted Permanently');
         }
         

    }

    //Stokist Edit Form Page

    public function stokistedit($id)
    {
        if (Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
        $Stokist= User::find($id);
        return view('admin.stokistedit')->with('Stokist',$Stokist);
    }


     //Stokist Edit From database

     public function stokisteditor(Request $request)
     {
         if (Auth::check()) {
             if($this->user->userRole != 1)
             {
              return redirect('/admin');
             }
          }
          else
          {
              return redirect('/admin');
          }
       
          if(isset($request->update) && $request->update == 'UPDATE')
          {
                  $this->validate($request,[
                  'name'=>'required',
                  'email'=>'required|email',
                  'phone'=>'required',
                  'address'=>'required',
                  'country'=>'required',
                  'state'=>'required',
                  'city'=>'required',
                  'registrationNumber'=>'required',
                  'website'=>'required',
                  'facebook'=>'required',
                  'Instagram'=>'required'
              ]);
                    $user=User::find($request->id);
                        $getLatLong = '';
                        $fullAddress = $request->address;
                        $fullAddress .= isset($request->city) ? ', ' . $request->city : '';
                        $fullAddress .= isset($request->country) ? ', ' . $request->country : '';
                        $cityclean = str_replace (" ", "+", $fullAddress);
                        $details_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $cityclean . "&key=AIzaSyAUx-lN2Wy6w2C0f2o14A3GgY--AqGiXPc";
                    
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $details_url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        $geoloc = json_decode(curl_exec($ch), true);
                        $user->lng=$geoloc['results'][0]['geometry']['location']['lng'];
                        $user->lat=$geoloc['results'][0]['geometry']['location']['lat'];
                        $user->save();
                        
                $update = $request->all();
                $email_checker = $this->update_email($update['id'],$update['email']);
                if($email_checker['canUpdateEmail'] != 1)
                {
                    unset($update['email']); 
                }
                $register_check =  $this->update_register($update['id'],$update['registrationNumber']);
                if($register_check['canUpdateRegister'] != 1)
                {
                    unset($update['registrationNumber']); 
                }
                $phone_check =  $this->update_phone($update['id'],$update['phone']);
                if($phone_check['canUpdatePhone'] != 1)
                {
                    unset($update['phone']); 
                }
                $uploadId = $update['id'];
                unset($update['id']);
                unset($update['_token']);
                unset($update['update']);
                User::where('id', $uploadId)->update($update);
             return redirect()->back()->with('success', 'Retailer Updated '.$email_checker['message'].$register_check['message1'].$phone_check['message2']);
            }
     }


     function update_email($id, $email) {
        $canUpdateEmail = 0;
        $message = '';
        //check if user has changed his email or that new email is not already taken
        $user = User::where('id', $id)->first();
        if ($email != $user->email) {
        $alreadyExist = User::where('email', $email)->count();
        if ($alreadyExist <= 0) {
        $canUpdateEmail = 1;
        } else {
        $message = ', This Email Already Exist! ';
        }
        }
        return array('canUpdateEmail' => $canUpdateEmail, 'message' => $message);
        }


        function update_register($id, $register) {
            $canUpdateRegister = 0;
            $message1 = '';
            //check if user has changed his email or that new email is not already taken
            $user = User::where('id', $id)->first();
            if ($register != $user->registrationNumber) {
            $alreadyExist = User::where('registrationNumber', $register)->count();
            if ($alreadyExist <= 0) {
            $canUpdateRegister = 1;
            } else {
            $message1 =', Registration Number already exist!';
            }
            }
            return array('canUpdateRegister' => $canUpdateRegister, 'message1' => $message1);
            }



            function update_phone($id, $phone) {
                $canUpdatePone = 0;
                $message2 = '';
                //check if user has changed his email or that new email is not already taken
                $user = User::where('id', $id)->first();
                if ($phone != $user->phone) {
                $alreadyExist = User::where('phone', $phone)->count();
                if ($alreadyExist <= 0) {
                $canUpdatePone= 1;
                } else {
                $message2 =', phone Number already exist!';
                }
                }
                return array('canUpdatePhone' => $canUpdatePone, 'message2' => $message2);
                }
    




}
