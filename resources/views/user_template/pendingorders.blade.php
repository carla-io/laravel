@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
Pending Orders

@if(session()->has('message'))
                  <div class="alert alert-success">
                    {{ session()-> get('message') }}
                  </div>
@endif

<table>
  <tr>
    <th>Product ID</th>
    <th>Price</th>
  </tr>
  @foreach($pending_orders as $order)
  <tr>
    <td></td>
  </tr>
  @endforeach
</table>
@endsection