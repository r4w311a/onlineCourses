@extends('admin.admin_master')
@section('main')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add New Lesson</h4>
            <p class="card-description">
                <!-- Insert paragraph-->
            </p>

            <form class="forms-sample" method="POST" action="{{ route('store-lesson') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">



                    <label for="lesson_link">File upload</label>
                    <input id="lesson_link" type="file" name="lesson_link" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled=""
                            placeholder="Upload Lesson">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>
                    @error('lesson_link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <br>


                

                    <label class="mt-3" for="chapter_id">Chapter Number</label>
                    <select required id="chapter_id" name="chapter_id" class="form-control"
                        aria-label=".form-select-lg example">
                        <option selected disabled>Choose Chapter</option>
                        @foreach ($chapters as $chapter)
                            <option value="{{ $chapter->id }}">
                                {{ $chapter->chapter_num }}</option>
                        @endforeach
                    </select>
                    @error('chapter_id')
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
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Upload</button>

            </form>
        </div>
    </div>
    </div>
@endsection
