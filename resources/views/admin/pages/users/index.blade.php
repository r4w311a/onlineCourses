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
                    <p class="card-title">Users List</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1 @endphp

                                        @foreach ($users as $user)
                                            <tr class="text-center align-middle">
                                                <td class="align-middle">{{$i++}}</td>
                                                <td class="align-middle">{{ $user->name }}</td>
                                                <td class="align-middle">{{ $user->email }}</td>
                                                <td class="align-middle">{{ $user->created_at->diffForHumans() }}</td>
                                                <td class="align-middle">
                                                    <a href="{{ route('edit-user', $user->id) }}"
                                                class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{ route('delete-user', $user->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
