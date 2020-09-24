<?php
      $TIPS[]=array(
         'id_ref' => 'xagt_004500',  'tip_type' => 'agent', 'url' => '',
         'date' => '',     'tip_class' => 1, 'name' => 'Descripcion',
         'descr' => 'Métrica que monitoriza el número de procesos corriendo en un equipo a partir del atributo <strong>Processes</strong> de la clase WMI <strong>Win32_PerfFormattedData_PerfOS_System</strong>.
Es válida para sistemas Windows.',
      );

      $TIPS[]=array(
         'id_ref' => 'xagt_004501',  'tip_type' => 'agent', 'url' => '',
         'date' => '',     'tip_class' => 1, 'name' => 'Descripcion',
         'descr' => 'Métrica que monitoriza el número de threads arrancados en un equipo a partir del atributo <strong>Threads</strong> de la clase WMI <strong>Win32_PerfFormattedData_PerfOS_System</strong>.
Es válida para sistemas Windows.',
      );

      $TIPS[]=array(
         'id_ref' => 'xagt_004502',  'tip_type' => 'agent', 'url' => '',
         'date' => '',     'tip_class' => 1, 'name' => 'Descripcion',
         'descr' => 'Métrica que monitoriza el número de llamadas al sistema operativo a partir del atributo <strong>SystemCallsPersec<strong> de la clase WMI <strong>Win32_PerfFormattedData_PerfOS_System<strong>.
Es válida para sistemas Windows.',
      );

      $TIPS[]=array(
         'id_ref' => 'xagt_004503',  'tip_type' => 'agent', 'url' => '',
         'date' => '',     'tip_class' => 1, 'name' => 'Descripcion',
         'descr' => 'Métrica que monitoriza el número de cambios de contexto producidos en el sistema operativo a partir del atributo <strong>ContextSwitchesPersec</strong> de la clase WMI <strong>Win32_PerfFormattedData_PerfOS_System</strong>.
Es válida para sistemas Windows.',
      );

      $TIPS[]=array(
         'id_ref' => 'xagt_004504',  'tip_type' => 'agent', 'url' => '',
         'date' => '',     'tip_class' => 1, 'name' => 'Descripcion',
         'descr' => 'Métrica que monitoriza la longitud de la cola de procesos del sistema operativo a partir del atributo <strong>ProcessorQueueLength</strong> de la clase WMI <strong>Win32_PerfFormattedData_PerfOS_System</strong>.
Es válida para sistemas Windows.',
      );

      $TIPS[]=array(
         'id_ref' => 'xagt_004505',  'tip_type' => 'agent', 'url' => '',
         'date' => '',     'tip_class' => 1, 'name' => 'Descripcion',
         'descr' => 'Métrica que monitoriz e�l porcentaje de tiempo en que el procesador esta ejecutando un hilo. Es un indicador de la actividad del procesador. Se obtiene a partir del atributo <strong>PercentProcessorTime</strong> de la clase WMI <strong>Win32_PerfFormattedData_PerfOS_System</strong>.
Es válida para sistemas Windows.',
      );

      $TIPS[]=array(
         'id_ref' => 'xagt_004506',  'tip_type' => 'agent', 'url' => '',
         'date' => '',     'tip_class' => 1, 'name' => 'Descripcion',
         'descr' => 'Pages/sec is the rate at which pages are read from or written to disk to resolve hard page faults. This counter is a primary indicator of the kinds of faults that cause system-wide delays and Page Faults/sec is the average number of pages faulted per second. It is measured in number of pages faulted per second because only one page is faulted in each fault operation, hence this is also equal to the number of page fault operations. Captured from <strong>PagesPersec, PageFaultsPersec</strong> counters of the WMI class<strong>Win32_PerfFormattedData_PerfOS_System</strong>.
This metric is valid only on Windows Systems.',
      );

      $TIPS[]=array(
         'id_ref' => 'xagt_004507',  'tip_type' => 'agent', 'url' => '',
         'date' => '',     'tip_class' => 1, 'name' => 'Descripcion',
         'descr' => 'AllocatedBaseSize is the actual amount of disk space allocated for use with the page file, CurrentUsage is the amount of disk space currently used by the page file and PeakUsage is the highest use page file. All three are measured in MBytes and captured from <strong>AllocatedBaseSize, CurrentUsage, PeakUsage</strong> counters of the WMI class<strong>Win32_PageFileUsage</strong>.
This metric is valid only on Windows Systems.',
      );

      $TIPS[]=array(
         'id_ref' => 'xagt_004508',  'tip_type' => 'agent', 'url' => '',
         'date' => '',     'tip_class' => 1, 'name' => 'Descripcion',
         'descr' => 'AvailableBytes is the amount of physical memory, in bytes, immediately available for allocation to a process or for system use. It is equal to the sum of memory assigned to the standby (cached), free and zero page lists, is captured from <strong>AvailableBytes</strong> counters of the WMI class <strong>Win32_PerfFormattedData_PerfOS_Memory</strong>. MemoryCapacity is the physical memory size in bytes is captured from <strong>AvailableBytes</strong> counters of the WMI class <strong>Win32_PhysicalMemory</strong>.
This metric is valid only on Windows Systems.',
      );

?>
