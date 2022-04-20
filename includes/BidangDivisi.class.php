<?php

class BidangDivisi extends DB
{
    function getBidangDivisi()
    {
        $query = "SELECT * FROM bidang_divisi";
        return $this->execute($query);
    }
}

?>