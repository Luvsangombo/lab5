@extends('master')
@section('contents')
<br>
<h3>Захиалга хийх</h3>
<form action={{url("book")}} method="post">
    {{@csrf_field()}}
    <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Нислэгийн дугаар</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" name="flight_number" value={{$id}}>
        </div>
      </div>
      <input name="flight_number" type="hidden" value={{$id}}>
    <div class="form-group">
      <label for="exampleInputEmail1">Төрсөн огноо</label>
      <input type="text" class="form-control" name="date" placeholder="1990-06-18">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Овог нэр</label>
      <input type="text" class="form-control" name="name" placeholder="Бат Болд">
    </div>
  
    <button type="submit" class="btn btn-primary">Захиалах</button>
  </form>
  <br>
  @if(isset($success))
<h3 class="text-success">{{$success}}</h3>
@endif
@if(isset($numbers))
<h3 class="text-success"> Захиалгын дугаар {{$numbers}}</h3>
@endif

@endsection