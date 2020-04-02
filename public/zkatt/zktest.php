<html>
    <head>
        <title>ZK Test</title>
    </head>
    
    <body>
<?php
    include("zklib/zklib.php");
    
   $zk = new ZKLib("1100.sabiaber.org", 3306);
    
    $ret = $zk->connect();
   
    
    if ( $ret ): 
        $zk->disableDevice();
     
    ?>
        
      
        <hr />
      
        
        <table border="1" cellpadding="5" cellspacing="2">
            <tr>
                <th colspan="6">Data Attendance</th>
            </tr>
            <tr>
                <th>Index</th>
                <th>UID</th>
                <th>ID</th>
                <th>Status</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php
            $host = 'localhost';
            $user = 'hrmahost_admin';
            $pass = 'MooM123456';
            $db   = 'hrmahost_hr_management';
            
            $link = mysqli_connect($host, $user, $pass, $db);
            mysqli_set_charset($link,'utf8');
            
            
            $attendance = $zk->getAttendance();
          
            while(list($idx, $attendancedata) = each($attendance)):
                if ( $attendancedata[2] == 1 ){
                    $status = 'Check Out';
               } else{
                    $status = 'Check In';
               }
               $userid = $attendancedata[0];
               $users_id= '';
               	$department_id= '';
               $AttendanceDay = date( "Y-m-d", strtotime( $attendancedata[3] ) );
               $filterData = date("Y-m-d");
               $getUsers = "SELECT * FROM users WHERE matriculate='$userid' ";
               $dataUser = mysqli_query($link, $getUsers);
                while($rows=mysqli_fetch_assoc($dataUser)){
                	$users_id = $rows['name'];
                	$department_id =$rows['department_id'];
                }
                
                if ($filterData == $AttendanceDay ){
                $getWorking = "SELECT working_periods.starts_at,working_periods.finishes_at FROM 
                `department_working_period` , working_periods WHERE department_working_period.department_id ='$department_id' 
                and department_working_period.working_period_id =working_periods.id";
                $dataWorking = mysqli_query($link, $getWorking);
                while($rows=mysqli_fetch_assoc($dataWorking)){
                	$starts_at = $rows['starts_at'];
                	$finishes_at =$rows['finishes_at'];
                }
                    echo $finishes_at ;
                    $getLastPointings = "SELECT * FROM pointings WHERE user_id='$userid' AND day='$AttendanceDay' ";
                    $dataPointings = mysqli_query($link, $getLastPointings);
                    if($dataPointings) {
                        echo 'yes'.$AttendanceDay;
                    }else {
                        
                         	$timeCreate =date('Y-m-d H:i:s');
                	$timeAttend =date( "H:i:s", strtotime( $attendancedata[3] ) );
                	$filterDat = date("Y-m-d");
                	echo $filterDat;
                	echo $timeAttend ;
                	echo $timeCreate;
                           	 $getUser = "INSERT INTO pointings(user_id, day, supposed_in,created_at) 
                	 VALUES ('$users_id','$filterDat','$timeAttend','$timeCreate ') ";
                  $dataUse = mysqli_query($link, $getUser);
                      if ($dataUse){
                      echo 'true';
                  }else {
                      echo 'false';
                  }
                    }
                
               
               
               
                
            ?>
            <tr>
                <td><?php echo $idx ?></td>
                <td><?php echo $attendancedata[0] ?></td>
                <td><?php echo $users_id?></td>
                <td><?php echo $status ?></td>
                <td><?php echo $starts_at.$finishes_at ?></td>
                <td><?php echo date( "d-m-Y", strtotime( $attendancedata[3] ) ) ?></td>
                <td><?php echo date( "H:i:s", strtotime( $attendancedata[3] ) ) ?></td>
            </tr>
            <?php
                }
            endwhile
            ?>
        </table>
        
       
    <?php
        $zk->enrollUser('123');
        $zk->setUser(123, '123', 'Shubhamoy Chakrabarty', '', LEVEL_USER);
        $zk->enableDevice();
     
        $zk->disconnect();
    endif
?>
    </body>
</html>
