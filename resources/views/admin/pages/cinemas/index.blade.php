@extends('admin.layout.master')
@section('title', __('cinema.admin.list.title'))
@section('content')
<section class="content-header">
  <h1>
    Cinemas
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route("admin.dashboard")}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Cinemas</li>
  </ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">@lang('cinema.admin.list.title')</h3>
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
            <th>@lang('cinema.admin.table.id')</th>
            <th>@lang('cinema.admin.table.name')</th>
            <th>@lang('cinema.admin.table.address')</th>
            <th>@lang('cinema.admin.table.description')</th>
            <th>@lang('cinema.admin.table.tel')</th>
            <th>@lang('cinema.admin.table.delete')</th>
            <th>@lang('cinema.admin.table.edit')</th>
          </tr>
          @foreach ($cinemas as $key => $cinema)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $cinema->name }}</td>
            <td>{{ $cinema->address }}</td>
            <td>{{ $cinema->description }}</td>
            <td>{{ $cinema->tel }}</td>
            <td class="center">
              <form class="col-md-4" method="POST" onclick="return confirm('@lang('cinema.admin.message.msg_del')')"
                action="{{ route('admin.cinemas.destroy', $cinema->id) }}">
                @method('DELETE')
                {{ csrf_field() }}
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o  fa-fw" ></i></button>
              </form>
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> 
              <a href="{{ route('admin.cinemas.edit', $cinema->id) }}">@lang('cinema.admin.table.edit')</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <div class="col-md-12">{{ $cinemas->links()}}</div>
  <!-- /.box -->
</div>
@endsection
