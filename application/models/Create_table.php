<?php
class Create_table extends CI_Model
{
	
	public function create($username)
	{
	$sql = "CREATE TABLE ".$username."_like"." (
  			like_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  			card_id INT(6)
  )";
  $query = $this->db->query($sql);
  return $query;
	}
	
	
}

?>