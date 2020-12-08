<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\masalMail;
use App\User;
use App\products;
use App\country;
use App\state;
use App\city;
use App\buyer_country;
use App\buyer_state;
use App\buyer_city;
use App\Category;
use App\retailerOrder;
use App\footer;
use App\emails;
class AuthController extends Controller
{
   
    public function register(Request $request)
    {
        if(isset($request->register) && $request->register == 'Submit')
        {
            $this->validate($request,[
                'contact'=>'required',
                'email'=>'required|email|unique:users,email',
                'phone'=>'required|unique:users,phone',
                'address'=>'required',
                'country'=>'required',
                'state'=>'required',
                'city'=>'required',
                'post'=>'required|numeric',
                'registration'=>'required|unique:users,registrationNumber',
                'website'=>'required',
                'facebook'=>'required',
                'Instagram'=>'required'
            ]);
            $country_id=country::where('id',$request->country)->first();
            $country_name=$country_id->name;
    
            $state_id=state::where('id',$request->state)->first();
            $state_name=$state_id->name;
    
    
           // $city_id=city::where('id',$request->city)->first();
            $city_name=$request->city;

            $country_checker = buyer_country::where('country',$country_name)->first();
            if(isset($country_checker))
            {
              $state_checker = buyer_state::where('state',$state_name)->where('country',$country_checker->id)->first();

                
                if(!isset($state_checker))
                {
                $state=new buyer_state;
                $state->state=$state_name;
                $state->country=$country_checker->id;
                $state->save();
                
                $city=new buyer_city;
                $city->city=$city_name;
                $city->state=$state->id;
                $city->save();
                }
                else
                {
                    $city_checker = buyer_city::where('city',$city_name)->where('state',$state_checker->id)->first();
                    if(!isset($city_checker))
                    {
                        $city=new buyer_city;
                        $city->city=$city_name;
                        $city->state=$state_checker->id;
                        $city->save();
                    }
                }
            }
            else
            {
               
                $country=new buyer_country;
                $country->country=$country_name;
                $country->save();

                $state=new buyer_state;
                $state->state=$state_name;
                $state->country=$country->id;
                $state->save();

                $city=new buyer_city;
                $city->city=$city_name;
                $city->state=$state->id;
                $city->save();
            }

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

           $user=new User;
           $user->name=$request->contact;
           $user->email=$request->email;
           $user->password=bcrypt('12345678');
           $user->phone=$request->phone;
           $user->address=$request->address;
           $user->country=$country_name;
           $user->state=$state_name;
           $user->city=$city_name;
           $user->post=$request->post;
           $user->registrationNumber=$request->registration;
           $user->website=$request->website;
           $user->facebook=$request->facebook;
           $user->instagram=$request->Instagram;
           $user->userRole=2;
           $user->lng=$geoloc['results'][0]['geometry']['location']['lng'];
           $user->lat=$geoloc['results'][0]['geometry']['location']['lat'];
           $user->save();
           $email=emails::where('name','register')->first();
            if($email->status == 1)
            {
            $details=[
                'title'=>$email->subject,
                'body'=>$email->message
            ];
            $subject=$email->subject;
            Mail::to($request->email)->send(new masalMail($details,$subject));
            }
            $admin=User::where('userRole',1)->get();
            $welcome=emails::where('name','new_user')->first();
            if($welcome->status == 1)
            {
                foreach($admin as $row)
                {
                $mail=[
                    'title'=>$welcome->subject,
                    'body'=>$welcome->message
                ];
                $subject=$welcome->subject;
                Mail::to($row->email)->send(new masalMail($mail,$subject));
                }
            }
            return redirect()->back()->with('success', 'Your Account is Under Review');
        }
        $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(8)->get();
        $collection=Category::all();
        $countries=country::all();
        $foot=footer::where('id',1)->first();

        return view('pages.retailerrequest')->with(array('foot'=>$foot,'countries'=>$countries,'collection'=>$collection,'gallery'=>$gallery));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::check()) {
            if(Auth::user()->userRole == 1)
            {
             return redirect('/dashboard');
            }
         }
        if(isset($request->email) && isset($request->password))
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if($user->status == 1 && $user->userRole == 1)
                {
                    return redirect('/dashboard');
                }
               else
                {
                    Auth::logout();
                    if($user->userRole != 1)
                    {
                        return redirect()->back()->with('error', 'Wrong Credantials');
                    }
                    
                    if($user->status == 0)
                    {
                        return redirect()->back()->with('error', 'Your Account is under review');
                    }
                    else if($user->status == 2)
                    {
                        return redirect()->back()->with('error', 'Your Account Rejected');
                    }
                    else if($user->status == 3)
                    {
                        return redirect()->back()->with('error', 'Your Account Deleted');
                    }
                }
            }
            else
            {
                return redirect()->back()->with('error', 'Wrong Credantials');
            }
        }
        return view('admin.index');
    }

    //Admin Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }
    

    //Retailer Logout
    public function retailerlogout()
    {
        $user=Auth::user()->id;
        Auth::logout();
        $status=0;
        return redirect('/')->with('status',$status);
    }

    //Retailer Login
    public function retailerlogin(Request $request)
    {
        if (Auth::check()) {
            if(Auth::user()->userRole == 2)
            {
             return redirect('/retailerdash');
            }
         }
        if(isset($request->email) && isset($request->password))
        {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if($user->status == 1 && $user->userRole == 2)
                {
                    return redirect('/retailerdash');
                }
               else
                {
                    Auth::logout();
                    if($user->userRole != 2)
                    {
                        return redirect()->back()->with('error', 'Wrong Credantials');
                    }
                    
                    if($user->status == 0)
                    {
                        return redirect()->back()->with('error', 'Your Account is under review');
                    }
                    else if($user->status == 2)
                    {
                        return redirect()->back()->with('error', 'Your Account Rejected');
                    }
                    else if($user->status == 3)
                    {
                        return redirect()->back()->with('error', 'Your Account Deleted');
                    }
                }
            }
            else
            {
                return redirect()->back()->with('error', 'Wrong Credantials');
            }
        }
        $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(8)->get();
        $collection=Category::all();
        $foot=footer::where('id',1)->first();

        return view('pages.index')->with(array('foot'=>$foot,'collection'=>$collection,'gallery'=>$gallery));

    }



    function get_lat_long($address) {
        $prepAddr = str_replace(' ','+',$address);
        $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyAC1JgWjHuNrBIUCdQ_PEXlJek_HoLcM10');
        $output= json_decode($geocode);
        print_r($output);
        exit;
        $lat = $output->results[0]->geometry->location->lat;
        $long = $output->results[0]->geometry->location->lng;
        // if ($address == '') {
        // $address = "South Ogden, UT";
        // }
        // $address = str_replace(" ", "+", $address);
        // $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=AIzaSyAC1JgWjHuNrBIUCdQ_PEXlJek_HoLcM10");
        // $json = json_decode($json);
        // if (isset($json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'}) &&
        // isset($json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'})) {
        // $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        // $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
        // } else {
        // $lat = '';
        // $long = '';
        // }
        // if (isset($json->results[0]->address_components[4]->long_name)) {
        // $address = $json->{'results'}[0]->{'address_components'};
        // return $json->results[0]->address_components[4]->long_name;
        // } else {
        // return '';
        // }
        $result = array(
        'lat' => $lat,
        'long' => $long
        );
        return $result;
        }


}
