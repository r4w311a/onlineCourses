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
                    <p class="card-title">Orders List</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>User Name</th>
                                            <th>Course Name</th>
                                            <th>Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1 @endphp
                                        @foreach ($orders as $order)
                                            <tr class="text-center align-middle">
                                                <td class="align-middle">{{ $i++ }}</td>
                                                <td class="align-middle">{{ $order->User->name }}</td>
                                                <td class="align-middle"></td>
                                                <td class="align-middle">{{ $order->created_at }}</td>
                                            </tr>
                                            
                                        @endforeach
                                          
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
