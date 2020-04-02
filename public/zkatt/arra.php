<?php
        include("zklib/zklib.php");

        $zk = new ZKLib("1100.sabiaber.org", 3306);

        $ret = $zk->connect();
        $zk->disableDevice();
        $zk->version();
        $zk->osversion();
        $zk->platform();
        $zk->fmVersion();
        echo $zk->workCode();
        $zk->ssr();
        $zk->pinWidth();
        $zk->faceFunctionOn();
        $zk->serialNumber();
        echo $zk->deviceName();
        $attendance = $zk->getAttendance();
       
echo "<per>";
print_r($attendance);
echo "</per>";


        
        $zk->getTime();
        $zk->enableDevice();
        $zk->disconnect();
        
        ?>