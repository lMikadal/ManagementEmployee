<?php
include_once "modal.php";

$modal = new Modal();

$row = $modal->fetch();
?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">View</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
            if (!empty($row)){
                foreach ($row as $rows){ ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $rows['firstname'];?></td>
                <td><?php echo $rows['lastname'];?></td>
                <td>
                    <a href="#" id="view" class="btn btn-primary" value="<?php echo $rows['id'];?>" data-bs-toggle="modal" data-bs-target="#viewModal">VIEW</a>
                </td>
                <td>
                    <a href="#" id="edit" class="btn btn-warning" value="<?php echo $rows['id'];?>" data-bs-toggle="modal" data-bs-target="#editModal">EDIT</a>
                </td>
                <td>
                    <a href="#" id="delete" class="btn btn-danger" value="<?php echo $rows['id'];?>">DELETE</a>
                </td>
            </tr>  
        <?php
                }
            }
        ?>
    </tbody>
</table>