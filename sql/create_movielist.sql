create table movies
( movieid int unsigned not null auto_increment primary key,
  title text not null,
  thumbnail text not null,
  trailer text not null,
  descriptions text not null,
  release_on date not null
);