@extends('layouts.app')

<!-- Main Content -->
@section('content')
            <!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('Titel')</title>


    <meta name="author" content="">

    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="{{URL::asset('assets/img/metis-tile.png')}}" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">

    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="{{URL::asset('css/metisMenu.min.css')}}">

    <!-- animate.css stylesheet -->
    <link rel="stylesheet" href="{{URL::asset('css/animate.min.css')}}">



    <!--For Development Only. Not required -->
    <script>
        less = {
            env: "development",
            relativeUrls: false,
            rootpath: "/assets/"
        };
    </script>
    <link rel="stylesheet" href="{{URL::asset('css/style-switcher.min.css')}}">
    <link rel="stylesheet/less" type="text/css" href="{{URL::asset('less/theme.less')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script>

  </head>

        <body>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                {{ csrf_field() }}
            <div class="bg-dark dk" id="wrap">
                <div id="top">
                    <!-- .navbar -->
                    <nav class="navbar navbar-inverse navbar-static-top">
                        <div class="container-fluid">


                            <!-- Brand and toggle get grouped for better mobile display -->
                            <header class="navbar-header">

                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>


                            </header>



                            <div class="topnav">
                                <div class="btn-group">
                                    <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
                                       class="btn btn-default btn-sm" id="toggleFullScreen">
                                        <i class="glyphicon glyphicon-fullscreen"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a data-placement="bottom" data-original-title="E-mail" data-toggle="tooltip"
                                       class="btn btn-default btn-sm">
                                        <i class="fa fa-envelope"></i>
                                        <span class="label label-warning">5</span>
                                    </a>
                                    <a data-placement="bottom" data-original-title="Messages" href="#" data-toggle="tooltip"
                                       class="btn btn-default btn-sm">
                                        <i class="fa fa-comments"></i>
                                        <span class="label label-danger">4</span>
                                    </a>
                                    <a data-toggle="modal" data-original-title="Help" data-placement="bottom"
                                       class="btn btn-default btn-sm"
                                       href="#helpModal">
                                        <i class="fa fa-question"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                      <a href="href="{{ url('') }}"" data-toggle="tooltip" data-original-title="Logout"onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-placement="bottom"
                                       class="btn btn-metis-1 btn-sm">
                                        <i class="fa fa-power-off"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a data-placement="bottom" data-original-title="Show / Hide Left" data-toggle="tooltip"
                                       class="btn btn-primary btn-sm toggle-left" id="menu-toggle">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                    <a data-placement="bottom" data-original-title="Show / Hide Right" data-toggle="tooltip"
                                       class="btn btn-default btn-sm toggle-right">
                                        <span class="glyphicon glyphicon-comment"></span>
                                    </a>
                                </div>

                            </div>




                            <div class="collapse navbar-collapse navbar-ex1-collapse">

                                <!-- .nav -->
                                <ul class="nav navbar-nav">
                                    <li class='dropdown '>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            Form Elements <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="form-general.html">General</a></li>
                                            <li><a href="form-validation.html">Validation</a></li>
                                            <li><a href="form-wysiwyg.html">WYSIWYG</a></li>
                                            <li><a href="form-wizard.html">Wizard &amp; File Upload</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- /.nav -->
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                    <!-- /.navbar -->
					<header class="head">
                                <div class="search-bar">
                                    <form class="main-search" action="">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Live Search ...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary btn-sm text-muted" type="button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                    <!-- /.main-search -->
								</div>
                                <!-- /.search-bar -->
                        </header>
                        <!-- /.head -->
                </div>

                <!-- /#top -->
                    <div id="left">
                        <div class="media user-media bg-dark dker">
                            <div class="user-media-toggleHover">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="user-wrapper bg-dark">
                                <a class="user-link" href="">
                                    <img class="media-object img-thumbnail user-img" alt="{{ Auth::user()->name }}" src="img/user.gif">
                                    <span class="label label-danger user-label">16</span>
                                </a>

                                <div class="media-body">
                                    <h5 class="media-heading">Archie</h5>
                                    <ul class="list-unstyled user-info">
                                        <li><a href="">Administrator</a></li>
                                        <li>Last Access : <br>
                                            <small><i class="fa fa-calendar"></i>&nbsp;16 Mar 16:32</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- #menu -->
                        <ul id="menu" class="bg-blue dker">
                                  <li class="nav-header">Menu</li>
                                  <li class="nav-divider"></li>
                                  <li class="">

                                  </li>
                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-building "></i>
                                      <span class="link-title">New News Add</span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <li>
                                        <a href="/Bangladesh">
                                          <i class="fa fa-angle-right"></i>&nbsp; Add News
                                          </a>
                                      </li>





                                    </ul>
                                  </li>
                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-tasks"></i>
                                      <span class="link-title">More News</span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <li>
                                        <a href="/Computer">
                                          <i class="fa fa-angle-right"></i>&nbsp; Computer </a>
                                      </li>

                                    </ul>
                                  </li>
                                  <?php
                                  $Information_for_Role_USER=session()->get('key');

                                  ?>
                                  @foreach($Information_for_Role_USER as $Role_check)
                                    @if($Role_check->permission_name =="RBAC")

                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-pencil"></i>
                                      <span class="link-title">
                                    Website Configuration
                        	  </span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <li>
                                        <a href="form-general.html">
                                          <i class="fa fa-angle-right"></i>&nbsp; Add.. </a>
                                      </li>
                                      <li>
                                        <a href="/Admin_register_page_show">
                                          <i class="fa fa-angle-right"></i>&nbsp; Create Admin </a>
                                      </li>
                                      <li>
                                        <a href="/permission">
                                          <i class="fa fa-angle-right"></i>&nbsp; Create Permission </a>
                                      </li>

                                      <li>
                                        <a href="/Create_Role_show">
                                          <i class="fa fa-angle-right"></i>&nbsp; Create Role </a>
                                      </li>

                                      <li>
                                        <a href="/Permission_role_page">
                                          <i class="fa fa-angle-right"></i>&nbsp; Permission Role </a>
                                      </li>

                                      <li>
                                        <a href="/User_access_page">
                                          <i class="fa fa-angle-right"></i>&nbsp;User Access </a>
                                      </li>

                                    </ul>
                                  </li>
                                  @endif
                                  @endforeach


                                  <li>
                                    <a href="/Cat_regestration">
                                      <i class="fa fa-registered" aria-hidden="true"></i>
                                      <span  class="link-title">Category Regestration</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="/Question">
                                      <i class="fa fa-file"></i>
                                      <span class="link-title">
                                        New Question
                                  </span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="/Comment_report">
                                      <i class="fa fa-font"></i>
                                      <span class="link-title">
                                    comment Report
                                  </span>  </a>
                                  </li>
                                  <li>
                                    <a href="maps.html">
                                      <i class="fa fa-map-marker"></i><span class="link-title">
                                    Maps
                                  </span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="chart.html">
                                      <i class="fa fa fa-bar-chart-o"></i>
                                      <span class="link-title">
                                    Charts
                                  </span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="calendar.html">
                                      <i class="fa fa-calendar"></i>
                                      <span class="link-title">
                                    Calendar
                                  </span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="javascript:;">
                                      <i class="fa fa-exclamation-triangle"></i>
                                      <span class="link-title">
                                      Error Pages
                                    </span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <li>
                                        <a href="403.html">
                                          <i class="fa fa-angle-right"></i>&nbsp;403</a>
                                      </li>
                                      <li>
                                        <a href="404.html">
                                          <i class="fa fa-angle-right"></i>&nbsp;404</a>
                                      </li>
                                      <li>
                                        <a href="405.html">
                                          <i class="fa fa-angle-right"></i>&nbsp;405</a>
                                      </li>
                                      <li>
                                        <a href="500.html">
                                          <i class="fa fa-angle-right"></i>&nbsp;500</a>
                                      </li>
                                      <li>
                                        <a href="503.html">
                                          <i class="fa fa-angle-right"></i>&nbsp;503</a>
                                      </li>
                                      <li>
                                        <a href="offline.html">
                                          <i class="fa fa-angle-right"></i>&nbsp;offline</a>
                                      </li>
                                      <li>
                                        <a href="countdown.html">
                                          <i class="fa fa-angle-right"></i>&nbsp;Under Construction</a>
                                      </li>
                                    </ul>
                                  </li>
                                  <li>
                                    <a href="grid.html">
                                      <i class="fa fa-columns"></i>
                                      <span class="link-title">
                            Grid
                            </span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="blank.html">
                                      <i class="fa fa-square-o"></i>
                                      <span class="link-title">
                            Blank Page
                            </span>
                                    </a>
                                  </li>
                                  <li class="nav-divider"></li>
                                  <li>
                                    <a href="login.html">
                                      <i class="fa fa-sign-in"></i>
                                      <span class="link-title">
                            Login Page
                            </span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="javascript:;">
                                      <i class="fa fa-code"></i>
                                      <span class="link-title">
                            	Unlimited Level Menu
                            	</span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <li>
                                        <a href="javascript:;">Level 1  <span class="fa arrow"></span>  </a>
                                        <ul class="collapse">
                                          <li> <a href="javascript:;">Level 2</a>  </li>
                                          <li> <a href="javascript:;">Level 2</a>  </li>
                                          <li>
                                            <a href="javascript:;">Level 2  <span class="fa arrow"></span>  </a>
                                            <ul class="collapse">
                                              <li> <a href="javascript:;">Level 3</a>  </li>
                                              <li> <a href="javascript:;">Level 3</a>  </li>
                                              <li>
                                                <a href="javascript:;">Level 3  <span class="fa arrow"></span>  </a>
                                                <ul class="collapse">
                                                  <li> <a href="javascript:;">Level 4</a>  </li>
                                                  <li> <a href="javascript:;">Level 4</a>  </li>
                                                  <li>
                                                    <a href="javascript:;">Level 4  <span class="fa arrow"></span>  </a>
                                                    <ul class="collapse">
                                                      <li> <a href="javascript:;">Level 5</a>  </li>
                                                      <li> <a href="javascript:;">Level 5</a>  </li>
                                                      <li> <a href="javascript:;">Level 5</a>  </li>
                                                    </ul>
                                                  </li>
                                                </ul>
                                              </li>
                                              <li> <a href="javascript:;">Level 4</a>  </li>
                                            </ul>
                                          </li>
                                          <li> <a href="javascript:;">Level 2</a>  </li>
                                        </ul>
                                      </li>
                                      <li> <a href="javascript:;">Level 1</a>  </li>
                                      <li>
                                        <a href="javascript:;">Level 1  <span class="fa arrow"></span>  </a>
                                        <ul class="collapse">
                                          <li> <a href="javascript:;">Level 2</a>  </li>
                                          <li> <a href="javascript:;">Level 2</a>  </li>
                                          <li> <a href="javascript:;">Level 2</a>  </li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </li>
                                </ul>
                        <!-- /#menu -->
                    </div>

                    <!-- /center -->
                <div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
							<div class="col-lg-12">

                               @yield('Content');









                            </div>
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>

                <!-- /#content -->
                    <div id="right" class="bg-light lter">
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong> Best check yo self, you're not looking too good.
                        </div>
                        <!-- .well well-small -->
                        <div class="well well-small dark">
                            <ul class="list-unstyled">
                                <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span></li>
                                <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span></li>
                                <li>Popularity <span class="dynamicbar pull-right">Loading..</span></li>
                                <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span></li>
                            </ul>
                        </div>
                        <!-- /.well well-small -->
                        <!-- .well well-small -->
                        <div class="well well-small dark">
                            <button class="btn btn-block">Default</button>
                            <button class="btn btn-primary btn-block">Primary</button>
                            <button class="btn btn-info btn-block">Info</button>
                            <button class="btn btn-success btn-block">Success</button>
                            <button class="btn btn-danger btn-block">Danger</button>
                            <button class="btn btn-warning btn-block">Warning</button>
                            <button class="btn btn-inverse btn-block">Inverse</button>
                            <button class="btn btn-metis-1 btn-block">btn-metis-1</button>
                            <button class="btn btn-metis-2 btn-block">btn-metis-2</button>
                            <button class="btn btn-metis-3 btn-block">btn-metis-3</button>
                            <button class="btn btn-metis-4 btn-block">btn-metis-4</button>
                            <button class="btn btn-metis-5 btn-block">btn-metis-5</button>
                            <button class="btn btn-metis-6 btn-block">btn-metis-6</button>
                        </div>
                        <!-- /.well well-small -->
                        <!-- .well well-small -->
                        <div class="well well-small dark">
                            <span>Default</span><span class="pull-right"><small>20%</small></span>

                            <div class="progress xs">
                                <div class="progress-bar progress-bar-info" style="width: 20%"></div>
                            </div>
                            <span>Success</span><span class="pull-right"><small>40%</small></span>

                            <div class="progress xs">
                                <div class="progress-bar progress-bar-success" style="width: 40%"></div>
                            </div>
                            <span>warning</span><span class="pull-right"><small>60%</small></span>

                            <div class="progress xs">
                                <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
                            </div>
                            <span>Danger</span><span class="pull-right"><small>80%</small></span>

                            <div class="progress xs">
                                <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
                            </div>
                        </div>                    </div>
                    <!-- /#right -->
            </div>
            <!-- /#wrap -->
            <footer class="Footer bg-dark dker">
                <p>2016 &copy; Metis Bootstrap Admin Template</p>
            </footer>
            <!-- /#footer -->
            <!-- #helpModal -->
            <div id="helpModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- /#helpModal -->

            <!--jQuery -->
            <script src="{{URL::asset('js/jquery.min.js')}}"></script>
            <!--Bootstrap -->
            <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
            <!-- MetisMenu -->
            <script src="{{URL::asset('js/metisMenu.min.js')}}"></script>
            <!-- Screenfull -->
            <script src="{{URL::asset('js/screenfull.js')}}"></script>

            <!-- Metis core scripts -->
            <script src="{{URL::asset('js/core.js')}}"></script>
            <!-- Metis demo scripts -->
            <script src="{{URL::asset('js/app.js')}}"></script>
			<script src="https://use.fontawesome.com/cc9e45a82f.js"></script>

            <script src="{{URL::asset('js/style-switcher.js')}}"></script>
		</form>
        </body>
</html>
@stop
