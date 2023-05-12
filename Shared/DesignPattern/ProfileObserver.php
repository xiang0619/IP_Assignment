<!--Author: NG WEN XIANG-->
<?php

interface ProfileObserver {
    public function getProfile($id);
    public function updateProfile($object);
    public function updatePassword($id,$password);
}
