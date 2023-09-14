@extends('site.template')
@section('content')
<br><br><br><br>
<div class="row d-flex justify-content-center align-items-center">
  <div class="col-md-8 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h1 class="mb-0 text-center">Billing details</h1>
      </div>
      <div class="card-body">
<form class="row g-3">
    <div class="mb-3 col-md-6">
        State
        <select name="state" id="state">
            <option value="Koshi">Koshi</option>
            <option value="Madhesh">Madhesh</option>
            <option value="Bagmati">Bagmati</option>
            <option value="Gandaki">Gandaki</option>
            <option value="Lumbini">Lumbini</option>
            <option value="Karnali">Karnali</option>
            <option value="Sudurpashchim">Sudurpashchim</option>
          </select>
      </div>
  </div>
  <div class="col-md-6">
    <label class="form-label">Charge</label>
     <input type="text" name="charge" class="form-control border border-2 p-2">
  </div>
  <div class="col-md-6">
    <label class="form-label">Shipping Status:
        <input type="radio" id="show" name="status" value="SHOW">
        <label for="show">Show</label>
        <input type="radio" id="hide" name="status" value="HIDE">
        <label for="hide">Hide</label>
    </label>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="street no.">
  </div>
  <div class="col-md-3">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip" style="height:30px; width:100px;">
  </div>
  <br><br><br>
  <div class="col-12 d-flex justify-content-center">
    <button type="submit" class="btn btn-primary">proceed</button>
  </div>
</form>
            </div>
        </div>
    </div>
</div>
@stop
