<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h1>Employee</h1>
        <input type="button" name="add" value="Add+" class="btn btn-success my-1" data-bs-toggle="modal" data-bs-target="#insertModal"></input>
        <hr>
        <div id="show"></div>
        <div id="fetch"></div>
    </div>
    <?php include 'insert.php';?>
    <?php include 'view.php';?>
    <?php include 'edit.php';?>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> 
    <script>
        $(document).on("click", "#submit", function(e){
            e.preventDefault();

            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var tel = $('#tel').val();
            var submit = $('#submit').val();

            $.ajax({
               url: "insert_db.php",
               type: "post",
               data: {
                   fname: fname,
                   lname: lname,
                   tel: tel,
                   submit: submit
               },
               success: function(data){
                   fetch();
                   $('#result').html(data);
                   $('#insertModal').modal('hide')
               }
            });

            $('#insert-form')[0].reset();
        });

        //fetch data employees
        function fetch(){
            $.ajax({
                url: "fetch.php",
                type: "post",
                success: function(data){
                    $('#fetch').html(data);
                }
            });
        }
        fetch();

        //view employee
        $(document).on("click", "#view", function(e){
            e.preventDefault();

            var view_id = $(this).attr("value");

            $.ajax({
               url: "view_db.php",
               type: "post",
               data: {
                   id: view_id
               },
               success: function(data){
                   fetch();
                   $('#viewData').html(data);
               }
            });
        });

        //edit employee
        $(document).on("click", "#edit", function(e){
            e.preventDefault();

            var edit_id = $(this).attr("value");

            $.ajax({
               url: "edit_db.php",
               type: "post",
               data: {
                   id: edit_id
               },
               success: function(data){
                   fetch();
                   $('#editData').html(data);
               }
            });
        });
        //updata employee
        $(document).on("click", "#update", function(e){
            e.preventDefault();

            var id = $('#id').val();
            var fname = $('#edit_fname').val();
            var lname = $('#edit_lname').val();
            var tel = $('#edit_tel').val();
            var update = $('#update').val();

            $.ajax({
               url: "edit_db_update.php",
               type: "post",
               data: {
                   id: id,
                   fname: fname,
                   lname: lname,
                   tel: tel,
                   update: update
               },
               success: function(data){
                   fetch();
                   $('#show').html(data);
                   $('#editModal').modal('hide')
               }
            });

        });

        //delete employee
        $(document).on("click", "#delete", function(e){
            e.preventDefault();

            if (window.confirm("do you want delete?")){
                var del_id = $(this).attr("value");
    
                $.ajax({
                    url: "delete.php",
                    type: "post",
                    data: {
                        id: del_id
                    },
                    success: function(data){
                        fetch();
                        $("#show").html(data);
                    }
                });
            }else{
                return false;
            }
        });
    </script>
</body>
</html>