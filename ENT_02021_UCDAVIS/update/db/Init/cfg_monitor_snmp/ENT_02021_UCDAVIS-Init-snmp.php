<?php

		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_mem_swap',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'USO DE MEMORIA (SWAP)',
            'items' => 'memAvailSwap.0|memTotalSwap.0',
            'oid' => '.1.3.6.1.4.1.2021.4.4.0|.1.3.6.1.4.1.2021.4.3.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::memAvailSwap.0|UCD-SNMP-MIB::memTotalSwap.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'UCD-SNMP-MIB::memAvailSwap.0',
            'enterprise' => '2021',
            'esp' => 'o1*1024|o2*1024',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_mem_real',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'USO DE MEMORIA (REAL)',
            'items' => 'memAvailReal.0|memTotalReal.0',
            'oid' => '.1.3.6.1.4.1.2021.4.6.0|.1.3.6.1.4.1.2021.4.5.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::memAvailReal.0|UCD-SNMP-MIB::memTotalReal.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'UCD-SNMP-MIB::memAvailReal.0',
            'enterprise' => '2021',
            'esp' => 'o1*1024|o2*1024',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_mem_buffer',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'USO DE MEMORIA (BUFFER)',
            'items' => 'memShared.0|memBuffer.0|memCached.0',
            'oid' => '.1.3.6.1.4.1.2021.4.13.0|.1.3.6.1.4.1.2021.4.14.0|.1.3.6.1.4.1.2021.4.15.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::memShared.0|UCD-SNMP-MIB::memBuffer.0|UCD-SNMP-MIB::memCached.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'UCD-SNMP-MIB::memShared.0',
            'enterprise' => '2021',
            'esp' => 'o1*1024|o2*1024|o3*1024',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_swap',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'USO DE SWAP',
            'items' => 'ssRawSwapIn.0|ssRawSwapOut.0',
            'oid' => '.1.3.6.1.4.1.2021.11.62.0|.1.3.6.1.4.1.2021.11.63.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::ssRawSwapIn.0|UCD-SNMP-MIB::ssRawSwapOut.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'COUNTER',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'UCD-SNMP-MIB::ssRawSwapIn.0',
            'enterprise' => '2021',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_io',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'USO DE IO',
            'items' => 'ssIORawSent.0|ssIORawReceived.0',
            'oid' => '.1.3.6.1.4.1.2021.11.57.0|.1.3.6.1.4.1.2021.11.58.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::ssIORawSent.0|UCD-SNMP-MIB::ssIORawReceived.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'COUNTER',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'UCD-SNMP-MIB::ssIORawSent.0',
            'enterprise' => '2021',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_int',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'USO DE INTERRUPCIONES',
            'items' => 'ssRawInterrupts.0',
            'oid' => '.1.3.6.1.4.1.2021.11.59.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::ssRawInterrupts.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'COUNTER',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'UCD-SNMP-MIB::ssRawInterrupts.0',
            'enterprise' => '2021',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_cswitches',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'CAMBIOS DE CONTEXTO',
            'items' => 'ssRawContexts.0',
            'oid' => '.1.3.6.1.4.1.2021.11.60.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::ssRawContexts.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'COUNTER',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'UCD-SNMP-MIB::ssRawContexts.0',
            'enterprise' => '2021',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_soft_irq',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'TIEMPO DE CPU DE IRQ SW (Linux 2.6)',
            'items' => 'ssCpuRawSoftIRQ.0',
            'oid' => '.1.3.6.1.4.1.2021.11.61.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::ssCpuRawSoftIRQ.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'COUNTER',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '0',
            'myrange' => 'UCD-SNMP-MIB::ssCpuRawSoftIRQ.0',
            'enterprise' => '2021',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_cpu_usage',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'USO DE CPU (%)',
            'items' => 'ssCpuIdle.0|ssCpuUser.0|ssCpuSystem.0',
            'oid' => '.1.3.6.1.4.1.2021.11.11.0|.1.3.6.1.4.1.2021.11.9.0|.1.3.6.1.4.1.2021.11.10.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::ssCpuIdle.0|UCD-SNMP-MIB::ssCpuUser.0|UCD-SNMP-MIB::ssCpuSystem.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'UCD-SNMP-MIB::ssCpuIdle.0',
            'enterprise' => '2021',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_load3',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'CARGA DEL SISTEMA',
            'items' => 'Load-1|Load-5|Load-15',
            'oid' => '.1.3.6.1.4.1.2021.10.1.3.1|.1.3.6.1.4.1.2021.10.1.3.2|.1.3.6.1.4.1.2021.10.1.3.3',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::laLoad.1|UCD-SNMP-MIB::laLoad.2|UCD-SNMP-MIB::laLoad.3',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'UCD-SNMP-MIB::laLoad.1',
            'enterprise' => '2021',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_cpu_raw_usage',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'USO DE CPU raw-1cpu (%)',
            'items' => 'Idle|User|System',
            'oid' => '.1.3.6.1.4.1.2021.11.53.0|.1.3.6.1.4.1.2021.11.50.0|.1.3.6.1.4.1.2021.11.52.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::ssCpuRawIdle.0|UCD-SNMP-MIB::ssCpuRawUser.0|UCD-SNMP-MIB::ssCpuRawSystem.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'COUNTER',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '0',
            'myrange' => 'UCD-SNMP-MIB::ssCpuRawIdle.0',
            'enterprise' => '2021',
            'esp' => '1*o1|1*o2|1*o3',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_cpu2_raw_usage',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'USO DE CPU raw-2cpu (%)',
            'items' => 'Idle|User|System',
            'oid' => '.1.3.6.1.4.1.2021.11.53.0|.1.3.6.1.4.1.2021.11.50.0|.1.3.6.1.4.1.2021.11.52.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::ssCpuRawIdle.0|UCD-SNMP-MIB::ssCpuRawUser.0|UCD-SNMP-MIB::ssCpuRawSystem.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'COUNTER',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '0',
            'myrange' => 'UCD-SNMP-MIB::ssCpuRawIdle.0',
            'enterprise' => '2021',
            'esp' => '(1/2)*o1|(1/2)*o2|(1/2)*o3',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_cpu4_raw_usage',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'USO DE CPU raw-4cpu (%)',
            'items' => 'Idle|User|System',
            'oid' => '.1.3.6.1.4.1.2021.11.53.0|.1.3.6.1.4.1.2021.11.50.0|.1.3.6.1.4.1.2021.11.52.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::ssCpuRawIdle.0|UCD-SNMP-MIB::ssCpuRawUser.0|UCD-SNMP-MIB::ssCpuRawSystem.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'COUNTER',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '0',
            'myrange' => 'UCD-SNMP-MIB::ssCpuRawIdle.0',
            'enterprise' => '2021',
            'esp' => '(1/4)*o1|(1/4)*o2|(1/4)*o3',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_cpu8_raw_usage',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'USO DE CPU raw-8cpu (%)',
            'items' => 'Idle|User|System',
            'oid' => '.1.3.6.1.4.1.2021.11.53.0|.1.3.6.1.4.1.2021.11.50.0|.1.3.6.1.4.1.2021.11.52.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::ssCpuRawIdle.0|UCD-SNMP-MIB::ssCpuRawUser.0|UCD-SNMP-MIB::ssCpuRawSystem.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'COUNTER',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '0',
            'myrange' => 'UCD-SNMP-MIB::ssCpuRawIdle.0',
            'enterprise' => '2021',
            'esp' => '(1/8)*o1|(1/8)*o2|(1/8)*o3',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_cpu16_raw_usage',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'USO DE CPU raw-16cpu (%)',
            'items' => 'Idle|User|System',
            'oid' => '.1.3.6.1.4.1.2021.11.53.0|.1.3.6.1.4.1.2021.11.50.0|.1.3.6.1.4.1.2021.11.52.0',
            'get_iid' => '',
            'oidn' => 'UCD-SNMP-MIB::ssCpuRawIdle.0|UCD-SNMP-MIB::ssCpuRawUser.0|UCD-SNMP-MIB::ssCpuRawSystem.0',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'COUNTER',
            'top_value' => '1',
            'cfg' => '1',
            'custom' => '0',
            'include' => '0',
            'myrange' => 'UCD-SNMP-MIB::ssCpuRawIdle.0',
            'enterprise' => '2021',
            'esp' => '(1/16)*o1|(1/16)*o2|(1/16)*o3',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_disk_acc_bytes',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'ACCESO A DISCO (BYTES)',
            'items' => 'diskIONRead|diskIONWritten',
            'oid' => '.1.3.6.1.4.1.2021.13.15.1.1.3.IID|.1.3.6.1.4.1.2021.13.15.1.1.4.IID',
            'get_iid' => 'diskIOIndex',
            'oidn' => 'diskIONRead.IID|diskIONWritten.IID',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'COUNTER',
            'top_value' => '1',
            'cfg' => '2',
            'custom' => '0',
            'include' => '0',
            'myrange' => 'UCD-DISKIO-MIB::diskIOTable',
            'enterprise' => '2021',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_disk_acc',
            'class' => 'UCDAVIS',
            'lapse' => '300',
            'descr' => 'ACCESO A DISCO',
            'items' => 'diskIOReads|diskIOWrites',
            'oid' => '.1.3.6.1.4.1.2021.13.15.1.1.5.IID|.1.3.6.1.4.1.2021.13.15.1.1.6.IID',
            'get_iid' => 'diskIOIndex',
            'oidn' => 'diskIOReads.IID|diskIOWrites.IID',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'COUNTER',
            'top_value' => '1',
            'cfg' => '2',
            'custom' => '0',
            'include' => '0',
            'myrange' => 'UCD-DISKIO-MIB::diskIOTable',
            'enterprise' => '2021',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_lmsensors_temp',
            'class' => 'UCDAVIS-LMSENSORS',
            'lapse' => '300',
            'descr' => 'SENSOR DE TEMPERATURA',
            'items' => 'Grados C',
            'oid' => '.1.3.6.1.4.1.2021.13.16.2.1.3.IID',
            'get_iid' => 'lmTempSensorsIndex',
            'oidn' => 'lmTempSensorsValue.IID',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '2',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'LM-SENSORS-MIB::lmTempSensorsTable',
            'enterprise' => '2021',
            'esp' => 'o1/1000',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );



		$CFG_MONITOR_SNMP[]=array(
            'subtype' => 'ucd_lmsensors_volt',
            'class' => 'UCDAVIS-LMSENSORS',
            'lapse' => '300',
            'descr' => 'SENSOR DE VOLTAJE',
            'items' => 'lmVoltSensorsValue',
            'oid' => '.1.3.6.1.4.1.2021.13.16.4.1.3.IID',
            'get_iid' => 'lmVoltSensorsIndex',
            'oidn' => 'lmVoltSensorsValue.IID',
            'oid_info' => '',
            'module' => 'mod_snmp_get',
            'mtype' => 'STD_BASE',
            'vlabel' => 'num',
            'mode' => 'GAUGE',
            'top_value' => '1',
            'cfg' => '2',
            'custom' => '0',
            'include' => '1',
            'myrange' => 'LM-SENSORS-MIB::lmVoltSensorsTable',
            'enterprise' => '2021',
            'esp' => '',
            'params' => '',
            'itil_type' => '1',
            'apptype' => 'SO.UCDAVIS',
      );


?>
