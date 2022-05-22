<?php 
    function avatarGen($username) {
        return "https://robohash.org/set_set" . rand(1,3) . "/bgset_bg" . rand(1,2) . "/" . $username . ".png";
    }
