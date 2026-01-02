-- HoneyTrap System Database Schema

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `honeytrap_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL UNIQUE,
  `email` varchar(100) NOT NULL UNIQUE,
  `password_hash` varchar(255) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `role` enum('admin','user','moderator') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL,
  `status` enum('active','suspended','locked') DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `attempt_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` text DEFAULT NULL,
  `login_time` datetime NOT NULL DEFAULT current_timestamp(),
  `risk_score` int(11) DEFAULT 0,
  `decision` enum('legit','suspicious','honeytrap') DEFAULT 'legit',
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `browser_fingerprint` text DEFAULT NULL,
  `form_completion_time` int(11) DEFAULT NULL COMMENT 'in milliseconds',
  PRIMARY KEY (`attempt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `honeytrap_logs`
--

CREATE TABLE `honeytrap_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(100) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `fake_page_visited` varchar(255) DEFAULT NULL,
  `action_performed` varchar(500) DEFAULT NULL,
  `action_details` text DEFAULT NULL COMMENT 'JSON format',
  `time_spent_seconds` int(11) DEFAULT 0,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `user_agent` text DEFAULT NULL,
  `mouse_movements` int(11) DEFAULT 0,
  `clicks_count` int(11) DEFAULT 0,
  `keystrokes_logged` text DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ip_intelligence`
--

CREATE TABLE `ip_intelligence` (
  `ip_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL UNIQUE,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `isp` varchar(255) DEFAULT NULL,
  `risk_level` enum('low','medium','high','critical') DEFAULT 'low',
  `total_attempts` int(11) DEFAULT 0,
  `honeytrap_count` int(11) DEFAULT 0,
  `first_seen` datetime DEFAULT current_timestamp(),
  `last_seen` datetime DEFAULT current_timestamp(),
  `flagged_as_attacker` boolean DEFAULT FALSE,
  `threat_type` enum('bruteforce','scanner','bot','manual') DEFAULT NULL,
  PRIMARY KEY (`ip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attacker_profiles`
--

CREATE TABLE `attacker_profiles` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username_attempted` varchar(500) DEFAULT NULL,
  `attack_pattern` text DEFAULT NULL,
  `preferred_times` text DEFAULT NULL COMMENT 'JSON of attack times',
  `techniques_used` text DEFAULT NULL COMMENT 'JSON array',
  `total_time_spent` int(11) DEFAULT 0 COMMENT 'seconds in honeytrap',
  `compromised_data_attempted` text DEFAULT NULL,
  `behavior_fingerprint` text DEFAULT NULL COMMENT 'JSON of behavior patterns',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`profile_id`),
  KEY `idx_attacker_ip` (`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_logs`
--

CREATE TABLE `system_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_type` enum('security','system','error','admin_action') NOT NULL,
  `message` text NOT NULL,
  `severity` enum('info','warning','danger','critical') DEFAULT 'info',
  `ip_address` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `additional_data` text DEFAULT NULL COMMENT 'JSON',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;
