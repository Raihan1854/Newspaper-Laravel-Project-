<script>

                                $(document).ready(function(){
                                    $("#Selected").click(function(){
                                        $(".Total_tabbed_news_selected").show(500);
                                        $(".Total_tabbed_news_Last").hide();
                                        $(".Total_tabbed_news_Views").hide();
                                        $(".Total_tabbed_news_Comments").hide();
                                    });

                                    $("#Last").click(function(){
                                        $(".Total_tabbed_news_selected").hide();
                                        $(".Total_tabbed_news_Last").show(500);
                                        $(".Total_tabbed_news_Views").hide();
                                        $(".Total_tabbed_news_Comments").hide();
                                    });

                                    $("#Views").click(function(){
                                        $(".Total_tabbed_news_selected").hide();
                                        $(".Total_tabbed_news_Last").hide();
                                        $(".Total_tabbed_news_Views").show(500);
                                        $(".Total_tabbed_news_Comments").hide();
                                    });

                                    $("#comments").click(function(){
                                        $(".Total_tabbed_news_selected").hide();
                                        $(".Total_tabbed_news_Last").hide();
                                        $(".Total_tabbed_news_Views").hide();
                                        $(".Total_tabbed_news_Comments").show(500);
                                    });
                                });
                                </script>


<div class="col-sm-12"><br>
                                    <div class="tabed_news well">
                                    <input class="btn btn-default" id="Selected" type='button' value='নির্বাচিত'>
                                    <input class="btn btn-default" id="Last" type='button' value='সর্বশেষ'>

                                    <input class="btn btn-default" id="comments" type='button' value='আলোচিত'>
                                        <div class="Total_tabbed_news_selected">

                                            <div  style="font-size:15px;margin-top:15px; ">
                                               @foreach($selected_news as $all_selected_news)
                                                <i class="fa fa-caret-right" aria-hidden="true"></i>  <a href="/Show_single_News/{{$all_selected_news->news_category}}/{{$all_selected_news->news_no}}">{{$all_selected_news->news_headline}}</a><br>
                                                <div style="border-bottom:1px #E1E1E1 solid; color:white">.</div>
                                                @endforeach
                                            </div>
                                        </div>




                                        <div hidden="hidden" class="Total_tabbed_news_Last">

                                            <div  style="font-size:15px;margin-top:15px; ">
                                               @foreach($Tabbed_recent_news as $Recent_tabbed_news)
                                                <i class="fa fa-caret-right" aria-hidden="true"></i>  <a href="/Show_single_News/{{$Recent_tabbed_news->news_category}}/{{$Recent_tabbed_news->news_no}}">{{$Recent_tabbed_news->news_headline}}</a><br>
                                                <div style="border-bottom:1px #E1E1E1 solid; color:white">.</div>
                                                @endforeach
                                            </div>
                                        </div>





                                        <div hidden="hidden" class="Total_tabbed_news_Comments">

                                            <div  style="font-size:15px;margin-top:15px; ">
                                              @foreach($Comment_base_news as $Top_comment_news)
                                              <i class="fa fa-caret-right" aria-hidden="true"></i>  <a href="/Show_single_News/{{$Top_comment_news->news_category}}/{{$Top_comment_news->news_no}}">{{$Top_comment_news->news_headline}}</a><br>
                                              <div style="border-bottom:1px #E1E1E1 solid; color:white">.</div>
                                                @endforeach
                                            </div>
                                        </div>
                                </div>
                                </div>
