@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Service') }}</div>

                <div class="card-body">
                    
                    
                    <div class="text-center">
                        <h1>Service</h1>
                    </div>

                    {{-- Add --}}
                    <div class="mb-3">
                        <a href="#" class="btn btn-primary">Add New Vehicle</a>
                    </div>

                    @if(empty($services[0]))
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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                            <tr>
                                <th scope="row">{{ $service->id }}</th>
                                <td>{{ $service->vehicle_name }}</td>
                                <td>{{ $service->issue }}</td>
                                <td>{{ $service->status }}</td>
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