@extends('admin.layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
                <div class="ibox-title">
                    <h5>Edit: Rishabh Arya;</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
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
                		<div class="col-md-12 col-sm-12 text-right">
                			<div class="form-group">
                				<button class="btn btn-primary">Update User</button>
                			</div>
                		</div>
                	</div>
                </div>
            </div>
        </div>
	</div>

@endsection