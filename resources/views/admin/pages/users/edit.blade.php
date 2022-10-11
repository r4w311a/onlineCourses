@extends('admin.admin_master')
@section('main')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit User</h4>
            <p class="card-description">
                <!-- Insert paragraph-->
            </p>

            <form class="forms-sample" method="POST" action="{{ route('update-user') }}">
                @csrf

                <div class="form-group">
                    <label class="mt-3" for="name">Name</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name"
                        required placeholder="Name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label class="mt-3" for="email">Username</label>
                    <input type="text" class="form-control" value="{{ $user->email }}" name="email" id="email"
                        required placeholder="username">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label class="mt-3" for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="hidden" name="id" value="{{ $user->id }}"></input>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Update</button>

            </form>
        </div>
    </div>
    </div>
@endsection
