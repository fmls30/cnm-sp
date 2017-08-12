<?php

		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'h3c_cpu_usage',
            'class' => 'H3C',
            'lapse' => '300',
            'descr' => 'USO DE CPU',
            'items' => 'Uso de CPU (%)',
            'oid' => '.1.3.6.1.4.1.25506.8.35.18.1.3.0',
            'get_iid' => '',
            'oidn' => 'HH3C-LSW-DEV-ADM-MIB::hh3cLswSysCpuRatio.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_AREA',
            'vlabel' => 'percent',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'HH3C-LSW-DEV-ADM-MIB::hh3cLswSysCpuRatio.0',
            'enterprise' => '25506',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'NET.H3C',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'h3c_mem_usage',
            'class' => 'H3C',
            'lapse' => '300',
            'descr' => 'USO DE MEMORIA',
            'items' => 'Uso de Memoria (%)',
            'oid' => '.1.3.6.1.4.1.25506.8.35.18.1.16.0',
            'get_iid' => '',
            'oidn' => 'HH3C-LSW-DEV-ADM-MIB::hh3cLswSysMemoryRatio.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_AREA',
            'vlabel' => 'percent',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'HH3C-LSW-DEV-ADM-MIB::hh3cLswSysMemoryRatio.0',
            'enterprise' => '25506',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'NET.H3C',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'h3c_fan_status',
            'class' => 'H3C',
            'lapse' => '300',
            'descr' => 'ESTADO DEL VENTILADOR',
            'items' => 'active|deactive|not installed|unsupported',
            'oid' => '.1.3.6.1.4.1.25506.8.35.9.1.1.1.2.IID',
            'get_iid' => 'hh3cDevMFanNum',
            'oidn' => 'hh3cDevMFanStatus.IID',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_SOLID',
            'vlabel' => 'estado',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '2',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'HH3C-LswDEVM-MIB::hh3cdevMFanStatusTable',
            'enterprise' => '25506',
            'esp' => 'MAP(1)(1,0,0,0)|MAP(2)(0,1,0,0)|MAP(3)(0,0,1,0)|MAP(4)(0,0,0,1)',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'NET.H3C',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'h3c_power_status',
            'class' => 'H3C',
            'lapse' => '300',
            'descr' => 'ESTADO DE LA FUENTE',
            'items' => 'active|deactive|not installed|unsupported',
            'oid' => '.1.3.6.1.4.1.25506.8.35.9.1.2.1.2.IID',
            'get_iid' => 'hh3cDevMPowerNum',
            'oidn' => 'hh3cDevMPowerStatus.IID',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_SOLID',
            'vlabel' => 'num',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '2',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'HH3C-LswDEVM-MIB::hh3cdevMPowerStatusTable',
            'enterprise' => '25506',
            'esp' => 'MAP(1)(1,0,0,0)|MAP(2)(0,1,0,0)|MAP(3)(0,0,1,0)|MAP(4)(0,0,0,1)',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'NET.H3C',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'h3c_cpu_usage_slot',
            'class' => 'H3C',
            'lapse' => '300',
            'descr' => 'USO DE CPU EN SLOT',
            'items' => 'Uso de CPU (%)',
            'oid' => '.1.3.6.1.4.1.25506.8.35.18.4.3.1.4.IID',
            'get_iid' => 'hh3cLswSlotDesc',
            'oidn' => 'hh3cLswSlotCpuRatio.IID',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_AREA',
            'vlabel' => 'num',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '2',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'HH3C-LSW-DEV-ADM-MIB::hh3cLswSlotTable',
            'enterprise' => '25506',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'NET.H3C',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'h3c_flash_space',
            'class' => 'H3C',
            'lapse' => '300',
            'descr' => 'ESPACIO LIBRE EN FLASH',
            'items' => 'Free bytes|Total bytes',
            'oid' => '.1.3.6.1.4.1.25506.2.5.1.1.4.1.1.5.IID|.1.3.6.1.4.1.25506.2.5.1.1.4.1.1.4.IID',
            'get_iid' => 'hh3cFlhPartName',
            'oidn' => 'hh3cFlhPartSpaceFree.IID|hh3cFlhPartSpace.IID',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'bytes',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '2',
            'custom' => '0',
            'include' => '0',
            'myrange' => 'HH3C-FLASH-MAN-MIB::hh3cFlhPartitionTable',
            'enterprise' => '25506',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'NET.H3C',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'h3c_flash_spacep',
            'class' => 'H3C',
            'lapse' => '300',
            'descr' => 'ESPACIO LIBRE EN FLASH (%) ',
            'items' => 'Free space (%)',
            'oid' => '.1.3.6.1.4.1.25506.2.5.1.1.4.1.1.5.IID|.1.3.6.1.4.1.25506.2.5.1.1.4.1.1.4.IID',
            'get_iid' => 'hh3cFlhPartName',
            'oidn' => 'hh3cFlhPartSpaceFree.IID|hh3cFlhPartSpace.IID',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_AREA',
            'vlabel' => '%',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '2',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'HH3C-FLASH-MAN-MIB::hh3cFlhPartitionTable',
            'enterprise' => '25506',
            'esp' => '(o1/o2)*100',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'NET.H3C',
      );


?>
