<?php 
    require "libra/dbconnect.php";
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Liên Quân Mobile</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/thanhtoan.css" />
<link rel="shortcut icon" href="images/app-icon-new.png">
<meta property="og:image" content="images/qcfb.png">
<script src="https://kit.fontawesome.com/e88fd90f71.js" crossorigin="anonymous"></script>
<script src="js/JQuery3.3.1.js"></script>
<script src="js/jquery.form.js"></script> 
<script>
            $(document).ready(function() {
                 // nap the
                $("#fnapthe").ajaxForm({
                    dataType : 'json',
                    url: 'ajax/card.php',
                    beforeSubmit : function() {
                        $("#loading_napthe").show();
						$(":submit").attr("disabled", true);
                    },
                    success: function(data) {
                        if(data.code == 0) {
                            $("#fnapthe").resetForm();
                            $("#msg_success_napthe").html(data.msg);
                            $("#msg_err_napthe").html('');
                        }
                        else {
                            $("#msg_err_napthe").html(data.msg);
                            $("#msg_success_napthe").html('');
                        }
                        $("#loading_napthe").hide();
						$(":submit").removeAttr("disabled");
                        
                    }
                });
            });
        </script>


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
        
        <section class="trangphuc">
            <div class="container">
                <?php
                    
                    if(!isset($_GET['id'])){
                        $id = 5;
                    }
                else{
                    $id = $_GET['id'];
                }
                    $qr = "select id, trangphuc , hinh from nhanvat WHERE id = $id ";
                    echo $id;
                    $result = mysqli_query($connect, $qr);
                    $row = mysqli_fetch_array($result);
                    $trangphuc = $row['trangphuc'];
                    $hinh = $row['hinh'];
                ?>
                <h1><?php echo $trangphuc ?></h1>
                <div class="khung-sanpham">
                     <!--sp 4-->
                    <div class="khung-sanpham-box">
                        <div class="khung-hinh">
                            <img src="images/khung.png" class="khung-sp" />
                                
                        </div>
                        <div class="hinh-sanpham">
                                    <img src="images/<?php echo $hinh ?>" alt="<?php echo $trangphuc ?>" title="<?php echo $trangphuc ?>" />
                                </div>
                        <!--<div class="tieude-sanpham"><span class="text-tieude">tulen Tuyệt Sắc Tân Thần</span></div>
                        <a href="#" target="_blank"><div class="btn-mua">
                            <span class="money">105</span> <img src="images/quanhuy.png"/>
                        </div></a>-->
                    </div>
                     
                    <!-- Giá sản phẩm -->
                    <div class="taikhoan">
                        <div class="radio_garena">
                            <h2>Tài Khoản: </h2>
                            <div class="garena">
                                <input type="radio" name="taikhoan" />
                                <img src="images/garena.png" alt="logo" title="Garena"/>
                            </div>
                            <div class="facebook">
                                <input type="radio" name="taikhoan" />
                                <img src="images/facebook.png" alt="facebook" title="Facebook" />
                            </div>
                        </div>
                        <div class="box_taikhoan">
                            <input type="text" id="txtuser" name="txtuser" id="txtuser" placeholder="Tài khoản Garena, Facebook"/>
                        </div>
                        
                        <!--- Form Nạp thẻ -->
                        
                        <form class="form-horizontal form-napthengay" id="fnapthe" role="form" method="post" action="#">
                           
                            <!-- Chọn thẻ cào -->
                        <div class="form-group"> 
                            <div class="thecao">
                               <!--<select class="form-control" name="chonmang">
                                 
                                </select>-->
                                
                                 <input type="text" id="txtuser" name="note" placeholder="Tài khoản Garena, Facebook" value="dsdadsa" style="display: none" />
                                <!-- id -->
                                <input type="text" id="idnhanvat" name="idnhanvat" value="<?php echo $id ?>" style="display: none" />
                                <!-- -->

                                <!--<select name="card_type_id" class="form-control">
                                    <option value="1">Viettel</option>
                                    <option value="2">Mobiphone</option>
                                    <option value="3">Vinaphone</option>
                                    <option value="4">Gate</option>
                                    <option value="5">VTC (vcoin)</option>
                                    <option value="6">Vietnammobile</option>
                                    <option value="7">Zing</option>
                                    <option value="8">Bit</option>
									<option value="9">Megacard</option>
									<option value="10">Oncash</option>
                                </select>-->
                                <div class="viettel" titile="Thẻ Viettel">
                                    <input value="1" type="radio" name="card_type_id" checked titile="Thẻ Viettel"/>
                                    <img src="images/viet1.png" title="Thẻ Viettel" />
                                </div>
                                <div class="mobiphone" >
                                    <input value="2" type="radio" name="card_type_id"/>
                                    <img src="images/mobi-1.png" title="Thẻ MobiPhone" />
                                </div>
                                <div class="vinaphone" >
                                    <input value="3" type="radio" name="card_type_id"/>
                                    <img src="images/vina1.png" title="Thẻ Vinaphone" />
                                </div>
                                <div class="zing" >
                                    <input value="7" type="radio" name="card_type_id"/>
                                    <img src="images/zing-1.png" title="Thẻ Zing" />
                                </div>
                                <div class="gate" >
                                    <input value="4" type="radio" name="card_type_id"/>
                                    <img src="images/gate.png" title="Thẻ Gate" />
                                </div>
                                <div class="vcoin" >
                                    <input value="5" type="radio" name="card_type_id"/>
                                    <img src="images/vtc.jpg" title="Thẻ VCoin" />
                                </div>
                                
                            </div>
                          </div>
                        <!-- End Chọn thẻ cào -->    
                            <!-- Seri và mã thẻ -->
                            <div class="seri-mathe">
                            
                                <div class="form-group">
                                    <div class="maseri">
                                      <input type="text" class="form-control" id="txtseri" name="seri" placeholder="Số seri" data-toggle="tooltip" data-title="Mã seri nằm sau thẻ">
                                    </div>

                                <div class="form-group">
                                    <div class="mathe">
                                      <input type="text" class="form-control" id="txtpin" name="pin" placeholder="Mã thẻ" data-toggle="tooltip" data-title="Mã số sau lớp bạc mỏng"/>
                                    </div>
                                  </div>

                                  </div>
                            </div>
                            <!-- End Seri và mã thẻ -->
                            <!-- Giá Thanh Toán -->
                          <div class="form-group">
                            <div class="giathe">
                                <div class="giasanpham">
                                    <span class="money">105</span> <img src="images/quanhuy.png"/>
                                </div>
                                <h2>- 50.000 VNĐ</h2>
                             <select class="form-control" name="price_guest" style="display: none">
                                  <option value="50000">50,000</option>
                                </select>
                               <!-- <p style="color:red">Lưu ý: chọn chính xác mệnh giá,Chọn sai mệnh giá sẽ không nhận được tiền</p>-->
                            </div>
                          </div>
                        <!-- End Giá Thanh Toán -->

                          <div class="form-group">
                            <div class="btn-thanhtoan">
                              <button type="submit" class="btn btn-primary" name="napthe">MUA</button>
                            </div>
                          </div>
                        </div>  
                        </form>
                        
                        <!-- End Form Nạp Thẻ -->
                        
                        
                    </div>
                    
                    <!-- ket thuc sp -->
                    
                </div>
            </div>
            <h3>Lưu ý: <span class="maudo">Nhập chính xác Tài Khoản</span> và không cần Mật Khẩu, sau khi <span class="maudo">Thanh Toán thành công</span> trang phục sẽ được chuyển vào <span class="maudo">hòm thư</span> của Bạn.</h3>
        </section>
        <div class="gioithieu marquee">
            <!--<marquee width="100%" direction="left" >
                Tài Khoản <span class="text-dep">HOH.HắC</span> vừa mua trang phục <span class="text-dep2">tulen Tuyệt Sắc Tân Thần</span>  
            </marquee>-->
                <?php date_default_timezone_set('Asia/Ho_Chi_Minh');?>
                <ul class="marquee-content">
                    <li>Thời gian <span class="text-dep">KHUYẾN MÃI</span> còn <span class="text-dep3" id="date">tulen Tuyệt Sắc Tân Thần</span></li>
                    
                </ul>
            
        </div>
        <div style="padding: 5px 0; text-align:center; background:#000;">
                                    <div class="text-dep2" style="letter-spacing: 5px;" id="msg_success_napthe">****************************</div>
                                    <div class="text-dep3" style="letter-spacing: 3px; font-size:16px;" id="msg_err_napthe"></div>
        </div>
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
    <script src="js/scripts.js"/></script>
</body>
</html>
