
<!DOCTYPE html>
<html lang="zxx">
<head>

</head>
	
<body>
<?php
	include('header.php');
?>

		<div class="card11" >
			<h3 style="padding-bottom: 10px; text-align: center; color: red;font-weight: 600">PRODUCT</h3>
			<div class="form-group">
				<input style="width: 600px;margin: auto;border-color: orange;color: blue;font-size: 20px;" type="text" class="form-control" name="search" onkeyup="showSearch(this.value)" placeholder="Search for product name">
				<p id="mid" style="display: none;"><?php echo $mid=$_GET['mid']; ?></p>
			</div>
			<p id="txtsearch"></p>
			 	 
		</div>

		<script>
		function showSearch(str) {
		    if (str == "") {
		        document.getElementById("txtsearch").document = "";
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
		                document.getElementById("txtsearch").innerHTML = this.responseText;
		            }
		        };
		        var mid=document.getElementById("mid").innerHTML;
		        xmlhttp.open("GET","showdetail.php?search="+str+"&mid="+mid,true);
		        xmlhttp.send();
		    }
		}
		</script>
</body>
</html>