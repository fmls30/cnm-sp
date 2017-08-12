#!/usr/bin/perl -w
#-------------------------------------------------------
# Fichero: $Id: mon_imap,v 1.2 2004/02/18 13:22:30 fml Exp $
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
$fpth[$#fpth] -n host -u user -c password [-p port] : Chequea imap

USAGE

# Parametros de entrada ---------------------------------------------
my %DESC=();
my %opts=();
getopts("hn:u:c:p:",\%opts);

if ($opts{h}) { die $USAGE;}
elsif ($opts{u}) {
        $DESC{host_ip}=$opts{n};
        $DESC{port}=$opts{p};
        $DESC{user}=$opts{u};
        $DESC{pwd}=$opts{c};
}
else { die $USAGE;}


#--------------------------------------------------------------------
my $r=mon_imap(\%DESC);
#foreach (@$r) {print "$_\n";}

if ( ($opts{'v'}) || ($opts{'verbose'}) ) {
   if ($DESC{'rcstr'}) { print "RCSTR=$DESC{rcstr}\n";  }
   if ($DESC{'rcdata'}) { print "RCDATA=$DESC{rcdata}\n";  }
   if ($DESC{'elapsed'}) { print "ELAPSED=$DESC{elapsed}\n";  }
   if ($DESC{'nmsgs'}) { print "MSGS=$DESC{nmsgs}\n";  }
   if ($DESC{'nmsgs_all'}) { print "MSGS_ALL=$DESC{nmsgs_all}\n";  }
   if ($DESC{'mailboxes'}) { print "MAILBOXES=$DESC{mailboxes}\n";  }
}


print '<001> Tiempo de respuesta = '.$DESC{elapsed}."\n";
print '<002> Mensajes en INBOX = '.$DESC{nmsgs}."\n";
print '<003> Mensajes Totales = '.$DESC{nmsgs_all}."\n";
print '<004> Buzones = '.$DESC{mailboxes}."\n";


