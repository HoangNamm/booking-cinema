<aside class="main-sidebar">
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>
          @if (Auth::user())
            {{ Auth::user()->full_name }}
          @endif
        </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">@lang('master.main')</li>
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>@lang('master.home')</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-flag"></i>
          <span>@lang('master.cinema')</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.cinemas.index') }}"><i class="fa fa-circle-o"></i> List Cinemas</a></li>
          <li><a href="{{ route('admin.cinemas.create') }}"><i class="fa fa-circle-o"></i> Add Cinema</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-th-list"></i>
          <span>@lang('master.categories')</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-circle-o"></i> @lang('master.list_category')</a></li>
          <li><a href="{{ route('admin.categories.create') }}"><i class="fa fa-circle-o"></i> @lang('master.add_category')</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-film"></i>
          <span>@lang('master.films')</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.films.index') }}"><i class="fa fa-circle-o"></i> @lang('master.list_film')</a></li>
          <li><a href="{{ route('admin.films.create') }}"><i class="fa fa-circle-o"></i> @lang('master.add_film')</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-user"></i>
          <span>@lang('master.users')</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-circle-o"></i> @lang('master.list_user')</a></li>
          <li><a href="{{ route('admin.users.create') }}"><i class="fa fa-circle-o"></i> @lang('master.add_user')</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-calendar"></i>
          <span>@lang('master.schedules')</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.schedules.index') }}"><i class="fa fa-circle-o"></i> @lang('master.list_schedule')</a></li>
          <li><a href="{{ route('admin.schedules.create') }}"><i class="fa fa-circle-o"></i> @lang('master.add_schedule')</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-shopping-cart"></i>
          <span>@lang('master.bookings')</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('admin.bookings.index') }}"><i class="fa fa-circle-o"></i> @lang('master.list_booking')</a></li>
        </ul>
      </li>
    </ul>
  </section>
</aside>
