@extends('admin.layout.master')
@section('title', 'Profile')
@section('content')
<section class="content-header">
  <h1>
    User Profile
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route("admin.dashboard")}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route("admin.users.index")}}">Users</a></li>
    <li class="active">User profile</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
          <h3 class="profile-username text-center">{{ $user->full_name}}</h3>
          <p class="text-muted text-center">Software Engineer</p>
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Followers</b> <a class="pull-right">1,322</a>
            </li>
            <li class="list-group-item">
              <b>Following</b> <a class="pull-right">543</a>
            </li>
            <li class="list-group-item">
              <b>Friends</b> <a class="pull-right">13,287</a>
            </li>
          </ul>
          <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i> Email</strong>
          <p class="text-muted">
            {{ $user->email }}
          </p>
          <hr>
          <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
          <p class="text-muted">{{ $user->address}}</p>
          <hr>
          <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>
          <p class="text-muted">{{ $user->phone}}</p>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Timeline</a></li>
          <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">Settings</a></li>
        </ul>
        <div class="tab-content">
          <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                <span class="bg-red">
                {{ $user->created_at}}
                </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                  <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                  <div class="timeline-body">
                    Welcome to admin page..
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">Read more</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane active" id="settings">
            <form class="form-horizontal" action="{{ route('admin.users.update', $user->id) }}"  method="POST">
              @csrf
              @method('PUT')
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('user.admin.add.name')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="full_name" type="text" value="{{ old('full_name', $user->full_name) }}" placeholder="@lang('user.admin.add.placeholder_name')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('user.admin.add.email')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="email" type="email" value="{{ old('email', $user->email) }}" placeholder="@lang('user.admin.add.placeholder_email')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('user.admin.add.password')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="password" type="password" placeholder="@lang('user.admin.add.placeholder_password')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('user.admin.add.phone')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="phone" type="text" value="{{ old('phone', $user->phone) }}" placeholder="@lang('user.admin.add.placeholder_phone')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('user.admin.add.address')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="address" type="text" value="{{ old('address', $user->address) }}" placeholder="@lang('user.admin.add.placeholder_address')">
                </div>
              </div>
              <div class="tile-footer">
                <div class="row">
                  <div class="col-md-8 col-md-offset-3">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>@lang('user.admin.add.submit')</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection
