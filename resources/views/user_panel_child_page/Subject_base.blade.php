@extends('../index')
@section('title','Time Of Bangladesh')
@section('Heading_News_content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<div class="container">
                        	<div class="row">

                                	<div class="News_content">
                                    	<div class="col-md-9">
                                          @foreach($ALL_content_news_category as $All_category_base_news)
                                          <div class="This_content">
                                            <div class="col-sm-3"><br><img style="height: 123px;width: 179px;}" class='img-responsive' src='{{URL::asset("Image/upload/$All_category_base_news->news_no.$All_category_base_news->news_file")}}'></div>
                                            <div class="col-sm-9 text-justify"><br><div style="font-size:20px;"><b>{{$All_category_base_news->news_headline}}}</b></div>
                                              <br><p><?php if(strlen($All_category_base_news->news)>200)
                                              {


                                                  echo substr($All_category_base_news->news,0,500);
                                              ?>
                                                   <a href="/Show_single_News/{{$All_category_base_news->news_category}}/{{$All_category_base_news->news_no}}" class="btn btn-default">বিস্তারিত</a>
                                              <?php
                                              }
                                              else
                                              {
                                                  echo $All_category_base_news->news;
                                              }
                                              ?></p>
                                          </div>
                                            <div style="color:white">.</div>



                                      </div>@endforeach
                                    {{$Different_news->links()}}
                                  </div>



                                    @include('website_layout.Login_protal');

                            </div>
                        </div>




<div class="container">
        	<div class="row">
            	<div class="col-sm-8">


                     <div class="container-fluid">
                     	<div class="row">

                            <div class="col-sm-8">



                                <div class="TOTAL_CONTENT_FOR_LEFT_NEWS">
                                	<div class="HEADILE"><b>{{$Backend_news_left->news_headline}}</b></div>
                            		<div class="News_coverage_man">{{$Backend_news_left->news_cov_jrn}} | {{$Backend_news_left->created_at}}</div>
                                    <div style="border-bottom:1px black solid"></div><br>
                           			<div class="col-sm-6">
                                	 	<div class="Image" style=" float:left"><?php $news_name=$Backend_news_left->news_no;$news_file=$Backend_news_left->news_file ?><img src='{{URL::asset("Image/upload/$news_name"."."."$news_file")}}' width="230" height="142" /></div>
                                    </div>

                                	<div class="col-sm-6">
                                	 	<div class="News_text text-justify" style="float:right">
                                            <?php
                                            if(strlen($Backend_news_left->news)>200)
                                            {


                                                echo substr($Backend_news_left->news,0,300);
                                            ?>
                                                 <a href="Show_single_News/{{$Backend_news_left->news_category}}/{{$Backend_news_left->news_no}}" class="btn btn-default">বিস্তারিত</a>
                                            <?php
                                            }
                                            else
                                            {
                                                echo $Backend_news_left->news;
                                            }
                                            ?>

                                           </div><br>
                                	</div>

                                </div>




                                @include('website_layout.Tabbed_news');

                            </div>


                            <div class="col-sm-4">

                                  @foreach($Backend_news_bottom as $Backed_N_bottom)
                                <div class="TOTAL_CONTENT_FOR_RIGHT_NEWS">
                                    <div class="HEADILE2"><b><br>{{$Backed_N_bottom->news_headline}}</b></div>
                                    <div class="News_coverage_man1" >{{$Backed_N_bottom->news_cov_jrn}} | {{$Backed_N_bottom->created_at}}</div>
                                    <div class="col-sm-12">
                                        <div class="Image" style=" float:left"><?php $news_name_1=$Backed_N_bottom->news_no;$news_file_1=$Backed_N_bottom->news_file ?><img src='{{URL::asset("Image/upload/$news_name_1"."."."$news_file_1")}}' class='img-responsive'/></div>
                                    </div>
                                     <div class="col-sm-12">
                                            <div class="News_text text-justify" style="float:right">
                                             <?php
                                            if(strlen($Backed_N_bottom->news)>200)
                                            {


                                                echo substr($Backed_N_bottom->news,0,150);
                                            ?>
                                                 <a href="Show_single_News/{{$Backed_N_bottom->news_category}}/{{$Backed_N_bottom->news_no}}" class="btn btn-default">বিস্তারিত</a>
                                            <?php
                                            }
                                            else
                                            {
                                                echo $Backed_N_bottom->news;
                                            }
                                            ?>
                                         </div>
                                     </div>
                                </div><div style="border-bottom:black 1px solid; color:white">.</div>
                                @endforeach







                            </div>



                        </div>
                    </div>
                      <hr>
                </div>

                @include('website_layout.Add_making')
    </div>
</div>


@stop
