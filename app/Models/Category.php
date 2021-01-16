<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Category extends Model
{
    /**
     * Category model class
     */
    use HasFactory;
    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get query builder for every product that belongs to this category
     * @return Illuminate\Database\Eloquent\Model
     */
    public function products() {
        return $this->hasMany(Product::class);
    }

    /**
     * Get query builder for user that has this category
     * @return Illuminate\Database\Eloquent\Model
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
