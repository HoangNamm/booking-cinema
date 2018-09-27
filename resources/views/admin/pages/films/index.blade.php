@extends('admin.layout.master')
@section('title', __('film.admin.list.title'))
@section('content')
<section class="content-header">
  <h1>
    Films
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route("admin.dashboard")}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Films</li>
  </ol>
</section>
<section class="content">
  <div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">@lang('film.admin.list.title')</h3>
      <div class="box-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
          <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      @include('admin.layout.message')
      <table class="table table-hover">
        <tbody>
          <tr>
            <th>@lang('film.admin.table.id')</th>
            <th>@lang('film.admin.table.name')</th>
            <th>@lang('film.admin.table.actor')</th>
            <th>@lang('film.admin.table.duration')</th>
            <th>@lang('film.admin.table.country')</th>
            <th>@lang('film.admin.add.show')</th>
            <th>@lang('film.admin.table.delete')</th>
            <th>@lang('film.admin.table.edit')</th>
        </tr>
        @foreach ($films as $film)
              <tr>
                <td>{{ $film->id }}</td>
                <td>{{ $film->name }}</td>
                <td>{{ $film->actor }}</td>
                <td>{{ $film->duration }}</td>
                <td>{{ $film->country }}</td>
                <td class="center"></i> 
                  <a class="btn btn-primary" href="{{ route('admin.films.show', $film->id) }}"><i class="fa fa-eye icon-size" ></i></a>
                </td>
                <td class="center">
                  <form class="col-md-4" method="POST" action="{{ route('admin.films.destroy', $film->id) }}">
                      @method('DELETE')
                      {{ csrf_field() }}
                      <button class="btn btn-danger" type="submit" data-confirm="{{ trans('film.admin.message.msg_del') }}"><i class="fa fa-trash-o  fa-fw" ></i></button>
                  </form>
                </td>
                <td class="center">
                  <a href="{{ route('admin.films.edit', $film->id) }}"><i class="fa fa-pencil fa-fw"></i></a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="col-md-12">{{ $films->links()}}</div>
</div>
</section>
@endsection
@section('script')
  <script src="js/admin/list_film.js"></script>
@endsection
