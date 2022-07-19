<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Found!</title>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>

body,
html {
  padding: 0;
  margin: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  background-image: linear-gradient(90deg, #0367a6 0%, #008997 74%);
  font-family: 'Montserrat', sans-serif;
  color: #fff
}

html {
  background: url('https://static.pexels.com/photos/818/sea-sunny-beach-holiday.jpg');
  background-size: cover;
  background-position: bottom
}

.error {
  text-align: center;
  padding: 16px;
  position: relative;
  top: 50%;
  transform: translateY(-50%);
  -webkit-transform: translateY(-50%)
}

h1 {
  margin: -10px 0 -30px;
  font-size: calc(17vw + 40px);
  opacity: .8;
  letter-spacing: -17px;
}

p {
  opacity: .8;
  font-size: 20px;
  margin: 8px 0 38px 0;
  font-weight: bold
}

input,
button,
input:focus,
button:focus {
  border: 0;
  outline: 0!important;
}

input {
  width: 300px;
  padding: 14px;
  max-width: calc(100% - 80px);
  border-radius: 6px 0 0 6px;
  font-weight: 400;
  font-family: 'Montserrat', sans-serif;
}

button {
  width: 40px;
  padding: 14.5px 16px 14.5px 12.5px;
  vertical-align: top;
  border-radius: 0 6px 6px 0;
  color: grey;
  background: silver;
  cursor: pointer;
  transition: all 0.4s
}

button:hover {
  color: white;
  background-image: linear-gradient(90deg, #0367a6 0%, #008997 74%);
}

.fa-arrow-left {
  position: fixed;
  top: 30px;
  left: 30px;
  font-size: 2em;
  color:white;
  text-decoration:none
}



    </style>

<body>
   

    <div class="content">
        <!-- <a href="./mvc/views/pages/products.php">product</a> -->
        <?php
            require_once "./mvc/views/pages/".$dataview["page"].".php";
        ?>
    </div>
    <!--  Quay lại -->
    <a href="<?php echo BASE_URL?>HomeController/newHome" class="fa fa-arrow-left"> <ion-icon name="search-outline"></ion-icon> </a>

<div class="error">
  <h1>404</h1>
  <p>Xin lỗi vì sự bất tiện này, chúng tôi sẽ cố gắng khắc phục trong tương lai.</p>
  <!-- <input placeholder="Try searching for what you were looking for..."></input><button onclick="window.location='http://geeks.thefastmode.com/search?ordering=popular&searchphrase=any&searchword=' + this.previousSibling.value"><i class="fa fa-search"></i></button> -->
</div>

</body>

</html>