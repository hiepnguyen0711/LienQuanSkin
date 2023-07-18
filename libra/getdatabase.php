<?php 

    function LayTrangPhuc()
	{
		require "dbconnect.php";
		$qr = "select id, trangphuc , hinh from nhanvat WHERE id > 3";
		return mysqli_query($connect, $qr);
	}
    
?>