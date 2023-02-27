@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    
                    
                    <div class="text-center">
                        <h1>Your Profile</h1>
                    </div>

                    {{-- Update Profile Done --}}
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="/user/profile" method="post" id="form-update">
                        @method('put')
                        @csrf

                        {{-- Hidden --}}
                        <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">

                        {{-- If There is an update Needed --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Anton" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="name@example.com">
                        </div>

                        <button id="button-update" class="btn btn-primary d-none" type="submit">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    {{-- Script --}}
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection