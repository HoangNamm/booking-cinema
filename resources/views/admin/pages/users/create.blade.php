@extends('admin.layout.master')
@section('title', __('user.admin.add.title'))
@section('content')
<section class="content-header">
  <h1>
    Users
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route("admin.dashboard")}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route("admin.users.index")}}">Users</a></li>
    <li class="active">Add</li>
  </ol>
</section>
<section class="content">
<div class="row">
<div class="col-md-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">@lang('user.admin.add.title')</h3>
    </div>
    @include('admin.layout.error')
    <form class="form-horizontal" action="{{ route('admin.users.store') }}" method="POST">
      @csrf
      <div class="box-body">
        <div class="form-group row">
          <label class="control-label col-md-3">@lang('user.admin.add.name')</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" name="full_name" type="text" value="{{ old('full_name') }}" placeholder="@lang('user.admin.add.placeholder_name')">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">@lang('user.admin.add.email')</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" name="email" type="email" value="{{ old('email') }}" placeholder="@lang('user.admin.add.placeholder_email')">
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
            <input class="form-control col-md-8" name="phone" type="text" value="{{ old('phone') }}" placeholder="@lang('user.admin.add.placeholder_phone')">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-3">@lang('user.admin.add.address')</label>
          <div class="col-md-8">
            <input class="form-control col-md-8" name="address" type="text" value="{{ old('address') }}" placeholder="@lang('user.admin.add.placeholder_address')">
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a class="btn btn-secondary" href="{{ route('admin.users.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>
        @lang('category.admin.add.cancel')
        </a>
        <button type="submit" class="btn btn-info pull-right">@lang('user.admin.add.submit')</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</div>
@endsection
