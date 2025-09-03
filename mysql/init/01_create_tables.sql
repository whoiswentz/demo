USE demo_db;

create table if not exists users (
    id int auto_increment primary key,
    name varchar(255) not null,
    email varchar(255) not null
);

create unique index idx_users_email on users (email);

insert into users (name, email) values ('First User', 'first@example.com'), ('Second User', 'second@example.com'), ('Third User', 'third@example.com');

create table if not exists notes (
    id int auto_increment primary key,
    body text not null,
    user_id int not null,
    foreign key (user_id) references users(id) on delete cascade
);

insert into notes (body, user_id) values ('First Note', 1), ('Second Note', 2), ('Third Note', 3);

GRANT ALL PRIVILEGES ON demo_db.* TO 'demo_user'@'%';

FLUSH PRIVILEGES;
