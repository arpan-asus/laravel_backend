@extends('site.template')
@section('content')
    <br /> <br />
    <form action="{{ route('postAddOrder')}}" method="post">
        @csrf
        <div class="container">
            <div class="row">
                <br /> <br />
                <div class="col-md-12">
                    <h2>Checkout</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h5>Billling and Shipping Information</h5>
                    <div class="form-group">
                        <label for="exampleInputPassword1">FullName</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Zip Code</label>
                        <input type="number" name="zipcode" class="form-control" id="zipcode" placeholder="Zip Code">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="email"
                            aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact Number</label>
                        <input type="number" name="number" class="form-control" id="number"
                            aria-describedby="emailHelp" placeholder="Enter contact number">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">State</label>
                        <select name="shipping" id="shipping" class="form-control">
                            <option value="">Select Your State</option>
                            @foreach ($shippings as $shipping)
                                <option value="{{ $shipping->id }}" class="shipment">{{ $shipping->state }} @ NPR
                                    {{ $shipping->charge }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Your Order</h5>
                    <ul>
                        @foreach ($carts as $cart)
                            @php $productinfo = App\Models\Product::find($cart->product_id);  @endphp
                            <li>{{ $productinfo->title }}X{{ $cart->qty }} <span
                                    style="font-weight:bold; float:right">NPR {{ $cart->totalcost }}</span></li>
                        @endforeach
                        <li><strong>Sub Total</strong> : <span style="font-weight:bold; float:right" id="subtotal"
                                name="subtotal">NPR {{ $subtotal }}</span> </li>
                        <li><strong>Shipping Charge</strong> : <span style="font-weight:bold; float:right"
                                id="shippingcharge" name="shippingcharge">NPR 0.0</span> </li>
                        <li><strong>Grand Total</strong> : <span style="font-weight:bold; float:right" id="grandtotal" name="grandtotal">NPR {{ $subtotal }}</span> </li>
                    </ul>
                    <br />
                    <hr>
                    <h5>Payment Method</h5>
                    <ul>
                        <li><input type="radio" name="paymentmethod"> Esewa</li>
                        <li><input type="radio" name="paymentmethod"> Cash on Delivery</li>

                    </ul>
                    <hr>
                    <input class="btn btn-primary" type="submit" value="Pay Now">

                </div>
            </div>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $('#shipping').change(function() {
            var shipping = $(this).val();
            $.ajax({
                type: 'POST',
                url: "{{ route('postAjax') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    shipping: shipping

                },
                success: function(data) {
                    $('#subtotal').html(data.totalcost);
                    $('#shippingcharge').html(data.shippingcost);
                    $('#grandtotal').html(data.grandtotal);
                }
            });

        });
    </script>
@stop
