#!/usr/bin/env perl

use strict;
use warnings;
use utf8;
use Data::Dumper;

my %TITLE_BY_HTML={};
my $FILE_NAME

# &main($ARGV[1]);
sub load_file {
	
	open(DATA, ">", shift @_);

	my @data=<DATA>;

	foreach(@data){
		
	}

	close(DATA);
}

sub command_exe {
	my @cmd=&get_commnad_from_line_parse(shift @_);
	
	if($cmd[0] eq 'nav'){
		return &generate_nav;
	}
	if($cmd[0] eq 'title'){
		$TITLE_BY_HTML
	}
	
}

sub get_commnad_from_line_parse {
	my $line=shift @_;

	if($line=~/^\{\{\s*([a-zA-Z0-9]+)\(([a-zA-Z0-9]+)\)\s*\}\}$/){
		return ($1,$2);
	}
	die 'Command Error:'.$line.'.';
}
# print Dumper(&get_commnad_from_line_parse('{{ nav(0) }}'));
# &get_commnad_from_line_parse('{{ nav }');


sub generate_nav {
	my @file = glob "*.html";
	foreach(@file){
		
	}
	return ''
}
