<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
		<title>Hadiah menarik menanti Anda!</title>
		<link rel="stylesheet" type="text/css" href="<?=config_item('base_url')?>css/common/base.css">
		<link rel="stylesheet" type="text/css" href="<?=config_item('base_url')?>css/prize/wait.css">
	</head>
	<body>
		<div id="page_top">
			<img src="<?=config_item('base_url')?>images/prize/bg_top.jpg">
			<div id="back_left" onclick="rePage()">
				<img src="<?=config_item('base_url')?>images/prize/back_left.png">
			</div>
			<div id="center_content">
				<div id="prize_list">
					<p id="title">Berikut adalah daftar pemenang yang beruntung:</p>
					<br />
					<p><h3>Pemenang yang beruntung akan segera diumumkan. Cek pemberitahuannya pada halaman ini. Semoga beruntung!</h3></p>
				</div>
			</div>
		</div>
		 <div id="page_bottom">
		 	<img src="<?=config_item('base_url')?>images/prize/bg_bottom.jpg">
		 	<div id="bottom_content">
		 		<div id="left_text">
				 	<p>1. Apabila kamu termasuk salah satu dari daftar pemenang yang beruntung, silakan add Official Akun LINE Enjoy WiFi (ID: enjoywifi)</p>
				 	<p>2. Atau kamu juga bisa memberi tahu kami melalui comment/pesan di Official Akun Facebook <a href="https://www.facebook.com/enjoyfreewifi">(Enjoy WiFi-Free WiFi Connect)</a>.</p>
		 		</div>
		 		<div id="right_pic">
		 			<img src="<?=config_item('base_url')?>/images/prize/qr.jpg"> 
		 		</div>
		 		<div class="clearfix"></div>
		 	</div>
		 </div>
		 
        <script>
            function rePage(){
                window.location.href="backapp://back";
        }
        </script>
	</body>
</html>