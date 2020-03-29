<?php
function getTasks(){
    $connection = getConnection();



    if ( isset($_POST['do_post']) ) {
        mysqli_query($connection, "INSERT INTO `tasks` (`name`, `email`, `text`, `status`) VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['text'] . "', '" . "Не выполнено" . "');");
    }

    require 'models/sort.php';
    
    $per_page = 3;
    $page = (int) $_GET['page'];

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

