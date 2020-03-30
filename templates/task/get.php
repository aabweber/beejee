<?php
use core\Site;
use core\Task;
use misc\ReturnData;

/** @var Site $this */
/** @var Task|null $task */


showPrevMessage($this);
echo '<h1>'._l($task?L::tasksTitleSave:L::tasksTitleAdd).'</h1>';
if ($this->getResult()->getStatus()==ReturnData::RD_ERR) {
    echo '<div class="alert alert-danger" role="alert">' . $this->getResult()->getInfo()['message'] . '</div>';
}
?>
<form action="/task/save/" method="post">
    <?php
        echo $task?'<input type="hidden" name="task[id]" value="'.$task->id.'" />':'';
        echo '
            <table>
                <tr><td class="b">'._l(L::tasksUsername).'</td><td><input type="text" name="task[username]" value="'.htmlspecialchars($task->username).'" /></td></tr>
                <tr><td class="b">'._l(L::mainEmail).'</td><td><input type="text" name="task[email]" value="'.htmlspecialchars($task->email).'"/></td></tr>
                <tr><td class="b">'._l(L::tasksText).'</td><td><input type="hidden" name="task[text]" /><div class="text editable" contenteditable="true">'.htmlspecialchars($task->text).'</div></td></tr>
                <tr><td colspan="2" class="c"><input class="btn btn-primary" type="submit" value="'._l($task?L::mainSave:L::mainAdd).'" /></td></tr>
            </table>
        ';
    ?>

</form>