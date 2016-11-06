<!DOCTYPE html>
<html >
  <head>
   <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
   <script type="text/jscript" src="{{URL::asset('css/bootstrap.min.js')}}"></script>
   <script type="text/jscript" src="{{URL::asset('css/jquery.min.js')}}"></script>
    <title>Login</title>
      <script src="https://use.fontawesome.com/cc9e45a82f.js"></script>
  </head>
        
  <body>
      
      <form action="/System_vailidation" name="" method="post">
        <div class="container"  align='center' style="margin-top:200px">
            <div class="row">
                {{csrf_field()}}
                <div class="bg-primary text-center" style="width:25%; font-family:times new roman; font-size:20px; height:50px;background:url(image/Background.jpg)">Administration Login</div>

                <br>
                <div class="" style="width:25%; font-family:times new roman; font-size:20px; height:50px;"><input  type='email' name='Email'  class="form-control" placeholder='Email' required ></div>

                <div class="" style="width:25%; font-family:times new roman; font-size:20px; height:50px;"><input  type='password' name='password'  class="form-control" name='' placeholder='Password' required ></div>
                
                
                <div class="" style="width:25%; font-family:times new roman; font-size:15px; color:red; height:50px;"><?=@$Invaild_message?></div>

                
                
                
                <button type="submit"><a type="submit"  style="width:25%; color:#FDAB17;font-size:20px; height:30px;" href=""><i class="fa fa-check-circle" aria-hidden="true"></i></a></button>

          </div>
        </div>    
  
      </form>
    
  </body>
</html>
