<?php

class Pengurus extends DB
{
    function getPengurus()
    {
        $query = "SELECT * FROM pengurus";
        return $this->execute($query);
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