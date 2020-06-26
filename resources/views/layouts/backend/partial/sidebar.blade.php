
<!-- Left Sidebar -->
<section>
    <aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info text-center">
        <div class="image">
            <img width="48" height="48" alt="User" src="{{ Auth::user()->imageUrl }}"/>
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </div>
            <div class="email">{{ Auth::user()->email }}</div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        @if(Auth::user()->is_admin)
            <ul class="list">

                <li class="header">MAIN ACTIVITIES</li>

                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/message*') ? 'active' : '' }}">
                    <a href="{{ route('admin.message.index') }}">
                        <i class="material-icons">email</i>
                        <span>Inbox</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/tag*') ? 'active' : '' }}">
                    <a href="{{ route('admin.tag.index') }}">
                        <i class="material-icons">label</i>
                        <span>Tag</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.index') }}">
                        <i class="material-icons">apps</i>
                        <span>Category</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/post*') ? 'active' : '' }}">
                    <a href="{{ route('admin.post.all') }}">
                        <i class="material-icons">library_books</i>
                        <span>Post</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/author*') ? 'active' : '' }}">
                    <a href="{{ route('admin.author.index') }}">
                        <i class="material-icons">supervised_user_circle</i>
                        <span>Author</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/favourite-post*') ? 'active' : '' }}">
                    <a href="{{ route('admin.favourite-post.index') }}">
                        <i class="material-icons">favorite</i>
                        <span>Favourite</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/subscriber*') ? 'active' : '' }}">
                    <a href="{{ route('admin.subscriber.index') }}">
                        <i class="material-icons">subscriptions</i>
                        <span>Subscriber</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/comment*') ? 'active' : '' }}">
                    <a href="{{ route('admin.comment.all') }}">
                        <i class="material-icons">comment</i>
                        <span>Comment</span>
                    </a>
                </li>

                <li class="header">SYSTEM</li>

                <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.index') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="material-icons">logout</i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>

        @else

            <ul class="list">

                <li class="header">MAIN ACTIVITIES</li>

                <li class="{{ Request::is('author/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('author.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Request::is('author/post*') ? 'active' : '' }}">
                    <a href="{{ route('author.post.index') }}">
                        <i class="material-icons">library_books</i>
                        <span>Post</span>
                    </a>
                </li>
                <li class="{{ Request::is('author/favourite-post*') ? 'active' : '' }}">
                    <a href="{{ route('author.favourite-post.index') }}">
                        <i class="material-icons">favorite</i>
                        <span>Favourite</span>
                    </a>
                </li>
                <li class="{{ Request::is('author/comment*') ? 'active' : '' }}">
                    <a href="{{ route('author.comment.index') }}">
                        <i class="material-icons">comment</i>
                        <span>Comment</span>
                    </a>
                </li>

                <li class="header">SYSTEM</li>

                <li class="{{ Request::is('author/settings') ? 'active' : '' }}">
                    <a href="{{ route('author.settings.index') }}">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="material-icons">logout</i>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        @endif
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2020 - 2021 <a href="/">ArticleZone</a> - Blogging World
        </div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div>
    <!-- #Footer -->
</aside>
</section>
<!-- #END# Left Sidebar -->
