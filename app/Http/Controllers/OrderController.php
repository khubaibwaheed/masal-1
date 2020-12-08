<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\products;
use App\retailerOrder;
use App\new_order;
use App\User;
use Carbon\Carbon;
class OrderController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }



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
         $usersWithOrders = User::select('users.id', 'users.name')
            ->where('userRole', 2)->where('status', 1)
            ->withCount('orders')
            ->with('orders')->has('orders')->get();

            $todayOrder=retailerOrder::whereDate('created_at', '=', Carbon::today())->count();
            $monthOrder=retailerOrder::whereMonth('created_at', '=', Carbon::now()->month)->count();
            $lastmonthOrder=retailerOrder::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->count();
       
        return view('admin.order')->with(array('lastmonthOrder'=>$lastmonthOrder,'todayOrder'=>$todayOrder,'monthOrder'=>$monthOrder,'orders'=>$usersWithOrders));
    }


    // Monthwise orders
    public function dater($status)
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
        
            $todayOrder=retailerOrder::whereDate('created_at', '=', Carbon::today())->count();
            $monthOrder=retailerOrder::whereMonth('created_at', '=', Carbon::now()->month)->count();
            $lastmonthOrder=retailerOrder::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->count();
           if($status == 'today')
           {
               $dater=retailerOrder::whereDate('created_at', '=', Carbon::today())->get();
           }
           if($status == 'month')
           {
               $dater=retailerOrder::whereMonth('created_at', '=', Carbon::now()->month)->get();
           }
           if($status == 'last')
           {
               $dater=retailerOrder::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get();

           }
        return view('admin.daterorder')->with(array('lastmonthOrder'=>$lastmonthOrder,'todayOrder'=>$todayOrder,'monthOrder'=>$monthOrder,'dater'=>$dater));
    }

    //Retailer Order Delete
    public function retailerOrderDel($id)
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
        $order=retailerOrder::where('RetailerId',$id)->get();
         foreach($order as $row)
         {
            if($row->status == 'pending')
                {
                $new=new_order::where('order_id',$row->id)->first();
                $new->delete();
                }
            $del=retailerOrder::find($row->id);
            $del->delete();
         }
        return redirect()->back()->with('success', 'Order Deleted Successfully');
    }

 //Retailer Order Delete
 public function OrderDel($id)
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
     $order=retailerOrder::find($id);
     if($order->status == 'pending')
            {
            $new=new_order::where('order_id',$id)->first();
            $new->delete();
            }
     $order->delete();
     return redirect()->back()->with('success', 'Order Deleted Successfully');
 }


     //Retailer Order View
     public function retailerOrderView($id)
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
          $user=User::find($id);
          $name=$user->name;
         $order=retailerOrder::where('RetailerId',$id)->orderBy('id','desc')->get();
         return view('admin.order_view')->with(array('order'=>$order,'name'=>$name));
     }


     //Retailer Order Edit
     public function retailerOrderEdit($id)
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
         $order=retailerOrder::where('RetailerId',$id)->get();
         return view('admin.order_edit')->with('order',$order);
     }


     public function status_sender(Request $request)
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
         return 123;
     }




}
