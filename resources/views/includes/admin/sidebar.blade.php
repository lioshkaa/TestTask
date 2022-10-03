<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">ADMIN PANEL</li>
        <li class="nav-item">
            <a href="{{route('admin')}}" class="nav-link">
                <i class="fas fa-align-justify"></i>
                <p>
                    Пользователи
                    <span class="badge badge-info right">2</span>
                </p>
            </a>

        </li>
        <li class="nav-item">
            <a href="{{route('admin.user.create')}}" class="nav-link">Создать пользователя</a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.client.index')}}" class="nav-link">Записи клиентов</a>
        </li>
    </ul>
</nav>
