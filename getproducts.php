<?php

	include('config.php');
$hid=$_GET['hid'];
	
		$stmt=$dbcon->prepare("SELECT item_name,price,image FROM menu_detail where hid='$hid'and action=1");
		$stmt->execute();
	
	
	  
	?>
	<div class="row">
	
	<div class="col-xs-15">
	<form action="confirm_menu.php" method="post">
	<table >
	<?php
	
	if($stmt->rowCount() > 0){
		$i=1;
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
	
			?>
			
			
			
					<input type='hidden' name="<?php echo 'i'.$i; ?>" id="<?php echo 'i'.$i; ?>" value="<?php echo $i; ?>"/>
			<tr>
				<td>
					<div style="border-radius:3px; border:#cdcdcd solid 1px; padding:10px; ;  margin-left:30px; ">
						<?php echo"<img src=$image>";?></div>
						<input type='hidden' name="<?php echo 'image'.$i; ?>" id="<?php echo 'image'.$i; ?>" value="<?php echo"<img src='food/".$image."'>"; ?>"/>
				</td>
				
				<td>
					<div style="border-radius:3px; border:#cdcdcd solid 1px; padding:20px;  ; margin-left:30px; ">
						<?php echo $item_name; ?></div>
						<input type='hidden' name="<?php echo 'name'.$i; ?>" id="<?php echo 'name'.$i; ?>" value="<?php echo $item_name; ?>"/>
				</td>
				
				<td>
					<div  style="border-radius:3px; border:#cdcdcd solid 1px; padding:10px; margin-left:30px;">
						<?php echo $price; ?></div>
						<input type='hidden' name="<?php echo 'price'.$i; ?>" id="<?php echo 'price'.$i; ?>" value="<?php echo $price; ?>"/>
				</td>
					
				<td>
					<div  style="border-radius:3px; border:#cdcdcd solid 1px; padding:10px;  margin-left:30px;">
						<input type='button' name='subtract' onclick="count(1,this)" value='-'/></div>
						
				</td>
				
				<td>
					<div style="border-radius:3px; border:#cdcdcd solid 1px; padding:10px;  margin-left:30px;">
						<input type='button' name='add' onclick="count(2,this)" value='+'/></div>
						
				</td>
				<td>
					<div style="border-radius:3px; border:#cdcdcd solid 1px; padding:10px;  margin-left:30px;">
					<input type='text' name='<?php echo 'qty'.$i; ?>' id='<?php echo 'qty'.$i; ?>' readonly=true value="0"/></div>
					
				</td>
				<td>
					<div  style="border-radius:3px; border:#cdcdcd solid 1px; padding:10px;  margin-left:30px;">
					<input type='text' name='<?php echo 'total'.$i; ?>' id='<?php echo 'total'.$i; ?>' readonly=true value="0" /></div>
					
				</td>
				
			</tr>
			
			
			
			
		
			<?php
			$i++;	 
		}
		 $countt=$i-1;
		    
	}
		
		?>
	<input type='hidden' name="counter" id="counter" value="<?php echo $i; ?>"/>
			
			<tr>
				<td>
					<div  style="border-radius:3px; border:#cdcdcd solid 1px; padding:10px;  margin-left:30px;">
					Total Cost:</div>
				</td>
				<td>
					<div  style="border-radius:3px; border:#cdcdcd solid 1px; padding:10px; margin-left:30px;">
					<input type='text' name='gtotal' id='gtotal' value="0"  /></div>
					
				</td>
			</tr>
			</table>
			<br>
			<input type="submit" class="btn" id="order" name="order" value="Place My Order">
	</form>
	<br>
	<br>
	
	</div>
			</div>
	<style>
			img{
				height:55px;
				width:60px;
			}
			
			td,th{
			height:40px;
			padding:5px;
		}
			</style>
			<script>
			
			function count(operation,current)
			{
				var p=current.parentElement.parentElement.parentElement;
				
				var childs=p.childNodes;
				
				var priceNode=childs[5].childNodes[1];
				var qtyNode=childs[11].childNodes[1].childNodes[1];
				var totalNode=childs[13].childNodes[1].childNodes[1];
				
				if(operation==1 && qtyNode.value>0)
				{
				qtyNode.value=parseInt(qtyNode.value)-1;
				}
				else if(operation==2)
				{
				qtyNode.value=parseInt(qtyNode.value)+1;
				}
				
				totalNode.value=priceNode.innerHTML*qtyNode.value;
				
				
				var subtotal=0;
				if(operation==1 && qtyNode.value>=0 )
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
			
			
			