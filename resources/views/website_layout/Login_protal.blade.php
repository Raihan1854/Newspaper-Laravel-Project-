<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("#login").hide(1000);
    });
    $("#hide").click(function(){
        $("#New_regestration").show();
    });
});
</script>
<div class="col-md-3">

                                        	<div id="login">

                                                <div class="bg-primary USER_LOGIN_CONTENT">ইউজার লগইন</div><br />ইউজার নাম
                                                <input type="text" class="form-control" />

                                               পাসওর্য়াড
                                                <input type="text" class="form-control" /><br />
                                                <div align="center"><input type="submit" value="Submit" class="btn btn-default" style="background:red; color:#FFF" /><a id="hide" >নতুন একাউন্ট রেজিস্ট্রেশন করুন</a></div>
                                            </div>



                                    <form name="" action="/New_acaount_regestration" method="post">

                                        <div id="New_regestration" hidden="hidden">
                                            <div class="bg-primary USER_LOGIN_CONTENT">ইউজার রেজিস্ট্রেশন</div><br />ইউজার নাম
                                            <input type="text" name="user_name" class="form-control" />
                                            {{csrf_field()}}
                                            ইমেইল
                                            <input name="email" type="text" class="form-control" /><br />

                                            পাসওর্য়াড
                                            <input type="text" name="password" class="form-control" /><br />

                                            কনর্ফাম  পাসওর্য়াড
                                            <input type="text" class="form-control" /><br />

                                            <input type="checkbox"> I agree Terms & Conditions
                                        <div align="center"><input type="submit" value="Submit" class="btn btn-default" style="background:red; color:#FFF" /></div>

                                            </div>

                                    </form>




                                    <br>
                                    <div align="center" class="bg-primary" style="font-size:18px">অন্যান নিউজ</div>
                                        <hr>
                                        <?php
                                        foreach($Different_news as $News_protal)
                                        {
                                            ?>
                                        <div class="All_CONTENT_FOR_RECENT_NEWS"><br>

                                            <div class="col-md-4">
                                            	<div class="img_news"><?php $Different_news_image_name=$News_protal->news_no;$Different_news_image_file=$News_protal->news_file ?><img src='{{URL::asset("Image/upload/$Different_news_image_name"."."."$Different_news_image_file")}}' class='img-responsive'/>


                                            	</div>
                                            </div>

                                            <div class="col-md-8">
                                            	<div  class="heading_plus">
                                                	<a href="/Show_single_News/{{ $News_protal->news_category}}/{{ $News_protal->news_no}}"><h5 class="text-justify">{{ $News_protal->news_headline}}</h5></a></div>
                                           		</div>
                                             <div style="border-bottom:1px #337AB7 solid;color:white;">.</div>
                                            </div>

                                        <?php
                                        }
                                        ?>
    {{$Different_news->links()}}
                                     @include('website_layout\comment');


                                   </div>
