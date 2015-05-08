-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2015 at 11:53 AM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tribal_square`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `address` text COLLATE utf8_unicode_ci,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_phone_on_profile` tinyint(1) DEFAULT '0',
  `birthdate` date DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_pic` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `address`, `street`, `city`, `state`, `country`, `pin`, `phone`, `display_phone_on_profile`, `birthdate`, `gender`, `profile_pic`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 18, '21 Hanover Walk', 'New York Street', 'New York', 'NY', 'USA', '38051', '9898752288', 1, '1982-10-10', 'Male', '45292310_scaled_254x247.jpg', NULL, '2015-03-30 16:11:37', '2015-03-30 16:16:00'),
(2, 20, 'New York Street,', 'New York Street,', 'New York', 'NY', 'USA', '37051', '1234567890', 1, '1994-06-06', 'Female', 'Chelsea-Kane.jpg', NULL, '2015-03-30 16:28:39', '2015-04-02 19:14:02'),
(3, 26, '26 Chantry Court', 'Nr. ASDA', 'New Jersey', 'NJ', 'USA', '566456', '85858585', 1, '1983-03-03', 'Female', 'Rai.jpg', NULL, '2015-03-30 17:44:54', '2015-03-30 17:45:26'),
(4, 27, 'Jivraj Part, Vejalpur', 'Shaivali Appartment', 'Ahmedabad', 'Gujarat', 'India', '380051', '55555555555', 1, '1984-01-08', 'Female', 'photo.jpg', NULL, '2015-03-30 18:13:37', '2015-03-30 18:16:54'),
(5, 28, 'Arlington', 'New York Street,', 'Arlington', 'New York', 'USA', '12345', '111111111', 1, '1982-02-05', 'Female', 'Morgan E.jpg', NULL, '2015-03-30 18:43:53', '2015-03-30 18:44:16'),
(6, 31, 'Montreal Seeks', '1 New York Street', 'New York', 'NY', 'USA', '35124', NULL, 0, NULL, NULL, NULL, NULL, '2015-04-04 16:58:23', '2015-04-06 13:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `availabilities`
--

CREATE TABLE IF NOT EXISTS `availabilities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `available_on_short_notice` tinyint(1) DEFAULT '0',
  `available_to_provide_daytime_care_during_summer_months` tinyint(1) DEFAULT '0',
  `available_before_school_care` tinyint(1) DEFAULT '0',
  `available_after_school_care` tinyint(1) DEFAULT '0',
  `schedule_valid_until` date DEFAULT '0000-00-00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `availabilities`
--

INSERT INTO `availabilities` (`id`, `user_id`, `available_on_short_notice`, `available_to_provide_daytime_care_during_summer_months`, `available_before_school_care`, `available_after_school_care`, `schedule_valid_until`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 18, 1, 1, 1, 1, '2015-06-17', NULL, '2015-03-30 16:20:02', '2015-03-30 16:20:02'),
(2, 20, 1, 1, 1, 1, '2015-07-22', NULL, '2015-03-30 16:47:53', '2015-04-03 13:14:14'),
(3, 26, 1, 1, 1, 1, '2015-11-25', NULL, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(4, 27, 1, 1, 1, 1, '2015-11-11', NULL, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(5, 28, 1, 1, 1, 1, '2015-06-24', NULL, '2015-03-30 18:46:06', '2015-03-30 18:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `bios`
--

CREATE TABLE IF NOT EXISTS `bios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `experience` text COLLATE utf8_unicode_ci,
  `have_own_car` tinyint(1) DEFAULT '0',
  `comfortable_with_pets` tinyint(1) DEFAULT '0',
  `do_smoke` tinyint(1) DEFAULT '0',
  `average_rate_from` double(8,2) DEFAULT '0.00',
  `average_rate_to` double(8,2) DEFAULT '0.00',
  `increase_rate_for_each_child` double(8,2) DEFAULT '0.00',
  `miles_from_home` int(11) DEFAULT '0',
  `no_of_childrens_comfortable_with` int(11) DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bios`
--

INSERT INTO `bios` (`id`, `user_id`, `title`, `experience`, `have_own_car`, `comfortable_with_pets`, `do_smoke`, `average_rate_from`, `average_rate_to`, `increase_rate_for_each_child`, `miles_from_home`, `no_of_childrens_comfortable_with`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 18, 'Years of Childcare Experience: 18', 'I love working with children; their inquisitive attitudes and loads of energy make them a joy to be around. I am responsible and dependable, but also fun and energetic. I’m 30 years old and originally from Cape Cod, Massachusetts. I studied Child Development as part of my Brown University education and have up-to-date CPR and First Aid certifications. With me, your children will have fun, playing and learning rather than just sitting in front of a television set. I have 18 years of experience, even babysitting for one Cape Cod family for over 10 years. I have experience and am comfortable with newborns to young teens; my specialty is toddlers to age six.  My hobbies include yoga, skiing, Mt. biking, and reading.', 1, 1, 0, 15.00, 20.00, 10.00, 10, 3, NULL, '2015-03-30 16:17:15', '2015-03-30 16:17:15'),
(2, 20, 'Babysitter in Winnetka Seeks Babysitter Job. Carolyn''s Babysitter Profile 2028422', 'My passion for being around children began when I worked as a counselor at the world renowned Santa Barbara Zoo. As a counselor I was responsible for creating and implementing daily agendas for up to 20 children. I worked as a mentor, leader and personal guide for over 150 children throughout the summer. I also implemented and taught education and arts and crafts. Bonding and mentoring with the children led me to nanny positions at the end of summer with a few families of young boys and girls. I carpooled them to and from the zoo for many weeks. Also daily planned play dates and "day adventures" where we traveled to the beach, amusement parks, community parks and pools, etc. \r\n\r\nMy excellent work and dedication to the Zoo led me to my next position. The Advisor of Teen Volunteers. Where I direct and managed more than 50 teen volunteers daily, trained more than 250 teen volunteers in safety and leadership, coordinated overnight events for 50 teen volunteers, as well as work as a mentor, director and counselor for the approximate 250 teenagers. I absolutely loved managing, working and even more mentoring the teen volunteers for my last two summers. \r\n\r\nMy passion for children led me into an internship with Big Brothers Big Sisters of Butte County. Where I assisted the BBBS event coordinator in marketing, PR and event planning. Communicated with sponsors, donors and volunteers and participated in interviewing, meetings and company events. My love and compassion for children is what drove me behind my hard work as the Event Coordinator Assistant Intern.\r\n\r\nI moved to Tahoe City in November 2010 and got a job at the Boys & Girls Club of North Lake Tahoe where I was a Kinder Care Assistant. I cared for up to 50 kindergartners everyday. I taught, played and challenged there minds and bodies. I fell in love with Tahoe and the Kinders'' and am hoping to use my experience with children in the Tahoe area.\r\n\r\nAfter a few months at the Boys & Girls Club of North Lake Tahoe I got a promotion to Teen Manager. I manage the Teen Center and about 40 teenagers a day. I plan programs, daily activities, field trips and fundraisers. I teach, mentor and lead teens daily with hopes to change there lives.', 1, 1, 1, 8.00, 16.00, 5.00, 20, 5, NULL, '2015-03-30 16:46:37', '2015-04-03 13:13:59'),
(3, 26, 'Years Experience: 20', 'I am a compassionate, loving, go with the flow woman who adores children, yet can be firm at times if required. I have two children of my own ages 11 and 13, and seem to attract the angel eyes of little kids. I enjoy bringing my love of art, dance, outdoors, healthy foods, Steiner style learning and exploration to children. Interactive choices and empowering others to be confident in their own freewill while still being respectful and honoring of those around them is key.  I love the opportunity to get messy, loud and energetic with children… and we clean up afterward, knowing that we had a good, full day. I have traveled to 14 different countries and many US states. and gained an appreciation for different cultures and am confident with challenging situations. \r\n\r\nVolunteer: Rotary Club of Truckee where I also served as a Board Member for 1 year Art Bridge - NSW, Australia, offering weekly art to people with disabilities Turtle Conservation Project - connecting with marine life via Transformation of Hearts through Art Habitat for Humanity - building and painting houses in Mexico with K&A Compassionate Communication Mediation Grief Counseling through Self Responsibility', 1, 1, 1, 20.00, 25.00, 15.00, 50, 9, NULL, '2015-03-30 17:47:02', '2015-03-30 17:47:02'),
(4, 27, 'Years Experience: 20', 'Hi! My name is Lauren and I am a 22 year old recent graduate from UC Davis. I was born and raised in Southern California but currently live in Incline Village. I have been working with children in a variety of settings for over 10 years. Teaching children is my passion. I am currently working at Northstar California Resort as a Children''s Ski Instructor. Previous to this experience, I worked with children in numerous settings, such as babysitting, coaching, and classroom teaching. I have coached cheer leading, skiing, and swimming and worked at a preschool as a substitute teacher as well as at an elementary school as a teacher''s assistant. I am in the process of selecting a graduate school where I will go to obtain a master''s degree in education in hopes of becoming an elementary school teacher. In my free time I enjoy cooking, skiing, doing yoga, and being around people.  Spending time with children is the only work I have encountered in my life that has nto felt like work to me.', 1, 1, 1, 12.00, 18.00, 8.00, 30, 6, NULL, '2015-03-30 18:17:59', '2015-03-30 18:17:59'),
(5, 28, '19 year old babysitter', 'I have watched many children for over three years. I have babysat. I have watched and cared for many ages from about newborn to about 11 years old. I helped some with homework, and I have done a few activities with some. I have two twin girl cousins that I have watched until they moved away. I love kids, and I do have a passion for watching and caring for them. I used to work at a daycare with infants also!', 1, 1, 1, 15.00, 20.00, 10.00, 20, 6, NULL, '2015-03-30 18:44:59', '2015-03-30 18:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `classifieds`
--

CREATE TABLE IF NOT EXISTS `classifieds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT '0.00',
  `user_id` int(11) DEFAULT '0',
  `category_id` int(11) DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `condition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manufacture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fineprint` text COLLATE utf8_unicode_ci,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `long` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `can_phone` tinyint(1) DEFAULT '0',
  `can_text` tinyint(1) DEFAULT '0',
  `avail_for_other_services` tinyint(1) DEFAULT '0',
  `languages` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_approved_by_admin` tinyint(1) DEFAULT '0',
  `language_spoken` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `classifieds`
--

INSERT INTO `classifieds` (`id`, `title`, `price`, `user_id`, `category_id`, `description`, `condition`, `manufacture`, `model_number`, `size`, `fineprint`, `location`, `location2`, `street1`, `street2`, `state`, `city`, `country`, `pin`, `lat`, `long`, `website`, `phone`, `mobile`, `email`, `contact_name`, `can_phone`, `can_text`, `avail_for_other_services`, `languages`, `is_approved_by_admin`, `language_spoken`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 'Pro Bodyline Stylish Motorised Treadmill', 1000.00, 10, 2, '<ul style="list-style-type: none; color: rgb(118, 118, 118); font-family: Roboto, sans-serif; line-height: 26px;"><li style="text-align: left !important; background-color: transparent !important;"><b style="padding: 0px !important; background-color: transparent !important;">Technical Specifications:-</b></li><li style="text-align: left !important; background-color: transparent !important;">Treadmill Type - Domestic Home Use Treadmill</li><li style="text-align: left !important; background-color: transparent !important;">Inter Face Console Type - Lcd Display.</li><li style="text-align: left !important; background-color: transparent !important;">Lcd Display Shows: Time,Distance Covered, Active Speed, Calories</li><li style="text-align: left !important; background-color: transparent !important;">Motor Type - Sailent D.C Motor</li><li style="text-align: left !important; background-color: transparent !important;">Preset Programs - 1 Manual,3 Preset</li><li style="text-align: left !important; background-color: transparent !important;">Motor Duty - 0.75 H.P Cont. &amp; 1.5 H.P Peak</li><li style="text-align: left !important; background-color: transparent !important;">Deck Type - Soft Cushioned Shock Absorbent Deck</li><li style="text-align: left !important; background-color: transparent !important;">Striding Surface - 1010Mm * 320Mm</li><li style="text-align: left !important; background-color: transparent !important;">Max User''''S Weight - 80Kgs.</li><li style="text-align: left !important; background-color: transparent !important;">Dimensions Folded - 480*570*1470Mm</li><li style="text-align: left !important; background-color: transparent !important;">Speed - 1 To 6 Km/Hr</li></ul>', 'Excellent', 'test', 'a5', '', '<table width="100%" cellspacing="1" cellpadding="4" border="0" style="max-width: 100%; color: rgb(68, 68, 68); font-family: Roboto, Arial, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255);"><tbody><tr><td width="250px;" valign="top" class="tdcolor1" style="padding: 5px; font-size: 12px; line-height: 16px; border-right-width: 2px; border-right-style: solid; border-right-color: rgb(255, 255, 255); color: rgb(118, 118, 118);">Product will be delivered for all urban areas serviceable by major courier agencies.For remote / rural areas the product will be sent by local couriers and may take little more time.</td></tr><tr><td width="250px;" valign="top" class="tdcolor2" style="padding: 5px; font-size: 12px; line-height: 16px; border-right-width: 2px; border-right-style: solid; border-right-color: rgb(255, 255, 255); color: rgb(118, 118, 118);">No Deliveries on Sunday and National Holidays.</td></tr><tr><td width="250px;" valign="top" class="tdcolor1" style="padding: 5px; font-size: 12px; line-height: 16px; border-right-width: 2px; border-right-style: solid; border-right-color: rgb(255, 255, 255); color: rgb(118, 118, 118);">Customer is requested to pay 15% of Infibeam price in advance in order to process CASH ON DELIVERY order.</td></tr><tr><td width="250px;" valign="top" class="tdcolor2" style="padding: 5px; font-size: 12px; line-height: 16px; border-right-width: 2px; border-right-style: solid; border-right-color: rgb(255, 255, 255); color: rgb(118, 118, 118);">Extra shipping charges will be applicable for ODA (Out of delivery Area) locations.</td></tr><tr><td width="250px;" valign="top" class="tdcolor1" style="padding: 5px; font-size: 12px; line-height: 16px; border-right-width: 2px; border-right-style: solid; border-right-color: rgb(255, 255, 255); color: rgb(118, 118, 118);">Infibeam will not be responsible for any type of installation.</td></tr></tbody></table>', 'California, USA', 'California 1, San Simeon, CA, United States', '', 'California 1', 'CA', 'San Simeon', 'United States', '', '35.6901714', '-121.28685239999999', NULL, '9898989898', NULL, 'perry@test.com', '7878787878', 1, 1, NULL, NULL, 1, 'English,Spenish', NULL, '2015-03-18 19:03:43', '2015-03-26 18:46:32'),
(4, 'Chicco High Chair', 90.00, 4, 6, '<span style="color: rgb(34, 34, 34); font-family: ''Bitstream Vera Serif'', ''Times New Roman'', serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">Chicco Polly Magic high chair</span><span style="color: rgb(34, 34, 34); font-family: ''Bitstream Vera Serif'', ''Times New Roman'', serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);"> excellent condition - rarely used by our child. Reclines nicely.</span>', 'Excellent', '', 'a1', '', 'Do NOT contact me with unsolicited services or offers', 'Huntington Ave, Boston, MA, USA', 'Huntington Avenue, Boston, MA, United States', '', '', 'MA', 'Boston', 'United States', '', '', '', NULL, '12312312123', NULL, 'pareshgandhi28@gmail.com', '', 1, 0, 1, NULL, 0, 'English', NULL, '2015-03-18 18:33:30', '2015-04-03 19:02:09'),
(5, 'Framed Print & Posters', 8.00, 4, 8, '<span style="color: rgb(34, 34, 34); font-family: ''Bitstream Vera Serif'', ''Times New Roman'', serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">Framed Art Print 33 1/2 x 41 $8</span><br style="color: rgb(34, 34, 34); font-family: ''Bitstream Vera Serif'', ''Times New Roman'', serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><br style="color: rgb(34, 34, 34); font-family: ''Bitstream Vera Serif'', ''Times New Roman'', serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><span style="color: rgb(34, 34, 34); font-family: ''Bitstream Vera Serif'', ''Times New Roman'', serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">Framed Motivational Poster 22 x 28 $2</span><br style="color: rgb(34, 34, 34); font-family: ''Bitstream Vera Serif'', ''Times New Roman'', serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><br style="color: rgb(34, 34, 34); font-family: ''Bitstream Vera Serif'', ''Times New Roman'', serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><span style="color: rgb(34, 34, 34); font-family: ''Bitstream Vera Serif'', ''Times New Roman'', serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">Photo Frame 17 x 21 $1</span>', 'Average', '', 'a2', '33 1/2 x 41', '<ul class="notices" style="margin: 0px 0px 2em 10px; padding: 10px; border: 0px; font-family: Arial, sans-serif; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: inherit; line-height: normal; vertical-align: baseline; list-style: disc; color: rgb(34, 34, 34); letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; border: 0px; font-family: inherit; font-size: 0.8em; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline;">Do NOT contact me with unsolicited services or offers</li></ul>', 'S Pointe Dr, Miami Beach, FL 33139, USA', 'South Pointe Drive, Miami Beach, FL, United States', '', 'S Pointe Dr', 'FL', 'Miami Beach', 'United States', '33139', '25.7682651', '-80.134927', NULL, '12345678901', NULL, 'pareshgandhi28@gmail.com', '', 1, NULL, NULL, NULL, 1, 'English', NULL, '2015-03-18 18:36:44', '2015-03-18 18:46:26'),
(6, 'Word Power Made Easy', 118.00, 4, 10, '<p style="box-sizing: border-box; margin: 0px 0px 10px; line-height: 18px; padding: 0px !important; color: rgb(118, 118, 118); font-family: Roboto, sans-serif; font-size: 13px; text-align: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><strong style="box-sizing: border-box; font-weight: bold; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">About the Book</strong><br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;"><br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Do You Always Use the Right Word''<br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;"><br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Can You Pronounce It -- and Spell It -- Correctly''<br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;"><br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Do You Know How to Avoid Illiterate Expressions''<br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;"><br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Do You Speak Grammatically, Without Embarrassing Mistakes''<br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;"><br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">If the answer to any of these questions is NO, you ought to read "Word Power Made Easy." Now thoroughly revised to eliminate outmoded references and to to reflect current idioms, it remains the best and quickest means to a better vocabulary in the English language.<br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;"><br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Each chapter ends with review. Each section ends with a progressive check. Numerous tests will help you increase and retain the knowledge you acquired. "Word Power Made Easy" does more than just ass words to you vocabulary. It teaches ideas and a method of broadening knowledge as an integral part of the vocabulary building process.</p><p style="box-sizing: border-box; margin: 0px 0px 10px; line-height: 18px; padding: 0px !important; color: rgb(118, 118, 118); font-family: Roboto, sans-serif; font-size: 13px; text-align: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><strong style="box-sizing: border-box; font-weight: bold; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">About the Author</strong><br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;"><br style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">About Norman Lewis Norman Lewis was an American grammarian and author. Some other books by Lewis are How to Read Better And Faster, Speak Better, Write Better, Instant Word Power, Dictionary of Correct Spelling, and Dictionary of Pronunciation. All his books were on building language skills. Norman Lewis was born in New York in 1912. Orphaned at an early age, he lived with his sister''s family. He earned his master''s degree from Columbia University and began teaching English language and grammar. He has taught at various institutions like New York University, Rio Hondo College, and headed the institution''s communication department for more than ten years. His first book was 30 Days To A More Powerful Vocabulary. After the success of that book, Lewis began writing a lot of books on grammar and vocabulary which were highly popular and many of them have seen several reprints. His book Roget''s New Pocket Thesaurus In Dictionary Form sold over 5 million books. He died in 2006 at the age of 93.</p>', 'Excellent', 'Norman Lewis', 'a3', '', '<h2 class="tab_title" style="box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-weight: 500; line-height: 1.1; color: rgb(54, 54, 54); margin: 0px; font-size: 1.3em; padding-top: 10px; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><b style="box-sizing: border-box; font-weight: 300; font-size: 18px; color: rgb(68, 68, 68);">Specification</b></h2><table style="box-sizing: border-box; border-spacing: 0px; border-collapse: collapse; max-width: 100%; margin-top: 15px; color: rgb(118, 118, 118); font-family: Roboto, Arial, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><tbody style="box-sizing: border-box;"><tr style="box-sizing: border-box;"><td style="box-sizing: border-box; padding: 0px 0px 10px; width: 87px;"><b style="box-sizing: border-box; font-weight: 400; color: rgb(68, 68, 68);">Title:</b></td><td style="box-sizing: border-box; padding: 0px 0px 10px 10px;">Word Power Made Easy</td></tr><tr style="box-sizing: border-box;"><td style="box-sizing: border-box; padding: 0px 0px 10px; width: 87px;"><b style="box-sizing: border-box; font-weight: 400; color: rgb(68, 68, 68);">Publisher:</b></td><td style="box-sizing: border-box; padding: 0px 0px 10px 10px;"><a href="http://www.infibeam.com/Books/wr-goyal-publisher/" style="box-sizing: border-box; color: rgb(118, 118, 118); text-decoration: none; background: transparent;">W.r. Goyal Pub..</a></td></tr><tr style="box-sizing: border-box;"><td style="box-sizing: border-box; padding: 0px 0px 10px; width: 87px;"><b style="box-sizing: border-box; font-weight: 400; color: rgb(68, 68, 68);">Author:</b></td><td style="box-sizing: border-box; padding: 0px 0px 10px 10px;"><a href="http://www.infibeam.com/Books/search?author=Norman%20Lewis" style="box-sizing: border-box; color: rgb(118, 118, 118); text-decoration: none; background: transparent;">Norman Lewis</a></td></tr><tr style="box-sizing: border-box;"></tr><tr style="box-sizing: border-box;"><td style="box-sizing: border-box; padding: 0px 0px 10px; width: 87px;"><b style="box-sizing: border-box; font-weight: 400; color: rgb(68, 68, 68);">Edition:</b></td><td style="box-sizing: border-box; padding: 0px 0px 10px 10px;">Paperback</td></tr><tr style="box-sizing: border-box;"><td style="box-sizing: border-box; padding: 0px 0px 10px; width: 87px;"><b style="box-sizing: border-box; font-weight: 400; color: rgb(68, 68, 68);">Edition Number:</b></td><td style="box-sizing: border-box; padding: 0px 0px 10px 10px;">2</td></tr><tr style="box-sizing: border-box;"><td style="box-sizing: border-box; padding: 0px 0px 10px; width: 87px;"><b style="box-sizing: border-box; font-weight: 400; color: rgb(68, 68, 68);">Language:</b></td><td style="box-sizing: border-box; padding: 0px 0px 10px 10px;">English</td></tr><tr style="box-sizing: border-box;"><td style="box-sizing: border-box; padding: 0px 0px 10px; width: 87px;"><b style="box-sizing: border-box; font-weight: 400; color: rgb(68, 68, 68);">ISBN:</b></td><td style="box-sizing: border-box; padding: 0px 0px 10px 10px;">8183071007</td></tr><tr style="box-sizing: border-box;"><td style="box-sizing: border-box; padding: 0px 0px 10px; width: 87px;"><b style="box-sizing: border-box; font-weight: 400; color: rgb(68, 68, 68);">EAN:</b></td><td style="box-sizing: border-box; padding: 0px 0px 10px 10px;">9788183071000</td></tr><tr style="box-sizing: border-box;"><td style="box-sizing: border-box; padding: 0px 0px 10px; width: 87px;"><b style="box-sizing: border-box; font-weight: 400; color: rgb(68, 68, 68);">No. of Pages:</b></td><td style="box-sizing: border-box; padding: 0px 0px 10px 10px;">688</td></tr><tr style="box-sizing: border-box;"><td style="box-sizing: border-box; padding: 0px 0px 10px; width: 87px;"><b style="box-sizing: border-box; font-weight: 400; color: rgb(68, 68, 68);">Publish Date:</b></td><td style="box-sizing: border-box; padding: 0px 0px 10px 10px;">2011-1-1</td></tr><tr style="box-sizing: border-box;"><td style="box-sizing: border-box; padding: 0px 0px 10px; width: 87px;"><b style="box-sizing: border-box; font-weight: 400; color: rgb(68, 68, 68);">Binding:</b></td><td style="box-sizing: border-box; padding: 0px 0px 10px 10px;">Paperback</td></tr></tbody></table>', 'Ahmedabad, Gujarat, India', 'Ahmedabad, Gujarat, India', '', '', 'GJ', 'Ahmedabad', 'India', '', '23.022505', '72.57136209999999', NULL, '23423423423', NULL, 'pareshgandhi28@gmail.com', '', 1, NULL, NULL, NULL, 1, 'English', NULL, '2015-03-18 18:44:55', '2015-03-18 18:46:27'),
(7, 'Lifeline Magnetic Bike 407', 600.00, 4, 2, '<ul style="box-sizing: border-box; margin: 0px; padding: 0px !important; list-style: none; color: rgb(118, 118, 118); font-family: Roboto, sans-serif; font-size: 13px; text-align: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Resistance level - 8 Levels.</li><li style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Resistance System: Electro-Magnetic resistance.</li><li style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Power: Self Generated power system.</li><li style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Fly wheel: 5Kg, Precision Balanced.</li><li style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Pulley: chrome plated pulley.</li><li style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Drive system: Centre design drive, super silent poly-V belt driven.</li><li style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Pedals: Self Balanced extra wide paddles with adjustable straps fit to any size user.close spacing,&amp; shock absorbing air cushion, provides gentle movements.</li><li style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Seat: Ergonomically designed comfortable seat with flex cushion.</li><li style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Handle Bars: U-Bar Style with in built Contact Heart Rate sensor with hand grips.</li><li style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Centre of Gravity: Low COG combined with a balanced frame prevents rocking.</li><li style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">Cardio Monitor: In built hand grip pulse sensor provided with handle grips enables to the cardio monitoring on board.</li><li style="box-sizing: border-box; color: rgb(118, 118, 118); font-family: Roboto, sans-serif !important; font-size: 13px !important; padding: 0px !important; text-align: left !important; background-color: transparent !important;">User Weight : 90 kg</li></ul>', 'Average', '', 'a4', '', 'DISCLAIMER<br>Product will be delivered for all urban areas serviceable by major courier agencies.For remote / rural areas the product will be sent by local couriers and may take little more time.<br>No Deliveries on Sunday and National Holidays.<br>Customer is requested to pay 15% of Infibeam price in advance in order to process CASH ON DELIVERY order.<br>Extra shipping charges will be applicable for ODA (Out of delivery Area) locations.<br>Infibeam will not be responsible for any type of installation.', 'California, USA', 'New York ,Califorina Street, Silver City, NM, United States', '', '', 'NM', 'Silver City', 'United States', '88061', '', '', NULL, '', NULL, 'pareshgandhi28@gmail.com', '24234234234234', 0, 0, NULL, NULL, 1, 'English', NULL, '2015-03-18 18:56:24', '2015-03-28 13:24:12'),
(9, 'Elemis Pro-Collagen Marine Cream Silver Edition / 100ml', 189.00, 4, 4, '<span style="font-family: Arial;"><span style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;">Celebrating 25 years of skincare excellence, this collector edition encased with a keepsake silver mirror is ELEMIS'' number one selling moisturizer with 1 sold every 10 seconds around the world.*&nbsp;</span><br style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;"><br style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;"><span style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;">The powerful anti-aging properties of Mediterranean fan-shaped algae, Padina Pavonica, dramatically helps to improve the moisturization, firmness and elasticity of the skin. In addition, gingko biloba, precious rose and mimosa absolutes are expertly blended to create the ultimate anti-aging cream.&nbsp;</span><br style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;"><br style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;"><span style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;">Elemis Pro-Collagen Marine Cream is clinically proven to reduce the appearance of wrinkle depth by up to 78%, and increase hydration and moisture levels by up to 45%.** This powerful anti-aging cream provides a progressive lifting effect through increased collagen support.&nbsp;</span><br style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;"><br style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;"><strong style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;">Collection Includes:</strong><br style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;"><span style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;">Elemis Pro-Collagen Marine Cream Silver Edition / 100ml</span><br style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;"><span style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;">Elemis Pro-Collagen Marine Cream Ultra-Rich / 2ml</span><br style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;"><span style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;">Elemis 25 Year Logo Embossed Keepsake Silver Mirror</span><br style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;"><br style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;"><span style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;">To mark this anniversary, ELEMIS are proud to donate to&nbsp;</span><strong style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;">Wellbeing of Women</strong><span style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal;">&nbsp;- a charity dedicated to improving the health of women and babies.&nbsp;</span></span>', 'Excellent', 'Elemis', 'a5', '', '<span style="color: rgb(64, 51, 41); font-size: 12px; line-height: normal; font-family: Arial;">Aqua/Water/Eau, Glycerin, Caprylic/Capric Triglyceride, Glyceryl Stearate SE, Isononyl Isononanoate, Dicaprylyl Carbonate, Dimethicone, Triticum Vulgare (Wheat) Germ Oil, Butyrospermum Parkii (Shea) Butter, Chlorella Vulgaris Extract, Padina Pavonica Thallus Extract, Daucus Carota Sativa (Carrot) Root Extract, Porphyridium Cruentum Extract, Acacia Decurrens (Mimosa) Flower Extract, Rosa Centifolia (Rose) Flower Extract, Ginkgo Biloba Leaf Extract, Tocopherol, Phenoxyethanol, Polyacrylate-13, Stearic Acid, Tocopheryl Acetate (Vitamin E), Coco-Caprylate/Caprate, Cetyl Alcohol, Xanthan Gum, Glyceryl Polyacrylate, Polyisobutene, Fragrance (Parfum), Citric Acid, Chlorphenesin, Glyceryl Acrylate/Acrylic Acid Copolymer, Sodium Dehydroacetate, Disodium EDTA, Polysorbate 20, Sorbitan Isostearate, Hydroxyisohexyl 3-Cyclohexene Carboxaldehyde, Butylphenyl Methylpropional, Linalool, Citronellol, Potassium Sorbate, Sodium Benzoate, Citrus Limon (Lemon) Peel Oil, Cuminum Cyminum Seed Oil, Cedrus Atlantica Bark Oil, Limonene.</span>', 'California St, San Francisco, CA, USA', 'California Street, San Francisco, CA, United States', 'Elemis', '', 'CA', 'San Francisco', 'United States', '', '', '', NULL, '1234567890', NULL, 'pareshgandhi28@gmail.com', 'Perry Gold', 1, 1, NULL, NULL, 1, 'English,Spanish,French', NULL, '2015-03-20 18:36:55', '2015-03-30 19:10:20'),
(10, 'Luv Lap Green Sunshine Stroller', 50.00, 4, 6, '<span style="color: rgb(97, 97, 97); font-family: Calibri, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">This sunshine baby stroller has a comfortable leg rest, reclining seat and protective hood overhead. It also includes detachable dining tray with front and rear wheel suspension. This navy blue stroller has front swivel locking wheels that provide great speed control.</span>', 'Excellent', 'Luv Lap', 'a23', '', '<p></p><p>Disclaimer : Product may slightly vary due to photographic lighting sources or your monitor settings.<br>Battery Operated : No<br>Age Group : 0 Months to 2 Years<br>It is safe to use, carry and store<br>Available with extra seat pad, this stroller protects your kids from falling down<br>Sku : Babeez_LuvLap_SunshineGreen<br>SUPC: SDL409897403<br>Brand : Luv Lap<br>Colour : Green<br>Battery Included : No<br>Ideal For : Boys and Girls<br>Features : This stroller is compact, foldable and compact<br>It includes rear wheels with brakes and bottom big storage mesh basket<br>It has three positions reclining seat (sleeping, rest and sitting)<br></p><p></p>', 'New York County, NY, USA', 'New York Avenue Northwest, Washington, DC, United States', 'Luv Lap', '', 'DC', 'Washington', 'United States', '', '', '', NULL, '1234567890', NULL, 'pareshgandhi28@gmail.com', 'Perry Gold', 1, 1, NULL, NULL, 1, 'English,Spanish,French', NULL, '2015-03-24 18:31:55', '2015-03-24 18:49:35'),
(11, 'Remote Control Car with Steering. Choose from 3 Colors', 100.00, 4, 6, '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: normal;">Highlights</div><ul style="padding-left: 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: normal;"><li style="margin: 0px; line-height: 18px;"><strong>Offer is on a Choice of Remote Control Cars with Steering:</strong></li><li style="margin: 0px; line-height: 18px;"><strong>Offer 1:</strong>&nbsp;Red Remote Control Car with Steering</li><li style="margin: 0px; line-height: 18px;"><strong>Offer 2:</strong>&nbsp;Yellow Remote Control Car with Steering</li><li style="margin: 0px; line-height: 18px;"><strong>Offer 3:</strong>&nbsp;White Remote Control Car with Steering</li><li style="margin: 0px; line-height: 18px;"><strong>Contents:</strong></li><li style="margin: 0px; line-height: 18px;">Car</li><li style="margin: 0px; line-height: 18px;">Remote</li><li style="margin: 0px; line-height: 18px;">Batteries</li><li style="margin: 0px; line-height: 18px;"><strong>Features:</strong></li><li style="margin: 0px; line-height: 18px;">Rubber Wheels</li><li style="margin: 0px; line-height: 18px;">Radio Control</li><li style="margin: 0px; line-height: 18px;">Working headlights and the taillights</li><li style="margin: 0px; line-height: 18px;">Adjustable front wheel alignment</li><li style="margin: 0px; line-height: 18px;">Free delivery across India</li><li style="margin: 0px; line-height: 18px;">Inclusive of all taxes and service charge</li></ul>', 'Excellent', 'XYZ', 'toy1', '', '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: normal;">Fine Print<br></div><p style="margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: normal;">The merchant is the seller of product(s) under this deal and will be solely responsible for the products sold</p><p style="margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: normal;"><br></p><h3 style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: normal;">Delivery Timeline:</h3><h2 style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: normal;"><span style="line-height: 18px; font-size: 12px;">Expect the product to reach you within 10 days of order</span></h2>', 'Austin St, Queens, NY, USA', 'Austin, TX, United States', '', '', 'TX', 'Austin', 'United States', '', '30.267153', '-97.74306079999997', NULL, '1234567890', NULL, 'pareshgandhi28@gmail.com', 'Perry Gold', 1, 1, NULL, NULL, 1, 'English,Spanish,French', NULL, '2015-04-02 19:33:03', '2015-04-02 19:34:14'),
(12, NULL, 0.00, 10, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'Ahmedabad Junction, Saraspur, Ahmedabad, Gujarat, India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 0, NULL, NULL, '2015-04-29 05:31:23', '2015-04-29 05:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `classified_images`
--

CREATE TABLE IF NOT EXISTS `classified_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classified_id` int(11) DEFAULT '0',
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_cover` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `classified_images`
--

INSERT INTO `classified_images` (`id`, `classified_id`, `image_path`, `is_cover`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'http://tpstracker.com/demo/tribalsquare/uploads/HS-Gym_G7-hero.png', 1, NULL, '2015-03-18 14:09:45', '2015-03-18 17:52:40'),
(2, 4, 'http://tpstracker.com/demo/tribalsquare/uploads/baby.jpg', 1, NULL, '2015-03-18 18:33:48', '2015-04-03 13:28:15'),
(3, 5, 'http://tpstracker.com/demo/tribalsquare/uploads/frame1.jpg', 1, NULL, '2015-03-18 18:37:22', '2015-03-18 18:37:31'),
(4, 5, 'http://tpstracker.com/demo/tribalsquare/uploads/frame2.jpg', 0, NULL, '2015-03-18 18:37:25', '2015-03-18 18:37:25'),
(5, 5, 'http://tpstracker.com/demo/tribalsquare/uploads/frame3.jpg', 0, NULL, '2015-03-18 18:37:26', '2015-03-18 18:37:26'),
(6, 6, 'http://tpstracker.com/demo/tribalsquare/uploads/book.jpg', 1, NULL, '2015-03-18 18:45:09', '2015-03-18 18:45:25'),
(7, 7, 'http://tpstracker.com/demo/tribalsquare/uploads/fitness4.jpg', 1, NULL, '2015-03-18 18:57:14', '2015-03-28 13:24:12'),
(8, 8, 'http://tpstracker.com/demo/tribalsquare/uploads/fitness5.jpg', 1, NULL, '2015-03-18 19:03:56', '2015-03-18 19:04:04'),
(9, 9, 'http://tpstracker.com/demo/tribalsquare/uploads/elmis.jpg', 1, NULL, '2015-03-20 18:37:15', '2015-03-30 19:10:20'),
(10, 9, 'http://tpstracker.com/demo/tribalsquare/uploads/elmis_1.jpg', 0, NULL, '2015-03-20 18:37:28', '2015-03-20 18:37:28'),
(11, 9, 'http://tpstracker.com/demo/tribalsquare/uploads/elmis_2.jpg', 0, NULL, '2015-03-20 18:37:36', '2015-03-20 18:37:36'),
(12, 10, 'http://tpstracker.com/demo/tribalsquare/uploads/Luv-Lap-Green-Sunshine-Stroller-SDL409897403-1-1ad63.jpg', 1, NULL, '2015-03-24 18:32:27', '2015-03-24 18:48:39'),
(13, 11, 'http://tpstracker.com/demo/tribalsquare/uploads/1427798296816.jpg', 1, NULL, '2015-04-02 19:33:18', '2015-04-02 19:33:21'),
(14, 12, 'http://localhost/tribal_square/uploads/Urology.jpg', 0, NULL, '2015-04-29 05:31:36', '2015-04-29 05:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `classified_videos`
--

CREATE TABLE IF NOT EXISTS `classified_videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classified_id` int(11) NOT NULL DEFAULT '0',
  `video_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `classified_videos`
--

INSERT INTO `classified_videos` (`id`, `classified_id`, `video_path`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 9, 'Xiaomi Yi Action camera video sample 1_1.mp4', NULL, '2015-03-20 18:39:29', '2015-03-20 18:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE IF NOT EXISTS `days` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Su', '2015-03-25 08:00:06', '2015-03-25 08:00:06'),
(2, 'Mo', '2015-03-25 08:00:06', '2015-03-25 08:00:06'),
(3, 'Tu', '2015-03-25 08:00:06', '2015-03-25 08:00:06'),
(4, 'We', '2015-03-25 08:00:06', '2015-03-25 08:00:06'),
(5, 'Th', '2015-03-25 08:00:06', '2015-03-25 08:00:06'),
(6, 'Fr', '2015-03-25 08:00:06', '2015-03-25 08:00:06'),
(7, 'Sa', '2015-03-25 08:00:06', '2015-03-25 08:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `day_shifts`
--

CREATE TABLE IF NOT EXISTS `day_shifts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `day_id` int(11) DEFAULT '0',
  `shift_id` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=180 ;

--
-- Dumping data for table `day_shifts`
--

INSERT INTO `day_shifts` (`id`, `user_id`, `day_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1, 18, 1, 1, '2015-03-30 16:20:02', '2015-03-30 16:20:02'),
(2, 18, 2, 2, '2015-03-30 16:20:02', '2015-03-30 16:20:02'),
(3, 18, 4, 3, '2015-03-30 16:20:02', '2015-03-30 16:20:02'),
(4, 18, 3, 4, '2015-03-30 16:20:02', '2015-03-30 16:20:02'),
(5, 18, 2, 5, '2015-03-30 16:20:02', '2015-03-30 16:20:02'),
(6, 18, 3, 6, '2015-03-30 16:20:02', '2015-03-30 16:20:02'),
(7, 18, 6, 7, '2015-03-30 16:20:02', '2015-03-30 16:20:02'),
(8, 20, 1, 1, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(9, 20, 2, 1, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(10, 20, 4, 1, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(11, 20, 5, 1, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(12, 20, 6, 1, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(13, 20, 7, 1, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(14, 20, 1, 2, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(15, 20, 3, 2, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(16, 20, 4, 2, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(17, 20, 6, 2, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(18, 20, 1, 3, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(19, 20, 2, 3, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(20, 20, 3, 3, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(21, 20, 5, 3, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(22, 20, 6, 3, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(23, 20, 7, 3, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(24, 20, 1, 4, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(25, 20, 2, 4, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(26, 20, 4, 4, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(27, 20, 2, 5, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(28, 20, 4, 5, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(29, 20, 5, 5, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(30, 20, 6, 5, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(31, 20, 7, 5, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(32, 20, 1, 6, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(33, 20, 3, 6, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(34, 20, 5, 6, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(35, 20, 7, 6, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(36, 20, 1, 7, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(37, 20, 3, 7, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(38, 20, 4, 7, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(39, 20, 6, 7, '2015-03-30 16:47:53', '2015-03-30 16:47:53'),
(40, 26, 1, 1, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(41, 26, 3, 1, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(42, 26, 5, 1, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(43, 26, 2, 2, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(44, 26, 4, 2, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(45, 26, 6, 2, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(46, 26, 1, 3, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(47, 26, 3, 3, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(48, 26, 5, 3, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(49, 26, 7, 3, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(50, 26, 2, 4, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(51, 26, 4, 4, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(52, 26, 6, 4, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(53, 26, 1, 5, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(54, 26, 3, 5, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(55, 26, 5, 5, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(56, 26, 7, 5, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(57, 26, 2, 6, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(58, 26, 4, 6, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(59, 26, 6, 6, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(60, 26, 1, 7, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(61, 26, 3, 7, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(62, 26, 5, 7, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(63, 26, 7, 7, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(64, 20, 1, 1, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(65, 20, 2, 1, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(66, 20, 3, 1, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(67, 20, 4, 1, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(68, 20, 5, 1, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(69, 20, 6, 1, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(70, 20, 7, 1, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(71, 20, 1, 2, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(72, 20, 3, 2, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(73, 20, 4, 2, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(74, 20, 6, 2, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(75, 20, 1, 3, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(76, 20, 2, 3, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(77, 20, 3, 3, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(78, 20, 5, 3, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(79, 20, 6, 3, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(80, 20, 7, 3, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(81, 20, 1, 4, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(82, 20, 2, 4, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(83, 20, 4, 4, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(84, 20, 2, 5, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(85, 20, 4, 5, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(86, 20, 5, 5, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(87, 20, 6, 5, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(88, 20, 7, 5, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(89, 20, 1, 6, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(90, 20, 3, 6, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(91, 20, 5, 6, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(92, 20, 7, 6, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(93, 20, 1, 7, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(94, 20, 3, 7, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(95, 20, 4, 7, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(96, 20, 6, 7, '2015-03-30 18:23:06', '2015-03-30 18:23:06'),
(97, 27, 1, 1, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(98, 27, 3, 1, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(99, 27, 4, 1, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(100, 27, 5, 1, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(101, 27, 6, 1, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(102, 27, 1, 2, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(103, 27, 2, 2, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(104, 27, 5, 2, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(105, 27, 3, 3, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(106, 27, 4, 3, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(107, 27, 5, 3, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(108, 27, 6, 3, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(109, 27, 1, 4, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(110, 27, 2, 4, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(111, 27, 4, 4, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(112, 27, 1, 5, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(113, 27, 3, 5, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(114, 27, 4, 5, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(115, 27, 6, 5, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(116, 27, 2, 6, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(117, 27, 3, 6, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(118, 27, 1, 7, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(119, 27, 3, 7, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(120, 27, 5, 7, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(121, 28, 1, 1, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(122, 28, 2, 1, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(123, 28, 3, 1, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(124, 28, 3, 2, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(125, 28, 4, 2, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(126, 28, 5, 2, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(127, 28, 6, 2, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(128, 28, 7, 2, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(129, 28, 1, 3, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(130, 28, 3, 3, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(131, 28, 4, 3, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(132, 28, 5, 3, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(133, 28, 1, 4, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(134, 28, 2, 4, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(135, 28, 3, 4, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(136, 28, 4, 5, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(137, 28, 5, 5, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(138, 28, 6, 5, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(139, 28, 7, 5, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(140, 28, 2, 6, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(141, 28, 3, 6, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(142, 28, 4, 6, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(143, 28, 1, 7, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(144, 28, 2, 7, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(145, 28, 3, 7, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(146, 28, 4, 7, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(147, 20, 1, 1, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(148, 20, 2, 1, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(149, 20, 3, 1, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(150, 20, 4, 1, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(151, 20, 5, 1, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(152, 20, 6, 1, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(153, 20, 7, 1, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(154, 20, 1, 2, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(155, 20, 3, 2, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(156, 20, 4, 2, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(157, 20, 6, 2, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(158, 20, 1, 3, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(159, 20, 2, 3, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(160, 20, 3, 3, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(161, 20, 5, 3, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(162, 20, 6, 3, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(163, 20, 7, 3, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(164, 20, 1, 4, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(165, 20, 2, 4, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(166, 20, 4, 4, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(167, 20, 2, 5, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(168, 20, 4, 5, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(169, 20, 5, 5, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(170, 20, 6, 5, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(171, 20, 7, 5, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(172, 20, 1, 6, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(173, 20, 3, 6, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(174, 20, 5, 6, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(175, 20, 7, 6, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(176, 20, 1, 7, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(177, 20, 3, 7, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(178, 20, 4, 7, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(179, 20, 6, 7, '2015-04-03 13:14:14', '2015-04-03 13:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `category_id` int(11) DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `original_price` double(8,2) DEFAULT '0.00',
  `new_price` double(8,2) DEFAULT '0.00',
  `discount_percentage` int(11) DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci,
  `available_stock` int(11) DEFAULT '0',
  `fineprint` text COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `long` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_approved_by_admin` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_deal_of_the_day` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `title`, `user_id`, `category_id`, `start_date`, `end_date`, `original_price`, `new_price`, `discount_percentage`, `description`, `available_stock`, `fineprint`, `location`, `street1`, `street2`, `state`, `city`, `country`, `pin`, `lat`, `long`, `website`, `email`, `contact`, `is_approved_by_admin`, `deleted_at`, `created_at`, `updated_at`, `is_deal_of_the_day`) VALUES
(1, 'Deal1', 2, 1, '2015-05-04', '2015-05-09', 100.00, 50.00, 50, 'test deal - 1&nbsp;', 12, 'test deal - 1', 'Ahmedabad Central Bus Station, Jagannathji Road, Gita Mandir, Ahmedabad, Gujarat, India', '', 'Jagannathji Road', 'GJ', 'Ahmedabad', 'India', '380001', '', '', 'www.google.com', 'niyati.tps@gmail.com', '1234567890', 0, NULL, '2015-03-16 19:49:14', '2015-04-03 19:03:15', 0),
(2, 'Regal Touch Unisex Salon', 2, 3, '2015-03-16', '2015-03-20', 100.00, 80.00, 20, '<div class="highlight" style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"><h4 style="line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">Highlight</h4><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>Located at Panjrapole</li><li>Experienced in providing hair care and styling services</li><li>Unisex offer</li><li>Inclusive of all taxes and service charges</li></ul><h2 style="font-weight: bold; line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">Offer Details</h2><p><strong>Offer is on a choice of salon services:</strong></p><p></p><p><strong><em>Valid for Men</em></strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li><strong>Offer 1 - Rs.99:</strong>&nbsp;Oil Head Massage &amp; Steam (30min) + Shave</li></ul><p></p><p><strong><em>Valid&nbsp;for Men &amp; Women</em></strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li><strong>Offer 2&nbsp;-&nbsp;Rs.199:</strong>&nbsp;Advanced Haircut + Hair Wash + Conditioning + Blast-Dry + Head Massage (15min)</li><li><strong>Offer 3&nbsp;-&nbsp;Rs.299:</strong>&nbsp;L’Oreal Hair Spa with&nbsp;Steam Head Massage&nbsp;+ Hair Wash + Conditioning&nbsp;+ Blast-Dry</li></ul></div><div class="description" style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"><p>Don’t stress over your tress. Get the make-over you have been longing for with today’s Groupon to&nbsp;Regal Touch Unisex Salon.</p><p></p><h2 style="font-weight: bold; line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">The Deal</h2><p><strong>Choose from the following offers for 1 person:</strong></p><p><strong>Offer 1 (Valid for Men) - Rs.99 instead of Rs.320:</strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>Oil Head Massage &amp; Steam (30min)</li><li>Shave</li></ul><p></p><p><strong>Offer 2 (Valid for Men &amp; Women) - Rs.199 instead of Rs.700:</strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>Advanced Haircut</li><li>Hair Wash</li><li>Conditioning</li><li>Blast-Dry</li><li>Head Massage (15min)</li></ul><p></p><p><strong>Offer 3 (Valid for Men &amp; Women) - Rs.299 instead of Rs.1250:</strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>L’Oreal Hair Spa with Steam Head Massage</li><li>Hair Wash</li><li>Conditioning</li><li>Blast-Dry</li></ul><p></p><p><strong>Timings: 11:00AM to 10:00PM</strong></p><p></p><h2 style="font-weight: bold; line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">Groupon Partner: Regal Touch Unisex Salon</h2><p>Located in Ahmedabad,&nbsp;Regal Touch Unisex Salon&nbsp;is a unisex beauty salon that offers a range of wellness and beauty services. The staff here&nbsp;are well trained and offer quality service in a clean and hygienic environment.</p></div>', 5, '<h2 style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; line-height: 22px; color: rgb(51, 51, 51); margin: 8px 0px 12px; font-size: 18px;">What You Get</h2><strong style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;">Offer 1:</strong><span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"></span><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>Oil Head Massage &amp; Steam (30min)</li><li>Shave</li></ul><strong style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;">Offer 2:</strong><span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"></span><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>Advanced Haircut</li><li>Hair Wash</li><li>Conditioning</li><li>Blast-Dry</li><li>Head Massage (15min)</li></ul><strong style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;">Offer 3:</strong><span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"></span><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>L’Oreal Hair Spa with Steam Head Massage</li><li>Hair Wash</li><li>Conditioning</li><li>Blast-Dry</li></ul><h2 style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; line-height: 22px; color: rgb(51, 51, 51); margin: 8px 0px 12px; font-size: 18px;">Validity</h2><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>Valid until: 29.04.2015</li><li>Valid 7 days a week - 11:00AM to 10:00PM</li><li>Valid for 1 person</li><li>Offer 1 - Valid for men</li><li>Offers 2 &amp; 3 - Valid for men and women</li></ul><h2 style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; line-height: 22px; color: rgb(51, 51, 51); margin: 8px 0px 12px; font-size: 18px;">General Fine Print</h2><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>Prior appointment mandatory (Upon purchase, you will receive a voucher with the reservation number). Rescheduling may result in additional charges</li><li>For weekend appointments, we recommend calling 2-3 days in advance</li><li>Voucher printout is mandatory</li></ul>', 'Jaymangal BRTS Bus Station, 132 Feet Ring Road, Naranpura, Ahmedabad, Gujarat, India', '', '132 Feet Ring Road', 'GJ', 'Ahmedabad', 'India', '380013', '23.057631', '72.54935', 'www.test.com', 'paresh.tps@gmail.com', 'Perry Gold', 0, NULL, '2015-03-16 20:12:44', '2015-04-06 12:23:44', 0),
(9, 'S30 for Vanity Box with Piano for Kids Dressing', 4, 5, '2015-03-26', '2015-04-30', 60.00, 30.00, 50, '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Highlights</div><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">Offer is on a Vanity Box with Piano for Kids Dressing</li><li style="margin: 0px; padding: 0px; line-height: 18px;"><strong>Features:</strong></li><li style="margin: 0px; padding: 0px; line-height: 18px;">Beautiful and elegant dresser and mirror play set - Kids Piano Play Set</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Perfect product for your kids’ learning and entertainment activities</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Mirror is adjustable and dresser comes with drawers - Children Keyboard Play Set</li><li style="margin: 0px; padding: 0px; line-height: 18px;">13-key piano. Play hairdryer with real blowing action. Shatterproof plastic mirror. Matching stool</li><li style="margin: 0px; padding: 0px; line-height: 18px;">2 x play lipsticks, 3 x play nail varnish bottles, 1 x comb, 3 x rings, 2 x bracelets, 2 x bobbles</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Free delivery across India</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Inclusive of all taxes and service charges</li></ul>', 5, '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Fine Print<br></div><p style="margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">The merchant is the seller of product(s) under this deal and will be solely responsible for the products sold</p><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><h3 style=" color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Groupon Promise:</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">We offer a 7-day refund guarantee if your product is found to be damaged/defective on arrival. No replacements offered, given limited stock and the nature of our business.</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Click<span class="Apple-converted-space">&nbsp;</span><strong><u><a href="http://blog.groupon.co.in/2012/11/23/groupon-india-return-replacement-and-refund-policy/" target="_blank" style="padding: 0px; text-decoration: none; color: rgb(1, 133, 198);">here</a></u></strong><span class="Apple-converted-space">&nbsp;</span>to read our Returns/Replacement Policy</li></ul><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><h3 style=" color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Delivery Timeline:</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">Expect the product to reach you within 10 days of order</li></ul>', 'New Jersey Avenue Northwest, Washington, DC, United States', '', 'New Jersey Ave NW', 'DC', 'Washington', 'United States', '', '38.9035521', '-77.01411519999999', 'www.test.com', 'pareshgandhi28@gmail.com', '1212121212', 1, NULL, '2015-03-26 19:31:56', '2015-04-14 08:12:47', 1),
(4, '1 Month Yoga Membership at Ruchi Yoga Centre', 2, 1, '0000-00-00', '0000-00-00', 300.00, 250.00, 10, '<div class="highlight" style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"><h4 style="line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">Highlight</h4><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>Pay Rs.299 for 1 Month Yoga Membership (20 Sessions)</li><li><strong>Membership Includes:</strong>&nbsp;</li><li>Basic Training Course</li><li>Yoga Workshop</li><li>Power Yoga</li><li>Pregnancy Yoga</li><li>Iyengar Yoga- Precision in Posture and Breath Control</li><li>Yoga with Props</li><li>Special Meditation</li><li>Yoga Therapy</li><li>Located in Bodakdev</li><li>Inclusive of all taxes and service charges</li></ul></div><div class="description" style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"><p>Inner peace is hard to come by, requiring complex negotiations between your organs and limbs. Find harmony more easily with yoga with today’s Groupon to Ruchi Yoga Centre.</p><p></p><h2 style="font-weight: bold; line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">The Deal</h2><p><strong>Pay Rs.299 instead of Rs.1200 for 1 Month Yoga Membership (20 Sessions)</strong></p><p></p><p><strong>Membership Includes:</strong>&nbsp;</p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>Basic Training Course</li><li>Yoga Workshop</li><li>Power Yoga</li><li>Pregnancy Yoga</li><li>Iyengar Yoga- Precision in Posture and Breath Control</li><li>Yoga with Props</li><li>Special Meditation</li><li>Yoga Therapy</li></ul><p></p><p><strong>Benefits of Yoga:</strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>Helps Carve out a confident body</li><li>Soothes and Calms your mind</li><li>Makes you more focused</li><li>Weight loss</li><li>Gives Inner Peace and Stress relief</li><li>Improves Immunity</li><li>Energizes and Rejuvenates your body and mind</li><li>Leads to better and more flexibility</li></ul><p>&nbsp;</p><p><strong>Timings:</strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>7:00 AM to 8:00 AM (Valid for men and women)</li><li>9:00 AM to 10:00 AM (Valid for women)</li><li>10:00 AM to 11:00 AM (Valid for women)</li><li>3:00 PM to 4:00 PM - Minimum 6 ppl required to start a batch - (Valid for men and women) -</li></ul><p>&nbsp;</p><h2 style="font-weight: bold; line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">Groupon Partner: Ruchi Yoga Centre</h2><p>Located in Bodakdev, Ruchi Yoga Centre focuses on calming techniques to soothe the mind, body and souls of visiting patrons. The centre is headed by Ruchi Lalchandani, who boasts of years of experience in the field.</p></div>', 5, '<h2 style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; line-height: 22px; color: rgb(51, 51, 51); margin: 8px 0px 12px; font-size: 18px;">Validity</h2><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>Valid until: 27.04.2015</li><li>Valid 5 days a week - Not valid on Saturday &amp; Sunday</li><li>Valid for 1 person</li><li>Valid for men and women</li></ul><h2 style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; line-height: 22px; color: rgb(51, 51, 51); margin: 8px 0px 12px; font-size: 18px;">General Fine Print</h2><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>Not valid for existing customers</li><li>The membership tenure will be counted from date of joining.</li><li>Prior appointment mandatory (Upon purchase, you will receive a voucher with the reservation number). Rescheduling may result in additional charges</li><li>Voucher printout is mandatory</li></ul>', 'Bodak Dev Road, Bodakdev, Ahmedabad, Gujarat, India', '', 'Bodak Dev Rd', 'GJ', 'Ahmedabad', 'India', '', '', '', 'www.ruchi.com', 'ruchi@test.com', 'asdf asdf asdf asdf', 1, NULL, '2015-03-16 20:31:02', '2015-04-14 08:12:40', 0),
(5, '$29.90 for 30 Day Unlimited Gym Access and Group Exercise Classes', 4, 1, '2015-03-18', '2015-04-30', 89.00, 30.00, 66, '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Highlights</div><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">Mix and match exercise classes</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Group exercise classes offers variety in a fun environment</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Diverse range of classes include Zumba, Hatha Yoga, Pilates, Bodycombat, Body Sculpting, Indoor Cycling and more</li><li style="margin: 0px; padding: 0px; line-height: 18px;">View more<span class="Apple-converted-space">&nbsp;</span><span style="padding: 0px; text-decoration: none; color: rgb(1, 133, 198);">classes and schedules</span></li><li style="margin: 0px; padding: 0px; line-height: 18px;">Suitable for beginners and advanced students</li><li style="margin: 0px; padding: 0px; line-height: 18px;">World-class exercise equipment, spacious changing rooms and huge group exercise studios</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Voted<span class="Apple-converted-space">&nbsp;</span><a href="http://www.asiaone.com/specials/pca2013/winner.html" style="padding: 0px; text-decoration: none; color: rgb(1, 133, 198);">Best Health and Fitness Provider</a><span class="Apple-converted-space">&nbsp;</span>by AsiaOne readers in 2013</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Voted<span class="Apple-converted-space">&nbsp;</span><a href="http://www.asiaone.com/specials/pca2011/results.html" style="padding: 0px; text-decoration: none; color: rgb(1, 133, 198);">Best Wellness Provider</a><span class="Apple-converted-space">&nbsp;</span>by AsiaOne readers in 2011/2012</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Available at central locations in Orchard, Novena, Raffles Place and Bugis</li></ul>', 5, '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Fine Print</div><em style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Click ''Buy Now!'' for more options.</em><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><h3 style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">General Fine Print</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;"><b>Valid till 20 May 2014</b></li><li style="margin: 0px; padding: 0px; line-height: 18px;"><b>Limit 1 Groupon per person,</b><span class="Apple-converted-space">&nbsp;</span>may buy multiple as gifts</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Valid for first time customers only, aged 21 years and above</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Valid for Singaporeans, PRs and EP holders</li><li style="margin: 0px; padding: 0px; line-height: 18px;">A nominal fee is required for each change of location for Option 1</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Not valid with other discounts and promotions</li></ul><h3 style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Available Locations</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">Bugis Junction Towers, Level 4&nbsp;<br>Tel: 6337 2577</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Ngee Ann City Podium Block Level 8&nbsp;<br>Tel: 6834 2100</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Republic Plaza II Level 14&nbsp;<br>Tel: 6534 0900</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Velocity@Novena Level 3&nbsp;<br>Tel: 6250 2345</li></ul><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><h3 style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Redemption Instructions</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;"><b>Appointment required</b></li><li style="margin: 0px; padding: 0px; line-height: 18px;">Call respective outlets</li><li style="margin: 0px; padding: 0px; line-height: 18px;"><b>Valid ID MUST be presented</b></li></ul>', 'California 1, San Simeon, CA, United States', '', 'California 1', 'CA', 'San Simeon', 'United States', '', '35.6901714', '-121.28685239999999', 'www.test.com', 'paresh.tps@gmail.com', '12312312312', 1, NULL, '2015-03-18 14:17:25', '2015-04-14 08:12:43', 1),
(6, 'Get 50% off on Beauty and Spa Services', 4, 3, '2015-03-18', '2015-04-30', 500.00, 250.00, 50, 'Get 50% off on Beauty and Spa Services Or pay only Rs 2999 for Schwarzkopf Global Hair Color Any Length and Rs 3999 for Hair Rebonding<br>', 5, '- Available on all days. Not Available on Waxing Prior appointment Mandatory. Call the merchant for more details on the Package T&amp;C apply Cannot be clubbed with any other Offer.<br>- This offer cannot be clubbed with other offers. You can download this coupon FREE of cost from dealsandyou.com. You only need to pay Istana Unisex Spa &amp; Salon as per the Offer Details.<br>- This is a limited time offer and subject to approval from the merchant. DealsAndYou does not take any responsibility and/or has no liability if the coupon is not accepted at the outlet. To avoid any confusion, we suggest you to take an appointment or make a reservation and present the coupon before placing the order or consuming any service at the merchant''s outlet.<br>', 'New York, NY, United States', '', '', 'NY', 'New York', 'United States', '', '40.7127837', '-74.00594130000002', 'www.test.com', 'pareshgandhi28@gmail.com', '23423423423', 1, NULL, '2015-03-18 19:15:35', '2015-04-01 16:24:46', 0),
(7, 'NatGeo Kids Magazine: 1-Year Print Subscription', 4, 9, '2015-03-18', '2015-04-01', 75.00, 45.00, 40, '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Highlights</div><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">Enrich young minds with interesting reads</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Informative and engaging features</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Ideal for ages 6-12 years old</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Instill environmental awareness in your child</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Delivered to your doorstep</li></ul>', 5, '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Fine Print</div><em style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Click ''Buy Now!'' for more options.</em><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><h3 style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">General Fine Print</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;"><strong>Valid till 28 Jul 2015</strong></li><li style="margin: 0px; padding: 0px; line-height: 18px;"><strong>Limit 1 Groupon per person</strong>, may buy multiple as gifts</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Voucher includes delivery</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Valid for Singapore addresses only</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Not valid with other discounts and promotions</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Subscription period shall commence from the latest issue, subject to availability</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Please allow at least until the first week of the next month to receive your first copy of the subscription</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Call 6513 4176 for enquiries</li></ul><h3 style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Redemption Instructions</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">Go to<span class="Apple-converted-space">&nbsp;</span><a href="http://activate.mag-ez.com/redeem/groupon" target="_blank" style="padding: 0px; text-decoration: none; color: rgb(1, 133, 198);">http://activate.mag-ez.com/redeem/groupon</a></li><li style="margin: 0px; padding: 0px; line-height: 18px;">Fill up the online Redemption Submission Form; the following information are required:</li><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px;"><li style="margin: 0px; padding: 0px; line-height: 18px;">Groupon Voucher Number</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Groupon Security Code</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Your communication address</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Your delivery address</li></ul><li style="margin: 0px; padding: 0px; line-height: 18px;">After filling up the online Redemption Submission Form, hit the Redeem Now button</li><li style="margin: 0px; padding: 0px; line-height: 18px;">You will receive a copy of Redeem Submission Confirmation both on screen and at your email box pending for Subscription Activation</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Upon Subscription Activation you will receive an Order Confirmation Notification email</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Your subscription will commence on the following month which will be reflected on the Order Confirmation Notification</li></ul>', '26 Hanover Walk, Hatfield, Hertfordshire, United Kingdom', '26', 'Hanover Walk', '', 'Hatfield', 'United Kingdom', 'AL10 9EL', '51.7468733', '-0.24074710000002142', 'www.test.com', 'pareshgandhi28@gmail.com', '23423423', 1, NULL, '2015-03-18 19:22:52', '2015-03-18 19:28:19', 0),
(10, 'Bath Robe for Kids', 4, 5, '2015-04-02', '2015-06-30', 500.00, 300.00, 60, '<span id="highlights" style="outline: none; font-family: Arial, Helvetica, sans-serif; font-size: 22px; font-weight: bold; color: rgb(0, 0, 0); text-align: center; padding-left: 54px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Highlights</span><div class="dealContent" style="outline: none; display: block; text-align: left; padding-top: 15px; color: rgb(99, 99, 99); font-family: GothamBook, Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><ul style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; line-height: normal; list-style: none outside none;"><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer is on a Choice of Bath Robes for Kids:</strong></li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 1 – Rs.299:</strong><span class="Apple-converted-space">&nbsp;</span>Blue Kids Bath Robe (Small)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 2 – Rs.299:</strong><span class="Apple-converted-space">&nbsp;</span>Yellow Kids Bath Robe (Small)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 3 – Rs.299:</strong><span class="Apple-converted-space">&nbsp;</span>Green Kids Bath Robe (Small)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 4 – Rs.299:</strong><span class="Apple-converted-space">&nbsp;</span>Pink Kids Bath Robe (Small)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 5 – Rs.399:</strong><span class="Apple-converted-space">&nbsp;</span>White Kids Bath Robe (Large)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 6 – Rs.399:</strong><span class="Apple-converted-space">&nbsp;</span>Pink Kids Bath Robe (Large)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 7 – Rs.399:</strong><span class="Apple-converted-space">&nbsp;</span>Blue Kids Bath Robe (Large)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 8 – Rs.399:</strong><span class="Apple-converted-space">&nbsp;</span>Green Kids Bath Robe (Large)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Features:</strong></li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;">An amazingly soft bath robe for your little ones along with a strap</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;">Material: 100% cotton</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;">Small Bath Robe (Shoulder x Length/cm): 35 x 41</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;">Large Bath Robe (Shoulder x Length/cm): 43 x 58</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;">Free delivery across India</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;">Inclusive of all taxes and service charges</li></ul></div>', 20, '<span id="fine" style="outline: none; font-family: Arial, Helvetica, sans-serif; font-size: 22px; font-weight: bold; color: rgb(0, 0, 0); font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Fine Print</span><div class="dealContent" style="outline: none; display: block; text-align: left; padding-top: 15px; color: rgb(99, 99, 99); font-family: GothamBook, Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><p style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black;">The merchant is the seller of product(s) under this deal and will be solely responsible for the products sold</p><p style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black;"><br></p><h2 style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; font-family: GothamBook, Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Delivery Timeline:</h2><h2 style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; font-family: GothamBook, Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><br></h2><p style=" outline: none; margin: 0px; padding: 0px; border: 0px; color: black; font-family: GothamBook, Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Expect the product to reach you within 10 days of order</p></div>', 'New Jersey 17, Paramus, NJ, United States', '', 'Hwy 17', 'NJ', 'Paramus', 'United States', '', '40.944769', '-74.07188480000002', 'www.test.com', 'pareshgandhi28@gmail.com', '23423423423423', 2, NULL, '2015-04-02 19:03:49', '2015-04-02 19:35:05', 0),
(11, 'Vidal Sassoon Color Protect Hair Dryer', 4, 3, '2015-04-06', '2015-05-06', 39.99, 20.02, 50, '<h4 style="box-sizing: border-box; line-height: 1.2; font-weight: 300; margin: 0px 0px 10px; font-size: 24px; color: rgb(51, 51, 51); font-family: OpenSans, ''Helvetica Neue'', Helvetica, Arial, FreeSans, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Vidal Sassoon Color Protect Hair Dryer</h4><ul style="box-sizing: border-box; margin: 0px 0px 20px; padding-left: 20px; color: rgb(51, 51, 51); font-family: OpenSans, ''Helvetica Neue'', Helvetica, Arial, FreeSans, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 19.5px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="box-sizing: border-box;">Ceramic hair dryer</li><li style="box-sizing: border-box;">Far-infrared technology helps evaporate water quickly and evenly</li><li style="box-sizing: border-box;">Ions seal in hair cuticles to lock in color</li><li style="box-sizing: border-box;">Helps add volume and body to hair</li><li style="box-sizing: border-box;">Two heat and speed settings</li><li style="box-sizing: border-box;">Cold shot button helps set the style</li><li style="box-sizing: border-box;">Included concentrator attachment helps craft precision styles</li><li style="box-sizing: border-box;">Included diffuser attachment for natural curls and waves</li><li style="box-sizing: border-box;">Removable end cap</li><li style="box-sizing: border-box;">Weight: 2.3 lbs.</li><li style="box-sizing: border-box;">Dimensions: 4.38x10.25x11.25</li></ul>', 10, '<ul style="box-sizing: border-box; margin: 0px 0px 20px; padding-left: 20px; color: rgb(51, 51, 51); font-family: OpenSans, ''Helvetica Neue'', Helvetica, Arial, FreeSans, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 19.5px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="box-sizing: border-box;"><span style="color: rgb(0, 0, 0);"><span style="box-sizing: border-box; text-decoration: none;">Free returns</span></span></li><li style="box-sizing: border-box;">Most orders are delivered within 7 business days from the purchase date.<span class="Apple-converted-space">&nbsp;</span><span style="color: rgb(0, 0, 0);"><span style="box-sizing: border-box; text-decoration: none;">Shipping questions?</span></span></li><li style="box-sizing: border-box;">Does not ship to PO boxes/AK/HI/Canada/Puerto Rico</li></ul>', 'Ney Avenue, Yorkville, NY, United States', '', 'Ney Ave', 'NY', 'Utica', 'United States', '13502', '43.103501', '-75.26699100000002', 'www.test.com', 'pareshgandhi28@gmail.com', '23414313241234', 0, NULL, '2015-04-06 13:33:11', '2015-04-06 15:30:13', 0),
(12, '2 Sets (4 tubes) Love Alpha LA729 English Version (Gel & Fiber) Mascara Set - Brush on False Eyelashes', 4, 3, '2015-04-06', '2015-05-06', 12.00, 6.62, 55, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Love Alpha LA729 English Version (Gel &amp; Fiber) Mascara Set</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Brush on False Eyelashes</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">instantly lengthen your eyelash by 100% - 300%</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">2 Sets (4 tubes)</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">ENVIROMENTAL FRIENDLY PACKING</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Love Alpha LA729 English Version (Gel &amp; Fiber) Mascara Set</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Brush on False Eyelashes</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">instantly lengthen your eyelash by 100% - 300%</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">2 Sets (4 tubes)</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">ENVIROMENTAL FRIENDLY PACKING</span></li></ul>', 'New Zealand Street, Parramatta, New South Wales, Australia', '', 'New Zealand St', 'NSW', 'Parramatta', 'Australia', '2150', '-33.81371', '151.01460139999995', 'www.test.com', 'pareshgandhi28@gmail.com', '2459231219812', 0, NULL, '2015-04-06 14:31:04', '2015-04-06 14:54:13', 0);
INSERT INTO `deals` (`id`, `title`, `user_id`, `category_id`, `start_date`, `end_date`, `original_price`, `new_price`, `discount_percentage`, `description`, `available_stock`, `fineprint`, `location`, `street1`, `street2`, `state`, `city`, `country`, `pin`, `lat`, `long`, `website`, `email`, `contact`, `is_approved_by_admin`, `deleted_at`, `created_at`, `updated_at`, `is_deal_of_the_day`) VALUES
(13, 'stila Stay All Day Waterproof Liquid Eye Liner', 4, 3, '2015-04-06', '2015-05-06', 20.00, 19.00, 95, '<span style="color: rgb(17, 17, 17); font-family: Arial, sans-serif; line-height: 19px;">An easy-application, waterproof liquid liner that stays on all day and night. This easy-glide, quick-dry precision liner stays in place until you say when--no smudges, feathering, or running.</span>', 10, '<span style="color: rgb(17, 17, 17); font-family: Arial, sans-serif; line-height: 19px;">Felt tip applicator for easy, precise application. Goes on smoothly, won''t smudge or run.</span>', 'New Zealand Street, Parramatta, New South Wales, Australia', '', 'New Zealand St', 'NSW', 'Parramatta', 'Australia', '2150', '-33.81371', '151.01460139999995', 'www.test.com', 'pareshgandhi28@gmail.com', '25354689872', 0, NULL, '2015-04-06 15:14:30', '2015-04-06 15:14:30', 0),
(14, 'stila Stay All Day Waterproof Liquid Eye Liner', 4, 3, '2015-04-06', '2015-05-06', 20.00, 19.00, 95, '<p class="a-spacing-mini" style="padding: 0px; color: rgb(17, 17, 17); font-family: Arial, sans-serif; line-height: 19px; margin-bottom: 6px !important;">An easy-application, waterproof liquid liner that stays on all day and night. This easy-glide, quick-dry precision liner stays in place until you say when--no smudges, feathering, or running.</p>', 10, '<span style="color: rgb(17, 17, 17); font-family: Arial, sans-serif; line-height: 19px;">Felt tip applicator for easy, precise application. Goes on smoothly, won''t smudge or run.</span>', 'New Zealand Street, Parramatta, New South Wales, Australia', '', 'New Zealand St', 'NSW', 'Parramatta', 'Australia', '2150', '-33.81371', '151.01460139999995', 'www.test.com', 'pareshgandhi28@gmail.com', '253648972', 0, NULL, '2015-04-06 15:21:45', '2015-04-06 15:41:12', 0),
(15, 'J.cat Beauty Roll It up Auto Lip Pencil Liner All 12 Colors', 4, 3, '2015-04-06', '2015-05-06', 39.99, 20.00, 50, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">All 12 different colors</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">truly high quality auto lip pencil liner</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Long lasting, ease to apply and Automatically</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">crudely free, amazing quaity, Hypoallergenic and affordable price</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">All 12 different colors</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">truly high quality auto lip pencil liner</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Long lasting, ease to apply and Automatically</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">crudely free, amazing quaity, Hypoallergenic and affordable price</span></li></ul>', 'Avenue Road, Auckland, New Zealand', '', 'Avenue Rd', 'Auckland', 'Auckland', 'New Zealand', '1062', '-36.9421519', '174.84834380000007', 'www.test.com', 'pareshgandhi28@gmail.com', '256497823', 0, NULL, '2015-04-06 16:13:08', '2015-04-06 16:18:00', 0),
(16, 'L''Oreal Paris Colour Riche Extraordinaire Lip Color, Rose Symphony, 0.18 Fluid Ounce', 4, 3, '2015-04-06', '2015-05-06', 7.99, 7.97, 100, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Transform lips from ordinary to extraordinary with richer color, smoother lip surface and magnified shine</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Formulated with precious micro-oils and rich color pigments</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Provides the ideal balance of color and care for perfect lips</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Unique soft-touch applicator allows for a silky-smooth, gliding application</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Transform lips from ordinary to extraordinary with richer color, smoother lip surface and magnified shine</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Formulated with precious micro-oils and rich color pigments</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Provides the ideal balance of color and care for perfect lips</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Unique soft-touch applicator allows for a silky-smooth, gliding application</span></li></ul>', 'New Zealand Street, Parramatta, New South Wales, Australia', '', 'New Zealand St', 'NSW', 'Parramatta', 'Australia', '2150', '-33.81371', '151.01460139999995', 'www.test.com', 'pareshgandhi28@gmail.com', '2538567415', 0, NULL, '2015-04-06 16:56:23', '2015-04-06 16:58:36', 0),
(17, 'KingMas Professional 15 Concealer Camouflage Makeup Palette', 4, 3, '2015-04-06', '2015-05-06', 29.99, 3.92, 13, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">15 Concealer Camouflage Makeup Palette</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Perfect for both Professional Salon or Home use!</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">High quality ingredients with silky shine color, can last for all day long!</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">15 colors Camouflage and Concealer Palette has been created for us using the most commonly applied shades</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Ingredients: squalane, octyl Palmitate, beeswax, talc, polymethyl methacrylate, petrolatum, propyl paraben.</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">15 Concealer Camouflage Makeup Palette</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Perfect for both Professional Salon or Home use!</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">High quality ingredients with silky shine color, can last for all day long!</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">15 colors Camouflage and Concealer Palette has been created for us using the most commonly applied shades</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Ingredients: squalane, octyl Palmitate, beeswax, talc, polymethyl methacrylate, petrolatum, propyl paraben.</span></li></ul>', 'New York, IA, United States', '', '', 'IA', 'New York', 'United States', '50238', '40.8516701', '-93.2599318', 'www.test.com', 'pareshgandhi28@gmail.com', '25649887232', 0, NULL, '2015-04-06 17:20:24', '2015-04-06 17:22:26', 0),
(18, 'Bare Escentuals BareMinerals MATTE SPF 15 Foundation, Medium Beige', 4, 3, '2015-04-06', '2015-05-06', 27.99, 26.00, 93, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">93% of women saw minimized pores*</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">85% of women experienced improved skin clarity with continued use*</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">89% said this foundation reduced oily shine throughout the day*</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">*Based on an independent consumer study.</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">93% of women saw minimized pores*</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">85% of women experienced improved skin clarity with continued use*</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">89% said this foundation reduced oily shine throughout the day*</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">*Based on an independent consumer study.</span></li></ul>', 'New York, IA, United States', '', '', 'IA', 'New York', 'United States', '50238', '40.8516701', '-93.2599318', 'www.test.com', 'pareshgandhi28@gmail.com', '256487925', 0, NULL, '2015-04-06 17:26:27', '2015-04-06 17:26:58', 0),
(19, 'Mood Nail Lacquer Color Changing Nail Polish 6pc Set (6 Different Colors) Full Size Nail Polish', 4, 3, '2015-04-06', '2015-05-06', 32.64, 17.20, 53, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Color Changing Nail Polish</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Made in USA</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Available In 6 Pretty colors</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">NO DBP</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Color Changes as your body temperature changes</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Color Changing Nail Polish</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Made in USA</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Available In 6 Pretty colors</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">NO DBP</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Color Changes as your body temperature changes</span></li></ul>', 'New York Avenue Northwest, Washington, DC, United States', '', 'New York Ave NW', 'DC', 'Washington', 'United States', '', '38.9031706', '-77.0208758', 'www.test.com', 'pareshgandhi28@gmail.com', '25464647823', 0, NULL, '2015-04-06 17:36:24', '2015-04-06 17:40:04', 0),
(20, 'Deal JP', 35, 1, '2015-04-29', '2015-05-09', 100.00, 50.00, 50, 'This is the test data deal.<br>', 1000, 'This is the test data deal.<br>', 'Ahmedabad, Gujarat, India', '', '', 'GJ', 'Ahmedabad', 'India', '', '23.022505', '72.57136209999999', 'test.com', 'jigar.tps1@gmail.com', '1234567890', 0, NULL, '2015-04-29 05:17:50', '2015-04-29 05:35:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deal_images`
--

CREATE TABLE IF NOT EXISTS `deal_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) DEFAULT '0',
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_cover` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `deal_images`
--

INSERT INTO `deal_images` (`id`, `deal_id`, `image_path`, `is_cover`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'http://tpstracker.com/demo/tribalsquare/uploads/404_icon.png', 1, '2015-03-16 19:50:13', '2015-03-16 19:49:28', '2015-03-16 19:50:13'),
(2, 2, 'http://tpstracker.com/demo/tribalsquare/uploads/spa1.jpg', 0, '2015-03-16 20:17:47', '2015-03-16 20:14:25', '2015-03-16 20:17:47'),
(3, 2, 'http://tpstracker.com/demo/tribalsquare/uploads/spa2.jpg', 1, '2015-03-16 20:17:44', '2015-03-16 20:14:33', '2015-03-16 20:17:44'),
(4, 2, 'http://tpstracker.com/demo/tribalsquare/uploads/spa3.jpg', 0, '2015-03-16 20:17:41', '2015-03-16 20:14:38', '2015-03-16 20:17:41'),
(5, 3, 'http://tpstracker.com/demo/tribalsquare/uploads/spa3.jpg', 1, '2015-03-16 20:21:33', '2015-03-16 20:21:06', '2015-03-16 20:21:33'),
(6, 2, 'http://tpstracker.com/demo/tribalsquare/uploads/spa1.jpg', 0, NULL, '2015-03-16 20:23:37', '2015-03-16 20:23:37'),
(7, 2, 'http://tpstracker.com/demo/tribalsquare/uploads/spa2.jpg', 1, NULL, '2015-03-16 20:23:40', '2015-03-18 11:43:50'),
(8, 2, 'http://tpstracker.com/demo/tribalsquare/uploads/spa3.jpg', 0, NULL, '2015-03-16 20:23:43', '2015-03-16 20:23:43'),
(9, 4, 'http://tpstracker.com/demo/tribalsquare/uploads/yoga1.jpg', 1, NULL, '2015-03-16 20:33:18', '2015-03-16 20:33:30'),
(10, 4, 'http://tpstracker.com/demo/tribalsquare/uploads/yoga2.jpg', 0, NULL, '2015-03-16 20:33:22', '2015-03-16 20:33:22'),
(11, 4, 'http://tpstracker.com/demo/tribalsquare/uploads/yoga3.jpg', 0, NULL, '2015-03-16 20:33:23', '2015-03-16 20:33:23'),
(12, 5, 'uploads/fitness.jpg', 1, NULL, '2015-03-18 14:17:42', '2015-04-01 16:22:26'),
(13, 5, 'uploads/fitness1.jpg', 0, NULL, '2015-03-18 14:17:45', '2015-03-18 14:17:45'),
(14, 5, 'uploads/fitness2.jpg', 0, NULL, '2015-03-18 14:17:56', '2015-03-18 14:17:56'),
(15, 5, 'http://tpstracker.com/demo/tribalsquare/uploads/fitness3.jpg', 0, NULL, '2015-03-18 14:18:01', '2015-03-18 14:18:01'),
(16, 6, 'http://tpstracker.com/demo/tribalsquare/uploads/spa4.jpg', 1, NULL, '2015-03-18 19:17:10', '2015-04-01 16:24:46'),
(17, 6, 'http://tpstracker.com/demo/tribalsquare/uploads/spa5.jpg', 0, NULL, '2015-03-18 19:17:12', '2015-03-18 19:17:12'),
(18, 7, 'http://tpstracker.com/demo/tribalsquare/uploads/book2.jpg', 1, NULL, '2015-03-18 19:23:42', '2015-03-18 19:23:47'),
(19, 8, 'http://tpstracker.com/demo/tribalsquare/uploads/Classified Details.png', 1, NULL, '2015-03-23 20:50:23', '2015-03-23 20:51:28'),
(20, 8, 'http://tpstracker.com/demo/tribalsquare/uploads/Lost_Password.png', 0, NULL, '2015-03-23 20:50:50', '2015-03-23 20:50:50'),
(21, 9, 'http://tpstracker.com/demo/tribalsquare/uploads/1426228640458.jpg', 1, NULL, '2015-03-26 19:32:29', '2015-03-26 19:34:17'),
(22, 9, 'http://tpstracker.com/demo/tribalsquare/uploads/8u-700x420.jpg', 0, NULL, '2015-03-26 19:33:09', '2015-03-26 19:33:09'),
(23, 9, 'http://tpstracker.com/demo/tribalsquare/uploads/U1-700x420.jpg', 0, NULL, '2015-03-26 19:33:12', '2015-03-26 19:33:12'),
(24, 10, 'http://tpstracker.com/demo/tribalsquare/uploads/1419916704166.jpg', 1, NULL, '2015-04-02 19:04:12', '2015-04-02 19:04:21'),
(25, 11, 'http://tpstracker.com/demo/tribalsquare/uploads/c700x420.jpg', 1, NULL, '2015-04-06 13:34:42', '2015-04-06 15:30:13'),
(26, 12, 'http://tpstracker.com/demo/tribalsquare/uploads/71E-hfajGfL._SL1200_.jpg', 1, NULL, '2015-04-06 14:48:29', '2015-04-06 14:54:13'),
(27, 12, 'http://tpstracker.com/demo/tribalsquare/uploads/61q8OU573pL._SL1000_.jpg', 0, NULL, '2015-04-06 14:49:51', '2015-04-06 14:49:51'),
(28, 12, 'http://tpstracker.com/demo/tribalsquare/uploads/61rP+tCT8yL._SL1000_.jpg', 0, NULL, '2015-04-06 14:49:55', '2015-04-06 14:49:55'),
(29, 13, 'http://tpstracker.com/demo/tribalsquare/uploads/61Hchez7BtL._SL1500_.jpg', 0, NULL, '2015-04-06 15:16:26', '2015-04-06 15:16:26'),
(30, 13, 'http://tpstracker.com/demo/tribalsquare/uploads/61IVU6ox-eL._SL1500_.jpg', 0, NULL, '2015-04-06 15:16:29', '2015-04-06 15:16:29'),
(31, 13, 'http://tpstracker.com/demo/tribalsquare/uploads/71Rpoph+JBL._SL1500_.jpg', 0, NULL, '2015-04-06 15:16:32', '2015-04-06 15:16:32'),
(32, 13, 'http://tpstracker.com/demo/tribalsquare/uploads/71z+sIA8dhL._SL1500_.jpg', 0, NULL, '2015-04-06 15:16:34', '2015-04-06 15:16:34'),
(33, 14, 'http://tpstracker.com/demo/tribalsquare/uploads/61Hchez7BtL._SL1500__1.jpg', 0, NULL, '2015-04-06 15:22:00', '2015-04-06 15:22:00'),
(34, 14, 'http://tpstracker.com/demo/tribalsquare/uploads/71Rpoph+JBL._SL1500__1.jpg', 0, NULL, '2015-04-06 15:22:27', '2015-04-06 15:22:27'),
(35, 14, 'http://tpstracker.com/demo/tribalsquare/uploads/71z+sIA8dhL._SL1500__1.jpg', 1, NULL, '2015-04-06 15:22:51', '2015-04-06 15:41:12'),
(36, 14, 'http://tpstracker.com/demo/tribalsquare/uploads/71Rpoph+JBL._SL1500__2.jpg', 0, NULL, '2015-04-06 15:23:12', '2015-04-06 15:23:12'),
(37, 15, 'http://tpstracker.com/demo/tribalsquare/uploads/81CHZCymQ1L._SL1500_.jpg', 1, NULL, '2015-04-06 16:14:09', '2015-04-06 16:18:00'),
(38, 15, 'http://tpstracker.com/demo/tribalsquare/uploads/71tRIaCM2yL._SL1500_.jpg', 0, NULL, '2015-04-06 16:15:35', '2015-04-06 16:15:35'),
(39, 15, 'http://tpstracker.com/demo/tribalsquare/uploads/81mJsOn-cNL._SL1500_.jpg', 0, NULL, '2015-04-06 16:15:46', '2015-04-06 16:15:46'),
(40, 15, 'http://tpstracker.com/demo/tribalsquare/uploads/41xdYbVXlhL.jpg', 0, NULL, '2015-04-06 16:15:53', '2015-04-06 16:15:53'),
(41, 16, 'http://tpstracker.com/demo/tribalsquare/uploads/71uEBj0tkoL._SL1500_.jpg', 1, NULL, '2015-04-06 16:58:12', '2015-04-06 16:58:36'),
(42, 16, 'http://tpstracker.com/demo/tribalsquare/uploads/61-Fekip5EL._SL1200_.jpg', 0, NULL, '2015-04-06 16:58:23', '2015-04-06 16:58:23'),
(43, 17, 'http://tpstracker.com/demo/tribalsquare/uploads/51Zka6IPunL._SL1200_.jpg', 1, NULL, '2015-04-06 17:20:40', '2015-04-06 17:22:26'),
(44, 17, 'http://tpstracker.com/demo/tribalsquare/uploads/71jR3TbCfgL._SL1500_.jpg', 0, NULL, '2015-04-06 17:21:02', '2015-04-06 17:21:02'),
(45, 17, 'http://tpstracker.com/demo/tribalsquare/uploads/71pMzfa5qML._SL1500_.jpg', 0, NULL, '2015-04-06 17:21:13', '2015-04-06 17:21:13'),
(46, 17, 'http://tpstracker.com/demo/tribalsquare/uploads/51yWAZz6kJL._SL1200_.jpg', 0, NULL, '2015-04-06 17:21:23', '2015-04-06 17:21:23'),
(47, 17, 'http://tpstracker.com/demo/tribalsquare/uploads/61tZ2iozA6L._SL1200_.jpg', 0, NULL, '2015-04-06 17:22:04', '2015-04-06 17:22:04'),
(48, 18, 'http://tpstracker.com/demo/tribalsquare/uploads/419IGnbK1wL.jpg', 1, NULL, '2015-04-06 17:26:47', '2015-04-06 17:26:58'),
(49, 19, 'http://tpstracker.com/demo/tribalsquare/uploads/417ebHq0T+L._SY355_.jpg', 1, NULL, '2015-04-06 17:39:35', '2015-04-06 17:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `deal_videos`
--

CREATE TABLE IF NOT EXISTS `deal_videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL DEFAULT '0',
  `video_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `deal_videos`
--

INSERT INTO `deal_videos` (`id`, `deal_id`, `video_path`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Xiaomi Yi Action camera video sample 1.mp4', NULL, '2015-03-16 20:15:11', '2015-03-16 20:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE IF NOT EXISTS `experiences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `have_experience_caring_child_with_special_needs` tinyint(1) DEFAULT '0',
  `have_experience_caring_infants` tinyint(1) DEFAULT '0',
  `have_experience_caring_twins` tinyint(1) DEFAULT '0',
  `have_experience_provide_homework_help` tinyint(1) DEFAULT '0',
  `paid_child_care_experience_years` int(11) DEFAULT '0',
  `age_groups_experience_with` text COLLATE utf8_unicode_ci,
  `willing_care_for_sick_children` tinyint(1) DEFAULT '0',
  `have_special_needs_service_experience` tinyint(1) DEFAULT '0',
  `special_needs_service_experience` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `have_experience_caring_child_with_special_needs`, `have_experience_caring_infants`, `have_experience_caring_twins`, `have_experience_provide_homework_help`, `paid_child_care_experience_years`, `age_groups_experience_with`, `willing_care_for_sick_children`, `have_special_needs_service_experience`, `special_needs_service_experience`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 18, 1, 1, 0, 0, 10, '1,3,5', 1, 1, '2,3,5,6,8,9', NULL, '2015-03-30 16:18:27', '2015-03-30 16:18:27'),
(2, 20, 1, 1, 1, 1, 7, '1,2,3,4,5', 1, 1, '1,2,3,4,5,6,7,8,9,10', NULL, '2015-03-30 16:47:08', '2015-04-03 13:14:04'),
(3, 26, 1, 1, 1, 1, 20, '1,2,3,4,5', 1, 1, '1,4,5,6,7,8', NULL, '2015-03-30 17:48:36', '2015-03-30 17:48:36'),
(4, 27, 1, 1, 1, 1, 20, '1,2,3,4', 1, 1, '1,2,5,6,10', NULL, '2015-03-30 18:18:17', '2015-03-30 18:35:57'),
(5, 28, 1, 1, 1, 1, 15, '1,2,3', 1, 1, '1,2,5,6,7,9,10', NULL, '2015-03-30 18:45:39', '2015-03-30 18:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'English', NULL, '2015-03-18 14:06:15', '2015-03-18 14:06:15'),
(2, 'hindi', NULL, '2015-03-18 15:21:03', '2015-03-18 15:21:03'),
(3, 'gujarati', NULL, '2015-03-18 15:21:05', '2015-03-18 15:21:05'),
(4, 'Spenish', NULL, '2015-03-18 17:52:30', '2015-03-18 17:52:30'),
(5, 'Spanish', NULL, '2015-03-20 00:27:20', '2015-03-20 00:27:20'),
(6, 'Guj', NULL, '2015-03-20 00:27:36', '2015-03-20 00:27:36'),
(7, 'French', NULL, '2015-03-20 18:35:03', '2015-03-20 18:35:03'),
(8, 'bgykbg', NULL, '2015-03-25 19:45:37', '2015-03-25 19:45:37'),
(9, 'Germany', NULL, '2015-03-30 16:48:38', '2015-03-30 16:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `listing_categories`
--

CREATE TABLE IF NOT EXISTS `listing_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('Classified','Deal') COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `listing_categories`
--

INSERT INTO `listing_categories` (`id`, `name`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Fitness', 'Deal', NULL, '2015-03-16 19:45:49', '2015-03-16 19:45:49'),
(2, 'Fitness', 'Classified', NULL, '2015-03-16 19:45:49', '2015-03-16 19:45:49'),
(3, 'Beauty & Spa', 'Deal', NULL, '2015-03-16 19:45:49', '2015-03-16 19:45:49'),
(4, 'Beauty & Spa', 'Classified', NULL, '2015-03-16 19:45:49', '2015-03-16 19:45:49'),
(5, 'Baby & Kids Stuff', 'Deal', NULL, '2015-03-18 18:12:53', '2015-03-18 18:12:53'),
(6, 'Baby & Kids Stuff', 'Classified', NULL, '2015-03-18 18:12:53', '2015-03-18 18:12:53'),
(7, 'Arts & Crafts', 'Deal', NULL, '2015-03-18 18:16:06', '2015-03-18 18:16:06'),
(8, 'Arts & Crafts', 'Classified', NULL, '2015-03-18 18:16:06', '2015-03-18 18:16:06'),
(9, 'Books & Magazines', 'Deal', NULL, '2015-03-18 18:16:32', '2015-03-18 18:16:32'),
(10, 'Books & Magazines', 'Classified', NULL, '2015-03-18 18:16:32', '2015-03-18 18:16:32'),
(11, 'test And Category', 'Deal', '2015-03-24 17:32:25', '2015-03-24 17:31:48', '2015-03-24 17:32:25'),
(12, 'test And Category', 'Classified', '2015-03-24 17:32:04', '2015-03-24 17:31:48', '2015-03-24 17:32:04'),
(13, 'Test import category', 'Deal', '2015-03-24 17:32:21', '2015-03-24 17:31:48', '2015-03-24 17:32:21'),
(14, 'Test import category', 'Classified', '2015-03-24 17:32:10', '2015-03-24 17:31:48', '2015-03-24 17:32:10'),
(15, 'it should work', 'Deal', '2015-03-24 17:32:16', '2015-03-24 17:31:48', '2015-03-24 17:32:16'),
(16, 'test', 'Classified', '2015-04-02 19:27:13', '2015-04-01 14:20:37', '2015-04-02 19:27:13'),
(17, 'Restaurant', 'Deal', '2015-04-02 17:02:33', '2015-04-02 17:02:08', '2015-04-02 17:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_03_07_090456_create_listing_categories_table', 1),
('2015_03_07_093304_create_user_types_table', 1),
('2015_03_07_093611_create_user_usertypes_table', 1),
('2015_03_10_092256_CreatePaymentTable', 1),
('2015_03_10_093338_CreateSubscriptionPlansTable', 1),
('2015_03_10_094154_CreateDealsTable', 1),
('2015_03_10_101019_CreateDealImagesTable', 1),
('2015_03_10_101304_CreateDealVideosTable', 1),
('2015_03_10_101553_CreateClassifiedVideosTable', 1),
('2015_03_10_101603_CreateClassifiedImagesTable', 1),
('2015_03_10_101612_CreateClassifiedsTable', 1),
('2015_03_16_083516_create_languages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('niyati.tps@gmail.com', 'c43619c40f2e51afe8cb427b26059860dc1290ff8c6274aa16cc1f2277985858', '2015-04-01 19:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `subscriber_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscription_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `txn_id`, `user_id`, `subscriber_id`, `subscription_id`, `amount`, `duration`, `post_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, NULL, 4, NULL, 'I-NU97DH3FW54W', '500', '', 'sign_up_Providers', NULL, '2015-04-15 12:38:58', '2015-04-15 12:38:58'),
(4, NULL, 4, NULL, 'I-5APXG5TMB2N4', '500', '', 'sign_up_Providers', NULL, '2015-04-15 12:25:28', '2015-04-15 12:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_type` enum('deal','classified','babysitter') COLLATE utf8_unicode_ci DEFAULT 'classified',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `amount` double(8,2) DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'USD',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `item_id`, `order_id`, `user_id`, `email`, `item_type`, `quantity`, `amount`, `currency`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 5, NULL, 'niyati@gmail.com', 'deal', 2, 30.00, 'USD', '2015-04-07 03:22:10', '2015-04-07 03:22:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE IF NOT EXISTS `shifts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `name`, `time`, `created_at`, `updated_at`) VALUES
(1, 'Early Morning', '(6am - 9am)', '2015-03-25 08:00:06', '2015-03-25 08:00:06'),
(2, 'Late Morning', '(9am - 12pm)', '2015-03-25 08:00:06', '2015-03-25 08:00:06'),
(3, 'Early Afternoon', '(12pm - 3pm)', '2015-03-25 08:00:06', '2015-03-25 08:00:06'),
(4, 'Late Afternoon', '(3pm - 6pm)', '2015-03-25 08:00:06', '2015-03-25 08:00:06'),
(5, 'Early Evening', '(6pm - 9pm)', '2015-03-25 08:00:07', '2015-03-25 08:00:07'),
(6, 'Late Evening', '(9pm - 12am)', '2015-03-25 08:00:07', '2015-03-25 08:00:07'),
(7, 'Overnight', '(12am - 6am)', '2015-03-25 08:00:07', '2015-03-25 08:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `languages_spoken` text COLLATE utf8_unicode_ci,
  `reference_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference_relationship` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference_name2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference_relationship2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `homework_help` text COLLATE utf8_unicode_ci,
  `additional_services` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `languages_spoken`, `reference_name`, `reference_relationship`, `reference_name2`, `reference_relationship2`, `homework_help`, `additional_services`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 18, 'English,Spanish,Hindi', 'Perry Gold', 'Friend', NULL, NULL, '1,2,3,8,10', '1,2,5,7', NULL, '2015-03-30 16:21:35', '2015-03-30 16:21:35'),
(2, 20, 'English,Spenish,Gujarati,hindi,French,Germany', 'Dev D', 'Relative', '', '', '1,2,3,4,5,6,7,8,9,10', '1,2,3,4,5,6,7,8,9', NULL, '2015-03-30 16:49:09', '2015-04-03 13:14:20'),
(3, 26, 'gujarati,English,HIndi,French', 'Abhishek', 'Hubby', 'Nanda', 'Friend', '1,2,3,4,5,6,7,9,10', '1,2,3,5,6,7,8,9', NULL, '2015-03-30 17:50:19', '2015-03-30 17:50:19'),
(4, 27, 'English', 'Sally S', 'Friend', '', '', '1,2,5,6,9', '2,3,6,8', NULL, '2015-03-30 18:37:03', '2015-03-30 18:37:03'),
(5, 28, 'English', 'Perry Gold', 'Friend', 'Nanda', 'Relative', '1,4,5,8', '1,2,4,5,7,8', NULL, '2015-03-30 18:46:41', '2015-03-30 18:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE IF NOT EXISTS `subscription_plans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `role_id` int(11) DEFAULT NULL,
  `paypal_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `name`, `post_type`, `amount`, `duration`, `deleted_at`, `created_at`, `updated_at`, `role_id`, `paypal_id`) VALUES
(1, 'Standard Baby Sitter', 'Monthly', '300', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 'P-7SV49099YF035773HYCKUWBA'),
(2, 'Standard Providers', 'Monthly', '500', NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'P-4CT09048FW963120BYCKSLVA');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('paypal','credit_card','cheque','cash') COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'USD',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `type`, `email`, `txn_id`, `amount`, `currency`, `created_at`, `updated_at`, `deleted_at`, `invoice_number`) VALUES
(5, 'paypal', 'niyati@gmail.com', 'PAY-2EM41881Y42229252KURYXYY', 60.00, 'USD', '2015-04-07 03:22:10', '2015-04-07 03:22:10', NULL, '5522e9b297a13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscriber_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscription_end_at` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_step` int(11) DEFAULT '1',
  `last_logged_in` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `logo`, `subscriber_id`, `subscription_end_at`, `remember_token`, `last_step`, `last_logged_in`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Niyati', 'Sheth', 'niyati.tps@gmail.com', '$2y$10$ZKC0faCeiVxCUCH/N.Yv1e1axq0isDAmQCcVOKcmCgJxlfWe1cn4q', NULL, NULL, NULL, 'aIFUUmh3sKOWRRGbq5efLzEm4Rns4AXzCMqxBkkbnUyrGczbLpK7RAzkEGFj', 1, '2015-04-17 09:21:45', NULL, '2015-03-16 19:45:49', '2015-04-17 03:53:48'),
(2, 'Sagar', 'Rabadiya', 'sagar.tps@gmail.com', '$2y$10$IvmiWI1dXNGWlmGgjM8Ua.7M1M3dGk4YoHvvoYL/mGcA3t1yOYedK', NULL, NULL, '2015-03-29', 'elOSZKUsCTHk91trVwX3G1qQP4VpglEb09xw3VJELDUMUWUA5g1nQo7pbdbY', 1, '2015-03-28 09:05:22', NULL, '2015-03-16 19:45:49', '2015-03-28 15:05:22'),
(3, 'Perry', 'Gold', 'paresh.tps@gmail.com', '$2y$10$Ng1HMvGAgEuE684yLbjsvuy1rlp8k4DhVKffHv7xA7fWfKn9/BMh6', NULL, NULL, '2015-03-23', '', 1, '2015-03-20 11:32:41', NULL, '2015-03-18 12:20:13', '2015-03-20 17:32:41'),
(4, 'Perry', 'Gold', 'pareshgandhi28@gmail.com', '$2y$10$bXFHRoJFtYSwdW3aTVazL.UmbfhYo3u87biq17Cx2P4Zclc31pAYq', NULL, NULL, '2015-04-15', 'pjy0mTALkUGWsyeWvnCgAWJCoiX3cmTtt7LC8SJnr9sYwYyGbPOo3zzarE8d', 1, '2015-04-17 09:45:17', NULL, '2015-03-18 12:32:12', '2015-04-17 04:15:17'),
(6, 'Sagar', 'Likes  Jalsa', 'sam.coolone70@gmail.com', '$2y$10$CJpvlE/Dk8kG3Ey0khKL7OIU83SeAo/wfhmmoFkId9mdgthkKnmWO', NULL, NULL, NULL, '', 1, '2015-03-18 09:46:55', NULL, '2015-03-18 15:38:41', '2015-03-18 15:46:55'),
(31, 'Marry', 'Poppins', 'divyang@tpswork.com', '$2y$10$ROPZ1JsOXgfbYYP8pwzz2.de64FYZjm5ydZ3lQZcFaS7Y6IA8sfoe', NULL, NULL, '2015-04-07', 'q2yrq7HGXo5103aJlxUYC5rAbKSEQxhyt1Vhr8CD7NgXuuxCHFxlUotpyyJo', 2, '2015-04-06 07:57:07', NULL, '2015-04-04 16:49:25', '2015-04-06 13:57:12'),
(8, 'Divyange', 'H', 'divyang.tps@gmail.com', '$2y$10$hmf9sbTGHeuF8fz6u22IzOfbiZcjNUaVveylQoN1B1kVDruZtDoty', NULL, NULL, '2015-04-05', 'tF7sTihjSx9ZukAeJT3raXG1bqgBx4XV3t9s5dnEPfztMGIHLhz8Cjs6655x', 1, '2015-04-15 18:17:04', NULL, '2015-03-18 17:30:29', '2015-04-15 12:49:13'),
(9, 'Dev', 'D', 'divyang@gmail.com', '$2y$10$7zwCPGBQ3loyu3KGzdkS/eoKyRVmaWm3kJRObZ7tK5wluDiT6EyU.', NULL, NULL, '2015-03-21', '', 1, '2015-03-18 11:45:51', NULL, '2015-03-18 17:38:04', '2015-03-18 17:45:51'),
(10, 'Perry', 'Gold', 'perry@test.com', '$2y$10$l6EbxQECZ8O0T0PHZIjWKe742iklg.3hXERewGC3m3J0hFC34lxHS', NULL, NULL, '2015-05-02', 'iiVEQpe0ayHWZCP0Hj47kSmnBxo34RW56piM2nPvOQICEZnkN67n90o1MlG8', 1, '2015-04-29 11:00:00', NULL, '2015-03-18 19:01:02', '2015-04-29 05:33:58'),
(11, 'Perry', 'Gold', 'perrygold@test.com', '$2y$10$/LbFnNq8H3VRQ.xer4FDzu5eKkGF.YVppB9B2751VFaSQofSt3Tbu', NULL, NULL, '2015-03-23', '2xfznTf69F5vBvPFLUXk74ZpaXzKptcMQ1Jc6QGNDVUSIQYRDKYHhUZmAcgh', 1, '2015-04-29 10:26:28', NULL, '2015-03-20 17:13:12', '2015-04-29 04:56:38'),
(12, 'Dev', 'Kumar', 'paresh@tpswork.com', '$2y$10$vv8doVhRlGH7C/2rqZEMaupV/nH7KtUphRlxqXpS.pdwYVVgPGTAa', NULL, NULL, '2015-04-05', '5wiBXFQucjQ71lvqYvmjdYEzqPRRYLvWJ2zzP9YqLpZLQfKQAMlNUxYDN7Fe', 1, '2015-04-02 13:41:29', NULL, '2015-03-24 17:44:58', '2015-04-02 19:41:40'),
(13, 'Niyati', 'Sheth', 'niyati@techplussoftware.com', '$2y$10$Ygg6zBQ8MBc1OZ/FAsCRnurPI84G8i3d7J0yqYsPOp.7yDWzvtjWG', NULL, NULL, NULL, '', 1, '2015-03-25 13:42:31', NULL, '2015-03-25 19:42:14', '2015-03-25 19:42:31'),
(14, 'Shivangi', 'Sheth', 'niyatisheth99@gmail.com', '$2y$10$9cWUjoxojEDVTbLlP5XamOLmytj2YACeXROlRlYNWbcA57Ytg79ve', NULL, NULL, '2015-03-28', '', 1, '2015-03-25 13:43:43', NULL, '2015-03-25 19:43:07', '2015-03-25 19:43:43'),
(15, 'Niyati', 'Sheth', 'niyaticeth199@yahoo.com', '$2y$10$owMC1nGEIGNFKBvOHWumdOF0ShL7siyUIKXXn.sSN3RvooFSW/z2e', NULL, NULL, '2015-03-28', '', 1, '2015-03-25 13:46:01', '2015-04-03 14:54:45', '2015-03-25 19:44:53', '2015-04-03 14:54:45'),
(16, 'dhara', 'patel', 'pooja.tps@gmail.com', '$2y$10$UcF.kKlk.3sJI1tVpvVKcuzoI4UseKy08srLLTwCU/MZ9hQ5X4eVa', NULL, NULL, '2015-03-29', '', 1, '2015-03-26 13:57:36', NULL, '2015-03-26 19:52:14', '2015-03-26 19:57:36'),
(18, 'Molly', 'MacGregor', 'divyange@tpswork.com', '$2y$10$JzkFcBC0vbxNcR9NTVtYs.YRZAEI2txMeUBRbQhkDIAL2UJJNszKS', NULL, NULL, '2015-04-02', 'e0St7IzRAmZ6Dv1Kl3gkr7OLNWpMygX6apGOes6H1LBDsk010QEmYUBiBdSf', 6, '2015-04-15 18:20:13', NULL, '2015-03-30 16:09:22', '2015-04-15 12:50:13'),
(30, 'Bhaumik', '  Work', 'bhaumikwork@gmail.com', '$2y$10$DfEiJ3FcN3fAsyqvdgyhp.3e28gLSj0stJA5pUNc5b0IIue2dZiIS', NULL, NULL, '2015-04-04', 'ZlIWqnpjVC10sBVvo8GcftaK1LWyEqUR64KO2LhSqkkhnebmn6MoX5oIXhv6', 1, '2015-04-01 09:55:32', NULL, '2015-04-01 15:53:43', '2015-04-01 15:55:46'),
(20, 'Chelsea', 'Rae Kravitz', 'divyange.tps@gmail.com', '$2y$10$bpsxX5mUjHcYygrCHw4Vw.fy0GPTdiy5luAM9Pmxadeho3AFUAlx2', NULL, NULL, '2015-04-05', '7iRZsMwvJ1iQzNMJ5U6BJmXF3hxIzTAmK7ynSBYDWlFBGTsR6mdDVn9AG3as', 6, '2015-04-03 07:02:22', NULL, '2015-03-30 16:24:21', '2015-04-03 13:24:22'),
(25, 'Aishwarya', 'Rai', 'hem@vprex.com', '$2y$10$W0I2sdIObc2BrTQPUkKtvuo9t4Ui3ahz/Rvfh5kuXXsqUDUrFSa6C', NULL, NULL, '2015-04-02', 'cg9RCN82OfYsgqzu5esGpTCl0lVDv1ru8qZxp0rVBMt7OZvfeeN2aYn3ae8B', 1, '2015-04-15 18:19:21', NULL, '2015-03-30 17:41:51', '2015-04-15 12:49:49'),
(26, 'Aishwarya', 'Rai', 'jigar@tpswork.com', '$2y$10$NAUIIqeXKvMvtZZzzWE.deVQuvDp4r0WS/DGUHuSt8Fn8/iSXU3Tm', NULL, NULL, '2015-04-02', '706OZEfPeM1ma5G61f6AAPpCBguzvXUS3jMXmIYIUCYJo2sl86VybzHy98EJ', 6, '2015-03-30 11:43:54', NULL, '2015-03-30 17:43:54', '2015-03-30 18:11:31'),
(27, 'Lauren', 'Vertrees', 'jigar.tps@gmail.com', '$2y$10$OK4Q50qB1T3JLjOGUJXlO.Hk0yVJ9yk.WnaVTsR0bLbLqTRhfZoAa', NULL, NULL, '2015-04-02', 'MXKbRnvy4wl8M0vWb8Lzig1LhFCXGAuAH8QYJpdGmqxH8elrFOY50PPSPSoI', 6, '2015-03-30 12:12:35', NULL, '2015-03-30 18:12:35', '2015-03-30 18:42:03'),
(28, 'Morgan', 'E', 'jay@tpswork.com', '$2y$10$SY6TGCavzqmOokR6d1jksOyAOpug7S5JDHx7fY2BGWD8U63UXEYOW', NULL, NULL, '2015-04-02', 'jtJcQ9Rkua5d58JEJpVloh7L1qb29LGHaHejjLFig84jag88wdybF9XlvqSx', 6, '2015-03-30 12:43:06', NULL, '2015-03-30 18:43:06', '2015-03-30 18:52:14'),
(29, 'Stephen', '  Fairchild', 'fstephen@live.com', '$2y$10$lXDL8EX4h5nIYV4prIh4KuTKfFdCLbcaQ3IJQ7e8oeE.hdVnRrna.', NULL, NULL, NULL, 'VgL4TbxXLZixKqxWK3QzrVfB6kSjCrDseXp6TNFaLaIRMBnSku8PsrPmxzkP', 1, '2015-03-31 18:54:42', NULL, '2015-04-01 00:54:33', '2015-04-29 05:43:51'),
(32, 'Hemali', '  Bhaumik', 'it_hemali@yahoo.com', '$2y$10$Awijx4FRvH4vY/xzmZlV7uYsH4GCIhjPbDmNkGP1zwBpt063FjCZ.', NULL, NULL, '2015-04-09', 'hQJxAXLe0pVcR7pLQlu4aUYpUG9w0ujGPE4Q1m3hbM0cxzBKI9ezVqP4ixUh', 1, '2015-04-06 09:59:39', NULL, '2015-04-06 15:59:03', '2015-04-06 16:00:59'),
(34, 'sagar', 'rabadiya', 'sam.coolone70@gmail.com1', '$2y$10$/LbFnNq8H3VRQ.xer4FDzu5eKkGF.YVppB9B2751VFaSQofSt3Tbu', NULL, NULL, NULL, 'j40gtm45q8j7iRXr0tMYiIXHYCyLdRQy8qpfpAmvz5uNgHxsEW55mmp84PnO', 1, '2015-04-29 10:27:17', NULL, '2015-04-17 03:28:52', '2015-04-29 04:57:17'),
(35, 'jigar', 'patel', 'jigar.tps1@gmail.com', '$2y$10$OhUOvg4jazHMeFxLUVgfqOxm6OeHA07BbgW8oQ9WQ9NJSUoc3xfaK', NULL, NULL, '2015-05-02', '84UZLJFlYVcqnnsFy9MqSowOTscdhwdeVQtIc8Gu2Tcgcw42yyAbnbItrPST', 1, '2015-04-29 11:24:32', NULL, '2015-04-29 05:15:10', '2015-04-29 05:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', NULL, '2015-03-16 19:45:49', '2015-03-16 19:45:49'),
(2, 'Providers', NULL, '2015-03-16 19:45:49', '2015-03-16 19:45:49'),
(3, 'BabySitters', NULL, '2015-03-16 19:45:49', '2015-03-16 19:45:49'),
(4, 'SalesAgent', NULL, '2015-03-16 19:45:49', '2015-03-16 19:45:49'),
(5, 'Admin', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_usertypes`
--

CREATE TABLE IF NOT EXISTS `user_usertypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `user_type_id` int(11) DEFAULT '0',
  `subscription_plan_id` int(11) NOT NULL DEFAULT '0',
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `duration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `has_paid` tinyint(1) DEFAULT '0',
  `refferal_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_step` int(11) DEFAULT '1',
  `is_approved_by_admin` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Dumping data for table `user_usertypes`
--

INSERT INTO `user_usertypes` (`id`, `user_id`, `user_type_id`, `subscription_plan_id`, `amount`, `duration`, `has_paid`, `refferal_code`, `last_step`, `is_approved_by_admin`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 2, 1, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 8, 4, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 9, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 10, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 11, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 12, 4, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 13, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 14, 4, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 15, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 16, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 30, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 18, 3, 0, 0.00, NULL, 0, NULL, 6, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 25, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 20, 3, 0, 0.00, NULL, 0, NULL, 6, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 26, 3, 0, 0.00, NULL, 0, NULL, 6, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 27, 3, 0, 0.00, NULL, 0, NULL, 6, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 28, 3, 0, 0.00, NULL, 0, NULL, 6, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 29, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 31, 3, 0, 0.00, NULL, 0, NULL, 2, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 32, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 34, 5, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 35, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
