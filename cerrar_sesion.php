<?php
	@session_start();
		$_SESSION['k_nombre'] = "";
	@session_destroy();
	?>
	<script language="javascript">
		location.href = "index.html";
	</script>
