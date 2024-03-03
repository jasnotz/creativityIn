<?php

class Database
{
    private function connect()
    {
        $string = DBDRIVER . ":host=" . DBHOST . ";dbname=" . DBNAME;
        $con = new PDO($string, DBUSER, DBPASS);
        return $con;
    }

    public function query($query, $data = [], $data_type = "object")
    {
        $con = $this->connect();
        $stm = $con->prepare($query);

        if ($stm && $stm->execute($data)) {
            $result = ($data_type === "object") ? $stm->fetchAll(PDO::FETCH_OBJ) : $stm->fetchAll(PDO::FETCH_ASSOC);
            
            // Run functions after select
            if (is_array($result) && property_exists($this, 'afterSelect')) {
                foreach ($this->afterSelect as $func) {
                    $result = $this->$func($result);
                }
            }

            return (is_array($result) && count($result) > 0) ? $result : false;
        }

        return false;
    }
}