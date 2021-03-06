DROP TABLE IF EXISTS genre;
create table genre(gid int not null auto_increment,genrename varchar(20),primary key(gid))
DROP TABLE IF EXISTS story;
create table story(identifier varchar(20) not null,author varchar(35),title varchar(25),sum_of_ratings_so_far int default 0,number_of_ratings_so_far int default 0,views int default 0,submissiondate datetime,primary key(identifier))
DROP TABLE IF EXISTS storycontent;
create table storycontent(identifier int not null,content text,primary key(identifier),foreign key(identifier) references story(identifier) on delete cascade)
DROP TABLE IF EXISTS storygenre;
create table storygenre(identifier varchar(20) not null,gid int not null,primary key(identifier,gid),foreign key(identifier) references story(identifier) on delete cascade,foreign key(gid) references genre(gid) on delete cascade)
INSERT INTO genre VALUES ('1', 'Drama');
INSERT INTO genre VALUES ('2', 'Fiction');
INSERT INTO genre VALUES ('3', 'Inspirational');
INSERT INTO genre VALUES ('4', 'Fantasy');
INSERT INTO genre VALUES ('5', 'Romance');
INSERT INTO genre VALUES ('6', 'Horror');
INSERT INTO genre VALUES ('7', 'Crime');
INSERT INTO genre VALUES ('8', 'Comedy');
INSERT INTO genre VALUES ('9', 'Non-fiction');
INSERT INTO genre VALUES ('10', 'Satire');
INSERT INTO genre VALUES ('11', 'Tragedy');
INSERT INTO genre VALUES ('12', 'Fable');
INSERT INTO genre VALUES ('13', 'Fairy Tale');
INSERT INTO genre VALUES ('14', 'Mystery');
INSERT INTO genre VALUES ('15', 'Biograpghy');
INSERT INTO genre VALUES ('16', 'Autobiography');
INSERT INTO genre VALUES ('17', 'Essay');
INSERT INTO genre VALUES ('18', 'Memoir');
INSERT INTO genre VALUES ('19', 'Adventure');
INSERT INTO genre VALUES ('20', 'Philosophical');
INSERT INTO story VALUES ('abc', 'Thomas Bailey Aldrich','Marjorie Daw 2','500','50','1000','1872-08-08 01:01:01');
INSERT INTO story VALUES ('def', 'Honoré de Balzac','A Passion in the Desert 2','678','345','1245','1800-10-23 01:01:04'); 
INSERT INTO story VALUES ('ghi', 'Ambrose Bierce','My Favorite Murder 2','234','32','5672','1916-09-01 01:02:04');
INSERT INTO story VALUES ('jkl', 'S. T. Joshi','The Fall of the Republic and Other Political Satires 2' ,'345','23','575','2000-04-09 02:01:04'); 
INSERT INTO story VALUES ('mno', 'Girard','Battle Sketches 2','6574','324','54762','1930-03-27 02:03:04'); 
INSERT INTO story VALUES ('pqr', 'Alan Moore','Jerusalem 2','245','54','895','2016-12-09 02:04:04'); 
INSERT INTO story VALUES ('stu', 'Chris Hadfield','The Darkest Dark 2','567','34','852','2016-12-09 02:03:06');
INSERT INTO story VALUES ('vwx', 'Yona Zeldis McDonough','The Bicycle Spy 2','236','23','36632','2016-08-27 02:09:08');
INSERT INTO story VALUES ('yza', 'Jenny Blake','Pivot 2','875','34','214353','2016-06-04 03:03:04');
INSERT INTO story VALUES ('cba', 'Ruth Franklin','Shirley Jackson: A Rather Haunted Life 2','76','10','231','2000-07-07 03:08:04'); 
INSERT INTO story VALUES ('fed', 'Patricia MacLachlan','Skylark 2','789','123','658231','1992-04-18 04:23:04');
INSERT INTO story VALUES ('ihg', 'Nick Spencer','The Fix 2','65464','212','4574568','2012-11-15 04:24:24'); 
INSERT INTO story VALUES ('lkj', 'Kate Moretti','The Vanishing Year 2','8192','456','2384824','2016-06-12 05:23:04');
INSERT INTO story VALUES ('onm', 'Dawn Kurtagich','And the Trees Crept In 2','876','56','12457','1923-12-13 06:21:34');
INSERT INTO story VALUES ('rqp', 'Thomas Mullen','Darktown 2','573','35','346245','1892-12-13 06:22:14');
INSERT INTO story VALUES ('uts', 'Rebecca Yarros','Wilder 2','81923','324','124512','1783-08-01 07:23:24');
INSERT INTO story VALUES ('xwv', 'John Haywood','Northmen 2','213','90','1234','1893-07-13 08:45:30');
INSERT INTO story VALUES ('azy', ' Joshua Foer','Atlas Obscura 2','89','123','124124','1923-05-10 08:46:32');
INSERT INTO story VALUES ('vvm', 'Heather C. Leigh','Junkie 2','76846','324','2412345','2014-12-05 08:47:33');
INSERT INTO story VALUES ('kvv', 'Luvvie Ajayi','I am Judging You 2','1234','46','23768','1995-02-20 09:48:30');
INSERT INTO story VALUES ('qwr', 'Thomas Bailey Aldrich 2','Marjorie Daw','500','50','1000','1872-08-08 01:01:01');
INSERT INTO story VALUES ('asd', 'Honoré de Balzac 2','A Passion in the Desert','678','345','1245','1800-10-23 01:01:04'); 
INSERT INTO story VALUES ('zxc', 'Ambrose Bierce 2','My Favorite Murder','234','32','5672','1916-09-01 01:02:04');
INSERT INTO story VALUES ('rty', 'S. T. Joshi 2','The Fall of the Republic and Other Political Satires','345','23','575','2000-04-09 02:01:04'); 
INSERT INTO story VALUES ('yyui', 'Girard','Battle Sketches','6574','324','54762','1930-03-27 02:03:04'); 
INSERT INTO story VALUES ('fgsdg', 'Alan Moore','Jerusalem','245','54','895','2016-12-09 02:04:04'); 
INSERT INTO story VALUES ('dafa', 'Chris Hadfield','The Darkest Dark','567','34','852','2016-12-09 02:03:06');
INSERT INTO story VALUES ('fdaf', 'Yona Zeldis McDonough','The Bicycle Spy','236','23','36632','2016-08-27 02:09:08');
INSERT INTO story VALUES ('qrqer', 'Jenny Blake','Pivot','875','34','214353','2016-06-04 03:03:04');
INSERT INTO story VALUES ('qrree', 'Ruth Franklin','Shirley Jackson: A Rather Haunted Life','76','10','231','2000-07-07 03:08:04'); 
INSERT INTO story VALUES ('ggsg', 'Patricia MacLachlan','Skylark','789','123','658231','1992-04-18 04:23:04');
INSERT INTO story VALUES ('ihgg', 'Nick Spencer','The Fix','65464','212','4574568','2012-11-15 04:24:24'); 
INSERT INTO story VALUES ('lksj', 'Kate Moretti','The Vanishing Year','8192','456','2384824','2016-06-12 05:23:04');
INSERT INTO story VALUES ('onwm', 'Dawn Kurtagich','And the Trees Crept In','876','56','12457','1923-12-13 06:21:34');
INSERT INTO story VALUES ('rqap', 'Thomas Mullen','Darktown','573','35','346245','1892-12-13 06:22:14');
INSERT INTO story VALUES ('utqs', 'Rebecca Yarros','Wilder','81923','324','124512','1783-08-01 07:23:24');
INSERT INTO story VALUES ('xwwv', 'John Haywood','Northmen','213','90','1234','1893-07-13 08:45:30');
INSERT INTO story VALUES ('azey', ' Joshua Foer','Atlas Obscura','89','123','124124','1923-05-10 08:46:32');
INSERT INTO story VALUES ('vvrm', 'Heather C. Leigh','Junkie','76846','324','2412345','2014-12-05 08:47:33');
INSERT INTO story VALUES ('kvtv', 'Luvvie Ajayi','I am Judging You','1234','46','23768','1995-02-20 09:48:30');
INSERT INTO storycontent VALUES ('abc', 'Thomas Bailey Aldrich Marjorie Daw 500 50 1000 1872-08-08 01:01:01');
INSERT INTO storycontent VALUES ('def', 'Honoré de Balzac A Passion in the Desert 678 345 1245 1800-10-23 01:01:04'); 
INSERT INTO storycontent VALUES ('ghi', 'Ambrose Bierce My Favorite Murder 234 32 5672 1916-09-01 01:02:04');
INSERT INTO storycontent VALUES ('jkl', 'S. T. Joshi The Fall of the Republic and Other Political Satires 34523 575  2000-04-09 02:01:04'); 
INSERT INTO storycontent VALUES ('mno', 'Girard Battle Sketches 6574 324 54762 1930-03-27 02:03:04'); 
INSERT INTO storycontent VALUES ('pqr', 'Alan Moore Jerusalem 245 54 895 2016-12-09 02:04:04'); 
INSERT INTO storycontent VALUES ('stu', 'Chris Hadfield The Darkest Dark 567 34 852 2016-12-09 02:03:06');
INSERT INTO storycontent VALUES ('vwx', 'Yona Zeldis McDonough The Bicycle Spy 236 23 36632 2016-08-27 02:09:08');
INSERT INTO storycontent VALUES ('yza', 'Jenny Blake Pivot 875 34 214353 2016-06-04 03:03:04');
INSERT INTO storycontent VALUES ('cba', 'Ruth Franklin Shirley Jackson: A Rather Haunted Life 76 10 231 2000-07-07 03:08:04'); 
INSERT INTO storycontent VALUES ('fed', 'Patricia MacLachlan Skylark 789 123 658231 1992-04-18 04:23:04');
INSERT INTO storycontent VALUES ('ihg', 'Nick Spencer The Fix 65464 212 4574568 2012-11-15 04:24:24'); 
INSERT INTO storycontent VALUES ('lkj', 'Kate Moretti The Vanishing Year 8192 456 2384824 2016-06-12 05:23:04');
INSERT INTO storycontent VALUES ('onm', 'Dawn Kurtagich And the Trees Crept In 876 56 12457 1923-12-13 06:21:34');
INSERT INTO storycontent VALUES ('rqp', 'Thomas Mullen Darktown 573 35 346245 1892-12-13 06:22:14');
INSERT INTO storycontent VALUES ('uts', 'Rebecca Yarros Wilder 81923 324 124512 1783-08-01 07:23:24');
INSERT INTO storycontent VALUES ('xwv', 'John Haywood Northmen 213 90 1234 1893-07-13 08:45:30');
INSERT INTO storycontent VALUES ('azy', ' Joshua Foer Atlas Obscura 89 123 124124 1923-05-10 08:46:32');
INSERT INTO storycontent VALUES ('vvm', 'Heather C. Leigh Junkie   76846  324 2412345 2014-12-05 08:47:33');
INSERT INTO storycontent VALUES ('kvv', 'Luvvie Ajayi I am Judging You 1234 46 23768 1995-02-20 09:48:30');
INSERT INTO storycontent VALUES ('qwr', 'Thomas Bailey Aldrich Marjorie Daw 500 50 1000 1872-08-08 01:01:01');
INSERT INTO storycontent VALUES ('asd', 'Honoré de Balzac  A Passion in the Desert      678 345 1245 1800-10-23 01:01:04'); 
INSERT INTO storycontent VALUES ('zxc', 'Ambrose Bierce My Favorite Murder 234 32 5672 1916-09-01 01:02:04');
INSERT INTO storycontent VALUES ('rty', 'S. T. Joshi The Fall of the Republic and Other Political Satires 345  23 575 2000-04-09 02:01:04'); 
INSERT INTO storycontent VALUES ('yyui', 'Girard Battle Sketches 6574 324 54762 1930-03-27 02:03:04'); 
INSERT INTO storycontent VALUES ('fgsdg', 'Alan Moore Jerusalem 245 54 895 2016-12-09 02:04:04'); 
INSERT INTO storycontent VALUES ('dafa', 'Chris Hadfield The Darkest Dark 567 34 852 2016-12-09 02:03:06');
INSERT INTO storycontent VALUES ('fdaf', 'Yona Zeldis McDonough The Bicycle Spy 236 23 36632 2016-08-27 02:09:08');
INSERT INTO storycontent VALUES ('qrqer', 'Jenny Blake Pivot 875 34 214353 2016-06-04 03:03:04');
INSERT INTO storycontent VALUES ('qrree', 'Ruth Franklin Shirley Jackson: A Rather Haunted Life  76 10 231 2000-07-07 03:08:04'); 
INSERT INTO storycontent VALUES ('ggsg', 'Patricia MacLachlan Skylark 789 123 658231 1992-04-18 04:23:04');
INSERT INTO storycontent VALUES ('ihgg', 'Nick Spencer The Fix 65464 212 4574568 2012-11-15 04:24:24'); 
INSERT INTO storycontent VALUES ('lksj', 'Kate Moretti The Vanishing Year 8192 456 2384824  2016-06-12 05:23:04');
INSERT INTO storycontent VALUES ('onwm', 'Dawn Kurtagich And the Trees Crept In 876 56 12457 1923-12-13 06:21:34');
INSERT INTO storycontent VALUES ('rqap', 'Thomas Mullen Darktown 573 35 346245  1892-12-13 06:22:14');
INSERT INTO storycontent VALUES ('utqs', 'Rebecca Yarros Wilder  81923 324 124512 1783-08-01 07:23:24');
INSERT INTO storycontent VALUES ('xwwv', 'John Haywood Northmen 213 90 1234 1893-07-13 08:45:30');
INSERT INTO storycontent VALUES ('azey', ' Joshua Foer Atlas Obscura 89 123 124124 1923-05-10 08:46:32');
INSERT INTO storycontent VALUES ('vvrm', 'Heather C. Leigh Junkie 76846 324 2412345 2014-12-05 08:47:33');
INSERT INTO storycontent VALUES ('kvtv', 'Luvvie Ajayi I am Judging You 1234 46 23768 1995-02-20 09:48:30');
INSERT INTO storygenre VALUES ('abc', 1);
INSERT INTO storygenre VALUES ('def', 2);
INSERT INTO storygenre VALUES ('ghi', 3);
INSERT INTO storygenre VALUES ('jkl', 4);
INSERT INTO storygenre VALUES ('pqr', 6);
INSERT INTO storygenre VALUES ('stu', 7);
INSERT INTO storygenre VALUES ('vwx', 8);
INSERT INTO storygenre VALUES ('yza', 9);
INSERT INTO storygenre VALUES ('cba', 10);
INSERT INTO storygenre VALUES ('fed', 11);
INSERT INTO storygenre VALUES ('ihg', 12);
INSERT INTO storygenre VALUES ('lkj', 13);
INSERT INTO storygenre VALUES ('onm', 14);
INSERT INTO storygenre VALUES ('rqp', 15);
INSERT INTO storygenre VALUES ('uts', 16);
INSERT INTO storygenre VALUES ('xwv', 17);
INSERT INTO storygenre VALUES ('azy', 18);
INSERT INTO storygenre VALUES ('vvm', 19);
INSERT INTO storygenre VALUES ('kvv', 20);
INSERT INTO storygenre VALUES ('qwr', 1);
INSERT INTO storygenre VALUES ('asd', 2);
INSERT INTO storygenre VALUES ('zxc', 3);
INSERT INTO storygenre VALUES ('rty', 4);
INSERT INTO storygenre VALUES ('yyui', 5);
INSERT INTO storygenre VALUES ('fgsdg', 6);
INSERT INTO storygenre VALUES ('dafa', 7);
INSERT INTO storygenre VALUES ('fdaf', 8);
INSERT INTO storygenre VALUES ('qrqer', 9);
INSERT INTO storygenre VALUES ('qrree', 10);
INSERT INTO storygenre VALUES ('ggsg', 11);
INSERT INTO storygenre VALUES ('ihgg', 12);
INSERT INTO storygenre VALUES ('lksj', 13);
INSERT INTO storygenre VALUES ('onwm', 14);
INSERT INTO storygenre VALUES ('rqap', 15);
INSERT INTO storygenre VALUES ('utqs', 16);
INSERT INTO storygenre VALUES ('xwwv', 17);
INSERT INTO storygenre VALUES ('azey', 18);
INSERT INTO storygenre VALUES ('vvrm', 19);
INSERT INTO storygenre VALUES ('kvtv', 20);
INSERT INTO storygenre VALUES ('abc', 13);
INSERT INTO storygenre VALUES ('def', 20);
INSERT INTO storygenre VALUES ('ghi', 13);
INSERT INTO storygenre VALUES ('jkl', 14);
INSERT INTO storygenre VALUES ('pqr', 16);
INSERT INTO storygenre VALUES ('stu', 17);
INSERT INTO storygenre VALUES ('vwx', 18);
INSERT INTO storygenre VALUES ('yza', 19);
INSERT INTO storygenre VALUES ('cba', 20);
INSERT INTO storygenre VALUES ('fed', 1);
INSERT INTO storygenre VALUES ('ihg', 2);
INSERT INTO storygenre VALUES ('lkj', 3);
INSERT INTO storygenre VALUES ('onm', 4);
INSERT INTO storygenre VALUES ('rqp', 5);
INSERT INTO storygenre VALUES ('uts', 6);
INSERT INTO storygenre VALUES ('xwv', 7);
INSERT INTO storygenre VALUES ('azy', 8);
INSERT INTO storygenre VALUES ('vvm', 9);
INSERT INTO storygenre VALUES ('kvv', 1);
INSERT INTO storygenre VALUES ('qwr', 11);
INSERT INTO storygenre VALUES ('asd', 12);
INSERT INTO storygenre VALUES ('zxc', 13);
INSERT INTO storygenre VALUES ('rty', 14);
INSERT INTO storygenre VALUES ('yyui',15);
INSERT INTO storygenre VALUES ('fgsdg',16);
INSERT INTO storygenre VALUES ('dafa',17);
INSERT INTO storygenre VALUES ('fdaf',18);
INSERT INTO storygenre VALUES ('qrqer',19);
INSERT INTO storygenre VALUES ('qrree',1);
INSERT INTO storygenre VALUES ('ggsg',1);
INSERT INTO storygenre VALUES ('ihgg',2);
INSERT INTO storygenre VALUES ('lksj',3);
INSERT INTO storygenre VALUES ('onwm',4);
INSERT INTO storygenre VALUES ('rqap',5);
INSERT INTO storygenre VALUES ('utqs',6);
INSERT INTO storygenre VALUES ('xwwv',7);
INSERT INTO storygenre VALUES ('azey',8);
INSERT INTO storygenre VALUES ('vvrm',9);
INSERT INTO storygenre VALUES ('kvtv',2);
