<div class="side-nav-inner">
    <ul class="side-nav-menu scrollable">
        <li class="@if(Request::is('home*'))active-dashboard @endif">
            <a href="{{url('/home')}}">
                <span class="icon-holder">
                    <i class="anticon anticon-dashboard"></i>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown @if((Request::is('educations*')) || (Request::is('jobs*')) || (Request::is('economics*')) || (Request::is('status*')) || (Request::is('persons*'))) open @endif">
            <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="fas fa-cogs"></i>
                </span>
                <span class="title">Master</span>
                <span class="arrow">
                    <i class="arrow-icon"></i>
                </span>
            </a>
            <ul class="dropdown-menu">
                <li class="@if(Request::is('persons*')) active @endif">
                    <a href="{{route('persons.index')}}">Penduduk</a>
                </li>
                <li class="@if(Request::is('educations*')) active @endif">
                    <a href="{{route('educations.index')}}">Pendidikan</a>
                </li>
                <li class="@if(Request::is('jobs*')) active @endif">
                    <a href="{{route('jobs.index')}}">Pekerjaan</a>
                </li>
                <li class="@if(Request::is('economics*')) active @endif">
                    <a href="{{route('economics.index')}}">Ekonomi</a>
                </li>
                <li class="@if(Request::is('status*')) active @endif">
                    <a href="{{route('status.index')}}">Status Warga</a>
                </li>
            </ul>
        </li>
    </ul>
</div>