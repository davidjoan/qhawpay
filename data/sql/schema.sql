CREATE TABLE t_address (id BIGINT AUTO_INCREMENT, store_id BIGINT NOT NULL, customer_id BIGINT NOT NULL, country_id BIGINT NOT NULL, city_id BIGINT NOT NULL, street VARCHAR(200) NOT NULL, address VARCHAR(200), zip_code VARCHAR(20), phone VARCHAR(50), fax VARCHAR(50), mobile VARCHAR(50), active CHAR(1) DEFAULT '0' NOT NULL, slug VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, latitude DOUBLE(18, 2), longitude DOUBLE(18, 2), deleted_at DATETIME, INDEX i_street_idx (street), INDEX i_active_idx (active), UNIQUE INDEX t_address_sluggable_idx (slug), INDEX store_id_idx (store_id), INDEX customer_id_idx (customer_id), INDEX country_id_idx (country_id), INDEX city_id_idx (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE t_category (id BIGINT AUTO_INCREMENT, name VARCHAR(100) NOT NULL, description TEXT, image VARCHAR(255), active CHAR(1) DEFAULT '0' NOT NULL, slug VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, UNIQUE INDEX u_name_idx (name), UNIQUE INDEX t_category_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE t_city (id BIGINT AUTO_INCREMENT, country_id BIGINT NOT NULL, code VARCHAR(5) NOT NULL, name VARCHAR(100) NOT NULL, description TEXT, image VARCHAR(255), active CHAR(1) DEFAULT '0' NOT NULL, slug VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, INDEX i_code_idx (code), INDEX i_active_idx (active), UNIQUE INDEX t_city_sluggable_idx (slug), INDEX country_id_idx (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE t_country (id BIGINT AUTO_INCREMENT, code VARCHAR(5) NOT NULL, name VARCHAR(100) NOT NULL, description TEXT, image VARCHAR(255), active CHAR(1) DEFAULT '0' NOT NULL, slug VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, UNIQUE INDEX u_code_idx (code), UNIQUE INDEX u_name_idx (name), INDEX i_active_idx (active), UNIQUE INDEX t_country_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE t_customer (id BIGINT AUTO_INCREMENT, realname VARCHAR(200) NOT NULL, username VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, date_of_birth DATE, gender CHAR(1) NOT NULL, email VARCHAR(100) NOT NULL, url VARCHAR(255), picture VARCHAR(255), about TEXT, twitter_username VARCHAR(100), phone VARCHAR(100), active CHAR(1) DEFAULT '0' NOT NULL, last_access_at DATETIME, facebook_id VARCHAR(20), email_hash VARCHAR(255), is_admin CHAR(1) DEFAULT 'N' NOT NULL, slug VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, INDEX i_username_idx (username), UNIQUE INDEX u_email_idx (email), UNIQUE INDEX u_facebook_id_idx (facebook_id), INDEX i_url_idx (url), INDEX i_twitter_username_idx (twitter_username), INDEX i_active_idx (active), INDEX i_gender_idx (gender), INDEX i_is_admin_idx (is_admin), UNIQUE INDEX t_customer_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE google_account (id BIGINT AUTO_INCREMENT, user_token VARCHAR(255) NOT NULL UNIQUE, last_login DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE t_offer (id BIGINT AUTO_INCREMENT, store_id BIGINT NOT NULL, address_id BIGINT NOT NULL, customer_id BIGINT NOT NULL, title VARCHAR(100) NOT NULL, description TEXT, image VARCHAR(255), active CHAR(1) DEFAULT '0' NOT NULL, expiration_date datetime, slug VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, INDEX i_title_idx (title), UNIQUE INDEX t_offer_sluggable_idx (slug), INDEX address_id_idx (address_id), INDEX customer_id_idx (customer_id), INDEX store_id_idx (store_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE t_photo (id BIGINT AUTO_INCREMENT, store_id BIGINT NOT NULL, customer_id BIGINT NOT NULL, name VARCHAR(100) NOT NULL, content TEXT NOT NULL, path VARCHAR(255) NOT NULL, size BIGINT DEFAULT 0 NOT NULL, full_mime VARCHAR(100) NOT NULL, rank BIGINT DEFAULT 0 NOT NULL, ip VARCHAR(100) NOT NULL, agent VARCHAR(255) NOT NULL, approved CHAR(1) DEFAULT '0' NOT NULL, slug VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, INDEX i_name_idx (name), INDEX i_content_idx (content(200)), UNIQUE INDEX t_photo_sluggable_idx (slug), INDEX store_id_idx (store_id), INDEX customer_id_idx (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE t_service (id BIGINT AUTO_INCREMENT, name VARCHAR(100) NOT NULL, description TEXT, image VARCHAR(255), active CHAR(1) DEFAULT '0' NOT NULL, slug VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, UNIQUE INDEX u_name_idx (name), UNIQUE INDEX t_service_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE t_store (id BIGINT AUTO_INCREMENT, customer_id BIGINT NOT NULL, ruc VARCHAR(200), name VARCHAR(200) NOT NULL, logo VARCHAR(200), url VARCHAR(200), phrase TEXT, info TEXT, description TEXT, datetime DATETIME NOT NULL, qty_votes BIGINT, status CHAR(2) DEFAULT 'PE' NOT NULL, slug VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, UNIQUE INDEX u_ruc_idx (ruc), UNIQUE INDEX u_name_idx (name), INDEX i_ruc_idx (status), INDEX i_phrase_idx (phrase(400)), INDEX i_info_idx (info(100)), INDEX i_datetime_idx (datetime), INDEX i_status_idx (status), UNIQUE INDEX t_store_sluggable_idx (slug), INDEX customer_id_idx (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE t_store_category (store_id BIGINT, category_id BIGINT, created_at DATETIME NOT NULL, PRIMARY KEY(store_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE t_store_service (store_id BIGINT, service_id BIGINT, created_at DATETIME NOT NULL, PRIMARY KEY(store_id, service_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE t_store_tag (store_id BIGINT, tag_id BIGINT, created_at DATETIME NOT NULL, PRIMARY KEY(store_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE t_tag (id BIGINT AUTO_INCREMENT, name VARCHAR(100) NOT NULL, slug VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX u_name_idx (name), UNIQUE INDEX t_tag_sluggable_idx (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
CREATE TABLE t_visit (id BIGINT AUTO_INCREMENT, remote_address VARCHAR(50) NOT NULL, remote_port VARCHAR(50) NOT NULL, http_user_agent VARCHAR(255) NOT NULL, datetime datetime NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX i_remote_address_idx (remote_address), INDEX i_datetime_idx (datetime), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ENGINE = INNODB;
ALTER TABLE t_address ADD CONSTRAINT t_address_store_id_t_store_id FOREIGN KEY (store_id) REFERENCES t_store(id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE t_address ADD CONSTRAINT t_address_customer_id_t_customer_id FOREIGN KEY (customer_id) REFERENCES t_customer(id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE t_address ADD CONSTRAINT t_address_country_id_t_country_id FOREIGN KEY (country_id) REFERENCES t_country(id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE t_address ADD CONSTRAINT t_address_city_id_t_city_id FOREIGN KEY (city_id) REFERENCES t_city(id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE t_city ADD CONSTRAINT t_city_country_id_t_country_id FOREIGN KEY (country_id) REFERENCES t_country(id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE t_offer ADD CONSTRAINT t_offer_store_id_t_store_id FOREIGN KEY (store_id) REFERENCES t_store(id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE t_offer ADD CONSTRAINT t_offer_customer_id_t_customer_id FOREIGN KEY (customer_id) REFERENCES t_customer(id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE t_offer ADD CONSTRAINT t_offer_address_id_t_address_id FOREIGN KEY (address_id) REFERENCES t_address(id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE t_photo ADD CONSTRAINT t_photo_store_id_t_store_id FOREIGN KEY (store_id) REFERENCES t_store(id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE t_photo ADD CONSTRAINT t_photo_customer_id_t_customer_id FOREIGN KEY (customer_id) REFERENCES t_customer(id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE t_store ADD CONSTRAINT t_store_customer_id_t_customer_id FOREIGN KEY (customer_id) REFERENCES t_customer(id) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE t_store_category ADD CONSTRAINT t_store_category_store_id_t_store_id FOREIGN KEY (store_id) REFERENCES t_store(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE t_store_category ADD CONSTRAINT t_store_category_category_id_t_category_id FOREIGN KEY (category_id) REFERENCES t_category(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE t_store_service ADD CONSTRAINT t_store_service_store_id_t_store_id FOREIGN KEY (store_id) REFERENCES t_store(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE t_store_service ADD CONSTRAINT t_store_service_service_id_t_service_id FOREIGN KEY (service_id) REFERENCES t_service(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE t_store_tag ADD CONSTRAINT t_store_tag_tag_id_t_tag_id FOREIGN KEY (tag_id) REFERENCES t_tag(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE t_store_tag ADD CONSTRAINT t_store_tag_store_id_t_store_id FOREIGN KEY (store_id) REFERENCES t_store(id) ON UPDATE CASCADE ON DELETE CASCADE;
