@extends('layouts.app')

@section('content')
<h2 style="font-family:Tekton Pro Ext; font-size: 38px;">&nbsp;Store Cashiers</h2>
<hr>

<div class="card shadow">
        <div class="card-body">
        <table id="table_id" class="display">
                <thead>
                    <tr style="background-color:lightgrey">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Shop</th>
                        <th>ID Number</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($cashiers) > 0)
                @foreach($cashiers as $cashier)
                    <tr>
                        <td>{{$cashier->id}}</td>
                        <td><a href="/cashiers/{{$cashier->id}}">{{$cashier->name}}</a></td>
                        <td>{{$cashier->shop_name}}</td>
                        <td>{{$cashier->idnumber}}</td>
                        <td>{{$cashier->phone}}</td>
                        <th>{{$cashier->email}}</th>
                        <td>{{$cashier->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No cashiers found</p>
            @endif
        </div>
</div><br>
<a href="/products" class="btn btn-sm btn-block btn-secondary">Exit</a>
            <a href="/cashiers/create" class="btn btn-sm btn-block btn-warning">+ add a new cashier!</a>
@endsection