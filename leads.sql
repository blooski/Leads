-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2008 at 05:08 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leads`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `Contact` varchar(30) NOT NULL,
  `ConDate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `Note` text NOT NULL,
  PRIMARY KEY  (`Contact`,`ConDate`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`Contact`, `ConDate`, `Note`) VALUES
('Ashton Sanders', '2008-08-05 12:40:52', 'Sent email nudge about resume data.'),
('Ashton Sanders', '2008-08-06 02:09:28', 'Got skills write-up, need site list and amt of experience.'),
('Ashton Sanders', '2008-08-12 12:31:40', 'Asked for rates and set fees.'),
('Charlene Boor', '2008-08-06 02:28:36', 'Talked to Char - nothing off hand, will chat more in next couple of days.'),
('Charles Zhang', '2008-08-15 02:08:41', 'Said not interested right now.'),
('Gail Stanhope', '2008-08-12 11:17:43', 'Wasn&#039;t feeling well this morning and went home.  Call tomorrow.'),
('Gail Stanhope', '2008-08-13 11:53:45', 'Verified check went out.  Will call later with more project info.'),
('Gail Stanhope', '2008-08-15 02:07:56', 'Called back with more work yesterday.'),
('Gail Stanhope', '2008-08-18 04:21:43', 'Talked about Employee job with Evelyn,  and Menus'),
('Jeff Taylor', '2008-08-06 03:06:33', 'Called - WCB'),
('Jeff Taylor', '2008-08-08 02:20:36', 'Called - WCB'),
('Jeff Taylor', '2008-08-13 12:05:02', 'Jeff called back, and said the project is still under development.  Will be ready to talk about programming it in about a month.'),
('Kathy Penise', '2008-08-06 02:13:56', 'Called - LM'),
('Kathy Penise', '2008-08-07 01:40:47', 'Returned call.  Said was aware I was looking for .NET work and would be on look out.'),
('Kathy Penise', '2008-08-14 03:14:12', 'Out of Town (Vac?) til 08/24'),
('Matthew Wright', '2008-08-06 02:07:53', 'Got late night email saying he would talk to corp guys about calling me.  May be 2-3 days.'),
('Matthew Wright', '2008-08-12 12:23:21', 'Emailed a nudge'),
('Matthew Wright', '2008-08-14 02:23:49', 'Got back and said he thought the deal was dead.  Might know some recruiters.'),
('Mo Budlong', '2008-08-08 02:24:50', 'Sent nudge email.'),
('Mo Budlong', '2008-08-12 12:26:59', 'Nudge on contract work.'),
('Mo Budlong', '2008-08-14 02:24:58', 'Said only Mo is working on projects right now, but would keep me in mind.'),
('Philip Johnston', '2008-08-09 09:27:45', 'Exchanged several emails.  Has new projects in php/mysql coming up soon.  Maybe e-commerce.'),
('Philip Johnston', '2008-08-15 03:02:13', 'Sent nudge about new projects.'),
('Rob Taylor', '2008-08-06 03:33:42', 'Got me on file.  Will get back if jobs come up'),
('Rob Taylor', '2008-08-06 03:42:47', 'Sent email nudge about jobs.'),
('Rob Taylor', '2008-08-08 02:33:31', 'Wrote another email talking about what they do after looking at their website, and how I do the same.'),
('Rob Taylor', '2008-08-11 07:22:02', 'Sent email with details of work plans.  Sounds like he is ready to go.  Will send paperwork to look over and sign, and then come up with a small first project.'),
('Rob Taylor', '2008-08-13 11:54:56', 'on 08/11/08 sent many details of work and procedures.  Talked of sending Non-Ds and contracts.  I affirmed intentions and said let&#039;s go.'),
('Rob Taylor', '2008-08-13 11:57:37', 'Nudge on last email.'),
('Rob Taylor', '2008-08-13 12:07:06', 'Rob got back and said will reply this evening.'),
('Rob Taylor', '2008-08-15 02:54:43', 'Sent nudge.'),
('Ron Edison', '2008-08-06 02:10:19', 'Referred to his friend Matthew. Will keep in mind for future work.'),
('Ron Edison', '2008-08-12 12:34:32', 'Wrote thank you note, and plugged for more referrals.');

-- --------------------------------------------------------

--
-- Table structure for table `prospects`
--

CREATE TABLE `prospects` (
  `Contact` varchar(30) NOT NULL,
  `Company` varchar(30) NOT NULL,
  `Address1` varchar(30) NOT NULL,
  `Address2` varchar(30) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(2) NOT NULL,
  `Zip` varchar(10) NOT NULL,
  `Phone` varchar(16) NOT NULL,
  `Ext` varchar(10) NOT NULL,
  `Fax` varchar(16) NOT NULL,
  `Cell` varchar(16) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `DateAdd` datetime NOT NULL,
  `LastDate` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `NextDate` datetime NOT NULL,
  `Status` int(11) NOT NULL default '0',
  PRIMARY KEY  (`Contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prospects`
--

INSERT INTO `prospects` (`Contact`, `Company`, `Address1`, `Address2`, `City`, `State`, `Zip`, `Phone`, `Ext`, `Fax`, `Cell`, `Email`, `DateAdd`, `LastDate`, `NextDate`, `Status`) VALUES
('Ashton Sanders', 'Web Sites in a Flash', '', '', '', '', '', '406-471-2171', '', '', '', 'ash@websitesinaflash.com', '2008-07-28 00:00:00', '2008-08-18 16:26:12', '2008-08-19 00:00:00', 4),
('Charlene Boor', 'Pro Busisnes Solutions', '', '', '', '', '', '323-667-1509', '', '', '323-630-9347', 'kencharlene@earthlink.net', '2008-08-05 12:54:28', '2008-08-18 16:25:52', '2008-08-23 00:00:00', 1),
('Charles Zhang', 'Engroove Consulting', '', '', '', '', '', '', '', '', '', 'charles@engrooveconsulting.com', '2008-08-11 15:15:15', '2008-08-15 14:09:09', '2008-08-18 00:00:00', 4),
('Gail Stanhope', 'Coronet Lighting', '16210 S Avalon Blvd', '', 'Gardena', 'CA', '90248', '310-327-6700', 'Ext. 128', '', '', 'gstanhope@coronetlighting.com', '2008-07-08 05:04:39', '2008-08-18 16:24:14', '2008-08-20 00:00:00', 3),
('Jeff Taylor', 'Lighting Control & Design', '905 Allen Ave.', '', 'Glendale', 'CA', '91201', '323.226.0000', '', '', '', 'personnel@lightingcontrols.com', '2008-07-28 00:00:00', '2008-08-13 12:06:03', '2008-09-13 00:00:00', 2),
('Kathy Penise', '', '27710 Firebrand Dr', '', 'Castaic', 'CA', '91384', '661-775-5657', '', '', '661-733-4515', 'KathyPennise@EarthLink.net', '2008-08-05 12:52:08', '2008-08-14 15:14:54', '2008-08-27 00:00:00', 1),
('Marisol Lomas', 'Coronet Lighting', '16210 S Avalon Blvd', '', 'Gardena', 'CA', '90248', '310-327-6700', '', '', '', 'mlomas@coronetlighting.com', '2008-07-08 05:06:27', '2008-08-07 16:10:13', '2008-08-04 00:00:00', 4),
('Matthew Wright', 'Pro-Tech', '', '', '', '', '', '', '', '', '', 'one@matthewdlw.com', '2008-08-05 01:50:05', '2008-08-14 14:24:28', '2008-08-21 00:00:00', 1),
('Mo Budlong', 'King Computer Services', '3115 Foothill Blvd. Suite M250', '', 'La Crescenta', 'CA', '91214', '818-951-5240', '', '818-353-1278', '', 'hpbudlong@aol.com', '2008-07-28 00:00:00', '2008-08-14 14:25:36', '2008-09-15 00:00:00', 1),
('Philip Johnston', 'NewThink', '', '', '', '', '', '213-999-2636', '', '', '', 'philip@newthink.com', '2008-08-09 16:05:23', '2008-08-15 15:02:34', '2008-08-20 00:00:00', 2),
('Rob Taylor', 'TConsult, Inc.', '', '', '', '', '', '585-367-2483', '', '', '', 'rob@enginesforwebsites.com', '2008-08-05 12:54:42', '2008-08-18 16:27:06', '2008-08-19 00:00:00', 3),
('Ron Edison', 'The Edison Group', '501 West Glenoaks Blvd.', 'Suite #327', 'Glendale', 'CA', '91292', '866-243-7316', '', '', '818-572-5725', 'ron@edisongroup.net', '2008-07-29 01:05:38', '2008-08-12 12:35:12', '2008-08-20 00:00:00', 1);
