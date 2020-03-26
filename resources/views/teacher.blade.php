@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Teacher Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="create-btn" style="margin-bottom: 40px">
                        <a href="{{ route('teacher.create')}}" class="btn btn-primary">Add Data</a>
                    </div>
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <td>Name</td>
                              <td>Email</td>
                              <td>Role</td>
                              <td colspan="4">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->role }}</td>
                                <td><a href="{{ route('teacher.show', $teacher->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                <td><a href="{{ route('teacher.edit', $teacher->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection