
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title', 'My Account')

@section('content')
    <section class="about-area">
        <div class="container about-information-area-border about-information-area-content" id="profile-container">
            <!-- Show message -->
        {{ session('status') }}
        <!--End message -->
            <form role="form" action="{{ route('user.account') }}" method="post" enctype="multipart/form-data">
                <!-- implement csrf and patch method -->
                @csrf
                @method('put')
                <div class="row my-5">
                    <div class="col-lg-3 order-lg-1 text-center upload-group">
                        <img src="{{ $user->avatar_path ? asset($user->avatar_path) : asset('assets/frontend/images/default.jpg') }}"
                             id="preview" class="img-thumbnail" alt="avatar">
                        <h6 class="font-weight-bold mt-3"><b>Upload your avatar</b></h6>
                        <label class="custom-file">
                            <span class="custom-file-control btn btn-sm btn-outline-success text-white font-weight-bold border-dark">Choose file</span>
                            <input type="file" id="avatar-input" accept="image/*" onchange="previewImage(event)"  name="userImage" class="custom-file-input">
                        </label>
                    </div>
                    <div class="col-lg-8 order-lg-2">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                            </li>
                        </ul>
                        <div class="tab-content py-4">
                            <div class="tab-pane active" id="profile">
                                <h5 class="font-weight-bold text-uppercase" id="name-head"><strong>{{ $user->name }}</strong></h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>About</h6>
                                        <p>
                                            {{ $user->about ? $user->about : 'Web Designer, UI/UX Engineer' }}
                                        </p>
                                        <h6>Hobbies</h6>
                                        <p>
                                            Indie music, skiing and hiking. I love the great outdoors.
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Recent badges</h6>
                                        <a href="#" class="badge badge-dark badge-pill">html5</a>
                                        <a href="#" class="badge badge-dark badge-pill">react</a>
                                        <a href="#" class="badge badge-dark badge-pill">codeply</a>
                                        <a href="#" class="badge badge-dark badge-pill">angularjs</a>
                                        <a href="#" class="badge badge-dark badge-pill">css3</a>
                                        <a href="#" class="badge badge-dark badge-pill">jquery</a>
                                        <a href="#" class="badge badge-dark badge-pill">bootstrap</a>
                                        <a href="#" class="badge badge-dark badge-pill">responsive-design</a>
                                        <hr>
                                        <span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>
                                        <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                                        <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
                                    </div>
                                    <div class="col-md-12">
                                        <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                                        <table class="table table-sm table-hover table-striped">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Kensington</strong> deleted MyBoard3 in <strong>`Discussions`</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>Skell</strong> deleted his post Look at Why this is.. in <strong>`Discussions`</strong>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--/row-->
                            </div>
                            <div class="tab-pane" id="edit">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Your Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" type="text" placeholder="Your Name" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="email" type="email" placeholder="Email" disabled value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Mobile No.</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="mobile_no" type="number" placeholder="Mobile Number" value="{{ $user->mobile_no }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                                    <div class="col-lg-9">
                                        <label class="radio-inline" for="male">
                                            <input type="radio" class="form-check-input" id="male" name="gender"
                                                   @if($user->gender === 'male') {{ 'checked' }} @endif value="male">Male
                                        </label>
                                        <label class="radio-inline" for="female">
                                            <input type="radio" class="form-check-input" id="female" name="gender"
                                                   @if($user->gender === 'female') {{ 'checked' }} @endif value="female">Female
                                        </label>
                                        <label class="radio-inline" for="other">
                                            <input type="radio" class="form-check-input" id="other" name="gender"
                                                   @if($user->gender === 'other') {{ 'checked' }} @endif value="other">Other
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Age</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="age" type="number" maxlength="2" placeholder="Age"  value="{{ $user->age }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">About</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="about" type="text" placeholder="About" value="{{ $user->about }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" name="address" type="" placeholder="Your Address" rows="3" value="{{ $user->address }}"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <label for="privacy" class="checkbox-inline">
                                            <input type="checkbox" class="form-check-input"  @if($user->privacy === 'public') checked @endif name="privacy" value="public">
                                            Allow your profile to view by others</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-danger" value="Cancel">
                                        <input type="submit" class="btn teal text-white" value="Save Changes">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
