<!DOCTYPE html> 
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="stylesheet" type="text/css" href="<?=$this->config->base_url()?>css/lib/bootstrap.css">-->
        <style>
            body{
                margin: 0px;
                padding: 0px;
                background: #f0f3f5;
            }
            .nav{
                height: 45px;
                font-size: 16px;
                background-color: #329419;
                position: relative;
            }
            .nav .nav_content{
                color: white;
                width: 280px;
                margin: 0px auto;
                line-height: 45px;
                height: 45px;
                overflow: hidden;
                text-align: center;
                font-size: 16px;
            }
            .nav .icon-left{
                width: 60px;
                position: absolute;
                left:10px;
                height: 42px;
                line-height: 42px;
            }
            .nav img {
                height: 30px;
            }
            .img-container{
                margin: 20px auto;
            }
            .img-container img{
                width: 100%;
            }
            .text-muted{
                font-size: 13px;
            }
            .container{
                width: 90%;
                margin: 0 auto;
            }
            h5{
                font-size: 15px;
            }
            /*bootstrap 提取*/
			img {
			    vertical-align: middle;
			}
            .nav .icon-left {
			    width: 60px;
			    position: absolute;
			    left: 10px;
			    height: 42px;
			    line-height: 42px;
			}
			@media screen and (min-width: 100px) and (max-width: 350px) {
	            .nav{
	                height: 45px;
	                font-size: 16px;
	                background-color: #329419;
	                position: relative;
	            }
	            .nav .nav_content{
	                color: white;
	                width: 220px;
	                margin: 0px auto;
	                line-height: 45px;
	                height: 45px;
	                font-size: 12px;
	                text-overflow: clip;
	                overflow: hidden;
	                text-align: center;
	            }
			}
            .text-muted {
			    font-size: 13px;
			}
			.text-muted {
			    color: #777;
			}
			.text-justify {
			    text-align: justify;
			}
			* {
			    box-sizing: border-box;
			}
			 /*bootstrap 提取*/
        </style>
    </head>
    <body>
        <div class="nav">
            <div class="icon-left" onclick="rePage()"><img src="<?=$this->config->base_url()?>images/guidance/back_left.png"/></div>
            <div class="nav_content text-center">How to earn Points ?</div>
        </div>
        <div class="container">
            <h5>Complete your personal information to earn Points.</h5>
            <div class="text-muted text-justify">1.Register to become the member of Enjoy WiFi——100 Points.</div>
            <div class="img-container">
                <img src="<?=$this->config->base_url()?>images/guidance/earn_register.png" />
            </div>

            <div class="text-muted text-justify">2.Upload your personal photo——100 Points.</div>
            <div class="img-container">
                <img src="<?=$this->config->base_url()?>images/guidance/earn_edit_head.png" />
            </div>

            <div class="text-muted text-justify">3.Complete your personal profile including gender,age,name and so on——200 Points.</div>
            <div class="img-container">
                <img src="<?=$this->config->base_url()?>images/guidance/earn_edit_info.png" />
            </div>

            <h5>Share to your friends to Earn the Points</h5>
            <div class="text-muted text-justify">1.Share Enjoy WiFi with your friends via Facebook、Twitter、WhatsApp,invite them to use Enjoy WiFi with you together.50 Points for every Share Post.The Points would limit to 200 Points in every day.</div>
            <!--<div class="text-muted text-justify">2.Invite you friends to register to become  Enjoy Wifi members</div>-->
            <div class="img-container">
                <img src="<?=$this->config->base_url()?>images/guidance/earn_invite.png" />
            </div>

            <h5>Share WiFi hotspots to earn Points.</h5><!--
            <div class="text-muted text-justify">1.You can click the Share button when entering the password to access the WiFi hotspot.And the password would Auto Share to Enjoy WiFi when the WiFi connected.At the same time,you would earn 100 Points.</div>
            <div class="text-muted text-justify">2.When your cell phone Auto Connected to a never shared WiFi hotspot,you can share it by clicking the share button.Also,you would earn 100 Points.</div>
            <div class="text-muted text-justify">3.When other users connect to your shared WiFi hotspot,you would earn 50 points for every new connector. The Points would limited to 1000 Points for every WiFi hotspot in every day.</div>

            <div class="img-container">
                <img src="images/earn_share_wifi1.png" />
            </div>
            <div class="img-container">
                <img src="images/earn_share_wifi2.png" />
            </div>-->
            
            <div class="text-muted text-justify">1. When you connect to a WiFi like that,just click Share WiFi button to share the WiFi.</div>
            <div class="img-container">
                <img src="<?=$this->config->base_url()?>images/guidance/1-n.jpg" />
            </div>
            
            <div class="text-muted text-justify">You will get 100 Points after successfully sharing.Click My Shared WiFi for shared WiFi history.</div>
            <div class="img-container">
                <img src="<?=$this->config->base_url()?>images/guidance/2-n.jpg" />
            </div>

            <div class="text-muted text-justify">2. Or scroll down to find Password Required WiFi,click it.</div>
            <div class="img-container">
                <img src="<?=$this->config->base_url()?>images/guidance/3-n.jpg" />
            </div>
            
            
            <div class="text-muted text-justify">Enter the password and connect to it.You will also get 100 Points after successfully sharing.</div>
            <div class="img-container">
                <img src="<?=$this->config->base_url()?>images/guidance/4-n.jpg" />
            </div>
            
            <div class="text-muted text-justify">3. When other users connect to your shared WiFi,you will earn 50 points for every new connector. The Points would limited to 1000 Points for every WiFi hotspot in every day.</div>
            <h5>Bind with other account to earn the Points</h5>
            <div class="text-muted text-justify">1.User who signed up with cellphone number binds your Facebook successfully will earn 50 Points.</div>
            <div class="text-muted text-justify">2.User who signed in with Facebook binds your cellphone number successfully will earn 50 Points.</div>
            <p></p>
            <div class="text-muted text-justify">Moreover,we may organize activities from time to time;all users can participate and stand a chance to win Points and attractive gifts.</div>           
        </div>
    </body>
    <script>
            function rePage(){
                window.location.href="backapp://back";
            }
    </script>
</html>