<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu List</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="css/hotel.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		
		
		
		
	</head>
	
<body>

<?php

		include('config.php');
		session_start();
		$hid=$_GET['hid'];
	
		
		$stmt=$dbcon->prepare("SELECT item_name,price,image,food_detail,type FROM menu_detail where hid='$hid' and action=1");
		$stmt->execute();
		$_SESSION['hid']=$hid;
		
		$csid=$_SESSION['csid'];
		echo $csid;
	  
?>
	<body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                   <div class="row">
					<h1><b>Menu List</b></h1>
                       <table class='table '>	
						<tbody>
						<tr>
						<td align='center'>
						<h1></h1>
						</td>
						<td align='right'>
						 <a href="logout1.php" class="btn btn-info btn-lg">
						<span class="glyphicon glyphicon-log-out"></span> Log out
						</a>
						</td>
						</tr>	
						</tbody>	
						</table>	
                           
                       
                    </div>
                    
                       
                        	
                        	<div class="form-box">
	                        	
								<div class="col-xs-15">
								<form action="cart.php" method="post" autocomplete="off">
								<section class="vendor-list js-infscroll-container">
								<section class="js-infscroll-load-more-here">
								
	<?php
	
	if($stmt->rowCount() > 0){
		$i=1;
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
	
			?>
			
				<div  class="well">
					 <div class="row">
					<input type='hidden' name="<?php echo 'i'.$i; ?>" id="<?php echo 'i'.$i; ?>" value="<?php echo $i; ?>"/>
					<article class="vendor list js-vendor-list-vendor-panel">
			
				<div class="vendor__image">
					
						<?php echo"<img src=$image>";?>
						<input type='hidden' name="<?php echo 'image'.$i; ?>" id="<?php echo 'image'.$i; ?>" value="<?php echo"<img src='$image'>"; ?>"/>
						</div>
				
				<div class="vendor__details" style="text-align:left;font-size:3vmin;width:100%;">
					<div class="vendor__title" style="font-size:12px;" >
					
						<?php echo"<b>". $item_name."</b>";?>
						<span class="vendor__info" >
					<span class="delivery-time-label" data-tooltip-element=".delivery-time-tooltip-s5sk">
					<input type='button' style="padding-left: 8px;padding-right: 8px;padding-bottom: 5px;padding-top: 3px;" class="w3-button w3-small w3-circle w3-small w3-ripple w3-teal" name='subtract' onclick="count(1,this)" value='-'/>
						<input type='text' style="width: 16px;height: 26px;padding-right: 0px;padding-left: 0px;" name="<?php echo 'qty'.$i; ?>" id="<?php echo 'qty'.$i; ?>"  value="0"  readonly=true/>
						<input type='button'  style="padding-left: 8px;padding-right: 8px;padding-bottom: 5px;padding-top: 3px;" class="w3-button w3-small w3-circle w3-small w3-ripple w3-teal" name='add' onclick="count(2,this)" value='+'/>
						<input type='hidden' name='<?php echo 'total'.$i; ?>' id='<?php echo 'total'.$i; ?>' readonly=true value="0" />
						<input type='hidden' name="<?php echo 'price'.$i; ?>" id="<?php echo 'price'.$i; ?>" value="<?php echo $price; ?>"/>
					
					 
					
					</span>
					
					</span>
					</div>
						<div class="menu-item__dish-characteristics"  > 
						<?php
						if($type=="nonveg")
						{
						echo"<span class='menu-item__dish-characteristic menu-item__dish-characteristic__meat has-image'  style='height:25px;width:25px'>"." ●"
                                
						."</span>";
						}
						else
						{
						echo"<span class='menu-item__dish-characteristic menu-item__dish-characteristic__vegetarian has-image'  style='height:25px;width:25px'>"." ●".
                                
						"</span>";
						}
						?>
						</div>
						
						
						
						<input type='hidden' name="<?php echo 'name'.$i; ?>" id="<?php echo 'name'.$i; ?>" value="<?php echo $item_name; ?>"/>
						
						
				
						
						<?php echo " ₹". $price; ?>
						
						
						
						
					
					<div class="vendor__details__footer" >
						
				
					<?php echo $food_detail;?> 
					
					
				</div>
					</div>
					
				</article>
			</div>
			
			</div>
			<?php
			$i++;	 
		}
		 $countt=$i-1;
		    
	}
		
		?>
			</div>
		
			
		</section>
		
	
	</section>
						
						</div>
						
		               
						
		                </div>
						 
						</div>
						
						</div>
						
						
         
	<input type='hidden' name="counter" id="counter" value="<?php echo $i; ?>"/>
			
					
					<br>
					<div class="footer navbar-fixed-bottom" style="background-color :#900C3F  ">
					<div  class="well well-sm" style="background-color :  #DAF7A6 ">
					Total Cost:
					<input type='text' name='gtotal' id='gtotal'  readonly=true>
					
					<!--<div style="background-color:transparent;">
					<div>
					<a href="cart.php"><input type='text' name='gtotal' id='gtotal'  readonly=true  style="float:right; text-align:right;width:30%; height:44px; color:black" /></a>
					</div>
					<br>
					<br>
					
					<div>
					<a href="cart.php"><input type='text' placeholder="Press Here To Place Your Order "  readonly=true style="float:right; width:80px; font-size:15px; width:30%;"></a>
					</div>
					</div>-->
				<br>
	<br>
			
			<input type="submit" class="btn" id="order" name="order" value="Place My Order">
			</div>
			</div>
	</form>
	
	
	</div>
			</div>
	
			<script>
			
			function count(operation,current)
			{
				var p=current.parentElement;
				//var c=p.parentElement;
				//var abc=c.firstChild;
				//var def=abc.nextSibling;
				//var ghi=def.nextSibling;	
				//var priceNode=ghi.nextSibling;//priceNode
				
				var childs=p.firstChild;
				var x=childs.nextSibling;
				var z=x.nextSibling;
				var y=z.nextSibling;//qtyNode
				var r=y.nextSibling;
				var s=r.nextSibling;
				var t=s.nextSibling;
				var u=t.nextSibling;//totalNode
				var v=u.nextSibling;
				var priceNode=v.nextSibling;
				
				
				//var honey=document.getElementById("honey");
				//var honey1=honey.nextSibling;
				//var honey2=honey1.nextSibling.value;
				//alert(honey2);
				
				
				if(operation==1 && y.value>0)
				{
				y.value=parseInt(y.value)-1;
				}
				else if(operation==2)
				{
				y.value=parseInt(y.value)+1;
				}
				
				
				u.value=priceNode.value*y.value;
				
				
				var subtotal=0;
				if(operation==1 && y.value>=0 )
				{
				var i=parseInt(<?php echo $countt;?>);
				
				for(var j=1;j<=i;j++)
				{
				 subtotal += parseInt(document.getElementById('total'+j).value);
				document.getElementById("gtotal").value=subtotal;
				}
				}
				else if(operation==2)
				{
				
				
				var i=parseInt(<?php echo $countt;?>);
				
				for(var j=1;j<=i;j++)
				{
					
				subtotal+=parseInt(document.getElementById('total'+j).value);
				document.getElementById("gtotal").value=subtotal;
				}
				
				
				}
				
			}
			
			
			</script>
			
			
			


    
    



        
        
       
</body>
</html>

