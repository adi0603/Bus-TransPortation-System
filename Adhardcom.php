<?php
    require('connection.php');
    session_start();
?>
<section>
    <h1>Hardware Complains</h1>
   
    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>LAB No</th>
            <th>System No</th>
            <th>Peripherals Devices</th>
            <th>Sudden shut off…or sudden anything weird</th>
            <th>Unusual noises</th>
            <th>Cables And Ports Problem</th>
            <th>Other</th>
            <th>Status</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
                <?php

                $con=mysqli_connect("localhost","root","","lb");
                $result=mysqli_query($con,"SELECT * From hardwarecomplain");
        
                while ($row=mysqli_fetch_assoc($result)):
        
                ?>
          <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['labno'];?></td>
            <td><?php echo $row['systemno'];?></td>
            <td><?php echo $row['peri'];?></td>
            <td><?php echo $row['sudden'];?></td>
            <td><?php echo $row['noise'];?></td>
            <td><?php echo $row['port'];?></td>
            <td><?php echo $row['other'];?></td>
            <td><?php echo $row['status'];?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </section>
  
  <!-- Table Ke Niche -->
  <div class="made-with-love">
    Lab Friendy System
    <i>♥</i>
  </div>
            </tbody>
        </table>
    </div>
</section>
<link rel="stylesheet" type="text/css" href="b.css">