@extends('admin.layout.master')
@section('title', __('user.admin.list.title'))
@section('content')
<section class="content-header">
  <h1>
    Users
    <small>Preview</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route("admin.dashboard")}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Users</li>
  </ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">@lang('user.admin.list.title')</h3>
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
            <th>@lang('user.admin.table.id')</th>
            <th>@lang('user.admin.table.name')</th>
            <th>@lang('user.admin.table.email')</th>
            <th>@lang('user.admin.table.phone')</th>
            <th>@lang('user.admin.table.role')</th>
            <th>@lang('user.admin.table.show')</th>
            <th>@lang('user.admin.table.delete')</th>
            <th>@lang('user.admin.table.edit')</th>
          </tr>
          @foreach ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->role ? __('user.admin.table.admin') : __('user.admin.table.user') }}</td>
            <td class="center"></i> 
              <a class="btn btn-primary" href="{{ route('admin.users.show', $user->id) }}"><i class="fa fa-eye icon-size" ></i></a>
            </td>
            <td class="center">
              <form class="col-md-4" method="POST" action="{{ route('admin.users.destroy', ['id' => $user->id]) }}">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('@lang('user.admin.message.del')')" type="submit"><i class="fa fa-trash-o  fa-fw" ></i></button>
              </form>
            </td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('admin.users.edit', $user->id) }}">@lang('user.admin.table.edit')</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <div class="col-md-12">{{ $users->links()}}</div>
  <!-- /.box -->
</div>
@endsection
