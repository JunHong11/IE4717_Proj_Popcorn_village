create table purchases
( tid int unsigned not null primary key,
  rid int not null,
  mid int not null,
  seat text not null,
  moviedate date not null,
  movietime time not null
);