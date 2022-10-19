@extends('admin.admin_master')
@section('main')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add New Chapter</h4>
            <p class="card-description">
                <!-- Insert paragraph-->
            </p>

            <form class="forms-sample" method="POST" action="{{ route('store-chapter') }}">
                @csrf

                <div class="form-group">
                    <label for="chapter_num">Chapter Number</label>
                    <input type="number" class="form-control" name="chapter_num" id="chapter_num" required
                        placeholder="Chapter Number">
                    @error('chapter_num')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label class="mt-3" for="course_id">Choose Course</label>
                    <select required id="course_id" name="course_id" class="form-control"
                        aria-label=".form-select-lg example">
                        <option selected disabled>Choose Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">
                                {{ $course->course_name }}</option>
                        @endforeach
                        @error('course_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Add</button>

            </form>
        </div>
    </div>
    </div>
@endsection
