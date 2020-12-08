<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\masalMail;
use App\emails;
use App\products;
use App\User;
use App\retailerOrder;
use App\Category;
use App\wedding;
use App\retailer_bride;
class RetailerController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    //Dashboard Page
    public function index()
    {
        if (Auth::check()) {
            if($this->user->userRole != 2)
            {
             return redirect('/');
            }
            if($this->user->status != 1)
            {
             return redirect('/retailerlogout');
            }
         }
         else
         {
             return redirect('/');
         }
         $collection=Category::orderBy('created_at', 'desc')->limit(6 )->get();
         $categories=Category::all();
        return view('retailer.retailerdash')->with(array('categories'=>$categories,'collection'=>$collection));
    }

    //Collection Page
    public function collection(Request $request)
    {
        if (Auth::check()) {
            if($this->user->userRole != 2)
            {
             return redirect('/');
            }
            if($this->user->status != 1)
            {
             return redirect('/retailerlogout');
            }
         }
         else
         {
             return redirect('/');
         }
         $status=0;
         $cat_product = '';
         if(isset($request->category))
         {
            $products=products::where('category',$request->category)->where('delete_status',0)->orderBy('created_at', 'desc')->get();
            $cat_log=Category::find($request->category);
            $cat_product=$cat_log->name;
            $status=1;
         }
         else
         {
         $products=products::orderBy('created_at', 'desc')->where('delete_status',0)->get();
         }
         $category=Category::all();
         return view('retailer.collection')->with(array('cat_product'=>$cat_product,'category'=>$category,'products'=>$products,'status'=>$status));
    }

     //Orders Page
     public function orders()
     {
         if (Auth::check()) {
             if($this->user->userRole != 2)
             {
              return redirect('/');
             }
             if($this->user->status != 1)
             {
              return redirect('/retailerlogout');
             }
          }
          else
          {
              return redirect('/');
          }
          $id=Auth::user()->id;
          $total=retailerOrder::where('RetailerId',$id)->where('payment','Done')->count();
          $payment=retailerOrder::orderBy('id', 'desc')->where('RetailerId',$id)->get();
          $Summary=retailerOrder::orderBy('id', 'desc')->where('RetailerId',$id)->where('payment','Done')->get();
          return view('retailer.order')->with(array('Summary'=>$Summary,'total'=>$total,'payment'=>$payment));
     }


      //Orders Delete
      public function retailer_del_order($id)
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
              {
               return redirect('/');
              }
              if($this->user->status != 1)
              {
               return redirect('/retailerlogout');
              }
           }
           else
           {
               return redirect('/');
           }
           $order=retailerOrder::find($id);
           $order->delete();
           return redirect()->back()->with('success', 'Order Deleted');
      }

       //Category Details
       public function cat_detail($id)
       {
           if (Auth::check()) {
               if($this->user->userRole != 2)
               {
                return redirect('/');
               }
               if($this->user->status != 1)
               {
                return redirect('/retailerlogout');
               }
            }
            else
            {
                return redirect('/');
            }
           $products=products::where('category',$id)->get();
           $category=Category::find($id);
           return view('retailer.products')->with(array('products'=>$products,'category'=>$category));
       }

     public function account(Request $request)
     {
        if (Auth::check()) {
            if($this->user->userRole != 2)
            {
             return redirect('/');
            }
            if($this->user->status != 1)
            {
             return redirect('/retailerlogout');
            }
         }
         else
         {
             return redirect('/');
         }
       
          if(isset($request->update) && $request->update == 'update')
          {
                  $this->validate($request,[
                  'email'=>'required|email'
              ]);

                
                $update = $request->all();
                $email_checker = $this->update_email($update['id'],$update['email']);
               
                if($email_checker['canUpdateEmail'] != 1)
                {
                    unset($update['email']); 
                }
                $uploadId = $update['id'];
                unset($update['id']);
                unset($update['_token']);
                unset($update['update']);
                User::where('id', $uploadId)->update($update);
             return redirect()->back()->with('success', 'Your account Updated '.$email_checker['message']);
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




        public function passwordUpdate(Request $request)
     {
        if (Auth::check()) {
            if($this->user->userRole != 2)
            {
             return redirect('/');
            }
            if($this->user->status != 1)
            {
             return redirect('/retailerlogout');
            }
         }
         else
         {
             return redirect('/');
         }
       
          if(isset($request->update) && $request->update == 'update')
          {
                  $this->validate($request,[
                    'password'=>'required|min:8|same:repassword',
              ]);
              $id=$request->id;
              
              $user=User::find($id);
              $user->password=bcrypt($request->password);
              $user->save();
             return redirect()->back()->with('success', 'Your Password Updated ');
            }


     }



     public function searcher(Request $request)
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
          $status = 0;
         if(isset($request['cat']) && $request['id'] != '') {
           $products = products::where("category", $request['cat'])->get();
           $status = 1;
         }
         $data_array = [
             "success" => [
             "status" => $status,
             ]
         ];
         return response()->json($data_array);
 
     }



      //Real Bride Images and Videos Page
      public function upload_real()
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
              {
               return redirect('/');
              }
              if($this->user->status != 1)
              {
               return redirect('/retailerlogout');
              }
           }
           else
           {
               return redirect('/');
           }
           $file=retailer_bride::where('retailerId',Auth::user()->id)->orderBy('id','desc')->get();
           $total=retailer_bride::where('retailerId',Auth::user()->id)->count();
           $wedding=wedding::where('retailer',Auth::user()->id)->count();
           $wed=wedding::where('retailer',Auth::user()->id)->get();
          return view('retailer.real')->with(array('wed'=>$wed,'wedding'=>$wedding,'file'=>$file,'total'=>$total));
      }


      //Real Bride Images and Videos Page
      public function retailer_wedding()
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
              {
               return redirect('/');
              }
              if($this->user->status != 1)
              {
               return redirect('/retailerlogout');
              }
           }
           else
           {
               return redirect('/');
           }
           $wedding=wedding::where('retailer',Auth::user()->id)->get();
           $total=wedding::where('retailer',Auth::user()->id)->count();
          return view('retailer.wedding')->with(array('total'=>$total,'wedding'=>$wedding));
      }



       //Real Bride Images and Videos Page
       public function wedding_send(Request $request)
       {
           if (Auth::check()) {
               if($this->user->userRole != 2)
               {
                return redirect('/');
               }
               if($this->user->status != 1)
               {
                return redirect('/retailerlogout');
               }
            }
            else
            {
                return redirect('/');
            }
           if(isset($request->submit))
           {
               $this->validate($request,[
                   'wedding'=>'required'
               ]);
               $wedding= new wedding;
               $wedding->name=$request->wedding;
               $wedding->retailer=Auth::user()->id;
               $wedding->save();
               return redirect()->back()->with('success','Wedding Added Successfully');
           }
       }



      //Real Bride Images and Videos to DB
      public function bride_send(Request $request)
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
              {
               return redirect('/');
              }
              if($this->user->status != 1)
              {
               return redirect('/retailerlogout');
              }
           }
           else
           {
               return redirect('/');
           }
           if(isset($request->submit_img) && $request->submit_img == 'Upload')
           {
               $this->validate($request,[
                   'image'=>'required|image',
                   'wedding'=>'required'
               ]);
               $total=retailer_bride::where('wedding',$request->wedding)->count();
               if($total > 9)
               {
                return redirect()->back()->with('error','You can upload only 10 Brides in a Wedding');
               }
               $file=new retailer_bride;
               $file->retailerId=Auth::user()->id;
               $file->wedding=$request->wedding;
               $path=$request->image->store('real');
               $file->file=$path;
               $file->status=1;
               $file->type='image';
               $file->save();
               if($file->save())
               {
                        $admin=User::where('userRole',1)->get();
                        $welcome=emails::where('name','real_bride_get')->first();
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
                   return redirect()->back()->with('success','Your Real Bride Image is Uploaded');
               }

           }

           if(isset($request->submit_vid) && $request->submit_vid == 'Upload')
           {
            if(!isset($request->link))
            {
            $this->validate($request,[
                'video'=>'required'
            ]);
            }
            if(!isset($request->video))
            {
            $this->validate($request,[
                'link'=>'required'
            ]);
            }
            $total=retailer_bride::where('wedding',$request->wedding)->count();
            if($total > 9)
            {
             return redirect()->back()->with('error','You can upload only 10 Brides in a Wedding');
            }

               $file=new retailer_bride;
               //Video
               if(isset($request->video))
               {
               $this->validate($request,[
                   'video'=>'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
               ]);
               $path=$request->video->store('real');
               $file->file=$path;
               $file->type='video';
               }
               //Video Link
               if(isset($request->link))
               {
               $this->validate($request,[
                   'link'=>'required'
               ]);
               $video_id = explode("?v=", $request->link);
               $file->file='https://www.youtube.com/embed/'.$video_id[1];
               $file->type='link';
               }
               $file->retailerId=Auth::user()->id;
               $file->wedding=$request->wedding;
               $file->status=1;
               $file->save();
               if($file->save())
               {
                        $admin=User::where('userRole',1)->get();
                        $welcome=emails::where('name','real_bride_get')->first();
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
                   return redirect()->back()->with('success','Your Real Bride Video is Uploaded');
               }

           }

      }

      //Real Bride Images and Videos Delete
      public function del_real_data($id)
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
              {
               return redirect('/');
              }
              if($this->user->status != 1)
              {
               return redirect('/retailerlogout');
              }
           }
           else
           {
               return redirect('/');
           }
           $file=retailer_bride::find($id);
           $path = $file->file;
           Storage::delete($path);
           $file->delete();
           return redirect()->back()->with('success','Your Real Bride Image is Deleted');
      }


      //Real Bride Images and Videos Delete
      public function del_wedding($id)
      {
          if (Auth::check()) {
              if($this->user->userRole != 2)
              {
               return redirect('/');
              }
              if($this->user->status != 1)
              {
               return redirect('/retailerlogout');
              }
           }
           else
           {
               return redirect('/');
           }
           $wedding = wedding::find($id);
           $real = retailer_bride::where('wedding',$id)->get();
           foreach($real as $row)
           {
            if($row->type == 'image' || $row->type == 'video')
            {
                $path = $row->file;
                Storage::delete($path);
            }
            $row->delete();
           }
           $wedding->delete();
           return redirect()->back()->with('success','Your Wedding is Deleted');
      }

}