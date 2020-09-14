<?php
require 'connecttomysql.php';
session_start();
 $hid=$_SESSION['hid'];
 $email=$_SESSION['email'];
if(isset($_POST['submit'] ))

{
	$target_dir = "food/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) 
	{
       
        $uploadOk = 1;
    } else
	{
       
        $uploadOk = 0;
    }
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        
	$action=$_POST['action'];
	$type=$_POST['type'];
	if($_POST['itemname'] !=''&&$_POST['price'] !=''&& $target_file !='')
{
	$status=0;
	if($action=="Active")
	{
		$status=1;
	}else{
		$status=0;
		
	}
	$food="veg";
	if($type=="veg")
	{
		$food="veg";
	}else{
		$food="nonveg";
		
	}
	
       
 
		
//Insert Query of SQL
mysqli_query($connect,"INSERT INTO menu_detail(hid,item_name,price,image,type,action,food_detail) VALUES 
('$hid','$_POST[itemname]','$_POST[price]','$target_file','$food','$status','$_POST[aboutfood]')");

}
else {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Insertion failed')
    </SCRIPT>");
}
if(mysqli_affected_rows($connect) > 0){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Inserted Succesfully')
    </SCRIPT>");
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Upload Food Menu</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
		<script type="text/javascript" src="validate1.js"></script>
		<style>
		img{
			height:20px;
			width:20px;
		}
		</style>
    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                   
					 <div class="row">
					<h1><b>Upload Food Menu</b></h1>
                       <table class='table '>	
						<tbody>
						<tr>
						<td align='center'>
						<h1></h1>
						</td>
						<td align='right'>
						 <a href="logout.php" class="btn btn-info btn-lg">
						<span class="glyphicon glyphicon-log-out"></span> Log out
						</a>
						</td>
						</tr>	
						</tbody>	
						</table>	
                           
                       
                    </div>
					
                    
                    <div class="row">
                        <div class="col-sm-12">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3><b>Enter Food Details</b></h3>
	                            		
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-cutlery"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form  action="" method="post" class="login-form" enctype="multipart/form-data">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-name">Item Name</label>
				                        	<input type="text" name="itemname" placeholder="Item Name..." class="form-name form-control" id="itemname" required="required">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-price">Price</label>
				                        	<input type="text" name="price" placeholder="Price..." class="form-price form-control" id="price" required="required">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-about-yourself">About Food</label>
				                        	<textarea name="aboutfood" placeholder="About Food..." required="required"
				                        				class="form-about-yourself form-control" id="aboutfood"></textarea>
				                        </div>
										<div class="form-group">
										<label class="sr-only" for="form-image">Image</label>
										<input type="file" name="fileToUpload" id="fileToUpload"></div>
										
											
										<div class="form-group">
				                        	<label>
											<input type="radio" name="type" value="veg" checked />
											<img src="./food/veg1.png">
											<input type="radio" name="type" value="nonveg" />
											<img src="./food/non.png">
											</label>
										</div>	
										
				                        
										<div class="form-group">
				                        	<label class="sr-only" for="form-image">Active or Inactive</label>
											<input type="radio" name="action" value="Active" checked> Active
											<input type="radio" name="action" value="Inactive"> Inactive<br>
										</div>
										
										</div>
										<br>
				                        <button type="submit" class="btn" id="submit" name="submit">Submit</button>
										
				                    </form>
			                    </div>
		                    </div>
		                
		                	
	                        
                        </div>
						 </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
       
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>