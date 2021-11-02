<?php 
class News
{

	public static function getNewsItemByID($id)

	{ 	echo '<br>оДНА НОВОСТЬ ';
		$id = intval($id);
		if ($id) {
		$db = Db::getConnection();

		$result = $db->query('SELECT * FROM news WHERE id='.$id);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$newsItem = $result->fetch();

			return $newsItem;

		}
	}


	public static function getNewsList()
	{	echo '<br>Список ';
		$db = Db::getConnection();
		
		
		$newsList = array();
		$result = $db->query('SELECT * FROM news ORDER BY dates DESC LIMIT 10');
		$i = 0;
		while ($row = $result->fetch()) {
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['dates'] = $row['dates'];
			$newsList[$i]['short_content'] = $row['short_content'];
			$i++;
			


			// code...
		}
		return $newsList;
		//запрос к бд
	}

}