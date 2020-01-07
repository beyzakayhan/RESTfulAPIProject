<?php

namespace App;

use App\Scopes\BuyerScope;
use App\Transformers\BuyerTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buyer extends User
{
    use SoftDeletes;
    public $transformer = BuyerTransformer::class;
    protected $dates = ['deleted_at'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new BuyerScope());
    }
}
