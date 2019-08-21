<?php include_once "include/header.php"; ?>
<?php include_once "include/navigation.php"; ?>
<!-- 
Body Section 
-->
<hr class="soften">
<div class="row-fluid">
<div class="well well-small col-md-12">
	<h1>Visit us</h1>
	<hr class="soften"/>	
	<div class="row-fluid">
		<div class="col-md-8 relative">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3211.096153541853!2d96.2109144838787!3d16.843294701281945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c192eadb52e16f%3A0x3458ba49a7146ad4!2sFloral+Breeze+Hotel+%26+Business+Complex!5e0!3m2!1sen!2smm!4v1558537913717!5m2!1sen!2smm" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

			<div class="absoluteBlk">
				<div class="well wellsmall">
					<h4>Contact Details</h4>
					<h5>
						2601 Mission St.<br/>
						Thingankyun, Yangon<br/><br/>
						
						info@walmal.com<br/>
						﻿Tel 0924-456-6780<br/>
						web:www.walmal.com
					</h5>
				</div>
			</div>
		</div>
		<?php 
		if (isset($_POST['submit'])) {
        $to="ss@gmail.com";//Admin's gmail
        $subject=wordwrap($_POST['subject'],70);
        $body=$_POST['body'];
        $email=$_POST['email'];


        mail("$to", $subject, $body,$email);
    }
    
    ?>
    
    <div class="col-md-4">
    	<h4>Email Us</h4>
    	<form class="form-horizontal">
    		<fieldset>
    			
    			<div class="form-group">
    				
    				<input type="text" placeholder="Enter your email" class="input-xlarge form-control" name="email" required />
    				
    			</div>
    			<div class="form-group">
    				
    				<input type="text" placeholder="Enter your subject" class="input-xlarge form-control" name="subject" required />
    				
    			</div>
    			<div class="form-group">
    				<textarea rows="3" id="textarea" class="input-xlarge form-control" name="body" required ></textarea>
    				
    			</div>

    			<button class="shopBtn" type="submit" name="" >Send email</button>

    		</fieldset>
    	</form>
    </div>
</div>

</div>
</div>
<!-- 
Clients 
-->
<?php include_once "include/footer.php"; ?>
