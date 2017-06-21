<?php include 'template/header.php'?>
<div class="container">
    <div class="row">
    </div>
</div>

<div class="container">
    <div class="row">
        <form action="mail.php" method="POST">
            <fieldset>
                <div class="input-group">
                    <input type="text" class="form-control" name="name" placeholder="name">
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" name='surname' placeholder="surname">
                </div>
                <div class="input-group">
                    <input type="number" class="form-control" name='phone' placeholder="phone">
                </div>
                <div class="input-group">
                    <input type="email" class="form-control" name='email' placeholder="email">
                </div>
                <div class="input-group">
                    <textarea name="text" placeholder="message"></textarea>
                </div>
                <div class="input-group">
                    <input type="submit" class="form-control" placeholder="submit">
                </div>
            </fieldset>
        </form>
    </div>
</div>
<?php include 'template/footer.php'?>


