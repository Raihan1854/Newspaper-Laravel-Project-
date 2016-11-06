@extends('Admin_panel.index')
@section('Titel','News Report')
@section('Content')




<form name="" action="/Filter_report" method="post">

<br>
<div class="container">
    <div class="row">
        <div class="col-sm-4 text-left"><a class="btn btn-primary" href="Bangladesh">New News Upload</a><hr></div>
        <div class="col-sm-8 text-left">Filter &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<select name="Filter_category">
                    <option>All</option>
                    <?php
                    foreach($Category as $Filter_category)
                    {
                    ?>
                    <option><?php echo $Filter_category->news_category ?></option>
                    <?php
                    }
                    ?>
            </select><input style="height:20px; margin-left:10px;" type="submit" name="" value="Filter"><hr></div>
    </div>
</div>
{{csrf_field()}}

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-left"><strong><?php echo  @$News_category ?> News Report</strong></div><br><br>
    </div>
</div>

<div class="News_report">

<div class="container">
    <div class="row">

        <table style="width:87%;"  class="table-bordered table-responsive" border="1">
          <tr class="text-center text-uppercase bg-primary">
            <td width="60" height="25">ID </td>
            <td width="182">News Subject </td>
            <td width="262">Headline</td>
            <td width="96">News Category</td>
            <td width="80">Select</td>
            <td width="90">Aprobed</td>
            <td width="120">Action </td>
          </tr>
            <?php




                foreach($Data as $Information)
                {

    ?>
          <tr height="40" class="text-center">
            <td class="bg-warning" height="30"><?php echo $Information->news_no ?></td>
            <td><?= $Information->news_subject ?></td>
            <td><?= $Information->news_headline ?></td>
            <td><?= $Information->news_category ?></td>
            <td>
              <?php
              $Information_for_Role_USER=session()->get('key');

              ?>
              @foreach($Information_for_Role_USER as $Role_check)
                @if($Role_check->permission_name =="Aproved")
                  @if($Information->news_selection=='none')
<a class="btn btn-danger" href="/view_news_operation_select/<?= $Information->news_no ?>"><?= $Information->news_selection ?></a>
                  @else
<a class="btn btn-success" href="/view_news_operation_select/<?= $Information->news_no ?>"><?= $Information->news_selection ?></a>
                  @endif
              @endif
            @endforeach
              </td>
            <td>
              @foreach($Information_for_Role_USER as $Role_check)
                @if($Role_check->permission_name =="Aproved")
                    @if($Information->news_aproval=='aproved')
<a class="btn btn-success" href="/view_news_operation_aproval/<?= $Information->news_no ?>"><?= $Information->news_aproval ?></a>
                    @else
<a class="btn btn-primary" href="/view_news_operation_aproval/<?= $Information->news_no ?>"><?= $Information->news_aproval ?></a>
                    @endif
                @endif
              @endforeach
            </td>

          <td>
              @foreach($Information_for_Role_USER as $Role_check)

                @if($Role_check->permission_name == "Delete ")
                  <a class="btn btn-danger" href="/view_news_operation_report_delete/<?= $Information->news_no ?>">Delete</a></td>
                @endif
                @if($Role_check->permission_name =="Edit")
                  <a class="btn btn-info"   href="/view_news_operation_report_Edit/<?= $Information->news_no ?>">Edit</a>
                @endif

              @endforeach
          </tr>

            <?php
                }
                    ?>

        </table>
       <div class="text-center"> {{ $Data->links() }}</div>

   <?php session_start() ?>

    </div>
</div>
</div>
</form>
@stop
