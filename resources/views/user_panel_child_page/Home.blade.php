@extends('../index')
@section('title','Time Of Bangladesh')
@section('Heading_News_content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<div class="container">
                        	<div class="row">

                                	<div class="News_content">
                                    	<div class="col-md-3">
                                        	<div style="font-size:20px; text-align:center; font-family:sutonnyMJ">আপডেট খবর</div><br />
                                            @foreach($Update_news as $News_update)
                                            <div style="padding-top:10px" class="text-justify NEWS_CONTENT1"><a href="Show_single_News/{{$News_update->news_category}}/{{$News_update->news_no}}"><?php
echo substr("$News_update->news_headline",0,100)  ?>....</a></div>
                                            <div style="border-bottom:#337AB7 1px solid; color:white">.</div>
                                            @endforeach



                                            <hr />
                                        </div>



                                        <div class="col-md-6">
                                         <div class="text-center NEWS_CONTENT2"><b>

                                             {{$Front_news->news_headline}}

                                             </b></div>
                                        	<div align="center"><img src='{{URL::asset("Image/upload/$Front_news->news_no"."."."$Front_news->news_file")}}' width="532" height="300" /></div>
                                            <div class="text-justify Content" style="font-size:15px; font-family:times new roman">
                                                <?php
                                                   $News_len=strlen($Front_news->news);
                                                    if($News_len>500)
                                                    {
                                                        echo substr("$Front_news->news",0,2000);
                                                ?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class='bg-primary btn btn-default' href="Show_single_News/{{$Front_news->news_category}}/{{$Front_news->news_no}}" class="MORE_CONTENT" >Read More..</a>
                                                <?php
                                                    }
                                                else
                                                {
                                                    echo $Front_news->news;
                                                }
                                                ?>
                                             </div>
                                             <!----------                      New Div Start                 -->
                                             @foreach($More_content_news as $More_content)
                                              <div class="TOTAL_CONTENT_FOR_LEFT_NEWS" style="margin-top:20px">
                                                 <div class="HEADILE"><b>{{$More_content->news_headline}}</b></div>
                                               <div class="News_coverage_man">{{$More_content->news_cov_jrn}} | {{$More_content->created_at}}</div>
                                                   <div style="border-bottom:1px black solid"></div><br>
                                               <div class="col-sm-4">
                                                   <div class="Image" style=" float:left"><?php $news_name=$More_content->news_no;$news_file=$More_content->news_file ?><img style="    height: 74px;
    width: 137px;"src='{{URL::asset("Image/upload/$news_name"."."."$news_file")}}' width="230" height="142" /></div>
                                                   </div>

                                                 <div class="col-sm-8">
                                                   <div class="News_text text-justify" style="float:right">
                                                           <?php
                                                           if(strlen($More_content->news)>200)
                                                           {


                                                               echo substr($More_content->news,0,300);
                                                           ?>
                                                                <a href="Show_single_News/{{$More_content->news_category}}/{{$More_content->news_no}}" class="btn btn-default">বিস্তারিত</a>
                                                           <?php
                                                           }
                                                           else
                                                           {
                                                               echo $More_content->news;
                                                           }
                                                           ?>

                                                          </div><br>
                                                 </div>

                                               </div>
                                               <br><br>
                                               @endforeach
                                               <!----------                      New Div Start                 -->


                                            </div>
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
