<!DOCTYPE html>
<html lang="vi_VN">
<head>
<style type="text/css" media="print">
    body { visibility: hidden; display: none }
</style>
	<?php $this->load->view("front/template/default/head.php");?>
</head>
<body oncopy="return false" oncut="return false" onpaste="return false">
	<?php $this->load->view("front/template/default/header.php");?>
	<?php echo $this->shortcodes->parse($content_for_layout);?>
	<?php $this->load->view("front/template/default/footer.php");?>
	<?php $this->load->view("front/template/default/totop.php");?>
	<?php $this->load->view("front/template/default/script.php");?>
	<script type="text/javascript">
		$(document).ready(function () {
				$("body").on("contextmenu",function(e){
					return false;
			});
			
			$("#id").on("contextmenu",function(e){
					return false;
			});
		});
		$(document).keydown(function (event) {
				if (event.keyCode == 123) { // Prevent F12
				return false;
			} else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
				return false;
			}
		});
	</script>
</body>
</html>
