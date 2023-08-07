<?php
require_once ("admin_template.php");
?>
            <div class="table-data">
                <div class="order">
                     <h2>USERS</h2>
                    <table class="table" border="2px">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email </th>
                                 <th class="text-center">Date of Birth</th>
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
        <td><?=$row["id"]?>
      <td><?=$row["name"]?>
      <td><?=$row["email"]?>
      <td><?=$row["date"]?></td>
      
      <td>
            <a href='../admin_backend/delete_user.php?email="<?=$row['email']?>"' class="btn"><i class="bx bx-trash delete-icon"></i></a>            
      </td>      
    </tr>
    <?php

           
        }
    }
    ?>
  </table>
</div>
</div>
            <script>

            document.addEventListener('DOMContentLoaded', function () {
                const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');
                const currentPage = window.location.pathname.split('/').pop(); // Get the current page URL
                console.log(currentPage);
                console.log(allSideMenu);
                allSideMenu.forEach(item => {
                    const li = item.parentElement;
                    console.log(li);

                    if (item.getAttribute('href') === currentPage) {
                        li.classList.add('active');
                    }

                    item.addEventListener('click', function () {
                        allSideMenu.forEach(i => {
                            i.parentElement.classList.remove('active');
                        })
                        li.classList.add('active');
                    })
                });
            });
        </script>

    </body>

    </html>
 