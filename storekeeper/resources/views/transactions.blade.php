@extends('layouts.app')

@section('content')
    <h2>Transaction History</h2>

    <table border="1" class="text-center" cellpadding="10px">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>{{ $transaction->price }}</td>
                    <td>{{ $transaction->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
