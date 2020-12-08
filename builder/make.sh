#!/bin/bash -e

FILESDATA=`cat ./files.txt`
PAGEFILE=(`cat ./files.txt | cut -f 1`)
PAGETITLE=(`cat ./files.txt | cut -f 2`)
ROOTPATH='../..'

# PHPファイルを基にHTMLファイルを生成
function build(){
	for pf in $PAGEFILE
	do
		php $pf.php > $ROOTPATH/$pf.html
	done
}

# 生成物であるHTMLファイルを/tmp/UNIQFILENAMEに移動
function clean(){
	for pf in $PAGEFILE
	do
		mv $ROOTPATH/$pf.html `mktemp`
	done
}

# 新しいページファイルの生成
function newfile(){
	cp parts/_template.php $1.php
	echo $1 >> $ROOTPATH/builder/files.txt
}
	
	#	<nav>
	#		<ul>
	#			<li><a href=index.html>トップページ</a></li>
	#			<li><a href=achieve.html>実績一覧</a></li>
	#			<li><a href=project.html>開発物</a></li>
	#		</ul>
	#	</nav>

function create(){
	if [ $1 == nav ]
	then 
		echo "<nav><ul>" > $ROOTPATH/builder/page/parts/nav.php
		echo "" >> $ROOTPATH/builder/page/parts/nav.php
		echo  ${#PAGEFILE[@]}
		for i in `seq 0 ${#PAGEFILE[@]}`
		do
			echo $PAGEFILE[$i]
		done
	fi
}


# echo $PAGEFILE
cd page
$@
