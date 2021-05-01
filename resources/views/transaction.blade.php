@extends('master')
@section('contents')
<h1 class="text-center">Гүйлгээ хийх</h1>
<form method="post" action="transaction">
    {{@csrf_field()}}
    <div class="form-group col-sm-6">
      <label >Шилжүүлэх данс</label>
      <input type="number" class="form-control" name="transaction_from" placeholder="Шилжүүлэх данс">
    </div>
    <div class="form-group col-sm-6">
      <label >Хүлээн авах данс </label>
      <input type="number" class="form-control" name="transaction_to" placeholder="Хүлээн авах данс">
    </div>
    <div class="form-group col-sm-6">
        <label >Дүн</label>
        <input type="number" class="form-control" name="transaction_amount" placeholder="Дүн">
      </div>
      <div class="form-group col-sm-6">
        <label >Гүйлгээний утга </label>
        <input type="text" class="form-control" name="transaction_desc" placeholder="Гүйлгээний утга">
      </div>
    <button type="submit" class="btn btn-primary">Шилжүүлэг хийх</button>
  </form>
@if(session('success'))
<h3 class="text-danger">{{session('success')}}</h3>
@endif
@if(session('congratulation'))
<h3 class="text-success">{{session('congratulation')}}</h3>
@endif
@endsection
