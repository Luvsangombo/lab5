@extends('master')
@section('contents')
    

<h1>Бүх Оюутан</h1>

@foreach($a as $student)
<li> <a href="student/{{$student[0]}}"> {{ $student[0] }}</a> </li>
@endforeach

@endsection