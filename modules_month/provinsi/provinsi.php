<?php
switch ($action) {

    default:
?>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                  
                    <h4 class="header-title"> DATA <?= $module_name ?></h4>

                    <br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Provinsi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($connection, "SELECT * FROM provinsi ");

                                $no = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $row['nama_provinsi'] ?></td>
                                        

                                    </tr>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        
    <?php
        break;
}
    ?>