<?php 
include_once ROOT. '/modul/News.php';
class NewsController
 {
	public function actionIndex(){
		$newsList = array();
		$newsList = News::getNewsList();
		echo "<pre>Список новостей";
		print_r($newsList);
		echo "</pre>";
		return true;
		
	}
	public function actionView($id)
	{
		if ($id){
			$newItem = News::getNewsItemById($id);
		}
		echo '<pre>';
		print_r($newItem);
		echo '</pre>';
		echo 'actionView';
		return true;
	}
}