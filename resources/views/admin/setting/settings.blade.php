
<!--========================== extend-master-blade ==========================-->
@extends('layouts.backend.app')

@section('title', 'Settings')

<!--========================== include content ==========================-->
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">
                                    <i class="material-icons">face</i> Profile Settings
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#change_password_settings" aria-controls="settings"
                                   role="tab" data-toggle="tab"><i class="material-icons">change_history</i> Change Password
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                <form class="form-horizontal" action="{{ route('admin.settings.profile.update') }}"
                                       method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="FullName" class="col-sm-2 control-label">Full Name</label>
                                        <div class="col-sm-10">
                                            <div class="form-line {{ $errors->has('name') ? 'focused error' : '' }}">
                                                <input type="text" id="name" name="name"
                                                 class="form-control" placeholder="Full Name"
                                                 value="{{ old('name') ? old('name') : Auth::user()->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Email" class="col-sm-2 control-label">Email Address</label>
                                        <div class="col-sm-10">
                                            <div class="form-line">
                                                <input type="email" class="form-control" id="email" name="email"
                                                value="{{ Auth::user()->email }}" placeholder="Email Address"  disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="MobileNumber" class="col-sm-2 control-label">
                                            Mobile Number
                                        </label>

                                        <div class="col-sm-10">
                                            <div class="form-line
                                                            {{ $errors->has('mobile_no') ? 'focused error' : '' }}">
                                                <input type="text" class="form-control mobile-phone-number"
                                                 name="mobile_no" value="{{ old('mobile_no') ? old('mobile_no')
                                                 : Auth::user()->mobile_no }}" placeholder="Ex: +00 (000) 000-00-00">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="About" class="col-sm-2 control-label">
                                            About Yourself
                                        </label>

                                        <div class="col-sm-10">
                                            <div class="form-line {{ $errors->has('about') ? 'focused error' : '' }}">
                                                <textarea class="form-control" id="about" name="about"
                                                    rows="3" placeholder="About Youself"
                                                >{{ old('about') ? old('about') : Auth::user()->about }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="profile_image" class="col-sm-2 control-label">
                                            Profile Image
                                        </label>

                                        <div class="col-sm-10">
                                            <input type="file" accept="image/*" name="image"
                                                   class="form-control" id="profile_image">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-info">UPDATE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel"  id="change_password_settings" class="tab-pane fade in">
                                <form class="form-horizontal"
                                      action="{{ route('admin.settings.password.update')  }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                        <div class="col-sm-9">
                                            <div class="form-line
                                                            {{ $errors->has('password') ? 'focused error' : '' }}">
                                                <input type="password" class="form-control" id="OldPassword"
                                                 value="{{ old('old_password') }}" name="old_password"
                                                 placeholder="Old Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                        <div class="col-sm-9">
                                            <div class="form-line
                                                        {{ $errors->has('new_password') ? 'focused error' : '' }}">
                                                <input type="password" class="form-control" id="NewPassword"
                                                  value="{{ old('new_password')  }}" name="new_password"
                                                  placeholder="New Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ConfirmPassword" class="col-sm-3 control-label">
                                            Confirm Password
                                        </label>
                                        <div class="col-sm-9">
                                            <div class="form-line
                                                {{ $errors->has('password_confirmation') ? 'focused error' : '' }}">
                                                <input type="password"  class="form-control" id="confirm_password"
                                                 name="confirm_password" placeholder="Confirm New Password"
                                                 value="{{ old('password_confirmation') }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-info">Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('assets/backend/js/pages/examples/profile.js') }}"></script>
@endpush
