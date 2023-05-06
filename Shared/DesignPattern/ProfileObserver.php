<?php

interface ProfileObserver {
    public function getProfile($id);
    public function updateProfile($cutomer);
    public function updatePassword($id,$password);
}
