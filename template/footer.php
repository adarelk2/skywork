			<footer>
				<div class="container">
					<div class="logo">
						<a href="https://paypal.co.il"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/PayPal_logo.svg/2000px-PayPal_logo.svg.png" width="200px" height="50px" alt="PayPal" title="Paypal"/></a>
						<br><br><a href="https://pepper.co.il"><img src="https://i.ytimg.com/vi/eiUMcM6qHbo/maxresdefault.jpg" width="200px" height="100px" alt="Pepper" title="Pepper"/></a>
					</div>
					<div id="footer-menus">

						<?php
							$linkstitle = array();
							$linkQ = $mysqli->query("SELECT * FROM ".PREFIX."_links");
							while($linkTitleData = $linkQ->fetch_assoc()) {
								if(!in_array($linkTitleData['title'],$linkstitle)) {
									$linkQ2 = $mysqli->query("SELECT * FROM ".PREFIX."_links WHERE `title`='".$linkTitleData['title']."'");
									echo "
										<ul>
											<li><p>".$linkTitleData['title']."</p></li>
									";
									while($linkData = $linkQ2->fetch_assoc()) {
										echo "<li><a href='{$linkData['link']}'>{$linkData['name']}</a></li>";
									}
									
									array_push($linkstitle,$linkTitleData['title']);
								}
								echo "</ul>";

							}
							
						?>
					</div>
				</div>
			</footer>
			<div class="copyright">
				<div class="container">
					<p><img src="assets/images/turing.jpg" alt='turing' /> כל הזכויות שמורות &copy; <?= date("Y") ?></p>
				</div>
			</div>
		</div>
		
		<script src="libs/jquery.js" type="text/javascript"></script>
		<script src="libs/owl.carousel.min.js" type="text/javascript"></script>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('.customersslide').owlCarousel({rtl:true,items:2,loop:false,nav:false,responsive:{0:{items:1},1170:{items:2}}});
				$('.packagesslide').owlCarousel({rtl:true,items:1,loop:false,nav:false,dots:true});
				$('.servicesslide').owlCarousel({rtl:true,items:3,loop:false,nav:false,dots:true,responsive:{0:{items:1},500:{items:2},1170:{items:3}}});
				
				$('.packages-section-items > .packages-section-item').last().addClass('last');
				
				$('.menu-button').click(function() {
					$('.mobilemenu').slideToggle("slow");
				});
				
				$('header > div > ul > li').click(function() {
					$('header > div > ul > li > ul').slideUp("slow");
					$(this).find('ul').slideToggle("slow");
				});	
				
				$('#top-bar-userbar button').click(function() {
					$(this).parent().toggleClass('active');
				});	
				
				$('.can-edit svg').click(function() {
					$(this).parent().find('form').slideToggle("slow");
					$(this).parent().parent().toggleClass('active');
				});
				
				$('#hosting-packages-tabs-top ul li').click(function() {
					$('#hosting-packages-tabs-top ul li').removeClass('active');
					$(this).addClass('active');
				});
				
				$('.first-package').click(function() {
					$('.hosting-packages-tabs-tab').removeClass('active');
					$('.first-tab').addClass('active');
				});
				
				$('.two-package').click(function() {
					$('.hosting-packages-tabs-tab').removeClass('active');
					$('.two-tab').addClass('active');
				});
				
				$('.three-package').click(function() {
					$('.hosting-packages-tabs-tab').removeClass('active');
					$('.three-tab').addClass('active');
				});
				
				$('.four-package').click(function() {
					$('.hosting-packages-tabs-tab').removeClass('active');
					$('.four-tab').addClass('active');
				});
			});
		</script>
		
		<div class="mobile mobilemenu">				
			<svg xmlns="https://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="255" height="255" viewBox="0 0 255 255" xml:space="preserve"><polygon points="0 191.3 127.5 63.8 255 191.3 "/></svg>
			<ul class="mobilemenul">
				<li <?php if((isset($_GET['page']) && $_GET['page'] == "index" )|| !isset($_GET['page'])) echo "class='active'";?> ><a href="index.php">דף הבית</a></li>
					<li <?php if(isset($_GET['page']) && $_GET['page'] == "about") echo "class='active'";?>><a href="about">אודותינו</a></li>
					<li <?php if(isset($_GET['page']) && $_GET['page'] == "vps") echo "class='active'";?>><a href="vps">שרתים וירטואלים</a></li>
					<li <?php if(isset($_GET['page']) && $_GET['page'] == "hosting") echo "class='active'";?>><a href="hosting">אחסון אתרים</a></li>
					<li <?php if(isset($_GET['page']) && $_GET['page'] == "game-servers") echo "class='active'";?>><a href="game-servers">שרתי משחק</a></li>
					<li <?php if(isset($_GET['page']) && $_GET['page'] == "domains") echo "class='active'";?>><a href="domains">דומיינים</a></li>
					<li <?php if(isset($_GET['page']) && $_GET['page'] == "contact") echo "class='active'";?>><a href="contact">צור קשר</a></li>
				
			</ul>
		</div>	
		<!-- SCRIPTS & STYLES -->
</body>
</html>