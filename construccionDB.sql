CREATE TABLE tab_user (
  PRIMARY KEY(col_usr_id),
  col_usr_id            INT             NOT NULL    AUTO_INCREMENT    UNIQUE,
  col_usr_email         VARCHAR(255)    NOT NULL                      UNIQUE,
  col_usr_password      VARCHAR(255)    NOT NULL,
  col_usr_alias         VARCHAR(255)    NOT NULL                      UNIQUE,
  col_usr_fullName        VARCHAR(255)    NOT NULL,
  col_user_profilePic   VARCHAR(255),
  col_usr_createdAt     DATETIME        NOT NULL                      DEFAULT   CURRENT_TIMESTAMP
);

CREATE TABLE tab_followUser (
  PRIMARY KEY(col_followUser_follower, col_followUser_followed),
  col_followUser_follower             INT   NOT NULL,
                      FOREIGN KEY (col_followUser_follower) REFERENCES tab_user (col_usr_id)
                          ON DELETE NO ACTION
                          ON UPDATE NO ACTION,
  col_followUser_followed         INT   NOT NULL,
                      FOREIGN KEY (col_followUser_followed) REFERENCES tab_user (col_usr_id)
                          ON DELETE NO ACTION
                          ON UPDATE NO ACTION,
  col_followUser_createdAt   DATETIME    NOT NULL    DEFAULT   CURRENT_TIMESTAMP
);

CREATE TABLE tab_user_post (
  PRIMARY KEY(col_usrPost_id),
  col_usrPost_id          INT             NOT NULL    AUTO_INCREMENT    UNIQUE,
  col_usrPost_user             INT             NOT NULL,
  col_usrPost_text           VARCHAR(150)    NOT NULL,
  col_usrPost_media              VARCHAR(255),
  col_usrPost_createdAt   DATETIME          NOT NULL                              DEFAULT   CURRENT_TIMESTAMP, 
                      FOREIGN KEY (col_usrPost_user) REFERENCES tab_user (col_usr_id)
                          ON DELETE NO ACTION
                          ON UPDATE NO ACTION
);

