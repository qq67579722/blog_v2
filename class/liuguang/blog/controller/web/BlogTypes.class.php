<?php

namespace liuguang\blog\controller\web;

use liuguang\blog\controller\Index;
use liuguang\blog\view\BlogRight as RightView;
use liuguang\blog\view\TypesArchs as CenterView;
use liuguang\mvc\Application;

/**
 * 文章分类列表
 *
 * @author liuguang
 *        
 */
class BlogTypes extends Index {
	public function indexAction() {
		$this->checkInstall ();
		$tpl = $this->getMainTpl ();
		$tplData = $tpl->getTplData ();
		$app = Application::getApp ();
		$urlData = $app->getUrlHandler ()->getUrlData ();
		$vModel = new CenterView ( $this->getDb (), $this->getTablePre (), true );
		$page = ( int ) $urlData->get ( 'page', 1 );
		$tplData->set ( 'title', $vModel->getTitle ( $page ) );
		$tplData->set ( 'blog_center', $vModel->getHtml ( $page ) );
		$rightM = new RightView ( $this->getDb (), $this->getTablePre () );
		$tplData->set ( 'blog_right', $rightM->getHtml () );
		$tplData->set ( 'nIndex', 2 );
		$tpl->display ();
	}
}