<?php
function load_head($title){
?>
	<meta name="viewport" content="width=device-width">
	<title>i13302/<?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<link rel="stylesheet" type="text/css" href="style/sidebar.css">
	<link rel="stylesheet" type="text/css" href="style/object.css">
	<meta charset="UTF-8">
	<meta http-equiv="content-language" content="ja">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-N53N1HQ5YW"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'G-N53N1HQ5YW');
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<?php
}
?>
