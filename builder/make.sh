#!/bin/bash -e

PAGEFILE=`cat ./files.txt`
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


# echo $PAGEFILE
cd page
$@
