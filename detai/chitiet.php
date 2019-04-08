<script>
   $(document).ready(function() {
            $("#buyding").click(function(){
              var idsp=$(this).attr("masp");
              var ten=$(this).attr("ten");
              var gia=$(this).attr("gia");
              $.post("session.php",{masp:idsp,ten:ten,gia:gia},function(data){
                  $("#tb").html("Bạn đã thêm vào giỏ hàng thành công");
                });
            });
        });
</script>
<p id="tb"></p>
<?php
    $id=$_POST["idsp"];
    include("ketnoisql.php");
    $conn=connect();
    mysqli_set_charset($conn, 'UTF8');
    $sqll="SELECT * from khohang where masp=$id";
                    echo "<br />";
                    $mangf = $conn->query($sqll);
                    while($data = $mangf->fetch_assoc()){
                    $link="./img/".$data["ten"].".jpg";
                    $gia=$data["gia"]*(100-$data["sale"])/100;
                    $mota=$data["mota"];
                    $chuoi='<div style="text-align:center;">
                    <img src="'.$link.'" width="80%" height="300px;"><p>'.number_format($gia).'đ</p>
                    </div>
                    <div style="text-align:center;"><p>'.$mota.'</p>
                    <p><button type="button" masp="'.$id.'" gia="'.$gia.'" ten="'.$link.'" id="buyding" class="btn btn-info btn-lg btn">
                    <span class="glyphicon glyphicon-shopping-cart"></span>Buying</button></p></div>';
                    echo $chuoi;
                    }
    mysqli_close($conn);
?>