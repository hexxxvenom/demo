
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php
	include('header.php');
	if (!isset($_SESSION['usr_id'])) 
	{
		header('Location:user_login.php');
	}	
?>
<div class="cart" style="font-family: 'Times New Roman',Times,serif;">

	<h3 style="padding-top: 50px; margin: auto 600px; color: red;width: 300px;padding-bottom: 30px"><b>Shopping Cart</b></h3>
	<div class="cartselect1" style="border-radius: 10px; width: 600px;height: 50px; box-shadow: 0 1px 3px 0px rgba(0, 0, 0, 1.2); margin-left: 400px; padding-top: 10px"  >
	<form>
		<select onchange="showProduct(this.value)" name="opt1" style="height: 30px;width: 400px; color:black; font-size: 25px ;border-radius: 5px;margin-left: 92px;border-color: gray">
			<option value="none">Select Medical Store: </option>
			<?php
			$uid=$_SESSION['usr_id'];
			$q1=mysqli_query($con,"select DISTINCT m_id from cart where usr_id=$uid");
			while ($rows=mysqli_fetch_array($q1)) 
			{
				$mid=$rows['m_id'];
				$q2=mysqli_query($con,"select * from medical_store where m_id=$mid");
				$rows1=mysqli_fetch_array($q2);
				$name=$rows1['m_name'];
			?>
			<option value="<?php echo $mid; ?>"><?php echo $name; ?></option>
			<?php
			}
			?>	
		</select> 
		
	</form>
	</div>
	<p id="txtHint"></p>
	<p id="document"></p>
	      
</div>
	
	<script>
		function showProduct(str) {
		    if (str == "") {
		        document.getElementById("txtHint").document = "";
		        return;
		    } else { 
		        if (window.XMLHttpRequest) {
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp = new XMLHttpRequest();
		        } else {
		            // code for IE6, IE5
		            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		        }
		        xmlhttp.onreadystatechange = function() {
		            if (this.readyState == 4 && this.status == 200) {
		                document.getElementById("document").innerHTML = this.responseText;
		            }
		        };
		        xmlhttp.open("GET","showdetail.php?q="+str,true);
		        xmlhttp.send();
		    }
		}
	</script>

</body>
</html>