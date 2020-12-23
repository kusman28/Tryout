@extends('layouts.app')

@section('content')
{{-- <dashboard></dashboard> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cart</div>

                <div class="card-body">
                    @if (count(Cart::content()))
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info text-center m-0" role="alert">
                        Your Cart is <b>empty</b>.
                    </div>
                    @endif
                    <hr>
                    <h4>Grand Total: {{Cart::subtotal()}}</h4>
                    <a href="/place-order" class="btn btn-primary col-md-6 mb-2">Place Order</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
