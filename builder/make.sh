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

# 目次を生成
function table_of_contents(){
	mkdir -p parts/table_of_contents
	echo '<ul>' > parts/table_of_contents/$1.php
	for _h2 in $(cat $1.php |\
		grep -i '<h2>' |\
		sed -e 's/<[^>]*>//g' |\
		sed -e 's/\t*//g')
	do
		echo '<li>'$_h2'</li>' >> parts/table_of_contents/$1.php
	done
	echo '</ul>' >> parts/table_of_contents/$1.php
}


# echo $PAGEFILE
cd page
$@
