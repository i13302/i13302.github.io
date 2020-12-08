#!/bin/bash -e

FILESDATA=`cat ./files.txt`
PAGEFILE=(`cat ./files.txt | cut -f 1`)
PAGETITLE=(`cat ./files.txt | cut -f 2`)
ROOTPATH='../..'

# PHPファイルを基にHTMLファイルを生成
function build(){
	for pf in ${PAGEFILE[@]}
	do
		php $pf.php > $ROOTPATH/$pf.html 
	done
}

# 生成物であるHTMLファイルを/tmp/UNIQFILENAMEに移動
function clean(){
	for pf in ${PAGEFILE[@]}
	do
		mv $ROOTPATH/$pf.html `mktemp`
	done
}

# 新しいページファイルの生成
function newfile(){
	cp parts/_template.php $1.php
	echo $1 >> $ROOTPATH/builder/files.txt
}

function create(){
	if [ $1 == nav ]
	then 
		echo '<nav><ul>' > $ROOTPATH/builder/page/parts/nav.php
		for i in `seq 0 $(expr ${#PAGEFILE[@]} - 1)`
		do
			echo '<li><a href='${PAGEFILE[$i]}'.html>'${PAGETITLE[$i]}'</a></li>' >> $ROOTPATH/builder/page/parts/nav.php
		done
		echo '</ul></nav>' >> $ROOTPATH/builder/page/parts/nav.php
	fi
	
}


# echo $PAGEFILE
cd page
$@
