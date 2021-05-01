@extends('master')
@section('contents')
<br>
<h3>Нислэг хайх</h3>
<br> 
<br> 
<form action="search_flight" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="exampleFormControlSelect1">Хаанаас</label>
      <select class="form-control" name="departure_airport" value="ULN">
        <option value="ULN">ULN</option>
        <option value="INC">INC</option>
        <option value="SHT">SHT</option>
        <option value="IST">IST</option>
      </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Хаашаа</label>
        <select class="form-control" name="arrival_airport" value="ULN">
            <option value="ULN">ULN</option>
            <option value="INC">INC</option>
            <option value="SHT">SHT</option>
            <option value="IST">IST</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Хүний тоо</label>
        <input type="number" class="form-control" name="passenger_number" placeholder="1">
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Огноо</label>
        <input type="text" class="form-control" name="date" placeholder="2020-06-18">
      </div>
      <button type="submit" class="btn btn-primary">Хайх</button>
  </form>
  <br>

  @if(Session::get('flights'))
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Хаанаас </th>
      <th scope="col">Хаашаа </th>
      <th scope="col">Нисэх өдөр</th>
      <th scope="col"></th>
    </tr>
  </thead>
  @foreach(Session::get('flights') as $flight)
    <tbody>
      <tr>
        <td>{{$flight['flight_number']}}</td>
        <td>{{$flight['departure_airport']}}</td>
        <td>{{$flight['arrival_airport']}}</td>
        <td>{{$flight['departure_date']}}</td>
        <td><a href="book/{{$flight['flight_number']}}">Захиалах </td>
      </tr>
    </tbody>
     @endforeach
    </table>
@elseif(Session::get('error'))
<h3 class="text-danger">{{Session::get('error')}}</h3>
@endif
@endsection