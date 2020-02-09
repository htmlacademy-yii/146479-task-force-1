<?php

require_once 'vendor/autoload.php';

use Main\Task;

$task = new Task(1, 1);

var_dump(assert($task->getNextStatus('discard') == Task::STATUS_DISCARD, 'discard'));
assert($task->getNextStatus('respond') == Task::STATUS_IN_WORK, 'in work');
assert($task->getNextStatus('done') == Task::STATUS_DONE, 'done');
assert($task->getNextStatus('refuse') == Task::STATUS_FAIL, 'fail');

assert($task->getStatusAction('new') == [Task::ACTION_DISCARD, Task::ACTION_RESPOND], ['discard', 'respond']);
assert($task->getStatusAction('in work') == [Task::ACTION_DONE, Task::ACTION_REFUSE], ['done', 'refuse']);

?>

