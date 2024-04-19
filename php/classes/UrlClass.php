<?php

require_once 'DatabaseClass.php';

class UrlClass
{
	private $db;

	public function __construct(DatabaseClass $db)
	{
		$this->db = $db;
	}

	public function createShortUrl($fullUrl, $userId, $urlName)
	{
		$site_adress = "http://url-master/";
		$length_short_url = 8;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		do {
			$shortUrl = '';
			for ($i = 0; $i < $length_short_url; $i++)
			{
				$shortUrl .= $characters[rand(0, strlen($characters) - 1)];
			}
			$result = $this->db->select("SELECT * FROM urls WHERE short_url = ?", [$shortUrl]);
			$r = $result ? TRUE : FALSE;
		} while ($r);

//		$result = $this->db->select("SELECT * FROM urls WHERE user_id = ? AND full_url = ?",[$userId,$fullUrl]);
//		$r = $result ? $result[0] : null;
//		if ($r)
//		{
//			return array(0,"Вы уже создали короткий URL-адрес с этим URL-адресом.");
//		} else
//		{
			$sql = "INSERT INTO urls (url_name, short_url, full_url, user_id) VALUES (?, ?, ?, ?)";
			$this->db->insert($sql, [$urlName, $shortUrl, $fullUrl, $userId]);
			return array($site_adress.$shortUrl, $urlName);
//		}
	}

	public function getFullUrl($shortUrl)
	{
		$sql = "SELECT * FROM urls WHERE short_url = ?";
		$result = $this->db->select($sql, [$shortUrl]);
		$url = $result ? $result[0] : null;

		if ($url) {
			$clickCount = $url['click_count'] + 1;
			$this->db->insert("INSERT INTO click_time (url_id) VALUES (?)",[$url['id']]);
			$sql = "UPDATE urls SET click_count = ? WHERE id = ?";
			$this->db->update($sql, [$clickCount, $url['id']]);
			return $url['full_url'];
		} else {
			return false;
		}
	}

	public function get_all_urls($user_id)
	{
		$sql = "SELECT * FROM urls WHERE user_id = ?";
		return  $this->db->select($sql, [$user_id]);
	}

	public function get_click_times($id){
		$sql = "SELECT click_data FROM click_time WHERE url_id = ?";
		return $this->db->select($sql, [$id]);
	}

	public function delete_url($id){
		$this->db->delete("DELETE FROM `click_time` WHERE `url_id` = ?", [$id]);
		return $this->db->delete("DELETE FROM `urls` WHERE `id` = ?", [$id]);
	}
}
?>