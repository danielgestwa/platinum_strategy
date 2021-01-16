<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Product;
use App\Models\Category;
use DateTime;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get query builder for every product that belongs to this user
     * @return Illuminate\Database\Eloquent\Model
     */
    public function products() {
        return $this->hasMany(Product::class);
    }

    /**
     * Get query builder for every category that belongs to this user
     * @return Illuminate\Database\Eloquent\Model
     */
    public function categories() {
        return $this->hasMany(Category::class);
    }

    /**
     * Calculate data for dashboard.
     * Data is grouped by year_month, category, product
     * @return array
     */
    public function report() {
        $report = [];
        
        foreach($this->products()->orderBy('bought_at', 'desc')->orderBy('category_id')->orderBy('bought_at', 'desc')->get() as $product) {
            $productDate = (new DateTime($product->bought_at))->format('F Y');
            $productCategory = $product->category->name;
            $report[$productDate]['categories'][$productCategory]['products'][] = $product;

            if(!isset($report[$productDate]['categories'][$productCategory]['price'])) {
                $report[$productDate]['categories'][$productCategory]['price'] = 0;
            }
            $report[$productDate]['categories'][$productCategory]['price'] += $product->price;

            if(!isset($report[$productDate]['sum'])) {
                $report[$productDate]['sum'] = 0;
            }
            $report[$productDate]['sum'] += $product->price;
        }

        $monthCategoryId = 0;
        foreach($report as $reportDate => $reportCategories) {
            foreach($reportCategories['categories'] as $category => $productsData) {
                $report[$reportDate]['categories'][$category]['percentage'] = round($report[$reportDate]['categories'][$category]['price'] * 100 / $report[$productDate]['sum']);
                $report[$reportDate]['categories'][$category]['id'] = $monthCategoryId;
                $monthCategoryId += 1;
            }
        }

        return $report;
    }
}
