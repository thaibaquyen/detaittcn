<style>
  table,tr,th,td{
    border:1px black solid;
    text-align:center;
  }
  td,th{
    text-align:center;
    width:17%;
  }
</style>
<script type="text/javascript">
    $(document).ready(function() {
            $(".changesl").change(function(){
                var slnew=$(this).val();
                var stt=$(this).attr("stt");
                $.post("suaseesionsl.php",{stt:stt,sl:slnew},function(data){
                  
                });
               // location.reload("giohang.php");        
            });
            $(".changesize").change(function(){
                var sizenew=$(this).val();
                var stt=$(this).attr("stt");
                $.post("suaseesionsize.php",{stt:stt,size:sizenew},function(data){
                  
                });
               // location.reload();        
            });
            $(".xoa").click(function(){
                var stt=$(this).attr("stt");
                $.post("xoasp.php",{stt:stt},function(data){                  
                });
                location.reload();        
            });
          });         
</script>
<h2></h2>
<?php
session_start();
$str='<div class="container">         
  <table>
      <tr>
        <th>Sản Phẩm</th>
        <th>Giá</th>    
        <th>Số Lượng</th>
        <th>Size</th>
        <th>Thành Tiền</th>
        <th>xóa</th>
      </tr>';
      if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key => $values){
          $str .= '<tr>
          <td><img src="'.$values['ten'].'" width="60px" height="60px;"></td>
          <td>'.number_format($values['gia']).'</td>    
          <td><select stt="'.$key.'" class="changesl">';
          for($i=1;$i<10;$i++){
            if($i==$values['sl']){
            $str .= '<option value="'.$i.'" selected>'.$i.'</option>';}
            else{
              $str .= '<option value="'.$i.'">'.$i.'</option>';
            }
          }
          $str .='</select></td>
          <td><select stt="'.$key.'" class="changesize">';
          for($i=37;$i<44;$i++){
            if($i==$values['size']){
            $str .= '<option value="'.$i.'" selected>'.$i.'</option>';}
            else{
              $str .= '<option value="'.$i.'">'.$i.'</option>';  
            }
          }
        $str.='</select></td>
          <td>'.number_format($values['sl']*$values['gia']).'</td>
          <td><button type="button" stt="'.$key.'" class="xoa">xóa</button></td>
          </tr>';   
        };
        echo $str;
        echo "</table></div>";
      }
      else{
        echo "giỏ trống";
      }
?>