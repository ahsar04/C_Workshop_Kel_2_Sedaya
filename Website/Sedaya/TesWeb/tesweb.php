<?php
require '../admin/login.php';
use PHPunit\framework\Tescase;
 
class tesweb extends Tasecase{
    public function teslogin():void{
        $hasillogin = Admin;
        $this->assertEquals(Admin, $hasillogin); 
    }
}
