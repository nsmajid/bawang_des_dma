<?php

function set_cookies($config)
{
    return setcookie(
        $config['sess_cookie_name'],
        $config['encryption_key'],
        time() + $config['sess_expiration'],
        '/'
    );
}

function session_get($config)
{
    if (isset($_COOKIE[$config['sess_cookie_name']])) {
        session_start();

        if (isset($_SESSION[$_COOKIE[$config['sess_cookie_name']]])) {
            return $_SESSION[$_COOKIE[$config['sess_cookie_name']]];
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function session_flash(
    $name = '',
    $message = '',
    $class = 'alert alert-success'
) {
    session_start();
    if (!empty($name)) {
        if (!empty($name) && !empty($message)) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } else {
            echo '<div class="' .
                $_SESSION[$name . '_class'] .
                '"  role="alert">' .
                $_SESSION[$name] .
                '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}

function format_tgl_indo($time = null, $format = '%d %M %Y')
{
    if (!$time) {
        $time = time();
    } else {
        $time = strtotime($time);
    }

    $date_obj = getdate($time);

    $bulan = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    ];

    $bulan_short = [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul',
        'Agu',
        'Sep',
        'Okt',
        'Nov',
        'Des',
    ];

    $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    $format_search = [
        '%d',
        '%D',
        '%m',
        '%M',
        '%S',
        '%y',
        '%Y',
        '%H',
        '%i',
        '%s',
    ];
    $format_replace = [
        $date_obj['mday'],
        $hari[$date_obj['wday']],
        $date_obj['mon'],
        $bulan[$date_obj['mon'] - 1],
        $bulan_short[$date_obj['mon'] - 1],
        $date_obj['year'],
        $date_obj['year'],
        $date_obj['hours'],
        $date_obj['minutes'],
        $date_obj['seconds'],
    ];
    $str = str_replace($format_search, $format_replace, $format);

    return $str;
}

function input_type_month($date)
{
    return date('Y-m', strtotime($date));
}

// dd/mm/yyyy -> yyyy-mm-dd
function hariIndo()
{
    $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    return $hari;
}

// dd/mm/yyyy -> yyyy-mm-dd
function dateToSql($date)
{
    $date = str_replace('/', '-', $date);
    return date('Y-m-d', strtotime($date));
}

// dd/mm/yyyy -> yyyy-mm-dd
function dateRangeToSql($daterange)
{
    $daterange = explode(' - ', $daterange);

    $datestart = explode('/', $daterange[0]);
    $dateend = explode('/', $daterange[1]);

    $finalDate['start'] =
        $datestart[2] . '-' . $datestart[0] . '-' . $datestart[1];
    $finalDate['end'] = $dateend[2] . '-' . $dateend[0] . '-' . $dateend[1];

    return $finalDate;
}

function bulanIndo($bulan)
{
    $BulanIndo = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    ];
    echo $BulanIndo[(int) $bulan - 1];
}

function rupiah($value, $step = 0)
{
    $rupiah = 'Rp. ' . number_format($value, $step, ',', '.') . '';
    return $rupiah;
}

function currency($value)
{
    $rupiah = number_format($value, 0, ',', '.') . ',00';
    return $rupiah;
}

function romanic_number($integer)
{
    $table = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];
    $return = '';
    while ($integer > 0) {
        foreach ($table as $rom => $arb) {
            if ($integer >= $arb) {
                $integer -= $arb;
                $return .= $rom;
                break;
            }
        }
    }

    return $return;
}

/* * *
 *  Fungsi Konvert ke alfabert excel
 */

function columnLetter($c)
{
    $c = intval($c);
    if ($c <= 0) {
        return '';
    }
    $letter = '';

    while ($c != 0) {
        $p = ($c - 1) % 26;
        $c = intval(($c - $p) / 26);
        $letter = chr(65 + $p) . $letter;
    }

    return $letter;
}

/**
 * Fungsi Terbilang
 */
function terbilang($x, $style = 4)
{
    $nx = round($x, 0);

    if ($x < 0) {
        $hasil = 'minus ' . trim(kekata($nx));
    } else {
        $hasil = trim(kekata($nx));
    }
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }
    return $hasil;
}

function kekata($x)
{
    $x = abs($x);
    $angka = [
        '',
        'satu',
        'dua',
        'tiga',
        'empat',
        'lima',
        'enam',
        'tujuh',
        'delapan',
        'sembilan',
        'sepuluh',
        'sebelas',
    ];
    $temp = '';
    if ($x < 12) {
        $temp = ' ' . $angka[$x];
    } elseif ($x < 20) {
        $temp = kekata($x - 10) . ' belas';
    } elseif ($x < 100) {
        $temp = kekata($x / 10) . ' puluh' . kekata($x % 10);
    } elseif ($x < 200) {
        $temp = ' seratus' . kekata($x - 100);
    } elseif ($x < 1000) {
        $temp = kekata($x / 100) . ' ratus' . kekata($x % 100);
    } elseif ($x < 2000) {
        $temp = ' seribu' . kekata($x - 1000);
    } elseif ($x < 1000000) {
        $temp = kekata($x / 1000) . ' ribu' . kekata($x % 1000);
    } elseif ($x < 1000000000) {
        $temp = kekata($x / 1000000) . ' juta' . kekata($x % 1000000);
    } elseif ($x < 1000000000000) {
        $temp =
            kekata($x / 1000000000) . ' milyar' . kekata(fmod($x, 1000000000));
    } elseif ($x < 1000000000000000) {
        $temp =
            kekata($x / 1000000000000) .
            ' trilyun' .
            kekata(fmod($x, 1000000000000));
    }
    return $temp;
}

/**
 * Fungsi Terbilang
 */
function in_array_r($needle, $haystack, $strict = false)
{
    foreach ($haystack as $item) {
        if (
            ($strict ? $item === $needle : $item == $needle) ||
            (is_array($item) && in_array_r($needle, $item, $strict))
        ) {
            return true;
        }
    }

    return false;
}

function hitung_umur($tanggal_lahir)
{
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime('today');
    if ($birthDate > $today) {
        exit('0 tahun 0 bulan 0 hari');
    }
    $y = $today->diff($birthDate)->y;
    $m = $today->diff($birthDate)->m;
    $d = $today->diff($birthDate)->d;
    return $y . ' tahun ' . $m . ' bulan ' . $d . ' hari';
}

function hitung_umur_bulan($tanggal_lahir)
{
    $birthDate = new DateTime($tanggal_lahir);
    $today = new DateTime('today');
    if ($birthDate > $today) {
        $m = 0;
    } else {
        $m = $today->diff($birthDate)->m;
    }

    return $m;
}

function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}

function sudahBerapaJam($waktu_awal)
{
    date_default_timezone_set('Asia/Jakarta');

    $awal = strtotime($waktu_awal); //waktu awal

    $akhir = strtotime(date('Y-m-d H:i:s')); //waktu akhir

    $diff = $akhir - $awal;

    $jam = floor($diff / (60 * 60));

    $menit = $diff - $jam * (60 * 60);

    return $jam;
}

function decimalHours($time)
{
    $hms = explode(':', $time);
    return $hms[0] + $hms[1] / 60 + $hms[2] / 3600;
}

/**
 * array_rank
 * 
 * @param array $var
 * 
 * @return array $rank & $arank
 * 
 * $rank = urutan ranking
 * $arank = ranking berdasarkan key
 */

function array_rank($var =  array())
{
    $ordered_values = $var;


    asort($ordered_values);

    $i = 1;
    foreach ($ordered_values as $key => $value) {
        $rank_train[$key] = $i;
        $arank[$key] = $i;
        $rank[$i++] = $key;
    }

    $data = [
        'rank' => $rank,
        'arank' => $arank
    ];
    return $data;
}