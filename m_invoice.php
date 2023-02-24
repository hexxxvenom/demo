<?php
	if(isset($_POST['save']))  
	{  
		include('connection.php');
		$pid=$_POST['pid'];  
		$mid=$_SESSION['m_id'];
		$qry=mysqli_query($con,"insert into bill(bill_id,presc_id,m_id) VALUES ('','$pid','$mid')"); 
		$id=mysqli_insert_id($con);  
		for($i = 0; $i<count($_POST['productname']); $i++)  
		{    
			$qry1=mysqli_query($con,"INSERT INTO `bill_details`(`bd_id`, `bill_id`, `p_name`, `p_quantity`, `p_price`, `p_tax`, `p_amount`) VALUES ('','{$id}','{$_POST['productname'][$i]}','{$_POST['quantity'][$i]}','{$_POST['price'][$i]}','{$_POST['tax'][$i]}','{$_POST['amount'][$i]}')");
		}
		if ($qry1) 
		{
			echo "
			<script>
			alert('Generate a Bill Successfully');
			window.location='view_prescription.php';
			</script>";
		} 
		else
		{
			echo "
			<script>
			alert('Failed');
			window.location='view_prescription.php';
			</script>";
		}
		
	}   
?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
<?php
	include('m_header.php');
	if (!isset($_SESSION['m_id'])) 
	{
		header('Location:medical_login.php');
	}
?>
	<div class="container" style="padding: 50px 50px">
	</dir>
        <form action="" method="POST">  
        <?php
        $pid=$_GET['pid'];
        ?>
        <input style="display: none;" type="text" name="pid" value="<?php echo $pid; ?>">
            <table class="table table-bordered table-hover">  
                <thead>  
                    <th>SI No</th>  
                    <th>Product Name</th>  
                    <th>Quantity</th>  
                    <th>Price</th>  
                    <th>Tax(%)</th>  
                    <th>Amount</th>  
                    <th><input type="button" value="+" id="add" class="btn btn-primary"></th>  
                </thead>  
                <tbody class="detail">  
                    <tr>  
                        <td class="no">1</td>
                        <td><input type="text" class="form-control productname" name="productname[]" required></td>  
                        <td><input type="text" class="form-control quantity" name="quantity[]" required></td>  
                        <td><input type="text" class="form-control price" name="price[]" required></td>  
                        <td><input type="text" class="form-control tax" name="tax[]" required></td>  
                        <td><input type="text" class="form-control amount" name="amount[]" readonly></td>  
                        <td></td>  
					</tr>  
				</tbody>  
				<tfoot> 
					<tr>
						<th colspan="7" style="text-align:right;font-size: 20px;">Total: <b class="total" style="padding-right: 100px"></b>
					</tr> 
					<tr>
				  		<th colspan="7"><input type="submit" class="btn btn-primary" name="save" value="Save Record"></th>
				  	</tr>
				</tfoot>  
			</table>  
		</form> 
	</div> 

<script type="text/javascript">  
$(function()	{  
	$('#add').click(function()	{  
		addnewrow();  
	});  
	$('body').delegate('#remove','click',function()  {  
		$(this).parent().parent().remove();  
	});  
	$('body').delegate('.quantity,.price,.tax','keyup',function()  {  
		var tr=$(this).parent().parent();  
		var qty=tr.find('.quantity').val();  
		var price=tr.find('.price').val();  
		  
		var tax=tr.find('.tax').val();  
		var amt =(qty * price)+(qty * price *tax)/100;  
		tr.find('.amount').val(amt);  
		total();  
	});  
});  
function total()  
{  
	var t=0;  
	$('.amount').each(function(i,e)   
	{  
		var amt =$(this).val()-0;  
		t+=amt;  
	});  
	$('.total').html(t);  
}  
function addnewrow()   
{  
	var n=($('.detail tr').length-0)+1;  
	var tr = '<tr>'+  
	'<td class="no">'+n+'</td>'+  
	'<td><input type="text" class="form-control productname" name="productname[]" required></td>'+  
	'<td><input type="text" class="form-control quantity" name="quantity[]" required></td>'+  
	'<td><input type="text" class="form-control price" name="price[]" required></td>'+  
	'<td><input type="text" class="form-control tax" name="tax[]" required></td>'+  
	'<td><input type="text" class="form-control amount" name="amount[]" readonly></td>'+  
	'<td><a href="#"  id="remove" class="btn btn-danger">X</td>'+  
	'</tr>';  
	$('.detail').append(tr);   
}  
</script>  

</body>
</html>
