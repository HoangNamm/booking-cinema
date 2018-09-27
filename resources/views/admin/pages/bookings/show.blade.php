@extends('admin.layout.master')
@section('title', __('booking.admin.title'))
@section('content')
<section class="content-header">
  <h1>
    Bookings
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route("admin.dashboard")}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route("admin.bookings.index")}}">Bookings</a></li>
    <li class="active">Show</li>
  </ol>
</section>
<section class="content">
<div class="row">
<div class="col-md-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">@lang('booking.admin.show.title')</h3>
    </div>
    @include('admin.layout.error')
    <form class="form-horizontal" method="post">
      @csrf
      <div class="box-body">
        <div class="form-group">
          <label class="control-label col-md-3">@lang('booking.admin.table.name')</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" value="{{$booking->user->full_name}}" disabled type="text" >
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3">@lang('booking.admin.table.email')</label>
        <div class="col-md-8">
          <input class="form-control col-md-8" type="text" value="{{$booking->user->email}}" disabled>
        </div>
      </div>
      <div class="box-body">          
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>@lang('booking.admin.table.film')</th>
              <th>@lang('booking.admin.table.room')</th>
              <th>@lang('booking.admin.table.seat')</th>
              <th>@lang('booking.admin.table.price')</th>
              <th>@lang('booking.admin.table.start_time')</th>
              <th>@lang('booking.admin.table.end_time')</th>
            </tr>
          </thead>
          <tbody>
      @foreach ($bookings as $key => $booking)
        <tr>
          <td>{{ ++$key }}</td>
          <td>{{$booking->film}}</td>
          <td>{{$booking->room}}</td>
          <td>{{$booking->seat}}</td>
          <td>{{$booking->price}}</td>
          <td>{{$booking->start}}</td>
          <td>{{$booking->end}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a class="btn btn-secondary" href="{{ route('admin.bookings.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>
        @lang('category.admin.add.cancel')
        </a>
        <form class="col-md-4" method="POST"
          action="{{ route('admin.bookings.destroy', $bookings[0]->id) }}">
            @method('DELETE')
            {{ csrf_field() }}
            <button class="btn btn-danger pull-right" type="submit" data-confirm="{{ trans('booking.admin.message.msg_del') }}">
              <i class="fa fa-trash-o  fa-fw" ></i>
            </button>
        </form>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</div>
@endsection
