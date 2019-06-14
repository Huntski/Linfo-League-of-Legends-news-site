
-- database tables

create table IF NOT EXISTS `linfo_users` (
    user_id varchar(1000),
    user_email varchar(50),
    user_passw varchar(3000),
    user_name varchar(50),
    user_avatar varchar(60)
);

create table IF NOT EXISTS `linfo_articles` (
    a_title varchar(50),
    a_par varchar(10000),
    a_img_links varchar(200)
    a_datum varchar(30),
    a_id INT
);

create table IF NOT EXISTS `linfo_comments` (
    post_id INT,
    comment varchar(250),
    comment_date varchar(30),
    user_id varchar(1000)
);

create table IF NOT EXISTS `linfo_saves` (
    post_id INT,
    user_id varchar(1000)
);


-- post article
insert into linfo_articles (a_title, a_par, a_img_links) values ();

-- post event
insert into linfo_events () values ()

-- remove all from "table"
delete from "table"