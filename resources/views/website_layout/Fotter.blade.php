 <div class="container">
                          <div class="row">


                              <div class="col-md-4">
                              <div class="bg-primary Poltics_content">{{$Backend_news_footer->news_category}}</div>
                              <div class="old_news_img"><?php $Different_news_name3=$Backend_news_footer->news_no;$Different_news3=$Backend_news_footer->news_file ?><img src='{{URL::asset("Image/upload/$Different_news_name3"."."."$Different_news3")}}' style="height: 365px;" class='img-responsive'/>
                                <h4>{{$Backend_news_footer->news_headline}}</h4>
                                <p class="text-justify"> <?php
                                            if(strlen($Backend_news_footer->news)>50)
                                            {


                                                echo substr($Backend_news_footer->news,0,200);
                                            ?>
                                                 <a href="/Show_single_News/{{$Backend_news_footer->news_category}}/{{$Backend_news_footer->news_no}}" class="btn btn-default">বিস্তারিত</a>
                                            <?php
                                            }
                                            else
                                            {
                                                echo $Backend_news_footer->news;
                                            }
                                            ?></a>
                              </div>
                              <hr>

                              <div class="old_news">
                                @foreach($Backend_footer_news_bottom as $Footer_bootom_news)
                                  <a href="/Show_single_News/{{$Footer_bootom_news->news_category}}/{{$Footer_bootom_news->news_no}}" class="text-justify"><h5>{{$Footer_bootom_news->news_headline}}</h5></a><hr>

                                  @endforeach
                              </div>

                            </div>




                            <div class="col-md-4">
                              <div class="bg-primary Poltics_content">সাম্প্রতিক খবর</div>

                              <div class="old_new_heading">
                                  @foreach($All_recent as $All_Recent_News)
                                <a href="/Show_single_News/{{$All_Recent_News->news_category}}/{{$All_Recent_News->news_no}}" class="glyphicon glyphicon-arrow-right">{{$All_Recent_News->news_headline}}</a>
                                  <div style="border-bottom:1px #E1E1E1 solid; color:white">.</div>
                                  @endforeach
                              </div>
                            </div>

                            <div class="col-sm-4">
                	               <div class="bg-primary Poltics_content text-uppercase">বতর্মান</div>

                                @foreach($Rajniti as $Rajniti_news_details)

                                <div class="TOTAL_CONTENT_FOR_RIGHT_NEWS">
                                    <div class="HEADILE2"><b><br>{{$Rajniti_news_details->news_headline}}</b></div>
                                    <div class="News_coverage_man1" >{{$Rajniti_news_details->news_cov_jrn}} | {{$Rajniti_news_details->created_at}}</div>
                                    <div class="col-sm-12">
                                        <div class="Image" style=" text-align:center"><?php $Rajniti_news_name=$Rajniti_news_details->news_no;$Rajniti_news_file=$Rajniti_news_details->news_file ?><img src='{{URL::asset("Image/upload/$Rajniti_news_name"."."."$Rajniti_news_file")}}' style="height: 248px;" class='img-responsive'/></div>
                                    </div>
                                     <div class="col-sm-12">
                                            <div class="News_text text-justify" style="float:right"><?php
                                            if(strlen($Rajniti_news_details->news)>100)
                                            {


                                                echo substr($Rajniti_news_details->news,0,200);
                                            ?>
                                                 <a href="/Show_single_News/{{$Rajniti_news_details->news_category}}/{{$Rajniti_news_details->news_no}}" class="btn btn-default">বিস্তারিত</a>
                                            <?php
                                            }
                                            else
                                            {
                                                echo $Rajniti_news_details->news;
                                            }
                                            ?><br></div>

                                     </div>
                                     <div style="border-bottom:1px #D5D5D5 solid; color:white">.</div>
                                </div>


                                @endforeach




                                </div>

                                    <form name="" action="/Day_question/{{$Day_question->Question_id}}" method="post">

                                        <div class="New_content">
                                        <div class="HEADILE2 text-danger" style="margin-top:20px" align="center"><b>জনগনের আদালত<hr></b></div>{{csrf_field()}}
                                        <div class="Question text-center"><br><br><b>{{$Day_question->Question}}</b> ?
                                        <input type="submit" name="vote" value="Yes"> <input name="vote" type="submit" value="No" ><br>
                                        <div class="badge">ফলাফল</div> :{{$Day_question->Yes}} জন হ্যাঁ  {{$Day_question->No}} জন না</div>
                                    </div>
                                    </form>
                          </div>
                        </div>





    <br><br>


        <div class="container">
        	<div class="row">
            	<div class="HEADILE2" align="center"><br><b>জনপ্রিয় বিষয়সমূহ</b></br></div>
                <div class="Button_all">
                  @foreach($View_news_subject as $News_subject)
                      <a class="btn btn-default" href="/Subject/{{$News_subject->news_subject}}">{{$News_subject->news_subject}}</a>
                  @endforeach
                    <hr>
                </div>
            </div>
        </div>


<div class="container bg-primary Footer">
        	<div class="row">
            	<div class="col-sm-4">

                    	<iframe class="map-area" style=" margin-top:50px;height: 70%;width: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.9040099396325!2d90.3662057145022!3d23.750802194678904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf4e27d3d0eb%3A0xa1bf0ba0f9bbcb5d!2sSankar+Bus+Stop!5e0!3m2!1sen!2sbd!4v1472486504110" ></iframe><br />

                </div>
                <div class="col-sm-4">
                	<div class="content_excute_information">
                	Mobile Number 	:     01751783698<br>
                    Telephone Number 	:     01751783698<br>
                    EINN Number 	:     01751783698<br>
                    </div>
                </div>
                <div class="col-sm-4">
                <div class="content_excute_information">
                	Head Office : BBA Babon , <br>Karwan Bazar <br> Dhaka <br> 1200
                    </div>
                </div>
            </div>
        </div>

        <div class="container bg-primary" align="center">
        	<div class="row">
            	<div class="col-sm-12">All Right Reservad @ Tims Of Bangladesh <br>
                <div  class="Developer"><a href="#">Desgin By : Md Hasan . <br> Mobile Number :0000000</a>
                </div>
                </div>
            </div>
        </div>
