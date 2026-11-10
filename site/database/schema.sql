-- EC2-lab database schema (MySQL 8)
-- Rebuilt from the queries in the PHP code and the phpMyAdmin screenshots.
-- Column TYPES marked "assumed" were not visible in the screenshots; adjust if yours differ.
-- No data and no passwords are included.

-- ---------------------------------------------------------------
-- contact_data: rows written by contact.php, read by query_contacts.php
-- ---------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS contact_data;
USE contact_data;

CREATE TABLE IF NOT EXISTS contact_info (
  first_name VARCHAR(64)  NOT NULL,   -- assumed type
  last_name  VARCHAR(64)  NOT NULL,   -- assumed type
  email      VARCHAR(128) NOT NULL,   -- assumed type
  username   VARCHAR(64)  NOT NULL,   -- assumed type
  password   VARCHAR(64)  NOT NULL,   -- assumed type; stored in plain text by the original code (see SECURITY-REVIEW S-10)
  phone      VARCHAR(20)  NOT NULL,   -- assumed type
  comments   TEXT         NOT NULL    -- assumed type
);

-- ---------------------------------------------------------------
-- cms: menu items and page bodies (navigation.php, index.php)
-- ---------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS cms;
USE cms;

CREATE TABLE IF NOT EXISTS menu (
  location VARCHAR(32)  NOT NULL,     -- value used in index.php?page=<location>; assumed type
  title    VARCHAR(64)  NOT NULL,     -- text shown in the sidebar; assumed type
  status   VARCHAR(16)  NOT NULL      -- only 'active' rows are shown; assumed type
);

CREATE TABLE IF NOT EXISTS pages (
  location VARCHAR(32)  NOT NULL,     -- matches menu.location; assumed type
  data     MEDIUMTEXT   NOT NULL      -- page HTML (or PHP, run through eval in HW20); assumed type
);

-- ---------------------------------------------------------------
-- admin: login accounts (register.php, login.php, results.php)
-- Types below are from the phpMyAdmin screenshot (HW20).
-- ---------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS admin;
USE admin;

CREATE TABLE IF NOT EXISTS accounts (
  auto_id  INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(32)  NOT NULL,
  logon    VARCHAR(64)  NOT NULL,     -- sha256(password . salt)
  sid      VARCHAR(64)  NULL          -- session token set at login
) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;

-- ---------------------------------------------------------------
-- Application user (pick your own password; never commit it)
-- ---------------------------------------------------------------
-- CREATE USER 'webuser'@'localhost' IDENTIFIED BY '<choose-a-new-password>';
-- GRANT SELECT, INSERT, UPDATE, DELETE ON contact_data.* TO 'webuser'@'localhost';
-- GRANT SELECT                         ON cms.*          TO 'webuser'@'localhost';
-- GRANT SELECT, INSERT, UPDATE         ON admin.*        TO 'webuser'@'localhost';
