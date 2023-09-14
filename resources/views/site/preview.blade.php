@extends('site.template')
@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Order Now</title>
    </head>

    <body>
        <div id="card" style="padding: 50px 0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3><b>Order Confirmation <span class="text-success">eSewa</span> </b></h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <p><strong>
                                            <h4>Personal Information</h4>
                                        </strong></p>
                                    <div class="d-flex">
                                        <div class="perinfo col-6">
                                            <p>Fullname: </p>
                                            <p>E-mail: </p>
                                            <p>City: </p>
                                            <p>Zipcode: </p>
                                        </div>
                                        <div class="preinfo col-6">
                                            <p><b>name</b></p>
                                            <p><b>email</b></p>
                                            <p><b>city</b></p>
                                            <p><b>zipcode</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table>
                                        <p><strong>
                                                <h4>Order Summary</h4>
                                            </strong></p> <br>
                                        <ul class="d-flex">
                                            <div class="paytable col-md-10">

                                                <div>SubTotal : </div>
                                                <div>Estimated Tax(13%): </div>
                                                <div>Shipping : </div>
                                                <div><strong>GrandTotal</strong> : </div>
                                            </div>
                                            <div class="paymentprice ">



                                                <div>totalamount</div>

                                                <span class="tax-amount">taxamount</span><br>
                                                <div>shippingamount</div>

                                                <strong><span class="grand-total">grandtotal</span></strong>
                                            </div>
                                        </ul>
                                </div>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
    </body>

    </html>
@stop
