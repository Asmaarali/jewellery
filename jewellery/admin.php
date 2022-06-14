<?php 
session_start();
if($_SESSION["ID"]==null)
{
header("Location:index.php");
}

include 'conn.php';

$id = $_SESSION['ID'];
$query = "select * from admin where ad_id='$id'";

$result = mysqli_query($conn,$query);

$row= mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
         <!-- boxicons icon -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <!-- main -->
        <link rel="stylesheet" href="css/admin.css?v=e031e80c3d8bbbb">
           <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

       <!-- Font Awesome -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <section class="align-items-center bg-img bg-img-fixed" id="food-menu" style="background-image: url(images/jw.jpg);">
        <div class="container">
            <div class="food-menu">
                <h1>WELCOME       <span class="highlight"><?php echo $row[1] ?></span></h1>
               <a href="logout.php"> <button class="logout">Logout</button></a>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique, deserunt nulla nisi corrupti dolorem eveniet molestiae odio quibusdam blanditiis velit omnis. Officia esse commodi odit numquam molestias deserunt minus nesciunt </p>
                <div class="food-category">
                    <div class="zoom play-on-scroll"><button class="active" style="display:none;"  data-food-type="all">All food</button></div>
                    
                    <div class="zoom play-on-scroll"> <button  data-food-type="salad">Add products</button></div>

                    <div class="zoom play-on-scroll"> <button data-food-type="lorem">View products</button></div>

                    <div class="zoom play-on-scroll"><button data-food-type="ipson">Add category</button></div>

                    <div class="zoom play-on-scroll"><button data-food-type="dollar">Orders</button></div>
 
                </div>
                <div class="food-item-wrap all">

                    <div class="salad-type ">

                        <?php include 'addproducts.php';  ?>
                    </div>


                    <div class="lorem-type">
                                     <div class="container">
                                    <div class="row text-center py-5">
                                        <?php
                                            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
                                            if(mysqli_num_rows($select_products) > 0){
                                            while($row = mysqli_fetch_assoc($select_products)){
                                        ?>
                                            <div class="col-md-4 col-sm-6  my-md-0 py-3">
                                            <form action="index.php" method="post">
                                                <div class="card shadow">
                                                    <div>
                                                    <img src="upload/<?php echo $row['image']; ?>" height="100" alt="">
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                                        <h6>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </h6>
                                                        <p class="card-text">
                                                            This product is live from database
                                                        </p>
                                                        <h5>
                                                            <small><s class="text-secondary">$519</s></small>
                                                            <span class="price"><?php echo $row['price']; ?></span>
                                                        </h5>

                                                        <!-- <button type="submit" class="btn btn-warning my-3" name="add">Add to Cart   <i class="fas fa-shopping-cart"></i></button> -->
                                                        <input type='hidden' name='product_id' value='<?php echo $row['pr_id']; ?>'>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                            <?php 
                                    }
                                }
                            ?>
                                </div>
                            </div>

                    </div>


                    <div class="ipson-type">
                    <?php include 'addcategory.php' ?>
                            
                    </div>





                    <div class="dollar-type">
                            <?php include 'order.php';  ?>

                    </div>
                




                </div>
            </div>
        </div>
    </section>



<script src="js/admin.js"></script> 

</body>
</html>
