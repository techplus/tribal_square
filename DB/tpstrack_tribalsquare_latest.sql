-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2015 at 04:08 AM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tpstrack_tribalsquare`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
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
  `nationality` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `address`, `street`, `city`, `state`, `country`, `pin`, `phone`, `display_phone_on_profile`, `birthdate`, `gender`, `profile_pic`, `nationality`, `religion`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 18, '21 Hanover Walk', 'New York Street', 'New York', 'NY', 'USA', '38051', '9898752288', 1, '1982-10-10', 'Male', '45292310_scaled_254x247.jpg', '1', '1', NULL, '2015-03-30 16:11:37', '2015-03-30 16:16:00'),
(2, 20, 'New York Street,', 'United States Botanic Garden, Maryland Avenue Southwest,', 'Washington', 'DC', 'United States', '37051', '1234567890', 1, '1994-06-06', 'Female', 'Chelsea-Kane.jpg', '2', '2', NULL, '2015-03-30 16:28:39', '2015-04-09 17:24:13'),
(3, 26, '26 Chantry Court', 'Nr. ASDA', 'New Jersey', 'NJ', 'USA', '566456', '85858585', 1, '1983-03-03', 'Female', 'Rai.jpg', '1', '1', NULL, '2015-03-30 17:44:54', '2015-04-17 00:43:28'),
(4, 27, 'Jivraj Part, Vejalpur', 'Shaivali Appartment', 'Ahmedabad', 'Gujarat', 'India', '380051', '55555555555', 1, '1984-01-08', 'Female', 'photo.jpg', '', '', NULL, '2015-03-30 18:13:37', '2015-03-30 18:16:54'),
(5, 28, 'Arlington', 'New York Street,', 'Arlington', 'New York', 'USA', '12345', '111111111', 1, '1982-02-05', 'Female', 'Morgan E.jpg', '', '', NULL, '2015-03-30 18:43:53', '2015-03-30 18:44:16'),
(6, 31, 'Montreal Seeks', '1 New York Street', 'New York', 'NY', 'USA', '35124', NULL, 0, NULL, NULL, NULL, '', '', NULL, '2015-04-04 16:58:23', '2015-04-06 13:57:12'),
(7, 49, '9999 utonkom', 'utonkimm', 'vidalia', 'Georgia', 'United States', 'jaja', '9999999', 1, '1970-01-01', 'Male', NULL, '', '', NULL, '2015-04-17 08:57:43', '2015-04-17 08:57:56'),
(8, 76, 'USA', '104, Devaraj Mall, Opp. Haveli, India Colony Road, Thakkarbapa Nagar,', 'Ahmedabad', 'Gujarat', 'United State', '35421', '555555555', 1, '1989-04-15', 'Female', '14276710_HrlMbJnLk7rbCnhfDcGWFw5qIgwU.jpg', '1', '1', NULL, '2015-05-15 19:20:24', '2015-05-15 19:21:11'),
(9, 86, 'Diabetes South Africa, Kimberley, Kimberley, Northern Cape, South Africa', '15 high street, 1st row,', 'Kimberley', 'Northern Cape', 'South Africa', '454445', '5445445444', 1, '1985-02-15', 'Female', 'scarlett_johansson.jpg', '1', '1', NULL, '2015-05-18 19:49:25', '2015-05-18 19:49:57'),
(10, 132, 'Panama City', '5551 N. Lagoon Drive', 'Florida', 'FL', 'United States', '32408', '56565455444', 1, '1982-01-08', 'Female', 'Babysitter_drum.jpg', '2', '', NULL, '2015-05-30 19:21:00', '2015-05-30 19:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `agent_earnings`
--

DROP TABLE IF EXISTS `agent_earnings`;
CREATE TABLE IF NOT EXISTS `agent_earnings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_id` int(11) DEFAULT '0',
  `buyer_id` varchar(255) DEFAULT NULL,
  `deal_id` int(11) DEFAULT '0',
  `actual_purchase_price` float DEFAULT '0',
  `commission_rate` float DEFAULT '0',
  `amount_earned` float DEFAULT '0',
  `has_paid_out` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `agent_earnings`
--

INSERT INTO `agent_earnings` (`id`, `agent_id`, `buyer_id`, `deal_id`, `actual_purchase_price`, `commission_rate`, `amount_earned`, `has_paid_out`, `created_at`, `updated_at`) VALUES
(1, 89, '13', 50, 20, 10, 2, 0, '2015-05-21 16:15:27', '2015-05-21 16:15:27'),
(2, 101, '14', 55, 34, 10, 3.4, 1, '2015-04-21 16:31:06', '2015-05-22 21:22:43'),
(3, 101, '14', 57, 70, 10, 7, 1, '2015-04-21 16:31:06', '2015-05-22 21:22:43'),
(4, 81, '14', 56, 30, 10, 3, 0, '2015-05-21 16:31:06', '2015-05-21 16:31:06'),
(5, 82, '15', 50, 20, 10, 2, 0, '2015-05-21 17:54:31', '2015-05-21 17:54:31'),
(6, 101, '15', 56, 30, 10, 3, 0, '2015-05-21 17:54:31', '2015-05-21 17:54:31'),
(7, 101, '16', 54, 30, 10, 3, 0, '2015-05-21 17:55:08', '2015-05-21 17:55:08'),
(8, 101, '17', 50, 20, 10, 2, 0, '2015-05-21 17:55:42', '2015-05-21 17:55:42'),
(9, 101, '18', 54, 30, 10, 3, 0, '2015-05-21 17:56:42', '2015-05-21 17:56:42'),
(11, 101, '19', 56, 30, 10, 3, 0, '2015-05-30 16:07:01', '2015-05-30 16:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `availabilities`
--

DROP TABLE IF EXISTS `availabilities`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `availabilities`
--

INSERT INTO `availabilities` (`id`, `user_id`, `available_on_short_notice`, `available_to_provide_daytime_care_during_summer_months`, `available_before_school_care`, `available_after_school_care`, `schedule_valid_until`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 18, 1, 1, 1, 1, '2015-06-17', NULL, '2015-03-30 16:20:02', '2015-03-30 16:20:02'),
(2, 20, 1, 1, 1, 1, '2015-07-22', NULL, '2015-03-30 16:47:53', '2015-04-09 17:27:33'),
(3, 26, 1, 1, 1, 1, '2015-11-25', NULL, '2015-03-30 17:49:14', '2015-03-30 17:49:14'),
(4, 27, 1, 1, 1, 1, '2015-11-11', NULL, '2015-03-30 18:36:29', '2015-03-30 18:36:29'),
(5, 28, 1, 1, 1, 1, '2015-06-24', NULL, '2015-03-30 18:46:06', '2015-03-30 18:46:06'),
(6, 49, 0, 0, 0, 0, '2015-12-24', NULL, '2015-04-17 08:59:10', '2015-04-17 08:59:10'),
(7, 76, 1, 0, 1, 0, '2015-12-31', NULL, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(8, 86, 1, 0, 1, 0, '2016-05-18', NULL, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(9, 132, 1, 1, 1, 1, '2017-07-18', NULL, '2015-05-30 19:28:56', '2015-05-30 19:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `bios`
--

DROP TABLE IF EXISTS `bios`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `bios`
--

INSERT INTO `bios` (`id`, `user_id`, `title`, `experience`, `have_own_car`, `comfortable_with_pets`, `do_smoke`, `average_rate_from`, `average_rate_to`, `increase_rate_for_each_child`, `miles_from_home`, `no_of_childrens_comfortable_with`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 18, 'Years of Childcare Experience: 18', 'I love working with children; their inquisitive attitudes and loads of energy make them a joy to be around. I am responsible and dependable, but also fun and energetic. I’m 30 years old and originally from Cape Cod, Massachusetts. I studied Child Development as part of my Brown University education and have up-to-date CPR and First Aid certifications. With me, your children will have fun, playing and learning rather than just sitting in front of a television set. I have 18 years of experience, even babysitting for one Cape Cod family for over 10 years. I have experience and am comfortable with newborns to young teens; my specialty is toddlers to age six.  My hobbies include yoga, skiing, Mt. biking, and reading.', 1, 1, 0, 15.00, 20.00, 10.00, 10, 3, NULL, '2015-03-30 16:17:15', '2015-03-30 16:17:15'),
(2, 20, 'Babysitter in Winnetka Seeks Babysitter Job. Carolyn''s Babysitter Profile 2028422', 'My passion for being around children began when I worked as a counselor at the world renowned Santa Barbara Zoo. As a counselor I was responsible for creating and implementing daily agendas for up to 20 children. I worked as a mentor, leader and personal guide for over 150 children throughout the summer. I also implemented and taught education and arts and crafts. Bonding and mentoring with the children led me to nanny positions at the end of summer with a few families of young boys and girls. I carpooled them to and from the zoo for many weeks. Also daily planned play dates and "day adventures" where we traveled to the beach, amusement parks, community parks and pools, etc. \r\n\r\nMy excellent work and dedication to the Zoo led me to my next position. The Advisor of Teen Volunteers. Where I direct and managed more than 50 teen volunteers daily, trained more than 250 teen volunteers in safety and leadership, coordinated overnight events for 50 teen volunteers, as well as work as a mentor, director and counselor for the approximate 250 teenagers. I absolutely loved managing, working and even more mentoring the teen volunteers for my last two summers. \r\n\r\nMy passion for children led me into an internship with Big Brothers Big Sisters of Butte County. Where I assisted the BBBS event coordinator in marketing, PR and event planning. Communicated with sponsors, donors and volunteers and participated in interviewing, meetings and company events. My love and compassion for children is what drove me behind my hard work as the Event Coordinator Assistant Intern.\r\n\r\nI moved to Tahoe City in November 2010 and got a job at the Boys & Girls Club of North Lake Tahoe where I was a Kinder Care Assistant. I cared for up to 50 kindergartners everyday. I taught, played and challenged there minds and bodies. I fell in love with Tahoe and the Kinders'' and am hoping to use my experience with children in the Tahoe area.\r\n\r\nAfter a few months at the Boys & Girls Club of North Lake Tahoe I got a promotion to Teen Manager. I manage the Teen Center and about 40 teenagers a day. I plan programs, daily activities, field trips and fundraisers. I teach, mentor and lead teens daily with hopes to change there lives.', 1, 1, 1, 8.00, 16.00, 5.00, 20, 5, NULL, '2015-03-30 16:46:37', '2015-04-09 17:27:24'),
(3, 26, 'Years Experience: 20', 'I am a compassionate, loving, go with the flow woman who adores children, yet can be firm at times if required. I have two children of my own ages 11 and 13, and seem to attract the angel eyes of little kids. I enjoy bringing my love of art, dance, outdoors, healthy foods, Steiner style learning and exploration to children. Interactive choices and empowering others to be confident in their own freewill while still being respectful and honoring of those around them is key.  I love the opportunity to get messy, loud and energetic with children… and we clean up afterward, knowing that we had a good, full day. I have traveled to 14 different countries and many US states. and gained an appreciation for different cultures and am confident with challenging situations. \r\n\r\nVolunteer: Rotary Club of Truckee where I also served as a Board Member for 1 year Art Bridge - NSW, Australia, offering weekly art to people with disabilities Turtle Conservation Project - connecting with marine life via Transformation of Hearts through Art Habitat for Humanity - building and painting houses in Mexico with K&A Compassionate Communication Mediation Grief Counseling through Self Responsibility', 1, 1, 1, 20.00, 25.00, 15.00, 50, 9, NULL, '2015-03-30 17:47:02', '2015-03-30 17:47:02'),
(4, 27, 'Years Experience: 20', 'Hi! My name is Lauren and I am a 22 year old recent graduate from UC Davis. I was born and raised in Southern California but currently live in Incline Village. I have been working with children in a variety of settings for over 10 years. Teaching children is my passion. I am currently working at Northstar California Resort as a Children''s Ski Instructor. Previous to this experience, I worked with children in numerous settings, such as babysitting, coaching, and classroom teaching. I have coached cheer leading, skiing, and swimming and worked at a preschool as a substitute teacher as well as at an elementary school as a teacher''s assistant. I am in the process of selecting a graduate school where I will go to obtain a master''s degree in education in hopes of becoming an elementary school teacher. In my free time I enjoy cooking, skiing, doing yoga, and being around people.  Spending time with children is the only work I have encountered in my life that has nto felt like work to me.', 1, 1, 1, 12.00, 18.00, 8.00, 30, 6, NULL, '2015-03-30 18:17:59', '2015-03-30 18:17:59'),
(5, 28, '19 year old babysitter', 'I have watched many children for over three years. I have babysat. I have watched and cared for many ages from about newborn to about 11 years old. I helped some with homework, and I have done a few activities with some. I have two twin girl cousins that I have watched until they moved away. I love kids, and I do have a passion for watching and caring for them. I used to work at a daycare with infants also!', 1, 1, 1, 15.00, 20.00, 10.00, 20, 6, NULL, '2015-03-30 18:44:59', '2015-03-30 18:44:59'),
(6, 49, 'yyayyaya', 'yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', 1, 1, 1, 10.00, 10.00, 10.00, 100, 1, NULL, '2015-04-17 08:58:39', '2015-04-17 08:58:39'),
(7, 76, 'Full-time, 21 year old babysitter from Arlington, 7 years of experience and a background', 'I began at the age of 12 as a sitter for several families in my neighborhood. I have volunteered in my church nursery for ages 6 months old-8 years old for 5 years. I currently volunteer at LeBonheur Children''s Hospital as a unit buddy for all ages. I have worked with all ages, in all environments, with varying group numbers. I am currently studying to become a certified Child Life Specialist. I have a great imagination and I have pride myself in the ability to take a child''s perspective on life, which helps me communicate and form relationships with each child that I work with.', 1, 1, 1, 15.00, 25.00, 10.00, 25, 5, NULL, '2015-05-15 19:22:23', '2015-05-15 19:22:23'),
(8, 86, 'I''m a hard worker and I love interacting with people!', 'Hi my name is Nomathemba I''m care worker married with two kids, I love working with children I''m a loving person and a hard worker! I would be great fully if I can get an opportunity to work for any of the families!\r\nThank you!', 1, 1, 1, 20.00, 35.00, 25.00, 50, 6, NULL, '2015-05-18 19:50:48', '2015-05-18 19:50:48'),
(9, 132, 'Trustworthy and AVAIABLE to help', 'I have a one year old son I need a babysitter I can trust. You would have to come to my home to watch him. You don''t have to cook iI will cook before I leave you just have to feel him. I can pay up to $200 a week.', 1, 1, 0, 35.00, 60.00, 20.00, 30, 6, NULL, '2015-05-30 19:27:31', '2015-05-30 19:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `classifieds`
--

DROP TABLE IF EXISTS `classifieds`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `classifieds`
--

INSERT INTO `classifieds` (`id`, `title`, `price`, `user_id`, `category_id`, `description`, `condition`, `manufacture`, `model_number`, `size`, `fineprint`, `location`, `location2`, `street1`, `street2`, `state`, `city`, `country`, `pin`, `lat`, `long`, `website`, `phone`, `mobile`, `email`, `contact_name`, `can_phone`, `can_text`, `avail_for_other_services`, `languages`, `is_approved_by_admin`, `language_spoken`, `deleted_at`, `created_at`, `updated_at`) VALUES
(27, 'The variety of African food available can be overwhelming - Momo Restaurant', 50.00, 4, 39, '<div style="text-align: justify;">London’s most glamorous Moroccan restaurant, with sexy Marrakech-style interiors, a seductive buzz, great starters and tagines, and near-perfect couscous.<br><br>Still London’s most glamorous Moroccan restaurant, Momo attracts a fair smattering of beautiful people alongside couples on special dates, hen parties and business types. The soundtrack of classic Maghrebi beats and attractive young francophone waiting staff create a seductive buzz. Sexy Marrakech-style interiors, sparkling with light from intricately latticed mashrabiya-style windows and ornate metalwork lanterns, add to the allure. Tables are small and tightly packed, but somehow this rarely seems an imposition.<br><br>Enjoy deliciously light, carefully crafted starters such as juicy prawns wrapped in crispy shredded kataifi pastry with a sour-sweet mango and tomato salsa, or scrumptious pan-fried scallops with a piquant salsa verde, before moving on to Moroccan classics such as lamb tagine with pears and prunes. But the main attraction has to be the near-perfect couscous: silky fine grains served with vegetables in a light cumin-scented broth, with tender, juicy chicken, plump golden raisins, chickpeas and harissa – all served separately so you can mix them as you please.<br><br>Such delights coupled with a pricey wine list result in a hefty bill, so Momo needs to iron out the galling little niggles such as the shabby dark toilets and the occasionally inattentive service.<br></div>', 'Excellent', 'Momo', '123', '', '<div style="text-align: justify;">Open everyday from 11am (10am on week ends) Lunch served noon-2.30pm Mon-Fri. Afternoon tea served 12.30-5.30pm. Dinner served 6.30-11.30pm daily. Brunch Sat and Sun from 11.30am to 3pm.<br><br>Main courses £17.50-£28. Set lunch £15.50 2 courses, £19.50 3 courses. Set dinner £45-£55 3 courses incl cocktail<br></div>', '25 Heddon St, Mayfair, London W1B 4BH, UK', '25 Heddon Street, London, United Kingdom', 'Momo', '', '', 'London', 'United Kingdom', 'W1B 4BH', '', '', NULL, '1234567890', NULL, 'pareshgandhi28@gmail.com', 'Perry Gold', 1, 1, 1, NULL, 2, 'African,English,Spanish', '0000-00-00 00:00:00', '2015-05-26 17:06:45', '2015-05-26 17:10:31'),
(28, 'The variety of African food available can be overwhelming - Momo Restaurant', 50.00, 4, 39, '<div style="text-align: justify;">London’s most glamorous Moroccan restaurant, with sexy Marrakech-style interiors, a seductive buzz, great starters and tagines, and near-perfect couscous.<br><br>Still London’s most glamorous Moroccan restaurant, Momo attracts a fair smattering of beautiful people alongside couples on special dates, hen parties and business types. The soundtrack of classic Maghrebi beats and attractive young francophone waiting staff create a seductive buzz. Sexy Marrakech-style interiors, sparkling with light from intricately latticed mashrabiya-style windows and ornate metalwork lanterns, add to the allure. Tables are small and tightly packed, but somehow this rarely seems an imposition.<br><br>Enjoy deliciously light, carefully crafted starters such as juicy prawns wrapped in crispy shredded kataifi pastry with a sour-sweet mango and tomato salsa, or scrumptious pan-fried scallops with a piquant salsa verde, before moving on to Moroccan classics such as lamb tagine with pears and prunes. But the main attraction has to be the near-perfect couscous: silky fine grains served with vegetables in a light cumin-scented broth, with tender, juicy chicken, plump golden raisins, chickpeas and harissa – all served separately so you can mix them as you please.<br><br>Such delights coupled with a pricey wine list result in a hefty bill, so Momo needs to iron out the galling little niggles such as the shabby dark toilets and the occasionally inattentive service.<br></div>', 'Excellent', 'Momo', '123', '', '<div style="text-align: justify;">Open everyday from 11am (10am on week ends) Lunch served noon-2.30pm Mon-Fri. Afternoon tea served 12.30-5.30pm. Dinner served 6.30-11.30pm daily. Brunch Sat and Sun from 11.30am to 3pm.<br><br>Main courses £17.50-£28. Set lunch £15.50 2 courses, £19.50 3 courses. Set dinner £45-£55 3 courses incl cocktail<br></div>', '25 Heddon St, Mayfair, London W1B 4BH, UK', '25 Heddon Street, London, United Kingdom', 'Momo', '', '', 'London', 'United Kingdom', 'W1B 4BH', '', '', NULL, '1234567890', NULL, 'pareshgandhi28@gmail.com', 'Perry Gold', 1, 1, 1, NULL, 2, 'African,English,Spanish', '0000-00-00 00:00:00', '2015-05-26 17:06:45', '2015-05-26 17:10:31'),
(29, 'Awash Ethiopian Restaurant', 80.00, 4, 39, '<div style="text-align: justify;">Awash Ethiopian Restaurant opened its Amsterdam location in the fall of 1994 and has since been dedicated to providing its patrons with the finest Ethiopian cuisine.<br><br>Awash is named after a major river in Ethiopia that functions as one of the Blue Nile''s tributaries.<br><br>Our east village location opened in September 2004 and provides traditional seating to give a true Ethiopian dining experience. Our Brooklyn location opened in May 2012.</div>', 'Good', 'Awash', 'Awash1', '', '<span style="text-decoration: underline;">Uptown</span><br><br>947 Amsterdam Ave<br>New York, NY 10025<br>1-212-961-1416<br>between W 106th &amp; W 107th St<br>All Week: 12:00 pm - 11:00 pm<br><br><span style="text-decoration: underline;">Downtown</span><br><br>338 E 6th St<br>New York, NY 10003<br>1-212-982-9589<br>between 1st Ave &amp; 2nd Ave<br>Mon - Thu: 4:00 pm - 11:00 pm<br>Fri: 1:00 pm - 11:00 pm<br>Sat &amp; Sun: 12:00 pm - 11:00 pm<br>', '242 Court St, Brooklyn, NY 11201, USA', '242 Court St, Brooklyn, NY, United States', '242', 'Court St', 'NY', '', 'United States', '11201', '40.6857884', '-73.99457089999999', NULL, '234234234234', NULL, 'pareshgandhi28@gmail.com', 'Mike G', 1, 1, NULL, NULL, 1, 'African,English,Chinese', NULL, '2015-05-26 19:31:08', '2015-05-26 19:36:44'),
(30, 'test', 2.00, 117, 39, 'sadsadas', 'Good', '213', '12312', '3123', '123123', 'New Delhi, Delhi, India', 'Via Antonio Gramsci, 123123, Viddalba, Sassari, Italy', '123123', 'Via Antonio Gramsci', 'Sardegna', 'Viddalba', 'Italy', '07030', '40.9164699', '8.893327', NULL, '9426413898', NULL, 'bhaumikgadani@gmail.com', '', 1, 0, NULL, NULL, 0, '', NULL, '2015-05-29 13:49:06', '2015-05-29 13:49:28'),
(31, 'test1', 12.00, 117, 39, 'test', 'Good', 'test', 'test', 'test', 'st', 'Nedumangad, Kerala, India', 'Ahmedabad, Gujarat, India', '', '', 'GJ', 'Ahmedabad', 'India', '', '23.022505', '72.57136209999999', NULL, '', NULL, 'bhaumikgadani@gmail.com', '', 0, 0, NULL, NULL, 0, 'English', NULL, '2015-05-29 13:53:00', '2015-05-29 13:53:42'),
(32, 'dfds', 123.00, 4, 39, '<p>sdf</p>', 'Good', '2q3213', '3123', '3123', '3123123', 'Assandh, Haryana 132039, India', 'Ahmedabad, Gujarat, India', '', '', 'GJ', 'Ahmedabad', 'India', '', '23.022505', '72.57136209999999', NULL, '', NULL, 'sdasd', '', 0, 0, NULL, NULL, 0, 'English', NULL, '2015-05-29 17:04:27', '2015-05-29 17:05:16'),
(33, 'African Restaurant USA', 80.00, 4, 39, 'Awash Ethiopian Restaurant opened its Amsterdam location in the fall of 1994 and has since been dedicated to providing its patrons with the finest Ethiopian cuisine.<br><br>Awash is named after a major river in Ethiopia that functions as one of the Blue Nile''s tributaries.<br><br>Our east village location opened in September 2004 and provides traditional seating to give a true Ethiopian dining experience. Our Brooklyn location opened in May 2012.', 'Average', 'African', 'arusa', '', 'Uptown<br><br>947 Amsterdam Ave<br>New York, NY 10025<br>1-212-961-1416<br>between W 106th &amp; W 107th St<br>All Week: 12:00 pm - 11:00 pm<br><br>Downtown<br><br>338 E 6th St<br>New York, NY 10003<br>1-212-982-9589<br>between 1st Ave &amp; 2nd Ave<br>Mon - Thu: 4:00 pm - 11:00 pm<br>Fri: 1:00 pm - 11:00 pm<br>Sat &amp; Sun: 12:00 pm - 11:00 pm', 'New York Ave NW, Washington, DC, USA', 'New York Avenue Northwest, Washington, DC, United States', 'African', '', 'DC', 'Washington', 'United States', '', '', '', NULL, '34234242342342', NULL, 'pareshgandhi28@gmail.com', 'Sagar R', 1, 1, 1, NULL, 1, 'African,English', NULL, '2015-05-29 20:08:21', '2015-06-02 15:04:57'),
(25, 'The variety of African food available can be overwhelming - Momo Restaurant', 50.00, 4, 39, '<div style="text-align: justify;">London’s most glamorous Moroccan restaurant, with sexy Marrakech-style interiors, a seductive buzz, great starters and tagines, and near-perfect couscous.<br><br>Still London’s most glamorous Moroccan restaurant, Momo attracts a fair smattering of beautiful people alongside couples on special dates, hen parties and business types. The soundtrack of classic Maghrebi beats and attractive young francophone waiting staff create a seductive buzz. Sexy Marrakech-style interiors, sparkling with light from intricately latticed mashrabiya-style windows and ornate metalwork lanterns, add to the allure. Tables are small and tightly packed, but somehow this rarely seems an imposition.<br><br>Enjoy deliciously light, carefully crafted starters such as juicy prawns wrapped in crispy shredded kataifi pastry with a sour-sweet mango and tomato salsa, or scrumptious pan-fried scallops with a piquant salsa verde, before moving on to Moroccan classics such as lamb tagine with pears and prunes. But the main attraction has to be the near-perfect couscous: silky fine grains served with vegetables in a light cumin-scented broth, with tender, juicy chicken, plump golden raisins, chickpeas and harissa – all served separately so you can mix them as you please.<br><br>Such delights coupled with a pricey wine list result in a hefty bill, so Momo needs to iron out the galling little niggles such as the shabby dark toilets and the occasionally inattentive service.<br></div>', 'Excellent', 'Momo', '123', '', '<div style="text-align: justify;">Open everyday from 11am (10am on week ends) Lunch served noon-2.30pm Mon-Fri. Afternoon tea served 12.30-5.30pm. Dinner served 6.30-11.30pm daily. Brunch Sat and Sun from 11.30am to 3pm.<br><br>Main courses £17.50-£28. Set lunch £15.50 2 courses, £19.50 3 courses. Set dinner £45-£55 3 courses incl cocktail<br></div>', '25 Heddon St, Mayfair, London W1B 4BH, UK', '25 Heddon Street, London, United Kingdom', 'Momo', '', '', 'London', 'United Kingdom', 'W1B 4BH', '', '', NULL, '1234567890', NULL, 'pareshgandhi28@gmail.com', 'Perry Gold', 1, 1, 1, NULL, 2, 'African,English,Spanish', '0000-00-00 00:00:00', '2015-05-26 17:06:45', '2015-05-26 17:10:31'),
(26, 'The variety of African food available can be overwhelming - Momo Restaurant', 50.00, 4, 39, '<div style="text-align: justify;">London’s most glamorous Moroccan restaurant, with sexy Marrakech-style interiors, a seductive buzz, great starters and tagines, and near-perfect couscous.<br><br>Still London’s most glamorous Moroccan restaurant, Momo attracts a fair smattering of beautiful people alongside couples on special dates, hen parties and business types. The soundtrack of classic Maghrebi beats and attractive young francophone waiting staff create a seductive buzz. Sexy Marrakech-style interiors, sparkling with light from intricately latticed mashrabiya-style windows and ornate metalwork lanterns, add to the allure. Tables are small and tightly packed, but somehow this rarely seems an imposition.<br><br>Enjoy deliciously light, carefully crafted starters such as juicy prawns wrapped in crispy shredded kataifi pastry with a sour-sweet mango and tomato salsa, or scrumptious pan-fried scallops with a piquant salsa verde, before moving on to Moroccan classics such as lamb tagine with pears and prunes. But the main attraction has to be the near-perfect couscous: silky fine grains served with vegetables in a light cumin-scented broth, with tender, juicy chicken, plump golden raisins, chickpeas and harissa – all served separately so you can mix them as you please.<br><br>Such delights coupled with a pricey wine list result in a hefty bill, so Momo needs to iron out the galling little niggles such as the shabby dark toilets and the occasionally inattentive service.<br></div>', 'Excellent', 'Momo', '123', '', '<div style="text-align: justify;">Open everyday from 11am (10am on week ends) Lunch served noon-2.30pm Mon-Fri. Afternoon tea served 12.30-5.30pm. Dinner served 6.30-11.30pm daily. Brunch Sat and Sun from 11.30am to 3pm.<br><br>Main courses £17.50-£28. Set lunch £15.50 2 courses, £19.50 3 courses. Set dinner £45-£55 3 courses incl cocktail<br></div>', '25 Heddon St, Mayfair, London W1B 4BH, UK', '25 Heddon Street, London, United Kingdom', 'Momo', '', '', 'London', 'United Kingdom', 'W1B 4BH', '', '', NULL, '1234567890', NULL, 'pareshgandhi28@gmail.com', 'Perry Gold', 1, 1, 1, NULL, 2, 'African,English,Spanish', '0000-00-00 00:00:00', '2015-05-26 17:06:45', '2015-05-26 17:10:31'),
(23, 'The variety of African food available can be overwhelming - Momo Restaurant', 50.00, 4, 39, '<div style="text-align: justify;">London’s most glamorous Moroccan restaurant, with sexy Marrakech-style interiors, a seductive buzz, great starters and tagines, and near-perfect couscous.<br><br>Still London’s most glamorous Moroccan restaurant, Momo attracts a fair smattering of beautiful people alongside couples on special dates, hen parties and business types. The soundtrack of classic Maghrebi beats and attractive young francophone waiting staff create a seductive buzz. Sexy Marrakech-style interiors, sparkling with light from intricately latticed mashrabiya-style windows and ornate metalwork lanterns, add to the allure. Tables are small and tightly packed, but somehow this rarely seems an imposition.<br><br>Enjoy deliciously light, carefully crafted starters such as juicy prawns wrapped in crispy shredded kataifi pastry with a sour-sweet mango and tomato salsa, or scrumptious pan-fried scallops with a piquant salsa verde, before moving on to Moroccan classics such as lamb tagine with pears and prunes. But the main attraction has to be the near-perfect couscous: silky fine grains served with vegetables in a light cumin-scented broth, with tender, juicy chicken, plump golden raisins, chickpeas and harissa – all served separately so you can mix them as you please.<br><br>Such delights coupled with a pricey wine list result in a hefty bill, so Momo needs to iron out the galling little niggles such as the shabby dark toilets and the occasionally inattentive service.<br></div>', 'Excellent', 'Momo', '123', '', '<div style="text-align: justify;">Open everyday from 11am (10am on week ends) Lunch served noon-2.30pm Mon-Fri. Afternoon tea served 12.30-5.30pm. Dinner served 6.30-11.30pm daily. Brunch Sat and Sun from 11.30am to 3pm.<br><br>Main courses £17.50-£28. Set lunch £15.50 2 courses, £19.50 3 courses. Set dinner £45-£55 3 courses incl cocktail<br></div>', '25 Heddon St, Mayfair, London W1B 4BH, UK', '25 Heddon Street, London, United Kingdom', 'Momo', '', '', 'London', 'United Kingdom', 'W1B 4BH', '', '', NULL, '1234567890', NULL, 'pareshgandhi28@gmail.com', 'Perry Gold', 1, 1, 1, NULL, 2, 'African,English,Spanish', '0000-00-00 00:00:00', '2015-05-26 17:06:45', '2015-05-26 17:10:31'),
(24, 'The variety of African food available can be overwhelming - Momo Restaurant', 50.00, 4, 39, '<div style="text-align: justify;">London’s most glamorous Moroccan restaurant, with sexy Marrakech-style interiors, a seductive buzz, great starters and tagines, and near-perfect couscous.<br><br>Still London’s most glamorous Moroccan restaurant, Momo attracts a fair smattering of beautiful people alongside couples on special dates, hen parties and business types. The soundtrack of classic Maghrebi beats and attractive young francophone waiting staff create a seductive buzz. Sexy Marrakech-style interiors, sparkling with light from intricately latticed mashrabiya-style windows and ornate metalwork lanterns, add to the allure. Tables are small and tightly packed, but somehow this rarely seems an imposition.<br><br>Enjoy deliciously light, carefully crafted starters such as juicy prawns wrapped in crispy shredded kataifi pastry with a sour-sweet mango and tomato salsa, or scrumptious pan-fried scallops with a piquant salsa verde, before moving on to Moroccan classics such as lamb tagine with pears and prunes. But the main attraction has to be the near-perfect couscous: silky fine grains served with vegetables in a light cumin-scented broth, with tender, juicy chicken, plump golden raisins, chickpeas and harissa – all served separately so you can mix them as you please.<br><br>Such delights coupled with a pricey wine list result in a hefty bill, so Momo needs to iron out the galling little niggles such as the shabby dark toilets and the occasionally inattentive service.<br></div>', 'Excellent', 'Momo', '123', '', '<div style="text-align: justify;">Open everyday from 11am (10am on week ends) Lunch served noon-2.30pm Mon-Fri. Afternoon tea served 12.30-5.30pm. Dinner served 6.30-11.30pm daily. Brunch Sat and Sun from 11.30am to 3pm.<br><br>Main courses £17.50-£28. Set lunch £15.50 2 courses, £19.50 3 courses. Set dinner £45-£55 3 courses incl cocktail<br></div>', '25 Heddon St, Mayfair, London W1B 4BH, UK', '25 Heddon Street, London, United Kingdom', 'Momo', '', '', 'London', 'United Kingdom', 'W1B 4BH', '', '', NULL, '1234567890', NULL, 'pareshgandhi28@gmail.com', 'Perry Gold', 1, 1, 1, NULL, 2, 'African,English,Spanish', '0000-00-00 00:00:00', '2015-05-26 17:06:45', '2015-05-26 17:10:31'),
(22, 'The variety of African food available can be overwhelming - Momo Restaurant', 50.00, 4, 39, '<div style="text-align: justify;">London’s most glamorous Moroccan restaurant, with sexy Marrakech-style interiors, a seductive buzz, great starters and tagines, and near-perfect couscous.<br><br>Still London’s most glamorous Moroccan restaurant, Momo attracts a fair smattering of beautiful people alongside couples on special dates, hen parties and business types. The soundtrack of classic Maghrebi beats and attractive young francophone waiting staff create a seductive buzz. Sexy Marrakech-style interiors, sparkling with light from intricately latticed mashrabiya-style windows and ornate metalwork lanterns, add to the allure. Tables are small and tightly packed, but somehow this rarely seems an imposition.<br><br>Enjoy deliciously light, carefully crafted starters such as juicy prawns wrapped in crispy shredded kataifi pastry with a sour-sweet mango and tomato salsa, or scrumptious pan-fried scallops with a piquant salsa verde, before moving on to Moroccan classics such as lamb tagine with pears and prunes. But the main attraction has to be the near-perfect couscous: silky fine grains served with vegetables in a light cumin-scented broth, with tender, juicy chicken, plump golden raisins, chickpeas and harissa – all served separately so you can mix them as you please.<br><br>Such delights coupled with a pricey wine list result in a hefty bill, so Momo needs to iron out the galling little niggles such as the shabby dark toilets and the occasionally inattentive service.<br></div>', 'Excellent', 'Momo', '123', '', '<div style="text-align: justify;">Open everyday from 11am (10am on week ends) Lunch served noon-2.30pm Mon-Fri. Afternoon tea served 12.30-5.30pm. Dinner served 6.30-11.30pm daily. Brunch Sat and Sun from 11.30am to 3pm.<br><br>Main courses £17.50-£28. Set lunch £15.50 2 courses, £19.50 3 courses. Set dinner £45-£55 3 courses incl cocktail<br></div>', '25 Heddon St, Mayfair, London W1B 4BH, UK', '25 Heddon Street, London, United Kingdom', 'Momo', '', '', 'London', 'United Kingdom', 'W1B 4BH', '', '', NULL, '1234567890', NULL, 'pareshgandhi28@gmail.com', 'Perry Gold', 1, 1, 1, NULL, 2, 'African,English,Spanish', '0000-00-00 00:00:00', '2015-05-26 17:06:45', '2015-05-26 17:10:31'),
(21, 'The variety of African food available can be overwhelming - Momo Restaurant', 50.00, 4, 39, '<div style="text-align: justify;">London’s most glamorous Moroccan restaurant, with sexy Marrakech-style interiors, a seductive buzz, great starters and tagines, and near-perfect couscous.<br><br>Still London’s most glamorous Moroccan restaurant, Momo attracts a fair smattering of beautiful people alongside couples on special dates, hen parties and business types. The soundtrack of classic Maghrebi beats and attractive young francophone waiting staff create a seductive buzz. Sexy Marrakech-style interiors, sparkling with light from intricately latticed mashrabiya-style windows and ornate metalwork lanterns, add to the allure. Tables are small and tightly packed, but somehow this rarely seems an imposition.<br><br>Enjoy deliciously light, carefully crafted starters such as juicy prawns wrapped in crispy shredded kataifi pastry with a sour-sweet mango and tomato salsa, or scrumptious pan-fried scallops with a piquant salsa verde, before moving on to Moroccan classics such as lamb tagine with pears and prunes. But the main attraction has to be the near-perfect couscous: silky fine grains served with vegetables in a light cumin-scented broth, with tender, juicy chicken, plump golden raisins, chickpeas and harissa – all served separately so you can mix them as you please.<br><br>Such delights coupled with a pricey wine list result in a hefty bill, so Momo needs to iron out the galling little niggles such as the shabby dark toilets and the occasionally inattentive service.<br></div>', 'Excellent', 'Momo', '123', '', '<div style="text-align: justify;">Open everyday from 11am (10am on week ends) Lunch served noon-2.30pm Mon-Fri. Afternoon tea served 12.30-5.30pm. Dinner served 6.30-11.30pm daily. Brunch Sat and Sun from 11.30am to 3pm.<br><br>Main courses £17.50-£28. Set lunch £15.50 2 courses, £19.50 3 courses. Set dinner £45-£55 3 courses incl cocktail<br></div>', '25 Heddon St, Mayfair, London W1B 4BH, UK', '25 Heddon Street, London, United Kingdom', 'Momo', '', '', 'London', 'United Kingdom', 'W1B 4BH', '', '', NULL, '1234567890', NULL, 'pareshgandhi28@gmail.com', 'Perry Gold', 1, 1, 1, NULL, 2, 'African,English,Spanish', '0000-00-00 00:00:00', '2015-05-26 17:06:45', '2015-05-26 17:10:31'),
(20, 'The variety of African food available can be overwhelming - Momo Restaurant', 50.00, 4, 39, '<div style="text-align: justify;">London’s most glamorous Moroccan restaurant, with sexy Marrakech-style interiors, a seductive buzz, great starters and tagines, and near-perfect couscous.<br><br>Still London’s most glamorous Moroccan restaurant, Momo attracts a fair smattering of beautiful people alongside couples on special dates, hen parties and business types. The soundtrack of classic Maghrebi beats and attractive young francophone waiting staff create a seductive buzz. Sexy Marrakech-style interiors, sparkling with light from intricately latticed mashrabiya-style windows and ornate metalwork lanterns, add to the allure. Tables are small and tightly packed, but somehow this rarely seems an imposition.<br><br>Enjoy deliciously light, carefully crafted starters such as juicy prawns wrapped in crispy shredded kataifi pastry with a sour-sweet mango and tomato salsa, or scrumptious pan-fried scallops with a piquant salsa verde, before moving on to Moroccan classics such as lamb tagine with pears and prunes. But the main attraction has to be the near-perfect couscous: silky fine grains served with vegetables in a light cumin-scented broth, with tender, juicy chicken, plump golden raisins, chickpeas and harissa – all served separately so you can mix them as you please.<br><br>Such delights coupled with a pricey wine list result in a hefty bill, so Momo needs to iron out the galling little niggles such as the shabby dark toilets and the occasionally inattentive service.<br></div>', 'Excellent', 'Momo', '123', '', '<div style="text-align: justify;">Open everyday from 11am (10am on week ends) Lunch served noon-2.30pm Mon-Fri. Afternoon tea served 12.30-5.30pm. Dinner served 6.30-11.30pm daily. Brunch Sat and Sun from 11.30am to 3pm.<br><br>Main courses £17.50-£28. Set lunch £15.50 2 courses, £19.50 3 courses. Set dinner £45-£55 3 courses incl cocktail<br></div>', '25 Heddon St, Mayfair, London W1B 4BH, UK', '25 Heddon Street, London, United Kingdom', 'Momo', '', '', 'London', 'United Kingdom', 'W1B 4BH', '', '', NULL, '1234567890', NULL, 'pareshgandhi28@gmail.com', 'Perry Gold', 1, 1, 1, NULL, 2, 'African,English,Spanish', '0000-00-00 00:00:00', '2015-05-26 17:06:45', '2015-05-26 17:10:31'),
(18, 'The variety of African food available can be overwhelming - Momo Restaurant', 50.00, 4, 39, '<div style="text-align: justify;">London’s most glamorous Moroccan restaurant, with sexy Marrakech-style interiors, a seductive buzz, great starters and tagines, and near-perfect couscous.<br><br>Still London’s most glamorous Moroccan restaurant, Momo attracts a fair smattering of beautiful people alongside couples on special dates, hen parties and business types. The soundtrack of classic Maghrebi beats and attractive young francophone waiting staff create a seductive buzz. Sexy Marrakech-style interiors, sparkling with light from intricately latticed mashrabiya-style windows and ornate metalwork lanterns, add to the allure. Tables are small and tightly packed, but somehow this rarely seems an imposition.<br><br>Enjoy deliciously light, carefully crafted starters such as juicy prawns wrapped in crispy shredded kataifi pastry with a sour-sweet mango and tomato salsa, or scrumptious pan-fried scallops with a piquant salsa verde, before moving on to Moroccan classics such as lamb tagine with pears and prunes. But the main attraction has to be the near-perfect couscous: silky fine grains served with vegetables in a light cumin-scented broth, with tender, juicy chicken, plump golden raisins, chickpeas and harissa – all served separately so you can mix them as you please.<br><br>Such delights coupled with a pricey wine list result in a hefty bill, so Momo needs to iron out the galling little niggles such as the shabby dark toilets and the occasionally inattentive service.<br></div>', 'Excellent', 'Momo', '123', '', '<div style="text-align: justify;">Open everyday from 11am (10am on week ends) Lunch served noon-2.30pm Mon-Fri. Afternoon tea served 12.30-5.30pm. Dinner served 6.30-11.30pm daily. Brunch Sat and Sun from 11.30am to 3pm.<br><br>Main courses £17.50-£28. Set lunch £15.50 2 courses, £19.50 3 courses. Set dinner £45-£55 3 courses incl cocktail<br></div>', '25 Heddon St, Mayfair, London W1B 4BH, UK', '25 Heddon Street, London, United Kingdom', 'Momo', '', '', 'London', 'United Kingdom', 'W1B 4BH', '', '', NULL, '1234567890', NULL, 'pareshgandhi28@gmail.com', 'Perry Gold', 1, 1, 1, NULL, 1, 'African,English,Spanish', NULL, '2015-05-26 17:06:45', '2015-05-26 17:10:31'),
(19, 'Bakus African Restaurant - Delicious flavors and endless quality', 30.00, 4, 39, '<div style="text-align: justify;">Bakus African Restaurant is a concept that transports Nigerian home cooking to America. Southern Nigerian cuisine is a combination of traditional foods (gluten, lactose and dessert free diet) and colonial foods (sweet and savory pastries) influences. At Bakus restaurant we specialize in authentic traditional cuisine. Our food is handcrafted from scratch with fresh and natural ingredients, we do not use artificial ingredients (MSG), butter and sugar.<br><br>All our dishes are flavorful and spiced according to our customers preferences from mild to super spicy. Baku’s Restaurant embraces Nigerian lifestyle. The menu is designed to reflect ethnic, cultural, political and social themes. The open kitchen at the restaurant offers diners a view of the chef and her staff at work. The restaurant decor is a combination of a tropical themed mural and colorful painted walls. The atmosphere is cozy and welcoming with African music in the background.<br><br>Bakus good reputation due to our focus on good quality product, generous food portions, moderate pricing and friendly attitude continue to draw diners from near and far. We have a lot of repeat customers and some of our patrons have been coming since we opened in 2005. So when you are in the mood of good food, come to Bakus, bring your family and friends too.<br></div>', 'Average', 'Bakus', '554', '', 'Specializing in authentic African cuisine and more<br>Hours: Monday through Thursday: 12pm-8pm<br>Friday-Saturday: 12pm-9pm<br>Sunday: Closed<br><br>Accepts OCMP and major credit cards<br>Gift Certificates available<br><br><span style="font-weight: bold;">Take Out ~ Sit In ~ Catering ~ Delivery ~ Daily Specials ~ Mail Orders</span><br>', '197 N Pleasant St, Amherst, MA 01002, USA', '197 North Pleasant Street, Amherst, MA, United States', '197', 'N Pleasant St', 'MA', 'Amherst', 'United States', '01002', '42.3786084', '-72.51968959999999', NULL, '4656465665', NULL, 'pareshgandhi28@gmail.com', 'Hem G', 1, 1, 1, NULL, 1, 'African', NULL, '2015-05-26 17:28:54', '2015-05-26 17:44:09'),
(34, 'DJ Spin Table', 150.00, 37, 41, 'I have the BEST DJ Equipment West of the Mississippi. I have used it to DJ''d at the best wedding and restaurants in PDX and Washington State. I will be using it to perform at various events in California. Please buy it today.<br>', 'Excellent', 'Yamaha', 'DJ2454', '24 x 12 x 6', 'I have the BEST DJ Equipment West of the Mississippi. I have used it to DJ''d at the best wedding and restaurants in PDX and Washington State. I will be using it to perform at various events in California. Please buy it today.', '6926 NE Garfield Ave, Portland, OR 97211, USA', '6926 NE Garfield Ave, Portland, OR, United States', '6926', 'NE Garfield Ave', 'OR', 'Portland', 'United States', '97211', '45.57293199999999', '-122.66207600000001', NULL, '4048081154', NULL, 'chykolosky@gmail.com', 'Chyko Losky', 1, 1, 1, NULL, 1, '', NULL, '2015-05-31 03:59:52', '2015-05-31 04:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `classified_images`
--

DROP TABLE IF EXISTS `classified_images`;
CREATE TABLE IF NOT EXISTS `classified_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `classified_id` int(11) DEFAULT '0',
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_cover` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

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
(14, 12, 'http://tpstracker.com/demo/tribalsquare/uploads/3dfunnycharactersfornew_1.jpg', 0, '2015-05-18 20:07:13', '2015-04-11 17:01:11', '2015-05-18 20:07:13'),
(15, 14, 'http://tpstracker.com/demo/tribalsquare/uploads/main.css', 0, NULL, '2015-04-15 04:33:37', '2015-04-15 04:33:37'),
(16, 14, 'http://tpstracker.com/demo/tribalsquare/uploads/newhome.png', 0, NULL, '2015-04-15 04:33:57', '2015-04-15 04:33:57'),
(17, 15, 'http://tpstracker.com/demo/tribalsquare/uploads/209084_10100588667507617_688409629_o.jpg', 0, '2015-04-17 08:39:56', '2015-04-17 08:31:17', '2015-04-17 08:39:56'),
(18, 17, 'http://tpstracker.com/demo/tribalsquare/uploads/background.jpg', 0, NULL, '2015-05-20 22:14:39', '2015-05-20 22:14:39'),
(19, 18, 'http://tpstracker.com/demo/tribalsquare/uploads/1.jpg', 1, NULL, '2015-05-26 17:09:13', '2015-05-26 17:10:31'),
(20, 18, 'http://tpstracker.com/demo/tribalsquare/uploads/2.jpg', 0, NULL, '2015-05-26 17:09:18', '2015-05-26 17:09:18'),
(21, 18, 'http://tpstracker.com/demo/tribalsquare/uploads/3.jpg', 0, NULL, '2015-05-26 17:09:21', '2015-05-26 17:09:21'),
(22, 18, 'http://tpstracker.com/demo/tribalsquare/uploads/4.jpg', 0, NULL, '2015-05-26 17:09:23', '2015-05-26 17:09:23'),
(23, 19, 'http://tpstracker.com/demo/tribalsquare/uploads/baku1.jpg', 1, NULL, '2015-05-26 17:35:58', '2015-05-26 17:37:11'),
(24, 19, 'http://tpstracker.com/demo/tribalsquare/uploads/baku2.jpg', 0, NULL, '2015-05-26 17:36:27', '2015-05-26 17:36:27'),
(25, 19, 'http://tpstracker.com/demo/tribalsquare/uploads/baku3.jpg', 0, NULL, '2015-05-26 17:37:05', '2015-05-26 17:37:05'),
(26, 29, 'http://tpstracker.com/demo/tribalsquare/uploads/Awash Ethiopian Restaurant1.jpg', 0, NULL, '2015-05-26 19:34:28', '2015-05-26 19:34:28'),
(27, 29, 'http://tpstracker.com/demo/tribalsquare/uploads/Awash Ethiopian Restaurant2.jpg', 0, NULL, '2015-05-26 19:34:30', '2015-05-26 19:34:30'),
(28, 29, 'http://tpstracker.com/demo/tribalsquare/uploads/Awash Ethiopian Restaurant3.jpg', 1, NULL, '2015-05-26 19:34:32', '2015-05-26 19:35:59'),
(29, 29, 'http://tpstracker.com/demo/tribalsquare/uploads/Awash Ethiopian Restaurant4.gif', 0, NULL, '2015-05-26 19:35:48', '2015-05-26 19:35:48'),
(30, 30, 'http://tpstracker.com/demo/tribalsquare/uploads/ahmedabad_information.jpg', 0, NULL, '2015-05-29 13:49:32', '2015-05-29 13:49:32'),
(31, 31, 'http://tpstracker.com/demo/tribalsquare/uploads/ahmedabad_information_1.jpg', 0, NULL, '2015-05-29 13:53:27', '2015-05-29 13:53:27'),
(32, 33, 'http://tpstracker.com/demo/tribalsquare/uploads/1_1.jpg', 0, NULL, '2015-05-29 20:09:01', '2015-05-29 20:09:01'),
(33, 33, 'http://tpstracker.com/demo/tribalsquare/uploads/baku3_1.jpg', 1, NULL, '2015-05-29 20:14:01', '2015-06-02 15:04:57'),
(34, 34, 'http://tpstracker.com/demo/tribalsquare/uploads/20150420_171743.jpg', 0, NULL, '2015-05-31 04:00:43', '2015-05-31 04:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `classified_videos`
--

DROP TABLE IF EXISTS `classified_videos`;
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
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content_title` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `content_title`, `descriptions`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', '<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Privacy &amp; Security Policy</h1>\r\n\r\n<p>This privacy policy applies to www.tribalsquare.com which is owned and operated by TribalSquare, LLC (TribalSquare). This privacy policy describes how TribalSquare collects and uses the personally identifiable information you provide on our website. It also describes the choices available to you regarding our use of your personal identifiable information and how you can access and update this information.&nbsp;<br />\r\n<br />\r\nIt is TribalSquare&#39;s policy to maintain strict security and privacy practices to protect its systems and its customer data. TribalSquare maintains compliance with U.S. State and Federal laws. Please visit our&nbsp;<a href="http://tpstracker.com/demo/tribalsquare/privacypolicy#" style="box-sizing: border-box; color: rgb(51, 122, 183); text-decoration: none; outline: none !important; background-color: transparent;">Security Center</a>&nbsp;to learn more about how we help protect you and how you can help protect yourself against potential online fraud.&nbsp;<br />\r\n<br />\r\nTribalSquare has been awarded TRUSTe&#39;s Privacy Seal signifying that this privacy policy and practices have been reviewed by TRUSTe for compliance with&nbsp;<a href="http://tpstracker.com/demo/tribalsquare/privacypolicy#" style="box-sizing: border-box; color: rgb(51, 122, 183); text-decoration: none; outline: none !important; background-color: transparent;">TRUSTe&#39;s program requirements</a>including transparency, accountability and choice regarding the collection and use of your personally identifiable information. The TRUSTe program covers information collected through this website, www.tribalsquare.com. TRUSTe&#39;s mission, as an independent third party, is to accelerate online trust among consumers and organizations globally through its leading privacy trustmark and innovative trust solutions. If you have questions or complaints regarding our privacy policy or practices, please contact&nbsp;<a href="http://tpstracker.com/demo/tribalsquare/privacypolicy#" style="box-sizing: border-box; color: rgb(51, 122, 183); text-decoration: none; outline: none !important; background-color: transparent;">TribalSquare Support</a>. If you are not satisfied with our response you can contact TRUSTe&nbsp;<a href="http://tpstracker.com/demo/tribalsquare/privacypolicy#" style="box-sizing: border-box; color: rgb(51, 122, 183); text-decoration: none; outline: none !important; background-color: transparent;">here</a>.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Anti-Spam &amp; UCE Policy</h1>\r\n\r\n<p>TribalSquare does not send out unsolicited commercial emails or any form of spam. Please read our Unsolicited Commercial Email Policy to see what you can do to correctly identify spammers and put an end to their emails. If you have received what you believe to be spam, you may have received a spoofed email with forged headers.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Privacy &amp; Personally Identifiable Information</h1>\r\n\r\n<p>TribalSquare has a firm commitment to safeguarding the privacy of our members&#39; Personally Identifiable Information. We collect personally identifiable information such as first and last name, birthdate, email address, a home, postal or other physical address or phone number from guests and members during the registration and payment processes and, occasionally, at other times. Information collected by TribalSquare is securely stored by physical and electronic means. Data collected by TribalSquare will be shared with third parties only in ways that are described in this privacy policy and will not be sold or rented on an individual basis to independent third parties without your knowledge or permission. By accepting the TribalSquare Terms of Use, you acknowledge and grant permission to TribalSquare to use your Personal Contact Information as specifically stated under Uses of Personal Contact Information, herein, on the TribalSquare website.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Uses of Personal Contact Information</h1>\r\n\r\n<p>Paid members may see your first and last name listed on your profile. You have the option of providing your phone number, which you may elect to display or not display to paid members; either families or care providers who are claiming to seek a working relationship with you as a result of your online registration. Your email address is not visible to anyone, except to those whom you directly send an email during the time you have a paid subscription. Your physical address is not revealed on the website. A map showing the location of your city or zip code is available and may be seen by registered users. No representations or warranties are made regarding the legitimacy of the claims of those who have paid for a membership subscription to contact you through TribalSquare&#39;s private messaging system which relies on your Personal Contact Information. You are urged to validate the identity of anyone who contacts you before making any commitments or arrangements. We do not sell, share, rent or trade personally identifiable information with third parties for their promotional purposes.&nbsp;<br />\r\n<br />\r\nThe information you provide during registration may also be used to enable us to process, validate and verify services or membership subscription purchases. We may also provide advertisers with aggregate - never individual - information about our member base and usage patterns. We may also use aggregated information to develop new features and services to better meet member needs.&nbsp;<br />\r\n<br />\r\nInternally we may use aggregated and personally identifiable information to improve our marketing efforts, to statistically analyze site usage, to improve our content and product offerings as well as to customize our site&#39;s content and layout. We believe these uses allow us to improve our site and better tailor your online experience to meet your needs.&nbsp;<br />\r\n<br />\r\nWe also may use personally identifiable information about you to deliver information to you that, in some cases, is targeted to your interests, such as TribalSquare news, updates, and promotions. You may opt out of receiving such automated information services at any time by signing in to your account: click My Account then click Preferences in the subnavigation menu to select your email preferences.&nbsp;<br />\r\n<br />\r\nUsers also may post third party personally identifiable information, such as name and email for referral purposes. This information is used only for the purposes which it was collected. We use personally identifiable information to resolve disputes, troubleshoot problems and enforce our Terms of Use.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Updating/Accessing/Amending/Correcting Personally Identifiable Information</h1>\r\n\r\n<p>If your personally identifiable information changes, or if you no longer desire our service, you may correct, update, amend, deactivate or delete it by making your desired changes on your My Account page or by contacting our Customer Support team by email, phone or U.S. mail.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Communications from the Site</h1>\r\n\r\n<p>As part of your registration you are agreeing to receive emails from the site and its members. While you may opt out from receiving certain types of emails, you may cease all emails from the site and its members by deactivating your profile or canceling your account. To deactivate your profile or cancel your account, sign in and click &quot;My Account&quot; and select your desired option under &quot;Account Options&quot;. When your account is deactivated or canceled, you will receive an email confirming such action. To remove unauthorized profiles, please send an email to&nbsp;<a href="mailto:support@tribalsquare.com" style="box-sizing: border-box; color: rgb(51, 122, 183); text-decoration: none; outline: none !important; background-color: transparent;" target="_top">support@tribalsquare.com</a>. We reserve the right to contact any member at any time regarding subscription renewals, profile deactivation, account cancellation and other membership-related problems or questions.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Special Offers and Updates</h1>\r\n\r\n<p>We will occasionally send you information on special services or promotions. You may receive these emails from us as part of your registration.&nbsp;<br />\r\n<br />\r\nOut of respect for your privacy, we provide you a way to unsubscribe. At the bottom of every Special Offer email, you will find an &quot;Opt-out&quot; link at the bottom, which if clicked, will remove your name from the list of recipients for future mailings of that type.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Newsletters</h1>\r\n\r\n<p>If you wish to subscribe to our newsletter, we will use your name and email address to send the newsletter to you. Out of respect for your privacy, we provide you a way to unsubscribe. At the bottom of every Newsletter, you will find an &quot;Opt-out&quot; link at the bottom, which if clicked, will remove your name from the list of recipients for future Newsletters.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Service-related Announcements</h1>\r\n\r\n<p>We will send you service-related announcements on rare occasions when it is necessary to do so. For instance, if our service is temporarily suspended for maintenance, we might send you an email. Generally, you may not opt-out of these communications, which are not promotional in nature. If you do not wish to receive them, you have the option to deactivate or cancel your account.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Legal Disclaimer</h1>\r\n\r\n<p>We reserve the right to disclose your personally identifiable information to enforce our Terms of Use, prevent fraud, or as required by law and when we believe that disclosure is necessary to protect our rights and/or to comply with a judicial proceeding, court order, or legal process served on our website. If TribalSquare is involved in a merger, acquisition, or sale of all or a portion of its assets, you will be notified via email and/or a prominent notice on our website of any change in ownership or uses of your personally identifiable information, as well as any choices you may have regarding your personally identifiable information.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Links to Other Sites</h1>\r\n\r\n<p>This website contains links to other sites that are not owned or controlled by TribalSquare. Please be aware that we, TribalSquare, are not responsible for the privacy practices of such other sites.&nbsp;<br />\r\n<br />\r\nWe encourage you to be aware when you leave our site and to read the privacy policies of each and every website that collects personally identifiable information.&nbsp;<br />\r\n<br />\r\nThis privacy policy applies only to information collected by this website.&nbsp;<br />\r\n<br />\r\nYou should be aware that any personally identifiable information you submit on the TribalForum can be read, collected, or used by other users of these forums, and could be used to send you unsolicited messages. We are not responsible for the personally identifiable information you choose to submit in this forum. To request removal of your personally identifiable information from our bulletin board or chat room, contact us at support@tribalsquare.com. In some cases, we may not be able to remove your personally identifiable information, in which case we will let you know if we are unable to do so and why.&nbsp;<br />\r\n<br />\r\nWe also have testimonials and reviews on our site, for which users have given permission to have their personally identifiable information posted on this site. If you wish to update or delete your testimonial, you can contact us at support@tribalsquare.com.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Security</h1>\r\n\r\n<p>The security of your personally identifiable information is important to us. When you enter sensitive information (such as credit card number, drivers license number, national ID number and/or social security number) on our registration or order forms, we encrypt that information using secure socket layer technology (SSL). To learn more about how we help protect you and your privacy, visit our<a href="http://tpstracker.com/demo/tribalsquare/privacypolicy" style="box-sizing: border-box; color: rgb(51, 122, 183); text-decoration: none; outline: none !important; background-color: transparent;">Security Center</a>.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Tell-A-Friend</h1>\r\n\r\n<p>If you choose to use our referral service to tell a friend about our site, we will ask you for your friend&#39;s name and email address. We will automatically send your friend a one-time email inviting him or her to visit our site. TribalSquare does not store and only uses this information for the sole purpose of sending this one-time email.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Agents/Service Providers</h1>\r\n\r\n<p>We use third parties such as a credit card processing company to bill you for services. When you sign up for our service, we will share only that specific personally identifiable information as necessary for the third party to provide that service. These third parties are prohibited from using your personally identifiable information for promotional purposes.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Widgets</h1>\r\n\r\n<p>Our website includes Widgets, which are interactive mini-programs that run on our site to provide specific services from another company (e.g. allowing you to share a profile with your FaceBook or Twitter account). Personally identifiable information, such as your email address, may be collected through the Widget. Cookies may also be set by the Widget to enable it to function properly. Information collected by this Widget is governed by the privacy policy of the company that created it.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Control of Your Password</h1>\r\n\r\n<p>You may not disclose your password to any third parties or share it with any third parties. If, despite the foregoing, you lose control of your password, you may lose substantial control over your personally identifiable information and may be subject to legally binding actions taken on your behalf. Therefore, if your password has been compromised for any reason, you should immediately change your password.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Research</h1>\r\n\r\n<p>We also may conduct occasional online surveys. If you choose to participate, you&#39;ll be prompted to answer a series of online questions. Your responses are confidential and will be used for statistical analysis only; no information on an individual&#39;s preferences will be shared with any outside organization.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Tracking Technologies</h1>\r\n\r\n<p>Technologies such as: cookies, beacons, tags and scripts are used by TribalSquare and our marketing and analytics partners. These technologies are used in analyzing trends, administering the site, tracking user&#39;s movements around the site and to gather demographic information about our user base as a whole. We may receive reports based on the use of these technologies by these companies on an individual as well as aggregated basis.&nbsp;<br />\r\n<br />\r\nWe use cookies to help members move faster through our site. When a member signs on to TribalSquare we may pass a cookie to that user&#39;s computer. A cookie is a string of information that&#39;s sent by a website and stored on your hard drive or temporarily in your computer&#39;s memory. This avoids the potentially time-consuming task of entering your user name and password each time a page is requested. Data contained in the cookies is encrypted and is not linked to personally identifiable information. Users can control the use of cookies at the individual browser level. If you reject cookies, you may still use our site, but your ability to use some features or areas of our site may be limited.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Advertising</h1>\r\n\r\n<p>We partner with a third party to either display advertising on our Web site or to manage our advertising on other sites. Our third party partner may use technologies such as cookies to gather information about your activities on this site and other sites in order to provide you advertising based upon your browsing activities and interests. If you wish to not have this information used for the purpose of serving you interestbased ads, you may opt-out by in your Account profile setting. Please note this does not opt you out of being served ads. You will continue to receive generic ads.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Local Storage</h1>\r\n\r\n<p>We use Local Storage Objects (LSOs) such as HTML5 to store session content information and preferences. Third parties with whom we partner to provide certain features on our site or to display advertising based upon your Web browsing activity use LSOs such as HTML 5 or Flash to collect and store information. Various browsers may offer their own management tools for removing HTML5 LSOs. To manage Flash LSOs please click here:&nbsp;<a href="http://www.macromedia.com/support/documentation/en/flashplayer/help/settings_manager07.html" style="box-sizing: border-box; color: rgb(51, 122, 183); text-decoration: none; outline: none !important; background-color: transparent;" target="_blank">http://www.macromedia.com/support/documentation/en/flashplayer/help/settin gs_manager07.html</a>.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Log Files</h1>\r\n\r\n<p>As is true of most web sites, we gather certain information automatically and store it in log files. This information may include internet protocol (IP) addresses, browser type, internet service provider (ISP), referring/exit pages, operating system, date/time stamp, and/or clickstream data. We may combine this automatically collected log information with other information we collect about you. We do this to improve services we offer you and site functionality.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Data Retention</h1>\r\n\r\n<p>We will retain your information for as long as your account is active or as needed to provide you services. If you wish to cancel your account or request that we no longer use your information to provide you services contact our Customer Support team by email, phone or U.S. mail. We will retain and use your information as necessary to comply with our legal obligations, resolve disputes, and enforce our agreements.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Changes in this Privacy Policy</h1>\r\n\r\n<p>If we decide to change our privacy policy, we will post those changes to this privacy policy, and other places we deem appropriate so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we disclose it.<br />\r\n<br />\r\nWe reserve the right to modify this privacy policy at any time, so please review it frequently. If we make material changes to this policy, we will notify you here or by email prior to the change becoming effective.</p>\r\n</div>\r\n', '2015-06-01 09:07:09', '2015-06-01 15:07:09'),
(2, 'Terms and Services ', '<div class="row privacy_content_wrap">\r\n<h1>Privacy &amp; Security Policy</h1>\r\n\r\n<p>This privacy policy applies to www.tribalsquare.com which is owned and operated by TribalSquare, LLC (TribalSquare). This privacy policy describes how TribalSquare collects and uses the personally identifiable information you provide on our website. It also describes the choices available to you regarding our use of your personal identifiable information and how you can access and update this information.<br />\r\n<br />\r\nIt is TribalSquare&#39;s policy to maintain strict security and privacy practices to protect its systems and its customer data. TribalSquare maintains compliance with U.S. State and Federal laws. Please visit our <a href="#">Security Center</a> to learn more about how we help protect you and how you can help protect yourself against potential online fraud.<br />\r\n<br />\r\nTribalSquare has been awarded TRUSTe&#39;s Privacy Seal signifying that this privacy policy and practices have been reviewed by TRUSTe for compliance with <a href="#">TRUSTe&#39;s program requirements</a> including transparency, accountability and choice regarding the collection and use of your personally identifiable information. The TRUSTe program covers information collected through this website, www.tribalsquare.com. TRUSTe&#39;s mission, as an independent third party, is to accelerate online trust among consumers and organizations globally through its leading privacy trustmark and innovative trust solutions. If you have questions or complaints regarding our privacy policy or practices, please contact <a href="#">TribalSquare Support</a>. If you are not satisfied with our response you can contact TRUSTe <a href="#">here</a>.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Anti-Spam &amp; UCE Policy</h1>\r\n\r\n<p>TribalSquare does not send out unsolicited commercial emails or any form of spam. Please read our Unsolicited Commercial Email Policy to see what you can do to correctly identify spammers and put an end to their emails. If you have received what you believe to be spam, you may have received a spoofed email with forged headers.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Privacy &amp; Personally Identifiable Information</h1>\r\n\r\n<p>TribalSquare has a firm commitment to safeguarding the privacy of our members&#39; Personally Identifiable Information. We collect personally identifiable information such as first and last name, birthdate, email address, a home, postal or other physical address or phone number from guests and members during the registration and payment processes and, occasionally, at other times. Information collected by TribalSquare is securely stored by physical and electronic means. Data collected by TribalSquare will be shared with third parties only in ways that are described in this privacy policy and will not be sold or rented on an individual basis to independent third parties without your knowledge or permission. By accepting the TribalSquare Terms of Use, you acknowledge and grant permission to TribalSquare to use your Personal Contact Information as specifically stated under Uses of Personal Contact Information, herein, on the TribalSquare website.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Uses of Personal Contact Information</h1>\r\n\r\n<p>Paid members may see your first and last name listed on your profile. You have the option of providing your phone number, which you may elect to display or not display to paid members; either families or care providers who are claiming to seek a working relationship with you as a result of your online registration. Your email address is not visible to anyone, except to those whom you directly send an email during the time you have a paid subscription. Your physical address is not revealed on the website. A map showing the location of your city or zip code is available and may be seen by registered users. No representations or warranties are made regarding the legitimacy of the claims of those who have paid for a membership subscription to contact you through TribalSquare&#39;s private messaging system which relies on your Personal Contact Information. You are urged to validate the identity of anyone who contacts you before making any commitments or arrangements. We do not sell, share, rent or trade personally identifiable information with third parties for their promotional purposes.<br />\r\n<br />\r\nThe information you provide during registration may also be used to enable us to process, validate and verify services or membership subscription purchases. We may also provide advertisers with aggregate - never individual - information about our member base and usage patterns. We may also use aggregated information to develop new features and services to better meet member needs.<br />\r\n<br />\r\nInternally we may use aggregated and personally identifiable information to improve our marketing efforts, to statistically analyze site usage, to improve our content and product offerings as well as to customize our site&#39;s content and layout. We believe these uses allow us to improve our site and better tailor your online experience to meet your needs.<br />\r\n<br />\r\nWe also may use personally identifiable information about you to deliver information to you that, in some cases, is targeted to your interests, such as TribalSquare news, updates, and promotions. You may opt out of receiving such automated information services at any time by signing in to your account: click My Account then click Preferences in the subnavigation menu to select your email preferences.<br />\r\n<br />\r\nUsers also may post third party personally identifiable information, such as name and email for referral purposes. This information is used only for the purposes which it was collected. We use personally identifiable information to resolve disputes, troubleshoot problems and enforce our Terms of Use.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Updating/Accessing/Amending/Correcting Personally Identifiable Information</h1>\r\n\r\n<p>If your personally identifiable information changes, or if you no longer desire our service, you may correct, update, amend, deactivate or delete it by making your desired changes on your My Account page or by contacting our Customer Support team by email, phone or U.S. mail.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Communications from the Site</h1>\r\n\r\n<p>As part of your registration you are agreeing to receive emails from the site and its members. While you may opt out from receiving certain types of emails, you may cease all emails from the site and its members by deactivating your profile or canceling your account. To deactivate your profile or cancel your account, sign in and click &quot;My Account&quot; and select your desired option under &quot;Account Options&quot;. When your account is deactivated or canceled, you will receive an email confirming such action. To remove unauthorized profiles, please send an email to<a href="mailto:support@tribalsquare.com" target="_top">support@tribalsquare.com</a> . We reserve the right to contact any member at any time regarding subscription renewals, profile deactivation, account cancellation and other membership-related problems or questions.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Special Offers and Updates</h1>\r\n\r\n<p>We will occasionally send you information on special services or promotions. You may receive these emails from us as part of your registration.<br />\r\n<br />\r\nOut of respect for your privacy, we provide you a way to unsubscribe. At the bottom of every Special Offer email, you will find an &quot;Opt-out&quot; link at the bottom, which if clicked, will remove your name from the list of recipients for future mailings of that type.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Newsletters</h1>\r\n\r\n<p>If you wish to subscribe to our newsletter, we will use your name and email address to send the newsletter to you. Out of respect for your privacy, we provide you a way to unsubscribe. At the bottom of every Newsletter, you will find an &quot;Opt-out&quot; link at the bottom, which if clicked, will remove your name from the list of recipients for future Newsletters.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Service-related Announcements</h1>\r\n\r\n<p>We will send you service-related announcements on rare occasions when it is necessary to do so. For instance, if our service is temporarily suspended for maintenance, we might send you an email. Generally, you may not opt-out of these communications, which are not promotional in nature. If you do not wish to receive them, you have the option to deactivate or cancel your account.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Legal Disclaimer</h1>\r\n\r\n<p>We reserve the right to disclose your personally identifiable information to enforce our Terms of Use, prevent fraud, or as required by law and when we believe that disclosure is necessary to protect our rights and/or to comply with a judicial proceeding, court order, or legal process served on our website. If TribalSquare is involved in a merger, acquisition, or sale of all or a portion of its assets, you will be notified via email and/or a prominent notice on our website of any change in ownership or uses of your personally identifiable information, as well as any choices you may have regarding your personally identifiable information.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Links to Other Sites</h1>\r\n\r\n<p>This website contains links to other sites that are not owned or controlled by TribalSquare. Please be aware that we, TribalSquare, are not responsible for the privacy practices of such other sites.<br />\r\n<br />\r\nWe encourage you to be aware when you leave our site and to read the privacy policies of each and every website that collects personally identifiable information.<br />\r\n<br />\r\nThis privacy policy applies only to information collected by this website.<br />\r\n<br />\r\nYou should be aware that any personally identifiable information you submit on the TribalForum can be read, collected, or used by other users of these forums, and could be used to send you unsolicited messages. We are not responsible for the personally identifiable information you choose to submit in this forum. To request removal of your personally identifiable information from our bulletin board or chat room, contact us at support@tribalsquare.com. In some cases, we may not be able to remove your personally identifiable information, in which case we will let you know if we are unable to do so and why.<br />\r\n<br />\r\nWe also have testimonials and reviews on our site, for which users have given permission to have their personally identifiable information posted on this site. If you wish to update or delete your testimonial, you can contact us at support@tribalsquare.com.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Security</h1>\r\n\r\n<p>The security of your personally identifiable information is important to us. When you enter sensitive information (such as credit card number, drivers license number, national ID number and/or social security number) on our registration or order forms, we encrypt that information using secure socket layer technology (SSL). To learn more about how we help protect you and your privacy, visit our <a href="">Security Center</a>.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Tell-A-Friend</h1>\r\n\r\n<p>If you choose to use our referral service to tell a friend about our site, we will ask you for your friend&#39;s name and email address. We will automatically send your friend a one-time email inviting him or her to visit our site. TribalSquare does not store and only uses this information for the sole purpose of sending this one-time email.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Agents/Service Providers</h1>\r\n\r\n<p>We use third parties such as a credit card processing company to bill you for services. When you sign up for our service, we will share only that specific personally identifiable information as necessary for the third party to provide that service. These third parties are prohibited from using your personally identifiable information for promotional purposes.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Widgets</h1>\r\n\r\n<p>Our website includes Widgets, which are interactive mini-programs that run on our site to provide specific services from another company (e.g. allowing you to share a profile with your FaceBook or Twitter account). Personally identifiable information, such as your email address, may be collected through the Widget. Cookies may also be set by the Widget to enable it to function properly. Information collected by this Widget is governed by the privacy policy of the company that created it.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Control of Your Password</h1>\r\n\r\n<p>You may not disclose your password to any third parties or share it with any third parties. If, despite the foregoing, you lose control of your password, you may lose substantial control over your personally identifiable information and may be subject to legally binding actions taken on your behalf. Therefore, if your password has been compromised for any reason, you should immediately change your password.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Research</h1>\r\n\r\n<p>We also may conduct occasional online surveys. If you choose to participate, you&#39;ll be prompted to answer a series of online questions. Your responses are confidential and will be used for statistical analysis only; no information on an individual&#39;s preferences will be shared with any outside organization.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Tracking Technologies</h1>\r\n\r\n<p>Technologies such as: cookies, beacons, tags and scripts are used by TribalSquare and our marketing and analytics partners. These technologies are used in analyzing trends, administering the site, tracking user&#39;s movements around the site and to gather demographic information about our user base as a whole. We may receive reports based on the use of these technologies by these companies on an individual as well as aggregated basis.<br />\r\n<br />\r\nWe use cookies to help members move faster through our site. When a member signs on to TribalSquare we may pass a cookie to that user&#39;s computer. A cookie is a string of information that&#39;s sent by a website and stored on your hard drive or temporarily in your computer&#39;s memory. This avoids the potentially time-consuming task of entering your user name and password each time a page is requested. Data contained in the cookies is encrypted and is not linked to personally identifiable information. Users can control the use of cookies at the individual browser level. If you reject cookies, you may still use our site, but your ability to use some features or areas of our site may be limited.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Advertising</h1>\r\n\r\n<p>We partner with a third party to either display advertising on our Web site or to manage our advertising on other sites. Our third party partner may use technologies such as cookies to gather information about your activities on this site and other sites in order to provide you advertising based upon your browsing activities and interests. If you wish to not have this information used for the purpose of serving you interestbased ads, you may opt-out by in your Account profile setting. Please note this does not opt you out of being served ads. You will continue to receive generic ads.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Local Storage</h1>\r\n\r\n<p>We use Local Storage Objects (LSOs) such as HTML5 to store session content information and preferences. Third parties with whom we partner to provide certain features on our site or to display advertising based upon your Web browsing activity use LSOs such as HTML 5 or Flash to collect and store information. Various browsers may offer their own management tools for removing HTML5 LSOs. To manage Flash LSOs please click here: <a href="">http://www.macromedia.com/support/documentation/en/flashplayer/help/settin gs_manager07.html</a>.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Log Files</h1>\r\n\r\n<p>As is true of most web sites, we gather certain information automatically and store it in log files. This information may include internet protocol (IP) addresses, browser type, internet service provider (ISP), referring/exit pages, operating system, date/time stamp, and/or clickstream data. We may combine this automatically collected log information with other information we collect about you. We do this to improve services we offer you and site functionality.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Data Retention</h1>\r\n\r\n<p>We will retain your information for as long as your account is active or as needed to provide you services. If you wish to cancel your account or request that we no longer use your information to provide you services contact our Customer Support team by email, phone or U.S. mail. We will retain and use your information as necessary to comply with our legal obligations, resolve disputes, and enforce our agreements.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Changes in this Privacy Policy</h1>\r\n\r\n<p>If we decide to change our privacy policy, we will post those changes to this privacy policy, and other places we deem appropriate so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we disclose it.<br />\r\n<br />\r\nWe reserve the right to modify this privacy policy at any time, so please review it frequently. If we make material changes to this policy, we will notify you here or by email prior to the change becoming effective.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap">\r\n<h1>Contact Us</h1>\r\n\r\n<p>If you have any questions or suggestions regarding our privacy policy, please contact our support team at <a href="mailto:support@tribalsquare.com">support@tribalsquare.com</a>.&nbsp;TribalSquare may change its Privacy Policy from time to time, so please check back periodically.</p>\r\n</div>\r\n', '2015-06-01 09:05:40', '2015-06-01 15:05:40'),
(3, 'Refund Policy', '<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h1 style="text-align:center">Refund Policy</h1>\r\n\r\n<h3 style="color:inherit; font-style:normal; text-align:start">Membership Subcriptions</h3>\r\n\r\n<p>There are no refunds on membership subscriptions, application fees or program fees. Once TribalSquare has received payment for a subscription term, you are granted full access to either the TribalDeals, TribalListings and TribalSitter sites, based on your selection and term. Paid subscriptions cannot be put on hold and &quot;banked&quot; for use at a later time. If you deactivate your profile or cancel your account, your subscription term will still expire based on the number of consecutive calendar days from the date your most recent subscription or renewal term took effect. TribalSquare does not provide a pro-rated refund for unused subscription terms. Membership subscriptions, application fees and program fees are final.</p>\r\n</div>\r\n\r\n<div class="row privacy_content_wrap" style="box-sizing: border-box; margin-right: 0px; margin-left: 0px; color: rgb(51, 51, 51); font-family: HelveticaNeueRoman; font-size: 14px; line-height: 20px; text-align: start;">\r\n<h3 style="color:inherit; font-style:normal; text-align:start">TribalDeals</h3>\r\n\r\n<p>If you used a Local TribalDeal voucher or coupon before its promotional value expired, and were disappointed by your experience, contact us within fourteen days of your voucher or coupon use, and tell us about it. We&rsquo;ll work with you to make it right.</p>\r\n</div>\r\n', '2015-06-01 09:03:30', '2015-06-01 15:03:30'),
(4, 'contact_us_location', 'Ahmedabad Central Bus Station, Jagannathji Road, Gita Mandir, Ahmedabad, Gujarat, India', '2015-06-02 07:16:59', '2015-06-02 13:16:59'),
(5, 'contact_us_phone', '1234567890', '2015-06-01 19:37:40', '2015-06-01 19:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

DROP TABLE IF EXISTS `days`;
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

DROP TABLE IF EXISTS `day_shifts`;
CREATE TABLE IF NOT EXISTS `day_shifts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `day_id` int(11) DEFAULT '0',
  `shift_id` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=286 ;

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
(179, 20, 6, 7, '2015-04-03 13:14:14', '2015-04-03 13:14:14'),
(180, 20, 1, 1, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(181, 20, 2, 1, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(182, 20, 3, 1, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(183, 20, 4, 1, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(184, 20, 5, 1, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(185, 20, 6, 1, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(186, 20, 7, 1, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(187, 20, 1, 2, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(188, 20, 3, 2, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(189, 20, 4, 2, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(190, 20, 6, 2, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(191, 20, 1, 3, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(192, 20, 2, 3, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(193, 20, 3, 3, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(194, 20, 5, 3, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(195, 20, 6, 3, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(196, 20, 7, 3, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(197, 20, 1, 4, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(198, 20, 2, 4, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(199, 20, 4, 4, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(200, 20, 2, 5, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(201, 20, 4, 5, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(202, 20, 5, 5, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(203, 20, 6, 5, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(204, 20, 7, 5, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(205, 20, 1, 6, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(206, 20, 3, 6, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(207, 20, 5, 6, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(208, 20, 7, 6, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(209, 20, 1, 7, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(210, 20, 3, 7, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(211, 20, 4, 7, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(212, 20, 6, 7, '2015-04-09 17:27:33', '2015-04-09 17:27:33'),
(213, 76, 1, 1, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(214, 76, 3, 1, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(215, 76, 5, 1, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(216, 76, 7, 1, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(217, 76, 2, 2, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(218, 76, 5, 2, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(219, 76, 7, 2, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(220, 76, 2, 3, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(221, 76, 4, 3, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(222, 76, 6, 3, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(223, 76, 1, 4, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(224, 76, 3, 4, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(225, 76, 6, 4, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(226, 76, 3, 5, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(227, 76, 5, 5, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(228, 76, 7, 5, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(229, 76, 2, 6, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(230, 76, 5, 6, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(231, 76, 6, 6, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(232, 76, 3, 7, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(233, 76, 5, 7, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(234, 76, 7, 7, '2015-05-15 19:23:51', '2015-05-15 19:23:51'),
(235, 86, 1, 1, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(236, 86, 4, 1, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(237, 86, 7, 1, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(238, 86, 1, 2, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(239, 86, 2, 2, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(240, 86, 5, 2, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(241, 86, 6, 2, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(242, 86, 1, 3, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(243, 86, 3, 3, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(244, 86, 5, 3, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(245, 86, 6, 3, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(246, 86, 1, 4, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(247, 86, 2, 4, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(248, 86, 4, 4, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(249, 86, 5, 4, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(250, 86, 7, 4, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(251, 86, 3, 5, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(252, 86, 5, 5, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(253, 86, 7, 5, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(254, 86, 2, 6, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(255, 86, 4, 6, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(256, 86, 6, 6, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(257, 86, 1, 7, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(258, 86, 3, 7, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(259, 86, 5, 7, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(260, 86, 7, 7, '2015-05-18 19:52:42', '2015-05-18 19:52:42'),
(261, 132, 1, 1, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(262, 132, 3, 1, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(263, 132, 5, 1, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(264, 132, 7, 1, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(265, 132, 2, 2, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(266, 132, 4, 2, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(267, 132, 6, 2, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(268, 132, 1, 3, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(269, 132, 3, 3, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(270, 132, 5, 3, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(271, 132, 7, 3, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(272, 132, 2, 4, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(273, 132, 4, 4, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(274, 132, 6, 4, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(275, 132, 1, 5, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(276, 132, 3, 5, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(277, 132, 5, 5, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(278, 132, 7, 5, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(279, 132, 2, 6, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(280, 132, 4, 6, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(281, 132, 6, 6, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(282, 132, 1, 7, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(283, 132, 3, 7, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(284, 132, 5, 7, '2015-05-30 19:28:56', '2015-05-30 19:28:56'),
(285, 132, 7, 7, '2015-05-30 19:28:56', '2015-05-30 19:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

DROP TABLE IF EXISTS `deals`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `title`, `user_id`, `category_id`, `start_date`, `end_date`, `original_price`, `new_price`, `discount_percentage`, `description`, `available_stock`, `fineprint`, `location`, `street1`, `street2`, `state`, `city`, `country`, `pin`, `lat`, `long`, `website`, `email`, `contact`, `is_approved_by_admin`, `deleted_at`, `created_at`, `updated_at`, `is_deal_of_the_day`) VALUES
(1, 'Deal123', 2, 1, '2015-05-04', '2015-05-09', 100.00, 50.00, 50, 'test deal - 1&nbsp;', 12, 'test deal - 1', 'Ahmedabad Central Bus Station, Jagannathji Road, Gita Mandir, Ahmedabad, Gujarat, India', '', 'Jagannathji Road', 'GJ', 'Ahmedabad', 'India', '380001', '', '', 'www.google.com', 'niyati.tps@gmail.com', '1234567890', 0, NULL, '2015-03-16 19:49:14', '2015-06-02 14:32:56', 0),
(2, 'Regal Touch Unisex Salon', 2, 3, '2015-03-16', '2015-03-20', 100.00, 80.00, 20, '<div class="highlight" style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"><h4 style="line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">Highlight</h4><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>Located at Panjrapole</li><li>Experienced in providing hair care and styling services</li><li>Unisex offer</li><li>Inclusive of all taxes and service charges</li></ul><h2 style="font-weight: bold; line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">Offer Details</h2><p><strong>Offer is on a choice of salon services:</strong></p><p></p><p><strong><em>Valid for Men</em></strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li><strong>Offer 1 - Rs.99:</strong>&nbsp;Oil Head Massage &amp; Steam (30min) + Shave</li></ul><p></p><p><strong><em>Valid&nbsp;for Men &amp; Women</em></strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li><strong>Offer 2&nbsp;-&nbsp;Rs.199:</strong>&nbsp;Advanced Haircut + Hair Wash + Conditioning + Blast-Dry + Head Massage (15min)</li><li><strong>Offer 3&nbsp;-&nbsp;Rs.299:</strong>&nbsp;L’Oreal Hair Spa with&nbsp;Steam Head Massage&nbsp;+ Hair Wash + Conditioning&nbsp;+ Blast-Dry</li></ul></div><div class="description" style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"><p>Don’t stress over your tress. Get the make-over you have been longing for with today’s Groupon to&nbsp;Regal Touch Unisex Salon.</p><p></p><h2 style="font-weight: bold; line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">The Deal</h2><p><strong>Choose from the following offers for 1 person:</strong></p><p><strong>Offer 1 (Valid for Men) - Rs.99 instead of Rs.320:</strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>Oil Head Massage &amp; Steam (30min)</li><li>Shave</li></ul><p></p><p><strong>Offer 2 (Valid for Men &amp; Women) - Rs.199 instead of Rs.700:</strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>Advanced Haircut</li><li>Hair Wash</li><li>Conditioning</li><li>Blast-Dry</li><li>Head Massage (15min)</li></ul><p></p><p><strong>Offer 3 (Valid for Men &amp; Women) - Rs.299 instead of Rs.1250:</strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>L’Oreal Hair Spa with Steam Head Massage</li><li>Hair Wash</li><li>Conditioning</li><li>Blast-Dry</li></ul><p></p><p><strong>Timings: 11:00AM to 10:00PM</strong></p><p></p><h2 style="font-weight: bold; line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">Groupon Partner: Regal Touch Unisex Salon</h2><p>Located in Ahmedabad,&nbsp;Regal Touch Unisex Salon&nbsp;is a unisex beauty salon that offers a range of wellness and beauty services. The staff here&nbsp;are well trained and offer quality service in a clean and hygienic environment.</p></div>', 5, '<h2 style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; line-height: 22px; color: rgb(51, 51, 51); margin: 8px 0px 12px; font-size: 18px;">What You Get</h2><strong style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;">Offer 1:</strong><span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"></span><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>Oil Head Massage &amp; Steam (30min)</li><li>Shave</li></ul><strong style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;">Offer 2:</strong><span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"></span><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>Advanced Haircut</li><li>Hair Wash</li><li>Conditioning</li><li>Blast-Dry</li><li>Head Massage (15min)</li></ul><strong style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;">Offer 3:</strong><span style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"></span><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>L’Oreal Hair Spa with Steam Head Massage</li><li>Hair Wash</li><li>Conditioning</li><li>Blast-Dry</li></ul><h2 style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; line-height: 22px; color: rgb(51, 51, 51); margin: 8px 0px 12px; font-size: 18px;">Validity</h2><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>Valid until: 29.04.2015</li><li>Valid 7 days a week - 11:00AM to 10:00PM</li><li>Valid for 1 person</li><li>Offer 1 - Valid for men</li><li>Offers 2 &amp; 3 - Valid for men and women</li></ul><h2 style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; line-height: 22px; color: rgb(51, 51, 51); margin: 8px 0px 12px; font-size: 18px;">General Fine Print</h2><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>Prior appointment mandatory (Upon purchase, you will receive a voucher with the reservation number). Rescheduling may result in additional charges</li><li>For weekend appointments, we recommend calling 2-3 days in advance</li><li>Voucher printout is mandatory</li></ul>', 'Jaymangal BRTS Bus Station, 132 Feet Ring Road, Naranpura, Ahmedabad, Gujarat, India', '', '132 Feet Ring Road', 'GJ', 'Ahmedabad', 'India', '380013', '23.057631', '72.54935', 'www.test.com', 'paresh.tps@gmail.com', 'Perry Gold', 0, '2015-04-08 20:02:08', '2015-03-16 20:12:44', '2015-04-08 20:02:08', 0),
(9, 'S30 for Vanity Box with Piano for Kids Dressing1', 4, 5, '2015-03-26', '2015-06-30', 60.00, 30.00, 50, '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Highlights</div><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">Offer is on a Vanity Box with Piano for Kids Dressing</li><li style="margin: 0px; padding: 0px; line-height: 18px;"><strong>Features:</strong></li><li style="margin: 0px; padding: 0px; line-height: 18px;">Beautiful and elegant dresser and mirror play set - Kids Piano Play Set</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Perfect product for your kids’ learning and entertainment activities</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Mirror is adjustable and dresser comes with drawers - Children Keyboard Play Set</li><li style="margin: 0px; padding: 0px; line-height: 18px;">13-key piano. Play hairdryer with real blowing action. Shatterproof plastic mirror. Matching stool</li><li style="margin: 0px; padding: 0px; line-height: 18px;">2 x play lipsticks, 3 x play nail varnish bottles, 1 x comb, 3 x rings, 2 x bracelets, 2 x bobbles</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Free delivery across India</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Inclusive of all taxes and service charges</li></ul>', 5, '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Fine Print<br></div><p style="margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">The merchant is the seller of product(s) under this deal and will be solely responsible for the products sold</p><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><h3 style=" color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Groupon Promise:</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">We offer a 7-day refund guarantee if your product is found to be damaged/defective on arrival. No replacements offered, given limited stock and the nature of our business.</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Click<span class="Apple-converted-space">&nbsp;</span><strong><u><a href="http://blog.groupon.co.in/2012/11/23/groupon-india-return-replacement-and-refund-policy/" target="_blank" style="padding: 0px; text-decoration: none; color: rgb(1, 133, 198);">here</a></u></strong><span class="Apple-converted-space">&nbsp;</span>to read our Returns/Replacement Policy</li></ul><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><h3 style=" color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Delivery Timeline:</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">Expect the product to reach you within 10 days of order</li></ul>', 'New Jersey Avenue Northwest, Washington, DC, United States', '', 'New Jersey Ave NW', 'DC', 'Washington', 'United States', '', '38.9035521', '-77.01411519999999', 'www.test.com', 'pareshgandhi28@gmail.com', '1212121212', 1, NULL, '2015-03-26 19:31:56', '2015-06-02 14:36:44', 0),
(4, '1 Month Yoga Membership at Ruchi Yoga Centre', 2, 1, '0000-00-00', '2015-06-30', 300.00, 250.00, 10, '<div class="highlight" style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"><h4 style="line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">Highlight</h4><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>Pay Rs.299 for 1 Month Yoga Membership (20 Sessions)</li><li><strong>Membership Includes:</strong>&nbsp;</li><li>Basic Training Course</li><li>Yoga Workshop</li><li>Power Yoga</li><li>Pregnancy Yoga</li><li>Iyengar Yoga- Precision in Posture and Breath Control</li><li>Yoga with Props</li><li>Special Meditation</li><li>Yoga Therapy</li><li>Located in Bodakdev</li><li>Inclusive of all taxes and service charges</li></ul></div><div class="description" style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;"><p>Inner peace is hard to come by, requiring complex negotiations between your organs and limbs. Find harmony more easily with yoga with today’s Groupon to Ruchi Yoga Centre.</p><p></p><h2 style="font-weight: bold; line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">The Deal</h2><p><strong>Pay Rs.299 instead of Rs.1200 for 1 Month Yoga Membership (20 Sessions)</strong></p><p></p><p><strong>Membership Includes:</strong>&nbsp;</p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>Basic Training Course</li><li>Yoga Workshop</li><li>Power Yoga</li><li>Pregnancy Yoga</li><li>Iyengar Yoga- Precision in Posture and Breath Control</li><li>Yoga with Props</li><li>Special Meditation</li><li>Yoga Therapy</li></ul><p></p><p><strong>Benefits of Yoga:</strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>Helps Carve out a confident body</li><li>Soothes and Calms your mind</li><li>Makes you more focused</li><li>Weight loss</li><li>Gives Inner Peace and Stress relief</li><li>Improves Immunity</li><li>Energizes and Rejuvenates your body and mind</li><li>Leads to better and more flexibility</li></ul><p>&nbsp;</p><p><strong>Timings:</strong></p><ul style="margin-bottom: 10px; padding-left: 14px !important;"><li>7:00 AM to 8:00 AM (Valid for men and women)</li><li>9:00 AM to 10:00 AM (Valid for women)</li><li>10:00 AM to 11:00 AM (Valid for women)</li><li>3:00 PM to 4:00 PM - Minimum 6 ppl required to start a batch - (Valid for men and women) -</li></ul><p>&nbsp;</p><h2 style="font-weight: bold; line-height: 22px; margin: 8px 0px 12px; font-size: 18px;">Groupon Partner: Ruchi Yoga Centre</h2><p>Located in Bodakdev, Ruchi Yoga Centre focuses on calming techniques to soothe the mind, body and souls of visiting patrons. The centre is headed by Ruchi Lalchandani, who boasts of years of experience in the field.</p></div>', 5, '<h2 style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; line-height: 22px; color: rgb(51, 51, 51); margin: 8px 0px 12px; font-size: 18px;">Validity</h2><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>Valid until: 27.04.2015</li><li>Valid 5 days a week - Not valid on Saturday &amp; Sunday</li><li>Valid for 1 person</li><li>Valid for men and women</li></ul><h2 style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; line-height: 22px; color: rgb(51, 51, 51); margin: 8px 0px 12px; font-size: 18px;">General Fine Print</h2><ul style="margin-bottom: 10px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px; padding-left: 14px !important;"><li>Not valid for existing customers</li><li>The membership tenure will be counted from date of joining.</li><li>Prior appointment mandatory (Upon purchase, you will receive a voucher with the reservation number). Rescheduling may result in additional charges</li><li>Voucher printout is mandatory</li></ul>', 'Bodak Dev Road, Bodakdev, Ahmedabad, Gujarat, India', '', 'Bodak Dev Rd', 'GJ', 'Ahmedabad', 'India', '', '', '', 'www.ruchi.com', 'ruchi@test.com', 'asdf asdf asdf asdf', 1, NULL, '2015-03-16 20:31:02', '2015-05-25 20:00:58', 0),
(5, '$29.90 for 30 Day Unlimited Gym Access and Group Exercise Classes', 4, 1, '2015-03-18', '2015-06-30', 89.00, 30.00, 66, '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Highlights</div><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">Mix and match exercise classes</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Group exercise classes offers variety in a fun environment</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Diverse range of classes include Zumba, Hatha Yoga, Pilates, Bodycombat, Body Sculpting, Indoor Cycling and more</li><li style="margin: 0px; padding: 0px; line-height: 18px;">View more<span class="Apple-converted-space">&nbsp;</span><span style="padding: 0px; text-decoration: none; color: rgb(1, 133, 198);">classes and schedules</span></li><li style="margin: 0px; padding: 0px; line-height: 18px;">Suitable for beginners and advanced students</li><li style="margin: 0px; padding: 0px; line-height: 18px;">World-class exercise equipment, spacious changing rooms and huge group exercise studios</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Voted<span class="Apple-converted-space">&nbsp;</span><a href="http://www.asiaone.com/specials/pca2013/winner.html" style="padding: 0px; text-decoration: none; color: rgb(1, 133, 198);">Best Health and Fitness Provider</a><span class="Apple-converted-space">&nbsp;</span>by AsiaOne readers in 2013</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Voted<span class="Apple-converted-space">&nbsp;</span><a href="http://www.asiaone.com/specials/pca2011/results.html" style="padding: 0px; text-decoration: none; color: rgb(1, 133, 198);">Best Wellness Provider</a><span class="Apple-converted-space">&nbsp;</span>by AsiaOne readers in 2011/2012</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Available at central locations in Orchard, Novena, Raffles Place and Bugis</li></ul>', 5, '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Fine Print</div><em style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Click ''Buy Now!'' for more options.</em><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><h3 style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">General Fine Print</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;"><b>Valid till 20 May 2014</b></li><li style="margin: 0px; padding: 0px; line-height: 18px;"><b>Limit 1 Groupon per person,</b><span class="Apple-converted-space">&nbsp;</span>may buy multiple as gifts</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Valid for first time customers only, aged 21 years and above</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Valid for Singaporeans, PRs and EP holders</li><li style="margin: 0px; padding: 0px; line-height: 18px;">A nominal fee is required for each change of location for Option 1</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Not valid with other discounts and promotions</li></ul><h3 style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Available Locations</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">Bugis Junction Towers, Level 4&nbsp;<br>Tel: 6337 2577</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Ngee Ann City Podium Block Level 8&nbsp;<br>Tel: 6834 2100</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Republic Plaza II Level 14&nbsp;<br>Tel: 6534 0900</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Velocity@Novena Level 3&nbsp;<br>Tel: 6250 2345</li></ul><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><h3 style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Redemption Instructions</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;"><b>Appointment required</b></li><li style="margin: 0px; padding: 0px; line-height: 18px;">Call respective outlets</li><li style="margin: 0px; padding: 0px; line-height: 18px;"><b>Valid ID MUST be presented</b></li></ul>', 'California 1, San Simeon, CA, United States', '', 'California 1', 'CA', 'San Simeon', 'United States', '', '35.6901714', '-121.28685239999999', 'www.test.com', 'paresh.tps@gmail.com', '12312312312', 1, NULL, '2015-03-18 14:17:25', '2015-05-25 20:00:27', 0),
(6, 'Get 50% off on Beauty and Spa Services', 4, 3, '2015-03-18', '2015-06-30', 500.00, 250.00, 50, 'Get 50% off on Beauty and Spa Services Or pay only Rs 2999 for Schwarzkopf Global Hair Color Any Length and Rs 3999 for Hair Rebonding<br>', 5, '- Available on all days. Not Available on Waxing Prior appointment Mandatory. Call the merchant for more details on the Package T&amp;C apply Cannot be clubbed with any other Offer.<br>- This offer cannot be clubbed with other offers. You can download this coupon FREE of cost from dealsandyou.com. You only need to pay Istana Unisex Spa &amp; Salon as per the Offer Details.<br>- This is a limited time offer and subject to approval from the merchant. DealsAndYou does not take any responsibility and/or has no liability if the coupon is not accepted at the outlet. To avoid any confusion, we suggest you to take an appointment or make a reservation and present the coupon before placing the order or consuming any service at the merchant''s outlet.<br>', 'New York, NY, United States', '', '', 'NY', 'New York', 'United States', '', '40.7127837', '-74.00594130000002', 'www.test.com', 'pareshgandhi28@gmail.com', '23423423423', 1, NULL, '2015-03-18 19:15:35', '2015-05-25 19:59:42', 0),
(7, 'NatGeo Kids Magazine: 1-Year Print Subscription', 4, 9, '2015-03-18', '2015-06-30', 75.00, 45.00, 40, '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Highlights</div><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">Enrich young minds with interesting reads</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Informative and engaging features</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Ideal for ages 6-12 years old</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Instill environmental awareness in your child</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Delivered to your doorstep</li></ul>', 5, '<div class="subHeadline" style="font-size: 18px; font-weight: bold; margin-top: 8px; margin-bottom: 13px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Fine Print</div><em style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Click ''Buy Now!'' for more options.</em><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><br style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><h3 style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">General Fine Print</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;"><strong>Valid till 28 Jul 2015</strong></li><li style="margin: 0px; padding: 0px; line-height: 18px;"><strong>Limit 1 Groupon per person</strong>, may buy multiple as gifts</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Voucher includes delivery</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Valid for Singapore addresses only</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Not valid with other discounts and promotions</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Subscription period shall commence from the latest issue, subject to availability</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Please allow at least until the first week of the next month to receive your first copy of the subscription</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Call 6513 4176 for enquiries</li></ul><h3 style="color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Redemption Instructions</h3><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="margin: 0px; padding: 0px; line-height: 18px;">Go to<span class="Apple-converted-space">&nbsp;</span><a href="http://activate.mag-ez.com/redeem/groupon" target="_blank" style="padding: 0px; text-decoration: none; color: rgb(1, 133, 198);">http://activate.mag-ez.com/redeem/groupon</a></li><li style="margin: 0px; padding: 0px; line-height: 18px;">Fill up the online Redemption Submission Form; the following information are required:</li><ul style="list-style: disc; margin: 0px; padding: 0px 0px 0px 14px;"><li style="margin: 0px; padding: 0px; line-height: 18px;">Groupon Voucher Number</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Groupon Security Code</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Your communication address</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Your delivery address</li></ul><li style="margin: 0px; padding: 0px; line-height: 18px;">After filling up the online Redemption Submission Form, hit the Redeem Now button</li><li style="margin: 0px; padding: 0px; line-height: 18px;">You will receive a copy of Redeem Submission Confirmation both on screen and at your email box pending for Subscription Activation</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Upon Subscription Activation you will receive an Order Confirmation Notification email</li><li style="margin: 0px; padding: 0px; line-height: 18px;">Your subscription will commence on the following month which will be reflected on the Order Confirmation Notification</li></ul>', '26 Hanover Walk, Hatfield, Hertfordshire, United Kingdom', '26', 'Hanover Walk', '', 'Hatfield', 'United Kingdom', 'AL10 9EL', '51.7468733', '-0.24074710000002142', 'www.test.com', 'pareshgandhi28@gmail.com', '23423423', 1, NULL, '2015-03-18 19:22:52', '2015-03-18 19:28:19', 0),
(10, 'Bath Robe for Kids', 4, 5, '2015-04-02', '2015-06-30', 500.00, 300.00, 60, '<span id="highlights" style="outline: none; font-family: Arial, Helvetica, sans-serif; font-size: 22px; font-weight: bold; color: rgb(0, 0, 0); text-align: center; padding-left: 54px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Highlights</span><div class="dealContent" style="outline: none; display: block; text-align: left; padding-top: 15px; color: rgb(99, 99, 99); font-family: GothamBook, Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><ul style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; line-height: normal; list-style: none outside none;"><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer is on a Choice of Bath Robes for Kids:</strong></li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 1 – Rs.299:</strong><span class="Apple-converted-space">&nbsp;</span>Blue Kids Bath Robe (Small)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 2 – Rs.299:</strong><span class="Apple-converted-space">&nbsp;</span>Yellow Kids Bath Robe (Small)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 3 – Rs.299:</strong><span class="Apple-converted-space">&nbsp;</span>Green Kids Bath Robe (Small)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 4 – Rs.299:</strong><span class="Apple-converted-space">&nbsp;</span>Pink Kids Bath Robe (Small)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 5 – Rs.399:</strong><span class="Apple-converted-space">&nbsp;</span>White Kids Bath Robe (Large)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 6 – Rs.399:</strong><span class="Apple-converted-space">&nbsp;</span>Pink Kids Bath Robe (Large)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 7 – Rs.399:</strong><span class="Apple-converted-space">&nbsp;</span>Blue Kids Bath Robe (Large)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Offer 8 – Rs.399:</strong><span class="Apple-converted-space">&nbsp;</span>Green Kids Bath Robe (Large)</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;"><strong style="outline: none; color: rgb(0, 0, 0);">Features:</strong></li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;">An amazingly soft bath robe for your little ones along with a strap</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;">Material: 100% cotton</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;">Small Bath Robe (Shoulder x Length/cm): 35 x 41</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;">Large Bath Robe (Shoulder x Length/cm): 43 x 58</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;">Free delivery across India</li><li style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; list-style: circle !important;">Inclusive of all taxes and service charges</li></ul></div>', 20, '<span id="fine" style="outline: none; font-family: Arial, Helvetica, sans-serif; font-size: 22px; font-weight: bold; color: rgb(0, 0, 0); font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Fine Print</span><div class="dealContent" style="outline: none; display: block; text-align: left; padding-top: 15px; color: rgb(99, 99, 99); font-family: GothamBook, Arial, Helvetica, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><p style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black;">The merchant is the seller of product(s) under this deal and will be solely responsible for the products sold</p><p style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black;"><br></p><h2 style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; font-family: GothamBook, Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Delivery Timeline:</h2><h2 style="outline: none; margin: 0px; padding: 0px; border: 0px; color: black; font-family: GothamBook, Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><br></h2><p style=" outline: none; margin: 0px; padding: 0px; border: 0px; color: black; font-family: GothamBook, Arial, Helvetica, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 16px; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Expect the product to reach you within 10 days of order</p></div>', 'New Jersey 17, Paramus, NJ, United States', '', 'Hwy 17', 'NJ', 'Paramus', 'United States', '', '40.944769', '-74.07188480000002', 'www.test.com', 'pareshgandhi28@gmail.com', '23423423423423', 2, NULL, '2015-04-02 19:03:49', '2015-04-02 19:35:05', 0),
(11, 'Vidal Sassoon Color Protect Hair Dryer', 4, 3, '2015-04-06', '2015-06-30', 39.99, 20.02, 50, '<h4 style="box-sizing: border-box; line-height: 1.2; font-weight: 300; margin: 0px 0px 10px; font-size: 24px; color: rgb(51, 51, 51); font-family: OpenSans, ''Helvetica Neue'', Helvetica, Arial, FreeSans, sans-serif; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">Vidal Sassoon Color Protect Hair Dryer</h4><ul style="box-sizing: border-box; margin: 0px 0px 20px; padding-left: 20px; color: rgb(51, 51, 51); font-family: OpenSans, ''Helvetica Neue'', Helvetica, Arial, FreeSans, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 19.5px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="box-sizing: border-box;">Ceramic hair dryer</li><li style="box-sizing: border-box;">Far-infrared technology helps evaporate water quickly and evenly</li><li style="box-sizing: border-box;">Ions seal in hair cuticles to lock in color</li><li style="box-sizing: border-box;">Helps add volume and body to hair</li><li style="box-sizing: border-box;">Two heat and speed settings</li><li style="box-sizing: border-box;">Cold shot button helps set the style</li><li style="box-sizing: border-box;">Included concentrator attachment helps craft precision styles</li><li style="box-sizing: border-box;">Included diffuser attachment for natural curls and waves</li><li style="box-sizing: border-box;">Removable end cap</li><li style="box-sizing: border-box;">Weight: 2.3 lbs.</li><li style="box-sizing: border-box;">Dimensions: 4.38x10.25x11.25</li></ul>', 10, '<ul style="box-sizing: border-box; margin: 0px 0px 20px; padding-left: 20px; color: rgb(51, 51, 51); font-family: OpenSans, ''Helvetica Neue'', Helvetica, Arial, FreeSans, sans-serif; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 19.5px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="box-sizing: border-box;"><span style="color: rgb(0, 0, 0);"><span style="box-sizing: border-box; text-decoration: none;">Free returns</span></span></li><li style="box-sizing: border-box;">Most orders are delivered within 7 business days from the purchase date.<span class="Apple-converted-space">&nbsp;</span><span style="color: rgb(0, 0, 0);"><span style="box-sizing: border-box; text-decoration: none;">Shipping questions?</span></span></li><li style="box-sizing: border-box;">Does not ship to PO boxes/AK/HI/Canada/Puerto Rico</li></ul>', 'Ney Avenue, Yorkville, NY, United States', '', 'Ney Ave', 'NY', 'Utica', 'United States', '13502', '43.103501', '-75.26699100000002', 'www.test.com', 'pareshgandhi28@gmail.com', '23414313241234', 1, NULL, '2015-04-06 13:33:11', '2015-05-22 21:43:52', 0),
(12, '2 Sets (4 tubes) Love Alpha LA729 English Version Mascara Set - Brush on False Eyelashes ', 4, 3, '2015-04-06', '2015-06-30', 12.00, 6.62, 55, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Love Alpha LA729 English Version (Gel &amp; Fiber) Mascara Set</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Brush on False Eyelashes</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">instantly lengthen your eyelash by 100% - 300%</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">2 Sets (4 tubes)</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">ENVIROMENTAL FRIENDLY PACKING</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Love Alpha LA729 English Version (Gel &amp; Fiber) Mascara Set</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Brush on False Eyelashes</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">instantly lengthen your eyelash by 100% - 300%</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">2 Sets (4 tubes)</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">ENVIROMENTAL FRIENDLY PACKING</span></li></ul>', 'United States Botanic Garden, Maryland Avenue Southwest, Washington, DC, United States', '100', 'Maryland Avenue Southwest', 'DC', 'Washington', 'United States', '20024', '38.888132', '-77.01291400000002', 'www.test.com', 'pareshgandhi28@gmail.com', '2459231219812', 1, NULL, '2015-04-06 14:31:04', '2015-05-22 19:19:10', 0);
INSERT INTO `deals` (`id`, `title`, `user_id`, `category_id`, `start_date`, `end_date`, `original_price`, `new_price`, `discount_percentage`, `description`, `available_stock`, `fineprint`, `location`, `street1`, `street2`, `state`, `city`, `country`, `pin`, `lat`, `long`, `website`, `email`, `contact`, `is_approved_by_admin`, `deleted_at`, `created_at`, `updated_at`, `is_deal_of_the_day`) VALUES
(13, 'stila Stay All Day Waterproof Liquid Eye Liner', 4, 3, '2015-04-06', '2015-05-06', 20.00, 19.00, 95, '<span style="color: rgb(17, 17, 17); font-family: Arial, sans-serif; line-height: 19px;">An easy-application, waterproof liquid liner that stays on all day and night. This easy-glide, quick-dry precision liner stays in place until you say when--no smudges, feathering, or running.</span>', 10, '<span style="color: rgb(17, 17, 17); font-family: Arial, sans-serif; line-height: 19px;">Felt tip applicator for easy, precise application. Goes on smoothly, won''t smudge or run.</span>', 'New Zealand Street, Parramatta, New South Wales, Australia', '', 'New Zealand St', 'NSW', 'Parramatta', 'Australia', '2150', '-33.81371', '151.01460139999995', 'www.test.com', 'pareshgandhi28@gmail.com', '25354689872', 0, NULL, '2015-04-06 15:14:30', '2015-04-10 15:45:45', 0),
(14, 'stila Stay All Day Waterproof Liquid Eye Liner', 4, 3, '2015-04-06', '2015-05-06', 20.00, 19.00, 95, '<p class="a-spacing-mini" style="padding: 0px; color: rgb(17, 17, 17); font-family: Arial, sans-serif; line-height: 19px; margin-bottom: 6px !important;">An easy-application, waterproof liquid liner that stays on all day and night. This easy-glide, quick-dry precision liner stays in place until you say when--no smudges, feathering, or running.</p>', 10, '<span style="color: rgb(17, 17, 17); font-family: Arial, sans-serif; line-height: 19px;">Felt tip applicator for easy, precise application. Goes on smoothly, won''t smudge or run.</span>', 'New Zealand Street, Parramatta, New South Wales, Australia', '', 'New Zealand St', 'NSW', 'Parramatta', 'Australia', '2150', '-33.81371', '151.01460139999995', 'www.test.com', 'pareshgandhi28@gmail.com', '253648972', 0, '2015-04-08 19:57:36', '2015-04-06 15:21:45', '2015-04-08 19:57:36', 0),
(15, 'J.cat Beauty Roll It up Auto Lip Pencil Liner All 12 Colors', 4, 3, '2015-04-06', '2015-06-30', 39.99, 20.00, 50, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">All 12 different colors</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">truly high quality auto lip pencil liner</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Long lasting, ease to apply and Automatically</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">crudely free, amazing quaity, Hypoallergenic and affordable price</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">All 12 different colors</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">truly high quality auto lip pencil liner</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Long lasting, ease to apply and Automatically</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">crudely free, amazing quaity, Hypoallergenic and affordable price</span></li></ul>', 'United State Forest Service Road 9500710, Kettle Falls, WA, United States', '', 'United State Forest Service Road 9500710', 'WA', 'Kettle Falls', 'United States', '99141', '48.7369899', '-118.2117609', 'www.test.com', 'pareshgandhi28@gmail.com', '256497823', 1, NULL, '2015-04-06 16:13:08', '2015-04-08 19:59:17', 0),
(16, 'L''Oreal Paris Colour Riche Extraordinaire Lip Color, Rose Symphony, 0.18 Fluid Ounce', 4, 3, '2015-04-06', '2015-05-06', 7.99, 7.97, 100, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Transform lips from ordinary to extraordinary with richer color, smoother lip surface and magnified shine</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Formulated with precious micro-oils and rich color pigments</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Provides the ideal balance of color and care for perfect lips</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Unique soft-touch applicator allows for a silky-smooth, gliding application</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Transform lips from ordinary to extraordinary with richer color, smoother lip surface and magnified shine</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Formulated with precious micro-oils and rich color pigments</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Provides the ideal balance of color and care for perfect lips</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Unique soft-touch applicator allows for a silky-smooth, gliding application</span></li></ul>', 'New Zealand Street, Parramatta, New South Wales, Australia', '', 'New Zealand St', 'NSW', 'Parramatta', 'Australia', '2150', '-33.81371', '151.01460139999995', 'www.test.com', 'pareshgandhi28@gmail.com', '2538567415', 2, NULL, '2015-04-06 16:56:23', '2015-04-07 12:34:42', 0),
(17, 'KingMas Professional 15 Concealer Camouflage Makeup Palette', 4, 3, '2015-04-06', '2015-06-30', 29.99, 3.92, 13, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">15 Concealer Camouflage Makeup Palette</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Perfect for both Professional Salon or Home use!</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">High quality ingredients with silky shine color, can last for all day long!</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">15 colors Camouflage and Concealer Palette has been created for us using the most commonly applied shades</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Ingredients: squalane, octyl Palmitate, beeswax, talc, polymethyl methacrylate, petrolatum, propyl paraben.</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">15 Concealer Camouflage Makeup Palette</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Perfect for both Professional Salon or Home use!</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">High quality ingredients with silky shine color, can last for all day long!</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">15 colors Camouflage and Concealer Palette has been created for us using the most commonly applied shades</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Ingredients: squalane, octyl Palmitate, beeswax, talc, polymethyl methacrylate, petrolatum, propyl paraben.</span></li></ul>', 'New York, IA, United States', '', '', 'IA', 'New York', 'United States', '50238', '40.8516701', '-93.2599318', 'www.test.com', 'pareshgandhi28@gmail.com', '25649887232', 1, NULL, '2015-04-06 17:20:24', '2015-04-08 19:59:39', 0),
(18, 'Bare Escentuals BareMinerals MATTE SPF 15 Foundation, Medium Beige', 4, 3, '2015-04-06', '2015-06-30', 27.99, 26.00, 93, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">93% of women saw minimized pores*</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">85% of women experienced improved skin clarity with continued use*</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">89% said this foundation reduced oily shine throughout the day*</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">*Based on an independent consumer study.</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">93% of women saw minimized pores*</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">85% of women experienced improved skin clarity with continued use*</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">89% said this foundation reduced oily shine throughout the day*</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">*Based on an independent consumer study.</span></li></ul>', 'West New York Avenue, Creston, IA, United States', '', 'W New York Ave', 'IA', 'Creston', 'United States', '50801', '41.0547457', '-94.36853730000001', 'www.test.com', 'pareshgandhi28@gmail.com', '256487925', 1, NULL, '2015-04-06 17:26:27', '2015-04-08 19:31:50', 0),
(19, 'Mood Nail Lacquer Color Changing Nail Polish 6pc Set (6 Different Colors) Full Size Nail Polish', 4, 3, '2015-04-06', '2015-06-30', 32.64, 17.20, 53, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Color Changing Nail Polish</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Made in USA</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Available In 6 Pretty colors</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">NO DBP</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Color Changes as your body temperature changes</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Color Changing Nail Polish</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Made in USA</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Available In 6 Pretty colors</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">NO DBP</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Color Changes as your body temperature changes</span></li></ul>', 'New York Avenue Northwest, Washington, DC, United States', '', 'New York Ave NW', 'DC', 'Washington', 'United States', '', '38.9031706', '-77.0208758', 'www.test.com', 'pareshgandhi28@gmail.com', '25464647823', 1, NULL, '2015-04-06 17:36:24', '2015-05-22 17:56:31', 0),
(20, 'Weslo Cadence G 5.9 Treadmill', 4, 1, '2015-04-06', '2015-06-30', 449.99, 287.00, 64, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Six personal trainer workouts.</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Two-position incline.</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Comfortable cushioning.</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Six personal trainer workouts.</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Two-position incline.</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Comfortable cushioning.</span></li></ul>', 'New York Avenue Northwest, Washington, DC, United States', '', 'New York Ave NW', 'DC', 'Washington', 'United States', '', '38.9031706', '-77.0208758', 'www.test.com', 'pareshgandhi28@gmail.com', '256458597', 1, NULL, '2015-04-06 17:54:11', '2015-04-08 19:59:49', 0),
(21, 'LifeSpan TR1200-DT5 Treadmill Desk', 4, 1, '2015-04-06', '2015-06-30', 1999.99, 1499.00, 75, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Large 46.5" wide x 31" deep worksurface with 16" of adjustable height range to customize to user height</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Large 20" x 56" surface with 300 lb user weight</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Speed range .4 - 4 MPH</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Intelli-guard safety pause stops the treadmill when not in use. Intelli-step counts your steps and displays Step Count on the console</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Low step-up height at 5 inches. Four adjustable leveling feet on treadmill and desktop</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Large 46.5" wide x 31" deep worksurface with 16" of adjustable height range to customize to user height</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Large 20" x 56" surface with 300 lb user weight</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Speed range .4 - 4 MPH</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Intelli-guard safety pause stops the treadmill when not in use. Intelli-step counts your steps and displays Step Count on the console</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Low step-up height at 5 inches. Four adjustable leveling feet on treadmill and desktop</span></li></ul>', 'New York Avenue Northwest, Washington, DC, United States', '', 'New York Ave NW', 'DC', 'Washington', 'United States', '', '38.9031706', '-77.0208758', 'www.test.com', 'pareshgandhi28@gmail.com', '2564556233', 1, NULL, '2015-04-06 18:01:39', '2015-04-08 20:00:00', 0),
(22, 'Superior Running Belt with Reinforced zipper - Water resistant material protects items - 2 ', 4, 1, '2015-04-06', '2015-06-30', 34.99, 14.47, 41, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Imagine 2 lightweight, discreet pockets that expand up to 7.5" wide and 5.5" high ensuring you can fit your phone and waist pouch essentials the iPhone 5s, iPhone 5c, iPhone 5, iPhone 4s, iPhone 4, Samsung Galaxy S4, Samsung Galaxy S3, HTC One and more. You can use one pocket for keys, cash, energy bars and gels, and the other for your phone which enables it to stay scratch-free. It can easily replace a waist pack for women.</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">This running belt for women has a reinforced zipper that withstands intensive use and a heavy-duty buckle eliminating the fear of your items falling out. Gone are the days of having a fanny pack for women for running that is bouncing around and distracting you, discover comfort - no bouncing or chafing which is provided by the strong elastic waistband.</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Backed by a 100% money-back guarantee. Call it a runners belt for women, running gear for women or pouches for running, our customers have written more than 300 rave Amazon reviews.</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Fits women''s waist sizes 28" - 48" allowing more than one person in the household to use it. The water resistant 3-layer TPU pockets on this running pack keep your items safe. Choose your color - Black, Pink, Blue or Yellow - so you''ll match your workout clothes.</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Once you get this running belt, you''ll see that it is perfect for running, biking, hiking or other fitness activities. It can be used as a money belt when travelling as it delivers hidden storage.</span></li></ul>', 'New Zealand Street, Parramatta, New South Wales, Australia', '', 'New Zealand St', 'NSW', 'Parramatta', 'Australia', '2150', '-33.81371', '151.01460139999995', 'www.test.com', 'pareshgandhi28@gmail.com', '2564585978', 1, NULL, '2015-04-06 18:33:57', '2015-04-08 20:00:59', 0),
(23, 'Schwinn 170 Upright Bike', 4, 1, '2015-04-09', '2015-05-09', 650.00, 329.99, 51, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Dual track two LCD window system allows you to monitor up to 13 different display feedbacks</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Schwinn Connect goal tracking and data export keep you up to date on reaching your fitness goals</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">29 programs, 4 user settings and goal tracking are all there to keep you motivated and challenged</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">25 levels of resistance aligned with a high speed high inertia perimeter weighted flywheel make every workout smooth and quiet</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Charging USB port and data exchange</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Dual track two LCD window system allows you to monitor up to 13 different display feedbacks</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Schwinn Connect goal tracking and data export keep you up to date on reaching your fitness goals</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">29 programs, 4 user settings and goal tracking are all there to keep you motivated and challenged</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">25 levels of resistance aligned with a high speed high inertia perimeter weighted flywheel make every workout smooth and quiet</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Charging USB port and data exchange</span></li></ul>', 'Sweezy Lane, San Benito, TX, United States', '', 'Sweezy Ln', 'TX', 'San Benito', 'United States', '78586', '26.1672168', '-97.6412545', 'www.test.com', 'pareshgandhi28@gmail.com', '25666448877', 0, NULL, '2015-04-09 13:46:34', '2015-04-09 13:48:12', 0),
(24, 'Body Champ IT8070 Inversion Therapy Table', 4, 1, '2015-04-09', '2015-06-30', 228.00, 114.00, 50, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Inversion therapy table for elongating spine and relaxing back muscles</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Lower spring-loaded pull pin for easy ankle adjustments; 250-pound capacity</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Safety strap lets you control inverting angles; safety lock keeps table secure</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Folds up for easy storage and transport; U-shaped handrails</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Inversion therapy table for elongating spine and relaxing back muscles</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Lower spring-loaded pull pin for easy ankle adjustments; 250-pound capacity</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Safety strap lets you control inverting angles; safety lock keeps table secure</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Folds up for easy storage and transport; U-shaped handrails</span></li></ul>', 'Sweezy Lane, San Benito, TX, United States', '', 'Sweezy Ln', 'TX', 'San Benito', 'United States', '78586', '26.1672168', '-97.6412545', 'www.test.com', 'pareshgandhi28@gmail.com', '25554443312', 1, NULL, '2015-04-09 14:00:56', '2015-04-10 16:02:40', 0),
(25, 'Weider 40 lb. Chrome Dumbbell Set with Plastic Carry Case', 4, 1, '2015-04-09', '2015-05-09', 150.00, 70.05, 47, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">40-pound chrome weight set</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Two knurled bars and 4 EZ spinlock collars</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Four 4-pound chrome weight plates</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Four 3-pound chrome weight plates</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Includes handy carrying case</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">40-pound chrome weight set</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Two knurled bars and 4 EZ spinlock collars</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Four 4-pound chrome weight plates</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Four 3-pound chrome weight plates</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Includes handy carrying case</span></li></ul>', 'Sweezy Lane, San Benito, TX, United States', '', 'Sweezy Ln', 'TX', 'San Benito', 'United States', '78586', '26.1672168', '-97.6412545', 'www.test.com', 'pareshgandhi28@gmail.com', '2123336648', 0, NULL, '2015-04-09 14:20:00', '2015-04-09 14:20:41', 0),
(26, 'ProGear 190 Space Saver Manual Treadmill with 2 Level Incline and Twin Flywheels', 4, 1, '2015-04-09', '2015-05-09', 200.00, 113.44, 57, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Tested up to 230lbs of user weight</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Steel Frame with powder coated finish, Wide side rails for safety</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Oversized belt rollers provide a very smooth and consistent walking experience</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Incline adjustments feature quick and easy 2 position incline levels of 6 and 10 degrees</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Longer handles with foam grips provide for walking security and loss of balance</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Tested up to 230lbs of user weight</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Steel Frame with powder coated finish, Wide side rails for safety</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Oversized belt rollers provide a very smooth and consistent walking experience</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Incline adjustments feature quick and easy 2 position incline levels of 6 and 10 degrees</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Longer handles with foam grips provide for walking security and loss of balance</span></li></ul>', 'New York, IA, United States', '', '', 'IA', 'New York', 'United States', '50238', '40.8516701', '-93.2599318', 'www.test.com', 'pareshgandhi28@gmail.com', '2544987862', 0, NULL, '2015-04-09 14:38:46', '2015-04-09 14:45:17', 0),
(27, 'Weslo CardioStride 3.0', 4, 1, '2015-04-09', '2015-05-09', 299.00, 139.75, 47, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">SpaceSaver DesignPerfect for storing the treadmill between workouts, this convenient SpaceSaver® Design makes the most of your workout space.</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">LCD WindowMonitor your speed, time, distance, pulse and calories burned with this user-friendly display.</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">43 cm x 104 cm TreadbeltThis treadmill provides all the room you need to run, walk or jog your way to real results.</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">SpaceSaver DesignPerfect for storing the treadmill between workouts, this convenient SpaceSaver® Design makes the most of your workout space.</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">LCD WindowMonitor your speed, time, distance, pulse and calories burned with this user-friendly display.</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">43 cm x 104 cm TreadbeltThis treadmill provides all the room you need to run, walk or jog your way to real results.</span></li></ul>', 'Sweezy Lane, New Salem, MA, United States', '', 'Sweezy Ln', 'MA', 'New Salem', 'United States', '01355', '42.5199799', '-72.26566930000001', 'www.test.com', 'pareshgandhi28@gmail.com', '2363654897', 0, NULL, '2015-04-09 14:56:36', '2015-04-09 14:58:47', 0),
(28, 'Reebok ZigTech 910 Treadmill', 4, 1, '2015-04-09', '2015-05-09', 1299.00, 1059.99, 82, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">ZigTech Cushioning</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">iFit Compatible</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">30 Preset Workout Apps</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Lifetime Frame &amp; Motor Warranty</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">3 Year Parts &amp; 1 Year Labor Warranty</span></li></ul>', 10, '<ul class="a-vertical a-spacing-none" style="margin-left: 18px; color: rgb(148, 148, 148); font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;"><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">ZigTech Cushioning</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">iFit Compatible</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">30 Preset Workout Apps</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">Lifetime Frame &amp; Motor Warranty</span></li><li style="list-style: disc; word-wrap: break-word; margin: 0px;"><span class="a-list-item" style="color: rgb(17, 17, 17);">3 Year Parts &amp; 1 Year Labor Warranty</span></li></ul>', 'Sweetwater, TX, United States', '', '', 'TX', 'Sweetwater', 'United States', '79556', '32.4709519', '-100.40593839999997', 'www.test.com', 'pareshgandhi28@gmail.com', '25897842', 0, NULL, '2015-04-09 15:02:03', '2015-04-09 15:03:03', 0),
(29, 'The Web (Fianna Trilogy) Paperback – January 20, 2015', 4, 9, '2015-04-09', '2015-05-09', 9.99, 8.18, 82, '<p style="margin-top: -4px; margin-bottom: 14px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">The Fianna, legendary Irish warriors, have been magically called from their undying sleep to aid Ireland in its rebellion against Britain. But the Fianna have awakened in New York alongside their bitter enemies, the Fomori. A prophecy demands that a Druid priestess—a&nbsp;<i>veleda</i>—must choose between these two sides. Grace is this&nbsp;<i>veleda</i>.</p><p style="margin-top: -4px; margin-bottom: 14px; padding: 0px; color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">But being the&nbsp;<i>veleda</i>&nbsp;means she must sacrifice her power—and her life—to her choice. On one side are her fiancé, Patrick Devlin, and the Fomori. On the other are the Fianna—and the warrior Diarmid Ua Duibhne, with whom Grace shares an undeniable connection. Patrick has promised to find a way to save her life. In three months, at the ancient ritual, Diarmid must wield the knife that kills her.</p>', 10, '<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Grace doesn’t know whom to trust. As dark forces converge on the city, she struggles to discover the truth about her power. Can she change her own destiny? Can she escape the shadows of the past and reach for a future she could never have imagined?</span>', 'United States Naval Observatory, Massachusetts Avenue Northwest, Washington, DC, United States', '3450', 'Massachusetts Avenue Northwest', 'DC', 'Washington', 'United States', '20392', '38.921674', '-77.06688400000002', 'www.test.com', 'pareshgandhi28@gmail.com', '25643125830', 0, NULL, '2015-04-09 15:19:13', '2015-04-09 15:20:29', 0),
(30, 'JFK and the Unspeakable: Why He Died and Why It Matters ', 4, 9, '2015-04-09', '2015-05-09', 18.00, 10.76, 60, '<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">The acclaimed book Oliver Stone called “the best account I have read of this tragedy and its significance,”&nbsp;</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">JFK and the Unspeakable</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;details not just how the conspiracy to assassinate President John F. Kennedy was carried out, but WHY it was done…and why it still matters today.</span>', 10, '<i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">JFK and the Unspeakable</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;shot up to the top of the bestseller charts when Oliver Stone first brought it to the world’s attention on Bill Maher’s show. Since then, it has been lauded by Mark Lane (author of&nbsp;</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Rush to Judgment</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">, who calls it “an exciting work with the drama of a first-rate thriller”), John Perkins (author of</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Confessions of an Economic Hit Man</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">, who proclaims it is “arguably the most important book yet written about an American president), and Robert F. Kennedy, Jr., who calls it “a very well-documented and convincing portrait…I urge all Americans to read this book and come to their own conclusions.”</span>', 'United States Naval Observatory, Massachusetts Avenue Northwest, Washington, DC, United States', '3450', 'Massachusetts Avenue Northwest', 'DC', 'Washington', 'United States', '20392', '38.921674', '-77.06688400000002', 'www.test.com', 'pareshgandhi28@gmail.com', '232665984221', 0, NULL, '2015-04-09 15:34:51', '2015-04-09 15:44:03', 0),
(31, 'TIME for Kids BIG Book of Why: 1,001 Facts Kids Want to Know', 4, 9, '2015-04-09', '2015-05-09', 19.05, 15.09, 79, '<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Why do we have eyebrows? What''s a black hole and what happens if you fall into one? What''s the fastest a human is capable of running? Why do wet fingers stick to metal in the freezer? Where is the deepest point on Earth? Divided by subject area - humans, animals, environment/nature, technology, and space - and written in an upbeat manner, each answer is accompanied by either a photo or an illustration to show the reasons why. Of course, "Time for Kids" goes beyond answering the question by dipping into the science or history to further explain the answer in an easy-to-follow, straightforward manner. This is a must -have book to satisfy the most curious of kids and provokes a great way to encourage interest and knowledge about a wide range of subjects, as well as to stimulate reading. Kids will be desperate to share what they''ve learned with their parents, teachers, and friends...and anyone else who will listen.</span>', 10, '<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Why do we have eyebrows? What''s a black hole and what happens if you fall into one? What''s the fastest a human is capable of running? Why do wet fingers stick to metal in the freezer? Where is the deepest point on Earth? Divided by subject area - humans, animals, environment/nature, technology, and space - and written in an upbeat manner, each answer is accompanied by either a photo or an illustration to show the reasons why. Of course, "Time for Kids" goes beyond answering the question by dipping into the science or history to further explain the answer in an easy-to-follow, straightforward manner. This is a must -have book to satisfy the most curious of kids and provokes a great way to encourage interest and knowledge about a wide range of subjects, as well as to stimulate reading. Kids will be desperate to share what they''ve learned with their parents, teachers, and friends...and anyone else who will listen.</span>', 'Australia Avenue, Sydney Olympic Park, New South Wales, Australia', '', 'Australia Ave', 'NSW', 'Sydney Olympic Park', 'Australia', '2127', '-33.8477672', '151.07289820000005', 'www.test.com', 'pareshgandhi28@gmail.com', '32546857922', 0, NULL, '2015-04-09 16:07:46', '2015-04-09 16:08:27', 0),
(32, 'The Tale of Peter Rabbit Story Board...', 4, 9, '2015-04-09', '2015-05-09', 6.99, 5.92, 85, '<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Finally,&nbsp;</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">The Tale of Peter Rabbit</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;is available in a colorful board book. This generously sized book tells Beatrix Potter''s famous tale of naughty Peter Rabbit''s adventures in Mr. McGregor''s garden. Young children will be enchanted by the simple text and beautiful illustrations, which bring a classic story vibrantly to life. The board book format is sturdy and accessible, perfect for young readers, but adults will enjoy it too for bed-time read-aloud. As a board book,&nbsp;</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">The Tale of Peter Rabbit</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;will captivate children and offer them an early introduction to the world of Peter Rabbit and all his friends.</span>', 10, '<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Finally,&nbsp;</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">The Tale of Peter Rabbit</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;is available in a colorful board book. This generously sized book tells Beatrix Potter''s famous tale of naughty Peter Rabbit''s adventures in Mr. McGregor''s garden. Young children will be enchanted by the simple text and beautiful illustrations, which bring a classic story vibrantly to life. The board book format is sturdy and accessible, perfect for young readers, but adults will enjoy it too for bed-time read-aloud. As a board book,&nbsp;</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">The Tale of Peter Rabbit</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;will captivate children and offer them an early introduction to the world of Peter Rabbit and all his friends.</span>', 'New Zealand Road, Cardiff, United Kingdom', '', 'New Zealand Rd', '', 'Cardiff', 'United Kingdom', 'CF14 3BS', '51.4997628', '-3.1906770000000506', 'www.test.com', 'pareshgandhi28@gmail.com', '565232158562', 0, NULL, '2015-04-09 16:17:34', '2015-04-09 16:18:08', 0),
(33, '101 Great Science Experiments test 101 Great Science Experiments 101 Great Science Experiments Expe', 4, 9, '2015-04-09', '2015-06-30', 9.99, 8.08, 81, '<p><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Whether you''re looking for science project ideas for the science fair or you just want fun science experiments to do with your child to encourage learning at home,&nbsp;</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">101 Great Science Experiments</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;is a fun and comprehensive science experiment resource jam-packed with great ideas. The book includes plenty of experiments for parents and children to do together, but for kids who want more independence, it also includes experiments that can be done by children alone.</span><br></p>', 10, '<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Organized into 11 different science subjects,&nbsp;</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">101 Great Science Experiments</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;includes experiments for almost any interest area. Photos and illustrations make each process clear and accessible for children and parents.&nbsp;</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">101 Great Science Experiments</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;has been a classic for families looking for science fair and science project ideas since 1993, and this new version has been updated, expanded, and improved for the next generation of young scientists.</span>', 'Australia Avenue, Sydney Olympic Park, New South Wales, Australia', '', 'Australia Ave', 'NSW', 'Sydney Olympic Park', 'Australia', '2127', '-33.8477672', '151.07289820000005', 'www.test.com', 'pareshgandhi28@gmail.com', '432512363500', 1, NULL, '2015-04-09 16:31:00', '2015-04-10 16:00:11', 0);
INSERT INTO `deals` (`id`, `title`, `user_id`, `category_id`, `start_date`, `end_date`, `original_price`, `new_price`, `discount_percentage`, `description`, `available_stock`, `fineprint`, `location`, `street1`, `street2`, `state`, `city`, `country`, `pin`, `lat`, `long`, `website`, `email`, `contact`, `is_approved_by_admin`, `deleted_at`, `created_at`, `updated_at`, `is_deal_of_the_day`) VALUES
(34, 'Making Simple Robots: Exploring Cutting-Edge Robotics with Everyday Stuff', 4, 9, '2015-04-09', '2015-05-09', 24.99, 18.62, 75, '<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Making Simple Robots is based on one idea: Anybody can build a robot! That includes kids, school teachers, parents, and non-engineers. If you can knit, sew, or fold a flat piece of paper into a box, you can build a no-tech robotic part. If you can use a hot glue gun, you can learn to solder basic electronics into a low-tech robot that reacts to its environment. And if you can figure out how to use the apps on your smart phone, you can learn enough programming to communicate with a simple robot.</span><br style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">', 10, '<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Making Simple Robots is based on one idea: Anybody can build a robot! That includes kids, school teachers, parents, and non-engineers. If you can knit, sew, or fold a flat piece of paper into a box, you can build a no-tech robotic part. If you can use a hot glue gun, you can learn to solder basic electronics into a low-tech robot that reacts to its environment. And if you can figure out how to use the apps on your smart phone, you can learn enough programming to communicate with a simple robot.</span><br style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">', 'New York Avenue Northwest, Washington, DC, United States', '', 'New York Ave NW', 'DC', 'Washington', 'United States', '', '38.9031706', '-77.0208758', 'www.test.com', 'pareshgandhi28@gmail.com', '32487566252', 0, NULL, '2015-04-09 16:41:38', '2015-04-09 16:43:22', 0),
(35, 'Until Today! : Daily Devotions for Spiritual Growth and Peace of Mind', 4, 9, '2015-04-09', '2015-05-09', 16.99, 11.11, 65, '<p><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Shift your attitude and live your best life with this inspiring collection of 365 daily devotionals from&nbsp;</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">New York Times</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">bestselling author and star of the OWN Network’s hit show</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Iyanla: Fix My Life</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">.</span>&nbsp;&nbsp;<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;"></span></p>', 10, '<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">If there are situations, circumstances, or perhaps relationships in your life that you have been struggling to overcome, trying to work through, or doing your best to work around, throw your head back and declare to the universe, “Until Today!”</span><br style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">', 'United Nations Plaza, New York, NY, United States', '', 'United Nations Plaza', 'NY', 'New York', 'United States', '', '40.7505781', '-73.9685495', 'www.test.com', 'pareshgandhi28@gmail.com', '325654225542', 0, NULL, '2015-04-09 17:09:17', '2015-04-09 17:13:07', 0),
(36, 'Triassic Terrors', 4, 9, '2015-04-09', '2015-05-09', 13.95, 9.21, 66, '<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Learn all about the terrifying dinosaurs of the Triassic Period with this jam-packed educational activity book. Beautifully rendered drawings, engrossing puzzles, fun facts; it''s more than enough to keep any dinosaur-obsessed child occupied for an era of their own. The first in a series of activity books covering the three periods of dinosaur life on this planet,&nbsp;</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Triassic Terrors</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;will be followed by books on the Jurassic and Cretaceous periods to make a comprehensive series of toothy, gnarly, and brainy fun!</span>', 10, '<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">With highly detailed, beautifully vivid artwork from the young and incredibly talented British illustrator Isaac Lenkiewicz, and content conceived and written with the consultation of leading dinosaur artist Jon Sibbick and a paleontologist from the University of Cambridge,&nbsp;</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Triassic Terrors</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;will enthrall children and educate dinosaur crazy kids in equal measure.</span>', 'New Zealand Avenue, Walton-on-Thames, United Kingdom', '', 'New Zealand Ave', '', 'Walton-on-Thames', 'United Kingdom', '', '51.3845823', '-0.4224234000000706', 'www.test.com', 'pareshgandhi28@gmail.com', '325212652', 0, NULL, '2015-04-09 17:22:57', '2015-04-09 17:24:13', 0),
(37, 'Keep Quiet', 4, 9, '2015-04-09', '2015-05-09', 15.99, 10.71, 67, '<i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">New York Times</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;bestselling and Edgar Award-winning author Lisa Scottoline is loved by millions of readers for her suspenseful novels about family and justice. Scottoline delivers once again with</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;Keep Quiet</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">, an emotionally gripping and complex story about one man''s split-second decision to protect his son -and the devastating consequences that follow.</span>', 10, '<span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">"Scottoline has written another winning novel of unparalleled suspense. Fans of psychological suspense and family dynamics will want to snap this one up." -</span><i style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">Library Journal</i><span style="color: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 14px; line-height: 22.3999996185303px;">&nbsp;(starred review)</span>', 'New York Street, Quasqueton, IA, United States', '', 'New York St', 'IA', 'Quasqueton', 'United States', '52326', '42.391006', '-91.75917959999998', 'www.test.com', 'pareshgandhi28@gmail.com', '20323012504', 0, NULL, '2015-04-09 17:28:30', '2015-04-09 17:29:22', 0),
(38, 'Boys'' 18 Inch Hot Wheels Bike', 4, 5, '2015-04-09', '2015-06-30', 89.99, 79.98, 89, '<span style="color: rgb(51, 51, 51); font-family: Avenir-Book; font-size: 12px; line-height: 16px;">Your little man will love cruising around on this Dynacraft 18" Hot Wheels Bike. The bike features an authentic Hot Wheels graphic design for a super-cool look, and he can rev the handlebar grip for real motorcycle sounds. The steel frame and steel rims with two-tone tires offer lasting durability, while the Hot Wheels handlebar shield and matching safety pads complete the theme. The coaster and front caliper brakes provide excellent stopping power for clean, simple stops. The alloy quick-release seat post provides easy height adjustments and allows the bike to grow with your child, while the training wheels provide help with balance as your child learns to ride.</span>', 10, '<span style="color: rgb(51, 51, 51); font-family: Avenir-Book; font-size: 12px; line-height: 16px;">Your little man will love cruising around on this Dynacraft 18" Hot Wheels Bike. The bike features an authentic Hot Wheels graphic design for a super-cool look, and he can rev the handlebar grip for real motorcycle sounds. The steel frame and steel rims with two-tone tires offer lasting durability, while the Hot Wheels handlebar shield and matching safety pads complete the theme. The coaster and front caliper brakes provide excellent stopping power for clean, simple stops. The alloy quick-release seat post provides easy height adjustments and allows the bike to grow with your child, while the training wheels provide help with balance as your child learns to ride.</span>', 'High Street, Boston, MA, United States', '', 'High St', 'MA', 'Boston', 'United States', '02110', '42.35523389999999', '-71.05400859999997', 'www.test.com', 'pareshgandhi28@gmail.com', '325641222851', 1, NULL, '2015-04-09 18:02:44', '2015-04-10 16:04:22', 0),
(39, 'Boys'' 18 Inch Avigo Extreme AOX 1.8 Bike', 4, 5, '2015-04-09', '2015-06-30', 99.99, 89.98, 90, '<span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">The Avigo 18 inch Boys AOX1.8 Bike has a freestyle frame; four bolt stem with rotor;front and rear brakes and front and rear pegs.</span><br style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;"><br style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;"><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Toys''R''Us is the exclusive home for great deals on durable and economical kid''s bikes and adult bicycles from&nbsp;</span><b style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Avigo</b><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">. From the first ride-on training wheels to perfecting BMX stunts,&nbsp;</span><b style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Avigo</b><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">&nbsp;girls and boys model bikes come in all of today''s coolest styles as well as traditional designs at the right price for growing children. Built with the latest bicycle safety features, long-lasting quality and trademark Toys''R''Us money saving value, there is an&nbsp;</span><b style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Avigo</b><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">&nbsp;bike just waiting for you to get on and ride!</span>', 10, '<span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">The Avigo 18 inch Boys AOX1.8 Bike has a freestyle frame; four bolt stem with rotor;front and rear brakes and front and rear pegs.</span><br style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;"><br style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;"><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Toys''R''Us is the exclusive home for great deals on durable and economical kid''s bikes and adult bicycles from&nbsp;</span><b style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Avigo</b><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">. From the first ride-on training wheels to perfecting BMX stunts,&nbsp;</span><b style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Avigo</b><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">&nbsp;girls and boys model bikes come in all of today''s coolest styles as well as traditional designs at the right price for growing children. Built with the latest bicycle safety features, long-lasting quality and trademark Toys''R''Us money saving value, there is an&nbsp;</span><b style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Avigo</b><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">&nbsp;bike just waiting for you to get on and ride!</span>', 'Yonkers City School District, New Place, Yonkers, NY, United States', '', 'New Pl', 'NY', 'Yonkers', 'United States', '10704', '40.90532', '-73.85987599999999', 'www.test.com', 'pareshgandhi28@gmail.com', '3125346822', 1, NULL, '2015-04-09 18:13:38', '2015-05-22 21:43:56', 0),
(40, 'Totally Me Fashion Angels Watercolor Portfolio', 4, 7, '2015-04-09', '2015-05-09', 9.99, 7.98, 80, '<p><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Bring these animal images to life with watercolor paints to create an adorable collection of posters with the Totally Me designed by Fashion Angels Watercolor Portfolio. This set comes with 8 illustrated posters with silver foil accents. Set includes: 8 pre-printed posters, 10 water color paints, paint brush, and instructions.</span><br></p>', 10, '<span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Bring these animal images to life with watercolor paints to create an adorable collection of posters with the Totally Me designed by Fashion Angels Watercolor Portfolio. This set comes with 8 illustrated posters with silver foil accents. Set includes: 8 pre-printed posters, 10 water color paints, paint brush, and instructions.</span>', 'Sweezy Lane, New Salem, MA, United States', '', 'Sweezy Ln', 'MA', 'New Salem', 'United States', '01355', '42.5199799', '-72.26566930000001', 'www.test.com', 'pareshgandhi28@gmail.com', '5232114622', 0, NULL, '2015-04-09 18:27:38', '2015-04-09 18:28:16', 0),
(41, 'Crayola Ultimate 3D Art Set', 4, 7, '2015-04-09', '2015-05-09', 19.99, 17.99, 90, '<span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Crayola Backyard Bash Ultimate Art Set for hours of outdoor fun! Large plastic bucket contains: 3D chalk sets which allows you to create large designs that really "pop"! 3D chalk set includes, 5 dual-ended sidewalk chalk sticks, 1 pair 3D glasses. 3 chalk tools include wide writer, tri-writer, and blender let you create unique chalk effects. 20 sidewalk chalk sticks, enough chalk for hours of outdoor fun! 2 sidewalk paints to create big art. All Crayola outdoor products spray away with water for easy clean up.</span><br style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">', 10, '<div id="Description" style="margin-bottom: 30px; color: rgb(51, 51, 51); font-family: Avenir-Book; font-size: 12px; line-height: normal;"><p style="color: rgb(65, 64, 66); line-height: 20px; margin-bottom: 5px;">From its earliest beginnings, Crayola has been a color company. Crayola came into being when cousins Edwin Binney and C. Harold Smith took over Edwin''s father''s pigment business in 1885. More than 120 years later, color - along with creativity, learning and most of all, fun - is the hallmark of Crayola''s company. Crayola has called Easton, Pennsylvania its home since the early 1900s. Today, the Crayola''s world headquarters and major manufacturing facilities are located there. And downtown Easton is the home of The Crayola FACTORY, a one-of-a-kind celebration of creative fun for everyone. In 1984, Crayola became a wholly-owned subsidiary of Hallmark Cards and has since Crayola has played the lead role in Hallmark''s personal development strategies.</p><div><br></div></div><div id="AddnInfo" style="margin-bottom: 30px; color: rgb(51, 51, 51); font-family: Avenir-Book; font-size: 12px; line-height: normal;"></div>', 'Sweezy Ave, Middletown, NY, United States', '', 'Sweezy Ave', 'NY', 'Middletown', 'United States', '10940', '41.456848', '-74.436262', 'www.test.com', 'pareshgandhi28@gmail.com', '32533852522', 0, NULL, '2015-04-09 18:35:51', '2015-04-11 17:03:35', 0),
(42, 'Imaginarium Poster Deco Kit', 4, 7, '2015-04-09', '2015-05-09', 9.99, 4.98, 50, '<span style="color: rgb(51, 51, 51); font-family: Avenir-Book; font-size: 12px; line-height: normal;">The only place to find&nbsp;</span><b style="color: rgb(51, 51, 51); font-family: Avenir-Book; font-size: 12px; line-height: normal;">Imaginarium</b><span style="color: rgb(51, 51, 51); font-family: Avenir-Book; font-size: 12px; line-height: normal;">&nbsp;educational toys, play sets and more is at Toys''R''Us! Imaginarium offers classic toys for today''s kids, designed for hands-on discovery and open-ended play. Imaginarium leads to learning and fun, with 6 different worlds of play. EXPRESS: All aboard, for trains, themed sets and play tables. DISCOVERY: Classic wooden toys, puzzles and building sets. PRETEND: Wooden dollhouses, play sets, dress up and play tents. CREATIONS: Express yourself with art supplies, activity kits and easels! LEARNING: Back to basics and new product formats that make learning fun! HOME: Get organized! Children''s furniture with storage solutions for play spaces anywhere in the home.</span>', 10, '<span style="color: rgb(51, 51, 51); font-family: Avenir-Book; font-size: 12px; line-height: normal;">The only place to find&nbsp;</span><b style="color: rgb(51, 51, 51); font-family: Avenir-Book; font-size: 12px; line-height: normal;">Imaginarium</b><span style="color: rgb(51, 51, 51); font-family: Avenir-Book; font-size: 12px; line-height: normal;">&nbsp;educational toys, play sets and more is at Toys''R''Us! Imaginarium offers classic toys for today''s kids, designed for hands-on discovery and open-ended play. Imaginarium leads to learning and fun, with 6 different worlds of play. EXPRESS: All aboard, for trains, themed sets and play tables. DISCOVERY: Classic wooden toys, puzzles and building sets. PRETEND: Wooden dollhouses, play sets, dress up and play tents. CREATIONS: Express yourself with art supplies, activity kits and easels! LEARNING: Back to basics and new product formats that make learning fun! HOME: Get organized! Children''s furniture with storage solutions for play spaces anywhere in the home.</span>', 'Sweezy Avenue, Freeport, NY, United States', '', 'Sweezy Ave', 'NY', 'Freeport', 'United States', '11520', '40.6507663', '-73.59800940000002', 'www.test.com', 'pareshgandhi28@gmail.com', '232589974', 0, NULL, '2015-04-09 18:43:36', '2015-04-09 18:44:46', 0),
(43, 'Crayola 3D Glitter Chalk', 4, 7, '2015-04-09', '2015-05-09', 5.99, 1.98, 33, '<span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Add a little sparkle to your big outdoor art and then watch it "pop" in 3-D! These colorful sidewalk chalk sticks create bold lines with cool, glittery effects that catch the sunlight. Put on the included 3-D glasses for amazing, dimensional effects! Includes 5 sticks of Glitter Sidewalk Chalk and 3-D glasses.</span>', 10, '<span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Add a little sparkle to your big outdoor art and then watch it "pop" in 3-D! These colorful sidewalk chalk sticks create bold lines with cool, glittery effects that catch the sunlight. Put on the included 3-D glasses for amazing, dimensional effects! Includes 5 sticks of Glitter Sidewalk Chalk and 3-D glasses.</span>', 'New Walk Terrace, York, United Kingdom', '', 'New Walk Terrace', '', 'York', 'United Kingdom', 'YO10 4BG', '53.9500236', '-1.076306299999942', 'www.test.com', 'pareshgandhi28@gmail.com', '5456252451', 0, NULL, '2015-04-09 18:47:39', '2015-04-11 17:03:13', 0),
(44, 'Imaginarium 30-Piece Glitter Glue Set', 4, 7, '2015-04-09', '2015-05-09', 9.99, 7.98, 80, '<span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">The Imaginarium 30-Piece Glitter Glue Set contains a wide spectrum of colors and lets you add some sparkle to all of your art projects. The glue dries within 30 minutes and is easily washable with soap and water.&nbsp;</span><br style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;"><br style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;"><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Each tube includes 0.37 fl. oz. of glitter glue.&nbsp;</span>', 10, '<span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">The only place to find&nbsp;</span><b style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Imaginarium</b><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">&nbsp;educational toys, play sets and more is at Toys''R''Us! Imaginarium offers classic toys for today''s kids, designed for hands-on discovery and open-ended play. Imaginarium leads to learning and fun, with 6 different worlds of play. EXPRESS: All aboard, for trains, themed sets and play tables. DISCOVERY: Classic wooden toys, puzzles and building sets. PRETEND: Wooden dollhouses, play sets, dress up and play tents. CREATIONS: Express yourself with art supplies, activity kits and easels! LEARNING: Back to basics and new product formats that make learning fun! HOME: Get organized! Children''s furniture with storage solutions for play spaces anywhere in the home.</span>', 'New York, IA, United States', '', '', 'IA', 'New York', 'United States', '50238', '40.8516701', '-93.2599318', 'www.test.com', 'pareshgandhi28@gmail.com', '25654851226', 0, NULL, '2015-04-09 18:55:33', '2015-04-09 18:56:58', 0),
(45, 'Totally Me! Pretty Petals Set', 4, 7, '2015-04-09', '2015-05-09', 9.99, 4.98, 50, '<ul style="margin-bottom: 5px; padding-left: 35px; line-height: 20px; color: rgb(51, 51, 51); font-family: Avenir-Book; font-size: 12px;"><li>Includes three sets of petal/leaf molds, 8 cups of paint, 4 cups of glitter paint, 8 stems/stamens, tissue paper, coated wire, a paint brush ribbon and instructions</li><li>Use wire and paint to mimic the look of stained glass and create 8 beautiful flowers</li><li>Molds are shaped as petals and leaves</li><li>Personalize your design with tons of different colors; glitter paint adds extra fun</li><li>Finished flowers are approximately 7 inches long</li><li>Package Dimensions: 11.75 x 10 x 2 inches</li></ul>', 10, '<ul style="margin-bottom: 5px; padding-left: 35px; line-height: 20px; color: rgb(51, 51, 51); font-family: Avenir-Book; font-size: 12px;"><li>Includes three sets of petal/leaf molds, 8 cups of paint, 4 cups of glitter paint, 8 stems/stamens, tissue paper, coated wire, a paint brush ribbon and instructions</li><li>Use wire and paint to mimic the look of stained glass and create 8 beautiful flowers</li><li>Molds are shaped as petals and leaves</li><li>Personalize your design with tons of different colors; glitter paint adds extra fun</li><li>Finished flowers are approximately 7 inches long</li><li>Package Dimensions: 11.75 x 10 x 2 inches</li></ul>', 'New York County, NY, United States', '', '', 'NY', '', 'United States', '', '40.7830603', '-73.97124880000001', 'www.test.com', 'pareshgandhi28@gmail.com', '2564851231', 0, NULL, '2015-04-09 19:00:37', '2015-04-09 19:01:12', 0),
(46, 'Imaginarium Crackle Paint - Friends', 4, 7, '2015-04-09', '2015-06-30', 9.99, 7.98, 80, '<span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Create and paint a world of beautiful animals with the Imaginarium Crackle Paint Friends. Three artistic steps are needed to transform 4 paper animals into awesome 3-D figures! Fold, apply base paint, then paint with crackle paint and watch your 3-D figures transform! The fun''s not over when the animals are completed-time to play! Create, paint, play! CRACKLE PAINT!</span>', 10, '<span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">The Imaginarium Crackle Paint Friends include:</span><br style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;"><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">4 paper animals- butterfly, dolphin, chick, unicorn</span><br style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;"><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">5 crackle paint colors- red, yellow, blue, white, pink</span><br style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;"><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">2 pots of base paint</span><br style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;"><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">1 paint brush</span><br style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;"><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Instruction sheet</span><br style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;"><span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">5+</span>', 'Boston Logan International Airport, Harborside Drive, Boston, MA, United States', '1', 'Harborside Drive', 'MA', 'Boston', 'United States', '02128', '42.365613', '-71.00955999999996', 'www.test.com', 'pareshgandhi28@gmail.com', '325642598', 1, NULL, '2015-04-09 19:06:34', '2015-04-10 16:05:35', 0),
(47, 'Hero of Color City Jumbo Coloring Pad', 4, 7, '2015-04-10', '2015-06-30', 5.99, 1.98, 33, '<span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Ages 4+ 20 Coloring Pages! Color your favorite color city characters and scenes! 20 Pages 19.5 in X 13.5 in. (49.5 CM X 34 CM), sticker sheet. 20 pages of coloring fun! Includes sticker sheet! For use with crayons, markers and pencils!</span>', 10, '<span style="color: rgb(65, 64, 66); font-family: Avenir-Book; font-size: 12px; line-height: 20px;">Ages 4+ 20 Coloring Pages! Color your favorite color city characters and scenes! 20 Pages 19.5 in X 13.5 in. (49.5 CM X 34 CM), sticker sheet. 20 pages of coloring fun! Includes sticker sheet! For use with crayons, markers and pencils!</span>', 'New Lane, York, United Kingdom', '', 'New Ln', '', 'Huntington', 'United Kingdom', 'YO32 9PS', '53.9862312', '-1.0590491000000384', 'www.test.com', 'pareshgandhi28@gmail.com', '2531566522', 1, NULL, '2015-04-10 14:27:07', '2015-04-10 15:51:04', 0),
(48, 'test', 4, 1, '2015-04-17', '2015-04-24', 12.00, 1.00, 8, 'sfads', 12, 'df', 'Acharya Narendradev Nagar, Ahmedabad, Gujarat, India', '', '', 'GJ', 'Ahmedabad', 'India', '380015', '23.0249923', '72.53896869999994', 'sfa', 'a@b.com', '1234567890', 0, '2015-04-11 17:04:28', '2015-04-11 17:02:40', '2015-04-11 17:04:28', 0),
(49, 'Hoho', 47, 1, '2015-04-16', '2015-04-30', 100.00, 30.00, 30, '<p>achikiri kpom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', 2, 'achikirikpom', 'Atlanta, GA, United States', '', '', 'GA', 'Atlanta', 'United States', '', '33.7489954', '-84.3879824', 'www.atl.com', 'kingarthurventures@gmail.com', '7707888', 0, NULL, '2015-04-17 08:25:36', '2015-04-17 08:27:01', 0),
(50, 'Yvolution Y Velo Twista', 4, 5, '2015-04-30', '2015-06-30', 50.00, 20.00, 40, '<p style="text-align: justify;"><span style="font-family: Arial;"><span style="color: rgb(65, 64, 66); font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; display: inline ! important; float: none;">The Y Velo Twista is the latest advancement in balance bikes. This 2-in-1 training bike to balance bike grows with a child as they build confidence and develop their steering and balance skills. It features innovative wheel adjustment technology that gives kids two ways to ride. Stage 1, Training mode, allows the bike''s double rear wheels more separation to give toddlers extra stability as they learn to balance and ride. As a child gets older and their motor skills advance, parents can easily switch to Stage 2, Balance Bike mode, using Yvolution''s "Twist &amp; Click" feature. The rear wheels will move closer together, allowing the child to progress with their balance skills as they run and cruise. Kids who ride balance bikes are more likely to start riding regular two-wheeled pedal bikes without the use of outdated training wheels or stabilizers. Y Velo Twista features a height-adjustable cushioned seat and adjustable handle bars as well as shock-absorbing rubber wheels. Ages 2+ (max weight 44 lbs).</span></span></p><h3 style="text-align: justify;"><span style="font-family: Arial;"><span style="color: rgb(0, 0, 255);"><span style="text-decoration: underline;"><span style="font-weight: bold;">Additional Info</span></span></span><br></span></h3><p class="sknText" style="color: rgb(65, 64, 66); line-height: 20px; margin: 0px 0px 5px; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; text-align: justify;"><span style="font-family: Arial;"><label style="clear: left; color: rgb(51, 51, 51); float: left; margin: 0px 5px 0px 0px; padding: 0px; text-align: right;">“R”Web#:</label><span class="value">115586</span></span></p><p class="skuText" style="color: rgb(65, 64, 66); line-height: 20px; margin: 0px 0px 5px; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; text-align: justify;"><span style="font-family: Arial;"><label style="clear: left; color: rgb(51, 51, 51); float: left; margin: 0px 5px 0px 0px; padding: 0px; text-align: right;">SKU:</label><span class="value">2FDF6D96</span></span></p><p class="upc" style="color: rgb(65, 64, 66); line-height: 20px; margin: 0px 0px 5px; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; text-align: justify;"><span style="font-family: Arial;"><label style="clear: left; color: rgb(51, 51, 51); float: left; margin: 0px 5px 0px 0px; padding: 0px; text-align: right;">UPC/EAN/ISBN:</label><span class="value">810118024412</span></span></p><p style="color: rgb(65, 64, 66); line-height: 20px; margin: 0px 0px 5px; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; text-align: justify;"><span style="font-family: Arial;"><label style="clear: left; color: rgb(51, 51, 51); float: left; margin: 0px 5px 0px 0px; padding: 0px; text-align: right;">Manufacturer #:</label>100545</span></p><p style="color: rgb(65, 64, 66); line-height: 20px; margin: 0px 0px 5px; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; text-align: justify;"><span style="font-family: Arial;"><label style="clear: left; color: rgb(51, 51, 51); float: left; margin: 0px 5px 0px 0px; padding: 0px; text-align: right;">Product Weight:</label>10.4&nbsp;pounds</span></p><p style="color: rgb(65, 64, 66); line-height: 20px; margin: 0px 0px 5px; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; text-align: justify;"><span style="font-family: Arial;"><label style="clear: left; color: rgb(51, 51, 51); float: left; margin: 0px 5px 0px 0px; padding: 0px; text-align: right;">Product Dimensions (in inches):</label>23.7 x 13.8 x 7.0</span></p>', 10, '<p style="text-align: justify;"></p><p style="text-align: justify;"></p><p style="text-align: justify;"></p><h3 style="text-align: justify;"><span style="font-family: Arial;"><span style="background-color: rgb(255, 255, 255);"><span style="color: rgb(0, 0, 255);"><span style="text-decoration: underline;"><span style="font-weight: bold;">Shipping info:</span></span></span></span></span></h3><div style="text-align: justify;"><span style="font-family: Arial;"><span style="color: rgb(51, 51, 51);">- This item can be shipped to the entire United States including Alaska, Hawaii, and all U.S. territories including Puerto Rico</span></span><br><span style="font-family: Arial;"><span style="color: rgb(51, 51, 51);">- This item can also be shipped to APO/FPO addresses and to P.O. Boxes in all 50 states</span></span><br><span style="font-family: Arial;"><span style="color: rgb(51, 51, 51);"></span></span><br><span style="font-family: Arial;"></span></div><h3 style="text-align: justify;"><span style="font-family: Arial;"><span style="background-color: rgb(255, 255, 255);"><span style="color: rgb(0, 0, 255);"><span style="text-decoration: underline;"><span style="font-weight: bold;">Shipping Methods:</span></span></span></span></span></h3><p style="text-align: justify;"><span style="font-family: Arial;"><span style="background-color: rgb(255, 255, 255);"><span style="color: rgb(0, 0, 255);"><span style="color: rgb(0, 0, 0);">- This item may be shipped via Standard Shipping, Expedited Shipping or Express Shipping<br>- Please Note: Some addresses are eligible for Standard Shipping only (APO/FPO, P.O. Boxes, U.S. Territories and Puerto Rico)</span><span style="text-decoration: underline;"><span style="font-weight: bold;"></span></span></span></span><br></span></p><p style="text-align: justify;"></p>', '5th Avenue, Manhattan, NY, United States', '', '5th Ave', 'NY', 'Manhattan', 'United States', '10018', '40.7318461', '-73.99667579999999', 'www.http://tpstracker.com/demo/tribalsquare', 'pareshgandhi28@gmail.com', '1234567890', 1, NULL, '2015-04-30 17:40:36', '2015-04-30 18:32:35', 0),
(51, 'Smart Trike Touch Steering Spirit - Navy', 4, 5, '2015-04-30', '2015-06-30', 60.00, 30.00, 50, '<div style="text-align: justify;">The Smart Trike 3-in-1 Trike grows with your child by easily converting from a safe and comfortable baby tricycle to an independent tricycle. The Smart Trike 3-in-1 Trike features telescopic steering and adjustable removable handle, press out clutch for freewheeling and has a detachable adjustable canopy. The Smart Trike 3-in-1 Trike also features a long back support, a seat belt and a safety bar, non slip pedals, a removable hand rest protector, tipping bucket and a foldable footrest. The Smart Trike 3-in-1 Trike is constructed of full metal and has blow molded plastic wheels with rubber coating for better road performance. Adult assembly required.<br><br><h3><span style="color: rgb(0, 0, 255);"><span style="text-decoration: underline;"><span style="font-weight: bold;">Additional Info</span></span></span></h3>“R”Web#:963025<br>SKU:45A6FB38<br>UPC/EAN/ISBN:4897025793996<br>Manufacturer #: 6752502<br>Child Weight Max: 38 lbs<br>Product Weight:1.6 pounds<br>Product Dimensions (in inches):23.2 x 16.9 x 8.3<br></div>', 10, '<p><h3><span style="color: rgb(0, 0, 255);"><span style="text-decoration: underline;">Shipping Info:</span></span></h3>- This item can be shipped to the entire United States including Alaska, Hawaii, and all U.S. territories including Puerto Rico<br>- This item can also be shipped to APO/FPO addresses and to P.O. Boxes in all 50 states<br><br><h3><span style="color: rgb(0, 0, 255);"><span style="background-color: rgb(255, 255, 255);"><span style="text-decoration: underline;">Shipping Methods:</span></span></span></h3>- This item may be shipped via Standard Shipping, Expedited Shipping or Express Shipping<br>- Please Note: Some addresses are eligible for Standard Shipping only (APO/FPO, P.O. Boxes, U.S. Territories and Puerto Rico)<br></p><p><br></p><h3><span style="color: rgb(0, 0, 255);"><span style="text-decoration: underline;">Store Pickup:</span></span></h3><p><br>- This item is sold in our stores<br>- Orders placed for Store Pickup will receive online pricing and promotions<br>- In-stock status is approximate and may not reflect recent sales<br>- Not all items are carried at all stores. Please click the "Select a store" link to check product availability<br></p>', 'Street Road, Bensalem, PA, United States', '', 'Street Rd', 'PA', 'Bensalem', 'United States', '', '40.103539', '-74.95007609999999', 'http://tpstracker.com/demo/tribalsquare', 'pareshgandhi28@gmail.com', '7897897897', 1, NULL, '2015-04-30 18:45:40', '2015-05-27 12:36:43', 0),
(52, 'Two 90-Minute Specialty Massages at Betty Silvira', 4, 3, '2015-04-30', '2015-06-30', 100.00, 40.00, 40, '<h4 style="text-align: justify;"><span style="color: rgb(0, 0, 255);">A Chat with Betty Silvira, LMT - Li’ilani Restorative Therapies<br><br></span></h4><div style="text-align: justify;"><span style="font-weight: bold;">What services does your business offer and what makes your business stand out from the competition?</span><br>Hawaiian Lomi Lomi Bodywork is deeply effective in restoring balance, helping to relieve chronic pain and increasing circulation. Even recreational athletes may find relief from the discomfort of rigorous training and sport specific aches and pains.<br><span style="font-weight: bold;"></span><br><span style="font-weight: bold;"></span></div><h4 style="text-align: justify;">What was the inspiration to start or run this business?</h4><div style="text-align: justify;">I love helping people feel better. Lomi Lomi, Reiki, Myofascial Release and Sports Massage are powerful tools which help to restore balance.<br><br></div><h4 style="text-align: justify;">What do you love most about your job?</h4><div style="text-align: justify;">Helping people feel better.<br><br></div><h4 style="text-align: justify;">What is the best reaction you’ve ever gotten from a customer?</h4><div style="text-align: justify;">Magic hands!<br></div>', 10, '<div style="text-align: justify;">Expires 120 days after purchase. Appointment required, same day appointments accepted. Merchant''s standard cancellation policy applies (any fees not to exceed Groupon price). Limit 1 per person, may buy 1 additional as a gift. Valid only for option purchased. Merchant is solely responsible to purchasers for the care and quality of the advertised goods and services.</div>', '9191 Old Seward Highway, Anchorage, AK, United States', '9191', 'Old Seward Hwy', 'AK', 'Anchorage', 'United States', '99515', '61.1379993', '-149.86292379999998', 'www.test.com', 'pareshgandhi28@gmail.com', '8888888888', 1, NULL, '2015-04-30 18:59:08', '2015-05-25 20:02:02', 0),
(53, 'Tranquil Spa offers the ultimate top-to-toe treatments', 4, 3, '2015-04-30', '2015-06-30', 80.00, 20.00, 25, '<h4><span style="text-decoration: underline;"><span style="font-weight: bold;">A Chat with Betty Silvira, LMT - Li’ilani Restorative Therapies</span></span></h4><br><span style="font-weight: bold;">What services does your business offer and what makes your business stand out from the competition?</span><br>Hawaiian Lomi Lomi Bodywork is deeply effective in restoring balance, helping to relieve chronic pain and increasing circulation. Even recreational athletes may find relief from the discomfort of rigorous training and sport specific aches and pains.<br><br><span style="font-weight: bold;">What was the inspiration to start or run this business?</span><br>I love helping people feel better. Lomi Lomi, Reiki, Myofascial Release and Sports Massage are powerful tools which help to restore balance.<br><br><span style="font-weight: bold;">What do you love most about your job?</span><br>Helping people feel better.<br><br><span style="font-weight: bold;">What is the best reaction you’ve ever gotten from a customer?</span><br>Magic hands!<br>', 10, 'Expires 120 days after purchase. Appointment required, same day \nappointments accepted. Merchant''s standard cancellation policy applies \n(any fees not to exceed Groupon price). Limit 1 per person, may buy 1 \nadditional as a gift. Valid only for option purchased. Merchant is \nsolely responsible to purchasers for the care and quality of the \nadvertised goods and services.', 'Highway 1, Old Seward, Ninilchik, AK, United States', '', 'Hwy 1', 'AK', '', 'United States', '', '61.8010916', '-147.55971499999998', 'www.test.com', 'pareshgandhi28@gmail.com', '8878787887', 2, NULL, '2015-04-30 19:16:54', '2015-04-30 19:25:06', 0),
(54, 'Variety of objects to decorate the snow family', 4, 7, '2015-04-30', '2015-06-30', 75.00, 30.00, 40, '<div style="text-align: justify;">I love the book Snowballs by Lois Ehlert!&nbsp; In it, children make a family of snow people, then use a variety of objects to decorate the snow family.&nbsp; I especially love the illustrations, as they’re a mix of photos and art.<br><br>With some classes in the past, I’ve done a fun art project based on Snowballs.&nbsp; First, I read the book to the students a few times over multiple days.&nbsp; Then I asked the children to share what they would use to decorate a snow family.&nbsp; The group discussions were rather amusing, especially when the children started naming random household items (like toasters)!<br></div>', 10, '<div style="text-align: justify;">After the discussion, I introduced the art/craft project.&nbsp; I explained that we would use different materials to make our own snow people, just like Lois Ehlert did in her book.&nbsp; I showed them the materials we could work with — large white paper plates, glue, and artsy bits-and-bobs on hand at the school (shells, flattened marbles, doll hair, buttons, sticks, ribbons, beads, etc.).&nbsp; I also had a hot glue gun for me to use if the materials required it.</div>', 'Ney Avenue, Oakland, CA, United States', '', 'Ney Ave', 'CA', 'Oakland', 'United States', '94605', '37.7652994', '-122.16522420000001', 'www.test.com', 'pareshgandhi28@gmail.com', '23423423423', 1, NULL, '2015-04-30 19:38:45', '2015-04-30 19:39:45', 0),
(55, 'Training Sessions at The Midnight Sun Athletic Club (Up to 68% Off)', 4, 1, '2015-04-30', '2015-06-30', 50.00, 34.00, 68, '<div style="text-align: justify;">Bulky upper-body muscles might have hindered early humans who had to chase their prey across the plains, but it could help those who often had to climb trees to adjust their satellite dishes. That’s why the body builds muscle according mostly to use: do enough curls, and the biceps expand.<br><br> As anyone who has experienced post-workout soreness could intuit, those curls are actually a form of controlled damage, making thousands of miniscule tears to the muscle tissue that beckon autoimmune cells to show up alongside testosterone and other hormones. The white blood cells help switch on satellite cells, which are similar to stem cells. Before they’re activated, satellite cells aren’t doing much—instead, they lie dormant around muscle fibers until they’re called into action to repair torn tissue.</div>', 10, '<div style="text-align: justify;">This isn’t the only kind of cellular transformation at work in growing muscles. Long muscle cells, which contain several nuclei, can also begin to change type after a workout. Certain kinds of muscle fibers are equipped to handle brief bursts of effort but will quickly become tired if asked to do more intense work.<br><br>These are the first to disappear as someone starts an exercise routine, as they’re converted into fibers with more endurance. This principle is so dramatic that a sports scientist can generally tell whether someone is a professional athlete or a professional mattress model by examining a minute sample of muscle tissue.</div>', '1800 South Knik-Goose Bay Road, Wasilla, AK, United States', '1800', 'S Knik-Goose Bay Rd', 'AK', 'Wasilla', 'United States', '99654', '61.5630671', '-149.46008080000001', 'www.test.com', 'pareshgandhi28@gmail.com', '3423423423', 1, NULL, '2015-04-30 19:45:10', '2015-05-27 12:36:40', 0),
(56, 'Gymboree HOT FREE Shipping (No Minimum) + 30% Off ENTIRE Purchase!', 4, 5, '2015-04-30', '2015-06-30', 100.00, 30.00, 30, '<div style="text-align: justify;">Gymboree is offering 30% off your entire purchase! Plus, you can get FREE shipping with ANY purchase (no coupon code needed and no minimum)! Of course, that means you can score some amazing deals so be sure to to check out the clearance section too.</div>', 10, '<div style="text-align: justify;">Plus, for every $50 spent at Gymboree right now, you will receive $25 worth of Gymbucks. Gymbucks earned in a store may only be redeemed at Gymboree clothing stores located in the country of issuance or at Gymboree.com if earned at a U.S. store.</div>', 'Ney Lane, Jefferson Hills, PA, United States', '', 'Ney Ln', 'PA', 'Clairton', 'United States', '15025', '40.2970884', '-79.95962409999998', 'www.test.com', 'pareshgandhi28@gmail.com', '234234234', 1, NULL, '2015-04-30 19:55:14', '2015-05-27 18:40:18', 1),
(57, 'Choice of Beauty & Grooming Services at Silver Scissor', 4, 3, '2015-05-09', '2015-06-30', 100.00, 70.00, 30, '<ul style="padding-left: 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: normal;"><li style="margin: 0px; line-height: 18px;">Located in Iscon Mega Mall</li><li style="margin: 0px; line-height: 18px;">Unisex salon</li><li style="margin: 0px; line-height: 18px;">Inclusive of all taxes and service charges</li></ul>', 20, '<ul style="padding-left: 14px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: normal;"><li style="margin: 0px; line-height: 18px;"><strong>Offer 1:</strong>&nbsp;Advanced Style Haircut + Hair Wash + Conditioning + Blow-Dry + Head Massage (15min)</li><li style="margin: 0px; line-height: 18px;"><strong>Offer 2:</strong>&nbsp;Spa Manicure + Spa Pedicure + Massage (45min)</li><li style="margin: 0px; line-height: 18px;"><strong>Offer 3:</strong>&nbsp;L’Oreal Hair Spa + Hair Wash + Conditioning + Dry + Steam + Head Massage (20min)</li><li style="margin: 0px; line-height: 18px;"><strong>Offer 4:</strong>&nbsp;Instant Glow facial + Threading + Waxing (Full Arms, Underarms &amp; Half Legs) + Face &amp; Neck DeTan</li><li style="margin: 0px; line-height: 18px;"><strong>Offer 5:</strong>&nbsp;Advance Haircut + Shampoo Conditioning + Blow-Dry + Spa Manicure + Spa Pedicure+ L''Oreal Hair Spa + Nature''s Facial + Face &amp; Neck DeTan + Waxing (Full arms+Underarms+Half Legs) + Head Massage (Total Duration: 4hr)</li></ul>', 'North New Street, Streeterville, Chicago, IL, United States', '', 'N New St', 'IL', 'Chicago', 'United States', '60611', '41.8895154', '-87.6185304', 'www.test.com', 'pareshgandhi28@gmail.com', '1234567920', 1, NULL, '2015-05-09 16:39:38', '2015-05-27 18:44:00', 1);
INSERT INTO `deals` (`id`, `title`, `user_id`, `category_id`, `start_date`, `end_date`, `original_price`, `new_price`, `discount_percentage`, `description`, `available_stock`, `fineprint`, `location`, `street1`, `street2`, `state`, `city`, `country`, `pin`, `lat`, `long`, `website`, `email`, `contact`, `is_approved_by_admin`, `deleted_at`, `created_at`, `updated_at`, `is_deal_of_the_day`) VALUES
(58, '$62 for a Classic European Facial and Spa Mani-Pedi at G2 Salon ($140 Value)', 4, 3, '2015-05-27', '2015-08-31', 140.00, 62.00, 56, '<ul><li style="text-align: justify;">A spa can be a refuge from the chaos of a busy life or from the chaos of a city slowly being overtaken by hyperintelligent children. Escape the madness with this Groupon.<br><br><h4>The Deal</h4>$62 for a spa package (a $140 total value)<br><br>60-minute Classic European facial (a $70 value)<br>Spa manicure (a $25 value)<br>Spa pedicure (a $45 value)<br><br><h4>G2 Salon</h4>The bold and blocky treatment chairs fit right into a open and modernistic design scheme of G2 Salon, where Gentiana and Christopher Watts lead a trained team of stylists in performing haircare, facials, and bodycare treatments. The team performed hair and makeup services for many of the competitors in the 2011 Mrs. Massachusetts pageant, and they utilize Jealous haircare products with botanical extracts along with restorative L''anza products to keep each of their client''s locks healthy. They offer specialty facials with pure essential oils, deep-exfoliating natural enzymes, and potent antioxidants to brighten skin while also improving tone and texture.</li></ul>', 20, '<div style="text-align: justify;">Promotional value expires 120 days after purchase. Amount paid never expires. Limit 1 per person, may buy 1 additional as gift. Appointment required. Merchant''s standard cancellation policy applies (any fees not to exceed Groupon price). Not valid for wedding parties or groups of 3 or more. Services must be used by the same person. Merchant is solely responsible to purchasers for the care and quality of the advertised goods and services.</div>', '210 Andover Street, Peabody, MA, United States', '210', 'Andover St', 'MA', 'Peabody', 'United States', '01960', '42.5412609', '-70.94396640000002', 'www.test.com', 'pareshgandhi28@gmail.com', '3232323232', 1, NULL, '2015-05-27 12:11:37', '2015-05-27 18:45:17', 1),
(59, 'Video Games, Accessories, and Gaming Consoles at Video Game Depot (50% Off)', 4, 5, '2015-05-27', '2015-08-28', 120.00, 60.00, 50, '<div style="text-align: justify;"><br></div><div style="text-align: justify;">The same passion for classic and vintage video games that led Michael to the finals of a Donkey Kong tournament galvanized him to open Video Game Depot several years later, which he runs with an aim toward holding on to what video gaming used to be. Stepping into the shop is like stepping into an anachronism, where vintage Ataris mingle with PlayStation 4s on the shelves. Michael’s clientele often stop by to trade in old Nintendo Entertainment Systems for other consoles or pocket money for asking out Princess Peach’s less-distressed cousins. The store''s inventory is constantly expanding, with recent additions including game soundtracks, an ever-rotating selection of consoles, and several arcade cabinets such as Donkey Kong and Ms. Pacman. His passion has passed onto his four sons, who help run the store''s websites and counter before the family sets off for home to game together in the evenings.</div>', 30, 'Promotional value expires 180 days after purchase. Amount paid never expires. Limit 1 per person, may buy 1 additional as a gift. Limit 1 per visit. Valid only for option purchased. Must use promotion value in 1 visit. Merchant is solely responsible to purchasers for the care and quality of the advertised goods and services.', '3205 Spenard Rd, Anchorage, AK, United States', '3205', 'Spenard Rd', 'AK', 'Anchorage', 'United States', '99503', '61.1912951', '-149.90602030000002', 'www.test.com', 'pareshgandhi28@gmail.com', '3232402342', 1, NULL, '2015-05-27 12:55:04', '2015-05-27 18:39:39', 1),
(60, 'test', 38, 3, '2015-06-17', '2015-07-15', 10.00, 8.00, 20, '<p>ZDSFAFD&nbsp;&nbsp;&nbsp;&nbsp;</p>', 100, 'ASFASDFASDF.....', '35th St, Ashland, KY, United States', '', '35th St', 'KY', 'Ashland', 'United States', '41101', '38.4656057', '-82.61783230000003', 'RTWERTW1', 'stephen@nettley.com', '9414511646', 0, NULL, '2015-05-29 09:04:59', '2015-05-29 09:05:23', 0),
(61, 'Micro Braids', 37, 57, '2015-06-01', '2015-06-10', 75.00, 45.00, 40, 'Micro Hair Braiding. Bring your own Hair. I have a hair studio and a chair. Braiding Session will take approximately 4hrs.<br>', 1, 'Bring your own hair. I have Peruvian, Indian and Mexican hair for sale. Cash ONLY.<br>', '6926 NE Garfield Ave, Portland, OR, United States', '6926', 'NE Garfield Ave', 'OR', 'Portland', 'United States', '97211', '45.57293199999999', '-122.66207600000001', 'www.braidmyhair.com', 'chikdizzle@gmail.com', '4048081154', 1, NULL, '2015-05-31 04:47:37', '2015-05-31 04:50:41', 0),
(62, 'Piano for Kids Dressing', 4, 5, '2015-06-01', '2015-06-01', 60.00, 30.00, 50, '<ul style="box-sizing: border-box; margin: 0px; color: rgb(51, 51, 51); font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; list-style: disc; padding: 0px 0px 0px 14px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: normal; background-color: rgb(255, 255, 255);"><li style="box-sizing: border-box; margin: 0px; padding: 0px; line-height: 18px;">Offer is on a Vanity Box with Piano for Kids Dressing</li><li style="box-sizing: border-box; margin: 0px; padding: 0px; line-height: 18px;"><strong style="box-sizing: border-box; font-weight: 700;">Features:</strong></li><li style="box-sizing: border-box; margin: 0px; padding: 0px; line-height: 18px;">Beautiful and elegant dresser and mirror play set - Kids Piano Play Set</li><li style="box-sizing: border-box; margin: 0px; padding: 0px; line-height: 18px;">Perfect product for your kids’ learning and entertainment activities</li><li style="box-sizing: border-box; margin: 0px; padding: 0px; line-height: 18px;">Mirror is adjustable and dresser comes with drawers - Children Keyboard Play Set</li><li style="box-sizing: border-box; margin: 0px; padding: 0px; line-height: 18px;">13-key piano. Play hairdryer with real blowing action. Shatterproof plastic mirror. Matching stool</li><li style="box-sizing: border-box; margin: 0px; padding: 0px; line-height: 18px;">2 x play lipsticks, 3 x play nail varnish bottles, 1 x comb, 3 x rings, 2 x bracelets, 2 x bobbles</li><li style="box-sizing: border-box; margin: 0px; padding: 0px; line-height: 18px;">Free delivery across India</li><li style="box-sizing: border-box; margin: 0px; padding: 0px; line-height: 18px;">Inclusive of all taxes and service charges</li></ul>', 1, '<ul style="box-sizing: border-box; margin: 0px; color: rgb(51, 51, 51); font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; list-style: disc; padding: 0px 0px 0px 14px; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: normal; background-color: rgb(255, 255, 255);"><li style="box-sizing: border-box; margin: 0px; padding: 0px; line-height: 18px;">Expect the product to reach you within 10 days of order</li></ul>', '21 Hanover Walk, Hatfield, United Kingdom', '21', 'Hanover Walk', '', 'Hatfield', 'United Kingdom', 'AL10 9EL', '51.7470392', '-0.24027030000002014', 'www.test.com', 'pareshgandhi28@gmail.com', '646546465', 1, NULL, '2015-06-01 15:12:31', '2015-06-01 15:15:13', 0),
(63, 'Piano for Kids Dressing', 4, 5, '2015-06-01', '2015-06-02', 80.00, 30.00, 63, 'asdf asdf&nbsp;', 1, 'as fdasd fads&nbsp;', '26 Chantry Court, Macclesfield, United Kingdom', '26', 'Chantry Ct', '', 'Macclesfield', 'United Kingdom', 'SK11 7RD', '53.2463759', '-2.1244924000000083', 'www.test.com', 'pareshgandhi28@gmail.com', '23423423423', 1, NULL, '2015-06-01 15:23:26', '2015-06-01 15:24:31', 0),
(64, 'Choice of Full Body Massage (75min) + Shower + Farewell Drink', 4, 3, '2015-06-01', '2015-09-17', 180.00, 90.00, 50, '<div class="medium-12 column" style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px 0.5625rem; text-rendering: inherit !important; width: 581.328125px; float: left; position: relative; color: rgb(117, 120, 123); font-family: ''Open Sans'', sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><h5 style="box-sizing: border-box; outline: none; margin: 0.2rem 0px 0.5rem; padding: 0px; font-family: ''Open Sans'', sans-serif; font-weight: 400; font-style: normal; color: rgb(0, 0, 0); text-rendering: inherit !important; line-height: 1.4; font-size: 18px;">Highlights</h5><ul style="box-sizing: border-box; outline: none; margin: 0px 0px 13px 1.1rem; padding: 0px; font-size: 1rem; line-height: 1.6; list-style-position: outside; font-family: inherit; text-rendering: inherit !important;"><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Veda Spa at the Pride Hotel</li><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Unisex offers</li><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Located on Judges Bungalow Road</li><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Inclusive of all taxes and service charges</li></ul></div><div class="medium-12 column" style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px 0.5625rem; text-rendering: inherit !important; width: 581.328125px; float: left; position: relative; color: rgb(117, 120, 123); font-family: ''Open Sans'', sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><h5 style="box-sizing: border-box; outline: none; margin: 0.2rem 0px 0.5rem; padding: 0px; font-family: ''Open Sans'', sans-serif; font-weight: 400; font-style: normal; color: rgb(0, 0, 0); text-rendering: inherit !important; line-height: 1.4; font-size: 18px;">What You Get</h5><strong style="box-sizing: border-box; outline: none; font-weight: bold; line-height: inherit;">Offer 1:</strong><ul style="box-sizing: border-box; outline: none; margin: 0px 0px 13px 1.1rem; padding: 0px; font-size: 1rem; line-height: 1.6; list-style-position: outside; font-family: inherit; text-rendering: inherit !important;"><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Choice of Full Body Massage (75min)</li><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Shower</li><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Farewell Drink</li></ul><strong style="box-sizing: border-box; outline: none; font-weight: bold; line-height: inherit;">Offer 2:</strong><ul style="box-sizing: border-box; outline: none; margin: 0px 0px 13px 1.1rem; padding: 0px; font-size: 1rem; line-height: 1.6; list-style-position: outside; font-family: inherit; text-rendering: inherit !important;"><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Choice of Full Body Massage (90min)</li><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Shower</li><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Farewell Drink</li></ul><strong style="box-sizing: border-box; outline: none; font-weight: bold; line-height: inherit;">Choice of Full Body Massages:</strong><ul style="box-sizing: border-box; outline: none; margin: 0px 0px 13px 1.1rem; padding: 0px; font-size: 1rem; line-height: 1.6; list-style-position: outside; font-family: inherit; text-rendering: inherit !important;"><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Swedish Massage</li><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Aromatherapy Oil Massage</li><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Balinese Massage</li><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Royal Thai Massage</li></ul></div>', 10, '<ul style="box-sizing: border-box; outline: none; margin: 0px 0px 13px 1.1rem; padding: 0px; font-size: 16px; line-height: 1.6; list-style-position: outside; font-family: ''Open Sans'', sans-serif; text-rendering: inherit !important; color: rgb(117, 120, 123); font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);"><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Prior appointment mandatory (Upon purchase, you will receive a voucher with the reservation number). Rescheduling may result in additional charges</li><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">For weekend appointments, we recommend calling 2-3 days in advance</li><li style="box-sizing: border-box; outline: none; margin: 0px; padding: 0px; text-rendering: inherit !important; font-size: 14px; color: rgb(88, 88, 88); line-height: 20px;">Voucher printout is mandatory</li></ul>', 'Wembly Road, New Windsor, NY, United States', '', 'Wembly Rd', 'NY', 'New Windsor', 'United States', '12553', '41.48287819999999', '-74.071933', 'www.test.com', 'pareshgandhi28@gmail.com', '234234234', 1, NULL, '2015-06-01 19:14:55', '2015-06-01 19:42:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deal_images`
--

DROP TABLE IF EXISTS `deal_images`;
CREATE TABLE IF NOT EXISTS `deal_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) DEFAULT '0',
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_cover` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=163 ;

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
(12, 5, 'http://tpstracker.com/demo/tribalsquare/uploads/fitness.jpg', 1, NULL, '2015-03-18 14:17:42', '2015-04-01 16:22:26'),
(13, 5, 'http://tpstracker.com/demo/tribalsquare/uploads/fitness1.jpg', 0, NULL, '2015-03-18 14:17:45', '2015-03-18 14:17:45'),
(14, 5, 'http://tpstracker.com/demo/tribalsquare/uploads/fitness2.jpg', 0, NULL, '2015-03-18 14:17:56', '2015-03-18 14:17:56'),
(15, 5, 'http://tpstracker.com/demo/tribalsquare/uploads/fitness3.jpg', 0, NULL, '2015-03-18 14:18:01', '2015-03-18 14:18:01'),
(16, 6, 'http://tpstracker.com/demo/tribalsquare/uploads/spa4.jpg', 1, NULL, '2015-03-18 19:17:10', '2015-04-01 16:24:46'),
(17, 6, 'http://tpstracker.com/demo/tribalsquare/uploads/spa5.jpg', 0, NULL, '2015-03-18 19:17:12', '2015-03-18 19:17:12'),
(18, 7, 'http://tpstracker.com/demo/tribalsquare/uploads/book2.jpg', 1, NULL, '2015-03-18 19:23:42', '2015-03-18 19:23:47'),
(19, 8, 'http://tpstracker.com/demo/tribalsquare/uploads/Classified Details.png', 1, NULL, '2015-03-23 20:50:23', '2015-03-23 20:51:28'),
(20, 8, 'http://tpstracker.com/demo/tribalsquare/uploads/Lost_Password.png', 0, NULL, '2015-03-23 20:50:50', '2015-03-23 20:50:50'),
(21, 9, 'http://tpstracker.com/demo/tribalsquare/uploads/1426228640458.jpg', 1, NULL, '2015-03-26 19:32:29', '2015-06-02 14:36:44'),
(22, 9, 'http://tpstracker.com/demo/tribalsquare/uploads/8u-700x420.jpg', 0, NULL, '2015-03-26 19:33:09', '2015-03-26 19:33:09'),
(23, 9, 'http://tpstracker.com/demo/tribalsquare/uploads/U1-700x420.jpg', 0, NULL, '2015-03-26 19:33:12', '2015-03-26 19:33:12'),
(24, 10, 'http://tpstracker.com/demo/tribalsquare/uploads/1419916704166.jpg', 1, NULL, '2015-04-02 19:04:12', '2015-04-02 19:04:21'),
(25, 11, 'http://tpstracker.com/demo/tribalsquare/uploads/c700x420.jpg', 1, NULL, '2015-04-06 13:34:42', '2015-04-06 15:30:13'),
(26, 12, 'http://tpstracker.com/demo/tribalsquare/uploads/71E-hfajGfL._SL1200_.jpg', 1, NULL, '2015-04-06 14:48:29', '2015-04-08 19:23:16'),
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
(37, 15, 'http://tpstracker.com/demo/tribalsquare/uploads/81CHZCymQ1L._SL1500_.jpg', 1, NULL, '2015-04-06 16:14:09', '2015-04-08 19:32:53'),
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
(48, 18, 'http://tpstracker.com/demo/tribalsquare/uploads/419IGnbK1wL.jpg', 1, NULL, '2015-04-06 17:26:47', '2015-04-08 19:31:34'),
(49, 19, 'http://tpstracker.com/demo/tribalsquare/uploads/417ebHq0T+L._SY355_.jpg', 1, NULL, '2015-04-06 17:39:35', '2015-04-06 18:35:31'),
(50, 20, 'http://tpstracker.com/demo/tribalsquare/uploads/81Vth-rtcqL._SL1500_.jpg', 1, NULL, '2015-04-06 17:54:29', '2015-04-06 17:55:24'),
(51, 20, 'http://tpstracker.com/demo/tribalsquare/uploads/81iYMQ+lHNL._SL1500_.jpg', 0, NULL, '2015-04-06 17:54:40', '2015-04-06 17:54:40'),
(52, 20, 'http://tpstracker.com/demo/tribalsquare/uploads/816BVeBxwBL._SL1500_.jpg', 0, NULL, '2015-04-06 17:54:57', '2015-04-06 17:54:57'),
(53, 20, 'http://tpstracker.com/demo/tribalsquare/uploads/81UsFBM7ysL._SL1500_.jpg', 0, NULL, '2015-04-06 17:55:10', '2015-04-06 17:55:10'),
(54, 21, 'http://tpstracker.com/demo/tribalsquare/uploads/61dezqvjk4L._SL1000_.jpg', 1, NULL, '2015-04-06 18:11:18', '2015-04-06 18:14:04'),
(55, 21, 'http://tpstracker.com/demo/tribalsquare/uploads/61SIP5JlXgL._SL1019_.jpg', 0, NULL, '2015-04-06 18:12:53', '2015-04-06 18:12:53'),
(56, 21, 'http://tpstracker.com/demo/tribalsquare/uploads/61whwiSZe2L._SL1100_.jpg', 0, NULL, '2015-04-06 18:13:12', '2015-04-06 18:13:12'),
(57, 21, 'http://tpstracker.com/demo/tribalsquare/uploads/61tFoLm4gmL._SL1393_.jpg', 0, NULL, '2015-04-06 18:13:20', '2015-04-06 18:13:20'),
(58, 21, 'http://tpstracker.com/demo/tribalsquare/uploads/51y4RLC7fdL._SL1100_.jpg', 0, NULL, '2015-04-06 18:13:29', '2015-04-06 18:13:29'),
(59, 21, 'http://tpstracker.com/demo/tribalsquare/uploads/61whwiSZe2L._SL1100__1.jpg', 0, NULL, '2015-04-06 18:13:43', '2015-04-06 18:13:43'),
(60, 22, 'http://tpstracker.com/demo/tribalsquare/uploads/71Ww9OvXNHL._SL1500_.jpg', 1, NULL, '2015-04-06 18:34:16', '2015-04-08 20:00:55'),
(61, 22, 'http://tpstracker.com/demo/tribalsquare/uploads/71JfkZ5ARzL._SL1500_.jpg', 0, NULL, '2015-04-06 18:34:27', '2015-04-06 18:34:27'),
(62, 22, 'http://tpstracker.com/demo/tribalsquare/uploads/61zzj4pyUyL._SL1000_.jpg', 0, NULL, '2015-04-06 18:34:44', '2015-04-06 18:34:44'),
(63, 22, 'http://tpstracker.com/demo/tribalsquare/uploads/7104iCRX70L._SL1000_.jpg', 0, NULL, '2015-04-06 18:35:01', '2015-04-06 18:35:01'),
(64, 23, 'http://tpstracker.com/demo/tribalsquare/uploads/71jNe9Xk9+L._SL1500_.jpg', 1, NULL, '2015-04-09 13:46:59', '2015-04-09 13:48:12'),
(65, 23, 'http://tpstracker.com/demo/tribalsquare/uploads/71aePE2C1ZL._SL1500_.jpg', 0, NULL, '2015-04-09 13:47:24', '2015-04-09 13:47:24'),
(66, 23, 'http://tpstracker.com/demo/tribalsquare/uploads/71CoHs6dFhL._SL1500_.jpg', 0, NULL, '2015-04-09 13:47:38', '2015-04-09 13:47:38'),
(67, 23, 'http://tpstracker.com/demo/tribalsquare/uploads/71Mii3SQxoL._SL1500_.jpg', 0, NULL, '2015-04-09 13:47:54', '2015-04-09 13:47:54'),
(68, 24, 'http://tpstracker.com/demo/tribalsquare/uploads/61YJ7PaEaML._SL1500_.jpg', 1, NULL, '2015-04-09 14:02:53', '2015-04-10 16:00:49'),
(69, 24, 'http://tpstracker.com/demo/tribalsquare/uploads/7141Kh6SafL._SL1500_.jpg', 1, NULL, '2015-04-09 14:03:22', '2015-04-10 16:01:23'),
(70, 24, 'http://tpstracker.com/demo/tribalsquare/uploads/71kXdLrvKlL._SL1500_.jpg', 0, NULL, '2015-04-09 14:03:39', '2015-04-09 14:03:39'),
(71, 24, 'http://tpstracker.com/demo/tribalsquare/uploads/71R-DR8LMNL._SL1500_.jpg', 0, NULL, '2015-04-09 14:03:52', '2015-04-09 14:03:52'),
(72, 24, 'http://tpstracker.com/demo/tribalsquare/uploads/71ki-duYCsS._SL1500_.jpg', 0, NULL, '2015-04-09 14:04:12', '2015-04-09 14:04:12'),
(73, 25, 'http://tpstracker.com/demo/tribalsquare/uploads/519m72NQi2L._SX355_.jpg', 1, NULL, '2015-04-09 14:20:23', '2015-04-09 14:20:41'),
(74, 26, 'http://tpstracker.com/demo/tribalsquare/uploads/713Ys49RxPL._SL1500_.jpg', 1, NULL, '2015-04-09 14:43:28', '2015-04-09 14:45:17'),
(75, 26, 'http://tpstracker.com/demo/tribalsquare/uploads/719k+0ODUGL._SL1500_.jpg', 0, NULL, '2015-04-09 14:43:49', '2015-04-09 14:43:49'),
(76, 26, 'http://tpstracker.com/demo/tribalsquare/uploads/8179gyRBSyL._SL1500_.jpg', 0, NULL, '2015-04-09 14:43:59', '2015-04-09 14:43:59'),
(77, 26, 'http://tpstracker.com/demo/tribalsquare/uploads/71Vd+6o4KqL._SL1500_.jpg', 0, NULL, '2015-04-09 14:44:10', '2015-04-09 14:44:10'),
(78, 26, 'http://tpstracker.com/demo/tribalsquare/uploads/71cvFt4-6DL._SL1500_.jpg', 0, NULL, '2015-04-09 14:44:24', '2015-04-09 14:44:24'),
(79, 26, 'http://tpstracker.com/demo/tribalsquare/uploads/81zinC+82EL._SL1500_.jpg', 0, NULL, '2015-04-09 14:44:51', '2015-04-09 14:44:51'),
(80, 27, 'http://tpstracker.com/demo/tribalsquare/uploads/71XAb8E50nL._SL1500_.jpg', 1, NULL, '2015-04-09 14:57:37', '2015-04-09 14:58:47'),
(81, 27, 'http://tpstracker.com/demo/tribalsquare/uploads/71ppYHrb89L._SL1500_.jpg', 0, NULL, '2015-04-09 14:58:10', '2015-04-09 14:58:10'),
(82, 27, 'http://tpstracker.com/demo/tribalsquare/uploads/71+oEnLnkLL._SL1500_.jpg', 0, NULL, '2015-04-09 14:58:17', '2015-04-09 14:58:17'),
(83, 27, 'http://tpstracker.com/demo/tribalsquare/uploads/71Rwg5Zqk3L._SL1500_.jpg', 0, NULL, '2015-04-09 14:58:28', '2015-04-09 14:58:28'),
(84, 27, 'http://tpstracker.com/demo/tribalsquare/uploads/71lwldEeLWL._SL1500_.jpg', 0, NULL, '2015-04-09 14:58:35', '2015-04-09 14:58:35'),
(85, 28, 'http://tpstracker.com/demo/tribalsquare/uploads/81-cOgcPHLL._SL1500_.jpg', 1, NULL, '2015-04-09 15:02:44', '2015-04-09 15:03:03'),
(86, 29, 'http://tpstracker.com/demo/tribalsquare/uploads/cover.jpg', 1, NULL, '2015-04-09 15:19:57', '2015-04-09 15:20:29'),
(87, 29, 'http://tpstracker.com/demo/tribalsquare/uploads/516+wbYDsGL.jpg', 0, NULL, '2015-04-09 15:20:17', '2015-04-09 15:20:17'),
(88, 30, 'http://tpstracker.com/demo/tribalsquare/uploads/51yZhV1YC3L.jpg', 1, NULL, '2015-04-09 15:37:13', '2015-04-09 15:44:03'),
(89, 30, 'http://tpstracker.com/demo/tribalsquare/uploads/51E7fsumIlL._AC_SX60_CR,0,0,60,60_.jpg', 0, NULL, '2015-04-09 15:38:49', '2015-04-09 15:38:49'),
(90, 30, 'http://tpstracker.com/demo/tribalsquare/uploads/51E7fsumIlL.jpg', 0, NULL, '2015-04-09 15:41:39', '2015-04-09 15:41:39'),
(91, 30, 'http://tpstracker.com/demo/tribalsquare/uploads/51E7fsumIlL_1.jpg', 0, NULL, '2015-04-09 15:41:40', '2015-04-09 15:41:40'),
(92, 31, 'http://tpstracker.com/demo/tribalsquare/uploads/51saDZPPHVL.jpg', 1, NULL, '2015-04-09 16:07:59', '2015-04-09 16:08:27'),
(93, 32, 'http://tpstracker.com/demo/tribalsquare/uploads/61osIn5q8GL.jpg', 1, NULL, '2015-04-09 16:17:45', '2015-04-09 16:18:08'),
(94, 32, 'http://tpstracker.com/demo/tribalsquare/uploads/51Irj-19hYL.jpg', 0, NULL, '2015-04-09 16:18:00', '2015-04-09 16:18:00'),
(95, 33, 'http://tpstracker.com/demo/tribalsquare/uploads/610nX0j7mKL.jpg', 1, NULL, '2015-04-09 16:31:39', '2015-04-10 15:56:45'),
(96, 33, 'http://tpstracker.com/demo/tribalsquare/uploads/71B45wpgMkL.jpg', 0, NULL, '2015-04-09 16:32:27', '2015-04-09 16:32:27'),
(97, 33, 'http://tpstracker.com/demo/tribalsquare/uploads/71b98RJOleL.jpg', 0, NULL, '2015-04-09 16:32:39', '2015-04-09 16:32:39'),
(98, 33, 'http://tpstracker.com/demo/tribalsquare/uploads/71LJTF29PkL.jpg', 0, NULL, '2015-04-09 16:32:49', '2015-04-09 16:32:49'),
(99, 33, 'http://tpstracker.com/demo/tribalsquare/uploads/71Q29mf5s-L.jpg', 1, NULL, '2015-04-09 16:33:03', '2015-04-10 15:59:21'),
(100, 33, 'http://tpstracker.com/demo/tribalsquare/uploads/415BjPDEBrL.jpg', 0, NULL, '2015-04-09 16:33:25', '2015-04-09 16:33:25'),
(101, 34, 'http://tpstracker.com/demo/tribalsquare/uploads/91Rxj5+NA-L.jpg', 1, NULL, '2015-04-09 16:42:50', '2015-04-09 16:43:22'),
(102, 34, 'http://tpstracker.com/demo/tribalsquare/uploads/512cU4bTzjL.jpg', 0, NULL, '2015-04-09 16:43:02', '2015-04-09 16:43:02'),
(103, 35, 'http://tpstracker.com/demo/tribalsquare/uploads/51h88NbDqcL_1.jpg', 1, NULL, '2015-04-09 17:12:12', '2015-04-09 17:13:07'),
(104, 35, 'http://tpstracker.com/demo/tribalsquare/uploads/51z5Jo9+PkL.jpg', 0, NULL, '2015-04-09 17:12:30', '2015-04-09 17:12:30'),
(105, 36, 'http://tpstracker.com/demo/tribalsquare/uploads/61w0-OHLw-L.jpg', 1, NULL, '2015-04-09 17:23:45', '2015-04-09 17:24:13'),
(106, 36, 'http://tpstracker.com/demo/tribalsquare/uploads/4179eckTG1L.jpg', 0, NULL, '2015-04-09 17:24:02', '2015-04-09 17:24:02'),
(107, 37, 'http://tpstracker.com/demo/tribalsquare/uploads/81bl54sTBQL.jpg', 1, NULL, '2015-04-09 17:28:40', '2015-04-09 17:29:22'),
(108, 38, 'http://tpstracker.com/demo/tribalsquare/uploads/dynacraft-18inch-hotwheels-bike-11697026-01.jpg', 1, NULL, '2015-04-09 18:02:58', '2015-04-10 16:04:13'),
(109, 38, 'http://tpstracker.com/demo/tribalsquare/uploads/dynacraft-18inch-hotwheels-bike-11697026-02.jpg', 0, NULL, '2015-04-09 18:03:19', '2015-04-09 18:03:19'),
(110, 38, 'http://tpstracker.com/demo/tribalsquare/uploads/dynacraft-18inch-hotwheels-bike-11697026-03.jpg', 0, NULL, '2015-04-09 18:04:27', '2015-04-09 18:04:27'),
(111, 39, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-14561062dt.jpg', 1, NULL, '2015-04-09 18:13:50', '2015-04-10 16:03:04'),
(112, 40, 'http://tpstracker.com/demo/tribalsquare/uploads/Totally-Me-Fashion-Angels-Watercolor--pTRU1-19413720dt.jpg', 1, NULL, '2015-04-09 18:27:56', '2015-04-09 18:28:16'),
(113, 41, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-3015116dt.jpg', 1, NULL, '2015-04-09 18:36:04', '2015-04-11 17:03:35'),
(114, 41, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-3015116_alternate1_dt.jpg', 0, NULL, '2015-04-09 18:36:28', '2015-04-09 18:36:28'),
(115, 42, 'http://tpstracker.com/demo/tribalsquare/uploads/Imaginarium-Poster-Deco-Kit--pTRU1-18951275dt.jpg', 1, NULL, '2015-04-09 18:44:03', '2015-04-09 18:44:46'),
(116, 42, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-18951275_alternate1_dt.jpg', 0, NULL, '2015-04-09 18:44:26', '2015-04-09 18:44:26'),
(117, 43, 'http://tpstracker.com/demo/tribalsquare/uploads/Crayola-3D-Glitter-Chalk--pTRU1-17866855dt.jpg', 1, '2015-04-10 20:11:16', '2015-04-09 18:47:59', '2015-04-10 20:11:16'),
(118, 44, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-16573562dt.jpg', 1, NULL, '2015-04-09 18:56:01', '2015-04-09 18:56:58'),
(119, 44, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-16573562_alternate1_dt.jpg', 0, NULL, '2015-04-09 18:56:22', '2015-04-09 18:56:22'),
(120, 45, 'http://tpstracker.com/demo/tribalsquare/uploads/Totally-Me!-Pretty-Petals-Set--pTRU1-16573264dt.jpg', 1, NULL, '2015-04-09 19:00:52', '2015-04-09 19:01:12'),
(121, 46, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-17956593dt.jpg', 1, NULL, '2015-04-09 19:06:53', '2015-04-10 16:05:11'),
(122, 46, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-17956593_alternate1_dt.jpg', 0, NULL, '2015-04-09 19:07:44', '2015-04-09 19:07:44'),
(123, 46, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-17956593_alternate2_dt.jpg', 0, NULL, '2015-04-09 19:08:01', '2015-04-09 19:08:01'),
(124, 46, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-17956593_alternate3_dt.jpg', 0, NULL, '2015-04-09 19:08:15', '2015-04-09 19:08:15'),
(125, 47, 'http://tpstracker.com/demo/tribalsquare/uploads/Hero-of-Color-City-Jumbo--pTRU1-19438462dt.jpg', 1, NULL, '2015-04-10 14:27:41', '2015-04-10 14:27:53'),
(126, 48, 'http://tpstracker.com/demo/tribalsquare/uploads/3dfunnycharactersfornew_2.jpg', 0, '2015-04-11 17:04:28', '2015-04-11 17:02:48', '2015-04-11 17:04:28'),
(127, 50, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-18252081_alternate1_enh-z6.jpg', 0, '2015-04-30 18:31:23', '2015-04-30 17:43:54', '2015-04-30 18:31:23'),
(128, 50, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-18252081enh-z6.jpg', 1, '2015-04-30 18:31:20', '2015-04-30 17:43:57', '2015-04-30 18:31:20'),
(129, 50, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-18252081enh-z6_1.jpg', 1, NULL, '2015-04-30 18:31:31', '2015-04-30 18:31:55'),
(130, 50, 'http://tpstracker.com/demo/tribalsquare/uploads/pTRU1-18252081_alternate1_enh-z6_1.jpg', 0, NULL, '2015-04-30 18:31:46', '2015-04-30 18:31:46'),
(131, 51, 'http://tpstracker.com/demo/tribalsquare/uploads/main_deal.jpg', 1, NULL, '2015-04-30 18:46:10', '2015-04-30 18:47:21'),
(132, 51, 'http://tpstracker.com/demo/tribalsquare/uploads/Kids-font-b-giant-b-font-mountain-font-b-bike-b-font-18inch-Load-160kg-pink.jpg', 0, NULL, '2015-04-30 18:47:08', '2015-04-30 18:47:08'),
(133, 52, 'http://tpstracker.com/demo/tribalsquare/uploads/Aromatherapy-Massage-What-Why-How-8.jpg', 0, '2015-04-30 19:06:01', '2015-04-30 19:00:20', '2015-04-30 19:06:01'),
(134, 52, 'http://tpstracker.com/demo/tribalsquare/uploads/massage-and-sadness1.jpg', 0, '2015-04-30 19:05:58', '2015-04-30 19:00:34', '2015-04-30 19:05:58'),
(135, 52, 'http://tpstracker.com/demo/tribalsquare/uploads/oc-2048x1229.jpg', 1, NULL, '2015-04-30 19:08:15', '2015-04-30 19:09:24'),
(136, 52, 'http://tpstracker.com/demo/tribalsquare/uploads/al-reem-fitness-unisex-massage2.jpg', 0, NULL, '2015-04-30 19:08:49', '2015-04-30 19:08:49'),
(137, 52, 'http://tpstracker.com/demo/tribalsquare/uploads/Aromatherapy-Massage-What-Why-How-8_1.jpg', 0, NULL, '2015-04-30 19:08:52', '2015-04-30 19:08:52'),
(138, 52, 'http://tpstracker.com/demo/tribalsquare/uploads/massage-and-sadness1_1.jpg', 0, NULL, '2015-04-30 19:08:55', '2015-04-30 19:08:55'),
(139, 53, 'http://tpstracker.com/demo/tribalsquare/uploads/15075613_xxl.jpg', 1, NULL, '2015-04-30 19:18:52', '2015-04-30 19:19:42'),
(140, 53, 'http://tpstracker.com/demo/tribalsquare/uploads/al-reem-fitness-unisex-massage2_1.jpg', 0, NULL, '2015-04-30 19:19:10', '2015-04-30 19:19:10'),
(141, 53, 'http://tpstracker.com/demo/tribalsquare/uploads/massage-and-sadness1_2.jpg', 0, NULL, '2015-04-30 19:19:16', '2015-04-30 19:19:16'),
(142, 54, 'http://tpstracker.com/demo/tribalsquare/uploads/snowballs-1-2.jpg', 1, NULL, '2015-04-30 19:38:52', '2015-04-30 19:39:07'),
(143, 55, 'http://tpstracker.com/demo/tribalsquare/uploads/fitness_1.jpg', 1, NULL, '2015-04-30 19:46:47', '2015-04-30 19:47:24'),
(144, 55, 'http://tpstracker.com/demo/tribalsquare/uploads/lpg-huber.jpg', 0, NULL, '2015-04-30 19:47:14', '2015-04-30 19:47:14'),
(145, 56, 'http://tpstracker.com/demo/tribalsquare/uploads/gymbo.jpeg', 1, NULL, '2015-04-30 19:55:23', '2015-04-30 19:55:34'),
(146, 57, 'http://tpstracker.com/demo/tribalsquare/uploads/Blogra 3.jpg', 1, NULL, '2015-05-09 16:41:11', '2015-05-09 18:04:16'),
(147, 58, 'http://tpstracker.com/demo/tribalsquare/uploads/1401386674_ganhebanner.png', 1, NULL, '2015-05-27 12:32:51', '2015-05-27 12:35:36'),
(148, 58, 'http://tpstracker.com/demo/tribalsquare/uploads/spa_face.jpg', 0, NULL, '2015-05-27 12:34:07', '2015-05-27 12:34:07'),
(149, 58, 'http://tpstracker.com/demo/tribalsquare/uploads/How-to-Give-Yourself-a-Spa-Facial-At-Home.jpg', 0, NULL, '2015-05-27 12:35:21', '2015-05-27 12:35:21'),
(150, 59, 'http://tpstracker.com/demo/tribalsquare/uploads/Pirates-MOD-APK-1.jpg', 1, NULL, '2015-05-27 12:56:02', '2015-05-27 12:56:44'),
(151, 59, 'http://tpstracker.com/demo/tribalsquare/uploads/original-2b9fd7d200.jpg', 0, NULL, '2015-05-27 12:56:26', '2015-05-27 12:56:26'),
(152, 59, 'http://tpstracker.com/demo/tribalsquare/uploads/unnamed.jpg', 0, NULL, '2015-05-27 12:56:31', '2015-05-27 12:56:31'),
(153, 60, 'http://tpstracker.com/demo/tribalsquare/uploads/Screen Shot 2015-05-28 at 7.47.09 PM.png', 0, NULL, '2015-05-29 09:05:12', '2015-05-29 09:05:12'),
(154, 61, 'http://tpstracker.com/demo/tribalsquare/uploads/Hair_Braiding-1202381495ldf917.jpg', 0, NULL, '2015-05-31 04:47:56', '2015-05-31 04:47:56'),
(155, 61, 'http://tpstracker.com/demo/tribalsquare/uploads/HairBraid1-219518.jpg', 0, NULL, '2015-05-31 04:48:11', '2015-05-31 04:48:11'),
(156, 61, 'http://tpstracker.com/demo/tribalsquare/uploads/HairStylesAwesome.JPG', 0, NULL, '2015-05-31 04:48:24', '2015-05-31 04:48:24'),
(157, 62, 'http://tpstracker.com/demo/tribalsquare/uploads/original-2b9fd7d200_1.jpg', 1, NULL, '2015-06-01 15:12:51', '2015-06-01 15:13:13'),
(158, 63, 'http://tpstracker.com/demo/tribalsquare/uploads/Pirates-MOD-APK-1_1.jpg', 1, NULL, '2015-06-01 15:23:38', '2015-06-01 15:23:50'),
(159, 64, 'http://tpstracker.com/demo/tribalsquare/uploads/Full-Body-Massages.png', 1, NULL, '2015-06-01 19:15:23', '2015-06-01 19:23:50'),
(160, 64, 'http://tpstracker.com/demo/tribalsquare/uploads/13402472252771.jpg', 0, NULL, '2015-06-01 19:16:48', '2015-06-01 19:16:48'),
(161, 64, 'http://tpstracker.com/demo/tribalsquare/uploads/Therapeutic-Benefits-Of-A-Full-Body-Massage.jpg', 0, '2015-06-01 19:23:12', '2015-06-01 19:16:52', '2015-06-01 19:23:12'),
(162, 64, 'http://tpstracker.com/demo/tribalsquare/uploads/spa3_1.jpg', 0, NULL, '2015-06-01 19:23:29', '2015-06-01 19:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `deal_videos`
--

DROP TABLE IF EXISTS `deal_videos`;
CREATE TABLE IF NOT EXISTS `deal_videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deal_id` int(11) NOT NULL DEFAULT '0',
  `video_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `deal_videos`
--

INSERT INTO `deal_videos` (`id`, `deal_id`, `video_path`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 'Xiaomi Yi Action camera video sample 1.mp4', NULL, '2015-03-16 20:15:11', '2015-03-16 20:15:11'),
(2, 35, '51h88NbDqcL.jpg', NULL, '2015-04-09 17:10:43', '2015-04-09 17:10:43'),
(3, 33, 'Xiaomi Yi Action camera video sample 1_2.mp4', NULL, '2015-04-10 15:57:58', '2015-04-10 15:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `user_id`, `have_experience_caring_child_with_special_needs`, `have_experience_caring_infants`, `have_experience_caring_twins`, `have_experience_provide_homework_help`, `paid_child_care_experience_years`, `age_groups_experience_with`, `willing_care_for_sick_children`, `have_special_needs_service_experience`, `special_needs_service_experience`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 18, 1, 1, 0, 0, 10, '1,3,5', 1, 1, '2,3,5,6,8,9', NULL, '2015-03-30 16:18:27', '2015-03-30 16:18:27'),
(2, 20, 1, 1, 1, 1, 7, '1,2,3,4,5', 1, 1, '1,2,3,4,5,6,7,8,9,10', NULL, '2015-03-30 16:47:08', '2015-04-09 17:27:29'),
(3, 26, 1, 1, 1, 1, 20, '1,2,3,4,5', 1, 1, '1,4,5,6,7,8', NULL, '2015-03-30 17:48:36', '2015-03-30 17:48:36'),
(4, 27, 1, 1, 1, 1, 20, '1,2,3,4', 1, 1, '1,2,5,6,10', NULL, '2015-03-30 18:18:17', '2015-03-30 18:35:57'),
(5, 28, 1, 1, 1, 1, 15, '1,2,3', 1, 1, '1,2,5,6,7,9,10', NULL, '2015-03-30 18:45:39', '2015-03-30 18:45:39'),
(6, 49, 0, 0, 0, 0, 10, NULL, 0, 0, NULL, NULL, '2015-04-17 08:58:56', '2015-04-17 08:58:56'),
(7, 76, 1, 0, 1, 0, 5, '1,2,3,4', 1, 1, '1,2,3,5,6,8,9,10', NULL, '2015-05-15 19:22:55', '2015-05-15 19:22:55'),
(8, 86, 1, 0, 1, 1, 3, '1,2,3,4,5', 0, 1, '1,3,4,5,7,8,10', NULL, '2015-05-18 19:51:27', '2015-05-18 19:51:27'),
(9, 132, 1, 1, 1, 1, 6, '1,2,3,4,5', 1, 1, '1,2,3,4,5,6,7,8,9,10', NULL, '2015-05-30 19:28:01', '2015-05-30 19:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

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
(9, 'Germany', NULL, '2015-03-30 16:48:38', '2015-03-30 16:48:38'),
(10, 'hindu', NULL, '2015-04-15 01:17:08', '2015-04-15 01:17:08'),
(11, 'cebauno', NULL, '2015-04-15 01:17:22', '2015-04-15 01:17:22'),
(12, 'igbo', NULL, '2015-04-17 08:59:53', '2015-04-17 08:59:53'),
(13, 'africaans', NULL, '2015-05-20 22:12:26', '2015-05-20 22:12:26'),
(14, 'African', NULL, '2015-05-26 17:06:05', '2015-05-26 17:06:05'),
(15, 'Chinese', NULL, '2015-05-26 19:30:29', '2015-05-26 19:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `listing_categories`
--

DROP TABLE IF EXISTS `listing_categories`;
CREATE TABLE IF NOT EXISTS `listing_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('Classified','Deal') COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=60 ;

--
-- Dumping data for table `listing_categories`
--

INSERT INTO `listing_categories` (`id`, `name`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Fitness', 'Deal', NULL, '2015-03-16 19:45:49', '2015-03-16 19:45:49'),
(2, 'Fitness', 'Classified', '2015-05-26 16:41:16', '2015-03-16 19:45:49', '2015-05-26 16:41:16'),
(3, 'Beauty & Spa', 'Deal', NULL, '2015-03-16 19:45:49', '2015-03-16 19:45:49'),
(4, 'Beauty & Spa', 'Classified', '2015-05-26 16:41:25', '2015-03-16 19:45:49', '2015-05-26 16:41:25'),
(5, 'Baby & Kids Stuff', 'Deal', NULL, '2015-03-18 18:12:53', '2015-03-18 18:12:53'),
(6, 'Baby & Kids Stuff', 'Classified', '2015-05-26 16:41:32', '2015-03-18 18:12:53', '2015-05-26 16:41:32'),
(7, 'Arts & Crafts', 'Deal', NULL, '2015-03-18 18:16:06', '2015-03-18 18:16:06'),
(8, 'Arts & Crafts', 'Classified', '2015-05-26 16:41:40', '2015-03-18 18:16:06', '2015-05-26 16:41:40'),
(9, 'Books & Magazines', 'Deal', NULL, '2015-03-18 18:16:32', '2015-03-18 18:16:32'),
(10, 'Books & Magazines', 'Classified', '2015-05-19 17:01:30', '2015-03-18 18:16:32', '2015-05-19 17:01:30'),
(11, 'test And Category', 'Deal', '2015-03-24 17:32:25', '2015-03-24 17:31:48', '2015-03-24 17:32:25'),
(12, 'test And Category', 'Classified', '2015-03-24 17:32:04', '2015-03-24 17:31:48', '2015-03-24 17:32:04'),
(13, 'Test import category', 'Deal', '2015-03-24 17:32:21', '2015-03-24 17:31:48', '2015-03-24 17:32:21'),
(14, 'Test import category', 'Classified', '2015-03-24 17:32:10', '2015-03-24 17:31:48', '2015-03-24 17:32:10'),
(15, 'it should work', 'Deal', '2015-03-24 17:32:16', '2015-03-24 17:31:48', '2015-03-24 17:32:16'),
(16, 'test', 'Classified', '2015-04-02 19:27:13', '2015-04-01 14:20:37', '2015-04-02 19:27:13'),
(17, 'Restaurant', 'Deal', '2015-04-02 17:02:33', '2015-04-02 17:02:08', '2015-04-02 17:02:33'),
(18, 'test', 'Deal', '2015-05-19 16:58:49', '2015-05-19 16:53:21', '2015-05-19 16:58:49'),
(19, 'test2', 'Classified', '2015-05-19 16:58:08', '2015-05-19 16:54:31', '2015-05-19 16:58:08'),
(20, 'Test3', 'Deal', '2015-05-19 16:58:41', '2015-05-19 16:56:33', '2015-05-19 16:58:41'),
(21, 'Test4', 'Deal', '2015-05-19 16:58:33', '2015-05-19 16:56:33', '2015-05-19 16:58:33'),
(22, 'Test4', 'Classified', '2015-05-19 16:58:00', '2015-05-19 16:56:33', '2015-05-19 16:58:00'),
(23, 'Test5', 'Classified', '2015-05-19 16:57:52', '2015-05-19 16:56:33', '2015-05-19 16:57:52'),
(24, 'Test6', 'Deal', '2015-05-19 16:58:25', '2015-05-19 16:56:33', '2015-05-19 16:58:25'),
(25, 'Test6', 'Classified', '2015-05-19 16:57:44', '2015-05-19 16:56:33', '2015-05-19 16:57:44'),
(26, 'Test7', 'Deal', '2015-05-19 16:58:16', '2015-05-19 16:56:33', '2015-05-19 16:58:16'),
(27, 'Test3', 'Deal', '2015-05-19 16:59:23', '2015-05-19 16:59:03', '2015-05-19 16:59:23'),
(28, 'Test4', 'Deal', '2015-05-19 16:59:36', '2015-05-19 16:59:03', '2015-05-19 16:59:36'),
(29, 'Test4', 'Classified', '2015-05-19 17:02:04', '2015-05-19 16:59:03', '2015-05-19 17:02:04'),
(30, 'Test5', 'Classified', '2015-05-19 17:02:31', '2015-05-19 16:59:03', '2015-05-19 17:02:31'),
(31, 'Test6', 'Deal', '2015-05-19 16:59:48', '2015-05-19 16:59:03', '2015-05-19 16:59:48'),
(32, 'Test6', 'Classified', '2015-05-19 17:02:44', '2015-05-19 16:59:03', '2015-05-19 17:02:44'),
(33, 'Test7', 'Deal', '2015-05-19 17:00:04', '2015-05-19 16:59:03', '2015-05-19 17:00:04'),
(34, 'test2', 'Classified', '2015-05-19 17:03:03', '2015-05-19 16:59:03', '2015-05-19 17:03:03'),
(35, 'Books & Magazines', 'Classified', '2015-05-26 16:41:45', '2015-05-19 17:01:50', '2015-05-26 16:41:45'),
(36, 'test1', 'Classified', '2015-05-26 16:41:53', '2015-05-20 13:21:59', '2015-05-26 16:41:53'),
(37, 'test123', 'Classified', '2015-05-26 16:42:03', '2015-05-20 13:24:35', '2015-05-26 16:42:03'),
(38, 'African Restaurants', 'Classified', '2015-05-26 16:42:09', '2015-05-26 16:36:11', '2015-05-26 16:42:09'),
(39, 'African Restaurants', 'Classified', NULL, '2015-05-26 16:56:35', '2015-05-26 16:56:35'),
(40, 'African Caterers', 'Classified', NULL, '2015-05-26 16:56:51', '2015-05-26 16:56:51'),
(41, 'African Entertainers/DJ', 'Classified', NULL, '2015-05-26 16:57:06', '2015-05-29 04:22:15'),
(42, 'African Tailors', 'Classified', NULL, '2015-05-26 16:57:19', '2015-05-26 16:57:19'),
(43, 'Hair Braiding', 'Classified', NULL, '2015-05-26 16:57:36', '2015-05-26 16:57:36'),
(44, 'Fashion Jewellery', 'Classified', NULL, '2015-05-26 16:57:49', '2015-05-26 16:57:49'),
(45, 'African Store', 'Classified', NULL, '2015-05-26 16:58:01', '2015-05-26 16:58:01'),
(46, 'Churches/Groups', 'Classified', NULL, '2015-05-26 16:58:14', '2015-05-29 04:22:28'),
(47, 'Upcoming African Events', 'Classified', NULL, '2015-05-26 16:58:32', '2015-05-26 16:58:32'),
(48, 'Import/Export Shipping', 'Classified', NULL, '2015-05-26 16:58:52', '2015-05-29 04:22:42'),
(49, 'Immigration Lawyers', 'Classified', NULL, '2015-05-26 16:59:10', '2015-05-26 16:59:10'),
(50, 'Arts & Crafts', 'Classified', NULL, '2015-05-26 16:59:25', '2015-05-26 16:59:25'),
(51, 'African Restaurants', 'Deal', NULL, '2015-05-29 04:11:30', '2015-05-29 04:11:30'),
(52, 'African Store Gift Cards', 'Deal', NULL, '2015-05-29 04:12:00', '2015-05-29 04:12:00'),
(53, 'African Caterers', 'Deal', NULL, '2015-05-29 04:12:15', '2015-05-29 04:12:15'),
(54, 'Entertainment/DJ', 'Deal', NULL, '2015-05-29 04:12:32', '2015-05-29 04:12:32'),
(55, 'Fashion/Jewellery', 'Deal', NULL, '2015-05-29 04:13:00', '2015-05-29 04:13:00'),
(56, 'Tailors', 'Deal', NULL, '2015-05-29 04:13:10', '2015-05-29 04:13:10'),
(57, 'Hair Braiding', 'Deal', NULL, '2015-05-29 04:13:24', '2015-05-29 04:13:24'),
(58, 'a1', 'Deal', '2015-05-29 13:41:26', '2015-05-29 13:41:16', '2015-05-29 13:41:26'),
(59, 'test', 'Classified', '2015-06-01 15:20:04', '2015-06-01 15:19:25', '2015-06-01 15:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
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
-- Table structure for table `nationalities`
--

DROP TABLE IF EXISTS `nationalities`;
CREATE TABLE IF NOT EXISTS `nationalities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'EU Nationalities', '2015-05-23 06:34:03', '2015-05-23 06:34:03'),
(2, 'African', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(3, 'Albanian', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(4, 'American', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(5, 'Arab', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(6, 'Argentinian', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(7, 'Armenian', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(8, 'Australian', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(9, 'Austrian', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(10, 'Azerbaijanian', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(11, 'Bahamian', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(12, 'Bahraini', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(13, 'Bangladeshi', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(14, 'Barbadian', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(15, 'Bashkir', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(16, 'Belarusian', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(17, 'Belgian', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(18, 'Belizean', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(19, 'Bhutanese', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(20, 'Bolivian', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(21, 'Bosnian', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(22, 'Brazilian', '2015-05-23 06:34:04', '2015-05-23 06:34:04'),
(23, 'British', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(24, 'Bulgarian', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(25, 'Cambodian', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(26, 'Cameroonian', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(27, 'Canadian', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(28, 'Chilean', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(29, 'Chinese', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(30, 'Colombian', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(31, 'Costa Rican', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(32, 'Croatian', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(33, 'Cuban', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(34, 'Cypriot', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(35, 'Czech', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(36, 'Danish', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(37, 'Dominican', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(38, 'Dutch', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(39, 'Eastern European', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(40, 'Ecuadoran', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(41, 'Egyptian', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(42, 'Eritrean', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(43, 'Estonian', '2015-05-23 06:34:05', '2015-05-23 06:34:05'),
(44, 'Ethiopian', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(45, 'Fijian', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(46, 'Filipino', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(47, 'Finnish', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(48, 'French', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(49, 'Gambian', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(50, 'Georgian', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(51, 'German', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(52, 'Ghanaian', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(53, 'Greek', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(54, 'Grenadian', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(55, 'Guatemalan', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(56, 'Guyinese', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(57, 'Haitian', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(58, 'Hawaiian', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(59, 'Honduran', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(60, 'Hungarian', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(61, 'Icelandic', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(62, 'Indian', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(63, 'Indonesian', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(64, 'Iranian', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(65, 'Iraqi', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(66, 'Irish', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(67, 'Israeli', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(68, 'Italian', '2015-05-23 06:34:06', '2015-05-23 06:34:06'),
(69, 'Jamaican', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(70, 'Japanese', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(71, 'Jordanian', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(72, 'Kazakh', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(73, 'Kenyan', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(74, 'Korean', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(75, 'Kyrgyz', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(76, 'Latvian', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(77, 'Lebanese', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(78, 'Lithuanian', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(79, 'Luxembourgian', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(80, 'Macedonian', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(81, 'Malagasy', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(82, 'Malawian', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(83, 'Malaysian', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(84, 'Maldivian', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(85, 'Maltese', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(86, 'Mauritian', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(87, 'Mexican', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(88, 'Moldavian', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(89, 'Monegasque', '2015-05-23 06:34:07', '2015-05-23 06:34:07'),
(90, 'Mongolian', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(91, 'Moroccan', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(92, 'Mosotho', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(93, 'Motswana', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(94, 'Mozambican', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(95, 'Myanmar', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(96, 'Namibian', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(97, 'Nepalese', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(98, 'New Zealander', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(99, 'Nicaraguan', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(100, 'Nigerian', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(101, 'Norwegian', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(102, 'Other', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(103, 'Pakistani', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(104, 'Palestinian', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(105, 'Panamanian', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(106, 'Paraguayan', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(107, 'Peruvian', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(108, 'Polish', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(109, 'Polynesian', '2015-05-23 06:34:08', '2015-05-23 06:34:08'),
(110, 'Portuguese', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(111, 'Puerto Rican', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(112, 'Romanian', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(113, 'Russian', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(114, 'Salvadorenian', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(115, 'Saudi', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(116, 'Scots', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(117, 'Scottish', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(118, 'Serbian', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(119, 'Seychellois', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(120, 'Shenghen', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(121, 'Singaporean', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(122, 'Slovakian', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(123, 'Slovenian', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(124, 'South African', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(125, 'South American', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(126, 'Spanish', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(127, 'Sri Lankan', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(128, 'St. Lucian', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(129, 'Surinamese', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(130, 'Swedish', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(131, 'Swiss', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(132, 'Taiwanese', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(133, 'Tajikistani', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(134, 'Tamil', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(135, 'Tanzanian', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(136, 'Thai', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(137, 'Tibetan', '2015-05-23 06:34:09', '2015-05-23 06:34:09'),
(138, 'Trinidadian', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(139, 'Tunisian', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(140, 'Turkish', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(141, 'Turkman', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(142, 'Ugandan', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(143, 'Ukrainian', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(144, 'Uruguayan', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(145, 'Uzbekistanian', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(146, 'Venezuelan', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(147, 'Vietnamese', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(148, 'Virgin Islander', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(149, 'Welsh', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(150, 'West Indian', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(151, 'Yugoslavian', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(152, 'Zambian', '2015-05-23 06:34:10', '2015-05-23 06:34:10'),
(153, 'Zimbabwean', '2015-05-23 06:34:10', '2015-05-23 06:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
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

DROP TABLE IF EXISTS `payments`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `txn_id`, `user_id`, `subscriber_id`, `subscription_id`, `amount`, `duration`, `post_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 4, NULL, 'I-T3E46F8URBDC', '500', '', 'sign_up_Providers', NULL, '2015-04-16 11:45:42', '2015-04-16 11:45:42'),
(2, NULL, 18, NULL, 'I-SMVNPFJECPV8', '300', '', 'sign_up_BabySitters', NULL, '2015-04-16 11:53:48', '2015-04-16 11:53:48'),
(3, NULL, 4, NULL, 'I-J7PAHR6A4GAB', '500', '', 'sign_up_Providers', NULL, '2015-05-29 12:37:18', '2015-05-29 12:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `item_id`, `order_id`, `user_id`, `email`, `item_type`, `quantity`, `amount`, `currency`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 6, 7, NULL, 'niyati@gmail.com', 'deal', 1, 250.00, 'USD', '2015-04-07 15:03:32', '2015-04-07 15:03:32', NULL),
(3, 17, 8, NULL, 'perry@tps.com', 'deal', 1, 3.92, 'USD', '2015-04-11 12:34:28', '2015-04-11 12:34:28', NULL),
(4, 18, 9, NULL, 'perry@tps.com', 'deal', 1, 26.00, 'USD', '2015-04-11 12:49:13', '2015-04-11 12:49:13', NULL),
(5, 22, 9, NULL, 'perry@tps.com', 'deal', 1, 14.47, 'USD', '2015-04-11 12:49:13', '2015-04-11 12:49:13', NULL),
(6, 17, 10, NULL, 'dev@tps.com', 'deal', 1, 3.92, 'USD', '2015-04-11 20:04:24', '2015-04-11 20:04:24', NULL),
(7, 57, 11, NULL, 'perry@tps.com', 'deal', 1, 70.00, 'USD', '2015-05-20 18:24:09', '2015-05-20 18:24:09', NULL),
(8, 57, 12, NULL, 'dev@tps.com', 'deal', 1, 70.00, 'USD', '2015-05-20 18:27:29', '2015-05-20 18:27:29', NULL),
(9, 50, 13, NULL, 'niyati.tps@gmail.com', 'deal', 1, 20.00, 'USD', '2015-05-21 16:15:27', '2015-05-21 16:15:27', NULL),
(10, 55, 14, NULL, 'perry@tps.com', 'deal', 1, 34.00, 'USD', '2015-05-21 16:31:06', '2015-05-21 16:31:06', NULL),
(11, 57, 14, NULL, 'perry@tps.com', 'deal', 1, 70.00, 'USD', '2015-05-21 16:31:06', '2015-05-21 16:31:06', NULL),
(12, 56, 14, NULL, 'perry@tps.com', 'deal', 1, 30.00, 'USD', '2015-05-21 16:31:06', '2015-05-21 16:31:06', NULL),
(13, 50, 15, NULL, 'perry@tps.com', 'deal', 1, 20.00, 'USD', '2015-05-21 17:54:31', '2015-05-21 17:54:31', NULL),
(14, 56, 15, NULL, 'perry@tps.com', 'deal', 1, 30.00, 'USD', '2015-05-21 17:54:31', '2015-05-21 17:54:31', NULL),
(15, 54, 16, NULL, 'perry@tps.com', 'deal', 1, 30.00, 'USD', '2015-05-21 17:55:08', '2015-05-21 17:55:08', NULL),
(16, 50, 17, NULL, 'perry@tps.com', 'deal', 1, 20.00, 'USD', '2015-05-21 17:55:42', '2015-05-21 17:55:42', NULL),
(17, 54, 18, NULL, 'perry@tps.com', 'deal', 1, 30.00, 'USD', '2015-05-21 17:56:42', '2015-05-21 17:56:42', NULL),
(18, 56, 19, NULL, 'perry@tps.com', 'deal', 1, 30.00, 'USD', '2015-05-30 16:07:01', '2015-05-30 16:07:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

DROP TABLE IF EXISTS `religions`;
CREATE TABLE IF NOT EXISTS `religions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'No Religion [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(2, 'Adventist [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(3, 'Agnostic [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(4, 'Al Qamishli [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(5, 'Alawite [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(6, 'Albanian Orthodox [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(7, 'Anglican [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(8, 'Animist [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(9, 'Armenian Apostolic [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(10, 'Armenian Orthodox [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(11, 'Atheist [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(12, 'Bahai [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(13, 'Baptist [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(14, 'Brethren [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(15, 'Buddhism [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(16, 'Bulgarian Orthodox [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(17, 'Calvinist [catholic]', '2015-05-23 06:33:08', '2015-05-23 06:33:08'),
(18, 'Catholic [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(19, 'Chondogyo [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(20, 'Christian [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(21, 'Christian Orthodox [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(22, 'Confucianism [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(23, 'Congregationalist [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(24, 'Coptic Christian [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(25, 'Daoism [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(26, 'Druze [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(27, 'Eastern Orthodox [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(28, 'Episcopalian [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(29, 'Evangelical Alliance [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(30, 'Evangelical Lutheran [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(31, 'Evangelical Protestant [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(32, 'Evangelist Church [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(33, 'Falun Dafa [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(34, 'Greek Orthodox [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(35, 'Gregorian-Armenian [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(36, 'Hinduism [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(37, 'Islamic [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(38, 'Jehovahs Witness [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(39, 'Jewish [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(40, 'Kimbanguist [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(41, 'Latter-Day Saints [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(42, 'Lutheran [catholic]', '2015-05-23 06:33:09', '2015-05-23 06:33:09'),
(43, 'MasterPath [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(44, 'Mennonite [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(45, 'Messianic Jew [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(46, 'Messianic Jewish [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(47, 'Methodist [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(48, 'Moravian [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(49, 'Muslim [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(50, 'New Apostolic Christian [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(51, 'New Apostolic Christian [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(52, 'Other [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(53, 'Pagan Practices [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(54, 'Parsi [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(55, 'Pentecostal [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(56, 'Presbyterian [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(57, 'Protestant [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(58, 'Rastafarian [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(59, 'Roman Catholic [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(60, 'Romanian Orthodox [catholic]', '2015-05-23 06:33:10', '2015-05-23 06:33:10'),
(61, 'Russian Orthodox [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11'),
(62, 'Scientology [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11'),
(63, 'Seventh Day Adventist [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11'),
(64, 'Seventh Day Baptist [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11'),
(65, 'Shia [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11'),
(66, 'Sikh [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11'),
(67, 'Spiritual - Not Religious [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11'),
(68, 'Surat Shabda Yoga [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11'),
(69, 'Taoist [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11'),
(70, 'Unitarian Universalist [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11'),
(71, 'United Free Church [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11'),
(72, 'Vincentian [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11'),
(73, 'Word of Life [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11'),
(74, 'Zoroastrian [catholic]', '2015-05-23 06:33:11', '2015-05-23 06:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

DROP TABLE IF EXISTS `shifts`;
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

DROP TABLE IF EXISTS `skills`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `languages_spoken`, `reference_name`, `reference_relationship`, `reference_name2`, `reference_relationship2`, `homework_help`, `additional_services`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 18, 'English,Spanish,Hindi', 'Perry Gold', 'Friend', NULL, NULL, '1,2,3,8,10', '1,2,5,7', NULL, '2015-03-30 16:21:35', '2015-03-30 16:21:35'),
(2, 20, 'English,Spenish,Gujarati,hindi,French,Germany', 'Dev D', 'Relative', '', '', '1,2,3,4,5,6,7,8,9,10', '1,2,3,4,5,6,7,8,9', NULL, '2015-03-30 16:49:09', '2015-04-09 17:27:40'),
(3, 26, 'gujarati,English,HIndi,French', 'Abhishek', 'Hubby', 'Nanda', 'Friend', '1,2,3,4,5,6,7,9,10', '1,2,3,5,6,7,8,9', NULL, '2015-03-30 17:50:19', '2015-04-06 22:56:33'),
(4, 27, 'English', 'Sally S', 'Friend', '', '', '1,2,5,6,9', '2,3,6,8', NULL, '2015-03-30 18:37:03', '2015-03-30 18:37:03'),
(5, 28, 'English', 'Perry Gold', 'Friend', 'Nanda', 'Relative', '1,4,5,8', '1,2,4,5,7,8', NULL, '2015-03-30 18:46:41', '2015-03-30 18:46:41'),
(6, 49, 'igbo', '', '', '', '', '1,3', '1,2', NULL, '2015-04-17 09:00:21', '2015-04-17 09:00:21'),
(7, 76, 'English,Spanish,French', 'Perry Gold', 'Friend', 'Mike G', 'Relative', '1,3,4,6,7,9,10', '1,2,4,7,9', NULL, '2015-05-15 19:24:48', '2015-05-15 19:24:48'),
(8, 86, 'English,Spenish,french', 'Mike', 'Friend', 'Perry', 'Relative', '1,2,5,6,8', '1,2,3,4,6,8', NULL, '2015-05-18 19:53:38', '2015-05-18 19:53:38'),
(9, 132, 'English,African,French,Spenish', 'Savan R', 'Friend', 'Dev D', 'Relative', '1,2,3,4,5,6,7,8,9,10', '1,2,3,4,5,6,7,8,9', NULL, '2015-05-30 19:30:04', '2015-05-30 19:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

DROP TABLE IF EXISTS `subscription_plans`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `name`, `post_type`, `amount`, `duration`, `deleted_at`, `created_at`, `updated_at`, `role_id`, `paypal_id`) VALUES
(1, 'Standard Baby Sitter', 'Monthly', '300', NULL, NULL, '0000-00-00 00:00:00', '2015-05-21 12:13:23', 3, 'P-7SV49099YF035773HYCKUWBA'),
(2, 'Standard Providers', 'Monthly', '500', NULL, NULL, '0000-00-00 00:00:00', '2015-05-21 12:13:35', 2, 'P-4CT09048FW963120BYCKSLVA'),
(3, 'Sales Agent Commission', NULL, '10', NULL, NULL, '0000-00-00 00:00:00', '2015-05-21 12:22:34', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `type`, `email`, `txn_id`, `amount`, `currency`, `created_at`, `updated_at`, `deleted_at`, `invoice_number`) VALUES
(7, 'paypal', 'niyati@gmail.com', 'PAY-4EG33071F74978007KURZZJI', 250.00, 'USD', '2015-04-07 15:03:32', '2015-04-07 15:03:32', NULL, '55239ca3255ee'),
(8, 'paypal', 'perry@tps.com', 'PAY-5V742052BL495133KKUUMAQY', 3.92, 'USD', '2015-04-11 12:34:28', '2015-04-11 12:34:28', NULL, '5528c04276b50'),
(9, 'paypal', 'perry@tps.com', 'PAY-2U231411X7689761UKUUMHUY', 40.47, 'USD', '2015-04-11 12:49:13', '2015-04-11 12:49:13', NULL, '5528c3d280d91'),
(10, 'paypal', 'dev@tps.com', 'PAY-0R93939013016403BKUUSTSY', 15.92, 'USD', '2015-04-11 20:04:24', '2015-04-11 20:04:24', NULL, '552929c9653a8'),
(11, 'paypal', 'perry@tps.com', 'PAY-7DV48628C3630740GKVOHXYA', 82.00, 'USD', '2015-05-20 18:24:09', '2015-05-20 18:24:09', NULL, '555c7be01aacd'),
(12, 'paypal', 'dev@tps.com', 'PAY-7PD56888B4235642XKVOH3GY', 82.00, 'USD', '2015-05-20 18:27:29', '2015-05-20 18:27:29', NULL, '555c7d9a93390'),
(13, 'paypal', 'niyati.tps@gmail.com', 'PAY-165599293L642535JKVO3AKQ', 32.00, 'USD', '2015-05-21 16:15:27', '2015-05-21 16:15:27', NULL, '555db0291a4c6'),
(14, 'paypal', 'perry@tps.com', 'PAY-59L45687JH271810YKVO3HJA', 146.00, 'USD', '2015-05-21 16:31:06', '2015-05-21 16:31:06', NULL, '555db3a380022'),
(15, 'paypal', 'perry@tps.com', 'PAY-0CR09909E9142762EKVO4OZQ', 62.00, 'USD', '2015-05-21 17:54:31', '2015-05-21 17:54:31', NULL, '555dc764c7871'),
(16, 'paypal', 'perry@tps.com', 'PAY-0PP20844RU049743EKVO4PCA', 42.00, 'USD', '2015-05-21 17:55:08', '2015-05-21 17:55:08', NULL, '555dc7876128d'),
(17, 'paypal', 'perry@tps.com', 'PAY-8A3361706A699474UKVO4PMA', 32.00, 'USD', '2015-05-21 17:55:42', '2015-05-21 17:55:42', NULL, '555dc7af8a3ab'),
(18, 'paypal', 'perry@tps.com', 'PAY-17493324WP649731MKVO4PTQ', 42.00, 'USD', '2015-05-21 17:56:42', '2015-05-21 17:56:42', NULL, '555dc7cd9f0f1'),
(19, 'paypal', 'perry@tps.com', 'PAY-2T8943652K265072GKVUYXIY', 30.00, 'USD', '2015-05-30 16:07:01', '2015-05-30 16:07:01', NULL, '55698ba169fe6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
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
  `verfication_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=134 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `logo`, `subscriber_id`, `subscription_end_at`, `remember_token`, `last_step`, `last_logged_in`, `deleted_at`, `created_at`, `updated_at`, `verfication_code`) VALUES
(1, 'Niyati', 'Sheth', 'niyati.tps@gmail.com', '$2y$10$ZKC0faCeiVxCUCH/N.Yv1e1axq0isDAmQCcVOKcmCgJxlfWe1cn4q', NULL, NULL, NULL, 'N4Df2EXyTj7gxgaJi9ypSs5pz92phMkTvU6Rnzdc6mpBnx9uvapBLHXAwSEN', 1, '2015-06-02 08:36:06', NULL, '2015-03-16 19:45:49', '2015-06-02 15:13:53', NULL),
(2, 'Sagar', 'Rabadiya', 'sagar.tps@gmail.com', '$2y$10$IvmiWI1dXNGWlmGgjM8Ua.7M1M3dGk4YoHvvoYL/mGcA3t1yOYedK', NULL, NULL, '2015-05-02', 'naPGehnczQr3oJ7U0dYUUrUy2WeHl896qw1B1kmlIpaau731v717JSvSFaDV', 1, '2015-05-29 09:23:21', NULL, '2015-03-16 19:45:49', '2015-05-29 15:25:31', NULL),
(3, 'Perry', 'Gold', 'paresh.tps@gmail.com', '$2y$10$Ng1HMvGAgEuE684yLbjsvuy1rlp8k4DhVKffHv7xA7fWfKn9/BMh6', NULL, NULL, '2015-05-21', 'Diw8aU8qLLgvXsdxUvrDhjfpgmZu3Op8Q6VxnOgiwFDaydWMTA0X2JBIjIK8', 1, '2015-05-18 13:41:08', NULL, '2015-03-18 12:20:13', '2015-05-18 19:41:22', NULL),
(4, 'Perry', 'Gold', 'pareshgandhi28@gmail.com', '$2y$10$IcHL.J2E4JvosQ5AmMSnmuFFbhBdtxIRjIQgQ0wfM04clL12RfONK', NULL, NULL, '2015-06-29', 'WcibDIQJv9n1bAvPWR0v4jC9ikJWtqYY3DyOfo2jRSV0radBsJjLLHGzyjGU', 1, '2015-06-02 08:33:29', NULL, '2015-03-18 12:32:12', '2015-06-02 14:38:12', NULL),
(6, 'Sagar', 'Likes  Jalsa', 'sam.coolone70@gmail.com1', '$2y$10$CJpvlE/Dk8kG3Ey0khKL7OIU83SeAo/wfhmmoFkId9mdgthkKnmWO', NULL, NULL, NULL, '', 1, '2015-03-18 09:46:55', NULL, '2015-03-18 15:38:41', '2015-03-18 15:46:55', NULL),
(31, 'Marry', 'Poppins', 'divyang@tpswork.com', '$2y$10$ROPZ1JsOXgfbYYP8pwzz2.de64FYZjm5ydZ3lQZcFaS7Y6IA8sfoe', NULL, NULL, '2015-04-14', 'mRXYTMgem21e5M15G4mszuBZUMCZYdfEFsdzZDUVjP4fyhpqVVgV6jkJDeBk', 2, '2015-04-11 10:59:03', NULL, '2015-04-04 16:49:25', '2015-04-11 16:59:19', NULL),
(8, 'Divyange', 'H', 'divyang.tps@gmail.com', '$2y$10$hmf9sbTGHeuF8fz6u22IzOfbiZcjNUaVveylQoN1B1kVDruZtDoty', NULL, NULL, '2015-04-05', 'nxO19IKEGOZaiSY3rPVEig2qGw5WjyRSUNjvpnENixAMLn1e5eOA1uWHact8', 1, '2015-04-16 05:48:42', NULL, '2015-03-18 17:30:29', '2015-04-16 11:52:52', NULL),
(9, 'Dev', 'D', 'divyang@gmail.com', '$2y$10$7zwCPGBQ3loyu3KGzdkS/eoKyRVmaWm3kJRObZ7tK5wluDiT6EyU.', NULL, NULL, '2015-03-21', '', 1, '2015-03-18 11:45:51', NULL, '2015-03-18 17:38:04', '2015-03-18 17:45:51', NULL),
(10, 'Perry', 'Gold', 'perry@test.com', '$2y$10$l6EbxQECZ8O0T0PHZIjWKe742iklg.3hXERewGC3m3J0hFC34lxHS', NULL, NULL, '2015-05-07', '2KEYW2gxle1oIiSGyyDk2Lfc75HblLeDw8vISxc9OaGG6IRas5OFoPWc18Nj', 1, '2015-05-04 06:55:27', NULL, '2015-03-18 19:01:02', '2015-05-04 15:06:51', NULL),
(11, 'Perry', 'Gold', 'perrygold@test.com', '$2y$10$/LbFnNq8H3VRQ.xer4FDzu5eKkGF.YVppB9B2751VFaSQofSt3Tbu', NULL, NULL, '2015-03-23', '', 1, '2015-03-20 11:31:27', NULL, '2015-03-20 17:13:12', '2015-03-20 17:31:27', NULL),
(12, 'Dev', 'Kumar', 'paresh@tpswork.com', '$2y$10$vv8doVhRlGH7C/2rqZEMaupV/nH7KtUphRlxqXpS.pdwYVVgPGTAa', NULL, NULL, '2015-04-05', 'JASECQyB0HaJWPyE4bzq2UyDXgAYzlG8Uj8GgLgdgh29XoBgfswz7kt81TxT', 1, '2015-06-01 07:59:51', NULL, '2015-03-24 17:44:58', '2015-06-01 14:00:00', NULL),
(13, 'Niyati', 'Sheth', 'niyati@techplussoftware.com', '$2y$10$Ygg6zBQ8MBc1OZ/FAsCRnurPI84G8i3d7J0yqYsPOp.7yDWzvtjWG', NULL, NULL, NULL, '', 1, '2015-03-25 13:42:31', NULL, '2015-03-25 19:42:14', '2015-03-25 19:42:31', NULL),
(14, 'Shivangi', 'Sheth', 'niyatisheth99@gmail.com', '$2y$10$9cWUjoxojEDVTbLlP5XamOLmytj2YACeXROlRlYNWbcA57Ytg79ve', NULL, NULL, '2015-03-28', '', 1, '2015-03-25 13:43:43', NULL, '2015-03-25 19:43:07', '2015-03-25 19:43:43', NULL),
(15, 'Niyati', 'Sheth', 'niyaticeth199@yahoo.com', '$2y$10$ZKC0faCeiVxCUCH/N.Yv1e1axq0isDAmQCcVOKcmCgJxlfWe1cn4q', NULL, NULL, '2015-03-28', '', 1, '2015-03-25 13:46:01', '2015-04-03 14:54:45', '2015-03-25 19:44:53', '2015-04-03 14:54:45', NULL),
(16, 'dhara', 'patel', 'pooja.tps@gmail.com', '$2y$10$UcF.kKlk.3sJI1tVpvVKcuzoI4UseKy08srLLTwCU/MZ9hQ5X4eVa', NULL, NULL, '2015-03-29', '', 1, '2015-03-26 13:57:36', NULL, '2015-03-26 19:52:14', '2015-03-26 19:57:36', NULL),
(18, 'Molly', 'MacGregor', 'divyange@tpswork.com', '$2y$10$JzkFcBC0vbxNcR9NTVtYs.YRZAEI2txMeUBRbQhkDIAL2UJJNszKS', NULL, NULL, '2015-06-04', 'eYb4gRG9YGZakrNjCrzpOn2p76Tgjo4kWte27pqc5W3QnkWNOChXhIYtEkxM', 6, '2015-06-01 11:36:58', NULL, '2015-03-30 16:09:22', '2015-06-01 18:50:20', NULL),
(30, 'Bhaumik', '  Work', 'bhaumikwork@gmail.com', '$2y$10$DfEiJ3FcN3fAsyqvdgyhp.3e28gLSj0stJA5pUNc5b0IIue2dZiIS', NULL, NULL, '2015-04-04', 'UZPgIx74YTUIgzz5vghwW91paIyVgTlvh2Lh1KAkq1riYZ7zxA8xxUxq0nGa', 1, '2015-05-09 11:26:10', NULL, '2015-04-01 15:53:43', '2015-05-09 17:29:13', NULL),
(20, 'Chelsea', 'Rae Kravitz', 'divyange.tps@gmail.com', '$2y$10$0eL36JD4dcL5.1Viz9Y1LeT4xe1VFEhnc9Jf/lgZ07WHcMKYQHEbO', NULL, NULL, '2015-04-12', 'foXLdamVQLHlN5M0RJwcFwF47JhEND7VsxmVddKT4OWHmIj0xsgfSmjPUojV', 6, '2015-04-09 11:22:03', NULL, '2015-03-30 16:24:21', '2015-04-09 17:24:07', NULL),
(25, 'Aishwarya', 'Rai', 'hem@vprex.com', '$2y$10$W0I2sdIObc2BrTQPUkKtvuo9t4Ui3ahz/Rvfh5kuXXsqUDUrFSa6C', NULL, NULL, '2015-05-24', '6zPPoZwoM0D6qDfNzCupgUXPsFqU29KDLLucnwix1dNdRYwqKNuH4YWh0Xyi', 1, '2015-05-21 10:47:23', NULL, '2015-03-30 17:41:51', '2015-05-21 16:47:41', NULL),
(26, 'Aishwarya', 'Rai', 'jigar@tpswork.com', '$2y$10$NAUIIqeXKvMvtZZzzWE.deVQuvDp4r0WS/DGUHuSt8Fn8/iSXU3Tm', NULL, NULL, '2015-06-04', 'jT3V6LmBUvYOjLnfsm4ydFrUV5rSTvPDmVR6dVvFY2AODBlAVPMViIwe2Z7W', 6, '2015-06-01 13:25:54', NULL, '2015-03-30 17:43:54', '2015-06-01 19:25:59', NULL),
(27, 'Lauren', 'Vertrees', 'jigar.tps@gmail.com', '$2y$10$ONTfpX/Agj/IJ1R/8WaWyu69Qtry03yoSMgH2qNWhJAvdSYM0ngK.', NULL, NULL, '2015-06-05', 'bTwxeG3L8Wa3AdQdSZMprvDzFSSgRrO9DA9T7oDaNuATdCBpCcOkvSGvzC6u', 6, '2015-06-02 08:39:34', NULL, '2015-03-30 18:12:35', '2015-06-02 14:39:49', NULL),
(28, 'Morgan', 'E', 'jay@tpswork.com', '$2y$10$SY6TGCavzqmOokR6d1jksOyAOpug7S5JDHx7fY2BGWD8U63UXEYOW', NULL, NULL, '2015-04-02', 'jtJcQ9Rkua5d58JEJpVloh7L1qb29LGHaHejjLFig84jag88wdybF9XlvqSx', 6, '2015-03-30 12:43:06', NULL, '2015-03-30 18:43:06', '2015-03-30 18:52:14', NULL),
(29, 'Stephen', '  Fairchild', 'fstephen@live.com', '$2y$10$lXDL8EX4h5nIYV4prIh4KuTKfFdCLbcaQ3IJQ7e8oeE.hdVnRrna.', NULL, NULL, '2015-06-04', 'c4B97jTegcfSjc3PdTiFDI7lzdeGwgZF4kHlMb2e1nKf5WHoo9qPk0eadgXU', 1, '2015-06-01 05:10:17', NULL, '2015-04-01 00:54:33', '2015-06-01 11:10:30', NULL),
(32, 'Hemali', '  Bhaumik', 'it_hemali@yahoo.com', '$2y$10$Awijx4FRvH4vY/xzmZlV7uYsH4GCIhjPbDmNkGP1zwBpt063FjCZ.', NULL, NULL, '2015-04-09', 'cXafzmKAEbGjLkP9iCH0LsCy6roS3nubZxKzKhV9nd3u5N8h6VN11ZHJL9ox', 1, '2015-05-09 09:52:49', NULL, '2015-04-06 15:59:03', '2015-05-09 17:32:13', NULL),
(33, 'Stephen', 'Fairchild', 'stephen@nettley.com', '$2y$10$y1s8Fmako6I9Knz9yoKj8uS5v7SetCGb8n0ZmkJVbNeuyzCpATv4q', NULL, NULL, '2015-05-23', 'MHowpgku9XsqDpIjKxOMp13WHUSxrpedpXFxvfHXnFxDzpsBLeRZdrueMfA3', 1, '2015-05-22 17:43:35', NULL, '2015-04-13 21:00:23', '2015-05-22 23:43:35', NULL),
(34, 'Stephen', 'Fairchild', 'jason@nettley.com', '$2y$10$J3NstkezY/jzOwBTQ0rGGu/bvGEH61IyR0jc3QNwY.QHvKXRD7ozW', NULL, NULL, '2015-04-16', 'V1tl5SECvYmaUL5kkld8PZDwj843UU80oBSfJBV5r9izRZo2F5itvrUKSPez', 1, '2015-04-14 19:03:46', NULL, '2015-04-13 21:32:28', '2015-04-15 01:04:14', NULL),
(35, 'Mike', 'G', 'mike@vprex.com', '$2y$10$TJXBzSYUE1LQ9.DfBFgKy.b/g99/hqId6hOVV3ul37uwueLbTm6fS', NULL, NULL, '2015-04-17', '6f92JpRPWvaTTMtaj1oSZZpktblrwGjbQkFkoY47IUIasAzWOEsJmegrd4q5', 1, '2015-04-14 17:55:35', NULL, '2015-04-14 23:55:35', '2015-04-14 23:57:57', NULL),
(36, 'Stephen', 'Fairchild', 'jim@nettley.com', '$2y$10$4NEoKSm9rSR5es/6xyELS.XhfooX3X2iCjjn/gz7N1guf3sEYZADW', NULL, NULL, '2015-04-17', 'PpnRwIHQvVBDDYihwag21W7c5dZc8HV7luTFeaDQ1Qp2uqJjwrU5gHQSat6w', 1, '2015-04-14 19:08:28', NULL, '2015-04-15 01:08:28', '2015-04-15 01:13:25', NULL),
(37, 'Chika', 'Otti', 'chikdizzle@gmail.com', '$2y$10$W.iR7QR3a8Am9GnPDkV28e.dEJU.jf18ySy0uPDwllG6YTP/JTIqC', NULL, NULL, '2015-05-31', 'fFJz6S9oiBp4EPqeFm28tOWfbnvBCINwO3MQn2zobOkEsOgspxYRkZb3StLz', 1, '2015-05-30 22:27:58', NULL, '2015-04-15 01:08:32', '2015-05-31 04:49:58', NULL),
(38, 'Haley', 'Chambers', 'miss-haley@live.com', '$2y$10$bxBH/n71KfGTsmx/XjFkvOZCsLpEPuEofOBznB701iXz9Ytxm/B7m', NULL, NULL, '2015-06-01', 'mJmtDu8q5LtBIUVEBXdMgZf9pfdDr2UPY4jIlpKK4n8x0O1xBAbgbIyfdi9u', 1, '2015-05-29 16:27:53', NULL, '2015-04-15 01:13:51', '2015-05-29 22:37:07', NULL),
(39, 'Stephen', 'Fairchild', 'paypal@nettley.com', '$2y$10$oTq8o0vkkPHttgmMS2loW.xUxGhVh8LAUPjei.a/HdEm.wVDyS2aS', NULL, NULL, '2015-04-17', 'UK2TYfeXenInmcoYGOqmK6KFFAoy0t439Tp7fI9WQ6PRkU0kCUlBa2FnaW9Y', 1, '2015-04-14 22:05:42', NULL, '2015-04-15 04:05:42', '2015-04-15 04:14:04', NULL),
(40, 'Stephen', 'Fairchild', 'paypal1@nettley.com', '$2y$10$SuthVpBP3eKuA1bVsYK9LOnXanwTckUpdammgJ8qYThEg96UsPOu6', NULL, NULL, NULL, 'EJ7jkaeUeK4huPQPPOaDS0eWeEBy41tYRnNPN8DMAJJx4WTnYR8eUsGBsIay', 1, '2015-04-14 22:16:05', NULL, '2015-04-15 04:16:05', '2015-04-15 04:16:09', NULL),
(41, 'stephen', 'fairchild', 'paypal2@nettley.com', '$2y$10$e2N4d.IObqTGnXIFJlPJ5Owwic.CBpk2kwySIslyo/wctmrUqDkcy', NULL, NULL, '2015-04-17', 'Xe6UDI0ur2h8bP4KuVgd97R4BkHfXG34tFQaNdmq5omd1u7cYiAxNVUKYNyY', 1, '2015-04-14 22:17:43', NULL, '2015-04-15 04:17:43', '2015-04-15 04:20:48', NULL),
(42, 'Stephen', 'Fairchild', 'paypal3@nettley.com', '$2y$10$ZN6fEhy9OOUS982wvUQepeWrBVV87wqpRcZHMRcQP.JjZvvnLtHRG', NULL, NULL, '2015-04-17', 'W4t5D8oW4OOarSlEyJmABYZFfLGebr9Ps2wOsjU7Wzf2HcwKJ6KFaodPw5Po', 1, '2015-04-14 22:21:14', NULL, '2015-04-15 04:21:14', '2015-04-15 04:22:36', NULL),
(43, 'Haley', 'Chambers', 'stephenandhaley@gmail.com', '$2y$10$FHHkoRiiiwRaK9i.IkRfruCJwQGRC7djIhrQDHtm4Z2d/l5/mRimK', NULL, NULL, '2015-04-17', 'Ibw05ZxABQW6bR0spWfLNy6aFxNhZ0c732SjhtlaxYdD6VtazwYwNoDETfRe', 1, '2015-04-14 22:39:19', NULL, '2015-04-15 04:39:19', '2015-04-15 04:39:46', NULL),
(44, 'James', 'Bond', 'bond001@gmail.com', '$2y$10$NqZ/WUaWd9oX81yG5mH7VeXp/TUy8vLr/dyT3lSjhhQxLApWlMrmO', NULL, NULL, '2015-04-17', '94Ul8RfbUXQTF1obxdoXSpngHu4ReUrtFdXSPm4LOt8lJpXcfp5YbsKQSeIf', 1, '2015-04-14 22:41:57', NULL, '2015-04-15 04:41:57', '2015-04-15 04:42:49', NULL),
(45, 'Hetal', 'G', 'hetal@gmail.com', '$2y$10$0hExP9FO/ESDqKBMtn10LeGQZ38HWO5UbrxfH1EYubUcMWRNDJV.G', NULL, NULL, NULL, 'Y80b4IZvrml8nvGcGiE0dpIdaIJEEm86jqTDlZpNOA2q7767VulpseCm25dJ', 1, '2015-04-16 19:27:34', NULL, '2015-04-17 01:27:34', '2015-04-17 02:04:41', NULL),
(46, 'ugo', '  ezeoke', 'uezeoke1@student.gsu.edu', '$2y$10$nI/0XOFrKTrSyod8Y4iZpeAZPBzv2IKR76CuQz6nOqCzTcSh0E39G', NULL, NULL, NULL, 'kRsfDvRXzLykL844tj3giF7yJ03LhfAwlUJZZGZlM6o3viL9nTDYShDR1LPy', 1, '2015-04-17 02:05:02', NULL, '2015-04-17 08:04:20', '2015-04-17 08:10:57', NULL),
(47, 'Andy', 'King', 'kingarthurventures@gmail.com', '$2y$10$zdsiC5bDUIWkfOi/nS08AuXMYA6wbCv59Rw.GiAildQRAWBMBA0dy', NULL, NULL, '2015-04-20', 'YEpc09eZI545wDXyGeW2glUA4ysoVykiQkF2p70hQVSFMdjBCbZhJ7JSiLlk', 1, '2015-04-18 02:28:09', NULL, '2015-04-17 08:11:49', '2015-04-18 08:31:58', NULL),
(48, 'andy', 'kin', 'sopsug@gmail.com', '$2y$10$riiNel8P/O1hKVOpxxrC3O08yILiCLLzEHiU70KUCA1LdQ.YkwbfG', NULL, NULL, NULL, NULL, 1, '2015-04-17 02:52:39', NULL, '2015-04-17 08:52:39', '2015-04-17 08:52:39', NULL),
(49, 'andy', 'king', 'sopsug@hotmail.com', '$2y$10$X14yC9HVKvM2nosk2k3wYeKL8AopDQXicTARAw7Ko6VyisJsYKB1y', NULL, NULL, '2015-04-20', NULL, 6, '2015-04-17 02:56:10', NULL, '2015-04-17 08:56:10', '2015-04-17 08:59:10', NULL),
(111, 'Hubert', 'Pettis', 'hubertrpettis@gmail.com', '$2y$10$YEui.i.AjRk6Ii27PD5YaODpxI0G7Zgn3sJ9TT4bUBim3gndnLo1m', NULL, NULL, NULL, 'aw1P5fzjYyxOd4XeG3UOebZIAjQMrtV1MMKMnWcDawv40Bwx455ADlRuzB7v', 1, '2015-05-27 13:58:17', NULL, '2015-05-27 19:58:15', '2015-05-27 20:06:53', 'YnJXLv0njqmzNHKql5gSmQBUkEoxCtPwmr7Olz6mdChTUOpU0lPQvSbEq5Go38ic5uw6WLJuz9rNOKWLkFRP1FTf15ut5MIVDo4d'),
(52, 'jjjjj', 'kkkkkjjjj', 'kingarthurventures@hotmail.com', '$2y$10$dqG5tXMEyxTntFLZH4yL3uVW9xxn8cdtE5MyOnadqEO/E0fUTRwOq', NULL, NULL, '2015-04-21', NULL, 1, '2015-04-18 02:33:25', NULL, '2015-04-18 08:33:23', '2015-04-18 08:33:47', NULL),
(53, 'stephen', 'fairchile', 'st@live.com', '$2y$10$7Hl7EsvN6hF47xSvsqFnyuTcHgAaWizDJ6nUqFrrDzwb14VcIGK9C', NULL, NULL, NULL, NULL, 1, '2015-04-21 19:24:54', NULL, '2015-04-22 01:24:54', '2015-04-22 01:24:54', NULL),
(78, 'Perry', 'Gold', 'prem1882@gmail.com', '$2y$10$R1FGNcEAw03AadEVbztUhOhMWjcq6T0mOpuPZ.vYT7qWqqWw50JUS', NULL, NULL, NULL, NULL, 1, '2015-05-15 13:29:42', NULL, '2015-05-15 19:29:42', '2015-05-15 19:29:42', NULL),
(77, 'Perry', 'Gold', 'pareshgan@gmail.com', '$2y$10$aH4nC2TX4UyhjSaHqssosegxwYkhwlQunn67H3Jl/05.OYMw7kppG', NULL, NULL, NULL, '9bVL8bm7vAultC6HatJCXv6Jfc5gIorOioKDhBCZC3rzobLLlDXu6vEj1YZd', 1, '2015-05-15 13:27:25', NULL, '2015-05-15 19:27:25', '2015-05-15 19:27:37', NULL),
(76, 'Samantha', 'B', 'perry@vprex.com', '$2y$10$sbZusWqpnZFGC8cJm3c/NeBqRdYu4BraMAwaG1/H1b9n.8CX3IVL6', NULL, NULL, '2015-05-25', 'lC34z5AE1qrbDEAQmfunQk9XLZ3l3wkg0sqtIvvdyJ9XcMtxOxRhLmihyuFX', 6, '2015-06-01 09:01:16', NULL, '2015-05-15 19:10:37', '2015-06-01 15:21:55', NULL),
(79, 'Mike', 'G', 'perry@techplussoftware.com', '$2y$10$AgkUCMt0B/VcGhJsiFV.L.J0FOnCp8R8xM4LtsUecqxOn3MQ61HO2', NULL, NULL, NULL, NULL, 1, '2015-05-15 13:40:25', NULL, '2015-05-15 19:40:25', '2015-05-15 19:40:25', NULL),
(80, 'smita', 'patel', 'smita.jigar@gmail.com', '$2y$10$LJCcy2FmWlclCeLsQiPDyOdm5R/qYTcPQCM1zDZ7it9isXty6VSmi', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2015-05-18 17:55:38', '2015-05-18 17:55:38', NULL),
(81, 'smita', 'patel', 'jigar.tps1@gmail.com', '$2y$10$CQ3WvqkYPEoEa/kffIt9GOc0CJErpkEnT13c1OkoQ5hE2V8iubBBG', NULL, NULL, NULL, 'W852SUsPNkWQ2pIF10eQbG8yahmS9elfEb8s5tDoVxTmItqhTN8ZvW8o0Iu5', 1, '2015-05-18 12:07:03', NULL, '2015-05-18 18:06:21', '2015-05-18 18:08:25', NULL),
(82, 'jigar', 'patel', 'jigar123t@gmail.com', '$2y$10$/r8Lng5WMsQjw1RiANnqjuemyit5.foNfMIWUi20gZx7Ml5YNKOQC', NULL, NULL, NULL, NULL, 1, '2015-05-18 12:38:47', NULL, '2015-05-18 18:38:47', '2015-05-18 18:38:47', NULL),
(83, 'jigar', 'patel', 'jigar123t@gmail.com1', '$2y$10$2MHhOdACentCMZ0MMoepZOJ0bmQRJOPMHSsIWYII394.DLQerE9Li', NULL, NULL, NULL, 'IDwi4UfGCfp6o5HS21g4KGnzNC622vopkCR6zW7Iq96g6ZDd1kY9e7Z3xVHL', 1, '2015-05-18 12:42:38', NULL, '2015-05-18 18:42:38', '2015-05-18 18:44:18', NULL),
(85, 'Dhara', 'Parmar', 'dhara.tps@gmail.com', '$2y$10$FaimCnrkkdNZHgV16w2SNOnGqjbYie75VSanQ0u6JZr6pWZpT8pxu', NULL, NULL, NULL, 'VMhbR70JKRytR1QKsUjGxndhkFltVACQoU78jDQUMi0NkANMsM9RSb1IM2Db', 1, '2015-06-01 13:39:51', NULL, '2015-05-18 19:27:09', '2015-06-01 19:39:58', NULL),
(86, 'Nomathemba', 'Midrand', 'test@test.com', '$2y$10$NQM9ZXBWC5Ka5NOFtgJpaeSeaQKZYsuWZtL8jlx6qk7bvWaR.PyJ2', NULL, NULL, '2015-05-21', 'Q8ydAscroULtcsAPvd89AyxRaCIIf0haa5YQVjeCdzWodvJGB337TLzlnlfL', 6, '2015-05-18 13:45:13', NULL, '2015-05-18 19:45:12', '2015-05-18 19:53:53', NULL),
(87, 'Test', 'test', 'test@gmail.com', '$2y$10$Xib6ptREjI5nZZN.iBZeouqw0K5vJ5z/hak14IQx66mZ1GkYuPQn6', NULL, NULL, NULL, NULL, 1, '2015-05-20 06:05:07', NULL, '2015-05-20 12:05:06', '2015-05-20 12:05:07', NULL),
(88, 'test', 'test', 'test1@test.com', '$2y$10$NYSWS9rg7GPanmB5bGNOBu178fSQFo/8h5Nzjj2nFUhxm0i7NVcl6', NULL, NULL, '2015-05-23', 'ScatMTuXkWirAB8dYWtfhEWFA2VeVN5noR1fbalIkt7BLZF8mltRqdJK9LaI', 1, '2015-05-20 11:51:17', NULL, '2015-05-20 17:51:17', '2015-05-20 17:53:28', NULL),
(89, 'test', 'teae asd', 'teaads@test.com', '$2y$10$aZV7OhUg1R7tF9Cx9wn0f.rS0d8RUuIhvkSTlCbxmLyVBZI8f2Dvq', NULL, NULL, NULL, 'yMN3sz5X8QTrMm7JHH0oP5P4b3JFUH7ptwSSZJ995oQd9YsR8Qpb8NyVuoT3', 1, '2015-05-20 11:54:25', NULL, '2015-05-20 17:54:25', '2015-05-20 17:54:33', NULL),
(90, 'asdf as', 'sa fasdf', 'tear@adsff.com', '$2y$10$u5qSSU14hxJ6QU3JUOQ3weUR5../2J6nntcqKFhNfknugcpi3H9tS', NULL, NULL, NULL, 'KB2z4Wsc3qjT8J8iPrBRvS0rRXsGwgyKUjsPhaiF6hq1D49W0uWK1dSmaQ5X', 1, '2015-05-20 11:58:43', NULL, '2015-05-20 17:58:43', '2015-05-20 18:10:19', NULL),
(91, 'test', '1', 'tetasdf@tes.com', '$2y$10$iNvQK2Bo3MyvoA8R5vZxTuXtrQNSWKIAhMXugGeCSRSoLcNm4/fWy', NULL, NULL, NULL, 'jKdQVUwUT3RJM6UPRuySxEXMobtgc3qSJ6xDmmduevfLG7MfFCWfyz4unmsW', 1, '2015-05-20 13:25:41', NULL, '2015-05-20 19:25:41', '2015-05-20 19:25:51', NULL),
(92, 'tets', 'test', 'sadfads@test.com', '$2y$10$qGjnFcBIi9PDI2XtlNqEUOvWlbP29QBC2R21xsX4B.1OO3jOsv7de', NULL, NULL, NULL, 'ZeovhvUKKhZLBkqVkFLYK2YdGBuOUc4PMxYlSQretlaBD9V401u7QgIMu7xW', 1, '2015-05-20 13:26:55', NULL, '2015-05-20 19:26:55', '2015-05-20 19:27:15', NULL),
(93, 'test', 'sdfasd', 'asdfads@test.com', '$2y$10$yw8QyVl47tihGjmQ2KVQoumoZxfTVhXdeZv/s5AizS8djOj.wVlwa', NULL, NULL, NULL, '8tmpBN2XMSpXwOpN0Gag74LCHBW4GALJ0MgET5ycZhgpXqC0qnxStGD9AQ7j', 1, '2015-05-20 13:49:33', NULL, '2015-05-20 19:49:33', '2015-05-20 19:50:14', NULL),
(94, 'dfa', 'asdfa', 'asdfasdf@test.com', '$2y$10$ZF4cVnaPEbwJmA4qqciPqeq66Vg51FcXmAC68zLYKV70di0f6F5ZK', NULL, NULL, NULL, 'cAyrirmUY9sqK3Xt0Wrvfu7xcOdEIKp9R9wpS7QREXLeIwaYMbl3LEbOCQ7u', 1, '2015-05-20 13:50:53', NULL, '2015-05-20 19:50:53', '2015-05-20 20:03:26', NULL),
(96, 'Haley', 'Chambers', 'fstephen07@icloud.com', '$2y$10$0ouQ6l90CY1FBV4VPr9PheX9JKnsKbtdV4neWdwcVMRIEcLf0TaWi', NULL, NULL, NULL, 'vAtJdwBX2M9keyrmtdPh2hhMcxplEG9JMBmEE1u7KbSIsqf22NxV414Zkhzn', 1, '2015-05-20 16:34:23', NULL, '2015-05-20 22:34:23', '2015-05-20 22:35:03', NULL),
(97, 'Hemali', 'Work', 'hemaliwork5@gmail.com', '$2y$10$NqmqOnaBwKmGZR6k9Ku6OeQI5K0iE2xI0uZnm5Nuawb.8tIvjJsdK', NULL, NULL, '2015-05-24', 'gcwraIw87ut1Lwyu7ofOSN4YlegdQSMm1hdeVOtmYk4D2yEXOuJTpxkdG15l', 1, '2015-05-21 06:13:22', NULL, '2015-05-21 12:13:22', '2015-05-21 12:15:28', NULL),
(98, 'Fenil', 'G', 'fenil@gmailyahoo.com', '$2y$10$IGSXGDfAMPi/URatzC447.fgAse..wMniNH5OOR2xugBc5/RjT2Fa', NULL, NULL, NULL, 'gKG2y9TbsRT5A2bGy87KAn03RVrgSqP9JtlH5fw1SxdixWqb87fnSpoMA4x8', 1, '2015-05-21 06:24:44', NULL, '2015-05-21 12:24:44', '2015-05-21 12:27:00', NULL),
(99, 'Stephen', 'Fairchild', 'admin@nettley.com', '$2y$10$ilAYYEWFOyWME6e6GnZ40eWiAZG4IT2t2eFbF/Ani//M5d9qMQGuK', NULL, NULL, NULL, 'eRlNDdEyXQl9kAP607dryhp63EuttIWunRdCoVhesjIAZEYkRCAVecFVtKj5', 1, '2015-05-30 22:50:11', NULL, '2015-05-21 13:20:57', '2015-05-31 04:51:01', NULL),
(100, 'jigar', 'patel', 'jk1@agent.com', '$2y$10$FqpHN8xEHKob49RXAdDvCOY8.h8ZpAf/JcGKvHWp62e1fzBSR5P7i', NULL, NULL, NULL, 'kpycbtHhxVUpFTBE7yMmes7yy91KerLymY3VID7jnFgsPK4xQuiosmOHTmjU', 1, '2015-05-21 09:08:58', NULL, '2015-05-21 13:39:52', '2015-05-21 16:26:30', NULL),
(101, 'Neha', 'Gold', 'neha@test.com', '$2y$10$9saVQfYD4fTw5CxZ7E8bLOmn154fTaXIFWp4tDaL1A1wnRGzQat36', NULL, NULL, NULL, 'LIDMCiT0dCHkKmSPc4awAvDJroLXW4R2i0prZpdDccxvY1DgGjFikgtWnTVO', 1, '2015-06-01 13:37:34', NULL, '2015-05-21 13:46:14', '2015-06-01 19:37:43', NULL),
(102, 'Jenny', 'G', 'jenny@gmail.com', '$2y$10$uVo/SdFUy.eYDo3.xO7t3.QiMshLGxg4yDv2ebuCkWjw2KqNCCfK6', NULL, NULL, NULL, 'DrVskuH9Wm4GA41Bm7MnUu4xpgUGC29QTXVHsCWW0TrvszgAVaVpNeCYPFoi', 1, '2015-05-22 15:06:57', NULL, '2015-05-22 21:06:57', '2015-05-22 21:07:14', NULL),
(103, 'Test', 'test', 'test@testing123.com', '$2y$10$l142gO5.UrtJR.8Hj6..4.qTokipqEF16/wlFW7ub/02g5.UnPEqq', NULL, NULL, NULL, 'Q3xnVZErujlUSDbe8Nl6B9UWVBs5RtNL3Irevnfj9rCHa4qjh7vzzmwBK0ri', 1, '2015-05-23 07:10:22', NULL, '2015-05-23 13:10:22', '2015-05-23 13:43:22', NULL),
(104, 'Neha', 'Gandhi', 'nehamistry19@gmail.com', '$2y$10$Qcl5HfVTaagpDoKda/uhtudna3DYC7wXcWI26KPNb4gcXUTX7Uiea', NULL, NULL, '2015-05-28', 'wk1AEu4UScuBfUGQRrd2Kbch53psxezvFwDQ5fQqZobnuVDATuONPNjIBHvz', 1, '2015-05-25 11:53:39', NULL, '2015-05-25 17:52:44', '2015-05-25 17:53:47', NULL),
(112, 'Brett', 'Meredith', 'brettbmeredith@gmail.com', '$2y$10$soxJVcnXY..3FrNJp7XX/uuIDfv7VHhTD9a1MwSkmPCJj5FhqXcHC', NULL, NULL, NULL, NULL, 1, '2015-05-27 14:08:47', NULL, '2015-05-27 20:08:45', '2015-05-27 20:08:47', 'EuVOIe64XKye69j6mBiknCZj93A5N81XdLYZaWI6HJnqnTvSNiLXamR5CbHca6b9vJhrubUe2UkWNXICiXgH1RfXT8cojGcSA9kk'),
(113, 'Chika', 'Otti', 'chykolosky@gmail.com', '$2y$10$vIgrtkg9akAANPZF/v.XJO5Rc30S9AnpxXXcWiG71n5J7hkqzkWjm', NULL, NULL, NULL, NULL, 1, '2015-05-28 22:26:47', NULL, '2015-05-29 04:26:45', '2015-05-29 04:26:47', '87aSOA5lClQkMtChnL1PkCb1f1os5dIeXwnHNP2EfeOMLU53lNWEDgDZqXeFCD5FboLALhZoWF3ajlWyooYKk9h2xykCdFrltfzl'),
(114, 'Chika', 'Otti', 'chika.otti@gmail.com', '$2y$10$fi0CApQ/6EPYz/QJVdSTUuJaE9jpJIDFh8aCHxmcLdwhULnoiydD.', NULL, NULL, '2015-06-02', 'ajbY2t1rHprX5siGuj9yOLFgTXaTTlq03da4kQ6obT4qP0k9e0nlxVSFgSLA', 1, '2015-05-28 22:29:58', NULL, '2015-05-29 04:29:56', '2015-05-30 22:21:37', NULL),
(133, 'James', 'Hastings', 'fairchildwebsolutions@gmail.com', '$2y$10$psDwXXg/8NUvfNZnmlFiYOi/aq0mpcOqZlOmxQXh6Wz2dY6pw/Tw6', NULL, NULL, '2015-06-02', 'F38aLvU7PjSAmuhW9JfwOPstBzjMD1cukafZb2FemB96B6t9mYaMGZ1NFYkM', 1, '2015-05-30 16:19:23', NULL, '2015-05-30 22:19:20', '2015-05-30 22:22:28', NULL),
(117, 'Bhaumik', 'Gadani', 'bhaumikgadani@gmail.com', '$2y$10$dnhJERUkNKirpZLkQfxUn.pjOUPF.f/EtCdgI8xR8Kgd94Ms1P1lG', NULL, NULL, '2015-06-01', '4rkWEjoOdxWxPPSozQhFyCt65aL1IK5HzkbH76c5CegCL8tAxGEwgkGneG81', 1, '2015-05-29 07:46:43', NULL, '2015-05-29 13:31:55', '2015-05-29 13:46:50', NULL),
(118, 'Joan', 'Sepulveda', 'joancsepulveda@gmail.com', '$2y$10$btCYRcEaOUFpHsqExGzyTexlxNqmM7RHvguzuC2Qg7rLQnWHqF0zC', NULL, NULL, NULL, 'mxAOq5txzSDQvbAi3E6gMfc3Op7v93SFxavzpG5N89dkIev96BwGdB9o2u1t', 1, '2015-05-29 07:54:09', NULL, '2015-05-29 13:54:06', '2015-05-29 13:57:14', '1gahhPmHh1aI2YH0e5gaTqpMaXGXaB2t7VN7tcsSY6PRj9gJUjiiT2F7nS7kAG7Hi3lKqXFmQP0Gl8EjtSYfRWtb4jkJbg8BWALl'),
(124, 'Peter', 'Ramirez', 'peteryramirez@gmail.com', '$2y$10$Pfku3/q2Dzu.Pg7s5GkxKuUcD8nJBUPUHB7WeG8bRd9GYfnq4ngWC', NULL, NULL, '2015-06-01', 'Roz9kJJiNYTxeUTOgQZXjMJxSavQnCZIQNjcCoCdLBCga6lEOyrHXpOoQlhM', 1, '2015-05-29 13:56:49', NULL, '2015-05-29 19:56:47', '2015-05-29 19:58:44', NULL),
(125, 'Amber', 'Lopez', 'amberklopez@gmail.com', '$2y$10$iEQVb2aq61pfUxN9GID3telJxM7tun8TcIe6IUFhcl4Jn.N.eun/G', NULL, NULL, '2015-06-01', 'ExnRj3LnzMum6OcS2l7T32pbKE8aL2VYMNhRZQhiMIqjQFc9sTB9HCXESwKz', 1, '2015-05-29 14:00:00', NULL, '2015-05-29 19:59:57', '2015-05-29 20:05:04', NULL),
(132, 'Lisa', 'Lewis', 'lewislisa93@gmail.com', '$2y$10$qtjANrIfy92xtBpogSCRJeL5060QhEX12hxZ6.Dx.qSEDJ7PJTakO', NULL, NULL, '2015-06-02', 'xaw6Jhf0NOQpzeA20DB0NeFcSV3GsON1oN2aFtexjNRnBHfOSGYJo3RwvUfW', 6, '2015-06-01 13:38:04', NULL, '2015-05-30 19:08:24', '2015-06-01 19:38:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
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

DROP TABLE IF EXISTS `user_usertypes`;
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
  `paypalid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=134 ;

--
-- Dumping data for table `user_usertypes`
--

INSERT INTO `user_usertypes` (`id`, `user_id`, `user_type_id`, `subscription_plan_id`, `amount`, `duration`, `has_paid`, `refferal_code`, `last_step`, `is_approved_by_admin`, `deleted_at`, `created_at`, `updated_at`, `paypalid`) VALUES
(1, 1, 1, 1, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, 2, 2, 1, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(3, 3, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(4, 4, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(7, 8, 4, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(8, 9, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(9, 10, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(10, 11, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(11, 12, 4, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(12, 13, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(13, 14, 4, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(14, 15, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(15, 16, 3, 0, 0.00, NULL, 0, NULL, 1, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(30, 30, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(17, 18, 3, 0, 0.00, NULL, 0, NULL, 6, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(25, 25, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(21, 20, 3, 0, 0.00, NULL, 0, NULL, 6, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(26, 26, 3, 0, 0.00, NULL, 0, NULL, 6, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(27, 27, 3, 0, 0.00, NULL, 0, NULL, 6, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(28, 28, 3, 0, 0.00, NULL, 0, NULL, 6, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(29, 29, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(31, 31, 3, 0, 0.00, NULL, 0, NULL, 2, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(32, 32, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(33, 33, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(34, 34, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(35, 35, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(36, 36, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(37, 37, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(38, 38, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(39, 39, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(40, 40, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(41, 41, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(42, 42, 4, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(43, 43, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(44, 44, 4, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(45, 45, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(46, 46, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(47, 46, 4, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(48, 46, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(49, 47, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(50, 48, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(51, 49, 3, 0, 0.00, NULL, 0, NULL, 6, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(53, 51, 5, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(54, 52, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(55, 53, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(56, 54, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(57, 55, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(58, 56, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(59, 57, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(60, 58, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(61, 59, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(65, 63, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(64, 62, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(66, 64, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(67, 65, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(68, 66, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(69, 67, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(70, 68, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(71, 69, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(72, 70, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(73, 71, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(74, 72, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(75, 73, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(76, 74, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(77, 75, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(78, 76, 3, 0, 0.00, NULL, 0, NULL, 6, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(79, 77, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(80, 78, 4, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(81, 79, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(82, 81, 4, 0, 0.00, NULL, 0, 'GdN2z202', 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '123'),
(83, 82, 4, 0, 0.00, NULL, 0, '0RGvUNtz', 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'test'),
(84, 83, 4, 0, 0.00, NULL, 0, 'TLVD7f6i', 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'testpaypalid123'),
(85, 84, 4, 0, 0.00, NULL, 0, 'W5qdw3sN', 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(86, 85, 4, 0, 0.00, NULL, 0, 'rLTA1lVI', 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dhara1234'),
(87, 86, 3, 0, 0.00, NULL, 0, NULL, 6, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(88, 87, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(89, 88, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(90, 89, 4, 0, 0.00, NULL, 0, 'Smz8jRlh', 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'af asd fa'),
(91, 90, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(92, 91, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(93, 92, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(94, 93, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(95, 94, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(97, 96, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(98, 97, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(99, 98, 4, 0, 0.00, NULL, 0, 'cm5lpJ6G', 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'fenil@gmailyahoo.com'),
(100, 99, 5, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(101, 100, 4, 0, 0.00, NULL, 0, 'Jksn6pFb', 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'jk@agent.com'),
(102, 101, 4, 0, 0.00, NULL, 0, '7mT7kmWb', 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'neha123'),
(103, 102, 4, 0, 0.00, NULL, 0, 'lBHgHBVm', 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'jenny@gmail.com'),
(104, 103, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(105, 104, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(106, 105, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(107, 106, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(108, 108, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(109, 109, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(110, 110, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(111, 111, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(112, 112, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(113, 113, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(114, 114, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(115, 115, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(116, 116, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(117, 117, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(118, 118, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(119, 119, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(120, 120, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(121, 121, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(122, 122, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(123, 123, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(124, 124, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(125, 125, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(126, 126, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(127, 127, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(128, 128, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(129, 129, 2, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(130, 130, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(131, 131, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(132, 132, 3, 0, 0.00, NULL, 0, NULL, 6, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(133, 133, 3, 0, 0.00, NULL, 0, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
