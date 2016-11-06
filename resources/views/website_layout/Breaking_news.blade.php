   <div class="container">
                        	<div class="row">
                            	<div class="col-md-12">
                                	<div align="center"><img  style="height:95px" src="{{URL::asset('Image/ADD2.gif')}}" class="img-responsive"></div><br>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="container">
                        	<div class="row">
                            	<div class="col-md-2" >
                                		<div class="panel panel-default">
                                          	<div class="panel-body BRK_NEWS" align="center">ব্রেকিং নিউজ</div>
                                        </div>
                                    </div>
                                <div class="col-md-10">
                                	
                                          	<div class="panel-body " align="center"><marquee  class="Marquee" onmouseover="this.stop();" onmouseout="this.start();">@foreach($Breaking_news as $Top_news)
                                               <a style="text-decoration:none; color:red; " href="/Show_single_News/{{$Top_news->news_category}}/{{$Top_news->news_no}}"> {{$Top_news->news_headline}}</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                @endforeach;</marquee></div>
                                        
                                </div>
                            </div>
                        </div>