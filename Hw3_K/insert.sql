create table genre(gid int not null auto_increment,genrename varchar(20),primary key(gid))
create table story(identifier int not null,author varchar(25),title varchar(25),sum_of_ratings_so_far int,number_of_ratings_so_far int,views int,submissiondate date,primary key(identifier))
create table storycontent(identifier int not null,content text,primary key(identifier))
create table storygenre(identifier int not null,gid int not null,primary key(identifier,gid),foreign key(identifier) references story(identifier),foreign key(gid) references genre(gid))
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
INSERT INTO story VALUES ('1', 'Thomas Bailey Aldrich','Marjorie Daw','500','50','1000','1872-08-08');
INSERT INTO story VALUES ('2', 'Honoré de Balzac','A Passion in the Desert','678','345','1245','1800-23-10'); 
INSERT INTO story VALUES ('3', 'Ambrose Bierce','My Favorite Murder','234','32','5672','1916-09-01');
INSERT INTO story VALUES ('4', 'S. T. Joshi','The Fall of the Republic and Other Political Satires','345','23','575','2000-04-09'); 
INSERT INTO story VALUES ('5', 'Girard','Battle Sketches','6574','324','54762','1930-27-03'); 
INSERT INTO story VALUES ('6', 'Alan Moore','Jerusalem','245','54','895','2016-13-09'); 
INSERT INTO story VALUES ('7', 'Chris Hadfield','The Darkest Dark','567','34','852','2016-13-09');
INSERT INTO story VALUES ('8', 'Yona Zeldis McDonough','The Bicycle Spy','236','23','36632','2016-27-08');
INSERT INTO story VALUES ('9', 'Jenny Blake','Pivot','875','34','214353','2016-06-04');
INSERT INTO story VALUES ('10', 'Ruth Franklin','Shirley Jackson: A Rather Haunted Life','76','10','231','2000-07-07'); 
INSERT INTO story VALUES ('11', 'Patricia MacLachlan','Skylark','789','123','658231','1992-18-04');
INSERT INTO story VALUES ('12', 'Nick Spencer','The Fix','65464','212','4574568','2012-15-11'); 
INSERT INTO story VALUES ('13', 'Kate Moretti','The Vanishing Year','8192','456','2384824','2016-06-12');
INSERT INTO story VALUES ('14', 'Dawn Kurtagich','And the Trees Crept In','876','56','12457','1923-13-12');
INSERT INTO story VALUES ('15', 'Thomas Mullen','Darktown','573','35','346245','1892-13-03');
INSERT INTO story VALUES ('16', 'Rebecca Yarros','Wilder','81923','324','124512','1783-08-01');
INSERT INTO story VALUES ('17', 'John Haywood','Northmen','213','90','1234','1893-13-07');
INSERT INTO story VALUES ('18', ' Joshua Foer','Atlas Obscura','89','123','124124','1923-05-10');
INSERT INTO story VALUES ('19', 'Heather C. Leigh','Junkie','76846','324','2412345','2014-12-05');
INSERT INTO story VALUES ('20', 'Luvvie Ajayi','I am Judging You','1234','46','23768','1995-23-02');


