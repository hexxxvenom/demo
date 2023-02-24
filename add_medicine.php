
<?php
	if (isset($_POST['add'])) 
	{

			$file_name_temp = rand(1000,100000)."_".$_FILES['photo']['name'];
			$file_name_perm = preg_replace('/[^a-zA-Z0-9_.]/', '_', $file_name_temp);

			$file_type=$_FILES['photo']['type'];
			$extension = substr($file_name_perm, strpos($file_name_perm,'.')+1);

			$file_size=$_FILES['photo']['size'];
			$max_size= 2097152;

			$file_loc = $_FILES['photo']['tmp_name'];

			// code to check folder existense and create the new folder*********
			$folder="uploads/";	
			if (!file_exists($folder)) 
			{
			    mkdir($folder);
			} 
			
			$p_name=$_POST['pname'];
			$p_cname=$_POST['cname'];
			$p_description=$_POST['description'];
			$p_tax=$_POST['tax'];
			$p_categery=$_POST['categery'];
			$p_quantity=$_POST['quantity'];
			$p_mdate=$_POST['m_date'];
			$p_edate=$_POST['e_date'];
			$p_price=$_POST['price'];

			include ('connection.php');
			$medical_session=$_SESSION['m_id'];


			if (($extension=='jpg' || $extension=='jpeg') && ($file_type=="image/jpeg" || $file_type=="image/jpg") )
			{
				if ($file_size <= $max_size) 
				{
					if(move_uploaded_file($file_loc,$folder.$file_name_perm))
    				{	

    					$qry_insert=mysqli_query($con,"INSERT INTO `add_product`(`p_id`,`m_id`, `p_name`, `p_description`, `c_name`, `p_tax_code`, `p_categery`, `p_quantity`, `m_date`, `e_date`,`p_price`,`p_image`) VALUES ('','$medical_session','$p_name','$p_description','$p_cname','$p_tax','$p_categery','$p_quantity','$p_mdate','$p_edate','$p_price','$file_name_perm')");
						if ($qry_insert) 
						{
							echo "<script>
								alert('Product added Successfully.');
							    window.location='add_medicine.php';
							</script>";
						}
						else
						{
							echo "<script>
								alert('Failed');
								window.location='add_medicine.php';
							</script>";
						}
    				}
    				else
    				{
    					echo "<script>
							alert('canot upload the file!.');
							window.location='add_medicine.php';
							</script>";
    				}
				}
				else
				{
					echo "<script>
						alert('file size must be less than 2 MB.');
						window.location='add_medicine.php';
							</script>";
				}
			}
			else
			{
				echo "<script>
						alert('file type must be JPEG/JPG.');
						window.location='add_medicine.php';
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
?>
<div style="padding: 50px 50px">
	<center><h3 style="font-weight: 600;color: red">ADD PRODUCT</h3></center><br>
				<form class="form-horizontal"  method="post" enctype="multipart/form-data" >
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">PRODUCT NAME</label>
						<div class="col-sm-8">
							<input type="text" name="pname" class="form-control1" id="focusedinput"  required="">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">COMPANY NAME</label>
						<div class="col-sm-8">
							<input type="text" name="cname" class="form-control1" id="focusedinput" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">PRODUCT DESCRIPTION</label>
						<div class="col-sm-8">
							<input type="text" name="description" class="form-control1" id="focusedinput" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">TAX CODE</label>
						<div class="col-sm-8">
							<input type="text" name="tax" class="form-control1" id="focusedinput" >
						</div>
					</div>
					<div class="form-group">
						<label for="selector1" class="col-sm-2 control-label">CATEGORY</label>
						<div class="col-sm-8">
						<select  name="categery" id="selector1" class="form-control1" required="" >
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
							<input type="text" name="quantity" class="form-control1" id="focusedinput" pattern="[0-9]+" title="Only Number">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">MANUFACTURE DATE</label>
						<div class="col-sm-8">
							<input type="Date" name="m_date" class="form-control1" id="focusedinput">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">EXPIRY DATE</label>
						<div class="col-sm-8">
							<input type="Date" name="e_date" class="form-control1" id="focusedinput">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">PRICE</label>
						<div class="col-sm-8">
							<input type="text" name="price" class="form-control1" id="focusedinput" pattern="[0-9 .]+" title="Only Number" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">IMAGE</label>
						<div class="col-sm-8">
							<input type="file" name="photo" class="form-control1" id="focusedinput"  multiple="multiple" accept="image/*" required="">
						</div>
					</div>
					
					<center><input class="btn btn-primary" type="Submit" style="width: 10%" name="add" value="ADD" ></center>
			</form>
</div>


</body>
</html>