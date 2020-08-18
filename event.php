<?php include_once "include/header.php"; ?>
<?php include_once "include/navigation.php"; ?>
<!-- 
Body Section 
-->
<div class="row">
	<?php include_once "include/sidebar.php"; ?>		
	<div class="col-md-9">
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a> <span class="divider">/</span></li>
			<li class="active">Events</li>
		</ul>

		<?php 
		$query=$con->prepare("SELECT * FROM event");
		$query->execute();
		$result=$query->get_result();

		while ($row=$result->fetch_assoc()) {
			$event_id=$row['event_id'];
			$event_name=$row['event_name'];
			$location=$row['location'];
			$start_date=$row['start_date'];
			$end_date=$row['end_date'];
			$description=$row['description'];


			
			?>
			<div class="row-fluid">
				<div class="well well-small col-md-12">
					<div class="col-md-6">
						<h1 style="text-transform: uppercase;"><?php echo htmlspecialchars($event_name); ?></h1>	
						<p class="border-radius">
							<img src="./assets/img/eventloc.jpg" width="20%" height="20%" alt=""><?php echo htmlspecialchars($location); ?><br>
							<img src="./assets/img/datecal.png" width="20%" height="20%" alt=""><?php echo htmlspecialchars($start_date); ?> to <?php echo htmlspecialchars($end_date); ?><br>
							<img src="./assets/img/dicount.png" width="20%" height="20%" alt=""><?php echo htmlspecialchars($description); ?><br>
						</p>
					</div>
					<div class="col-md-6">
						<img src="./assets/img/promo.jpg" width="100%" height="300px" alt="" class="img-rounded">
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
		</div>
	</div>
</div>
<!-- 
Clients 
-->
<!--
Footer
-->
<?php include_once "include/footer.php"; ?>

<!-- Placed at the end of the document so the pages load faster -->
