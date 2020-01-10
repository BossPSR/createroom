/*
Navicat MySQL Data Transfer

Source Server         : db
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : createroom

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-01-10 15:50:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_box_home_work`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_box_home_work`;
CREATE TABLE `tbl_box_home_work` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `later_than` datetime NOT NULL,
  `room_id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_box_home_work
-- ----------------------------
INSERT INTO `tbl_box_home_work` VALUES ('2', 'เครื่องจักร(machine)', 'เครื่องจักร(machine) ที่มีฟังก์ชันทีมีความสามารถในการทำความเข้าใจ เรียนรู้องค์ความรู้ต่างๆ อาทิเช่น การรับรู้  การเรียนรู้ การให้เหตุผล และการแก้ปัญหาต่างๆ  เครื่องจักรที่มีความสามารถเหล่านี้ก็ถือว่าเป็น ปัญญาประดิษฐ์  (AI : Artificial Intelligence) นั่นเอง', '2019-12-30 00:00:00', '6', '2019-12-28', '2019-12-28 22:14:54', '2019-12-28 22:14:54');
INSERT INTO `tbl_box_home_work` VALUES ('12', 'กระต่ายน้อย', 'กระต่ายแม้จะมีฟันแทะเหมือนกับอันดับสัตว์ฟันแทะ (Rodentia) แต่ถูกจัดออกมาเป็นอันดับต่างหาก เนื่องมีจำนวนฟันที่ไม่เท่ากัน เพราะกระต่ายมีฟันแทะที่ขากรรไกรบน 20 แถว เรียงซ้อนกันแถวละ 20 ซี่ ฟันกรามบนข้างละ 6 ซี่ และฟันกรามล่างข้างละ 5 ซี่ เมื่อเวลาเคี้ยวอาหาร กระต่ายจะใช้ฟันทั้ง 2 ด้านเคี้ยวสลับกันไป ต่างจากสัตว์ฟันแทะโดยทั่วไปที่เคี้ยวเคลื่อนหน้าเคลื่อนหลัง', '2020-01-01 08:00:00', '6', '2019-12-29', '2019-12-29 23:32:09', '2019-12-29 23:32:09');
INSERT INTO `tbl_box_home_work` VALUES ('13', 'MX001', 'หาวิธีการต่อ API มา', '2020-01-06 08:00:00', '6', '2020-01-03', '2020-01-03 11:27:06', '2020-01-03 11:27:06');
INSERT INTO `tbl_box_home_work` VALUES ('14', 'Machine Learning', 'ออกแบบ Machine Learning', '2020-01-06 09:30:00', '6', '2020-01-03', '2020-01-03 11:42:56', '2020-01-03 11:42:56');
INSERT INTO `tbl_box_home_work` VALUES ('15', 'กระต่ายบิน', '----', '2020-01-05 08:00:00', '6', '2020-01-06', '2020-01-06 15:59:39', '2020-01-06 15:59:39');

-- ----------------------------
-- Table structure for `tbl_file_teacher`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_file_teacher`;
CREATE TABLE `tbl_file_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `room_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `create_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_file_teacher
-- ----------------------------
INSERT INTO `tbl_file_teacher` VALUES ('4', 'ใบเสร็จคุณเบิร์ด_(2).pdf', 'uploads/file/teacher/room/6/1577520822', '6', '55', '2019-12-28', '2019-12-28 15:13:42', '2019-12-28 15:13:42');

-- ----------------------------
-- Table structure for `tbl_home_work`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_home_work`;
CREATE TABLE `tbl_home_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `send_on` datetime NOT NULL,
  `box_home_work_id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_home_work
-- ----------------------------
INSERT INTO `tbl_home_work` VALUES ('18', '2', '6', '300px-LINE_logo.svg.png', 'uploads/file/student/2/room/6/1577637032', 'Line', '2019-12-29 23:30:32', '2', '2019-12-29', '2019-12-29 23:30:32', '2019-12-29 23:30:32');
INSERT INTO `tbl_home_work` VALUES ('19', '2', '6', '78418453_659206604612097_1583677175020650496_o.jpg', 'uploads/file/student/2/room/6/1577637282', 'Apple กระต่ายชอบกิน', '2019-12-29 23:34:42', '12', '2019-12-29', '2019-12-29 23:34:42', '2019-12-29 23:34:42');
INSERT INTO `tbl_home_work` VALUES ('20', '4', '6', '78418453_659206604612097_1583677175020650496_o_(1).jpg', 'uploads/file/student/4/room/6/1577699592', 'Apple Watch ถูกมากมั้ง', '2019-12-30 16:53:13', '12', '2019-12-30', '2019-12-30 16:53:13', '2019-12-30 16:53:13');
INSERT INTO `tbl_home_work` VALUES ('21', '4', '6', '300px-LINE_logo.svg_(1).png', 'uploads/file/student/4/room/6/1578025690', 'ใช้ Line Bot ในการต่อ', '2020-01-03 11:28:10', '13', '2020-01-03', '2020-01-03 11:28:10', '2020-01-03 11:28:10');
INSERT INTO `tbl_home_work` VALUES ('22', '4', '6', 'test_(2).png', 'uploads/file/student/4/room/6/1578026632', 'สแกนก่อน', '2020-01-03 11:43:52', '14', '2020-01-03', '2020-01-03 11:43:52', '2020-01-03 11:43:52');

-- ----------------------------
-- Table structure for `tbl_rooms`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rooms`;
CREATE TABLE `tbl_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room` varchar(255) NOT NULL,
  `sec` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `limit_room` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `generate` varchar(100) DEFAULT NULL,
  `create_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_rooms
-- ----------------------------
INSERT INTO `tbl_rooms` VALUES ('1', 'SC12', '2', 'พละศึกษา', '2', '50', '00:00:00', '00:00:00', 't23e11J', '2019-12-04', '2019-12-04 19:56:19', '2019-12-04 19:56:19');
INSERT INTO `tbl_rooms` VALUES ('2', 'SC100', '14', 'สังคมศึกษา', '2', '45', '00:00:00', '00:00:00', 'NHYpvhR', '2019-12-04', '2019-12-04 19:56:37', '2019-12-04 19:56:37');
INSERT INTO `tbl_rooms` VALUES ('6', 'SGA-180', '3', 'กายวิภาค', '1', '50', '11:00:00', '00:00:00', 'wJ4RK5r', '2019-12-04', '2019-12-04 22:35:34', '2019-12-25 18:28:57');
INSERT INTO `tbl_rooms` VALUES ('12', 'ป.1', '10', 'ก๋วยเตี้ยว', '1', '20', '08:00:00', '09:00:00', 'GEp4nXu', '2020-01-10', '2020-01-10 14:50:05', '2020-01-10 14:50:05');

-- ----------------------------
-- Table structure for `tbl_student`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Frist_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Public_code` varchar(255) DEFAULT NULL,
  `codes` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_student
-- ----------------------------
INSERT INTO `tbl_student` VALUES ('1', 'อาษาวงค์', 'อาษาวงค์', 'admin@example.com', '25f9e794323b453885f5181f1b624d0b', '1234567891011', '5706105384', '0618096661');
INSERT INTO `tbl_student` VALUES ('2', 'phenomenal', 'software', 'mikiboy004@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567891011', '5706105336', '123456788');
INSERT INTO `tbl_student` VALUES ('3', 'อาษาวงค์', 'อาษาวงค์', 'admin@example.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567891011', '5706105388', '0618096661');
INSERT INTO `tbl_student` VALUES ('4', 'rabbit', 'tank', 'rabbit@test.com', 'e10adc3949ba59abbe56e057f20f883e', '1598989898989898', '5906101546', '0895467777');

-- ----------------------------
-- Table structure for `tbl_student_room`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_student_room`;
CREATE TABLE `tbl_student_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_student_room
-- ----------------------------
INSERT INTO `tbl_student_room` VALUES ('1', '2', '6', '2019-12-26', '2019-12-26 14:34:22', '2019-12-26 14:34:22');
INSERT INTO `tbl_student_room` VALUES ('2', '2', '1', '2019-12-26', '2019-12-26 14:46:05', '2019-12-26 14:46:05');
INSERT INTO `tbl_student_room` VALUES ('3', '2', '2', '2019-12-26', '2019-12-26 18:31:59', '2019-12-26 18:31:59');
INSERT INTO `tbl_student_room` VALUES ('4', '1', '6', '2019-12-27', '2019-12-27 23:50:35', '2019-12-27 23:50:35');
INSERT INTO `tbl_student_room` VALUES ('5', '4', '6', '2019-12-29', '2019-12-29 19:50:52', '2019-12-29 19:50:52');

-- ----------------------------
-- Table structure for `tbl_teacher`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_teacher`;
CREATE TABLE `tbl_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `create_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zoom_id` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_teacher
-- ----------------------------
INSERT INTO `tbl_teacher` VALUES ('1', 'test', 'e10adc3949ba59abbe56e057f20f883e', 'อาจารย์', 'ณัฐพนธ์', 'เกียรติกุล', '2019-11-21', '2019-11-21 00:00:00', '2019-12-25 22:57:10', 'n6in45JnSje-aQ2_8q6DnQ', 'test@gmail.com');
INSERT INTO `tbl_teacher` VALUES ('2', 'test2', 'e10adc3949ba59abbe56e057f20f883e', 'อาจารย์', 'ภูชิต', 'มิ่งเมือง', '2019-11-21', '2019-11-21 00:00:00', '2019-11-21 00:00:00', null, 'test2@gmail.com');

-- ----------------------------
-- Table structure for `tbl_zoom`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_zoom`;
CREATE TABLE `tbl_zoom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `appointment_type_id` int(2) DEFAULT NULL,
  `meeting_id` varchar(255) DEFAULT NULL,
  `zoom_host_url` varchar(255) DEFAULT NULL,
  `zoom_url` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` int(10) DEFAULT NULL,
  `room_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_zoom
-- ----------------------------
INSERT INTO `tbl_zoom` VALUES ('2', '1', '2020-01-10 14:50:05', '2', 'TBPcXqLLRVinsxGD75d0IA==', 'https://us04web.zoom.us/s/556818615?zak=eyJ6bV9za20iOiJ6bV9vMm0iLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJjbGllbnQiLCJ1aWQiOiJuNmluNDVKblNqZS1hUTJfOHE2RG5RIiwiaXNzIjoid2ViIiwic3R5IjowLCJ3Y2QiOiJ1czA0IiwiY2x0IjowLCJzdGsiOiJHekF2MVJHSnBPYndfNmtfOWNfMz', 'https://us04web.zoom.us/j/556818615', '2020-01-10 14:50:06', '1', '12');
