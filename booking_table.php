<?php
session_start();
include('connect.php');
if(isset($_POST['email'])){
$_SESSION['email']==$email;

if($_SESSION['email']==$email){
   
}

else{
    header('location:front/index.php');
}
}
$query="select * from booking";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>
<link rel="stylesheet" href="front/booking_table.css">
<div class="booking">
    <h1>MY BOOKING</h1>
    <a href="front/homepage.php"><img src="image/logout.png" alt=""></a>
</div>
<table border="2px" class="table">
    <thead>
        <th>SN</th>
        <th>Email</th>
        <th>Arrival Date</th>
        <th>Time</th>
        <th>Depature Date</th>
        <th>Number of Person</th>
        
    </thead>
    <tbody>
        <?php
            if(mysqli_num_rows($result)>0)
            {
                foreach($data as $individual){
                    ?>
                    <tr>
                        <td> <?=$individual['SN']; ?> </td>
                         <td> <?=$individual['email']; ?> </td>
                         <td> <?=$individual['arrival']; ?> </td>
                         <td> <?=$individual['time']; ?> </td>
                         <td> <?=$individual['depature']; ?> </td>
                         <td> <?=$individual['number']; ?> </td>
                         <td>
                            <a href="" class="btn">Edit</a>
                            <a href="" class="btn">Delete</a>
                         </td>
                    </tr>
                    <?php
                }
                } else{
                    echo "no data available";
                }
        ?>   

    </tbody>
</table>
