	<div id="turing-panel-blur" class="mobile"></div>
	<div id="mobilemenu" class="mobile">
		<ul>
			<li><a href="#">לובי</a></li>
			<li><a href="#">מסמכים</a></li>
			<li><a href="#">לקוחות</a></li>
			<li><a href="#">דוחות</a></li>
		</ul>
	</div>
	</body>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.input-field input').focus(function() {
				$(this).parent().find('label').addClass('active');
			});	
			
			$('.input-field input').blur(function() {
				if($(this).val().length >= 1) {
					
				} else {
					$(this).parent().find('label').removeClass('active');
				}
			});	
			
			$('.modal-close').click(function() {
				$('.modal').fadeOut("slow");
			});	
			
			$('.input-field textarea').focus(function() {
				$(this).parent().find('label').addClass('active');
			});	
			
			$('.input-field textarea').blur(function() {
				if($(this).val().length >= 1) {
					
				} else {
					$(this).parent().find('label').removeClass('active');
				}
			});	
			
			$('.input-field select').focus(function() {
				$(this).parent().find('label').addClass('active');
			});	
			
			var selempty = 0;
			
			$('.input-field select').blur(function() {
				if(selempty == 1) {
					$(this).parent().find('label').removeClass('active');
				} else {
				}
			});	

			$('.input-field select').change(function() {
				if($(this).children(":selected").val() == "") {
					selempty = 1;
				} else {
					selempty = 0;
				}
			});
			
			$('#header-left div').click(function() {
				$(this).find('ul').slideToggle("slow");
			});
			
			$('#header-menubutton').click(function() {
				$('#mobilemenu').slideToggle("slow");
				$('#turing-panel-blur').fadeIn("slow");
			});
			
			$('#turing-panel-blur').click(function() {
				$('#mobilemenu').slideToggle("slow");
				$('#turing-panel-blur').fadeOut("slow");
			});
			
			var xwindow = $(window).width();
			if(xwindow <= 768) {
				$('.hint--left').addClass('hint--top');
				$('.hint--left').removeClass('hint--left');
			}
		});
	</script>
</html>