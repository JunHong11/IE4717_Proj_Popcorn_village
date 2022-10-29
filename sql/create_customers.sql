create table customers
( rid int unsigned not null primary key,
  email text not null,
  custname text not null,
  username text not null,
  spendings float(50,2) not null
);