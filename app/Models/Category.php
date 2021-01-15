<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Category extends Model
{
    use HasFactory;
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'user_id'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
