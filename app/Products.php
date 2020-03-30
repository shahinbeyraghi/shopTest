<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('age', function (Builder $builder) {
            $builder->where('status', 1);
        });
    }

    public function price()
    {
        return $this->hasMany('App\ProductsPrice', 'product_id', 'id');
    }

    /**
     * @param $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function search($request)
    {
        $products = DB::table('products')
            ->join('products_prices', 'products.id', '=', 'products_prices.product_id')
            ->select('products.*', 'products_prices.price', 'products_prices.color');
        if ($request->title ?? false)
            $products->where('products.title', 'like', '%'.$request->title.'%');

        if (($request->priceFrom ?? false) || ($request->priceTo ?? false))
            $products->whereBetween('products_prices.price', [$request->priceFrom ?? 1000, $request->priceTo ?? 10000]);

        return $products->paginate(5);


        /*if ($request->title ?? false)
            $query->where('title', 'like', '%'.$request->title.'%');

        if (($request->priceFrom ?? false) || ($request->priceTo ?? false))
            $query->where('price', function($q) use($request)
            {
                $q->whereBetween('price', [$request->priceFrom ?? 1000, $request->priceTo ?? 10000]);

            });

        return $query;*/
    }
}
