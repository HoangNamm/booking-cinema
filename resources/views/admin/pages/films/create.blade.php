@extends('admin.layout.master')
@section('title', __('film.admin.add.title'))
@section('content')
<section class="content-header">
  <h1>
    @lang('film.admin.add.title')
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route("admin.dashboard")}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route("admin.films.index")}}">Films</a></li>
    <li class="active">Add</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">@lang('film.admin.add.title')</h3>
          </div>
          @include('admin.layout.error')
          <form class="form-horizontal" action="{{ route('admin.films.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="form-group row">
                <label class="control-label col-md-3">Cinema</label>
                <div class="col-md-8" >
                  <select name="cinemas[]" id="multiple_dropdown_select_cinema" class="form-control col-md-8" multiple>
                    @foreach ( $cinemas as $cinema )
                    <option value="{{ $cinema->id }}">{{ $cinema->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                  <label class="control-label col-md-3"></label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="text" id="selected_cinema_values" name="multiple_selected_values" disabled>
                  </div>
                </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('category.admin.title')</label>
                <div class="col-md-8" >
                  <select name="categories[]" id="multiple_dropdown_select" class="form-control col-md-8" multiple>
                    @foreach ( $categories as $category )
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3"></label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" type="text" id="selected_values" name="multiple_selected_values" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.table.name')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="name" type="text" value="{{ old('name') }}" placeholder="@lang('film.admin.add.placeholder_name')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.table.actor')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="actor" type="text" value="{{ old('actor') }}" placeholder="@lang('film.admin.add.placeholder_actor')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.add.producer')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="producer" type="text" value="{{ old('producer') }}" placeholder="@lang('film.admin.add.placeholder_producer')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.add.director')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="director" type="text" value="{{ old('director') }}" placeholder="@lang('film.admin.add.placeholder_director')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.table.duration')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="duration" type="text" value="{{ old('duration') }}" placeholder="@lang('film.admin.add.placeholder_duration')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.add.start_date')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="start_date" type="date" value="{{ old('start_date') }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.add.end_date')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="end_date" type="date" value="{{ old('end_date') }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.add.describe')</label>
                <div class="col-md-8">
                  <textarea class="form-control col-md-8 ckeditor" name="describe" type="text" value="{{ old('describe') }}" placeholder="@lang('film.admin.add.placeholder_describe')">
                  {{ old('describe') }}
                  </textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.table.image')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="photos[]" type="file" placeholder="@lang('film.admin.add.placeholder_image')" multiple>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.table.country')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="country" type="text" value="{{ old('country') }}" placeholder="@lang('film.admin.add.placeholder_country')">
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a class="btn btn-secondary" href="{{ route('admin.films.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>
              @lang('film.admin.add.cancel')
              </a>
              <button type="submit" class="btn btn-info pull-right">@lang('film.admin.add.submit')</button>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('script')
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script src="js/admin/main.js"></script>
@endsection
