<?php

@include 'conn.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $dateofbirth = $_POST['dateofbirth'];
   $method = $_POST['method'];
   $address = $_POST['address'];
   $category = $_POST['category'];
   $remarks = $_POST['remarks'];
   // $total=$_POST['total'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($row = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $row['name'] .' ('. $row['quantity'] .') ';
         $product_price = $row['price'] * $row['quantity'];
         $total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   
   // mysqli_query($conn, "INSERT INTO `order` VALUES('',$name,$number,$email,$dateofbirth,$method,$address,$category,$remarks)");
   $insert_query = mysqli_query($conn, "INSERT INTO `order`(name, cell, email, dateofbirth, method, address, cat_name, remarks, products, Total) VALUES('$name','$number','$email','$dateofbirth','$method','$address','$category','$remarks','$total_product','$total')") or die('query failed');
   if($insert_query){
      echo '<script> alert("product ordered successfully") </script>';
      // <p>product added succesfully</p>
   }
   else{
      echo '<script> alert("product not ordered successfully") </script>';
      
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/checkout.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
            $grand_total = $total += $total_price;
            // $product_name=$fetch_cart['name'];
   //       $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
   // $total_product = implode(', ',$product_name);
         
            $product_quantity=$fetch_cart['quantity'];

         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>Cell no</span>
            <input type="text" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>Email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>Date of birth</span>
            <input type="text" placeholder="enter your name" name="dateofbirth" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <!-- <div class="inputBox">
            <span>Address</span>
            <input type="text" placeholder="e.g. flat no." name="flat" required>
         </div> -->
         <div class="inputBox">
            <span>Address</span>
            <input type="text" placeholder="e.g. street name" name="address" required>
         </div>
         <!-- <div class="inputBox">
            <span>Category</span>
            <input type="text" placeholder="Category" name="category" required>
         </div> -->
         <div class="inputBox">
            <span>Category</span>
            <select name="category">
            <?php
               include 'conn.php';
               $select_category = mysqli_query($conn, "SELECT * FROM `category`");
               if(mysqli_num_rows($select_category) > 0){
                  while($row = mysqli_fetch_assoc($select_category)){
            ?>
               <option value="<?php echo $row['cat_name'];  ?>" selected><?php echo $row['cat_name'];  ?></option>

               <?php
                  };    
                  }else{
                     echo '<option value="nocategory">nocategory</option>';
                  };
               ?>
            </select>
         </div>
         <div class="inputBox">
            <span>Remarks</span>
            <input type="text" placeholder="review" name="remarks" required>
         </div>
<!-- --------------------------------- -->
         <!-- <div class="inputBox">
            <span>price</span>
            <input type="hidden" placeholder="review" name="total" value="$<?= $grand_total; ?>" required>
         </div> -->

      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>