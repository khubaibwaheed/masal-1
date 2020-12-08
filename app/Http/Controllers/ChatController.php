<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\chatModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\masalMail;
use App\User;
use App\emails;
class ChatController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }
        //Retailer Chat Room
    public function chat()
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
        $chat=chatModel::where('senderId',$id)->orWhere('receiver',$id)->orderBy('id', 'desc')->get();
        $marker=chatModel::where('receiver',$id)->update(['marker'=>0]);
        return view("retailer.chat")->with('chat',$chat);
    }

    //Retailer Send Message
    public function send_message(Request $request)
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
         if(isset($request->send) && $request->send == 'Send')
         {
        if(!isset($request->attachment)) {
      $this->validate($request,[
       'message'=>'required'
      ]);
         }
         if(!isset($request->message)) {
            $this->validate($request,[
             'attachment'=>'required'
            ]);
               }
        $id=Auth::user()->id;
        $admin=User::where('userRole',1)->first();
        $adminId=$admin->id;
        $chat=new chatModel;
        $chat->message=$request->message;
        if(isset($request->attachment))
        {
        $path1 = $request->attachment->store('file');
        $chat->file=$path1;
        }
        $chat->sender='retailer';
        $chat->senderId=$id;
        $chat->receiver=$adminId;
        $chat->marker=1;
        $chat->save();

            $all_admin=User::where('userRole',1)->get();
            $welcome=emails::where('name','Retailer_chat')->first();
            if($welcome->status == 1)
            {
                foreach($all_admin as $row)
                {
                $mail=[
                    'title'=>$welcome->subject,
                    'body'=>$welcome->message
                ];
                $subject=$welcome->subject;
                Mail::to($row->email)->send(new masalMail($mail,$subject));
                }
            }


        return redirect()->back();
    
    }
}


 //Admin Chat Box
 public function adminChat()
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
        ['status', '=', 1], 
    ])->get();

    return view('admin.chatRoom')->with('stokist',$stokist);

 }



  //Admin Individual Chat
  public function start_chat($retailer)
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
      $id=Auth::user()->id;
      $user=User::find($retailer);
      $chat=chatModel::whereIn('senderId',[$retailer, $id])->whereIn('receiver', [$retailer, $id])->orderBy('id', 'desc')->get();
      $name=$user->name;
      $marker=chatModel::where('receiver',$id)->where('senderId',$retailer)->update(['marker'=>0]);

    
      return view("admin.indivChat")->with(array('chat'=>$chat,'name'=>$name,'retailer'=>$retailer));
  }


  //Message send to database
  public function adminSendMessage(Request $request)
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
       if(isset($request->send) && $request->send == 'Send')
       {
            if(!isset($request->attachment)) {
            $this->validate($request,[
            'message'=>'required'
            ]);
            }
            if(!isset($request->message)) {
            $this->validate($request,[
            'attachment'=>'required'
            ]);
                     }
      $id=Auth::user()->id;
      $chat=new chatModel;
      $chat->message=$request->message;
      if(isset($request->attachment))
      {
      $path1 = $request->attachment->store('file');
      $chat->file=$path1;
      }
      $chat->sender='admin';
      $chat->senderId=$id;
      $chat->receiver=$request->id;
      $chat->marker=1;
      $chat->save();

      $retailer=User::find($request->id);

      $welcome=emails::where('name','admin_chat')->first();
      if($welcome->status == 1)
      {
          $mail=[
              'body'=>$welcome->message
          ];
          $subject=$welcome->subject;
          Mail::to($retailer->email)->send(new masalMail($mail,$subject));
      }
      return redirect()->back();
  
  }
}

//Delete Me Retailer message
public function del_me($id)
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
     $msg=chatModel::find($id);
     if($msg->status == 0)
     {
     $msg->status=1;
     $msg->save();
     }
     else
     {
         $msg->delete();
     }
    
         return redirect()->back()->with('success','Your Message Deleted');
    
}



//Delete Me Admin message
public function del_me_admin($id)
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
     $msg=chatModel::find($id);
     if($msg->status == 0)
     {
     $msg->status=2;
     $msg->save();
     }
     else
     {
         $msg->delete();
     }
         return redirect()->back()->with('success','Your Message Deleted');
    
}

//Delete message From Retailer
public function del_every($id)
{
     $msg=chatModel::find($id);
     $msg->delete();
     return redirect()->back()->with('success','Your Message Deleted');
     
}


//Delete All Chat of Retailer
public function retailer_chat_del()
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
     $user=Auth::user();
     $id=$user->id;
     $msg=chatModel::where('senderId',$id)->orWhere('receiver',$id)->get();
     foreach($msg as $row)
     {
        if($row->status == 0)
        {
        $row->status=1;
        $row->save();
        }
        else
        {
            $row->delete();
        }
     }
     return redirect()->back()->with('success','Your Messages Deleted');

}


//Delete All Chat of Admin
public function del_admin_chat($id)
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
     $msg=chatModel::where('senderId',$id)->orWhere('receiver',$id)->get();
     foreach($msg as $row)
     {
        if($row->status == 0)
        {
        $row->status=2;
        $row->save();
        }
        else
        {
            $row->delete();
        }
          
     }
     return redirect()->back()->with('success','Retailer Chat Deleted');

}


}
