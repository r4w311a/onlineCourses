@extends('admin.admin_master')
@section('main')
   

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Here We GO! -->
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Chapter List</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Course Name</th>
                                            <th>Chapter No.</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1 @endphp
                                        @foreach ($chapters as $chapter)
                                            <tr class="text-center align-middle">
                                                <td class="align-middle">{{$i++}}</td>
                                                <td class="align-middle">{{ $chapter->Course->course_name }}</td>
                                                <td class="align-middle">{{ $chapter->chapter_num }}</td>
                                                <td class="align-middle">{{ $chapter->created_at->diffForHumans() }}</td>
                                                <td class="align-middle">
                                                    <a href="{{ route('delete-chapter', $chapter->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                </td>

                                            </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
