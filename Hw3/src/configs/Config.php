<?php
/*Config.php class with constants for things like database user, password, host, port, etc.
 |            Basically, it should have anything you think the grader might need to get your program running on my machine.
 |            It should have a script CreateDB.php which can be run from the command-line to make a good initial
 |            database. Your database tables*/
namespace thrill_seekers\hw3\configs;

class Config
{

	const BASE_URL="http://localhost/Hw3";
	const _CONTROLLER_NAMESPACE_="thrill_seekers\\hw3\\controllers\\";
	const MAX_TITLE_LENGTH=25;
	const MAX_STORY_LENGTH=5000;
	const MAX_IDENTIFIER_LENGTH=15;
	const MAX_AUTHOR_LENGTH=35;
	const DB_HOST="localhost";
	const DB_USER="root";
	const DB_PASSWORD="";
	const DB_NAME="hw3final2";
	const TIME_ZONE_VALUE='America/Los_Angeles';
} ?>
