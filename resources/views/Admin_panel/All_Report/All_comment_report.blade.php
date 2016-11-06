@extends('Admin_panel.index')
@section('Titel','Comment Report')
@section('Content')




<br>

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-left"><strong>Comment Report</strong></div><br><br>
    </div>
</div>

<div class="container">
    <div class="row">

        <table width="90%"  class="table-bordered table-responsive" border="1">
          <tr class="text-center text-uppercase bg-primary">
            <td width="60" height="25">ID </td>
            <td width="20">category</td>
            <td width="262">Headline</td>
            <td width="96">Name</td>
            <td width="103">Email</td>

            <td width="155">Comment </td>
            <td width="127">Aprobed</td>
            <td width="127">Action</td>
          </tr>




          <?php
          $Information_for_Role_USER=session()->get('key');

          ?>
                @foreach($All_comment_information as $Information)



          <tr height="40" class="text-center">
            <td class="bg-warning" height="30">{{$Information->unique_code }}</td>
            <td>{{$Information->news_category}}</td>
            <td>{{$Information->news_headline}}</td>
            <td>{{$Information->name}}</td>
            <td>{{$Information->email}}</td>

            <td>{{$Information->comment}}</td>

            <td>
              @foreach($Information_for_Role_USER as $Role_check)
                  @if($Role_check->permission_name =="Aproved")
                      @if($Information->aproval=='pendding')
                            <a class="btn btn-primary" href="/Comment_aproval/{{$Information->unique_code}}">{{$Information->aproval}} </a>
                            @else
                            <a class="btn btn-success" href="/Comment_aproval/{{$Information->unique_code}}">{{$Information->aproval}}</a>
                      @endif
                  @endif
              @endforeach
                </td>
            <td>
              @foreach($Information_for_Role_USER as $Role_check)
                  @if($Role_check->permission_name =="Delete ")
                    <a href="/Comment_Delete/{{$Information->unique_code}}" class="btn btn-danger">Delete</a>
                  @endif
              @endforeach
            </td>
          </tr>

          @endforeach

        </table>
       <div class="text-center"></div>



    </div>
</div>
@stop
