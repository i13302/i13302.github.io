#!/bin/bash

PAGEFILE='achieve index project'

# PHPファイルを基にHTMLファイルを生成
function build(){
	for pf in $PAGEFILE
	do
		php $pf.php > ../$pf.html
	done
}

# 生成物であるHTMLファイルを/tmp/UNIQFILENAMEに移動
function clean(){
	for pf in $PAGEFILE
	do
		mv ../$pf.html `mktemp`
	done
}

$1
