<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler"> </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item start active open">
                <a href="{{ route('admin.dashboard') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>
            <li class="{{strpos((request()->path()),"admin/categories") == 'true' ? 'active' : ''}} nav-item">
                <a class="nav-link" href="{{route('admin.categories.index')}}">
                    <i class="icon-layers"></i>
                    <span class="title">Categories</span>
                </a>
            </li>
            <li class="nav-item {{strpos((request()->path()),"admin/levels") == 'true' ? 'active' : ''}}">
                <a href="{{ route('admin.levels.index') }}" class="nav-link">
                    <i class="icon-layers"></i>
                    <span class="title">Levels</span>
                </a>
            </li>

            <li class="nav-item  {{strpos((request()->path()),"admin/projects") == 'true' ? 'active' : ''}}">
                <a href="{{ route('admin.projects.index') }}" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Projects</span>
                </a>
            <li class="nav-item  {{strpos((request()->path()),"admin/tasks") == 'true' ? 'active' : ''}}">
                <a href="{{ route('admin.tasks.index') }}" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Tasks</span>
                </a>
            </li><li class="nav-item  {{strpos((request()->path()),"admin/users") == 'true' ? 'active' : ''}}">
                <a href="{{ route('admin.users.index') }}" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Users</span>
                </a>
            </li>

            <li class="nav-item  {{strpos((request()->path()),"admin/test") == 'true' ? 'active' : ''}}">
                <a href="{{ route('admin.test.index') }}" class="nav-link">
                    <i class="icon-layers"></i>
                    <span class="title">Tests</span>
                </a>
            </li>
            <li class="nav-item  {{strpos((request()->path()),"admin/transactions") == 'true' ? 'active' : ''}}">
                <a href="{{ route('admin.transactions.index') }}" class="nav-link">
                    <i class="icon-layers"></i>
                    <span class="title">Transactions</span>
                </a>
            </li>
            <li class="nav-item  {{strpos((request()->path()),"admin/trainings") == 'true' ? 'active' : ''}}">
                <a href="{{ route('admin.trainings.index') }}" class="nav-link">
                    <i class="icon-layers"></i>
                    <span class="title">Trainings</span>
                </a>
            </li>

            <li class="nav-item  {{strpos((request()->path()),"backend/role") == 'true' ? 'active' : ''}}">
                <a href="{{ route('admin.roles') }}" class="nav-link">
                    <i class="icon-layers"></i>
                    <span class="title">Roles</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
