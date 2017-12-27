@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             
  
            <li>
                <a href="{{ route('apiendpoints') }}" target="_blank">
                    <i class="fa fa-gears"></i>
                    <span class="title">API endpoints</span>
                </a>
            </li>
           

            
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('blue_factory.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-gear"></i>
                            <span class="title">
                                @lang('blue_factory.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('blue_factory.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('language_access')
            <li class="{{ $request->segment(2) == 'languages' ? 'active' : '' }}">
                <a href="{{ route('admin.languages.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('blue_factory.languages.title')</span>
                </a>
            </li>
            @endcan
            
            @can('category_access')
            <li class="{{ $request->segment(2) == 'categories' ? 'active' : '' }}">
                <a href="{{ route('admin.categories.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('blue_factory.category.title')</span>
                </a>
            </li>
            @endcan
            
            @can('tag_access')
            <li class="{{ $request->segment(2) == 'tags' ? 'active' : '' }}">
                <a href="{{ route('admin.tags.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('blue_factory.tags.title')</span>
                </a>
            </li>
            @endcan
            
            @can('ingredient_access')
            <li class="{{ $request->segment(2) == 'ingredients' ? 'active' : '' }}">
                <a href="{{ route('admin.ingredients.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('blue_factory.ingredients.title')</span>
                </a>
            </li>
            @endcan
            
            @can('meal_access')
            <li class="{{ $request->segment(2) == 'meals' ? 'active' : '' }}">
                <a href="{{ route('admin.meals.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('blue_factory.meals.title')</span>
                </a>
            </li>
            @endcan
            

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('blue_factory.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('blue_factory.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('blue_factory.logout')</button>
{!! Form::close() !!}
