<!doctype html>
<html>

<head>
<?php include('./parts/head.php'); load_head('開発物');?>
<?php
	function project($user,$repo){
		return '<div class=object><a target=\'_blank\' href=\'https://github.com/'.$user.'/'.$repo.'\'><img src=\'https://github-readme-stats.vercel.app/api/pin/?username='.$user.'&repo='.$repo.'\'></a></div>';
	}
?>
</head>

<body>
	<div class=contents>
<?php include('./parts/nav.php'); ?>

		<article>
			<section>
				<h1>開発物の紹介</h1>
				<?= project('i13302','i13302.github.io'); ?>
				<?= project('i13302','learn'); ?>
				<?= project('i13302','JapLaTexImage'); ?>
				<?= project('i13302','latex-actions'); ?>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<hr>
			</section>
		</article>
	</div>
	<header>
		header
	</header>
	<footer>
		footer
	</footer>
</body>

</html>
