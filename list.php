<?php include 'template/header.php';?>
<div class="container">
    <div class="row">
        <h1>List</h1>
        <h2>all rows</h2>
        <?php
        include 'db.php';
        $conn = bdConnect();
        $query = "SELECT ID, EMAIL, NAME, SURNAME, PHONE, MESSAGE FROM MESSAGE";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        ?>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>EMAIL</th>
                <th>NAME</th>
                <th>SURNAME</th>
                <th>PHONE</th>
                <th>MESSAGE</th>
                <th>Edit</th>
            </tr>
            <tr>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr> <td> " . $row["ID"]. "  </td>
                                   <td> " . $row["EMAIL"]. " </td>
                                   <td> " . $row["NAME"]."  </td>
                                   <td> " . $row["SURNAME"]." </td>
                                   <td> " . $row["PHONE"]." </td>
                                   <td> " . $row["MESSAGE"]. " </td>
                                   <td></td></tr>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </tr>
        </table>
    </div>
</div>


<?php include 'template/footer.php'?>
