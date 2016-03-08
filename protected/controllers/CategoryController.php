<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/20
 * Time: 16:54
 */

class CategoryController extends Controller{

    /*
     * actionIndex
     * 分类页渲染操作
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
    public function actionIndex(){
        $pcates = Category::model()->findAll('pid=0');
        foreach($pcates as $pcate){
            $pcate->sons = Category::model()->getSons($pcate->id);
        }

        $data = array(
            'cates'=>$pcates
        );
        $this->render('categories',$data);
    }

} 