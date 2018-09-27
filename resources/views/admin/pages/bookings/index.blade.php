@extends('admin.layout.master')
@section('title', __('booking.admin.list.title'))
@section('content')
<section class="content-header">
  <h1>
    Bookings
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route("admin.dashboard")}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Bookings</li>
  </ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">@lang('booking.admin.list.title')</h3>
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
            <th>@lang('booking.admin.table.id')</th>
            <th>@lang('booking.admin.table.name')</th>
            <th>@lang('booking.admin.table.email')</th>
            <th>@lang('booking.admin.table.quantity')</th>
            <th>@lang('booking.admin.table.price')</th>
            <th>@lang('booking.admin.table.delete')</th>
            <th>@lang('booking.admin.table.show')</th>
          </tr>
          @foreach ($bookings as $booking)
          <tr>
            <td>{{ $booking->id }}</td>
              <td>{{ $booking->name }}</td>
              <td>{{ $booking->email }}</td>
              <td>{{ $booking->quantity }}</td>
              <td>{{ number_format($booking->price) }}</td>
              <td class="center">
                <form class="col-md-4" method="POST"
                  action="{{ route('admin.bookings.destroy', $booking->id) }}">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit" data-confirm="{{ trans('booking.admin.message.msg_del') }}">
                      <i class="fa fa-trash-o  fa-fw" ></i>
                    </button>
                </form>
              </td>
              <td class="center"></i> 
                <a class="btn btn-primary" href="{{ route('admin.bookings.show', $booking->id) }}"><i class="fa fa-eye icon-size" ></i></a>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <div class="col-md-12">{{ $bookings->links()}}</div>
  <!-- /.box -->
</div>
@endsection
