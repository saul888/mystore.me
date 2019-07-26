@extends('layouts.app')

@section('content')
<div class="container">
    <h1>&nbsp;Shop Sales</h1>
    <hr>
    <div class="card shadow">
        <hr>
        <div class="card-body">
        <table id="table_id" class="display">
                <thead>
                    <tr style="background-color:lightgrey">
                        <th>Id</th>
                        <th>Cashier</th>
                        <th>Shop ID</th>
                        <th>Item ID</th>
                        <th>Quantity</th>
                        <th>Cashsale</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($sales) > 0)
                @foreach($sales as $sale)
                    <tr>
                        <td>{{$sale->id}}</td>
                        <td><a href="/sales/{{$sale->id}}">{{$sale->staff_name}}</a></td>
                        <td>{!!$sale->shop_id!!}</td>
                        <td><a href="/items/">{!!$sale->item_title!!}</a></td>
                        <td>{{$sale->quantity}}</td>
                        <td>{{$sale->cashsale}}</td>
                        <td>{{$sale->created_at}}</td>
                    </tr>
                    @endforeach
                    @else
                    <p>No sales found</p>
                    @endif
                </tbody>
            </table>
            <a id="btn" href="/sales/create">+ new product Sale!</a>
            <hr>
        </div>
        </div>
        <br>
    </div>

@endsection