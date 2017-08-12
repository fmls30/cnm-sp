#!/usr/bin/perl -w
#-------------------------------------------------------
# mon_dns
#-------------------------------------------------------
use lib "/opt/crawler/bin";
use Getopt::Std;
use Monitor;

# Informacion ------------------------------------------------------
my @fpth = split ('/',$0,10);
my @fname = split ('\.',$fpth[$#fpth],10);
my $USAGE = <<USAGE;
(c) fml

$fpth[$#fpth] -h : Ayuda
$fpth[$#fpth] -n host [-r recurso RR] [-p port] : Chequea dns

USAGE

# Parametros de entrada ---------------------------------------------
my %DESC=();
my %opts=();
getopts("hdn:r:p:",\%opts);

if ($opts{h}) { die $USAGE;}
elsif ($opts{n}) {
        $DESC{debug}=$opts{d};
        $DESC{host_ip}=$opts{n};
        $DESC{rr}=$opts{r};
}
else { die $USAGE;}

#--------------------------------------------------------------------
my $r=mon_dns(\%DESC);
#foreach (@$r) {print "$_\n";}

if ( ($opts{'v'}) || ($opts{'verbose'}) ) {
   if ($DESC{'rcstr'}) { print "RCSTR=$DESC{rcstr}\n";  }
   if ($DESC{'rcdata'}) { print "RCDATA=$DESC{rcdata}\n";  }
   if ($DESC{'elapsed'}) { print "ELAPSED=$DESC{elapsed}\n";  }
   if ($DESC{'ttl'}) { print "TTL=$DESC{ttl}\n";  }
}


print '<001> Tiempo de respuesta = '.$DESC{elapsed}."\n";
print '<002> TTL = '.$DESC{ttl}."\n";

