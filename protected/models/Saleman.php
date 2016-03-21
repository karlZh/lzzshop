<?php
/**
 * Created by PhpStorm.
 * User: peng
 * Date: 2016/3/14
 * Time: 12:54
 */
class Saleman extends  CActiveRecord{
    public $repass;

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return "{{saleman}}";
    }

    public function rules(){
        return array(
            array('salemanuser','required','message'=>'业务员账户不能为空','on'=>'salemanlogin,salemanadd'),
            array('salemanuser','unique','message'=>'业务员账户已经注册','on'=>'salemanadd'),
            array('password','required','message'=>'业务员密码不能为空','on'=>'salemanlogin,salemanadd'),
            array('repass','required','message'=>'重复密码不能为空','on'=>'salemanadd'),
            array('repass','compare','compareAttribute'=>'password','message'=>'两次密码输入不一致','on'=>'salemanadd'),
            array('password','checkPass','on'=>'salemanlogin'),
            array('name','required','message'=>'真实姓名不能为空','on'=>'salemanadd'),
        );
    }

    public function attributeLabels(){
        return array(
            'salemanuser'=>'业务员账号',
            'name'=>'真实姓名',
            'password'=>'业务员密码',
            'repass'=>'请再次输入密码',
        );
    }

    public function checkPass(){
        if(!$this->hasErrors()){
            $data = $this->find(
                'salemanuser=:salemanuser
                 and password=:pass',
                array(
                    ':salemanuser'=>$this->salemanuser,
                    ':pass'=>md5($this->password)
                )
            );
            if(is_null($data)){
                $this->addError('loginmessage','用户名或者密码不正确');
            }else{
//                $this->updateByPk(
//                    $data->id,
//                    array(
//                        'logintime'=>time(),
//                        'loginip'=>(int)ip2long($_SERVER['REMOTE_ADDR']),
//                    )
//                );
                $_SESSION['saleman']['id'] = $data->id;
                $_SESSION['saleman']['name'] = $data->name;
                $_SESSION['saleman']['invitation_code'] = $data->invitation_code;
            }
        }
    }

}