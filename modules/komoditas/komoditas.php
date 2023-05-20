<?php
switch ($action) {

    default:
?>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="float-right ml-2">
                        <a href="?module=<?= $module ?>&action=add" class="btn btn-primary btn-sm">Add <i class="mdi mdi-plus ml-1"> </i></a>
                    </div>

                    <h4 class="header-title"> DATA <?= $module_name ?></h4>

                    <br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Komoditas</th>
                                    <th>Options</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($connection, "SELECT * FROM komoditas ");

                                $no = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $row['nama_komoditas'] ?></td>
                                        <td>
                                            <div class="btn-group" role="group">

                                                <a href="?module=<?= $module ?>&action=edit&id=<?= $row['id_komoditas']; ?>" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a href="<?= $query_model ?>&action=delete&id=<?= $row['id_komoditas']; ?>" onClick="return confirm('Apa Anda yakin??');" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="mdi mdi-trash-can"></i>
                                                </a>
                                            </div>
                                        </td>

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

        // Form Tambah college_schedule
    case "add":
        ?>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title"><?= $action_name ?> <?= $module_name ?></h4>
                        <p class="card-title-desc"></p>

                        <form class="custom-validation" action="<?= $query_model ?>&action=insert" method="POST">
                            <div class="form-group">
                                <label>Nama Komoditas</label>
                                <input type="text" name="nama_komoditas" class="form-control" required placeholder="Type something" />
                            </div>


                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                    <button type="button" onclick="window.location.href = '?module=<?= $module ?>'" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        <?php
        break;

        // Form Edit Kriteria
    case "edit":
        $query = mysqli_query($connection, "SELECT * FROM komoditas WHERE id_komoditas='$_GET[id]'");
        $row = mysqli_fetch_array($query);
        ?>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title"><?= $action_name ?> <?= $module_name ?></h4>
                        <p class="card-title-desc"></p>

                        <form class="custom-validation" action="<?= $query_model ?>&action=update" method="POST">
                            <div class="form-group">
                                <label>Nama Komoditas</label>
                                <input type="text" name="nama_komoditas" class="form-control" required placeholder="Type something" value="<?= $row['nama_komoditas'] ?>" />
                            </div>


                            <div class="form-group mb-0">
                                <input type="hidden" name="id_komoditas" class="form-control" required placeholder="Type something" value="<?= $row['id_komoditas'] ?>" />

                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                    <button type="button" onclick="window.location.href = '?module=<?= $module ?>'" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


    <?php
        break;
}
    ?>