#!/usr/bin/perl -w
BEGIN { $main::MYHEADER = <<MYHEADER;
#--------------------------------------------------------------------
# <CNMDOCU>
# NAME:  linux_metric_www_base.pl
# AUTHOR:  fmarin\@s30labs.com
# DATE: 27/01/2015
# VERSION: 1.0
#
# DESCRIPTION:
# Obtiene metricas basadas en el contenido de una pagina WEB
#
# USAGE:
# linux_metric_www_base.pl -id 1
# linux_metric_www_base.pl -ip 86.109.126.250
# linux_metric_www_base.pl -n www -d s30labs.com
# linux_metric_www_base.pl -name www -domain s30labs.com
# linux_metric_www_base.pl -u http://www.s30labs.com -pattern cnm
# linux_metric_www_base.pl -u http://www.s30labs.com -l 
# linux_metric_www_base.pl -h
#
# -id
#      ID del dispositivo sobre el que se ejecuta el script. Los dispositivos deben tenere definido un campo URL de tipo listaa con las URLs a monitorizar.
# -n, -name  
#      Nombre del dispositivo sobre el que se ejecuta el script. Los dispositivos deben tenere definido un campo URL de tipo listaa con las URLs a monitorizar.
# -d, -domain  
#      Nombre del dispositivo sobre el que se ejecuta el script. Los dispositivos deben tenere definido un campo URL de tipo listaa con las URLs a monitorizar.
# -u, -url
#      URL sobre la que se hace la peticion
# -pattern
#      Patron de busqueda.  Contiene una cadena de texto que se busca dentro del contenido de la pagina.
# -v, -verbose 
#      Muestra informacion extra(debug)
# -h, -help    
#      Ayuda
# -l
#      Lista las metricas que obtiene (es necesario especificar u,url,n o id)
#
# </CNMDOCU>
#--------------------------------------------------------------------
MYHEADER
};
use lib "/opt/crawler/bin";
use Getopt::Long;
use Data::Dumper;
use CNMScripts;
use CNMScripts::CNMAPI;
use Net::Curl::Easy qw(:constants);
use JSON;
use File::Basename;
use Digest::MD5 qw(md5_hex);
use bytes;
use HTML::LinkExtor;
use Time::HiRes qw(gettimeofday tv_interval);

# Parametros de entrada ---------------------------------------------
my %DESC=();
my @ALL_URLS=();
my $host_name='';
my $log_level='info';
my %OPTS = ();
GetOptions (\%OPTS,  'h','help','v','verbose','n=s','name=s','d=s','domain=s','u=s','url=s','p=s','port=s','t=s','type=s','l',
							'iid=s', 'pattern=s', 'ip=s',
                     'use_realm','realm_user=s','realm_pwd=s','id=s',
                     'use_proxy','proxy_user=s','proxy_pwd=s','proxy_host=s','proxy_port=s')
            or die "$0:[ERROR] en el paso de parametros. Si necesita ayuda ejecute $0 -help\n";

my $SCRIPT=CNMScripts->new();

if ( ($OPTS{'help'}) || ($OPTS{'h'}) ) { 
   $SCRIPT->usage($main::MYHEADER);
   exit 1;
}

elsif (($OPTS{'u'}) || ($OPTS{'url'})) {

   if ($OPTS{'u'}) {  $DESC{'url'}=$OPTS{'u'}; }
   if ($OPTS{'url'}) { $DESC{'url'}=$OPTS{'url'}; }
   if ($DESC{'url'} =~ /^\d+\.\d+\.\d+\.\d+$/) { $DESC{'url'}="http://$DESC{'url'}";}
   if ($DESC{'url'} !~ /^http/) { $DESC{'url'}="http://DESC{'url'}";}
   push @ALL_URLS,$DESC{'url'};

}

elsif (	($OPTS{'id'}) || ($OPTS{'ip'}) || 
			($OPTS{'n'} && $OPTS{'d'}) || ($OPTS{'name'} && $OPTS{'d'}) || ($OPTS{'n'} && $OPTS{'domain'}) || ($OPTS{'name'} && $OPTS{'domain'}) ) {

	my $host_ip = 'localhost';
	my $api=CNMScripts::CNMAPI->new( 'host'=>$host_ip, 'timeout'=>10, 'log_level'=>$log_level );
	my ($user,$pwd)=('admin','cnm123');
	my $sid = $api->ws_get_token($user,$pwd);

	my ($class,$endpoint) = ('devices','');
  	if (exists $OPTS{'ip'}) { $endpoint = $OPTS{'ip'}.'.json'; }
   elsif (exists $OPTS{'id'}) { $endpoint = $OPTS{'id'}.'.json'; }
	else {
		my ($name,$domain)=('','');
		if (exists $OPTS{'n'}) { $name=$OPTS{'n'}; }
		elsif (exists $OPTS{'name'}) { $name=$OPTS{'name'}; }
		if (exists $OPTS{'d'}) { $domain=$OPTS{'d'}; }
		elsif (exists $OPTS{'domain'}) { $domain=$OPTS{'domain'}; }

		$class = '';
		$endpoint = 'devices.json?name='.$name.'&domain='. $domain;
	}
		
	my $response = $api->ws_get($class,$endpoint,{});

   if ($response->[0]->{'name'} eq '') {
      print STDERR "**ERROR** NO SE LOCALIZA EL DISPOSITIVO (class=$class endpoint=$endpoint)\n";
		$SCRIPT->log('info',"Termino...  NO SE LOCALIZA EL DISPOSITIVO (class=$class endpoint=$endpoint)");

   }

	if (exists $response->[0]->{'URL'}) {
		# OJO!! El caracter @ se interpreta en el eval como un array y el $ como escalar.
		$response->[0]->{'URL'} =~ s/@/\\@/g;	
		$response->[0]->{'URL'} =~ s/\$/\\\$/g;	
		my $url = eval($response->[0]->{'URL'});
		if ( ref($url) eq 'ARRAY') {
			foreach my $u (@{$url}) {push @ALL_URLS,$u; }
		}
	}
	#print Dumper($response);

}

elsif (! exists $OPTS{'l'}) {
   $SCRIPT->usage($main::MYHEADER);
   exit 1;
}

my $VERBOSE=0;
if ( ($OPTS{'verbose'}) || ($OPTS{'v'}) ) { $VERBOSE=1; }

$DESC{'pattern'} = '';
if ($OPTS{'pattern'}) { $DESC{'pattern'} = $OPTS{'pattern'}; }

if ($OPTS{'use_realm'}) {
   $DESC{'use_realm'}=$OPTS{'use_realm'};
   $DESC{'realm_user'}=$OPTS{'realm_user'};
   $DESC{'realm_pwd'}=$OPTS{'realm_pwd'};
}
if ($OPTS{'use_proxy'}) {
   $DESC{'use_proxy'}=$OPTS{'use_proxy'};
   $DESC{'proxy_user'}=$OPTS{'proxy_user'};
   $DESC{'proxy_pwd'}=$OPTS{'proxy_pwd'};
   $DESC{'proxy_host'}=$OPTS{'proxy_host'};
   $DESC{'proxy_port'}=$OPTS{'proxy_port'};
}
	

foreach my $iid (@ALL_URLS) {

   $DESC{'url'}=$iid;

	#--------------------------------------------------------------------
	my ($OO1, $OO2, $OO3, $OO4, $OO5) = ("001.$iid", "002.$iid", "003.$iid", "004.$iid", "005.$iid");

	my %TAGS=( 

		$OO1=>'T (sgs)', $OO2=>'Size', $OO3=>"Num. ocurrencias de \"$DESC{'pattern'}\"", $OO4=>'Return Code Type',  $OO5=>'Num. Links',

	);

	if ($OPTS{'l'}) {
   	foreach my $tag (sort keys %TAGS) { print "<$tag>\t$TAGS{$tag}\n"; }
   	exit 0;
	}

	#--------------------------------------------------------------------
	my $results=mon_http_base(\%DESC);

	#--------------------------------------------------------------------
	$SCRIPT->test_init($OO1,$TAGS{$OO1});
	$SCRIPT->test_init($OO2,$TAGS{$OO2});
	$SCRIPT->test_init($OO3,$TAGS{$OO3});
	$SCRIPT->test_init($OO4,$TAGS{$OO4});
	$SCRIPT->test_init($OO5,$TAGS{$OO5});
	$SCRIPT->test_done($OO1,$results->{'elapsed'});
	$SCRIPT->test_done($OO2,$results->{'size'});
	$SCRIPT->test_done($OO3,$results->{'pattern'});
	$SCRIPT->test_done($OO4,$results->{'rctype'});
	$SCRIPT->test_done($OO5,$results->{'nlinks'});

}

$SCRIPT->print_metric_data();

#--------------------------------------------------------------------
#--------------------------------------------------------------------
sub mon_http_base {
my $desc=shift;

	my %results=( 'elapsed'=>'U', 'size'=>'U', 'pattern'=>'U', 'rctype'=>'U', 'nlinks'=>'U');
   my $url=$desc->{'url'};
   my $url_mod=$url;
#   $url_mod=~s/http\:\/\///;
#   $url_mod=~s/https\:\/\///;
#   $url_mod=~s/\//-/g;

	my $t0 = [gettimeofday];
   my $elapsed = tv_interval ( $t0, [gettimeofday]);
   my $elapsed3 = sprintf("%.6f", $elapsed);
   $results{'elapsed'}=$elapsed3;

	my $easy = Net::Curl::Easy->new( { body => '', headers => '' } );
   my ($referer,$content,$status,$rc,$rcstr)=(undef,'','200 OK',0,0);
   eval {


#   	if ($desc->{'use_realm'}) {
#      	my $u=$desc->{'realm_user'};
#      	my $p=$desc->{'realm_pwd'};
#
#      	my $hh='';
#      	if ($url=~/^(http|https)+:\/\/(\S+:*\d*)\/.*$/) { $hh=$2; }
#      	#print "REALM>> url=$url hh=$hh U=$u P=$p\n";
#      	$lwpcurl->credentials( $hh, 'Some Realm', $u, $p  );
#   	}
#
#   	if ($desc->{'use_proxy'}) {
#      	$lwpcurl->proxy( $desc->{'scheme'}, $desc->{'proxy_url'} );
#   	}

#      $content = $lwpcurl->get($url_mod, $referer);
#		$desc->{'rc'} = $lwpcurl->{'retcode'};
#
#  		my @links = $content->links();
#   	$desc->{'nlinks'} = scalar @links;

		$easy->setopt( CURLOPT_URL, $url_mod);
		$easy->setopt( CURLOPT_VERBOSE, $VERBOSE );
    	$easy->setopt( CURLOPT_WRITEHEADER, \$easy->{headers} );
    	$easy->setopt( CURLOPT_FILE, \$easy->{body} );


#    $easy->setopt( CURLOPT_TIMEOUT, 300 );
    $easy->setopt( CURLOPT_CONNECTTIMEOUT, 10 );
#    $easy->setopt( CURLOPT_MAXREDIRS, 20 );
#    $easy->setopt( CURLOPT_FOLLOWLOCATION, 1 );
#    $easy->setopt( CURLOPT_ENCODING, 'gzip,deflate' ) if $has_zlib;
#    $easy->setopt( CURLOPT_SSL_VERIFYPEER, 0 );
#    $easy->setopt( CURLOPT_COOKIEFILE, '' );
#    $easy->setopt( CURLOPT_USERAGENT, 'Irssi + Net::Curl' );

		$SCRIPT->log('debug',"GET url=$url_mod");

		$easy->perform();

   };
   if ($@) { 
		print STDERR "**ERROR** EN GET url=$url ($@)\n"; 
		$SCRIPT->log('info',"**ERROR** EN GET url=$url ($@)");
		return \%results;
	}

   $elapsed = tv_interval ( $t0, [gettimeofday]);
   $elapsed3 = sprintf("%.6f", $elapsed);
   $results{'elapsed'}=$elapsed3;

	$content = $easy->{'body'};
	my $count=0;
	if ($DESC{'pattern'}) {
		while ($content =~ /$DESC{'pattern'}/g) { $count++ }
		$results{'pattern'} = $count;
	}
	else { $results{'pattern'} = 0; }

	$results{'size'} = bytes::length($content);

	if ($easy->{'headers'} =~/HTTP\/\d+\.\d+ (\d+) (.+?)\r\n/g) {
		$results{'rc'} = $1;
		$results{'rcstr'} = $2;
		chomp $results{'rcstr'};
		$results{'rctype'} = int ($results{'rc'}/100);
	}

	my $parser = HTML::LinkExtor->new();
	$parser->parse($content);
	my @links = $parser->links();
	$results{'nlinks'} = scalar(@links);

	if ($VERBOSE) { print Dumper(\%results); }

	return \%results;
}

