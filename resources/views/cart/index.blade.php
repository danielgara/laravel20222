@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <h1>Products in cart</h1>
    <ul>
      @foreach($viewData["products"] as $product)
        <li>
          Name: {{ $product["name"] }} -
          Price: {{ $product["price"] }}
        </li>
      @endforeach

      <p><a href="{{ route('cart.purchase') }}"
          class="btn bg-primary text-white">Comprar</a></p>

      <p><a href="{{ route('cart.removeAll') }}"
          class="btn bg-primary text-white">Remove cart</a></p>
    </ul>
    </div>
  </div>
</div>
@endsection
