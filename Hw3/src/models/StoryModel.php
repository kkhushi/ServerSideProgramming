<?php
namespace cool_name_for_your_group\hw3\models;

//require_once('Model.php');
use cool_name_for_your_group\hw3\controllers\Controller;

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
		$success = false;
		$date = \date('Y-m-d');
		$query="insert into story(identifier,author,title,submissiondate) values(".intval($data['identifiername']).",'".$data['authorname']."','".$data['titlename']."','".$date."')";
		$success = $this->connection->query($query);
		$query="insert into storycontent values(".intval($data['identifiername']).",'".$data['story']."')";
		$success = $this->connection->query($query);
		foreach ($data['genremultiselect'] as $genrename)
		{
			$query="select gid from genre where genrename='".$genrename."'";
			$result=$this->connection->query($query);
			$gid=$result->fetch_assoc();
			print($gid['gid']);
			$query="insert into storygenre values(".intval($data['identifiername']).",".intval($gid['gid']).")";
			$success =$this->connection->query($query);
		}
		return $success;
	}
	public function listStories(Controller $control,$phrasesvalue,$genrevalue)
	{
		$queryhighestrated="";
		$querymostviewed="";
		$querynewest="";
		//highest rated
		/*select story.identifier,story.title,story.ratings from story,storygenre where story.identifier=storygenre.identifier and storygenre.gid=2 and story.title like '%star trek%' order by story.ratings DESC LIMIT 10*/
		if($genrevalue!="All")
		{
			$genreidquery="select gid from genre where genrename='".$genrevalue."'";
			$result=$this->connection->query($genreidquery);
			$gid=$result->fetch_assoc();
			$gidval=$gid['gid'];
			$queryhighestrated="select s.identifier as identifierid, s.title as storytitle, s.sum_of_ratings_so_far / s.number_of_ratings_so_far as avgr from story s left join storygenre g on s.identifier=g.identifier where g.gid=".intval($gidval)." and s.title like '%".$phrasesvalue."%' order by avgr";
			$querymostviewed="select story.identifier as identifierid,story.title as storytitle from story,storygenre where story.identifier=storygenre.identifier and storygenre.gid=".intval($gidval)." and story.title like '%".$phrasesvalue."%' order by story.number_of_ratings_so_far desc limit 10";
			$querynewest="select story.identifier as identifierid,story.title as storytitle from story,storygenre where story.identifier=storygenre.identifier and storygenre.gid=".intval($gidval)." and story.title like '%".$phrasesvalue."%' order by story.submissiondate desc limit 10";
			
		}
		else
		{
			$queryhighestrated="select identifier as identifierid,title as storytitle, story.sum_of_ratings_so_far/story.number_of_ratings_so_far as averagerating  from story where title like '%".$phrasesvalue."%' order by averagerating desc limit 10";
			$querymostviewed="select identifier as identifierid,title as storytitle from story where title like '%".$phrasesvalue."%' order by story.number_of_ratings_so_far desc limit 10";
			$querynewest="select identifier as identifierid,title as storytitle from story where title like '%".$phrasesvalue."%' order by story.submissiondate desc limit 10";
			
		}
		$result_highest_rated=$this->connection->query($queryhighestrated);
		
		$control->data['highestrateddata']=[];
		$control->data['newestdata']=[];
		$control->data['mostvieweddata']=[];

		if ($result_highest_rated) {while($row=$result_highest_rated->fetch_assoc())
		{
			$control->data['highestrateddata'][$row['identifierid']]=$row['storytitle'];
		} }

		$result_most_viewed=$this->connection->query($querymostviewed);
		if ($result_most_viewed) { while($row=$result_most_viewed->fetch_assoc())
		{
			$control->data['mostvieweddata'][$row['identifierid']]=$row['storytitle'];
		} }

		$result_newest=$this->connection->query($querynewest);
		if ($result_newest) { while($row=$result_newest->fetch_assoc())
		{
			$control->data['newestdata'][$row['identifierid']]=$row['storytitle'];
		} }
	}
}
