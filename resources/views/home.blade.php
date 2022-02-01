@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                  <h3>Total User: {{ $total_users }}</h3>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-dark">
                        <thead>
                          <tr>
                            <th>Sl No.</th>
                            <th>ID No.</th>
                            <th>User Name</th>
                            <th>Email Address</th>
                            <th>Created At</th>
                    <th>Action</th>

                          </tr>
                        </thead>
                        {{-- <tbody>
                          @php
                              $flag = 1;
                          @endphp --}}
                            @foreach($users as $user)
                          <tr>
                            {{-- <td>{{ $flag++ }}</td> --}}
                            {{-- <td>{{ $loop->index +1 }}</td> --}}
                            <td>{{ $users->firstItem() + $loop->index }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ Str::title($user->name) }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                              <li>Time: {{ $user->created_at->timezone('Asia/Dhaka')->format('h:i:s A') }}</li>
                              <li>Date: {{ $user->created_at->format('d/m/Y') }}</li>
                              <li>{{ $user->created_at->diffForHumans() }}</li>

                            </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-info">Edit</button>
                              <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                          </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
