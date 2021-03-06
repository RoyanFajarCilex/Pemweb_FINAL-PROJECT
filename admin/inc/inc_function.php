<?php 

function url_dasar()
{
    // $_SERVER['SERVER_NAME'] akan memberikan alamat website
    // $_SERVER['SCRIPT_NAME'] akan menyimpan directory website
    $url_dasar = "https://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);
    //var_dump($url_dasar);
    return $url_dasar;
}

// function ambil_gambar_1($id)
// {
//     connection();
//     $query      = "SELECT * FROM halaman WHERE id = '$id'";
//     $result     = mysqli_query(connection(), $query);
//     $data       = mysqli_fetch_array($result);
//     $artikel_1  = $data['artikel_1'];

//     preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $artikel_1, $img_1);

//     $gambar_1     = $img_1[1];
//     $gambar_1     = str_replace("../gambar/", url_dasar()."/gambar/",$gambar_1);

//     return $gambar_1;
// }

// function ambil_gambar_2($id)
// {
//     connection();
//     $query      = "SELECT * FROM halaman WHERE id = '$id'";
//     $result     = mysqli_query(connection(), $query);
//     $data       = mysqli_fetch_array($result);
//     $artikel_2  = $data['artikel_2'];

//     preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $artikel_2, $img_2);

//     $gambar_2     = $img_2[1];
//     $gambar_2     = str_replace("../gambar/", url_dasar()."/gambar/",$gambar_2);
    
//     return $gambar_2;
// }

// START BAGIAN BERANDA
function ambil_deskripsi($id)
{
    connection();
    $query      = "SELECT * FROM halaman WHERE id = '$id'";
    $result     = mysqli_query(connection(), $query);
    $data       = mysqli_fetch_array($result);
    $desc       = $data['deskripsi'];

    return $desc;
}

function ambil_visi($id)
{
    connection();
    $query      = "SELECT * FROM halaman WHERE id = '$id'";
    $result     = mysqli_query(connection(), $query);
    $data       = mysqli_fetch_array($result);
    $visi       = $data['visi'];

    return $visi;
}

function ambil_misi($id)
{
    connection();
    $query      = "SELECT * FROM halaman WHERE id = '$id'";
    $result     = mysqli_query(connection(), $query);
    $data       = mysqli_fetch_array($result);
    $misi       = $data['misi'];

    return $misi;
}

function gambar($id){
    connection();
    $query          = "SELECT * FROM halaman WHERE id = '$id'";
    $result         = mysqli_query(connection(), $query);
    $data           = mysqli_fetch_array($result);
    $gambar         = $data['gambar'];

    if($gambar){
        return $gambar;
    } else {
        return '';
    }
}
//END BAGIAN BERANDA

// untuk meringkas kata
function max_kata($isi, $max)
{
    $array_isi  = explode(" ", $isi);
    $array_isi  = array_slice($array_isi, 0, $max);
    $isi        = implode(" ", $array_isi);
    return $isi;
}

// BAGIAN STRUKTUR KEPEMIMPINAN
function struktur($id){
    connection();
    $query      = "SELECT * FROM pemdas WHERE id = '$id'";
    $result     = mysqli_query(connection(), $query);
    $data       = mysqli_fetch_array($result);
    $struktur   = $data['deskripsi'];


    return $struktur;
}

function struktur_gambar($id){
    connection();
    $query          = "SELECT * FROM pemdas WHERE id = '$id'";
    $result         = mysqli_query(connection(), $query);
    $data           = mysqli_fetch_array($result);
    $struktur_img   = $data['struktur_img'];

    if($struktur_img){
        return $struktur_img;
    } else {
        return '';
    }
}

// BAGIAN STRUKTUR KEPEMIMPINAN

// BAGIAN SINERGI 
function judul($id){
    connection();
    $query      = "SELECT * FROM sinergi WHERE id = '$id'";
    $result     = mysqli_query(connection(), $query);
    $data       = mysqli_fetch_array($result);
    $judul      = $data['judul'];


    return $judul;
}

function kutipan($id){
    connection();
    $query      = "SELECT * FROM sinergi WHERE id = '$id'";
    $result     = mysqli_query(connection(), $query);
    $data       = mysqli_fetch_array($result);
    $kutipan    = $data['kutipan'];


    return $kutipan;
}

function program($id){
    connection();
    $query      = "SELECT * FROM sinergi WHERE id = '$id'";
    $result     = mysqli_query(connection(), $query);
    $data       = mysqli_fetch_array($result);
    $program    = $data['program'];


    return $program;
}

function waktu($id){
    connection();
    $query      = "SELECT * FROM sinergi WHERE id = '$id'";
    $result     = mysqli_query(connection(), $query);
    $data       = mysqli_fetch_array($result);
    $tgl        = date('d-m-Y', strtotime($data['tgl']));

    return $tgl;
}

function poster($id){
    connection();
    $query          = "SELECT * FROM sinergi WHERE id = '$id'";
    $result         = mysqli_query(connection(), $query);
    $data           = mysqli_fetch_array($result);
    $poster         = $data['poster'];

    if($poster){
        return $poster;
    } else {
        return '';
    }
}
// END SINERGI