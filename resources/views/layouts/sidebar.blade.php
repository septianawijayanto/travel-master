<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="height: auto;">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ \Auth::user()->getAvatar() }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{\Auth::user()->name}}</p>
        <small>{{ \Auth::user()->role }}</small>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="{{ url('/beranda')}}">
          <i class="fa fa-dashboard"></i> <span>Beranda</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      @if(auth()->user()->role=='pemesan')
      <li>
        <a href="{{ url('/pemesanan')}}">
          <i class="fa fa-firefox"></i> <span>Form Pemesanan</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      @elseif(auth()->user()->role=='admin')
      <li>
        <a href="{{ url('/supir')}}">
          <i class="fa fa-firefox"></i> <span>Data Supir</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li>
        <a href="{{ url('/jadwal')}}">
          <i class="fa fa-firefox"></i> <span>Jadwal</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li>
        <a href="{{ url('/mobil')}}">
          <i class="fa fa-firefox"></i> <span>Data Mobil</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li>
        <a href="{{ url('/datapemesan')}}">
          <i class="fa fa-firefox"></i> <span>Data Pemesan</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      @elseif(auth()->user()->role=='supir')
      <li>
        <a href="{{url('/profilsupir/'.Auth::user()->id)}}">
          <i class="fa fa-firefox"></i> <span>Jadwal</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      @endif
      <li>
        <a href="{{ url('/logout')}}">
          <i class="glyphicon glyphicon-log-out"></i> <span>Logout</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>