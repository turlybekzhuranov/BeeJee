<?php

    session_start();
    function getConnection(){
        return mysqli_connect("localhost", "root", "", "beejee");
    }

