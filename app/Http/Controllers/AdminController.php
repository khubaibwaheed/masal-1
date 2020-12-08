<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\masalMail;
use App\products;
use App\Category;
use App\User;
use App\ColourSwatches;
use App\feedback;
use App\retailerOrder;
use App\visitor;
use App\size;
use App\additional;
use App\real;
use Carbon\Carbon;
use App\emails;
use App\sale;
use App\menu;
use App\retailer_bride;
use LVR\Colour\Hex;
class AdminController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    // Real Bride Request Page
    public function real_request($id)
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
         $real=retailer_bride::where('wedding',$id)->get();
         return view('admin.real_request')->with(array('real'=>$real));
    }


    //Dashboard
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
        $order=retailerOrder::count();
        $customer=User::where('userRole',2)->count();
        $visits=visitor::count();
        $products=products::count();



        $todayOrder=retailerOrder::whereDate('created_at', '=', Carbon::today())->count();
        $monthOrder=retailerOrder::whereMonth('created_at', '=', Carbon::now()->month)->count();
        $lastmonthOrder=retailerOrder::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->count();
      
        return view('admin.dashboard')->with(array('lastmonthOrder'=>$lastmonthOrder,'todayOrder'=>$todayOrder,'monthOrder'=>$monthOrder,'order'=>$order,'customer'=>$customer,'visits'=>$visits,'products'=>$products));
    }

   

    //Product Page
    public function products()
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
        $swatches=ColourSwatches::all();
        $category=Category::all();
        $product = products::orderBy('id','desc')->where('delete_status',0)->get();
        $total_products=products::all()->count();
        $counter=products::where('stock',0)->count();
        $outer=products::where('stock',0)->get();
        $size=size::all();
        $addition=additional::all();
        $sale=sale::all();
        return view('admin.products')
        ->with(array('sale'=>$sale,'addition'=>$addition,'size'=>$size,'outer'=>$outer,'total_products'=>$total_products,
        'counter'=>$counter,'category'=>$category,'swatches'=>$swatches,'product'=>$product));
    }

    //Product Page
    public function editCat($id)
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
      $category=Category::find($id);
      return view('admin.catEditor')->with('category',$category);
    }


    // Category Edit In Db
    public function cat_edit_indb(Request $request)
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
            if($request->cat_name != $request->cat_rename)
            {
            $this->validate($request,[
                'cat_name'=>'required|unique:categories,name',
                ]);
            }
            else
            {
                $this->validate($request,[
                    'cat_name'=>'required',
                    ]);
            }
                $id=$request->cat_id;
                $category=Category::find($id);
            $category->name=$request->cat_name;
            if(isset($request->cat_image))
            {
            $path1 = $request->cat_image->store('category');
            $category->image=$path1;
            }
            $category->save();
            if($category->save())
            {
                return redirect()->back()->with('success', 'Category Added');
             }
             else
             {
                return redirect()->back()->with('error', 'Category Not Added');
             }

    
      return view('admin.catEditor')->with('category',$category);
    }
    }


    //Add Single Image
    public function imgUploader(Request $request)
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
         if(isset($request->img_upload))
         {
             $id=$request->id;
             $product=products::find($id);
             if($request->hasFile('image1'))
             {
                 $path =  $request->image1->store('products');
                 $product->image1=$path;
                 $product->save();
                    if($product->save())
                    {
                    return redirect()->back()->with('success', 'Image Added');
                    }
                    else
                    {
                        return redirect()->back()->with('error', 'Image Not Added');
                    }
             }
             if($request->hasFile('image2'))
             {
                 $path =  $request->image2->store('products');
                 $product->image2=$path;
                 $product->save();
                 if($product->save())
                 {
                 return redirect()->back()->with('success', 'Image Added');
                 }
                 else
                 {
                     return redirect()->back()->with('error', 'Image Not Added');
                 }
             }
             if($request->hasFile('image3'))
             {
                 $path =  $request->image3->store('products');
                 $product->image3=$path;
                 $product->save();
                 if($product->save())
                 {
                 return redirect()->back()->with('success', 'Image Added');
                 }
                 else
                 {
                     return redirect()->back()->with('error', 'Image Not Added');
                 }
             }
             if($request->hasFile('image4'))
             {
                 $path =  $request->image4->store('products');
                 $product->image4=$path;
                 $product->save();
                 if($product->save())
                 {
                 return redirect()->back()->with('success', 'Image Added');
                 }
                 else
                 {
                     return redirect()->back()->with('error', 'Image Not Added');
                 }
             }
             if($request->hasFile('image5'))
             {
                 $path =  $request->image5->store('products');
                 $product->image5=$path;
                 $product->save();
                 if($product->save())
                 {
                 return redirect()->back()->with('success', 'Image Added');
                 }
                 else
                 {
                     return redirect()->back()->with('error', 'Image Not Added');
                 }
             }
             if($request->hasFile('image6'))
             {
                 $path =  $request->image6->store('products');
                 $product->image6=$path;
                 $product->save();
                 if($product->save())
                 {
                 return redirect()->back()->with('success', 'Image Added');
                 }
                 else
                 {
                     return redirect()->back()->with('error', 'Image Not Added');
                 }
             }
         }
         
    }



    //Product add to database
    public function addProduct(Request $request)
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
         if(isset($request->send))
         {
            $this->validate($request,[
                'product_name'=>'required',
                'key'=>'required',
                'product_description'=>'required',
                'wholesale_price'=>'required',
                'retail_price'=>'required',
                'stock'=>'required',
                'style'=>'required|unique:products,styleNumber',
                'first'=>'required|image',
                'second'=>'image',
                'third'=>'image',
                'forth'=>'image',
                'fifth'=>'image',
                'sixth'=>'image'
            ]);
            $product=new products;
            $product->name=$request->product_name;
            $product->keyword=$request->key;
            $product->description=$request->product_description;
            $size=json_encode($request->size);
            $extra='';
            if(isset($request->addition))
            {
            $extra=json_encode($request->addition);
            }
            else
            {
             $extra=null;  
            }
            $product->category=$request->category;
            if(isset($request->tag))
            {
            $product->tag=$request->tag;
            }
            $product->colour=$request->colour;
            $product->size=$size;
            $product->extra=$extra;
            $product->retailerPrice=$request->retail_price;
            $product->wholesalePrice=$request->wholesale_price;
            $product->styleNumber=$request->style;
            $product->status=$request->product_condition;
            $product->stock=$request->stock;
            $path1 = $request->first->store('products');
            $product->image1=$path1;
            if($request->hasFile('second'))
            {
                $path2 =  $request->second->store('products');
                $product->image2=$path2;
            }
          
            if($request->hasFile('third'))
            {
                $path3 = $request->third->store('products');
                $product->image3=$path3;
            }

            if($request->hasFile('forth'))
            {
                $path4 = $request->forth->store('products');
                $product->image4=$path4;
            }

            if($request->hasFile('fifth'))
            {
                $path5 = $request->fifth->store('products');
                $product->image5=$path5;
            }

            if($request->hasFile('sixth'))
            {
                $path6 = $request->sixth->store('products');
                $product->image6=$path6;
            }
           
            $product->save();
            if($product->save())
            {
                $new=products::where('styleNumber',$request->style)->first();
                $output='';
                $output.=' <center> <img style="height:400px;width:250px" src='.asset('/images/'.$new->image1).'>  <br>
                     '.$new->name.' <br> $'.$new->wholesalePrice.'  
                     </center>
                     <br><br>
                     <a style=" background-color: #4CAF50;
                     border: none;
                     color: white;
                     padding: 15px 32px;
                     text-align: center;
                     text-decoration: none;
                     display: inline-block;
                     font-size: 16px;
                     margin: 4px 2px;
                     cursor: pointer;" href="http://masal.com.au/detail/'.$new->id.'">View Product</a>
                     ';

                $retailer=User::where('userRole',2)->where('status',1)->get();
                $welcome=emails::where('name','New_product')->first();
                if($welcome->status == 1)
                {
                    foreach($retailer as $row)
                    {
                    $mail=[
                        'body'=> $output.'<br><br>'.$welcome->message
                    ];
                    $subject=$welcome->subject;
                    Mail::to($row->email)->send(new masalMail($mail,$subject));
                    }
                }
            return redirect()->back()->with('success', 'Product Added');
         }
         else
         {
            return redirect()->back()->with('error', 'Product Not Added');
         }
        }
        
    }



    //Product edit form page
    public function edit_product($id)
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
        $product= products::find($id);
        $swatches=ColourSwatches::all();
        $category=Category::all();
        $size=size::all();
        $addition=additional::all();
        $sale=sale::all();
        return view('admin.edit_product')->with(array('sale'=>$sale,'swatches'=>$swatches,'category'=>$category,'size'=>$size,
        'addition'=>$addition,'product'=>$product));
    }


    //Product edit in database
    public function editor(Request $request)
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
         if(isset($request->send))
         {
            $id=$request->id;
            $product=products::find($id);
            $price_check=$product->wholesalePrice;
            $this->validate($request,[
                'product_name'=>'required',
                'key'=>'required',
                'product_description'=>'required',
                'wholesale_price'=>'required',
                'retail_price'=>'required',
                'stock'=>'required',
                'style'=>'required',
                'size'=>'required'
                ]);
                if($request->style != $request->check_style)
                {
                    $this->validate($request,[
                        'style'=>'unique:products,styleNumber'
                        ]);
                }
                $size=json_encode($request->size);
                $extra='';
            if(isset($request->addition))
            {
            $extra=json_encode($request->addition);
            }
            else
            {
             $extra=null;  
            }
            $product=products::find($id);
            $product->name=$request->product_name;
            $product->keyword=$request->key;
            $product->description=$request->product_description;
            $product->category=$request->category;
            if(isset($request->tag))
            {
                if($request->tag != '354545')
                {
                    $product->tag=$request->tag;
                }
                else
                {
                    $product->tag=null;
                }
            }
            $product->colour=$request->colour;
            $product->size=$size;
            $product->extra=$extra;
            $product->wholesalePrice=$request->wholesale_price;
            $product->retailerPrice=$request->retail_price;
            $product->styleNumber=$request->style;
            $product->status=$request->product_condition;
            $product->stock=$request->stock;
            $product->save();
            if($product->save())
            {

                $output='';
                $output.=' <center> <img style="height:400px;width:250px" src='.asset('/images/'.$product->image1).'>  <br>
                     '.$product->name.' <br> $'.$request->wholesale_price.'  
                     </center>
                     <br><br>
                     <a style=" background-color: #4CAF50;
                     border: none;
                     color: white;
                     padding: 15px 32px;
                     text-align: center;
                     text-decoration: none;
                     display: inline-block;
                     font-size: 16px;
                     margin: 4px 2px;
                     cursor: pointer;" href="http://masal.com.au/detail/'.$product->id.'">View Product</a>
                     ';

                if($price_check != $request->wholesale_price)
                {
                    $retailer=User::where('userRole',2)->where('status',1)->get();
                    $welcome=emails::where('name','Price_change')->first();
                    if($welcome->status == 1)
                    {
                        foreach($retailer as $row)
                        {
                        $mail=[
                            'body'=> $output.'<br><br>'.$welcome->message
                        ];
                        $subject=$welcome->subject;
                        Mail::to($row->email)->send(new masalMail($mail,$subject));
                        }
                    }
                }
            return redirect()->back()->with('success', 'Product Updated');
            }
         else
         {
            return redirect()->back()->with('error', 'Product Not Updated');
         }
        }


    }

    // Delete Product
    public function destroy($id)
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
        $product= products::find($id);
        // $path1 = $product->image1;
        // $path2 = $product->image2;
        // $path3 = $product->image3;
        // $path4 = $product->image4;
        // $path5 = $product->image5;
        // $path6 = $product->image6;
        // Storage::delete($path1);
        // Storage::delete($path2);
        // Storage::delete($path3);
        // Storage::delete($path4);
        // Storage::delete($path5);
        // Storage::delete($path6);
        // $product->delete();

        
        $product->delete_status=1;
        $product->save();
        

        $real=real::where('product',$id);
        $real->delete();
        return redirect()->back()->with('success', 'Product Deleted');
    }


    //Order Update by Admin
    public function update_order(Request $request)
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
        if(isset($request->update))
        {
            $this->validate($request,[
                'id'=>'required',
                'color'=>'required',
                'size'=>'required',
                'status'=>[
                    'required',
                    Rule::in(['pending','processing','completed','canceled']),
                ],
                'quantity'=>'required|numeric|min:1'
                ]);
                $order=retailerOrder::find($request->id);
                $status=$order->status;
                $order->colour=$request->color;
                $order->sizes=$request->size;
                $order->status=$request->status;
                $order->quantity=$request->quantity;
                $order->save();
                if($order->save())
                {
                    if($status != $request->status)
                    {
                        $retailer=retailerOrder::where('id',$request->id)->first();
                        $retailer_id=$retailer->RetailerId;
                        $email=User::find($retailer_id);

                        $output='';
                            $total=0;
                            $output.='<h1> Your Order Status is: '.$request->status.' </h1>';

                            $output.='<div class="table-responsive">
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
                                $product=products::find($retailer->productId);
                                $addition=0;
                                if($retailer->extra != null)
                                {
                                    $extra=additional::where('additional',$retailer->extra)->first();
                                    $addition=$extra->price;
                                }
                                $sub=($retailer->quantity*$addition)+($retailer->quantity*$product->wholesalePrice);
                                if($retailer->extra == null)
                                {
                                    $extra="No Extra";
                                }
                                else
                                {
                                    $extra=$retailer->extra;
                                }
                                $output.='
                                <tr>
                                <td style="padding:20px; border: 1px solid black;" > '.'OID.'.$retailer->id.' </td>
                                   <td style="padding:20px; border: 1px solid black;" > <img style="height:100px;width:100px" 
                                   src='.asset('/images/'.$product->image1).'> </td>
                                    <td style="padding:20px; " > '.$product->name.' </td>
                                    <td style="padding:20px; border: 1px solid black;" > '.$retailer->detail.'  </td>
                                    <td style="padding:20px; " > '.$retailer->colour.'  </td>
                                    <td style="padding:20px; " > '.$retailer->sizes.' </td>
                                    <td style="padding:20px; " > '.$extra.'  </td>
                                    <td style="padding:20px; border: 1px solid black;" > '.$product->styleNumber.' </td>
                                    <td style="padding:20px; " > '.$retailer->quantity.' </td>
                                    <td style="padding:20px; border: 1px solid black;" > '.$retailer->status.' </td>
                                    <td style="padding:20px; " > $'.$sub.'</td>

                                </tr>
                                ';
                            $total+=$sub; 
                            $output.='
                            </tbody>
                            </table>
                            <a href="http://www.masal.com.au" style=" background-color: #4CAF50;
                            border: none;
                            color: white;
                            padding: 15px 32px;
                            text-align: center;
                            text-decoration: none;
                            display: inline-block;
                            font-size: 16px;
                            margin: 4px 2px;"> View Site </a>    
                            </div>';
                        $welcome=emails::where('name','change_order_status')->first();
                        if($welcome->status == 1)
                        {
                            $mail=[
                                'body'=>$welcome->message.'<br><br>'.$output
                            ];    
                            $subject=$welcome->subject;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                            Mail::to($email->email)->send(new masalMail($mail,$subject));
                        }
                    }
                    return redirect()->back()->with('success','Order Updated Successfully');
                }
        }
    }




    // Delete Feedback
    public function deletefeed($id)
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
        $feedback= feedback::find($id);
        $feedback->delete();
        return redirect()->back()->with('success', 'Feedback Deleted');
    }



    // Delete Category
    public function deleteCat($id)
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
        $category= Category::find($id);
        $path1 = $category->image;
       
        Storage::delete($path1);
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted');
    }


     //Edit website Page
     public function mainpage()
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
          $feedback=feedback::all();
          $category= Category::all();
          $swatches=ColourSwatches::all();
          $size=size::all();
          $sale=sale::all();
          return view('admin.mainpage')->with(array('sale'=>$sale,'size'=>$size,'category'=>$category,'swatches'=>$swatches,'feedback'=>$feedback));
     }

      //Add Category
      public function add_category(Request $request)
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
           if(isset($request->sendCategory))
         {
           $this->validate($request,[
            'category'=>'required|unique:categories,name',
            'first'=>'required'
            ]);
            $category=new Category;
            $category->name=$request->category;
            $path1 = $request->first->store('category');
            $category->image=$path1;
            $category->save();
            if($category->save())
            {
                return redirect()->back()->with('success', 'Category Added');
             }
             else
             {
                return redirect()->back()->with('error', 'Category Not Added');
             }
            }
      }


  
      public function adminEmail(Request $request)
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
                if($this->user->userRole != 1)
                {
                 return redirect('/admin');
                }
             }
             else
             {
                 return redirect('/admin');
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




        public function manageCategory()
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
             $category= Category::all();
             return view('admin.managerCat')->with('category',$category);
        }


         //swatches page
    public function swatches()
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
         $swatches=ColourSwatches::all();
         return view('admin.swatch')->with('swatches',$swatches);
    }

    // Delete Colour Swatch
    public function deleteSwatch($id)
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
        $swatches= ColourSwatches::find($id);
       
        $swatches->delete();
        return redirect()->back()->with('success', 'Colour Swatch Deleted');
    }



    // Delete Size
    public function deleteSize($id)
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
        $size= size::find($id);
       
        $size->delete();
        return redirect()->back()->with('success', 'Size Deleted');
    }


     // Delete Extra
     public function deleteExtra($id)
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
         $extra= additional::find($id);
         $extra->delete();
         return redirect()->back()->with('success', 'Extra Deleted');
     }


     // Edit Colour Swatch Page
     public function editSwatch($id)
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
         $swatches= ColourSwatches::find($id);
        return view('admin.swatch_edit')->with('swatches',$swatches);
        
     }


     //Add Colour in DB
     public function swatch_color(Request $request)
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
          if(isset($request->sendswatch))
        {
            $id=$request->id;
          $this->validate($request,[
           'color'=>'required'
           ]);
           $swatches= ColourSwatches::find($id);
            $old=json_decode($swatches->colour);
            $latest=array_merge($old,$request->color);
            $myJSON = json_encode($latest);
           $swatches->colour=$myJSON;
           $swatches->save();
           if($swatches->save())
           {
               return redirect()->back()->with('success', 'Colour Added');
            }
            else
            {
               return redirect()->back()->with('error', 'Colour Added');
            }
           }
     }


     //Add Colour Swatch
     public function add_swatch(Request $request)
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
          if(isset($request->sendswatch))
        {
          $this->validate($request,[
           'swatch'=>'required|unique:colour_swatches,name',
           'color'=>'required'
           ]);
           $swatch=new ColourSwatches;
           $swatch->name=$request->swatch;
           $myJSON = json_encode($request->color);
           $swatch->colour=$myJSON;
           $swatch->save();
           if($swatch->save())
           {
               return redirect()->back()->with('success', 'Colour Swatch Added');
            }
            else
            {
               return redirect()->back()->with('error', 'Colour Swatch Not Added');
            }
           }
     }


     public function contactReport()
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
             $feedback= feedback::all();
             return view('admin.contactReport')->with('feedback',$feedback);
        }


          //Search Result Page
    public function admin_searcher(Request $request)
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
        
        if(isset($request->search))
        {
            $this->validate($request,[
                'type'=>[
                    'required',
                    Rule::in(['retailer','product','category']),
                ],
                'top_search'=>'required'
            ]);
            $counter=0;
            $status=0;
            if($request->type == 'retailer')
            {
                $status=1;
                $retailer=$request->top_search;
                $value=User::where('registrationNumber',$retailer)->first();
                if(!isset($value))
                {
                    return redirect()->back()->with('error','Wrong Registration Number');
                }
            }

            if($request->type == 'product')
            {
                $status=2;
                $product=$request->top_search;
                $value=products::where('styleNumber',$product)->first();
                if(!isset($value))
                {
                    return redirect()->back()->with('error','Wrong Style Number');
                }
            }


            if($request->type == 'category')
            {
                $status=3;
                $cat=$request->top_search;
                $value=Category::where('name',$cat)->first();
                if(!isset($value))
                {
                    return redirect()->back()->with('error','Wrong Category Name');
                }
                $id=$value->id;
                $counter=products::where('category',$id)->count();
            }
            return view('admin.result')->with(array('counter'=>$counter,'value'=>$value,'status'=>$status));
        }
    }

    public function size()
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
         $size=size::all();
         return view('admin.size')->with('size',$size);
    }



    public function addition()
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
         $addition=additional::all();
         return view('admin.addition')->with('addition',$addition);
    }



     //Add Size
     public function add_size(Request $request)
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
          if(isset($request->sendsize))
        {
          $this->validate($request,[
           'size'=>'required|unique:sizes,size',
           ]);
           $size=new size;
           $size->size=$request->size;
           $size->save();
           if($size->save())
           {
               return redirect()->back()->with('success', 'Size Added');
            }
            else
            {
               return redirect()->back()->with('error', 'Size Not Added');
            }
           }
     }


      //Add Extra
      public function add_extra(Request $request)
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
           if(isset($request->sendExtra))
         {
           $this->validate($request,[
            'extra'=>'required|unique:additionals,additional',
            'price'=>'required'
            ]);
            $extra=new additional;
            $extra->additional=$request->extra;
            $extra->price=$request->price;
            $extra->save();
            if($extra->save())
            {
                return redirect()->back()->with('success', 'Extra Added');
             }
             else
             {
                return redirect()->back()->with('error', 'Extra Not Added');
             }
            }
      }





    public function del_image($id,$value){
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
        $product=products::find($id);
        $path=$product->$value;
        Storage::delete($path);
        $product->$value=null;
        $product->save();
        if($product->save())
        {
            return redirect()->back()->with('success', 'Image Deleted');
         }
         else
         {
            return redirect()->back()->with('error', 'Image Not Deleted');
         }
    }

    //Sale Tag Page
    public function sale_tag()
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
             $sale=sale::orderBy('id','desc')->get();
          return view('admin.sale')->with(array('sale'=>$sale));
        }

        //Sale Tag in DB
        public function add_sale(Request $request)
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
             if(isset($request->upload) && $request->upload == 'Submit')
             {
                 $this->validate($request,[
                     'sale'=>'required|unique:sales,name',
                     'color' => ['required', new Hex]
                 ]);
                $sale=new sale;
                $sale->name=$request->sale;
                $sale->color=$request->color;
                $sale->save();
                if($sale->save())
                {  
                    return redirect()->back()->with('success','New Sale Tag Added');
                }
            }
        }


        //Sale Tag in Delete
        public function del_sale($id)
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
             $sale=sale::find($id);
             $sale->delete();
                return redirect()->back()->with('success','Sale Tag Deleted');
        }

         //sale Tag edit form page
    public function edit_sale($id)
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
    
        $sale=sale::find($id);
        return view('admin.sale_edit')->with(array('sale'=>$sale));
    }


     //Update Sale Tag in DB
     public function update_sale(Request $request ,$id)
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
            $sale=sale::find($id);
              $this->validate($request,[
                  'tag'=>'required',
                  'color' => ['required', new Hex]
              ]);
             if($sale->name != $request->tag)
             {
                $this->validate($request,[
                    'tag'=>'unique:sales,name'
                ]);
             }
             $sale->name=$request->tag;
             $sale->color=$request->color;
             $sale->save();
             if($sale->save())
             {  
                 return redirect()->back()->with('success','Sale Tag Updated');
             }
             else
             {
                return redirect()->back()->with('success','Sale Tag Not Updated');
             }
         }
     }

     // Menu Bar Page
    public function menu()
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
         $menu=menu::get();
        return view('admin.menu')->with('menu',$menu);
    }

    // Menu Bar Page
    public function header($id,$value)
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
         $menu=menu::find($id);
         $menu->header_status=$value;
         $menu->save();
         return redirect()->back()->with('success','Header Menu Status Updated');
        
    }

    // Menu Bar Page
    public function footer($id,$value)
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
         $menu=menu::find($id);
         $menu->footer_status=$value;
         $menu->save();
         return redirect()->back()->with('success','Footer Menu Status Updated');
        
    }

}
