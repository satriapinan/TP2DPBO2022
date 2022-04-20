<?php

class Pengurus extends DB
{
    function getPengurus()
    {
        $query = "SELECT * FROM pengurus ORDER BY id_bidang ASC";
        return $this->execute($query);
    }
    function addPengurus(){
        $nim = $_POST['tnim'];
        $name = $_POST['tnama'];
        $semester = $_POST['tsemester'];
        $id_bidang = $_POST['tjabatan'];

        $sql = "INSERT INTO pengurus".
               "(nim, nama, semester, id_bidang) VALUES ".
               "('$nim', '$name', '$semester', '$id_bidang')";

        // Mengeksekusi query
        return $this->execute($sql);                
    }
    function updatePengurus(){
        $nim = $_POST['tnim'];
        $name = $_POST['tnama'];
        $semester = $_POST['tsemester'];
        $id_bidang = $_POST['tjabatan'];

        $sql = "UPDATE pengurus SET nama = '$name', semester = '$semester', id_bidang='$id_bidang' WHERE nim='$nim'";

        // Mengeksekusi query
        return $this->execute($sql);
    }
    function delPengurus($id){
        $sql = "DELETE FROM pengurus WHERE nim='$id'";

        // Mengeksekusi query
        return $this->execute($sql);
    }
    function getJabatan($bidang) 
    {
        $query = "SELECT jabatan FROM bidang_divisi WHERE id_bidang='$bidang'";
        $result = $this->execute($query);

        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_array($result))
            {
                $jabatan =  $row['jabatan'];
            }
        }

        return $jabatan;
    }
}

?>