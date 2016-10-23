<?php
//namespace cool_name_for_your_group\hw3\models;

require_once('Model.php');

class StoryModel extends Model
{
	public function getGenre(Controller $control)
	{
		$query="select genrename from genre";
		$result=$this->connection->query($query);
		while($row=$result->fetch_assoc())
		{
			$control->data['genre'][]=$row['genrename'];
		}
		
	}

	public function saveNewStory($data)
	{

		$query="insert into story(identifier,author,title) values(".intval($data['identifiername']).",'".$data['authorname']."','".$data['titlename']."')";
		$this->connection->query($query);
		$query="insert into storycontent values(".intval($data['identifiername']).",'".$data['story']."')";
		$this->connection->query($query);
		foreach ($data['genremultiselect'] as $genrename)
		{
			$query="select gid from genre where genrename='".$genrename."'";
			$result=$this->connection->query($query);
			$gid=$result->fetch_assoc();
			print($gid['gid']);
			$query="insert into storygenre values(".intval($data['identifiername']).",".intval($gid['gid']).")";
			$this->connection->query($query);
		}
		
	}

}
