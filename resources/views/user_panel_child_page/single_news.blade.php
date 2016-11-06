@extends('index')
@section('title','Time Of Bangladesh')
@section('Heading_News_content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<div class="container">
                            <div class="row">

                                    <div class="News_content">
                                        <div class="col-md-9">
                                          <p style="font-size:22px"><i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<b>{{$Single_news->news_headline}} </b><p>
                                            {{$Single_news->news_cov_jrn}}||{{$Single_news->created_at}}<br><br><br>
                                            <img class='img-responsive' src='{{URL::asset("Image/upload/$Single_news->news_no.$Single_news->news_file")}}'>
                                            <br><div class="text-justify" >{{$Single_news->news}}</div><br>


                                              <div class="comment">
                                                <form name="" action="/Comment_add" method="post">
                                                  {{csrf_field()}}
                                                        <div class="Comment_heading">
                                                            <h3 class="style2">Leave a Reply </h3><hr />
                                                          </div>

                                                          <div class="form-group" hidden="hidden">
                                                              <label for="name" class="col-sm-2 control-label">News No</label>
                                                            <div class="col-sm-10">
                                                                  <input type="text" class="form-control" id="name" name="Comment_news_no" placeholder="First & Last Name" value="{{$Single_news->news_no}}">
                                                            </div>
                                                          </div>


                                                              <div class="form-group">
                                                                  <label for="name" class="col-sm-2 control-label">Name</label>
                                                                <div class="col-sm-10">
                                                                      <input type="text" class="form-control" id="name" name="Comment_Name" placeholder="First & Last Name" value="">
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                  <label for="email" class="col-sm-2 control-label">Email</label>
                                                                <div class="col-sm-10">
                                                                      <input type="email" class="form-control" id="email" name="Comment_Email" placeholder="info@info.com" value="">
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                  <label for="message" class="col-sm-2 control-label">Message</label>
                                                                <div class="col-sm-10">
                                                                      <textarea class="form-control" rows="4" name="Comment"></textarea>
                                                                </div>
                                                              </div>

                                                              <div class="form-group">
                                                                  <div class="col-sm-10 col-sm-offset-2"  style="margin-top:20px;">
                                                                      <input id="submit" name="Send_email" type="submit" value="Send Your Comment" class=" btn-primary">
                                                                  </div>
                                                              </div>
                                                              <div class="form-group">
                                                                  <div class="col-sm-10 col-sm-offset-2"></div>
                                                              </div>
                                                          </form>
                                              </div>


<!--                     try This Comment Text show ---------------------------->

<style>
.thumbnail {
    padding:0px;
}
.panel {
	position:relative;
}
.panel>.panel-heading:after,.panel>.panel-heading:before{
	position:absolute;
	top:11px;left:-16px;
	right:100%;
	width:0;
	height:0;
	display:block;
	content:" ";
	border-color:transparent;
	border-style:solid solid outset;
	pointer-events:none;
}
.panel>.panel-heading:after{
	border-width:7px;
	border-right-color:#f7f7f7;
	margin-top:1px;
	margin-left:2px;
}
.panel>.panel-heading:before{
	border-right-color:#ddd;
	border-width:8px;
}

</style>

<div class="container">
<div class="row">
<div class="col-sm-12">
<h3>User Comment </h3>
</div><!-- /col-sm-12 -->
</div><!-- /row -->

@foreach($Single_news_comment as $News_comment)
<div class="row">
<div class="col-sm-1">
<div class="thumbnail">
<img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" >
</div><!-- /thumbnail -->
</div><!-- /col-sm-1 -->


<div class="col-sm-5">
<div class="panel panel-default">
<div class="panel-heading">
<strong>{{$News_comment->name}}</strong>&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;<e style="font-size:12px">{{$News_comment-> created_at}}</e>
</div>
<div class="panel-body">
{{$News_comment->comment}}
</div><!-- /panel-body -->
</div><!-- /panel panel-default -->
</div><!-- /col-sm-5 -->
</div><!-- /row -->
@endforeach
</div><!-- /container -->


<!--   Text Comment Is Now End------------------------------------------------>






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
                                                        	<div class="HEADILE"><b><br><br>{{$Backend_news_left->news_headline}}</b></div>
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
                                                                         <a href="/Show_single_News/{{$Backend_news_left->news_category}}/{{$Backend_news_left->news_no}}" class="btn btn-default">বিস্তারিত</a>
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
                                                            <div class="HEADILE2"><b><br><br><br>{{$Backed_N_bottom->news_headline}}</b></div>
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
                                                                         <a href="/Show_single_News/{{$Backed_N_bottom->news_category}}/{{$Backed_N_bottom->news_no}}" class="btn btn-default">বিস্তারিত</a>
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
