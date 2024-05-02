<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    use HasFactory;
    protected $guarded = [];
    public function products(){
        if($this->warehouse_id){
            return $this->belongsToMany(Product::class, 'warehouse_products', 'warehouse_id', 'product_id')->withPivot('quantity');
        }else if($this->store_id){
            return $this->belongsToMany(Product::class, 'store_products', 'store_id', 'product_id')->withPivot('quantity');
        }
        return null;
}
}
