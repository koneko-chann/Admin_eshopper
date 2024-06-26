<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory,SoftDeletes;
    public $guarded=[ ];
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id')->withTimestamps();
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
    public function flashSales(){
        return $this->belongsToMany(FlashSale::class,'product_sale','product_id','flashsale_id')->withTimestamps()->withPivot('discount','discount_price','quantity','price_after_discount');
    }
    public function orderItems() {
        return $this->hasMany(OrDerItems::class);
    }
    
}
