<!--
 * @Author: Hein Htet Aung
 * @Date:   2019-06-12 20:33:19
 * @Last Modified by:  PiCarODD
 * @Last Modified time: 2019-06-12 21:11:54
-->
<?php 
include 'header.php';
?>
<div class="panel-body">
	<div class="col-md-6">
		<div class="well" style="border: 1px solid gray;">
			<h1 class="text-center"><span class="glyphicon glyphicon-user"></span><br><a href="c_profile.php">Profile</a></h1>
		</div>
	</div>
	<div class="col-md-6" >
		<div class="well" style="border: 1px solid gray;">
			<h1 class="text-center"><span class="glyphicon glyphicon-edit"></span><br><a href="c_setting.php">Setting</a></h1>
		</div>
	</div>
	<div class="col-md-6 col-md-offset-3" >
		<div class="well" style="border: 1px solid gray;">
			<h1 class="text-center"><span class="glyphicon glyphicon-shopping-cart"></span><br><a href="c_orders.php">Orders</a></h1>
		</div>
	</div>
</div>
<?php
include "footer.php";
?>