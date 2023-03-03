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

                    @if(empty($payments[0]))
                        <div class="text-center">No Service Data Yet</div>
                    @else
                        {{-- Table --}}
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vehicle</th>
                                <th scope="col">Issue</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <th scope="row">{{ $payment->id }}</th>
                                <td>{{ $payment->vehicle_name }}</td>
                                <td>{{ $payment->issue }}</td>
                                <td>{{ $payment->status }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary text-white btn-update">Generate Payment</button>
                                </td>
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
