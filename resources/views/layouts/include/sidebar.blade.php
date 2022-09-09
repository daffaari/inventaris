<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ \Request::route()->getName() == 'home' ? '' : 'collapsed' }}" href="/home">
                <i class="bi bi-clipboard2-data"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Aktiva</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @foreach ($data as $aktiva)
                    <li>
                        <a href="components-alerts.html">
                            <i class="bi bi-circle"></i><span>a</span>
                        </a>
                    </li>
                @endforeach

            </ul>
        </li><!-- End Components Nav --> --}}
        <li class="nav-item ">
            <a class="nav-link {{ \Request::route()->getName() == 'aktiva' ? '' : 'collapsed' }}" href="/data-aktiva">
                <i class="bi bi-clipboard2-data"></i>
                <span>Aktiva</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->
