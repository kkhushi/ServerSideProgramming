create table genre(gid int not null auto_increment,genrename varchar(20),primary key(gid))
create table story(identifier varchar(20) not null,author varchar(35),title varchar(25),sum_of_ratings_so_far int default 0,number_of_ratings_so_far int default 0,views int default 0,submissiondate datetime,primary key(identifier))
create table storycontent(identifier int not null,content text,primary key(identifier),foreign key(identifier) references story(identifier) on delete cascade)
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
INSERT INTO story VALUES ('abc', 'Thomas Bailey Aldrich','Marjorie Daw','500','50','1000','1872-08-08 01:01:01');
INSERT INTO story VALUES ('def', 'Honoré de Balzac','A Passion in the Desert','678','345','1245','1800-10-23 01:01:04'); 
INSERT INTO story VALUES ('ghi', 'Ambrose Bierce','My Favorite Murder','234','32','5672','1916-09-01 01:02:04');
INSERT INTO story VALUES ('jkl', 'S. T. Joshi','The Fall of the Republic and Other Political Satires','345','23','575','2000-04-09 02:01:04'); 
INSERT INTO story VALUES ('mno', 'Girard','Battle Sketches','6574','324','54762','1930-03-27 02:03:04'); 
INSERT INTO story VALUES ('pqr', 'Alan Moore','Jerusalem','245','54','895','2016-12-09 02:04:04'); 
INSERT INTO story VALUES ('stu', 'Chris Hadfield','The Darkest Dark','567','34','852','2016-12-09 02:03:06');
INSERT INTO story VALUES ('vwx', 'Yona Zeldis McDonough','The Bicycle Spy','236','23','36632','2016-08-27 02:09:08');
INSERT INTO story VALUES ('yza', 'Jenny Blake','Pivot','875','34','214353','2016-06-04 03:03:04');
INSERT INTO story VALUES ('cba', 'Ruth Franklin','Shirley Jackson: A Rather Haunted Life','76','10','231','2000-07-07 03:08:04'); 
INSERT INTO story VALUES ('fed', 'Patricia MacLachlan','Skylark','789','123','658231','1992-04-18 04:23:04');
INSERT INTO story VALUES ('ihg', 'Nick Spencer','The Fix','65464','212','4574568','2012-11-15 04:24:24'); 
INSERT INTO story VALUES ('lkj', 'Kate Moretti','The Vanishing Year','8192','456','2384824','2016-06-12 05:23:04');
INSERT INTO story VALUES ('onm', 'Dawn Kurtagich','And the Trees Crept In','876','56','12457','1923-12-13 06:21:34');
INSERT INTO story VALUES ('rqp', 'Thomas Mullen','Darktown','573','35','346245','1892-12-13 06:22:14');
INSERT INTO story VALUES ('uts', 'Rebecca Yarros','Wilder','81923','324','124512','1783-08-01 07:23:24');
INSERT INTO story VALUES ('xwv', 'John Haywood','Northmen','213','90','1234','1893-07-13 08:45:30');
INSERT INTO story VALUES ('azy', ' Joshua Foer','Atlas Obscura','89','123','124124','1923-05-10 08:46:32');
INSERT INTO story VALUES ('vvm', 'Heather C. Leigh','Junkie','76846','324','2412345','2014-12-05 08:47:33');
INSERT INTO story VALUES ('kvv', 'Luvvie Ajayi','I am Judging You','1234','46','23768','1995-02-20 09:48:30');


