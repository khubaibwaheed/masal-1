<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\masalMail;
use App\products;
use App\User;
use App\additional;
use App\retailerOrder;
use App\new_order;
use App\emails;
use App\footer;

// use Darryldecode\Cart\Cart;


class RetailerOrderController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    //Retailer order Form page
    public function retailerorder($id)
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
        $product=products::find($id);
        return view('retailer.sendorder')->with('product',$product);
    }


     //Retailer Stripe Payment
     public function payment(Request $request)
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
          \Stripe\Stripe::setApiKey('sk_test_vzANoOFfxcPr1PGEVTdmAA0600Ep7myX1P');
          try {
            \Stripe\Charge::create (array(
                    "amount" => $request->payable,
                    "currency" => "USD",
                    "source" => $request->input('stripeToken'), // obtained with Stripe.js
                    "description" => "Masal Payment System" 
            ));
            $id=Auth::user()->id;
            $user=User::find($id);
            $user->orderStatus=1;
            $user->save();
           $order=retailerOrder::where('RetailerId',$id)->where('payment','none')->get();
           foreach($order as $row)
           {
           $row->payment='Done';
           $row->status='processing';
           $row->save();
           }
           $total=retailerOrder::where('RetailerId',$id)->count();
           $payment=retailerOrder::where('RetailerId',$id)->get();
            return redirect('/order_success');
        } catch ( \Exception $e ) {
            return redirect()->back()->with('error-message','Paymet Unsuccessfull! Try Again');
        }
     }


     //Order Summary Page
     public function order_success()
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
          $email=$user->email;
          $name=$user->name;
          $success=new_order::where('retailer_id',$id)->get();

          $output='';
          $total=0;
          $output.='
         <div class="table-responsive" id="tbl_detail">
          <table class="table table-dark" style="border-collapse: collapse;background-color:#212529;color:white" >
          <thead>
            <tr>
            <th style="padding:20px; border: 1px solid black;" ><b>Order Id</b></th>
            <th style="padding:20px; border: 1px solid black;" ><b>Image</b></th>
            <th style="padding:20px; border: 1px solid black;" ><b>Name</b></th>
            <th style="padding:20px; border: 1px solid black;" ><b>Notes</b></th>
            <th style="padding:20px; border: 1px solid black;" ><b>Color</b></th>
            <th style="padding:20px; border: 1px solid black;" ><b>Size</b></th>
            <th style="padding:20px; border: 1px solid black;" ><b>Extra</b></th>
            <th style="padding:20px; border: 1px solid black;" ><b>Style #</b></th>
            <th style="padding:20px; border: 1px solid black;" ><b>Quantity</b></th>
            <th style="padding:20px; border: 1px solid black;" ><b>Status</b></th>
            <th style="padding:20px; border: 1px solid black;" ><b>Price</b></th> 
            </tr>
          </thead>
          <tbody>
          
          ';
            $footer=footer::first();
          foreach($success as $row)
          {
            $orders=retailerOrder::where('id',$row->order_id)->first();
            $product=products::find($orders->productId);
            $addition=0;
            if($orders->extra != null)
            {
                $extra=additional::where('additional',$orders->extra)->first();
                $addition=$extra->price;
            }
            $sub=($orders->quantity*$addition)+($orders->quantity*$product->wholesalePrice);
            $output.='
            <tr>
                <td style="padding:20px; border: 1px solid black;" > '.'OID.'.$orders->id.' </td>
                <td style="padding:20px; border: 1px solid black;" > <img style="height:100px;width:100px" src='.asset('images/'.$product->image1).'> </td>
                <td style="padding:20px; border: 1px solid black;" > '.$product->name.' </td>
                <td style="padding:20px; border: 1px solid black;" > '.$orders->detail.'  </td>
                <td style="padding:20px; border: 1px solid black;" > '.$orders->colour.'  </td>
                <td style="padding:20px; border: 1px solid black;" > '.$orders->sizes.' </td>
                <td style="padding:20px; border: 1px solid black;" > '.$orders->extra.'  </td>
                <td style="padding:20px; border: 1px solid black;" > '.$product->styleNumber.' </td>
                <td style="padding:20px; border: 1px solid black;" > '.$orders->quantity.' </td>
                <td style="padding:20px; border: 1px solid black;" > '.$orders->status.' </td>
                <td style="padding:20px; border: 1px solid black;" > $'.$sub.'</td>
            </tr>
            ';
           $total+=$sub; 
          }  
          $output.='
          </tbody>
          </table>
          </div>
          <h3> Order by '.$name.' </h3>
             <div style="margin-top:20px">
            <img style="height:200px;width:300px" src='.asset('/images/'.$footer->logo).'>
            </div>

            

            ';

          $welcome=emails::where('name','new_order')->first();
          if($welcome->status ==1)
          {
          $mail=[
            'title'=>$welcome->subject,
            'body'=>$welcome->message.'<br><br>'.$output
        ];
        $subject=$welcome->subject;
        Mail::to($email)->send(new masalMail($mail,$subject));
          }

              
          $notify=emails::where('name','order_notify')->first();
          $receiver=User::where('userRole',1)->get();
          if($notify->status ==1)
          {
              foreach($receiver as $admin)
              {
                    $mail=[
                        'title'=>$notify->subject,
                        'body'=>$notify->message. '<br><br>' .$output
                    ];
                    $subject=$notify->subject;
                    Mail::to($admin->email)->send(new masalMail($mail,$subject));
                    }
              }

          return view('retailer.order_success')->with('success',$success);
    }


     //Direct Product Order
     public function product_search(Request $request)
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
          $this->validate($request,[
              'top_search'=>'required'
          ]);
          $style=$request->top_search;
          $id=products::where('styleNumber',$style)->first();
            if(isset($id))
            {
         $product=products::find($id->id);
         return view('retailer.sendorder')->with('product',$product);
            }
            else if(!isset($id))
            {
                return redirect()->back()->with('error', 'Wrong Style Number');
            }
    }



     //Retailer Checkout page
     public function checkout()
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
          $orders=retailerOrder::where('RetailerId',Auth::user()->id)->where('payment','none')->get();
        return view('retailer.checkout')->with(array('orders'=>$orders));
     }





    //Retailer order to database
    public function sendorder(Request $request)
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
     if(isset($request->cart) && $request->cart == 'Add to Cart')
     {
         
       $user_id=Auth::user()->id;
         $detail=$request->detail;
        $this->validate($request,[
            'pId'=>'required',
            'size'=>'required',
            'color'=>'required',
            'quantity'=>'required|integer|min:1'
        ]);
        $preorder=retailerOrder::where([
            'productId'=>$request->pId,
            'RetailerId'=>$user_id,
            'colour'=>$request->color,
            'sizes'=>$request->size,
            'extra'=>$request->extra,
            'payment'=>'none'
        ])->count();
        if($preorder == 1)
        {
            $uporder=retailerOrder::where([
                'productId'=>$request->pId,
                'RetailerId'=>$user_id,
                'colour'=>$request->color,
                'sizes'=>$request->size,
                'extra'=>$request->extra,
                'payment'=>'none'
            ])->first();
            $uporder->quantity=$uporder->quantity+$request->quantity;
            $uporder->save();
            if ( $uporder->save()) 
                        {
                    
                        return redirect()->back()->with('success', 'Order Saved in Cart');
                        }
                    else
                        {
                            return redirect()->back()->with('error', 'Order Not Saved in Cart');
                        }
        }
        else
        {
                $order = new retailerOrder;
                $order->productId=$request->pId;
                $order->RetailerId=$user_id;
                $order->colour=$request->color;
                $order->sizes=$request->size;
                if(isset($request->extra))
                {
                $order->extra=$request->extra;
                }
                $order->quantity=$request->quantity;
                $order->detail=$detail;
                $order->status='pending';
                $order->payment="none";
                $order->save();
                    if ( $order->save()) 
                        {
                          $new = new new_order;
                          $last_order=retailerOrder::orderBy('id','desc')->where('RetailerId',$user_id)->first();
                          $new->order_id=$last_order->id;
                          $new->retailer_id=$user_id;
                          $new->save();
                        return redirect()->back()->with('success', 'Order Saved in Cart');
                        }
                    else
                        {
                            return redirect()->back()->with('error', 'Order Not Saved in Cart');
                        }
        }
     }
    }

    // Item Delete From Cart
    public function remover($id)
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
        $order=retailerOrder::where('id',$id)->first();
        $order->delete();
        $new=new_order::where('order_id',$id)->first();
        $new->delete();
        $quantity=0;
        $retailer=Auth::user()->id;
            $items=retailerOrder::where('RetailerId',$retailer)->where('payment','none')->get();
            foreach ($items as $item) 
            {
                $quantity=$quantity+$item->quantity;
            }
            if($quantity < 1)
            {
                return redirect('/collection')->with('success','Order Deleted From Cart');;
            }
            else
            {
                return redirect()->back()->with('success','Order Deleted From Cart');
            }
    }


    


    // Item Delete From Cart
    public function qty_update($id,$status)
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
         $order=retailerOrder::where('id',$id)->first();
         $qty=$order->quantity;
         if($status == 'plus')
         {
         $order->quantity=$qty+1;
         }
         else if($status == 'minus')
         {
             if($order->quantity > 1)
             {
                 $order->quantity=$qty-1;
             }
             else
             {
                return redirect()->back()->with('error','Minimun Quantity Limit is 1');
             }
        }
         else
         {
            return redirect()->back()->with('error','You Are Not allow to do this...');
         }
         $order->save();
         return redirect()->back()->with('success','Order Quantity Changed');
       
    }



    // Item Edit Page
    public function edit_item($id)
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
         $product=products::find($order->productId);
         return view('retailer.item_edit')->with(array('product'=>$product,'order'=>$order));
    }







    //Edit Item FRom Cart
    public function update_item(Request $request)
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
     if(isset($request->cart) && $request->cart == 'Update Cart')
     {
         $detail=$request->detail;
        $this->validate($request,[
            'pId'=>'required',
            'size'=>'required',
            'color'=>'required',
            'quantity'=>'required|integer'
        ]);
       $order =retailerOrder::find($request->pId);
       $order->colour=$request->color;
       $order->sizes=$request->size;
       if(isset($request->extra))
       {
           if($request->extra != 'No Extra')
           {
            $order->extra=$request->extra;
           }
           else
           {
            $order->extra=null;
           }
       
       }
       $order->quantity=$request->quantity;
       $order->detail=$detail;
       $order->save();
        if ( $order->save()) {
           
            return redirect()->back()->with('success', 'Order Updated in Cart');
        }
        else
      {
         return redirect()->back()->with('error', 'Order Not Updated in Cart');
      }
     }
    }

















}
