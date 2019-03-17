CREATE TABLE comments( 
    id int PRIMARY KEY AUTO_INCREMENT not null,
    user_id int not null,
    post_owner_id int not null,
    comment_post_id int not null,
    comment_text text not null, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) references users(id),
    FOREIGN KEY (post_owner_id) references posts(user_id),
    FOREIGN KEY (comment_post_id) references posts(id),
);
