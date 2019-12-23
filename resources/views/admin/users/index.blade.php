@extends('admin.layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox collapsed">
                <div class="ibox-title">
                    <h5>Add a New User</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                <form action="{{action('Admin\UserController@store')}}" enctype="multipart/form-data" method="POST">     
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option>Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="staff">Staff</option>
                                        <option value="cleaner">Cleaner</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 text-left">
                                <div class="form-group">
                                    <button class="btn btn-primary">Add User</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
        	<div class="ibox ">
                <div class="ibox-title">
                    <h5>Available Users</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key=>$user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->is_suspended)
                                            <span class="label label-danger">Suspended</span>
                                        @else
                                            <span class="label label-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$user->roles()->pluck('name')->toArray()[0] ?? ''}}
                                    </td>
                                    <th>
                                        <form action="{{ action('Admin\UserController@destroy', $user->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a title="Edit This User" href="{{ action('Admin\UserController@edit', $user->id) }}" class="btn btn-info">
                                                <span class="fa fa-edit"></span> Edit 
                                            </a>
                                            <a title="Suspend This User" class="btn btn-warning" href="{{  action('Admin\UserController@suspend', $user->id) }}"> <span class="fa fa-stop"></span> {{ $user->is_suspended ? 'Unsuspend' : 'Suspend' }}</a>
                                            <button class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
	</div>

@endsection