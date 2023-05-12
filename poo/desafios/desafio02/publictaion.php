<?php
interface Publication {
    public function open();
    public function close();
    public function leafThrough($page);
    public function advancePage();
    public function backPage();
}
?>