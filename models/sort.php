<?php
        $key_array = array('id','name','email','text','status');
        $sort_array = array('asc','desc');

        $key = "id";
        $sort = "asc";
        if ( isset($_GET['key']) )
        {
            $key=$_GET['key'];
            $sort=$_GET['sort'];
        }

    function getSortURL($orderBy){
        $sortURL = "&key=".$orderBy."&sort=";
        $sortType = "asc";
        if( isset($_GET['key']) && $_GET['key'] == $orderBy ){
            if( isset($_GET['sort']) && $_GET['sort'] == "asc" ){
                $sortType = "desc";
            }
        }
        $sortURL .= $sortType;
        return $sortURL;
    }
