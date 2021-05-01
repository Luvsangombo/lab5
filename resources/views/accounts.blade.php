@extends('master')
@section('contents')
<h1 class="text-center">Дансны мэдээлэл</h1>


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Дансны дугаар </th>
        <th scope="col">Дансны Нэр </th>
        <th scope="col">Дансны үлдэгдэл</th>
      </tr>
    </thead>
    <tbody>
        @foreach($accounts as $account)
        <tr>
            <th scope="row">{{$account->id}}</th>
            <td><a href="{{url('account')}}/{{$account->account_number}}">
                {{
                        $account->account_number
                }}
                </a>
            </td>
            <td>
                {{
                        $account->account_name
                }}
            </td>
             <td>
                {{
                        $account->account_balance
                }}
            </td>
        </tr>

@endforeach
    </tbody>
</table>
@endsection