@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>محصولات</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->short_description }}</p>
                            <p class="card-text">{{ $product->price }} تومان</p>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">مشاهده محصول</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
