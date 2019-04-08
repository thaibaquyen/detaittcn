<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="bootstrap-3.1.1-dist/bootstrap-3.1.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap-3.1.1-dist/bootstrap-3.1.1-dist/css/bootstrap-theme.min.css" />
    <script type="text/javascript" src="bootstrap-3.1.1-dist/bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <script type="text/javascript">    
        $(document).ready(function(e) {
            $("h1").click(function(e){
              alert("hello");
                });
        });
        </script>
</head>
<body>
    <h1>sfsfsf</h1>
    <h2>ko co j</h2>
    <?php
    session_start();
    $ma_sp = $_GET['ma_sp'];
    if (isset($_SESSION['cart'][$ma_sp])) {
        $soluong = $_SESSION['cart'][$ma_sp];
    } else {
        $soluong = 1;
    }
    $_SESSION['cart'][$ma_sp] = $soluong;
?>
<script>
function add_cart() {
    $(".add_cart").click(function () {
        $(this).html("<a href='thanh_toan.php'><i class=\"fas fa-bolt\"></i> Thanh toán</a>");
        $(this).addClass("click");
        const ma_sp = $(this).attr("id_add");
        $.get("php/cart/cart.php", {ma_sp: ma_sp}, function () {
            count_cart();
        });
    });
}
</script>
</body>
</html>
 // hanh lam
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food";
$str = '';
$tongtien = 0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
mysqli_set_charset($conn, 'UTF8');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//ket noi
session_start();
    if (!isset($_SESSION['cart'])) {
    echo "<h6>Giỏ hàng trống !</h6>";
    } else {
        foreach ($_SESSION['cart'] as $ma_sp => $soluong) {
            $arr[] = "'" . $ma_sp . "'";
        }
        if (isset($arr)) {
          $str = implode(",", $arr);
        }
        if ($str === '') {
          echo "<h6>Giỏ hàng trống !</h6>";
        } else {
            $sql = "SELECT ma_loai,ma_ncc,ma_sp,ten_sp,don_vi,gia,sale,rate,hinh_anh,mota FROM tblchi_tiet_sp WHERE ma_sp in ($str)";
            $result = $conn->query($sql);
//session_destroy();
         if ($result->num_rows > 0) {
// output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="row cart">
                    <div class="col-2 pr-0 img">
                        <?php echo $row["hinh_anh"] ?>
                    </div>
                    <div class="col-4 pr-0">
                        <h6 class="name-sp"><?php echo $row["ten_sp"] ?></h6>
                        <p>Đánh giá:
                            <?php
                            for ($i = 0; $i < $row["rate"]; $i++) {
                                echo "<i class=\"icon ion-md-star sao\"></i>";
                            }
                            for ($i = 0; $i < (5 - $row["rate"]); $i++) {
                                echo "<i class=\"icon ion-md-star\"></i>";
                            }
                            ?>
                        </p>
                        <p>Đã kiểm định chất lượng <i style="color: green"
                                                      class="icon ion-md-checkmark-circle"></i></p>
                    </div>
                    <div class="col-2 soluong">
                        <p>Số lượng: <input class="sluong" id_sluong=<?php echo $row["ma_sp"] ?> type="number"
                                            name="sluong"
                                            value="<?php echo $_SESSION['cart'][$row["ma_sp"]] ?>" min="1" title=""></p>
                    </div>
                    <div class="col-3 pr-0">
                        <p>Thành tiền: <br>
                            <span style="color: #c0392b">$<?php echo number_format($_SESSION['cart'][$row["ma_sp"]] * ($row["gia"] - ($row["gia"] * $row["sale"]) / 100)) ?>
                                / <?php echo $_SESSION['cart'][$row["ma_sp"]] . $row["don_vi"] ?></span>
                        </p>
                    </div>
                    <?php $tongtien += ($_SESSION['cart'][$row["ma_sp"]] * ($row["gia"] - ($row["gia"] * $row["sale"]) / 100)) ?>
                    <div class="col-md-1 del">
                        <i class="fas fa-trash-alt btn-del" id_del= <?php echo $row["ma_sp"] ?>></i>
                    </div>
                </div>
                <?php
                $_SESSION['ttien'] = $tongtien;
            }
            ?>
            <div class="modal-footer pb-0">
                <h6>Tổng Tiền: <span class="TT-color"><?php echo number_format($tongtien) ?>$</span></h6>
                <button class="btn_pay" type="button" href="thanh_toan.php"><a href="thanh_toan.php"><i
                                class="fas fa-bolt"></i>Thanh toán</a>
                </button>
            </div>
            <?php
        } else {
            echo "<h6>Giỏ hàng trống !</h6>";
        }
        $conn->close();
    }
}
?>