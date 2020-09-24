<?php
class UserValidate extends Validate
{
    public function __construct($arrParams)
    {
        $dataForm = $arrParams['form'] ?? [];
        parent::__construct($dataForm);
        // parent::__construct($arrParams['form']);
    }

    public function validate()
    {
        // $this
        //     ->addRule('username', 'string-notExistRecord', array('database' => $this->_model, 'query' => $queryUserName, 'min' => 3, 'max' => 25))
        //     ->addRule('password', 'string', array('min' => 1, 'max' => 255))
        //     ->addRule('email', 'email')
        //     ->addRule('status', 'status', ['deny' => ['default']])
        //     ->addRule('group_id', 'group', array('deny' => array('default')));
        // $this->run();
    }
}
