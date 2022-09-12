<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ \Request::route()->getName() == 'home' ? '' : 'collapsed' }}" href="/home">
                <i class="bi bi-clipboard2-data"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="ri ri-database-line"></i><span>Aktiva</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="nav-item ">
                    <a class="nav-link {{ \Request::route()->getName() == 'aktiva' ? '' : 'collapsed' }}"
                        href="/data-aktiva">
                        <i class="bi bi-circle"></i>
                        <span>Data Aktiva</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link {{ \Request::route()->getName() == 'laporan.aktiva' ? '' : 'collapsed' }}"
                        href="/laporan-aktiva">
                        <i class="bi bi-circle"></i>
                        <span>Laporan Aktiva</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Inventaris</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link {{ \Request::route()->getName() == 'inventaris' ? '' : 'collapsed' }}"
                        href="{{ route('inventaris') }}">
                        <i class="bi bi-circle"></i>
                        <span>Data Inventaris</span>
                    </a>
                </li>

                <li>
                    <a class="nav-link {{ \Request::route()->getName() == 'laporan.inventaris' ? '' : 'collapsed' }}"
                        href="{{ route('laporan.inventaris') }}">
                        <i class="bi bi-circle"></i>
                        <span>Laporan Inventaris</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bookmarks"></i><span>Rekap</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link {{ \Request::route()->getName() == 'rekap' ? '' : 'collapsed' }}"
                        href="{{ route('rekap') }}">
                        <i class="bi bi-circle"></i>
                        <span>Data Rekap</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ \Request::route()->getName() == 'print' ? '' : 'collapsed' }}"
                        href="{{ route('print') }}">
                        <i class="bi bi-circle"></i>
                        <span>Print</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->
    </ul>

</aside><!-- End Sidebar-->
