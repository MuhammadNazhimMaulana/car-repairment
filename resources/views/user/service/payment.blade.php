@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Payment') }}</div>

                <div class="card-body">
                    
                    
                    <div class="text-center mb-4">
                        <h1>Payment</h1>
                    </div>

                    {{-- Create Payment Done --}}
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(empty($payments[0]))
                        <div class="text-center">No Pending Payment Yet</div>
                    @else
                        {{-- Table --}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vehicle</th>
                                <th scope="col">VA Number</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <th scope="row">{{ $payment->id }}</th>
                                <td>{{ $payment->vehicle_name }}</td>
                                <td>{{ $payment->transaction->midtrans_va_number }}</td>
                                <td>{{ $payment->status }}</td>
                                <td>{{ $payment->transaction->total }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
