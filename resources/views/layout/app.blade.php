<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('blog.title') }} Admin</title>

  <link href="/assets/css/admin.css" rel="stylesheet">
  @yield('styles')

  <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>

      
      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Demo Project</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="{{ Request::path() == '/' ? 'active' : '' }}"><a href="/">Home</a></li>
              @unless (Auth::check())
                @if (!Request::is('auth/login'))
                <li><a href="/auth/login">Login</a></li>
                @endif
             @endunless
              @if (Auth::check())
               <li><a href="/auth/logout">Logout</a></li>
              @endif
              
           
              
          @if (CustomAuth::hasPermission('message.compose'))
                 <li class="{{ Request::path() == 'message/compose' ? 'active' : '' }}"><a href="/message/compose">Send Message</a></li>
           @endif    
             <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li> -->
            </ul>
              
          <ul class="nav navbar-nav navbar-right">
              @if (Auth::check())
              <li>
                  <a href="#">Hi, {{ Auth::user()->username }}</a>
              </li>
              @endif
              
                @if (CustomAuth::hasPermission('users.index') || CustomAuth::hasPermission('roles.index') || CustomAuth::hasPermission('roles.index')||CustomAuth::hasPermission('dictionary.index'))
                <li class="{{ (Request::path() == 'users'||Request::path() == 'roles'||Request::path() == 'permissions') ? 'active' : '' }}">  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        
                        @if (CustomAuth::hasPermission('users.index'))
                        <li {{ Request::path() == 'users' ? 'active' : '' }}><a href="/users">Manage Users</a></li>
                        @endif
                        
                        @if (CustomAuth::hasPermission('roles.index'))
                        <li {{ Request::path() == 'roles' ? 'active' : '' }}><a href="/roles">Manage Roles</a></li>
                        @endif
                        
                        @if (CustomAuth::hasPermission('roles.index'))
                       <li {{ Request::path() == 'permissions' ? 'active' : '' }}><a href="/permissions">Manage Permission</a></li>
                        @endif
                        @if (CustomAuth::hasPermission('dictionary.index'))
                        <li class="{{ Request::path() == 'dictionary' ? 'active' : '' }}"><a href="/dictionary"  >Manage Words</a></li>
                        @endif    
                    </ul>
               </li>
              @endif
                @if (CustomAuth::hasPermission('message.list'))
                    @if (isset($notificationcount) &&  $notificationcount > 0)
                    <li  class="{{ Request::path() == 'message/list' ? 'active' : '' }}"><a href="/message/list" style="color:red">Notification ({{$notificationcount}})</a></li>
                    @else
                    <li  class="{{ Request::path() == 'message/list' ? 'active' : '' }}"><a href="/message/list" >Notification </a></li>
                    @endif
               @endif
              <!--<li><a href="../navbar-static-top/">Static top</a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>-->
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

@yield('content')

<script src="/assets/js/admin.js"></script>

@yield('scripts')

</body>
</html>