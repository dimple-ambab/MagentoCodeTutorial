LOCK TABLES `admin_role` WRITE , `admin_user` WRITE;

SET @SALT = "rp";
SET @PASS = CONCAT(MD5(CONCAT( @SALT , "admin123") ), CONCAT(":", @SALT ));
SELECT @EXTRA := MAX(extra) FROM admin_user WHERE extra IS NOT NULL;

INSERT INTO `admin_user` (firstname,lastname,email,username,PASSWORD,created,lognum,reload_acl_flag,is_active,extra,rp_token_created_at)
VALUES ('Khoa','Truong','mrkhoa99@gmail.com','admin',@PASS,NOW(),0,0,1,@EXTRA,NOW());

INSERT INTO `admin_role` (parent_id,tree_level,sort_order,role_type,user_id,role_name)
VALUES (1,2,0,'U',(SELECT user_id FROM admin_user WHERE username = 'admin'),'Khoa');

UNLOCK TABLES;