<style type="text/css">
       #anh {
                transition: all 1s ease;
                -webkit-transition: all 1s ease;
                -moz-transition: all 1s ease;
                -o-transition: all 1s ease;
        }
 
        #anh:hover {
                opacity:0.7;
                transform: scale(1.2,1.2);
                -webkit-transform: scale(1.2,1.2);
                -moz-transform: scale(1.2,1.2);
                -o-transform: scale(1.2,1.2);
                -ms-transform: scale(1.2,1.2);
}
</style>
<script type="text/javascript">   
    $(document).ready(function() {
            $(".mu").click(function(){
              var idsp=$(this).attr("byid");
              $.post("chitiet.php",{idsp:idsp},function(data){
                $("#bodychitiet").html(data);
                });
              //alert(idsp);
            });
        });
</script>
<div class="container text-center">
        
        <div class="row text-center">
               <?php 
                  //btn-info btn-lg" data-toggle="modal"  data-target="#myModa
                  //  $hostname = 'localhost';
                  //  $username = 'root';
                  //  $password = '';
                  //  $dbname = "detai";
                  //  $conn = mysqli_connect($hostname, $username, $password,$dbname);
                    $sale=1;
                    $sqll="";
                    if(isset($_POST["sale"])){
                      $sale=$_POST["sale"];
                      $sqll="SELECT * from khohang where sale > $sale";
                    }
                    else{
                      $sale=1;
                    }
                    include("ketnoisql.php");
                    $conn=connect();
                    $gt=0;
                    if(isset($_POST["sex"])){
                    $gt=$_POST["sex"];
                    $sqll="SELECT * from khohang where loai=$gt and sale=$sale";}
                    echo "<br /><br /><br />";
                    $mangf = $conn->query($sqll);
                    while($data = $mangf->fetch_assoc()){
                    $link="./img/".$data["ten"].".jpg";
                    if($sale ==1){ $chuoi ='<div class="col-sm-4 item"><img id="anh" src="'.$link.'" width="80%" height="300px;">
                      <p>'.number_format($data["gia"]).'đ</p><p style="margin-top:20px;"><button type="button" byid="'.$data["masp"].'"
                       id="mua" class="mu" class="btn btn-info btn-lg btn btn-info btn-lg" data-toggle="modal"  data-target="#myModa">
                      <span class="glyphicon glyphicon-shopping-cart"></span>Chi Tiết</button></p></div>';
                      echo $chuoi;}
                      else{
                    $chuoi ='<div class="col-sm-4 item"><img id="anh" src="'.$link.'" width="80%" height="300px;">
                    <p style="text-decoration: line-through;">'.number_format($data["gia"]).'đ</p>
                    <p>'.number_format($data["gia"]*(100-$data["sale"])/100).'đ</p><p style="margin-top:20px;"><button type="button" byid="'.$data["masp"].'"
                     id="mua" class="mu" class="btn btn-info btn-lg btn btn-info btn-lg" data-toggle="modal"  data-target="#myModa">
                    <span class="glyphicon glyphicon-shopping-cart"></span>Chi Tiết</button></p></div>';
                    echo $chuoi;  }   
                    }
                    mysqli_close($conn);
                ?>
        </div>
</div>  
<div class="modal fade" id="myModa" role="dialog">
    <div class="modal-dialog">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sản Phẩm</h4>
        </div>
        <div class="modal-body" id="bodychitiet">
          <p>phần mô tả sp</p>
        </div>
        <div class="modal-footer">
          <p>Mua Thả Ga Nhận Quà Khủng</p>
        </div>
      </div>
    </div>
  </div>  