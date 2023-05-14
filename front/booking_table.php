<?php
include('../connect.php');
$query="select * from booking";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<table border="2px">
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
        foreach($data as $individual_data) {
            echo "
            <tr>
                <td>{$individual_data['SN']}</td>
                <td>{$individual_data['email']}</td>
                <td>{$individual_data['arrival']}</td>
                <td>{$individual_data['time']}</td>
                <td>{$individual_data['depature']}</td>
                <td>{$individual_data['number']}</td>
            </tr>";
        }
        ?>
        
    </tbody>
</table>