@extends('admin.layout.master')
@section('title', __('cinema.admin.add.title'))
@section('content')
<section class="content-header">
  <h1>
    Cinemas
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route("admin.dashboard")}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route("admin.cinemas.index")}}">Cinemas</a></li>
    <li class="active">Add</li>
  </ol>
</section>
<section class="content">
<div class="row">
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">@lang('cinema.admin.add.title')</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    @include('admin.layout.error')
    <form class="form-horizontal" action="{{ route('admin.cinemas.store') }}" method="post">
      @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label">@lang('cinema.admin.table.name')</label>
          <div class="col-sm-8">
            <input class="form-control" type="text" name="name" placeholder="{{__('cinema.admin.add.placeholder_name')}}">
          </div>
        </div>
        <div class="form-group">
          <label for="address" class="col-sm-2 control-label">@lang('cinema.admin.table.address')</label>
          <div class="col-sm-8">
            <input class="form-control" type="text" name="address" placeholder="{{__('cinema.admin.add.placeholder_address')}}">
          </div>
        </div>
        <div class="form-group">
          <label for="tel" class="col-sm-2 control-label">@lang('cinema.admin.table.tel')</label>
          <div class="col-sm-8">
            <input class="form-control" type="text" name="tel" placeholder="{{__('cinema.admin.add.placeholder_tel')}}">
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-2 control-label">@lang('cinema.admin.table.description')</label>
          <div class="col-sm-8">
            <input class="form-control" type="text" name="description" placeholder="{{__('cinema.admin.add.placeholder_description')}}">
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a class="btn btn-secondary" href="{{ route('admin.cinemas.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>
        @lang('cinema.admin.add.cancel')
        </a>
        <button type="submit" class="btn btn-info pull-right">@lang('cinema.admin.add.submit')</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</div>
@endsection
