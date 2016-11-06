<div class="container">
        	<div class="row">
            	<div class="Header">
                	<div class="col-md-12">
                    	
                       <nav class="navbar navbar-default" style="font-family: times new roman;">
                          <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                              <a class="navbar-brand" href="/">Home</a>
                            </div>
                        
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav">
                                @foreach ($Category as $All_category)
                                
                               <li><a href="/Category_base_news/{{$All_category->news_category}}">{{$All_category->news_category}}</a></li>
                                @endforeach;
                                	<li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">আরো ও <span class="caret"></span></a>
                                          <ul class="dropdown-menu">
                                            <li><a href="#">কম্পিউটার</a></li>
                                            <li><a href="#">মোবাইল ফোন</a></li>
                                            <li><a href="#">আবিষ্কার</a></li>
                                            
                                            <li><a href="#">তারকা</a></li>
                                            
                                            <li><a href="#">গেমস</a></li>
                                            <li><a href="#">ফিল্যান্স</a></li>
                                            <li><a href="#">মাল্টিমিডিয়া</a></li>
                                            <li><a href="User_panel/Bortoman_sonlap/Index.php">বাংলাদশের সময়</a></li>
                                          </ul>
                                		</li>
                                  
                                        </div><!-- /.navbar-collapse -->
                                      </div><!-- /.container-fluid -->
                                    </nav>
                                    </div>
                                </div>
                            </div>
                        </div>