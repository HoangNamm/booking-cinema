@extends('admin.layout.master')
@section('title', __('schedule.admin.edit.title'))
@section('content')
<section class="content-header">
  <h1>
    Schedules
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route("admin.dashboard")}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route("admin.schedules.index")}}">Schedules</a></li>
    <li class="active">Edit</li>
  </ol>
</section>
<section class="content">
<div class="row">
<div class="col-md-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">@lang('schedule.admin.edit.title')</h3>
    </div>
    @include('admin.layout.error')
    <form class="form-horizontal" action="{{ route('admin.schedules.update', $schedule['id']) }}" method="post">
      @csrf
      @method('PUT')
      <div class="box-body">
        <div class="form-group">
          <label class="control-label col-md-3">@lang('schedule.admin.add.choose_cinema')</label>
          <div class="col-sm-8">
            <select class="form-control" id="select-cinema" name="cinema">
              @foreach ($cinemas as $cinema)
                <option value="{{ $cinema->id }}" {{ $cinema->id == $schedule['cinema_id'] ? 'selected' : '' }}>{{ $cinema->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
          
        <div class="form-group">
          <label class="control-label col-md-3">@lang('schedule.admin.add.choose_film')</label>
          <div class="col-sm-8">
            <select class="form-control" id="select-film" name="film">
              @foreach ($films as $film)
                <option value="{{ $film->id }}" {{ $film->id == $schedule['film_id'] ? 'selected' : '' }}>{{ $film->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">@lang('schedule.admin.add.choose_room')</label>
          <div class="col-md-8">
            <select class="form-control" id="select-room" name="room">
              @foreach ($rooms as $room)
              <option value="{{ $room->id }}" {{ $room->id == $schedule['room_id'] ? 'selected' : '' }}>{{ $room->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="starttime">@lang('schedule.admin.add.start_time')</label>
                <input class="form-control" type="text" name="starttime" value="{{ old('starttime', $schedule['start_time']) }}" placeholder="@lang('schedule.admin.add.placeholder_time')">
              </div>
  
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <fieldset>
                  <label for="endtime">@lang('schedule.admin.add.end_time')</label>
                  <input class="form-control" type="text" name="endtime" value="{{ old('endtime', $schedule['end_time']) }}" placeholder="@lang('schedule.admin.add.placeholder_time')">
                </fieldset>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        @if ($ticket)
          <div class="box-header with-border">
            <h3 class="box-title">@lang('ticket.admin.add.title')</h3>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Ticket Type</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="type" value="{{ old('type', $ticket->type) }}" placeholder="Type of ticket">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-md-3">Price</label>
            <div class="col-md-8">
              <input class="form-control" type="number" min="1" name="price" value="{{ old('price', $ticket->price) }}" placeholder="Price of ticket">
            </div>
          </div>  
        @endif
      <!-- /.box-body -->
      <div class="box-footer">
        <a class="btn btn-secondary" href="{{ route('admin.schedules.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>
        @lang('category.admin.add.cancel')
        </a>
        <button type="submit" class="btn btn-info pull-right">@lang('category.admin.add.submit')</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</div>
@endsection
