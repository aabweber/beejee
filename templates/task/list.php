<?php
use core\Site;
use core\Task;

/** @var Site $this */
/** @var Task[] $tasks */

showPrevMessage($this);
?>
<div class="row">
    <h1><?php echo _l(L::tasksTitle);?></h1>
    <table>
        <?php
        if($tasks) {
            $columns = 4;
            echo '<tr><th>#</th><th>' . _l(L::tasksUsername) . '</th><th>' . _l(L::mainEmail) . '</th><th>' . _l(L::tasksText) . '</th></tr>';
            foreach ($tasks as $task) {
                echo '<tr><td>'.$task->id.'</td><td>' . htmlspecialchars($task->username) . '</td><td>' . htmlspecialchars($task->email) . '</td><td><div class="text">' . $task->text_start . '</div></td></tr>';
            }
        }else{
            $columns = 1;
            echo '<tr><td class="c">'._l(L::tasksEmptyList).'</td></tr>';
        }
        echo '<tr><td colspan="'.$columns.'" class="c"><a href="/task/get/" class="btn btn-primary">'._l(L::tasksAddNew).'</a></td></tr>';
        ?>
    </table>
</div>
