<?php
	$page = secur($_GET['page'],"string");
	$getJson = $mysqli->query("SELECT `json` FROM `".PREFIX."_editblock` WHERE `name`='{$page}'")->fetch_assoc();
	$JsonData = json_decode($getJson['json']);
?>
	<div id="skywork">

			<section id="first-section">
				<div class="clear"></div>
				<div class="container">
					<div id="first-section-text">
						<h1><?= editAdmin($JsonData->h1_banner,"h1_banner") ?></h1>
						<div><?= editAdmin($JsonData->h1_subbanner,"h1_subbanner") ?></div>

						<div id="first-section-buttons">
							<a id="first-section-con" href="contact"><strong>צרו איתנו קשר</strong></a>
							<a id="first-section-pack" href="#packges"><strong>מעבר לחבילות</strong></a>
						</div>
						<img src="assets/images/servers.png" alt="servers" />
					</div>
				</div>
			</section>
			<div class="clear"></div>
			<section id="customers-section">
				<div class="container">
					<div id="customers-section-top">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="43" height="51" viewBox="0 0 43 51"><image x="0" y="0" width="43" height="51" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAAzCAYAAAAO2PE2AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QA/wD/AP+gvaeTAAAHj0lEQVRo3sXae4xcVR0H8M+5M/vuI223RQrd0gCFAkYQCloRi6CEADGgEUywSASqBKIBEwiKkgBqoqKVkEDUaALE+AqgqJigoGCVNwVW6QOQYinQQrtL9zWPe/zjzrTT7e7szO42fpPJ7D1zzu987+91fuecDa76M+USkOSJ0R5EtBASjJBvIy1W2pG6AHdglhhuJP0GMYqBmSXWz+e5JXzuMba2kIRsXIgI2VwhISYaQb6hXqORcT0Odwkek/qvEK8XbRHCHeKkpE6Ixl5pLwRiqGo1RzhXcL5gs5CsFhJC2KP9aUSzml2IFegRXAhi/A62iuYTewg3YyOexAv7k+wCpDVqacGQkPQRVioV7sJBo8as2uspxusElMOwQu5aA21rJLETczBc03MQQ82RnTFMX0uP4PqK1koVwgSdyukjcuESSe4KxdJBmYkbQCnXbvbQV7x3yxqFls/iGvShKuAdrBPdLknW7w6+umQfOGqWUzfcqZA7hbhHFJnvhXIUSvBqUzYrJizYtdniHexsXy6JS/bIrmaFcKpcOM+7A6fZVdgkV59w3ivdS53+4ink9v01IgmHSsunivFqIXRIfFIqMX4EBUIU4mPSZJVdbd1ietq4FklCj0LxLLsG1sjn1EPehU/MMdRSv0+a3orz5OPl8vnLDdnbAvvQzROLxPJcSXIbDhnfAmVmd803q2tCY+WFGCfMMsHReEbZrxXTTUI1q4+JSCEK6UIxnC3GnrqyI/JJlEsmzHZ5aaisKBOik7BKEjWWQ0N97e9NOIpxQrGTWBT+fxhrURiS5cBck7IaRQnt6NK47sclu4b4C9mCsD9QILyfcCtx4qiqSzbEXjy7v4qRyhwFUanZYWNptvK2TVmoAcRasbMmM8HYhUwW8DMF70MrylNkmsMWrJ+KkHpV16X43hRJ1uJ1HCWrD6aRbID4CmEjsZPm/WuUwFYxrEWhwZzeBNkM9+CRSp90amTlsMPeJeK0koXt0xZo0yCmDtkwPTPsFjdV44y73FaJ7s9k2zzqucEH8GXMQGGK83TgH/gWitNMNsLpOH/atBvDSvxQiDunmSxC/LkYgikVNLWuFP6Nvqm8fD03eAk3Tp6oCtFAzBPKpmql8cnGnH02kA0jEFNmPkm5k6GlmbxGd8ZVGSFm49JWQhyLbKVDzJGU2mW1Z7O1QcCw3K6C1jfpfIm+FRQWkuxeF1pqenfu3oJG2YmPMuUcuUFatxJzY5GtbnPKHxfj1zGZ5TbBgMHDrxSKzwkppdmVXBsqRENCHBC8pWSj6nlfgnxKLFFqpXU7XU9Q7qiXDcrLCR9qkmTNeAwceph8+hwttK4nnUd5JqH8vOxApV/wtkLYQZoRTSPlmJ04BsiRdhDb67rBbULaK6Zdk9BsjtCvY+AhIzmGW5nzFv2zwcKujX0rj7j76QNnb/R631IvbT+uZdO2E4pleT2zey2e94LFc17w9sAiD20+05sVJxxfsyHdKbh30gGcT5kxwm+XZ+X8USWLko1WHPJAcmj3U2dhKY5fMm/dMUvmres7/YifPY7n0YsnYHbHNku6n9H79uEe3nzKOD6bK1HoRJr9HZuI4uqJQhK591jWv0fnGeucsfAey2ZuOF62in1sjJEnV75L+DZuQDmIjpm3wZFzXh6jNkhSiu0Mzqq4XvVQsclPKeGZRY48+T6XXnquZTM3XI0HxyG6l03wNfwNy3c3JqVx3CBNCOVZkvQkQrvG69lqBbSBuL77xMed99WL4EJ8t3HzIAvAn+KDeLf6FvsSbRmhZeRKMdyUxUoTU2R0/4Vjl130kyIOxDebJFrF0ZWXXD022T2zPi1aKzSVZwPapOEPyiw7YG0et2BREwQ3ydxgboXoJfgd7q9DNv6R8AjaNL6CBeQV47bu+Vt0d722CBc0QXQzzsGLledzZT7+6QnIgl2VT3NIWNa9FpY1MWoAF9UQXShLbyrfM8Y/mItNnAKORp5lBzxKTTRXMCy7GBmNEj6DhyvPXfglFleej8bCJDvC3Av9TeXVcdDZ2l/VSC0uxofxKbxR0365zC/JCpy7UbvUz0B3PiuwawjHcAMumyTHFpmwa7YPLFrb09r7n1Ha+1NFu7+RBdId+Ct+VNPvFnxilNwB7My784QdLnuUodbqD0vH0Eiz+Mi2gYPX9szp/WdNWw7fxxdlx6rrZFun2pi4DleMIW89Xksc9s4GpZYHp8P0exBO2j7QA8/WNsoC6H577hhqia7GzeMIfBHv5p25od9gXCVfulapbQVpM6lqLLRheFt/T5vML++RpaAqPoqH8Hn8pdJ2Dm6rI/NeyOtvp7Nvq2L8kmL7HEFlPzNp5Ijp9l0HVzdd18iCqrumzyEVDf+4ovHVxt+Y3o1fZYJXXEy+kOmy1DosxOo15WQ/AxgsltvSuR1vWDDr1Xdka/vZo0i04CScWIfoZpyv4i779QLkgee/oG9wAdyO6zHSxPBnZffCW6sN+5XsSKnTfU9dJWb//HCTzF//3sDQH2ClLK3tRuYGLSNZEVhqbfROrDGkif7BbiGfWjy3F16TrUyP42WZeTsr7b+XlYQ3yXx5Hyv8Dy9Gi8cvdOo9AAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE3LTExLTIwVDA4OjM1OjU0KzAwOjAw4H4eCQAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxNy0xMS0yMFQwODozNTo1NCswMDowMJEjprUAAAAASUVORK5CYII="/></svg>
						<h2>סקייוורק - דף הבית</h2>
							
					</div>
			
					<div style="font-family:myFirstFont;line-height: 1.5em;">
						עוד חברת אחסון אתרים?
עוד אתר שמציע גיבוי בענן?
עוד מישהו שמציע שרתי משחק יציבים?
<br>
לא די לכם מהפחד שאולי, מחר, תקומו בבוקר, והאתר העסקי שלכם, שעד אתמול היה באוויר ופעל כשורה - איננו?
<br>
ועכשיו, לכו תשחזרו את כל מה שהיה בו!
לא נמאס לכם מהחיפוש המייאש הזה?
לא מגיע לכם אחסון יציב בחברה אמינה?

תכירו את סקיוורק, חברת שרתי האחסון שקובעת סטנדרטים חדשים לשירות ולאמינות!

החברה הוקמה בשנת 2017, במטרה לספק מענה ללקוחות פרטיים ועסקיים בתחום השרתים השונים. <b>כיום, מציעה החברה ללקוחותיה הרבים שרתים ייעודיים, שרתי אחסון אתרים, שרתים וירטואליים, שרתי משחק אמינים וכד'</b>. מאחורי השרתים והשירותים השונים, ניצב צוות מקצועי שברשותו שנות ניסיון רבות וידע מקיף ומקצועי, אשר מטרתו לספק לכם את השירות הטוב והרציף ביותר.
<br>
<br>
כאשר אתם הופכים ללקוחותינו,
אתם נהנים מ:

<li>
	שרתי אחסון איכותיים, המאוחסנים בחוות השרתים של בזק
</li>
<li>
	הגנה מתקדמת ומחמירה ביותר כנגד מתקפות DDoS ואיומי אבטחה אחרים
</li>
<li>
	התחייבות לאחסון בשרתים מהירי-תגובה, אמינים ועמידים
	</li>
<li>
	תחזוקה שוטפת ומקצועית לשרתים
</li>
<li>
	צמצום זמני הדאונטיים למינימום
	</li>
<li>
	זמינות שרתים של 100% - מהגבוהים בארץ!
</li>
<li>
	מערך גיבוי אמין מהמשוכללים בארץ
	</li>
<li>
	פאנל ניהול אתר ייחודי, אשר מתאים בדיוק לצרכי בניית האתר שלכם

ובנוסף לזה,
אתם נהנים גם מליווי צמוד ואישי של צוות איכותי ורב ניסיון בתחום בניית אתרים וניהולם, משירות לקוחות מקצועי שעומד לרשותכם 24/7, 
<br>
מיחס אישי וחם ומעבודה מול אנשי מקצוע שרואים באתר שלכם את האתר שלהם, יעשו הכל ויתנו לכם את כל הכלים הנחוצים על מנת שתצליחו!
</li>
<br>
	
<br>
<b><u>
SkyWork - בונים את האופק עבורכם!</b></u>
</div>

<br>
<br>
<br>
</section>
					<div class="clear"></div>
			<section id="customers-section">
				<div class="container">
					<div id="customers-section-top">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="43" height="51" viewBox="0 0 43 51"><image x="0" y="0" width="43" height="51" xlink:href="data:image/png;base64,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"/></svg>
						<h2>לקוחות ממליצים</h2>
						<?php editAdmin($JsonData->p_subcustomers,"p_subcustomers"); ?>
					</div>
					
					<div class="customersslide">
					<?php
						$qRecommended = $mysqli->query("SELECT * FROM `".PREFIX."_recommended`");
						while($Data = $qRecommended->fetch_assoc())
						{
					?>
						<div class="customers-section-item">
							<div class="customers-section-item-inner">
								<img src="assets/images/quote.png" alt="" />
								<p><?= $Data['content'] ?></p>
							</div>
							<div class="customer-name">
								<div class="customer-name">
								<table align=center>
								<tr><td style="width:70%;"><h3><?= $Data['name'] ?></h3><?= $Data['company']?></td>
								<td style="width:30%;"><a href="<?= $Data['Link']?>" target="_blank"><img src=<?= $Data['logo']?> style="width:200px;height:70px;"></a></td></tr></table>
							</div>
							</div>
						</div>
					<?php
						}
					?>
					</div>
				</div>
			</section>
			
			<section id="whatdoyou-section">
				<div class="container">
					<div id="whatdoyou-right">
						<?php
							editAdmin($JsonData->p_price,"p_price");
							editAdmin($JsonData->p_pricedesc,"p_pricedesc");
						?>
					</div>
					<a href="contact">קבל הצעת מחיר <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 129 129" enable-background="new 0 0 129 129" width="512" height="512"><path d="m64.5 122.6c32 0 58.1-26 58.1-58.1s-26-58-58.1-58-58 26-58 58 26 58.1 58 58.1zm0-108c27.5 0 49.9 22.4 49.9 49.9s-22.4 49.9-49.9 49.9-49.9-22.4-49.9-49.9 22.4-49.9 49.9-49.9zM70 93.5c0.8 0.8 1.8 1.2 2.9 1.2 1 0 2.1-0.4 2.9-1.2 1.6-1.6 1.6-4.2 0-5.8l-23.5-23.5 23.5-23.5c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8 0l-26.4 26.4c-0.8 0.8-1.2 1.8-1.2 2.9s0.4 2.1 1.2 2.9l26.4 26.4z" /></svg></a>
				</div>
			</section>
			
			<section id="services-section">
				<div class="container">
					<div id="services-section-top">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="47" height="58" viewBox="0 0 47 58"><image x="0" y="0" width="47" height="58" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC8AAAA6CAYAAAAgPACEAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QA/wD/AP+gvaeTAAALQUlEQVRo3s3ae5CdZX0H8M/znrPXZLObK0lJQkhAJFnkJiA3rVK0XFos1mIrUmnFdmRagpZxhl6Udmqx0zJTqY60tCDgtOKU1oo4hTDoVGwJ0IhchCABQgkh5H7Z2znnffrH857s2c05ObsJOP3O7M45z/tcvu/v/d3fE3x6jQMQI3k+aTB0y8oj8hoiIUvDWSAn/StRmrRPrGmJkTkuOe1zTllyv9Fqr+kiazoaskQqCwQlvA8fxx04YdqnvEUoN2FORC0iUirnyvGTauEy4hD24AZsR7VYtBLP/D8gL5EWiRmh9AGlvE8lksVeWfjVpCZGBQ+hF3+Bx3EtXi02+FmQj0na4/iAmD9L3CoLN4r5OcbiSeNTwgJZ+FShzJeiW4hHEJbiNaz+2ZGPIZ0V9OJi0Z+KYb1SeSHZoBh7hMb728+rhKPExu/VR+VZLmTJWN/ieyjvPzyG43Gt4DhZdlzhKoKs4JBJhlzNNwr6Bf2TuI0SZ4l5w8PM2xKIMWs7pzX5UKuftJ5sPeFkYte4rDPkz9hXuV8WHtXdUSEslMfzhXiBcbvpJLsa38WGqRLoKg8dMvmSM6+ofx4TshwfQgcIgbz2fXm82vDo3Xp7HpfHZ0RrZdkD2IF3objZMJ8wA/cJsa3OlEpjLhz8sjhRL6eMLKluCaUB0fHoKa5F0UZ5vlqMjxro36unkz1D3TZvy+T5VjHcRPz6hB2DS4TwgOgzGGh5ct7liIFnze5945CIF+Q1Lj614dow8W5Z+Ud6eiln81Xzq2ThGuXSicoIeZXwJextWDef+B58VrRIDPb/7UdkzxIr5q07ZOLUvU2IXVgmBZs6OgQ/JFIZJWSfEOP1Zs+Yqb/3g8RfEWwWbSU8QTx7glBimC9kHeSheIrjRCv93nfyjZYvWGuk2nUY5EPskGcfk9X+GIsmkBd2CrkiaA0QZqpGOBpLhXyzYFTMXh8XaiCENXqG7pTl21W7omoRTuTETE/P685b9XdGKz0qtcMhP2NPp7GeY1TKS5Vq1Pa7rppoUCg9RA3xLsJKvIN4K14EoUYMy8YffyDL7tQzfIfOvdQ60l+1zMhcWS2zaM5zyoF9eechE0/ky3v3qXlFPqPun2Nh/hl+A3eIYZcQnySsLkS4SQzDYpYJ2QUak7UsrwjVl4Qy1Z4k7fIoIVjU94Qzjvx3y2b+9LDUpY6Sd1/Gghc3ePCM++VZNGv4BCFkSYQWoZPwQPoadmAHoVoY4XlK8Q+xVERHTmd1nWePvMGPj8yN9pKVib3sG7D67CvN635db+cuo9VeIRxeBC4rVdjbvd1Lix7UXX3Cii3vN9xZ1/0S/gALxHCbYCNeRzc+JouX4Yy6tsgiY6UhLw8s8sTijTqrdAeL3r3Gyktu01Metm+sQ6XWJYT20bc9+Z69vLQwqpWZv3urcvy8GG4xUSqXCfEUwkvoF8yTxaPQuz9FiBkjGaXauc7c8HGzh7/o1f5Rzy/wtvlrffCdt9v02sBhS3si+a59PH0mR29hYIRq+JaQf5jwCw3zujBIHExEC0nvJ46Y7RRkYl7TP/Sg9z4fZDmvLbf8tPts3dbRjHjjLodAfiywagu1XfSMMtzZg6UNcw7ImdNokBKvDioz/nvWnMe+muV9S3buOeop2xc+3FV9UX/PFldcdJVSaVRlbIbiaZZRz0kewQsYPZSbKKt10JlRGmYsI8R9QnhaCCvk+Q5sEMIgOlFRTx8CquUN9s27/ZSVX7tz8by1G1fOe2bhq7uX7965b5GhSp+LBu+0Y6hXHstiCPVV78WNmI8teBIP42+k6mwa5Ed7qZWSFJN83xBcJ8YfqObDytltUtpwFuFY4m+iU62kM7ru8vOvuGdm97bTB3q2XT9W7frI4oFnv3DcgkduJHhj70AWxLpl9hQSPrUgDgtwHk7Hj/Cv0yM/0s8Eyw/wgjy/KXURIuXwsOhhzCQsybLq4Ny+jetOPPJBS+c+tbpa6/pELc9WZVkV8bqhsf6H8XoQF+CdWIJNOAIXN+HxGoanrzajM8ga2hN17a5rYCgKcpGY7xU7r8zKY4OnL7v38bOW3XPt0FjfNTFmsxo2mIMvFjudIaXNc4qLVc3r5mFsnD75Sjel6oFXYj7eAsF4uRc2V/OOzQtnbjBW7VofY9bRZN8zGz7PmXBecxyNT+ErptGFOLAGq5dvozOVSlXG5jA6h2pvuhQ7/NKqm82d8apKrfsuPDBdiTXBLFyNe/HZSTd8EMlX+6gEysMpB5Gza4n5s9c5dvF/OuWoNZ7cdK4XNp+hp3u781feYdnsn9g1MiuLMRwhGd2bhaPxRwX5z0vqtAgL8VOpZzQu56u+eYINW0+0YevJNu5cpbZnmbPedqsTlt1r4ayXlUJVuVQBu4bnmtm909BonxDiqfi0evvjzcfN+CHOx0fwBfz5BPJ/8h+9uspDsow9I/1e2T5oxRGPyGudqnmHKAgN8aP4Ph934ecl/z8V1EzsZLZDRcqjFhffh3E21tUnlKt5h+pY//4VK+Y/qlLtFYuyLUwKfEEsSRHy/W0OzyWbehz/ixGpXOyS3Ofb26zvaCBOihPX48pinwOtf6zW02yjY7ETbxR3/7ttDt4tBZ2bpfbffxVSn1ccPFuqFT6Kd0zjaVyKW7CmKfkmWCrp26pCikfimIPMfw1fkwyvsb9dk9QA9knpwBqpPXiZqanfUxpK1XbkM6lKurT4vKLNIVvwl/jyJOLNMIr/KcjPxYVt5t+Cf8FDjeQOhp6CfH1eO+n8A74qGdtUsR1XaTDEJtiNb0oxZX9EbUd+AOdMkcQm/L1kmJPRi37JAGe0WHsbWvX+ZmFw8mA78mNSEJqKJL+h3lGYiBOlFPix4uZ+X3OXeUdxE63wLvQ1DrTT+R1SvnGhlMoubzGvhu81GR+UAstFxfdj8IuS+t0wae4efF9rZ3BOQX5/lG0n+Spux681OawRGV5uMn4ezm0y/iEcP2ksSAbcCp0mthXbkp8smb0trr3iwGZ8WTL4vibzBx3YhK1J/r9VObhVihOHRH7UpMSoAblkVJPHHivWNSIWRJ5tsk+n1kXJPLxHQz09HfKbC8k0w1FSo7bRhnKslXKgRvwEfybZUyO6pafU6oXsAnwOP8AlKE8lwtYxJKUIC5tcC7gcX580vlt6Q7hO6kB3Si7xiSZ7DEo5z8FwFH4Ov4z7pkP+ZSmcX97i+plSnvLjSeN7C8Idxc20wodNfD/QCvvwEirTUZthKTFr1afrw185UPfraw9GfLmUqE3lHf4OKdGbks6HgthqKX9v5Q0yqXC4yfiroXbowklSWrG4zdwRyXXvlno9U8oqy/ikVJbNnML83y5u8B/xtNYSn4MLcA1Oa0P6O1JhfpLU29kyVfIVSW+nQryOy3GKVFDfi12Szu+QXOdHJQO9YgocHpUy1bXF3M5COML13+03BfTjW5KfnS724DnpCcyWGk89WrvdRuTFDd6tSX41VW+zC38tteXq+vycVGG1s5s+7V1gM4zgn/BvWiSG0/E238Y/G/9xxDUKq38LsA334DOSa2yK6fh5+C2pDNxSSGODlAqf/CaT/57UfNpxsEmH8quFV40/xufx61Jk3WYqv5SYGmY4MCc6AKVzLz/sftE2qTm0VSrW5x6iUBpxDNY7eIp82IfUsRlfwu9oLf3J49sl3/2Yhrq0wEZJPQ+K6er8wRAk7zO5a1yRErNtUryo5/6PSE9soZR5vr3Y4xuSh2n7ouHNJB81z2v24G9xp1SA5CZG3U3F9d+TUovvOHgt+5aQh1uljO9iqfw7XpJ6va2xs8W6r0iZZ00q+qeEN5v8sBQPvl18P0Yy4PVTXDst/B/mSJz0nZ10iQAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxNy0xMS0yMFQxNzozMzozMiswMDowMPKgZrAAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTctMTEtMjBUMTc6MzM6MzIrMDA6MDCD/d4MAAAAAElFTkSuQmCC"/></svg>
						<h2>שירותים</h2>
						<?php editAdmin($JsonData->p_service,"p_service"); ?>
					</div>
					
					<div id="services-section-items" class="servicesslide">
						<?php
							$services = $mysqli->query("SELECT * FROM `".PREFIX."_services` ORDER BY `index`");
							while($Data = $services->fetch_assoc())
							{
						?>
						<div class="services-section-item">
							<div class="services-section-item-icon"></div>
							<div class="services-section-item-inner">
								<div class="services-section-item-icon-inner"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="33" viewBox="0 0 32 33"><filter filterUnits="objectBoundingBox" x="0" y="0" width="100" height="103.1" id="filter0"><feGaussianBlur in="SourceAlpha" stdDeviation="0" result="dsBlurOut1"/><feFlood flood-color="rgb(0,0,0)" flood-opacity="0.3" result="dsFloodOut1"/><feComposite in="dsFloodOut1" in2="dsBlurOut1" operator="in" result="dsShadow1"/><feOffset in="dsShadow1" dx="0" dy="1" result="dsOffset1"/><feComposite in="dsOffset1" in2="SourceAlpha" operator="out" result="dropShadow1"/><feBlend in="dropShadow1" in2="SourceGraphic" mode="normal" result="sourceGraphic"/></filter><image x="0" y="0" width="32" height="33" filter="url(#filter0)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAG8SURBVEjHvZM/SJRxGMc/Hie9ZojaIpheoEuCcBBSBA1hTTmGS9ASBuFmtDiE2NRQ1NLQv6WCEBSXoKWQUJCwhGhoCOlAF4kyJfC800/DveoddL7vddbzLL/n4fl94Pk+z4NTVmYjUuwJqrR/DhikiTk+0cTlvwPUEpCghoDaMhXViphkmpWKmv5cGtZYpYhJLnCkoh+zzO6rBlFTyJNFJEvuzwVRgAEC3vGRgEvlNNjb2klzkAOkSZWp+N/H9I350sQ+7EELQWSVLLIJwCH6eFWyu5Ea5Hxhj4it3vKHuuZdj25rEAV4aZuIaZ+6UZTPO+aJOIBh8bSvd+JfTvhzJ5r2XBTgpvgkfC97w2axwSEzYW4yaowNwBIAw7QzyipnyHKHDq4UxhoFSAGLALxlnQEWeMNXrpFnDoD5JF9o3AOwBcwA0M0MZ2kDWujlNj0AvMc4nlGnxL6w80HxkZq3Lh7gvqpdJvygZqy32e/qc4kHOO6W+kA87LjHxHtqzs64AHym6sUwumpOfVhYpHieck3d9LFdIWy9sKNxAXjK1aIF27B/+xbi+0mXwu8rnt89pkq8zusuOGrjbu43ifojbknRPk0AAAAldEVYdGRhdGU6Y3JlYXRlADIwMTctMTEtMjBUMTk6MjI6NTIrMDA6MDDgZdd5AAAAJXRFWHRkYXRlOm1vZGlmeQAyMDE3LTExLTIwVDE5OjIyOjUyKzAwOjAwkThvxQAAAABJRU5ErkJggg=="/></svg></div>
								<h2><?= $Data['name'] ?></h2>
								<p><?= $Data['content'] ?></p>
							</div>
						</div>
						<?php
							}
						?>
					</div>
				</div>
			</section>
			
			<section id="packages-section">
				<div class="container">
					<div id="packages-section-top">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" height="42" viewBox="0 0 40 42"><image x="0" y="0" width="40" height="42" xlink:href="data:image/png;base64,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"/></svg>
						<h2>חבילות פופולריות</h2>
						<p>החבילות הפופולריות ביותר שלנו</p>
						<a href="hosting" class="desktop"><strong>מעבר לעמוד החבילות</strong></a>
					</div>
					<div class="clear"></div>
					<div class="packages-section-items desktop">
						<img src="assets/images/packages-right.png" alt="packages-right" />
						<?php
							$qGetHosts = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `type`='hosts' ORDER BY `index` LIMIT 4");
							while($qGetHostsData = $qGetHosts->fetch_assoc())
							{
								$arr = json_decode($qGetHostsData['parameters']);
						?>
						<a id="packges"></a>
						<div class="packages-section-item <?php if($qGetHostsData['recommended'] == 1) echo "recommended"; ?>">
					
							<p class="packages-section-item-title"><?= $qGetHostsData['title'] ?></p>
							<p class="packages-section-item-desc">שטח אחסון: <strong><?= $arr->storage ?></strong></p>
							<p class="packages-section-item-desc">תעבורה: <strong><?= $arr->traffic ?></strong></p>
							<p class="packages-section-item-desc">מערכת הפעלה: <strong><?= $arr->os ?></strong></p>
							<p class="packages-section-item-desc">פאנל ניהול: <strong><?= $arr->panel ?></strong></p>
							<p class="packages-section-item-desc"><span>דומיין: <strong><?= $arr->domain ?></strong></span></p>
							<p class="packages-section-item-desc">תיבות דואר: <strong><?= $arr->mails ?></strong></p>
							<p class="packages-section-item-desc">מיקום חוות שרתים: <strong>ישראל</strong></p>
							<p class="packages-section-item-price"><strong><?= number_format($qGetHostsData['price'],2) ?>₪</strong> / חודש</p>
							<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
							
						</div>
						<?php
							}
						?>
						<img src="assets/images/packages-left.png" alt="packages-left" />
					</div>
					
					<div class="mobileslide mobile">
						<img src="assets/images/packages-right.png" alt="packages-right" />
						<div class="packages-section-items mobile packagesslide">
							<?php
							$qGetHosts = $mysqli->query("SELECT * FROM `".PREFIX."_product` WHERE `type`='hosts' ORDER BY `index` LIMIT 4");
							while($qGetHostsData = $qGetHosts->fetch_assoc())
							{
								$arr = json_decode($qGetHostsData['parameters']);
							?>
							<div class="packages-section-item">
								<p class="packages-section-item-title"><?= $qGetHostsData['title'] ?></p>
								<p class="packages-section-item-desc">שטח אחסון: <strong><?= $arr->storage ?></strong></p>
								<p class="packages-section-item-desc">תעבורה: <strong><?= $arr->traffic ?></strong></p>
								<p class="packages-section-item-desc">מערכת הפעלה: <strong><?= $arr->os ?></strong></p>
								<p class="packages-section-item-desc">פאנל ניהול: <strong><?= $arr->panel ?></strong></p>
								<p class="packages-section-item-desc"><span>דומיין: <strong><?= $arr->domain ?></strong></span></p>
								<p class="packages-section-item-desc">תיבות דואר: <strong><?= $arr->mails ?></strong></p>
								<p class="packages-section-item-desc">מיקום חוות שרתים: <strong>ישראל</strong></p>
								<p class="packages-section-item-price"><strong><?= number_format($qGetHostsData['price'],2) ?>₪</strong> / חודש</p>			
								<a href="buy&product_id=<?= $qGetHostsData['id'] ?>">קניה</a>
							</div>
							<?php
							}
							?>
						</div>
						<img src="assets/images/packages-left.png" alt="packages-left" />
					</div>
				</div>
			</section>
			
			<section id="help-section">
				<div class="container">
					<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"><path fillRule="evenodd" d="M20 0C9 0 0 9 0 20 0 31 9 40 20 40 31.1 40 40 31 40 20 40 9 31.1 0 20 0ZM21.4 31.1C21 31.5 20.4 31.7 19.8 31.7 19.2 31.7 18.6 31.5 18.2 31.1 17.7 30.7 17.5 30.2 17.5 29.4 17.5 28.8 17.7 28.2 18.1 27.8 18.6 27.3 19.2 27.1 19.8 27.1 20.5 27.1 21 27.3 21.5 27.8 21.9 28.2 22.1 28.8 22.1 29.4 22.1 30.1 21.9 30.7 21.4 31.1ZM27.2 16.8C26.9 17.4 26.4 18 26 18.5 25.5 19 24.6 19.8 23.3 20.9 23 21.2 22.7 21.5 22.5 21.7 22.2 22 22.1 22.2 22 22.4 21.9 22.6 21.8 22.8 21.7 23 21.7 23.2 21.6 23.6 21.5 24.1 21.3 25.2 20.7 25.7 19.6 25.7 19.1 25.7 18.7 25.5 18.3 25.2 17.9 24.8 17.7 24.3 17.7 23.6 17.7 22.7 17.9 22 18.1 21.3 18.4 20.7 18.8 20.2 19.2 19.7 19.7 19.2 20.3 18.6 21 18 21.7 17.4 22.2 16.9 22.4 16.6 22.7 16.4 23 16 23.2 15.7 23.4 15.3 23.5 14.9 23.5 14.5 23.5 13.7 23.2 13 22.6 12.4 22 11.8 21.2 11.5 20.2 11.5 19.1 11.5 18.2 11.8 17.7 12.4 17.1 13 16.7 13.8 16.3 14.9 16 16.1 15.3 16.7 14.3 16.7 13.7 16.7 13.2 16.5 12.8 16.1 12.4 15.7 12.3 15.2 12.3 14.7 12.3 13.8 12.6 12.8 13.2 11.8 13.8 10.8 14.7 9.9 16 9.3 17.2 8.6 18.6 8.3 20.2 8.3 21.7 8.3 23 8.5 24.2 9.1 25.3 9.7 26.2 10.4 26.8 11.4 27.4 12.3 27.8 13.3 27.8 14.5 27.8 15.3 27.6 16.1 27.2 16.8Z" fill="rgb(149,201,79)"/></svg>
					<a href="mailto:<?= $Settings['email'] ?>"><strong><?= $Settings['email'] ?></strong></a>
					<p><a class="mobile" href="tel:<?= $Settings['phonenumber'] ?>"><strong><?= $Settings['phonenumber'] ?></a></strong> צריך עזרה? נציגנו ישמחו לעזור בכל עת <a class="desktop" href="tel:<?= $Settings['phonenumber'] ?>"><strong><?= $Settings['phonenumber'] ?></a>.</strong></p>					
				</div>
			</section>