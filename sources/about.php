<?php
$page = secur($_GET['page'],"string");
$getJson = $mysqli->query("SELECT `json` FROM `".PREFIX."_editblock` WHERE `name`='{$page}'")->fetch_assoc();
$JsonData = json_decode($getJson['json']);
?>
	<div class="clear"></div>	
	<div id="page">
		<div id="page-top">
			<div class="container">
				<h1>אודותינו</h1>
				<a class="conbutton" href="contact">צרו איתנו קשר</a>
			</div>
		</div>
		
		<div id="about-title">
			<div class="container">
			<img src="assets/images/about.png" alt="about" />
				<h2><?= editAdmin($JsonData->title,"title") ?></h2>
				<p style="margin-top: 40px;"><?= editAdmin($JsonData->subtitle,"subtitle") ?></p>
			</div>
		</div>
		
		<div id="about-text">
			<div class="container">
				<p>
					<?php editAdmin($JsonData->aboutCompany,"aboutCompany"); ?>
				</p>
			</div>
		</div>
		
		<div id="about-services">
			<div class="container">
				<table style="margin: 0 auto; font-weight: bold;">
				<tr>
					<td>
						<svg xmlns="https://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path fillRule="evenodd" d="M5 8.3C5 8.3 7.5 13.2 7.5 13.2 7.5 13.2 11.4 3.3 17.7 0 17.5 2.4 16.9 4.4 18 6.9 15.3 7.5 9.6 14.6 7.8 18 5.2 14.7 2.1 12.2 0 11.4 0 11.4 5 8.3 5 8.3Z" fill="rgb(121,183,15)"/></svg>
					</td>
					<td>
					 <?php editAdmin($JsonData->v1,"v1"); ?></p>

					</td>
				</tr>
				<tr>
					<td>
						<svg xmlns="https://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path fillRule="evenodd" d="M5 8.3C5 8.3 7.5 13.2 7.5 13.2 7.5 13.2 11.4 3.3 17.7 0 17.5 2.4 16.9 4.4 18 6.9 15.3 7.5 9.6 14.6 7.8 18 5.2 14.7 2.1 12.2 0 11.4 0 11.4 5 8.3 5 8.3Z" fill="rgb(121,183,15)"/></svg>
					</td>
					<td>
					 <?php editAdmin($JsonData->v2,"v2"); ?></p>

					</td>
				</tr>
				<tr>
					<td>
						<svg xmlns="https://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path fillRule="evenodd" d="M5 8.3C5 8.3 7.5 13.2 7.5 13.2 7.5 13.2 11.4 3.3 17.7 0 17.5 2.4 16.9 4.4 18 6.9 15.3 7.5 9.6 14.6 7.8 18 5.2 14.7 2.1 12.2 0 11.4 0 11.4 5 8.3 5 8.3Z" fill="rgb(121,183,15)"/></svg>
					</td>
					<td>
					 <?php editAdmin($JsonData->v3,"v3"); ?></p>

					</td>
				</tr>
				</table>
			</div>
		</div>
		
		
	</div>
	
	<section id="whatdoyou-section">
		<div class="container">
			<div id="whatdoyou-right">
				<?php editAdmin($JsonData->p_price,"p_price"); ?>
				<?php editAdmin($JsonData->p2_price,"p2_price"); ?>
			</div>
			<a href="#">קבל הצעת מחיר <svg xmlns="https://www.w3.org/2000/svg" version="1.1" viewBox="0 0 129 129" enable-background="new 0 0 129 129" width="512" height="512"><path d="m64.5 122.6c32 0 58.1-26 58.1-58.1s-26-58-58.1-58-58 26-58 58 26 58.1 58 58.1zm0-108c27.5 0 49.9 22.4 49.9 49.9s-22.4 49.9-49.9 49.9-49.9-22.4-49.9-49.9 22.4-49.9 49.9-49.9zM70 93.5c0.8 0.8 1.8 1.2 2.9 1.2 1 0 2.1-0.4 2.9-1.2 1.6-1.6 1.6-4.2 0-5.8l-23.5-23.5 23.5-23.5c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8 0l-26.4 26.4c-0.8 0.8-1.2 1.8-1.2 2.9s0.4 2.1 1.2 2.9l26.4 26.4z" /></svg></a>
		</div>
	</section>
	
			
