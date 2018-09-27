@extends('admin.layout.master')
@section('title', __('schedule.admin.list.title'))
@section('content')
<section class="content-header">
  <h1>
    Schedules
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route("admin.dashboard")}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Schedules</li>
  </ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">@lang('schedule.admin.list.title')</h3>
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
            <th>@lang('schedule.admin.table.id')</th>
            <th>@lang('schedule.admin.table.name')</th>
            <th>@lang('schedule.admin.table.room')</th>
            <th>@lang('schedule.admin.table.cinema')</th>
            <th>@lang('schedule.admin.table.start_time')</th>
            <th>@lang('schedule.admin.table.end_time')</th>
            <th>@lang('schedule.admin.table.delete')</th>
            <th>@lang('schedule.admin.table.edit')</th>
          </tr>
          @foreach ($schedules as $index=>$schedule)
          <tr>
            <td>{{ ++$index }}</td>
            <td>{{ $schedule->film_name }}</td>
            <td>{{ $schedule->name }}</td>
            <td>{{ $schedule->cinema_name }}</td>
            <td>{{ $schedule->start_time }}</td>
            <td>{{ $schedule->end_time}}</td>
            <td class="center">
              <form class="col-md-4" method="POST" onclick="return confirm('@lang('category.admin.message.msg_del')')"
                action="{{ route('admin.schedules.destroy', $schedule->id) }}">
                @method('DELETE')
                {{ csrf_field() }}
                <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o  fa-fw" ></i></button>
              </form>
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> 
              <a href="{{ route('admin.schedules.edit', $schedule->id) }}">@lang('category.admin.table.edit')</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <div class="col-md-12">{{ $schedules->links()}}</div>
  <!-- /.box -->
</div>
@endsection
