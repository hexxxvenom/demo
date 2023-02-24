<?php
mysql_connect("localhost","root","") or die("dfxghj");
mysql_select_db("medical_db") or die("hguygyugf");

$find_count=mysql_query("SELECT * FROM `visitor_counter`");
while ($row=mysql_fetch_assoc($find_count))
 {
	$c_counts=$row['counts'];
	$n_count=$c_counts + 1;
	$update_count=mysql_query("UPDATE `medical_db` . `visitor_counter` SET `counts`='$n_count'");
	echo $n_count;
}

?>