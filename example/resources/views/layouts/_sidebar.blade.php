<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->


        <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
            <a href="/anasayfa" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Home
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('image.index') }}" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Unsplash
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="../kanban.html" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p>
                    Kanban Board
                </p>
            </a>
        </li>

    </ul>
</nav>
