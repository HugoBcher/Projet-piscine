<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
    session_destroy();
	echo '<meta http-equiv="refresh" content="0;URL=login_page.html">';
	?>
</body>
</html>