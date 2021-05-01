@extends('master')
@section('contents')
<h1 class="text-center">Гүйлгээ</h1>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Хэнээс </th>
        <th scope="col">Хэнд</th>
        <th scope="col">Гүйлгээний дүн</th>
        <th scope="col">Гүйлгээний утга</th>
      </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
        <tr>
            <th scope="row">{{$transaction->id}}</th>
            <td>
                {{
                        $transaction->transaction_from
                }}
             
            </td>
            <td>
                {{
                        $transaction->transaction_to
                }}
            </td>
            <td>
                {{
                        $transaction->transaction_amount
                }}
            </td>
             <td>
                {{
                        $transaction->transaction_description
                }}
            </td>
        </tr>

@endforeach
    </tbody>
</table>
@endsection