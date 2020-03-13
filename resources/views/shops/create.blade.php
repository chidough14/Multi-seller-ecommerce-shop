@extends('layouts.app')

@section('content')
<h2>Create Your Shop</h2>

<form action="{{ route('shop.store')}}" method="post">@csrf
    <div class="form-group">
      <label for="name">Shop Name</label>
      <input type="text" name="name" class="form-control" placeholder="Shop Name" aria-describedby="helpId">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name="description" id="" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Create</button>
</form>
@endsection
