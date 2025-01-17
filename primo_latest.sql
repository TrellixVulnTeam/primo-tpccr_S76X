-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 10:38 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `primo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldataentry`
--

CREATE TABLE `tbldataentry` (
  `ColumnID` int(11) NOT NULL,
  `FieldName` varchar(500) NOT NULL,
  `FieldType` varchar(500) NOT NULL,
  `FieldOption` longtext NOT NULL,
  `FieldCaption` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldataentry`
--

INSERT INTO `tbldataentry` (`ColumnID`, `FieldName`, `FieldType`, `FieldOption`, `FieldCaption`, `created_at`, `updated_at`) VALUES
(2, 'Title', 'text', '', 'Title', NULL, NULL),
(3, 'Register', 'dropdown', 'Health & Safety|Environment|Join Environment and Health & Safety|Other', 'Register', NULL, NULL),
(4, 'Type', 'text', 'Act|Regulation|Directive|Rule|Order|Other', 'Type', NULL, NULL),
(5, 'Priority', 'dropdown', 'Primary|Secondary|Tertiary', 'Priority', NULL, NULL),
(6, 'Topic', 'dropdown', 'Boilers|Boilers - Boilers & Combustion Equipment|Boilers - Pressure Systems|Chemicals|Chemicals - Asbestos|Chemicals - Banned or Restricted Substances|Chemicals - Transport of Dangerous Goods|Chemicals - Tanks for Hazardous or Polluting Substances|Chemicals - Biocides and Pesticides|Chemicals - Registration|Climate Change - Refrigerants|Climate Change - Greenhouse Gas Emissions|Climate Change - Smoke and Burning Waste|Climate Change - Solvents|Climate Change - Emissions from Vehicles|Construction  - Building Permits|Construction  - Construction Work|COVID-19|Energy efficiency - Energy Efficiency|Energy efficiency - Eco-Design and Energy Labels|Energy efficiency - Energy Conservation in Buildings|Equipment - Electrical Safety|Equipment - Elevators|Equipment - Lifting Equipment|Equipment - Work Equipment|Equipment - Mobile Industrial Equipment|Equipment - Quality Marks for Products|Equipment - Restrictions on Hazardous Content|EU Exit/Withdrawal|Explosives|Explosives - Radiation|Explosives - Non-ionising Radiation|Finance/Tax|Fire Safety|First Aid|Major Accident Prevention|Nature Conservation|Nature Conservation - Genetically Modified Organisms|Nature Conservation - Timber Products|Permits & Licences - Environmental Permit|Permits & Licences - Environmental Impact Assessment|Permits & Licences - Environmental Noise|Permits & Licences - Liability for Environmental Damage|Permits & Licences - Odours|Permits & Licences|Permits & Licences - Soil Pollution/Contaminated Land|Permits & Licences - Business Registration/Permits|Road Safety|Waste - Hazardous|Waste - Packaging|Waste - Solid|Waste - Electrical & Electronic Equipment|Waste - Animal By-Products|Waste - End of Life Vehicles|Waste - Extended Producer Responsibility|Waste - Food /Biodegradable|Waste - Litter|Waste - Medical|Water - Wastewater|Water - Drinking Water Quality|Water - Groundwater Protection|Water - Stormwater|Water - Use of Waters/Abstraction|Water - Sewage|Workplace Safety - Accident Reporting|Workplace Safety - Display Screens|Workplace Safety - Manual Handling|Workplace Safety - Medicals/Occupational Health|Workplace Safety - Legionella|Workplace Safety - Pregnancy|Workplace Safety - Risk Assessment|Workplace Safety - Safety Committee|Workplace Safety - Safety Management|Workplace Safety - Safety Professionals|Workplace Safety - Work at Heights|Workplace Safety - Biological Agents|Workplace Safety - Confined Spaces|Workplace Safety - Explosive Atmospheres|Workplace Safety - Noise|Workplace Safety - Safety Signs|Workplace Safety - Stress/Bullying/Violence|Workplace Safety - Training And Information|Workplace Safety - Vibration|Workplace Safety - Working Time|Workplace Safety - Food Quality Management|Workplace Safety - Young Persons|Workplace Safety - Workplace', 'Topic', NULL, NULL),
(7, 'OriginatingDate', 'date', '', 'OriginatingDate', NULL, NULL),
(8, 'StateDate', 'date', '', 'StateDate', NULL, NULL),
(9, 'Status', 'dropdown', 'In force|Inactive|Repealed|Other', 'Status', NULL, NULL),
(10, 'Remarks', 'textarea', '', 'Remarks', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblmlconfig`
--

CREATE TABLE `tblmlconfig` (
  `id` int(11) NOT NULL,
  `MLName` varchar(250) NOT NULL,
  `Endpoint` varchar(250) NOT NULL,
  `APIKey` varchar(1500) NOT NULL,
  `DefaultKey` varchar(250) NOT NULL,
  `AutoLoad` bit(1) NOT NULL,
  `SourceInput` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmlconfig`
--

INSERT INTO `tblmlconfig` (`id`, `MLName`, `Endpoint`, `APIKey`, `DefaultKey`, `AutoLoad`, `SourceInput`, `created_at`, `updated_at`) VALUES
(1, 'Source Extraction', 'API/SourceExtraction.php', 'e9e2b483b1a87e633c3093393d9573a3', 'dfcf4d57-8ce1-46df-becb-1b10d31b2e58', b'1', 'https://api.innodatalabs.com/datavault/', NULL, NULL),
(2, 'Text Categorization', 'API/TopicClassification.php', 'asdaskdjjl1121kjkasdnk1sd', 'Basic YXBpZHJpdmVyOnRoaXNpc2F2ZXJ5dmVyeXNlY3JldGtleTc3Nzc=', b'0', 'http://api.innodatalabs.com/v1/documents/input/', NULL, NULL),
(3, 'Sequence Labelling', 'API/Reference.php', 'd3d1e15f39fe876cf3d943abb3277ee8', 'Basic YXBpZHJpdmVyOnRoaXNpc2F2ZXJ5dmVyeXNlY3JldGtleTc3Nzc=', b'0', 'http://api.innodatalabs.com/v1/reference/', NULL, NULL),
(4, 'OCR', 'API/OCR.php', '', '', b'0', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblreport`
--

CREATE TABLE `tblreport` (
  `ReportID` int(11) NOT NULL,
  `ReportName` varchar(500) NOT NULL,
  `ReportDescription` varchar(2500) NOT NULL,
  `ReportSource` varchar(2500) NOT NULL,
  `Mainpage` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreport`
--

INSERT INTO `tblreport` (`ReportID`, `ReportName`, `ReportDescription`, `ReportSource`, `Mainpage`, `created_at`, `updated_at`) VALUES
(1, 'EXE Major Report', 'test', 'https://app.powerbi.com/view?r=eyJrIjoiY2RkMzUwOGEtNGY0OS00MDAxLWIzMjEtYzMyNjcxYTcyMWJjIiwidCI6ImJlOTJjNTM0LTdiNjAtNDYzMC1iYzAxLWVjNTEyMjU0OGQ0NyIsImMiOjEwfQ%3D%3D', 0, NULL, NULL),
(2, 'Job Status', 'List of Jobs with status', 'TrackingReport.php', 0, NULL, NULL),
(3, 'User Productivity Report', 'User Productivity', 'UserProductivity.php', 0, NULL, NULL),
(4, 'Acquisition Report', 'Acquisition Report', 'AcquisitionReport.php', 0, NULL, NULL),
(5, 'Tracking Report', 'Tracking Report', 'TrackingReport.php', 0, NULL, NULL),
(6, 'State Monitoring', 'State Monitoring', 'StateMonitoring.php', 0, NULL, NULL),
(7, 'QA Report', 'List of files submitted to QA', 'QAReport.php', 0, NULL, NULL),
(8, 'TITO Report', 'Task In Task Out', 'TITOReport.php', 0, NULL, NULL),
(9, 'Dashboard', 'User Dashboard', 'Dashboard.php', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstatus`
--

CREATE TABLE `tblstatus` (
  `StatusID` int(11) NOT NULL,
  `Jobname` varchar(50) NOT NULL,
  `Process` varchar(150) NOT NULL,
  `MLName` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstatus`
--

INSERT INTO `tblstatus` (`StatusID`, `Jobname`, `Process`, `MLName`, `created_at`, `updated_at`) VALUES
(2, '251', 'STYLING', 'Text Categorization', NULL, NULL),
(6, '250', 'TEXTCAT', 'Source Extraction', NULL, NULL),
(10, '251', 'STYLING', 'Sequence Labelling', NULL, NULL),
(11, '251', 'STYLING', 'Source Extraction', NULL, NULL),
(13, '255', 'STYLING', 'Source Extraction', NULL, NULL),
(14, '255', 'STYLING', 'Sequence Labelling', NULL, NULL),
(37, '259', 'STYLING', 'Text Categorization', NULL, NULL),
(38, '259', 'STYLING', 'Sequence Labelling', NULL, NULL),
(39, '250', 'TEXTCAT', 'Text Categorization', NULL, NULL),
(41, '259', 'STYLING', 'Source Extraction', NULL, NULL),
(42, '263', 'STYLING', 'Source Extraction', NULL, NULL),
(61, '', '', 'Text Categorization', NULL, NULL),
(62, '267', 'STYLING', 'Source Extraction', NULL, NULL),
(63, '267', 'STYLING', 'Text Categorization', NULL, NULL),
(64, '267', 'STYLING', 'Sequence Labelling', NULL, NULL),
(65, '271', 'STYLING', 'Source Extraction', NULL, NULL),
(66, '271', 'STYLING', 'Text Categorization', NULL, NULL),
(67, '271', 'STYLING', 'Sequence Labelling', NULL, NULL),
(68, '275', 'STYLING', 'Source Extraction', NULL, NULL),
(69, '275', 'STYLING', 'Text Categorization', NULL, NULL),
(70, '275', 'STYLING', 'Sequence Labelling', NULL, NULL),
(71, '3685', 'STYLING', 'Source Extraction', NULL, NULL),
(72, '4011', 'STYLING', 'Sequence Labelling', NULL, NULL),
(73, '4015', 'STYLING', 'Sequence Labelling', NULL, NULL),
(76, '4069', 'STYLING', 'Sequence Labelling', NULL, NULL),
(78, '4077', 'STYLING', 'Sequence Labelling', NULL, NULL),
(79, '4085', 'STYLING', 'Sequence Labelling', NULL, NULL),
(80, '4089', 'STYLING', 'Sequence Labelling', NULL, NULL),
(81, '4091', 'STYLING', 'Sequence Labelling', NULL, NULL),
(82, '4095', 'STYLING', 'Sequence Labelling', NULL, NULL),
(83, '4097', 'STYLING', 'Sequence Labelling', NULL, NULL),
(84, '4127', 'STYLING', 'Sequence Labelling', NULL, NULL),
(85, '4137', 'STYLING', 'Sequence Labelling', NULL, NULL),
(86, '4139', 'STYLING', 'Sequence Labelling', NULL, NULL),
(87, '5013', 'STYLING', 'Source Extraction', NULL, NULL),
(94, '', 'STYLING', 'Source Extraction', NULL, NULL),
(95, '5053', 'STYLING', 'Source Extraction', NULL, NULL),
(96, '5179', 'STYLING', 'Source Extraction', NULL, NULL),
(97, '5059', 'STYLING', 'Source Extraction', NULL, NULL),
(98, '5083', 'STYLING', 'Source Extraction', NULL, NULL),
(99, '5087', 'STYLING', 'Source Extraction', NULL, NULL),
(100, '5089', 'STYLING', 'Source Extraction', NULL, NULL),
(104, '5079', 'STYLING', 'Source Extraction', NULL, NULL),
(105, '5141', 'STYLING', 'Source Extraction', NULL, NULL),
(106, '5201', 'STYLING', 'Source Extraction', NULL, NULL),
(107, '10511', 'STYLING', 'Source Extraction', NULL, NULL),
(109, '12145', 'STYLING', 'Source Extraction', NULL, NULL),
(110, '17571', 'STYLING', 'Source Extraction', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstyles`
--

CREATE TABLE `tblstyles` (
  `StyleID` int(11) NOT NULL,
  `StyleName` varchar(100) NOT NULL,
  `Color` varchar(150) NOT NULL,
  `FontColor` varchar(50) NOT NULL,
  `Inline` int(11) NOT NULL,
  `ctrlKey` int(1) NOT NULL,
  `Shftkey` int(1) NOT NULL,
  `KeyVal` varchar(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstyles`
--

INSERT INTO `tblstyles` (`StyleID`, `StyleName`, `Color`, `FontColor`, `Inline`, `ctrlKey`, `Shftkey`, `KeyVal`, `created_at`, `updated_at`) VALUES
(49, 'Caption', '#59acff', '#000000', 1, 1, 1, 'C', NULL, NULL),
(50, 'Content', '#800040', '#ffffff', 0, 1, 1, '1', NULL, NULL),
(51, 'EffectiveDate', '#ff80c0', '#000000', 1, 1, 1, 'E', NULL, NULL),
(52, 'ShortName', '#ff8040', '#000000', 1, 1, 1, 'S', NULL, NULL),
(53, 'RevisionHistory', '#004040', '#ffffff', 0, 1, 1, 'R', NULL, NULL),
(54, 'Description', '#0080c0', '#ffffff', 1, 1, 1, 'D', NULL, NULL),
(55, 'ExpirationDate', '#008080', '#ffffff', 1, 1, 1, 'X', NULL, NULL),
(56, 'MainCaption', '#f30c11', '#000000', 1, 1, 1, 'M', NULL, NULL),
(57, 'MainDescription', '#004080', '#ffffff', 1, 1, 1, 'I', NULL, NULL),
(58, 'ActNumber', '#ffffd2', '#000000', 1, 1, 1, 'A', NULL, NULL),
(59, 'SourceNoteLink', '#8080ff', '#ffffff', 1, 1, 1, 'K', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbltagmapping`
--

CREATE TABLE `tbltagmapping` (
  `MappingID` int(11) NOT NULL,
  `StyleName` varchar(500) NOT NULL,
  `StartTag` varchar(500) NOT NULL,
  `EndTag` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltagmapping`
--

INSERT INTO `tbltagmapping` (`MappingID`, `StyleName`, `StartTag`, `EndTag`, `created_at`, `updated_at`) VALUES
(2, 'subject_area', 'subject_area', 'subject_area', NULL, NULL),
(3, 'note', 'note', 'note', NULL, NULL),
(4, 'court', 'court', 'court', NULL, NULL),
(5, 'case_name', 'case_name', 'case_name', NULL, NULL),
(6, 'docket_number', 'docket_number', 'docket_number', NULL, NULL),
(7, 'date_submitted', 'date_submitted', 'date', NULL, NULL),
(9, 'date_decided', 'date_decided', 'date', NULL, NULL),
(10, 'prior_history', 'prior_history', 'prior_history', NULL, NULL),
(11, 'counsel', 'counsel', 'counsel', NULL, NULL),
(12, 'judge', 'judge', 'judge', NULL, NULL),
(13, 'section', 'section', 'section', NULL, NULL),
(14, 'party', 'party', 'party', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbltaskeditorsetting`
--

CREATE TABLE `tbltaskeditorsetting` (
  `TaskID` int(11) NOT NULL,
  `Source` int(11) NOT NULL,
  `Styling` int(11) NOT NULL,
  `XMLEditor` int(11) NOT NULL,
  `SequenceLabeling` int(11) NOT NULL,
  `TextCategorization` int(11) NOT NULL,
  `DataEntry` int(1) NOT NULL,
  `TreeView` int(11) NOT NULL,
  `MenuGroup` varchar(50) NOT NULL,
  `sgml_transformation` int(11) NOT NULL,
  `Processcode` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltaskeditorsetting`
--

INSERT INTO `tbltaskeditorsetting` (`TaskID`, `Source`, `Styling`, `XMLEditor`, `SequenceLabeling`, `TextCategorization`, `DataEntry`, `TreeView`, `MenuGroup`, `sgml_transformation`, `Processcode`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0, 'ENRICH', 0, 'P01', NULL, NULL),
(2, 1, 0, 1, 0, 0, 0, 1, 'ENRICH', 0, 'ContentStructure', NULL, NULL),
(3, 1, 1, 0, 0, 0, 0, 1, 'ENRICH', 0, 'P03', NULL, NULL),
(5, 1, 0, 1, 1, 0, 0, 1, 'ENRICH', 0, 'CropImageEdit', NULL, NULL),
(8, 1, 1, 1, 1, 0, 0, 1, 'ENRICH', 0, 'QA', NULL, NULL),
(7, 1, 0, 1, 0, 0, 0, 1, 'ENRICH', 0, 'Rework', NULL, NULL),
(6, 1, 0, 1, 0, 0, 0, 0, 'ENRICH', 0, 'Validation', NULL, NULL),
(10, 1, 1, 1, 0, 0, 0, 0, 'ENRICH', 0, 'PostQA', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbltaskml`
--

CREATE TABLE `tbltaskml` (
  `id` int(11) NOT NULL,
  `TaskID` int(11) NOT NULL,
  `MLID` int(11) NOT NULL,
  `Autoload` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltaskml`
--

INSERT INTO `tbltaskml` (`id`, `TaskID`, `MLID`, `Autoload`, `created_at`, `updated_at`) VALUES
(56, 4, 1, 0, NULL, NULL),
(57, 4, 2, 0, NULL, NULL),
(121, 8, 1, 0, NULL, NULL),
(122, 8, 2, 0, NULL, NULL),
(123, 8, 3, 0, NULL, NULL),
(136, 2, 3, 0, NULL, NULL),
(137, 5, 1, 0, NULL, NULL),
(138, 5, 2, 0, NULL, NULL),
(139, 5, 3, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbltaskplugin`
--

CREATE TABLE `tbltaskplugin` (
  `PluginID` int(11) NOT NULL,
  `PluginName` varchar(100) NOT NULL,
  `PluginEXE` varchar(100) NOT NULL,
  `UI` varchar(100) NOT NULL,
  `PluginType` varchar(100) NOT NULL,
  `TaskID` int(11) NOT NULL,
  `Processcode` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbltransmission`
--

CREATE TABLE `tbltransmission` (
  `id` int(11) NOT NULL,
  `TransmissionType` varchar(100) NOT NULL,
  `FTPSite` varchar(20) NOT NULL,
  `Directory` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `EmailAddress` varchar(150) NOT NULL,
  `CC` varchar(2000) NOT NULL,
  `Subject` varchar(500) NOT NULL,
  `MailBody` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltransmission`
--

INSERT INTO `tbltransmission` (`id`, `TransmissionType`, `FTPSite`, `Directory`, `UserName`, `Password`, `EmailAddress`, `CC`, `Subject`, `MailBody`, `created_at`, `updated_at`) VALUES
(1, 'FTP', '10.168.1.10', 'root', 'test', 'test', '', '0', '', '', NULL, NULL),
(2, 'MAIL', '', '', '', '', 'xwk@innodata.com; jserrano@innodata.com', 'xwk@innodata.com', 'Auto-Email Notification (File Transmission)', 'Dear Everyone,\r\n\r\nPlease find attached file/s processed.\r\n\r\nThanks,\r\nPrimo Administrator\r\n\r\n\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `UserType` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `UserName`, `Password`, `Name`, `UserType`, `created_at`, `updated_at`) VALUES
(3, 'xwk', 'jerry', 'Christopher Benasa', 'Admin', NULL, NULL),
(8, 'jserrano', 'jls110574', 'Jerry Serrano', 'Admin', NULL, NULL),
(98, 'op1', 'inno@123', 'op1', 'Operator', NULL, NULL),
(99, 'DDA', 'inn0d@t@', 'DDA', 'Admin', NULL, NULL),
(100, 'F8V', 'inn0d@t@', 'F8V', 'Operator', NULL, NULL),
(101, 'DF6', 'inn0d@t@', 'DF6', 'Operator', NULL, NULL),
(102, 'FLH', 'inn0d@t@', 'FLH', 'Operator', NULL, NULL),
(103, 'F7P', 'inn0d@t@', 'F7P', 'Operator', NULL, NULL),
(104, 'mackyop', '', 'Macky', 'Operator', NULL, NULL),
(106, 'operator10', 'admin12345', 'operator10', 'Operator', NULL, NULL),
(107, 'op2', 'inno@123', 'op2', 'Operator', NULL, NULL),
(108, 'nikki', 'admin123', 'Nikki', 'Operator', NULL, NULL),
(109, 'op11', 'admin12345', 'op11', 'Operator', NULL, NULL),
(110, 'mackymiro', 'admin123', 'Macky', 'Admin', NULL, NULL),
(111, 'op15', 'admin12345', 'op15', 'Operator', NULL, NULL),
(112, 'voltes5', 'admin12345', 'voltes5', 'Operator', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccess`
--

CREATE TABLE `tbluseraccess` (
  `UserID` int(11) NOT NULL,
  `ACQUIRE` int(11) NOT NULL,
  `ENRICH` int(11) NOT NULL,
  `DELIVER` int(11) NOT NULL,
  `USER_MAINTENANCE` int(11) NOT NULL,
  `EDITOR_SETTINGS` int(11) NOT NULL,
  `ML_SETTINGS` int(11) NOT NULL,
  `TRANSFORMATION` int(11) NOT NULL,
  `TRANSMISSION` int(11) NOT NULL,
  `AQUISITIONREPORT` int(11) NOT NULL,
  `ConfidenceLevelReport` int(11) NOT NULL,
  `TaskSetting` int(11) NOT NULL,
  `DataEntrySetting` int(11) NOT NULL,
  `REPORTMANAGEMENT` int(11) NOT NULL,
  `PROJECTSETUP` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluseraccess`
--

INSERT INTO `tbluseraccess` (`UserID`, `ACQUIRE`, `ENRICH`, `DELIVER`, `USER_MAINTENANCE`, `EDITOR_SETTINGS`, `ML_SETTINGS`, `TRANSFORMATION`, `TRANSMISSION`, `AQUISITIONREPORT`, `ConfidenceLevelReport`, `TaskSetting`, `DataEntrySetting`, `REPORTMANAGEMENT`, `PROJECTSETUP`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(8, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, NULL, NULL),
(98, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(99, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(100, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(101, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(103, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(102, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(104, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, NULL, NULL),
(105, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, NULL, NULL),
(106, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, NULL, NULL),
(107, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, NULL, NULL),
(108, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, NULL, NULL),
(109, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 1, 0, 0, 0, NULL, NULL),
(111, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, NULL, NULL),
(112, 1, 1, 1, 0, 1, 0, 1, 1, 0, 0, 1, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserreport`
--

CREATE TABLE `tbluserreport` (
  `ReportID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluserreport`
--

INSERT INTO `tbluserreport` (`ReportID`, `UserID`, `created_at`, `updated_at`) VALUES
(2, 8, NULL, NULL),
(3, 8, NULL, NULL),
(4, 8, NULL, NULL),
(7, 41, NULL, NULL),
(3, 40, NULL, NULL),
(5, 40, NULL, NULL),
(6, 40, NULL, NULL),
(7, 40, NULL, NULL),
(3, 33, NULL, NULL),
(5, 33, NULL, NULL),
(6, 33, NULL, NULL),
(7, 33, NULL, NULL),
(3, 66, NULL, NULL),
(5, 66, NULL, NULL),
(6, 66, NULL, NULL),
(7, 66, NULL, NULL),
(3, 67, NULL, NULL),
(5, 67, NULL, NULL),
(6, 67, NULL, NULL),
(7, 67, NULL, NULL),
(3, 59, NULL, NULL),
(5, 59, NULL, NULL),
(6, 59, NULL, NULL),
(7, 59, NULL, NULL),
(3, 47, NULL, NULL),
(5, 47, NULL, NULL),
(6, 47, NULL, NULL),
(7, 47, NULL, NULL),
(3, 46, NULL, NULL),
(5, 46, NULL, NULL),
(6, 46, NULL, NULL),
(7, 46, NULL, NULL),
(3, 39, NULL, NULL),
(5, 39, NULL, NULL),
(6, 39, NULL, NULL),
(7, 39, NULL, NULL),
(8, 39, NULL, NULL),
(3, 83, NULL, NULL),
(5, 83, NULL, NULL),
(6, 83, NULL, NULL),
(7, 83, NULL, NULL),
(8, 83, NULL, NULL),
(3, 48, NULL, NULL),
(5, 48, NULL, NULL),
(6, 48, NULL, NULL),
(7, 48, NULL, NULL),
(8, 48, NULL, NULL),
(3, 87, NULL, NULL),
(5, 87, NULL, NULL),
(8, 87, NULL, NULL),
(3, 90, NULL, NULL),
(5, 90, NULL, NULL),
(8, 90, NULL, NULL),
(5, 29, NULL, NULL),
(6, 29, NULL, NULL),
(9, 29, NULL, NULL),
(3, 86, NULL, NULL),
(5, 86, NULL, NULL),
(6, 86, NULL, NULL),
(8, 86, NULL, NULL),
(3, 85, NULL, NULL),
(5, 85, NULL, NULL),
(6, 85, NULL, NULL),
(8, 85, NULL, NULL),
(3, 89, NULL, NULL),
(5, 89, NULL, NULL),
(6, 89, NULL, NULL),
(8, 89, NULL, NULL),
(3, 99, NULL, NULL),
(5, 99, NULL, NULL),
(8, 99, NULL, NULL),
(3, 98, NULL, NULL),
(5, 98, NULL, NULL),
(9, 98, NULL, NULL),
(1, 3, NULL, NULL),
(3, 3, NULL, NULL),
(5, 3, NULL, NULL),
(6, 3, NULL, NULL),
(7, 3, NULL, NULL),
(8, 3, NULL, NULL),
(7, 109, NULL, NULL),
(8, 109, NULL, NULL),
(9, 109, NULL, NULL),
(8, 111, NULL, NULL),
(9, 111, NULL, NULL),
(8, 107, NULL, NULL),
(9, 107, NULL, NULL),
(8, 112, NULL, NULL),
(9, 112, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblusertask`
--

CREATE TABLE `tblusertask` (
  `UserID` int(11) NOT NULL,
  `TaskID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusertask`
--

INSERT INTO `tblusertask` (`UserID`, `TaskID`, `created_at`, `updated_at`) VALUES
(8, 1, NULL, NULL),
(8, 4, NULL, NULL),
(8, 5, NULL, NULL),
(8, 3, NULL, NULL),
(0, 5, NULL, NULL),
(38, 5, NULL, NULL),
(30, 5, NULL, NULL),
(33, 5, NULL, NULL),
(33, 3, NULL, NULL),
(39, 5, NULL, NULL),
(39, 3, NULL, NULL),
(40, 5, NULL, NULL),
(40, 3, NULL, NULL),
(41, 5, NULL, NULL),
(41, 3, NULL, NULL),
(42, 5, NULL, NULL),
(51, 5, NULL, NULL),
(52, 5, NULL, NULL),
(53, 5, NULL, NULL),
(49, 5, NULL, NULL),
(50, 5, NULL, NULL),
(44, 5, NULL, NULL),
(43, 5, NULL, NULL),
(46, 5, NULL, NULL),
(45, 5, NULL, NULL),
(47, 5, NULL, NULL),
(54, 5, NULL, NULL),
(55, 5, NULL, NULL),
(56, 5, NULL, NULL),
(57, 5, NULL, NULL),
(58, 5, NULL, NULL),
(59, 5, NULL, NULL),
(60, 5, NULL, NULL),
(61, 5, NULL, NULL),
(62, 5, NULL, NULL),
(63, 5, NULL, NULL),
(64, 5, NULL, NULL),
(65, 5, NULL, NULL),
(66, 5, NULL, NULL),
(66, 3, NULL, NULL),
(68, 5, NULL, NULL),
(69, 5, NULL, NULL),
(71, 5, NULL, NULL),
(72, 5, NULL, NULL),
(73, 5, NULL, NULL),
(74, 5, NULL, NULL),
(75, 5, NULL, NULL),
(76, 5, NULL, NULL),
(77, 5, NULL, NULL),
(78, 5, NULL, NULL),
(79, 5, NULL, NULL),
(80, 5, NULL, NULL),
(81, 5, NULL, NULL),
(82, 5, NULL, NULL),
(70, 5, NULL, NULL),
(67, 5, NULL, NULL),
(67, 3, NULL, NULL),
(83, 5, NULL, NULL),
(48, 5, NULL, NULL),
(85, 6, NULL, NULL),
(85, 7, NULL, NULL),
(85, 8, NULL, NULL),
(85, 9, NULL, NULL),
(87, 6, NULL, NULL),
(87, 7, NULL, NULL),
(87, 8, NULL, NULL),
(87, 9, NULL, NULL),
(84, 6, NULL, NULL),
(84, 7, NULL, NULL),
(84, 8, NULL, NULL),
(84, 9, NULL, NULL),
(88, 6, NULL, NULL),
(88, 7, NULL, NULL),
(88, 8, NULL, NULL),
(88, 9, NULL, NULL),
(90, 6, NULL, NULL),
(90, 7, NULL, NULL),
(90, 8, NULL, NULL),
(90, 9, NULL, NULL),
(91, 6, NULL, NULL),
(91, 7, NULL, NULL),
(91, 8, NULL, NULL),
(91, 9, NULL, NULL),
(92, 6, NULL, NULL),
(92, 7, NULL, NULL),
(92, 8, NULL, NULL),
(92, 9, NULL, NULL),
(94, 6, NULL, NULL),
(94, 7, NULL, NULL),
(94, 8, NULL, NULL),
(94, 9, NULL, NULL),
(93, 6, NULL, NULL),
(93, 7, NULL, NULL),
(93, 8, NULL, NULL),
(86, 6, NULL, NULL),
(86, 7, NULL, NULL),
(86, 8, NULL, NULL),
(86, 10, NULL, NULL),
(86, 11, NULL, NULL),
(86, 12, NULL, NULL),
(89, 6, NULL, NULL),
(89, 7, NULL, NULL),
(89, 8, NULL, NULL),
(89, 10, NULL, NULL),
(89, 11, NULL, NULL),
(89, 12, NULL, NULL),
(29, 3, NULL, NULL),
(95, 3, NULL, NULL),
(96, 3, NULL, NULL),
(97, 3, NULL, NULL),
(100, 5, NULL, NULL),
(101, 5, NULL, NULL),
(103, 5, NULL, NULL),
(102, 5, NULL, NULL),
(99, 5, NULL, NULL),
(3, 5, NULL, NULL),
(3, 8, NULL, NULL),
(98, 5, NULL, NULL),
(98, 8, NULL, NULL),
(106, 5, NULL, NULL),
(106, 8, NULL, NULL),
(108, 5, NULL, NULL),
(108, 8, NULL, NULL),
(109, 5, NULL, NULL),
(109, 8, NULL, NULL),
(110, 5, NULL, NULL),
(110, 8, NULL, NULL),
(111, 2, NULL, NULL),
(111, 5, NULL, NULL),
(111, 7, NULL, NULL),
(111, 6, NULL, NULL),
(111, 8, NULL, NULL),
(111, 9, NULL, NULL),
(111, 10, NULL, NULL),
(107, 2, NULL, NULL),
(107, 5, NULL, NULL),
(107, 7, NULL, NULL),
(107, 6, NULL, NULL),
(107, 8, NULL, NULL),
(107, 10, NULL, NULL),
(112, 2, NULL, NULL),
(112, 5, NULL, NULL),
(112, 7, NULL, NULL),
(112, 6, NULL, NULL),
(112, 8, NULL, NULL),
(112, 9, NULL, NULL),
(112, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblxmltemplate`
--

CREATE TABLE `tblxmltemplate` (
  `XMLTemplate` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblxmltemplate`
--

INSERT INTO `tblxmltemplate` (`XMLTemplate`, `created_at`, `updated_at`) VALUES
('				\r\n<?xml version=\'1.0\' encoding=\'utf-9\'?>\r\n<judgment>\r\n    <case_metadata>\r\n        <subject_area/>\r\n        <note/>\r\n        <court/>\r\n       <party/>\r\n        <case_name/>\r\n        <docket_number/>\r\n        <date type=\"submitted\"/>\r\n        <date type=\"decided\"/>\r\n        <prior_history/>\r\n        <counsel/>\r\n        <judge/>\r\n    </case_metadata>\r\n    <case_body>\r\n        <section/>\r\n    </case_body>\r\n</judgment>																																				', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tpccr_outlook_files`
--

CREATE TABLE `tbl_tpccr_outlook_files` (
  `id` int(11) NOT NULL,
  `ref` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bundle_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` date NOT NULL,
  `no_of_files` varchar(11) DEFAULT NULL,
  `source_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tpccr_outlook_files`
--

INSERT INTO `tbl_tpccr_outlook_files` (`id`, `ref`, `bundle_no`, `product_type`, `subject1`, `tat`, `delivery_date`, `no_of_files`, `source_type`, `source_path`, `created_at`, `updated_at`) VALUES
(1, 'Hello Macky', 'Hello Macky', 'Legal', '', '1', '2021-05-25', '11', 'CandyCane', 'Hello Macky.pdf', '2021-05-25 02:45:08', '2021-05-25 02:45:08'),
(2, 'AB-1042', 'AB-1042', 'Legal', 'Transmission of Taxnet.pro – Bundle AB-1042\r\n\r\nPlease check.\r\n\r\n\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'AB-1042.pdf', '2021-05-25 02:45:09', '2021-05-25 02:45:09'),
(3, 'ADavison-2020-9 [PROOFS]', 'ADavison-2020-9 [PROOFS]', 'Legal', 'Annotated Canada Labour Code 2020\r\n\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'ADavison-2020-9 [PROOFS].pdf', '2021-05-25 02:45:11', '2021-05-25 02:45:11'),
(4, 'AW-1,261', 'AW-1,261', 'Legal', 'Transmission of Taxnet.pro – Bundle AW-1,261 (TAX SMG)\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'AW-1,261.pdf', '2021-05-25 02:45:12', '2021-05-25 02:45:12'),
(5, 'BN-337', 'BN-337', 'Legal', 'BN-337 content \r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'BN-337.pdf', '2021-05-25 02:45:13', '2021-05-25 02:45:13'),
(6, 'cd-rom236.inno [TRANS]', 'cd-rom236.inno [TRANS]', 'Legal', 'Transmission of Goldsmith PIDP – on DVD- (Legal SMG) – Release 2020-1\r\n\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'cd-rom236.inno [TRANS].pdf', '2021-05-25 02:45:15', '2021-05-25 02:45:15'),
(7, 'bcsec254.inno', 'bcsec254.inno', 'Legal', 'British Columbia Securities Commission Bulletin 20:09\r\n\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'bcsec254.inno.pdf', '2021-05-25 02:45:16', '2021-05-25 02:45:16'),
(8, 'ced377.inno [TRANS]', 'ced377.inno [TRANS]', 'Legal', 'Transmission of Bundle CED-573 (Legal SMG) – Manuscript for Fish and Wildlife -- Bundle CED-573\r\n\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'ced377.inno [TRANS].pdf', '2021-05-25 02:45:17', '2021-05-25 02:45:17'),
(9, 'LChong 2020-9 [PROOFS]', 'LChong 2020-9 [PROOFS]', 'Legal', 'Wilton & Joseph, Family Law Arbitration in Canada 4th Edition\r\n\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'LChong 2020-9 [PROOFS].pdf', '2021-05-25 02:45:18', '2021-05-25 02:45:18'),
(10, 'MAppleford-2020-10 [PROOFS]', 'MAppleford-2020-10 [PROOFS]', 'Legal', 'McLaren 2020 Annotated Ontario PPSA\r\n\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'MAppleford-2020-10 [PROOFS].pdf', '2021-05-25 02:45:19', '2021-05-25 02:45:19'),
(11, 'onsec247.inno', 'onsec247.inno', 'Legal', 'Ontario Securities Commission Bulletin Volume 43, Issue 10\r\n\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'onsec247.inno.pdf', '2021-05-25 02:45:20', '2021-05-25 02:45:20'),
(12, 'ced377.inno TRANS1111111', 'ced377.inno TRANS1111111', 'Legal', 'Hello Macky this is sample \r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'ced377.inno TRANS1111111.pdf', '2021-05-25 02:45:22', '2021-05-25 02:45:22'),
(13, 'onsec247.inno11111', 'onsec247.inno11111', 'Legal', 'Onsec247 test\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'onsec247.inno11111.pdf', '2021-05-25 02:45:23', '2021-05-25 02:45:23'),
(14, 'Bsec 11111', 'Bsec 11111', 'Legal', 'Hello bsec\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'Bsec 11111.pdf', '2021-05-25 02:45:24', '2021-05-25 02:45:24'),
(15, '', '', 'Legal', '', '1', '2021-05-25', '11', 'CandyCane', '.pdf', '2021-05-25 02:45:25', '2021-05-25 02:45:25'),
(16, 'Innosec 9999', 'Innosec 9999', 'Legal', 'We would like to inform you of the following bundle(s) requiring conversion to SGML\r\n \r\nLocation of source documents and inventory : Y:Samp', '1', '2021-05-25', '11', 'CandyCane', 'Innosec 9999.pdf', '2021-05-25 02:45:26', '2021-05-25 02:45:26'),
(17, 'Bsec 9999', 'Bsec 9999', 'Legal', 'We would like to inform you of the following bundle(s) requiring conversion to SGML\r\n \r\nLocation of source documents and inventory : Y:Samp', '1', '2021-05-25', '11', 'CandyCane', 'Bsec 9999.pdf', '2021-05-25 02:45:27', '2021-05-25 02:45:27'),
(18, 'AIreland-2021-10 PROOFS -- RUSH', 'AIreland-2021-10 PROOFS -- RUSH', 'Legal', 'Hello link in this file is here\r\n\r\n\r\nSendthisfile.com\r\n\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-25', '11', 'CandyCane', 'AIreland-2021-10 PROOFS -- RUSH.pdf', '2021-05-25 02:45:28', '2021-05-25 02:45:28'),
(19, 'AIreland-2021-10', 'AIreland-2021-10', 'Legal', 'Hello macky,\r\n\r\nGood day!\r\n\r\nHere is the link that I want to download \r\n\r\n\r\nhttps://www.sendthisfile.com/\r\n\r\n\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-26', '11', 'CandyCane', 'AIreland-2021-10.pdf', '2021-05-25 22:38:43', '2021-05-25 22:38:43'),
(20, 'lab289', 'lab289', 'Legal', '', '1', '2021-05-26', '11', 'CandyCane', 'lab289.pdf', '2021-05-26 00:01:37', '2021-05-26 00:01:37'),
(21, 'taxpro5504.inno TRANS', 'taxpro5504.inno TRANS', 'Legal', 'Hello macky! \r\n\r\nGood day\r\n\r\nhttps://www.sendthisfile.com/hJ63Z42CmXWwJiLxtFC0VRUP\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-26', '11', 'CandyCane', 'taxpro5504.inno TRANS.pdf', '2021-05-26 00:11:19', '2021-05-26 00:11:19'),
(22, 'AB-11111111111163', 'AB-11111111111163', 'Legal', 'Hello Macky\r\n\r\nhttps://thomsonreuters.sendthisfile.com/YvRRlnuzK7tn8j2MLgkBDGRV\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-27', '11', 'CandyCane', 'AB-11111111111163.pdf', '2021-05-26 22:52:21', '2021-05-26 22:52:21'),
(23, 'AB-1111111163 file', 'AB-1111111163 file', 'Legal', 'Hello Macky here is the file below\r\n\r\nhttps://thomsonreuters.sendthisfile.com/YvRRlnuzK7tn8j2MLgkBDGRV\r\n\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-27', '11', 'CandyCane', 'AB-1111111163 file.pdf', '2021-05-26 22:53:18', '2021-05-26 22:53:18'),
(24, 'AB-1163 new file', 'AB-1163 new file', 'Legal', 'Hello Macky this is the new file\r\n\r\n\r\nhttps://thomsonreuters.sendthisfile.com/6EWGFNDqLFZYyyT1zTjaMQky\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-27', '11', 'CandyCane', 'AB-1163 new file.pdf', '2021-05-26 23:48:33', '2021-05-26 23:48:33'),
(25, 'AB-testing 124', 'AB-testing 124', 'Legal', 'Hello Macky here it is \r\n\r\nhttps://thomsonreuters.sendthisfile.com/zmCQyYfMN6RQCsDw747M3SsR\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-27', '11', 'CandyCane', 'AB-testing 124.pdf', '2021-05-27 01:18:40', '2021-05-27 01:18:40'),
(26, 'CED-573', 'CED-573', 'Legal', 'Hello Macky \r\n\r\nhttps://thomsonreuters.sendthisfile.com/pF6yM0romPySENAvgQ2CW2VQ\r\n\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-28', '11', 'CandyCane', 'CED-573.pdf', '2021-05-27 21:57:43', '2021-05-27 21:57:43'),
(27, 'CED-573 testing', 'CED-573 testing', 'Legal', 'Hello Macky here it is \r\n\r\nhttps://thomsonreuters.sendthisfile.com/JhERz3mgCDTi2QU9IKk0TFLG\r\n\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-28', '11', 'CandyCane', 'CED-573 testing.pdf', '2021-05-28 00:12:54', '2021-05-28 00:12:54'),
(28, 'AB-1163.zip', 'AB-1163.zip', 'Legal', 'Hello macky this is the file\r\n\r\nhttps://thomsonreuters.sendthisfile.com/6zTuDKCDTxhqWVKaFzVX2Urv\r\n\r\nSent from Mail for Windows 10', '1', '2021-05-28', '11', 'CandyCane', 'AB-1163.zip.pdf', '2021-05-28 02:03:33', '2021-05-28 02:03:33'),
(29, 'AB-1163 files for inventory', 'AB-1163 files for inventory', 'Legal', '', '1', '2021-05-28', '11', 'CandyCane', 'AB-1163 files for inventory.pdf', '2021-05-28 02:34:50', '2021-05-28 02:34:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldataentry`
--
ALTER TABLE `tbldataentry`
  ADD PRIMARY KEY (`ColumnID`);

--
-- Indexes for table `tblmlconfig`
--
ALTER TABLE `tblmlconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreport`
--
ALTER TABLE `tblreport`
  ADD PRIMARY KEY (`ReportID`);

--
-- Indexes for table `tblstatus`
--
ALTER TABLE `tblstatus`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `tblstyles`
--
ALTER TABLE `tblstyles`
  ADD PRIMARY KEY (`StyleID`);

--
-- Indexes for table `tbltagmapping`
--
ALTER TABLE `tbltagmapping`
  ADD PRIMARY KEY (`MappingID`);

--
-- Indexes for table `tbltaskml`
--
ALTER TABLE `tbltaskml`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltaskplugin`
--
ALTER TABLE `tbltaskplugin`
  ADD PRIMARY KEY (`PluginID`);

--
-- Indexes for table `tbltransmission`
--
ALTER TABLE `tbltransmission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tpccr_outlook_files`
--
ALTER TABLE `tbl_tpccr_outlook_files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldataentry`
--
ALTER TABLE `tbldataentry`
  MODIFY `ColumnID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblmlconfig`
--
ALTER TABLE `tblmlconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblreport`
--
ALTER TABLE `tblreport`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblstatus`
--
ALTER TABLE `tblstatus`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tblstyles`
--
ALTER TABLE `tblstyles`
  MODIFY `StyleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbltagmapping`
--
ALTER TABLE `tbltagmapping`
  MODIFY `MappingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbltaskml`
--
ALTER TABLE `tbltaskml`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tbltaskplugin`
--
ALTER TABLE `tbltaskplugin`
  MODIFY `PluginID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbltransmission`
--
ALTER TABLE `tbltransmission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `tbl_tpccr_outlook_files`
--
ALTER TABLE `tbl_tpccr_outlook_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
