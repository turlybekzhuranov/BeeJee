<?php
    //require_once "$_SERVER[DOCUMENT_ROOT]/config/config.php";

include "header.php";

    $page = $array['page'];
    $sort = $array['sort'];
    $total_pages = $array['total_pages'];
    $key = $array['key'];
    echo '<div class="container mb-5">';
    echo '<div class="row">
        <h3 class="text-info">Список задач</h3>
    </div>';
    print "<table class='table table-bordered table-striped'>";
    print "<thead>";
        echo '<tr>
                           <th class="col-md-2"><a href="/?page=' . $page . getSortURL("name") . '">Имя пользователя</a></th>
                           <th class="col-md-2"><a href="/?page=' . $page . getSortURL("email") . '">Email</a></th>
                           <th class="col-md-2"><a href="/?page=' . $page . getSortURL("text") . '">Текст задачи</a></th>
                           <th class="col-md-2"><a href="/?page=' . $page . getSortURL("status") . '">Статус</a></th>
        </tr>';
    print "</thead>";
print "<tbody>";
// Отформатировать и вывести каждую строку таблицы
$tasks_exist = true;
$tasks = $array['tasks'];

if (mysqli_num_rows($tasks) <= 0){
    $tasks_exist = false;
    echo "<div class='row'>
            <p>Нет задач</p>
        </div>";
}
while ( $task = mysqli_fetch_assoc($tasks) )
{

    print "<tr>";
    print '<td>'.$task['name'].'</td><td>'.$task['email'].'</td><td>'.$task['text'].'</td><td>'.$task['status'].'</td>';
    print "</tr>";
}
print "<tbody>";
// Завершить таблицу
print "</table>";

if ($tasks_exist == true) {
    echo '<div class="row justify-content-between">';
    if ($page > 1) {
        echo '<div class="col-3"> <a href="/?page=' . ($page - 1) . '&key=' . $key .'&sort=' . $sort .'">&laquo; Прошлая страница</a> </div>';
    } else {
        echo '<div class="col-3"></div>';
    }
    if ($page < $total_pages) {
        echo '<div class="col-3"><a class="text-right" href="/?page=' . ($page + 1) . '&key=' . $key .'&sort=' . $sort .'">Следующая страница  &raquo; </a></div>';
    } else {
        echo '<div class="col-3"></div>';
    }
    echo '</div>';
}
echo '</div>';
?>

<div id="add-task-form" class="container">
    <h3>Добавить задачу</h3>
    <div class="container">

        <?php
        if ( isset($_POST['do_post']) ) {
            echo '<span style="color: green; font-weight: bold; margin-bottom: 10px; display: block;">Task was added successfully! </span>';
        }
        ?>
        <form method="POST" action="/?page=<?php echo $page?>&key=<?php echo $key?>&sort=<?php echo $sort?>">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                            <input class="form-control" type="text" name="name" placeholder="Name" required>
                    </div>
                    <div class="col-md-6">
                            <input class="form-control" type="email" name="email" placeholder="Email" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                            <textarea class="form-control" name="text" placeholder="Task text ..." required></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <div class="col-auto">
                        <input class="btn btn-primary" type="submit" name="do_post" value="Добавить задачу">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include "footer.php";
