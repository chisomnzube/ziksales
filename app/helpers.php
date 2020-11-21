<?php

use App\Blogcomment;
use App\Product;
use App\Seller;
use App\Brand;
use App\SellerProduct;
use Carbon\Carbon;

function productImage($path)
  	{
  		 return $path ? asset(Voyager::image($path)) : asset('img/product/noimage.jpg');
      //return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/product/noimage.jpg');
  	}

function getStockLevel($quantity)
	{
		if ($quantity > setting('site.stock_threshold')) 
            {
                $stockLevel = '<div class="badge badge-success">In Stock</div>';                
            }elseif($quantity <= setting('site.stock_threshold') && $quantity > 0)
                {
                    $stockLevel = '<div class="badge badge-warning">Low Stock</div>'; 
                }else
                    {
                        $stockLevel = '<div class="badge badge-danger">Not Available</div>';   
                    }

         return $stockLevel;           
	}

function totalcash($price, $profit)
  {
    $deliveryFee = 0.015*($price + $profit);

    $tCash = $price + $profit + $deliveryFee;

    $totCash = round($tCash, -1);

    return $totCash;
  } 
  
function slash($price, $profit)
  {
    $deliveryFee = 0.015*($price + $profit);

    $tCash = $price + $profit + $deliveryFee;

    $slash = 0.1 * $tCash;

    $tSlash = $slash + $tCash;

    $totCash = round($tSlash, -1);

    return $totCash;
  }     

function getSeller($productId)
  {
      //$prodId = OrderProduct::where('order_id', $id)->first()->product_id;

        $sellId = optional(SellerProduct::where('product_id', $productId)->first())->seller_id;

        if ($sellId == null) {
          return 'Seller Not Inserted!';
        }else
          {
            $seller_name = Seller::where('id', $sellId)->first()->name;
            $seller_phone = Seller::where('id', $sellId)->first()->phone;

            $seller = $seller_name.' - '.$seller_phone;

            return $seller;

          }

  }   


  function countComment($id)
    {
      $total = Blogcomment::where('post_id', $id)->count();

      return $total;
    }  

  function getDeliveryDay($num)
    {
      $date = Carbon::now();
      $date->addDays($num)->toArray();
      //dd($date->englishDayOfWeek.' '.$date->day.' '.$date->format('M'));
      return 'This product will be delivered on '.$date->englishDayOfWeek.' '.$date->format('d M, Y');
    }

  function getProduct($id)
    {
      $product = Product::find($id);

      if (!$product) 
        {
          return NULL;
        }

      return $product;
    }  

  function checkBranding($id)
    {
      $seller = Seller::where('email', auth()->user()->email)->first();
      $checkSellerBrand = Brand::where('seller_id', $seller->id)->get()->count();
      return $checkSellerBrand;
    }

  function getBrandName($id)
    {
      $seller = Seller::where('email', auth()->user()->email)->first();
      $checkSellerBrand = Brand::where('seller_id', $seller->id)->first();
      return $checkSellerBrand;
    }