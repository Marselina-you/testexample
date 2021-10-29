<?php 
class News
{
	public static function getNewsItemById($id)
	{
		$host = 'localhost';
		$dbname = 'beget';
		$user = 'root';
		$password = 'root';
		$db = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
		
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
	public static function getNewsList()
	{

	}
}