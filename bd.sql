CREATE DATABASE IF NOT EXISTS gestor_tareas;

USE gestor_tareas;

CREATE TABLE IF NOT EXISTS Users(
  id int(255) auto_increment NOT NULL,
  role varchar(50),
  name varchar(100),
  surname varchar(100),
  email varchar(50) not null,
  password varchar(255) not null,
  created_at datetime,

  CONSTRAINT pk_users PRIMARY KEY (id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS Tasks(
  id int(255) auto_increment NOT NULL,
  user_id int(255) not null,
  title varchar(255),
  content text,
  priority varchar(20),
  hours int(100),
  created_at datetime,

  CONSTRAINT pk_tasks PRIMARY KEY (id),
  CONSTRAINT fk_users FOREIGN KEY (user_id) REFERENCES Users(id)
)ENGINE=InnoDb;