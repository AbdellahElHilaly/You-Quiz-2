<?php

interface Database {
    public function insert();
    public function select($where=NULL);
    public function update($where=NULL);
    public function delete($where=NULL);
}

?>