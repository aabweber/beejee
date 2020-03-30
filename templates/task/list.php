<?php
use core\Site;
use core\Task;

/** @var Site $this */
/** @var Task[] $tasks */
/** @var int $pages_cnt */

showPrevMessage($this);
function genUrl($replace){
    parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $args);
    foreach($replace as $k => $v){
        $args[$k] = $v;
    }
    return '/task/list/?'.http_build_query($args);
}

function genSortOrderUrl($obj){
    return genUrl(['s' => $obj, 'o' => $_REQUEST['s']==$obj?($_REQUEST['o']=='asc'?'desc':'asc'):'asc']);
}
?>
<div class="row">
    <h1><?php echo _l(L::tasksTitle);?></h1>
    <table>
        <?php
        if($tasks) {
            $columns = 4;
            $orders = [
                'asc' => '&#8593;',
                'desc' => '&#8595;',
            ];
            echo '
                <tr>
                    <th>
                        <a href="'.genSortOrderUrl('id').'">#</a>'.($_REQUEST['s']=='id'?$orders[$_REQUEST['o']??'asc']:'').'
                    </th>
                    <th>
                        <a href="'.genSortOrderUrl('username').'">' . _l(L::tasksUsername) . '</a>'.($_REQUEST['s']=='username'?$orders[$_REQUEST['o']??'asc']:'').'
                    </th>
                    <th>
                        <a href="'.genSortOrderUrl('email').'">' . _l(L::mainEmail) . '</a>'.($_REQUEST['s']=='email'?$orders[$_REQUEST['o']??'asc']:'').'
                    </th>
                    <th>
                        <a href="'.genSortOrderUrl('text').'">' . _l(L::tasksText) . '</a>'.($_REQUEST['s']=='text'?$orders[$_REQUEST['o']??'asc']:'').'
                    </th>
                </tr>
            ';
            foreach ($tasks as $task) {
                echo '<tr><td>'.$task->id.'</td><td>' . htmlspecialchars($task->username) . '</td><td>' . htmlspecialchars($task->email) . '</td><td><div class="text">' . htmlspecialchars($task->text_start) . '</div></td></tr>';
            }
        }else{
            $columns = 1;
            echo '<tr><td class="c">'._l(L::tasksEmptyList).'</td></tr>';
        }
        echo '<tr><td colspan="'.$columns.'" class="c">';
        for($p=0; $p<$pages_cnt; $p++){
            echo '<a href="'.genUrl(['p' => $p]).'"'.(intval($_REQUEST['p']??0)==$p?' class="b"':'').'>'.($p+1).'</a>'.($p==$pages_cnt-1?'':' | ');
        }
        echo '</td></tr>';
        echo '<tr><td colspan="'.$columns.'" class="c"><a href="/task/get/" class="btn btn-primary">'._l(L::tasksAddNew).'</a></td></tr>';
        ?>
    </table>

</div>
