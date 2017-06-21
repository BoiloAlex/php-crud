<?php include 'template/header.php'?>
<div class="container">
    <div class="row">
        <h2>input data</h2>
        <?php
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $message = trim($_POST['text']);
        //Connect To Database
        include 'config.php';
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            echo 'Error!!';
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT ID FROM MESSAGE";
        $result = mysqli_query($conn, $query);
        if(empty($result)) {
            echo 'CREATE TABLE <br>';
            $query = "CREATE TABLE MESSAGE (
                                  ID int(11) AUTO_INCREMENT,
                                  EMAIL varchar(255) NOT NULL,
                                  NAME varchar(255) NOT NULL,
                                  SURNAME varchar(255),
                                  PHONE int,
                                  MESSAGE varchar(255),
                                  PRIMARY KEY  (ID)
                                  )";
            $result = mysqli_query($conn, $query);
        }

        if (!mysqli_query($conn, $query)) {
            echo "Error creating table: " . mysqli_error($conn);
        }
        $query = 'INSERT INTO MESSAGE (EMAIL, NAME, SURNAME, PHONE, MESSAGE) VALUES ("'.$email.'","'.$name.'", "'.$surname.'", "'.$phone.'","'.$message.'" )';
        if (mysqli_query($conn, $query)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        ?>
        <dl>
            <dt>name</dt>
            <dd><?echo $name;?></dd>

            <dt>surname</dt>
            <dd><?echo $surname;?></dd>

            <dt>phone</dt>
            <dd><?echo $phone;?></dd>

            <dt>email</dt>
            <dd><?echo $email;?></dd>

            <dt>message</dt>
            <dd><?echo $message;?></dd>
        </dl>
    </div>
</div>
<div class="container">
    <div class="row">
        <h2>all rows</h2>
        <?php
        $query = "SELECT ID, EMAIL, NAME, SURNAME, PHONE, MESSAGE FROM MESSAGE";
        $result = mysqli_query($conn, $query);
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
         <?php
        mysqli_close($conn);
        ?>
    </div>
</div>

<?php include 'template/footer.php'?>
