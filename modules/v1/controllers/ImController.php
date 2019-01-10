<?php
/**
 * Created by PhpStorm.
 * User: WalkingSun
 * Date: 2019/1/8
 * Time: 18:29
 */
namespace app\modules\v1\controllers;

use app\commands\SwoolewsController;
use app\models\SwooleTable;
use Swoole\Table;
use yii\web\Controller;

class ImController extends Controller
{

    public $username;
    public $avatar;
    private $SERVER_SWOOLE;

    public function  init(){
        parent::init();

        $this->SERVER_SWOOLE = $_SERVER['SERVER_SWOOLE'];

        $this->username = [
            'Tom','Tony','Jack','Sun','Waston'
        ];
        $this->avatar = [
            'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1546955641220&di=61f4a5026c126c1cd2ae73f7cb871b63&imgtype=0&src=http%3A%2F%2Fshihuo.hupucdn.com%2Fucditor%2F20160729%2F600x600_762052ca199e8eda86ccc2bd721cb183.jpeg%3FimageView2%2F2%2Fw%2F700%2Finterlace%2F1',
            'https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=433888286,665156829&fm=26&gp=0.jpg'
        ];
    }

    public function actionSimple(){
        $this->layout = false;

        //查询当前服务连接所有客户信息
        $userList = [];//var_dump($table);
        if(  SwoolewsController::$table->count() ){
            foreach (SwoolewsController::$table as $v){
                $userList[] = $v;
            }
        }

        //生成当前用户信息
        $user = [
            'username'   =>   $this->username[rand(0,count($this->username)-1)].rand(10,100),
            'avatar'   =>   $this->avatar[rand(0,count($this->avatar)-1)],
        ];

        return $this->render('simple',['user'=>$user,'userList'=>$userList]);
    }


}