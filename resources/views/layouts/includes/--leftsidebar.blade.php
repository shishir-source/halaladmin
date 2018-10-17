<aside class="left-side sidebar-offcanvas">
    <section class="sidebar ">
        <div class="page-sidebar  sidebar-nav">
            <div class="nav_icons">
                <ul class="sidebar_threeicons">
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="livicon" data-name="table" title="Advanced tables" data-c="#418BCA" data-hc="#418BCA" data-size="25" data-loop="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="livicon" data-c="#EF6F6C" title="Tasks" data-hc="#EF6F6C" data-name="list-ul" data-size="25" data-loop="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="livicon" data-name="image" title="Gallery" data-c="#F89A14" data-hc="#F89A14" data-size="25" data-loop="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="livicon" data-name="users" title="Users List" data-size="25" data-c="#01bc8c" data-hc="#01bc8c" data-loop="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <!-- BEGIN SIDEBAR MENU -->
            <ul id="menu" class="page-sidebar-menu">
                <li class="active">
                    <a href="{{ route('home') }}">
                        <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('posts') }}">
                        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                        <span class="title">Posts</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('posts') }}">
                                <i class="fa fa-angle-double-right"></i> All Posts
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('post.create') }}">
                                <i class="fa fa-angle-double-right"></i> Create Posts
                            </a>
                        </li>
                        <li>
                            <a href="{{  route('posts.trashed') }}">
                                <i class="fa fa-angle-double-right"></i> Trashed Posts
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('categories') }}">
                        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                        <span class="title">Category</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('categories') }}">
                                <i class="fa fa-angle-double-right"></i> All Categories
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.create') }}">
                                <i class="fa fa-angle-double-right"></i> Create category
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.trashed') }}">
                                <i class="fa fa-angle-double-right"></i> Trashed category
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </section>
    <!-- /.sidebar -->
</aside>