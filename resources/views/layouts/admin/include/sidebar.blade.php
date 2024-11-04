<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.school') }}">
                <i class="bi bi-bank"></i>
                <span>School</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.book') }}">
                <i class="bi bi-book"></i>
                <span>Book</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.video') }}">
                <i class="bi bi-youtube"></i>
                <span>Video</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.user') }}">
                <i class="bi bi-person"></i>
                <span>User</span>
            </a>
        </li><!-- End Register Page Nav -->
    </ul>

</aside><!-- End Sidebar-->
