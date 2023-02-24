<?php
	// code to delete the products
	if (isset($_GET['dpi'])) 
	{
		$dpi=$_GET['dpi'];
		include('connection.php');
		$qry_delete=mysqli_query($con,"DELETE FROM `add_product` WHERE `p_id`='$dpi'");
		if ($qry_delete) 
		{
			echo "<script>
						alert('Medicine Deleted.');
						window.location='display_medicine.php';
					</script>";
		}
		else
		{
			echo "<script>
						alert('Cannot Delete.');
					</script>";	
		}
	}
?>

<!DOCTYPE html>
<html>
<head>

<body>
<?php
	include ('m_header.php');
	if (!isset($_SESSION['m_id'])) 
	{
		header('Location:medical_login.php');
	}
?>
<div style="padding: 50px 50px">
	<center><h3 style="font-weight: 600;color: red">PRODUCT DETAILS</h3></center>
		<input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for product or company name" title="Type in a name" style="width: 600px;margin: auto;font-weight: 600;border-color: orange;font-size: 20px"><br>
		<table id="myTable" class="table table-hover" style="border-style: groove;color: black">
	    	<thead>
			<tr>
				<th>SI NO</th>
				<th>PRODUCT NAME</th>
				<th>IMAGE</th>
				<th>COMPANY NAME</th>
				<th>DESCRIPTION</th>
				<th>TAX</th>
				<th>CATEGORY</th>
				<th>QUANTITY</th>
				<th>DURATION</th>
				<th>PRICE</th>
				<th>UPDATE</th>
				<th>DELETE</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			<?php 
				$medical_session=$_SESSION['m_id'];
				$qry_select=mysqli_query($con,"SELECT * FROM `add_product` WHERE `m_id`='$medical_session'");
				$n='1';
				while ($row=mysqli_fetch_array($qry_select)) 
				{
			?>
				<td><?php echo $n; ?></td>
				<td><?php echo $row['p_name']; ?></td>
				<td><img style="height: 100px;width: 100px;" alt="not available" src="uploads/<?php echo $row['p_image']; ?>"></td>
				<td><?php echo $row['c_name']; ?></td>
				<td><?php echo $row['p_description']; ?></td>
				<td><?php echo $row['p_tax_code']; ?></td>
				<td><?php echo $row['p_categery']; ?></td>
				<td><?php echo $row['p_quantity']; ?></td>
				<td>Manufactured Date: <?php echo $row['m_date']; ?><br>Expiry Date :<?php echo $row['e_date']; ?></td>
				<td><?php echo $row['p_price']; ?></td>
				<td><a  class="btn btn-danger" href="m_update_product.php?upi=<?php echo $row['p_id']; ?>">UPDATE</a></td>
				<td><a  class="btn btn-danger" href="display_medicine.php?dpi=<?php echo $row['p_id']; ?>">DELETE</a></td>
			</tr>
			<?php
				$n++;
				}
			?>	
			</tbody>
		</table><br><br>
	<div class="clearfix"> </div>
</div>
<script>
		function myFunction() {
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");

		  for (i = 0; i < tr.length; i++) {
		    td_pname = tr[i].getElementsByTagName("td")[1];
		    td_pcname = tr[i].getElementsByTagName("td")[3];
		    if ((td_pname) || (td_pcname)) {
		      if ((td_pname.innerHTML.toUpperCase().indexOf(filter) > -1) || (td_pcname.innerHTML.toUpperCase().indexOf(filter) > -1)) {
		        tr[i].style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
		    }       
		  }
		}
	</script>

</body>
</html>