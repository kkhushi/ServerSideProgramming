create table genre(gid int not null auto_increment,genrename varchar(20),primary key(gid))
create table story(identifier varchar(20) not null,author varchar(35),title varchar(25),sum_of_ratings_so_far int default 0,number_of_ratings_so_far int default 0,views int default 0,submissiondate datetime,primary key(identifier))
create table storycontent(identifier varchar(20) not null,content text,primary key(identifier),foreign key(identifier) references story(identifier) on delete cascade)
create table storygenre(identifier varchar(20) not null,gid int not null,primary key(identifier,gid),foreign key(identifier) references story(identifier) on delete cascade,foreign key(gid) references genre(gid) on delete cascade)
INSERT INTO genre(genrename) VALUES ('Drama');
INSERT INTO genre(genrename) VALUES ('Fiction');
INSERT INTO genre(genrename) VALUES ('Inspirational');
INSERT INTO genre(genrename) VALUES ('Fantasy');
INSERT INTO genre(genrename) VALUES ('Romance');
INSERT INTO genre(genrename) VALUES ('Horror');
INSERT INTO genre(genrename) VALUES ('Crime');
INSERT INTO genre(genrename) VALUES ('Comedy');
INSERT INTO genre(genrename) VALUES ('Non-fiction');
INSERT INTO genre(genrename) VALUES ('Satire');
INSERT INTO genre(genrename) VALUES ('Tragedy');
INSERT INTO genre(genrename) VALUES ('Fable');
INSERT INTO genre(genrename) VALUES ('Fairy Tale');
INSERT INTO genre(genrename) VALUES ('Mystery');
INSERT INTO genre(genrename) VALUES ('Biograpghy');
INSERT INTO genre(genrename) VALUES ('Autobiography');
INSERT INTO genre(genrename) VALUES ('Essay');
INSERT INTO genre(genrename) VALUES ('Memoir');
INSERT INTO genre(genrename) VALUES ('Adventure');
INSERT INTO genre(genrename) VALUES ('Philosophical');
INSERT INTO story VALUES ('abc', 'Thomas Bailey Aldrich','Marjorie Daw',20,5,6,'1872-08-08 01:01:01');
INSERT INTO story VALUES ('def', 'Honoré de Balzac','A Passion in the Desert',22,3,7,'1800-10-23 01:01:04'); 
INSERT INTO story VALUES ('ghi', 'Ambrose Bierce','My Favorite Murder',20,5,6,'1916-09-01 01:02:04');
INSERT INTO story VALUES ('jkl', 'S. T. Joshi','The Fall of the Republic and Other Political Satires',20,5,6,'2000-04-09 02:01:04'); 
INSERT INTO story VALUES ('mno', 'Girard','Battle Sketches',20,5,6,'1930-03-27 02:03:04'); 
INSERT INTO story VALUES ('pqr', 'Alan Moore','Jerusalem',20,5,6,'2015-12-09 02:04:04'); 
INSERT INTO story VALUES ('stu', 'Chris Hadfield','The Darkest Dark',20,5,6,'2015-12-09 02:03:06');
INSERT INTO story VALUES ('vwx', 'Yona Zeldis McDonough','The Bicycle Spy',20,5,6,'2015-08-27 02:09:08');
INSERT INTO story VALUES ('yza', 'Jenny Blake','Pivot',20,5,6,'2015-06-04 03:03:04');
INSERT INTO story VALUES ('cba', 'Ruth Franklin','Shirley Jackson: A Rather Haunted Life',20,5,6,'2000-07-07 03:08:04'); 
INSERT INTO story VALUES ('fed', 'Patricia MacLachlan','Skylark',20,5,6,'1992-04-18 04:23:04');
INSERT INTO story VALUES ('ihg', 'Nick Spencer','The Fix',20,5,6,'2012-11-15 04:24:24'); 


