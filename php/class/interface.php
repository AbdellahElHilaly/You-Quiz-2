<?php

interface Database {
    public function insert();
    public function select($where=NULL);
    public function update($where=NULL);
    public function delete($where=NULL);
    public function set($property, $value);
    public function get($property);
    public function isExist($property);
}

?>