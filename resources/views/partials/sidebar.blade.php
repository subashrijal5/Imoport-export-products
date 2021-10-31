<div id="wrapper">

    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <h2>Logo</h2>
      </div>
      <ul class="sidebar-nav">
        <li class="{{ Request::is('/') ? 'active' : '' }}">
          <a href="/"><i class="fa fa-home"></i>Home</a>
        </li>
        <li class="{{ Request::is('*clients*') ? 'active' : '' }}">
          <a href="{{route('clients.index')}}"><i class="fa fa-plug"></i>Clients</a>
        </li>
      </ul>
    </aside>

    <div id="navbar-wrapper">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
          </div>
        </div>
      </nav>
    </div>


