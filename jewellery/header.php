<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');
*{
   font-family: 'Poppins', sans-serif;

}
    /* .navbar{
        height:10vh;
    }
     .navbar-brand h4{
        font-size:28px;
    }
    .navbar h5{
        font-size:18px;
    } */


    #cart_count{
   text-align: center;
   padding: 0 0.9rem 0.1rem 0.9rem;
   border-radius: 3rem;
}

.shopping-cart{
   padding: 3% 0;
}

.cart-items + .cart-items{
   padding: 2% 0;
}

.price-details h6{
   padding: 3% 2%;
}
/* ----------------------------searhbar */
body{
     background-color:#eeeeee59;
 }
 
  .footer-subscribe input[type=text] {
    border: 1px solid #ff3514;
    border-radius: 55px;
    font-size: 10px;
    padding: 12px 40% 12px 20px;
    background: transparent;
    width: 100%;
    box-shadow: none !important;
}
.navbar-nav{
    /* background-color: red; */
    width:45%;
    float:right;
    display:flex;
    justify-content:space-between;
    padding-right:20px;
}

.mt-100{
    /* margin-top:200px; */
}

a, button[type="submit"], input[type=text] {
    color: #333;
    text-decoration: none;
    -webkit-transition: all 400ms ease-in-out;
    -moz-transition: all 400ms ease-in-out;
    -o-transition: all 400ms ease-in-out;
    -ms-transition: all 400ms ease-in-out;
    transition: all 400ms ease-in-out;
}

.footer-subscribe .btn-theme {
    position: absolute;
    top: 0;
    height: 100%;
    right: 0;
}

.btn-theme:hover {
    box-shadow: none;
}

.btn-theme {
    color: #FFF !important;
    /* padding: 0.5rem 1.9rem; */
    font-weight: 200;
    font-size: 1rem;
    display: inline-block;
    display: inline-flex;
    outline: none;
    border: none;
    cursor: pointer;
    overflow: hidden;
    z-index: 2;
    align-items: center;
    position: relative;
    cursor: pointer;
    -webkit-box-shadow: 0px 14px 47px 0px rgba(28, 28, 28, 0.24);
    -moz-box-shadow: 0px 14px 47px 0px rgba(28, 28, 28, 0.24);
    box-shadow: 0px 14px 47px 0px rgba(28, 28, 28, 0.24);
    -webkit-border-radius: 70px;
    -moz-border-radius: 70px;
    border-radius: 70px; 
}

.bg-orange {
    background: #ff3514;
}
</style>
</head>
<body>
    

<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h4 class="px-5">
                <i class="fas fa-shopping-basket"></i> Shopping Cart
            </h4>
        </a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            
            <div class="navbar-nav">

            <h5><a href="search.php" class="nav-item nav-link active"><i class="fas fa-search" style="">  </i>     Search</a></h5>

            <h5><a href="login.php" class="nav-item nav-link active"><i class="fas fa-lock" style="">  </i>     Login</a></h5>

                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="cart">
                        <i class="fas fa-shopping-cart"></i>   Cart
                        <?php
                        include 'conn.php';
                              $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
                              $row_count = mysqli_num_rows($select_rows);
                        if ($row_count>0){
                            echo "<span id=\"cart_count\" class=\"text-dark bg-light\">$row_count</span>";
                        }
                        else{
                            echo "<span id=\"cart_count\" class=\"text-dark bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>






<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>