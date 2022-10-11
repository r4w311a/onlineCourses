@extends('admin.admin_master')
@section('main')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add New User</h4>
            <p class="card-description">
                <!-- Insert paragraph-->
            </p>

            <form class="forms-sample" method="POST" action="{{ route('store-user') }}">
                @csrf

                <div class="form-group">
                    <label class="mt-3" for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required
                        placeholder="Name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label class="mt-3" for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" required
                        placeholder="email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label class="mt-3" for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required
                        placeholder="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label class="mt-3" for="course_id">Choose Course</label>
                    <select required id ="course_id" name="course_id" class="form-control"
                        aria-label=".form-select-lg example">
                        <option selected disabled>Choose Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">
                                {{ $course->course_name }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mr-2">Add</button>

            </form>
        </div>
    </div>
    </div>
@endsection
