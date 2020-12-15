<?php
if(!isset($_SESSION['Username']))
	die(' <meta http-equiv="Refresh" content="0; url=index.php">');
if(!isset($_GET['show']) || empty($_GET['show']))
	$_GET['show'] = null;
$show = secur($_GET['show'],"string");

?>
<div id="skywork">
	<div class="clear"></div>	
	<div id="page">
		<div id="page-top">
			<div class="container">
				<h1>האיזור האישי שלי</h1>
				<a class="conbutton" href="index.php">חזרה לדף הבית</a>
			</div>
		</div>
		<div class="container">
			<div class="private_area">
				<div class="private_area_menu">
					<ul>
						<li class="<?php if($show == null) echo 'check'; ?>"><a href="private_area">כללי</a></li>
						<li class="<?php if($show == "details") echo 'check'; ?>"><a href="private_area&show=details">פרטים אישיים</a></li>
						<li class="<?php if($show == "tickets") echo 'check'; ?>"><a href="private_area&show=tickets">פניות</a></li>
						<!--<li class="<?php //if($show == "products") echo 'check'; ?>"><a href="index.php?page=private_area&show=products">מוצרים</a></li>-->
					</ul>
				</div>
				<div class="private_area_text">
<?php
				switch($show) {

					case "details":
						include "private_area_details.php";
					break;
					
					case "tickets":
						include "tickets_area.php";
					break;
					
					case "products":
						include "private_area_profucts.php";
					break;
					
					default:
?>
					<h2><?php echo $User->get_Fullname()?>, ברוך הבא לאיזור האישי שלך!</h2>
					<div class="line"></div>
					<div class="desc_area">
						ברוכים הבאים לפאנל ניהול הלקוחות של חברת SkyWorks,<br />
						הפאנל נמצא כרגע בגרסת Beta 1.0.2, במידה ותראו תקלות/בעיות במערכת לקוחות נשמח לקבל הודעה על מנת לתקנה.
					</div>
					<?php
					break;
				}
?>
				</div>
			</div>
		</div>	
	</div>
