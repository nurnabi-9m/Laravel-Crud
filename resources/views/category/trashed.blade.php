@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-20">
                <div class="card">
                    <div class="card-header">
                        Trashed Category
                    </div>
                    <div class="card-body">
                        @if(session('delete_status'))
                            <Div class="alert alert-danger">
                                {{ (session('delete_status')) }}
                            </Div>
                        @endif
                        <table class="table table-bordered table-dark">
                            <thead>
                                <th>SL No</th>
                                <th>Category Name</t>
                                <th>Added By</th>
                                <th>Created At</th>
                                <th>Deletet At</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                @forelse ($all_trashed as $trashed)
                                <tr>
                                    <td>{{ $loop->index +1}}</td>
                                    <td>{{ $trashed->category_name }}</td>
                                    <td>{{ App\Models\User::find($trashed->added_by)->name }}</td>
                                    <td>
                                        <li>Time: {{ $trashed->created_at->timezone('Asia/Dhaka')->format('h:i:s A') }}</li>
                                        <li>Date: {{ $trashed->created_at->format('d/m/Y') }}</li>
                                        <li>{{ $trashed->created_at->diffForHumans() }}</li>
                                    </td>
                                    <td>
                                        <li>Time: {{ $trashed->deleted_at->timezone('Asia/Dhaka')->format('h:i:s A') }}</li>
                                        <li>Date: {{ $trashed->deleted_at->format('d/m/Y') }}</li>
                                        <li>{{ $trashed->deleted_at->diffForHumans() }}</li>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('/category/restore') }}/{{ $trashed->id }}" class="btn btn-success btn-sm">Restore</a>
                                            <a href="{{ url('/category/delete') }}/{{ $trashed->id }}" class="btn btn-danger btn-sm">Delete Forever</a>
                                          </div>
                                    </td>
                                </tr>
                                    
                                @empty
                                    <tr>
                                        <td class="text-danger text-center" colspan="10">No Data Added Yet !</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection