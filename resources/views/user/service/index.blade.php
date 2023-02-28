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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($repairments as $repairment)
                            <tr>
                                <th scope="row">{{ $repairment->id }}</th>
                                <td>{{ $repairment->vehicle_name }}</td>
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

<!-- Modal -->
<div class="modal fade" id="createServiceModal" tabindex="-1" aria-labelledby="createServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createServiceModalLabel">Add Vehicle</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/user/repairment" method="post">
            @csrf
            <div class="modal-body">
                    {{-- Hidden --}}
                    <input type="hidden" class="form-control" name="user_id" value="{{ $user->id }}">

                    <div class="mb-3">
                        <label for="vehicle_name" class="form-label">Vehicle Name</label>
                        <input type="text" class="form-control" id="vehicle_name" placeholder="Toyota Avanza" name="vehicle_name">
                    </div> 

                    <div class="mb-3">
                        <label for="issue">Issue</label>
                        <textarea class="form-control" placeholder="Leave a Specific Problem of Your Vehicle Here" id="issue" name="issue" style="height: 100px"></textarea>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection