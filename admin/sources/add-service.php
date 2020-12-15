<div id="left-side">
	<div class="container">
		<div class="block">
			<div class="block-title">
				<h1>הוספת שירות</h1>
				<a href="index.php?act=editpages&what=services">חזור לניהול שירותים</a>
			</div>
			<div class="block-inner">
				<form method="post">
					<div class="row">
						<div class="input-field input-field-2">
							<label for="name">שם השירות</label>
							<input type="text" name="name">
						</div>
						<div class="input-field input-field-2 pull-left">
							<label for="index">מקום ברשימת המוצרים</label>
							<select name="index">
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
							</select>
						</div>
						
					</div>
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<label for="content">תוכן ההמלצה</label>
							<input type="text" name="content">
						</div>
					</div>
					<div class="clear"></div>
					<div class="row">
							<div class="input-field input-field-2">
							<label for="icon">אייקון</label>
							<select name="icon">
								<option value=""></option>
								<option value="1">הגנת שרתים</option>
								<option value="2">שרתים ווירטואליים</option>
								<option value="3">שרתי VPS</option>

						</div>
					</div>
					<div class="clear"></div>
					
					
					<div class="clear"></div>
					<div class="row">
						<div class="input-field">
							<input type="submit" name="submit" value="הוסף המלצה" class="button_tickets">
						</div>
					</div>
					<?php 
					if(isset($_POST['submit'])) {
						$name		= secur($_POST['name'],"string");
						$content	= secur($_POST['content'],"string");
						$index		= secur($_POST['index'],"int");
						if(empty($name) || empty($content) || empty($index))
						{
							echo '
							
								<div class="row">
									<div class="input-field">
										<div class="notice error"><p>שגיאה: אחד מהשדות אינם תקינים.</p></div>
									</div>
								</div>
							';
						}
						else 
						{
						$mysqli->query("INSERT INTO `turing_services` (`name`, `content`, `index`, `icon`) VALUES ('{$name}', '{$content}', '{$index}', '');");
							
							
							refreshPage("השירות נוסף בהצלחה","השירות נוסף בהצלחה. אתה מועבר כעת לניהול השירותים");
							die(' <meta http-equiv="Refresh" content="2; url=index.php?act=editpages&what=services">');
						}
						
					}
				?>
				</form>
				
			</div>
		</div>
	</div>
</div>