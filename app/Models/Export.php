<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    protected $table = 'export';
    use HasFactory;
    protected $guarded = [];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_export', 'export_id', 'product_id')->withTimestamps()->withPivot('quantity', 'price', 'total');
    }
    public function receiver()
    {
        return $this->belongsTo(Receiver::class, 'receiver_id');
    }
}
