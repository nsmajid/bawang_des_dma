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
                        <table class="table mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Email</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($connection, "SELECT * FROM user ");

                                $no = 1;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['level_name'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td>
                                            <div class="btn-group" role="group">

                                                <a href="?module=<?= $module ?>&action=edit&id=<?= $row['id_user']; ?>" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a href="<?= $query_model ?>&action=delete&id=<?= $row['id_user']; ?>" onClick="return confirm('Apa Anda yakin??');" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
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
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required placeholder="Type something" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required placeholder="Type something" />
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control custom-select" name="level_name" requireed>
                                    <option value="">-Pilih-</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Dosen">Dosen</option>
                                    <option value="Tendik">Tendik</option>
                                    <option value="Mahasiswa">Mahasiswa</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required placeholder="Type something" />
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
        $query = mysqli_query($connection, "SELECT * FROM user WHERE id_user='$_GET[id]'");
        $row = mysqli_fetch_array($query);
        ?>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title"><?= $action_name ?> <?= $module_name ?></h4>
                        <p class="card-title-desc"></p>

                        <form class="custom-validation" action="<?= $query_model ?>&action=update" method="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required placeholder="Type something" value="<?= $row['username'] ?>" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required placeholder="Type something" value="<?= $row['email'] ?>" />
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <select class="form-control custom-select" name="level_name" requireed>
                                    <option value="">-Pilih-</option>
                                    <option value="Administrator" <?= $row['level_name'] == 'Administrator' ? 'selected' : NULL ?>>Administrator</option>
                                    <option value="Dosen" <?= $row['level_name'] == 'Dosen' ? 'selected' : NULL ?>>Dosen</option>
                                    <option value="Tendik" <?= $row['level_name'] == 'Tendik' ? 'selected' : NULL ?>>Tendik</option>
                                    <option value="Mahasiswa" <?= $row['level_name'] == 'Mahasiswa' ? 'selected' : NULL ?>>Mahasiswa</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Type something" />
                            </div>


                            <div class="form-group mb-0">
                                <input type="hidden" name="id_user" class="form-control" required placeholder="Type something" value="<?= $row['id_user'] ?>" />

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