<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data mahasiswa</title>
</head>
<body>
    <table border="1">
        <caption>
            Data mahasiswa
            <form action="" method="get">
                <select name="filter">
                    <?php
                    $q_alamat = "SELECT alamat From biodata group by alamat";
                    $r_alamat = $mysqli->query($q_alamat);
                    while($data_alamat = $r_alamat->fetch_assoc()){
                        ?>
                        <option value="<?=$data_alamat['alamat'];?>"><?php echo $data_alamat['alamat'];?></option>
                        <?php
                    }
                    ?>
                    </select>
                    <button>Filter</button>
                </form>
                </caption>
                <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
                </tr>
                <?php
                if(isset($_GET['filter'])){
                    $query = "SELECT * FROM biodata WHERE alamat='$_GET[filter]'";
                }else{
                    $query = "SELECT * FROM biodata";
                }
                $result = $mysqli->query($query);
                $no=0;
                while($row = $result->fetch_assoc()){
                    $no++;
                    ?>
                    <tr>
                        <td><?=$no;?></td>

                        <td><?=$row['nama'];?></td>
                        <td><?=$row['alamat'];?></td>
                        <td><?=$row['tempat_lahir'];?></td>
                        <td><?=$row['tanggal_lahir'];?></td>
                        <td>
                        <a href="<?= 'form-edit.php?id='.$row['id'];?>">Edit</a>
                        <a href="<?= 'hapus-data.php?id='.$row['id'];?>">Hapus</a>
                </td>
                </tr>
                <?php
                }
                ?>
                </table>
                <a href="form-data.php">Tambah Data</a>
            </body>
            </html>