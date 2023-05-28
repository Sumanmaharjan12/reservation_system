<?php
session_start();
$email=$_SESSION['email'];
include('connect.php');
//if(isset($_POST['email'])){
/*$_SESSION['email']==$email;

if($_SESSION['email']==$email){
   
}

else{
    header('location:front/index.php');
}
}*/
$query="select * from booking where email=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (!$result) {
    die('Query Error: ' . mysqli_error($conn));
}
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
                        <td> <?=$individual['Code']; ?> </td>
                         <td> <?=$individual['email']; ?> </td>
                         <td> <?=$individual['arrival']; ?> </td>
                         <td> <?=$individual['time']; ?> </td>
                         <td> <?=$individual['depature']; ?> </td>
                         <td> <?=$individual['number']; ?> </td>
                         <td>
                            <a href="" class="btn">Edit</a>
                         </td>
                         <td>
                                <a href='delete.php?email="<?=$individual['email']?>"' class="btn">Delete</a>
                            </form>
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
