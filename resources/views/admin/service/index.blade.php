@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Repairment') }}</div>

                <div class="card-body">
                    
                    
                    <div class="text-center">
                        <h1>Repairment</h1>
                    </div>

                    @if(empty($repairments[0]))
                        <div class="text-center">No Service Data Yet</div>
                    @else
                        {{-- Table --}}
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vehicle</th>
                                <th scope="col">Owner</th>
                                <th scope="col">Issue</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($repairments as $repairment)
                            <tr>
                                <th scope="row">{{ $repairment->id }}</th>
                                <td>{{ $repairment->vehicle_name }}</td>
                                <td>{{ $repairment->user->name }}</td>
                                <td>{{ $repairment->issue }}</td>
                                <td>{{ $repairment->status }}</td>
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