@extends('admin.layout.master')
@section('title', __('category.admin.edit.title'))
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
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">@lang('category.admin.edit.title')</h3>
    </div>
    @include('admin.layout.error')
    <form class="form-horizontal" action="{{ route('admin.cinemas.update', $cinema->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="box-body">
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label">@lang('cinema.admin.table.name')</label>
          <div class="col-sm-8">
            <input class="form-control" type="text" value="{{ old('name', $cinema->name) }}" name="name" placeholder="{{__('cinema.admin.add.placeholder_name')}}">
          </div>
        </div>
        <div class="form-group">
          <label for="address" class="col-sm-2 control-label">@lang('cinema.admin.table.address')</label>
          <div class="col-sm-8">
            <input class="form-control" type="text" name="address" value="{{ old('address', $cinema->address) }}" placeholder="{{__('cinema.admin.add.placeholder_address')}}">
          </div>
        </div>
        <div class="form-group">
          <label for="tel" class="col-sm-2 control-label">@lang('cinema.admin.table.tel')</label>
          <div class="col-sm-8">
            <input class="form-control" type="text" name="tel" value="{{ old('tel', $cinema->tel) }}" placeholder="{{__('cinema.admin.add.placeholder_tel')}}">
          </div>
        </div>
        <div class="form-group">
          <label for="description" class="col-sm-2 control-label">@lang('cinema.admin.table.description')</label>
          <div class="col-sm-8">
            <input class="form-control" type="text" value="{{ old('name', $cinema->description) }}" name="description" placeholder="{{__('cinema.admin.add.placeholder_description')}}">
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a class="btn btn-secondary" href="{{ route('admin.cinemas.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>
        @lang('cinema.admin.add.cancel')
        </a>
        <button type="submit" class="btn btn-info pull-right">@lang('cinema.admin.add.edit')</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</div>
@endsection
