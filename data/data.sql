
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

create table if NOT EXISTS `linfo_events` {
    e_id int,
    e_team1 varchar(30),
    e_team1_img varchar(30),
    e_team2 varchar(30),
    e_team2_img varchar(30),
    e_location varchar(100),
    e_date datetime current_timestamp,
    e_filter varchar(6)
}


-- post article
insert into linfo_articles (a_title, a_par, a_img_links, a_author) values (
    'ALIENWARE BECOMES PRESENTING SPONSOR',
    'Alienware is officially extending its sponsorship of League of Legends esports by becoming the presenting sponsor of Rift Rivals 2019: North America vs. Europe (NA vs. EU).
    Alienware is the official competition PC and display hardware powering the League of Legends Championship Series (LCS) in North America, the League of Legends European Championship (LEC), and four major international competitions: the Mid-Season Invitational, Rift Rivals: North America vs. Europe, the All-Star Event, and pinnacle of event of the competitive season, the World Championship.
“As an integral partner across the League of Legends and esports ecosystem, we’re delighted to have Alienware become the first-ever presenting sponsor of Rift Rivals,” said Matt Archambault, Head of Esports Partnerships & Business Development for North America at Riot Games. Given their commitments to both the LCS and LEC leagues, in addition to Global Events, we’re eager to level-up the event as our own Ryder Cup, complete with unique activations for both onsite fans and our viewers.”
',
'alien.png',
'KIEN LAM'
);

-- post event
insert into linfo_events (e_team1, e_team1_img, e_team2, e_team2_img, e_location, e_date, e_filter) values ('TSM', 'tsm.png', 'CLS', 'clg.png', 'New York', '2019-06-02 12:30:00', 'lcs')

-- remove all from "table"
delete from "table"