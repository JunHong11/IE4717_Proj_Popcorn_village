create table users
( username text not null,
  passwords varchar(40) not null,
  email text not null,
  discount text DEFAULT null,
  featured text DEFAULT null
);