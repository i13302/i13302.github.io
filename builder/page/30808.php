<!doctype html>
<html>

<head>
	<meta charset='utf-8'>
	<title>i13302/SLPアドベントカレンダー2020</title>
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<link rel="stylesheet" type="text/css" href="style/sidebar.css">
	<link rel="stylesheet" type="text/css" href="style/object.css">
	<meta name="viewport" content="width=device-width">
	<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"?skin=sunburst"></script>
	<style type=text/css>
		code.word{
			background-color: wheat;
			margin-left: 0.2em;
			margin-right: 0.2em;
			padding-left:0.5em;
			padding-right: 0.5em;
		}
		
		pre.srccode{
			margin-left: 2em;
			margin-right: 10em;
			background-color: white;
		}
		
		ol.list_parentheses{
			padding:0 0 0 2em;
			margin:0;
		}	
		ol.list_parentheses li{
			list-style-type:none;
			list-style-position:inside;
			counter-increment: cnt;
		}
		ol.list_parentheses li:before{
			display: marker;
			content: "(" counter(cnt) ") ";
		}
		
		span.sred{
			color: red;
			text-decoration: line-through;
		}
		
		.black{
			color:black;
		}
	</style>
</head>

<body>
	<div class=contents>
<?php include('./parts/nav.php'); ?>

		<article>
			<section>
				<h1>目次</h1>
<?php include('./parts/table_of_contents/30808.php'); ?>
			</section>
			<section>
				<h1>SLPアドベントカレンダー2020</h1>
				<h2>はじめに</h2>
				<p>この記事は，<a href='https://adventar.org/calendars/5402'>SLP KBIT Advent Calendar 2020 - Adventar</a> の5日目(12月5日)の記事です．<br>
				公開が遅くなり，ごめんなさい．</p>
				
				<p>今までの日を見ますと，皆様かなり本格的な内容を紹介していますね．<br>
				本日紹介する内容は，技術的にはそこまで大したものではありません．<br>
				ただ，ちょろっと試しに作って使ってみて，便利だったので紹介する感じです．</p>
				
				<p>本日は，GitHub ActionsとDockerfileを用いたLaTeXの論文執筆テンプレートを紹介します．<br>
				カンのいい人なら，「Dockerfile要らなくね？直接Docker pullすれば良くない？」と気づくでしょう．<br>
				しかし，論文執筆時は，カスタムすることも多いでしょうから，敢えてこのようにしています．
				</p>
				
				<h2>概要</h2>
				<p>リポジトリは <a href='https://github.com/i13302/latex-actions'>i13302/latex-actions</a> です．</p>
				
				<p>12月にもなると，卒論や修論，はたまた学会の全国大会論文の締切が現実味を帯びてきますよね．<br>
				理系の学生は，<a href='https://ja.wikipedia.org/wiki/LaTeX'>LaTeX</a>で論文を執筆し，Git管理する人が多いかと思います(偏見！)．<br>
				一般的に論文は以下の流れで執筆することが多いと思います．</p>
				<ol class=list_parentheses>
					<li>章ごとに執筆</li>
					<li>結合して1枚の論文に</li>
					<li>指導教員等に提出</li>
					<span class=sred><li class=black>真っ赤になって返却</li></span>
				</ol>
				
				<p>その過程で，以下の課題を感じる人が多いかと思います．</p>
				<ol class=list_parentheses>
					<li>現在の最新版はビルドできるのか．</li>
					<li>第2著者が書いた部分はビルドできるのか．</li>
					<li>論文PDF(生成物)が欲しいとき，プロジェクトをCloneしてビルドするのが面倒．</li>
				</ol>
				
				<p>そこで，LaTeXのビルドと生成したPDFの提出を，<a href='https://github.co.jp/features/actions'>GitHub Actions</a>(以下，Actions)を使って自動化します．<br>
				これで，課題は以下の様に解決できます．</p>
				<ol class=list_parentheses>
					<li>ActionsがPassしているので安全！</li>
					<li>GitがマージしてActionsがPassしているので安全！</li>
					<li>Actionsで勝手にビルドして提出！</li>
				</ol>
				<img src='./pic/30808/actions.png'>
				
				<p>さあ，皆さんも論文執筆を頑張りましょう！</p>
				
				<h2>できること</h2>
				<p>さて，このシステム？では何ができるのでしょうか．<br>以下のように実際に執筆する流れで説明します．</p>
				
				<h3>執筆</h3>
				<p>執筆ブランチ(<code class=word>Chap/**</code>)で章ごとに執筆します．<br>
				論文によっては，章ごとに違う人が執筆することもあるかもしれません．<br>
				執筆のcommitに一区切りが付くとpushします．<br>
				pushするとActionsが作動し，ビルドします．<br>
				これにより執筆ブランチ毎のビルドの可否が担保されます．</p>
				<img src='./pic/30808/branch_chap.png'>
				
				<h3>結合</h3>
				<p>結合ブランチ(<code class=word>develop</code>)にて各章を結合する．<br>
				Actionsが1つの論文の固まりとして，ビルドします．<br>
				論文としてPDFが生成できることが担保されます．</p>
				<img src='./pic/30808/branch_develop.png'>
				
				<h3>提出</h3>
				<p>提出ブランチ(<code class=word>master</code>)にて提出用のPDFを生成する．<br>
				Actionsがビルドした結果をReleaseとして公開してくれます．<br>
				指導教員に提出するときは，GitHubのRelease画面からPDFをダウンロードして，メールなりSlackなりで提出するだけです．</p>
				<img src='./pic/30808/release.png'>
				
				<span class=sred>
					<span class=black>
						<h3>修正</h3>
						<p>執筆ブランチに戻って，修正しましょう．</p>
					</span>
				</span>
				
				<h2>仕組み</h2>
				<p>さて，仕組み...というか，どのように動作しているかを述べます．</p>
				<p><a href=https://github.com/i13302/latex-actions/tree/master/.github><code class=word>./github</code>ディレクトリ</a>を見てみてください．<br>
				3つのサブディレクトリ(<code class=word>docker</code><code class=word>scripts</code><code class=word>workflows</code>)があります．</p>
				<p>Actionsはイベントが起こったときに，このディレクトリ内を探索します．</p>
				<p>ここで，このプロジェクトはいくつのイベントで作成されているか考えると，以下の2つですね．</p>
				<ol>
					<li>執筆ブランチと結合ブランチへのpush時のビルド</li>
					<li>提出ブランチでのpush時のビルドとリリース作成</li>
				</ol>
				<p>では，それぞれ見てみましょう．</p>
				
				<h3>執筆ブランチと結合ブランチへのpush時のビルド</h3>
				<p>では，1つ目について見ましょう．<br>
				<code class=word>push.yml</code>を見てください．<p>
				<p><a href='https://github.com/i13302/latex-actions/blob/644277ecfd564d9255172ff4919bdf1b65bbf03a/.github/workflows/push.yml#L6'>6行目</a>から以下のように記述されています．<br>
				まあ，なんとなくわかるのですが，単にどのブランチにどうされたときにイベントが走るのか記述されています．</p>
				
				<p><a href='https://github.com/i13302/latex-actions/blob/master/.github/workflows/push.yml'>push.yml</a></p>
<pre class="prettyprint srccode">
<code>on:
	push:
		branches:
			- Chap/** 
			- develop</code>
</pre>
				<p>それでは，次に<a href='https://github.com/i13302/latex-actions/blob/644277ecfd564d9255172ff4919bdf1b65bbf03a/.github/workflows/push.yml#L13'>12行目</a>を見てみましょう．</p>
				<p><code class=word>runs-on</code>では，どのような環境で動作するか決めています．<br>
				ここでは，ubuntuの最新版にしていますが，macOSやWindows Serverも選べるようです．<br>
				(<a href='https://docs.github.com/ja/free-pro-team@latest/actions/reference/workflow-syntax-for-github-actions#jobsjob_idruns-on'>GitHub Actionsのワークフロー構文 - GitHub Docs </a>)</p>

				<p><a href='https://github.com/i13302/latex-actions/blob/master/.github/workflows/push.yml'>push.yml</a></p>
<pre class="prettyprint srccode">
<code>jobs:
	# This workflow contains a single job called "build"
	push:
	# The type of runner that the job will run on
	runs-on: ubuntu-latest</code></pre>
				<p>最後に，<a href='https://github.com/i13302/latex-actions/blob/644277ecfd564d9255172ff4919bdf1b65bbf03a/.github/workflows/push.yml#L20'>20行目</a>を見てみてください．</p>
				<p><code class=word>steps</code>では処理する順序や内容を決めています．<br>
				1stepは，<code class=word>name</code>(説明)と<code class=word>uses</code>(動作)で構成されています．<br>
				まず，<code class=word>actions/checkout@v2</code>は，まあ正直おまじないです．<br>
				プロジェクトのソースコードをチェックアウトして使用することができます．<br>
				ブランチの指定やcommit，pushをすることもできます．</p>
				
				<p><a href='https://github.com/i13302/latex-actions/blob/master/.github/workflows/push.yml'>push.yml</a></p>
<pre class="prettyprint srccode">
<code>	steps:
		# Checks-out your repository under $GITHUB_WORKSPACE, so your job can access it
		- name: Set up Git Repository
		uses: actions/checkout@v2
		- name: Build Step
		uses: ./.github/docker</code></pre>
		
				<p>次の，<code class=word>./.github/docker</code>は指定パスにある，<code class=word>action.yml</code>ファイルを実行します．<br>
				即ち，<code class=word>./github/docker/action.yml</code>ですね．</p>

				<h4><a href='https://github.com/i13302/latex-actions/blob/master/.github/docker/action.yml'>actions.yml</a>の中身</h4>
				<p>ここでは，<code class=word>runs</code>の中身が実行されます．<br>
				Dockerを使うときには，<code class=word>using: 'docker'</code>を指定し，Docker イメージを指定します．<br>
				コマンドライン引数は，<code class=word>args</code>で渡すことができます．</p>
				<p>ここでは，LaTeXをビルドするイメージを<a href='https://github.com/i13302/latex-actions/blob/master/.github/docker/Dockerfile'>Dockerfile</a>と<a href='https://github.com/i13302/latex-actions/blob/master/.github/docker/entrypoint.sh'>entrypoint.sh</a>で書いています．</p>
				
				<p>また，Docker以外にも，JavaScriptや複合実行ができるようです．<br>
				(<a href='https://docs.github.com/ja/enterprise-server@2.22/actions/creating-actions/metadata-syntax-for-github-actions#javascript%E3%82%A2%E3%82%AF%E3%82%B7%E3%83%A7%E3%83%B3%E3%81%AE%E3%81%9F%E3%82%81%E3%81%AEruns'>GitHub Actionsのメタデータ構文 - GitHub Docs </a>)</p>

				<p><a href='https://github.com/i13302/latex-actions/blob/master/.github/docker/action.yml'>action.yml</a></p>
<pre class="prettyprint srccode">
<code>runs:
	using: 'docker'
	image: 'Dockerfile'
	args: 
		- "paper.tex"</code></pre>
				
				<p>あとは，普通にDockerfileがDocker ビルドされて，イメージを起動します．</p>
				
				<p>Dockerfileを敢えて使っている理由は，単にローカルのビルド環境と合わせやすいからです．<br>
				また，目的とする卒論や学会などに合わせてカスタムした，bstファイルやstyを梱包するときは，Dockerファイルをカスタムします．．<br>
				まあ，詳しくは省略します．気が向いたらそのうち追記するかも...
				</p>
				
				
				
				<h3>提出ブランチでのpush時のビルドとリリース作成</h3>
				
				
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
