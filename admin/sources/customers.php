<?php
	if (!isset($_GET['do']) || empty($_GET['do']))
		$_GET['do'] = null;
	
	switch($_GET['do'])
	{
		
		case "edit":
			include "edit-customers.php";
		break;
		case "view":
			include "view-customers.php";
		break;
		case "delete":
			if (!isset($_GET['id']) OR empty($_GET['id'])) $_GET['id'] = null;

			$id = secur($_GET['id'],"int");
			$query = $mysqli->query("SELECT * FROM `".PREFIX."_members` WHERE `id`='".$id."'");
			if ($query->num_rows == 0)
				die(' <meta http-equiv="Refresh" content="0; url=index.php?act=customers">');
			
			$query = $mysqli->query("DELETE FROM `".PREFIX."_members` WHERE `id`='".$id."'");
			die(' <meta http-equiv="Refresh" content="0; url=index.php?act=customers">');
			
		break;
		
		default:
		
			if (!isset($_GET['filter']) || empty($_GET['filter']))
				{		
					$_GET['filter'] = -1;
				}
				
				
				$filter = secur($_GET['filter'],"int");
				if($filter != -1 && $filter != 1 && $filter !=2)
					$filter = -1;
				$filter = ($filter == -1) ? "" : "WHERE `level`='".(int) $filter."'";

?>
 <script>
$(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' תוצאות');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
		  });
});
 </script>
	<div id="left-side">
		<div class="container">
			<div class="block">
				<div class="block-title">
					<h1>ניהול לקוחות</h1>
					<div class="input-field">
						<input type="text" class="search" placeholder="חיפוש משתמשים...">
					</div>
<span class="counter"></span>
				</div>
				<div class="block-inner">

					<table class="table table-hover table-bordered results">
  <thead>
    <tr>
		<th>#</th>
		<th class="col-md-4 col-xs-4">שם מלא</th>
		<th class="col-md-3 col-xs-3">סטטוס</th>
		<th class="col-md-3 col-xs-3">תאריך הצטרפות</th>
		<th class="col-md-3 col-xs-3">ניהול</th>
    </tr>
	<tr class="warning no-result">
		<td colspan="4"><i class="fa fa-warning"></i>אין תוצאות</td>
	</tr>
  </thead>
  <tbody>
							<?php
								$qGetMembers = $mysqli->query("SELECT * FROM `".PREFIX."_members` {$filter} ORDER BY `id` ASC ");
								$sum = 0;
								while($qGetMembersData = $qGetMembers->fetch_assoc())
								{
								$sum++;	
									if ($qGetMembersData['status'] == 0)
									{
										$sStatus = "<span style='font-weight: bold;color: #ffc107;'>חשבון מושהה</span>";
									}
									else {
										$sStatus = "<span style='font-weight: bold;color: green;'>חשבון פעיל</span>";
									}
							?>
							<tr>
								<th scope="row"><?= $sum ?></th>
								<th><?= $qGetMembersData['firstname']." ".$qGetMembersData['lastname']?></th>
								<th><?= $sStatus ?></th>
								<th class="hint--top" aria-label="<?= date("j", $qGetMembersData['registration_date']). " " .$mons[date("m", $qGetMembersData['registration_date'])] . " " . date("Y, בשעה H:i:s", $qGetMembersData['registration_date']) ?>"><?= ago($qGetMembersData['registration_date']) ?></th>
								<th><a href="index.php?act=customers&do=edit&id=<?= $qGetMembersData['id'] ?>" aria-label="עריכה" class="editsvg hint--top"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 55.3 55.3" xml:space="preserve"><path d="M52.6 2.6c-3.5-3.5-9.2-3.5-12.7 0L3.8 38.7C3.8 38.7 3.8 38.7 3.8 38.7c0 0 0 0.1-0.1 0.1 -0.1 0.1-0.1 0.2-0.1 0.2 0 0 0 0 0 0.1 0 0 0 0 0 0l-3.5 14.9c0 0.1 0 0.1 0 0.2C0 54.2 0 54.2 0 54.3c0 0.1 0 0.2 0.1 0.3 0 0 0 0 0 0.1 0 0.1 0.1 0.2 0.2 0.3 0.1 0.1 0.2 0.2 0.3 0.2 0.1 0.1 0.3 0.1 0.4 0.1 0.1 0 0.2 0 0.2 0l14.9-3.5c0 0 0.1 0 0.1 0 0 0 0.1 0 0.1 0 0.1 0 0.1-0.1 0.2-0.1 0 0 0 0 0.1-0.1 0 0 0 0 0 0l36.1-36.1C56.1 11.9 56.1 6.1 52.6 2.6zM51.2 4c2.5 2.5 2.7 6.4 0.7 9.1l-9.8-9.8C44.8 1.3 48.7 1.6 51.2 4zM46.3 18.9l-9.9-9.9 1.4-1.4 9.9 9.9L46.3 18.9zM5 50.3c-0.4-0.4-1-0.4-1.4 0L2.8 51l2.6-10.7 4.4-0.5 -0.6 5.1c0 0 0 0.1 0 0.1 0 0 0 0.1 0 0.1 0 0 0 0.1 0 0.1 0 0.1 0 0.1 0.1 0.2 0 0.1 0.1 0.1 0.1 0.2 0 0 0.1 0.1 0.1 0.1 0 0.1 0.1 0.1 0.2 0.1 0 0 0.1 0.1 0.1 0.1C9.8 46 9.9 46 10 46c0 0 0.1 0 0.1 0 0 0 0.1 0 0.1 0 0 0 0 0 0 0 0 0 0 0 0 0h0c0 0 0 0 0 0 0 0 0.1 0 0.1 0l5.1-0.6 -0.5 4.4L4.2 52.5l0.8-0.8C5.4 51.3 5.4 50.7 5 50.3zM17.5 44.8L39.9 22.4c0.4-0.4 0.4-1 0-1.4s-1-0.4-1.4 0L16.1 43.4l-4.8 0.5 0.5-4.8 22.4-22.4c0.4-0.4 0.4-1 0-1.4s-1-0.4-1.4 0L10.4 37.7l-3.2 0.4L34.9 10.4l9.9 9.9L17.2 48 17.5 44.8zM49.1 16.1l-9.9-9.9 1.4-1.4 9.9 9.9L49.1 16.1z"/></svg></a>										<a <?= "onClick=\"javascript: return confirm('האם אתה בטוח שברצונך למחוק משתמש זה מהמערכת');\" href='index.php?act=customers&do=delete&id=".$qGetMembersData['id']."' " ?> aria-label="מחיקה" class="hint--top editsvg"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 59 59" xml:space="preserve">
												<path d="M29.5 51c0.6 0 1-0.4 1-1V17c0-0.6-0.4-1-1-1s-1 0.4-1 1v33C28.5 50.6 28.9 51 29.5 51zM19.5 51c0.6 0 1-0.4 1-1V17c0-0.6-0.4-1-1-1s-1 0.4-1 1v33C18.5 50.6 18.9 51 19.5 51zM39.5 51c0.6 0 1-0.4 1-1V17c0-0.6-0.4-1-1-1s-1 0.4-1 1v33C38.5 50.6 38.9 51 39.5 51zM52.5 6H38.5c-0.1-1.2-0.5-3.4-1.8-4.7C35.8 0.4 34.8 0 33.5 0H23.5c-1.3 0-2.3 0.4-3.1 1.3C19 2.6 18.7 4.8 18.5 6H6.5c-0.6 0-1 0.4-1 1s0.4 1 1 1h2l1.9 46C10.5 55.7 11.6 59 15.4 59h28.3c3.8 0 4.9-3.3 4.9-5L50.5 8H52.5c0.6 0 1-0.4 1-1S53.1 6 52.5 6zM21.8 2.7C22.2 2.2 22.8 2 23.5 2h10c0.7 0 1.3 0.2 1.7 0.7 0.8 0.8 1.1 2.3 1.2 3.3H20.6C20.7 5 21 3.5 21.8 2.7zM46.5 54C46.5 54.3 46.4 57 43.6 57H15.4c-2.7 0-2.9-2.7-2.9-3L10.5 8h37.9L46.5 54z"/>
											</svg>
										</a>
</th>
							</tr>
							<?php
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