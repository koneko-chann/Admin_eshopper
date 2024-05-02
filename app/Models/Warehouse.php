<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
   
    use HasFactory;
    protected $table = 'warehouse';
    protected $guarded = [];    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'warehouse_products', 'warehouse_id', 'product_id')->withPivot('quantity');
    }
    public function imports()
    {
        return $this->hasMany(Import::class);
    }
}
