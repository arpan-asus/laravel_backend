@extends('site.template')
@section('content')
<br /> <br />
    <div class="container">
        <div class="row">
            <br /> <br />
            <div class="col-md-12">
            <h2>Checkout</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">


                <form action="">
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
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contact Number</label>
                      <input type="number" name="phone" class="form-control" id="phone" placeholder="Contact Number">
                    </div>
                  </form>
            </div>
            <div class="col-md-4">
                <h5>Your Order</h5>
                <ul>
                    <li>productnameX2       <span style="font-weight:bold; float:right">NPR 2000</span></li>
                    <li>productnameX2       <span style="font-weight:bold; float:right">NPR 2000</span></li>
                    <li><strong>Sub Total</strong> : <span style="font-weight:bold; float:right">NPR 4000</span> </li>
                    <li><strong>Shipping Charge</strong> : <span style="font-weight:bold; float:right">NPR 0.0</span> </li>
                    <li><strong>Grand Total</strong> : <span style="font-weight:bold; float:right">NPR 4000.0</span> </li>
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
@stop
