<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khách hàng</title>
</head>

<body>
    <h2>
        <?php 
            while ($row = mysqli_fetch_assoc($dataview["KH"])){
        ?>
           <h1> <?php  echo $row["TENKH"];?></h3>
            <?php  echo $row["DIACHI"];?>
        <?php 
            }
        ?>
    </h2>
</body>

</html>