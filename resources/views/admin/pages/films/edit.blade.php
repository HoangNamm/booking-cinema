@extends('admin.layout.master')
@section('title', __('film.admin.edit.title'))
@section('content')
<section class="content-header">
  <h1>
    @lang('film.admin.edit.title')
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route("admin.dashboard")}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route("admin.films.index")}}">Films</a></li>
    <li class="active">Edit</li>
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
          <form class="form-horizontal"  action="{{ route('admin.films.update', $film->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="box-body">
              <div class="form-group row">
                <label class="control-label col-md-3">Cinema</label>
                  <div class="col-md-8" >
                    <select name="cinemas[]" id="multiple_dropdown_select_cinema" class="form-control col-md-8 active" multiple>
                    @foreach ( $cinemas as $cinema )
                    <option value="{{ $cinema->id }}"
                    @if (in_array($cinema->id, $cinemaIds))
                    {{ "selected" }}
                    @endif
                    >{{ $cinema->name }}</option>   
                    @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3"></label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8 active" type="text" id="selected_cinema_values" name="multiple_selected_values" disabled>
                  </div>
                </div>
                <label class="control-label col-md-3">@lang('category.admin.title')</label>
                <div class="col-md-8" >
                  <select name="categories[]" id="multiple_dropdown_select" class="form-control col-md-8 active" multiple>
                  @foreach ( $categories as $category )
                  <option value="{{ $category->id }}"
                  @if (in_array($category->id, $categoryIds))
                  {{ "selected" }}
                  @endif
                  >{{ $category->name }}</option>   
                  @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3"></label>
                <div class="col-md-8">
                  <input class="form-control col-md-8 active" type="text" id="selected_values" name="multiple_selected_values" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.table.name')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8 active" name="name" value="{{ $film->name }}" type="text" value="{{ old('name') }}" placeholder="@lang('film.admin.add.placeholder_name')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.table.actor')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8 active" name="actor" value="{{ $film->actor }}" type="text" value="{{ old('actor') }}" placeholder="@lang('film.admin.add.placeholder_actor')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.add.producer')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8 active" name="producer" value="{{ $film->producer }}" type="text" placeholder="@lang('film.admin.add.placeholder_producer')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.add.director')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8 active" name="director" value="{{ $film->director }}"
                    type="text" placeholder="@lang('film.admin.add.placeholder_director')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.table.duration')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8 active" name="duration" value="{{ $film->duration }}" 
                    type="text" placeholder="@lang('film.admin.add.placeholder_duration')">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.add.start_date')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8 active" name="start_date" type="date" value="{{ $film->start_date }}" value="{{ old('start_date') }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.add.end_date')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8 active" name="end_date" type="date" value="{{ $film->end_date }}" value="{{ old('end_date') }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.add.describe')</label>
                <div class="col-md-8">
                  <textarea class="form-control col-md-8 active ckeditor" name="describe" type="text" id="describe" 
                    placeholder="@lang('film.admin.add.placeholder_describe')">
                  {{ $film->describe }}
                  </textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3 active">@lang('film.admin.table.image')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8 active" name="photos[]" type="file" 
                    placeholder="@lang('film.admin.add.placeholder_image')" multiple>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3 active"></label>
                <div class="col-md-8">
                  <input class="form-control col-md-8" name="del_image" hidden type="hidden" id="del_image">
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3"></label>
                <div class="col-md-8">
                  <table >
                    <tbody>
                      @foreach ($film->images as $image)
                      <tr id="tr-{{$image->id}}">
                        <td style="width: 50%;"><img width="100px" height="75px" src="{{ $image->path }}" alt="Film Image" class="rounded"></td>
                        <td style="width: 25%;"><a style="font-size:24px" class="remove" id="remove-{{$image->id}}" >
                          <i class="fa fa-remove img-thumbnail" style="font-size:25px;color:red" data-id="{{$image->id}}" data-confirm="{{ trans('film.admin.message.msg_del') }}" ></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">@lang('film.admin.table.country')</label>
                <div class="col-md-8">
                  <input class="form-control col-md-8 active" name="country" value="{{ $film->country }}"
                    type="text" placeholder="@lang('film.admin.add.placeholder_country')">
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a class="btn btn-secondary" href="{{ route('admin.films.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>
              @lang('film.admin.add.cancel')
              </a>
              <button type="submit" class="btn btn-info pull-right">@lang('film.admin.add.edit')</button>
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
<script src="js/admin/edit_film.js"></script>
@endsection
