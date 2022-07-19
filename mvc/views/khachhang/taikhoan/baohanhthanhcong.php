<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>CapCuuMayTinh.vn</title>


    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL?>public/asbab/images/icons8_Incoming_Call_on_iPhone.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

</head>
<style>
@import url(//fonts.googleapis.com/css?family=Lato:300:400);

body {
  margin:0;
  
}

h1 {
  font-family: 'Lato', sans-serif;
  font-weight:300;
  letter-spacing: 2px;
  font-size:48px;
}
p {
  font-family: 'Lato', sans-serif;
  letter-spacing: 1px;
  font-size:14px;
  color: #333333;
}

.header {
  position:relative;
  text-align:center;
  background: linear-gradient(60deg, rgba(199,21,133,1) 0%, rgba(255,222,173,1) 100%);
  color:white;
}
.logo {
  width:50px;
  fill:white;
  padding-right:15px;
  display:inline-block;
  vertical-align: middle;
}

.inner-header {
  height:65vh;
  width:100%;
  margin: 0;
  padding-top: 20%;
}

.flex { /*Flexbox for containers*/
  /* display: flex; */
  font-family: sans-serif;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.waves {
  position:relative;
  width: 100%;
  height:15vh;
  margin-bottom:-7px; /*Fix for safari gap*/
  min-height:100px;
  max-height:150px;
}

.content {
  position:relative;
  height:20vh;
  text-align:center;
  background-color: white;
}

/* Animation */

.parallax > use {
  animation: move-forever 25s cubic-bezier(.55,.5,.45,.5)     infinite;
}
.parallax > use:nth-child(1) {
  animation-delay: -2s;
  animation-duration: 7s;
}
.parallax > use:nth-child(2) {
  animation-delay: -3s;
  animation-duration: 10s;
}
.parallax > use:nth-child(3) {
  animation-delay: -4s;
  animation-duration: 13s;
}
.parallax > use:nth-child(4) {
  animation-delay: -5s;
  animation-duration: 20s;
}
@keyframes move-forever {
  0% {
   transform: translate3d(-90px,0,0);
  }
  100% { 
    transform: translate3d(85px,0,0);
  }
}
/*Shrinking for mobile*/
@media (max-width: 768px) {
  .waves {
    height:40px;
    min-height:40px;
  }
  .content {
    height:30vh;
  }
  h1 {
    font-size:24px;
  }
}

* {
  box-sizing: border-box;
  margin: 0; padding: 0;
}

:active, :hover, :focus {
  outline: 0!important;
  outline-offset: 0;
}
::before,
::after {
  position: absolute;
  content: "";
}

.btn-holder {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  max-width: 1000px;
  margin: 10px auto 35px;
}
.btn {
  position: relative;
  display: inline-block;
  width: auto; height: auto;
  background-color: transparent;
  border: none;
  cursor: pointer;
  margin: 0px 25px 15px;
  min-width: 150px;
}
  .btn span {         
    position: relative;
    display: inline-block;
    font-size: 14px;
    font-weight: bold;
    letter-spacing: 2px;
    text-transform: uppercase;
    top: 0; left: 0;
    width: 100%;
    padding: 15px 20px;
    transition: 0.3s;
  }


/*--- btn-2 ---*/
.btn-2::before {
  background-color: rgb(28, 31, 30);
  transition: 0.3s ease-out;
}
.btn-2 span {
  color: rgb(28, 31, 30);
  border: 1px solid rgb(28, 31, 30);
  transition: 0.2s;
}  
.btn-2 span:hover {
  color: rgb(255,255,255);
  transition: 0.2s 0.1s;
}

/* 6. hover-slide-down */
.btn.hover-slide-down::before {
  top: 0; left: 0; right: 0; 
  height: 0%; width: 100%;
}
.btn.hover-slide-down:hover::before {
  height: 100%;
}

/* 7. hover-slide-up */
.btn.hover-slide-up::before {
  bottom: 0; left: 0; right: 0; 
  height: 0%; width: 100%;
}
.btn.hover-slide-up:hover::before {
  height: 100%;
}

/* 8. hover-slide-left */
.btn.hover-slide-left::before {
  top: 0; bottom: 0; right: 0; 
  height: 100%; width: 0%;
}
.btn.hover-slide-left:hover::before {
  width: 100%;
}

/* 9. hover-slide-right */
.btn.hover-slide-right::before {
  top: 0; bottom: 0; left: 0; 
  height: 100%; width: 0%;
}
.btn.hover-slide-right:hover::before {
  width: 100%;
}

/* 10. hover-opacity */
.btn.hover-opacity::before {
  top:0; bottom: 0; right: 0;
  height: 100%; width: 100%;
  opacity: 0;
}
.btn.hover-opacity:hover::before {
  opacity: 1;
}

/*--- btn-3 ---*/
.btn-3 {
  padding: 5px;
}
.btn-3 span {
  color: rgb(255, 255, 255);
  background-color: rgb(54, 56, 55);
}
.btn-3::before,
.btn-3::after {
  background: transparent;
  z-index: 2;
}

/* 11. hover-border-1 */
.btn.hover-border-1::before,
.btn.hover-border-1::after {
  width: 10%; height: 25%;
  transition: 0.35s;
}
.btn.hover-border-1::before {
  top: 0; left: 0;
  border-left: 1px solid rgb(28, 31, 30);
  border-top: 1px solid rgb(28, 31, 30);
}
.btn.hover-border-1::after {
  bottom: 0; right: 0;
  border-right: 1px solid rgb(28, 31, 30);
  border-bottom: 1px solid rgb(28, 31, 30);
}
.btn.hover-border-1:hover::before,
.btn.hover-border-1:hover::after {
  width: 99%;
  height: 98%;
}

/* 12. hover-border-2 */
.btn.hover-border-2::before,
.btn.hover-border-2::after {
  width: 10%; height: 25%;
  transition: 0.35s;
}
.btn.hover-border-2::before {
  bottom: 0; left: 0;
  border-left: 1px solid rgb(28, 31, 30);
  border-bottom: 1px solid rgb(28, 31, 30);
}
.btn.hover-border-2::after {
  top: 0; right: 0;
  border-right: 1px solid rgb(28, 31, 30);
  border-top: 1px solid rgb(28, 31, 30);
}
.btn.hover-border-2:hover::before,
.btn.hover-border-2:hover::after {
  width: 99%;
  height: 99%;
}

/* 13. hover-border-3 */
.btn.hover-border-3::before,
.btn.hover-border-3::after {
  width: 0%; height: 0%;
  opacity: 0;
  transition: width 0.2s 0.15s linear, height 0.15s linear, opacity 0s 0.35s;
}
.btn.hover-border-3::before {
  top: 0; right: 0;
  border-top: 1px solid rgb(28, 31, 30);
  border-left: 1px solid rgb(28, 31, 30);
}
.btn.hover-border-3::after {
  bottom: 0; left: 0;
  border-bottom: 1px solid rgb(28, 31, 30);
  border-right: 1px solid rgb(28, 31, 30);
}
.btn.hover-border-3:hover::before,
.btn.hover-border-3:hover::after {
  width: 100%; height: 99%;
  opacity: 1;
  transition: width 0.2s linear, height 0.15s 0.2s linear, opacity 0s;   
}

/* 14. hover-border-4 */
.btn.hover-border-4::before,
.btn.hover-border-4::after {
  width: 0%; height: 0%;
  opacity: 0;
  transition: width 0.2s linear, height 0.15s 0.2s ease-out, opacity 0s 0.35s;
}
.btn.hover-border-4::before {
  bottom: 0; left: -1px;
  border-top: 1px solid rgb(28, 31, 30);
  border-left: 1px solid rgb(28, 31, 30);
}
.btn.hover-border-4::after {
  top: 0; right: 0;
  border-bottom: 1px solid rgb(28, 31, 30);
  border-right: 1px solid rgb(28, 31, 30);
}
.btn.hover-border-4:hover::before,
.btn.hover-border-4:hover::after {
  width: 100%; height: 99%;
  opacity: 1;
  transition: width 0.2s 0.15s ease-out, height 0.15s ease-in, opacity 0s;   
}

/* 15. hover-border-5 */
.btn.hover-border-5::before,
.btn.hover-border-5::after {
  width: 0%; height: 0%;
  opacity: 0;
}
.btn.hover-border-5::before {
  top: 0; right: 0;
  border-top: 1px solid rgb(28, 31, 30);
  border-left: 1px solid rgb(28, 31, 30);
  transition: width 0.2s 0.5s ease-out, height 0.15s 0.35s linear, opacity 0s 0.7s;
}
.btn.hover-border-5::after {
  bottom: 0; left: 0px;
  border-bottom: 1px solid rgb(28, 31, 30);
  border-right: 1px solid rgb(28, 31, 30);
  transition: width 0.2s 0.15s linear, height 0.15s ease-in, opacity 0s 0.35s;
}
.btn.hover-border-5:hover::before,
.btn.hover-border-5:hover::after {
  width: 100%; height: 96%;
  opacity: 1;
}
.btn.hover-border-5:hover::before {
  transition: width 0.2s ease-in, height 0.15s 0.2s linear, opacity 0s;   /* 1,2 */
}
.btn.hover-border-5:hover::after {
  transition: width 0.2s 0.35s linear, height 0.15s 0.5s ease-out, opacity 0s 0.3s; 
} 

/*--- btn-4 ---*/
.btn-4 span {
  color: rgb(28, 31, 30);
  background-color: rgb(245,245,245);
}
.btn-4 span:hover {
  color: rgb(54, 56, 55);
}
.btn-4::before,
.btn-4::after {
  width: 15%; height: 2px;
  background-color: rgb(54, 56, 55);
  z-index: 2;
}

/* 16. hover-border-6 */
.btn.hover-border-6::before,
.btn.hover-border-6::after {
  top: 0;
  transition: width 0.2s 0.35s ease-out;
}
.btn.hover-border-6::before {
  right: 50%;
}
.btn.hover-border-6::after {
  left: 50%;
}
.btn.hover-border-6:hover::before,
.btn.hover-border-6:hover::after {
  width: 50%;
  transition: width 0.2s ease-in;   
}

.btn.hover-border-6 span::before,
.btn.hover-border-6 span::after {
  width: 0%; height: 0%;
  background: transparent;
  opacity: 0;
  z-index: 2;
  transition: width 0.2s ease-in, height 0.15s 0.2s linear, opacity 0s 0.35s;
}
.btn.hover-border-6 span::before {
  top: 0; left: 0;
  border-left: 2px solid rgb(54, 56, 55);
  border-bottom: 2px solid rgb(54, 56, 55);
}
.btn.hover-border-6 span::after {
  top: 0; right: 0;
  border-right: 2px solid rgb(54, 56, 55);
  border-bottom: 2px solid rgb(54, 56, 55);
}
.btn.hover-border-6 span:hover::before,
.btn.hover-border-6 span:hover::after {
  width: 50%; height: 96%;
  opacity: 1;
  transition: height 0.2s 0.2s ease-in, width 0.2s 0.4s linear, opacity 0s 0.2s;   
}

/* 17. hover-border-7 */
.btn.hover-border-7::before,
.btn.hover-border-7::after {
  bottom: 0;
  transition: width 0.2s 0.35s ease-out;
}
.btn.hover-border-7::before {
  right: 50%;
}
.btn.hover-border-7::after {
  left: 50%;
}
.btn.hover-border-7:hover::before,
.btn.hover-border-7:hover::after {
  width: 50%;
  transition: width 0.2s ease-in;   
}

.btn.hover-border-7 span::before,
.btn.hover-border-7 span::after {
  width: 0%; height: 0%;
  background: transparent;
  opacity: 0;
  z-index: 2;
  transition: width 0.2s ease-in, height 0.15s 0.2s linear, opacity 0s 0.35s;
}
.btn.hover-border-7 span::before {
  bottom: 0; left: 0;
  border-left: 2px solid rgb(54, 56, 55);
  border-top: 2px solid rgb(54, 56, 55);
}
.btn.hover-border-7 span::after {
  bottom: 0; right: 0;
  border-right: 2px solid rgb(54, 56, 55);
  border-top: 2px solid rgb(54, 56, 55);
}
.btn.hover-border-7 span:hover::before,
.btn.hover-border-7 span:hover::after {
  width: 50%; height: 96%;
  opacity: 1;
  transition: height 0.2s 0.2s ease-in, width 0.2s 0.4s linear, opacity 0s 0.2s;   
}

/* 18. hover-border-8 */
.btn.hover-border-8::before,
.btn.hover-border-8::after {
  bottom: 0;
  width: 15%;
  transition: width 0.2s 0.35s ease-out;
}
.btn.hover-border-8::before {
  right: 50%;
}
.btn.hover-border-8::after {
  left: 50%;
}
.btn.hover-border-8:hover::before {
  width: 50%;
  transition: width 0.2s ease-in;   
}
.btn.hover-border-8:hover::after {
  width: 50%;
  transition: width 0.1s ease-in;   
}

.btn.hover-border-8 span::before,
.btn.hover-border-8 span::after {
  width: 0%; height: 0%;
  bottom: 0;
  background: transparent;
  opacity: 0;
  z-index: 2;
}
.btn.hover-border-8 span::before {
  left: 0%;
  border-left: 2px solid rgb(54, 56, 55);
  transition: height 0.25s ease-in, opacity 0s 0.35s;   
}
.btn.hover-border-8 span:hover::before {
  height: 96%;
  opacity: 1;
  transition: height 0.25s 0.2s ease-out, opacity 0s 0.2s;   
}
.btn.hover-border-8 span::after {
  right: 0%;
  border-right: 2px solid rgb(54, 56, 55);
  border-top: 2px solid rgb(54, 56, 55);
  transition: width 0.2s ease-in, height 0.15s 0.2s linear, opacity 0s 0.35s;   
}
.btn.hover-border-8 span:hover::after {
  width: 99%; height: 96%;
  opacity: 1;
  transition: height 0.15s 0.1s linear, width 0.2s 0.25s linear, opacity 0s 0.1s;   
}

/* 19. hover-border-9 */
.btn.hover-border-9::before,
.btn.hover-border-9::after {
  bottom: 0;
  width: 15%;
  transition: width 0.2s 0.35s ease-out;
}
.btn.hover-border-9::before {
  right: 50%;
}
.btn.hover-border-9::after {
  left: 50%;
}
.btn.hover-border-9:hover::before {
  width: 50%;
  transition: width 0.1s ease-in;   
}
.btn.hover-border-9:hover::after {
  width: 50%;
  transition: width 0.2s ease-in;   
}

.btn.hover-border-9 span::before,
.btn.hover-border-9 span::after {
  width: 0%; height: 0%;
  bottom: 0;
  background: transparent;
  opacity: 0;
  z-index: 2;
}
.btn.hover-border-9 span::after {
  right: 0%;
  border-right: 2px solid rgb(54, 56, 55);
  transition: height 0.25s ease-in, opacity 0s 0.35s;   
}
.btn.hover-border-9 span:hover::after {
  height: 96%;
  opacity: 1;
  transition: height 0.25s 0.2s ease-out, opacity 0s 0.2s;   
}
.btn.hover-border-9 span::before {
  left: 0%;
  border-left: 2px solid rgb(54, 56, 55);
  border-top: 2px solid rgb(54, 56, 55);
  transition: width 0.2s ease-in, height 0.15s 0.2s linear, opacity 0s 0.35s;   
}
.btn.hover-border-9 span:hover::before {
  width: 98.5%; height: 96%;
  opacity: 1;
  transition: height 0.15s 0.1s linear, width 0.2s 0.25s linear, opacity 0s 0.1s;   
}

/* 20. hover-border-10 */
.btn.hover-border-10::before,
.btn.hover-border-10::after {
  left: 0%;
  height: 30%;
  width: 2px;
  transition: height 0.2s 0.35s ease-out;
}
.btn.hover-border-10::before {
  top: 50%;
}
.btn.hover-border-10::after {
  bottom: 50%;
}
.btn.hover-border-10:hover::before {
  height: 50%;
  transition: height 0.2s ease-in;   
}
.btn.hover-border-10:hover::after {
  height: 50%;
  transition: height 0.1s ease-in;   
}

.btn.hover-border-10 span::before,
.btn.hover-border-10 span::after {
  width: 0%; height: 0%;
  background: transparent;
  opacity: 0;
  z-index: 2;
}
.btn.hover-border-10 span::after {
  bottom: 0; left: 0%;
  border-bottom: 2px solid rgb(54, 56, 55);
  transition: width 0.25s ease-in, opacity 0s 0.35s;   
}
.btn.hover-border-10 span:hover::after {
  width: 100%;
  opacity: 1;
  transition: width 0.25s 0.2s ease-out, opacity 0s 0.2s;   
}
.btn.hover-border-10 span::before {
  top: 0%; left: 0%;
  border-top: 2px solid rgb(54, 56, 55);
  border-right: 2px solid rgb(54, 56, 55);
  transition: height 0.15s ease-in, width 0.2s 0.15s linear, opacity 0s 0.35s;   
}
.btn.hover-border-10 span:hover::before {
  width: 98.5%; height: 96%;
  opacity: 1;
  transition: width 0.2s 0.1s linear, height 0.15s 0.3s ease-out, opacity 0s 0.1s;   
}

/*--- btn-5 ---*/
.btn-5 span {
  color: rgb(28, 31, 30);
  border: 2px solid rgb(249, 211, 27);
  transition: 0.2s;
}
.btn-5 span:hover {
  background-color: rgb(245,245,245);
}

/* 21. hover-border-11 */
.btn.hover-border-11::before,
.btn.hover-border-11::after {
  width: 100%; height: 2px;
  background-color: rgb(54, 56, 55);
  z-index: 2;
  transition: 0.35s; 
}
.btn.hover-border-11::before {
  top: 0; right: 0;
}
.btn.hover-border-11::after {
  bottom: 0; left: 0;
}
.btn.hover-border-11:hover::before,
.btn.hover-border-11:hover::after {
  width: 0%;
  transition: 0.2s 0.2s ease-out; 
}

.btn.hover-border-11 span::before,
.btn.hover-border-11 span::after {
  width: 2px; height: 100%;
  background-color: rgb(54, 56, 55);
  z-index: 2;
  transition: 0.25s; 
}
.btn.hover-border-11 span::before {
  bottom: 0; right: -2px;
}
.btn.hover-border-11 span::after {
  top: 0; left: -2px;
}
.btn.hover-border-11 span:hover::before,
.btn.hover-border-11 span:hover::after {
  height: 0%;
}
</style>

<body>
    
<!--Hey! This is the original version
of Simple CSS Waves-->

<div class="header" >


<!--Content before waves-->
<div class="inner-header flex">
<!--Just the logo.. Don't mind this-->
<h1 style="font-family: 'Muli', sans-serif;">Gửi Yêu Cầu Bảo Hành Thành Công</h1> <br>
Cám ơn quý khách đã tin dùng dịch vụ lại CapCuuDienThoai.vn<br>
Yêu cầu bảo hành của quý khách sẽ được xác nhận sớm, bộ phận hỗ trợ sẽ sớm liên hệ cho quý khách.
</div>
<div class="btn-holder" >

  <button class="btn btn-2 hover-slide-left" >
  <a href="<?php echo BASE_URL?>HomeController/newHome">
    <span>Quay Về Trang Chủ</span></a>
  </button>

</div>
<!--Waves Container-->
<div>
<svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
<defs>
<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
</defs>
<g class="parallax">
<use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
<use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
<use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
<use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
</g>
</svg>
</div>
<!--Waves end-->

</div>
<!--Header ends-->
<div class="logo" style="width: 100%; padding-left:4%;  padding-top:20px; padding-bottom:30px;">
<a href="<?php echo BASE_URL?>HomeController/newHome"><img src="<?php echo BASE_URL?>public/logo/logo_ccdt_v3.png"
alt="logo images" width="400px"></a><p>CapCuuDienThoai.vn | 2021 | Khóa Luận Tốt Nghiệp</p>
</div>
<!--Content starts-->

<!--Content ends-->


</html>