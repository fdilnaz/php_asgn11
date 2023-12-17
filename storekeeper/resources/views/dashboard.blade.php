@extends('layouts.app')

@section('content')
    <h2>Dashboard</h2>

    <div class="card">
        <h3>Today's Sales: {{ $salesFigures['today'] }}</h3>
    </div>

    <div class="card">
        <h3>Yesterday's Sales: {{ $salesFigures['yesterday'] }}</h3>
    </div>

    <div class="card">
        <h3>This Month's Sales: {{ $salesFigures['this_month'] }}</h3>
    </div>

    <div class="card">
        <h3>Last Month's Sales: {{ $salesFigures['last_month'] }}</h3>
    </div>
@endsection
