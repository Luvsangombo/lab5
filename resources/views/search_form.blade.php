@extends('master')
@section('contents')
<h1>Оюутан хайх</h1>
<br> 
<h5 class="mx-sm-3 mb-2">
   Оюутны код оруулах: 
</h5>

<form class="form-inline" action="search" method="post">
{{ csrf_field() }}


<div class="form-group">
<input type="text" class="form-control mx-sm-3 mb-2" name="studentId">
<input type="submit" class="btn-primary mb-2" value="Хайх">
</div>
<br>
@if($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li class="text-danger">{{$error}}</li>
    @endforeach
</ul>
@endif
</form>
@if(isset($result))
@foreach($result as $student)
<h1>{{ $student }}</h1>
@endforeach
@endif
@endsection