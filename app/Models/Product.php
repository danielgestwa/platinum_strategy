<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Product extends Model
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

    /**
     * Get query builder for every category connected with this product
     * @return Illuminate\Database\Eloquent\Model
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get query builder for every user that has this product
     * @return Illuminate\Database\Eloquent\Model
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
