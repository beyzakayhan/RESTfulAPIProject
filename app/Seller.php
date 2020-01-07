<?php

namespace App;

use App\Scopes\SellerScope;
use App\Transformers\SellerTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends User
{
    use SoftDeletes;

    public $transformer = SellerTransformer::class;
    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SellerScope());
    }
}
