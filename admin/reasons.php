<?php require_once('../config.php'); ?>
<?php require_once('inc/header.php') ?>

<body>

    <div class="card card-outline card-primary pb-4">
        <div class="card-header">
            <h2 class="card-title">Add Patient Record</h2>
        </div>

        <div class="card-body pb-7">
            <div class="container-fluid ml-4 mt-4">
                <div class="row">

                <a href="<?php echo base_url ?>admin/?page=check-up" class="btn btn-flat btn-primary"><img src="../assets/assets/img/brand/check-up.png" alt="check-up" height="150" width="150" /><br><br>CHECK-UP</a>
            
                <a href="<?php echo base_url ?>admin/?page=add-consultation" class="btn btn-flat btn-primary"><img src="../assets/assets/img/brand/immunization.jpg" alt="check-up" height="150" width="150" /><br><br>IMMUNIZATION</a>
                
                <a href="<?php echo base_url ?>admin/?page=add-consultation" class="btn btn-flat btn-primary"><img src="../assets/assets/img/brand/prenatal.jpg" alt="check-up" height="150" width="150" /><br><br>PRENATAL</a>

                <a href="<?php echo base_url ?>admin/?page=add-consultation" class="btn btn-flat btn-primary"><img src="../assets/assets/img/brand/animalbite.jpg" alt="check-up" height="150" width="150" /><br><br>ANIMAL BITE</a>
        </div>
    </div>
</div>
</div>

</body>

</html>