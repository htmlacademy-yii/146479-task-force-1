<?php

    namespace TaskForce;

    class Task
    {
        const STATUS_NEW = 'new'; 
        const STATUS_DISCARD = 'discard';
        const STATUS_IN_WORK = 'in work'; 
        const STATUS_DONE = 'done'; 
        const STATUS_FAIL = 'fail';

        const ACTION_RESPOND = 'respond';
        const ACTION_DISCARD = 'discard'; 
        const ACTION_DONE = 'done'; 
        const ACTION_REFUSE = 'refuse';

        public $customer = 0;
        public $performer = 0;

        private $currentStatus = '';

        public function __construct($customer, $performer)
        {
            $this->customer = $customer;
            $this->performer = $performer;
            $this->currentStatus = self::STATUS_NEW;
        }

        public function getStatusMap()
        {
            $statusMap = [
                self::STATUS_NEW => 'Новое',
                self::STATUS_DISCARD => 'Отменено',
                self::STATUS_IN_WORK => 'В работе',
                self::STATUS_DONE => 'Выполнено',
                self::STATUS_FAIL => 'Провалено'
            ];

            return $statusMap;
        }

        public function getActionMap()
        {
            $actionMap = [
                self::ACTION_DISCARD => 'Отменить',
                self::ACTION_RESPOND => 'Откликнуться',
                self::ACTION_DONE => 'Выполнено',
                self::ACTION_REFUSE => 'Отказаться',
            ];

            return $actionMap;
        }

        public function getNextStatus($action)
        {
            switch ($action) 
            {
                case self::ACTION_DISCARD:
                    return self::STATUS_DISCARD;
                    break;
                case self::ACTION_RESPOND:
                    return self::STATUS_IN_WORK;
                    break;
                case self::ACTION_DONE:
                    return self::STATUS_DONE;
                    break;
                case self::ACTION_REFUSE:
                    return self::STATUS_FAIL;
                    break;
            }

            return false;
        }

        public function getStatusAction($status)
        {
            switch ($status) 
            {
                case self::STATUS_NEW:
                    return [self::ACTION_DISCARD, self::ACTION_RESPOND];
                    break;
                case self::STATUS_IN_WORK:
                    return [self::ACTION_DONE, self::ACTION_REFUSE];
                    break;
            }

            return [];
        }
    } 
?>