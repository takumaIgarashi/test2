drop table if exists blogs;

create table blogs(
    id int auto_increment primary key,
    title VARCHAR(191),
    content text,
    category int,
    post_At date,
    publish_status int 
);

INSERT into blogs(title,content,category,post_At,publish_status) VALUES ('テスト','テストです',1,'2020-02-22',1);
INSERT into blogs(title,content,category,post_At,publish_status) VALUES ('テスト2','テスト2です',2,'2020-02-22',1);



select * from blogs;
-- desc blogs;
