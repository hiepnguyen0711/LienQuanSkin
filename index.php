<?php
	require "libra/getdatabase.php";
	
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Liên Quân Mobile | Trang Phục Hoàng Kim</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="shortcut icon" href="images/app-icon-new.png">
<meta property="og:image" content="images/qcfb.png">
<script src="https://kit.fontawesome.com/e88fd90f71.js" crossorigin="anonymous"></script>
<script src="js/JQuery3.3.1.js"></script>
</head>

<body>
    <div class="container"></div>
    <header>
        <div class="container">
            <div class="logo-header">
                <div class="logo-trangphuc">
                    <a href="trangchu" ><img src="images/trangphuc.png" alt="Trang Phục Hoàng Kim" title="Trang phục Liên Quân"/></a>
                </div>
                <div class="logo"><a href="https://lienquan.garena.vn/" target="_blank"><img src="images/logo-new.png" alt="Liên Quân Mobile" title="Liên Quân Mobile"/></a></div>
                <div class="logo-downgame"><a href="https://apps.apple.com/VN/app/id1150288115?mt=8" target="_blank"><img src="images/downgame.png" alt="Tải Game" title="Tải Game"/></a></div>
                


            </div>
        </div>
    </header>
    <main>
        <section class="deal" >
            <div class="deal-content">
                <video autoplay muted loop playsinline id="myVideo">
                  <source src="images/nen.mp4" type="video/mp4">
                </video>
                <div class=" deal-flex">
                    <div class="deal-sp">
                        <div class="deal-sp-box sp1">
                            <img src="images/khung2.png" class="khung-deal" />
                            <img src="images/hinh_nen_telannas_thu_nguyen_ve_than_download.jpg" alt="Thứ Nguyên Vệ Thần" title="Thứ Nguyên Vệ Thần" class="sp-deal"/>
                            <a href="thanhtoan/<?php echo '1' ?>" target="_blank"><img src="images/btn_1.png" class="gia-deal"></a>
                            <div class="title-sp-deal"><span class="text-dep">Thứ nguyên vệ thần</span></div>
                        </div>
                        
                        <div class="deal-sp-box sp2">
                            <img src="images/khung2.png" class="khung-deal" />
                            <img src="images/67744518_2265822673718043_1133142346985111552_o.jpg" alt="Thứ Nguyên Vệ Thần" title="Thứ Nguyên Vệ Thần" class="sp-deal"/>
                            <!--<video autoplay muted loop class="sp-deal-video">
                              <source src="images/violet_sss.mp4" type="video/mp4">
                            </video>-->
                            <a href="thanhtoan/<?php echo '2' ?>" target="_blank"><img src="images/btn_1.png" class="gia-deal"></a>
                            <div class="title-sp-deal"><span class="text-dep1">Thứ nguyên vệ thần</span></div>
                        </div>
                        
                        <div class="deal-sp-box sp3">
                            <img src="images/khung2.png" class="khung-deal" />
                            <!--<img src="images/hinh_nen_telannas_thu_nguyen_ve_than_download.jpg" alt="Thứ Nguyên Vệ Thần" title="Thứ Nguyên Vệ Thần" class="sp-deal"/>-->
                           <video autoplay muted loop playsinline class="sp-deal-video">
                              <source src="images/airi3.mp4" type="video/mp4">
                            </video>
                            <a href="thanhtoan/<?php echo '3' ?>" target="_blank"><img src="images/btn_1.png" class="gia-deal"></a>
                            <div class="title-sp-deal"><span class="text-dep2">Bạch Kiemono Tuyệt Sắc</span></div>
                        </div>
                        
                    </div>
                    <div class="deal-cd"><p>Giảm giá <span class="text-hot">trang phục hot</span></p>
                    <p>Còn <span class="text-cd" id="date">05:15:12</span></p>
                    </div>
                </div>
            </div>
            
        </section>
        
        <section class="trangphuc">
            <div class="container">
                <h1>Trang phục hoàng kim</h1>
                <div class="khung-sanpham">
                    <?php 
                        require "libra/dbconnect.php";
                        $qr = "select id, trangphuc , hinh from nhanvat";
                        $result = mysqli_query($connect, $qr);
                        //$trangphuc = LayTrangPhuc();
                    while($row = mysqli_fetch_array($result))
					{
                            $id = $row['id'];
                            $trangphuc = $row['trangphuc'];
                            $hinh = $row['hinh'];
                    
                    ?>
                    <!--sp 1-->
                    <div class="khung-sanpham-box">
                        <div class="khung-hinh">
                            <img src="images/khung.png" class="khung-sp" />
                                
                        </div>
                        <div class="hinh-sanpham">
                                    <img src="images/<?php echo $hinh ?>" alt="<?php echo $trangphuc ?>" title="<?php echo $trangphuc ?>" />
                                </div>
                        <div class="tieude-sanpham"><span class="text-tieude"><?php echo $trangphuc ?></span></div>
                        <a href="thanhtoan.php?id=<?php echo $id ?>" target="_blank"><div class="btn-mua">
                            <span class="money">105</span> <img src="images/quanhuy.png"/>
                        </div></a>
                    </div>
                     <?php 
                    }
                    ?>
                    
                    <!-- ket thuc sp -->
                    
                </div>
            </div>
            
        </section>
    </main>
    <footer>
        <img src="images/line.png" class="line"/>
        <div class="container">
            <img src="images/logo-footer.png"/>
            <div class="duongke"></div>
            <p>CÔNG TY CỔ PHẦN GIẢI TRÍ VÀ THỂ THAO ĐIỆN TỬ VIỆT NAM<br>
    Giấy CNĐKKD số 0105301438, cấp lần đầu ngày 10/05/2011<br>
    Cơ quan cấp: Phòng Đăng ký kinh doanh- Sở Kế hoạch và đầu tư TP Hà Nội<br>
    Địa chỉ trụ sở chính: Tầng 29, tòa nhà Trung tâm Lotte Hà Nội, số 54, đường Liễu Giai, Phường Cống Vị, Quận Ba Đình,
    Thành phố Hà Nội, Việt Nam.<br>
    Điện thoại: 024 73053939</p>
        </div>
        
    </footer>
    <script src="js/scripts.js"></script>
</body>
</html>
