--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `grade` varchar(15) NOT NULL,
  `cut_off` float NOT NULL,
  `branches_allowed` varchar(65) NOT NULL,
  `backs_allowed` varchar(65) NOT NULL,
  `details` mediumtext NOT NULL,
  `close_date` varchar(100) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `companyapply`
--

CREATE TABLE IF NOT EXISTS `companyapply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `student_rollnum` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `companyprofile`
--

CREATE TABLE IF NOT EXISTS `companyprofile` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `address` varchar(400) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `hr_name` varchar(100) NOT NULL,
  `hr_designation` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `landline` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `head_name` varchar(100) NOT NULL,
  `head_mobile` varchar(100) NOT NULL,
  `head_landline` varchar(100) NOT NULL,
  `head_email` varchar(100) NOT NULL,
  `job_desig` varchar(200) NOT NULL,
  `job_describe` varchar(1000) NOT NULL,
  `place` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `hra` varchar(100) NOT NULL,
  `gross` varchar(100) NOT NULL,
  `othercompensation` varchar(100) NOT NULL,
  `takehome` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `details` varchar(100) NOT NULL,
  `mhra` varchar(100) NOT NULL,
  `mgross` varchar(100) NOT NULL,
  `mothercompensation` varchar(100) NOT NULL,
  `mtakehome` varchar(100) NOT NULL,
  `mcost` varchar(100) NOT NULL,
  `mdetails` varchar(100) NOT NULL,
  `ece` varchar(100) NOT NULL,
  `cse` varchar(100) NOT NULL,
  `it` varchar(100) NOT NULL,
  `ice` varchar(100) NOT NULL,
  `mpae` varchar(100) NOT NULL,
  `bt` varchar(100) NOT NULL,
  `sp` varchar(100) NOT NULL,
  `infos` varchar(100) NOT NULL,
  `pc` varchar(100) NOT NULL,
  `ppt` varchar(100) NOT NULL,
  `percent` varchar(100) NOT NULL,
  `resume_short` varchar(100) NOT NULL,
  `test` varchar(100) NOT NULL,
  `testtype` varchar(200) NOT NULL,
  `gd` varchar(100) NOT NULL,
  `ti` varchar(100) NOT NULL,
  `hri` varchar(100) NOT NULL,
  `others` varchar(100) NOT NULL,
  `bond` varchar(100) NOT NULL,
  `bonddetails` varchar(1000) NOT NULL,
  `result` varchar(100) NOT NULL,
  `days` varchar(100) NOT NULL,
  `executives` varchar(100) NOT NULL,
  `rooms` varchar(100) NOT NULL,
  `otherinfra` varchar(500) NOT NULL,
  `loginstatus` int(100) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `publisher` varchar(50) NOT NULL,
  `title` mediumtext NOT NULL,
  `content` mediumtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE IF NOT EXISTS `placement` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `roll_num` varchar(255) NOT NULL,
  `job_1` varchar(255) NOT NULL,
  `job_2` varchar(255) NOT NULL,
  `job_3` varchar(255) NOT NULL,
  `job_4` varchar(255) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `roll_num` (`roll_num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
  `rollnum` varchar(10) NOT NULL,
  `res1_address` varchar(255) NOT NULL,
  `res1` int(11) NOT NULL DEFAULT '0',
  `res2_address` varchar(255) NOT NULL,
  `res2` int(11) NOT NULL DEFAULT '0',
  `res3_address` varchar(255) NOT NULL,
  `res3` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rollnum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `stud_category` varchar(100) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `rollnum` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `be_percentdrop` float NOT NULL,
  `be_percent` float NOT NULL,
  `x_percent` float NOT NULL,
  `x_s_percent` float NOT NULL,
  `x_m_percent` float NOT NULL,
  `xii_percent` float NOT NULL,
  `xii_pcm_percent` float NOT NULL,
  `xii_m_percent` float NOT NULL,
  `x_year` int(11) NOT NULL,
  `xii_year` int(11) NOT NULL,
  `yr1_percent` float NOT NULL,
  `yr2_percent` float NOT NULL,
  `yr3_percent` float NOT NULL,
  `sem1_percent` float NOT NULL,
  `sem2_percent` float NOT NULL,
  `sem3_percent` float NOT NULL,
  `sem4_percent` float NOT NULL,
  `sem5_percent` float NOT NULL,
  `sem6_percent` float NOT NULL,
  `email` varchar(100) NOT NULL,
  `alt_email` varchar(100) NOT NULL,
  `presnt_add` varchar(255) NOT NULL,
  `perm_add` varchar(255) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `father_occ` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `mother_occ` varchar(50) NOT NULL,
  `father_cntct` varchar(25) NOT NULL,
  `backs` int(11) NOT NULL,
  `cntct` varchar(25) NOT NULL,
  `alt_cntct` varchar(25) NOT NULL,
  `cee_rnk` varchar(15) NOT NULL,
  `aiee_rnk` varchar(15) NOT NULL,
  `iit_rnk` varchar(15) NOT NULL,
  `intern_comp` mediumtext NOT NULL,
  `intern_title` mediumtext NOT NULL,
  `extra_co` mediumtext NOT NULL,
  `message_counter` int(255) NOT NULL,
  `upload_counter` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rollnum`),
  UNIQUE KEY `sid_2` (`sid`),
  KEY `rollnum` (`rollnum`),
  KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `uid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` varchar(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
