<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\masalMail;
use App\products;
use App\Category;
use App\User;
use App\ColourSwatches;
use App\feedback;
use App\retailerOrder;
use App\homePage;
use App\newPages;
use App\size;
use App\emails;
use App\additional;
use App\real;
use App\footer;
use App\menu;
use Carbon\Carbon;

class CrmController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

     

           



    //Pages List
    public function customPage()
    {
        if(Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }

          $page=newPages::get();

          return view('admin.customPage')->with(array('page'=>$page));

    }


     //Add Page Name
     public function add_page(Request $request)
     {
         if(Auth::check()) {
             if($this->user->userRole != 1)
             {
              return redirect('/admin');
             }
          }
          else
          {
              return redirect('/admin');
          }
          if(isset($request->submit) && $request->submit == 'Submit')
          {
              $this->validate($request,[
                  'page'=>'required|unique:new_pages,name|unique:menus,name',
                  'key'=>'required'
              ]);
           $page=new newPages;
           $page->name=$request->page;
           $page->keyword=$request->key;
           $page->h1='Enter 1st Heading';
           $page->t1='Enter Text';
           $page->t2='Enter Text';
           $page->t3='Enter Text';
           $page->h2='Enter 2nd Heading';
           $page->p1='Enter Text';
           $page->t4='Enter Text';
           $page->t5='Enter Text';
           $page->t6='Enter Text';
           $page->h3='Enter 3rd Heading';
           $page->t7='Enter Text';
           $page->p2='Enter Text';
           $page->t8='Enter Text';
           $page->p3='Enter Text';
           $page->t9='Enter Text';
           $page->p4='Enter Text';
           $page->t10='Enter Text';
           $page->p5='Enter Text';
           $page->t11='Enter Text';
           $page->save(); 
           $menu=new menu;
           $menu->name=$request->page;
           $menu->header_status=2;
           $menu->footer_status=2;
           $menu->status=1;
           $menu->save();
           $new=$request->page;
           return redirect()->route('newPage', ['new' => $new]);
          }
     }


     //Pages List
    public function newPage($new)
    {
        if(Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }
         $page=newPages::where('name',$new)->first();
         return view('admin.new')->with('page',$page);
    }


      //Delete Page
    public function del_page($name)
    {
        if(Auth::check()) {
            if($this->user->userRole != 1)
            {
             return redirect('/admin');
            }
         }
         else
         {
             return redirect('/admin');
         }

          $page=newPages::where('name',$name)->first();
          $menu=menu::where('name',$name)->first();
          $page->delete();
          $menu->delete();
          return redirect()->back()->with('success','Page Deleted Successfully');

    }


    public function new1(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->h1=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function new2(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->t1=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
     }


     public function new3(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->t2=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function new4(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->t3=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function new5(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->p1=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function new6(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->t4=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function new7(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->t5=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function new8(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->t6=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function new9(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->h2=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function new10(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->h3=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function new11(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->t7=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function new12(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->p2=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function new13(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->t8=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function new14(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->p3=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function new15(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->t9=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function new16(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->p4=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }



     public function new17(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->t10=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function new18(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->p5=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function new19(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $page->t11=$request->data;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function new20(Request $request)
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
        if(isset($request->submit))
        {

            $messages = [
                'dimensions' => 'Allowed Image Dimension: Width: 1500 And Height: 1500',
            ];

            $this->validate($request,[
                'data'=>'dimensions:min_width=1500,max_width=1500,min_height=1500,max_height=1500'
            ],$messages);

            $page=newPages::where('name',$request->name)->first();
            $del=$page->image8;
            Storage::delete($del);
            $path1 = $request->data->store('custom');
            $page->image8=$path1;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }


     public function new21(Request $request)
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
        if(isset($request->submit))
        {

            $messages = [
                'dimensions' => 'Allowed Image Dimension: Width: 250px And Height: 250px',
            ];

            $this->validate($request,[
                'data'=>'dimensions:min_width=250,max_width=250,min_height=250,max_height=250'
            ],$messages);

            $page=newPages::where('name',$request->name)->first();
            $del=$page->image4;
            Storage::delete($del);
            $path1 = $request->data->store('custom');
            $page->image4=$path1;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }

     public function new22(Request $request)
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
        if(isset($request->submit))
        {

            $messages = [
                'dimensions' => 'Allowed Image Dimension: Width: 250px And Height: 250px',
            ];

            $this->validate($request,[
                'data'=>'dimensions:min_width=250,max_width=250,min_height=250,max_height=250'
            ],$messages);

            $page=newPages::where('name',$request->name)->first();
            $del=$page->image5;
            Storage::delete($del);
            $path1 = $request->data->store('custom');
            $page->image5=$path1;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }

     public function new23(Request $request)
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
        if(isset($request->submit))
        {

            $messages = [
                'dimensions' => 'Allowed Image Dimension: Width: 250px And Height: 250px',
            ];

            $this->validate($request,[
                'data'=>'dimensions:min_width=250,max_width=250,min_height=250,max_height=250'
            ],$messages);

            $page=newPages::where('name',$request->name)->first();
            $del=$page->image6;
            Storage::delete($del);
            $path1 = $request->data->store('custom');
            $page->image6=$path1;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }


     public function new24(Request $request)
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
        if(isset($request->submit))
        {

            $messages = [
                'dimensions' => 'Allowed Image Dimension: Width: 250px And Height: 250px',
            ];

            $this->validate($request,[
                'data'=>'dimensions:min_width=250,max_width=250,min_height=250,max_height=250'
            ],$messages);

            $page=newPages::where('name',$request->name)->first();
            $del=$page->image7;
            Storage::delete($del);
            $path1 = $request->data->store('custom');
            $page->image7=$path1;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }



     public function new25(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $del=$page->image1;
            Storage::delete($del);
            $path1 = $request->data->store('custom');
            $page->image1=$path1;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }


     public function new26(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $del=$page->image2;
            Storage::delete($del);
            $path1 = $request->data->store('custom');
            $page->image2=$path1;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }


     public function new27(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $del=$page->image3;
            Storage::delete($del);
            $path1 = $request->data->store('custom');
            $page->image3=$path1;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }
     public function new28(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $del=$page->i1;
            Storage::delete($del);
            $path1 = $request->data->store('custom');
            $page->i1=$path1;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }
     public function new29(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $del=$page->i2;
            Storage::delete($del);
            $path1 = $request->data->store('custom');
            $page->i2=$path1;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }
     public function new30(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $del=$page->i3;
            Storage::delete($del);
            $path1 = $request->data->store('custom');
            $page->i3=$path1;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }
     public function new31(Request $request)
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
        if(isset($request->submit))
        {

            $page=newPages::where('name',$request->name)->first();
            $del=$page->i4;
            Storage::delete($del);
            $path1 = $request->data->store('custom');
            $page->i4=$path1;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }


     public function custom_page($name)
     {
        $latestCat=Category::orderBy('created_at', 'desc')->limit(8)->get();

        $latestProduct=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(8)->get();

        $smallProduct=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(8)->get();

        $gallery=products::orderBy('created_at', 'desc')->where('delete_status',0)->limit(8)->get();

        $collection=Category::all();
       
        $foot=footer::where('id',1)->first();
         $page=newPages::where('name',$name)->first();
         return view('pages.page')
         ->with(array('page'=>$page,'foot'=>$foot,'collection'=>$collection,'gallery'=>$gallery,'latestProduct'=>$latestProduct,'latestCat'=>$latestCat,'smallProduct'=>$smallProduct));
     }

     //Video Upload
     public function video(Request $request)
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
        if(isset($request->submit))
        {
            $page=newPages::where('name',$request->name)->first();
            $del=$page->video;
            Storage::delete($del);
            $path1 = $request->data->store('custom');
            $page->video=$path1;
            $page->save();
            if($page->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }


      //Video Upload
      public function video_home(Request $request)
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
         if(isset($request->submit))
         {
             $page=homePage::first();
             $del=$page->video;
             Storage::delete($del);
             $path1 = $request->data->store('custom');
             $page->video=$path1;
             $page->save();
             if($page->save())
             {
             return redirect()->back()->with('success', 'Image Updated');
          }
          else
          {
             return redirect()->back()->with('error', 'Image Not Updated');
          }
         }
           
          
      }


}
