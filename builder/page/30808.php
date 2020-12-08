<!doctype html>
<html>

<head>
	<meta charset='utf-8'>
	<title>i13302/SLPアドベントカレンダー2020</title>
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<link rel="stylesheet" type="text/css" href="style/sidebar.css">
	<link rel="stylesheet" type="text/css" href="style/object.css">
	<meta name="viewport" content="width=device-width">
	<style type=text/css>
		code{
			background-color: wheat;
			padding-left:0.5em;
			padding-right: 0.5em;
		}
	</style>
</head>

<body>
	<div class=contents>
<?php include('./parts/nav.php'); ?>

		<article>
			<section>
				<p>目次</p>
				<!-- <ul> -->
			</section>
			<section>
				<h1>SLPアドベントカレンダー2020</h1>
				<h2>はじめに</h2>
				<p>この記事は，<a href='https://adventar.org/calendars/5402'>SLP KBIT Advent Calendar 2020 - Adventar</a> の5日目(12月5日)の記事です．<br>
				公開が遅くなり，ごめんなさい．</p>
				
				<p>今までの日を見ますと，皆様かなり本格的な内容を紹介していますね．<br>
				本日紹介する内容は，技術的にはそこまで大したものではありません．<br>
				ただ，実際にちょろっと使って便利だったので紹介する感じです．</p>
				
				<h2>紹介</h2>
				<p>リポジトリは <a href='https://github.com/i13302/latex-actions'>i13302/latex-actions</a> です．</p>
				
				<p>本日は，GitHub ActionsとDockerfileを用いたLaTeXの論文執筆テンプレートを紹介します．</p>
				
				<p>12月にもなると，卒論や修論，はたまた学会の全国大会論文の締切が現実味を帯びてきますよね．<br>
				理系の学生は，LaTeXで論文を執筆し，Git管理する人が多いかと思います(偏見！)．<br>
				しかし，以下の課題を感じる人が多いかと思います．</p>
				<ol>
					<li>現在の最新版はビルドできるのか．</li>
					<li>第2著者が書いた部分はビルドできるのか．</li>
					<li>論文PDF(生成物)が欲しいとき，プロジェクトをCloneしてビルドするのが面倒．</li>
				</ol>
				
				<p>そこで，LaTeXのビルドと生成したPDFの配布を，GitHub Actionsを使って自動化します．<br>
				これで，課題は以下の様に解決できます．</p>
				<ol>
					<li>ActionsがPassしているので安全！</li>
					<li>ActionsがPassしているので安全！</li>
					<li>Actionsで勝手にビルドして配布！</li>
				</ol>
				
				<p>さあ，皆さんも論文執筆を頑張りましょう！</p>
				
				<h2>できること</h2>
				<p>さて，このシステム？では何ができるのでしょうか．<br>以下のように実際に執筆する流れで説明します．</p>
				<h3>執筆</h3>
				<p>執筆ブランチ(<code>Chap/**</code>)で章ごとに執筆します．<br>
				執筆のcommitに一区切りが付くとpushします．<br>
				pushするとGitHub Actionsが作動し，ビルドします．<br>
				これにより執筆ブランチ毎のビルドの可否が担保されます．</p>
				<h3>結合</h3>
				<p>結合ブランチ(<code>develop</code></p>
					
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
