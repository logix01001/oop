<div class="container">
    <div class="row">
        <div>
        </div>
        <div>
            <a href="registration.php">Add Record</a>
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Employee Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($employee->all() as $row){

                    
                ?>
                <tr>
                    <td><?=  $row['employee_number']?></td>
                    <td><?=  $row['first_name']?></td>
                    <td><?=  $row['last_name']?></td>
                    <td>
                        <a href="registration.php?id=<?=  $row['id']?>" class="btn btn-primary">
                            Edit
                        </a>
                        <button class="btn btn-danger delete" data-id="<?=  $row['id']?>">
                            Delete
                        </button>
                    </td>
                </tr>

                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row">
    </div>
</div>