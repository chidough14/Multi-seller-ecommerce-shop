@extends('layouts.front')

@section('content')

   <h2> {{ $categoryName ?? null }} Products</h2>
   <div class="custom-row-2">
        @foreach($products as $product)
            @include('product.single_product')

        @endforeach
   </div>
@endsection
