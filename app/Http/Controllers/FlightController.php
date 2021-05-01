<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;

class FlightController extends Controller
{
    public function search(Request $request){
        $response = Http::post('http://127.0.0.1:8081/api/flight/search', [
            'departure_airport'=>$request->departure_airport,
            'arrival_airport'=>$request->arrival_airport,
            'departure_date'=>$request->date,
            'passenger_number'=>$request->passenger_number
        ]);
        if (empty($response)){
        return redirect('search_flight')->with('error', "Тохирох нислэг олдсонгүй");}
        else {
        $flights=json_decode($response, true);
        return redirect('search_flight')->with('flights', $flights);}
    }
    public function order($id){
            return view('book', ['id'=>$id]);
    }
    public function book(Request $request){
        error_log($request->flight_number);
        error_log($request->date);
        error_log($request->name);
        $response = Http::post('http://127.0.0.1:8081/api/flight/book', [
            'flight_number'=>$request->flight_number,
            'passenger_birth'=>$request->date,
            'passenger_name'=>$request->name
        ]);
        if(!empty($response)){
            $numbers=json_decode($response, true);
                $number = $numbers['booking_id'];
         
        return view('book', ['success'=>"Амжилттай хадгалагдлаа", 'id'=>$request->flight_number, 'numbers'=>$number
  ]);}}
    
}