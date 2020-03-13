@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Checkout</h2>

    <h3>Shipping Information</h3>

    <form action="{{ route('orders.store') }}" method="post">@csrf
        <div class="form-group">
           <div class="form-group">
             <label for="fullname">Full Name</label>
             <input type="text" class="form-control" name="shipping_fullname" aria-describedby="helpId" placeholder="Full Name">
           </div>

           <div class="form-group">
             <label for="state">State</label>
             <input type="text" class="form-control" name="shipping_state" aria-describedby="helpId" placeholder="State">
           </div>

           <div class="form-group">
             <label for="city">City</label>
             <input type="text" class="form-control" name="shipping_city" aria-describedby="helpId" placeholder="City">
           </div>

           <div class="form-group">
             <label for="zipcode">Zip Code</label>
             <input type="number" class="form-control" name="shipping_zipcode" aria-describedby="helpId" placeholder="Zip Code">
           </div>

           <div class="form-group">
             <label for="address">Address</label>
             <input type="text" class="form-control" name="shipping_address" aria-describedby="helpId" placeholder="Address">
           </div>

           <div class="form-group">
             <label for="phone">Phone</label>
             <input type="text" class="form-control" name="shipping_phone" aria-describedby="helpId" placeholder="Phone">
           </div>

           <h3>Payment Option</h3>

           <div class="form-check">
               <label class="form-check-label">
               <input type="radio" class="form-check-input" name="payment_method" id="" value="cash_on_delivery">
               Cash on Delivery
             </label>
           </div>

           <div class="form-check">
               <label class="form-check-label">
               <input type="radio" class="form-check-input" name="payment_method" id="" value="paypal">
               Paypal
             </label>
           </div>


           <button type="submit" class="btn btn-primary mt-3">Place Order</button>
        </div>
    </form>



@endsection
