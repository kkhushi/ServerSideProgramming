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
INSERT INTO story VALUES ('def', 'Honoré de Balzac','A Passion in the Desert',15,3,7,'1800-10-23 01:01:04'); 
INSERT INTO storycontent VALUES ('abc', 'The story is written entirely as a series of letters between two friends');
INSERT INTO storycontent VALUES ('def', 'The narrator and his woman friend are leaving a wild animal show.');
INSERT INTO storygenre VALUES ('abc', 1);
INSERT INTO storygenre VALUES ('abc', 3);
INSERT INTO storygenre VALUES ('def', 2);
INSERT INTO storygenre VALUES ('def', 4);



