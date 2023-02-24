
<!DOCTYPE html>
<html lang="zxx">
<head>

</head>
	
<body>
<?php
	include('header.php');
?>
<!-- banner -->
<div class="card11">
	<h3 style="padding-bottom : 50px; text-align: center; color: red;font-weight: 600">MEDICAL STORES</h3>

	<div class="form-group">
		<input style="width: 400px;margin: auto;font-weight: 1000;border-color: orange;text-align: center;font-size: 20px" type="text" class="form-control" name="search" onkeyup="showSearch(this.value)" placeholder="Enter the Pincode" pattern="[0-9]+" maxlength="6" title="Only Number">
	</div>
	<p id="txtsearch1"></p>
	
</div>

	<script>
		function showSearch(str) {
		    if (str == "") {
		        document.getElementById("txtsearch1").document = "";
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
		                document.getElementById("txtsearch1").innerHTML = this.responseText;
		            }
		        };
		        xmlhttp.open("GET","showdetail.php?search1="+str,true);
		        xmlhttp.send();
		    }
		}
		</script>

</body>
</html>