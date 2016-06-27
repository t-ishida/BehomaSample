CREATE TABLE message_board (
  id BIGINT NOT NULL primary key,
  user_name VARCHAR(255) NOT NULL,
  mail_address VARCHAR (255) NULL,
  content TEXT NOT NULL,
  created_at BIGINT NOT NULL
);