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

	public function listStories(Controller $control,$phrasesvalue,$genrevalue)
	{
		$queryhighestrated="";
		$querymostviewed="";
		//highest rated
		/*select story.identifier,story.title,story.ratings from story,storygenre where story.identifier=storygenre.identifier and storygenre.gid=2 and story.title like '%star trek%' order by story.ratings DESC LIMIT 10*/
		if($genrevalue!="All")
		{
			$genreidquery="select gid from genre where genrename='".$genrevalue."'";
			$result=$this->connection->query($genreidquery);
			$gid=$result->fetch_assoc();
			$gidval=$gid['gid'];
			$queryhighestrated="select story.identifier as identifierid,story.title as storytitle from story,storygenre where story.identifier=storygenre.identifier and storygenre.gid=".intval($gidval)." and story.title like '%".$phrasesvalue."%' order by story.ratings desc limit 10";
			$querymostviewed="select story.identifier as identifierid,story.title as storytitle from story,storygenre where story.identifier=storygenre.identifier and storygenre.gid=".intval($gidval)." and story.title like '%".$phrasesvalue."%' order by story.views desc limit 10";
			
			
		}
		else
		{
			$queryhighestrated="select identifier as identifierid,title as storytitle from story where title like '%".$phrasesvalue."%' order by story.ratings desc limit 10";
			$querymostviewed="select identifier as identifierid,title as storytitle from story where title like '%".$phrasesvalue."%' order by story.views desc limit 10";
		}

		$result_highest_rated=$this->connection->query($queryhighestrated);
		$result_most_viewed=$this->connection->query($querymostviewed);
		while($row=$result_highest_rated->fetch_assoc())
		{
			$control->data['highestrateddata'][$row['identifierid']]=$row['storytitle'];
		}
		while($row=$result_most_viewed->fetch_assoc())
		{
			$control->data['mostvieweddata'][$row['identifierid']]=$row['storytitle'];
		}

	}

}
