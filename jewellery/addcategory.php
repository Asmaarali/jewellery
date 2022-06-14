<?php

@include 'conn.php';

if(isset($_POST['add_category'])){
   $c_name = $_POST['c_name'];


   $insert_query = mysqli_query($conn, "INSERT INTO `category`(cat_name) VALUES('$c_name')") or die('query failed');

   if($insert_query){
      $message[] = 'category add succesfully';
   }else{
      $message[] = 'could not add the category';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `category` WHERE cat_id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:admin.php');
      $message[] = 'product could not be deleted';
   };
};

if(isset($_POST['update_product'])){
   $update_c_name = $_POST['update_c_name'];
    $update_c_id=$_POST['update_c_id'];
   $update_query = mysqli_query($conn, "UPDATE `category` SET cat_name = '$update_c_name' WHERE cat_id = '$update_c_id'");

   if($update_query){
      $message[] = 'category updated succesfully';
      header('location:admin.php');
   }else{
      $message[] = 'category could not be updated';
      header('location:admin.php');
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title></title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/addproducts.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <!-- <h3>add a new product</h3> -->
   <input type="text" name="c_name" placeholder="Add category by name" class="box" required>
   <!-- <input type="number" name="p_price" min="0" placeholder="enter the product price" class="box" required> -->
   <input type="submit" value="add the category" name="add_category" class="btn">

</form>

</section>

<section class="display-product-table" style="margin-left:140px;">

   <table>

      <thead>
         <th>Category ID</th>
         <th>Category Name</th>
         <th>Action</th>

      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `category`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><?php echo $row['cat_id']; ?></td>
            <td><?php echo $row['cat_name']; ?>/-</td>
            <td>
               <a href="addcategory.php?delete=<?php echo $row['cat_id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="addcategory.php?edit=<?php echo $row['cat_id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no category added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `category` WHERE cat_id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
//    ?>

   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_c_id" value="<?php echo $fetch_edit['cat_id']; ?>">
      <input type="text" class="box" required name="update_c_name" value="<?php echo $fetch_edit['cat_name']; ?>">

      <input type="submit" value="update the prodcut" name="update_product" class="btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>