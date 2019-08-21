<section class="our_client hidden-xs hidden-sm">
	<hr class="soften"/>
	<h4 class="title cntr"><span class="text">Manufactures</span></h4>
	<hr class="soften"/>
	<div class="row">
		<div class="col-md-2">
			<a href="#"><img alt="" src="assets/img/1.png"></a>
		</div>
		<div class="col-md-2">
			<a href="#"><img alt="" src="assets/img/2.png"></a>
		</div>
		<div class="col-md-2">
			<a href="#"><img alt="" src="assets/img/3.png"></a>
		</div>
		<div class="col-md-2">
			<a href="#"><img alt="" src="assets/img/4.png"></a>
		</div>
		<div class="col-md-2">
			<a href="#"><img alt="" src="assets/img/5.png"></a>
		</div>
		<div class="col-md-2">
			<a href="#"><img alt="" src="assets/img/6.png"></a>
		</div>
	</div>
</section>

<div class="row-fluid hidden-sm hidden-xs">
	<div class="footer col-md-12">
		<div class="col-md-2">
			<h5>Your Account</h5>
			<a href="#">YOUR ACCOUNT</a><br>
			<a href="#">PERSONAL INFORMATION</a><br>
			<a href="#">ADDRESSES</a><br>
			<a href="#">DISCOUNT</a><br>
			<a href="#">ORDER HISTORY</a><br>
		</div>
		<div class="col-md-2">
			<h5>Iinformation</h5>
			<a href="contact.html">CONTACT</a><br>
			<a href="#">SITEMAP</a><br>
			<a href="#">LEGAL NOTICE</a><br>
			<a href="#">TERMS AND CONDITIONS</a><br>
			<a href="#">ABOUT US</a><br>
		</div>
		<div class="col-md-2">
			<h5>Our Offer</h5>
			<a href="#">NEW PRODUCTS</a> <br>
			<a href="#">TOP SELLERS</a><br>
			<a href="#">SPECIALS</a><br>
			<a href="#">MANUFACTURERS</a><br>
			<a href="#">SUPPLIERS</a> <br/>
		</div>
		<div class="col-md-6">
			<h5>The standard chunk of Lorem</h5>
			The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for
			those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et 
			Malorum" by Cicero are also reproduced in their exact original form, 
			accompanied by English versions from the 1914 translation by H. Rackham.
		</div>
	</div>
</div>

</div><!-- /container -->

<div class="copyright">
	<div class="container">
		<span>Copyright &copy; 2019<br> Green Hacker E-commerce</span>
	</div>
</div>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script type="text/javascript">
function register(){
			// $('.modal').hide();
			
				$('#regmodal').show();
			
			$('#cal').click(function(){
				$('#regmodal').hide();
			})
		};
		function check(){
			$('#checkout').show();
		}
	document.getElementById('getval').addEventListener('change', readURL, true);
	function readURL(){
		var file = document.getElementById("getval").files[0];
		var reader = new FileReader();
		reader.onloadend = function(){
			document.getElementById('profile-upload').style.backgroundImage = "url(" + reader.result + ")";        
		}
		if(file){
			reader.readAsDataURL(file);
		}else{
		}
	}
	    

</script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.easing-1.3.min.js"></script>
<script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
<script src="assets/js/shop.js"></script>

</body>
</html>