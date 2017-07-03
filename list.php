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
                        echo "<tr> <td class='id'> " . $row["ID"]. "  </td>
                                   <td class='email'> " . $row["EMAIL"]. " </td>
                                   <td class='name'> " . $row["NAME"]."  </td>
                                   <td class='surname'> " . $row["SURNAME"]." </td>
                                   <td class='phone'> " . $row["PHONE"]." </td>
                                   <td class='message'> " . $row["MESSAGE"]. " </td>
                                   <td> <button class='delete' data-id='".$row["ID"]."'>delete</button> 
                                        <button class='edit' data-id='".$row["ID"]."'>edit</button></td></tr>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
                <script>
                    $(document).ready(function(){
                        $('.delete').click(function(event){
                            event.preventDefault();
                            data = 'id='+$(this).attr("data-id");
                            $.ajax({
                                url: 'ajax.del.php',
                                data: data,
                                type: "POST",
                                success: function(resp){
                                    console.log(resp);
                                    respObj = JSON.parse(resp);
                                    if(respObj.console == 'Record deleted successfully'){
                                        location.reload();
                                    } else {
                                        $('body').append('<div class="respond"><pre>'+resp+'</pre></div>')
                                    }
                                }
                            });
                        })

                        /*
                        * 1 - добавить строку / или изменить
                        * 2 - заполнить инпуты значениями - запрос к БД или значение
                        * 3 -
                        * */
                        $('.edit').click(function(event){
                            event.preventDefault();
                            if ($(this).hasClass('getsend')){
                                var parent = $(this).closest('tr');
                                data = {
                                    id      : $(this).attr("data-id"),
                                    email   : parent.find('.email input').val(),
                                    name    : parent.find('.name input').val(),
                                    surname : parent.find('.surname input').val(),
                                    phone   : parent.find('.phone input').val(),
                                    message : parent.find('.message input').val()
                                }

                                console.log(data);
                                $.ajax({
                                    url: 'ajax.edit.php',
                                    data: data,
                                    type: "POST",
                                    success: function(resp){
                                        console.log(resp);
                                        respObj = JSON.parse(resp);
                                        if(respObj.console == 'Record updated successfully'){
                                            location.reload();
                                        } else {
                                            $('body').append('<div class="respond"><pre>'+resp+'</pre></div>')
                                        }
                                    }
                                });
                            } else {
                                data = 'id='+$(this).attr("data-id");
                                var parent = $(this).closest('tr');
                                var email = parent.find('.email').html();
                                parent.find('.email').html('<input type="text" value=' + email + '>');
                                var name = parent.find('.name').html();
                                parent.find('.name').html('<input type="text" value=' + name + '>');
                                var surname = parent.find('.surname').html();
                                parent.find('.surname').html('<input type="text" value=' + surname + '>');
                                var phone = parent.find('.phone').html();
                                parent.find('.phone').html('<input type="text" value=' + phone + '>');
                                var message = parent.find('.message').html();
                                parent.find('.message').html('<input type="text" value=' + message + '>');
                                $(this).addClass('getsend');
                            }
                        })
                    })
                </script>
            </tr>
        </table>
    </div>
</div>


<?php include 'template/footer.php'?>
