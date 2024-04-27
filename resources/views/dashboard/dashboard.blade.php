@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')

    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Currency Received Over Time</h5>
                        </div>
                    </div>
                    <div id="chartCurrency"></div>
                </div>
            </div>

        </div>
        <div class="row">
            <canvas id="myChart"></canvas>
        </div>
    </div>

@endsection
