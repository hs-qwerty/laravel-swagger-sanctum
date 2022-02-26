<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->


        <li class="nav-header">Menu</li>
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
            <a href="{{ route('image.pexels') }}" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p>
                    Pexels
                </p>
            </a>
        </li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="post" >
                @csrf
                @method('POST')
                <button type="submit" class="nav-link">
                    <p>
                        Logout
                    </p>
                </button>
            </form>

        </li>

    </ul>
</nav>
