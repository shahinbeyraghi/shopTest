@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if($products->isEmpty())
                <div class="alert alert-warning" role="alert">
                    don't find any product with your condition!
                </div>
            @endif
            @foreach($products as $product)
                <div class="col-md-3 col-sm-4 mt-3">
                    <div class="card">
                        <div class="card-header">
                            {{$product->title}}
                        </div>
                        <div class="card-body">
                            @if(is_numeric($product->price))
                                {{number_format($product->price)}}
                            @else
                                {{number_format($product['price'][0]['price'])}}
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center mt-5">
            {{ $products->appends(['title' => $request->title ?? '',
                'priceFrom' => $request->priceFrom ?? '', 'priceTo' => $request->priceTo ?? ''])->links() }}
        </div>
    </div>
@endsection