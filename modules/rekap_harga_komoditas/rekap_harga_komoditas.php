<?php
switch ($action) {

    default:
?>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-right ml-2">
                        <a href="?module=<?= $module ?>&action=add" class="btn btn-primary btn-sm">Add <i class="mdi mdi-plus ml-1"> </i></a>
                    </div>

                    <h4 class="header-title"> DATA <?= $module_name ?></h4>

                    <form class="mt-4" action="">
                        <select class="form-control mb-4" name="provinsi" id="">
                            <option value="">Pilih Provinsi</option>
                            <?php
                            $query = mysqli_query($connection, "SELECT * FROM provinsi ORDER BY nama_provinsi");

                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $row['id_provinsi'] ?>" <?= $_GET['provinsi'] == $row['id_provinsi'] ? 'selected' : null ?>><?= $row['nama_provinsi'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <input type="hidden" name="module" value="rekap_harga_komoditas">
                        <a href="?module=rekap_harga_komoditas" type="button" class="btn btn-dark">Reset</a>
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </form>

                    <br>
                    <?php
                    if ($_GET['provinsi']) {
                    ?>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Provinsi</th>
                                        <th>Nama Komoditas</th>
                                        <th>Bulan</th>
                                        <th>Harga</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = mysqli_query($connection, "SELECT * FROM harga_komoditas LEFT JOIN komoditas ON komoditas.id_komoditas = harga_komoditas.id_komoditas LEFT JOIN provinsi ON provinsi.id_provinsi=harga_komoditas.id_provinsi WHERE harga_komoditas.id_provinsi = " . $_GET['provinsi'] . " ORDER BY nama_provinsi, nama_komoditas, tanggal");
                                    $no = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $row['nama_provinsi'] ?></td>
                                            <td><?= $row['nama_komoditas'] ?></td>
                                            <td><?= format_tgl_indo($row['tanggal']) ?></td>
                                            <td><?= rupiah($row['harga']) ?></td>
                                            <td>
                                                <div class="btn-group" role="group">

                                                    <a href="?module=<?= $module ?>&action=edit&id=<?= $row['id_harga_komoditas']; ?>" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="<?= $query_model ?>&action=delete&id=<?= $row['id_harga_komoditas']; ?>" onClick="return confirm('Apa Anda yakin??');" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
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
                    <?php
                    }
                    ?>


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
                            <label>Provinsi</label>
                            <select name="id_provinsi" id="id_provinsi" class="form-control" required>
                                <option value="">Pilih Provinsi</option>
                                <?php
                                $query_provinsi = mysqli_query($connection, "SELECT * FROM provinsi ORDER BY nama_provinsi");

                                while ($rowp = mysqli_fetch_array($query_provinsi)) {
                                ?>
                                    <option value="<?= $rowp['id_provinsi'] ?>"><?= $rowp['nama_provinsi'] ?></option>

                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label> Komoditas</label>
                            <select name="id_komoditas" id="id_komoditas" class="form-control" required>
                                <option value="">Pilih Komoditas</option>
                                <?php
                                $query_komoditas = mysqli_query($connection, "SELECT * FROM komoditas ORDER BY nama_komoditas");

                                while ($rowk = mysqli_fetch_array($query_komoditas)) {
                                ?>
                                    <option value="<?= $rowk['id_komoditas'] ?>"><?= $rowk['nama_komoditas'] ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required placeholder="Type something" />
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" required placeholder="Type something" />
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
        $query = mysqli_query($connection, "SELECT * FROM harga_komoditas WHERE id_harga_komoditas='$_GET[id]'");
        $row = mysqli_fetch_array($query);
    ?>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title"><?= $action_name ?> <?= $module_name ?></h4>
                    <p class="card-title-desc"></p>

                    <form class="custom-validation" action="<?= $query_model ?>&action=update" method="POST">
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select name="id_provinsi" id="id_provinsi" class="form-control" required>
                                <option value="">Pilih Provinsi</option>
                                <?php
                                $query_provinsi = mysqli_query($connection, "SELECT * FROM provinsi ORDER BY nama_provinsi");

                                while ($rowp = mysqli_fetch_array($query_provinsi)) {
                                ?>
                                    <option value="<?= $rowp['id_provinsi'] ?>" <?= $rowp['id_provinsi'] == $row['id_provinsi'] ? 'selected' : null ?>><?= $rowp['nama_provinsi'] ?></option>

                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label> Komoditas</label>
                            <select name="id_komoditas" id="id_komoditas" class="form-control" required>
                                <option value="">Pilih Komoditas</option>
                                <?php
                                $query_komoditas = mysqli_query($connection, "SELECT * FROM komoditas ORDER BY nama_komoditas");

                                while ($rowk = mysqli_fetch_array($query_komoditas)) {
                                ?>
                                    <option value="<?= $rowk['id_komoditas'] ?>" <?= $rowk['id_komoditas']== $row['id_komoditas']?'selected':null ?>><?= $rowk['nama_komoditas'] ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required value="<?= $row['tanggal'] ?>" />
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" required value="<?= $row['harga'] ?>" />
                        </div>


                        <div class="form-group mb-0">
                            <input type="hidden" name="id_komoditas" class="form-control" required value="<?= $row['id_harga_komoditas'] ?>" />

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