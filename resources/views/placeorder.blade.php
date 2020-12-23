@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Place Order</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Payment Method</label>

                            <div class="col-md-6">
                               <h4>Cash on Delivery</h4>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name of Receiver</label>

                            <div class="col-md-6">
                               <h4>{{ Auth::user()->name }} </h4>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="order" class="col-md-4 col-form-label text-md-right">Order Details</label>

                            <div class="col-md-6">
                            @foreach (Cart::content() as $item)
                               <h5>Item Name: {{ $item->name }} <br>
                                <input type="hidden" value="{{$item->name}}" class="form-control @error('product') is-invalid @enderror" name="product" value="{{ old('product') }}" required>
                                Qty: {{ $item->qty }} <br>
                                <input type="hidden" value="{{$item->qty}}" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ old('qty') }}" required>
                                Unit Price: {{$item->price}} <br>
                                <input type="hidden" value="{{$item->price}}" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
                                Tax: P{{$item->tax}}
                               </h5>
                                @endforeach
                                <hr>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total" class="col-md-4 col-form-label text-md-right">Grand Total</label>
                            <div class="col-md-6">
                                <h3>P{{ Cart::total() }}</h3>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Shipping Address</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('shipping_addr') is-invalid @enderror" name="shipping_addr" value="{{ old('shipping_addr') }}" required>

                       
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Billing Address</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('billing_addr') is-invalid @enderror" name="billing_addr" value="{{ old('billing_addr') }}" required>
                       
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary col-md-6">
                                    Confirm
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection