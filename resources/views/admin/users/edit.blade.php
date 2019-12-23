@extends('admin.layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
                <div class="ibox-title">
				<h5>Edit: {{$user->name}}</h5>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
					<form action="{{action('Admin\UserController@update',$user->id)}}" enctype="multipart/form-data" method="POST">
						@csrf
						@method('PUT')
						<div class="row">
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" name="name" id="name" placeholder="{{$user->name}}" value="{{$user->name}}"" class="form-control">
								</div>
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="text" name="email" id="email" placeholder="{{$user->email}}" value="{{$user->email}}"class="form-control">
								</div>
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label for="password">Password</label>
								<input type="password" name="password" id="password" placeholder="" value ="" class="form-control">
								</div>
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label for="role">Role</label>
									<select name="role" id="role" class="form-control">
										<option>Select Role</option>
										<option value="admin" {{$selectedRole=='Admin'?"selected":""}}>Admin</option>
										<option value="staff" {{$selectedRole=='Staff'?"selected":""}}>Staff</option>
										<option value="cleaner" {{$selectedRole=='Cleaner'?"selected":""}}>Cleaner</option>
									</select>
								</div>
							</div>
							<div class="col-md-12 col-sm-12 text-right">
								<div class="form-group">
									<button class="btn btn-primary">Update User</button>
								</div>
							</div>
						</div>
					</form>
                </div>
            </div>
        </div>
	</div>

@endsection