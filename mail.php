<?php include 'template/header.php';?>

<div class="container">
    <div class="row">
        <h2>input data</h2>
        <?php
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $message = trim($_POST['text']);

        include 'db.php';
        $conn = bdConnect();
        $query = 'INSERT INTO MESSAGE (EMAIL, NAME, SURNAME, PHONE, MESSAGE) VALUES ("'.$email.'","'.$name.'", "'.$surname.'", "'.$phone.'","'.$message.'" )';
        if (mysqli_query($conn, $query)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
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

    </div>
</div>

<?php include 'template/footer.php'?>
