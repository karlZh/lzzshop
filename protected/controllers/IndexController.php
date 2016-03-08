<?php
    /*
     * 前台控制器
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
	class IndexController extends Controller{

        /*
         * actionIndex
         * 前台首页渲染操作
         * @author lamplijie<www.lamplijie.com>
         * @date 2015-9-10
         * @time 10:30
         * @since v1.0
         */
		public function actionIndex(){
            //所有分类
            $pcates = Category::model()->findAll('pid=0');
            foreach($pcates as $pcate){
                $pcate->sons = Category::model()->getSons($pcate->id);
            }

            //所有热销
            $criteria = new CDbCriteria;
            $criteria->condition = 'ishot=:hot and isputaway=:away';
            $criteria->params = array(':hot'=>'1',':away'=>'1');
            $criteria->order = 'createtime desc';
            $criteria->offset = 0;
            $criteria->limit = 2;
            $hotpics = Product::model()->findAll($criteria);

            $criteria->offset = 2;
            $criteria->limit = 3;
            $hots = Product::model()->findAll($criteria);

            $data = array(
                'cates'=>$pcates,
                'hotpics'=>$hotpics,
                'hots'=>$hots,
            );
			$this->render('index',$data);
		}
	}
