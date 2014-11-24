<?php
class chat extends core
{
	public function fetchMessages()
	{
		$this->query("SELECT `chat`.`message`, `users`.`username`, `users`.`userID` FROM `chat` JOIN `users` ON `chat`.`userID` = `users`.`userID` ORDER BY `chat`.`timestamp` DESC");
		return $this->rows();	
	}
	public function throwMessages($userID,$message)
	{
		$this->query("INSERT INTO `chat` (`userID`,`message`,`timestamp`) VALUES (".(int)$userID .",'". $this->db->real_escape_string(htmlentities($message)) ."',UNIX_TIMESTAMP)");
	}
}
?>