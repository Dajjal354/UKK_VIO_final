@extends('layouts.userApp')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Update Profile Information Form -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="margin: 10px">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Add margin for spacing -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="margin: 10px">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Add margin for spacing -->
            <div class="margin-10px p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="margin: 10px">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <div class="margin-10px p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="margin: 10px">
            <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                        @csrf
    
                        @if (session('success'))
                            <div class="alert alert-success" role="alert" class="text-danger">
                                {{ session('success') }}
                            </div>
                        @endif
  
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Avatar: </label>
                                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}"  autocomplete="avatar">
  
                                @error('avatar')
                                    <span role="alert" class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
  
                            <div class="mb-3 col-md-6">
                                <img src="/avatars/{{ auth()->user()->avatar }}" style="width:80px;margin-top: 10px;">
                            </div>
  
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    @endsection
