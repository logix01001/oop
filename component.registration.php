


<div class="container">
    <?php
        if(Session::exists('success')){
            ?>
            <div class="alert alert-success" role="alert">
                <?= Session::flash('success') ?> 
            </div>

            <?php

        }
    ?>
    <form action="" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Employee Number</label>
        <input type="text" class="form-control" name="employee_number" 
        value="<?php echo  (Session::exists('employee_number_old')) ? Session::flash('employee_number_old') : '' ?>"  
        placeholder="Employee Number">
        <?php
            if(Session::exists('employee_number_error')){
        ?>
                <small  class="form-text text-muted error"><?= Session::flash('employee_number_error')?></small>
        <?php
            }

        ?>
        
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">First Name</label>
        <input type="text" class="form-control" name="first_name" 
        value="<?php echo  (Session::exists('first_name_old')) ? Session::flash('first_name_old') : '' ?>"  
        placeholder="First Name">
        <?php
            if(Session::exists('first_name_error')){
        ?>
                <small  class="form-text text-muted error"><?= Session::flash('first_name_error')?></small>
        <?php
            }

        ?>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Last Name</label>
        <input type="text" class="form-control" name="last_name" 
        value="<?php echo  (Session::exists('last_name_old')) ? Session::flash('last_name_old') : '' ?>"  
         placeholder="Last Name">
        <?php
            if(Session::exists('last_name_error')){
        ?>

                <small  class="form-text text-muted error"><?= Session::flash('last_name_error')?></small>

        <?php
            }

        ?>
    </div>
        <?php
            if(Session::exists('id_old')){
        ?>
                <input type="hidden" value="<?= Session::flash('id_old')?>" name="id">
        <?php
            }

        ?>
    <a href="index.php">Back</a>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>