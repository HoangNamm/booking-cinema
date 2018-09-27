@extends('admin.layout.master')
@section('title', __('category.admin.edit.title'))
@section('content')
<section class="content-header">
  <h1>
    Categories
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route("admin.dashboard")}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route("admin.categories.index")}}">Categories</a></li>
    <li class="active">Edit</li>
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
    <form class="form-horizontal" action="{{ route('admin.categories.update', $category->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="box-body">
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label">@lang('category.admin.table.name')</label>
          <div class="col-sm-8">
            <input class="form-control" value="{{ old('name', $category->name) }}" type="text" name="name" placeholder="{{__('category.admin.add.placeholder_name')}}">
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a class="btn btn-secondary" href="{{ route('admin.categories.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>
        @lang('category.admin.add.cancel')
        </a>
        <button type="submit" class="btn btn-info pull-right">@lang('category.admin.add.edit')</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</div>
@endsection
