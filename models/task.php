<?php
function getTasks(){
    $connection = getConnection();

    $key_array = array('id','name','email','text','status');
    $sort_array = array('asc','desc');

    $key = "id";
    $sort = "asc";
    if ( isset($_GET['key']) )
    {
        $key=$_GET['key'];
        $sort=$_GET['sort'];

        if($sort=='asc')
        {
            $sort='desc';
        }
        else
        {
            $sort='asc';

        }
    }


    $per_page = 3;
    $page = 1;

    if ( isset($_GET['page']) ){
        $page = (int) $_GET['page'];
    }

    $total_count_q = mysqli_query($connection, "SELECT COUNT(`id`) AS `total_count` FROM `tasks`");
    $total_count = mysqli_fetch_assoc($total_count_q);
    $total_count = $total_count['total_count'];

    $total_pages = ceil($total_count / $per_page);
    if ($page < 1 || $page > $total_pages){
        $page = 1;
    }
    $offset = $per_page * $page - $per_page;

    if( in_array($key, $key_array) && in_array($sort, $sort_array) )
    {
        $query = "SELECT * FROM `tasks` ORDER BY $key $sort LIMIT $offset, $per_page";
        $tasks = mysqli_query($connection, $query);
    }
    else exit("неверный формат запроса!");

    return array(
        'tasks' => $tasks,
        'page' => $page,
        'key' => $key,
        'sort' => $sort,
        'total_pages' => $total_pages
    );

}

