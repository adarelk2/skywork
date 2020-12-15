<?php
if(!isset($_GET['do']) || empty($_GET['do']))
	$_GET['do'] = null;
	switch($_GET['do'])
	{
	
		case "add":
			include "add-service.php";
		break;
		case "remove":
			if (!isset($_GET['id']) OR empty($_GET['id'])) $_GET['id'] = null;
			$id = secur($_GET['id'],"int");

			$query = $mysqli->query("SELECT * FROM `".PREFIX."_services` WHERE `id`='{$id}'");
			if ($query->num_rows == 0)
				die(' <meta http-equiv="Refresh" content="0; url=index.php?act=editpages&what=services">');
			
			//message
			$mysqli->query("DELETE FROM `".PREFIX."_services` WHERE `id`='{$id}'");
			refreshPage();
		break;
		default:
			
?>
<script>
$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 60;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "קרא עוד...";
    var lesstext = "הסתר";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
</script>
	<div id="left-side">
		<div class="container">
			<div class="block">
				<div class="block-title">
					<h1>ניהול שירותים</h1>
				<a href="index.php?act=editpages&what=services&do=add">הוסף שירות חדש</a>

<span class="counter"></span>
				</div>
				<div class="block-inner">

					<table class="table table-hover table-bordered results">
  <thead>
    <tr>
		<th>#</th>
		<th class="col-md-5 col-xs-5">שם השירות</th>
		<th class="col-md-4 col-xs-4">פירוט</th>
		<th class="col-md-3 col-xs-3">ניהול</th>
    </tr>
	<tr class="warning no-result">
		<td colspan="4"><i class="fa fa-warning"></i>אין תוצאות</td>
	</tr>
  </thead>
  <tbody>
							<?php
								$counter = 1;
								$qRecommended = $mysqli->query("SELECT * FROM `".PREFIX."_services`");
								while($Data = $qRecommended->fetch_assoc())
								{
							?>
							<tr>
								<th scope="row"><?= $counter ?></th>
								<th><?= $Data['name'] ?></th>
								<th><span class="more"><?= $Data['content'] ?></span></th>
								<th><a <?= "onClick=\"javascript: return confirm('האם אתה בטוח שברצונך למחוק המלצה זו?');\" href='index.php?act=editpages&what=services&do=remove&id= {$Data['id']}' " ?>  aria-label="מחיקה" class="hint--top editsvg"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 59 59" xml:space="preserve"><path d="M29.5 51c0.6 0 1-0.4 1-1V17c0-0.6-0.4-1-1-1s-1 0.4-1 1v33C28.5 50.6 28.9 51 29.5 51zM19.5 51c0.6 0 1-0.4 1-1V17c0-0.6-0.4-1-1-1s-1 0.4-1 1v33C18.5 50.6 18.9 51 19.5 51zM39.5 51c0.6 0 1-0.4 1-1V17c0-0.6-0.4-1-1-1s-1 0.4-1 1v33C38.5 50.6 38.9 51 39.5 51zM52.5 6H38.5c-0.1-1.2-0.5-3.4-1.8-4.7C35.8 0.4 34.8 0 33.5 0H23.5c-1.3 0-2.3 0.4-3.1 1.3C19 2.6 18.7 4.8 18.5 6H6.5c-0.6 0-1 0.4-1 1s0.4 1 1 1h2l1.9 46C10.5 55.7 11.6 59 15.4 59h28.3c3.8 0 4.9-3.3 4.9-5L50.5 8H52.5c0.6 0 1-0.4 1-1S53.1 6 52.5 6zM21.8 2.7C22.2 2.2 22.8 2 23.5 2h10c0.7 0 1.3 0.2 1.7 0.7 0.8 0.8 1.1 2.3 1.2 3.3H20.6C20.7 5 21 3.5 21.8 2.7zM46.5 54C46.5 54.3 46.4 57 43.6 57H15.4c-2.7 0-2.9-2.7-2.9-3L10.5 8h37.9L46.5 54z"/></svg></a></th>
							</tr>
							<?php
								$counter++;
								}
							?>
							

						</tbody>
</table>
				</div>
			</div>
		</div>
	</div>
	<?php

	break;
	}
	?>