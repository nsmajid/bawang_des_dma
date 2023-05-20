<?php

// Bagian Home
if ($module) {
    if (file_exists("modules/$module/$module.php")) {
        $query_model = "modules/$module/query_$module.php?module=$module";
        include "modules/$module/$module.php";
    } else {
        echo "<div class=' col-lg-12 alert alert-warning'  role='alert'>Module File's NOT FOUND </div> ";
    }
} 
