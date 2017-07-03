<?php include 'template/header.php'?>
<div class="container">
    <div class="row">
    </div>
</div>

<div class="container">
    <div class="row">
        <form action="mail.php" method="POST" class="col-md-6">
            <fieldset>
                <h2>через php</h2>
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
        <form action="#" method="POST" class="ajaxForm col-md-6">
            <fieldset>
                <h2>через ajax</h2>
                <div class="input-group">
                    <input type="text" class="form-control" name="name" placeholder="name" value="name">
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" name='surname' placeholder="surname" value="surname">
                </div>
                <div class="input-group">
                    <input type="number" class="form-control" name='phone' placeholder="phone" value="123">
                </div>
                <div class="input-group">
                    <input type="email" class="form-control" name='email' placeholder="email" value="email">
                </div>
                <div class="input-group">
                    <textarea name="text" placeholder="message">dfgdsghffd</textarea>
                </div>
                <div class="input-group">
                    <input type="submit" class="form-control submit" placeholder="submit">
                </div>
            </fieldset>
        </form>
        <script>
            $(document).ready(function(){
                $('.submit').click(function(event){
                    event.preventDefault();
                    var data = jQuery(".ajaxForm").serialize();
                    console.log(data);
                    $.ajax({
                        url: 'ajax.php',
                        data: jQuery(".ajaxForm").serialize(),
                        type: "POST",
                        success: function(resp){
                            console.log(resp);
                            $('body').append('<div class="respond"><pre>'+resp+'</pre></div>')
                        }
                    });


                })
            })
        </script>
    </div>
</div>
<?php include 'template/footer.php'?>


