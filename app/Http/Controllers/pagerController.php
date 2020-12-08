<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\products;
use App\Category;
use App\country;
use App\state;
use App\city;
use App\buyer_country;
use App\buyer_state;
use App\buyer_city;
use App\User;
use App\feedback;
use App\visitor;
use App\homePage;
use App\footer;
use App\real;
use App\retailer_bride;
use App\wedding;
use Illuminate\Support\Facades\Storage;
class pagerController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }
    public function manageHome()
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


          $latestCat=Category::orderBy('created_at', 'desc')->limit(8)->get();

          $latestProduct=products::orderBy('created_at', 'desc')->limit(6)->get();
  
          $smallProduct=products::orderBy('created_at', 'desc')->limit(8)->get();
  
          $gallery=products::orderBy('created_at', 'desc')->limit(8)->get();
  
          $collection=Category::all();

          $home=homePage::first();

          return view('admin.home')->with(array('home'=>$home,'collection'=>$collection,'gallery'=>$gallery,'latestProduct'=>$latestProduct,'latestCat'=>$latestCat,'smallProduct'=>$smallProduct));

     }

     public function head1(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name1=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function head2(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name2=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function head3(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name3=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }



     public function head4(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name4=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     
     public function head5(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name5=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function head6(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name6=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function head7(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name7=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }



     public function head8(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name8=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function head9(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name9=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }



     public function head10(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name10=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function head11(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name11=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function head12(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name12=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }



     public function head13(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name13=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }



     public function head14(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name14=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }



     public function head15(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name15=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }



     public function head16(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name16=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function head17(Request $request)
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
            $home=homePage::where('id',1)->first();
            $home->name17=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }



     public function head18(Request $request)
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
            $home=homePage::where('id',1)->first();
            $del=$home->image;
            $home->image=$request->data;
            $path1 = $request->data->store('products');
            $home->image=$path1;
            Storage::delete($del);
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Image Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Updated');
         }
        }
          
         
     }



     public function manageFooter()
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


          $home=footer::first();

          return view('admin.footer')->with(array('home'=>$home));

     }


     public function foot1(Request $request)
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
            $home=footer::where('id',1)->first();
            $home->h1=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function foot2(Request $request)
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
            $home=footer::where('id',1)->first();
            $home->p=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function foot3(Request $request)
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
            $home=footer::where('id',1)->first();
            $home->h2=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function foot4(Request $request)
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
            $home=footer::where('id',1)->first();
            $home->h3=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }

     public function foot5(Request $request)
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
            $home=footer::where('id',1)->first();
            $home->h4=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function foot6(Request $request)
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
            $home=footer::where('id',1)->first();
            Storage::delete($home->logo);
            $path =  $request->data->store('products');
            $home->logo=$path;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     //Tags

     public function foot7(Request $request)
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
            $home=footer::where('id',1)->first();
            $home->t1=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }


     public function foot8(Request $request)
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
            $home=footer::where('id',1)->first();
            $home->t2=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }





     public function foot9(Request $request)
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
            $home=footer::where('id',1)->first();
            $home->t3=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }






     public function foot10(Request $request)
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
            $home=footer::where('id',1)->first();
            $home->t4=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }





     public function foot11(Request $request)
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
            $home=footer::where('id',1)->first();
            $home->t5=$request->data;
            $home->save();
            if($home->save())
            {
            return redirect()->back()->with('success', 'Content Updated');
         }
         else
         {
            return redirect()->back()->with('error', 'Content Not Updated');
         }
        }
          
         
     }



     public function manageReal()
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


          $product= products::orderBy('id','desc')->where('delete_status',0)->get();

          return view('admin.edit_real')->with(array('product'=>$product));

     }




     public function add_real($id)
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


          $real=new real;
          $real->product=$id;
          $real->save();
          if($real->save())
          {
              return redirect()->back()->with('success', 'Product Added As Real Bride');
           }
           else
           {
              return redirect()->back()->with('error', 'Product Not Added As Real Bride');
           }

     }




     public function del_real($id)
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


          $real=real::where('product',$id)->first();
          $real->delete();
          if($real->delete())
          {
              return redirect()->back()->with('success', 'Product Removed From Real Bride');
           }
           else
           {
              return redirect()->back()->with('error', 'Product Not Removed From Real Bride');
           }

     }

     

      // Real Bride Request Page
      public function real_request_list()
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
           $retailer=user::where('userRole',2)->where('status',1)->get();
           return view('admin.real_request_list')->with(array('retailer'=>$retailer));
      }
      // Real Bride Request Page
      public function weds($id)
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
           $weddings=wedding::where('retailer',$id)->get();
           return view('admin.wedding_list')->with(array('weddings'=>$weddings));
      }


     // Real Bride Request Page
     public function active_request($id,$value)
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
          $real=retailer_bride::find($id);
          if($value == 3)
          {
            $path=$real->file;
            Storage::delete($path);
            $real->delete();
            return redirect()->back()->with('success','Bride Deleted From Real Bride List');
          }
          $real->status=$value;
          $real->save();
          if($value == 2)
          {
          return redirect()->back()->with('success','Bride Uploaded as Real Bride');
          }
          if($value == 1)
          {
          return redirect()->back()->with('success','Bride Remove as Real Bride');
          }
    }


}
