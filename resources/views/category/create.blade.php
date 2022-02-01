@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto">
                <div class="card">
                    <div class="card-header">
                        Category Add Form
                    </div>
                    <div class="card-body">

                        @if(session('InsErr'))
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('InsErr') }}</strong>
                          </div>
                        @endif
                        @if(session('InsDone'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('InsDone') }}</strong>
                          </div>
                        @endif
                        <form action="{{ url('/category/store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name">
                                @error('category_name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary form-control">
                                    Add Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection