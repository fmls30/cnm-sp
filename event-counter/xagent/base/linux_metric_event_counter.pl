#!/usr/bin/perl -w
BEGIN { $main::MYHEADER = <<MYHEADER;
#--------------------------------------------------------------------
# <CNMDOCU>
# NAME:  linux_metric_event_counter.pl
# AUTHOR: <fmarin\@s30labs.com>
# DATE: 26/03/2018
# VERSION: 1.0
#
# DESCRIPTION:
# Cuenta los eventos recibidos en la tabla logp_xxx especificada en app durante el intervalo especificado en lapse (now-lapse) y que cumplen con  el patron especificado en pattern. 
# Si no se especifica pattern, se cuentan todos los eventos.
# Lapse se indica en minutos. Por defecto son 60 min.
#
# USAGE:
# linux_metric_event_counter.pl -app 333333000006 -lapse 120 -pattern '"MDW_Alert_Type":"MAT"' [-v]
# linux_metric_event_counter.pl -app 333333000006 -lapse 120 -pattern 'MDW_Alert_Type|eq|MAT' -json [-v]
# linux_metric_event_counter.pl -app 333333000006 -lapse 120 -pattern 'TRANSCOLA|gt|10&AND&MDW_Alert_Type|eq|MAT' -json [-v]
# linux_metric_event_counter.pl -syslog ip -lapse 120 -pattern 'FTP.Login.Failed' [-v]
# linux_metric_event_counter.pl -trap ip|id_dev|name.domain -lapse 120 -pattern 'FTP.Login.Failed' [-v]
# linux_metric_event_counter.pl -h  : Help
#
# -host       : Host al que se asocia la metrica 
# -app        : ID de la app. 
# -syslog     : IP del equipo que envia por syslog. 
# -trap       : IP|id_dev|name.domain del equipo que envia el trap. 
# -lapse      : Intervalo seleccionado referenciado desde el instante actual (now-lapse). Se especifica en minutos. Por defecto 60.
# -pattern    : Patron de busqueda. Por defecto se cuentan todos los eventos.
# -json       : Decodifica la linea en JSON. Permite condiciones mas complejas. 
#               En este caso pattern puede ser una lista de condiciones separadas por &AND& o &OR&
#               Cada condicion es del tipo: TRANSCOLA|gt|10 o ERRORMSG|eq|"" -> key|operador|value
#               Los operadores soportados son: gt, gte, lt, lte, eq, ne
# -v/-verbose : Verbose output (debug)
# -h/-help    : Help
#
# OUTPUT:
# <001> Event Counter = 6
#
# </CNMDOCU>
#--------------------------------------------------------------------
MYHEADER
};
use lib '/opt/crawler/bin/';
use strict;
use warnings;
use Getopt::Long;
use CNMScripts::Events;
use Data::Dumper;
use JSON;
use Encode qw(encode_utf8);

#--------------------------------------------------------------------
#--------------------------------------------------------------------
my $script = CNMScripts::Events->new();
my %opts = ();
my $ok=GetOptions (\%opts,  'h','help','v','verbose','app=s','lapse=s','pattern=s','host=s', 'json' );
if (! $ok) {
	print STDERR "***ERROR EN EL PASO DE PARAMETROS***\n";	
	$script->usage($main::MYHEADER); 
	exit 1;
}

my $VERBOSE = ((defined $opts{'v'}) || (defined $opts{'verbose'})) ? 1 : 0;

if ( ($opts{'h'}) || ($opts{'help'})) { $script->usage($main::MYHEADER); }

my $LAPSE = (defined $opts{'lapse'}) ? $opts{'lapse'} : 60;				# 60 minutes

my $PATTERN = (defined $opts{'pattern'}) ? $opts{'pattern'} : '';   # SELECT ALL

if ($VERBOSE) {
   print "PARAMETERS *****\n";
   print Dumper (\%opts);
   print "*****\n";
}

#--------------------------------------------------------------------
my $dbh = $script->dbConnect();

my ($value, $info, $last_ts, $last_ts_lapse) = ('U','UNK','U',0);
if ($opts{'app'}) {

	if (defined $opts{'json'}) {
		($value, $info, $last_ts)  = $script->get_application_events_json($dbh, {'id_app'=>$opts{'app'}, 'pattern'=>$PATTERN, 'lapse'=>$LAPSE});
	}
	else {
		($value, $info, $last_ts)  = $script->get_application_events($dbh, {'id_app'=>$opts{'app'}, 'pattern'=>$PATTERN, 'lapse'=>$LAPSE});
	}
	if ($script->err_num() != 0) { print STDERR $script->err_str(),"***\n"; }

}
elsif ($opts{'trap'}) {  

}
elsif ($opts{'syslog'}) { 

}
else { $script->usage($main::MYHEADER); }


$script->dbDisconnect($dbh);
#--------------------------------------------------------------------
#--------------------------------------------------------------------
%CNMScripts::RESULTS=();
$last_ts_lapse = ($last_ts eq 'U') ? 0 : int((time()-$last_ts)/60);
$script->test_init('001', "Event Counter");
$script->test_init('002', "Last ts (seg)");
$script->test_init('003', "Last ts lapse (min)");
$script->test_done('001',$value);
$script->test_done('002',$last_ts);
$script->test_done('003',$last_ts_lapse);
$script->print_metric_data();

if ($info ne 'UNK') {

	#Se escapan comillas en los valores del vector json
	my $json = JSON->new();
	my $info1 = encode_utf8($info);
	my $vinfo = validate_json($info1);
#$vinfo = $info;
	my $event_info = {};
	eval {
		$event_info = decode_json($vinfo);
	};
	if (! $@) {
		if (exists $event_info->{'extrafile2'}) { 
			print "[001][extrafile2]$event_info->{'extrafile2'}\n";
		}
      elsif (exists $event_info->{'0extrafile2'}) {
         print "[001][0extrafile2]$event_info->{'0extrafile2'}\n";
      }
	}
	#else { print "**ERROR** ($@)\n"; print "$vinfo\n"; }
	#print Dumper($event_info);
}
exit 0;

#--------------------------------------------------------------------
# validate_json
# Simple validation of JSON hash. Escapes double quotes in hash value
#--------------------------------------------------------------------
sub validate_json {
my ($json)=@_;

	$json =~ s/^\{(.+)\}$/$1/;
	my @parts = split (/"\s*,\s*"/, $json );
	my @new_parts = ();
	foreach my $p (@parts) {
   	my ($k,$v) = split (/"\s*:\s*"/, $p );
		$k=~s/^\"(.+)\"$/$1/;
		$k=~s/"/\\"/g;
#print "**$k | ";
      $v=~s/^\"(.+)\"$/$1/;
      $v=~s/"/\\"/g;
#print "$v**\n";
      push @new_parts, "\"$k\":\"$v\"";
   }
   return '{'.join(',',@new_parts).'}';

#{"DAYVALIDATIONDATE":"\\"20180606\\""
#,
#"MANDT":"\\"800\\""
#,
#
#   	$k=~s/^\{"(.+)$/$1/;
#   	$v=~s/^(.+)"\}$/$1/;
#   	$v=~s/"/\\"/g;
#	   #print "$k  :  $v\n";
#   	push @new_parts, "\"$k\":\"$v\"";
#	}
#	return '{'.join(',',@new_parts).'}';

}

