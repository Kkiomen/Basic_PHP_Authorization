create table users
(
    id         int auto_increment
        primary key,
    login      varchar(20) not null,
    password   varchar(40) not null,
    firstname  varchar(20) not null,
    secondname varchar(20) not null,
    sex        int         not null,
    constraint users_login_uindex
        unique (login)
);