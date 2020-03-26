@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADMIN Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="create-btn" style="margin-bottom: 40px">
                        <a href="{{ route('admin.create')}}" class="btn btn-primary">Add Data</a>
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
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td><a href="{{ route('admin.show', $user->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                <td><a href="{{ route('admin.edit', $user->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                                <td>
                                    <form action="{{ route('admin.destroy', $user->id)}}" method="post">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
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