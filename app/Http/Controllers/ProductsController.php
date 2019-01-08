<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Exceptions;


use Auth;
use App\Category;
use App\Products;
use App\ProductAttribute;
use App\ProductsImage;
use App\Coupon;
use App\User;
use App\DeliveryAddress;
use App\Order;
use App\OrdersProduct;
use Image;
use DB;
use Session;
 

class ProductsController extends Controller
{
    public function addProduct(Request $request){

      if($request->isMethod('post')){

        $data = $request->all();
        // echo "<pre>"; print_r($data);die;
       if(empty($data['category_id'])){
        return redirect()->back()->with('flash_message_error', 'Under Category field is mandatoy!!');
       } 
        $product = new Products;
        $product->category_id = $data['category_id'];
        $product->product_name = $data['product_name'];
        $product->product_code = $data['product_code'];
        $product->product_color = $data['product_color'];
        $product->description = $data['description'];
        if(!empty($data['status'])){
          $product->status = 1;          
        }else{
          $product->status = 0;          
        }

        if(!empty($data['acc_care'])){
          $product->accessories_care = $data['acc_care'];
        }else{
          $product->accessories_care = '';
        }
        $product->global_url = $data['global_url'];
        $product->price = $data['price'];
        
        // upload image
        if($request->hasFile('image')){
          $image_tmp = Input::file('image');
          if($image_tmp->isValid()){
            $extension = $image_tmp->getClientOriginalExtension();
            $filename = rand(111, 99999).'.'.$extension;
            $large_image_path = 'images/backend_images/products/large_images/'.$filename;
            $medium_image_path = 'images/backend_images/products/medium_images/'.$filename;
            $small_image_path = 'images/backend_images/products/small_images/'.$filename;
            // Resize Image

            Image::make($image_tmp)->save($large_image_path);
            Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
            Image::make($image_tmp)->resize(445, 297)->save($small_image_path);

            // store image in products table
            $product->image = $filename;

          }
        }

       
          $product->save();
          return redirect('/admin/view-products')->with('flash_message_success','Product has been added successfully!');
      } 
      else{

      $categories =  Category::where(['parent_id'=>0])->get();
      $categories_dropdown = "<option value = '' selected disabled>Select</option>";
      foreach($categories as $cat){
        $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
        $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
        foreach ($sub_categories as $sub_cat){
          $categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
        }
      }
      return view('admin.products.add_product')->with(compact('categories_dropdown'));
    }
  }

    public function viewProducts(Request $request){
      $products = Products::orderBy('id', 'DESC')->get();
      $products = json_decode(json_encode($products));
      foreach($products as $key => $val){{

        $category_name =  Category::where(['id'=>$val->category_id])->first();
        $products[$key]->category_name = $category_name['name'];
      }}
      // echo "<pre>";print_r($products);die;  
      return view('admin.products.view_products')->with(compact('products'));
    }

    public function editProduct(Request $request, $id = null){

      if($request->isMethod('post')){
        $data = $request->all();

        // upload image
        if($request->hasFile('image')){
          $image_tmp = Input::file('image');
          if($image_tmp->isValid()){
            $extension = $image_tmp->getClientOriginalExtension();
            $filename = rand(111, 99999).'.'.$extension;
            $large_image_path = 'images/backend_images/products/large_images/'.$filename;
            $medium_image_path = 'images/backend_images/products/medium_images/'.$filename;
            $small_image_path = 'images/backend_images/products/small_images/'.$filename;
            // Resize Image

            Image::make($image_tmp)->save($large_image_path);
            Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
            Image::make($image_tmp)->resize(300,300)->save($small_image_path);      
          }}
          else{
            $filename = $data['current_image'];
          }       

          if(empty($data['status'])){
            $status = 0;
          }else{
            $status = 1;
          }

        Products::where(['id'=>$id])->update(['category_id'=>$data['category_id'],
                                             'product_name'=>$data['product_name'],
                                             'product_code'=>$data['product_code'],
                                             'product_color'=>$data['product_color'],
                                             'description'=>$data['description'],
                                             'price'=>$data['price'],
                                             'image'=>$filename,
                                             'status'=>$status
                                             ]
                                             );
      
        return redirect()->back()->with('flash_message_success', 'Product has been updated successfully');
      }

      if($request->isMethod('post')){
        $data = $request->all();
      }
      $productDetails = Products::where(['id'=>$id])->first();

      $categories =  Category::where(['parent_id'=>0])->get();
      $categories_dropdown = "<option value='' selected disabled>Select</option>";
      foreach($categories as $cat){
        if($cat->id==$productDetails->category_id){
          $selected = "selected";
        }
        else{
          $selected = "";
        }
        $categories_dropdown .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
        $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
        foreach ($sub_categories as $sub_cat){
          if($sub_cat->id == $productDetails->category_id){
            $selected = "selected";
          }else{
            $selected = "";
          }
          $categories_dropdown .= "<option value = '".$sub_cat->id."'>&nbsp;--&nbsp;".$sub_cat->name."</option>";
        }
      }

      return view('admin.products.edit_products')->with(compact('productDetails', 'categories_dropdown'));
    }

    public function deleteProduct($id = null){
      Products::where(['id'=>$id])->delete();
      return redirect()->back()->with('flash_message_success', 'Product has been removed successfully!!');
    }

    public function deleteProductImage($id = null){

      // get the product details
      $productImage = Products::where(['id'=>$id])->first();

      $large_image_path = 'images/backend_images/products/large_images/';
      $medium_image_path = 'images/backend_images/products/medium_images/';
      $small_image_path = 'images/backend_images/products/small_images/';

      // Delete the large image if it exists in the folder
      if(file_exists($large_image_path.$productImage->image)){
        unlink($large_image_path.$productImage->image);
      }

      // Delete the large image if it exists in the folder
      if(file_exists($medium_image_path.$productImage->image)){
        unlink($medium_image_path.$productImage->image);
      }

      // Delete the large image if it exists in the folder
      if(file_exists($small_image_path.$productImage->image)){
        unlink($small_image_path.$productImage->image);
      }

      Products::where(['id'=>$id])->update(['image'=>'']);
      return redirect()->back()->with('flash_message_success', 'The product image has been successfully deleted');
    }

    public function deleteAltImage($id = null){

      // get the product details
      $productImage = ProductsImage::where(['id'=>$id])->first();

      $large_image_path = 'images/backend_images/products/large_images/';
      $medium_image_path = 'images/backend_images/products/medium_images/';
      $small_image_path = 'images/backend_images/products/small_images/';

      // Delete the large image if it exists in the folder
      if(file_exists($large_image_path.$productImage->image)){
        unlink($large_image_path.$productImage->image);
      }

      // Delete the large image if it exists in the folder
      if(file_exists($medium_image_path.$productImage->image)){
        unlink($medium_image_path.$productImage->image);
      }

      // Delete the large image if it exists in the folder
      if(file_exists($small_image_path.$productImage->image)){
        unlink($small_image_path.$productImage->image);
      }

      ProductsImage::where(['id'=>$id])->delete();
      return redirect()->back()->with('flash_message_success', 'The product image has been successfully deleted');
    }



    public function addAttributes(Request $request, $id = null){
      $productDetails = Products::with('attributes')->where(['id'=>$id])->first(); // this is basically the fetch operation, here the variable stores the value
      if($request->isMethod('post')){
        $data = $request->all();


        foreach($data['sku'] as $key => $val){ // val represents value of key
          if(!empty($val)){

            // SKU Check
            $attrCountSKU = ProductAttribute::where('sku', $val)->count();
            if($attrCountSKU>0){
              return redirect('/admin/add-attributes/'.$id)->with('flash_message_error', 'SKU already exists! Please add another SKU.');              
            }

            $attrCountSizes = ProductAttribute::where(['product_id'=>$id, 'size'=>$data['size'][$key]])->count();
            if($attrCountSizes>0){
              return redirect('/admin/add-attributes/'.$id)->with('flash_message_error', ''.$data['size'][$key].' Size already exists. Please add new one!!');
            }

            $attribute = new ProductAttribute;
            $attribute->product_id = $id;
            $attribute->sku = $val;
            $attribute->size = $data['size'][$key];
            $attribute->price = $data['price'][$key];
            $attribute->stock = $data['stock'][$key];
            $attribute->save();

          }

        }
        return redirect('/admin/add-attributes/'.$id)->with('flash_message_success', 'Product attributes are successfully added');
      }
     return view('admin.products.add_attributes')->with(compact('productDetails'));
    }

    public function editAttributes(Request $request, $id = null){
      if($request->isMethod('post')){
        $data = $request->all();
        foreach($data['idAttr'] as $key => $value){ // for each data as key value pair
          // echo "<pre>";print_r($key);die; 
          ProductAttribute::where(['id'=>$data['idAttr'][$key]])->update(['price'=>$data['price'][$key], 'stock'=>$data['stock'][$key]]); // where id is attribute id based on key(0, 1, 2)
        }
        return redirect()->back()->with('flash_message_success', 'Product attribute has been updated successfully!!');
      }
    }

    public function addImages(Request $request, $id = null){
      $productDetails = Products::with('attributes')->where(['id'=>$id])->first(); // this is basically the fetch operation, here the variable stores the value
      if($request->isMethod('post')){
        $data = $request->all();
        // echo "<pre>";print_r($data);die;
        if($request->hasFile('image')){
          $files = $request->file('image');
          // Upload images after resize
          foreach($files as $file){
            $image = new ProductsImage;
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(111, 999999).'.'.$extension;
            $large_image_path = 'images/backend_images/products/large_images/'.$fileName;
            $medium_image_path = 'images/backend_images/products/medium_images/'.$fileName;
            $small_image_path = 'images/backend_images/products/small_images/'.$fileName;
            Image::make($file)->save($large_image_path);
            Image::make($file)->resize(600,600)->save($medium_image_path);
            Image::make($file)->resize(445, 297)->save($small_image_path);
            $image->image = $fileName;
            $image->product_id = $data['product_id'];
            $image->save();
          }
        }
        return redirect('/admin/add-images/'.$id)->with('flash_message_success', 'Product Images is added successfully');
      }

      $productsImages = ProductsImage::where(['product_id'=>$id])->get();
      // $productsImages = json_decode(json_encode($productsImages));
      // echo "<pre>";print_r($productsImages);die;

     return view('admin.products.add_images')->with(compact('productDetails', 'productsImages'));
    }

    public function deleteAttribute($id = null){
      ProductAttribute::where(['id'=>$id])->delete();
      return redirect()->back()->with('flash_message_success', 'Product Attribute has been removed successfully!!');
    }

    public function products($url = null){
      
      $countCategory = Category::where(['url'=>$url, 'status'=>1])->count();
      if($countCategory == 0){
        abort(404);
      }
      $categories = Category::with('subcategories')->where(['parent_id'=>0])->get();
      $categories = json_decode(json_encode($categories));      
      // echo "<pre>"; print_r($categories);die;

      $categoryDetails = Category::where(['url'=>$url])->first();  
      $categoryDetails = json_decode(json_encode($categoryDetails)); 
      // echo "<pre>"; print_r($categoryDetails);die;

      if($categoryDetails->parent_id==0){
        // if the url is main category

        $subCategories = Category::where(['parent_id'=>$categoryDetails->id])->get();
        // $subCategories = json_decode(json_encode($subCategories));
        // echo "<pre>"; print_r($subCategories);die

        
        foreach($subCategories as $subcat){
          $cat_ids[]= $subcat->id; // sub_cat_id
          // echo "<pre>"; print_r($cat_ids);die;     
        }
        $cat_ids[] = $categoryDetails->id;

        $productsAll = Products::whereIn('category_id', $cat_ids)->get();
        $productsAll = json_decode(json_encode($productsAll));
        // echo "<pre>"; print_r($productsAll); echo "yesss";die;

      }else{
        //if it is the subCategory
        $productsAll = Products::where(['category_id' => $categoryDetails->id])->where('status',1)->get();
        // echo "<pre>"; print_r($productsAll);       

      }   
      return view('products.listing')->with(compact('categories','categoryDetails','productsAll'));
  
  }

    public function incense($url = null){
      $countCategory = Category::where(['url'=>$url])->count();
      if($countCategory == 0){
        abort(404);
      }
      $categoryDetails = Category::where(['url'=>$url])->first();
      $productsAll = Products::where(['category_id' => $categoryDetails->id])->get();
      // $productsAll = json_decode(json_encode($productsAll));
      // echo "<pre>"; print_r($productsAll);die;

      return view('products.specific_listing')->with(compact('categoryDetails', 'productsAll'));

    }
      public function pashmina($url = null){
      $countCategory = Category::where(['url'=>$url])->count();
      if($countCategory == 0){
        abort(404);
      }
      $categoryDetails = Category::where(['url'=>$url])->first();
      $productsAll = Products::where(['category_id' => $categoryDetails->id])->get();
      // $productsAll = json_decode(json_encode($productsAll));
      // echo "<pre>"; print_r($productsAll);die;

      return view('products.specific_listing')->with(compact('categoryDetails', 'productsAll'));

    }

      public function mallet($url = null){
      $countCategory = Category::where(['url'=>$url])->count();
      if($countCategory == 0){
        abort(404);
      }
      $categoryDetails = Category::where(['url'=>$url])->first();
      $productsAll = Products::where(['category_id' => $categoryDetails->id])->get();
      // $productsAll = json_decode(json_encode($productsAll));
      // echo "<pre>"; print_r($productsAll);die;

      return view('products.specific_listing')->with(compact('categoryDetails', 'productsAll'));

    }

      public function gongs($url = null){
      $countCategory = Category::where(['url'=>$url])->count();
      if($countCategory == 0){
        abort(404);
      }
      $categoryDetails = Category::where(['url'=>$url])->first();
      $productsAll = Products::where(['category_id' => $categoryDetails->id])->get();
      // $productsAll = json_decode(json_encode($productsAll));
      // echo "<pre>"; print_r($productsAll);die;

      return view('products.specific_listing')->with(compact('categoryDetails', 'productsAll'));

    }

      public function antiqueBowls($url = null){
      $countCategory = Category::where(['url'=>$url])->count();
      // echo $countCategory;die;
      if($countCategory == 0){
        abort(404);
      }
      $categoryDetails = Category::where(['url'=>$url])->first();
      $productsAll = Products::where(['category_id' => $categoryDetails->id])->get();
      // $productsAll = json_decode(json_encode($productsAll));
      // echo "<pre>"; print_r($productsAll);die;

      return view('products.specific_listing')->with(compact('categoryDetails', 'productsAll'));

    }

      public function statues($url = null){
      $countCategory = Category::where(['url'=>$url])->count();
      if($countCategory == 0){
        abort(404);
      }
      $categoryDetails = Category::where(['url'=>$url])->first();
      $productsAll = Products::where(['category_id' => $categoryDetails->id])->get();
      // $productsAll = json_decode(json_encode($productsAll));
      // echo "<pre>"; print_r($productsAll);die;

      return view('products.specific_listing')->with(compact('categoryDetails', 'productsAll'));

    }

      public function candles($url = null){
      $countCategory = Category::where(['url'=>$url])->count();
      if($countCategory == 0){
        abort(404);
      }
      $categoryDetails = Category::where(['url'=>$url])->first();
      $productsAll = Products::where(['category_id' => $categoryDetails->id])->get();
      // $productsAll = json_decode(json_encode($productsAll));
      // echo "<pre>"; print_r($productsAll);die;

      return view('products.specific_listing')->with(compact('categoryDetails', 'productsAll'));

    }

      public function book($url = null){
      $countCategory = Category::where(['url'=>$url])->count();
      if($countCategory == 0){
        abort(404);
      }
      $categoryDetails = Category::where(['url'=>$url])->first();
      $productsAll = Products::where(['category_id' => $categoryDetails->id])->get();
      // $productsAll = json_decode(json_encode($productsAll));
      // echo "<pre>"; print_r($productsAll);die;

      return view('products.specific_listing')->with(compact('categoryDetails', 'productsAll'));

    }

      public function lotus_malas($url = null){
      $countCategory = Category::where(['url'=>$url])->count();
      if($countCategory == 0){
        abort(404);
      }
      $categoryDetails = Category::where(['url'=>$url])->first();
      $productsAll = Products::where(['category_id' => $categoryDetails->id])->get();
      // $productsAll = json_decode(json_encode($productsAll));
      // echo "<pre>"; print_r($productsAll);die;

      return view('products.specific_listing')->with(compact('categoryDetails', 'productsAll'));

    }       

      public function prayer($url = null){
      $countCategory = Category::where(['url'=>$url])->count();
      if($countCategory == 0){
        abort(404);
      }
      $categoryDetails = Category::where(['url'=>$url])->first();
      $productsAll = Products::where(['category_id' => $categoryDetails->id])->get();
      // $productsAll = json_decode(json_encode($productsAll));
      // echo "<pre>"; print_r($productsAll);die;

      return view('products.specific_listing')->with(compact('categoryDetails', 'productsAll'));

    }

      public function beauty($url = null){
      $countCategory = Category::where(['url'=>$url])->count();
      if($countCategory == 0){
        abort(404);
      }
      $categoryDetails = Category::where(['url'=>$url])->first();
      $productsAll = Products::where(['category_id' => $categoryDetails->id])->get();
      // $productsAll = json_decode(json_encode($productsAll));
      // echo "<pre>"; print_r($productsAll);die;

      return view('products.specific_listing')->with(compact('categoryDetails', 'productsAll'));

    }     

      public function harmonic_bowls($url = null){
      $countCategory = Category::where(['url'=>$url])->count();
      if($countCategory == 0){
        abort(404);
      }
      $categoryDetails = Category::where(['url'=>$url])->first();
      $productsAll = Products::where(['category_id' => $categoryDetails->id])->get();
      // $productsAll = json_decode(json_encode($productsAll));
      // echo "<pre>"; print_r($productsAll);die;

      return view('products.specific_listing')->with(compact('categoryDetails', 'productsAll'));

    }    



  public function product($id = null){

    $productCount = Products::where(['id'=>$id])->count();

    if($productCount == 0){
      abort(404);
   }

    $productDetails = Products::with('attributes')->where(['id'=>$id])->first();

    $totalPins = OrdersProduct::where('product_id', $id)->get();

    $totalPinsAmt = 0;
    foreach ($totalPins as $key => $value) {
      $totalPinsAmt = $totalPinsAmt + $value->product_qty;
    }

    $relatedProducts = Products::where('id','!=',$id)->where(['global_url'=>$productDetails->global_url])->get();
      // $productsAll = json_decode(json_encode($relatedProducts));
      // echo "<pre>"; print_r($productsAll);die;

    $productAltImages = ProductsImage::where(['product_id'=>$id])->get();


    $categories = Category::with('subcategories')->where(['parent_id'=>0])->get();

    // $total_stock = ProductAttribute::where('product_id', $id)->get();
    // echo $total_stock;die;
    // echo $productDetails->price);die
    $total_stock = 10;


    return view('products.detail')->with(compact('productDetails', 'categories', 'productAltImages', 'total_stock', 'relatedProducts', 'totalPinsAmt'));
  }

  public function getProductPrice(Request $request){
    $data = $request->all();
    $proArr = explode("-",$data['choice']);
    $id =  $proArr[0];
    $specific = $proArr[1];
    // echo $id;die;
    $one = ProductAttribute::where(['product_id'=>$id, 'size'=>$specific])->first();
    echo $one->price;
    echo "#";
    echo $one->stock;
  }


  public function addtocart(Request $request){
    Session::forget('CouponAmount');
    Session::forget('CouponCode');


    $data = $request->all();
    // echo "<pre>";print_r($data);die;
    if(empty(Auth::user()->email)){
      $data['user_email'] = "";      
    }else{
      $data['user_email'] = Auth::user()->email; 
    }

    $session_id = Session::get('session_id');

    if(empty($session_id)){
      $session_id = str_random(40);
      Session::put('session_id', $session_id);
    }
    
    $countProducts = DB::table('cart')->where(['product_id'=>$data['product_id'],
                                               'product_color'=>$data['product_color'],
                                              
                                               'session_id'=>$session_id])->count();

    if($countProducts>0){ 
      return redirect()->back()->with('flash_message_error', 'Product already exists on the cart !!');
    }
    else{

       

       DB::table('cart')->insert(['product_id'=>$data['product_id'],
                                     'product_name'=>$data['product_name'], 
                                     
                                     'product_color'=>$data['product_color'],
                                     'price'=>$data['product_price'],
                                     
                                     'quantity'=>$data['quantity'],
                                     'user_email'=>$data['user_email'],
                                      'image'=>$data['product_image'],
                                     'session_id'=>$session_id]);
     
    }
   return redirect('cart')->with('flash_message_success', 'Product Successfully added into the cart !!');
  }

  public function cart(){
    $session_id = Session::get('session_id');
    $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
    // echo "<pre>";print_r($userCart);die;
    foreach($userCart as $key => $product){
      // echo $product->product_id;
      $productDetails = Products::where(['id'=>$product->product_id])->first();
      // $userCart[$key]->image = $productDetails->image;
      $userCart[$key]->image = $productDetails->image;

    }
    // echo "<pre>";print_r($userCart);

    return view('products.cart')->with(compact('userCart'));
  }

  public function deleteCartProduct($id = null){

    Session::forget('CouponAmount');
    Session::forget('CouponCode');

    DB::table('cart')->where(['id'=>$id])->delete();
    return redirect()->back()->with('flash_message_success', 'Successfully removed the product from the cart !!');
  }

  public function updateCartQuantity($id = null, $quantity){

    Session::forget('CouponAmount');
    Session::forget('CouponCode');

    DB::table('cart')->where('id', $id)->increment('quantity', $quantity);
    return redirect()->back()->with('flash_message_success', 'Product Quantity has been successfully updated');    
  }

  public function applyCoupon(Request $request){
    
    Session::forget('CouponAmount');
    Session::forget('CouponCode');

    $data = $request->all();
    // echo "<pre>";print_r($data);die;
    $couponCount = Coupon::where(['coupon_code'=>$data['coupon_code']])->count();
    if($couponCount == 0){
      return redirect()->back()->with('flash_message_error', 'Sorry the CouponCode is Invalid !!');
    }else{
      $couponDetails = Coupon::where('coupon_code', $data['coupon_code'])->first();
      if($couponDetails->status == 0){
        return redirect()->back()->with('flash_message_error', 'The coupon is Inactive!!');
      }
      $expiryDate = $couponDetails->expiry_date;
      $currentDate = date('Y-m-d');
      if($expiryDate < $currentDate){
        return redirect()->back()->with('flash_message_error', 'Sorry, the coupon date is expired !!');
      }

      // Get the cart's totalAmount

      $session_id = Session::get('session_id');
      $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
      $totalAmount = 0;
      foreach($userCart as $item){
        $totalAmount = $totalAmount + ($item->price * $item->quantity);
      } 
      if($couponDetails->amount_type == "Fixed"){
        $couponAmount = $couponDetails->amount;
      }else{
        // echo $totalAmount;die;
        $couponAmount = $totalAmount * ($couponDetails->amount/100);
      }

      //Add CouponCode and Coupon Amount in the session
      Session::put('CouponAmount', $couponAmount);
      Session::put('CouponCode', $data['coupon_code']);

      return redirect()->back()->with('flash_message_success', 'Coupon Code successfully applied. You are availing discount.');
    }
  }

  public function checkOut(Request $request){
    $user_id = Auth::user()->id;
    $user_email = Auth::user()->email;
    $userDetails = User::find($user_id);
    $userDetails = json_decode(json_encode($userDetails));
    // echo "<pre>";print_r($userDetails);die;
    $shippingDetails = array();

    // Check if the delevering address exists
    $shippingCount = DeliveryAddress::where('user_id', $user_id)->count();
    if($shippingCount>0){
      $shippingDetails = DeliveryAddress::where('user_id', $user_id)->first();
      // $shippingDetails = json_decode(json_encode($shippingDetails));
      // echo "<pre>";print_r($shippingDetails);die;      

    }

    // get the session id of the current user

    $session_id = Session::get('session_id');
    DB::table('cart')->where('session_id', $session_id)->update(['user_email'=>$user_email]);

    // $shippingDetails = json_decode(json_encode($shippingDetails));
    // echo "<pre>";print_r($shippingDetails);die;

    if($request->isMethod('post')){
      $data = $request->all();
      if(empty($data['billing_name']) ||
         empty($data['billing_last_name']) ||
         empty($data['billing_address']) ||
         empty($data['billing_city']) ||
         empty($data['billing_zip']) ||
         empty($data['billing_state']) ||
         empty($data['billing_country']) ||
         empty($data['billing_mobile']) ||

         empty($data['shipping_name']) ||
         empty($data['shipping_last_name']) ||
         empty($data['shipping_address']) ||
         empty($data['shipping_city']) ||
         empty($data['shipping_zip']) ||
         empty($data['shipping_state']) ||
         empty($data['shipping_country']) ||

         empty($data['shipping_mobile'])){
        return redirect()->back()->with('flash_message_error', 'Please fill all the fields to checkout');
      }

      // Update the passed Details

      User::where('id', $user_id)->update(['name'=>$data['billing_name'],
                                            'last_name'=>$data['billing_last_name'],
                                            'address'=>$data['billing_address'],
                                            'city'=>$data['billing_city'],
                                            'zip_code'=>$data['billing_zip'],
                                            'state'=>$data['billing_state'],
                                            'country'=>$data['billing_country'],
                                            'mobile'=>$data['billing_mobile']]);

      if($shippingCount>0){
        // Update the shipping address
        DeliveryAddress::where('user_id', $user_id)->update(['name'=>$data['shipping_name'],
                                                             'last_name'=>$data['shipping_last_name'],
                                                             'address'=>$data['shipping_address'],
                                                             'city'=>$data['shipping_city'],
                                                             'zip_code'=>$data['shipping_zip'],
                                                             'state'=>$data['shipping_state'],
                                                             'country'=>$data['shipping_country'],
                                                             'mobile'=>$data['shipping_mobile']]);
      }else{
        // Add new shipping Address
        $deliver = new DeliveryAddress;
        $deliver->user_id = $user_id;
        $deliver->user_email = $user_email;
        $deliver->name = $data['shipping_name'];
        $deliver->last_name = $data['shipping_last_name'];
        $deliver->address = $data['shipping_address'];
        $deliver->city = $data['shipping_city'];
        $deliver->zip_code = $data['shipping_zip'];
        $deliver->state = $data['shipping_state'];
        $deliver->country = $data['shipping_country'];
        $deliver->mobile = $data['shipping_mobile'];
        $deliver->save();
      }
      return redirect()->action('ProductsController@orderReview');
    }
    return view('products.checkout')->with(compact('userDetails', 'shippingDetails'));
  }

  public function orderReview(){
    $user_id = Auth::user()->id;
    $user_email = Auth::user()->email;
    $session_id = Session::get('session_id');
    $userDetails = User::where('id', $user_id)->first();
    $shippingDetails = DeliveryAddress::where('user_id', $user_id)->first();
    $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
    // echo "<pre>";print_r($userCart);

    foreach($userCart as $key => $product){
      $productDetails = Products::where('id',$product->product_id)->first();
      $ramlalreview = $userCart[$key]->image;
      $ramlal_review = $productDetails->image;
    }
    // echo "<pre>";print_r($userCart);die;
    return view('products.order_review')->with(compact('userDetails','shippingDetails', 'userCart'));
  }

  public function placeOrder(Request $request){
    if($request->isMethod('post')){
      $data = $request->all();
      $user_id = Auth::user()->id;
      $user_email = Auth::user()->email;
      // echo "<pre>";print_r($data);die;
      // if(empty(Session::get('couponAmount'))){
      //   $couponAmount = "";
      // }else{
      //   $couponAmount = Session::get('CouponAmount');
      // }

      // Get the shipping address from Delivery Address table

      $session_id = Session::get('session_id');

      $deliverDetails = DeliveryAddress::where('user_id', $user_id)->first();
      // $details = json_decode(json_encode($deliverDetails));
      // echo "<pre>";print_r($details);die;
      if(empty(Session::get('CouponCode'))){
        $couponCode = "0";
      }else{
        $couponCode = Session::get('CouponCode');
      }

      $order = new Order;
      $order->user_id = $user_id;
      $order->user_email = $user_email;
      $order->name = $deliverDetails->name;
      $order->last_name = $deliverDetails->last_name;
      $order->address = $deliverDetails->address;
      $order->city = $deliverDetails->city;
      $order->zip_code = $deliverDetails->zip_code;
      $order->state = $deliverDetails->state;
      $order->country = $deliverDetails->country;
      $order->mobile = $deliverDetails->mobile;
      $order->coupon_code = $couponCode;
      $order->coupon_amount = $data['couponAmount'];
      $order->order_status = "New";
      $order->payment_method = $data['payment_method'];
      $order->grand_total = $data['grand_total'];
      $order->save();

      $order_id = DB::getPdo()->lastInsertId();

      $cartProducts = DB::table('cart')->where('session_id', $session_id)->get();
      foreach($cartProducts as $pro){
        $cartPro = new OrdersProduct;
        $cartPro->order_id = $order_id;
        $cartPro->user_id = $user_id;
        $cartPro->product_id = $pro->product_id;
        $cartPro->product_code = $pro->product_code;
        $cartPro->product_name = $pro->product_name;
        $cartPro->product_size = $pro->size;
        $cartPro->product_color = $pro->product_color;
        $cartPro->product_price = $pro->price;
        $cartPro->product_qty = $pro->quantity;
        $cartPro->save();
      }

      Session::put('order_id', $order_id);
      Session::put('grand_total', $data['grand_total']);

      // Redirect to thanks page after storing some data in session
      return redirect('/paypal');
    }
  }

  // public function thanks(){
  //   $user_email = Auth::user()->email;
  //   DB::table('cart')->where('user_email', $user_email)->delete();
  //   return view('orders.thanks');
  // }

  // function for returning from the paypal form

  public function paypalThanks(){
    return view('orders.thanks_paypal');
  }

  public function paypalCancel(){
    return view('orders.paypal_cancel');
  }


  public function paypal(){
    return view('orders.paypal');
  }


  public function userOrders(){
    $user_id = Auth::user()->id;
    $orders = Order::with('orders')->where('user_id', $user_id)->orderBy('id', 'DESC')->get(); // to show every previous orders of user
    // $orders = json_decode(json_encode($orders));
    // echo "<pre>";print_r($orders);die;
    return view('orders.user_orders')->with(compact('orders'));
  }

  public function userOrderDetails($order_id){
    $id = Auth::user()->id;
    // echo($id);die;
    $orderDetails = Order::with('orders')->where('id', $order_id)->first();
    // $ramlal = json_decode(json_encode($orderDetails));
    // echo "<pre>";print_r($ramlal);die;
    // echo("Ramlal");
    return view('orders.user_order_history')->with(compact('orderDetails'));
  } 

  // The search functionality

  public function searchProduct(Request $request){
    $data = $request->all();
    
    // echo "<pre>";print_r($data['search_box']);die;
    $search_data = $data['search_box'];

  
      $search_result = DB::table('products')

      ->where('products.product_name', 'like', '%' . $search_data . '%') // for likelihood of similar lexiums
      ->where('products.status', 1)
      ->get();
  

    // echo "<pre>";print_r($search_result);die;

    if(!$search_result->isEmpty()){
      return view('custom_search')->with(compact('search_result'));
    }

    else{
      return view('404');
    }
  }

  public function viewOrders(){
    $orders = Order::with('orders')->orderBy('id', 'Desc')->get();
    $orders = json_decode(json_encode($orders));
    // echo "<pre>";print_r($orders);die;
    return view('admin.orders.view_orders')->with(compact('orders'));
  }


}


// when doing get request we cannot get the emptiness because the instance of Illuminate\Support\Collection is always returned
