<?php
	if (isset($_POST['update'])) 
	{
		$p_id=$_POST['pid'];
		$p_name=$_POST['pname'];
		$p_cname=$_POST['cname'];
		$p_description=$_POST['description'];
		$p_tax=$_POST['tax'];
		$p_categery=$_POST['categery'];
		$p_quantity=$_POST['quantity'];
		$p_mdate=$_POST['m_date'];
		$p_edate=$_POST['e_date'];
		$p_price=$_POST['price'];

		include('connection.php');
		$qry_update=mysqli_query($con,"UPDATE `add_product` SET `p_name`='$p_name',`p_description`='$p_description',`c_name`='$p_cname',`p_tax_code`='$p_tax',`p_categery`='$p_categery',`p_quantity`='$p_quantity',`m_date`='$p_mdate',`e_date`='$p_edate',`p_price`='$p_price' WHERE `p_id`='$p_id'");
		if ($qry_update) 
		{
			echo "<script>
				alert('Product Updated Successfully.');
			    window.location='display_medicine.php';
			</script>";
		}
		else
		{
			echo "<script>
				alert('Product Updated Failed.');
			    window.location='display_medicine.php';
			</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>

<style type="text/css">
.form-control1{
	border: 1px solid #e0e0e0;
	padding:5px 18px;
	border-color: orange;
	background: #fff;
	width: 80%;
	font-size: 0.85em;
	font-weight: 600;
	height: 40px;
	border-radius: 5px;
	font-size: 18px;
	}
.form-group{
	padding-left: 200px;
}
</style>
<body>
<?php
	include ('m_header.php');
	if (!isset($_SESSION['m_id'])) 
	{
		header('Location:medical_login.php');
	}
	$uid=$_GET['upi'];
	$select=mysqli_query($con,"SELECT * FROM `add_product` WHERE `p_id`='$uid'");
	$row=mysqli_fetch_array($select);
?>
<div style="padding: 50px 50px">
	<center><h3 style="font-weight: 600;color: red"></h3></center><br>
	<form class="form-horizontal"  method="post" enctype="multipart/form-data" >
		<div class="form-group">
			<label for="focusedinput" class="col-sm-2 control-label">PRODUCT NAME</label>
			<div class="col-sm-8">
				<input style="display: none;" type="text" name="pid" class="form-control1" id="focusedinput" value="<?php echo $row['p_id']; ?>">
				<input type="text" name="pname" class="form-control1" id="focusedinput" value="<?php echo $row['p_name']; ?>" required="">
			</div>
		</div>
		<div class="form-group">
			<label for="focusedinput" class="col-sm-2 control-label">COMPANY NAME</label>
			<div class="col-sm-8">
				<input type="text" name="cname" class="form-control1" id="focusedinput" value="<?php echo $row['c_name']; ?>" required>
			</div>
		</div>
		<div class="form-group">
			<label for="focusedinput" class="col-sm-2 control-label">PRODUCT DESCRIPTION</label>
			<div class="col-sm-8">
				<input type="text" name="description" class="form-control1" id="focusedinput" value="<?php echo $row['p_description']; ?>" required>
			</div>
		</div>
		<div class="form-group">
			<label for="focusedinput" class="col-sm-2 control-label">TAX CODE</label>
			<div class="col-sm-8">
				<input type="text" name="tax" class="form-control1" id="focusedinput" value="<?php echo $row['p_tax_code']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="selector1" class="col-sm-2 control-label">CATEGORY</label>
			<div class="col-sm-8">
			<select  name="categery" id="selector1" class="form-control1" value="<?php echo $row['p_categery']; ?>" required="" >
				<option></option>
				<option>PILLS</option>
				<option>TONIC</option>
				<option>SYRING</option>
				<option>GELL</option>
				<option>OIL</option>
			</select>
			</div>
		</div>
		<div class="form-group">
			<label for="focusedinput" class="col-sm-2 control-label">QUANTITY</label>
			<div class="col-sm-8">
				<input type="text" name="quantity" class="form-control1" id="focusedinput" value="<?php echo $row['p_quantity']; ?>" pattern="[0-9]+" title="Only Number">
			</div>
		</div>
		<div class="form-group">
			<label for="focusedinput" class="col-sm-2 control-label">MANUFACTURE DATE</label>
			<div class="col-sm-8">
				<input type="Date" name="m_date" class="form-control1" id="focusedinput" value="<?php echo $row['m_date']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="focusedinput" class="col-sm-2 control-label">EXPIRY DATE</label>
			<div class="col-sm-8">
				<input type="Date" name="e_date" class="form-control1" id="focusedinput" value="<?php echo $row['e_date']; ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="focusedinput" class="col-sm-2 control-label">PRICE</label>
			<div class="col-sm-8">
				<input type="text" name="price" class="form-control1" id="focusedinput" value="<?php echo $row['p_price']; ?>" pattern="[0-9 .]+" title="Only Number" required>
			</div>
		</div>
		
		<center><input class="btn btn-danger" type="Submit" style="width: 10%" name="update" value="UPDATE" ></center>
	</form>
</div>


</body>
</html>