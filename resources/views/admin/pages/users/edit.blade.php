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
                    <label class="mt-3" for="course_id">Choose Course</label>
                    <select required id="course_id" name="course_id" class="form-control"
                        aria-label=".form-select-lg example">
                        @foreach ($orders as $order)
                            <option selected disabled value="{{ $order->course_id }}">
                                {{ $order['Course']['course_name'] }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="id" value="{{ $user->id }}"></input>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Update</button>
            </form>
            <form class="forms-sample mt-2" method="POST" action="{{ route('revoke', $user->id) }}">
                @csrf
                <button type="submit" class="btn btn-danger mr-2">Revoke Access</button>

            </form> 
        </div>
    </div>
    </div>
@endsection
