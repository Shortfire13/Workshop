          
            <?php 
            include_once "koneksi/koneksi.php";
                if (isset($_POST['update'])) {
                    $nama = $_POST['nama'];
                    $nohp = $_POST['nohp'];
                    $alamat = $_POST['alamat'];
                    $gambar = $_FILES['gambar']['name'];
                    $id = $_POST['id'];
                    
                    if (empty($gambar)) {
                        //tidak ada gambar
                        $update = mysqli_query($koneksi,"UPDATE user SET nama_user='$nama',no_tlp='$nohp',alamat='$alamat' WHERE id_user='$id'");
                       header('location:profile.php');
                    }else{
                        //ada gambar
                             $update = mysqli_query($koneksi,"UPDATE user SET nama_user='$nama',no_tlp='$nohp',alamat='$alamat',gambar='$gambar' WHERE id_user='$id'");
                       header('location:profile.php');
                    }
                }
               ?>