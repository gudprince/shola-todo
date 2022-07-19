<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name"></p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
           <a class="app-menu__item {{ Route::currentRouteName() == 'todo.index' ? 'active' : '' }}" href="{{ route('todo.index') }}">
            <i class="app-menu__icon fa fa-newspaper-o"></i>
            <span class="app-menu__label">Todo</span>
          </a>
        </li>
        <li>
            <a class="app-menu__item  {{ Route::currentRouteName() == 'todo.group.index' ? 'active' : '' }}" href="{{ route('todo.group.index') }}"><i class="app-menu__icon fa fa-folder-o"></i>
                <span class="app-menu__label">Group Todo</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item " href="{{ route('logout') }}"><i class="fa fa-sign-out fa-lg"></i>
                 <span class="app-menu__label"> Logout</span>
            </a>
        </li>
    </ul>
</aside>