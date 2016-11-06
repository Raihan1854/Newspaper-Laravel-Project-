@extends('Admin_panel.index')
@section('Titel','News Report')
@section('Content')




<br>
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-left"><a class="btn btn-primary" href="Bangladesh">New News Upload</a><hr></div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-12 text-left"><strong><?php echo  $News_category ?> News Report</strong></div><br><br>
    </div>
</div>

<div class="container">
    <div class="row">

        <table  class="table-bordered table-responsive" border="1">
          <tr class="text-center text-uppercase bg-primary">
            <td width="60" height="25">ID </td>
            <td width="182">Category Name</td>

            <td width="127">Aprobed</td>
            <td width="155">Action </td>
          </tr>
            <?php




                foreach($Data as $Information)
                {

    ?>
          <tr height="40" class="text-center">
            <td class="bg-warning" height="30"><?php echo $Information->cat_id ?></td>
            <td><?= $Information->news_category ?></td>

            <td>
              <?php
              $Information_for_Role_USER=session()->get('key');

              ?>
              @foreach($Information_for_Role_USER as $Role_check)
                @if($Role_check->permission_name =="Aproved")
                  <?php if($Information->enable_status=='Enable')
                        {
                    ?>
    <a class="btn btn-success" href="/view_category_operation_enable/<?= $Information->cat_id ?>"><?= $Information->enable_status ?></a>
                    <?php
                        }
                        else
                        {
                    ?>
    <a class="btn btn-primary" href="/view_category_operation_enable/<?= $Information->cat_id ?>"><?= $Information->enable_status ?></a>
                    <?php
                        }
                    ?>
                @endif
              @endforeach</td>
            <td>
                  @foreach($Information_for_Role_USER as $Role_check)

                    @if($Role_check->permission_name == "Delete ")
                      <a class="btn btn-danger" href="/view_category_operation_delete/<?= $Information->cat_id ?>">Delete</a>
                    @endif
                    @if($Role_check->permission_name =="Edit")
                      <a class="btn btn-info"   href="/view_category_operation_report_Edit/<?= $Information->cat_id ?>">Edit</a>
                    @endif

                   @endforeach
             </td>
          </tr>

            <?php
                }
                    ?>

        </table>
       <div class="text-center"> {{ $Data->links() }}</div>
       <?php session_start() ?>


    </div>
</div>
@stop
