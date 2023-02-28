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

                    {{-- Create Repairment Done --}}
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    {{-- Update Repairment Done --}}
                    @if(session()->has('update'))
                    <div class="alert alert-success" role="alert">
                        {{ session('update') }}
                    </div>
                    @endif

                    {{-- Add --}}
                    <div class="mb-3">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#createServiceModal" class="btn btn-primary">Add New Vehicle</button>
                    </div>

                    @if(empty($repairments[0]))
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
                                @if($user->hasRole('admin'))
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($repairments as $repairment)
                            <tr>
                                <th scope="row">{{ $repairment->id }}</th>
                                <td>{{ $repairment->vehicle_name }}</td>
                                <td>{{ $repairment->issue }}</td>
                                <td>{{ $repairment->status }}</td>
                                @if($user->hasRole('admin'))
                                <td>
                                    <button type="button" data-action="{{ route('repairment.show', ['id'=> $repairment->id ]) }}" data-bs-toggle="modal" data-bs-target="#updateServiceModal" class="btn btn-warning text-white btn-update">Update</button>
                                </td>
                                @endif
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

{{-- Modals --}}
@include('user.service.modals.create')
@include('user.service.modals.update')

@endsection

@section('script')
    {{-- Script --}}
    <script src="{{ asset('js/repairment.js') }}"></script>
@endsection