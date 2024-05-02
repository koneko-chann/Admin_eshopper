<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSale extends Model
{
    use HasFactory;
    protected $table='flash_sales';
    protected $guarded=[];  
    public function products()
    {
        return $this->belongsToMany(Product::class,'product_sale','flashsale_id','product_id')->withTimestamps()->withPivot('discount','quantity','price_after_discount','discount_type');
}
}
