<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="/themes/adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('pages.dashboard')}}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> Senarai Users</a></li>
          <li><a href="{{ route('users.create') }}"><i class="fa fa-circle-o"></i> Tambah User</a></li>

        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-file-text-o"></i> <span>Aduan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('aduan.index') }}"><i class="fa fa-circle-o"></i> Senarai Aduan</a></li>
          <li><a href="{{ route('aduan.create') }}"><i class="fa fa-circle-o"></i> Tambah Aduan</a></li>

        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Modul</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('modul.index') }}"><i class="fa fa-circle-o"></i> Senarai Modul</a></li>
          <li><a href="{{ route('modul.create') }}"><i class="fa fa-circle-o"></i> Tambah Modul</a></li>

        </ul>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
