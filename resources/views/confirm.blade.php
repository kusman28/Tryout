@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-3">Thank You!</h1>
    <p class="lead"><strong>Please check your email</strong> for your order details and receipt.</p>
    <p class="lead">Amount to Pay: P{{Cart::total()}}</p>
    
    <hr>
    <p>
        Having trouble? <a href="">Contact us</a>
    </p>
    <p class="lead">
        <a class="btn btn-primary btn-sm" href="/" role="button">Continue Shopping</a>
    </p>
</div>
@endsection