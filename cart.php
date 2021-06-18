<?php
session_start();

if(!isset($_SESSION['user'])) {
    header("Location:index.php?login=false");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="css/styles.css" rel="stylesheet">

</head>
<body>
    <?php
    include("masterpage/navbar.php");
    ?>

    <div class="container-fluid" id="cart">
        <div class="row">
            <div class="col-xs-12 text-center" id="heading">
                <h2 class="cart-title"> YOUR CART ITEMS </h2>
            </div>
        </div>
    </div>
    
    <?php
	if(isset($_SESSION['user']))
	    {   
              	if(isset($_GET['ID']))
	            {   
                        $product=$_GET['ID'];
                        $quantity=$_GET['quantity'];
                        $query="SELECT * from cart where Customer='$customer' AND Product='$product'";
                        $result=mysqli_query($con,$query);
                        $row = mysqli_fetch_assoc($result);
                        if(mysqli_num_rows($result)==0)
	                         { $query="INSERT INTO cart values('$customer','$product','$quantity')"; 
                              $result=mysqli_query($con,$query);
                            }
                        else
                           { $new=$_GET['quantity'];
                             $query="UPDATE `cart` SET Quantity=$new WHERE Customer='$customer' AND Product='$product'";
	                           $result=mysqli_query($con,$query);
                            }
                    }
              	$query="SELECT PID,Title,Author,Edition,Quantity,Price FROM cart INNER JOIN products ON cart.Product=products.PID 
              	        WHERE Customer='$customer'";
	        $result=mysqli_query($con,$query); 
                $total=0;
                if(mysqli_num_rows($result)>0)
                {    $i=1;
                     $j=0;
                     while($row = mysqli_fetch_assoc($result))
                     {       $path = "img/books/".$row['PID'].".jpg";
                             $Stotal = $row['Quantity'] * $row['Price'];
                             if($i % 2 == 1)  $offset= 1;
                             if($i % 2 == 0)  $offset= 2;                                                
                             if($j%2==0)
                                 echo '<div class="row">'; 
                                 echo '                
                                      <div class="panel col-xs-12 col-sm-4 col-sm-offset-'.$offset.' col-md-4 col-md-offset-'.$offset.' col-lg-4 col-lg-offset-'.$offset.' text-center" style="color:#D67B22;font-weight:800;">
                                          <div class="panel-heading">Order '. $i .'
                                          </div>
                                          <div class="panel-body">
			                                                <img class="image-responsive block-center" src="'.$path.'" style="height :100px;"> <br>
           							                                               Title : '.$row['Title'].'  <br> 
                                                                        Code : '.$row['PID'].'     <br>        	 
                                                      									Author : '.$row['Author'].' <br>                            	      
                                                      									Edition : '.$row['Edition'].' <br>
                                                      									Quantity : '.$row['Quantity'].' <br>
                                                      									Price : '.$row['Price'].' <br>
                                                      									Sub Total : '.$Stotal.' <br>
                                                                       <a href="cart.php?remove='.$row['PID'].'" class="btn btn-sm" 
                                                                          style="background:#D67B22;color:white;font-weight:800;">
                                                                          Remove
                                                                        </a>
                                        </div>
                                    </div>';
                               if($j % 2==1)
                                   echo '</div>';                                 
                               $total=$total + $Stotal; 
                               $i++;
                               $j++;                                                 
                     } 
                    
                    echo '<div class="container">
                              <div class="row">  
                                 <div class="panel col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 text-center" style="color:#D67B22;font-weight:800;">
                                     <div class="panel-heading">TOTAL
                                     </div>
                                      <div class="panel-body">'.$total.'
                                     </div>
                                 </div>
                               </div>
                          </div>
                         ';
                     echo '<br> <br>';
                     echo '<div class="row">
                             <div class="col-xs-8 col-xs-offset-2  col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-3 col-lg-4 col-lg-offset-3">
                                  <a href="index.php" class="btn btn-lg" style="background:#D67B22;color:white;font-weight:800;">Continue Shopping</a>
                             </div>
                             <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-1 col-lg-4 ">
                                  <a href="cart.php?place=true" class="btn btn-lg" style="background:#D67B22;color:white;font-weight:800;margin-top:5px;">Place Order</a>
                             </div>
                           </div>
                           ';
                } 
               else
                     {  
                        echo ' 
                         <div class="row">
                            <div class="col-xs-9 col-xs-offset-3 col-sm-4 col-sm-offset-5 col-md-4 col-md-offset-5">
                                 <span class="text-center" style="color:#D67B22;font-weight:bold;">&nbsp &nbsp &nbsp &nbspCart Is Empty</span>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-xs-9 col-xs-offset-3 col-sm-2 col-sm-offset-5 col-md-2 col-md-offset-5">
                                  <a href="index.php" class="btn btn-lg" style="background:#D67B22;color:white;font-weight:800;">Do Some Shopping</a>
                             </div>
                          </div>';
                     }               
	    }
	else
	    { 
	          echo "login to continue";
	    }
        echo '</div>';
	?>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>		