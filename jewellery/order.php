<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table tr,.table td{
    background-color: #fff;
    border: 2px solid #BA2350;
    font-weight: 500;
    text-align: center;
}
 thead tr th{
    background-color: #7fc1d1;
    border: 3px solid black;
    font-weight: 700;
}
*{
    margin:0px;
    padding:0px;
}
    </style>
</head>
<body>
<table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Cell</th>
                                <th>Email</th>
                                <th>Dateofbirth</th>
                                <th>MEthod</th>
                                <th>Address</th>
                                <th>Category</th>
                                <th>Remarks</th>
                                <th>Products</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody id="myTable">

                            <?php
                            include 'conn.php';

                            $query='select * from `order`';
                            $result=mysqli_query($conn,$query);

                            while($row=mysqli_fetch_array($result))
                            {
                                echo '        
                            <tr>
                                <td>' .$row[0]. '</td>
                                <td>' .$row[1]. '</td>
                                <td>' .$row[2]. '</td>
                                <td>' .$row[3]. '</td>
                                <td>' .$row[4]. '</td>
                                <td>' .$row[5]. '</td>
                                <td>' .$row[6]. '</td>
                                <td>' .$row[7]. '</td>
                                <td>' .$row[8]. '</td>
                                <td>' .$row[9]. '</td>
                                <td>' .$row[10]. '</td>
                            </tr>';
                            }

                            ?>

                            </tbody>
                        </table>
</body>
</html>