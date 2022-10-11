@extends('admin.admin_master')
@section('main')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add New Course</h4>
            <p class="card-description">
                <!-- Insert paragraph-->
            </p>
            
            <form class="forms-sample" method="POST" action="{{ route('store-course') }}">
                @csrf
               
                <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" class="form-control" name="course_name" id="course_name" required placeholder="Course Name">
                    @error('course_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mr-2">Add</button>
                
            </form>
        </div>
    </div>
    </div>
@endsection
