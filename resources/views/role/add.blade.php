@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Role Add Form
                    </div>
                    <div class="card-body">

                        @if(session('InsErr'))
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('InsErr') }}</strong>
                          </div>
                        @endif
                        <form action="{{ url('/role/add') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="role">
                                @error('role')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary form-control">
                                    Add Role
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Role List
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-dark">
                            <thead>
                                <th>SL No</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                @forelse ($all_roles as $role)
                                <tr>
                                    <td>{{ $all_roles->firstItem() + $loop->index }}</td>
                                    <td>{{ $role->role }}</td>
                                    <td>{{ $role->status }}</td>
                                    <td>
                                        <li>Time: {{ $role->created_at->timezone('Asia/Dhaka')->format('h:i:s A') }}</li>
                                        <li>Date: {{ $role->created_at->format('d/m/Y') }}</li>
                                        <li>{{ $role->created_at->diffForHumans() }}</li>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-info">Edit</button>
                                            <button type="button" class="btn btn-danger">Delete</button>
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
                        {{ $all_roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection