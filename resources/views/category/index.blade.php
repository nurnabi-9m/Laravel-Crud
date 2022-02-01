@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-20">
                <div class="card">
                    <div class="card-header">
                        Category List
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
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                @forelse ($all_category as $category)
                                <tr>
                                    <td>{{ $all_category->firstItem() + $loop->index }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        @if($category->status==1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-warning">Deactive</span>
                                        @endif
                                    </td>
                                    <td>{{ App\Models\User::find($category->added_by)->name }}</td>
                                    <td>
                                        <li>Time: {{ $category->created_at->timezone('Asia/Dhaka')->format('h:i:s A') }}</li>
                                        <li>Date: {{ $category->created_at->format('d/m/Y') }}</li>
                                        <li>{{ $category->created_at->diffForHumans() }}</li>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="#" class="btn btn-info btn-sm">Edit</a>
                                            <a href="{{ url('/category/delete') }}/{{ $category->id }}" class="btn btn-danger btn-sm">Delete</a>
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
                        {{ $all_category->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection