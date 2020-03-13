@extends('layouts.front')

@section('content')

<div class="container-fluid text-center">
    <!-- <h2>Cart Items</h2>


     <table class="table">
         <thead>
             <tr>
                 <th>Name</th>
                 <th>Price</th>
                 <th>Quantity</th>
                 <th>Action</th>
             </tr>
         </thead>
         <tbody>
         @foreach($cart as $c)
             <tr>
                 <td scope="row">{{ $c->name }}</td>
                 <td>{{ $c->price }}</td>
                 <td>
                     <form action="{{ route('cart.update', $c->id) }}">
                        <input type="number" value="{{ $c->quantity }}" class="form-control" name="quantity">
                        <input type="submit" value="save" class="btn btn-primary">
                     </form>
                 </td>
                 <td>
                     <a class="btn btn-warning" href="{{ route('cart.destroy', $c->id)}}">Delete</a>
                 </td>
             </tr>
          @endforeach
         </tbody>
     </table>
     <h4>Total Price: ${{ $totalprice }}</h4>
     <a class="btn btn-success" href="{{ route('cart.checkout') }}">Checkout</a> -->



     <div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1 class="cart-heading">Cart</h1>
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>remove</th>
                                            <th>images</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <!-- <th>Total</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cart as $c)
                                        <tr>
                                            <td class="product-remove"><a href="{{ route('cart.destroy', $c->id)}}"><i class="pe-7s-close"></i></a></td>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="assets/img/cart/1.jpg" alt=""></a>
                                            </td>
                                            <td class="product-name"><a href="#">{{ $c->name }} </a></td>
                                            <td class="product-price-cart"><span class="amount">{{ $c->price }}</span></td>
                                            <td class="product-quantity">
                                                <form action="{{ route('cart.update', $c->id) }}">
                                                    <input type="number" value="{{ $c->quantity }}" class="form-control" name="quantity">
                                                    <input type="submit" value="save" class="btn btn-primary">
                                                </form>
                                            </td>
                                           <!--  <td class="product-subtotal"> ${{ $totalprice }}</td> -->
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="coupon-all">
                                        <div class="coupon">
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul>
                                            <li>Total<span>${{ $totalprice }}</span></li>
                                        </ul>
                                        <a href="{{ route('cart.checkout') }}">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>


</div>
@endsection
