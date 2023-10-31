<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;
class Category extends Model
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;
    protected $fillable=[
        'name','parent_id'
    ];
    protected $guarded = [
        'id',
    ];
    protected $casts=[
        'name' => 'string',
        'parent_id' => 'string',
    ];

}
