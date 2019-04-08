<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="bootstrap-3.1.1-dist/bootstrap-3.1.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap-3.1.1-dist/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css" />
    <script type="text/javascript" src="bootstrap-3.1.1-dist/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <script src="main.js"></script>
    <script>    
        $(document).ready(function(e) {
            // gio hang
            $("#maket").click(function(e){
              $("#b").load("giohang.php");
            });
            // thanh toan
            $("#thanhtoan").click(function(e){
              $("#thanktoan").load("khachhang.php");
            })
            // updata gio hang
            $("#update").click(function(){
              location.reload("giohang.php");   
            })
            $("#nam").click(function(){
              var loai=$("#nam").attr("gt");
              $.post("sanpham.php",{sex:loai},function(data){
                $("#bodyer").html(data);
              });
             // $("#bodyer").load("sanpham.php");
            });
            $("#nu").click(function(){
              var loai=$("#nu").attr("gt");
              $.post("sanpham.php",{sex:loai},function(data){
                $("#bodyer").html(data);
              });
            });
            $("#sale").click(function(){
              $.post("sanpham.php",{sale:2},function(data){
                $("#bodyer").html(data);
              });
            });
        });
    </script>
    <style>
    p{
      font-family: 'Pacifico';
    }</style>
</head>
<body>
    <div>
            <div style="position: fixed;top:0px; width: 100%;z-index: 5;">
            <nav class="navbar navbar-inverse">
  <div class="container-fluid" style="background-color:rgba(192,192,192,0.3);">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand active" href="trangchu.php">Trang Chu</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#" id="sale">sale</a></li>
        <li><a href="#" id="nam" gt="0">Nam</a></li>
        <li><a href="#" id="nu" gt="1">Nữ</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Giá <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                                <li> 
                                    <form>
                                        <div class="radio">
                                          <label><input type="radio" name="optradio" checked>100000 ==> 300000</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="optradio">300000 ==> 500000</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="optradio"> > 500000</label>
                                        </div>
                                    </form>
                                </li>
                          </ul>
                        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><button id="maket" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-shopping-cart"></span>
          Giỏ Hàng
     </button></li>      
      </ul>
    </div>
  </div>
</nav>
            </div>
        <div id="bodyer" style="width: 90%; margin: 34px auto;">
            <p style="position: absolute;z-index: 4;top:100px;left: 150px;transform: rotate(-20deg);font-size: 30px;font-family: 'Pacifico', cursive;">Nhiều Tiền Để làm gì ?</p>
            <p style="position: absolute;z-index: 4;top:130px;left: 150px;transform: rotate(-20deg);font-size: 30px;font-family: 'Pacifico', cursive;">Đi Mua Sắm Chứ Để Làm Gì</p>
            <!--  ---------------------------------  -->  
            <div> 
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                    <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                         <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    <div class="item active">
                    <img src="./img/logo1.jpg" alt="Los Angeles" style="width:100%;height:600px;">
                  </div>

                  <div class="item">
                     <img src="./img/logonam.jpg" alt="Chicago" style="width:100%;height:600px;">
                  </div>
    
                  <div class="item">
                   <img src="./img/logo.jpg" alt="New york" style="width:100%;height:600px;">
                  </div>
              </div>

                <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
              </a>
              </div>
                </div>         
              <!--<img src="./img/logo.jpg" width="100%" height=""/>-->
        </div>
        <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <!-- Modal Header -->
        <div class="modal-header">
          <button id="thanhtoan" type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target="#myModaltk" >Thanh toán</button>
        </div>   
        <!-- Modal body -->
        <div class="modal-body" id="b">
          agfgf
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="update">update cart</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>        
      </div>
    </div>
  </div>
  
    </div>
    <div class="modal" id="myModaltk">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <!-- Modal Header -->
        <div class="modal-header">
          
        </div>   
        <!-- Modal body -->
        <div class="modal-body" id="thanktoan">
         
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>        
      </div>
  </body>
</html>