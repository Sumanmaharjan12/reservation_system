
<h2>All USERS</h2>
  <table class="table" border="2px">
    <thead>
      <tr>
        <th class="text-center">Name</th>
        <th class="text-center">Email </th>
        <th class="text-center">Date Of Birth</th>
        <th class="text-center">Password</th>
        <th class="text-center">Confirm Password</th>
      </tr>
    </thead>
    <?php
      include_once "../admin_backend/connect.php";
      $query="select * from sign";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {
        while ($row=mysqli_fetch_assoc($result)) {
           
    ?>
    <tr>
      <td><?=$row["name"]?>
      <td><?=$row["email"]?>
      <td><?=$row["date"]?></td>
      <td><?=$row["password"]?></td>
      <td><?=$row["confirmpassword"]?></td>
      
    </tr>
    <?php

           
        }
    }
    ?>
  </table>