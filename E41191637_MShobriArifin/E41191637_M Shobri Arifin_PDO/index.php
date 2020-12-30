<?php
include "database.php";
?>
<form action="input.php" method="POST">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"/></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat"/></td>
        </tr>
        <tr>
            <td><button type="submit">Kirim</button></td>
            <td>&nbsp;</td>
        </tr>
    </table>
</form>
<table border="1">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th colspan="2">Aksi</th>
    </tr>
    <?php
        $query="SELECT * FROM orang";
        $data=$db->prepare($query);
        $data->execute();
        $no=1;
        while($orang = $data->fetch(PDO::FETCH_OBJ)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $orang->nama; ?></td>
                <td><?php echo $orang->alamat; ?></td>
                <td>
                    <a href="edit_form.php?id=<?php echo $orang->id; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $orang->id; ?>">Delete</a>
                </td>
            </tr>
            <?php
        }
    ?>
</table>