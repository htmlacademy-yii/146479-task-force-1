<?php

function loader($class) 
{
    require_once 'classes/' . $class . '.php';
}

spl_autoload_register('loader');

$task = new Task(1, 1);

assert($task->getNextStatus('discard') == Task::STATUS_DISCARD, 'discard');
assert($task->getNextStatus('respond') == Task::STATUS_IN_WORK, 'in work');
assert($task->getNextStatus('done') == Task::STATUS_DONE, 'done');
assert($task->getNextStatus('refuse') == Task::STATUS_FAIL, 'fail');

assert($task->getStatusAction('new') == [Task::ACTION_DISCARD, Task::ACTION_RESPOND], ['discard', 'respond']);
assert($task->getStatusAction('in work') == [Task::ACTION_DONE, Task::ACTION_REFUSE], ['done', 'refuse']);

?>

