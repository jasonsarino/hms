-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 07:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_group_name`
--

CREATE TABLE `bill_group_name` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_desc` text NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_group_name`
--

INSERT INTO `bill_group_name` (`group_id`, `group_name`, `group_desc`, `InActive`) VALUES
(1, 'Consultant2', 'Consultant2', 1),
(2, 'CONSULTANT', 'Consultant', 0),
(3, 'MISCELLANEOUS', 'Miscellaneous', 0),
(4, 'ADMISSION CHARGES', 'Admission Charges', 0),
(5, 'INJECTIONS', 'Injections', 0),
(6, 'DRESSING', 'Dressing', 0),
(7, 'SURGICAL ASSISTANT', 'Surgical Assistant', 0),
(8, 'HAEMATOLOGY', 'Haematology', 0),
(9, 'BIOCHEMISTRY', 'Biochemistry', 0),
(10, 'CLINICAL PATHOLOGY', 'Clinical Pathology', 0),
(11, 'MICROBIOLOGY', 'Microbiology', 0),
(12, 'SEROLOGY', 'Serology', 0),
(13, 'TRANSFUSION MEDICINE', 'Transfusion Medicine', 0),
(14, 'SPECIAL TESTS', 'Special Tests', 0),
(15, 'HISTOPATHOLOGY', 'Histopathology', 0),
(16, 'X -RAYS', 'X-RAYS', 0),
(17, 'CT SCAN', 'CT Scan', 0),
(18, 'ULTRASONOGRAPHY', 'UltraSonography', 0),
(19, 'UROLOGY', 'UROLOGY', 0),
(20, 'CARDIAC', 'CARDIAC', 0),
(21, 'PSYCHOLOGY TEST', 'Psychology Test', 0),
(22, 'SKIN & VD', 'SKIN & VD', 0),
(23, 'ONCOLOGY', 'ONCOLOGY', 0),
(24, 'PROCEDURE CHARGES', 'Procedure Charges', 0),
(25, 'WARD SERVICES', 'Ward Services', 0),
(26, 'NEUROLOGY', 'NEUROLOGY', 0),
(27, 'DENTAL TREATMENT', 'Dental Treatment', 0),
(28, 'PHYSIOTHERAPY', 'Physiotherapy', 0),
(29, 'PLASTIC SURGICAL PRO', 'Plastic Surgical Pro ', 0),
(30, 'OPERATION THEATER', 'Operation Theater', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill_particular`
--

CREATE TABLE `bill_particular` (
  `particular_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `particular_name` varchar(150) NOT NULL,
  `particular_desc` text NOT NULL,
  `charge_amount` float(11,2) NOT NULL,
  `InActive` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_particular`
--

INSERT INTO `bill_particular` (`particular_id`, `group_id`, `particular_name`, `particular_desc`, `charge_amount`, `InActive`) VALUES
(1, 2, 'TEST CONSULTANT', 'Test Consultant', 150.00, 0),
(2, 2, 'GENERAL CONSULTATION', 'General Consultation', 250.00, 0),
(3, 2, 'EXTENDED CONSULTANT', 'Extended Consultant', 250.00, 0),
(4, 2, 'SPECIALISTS CONSULTANT', 'Specialists Consultant', 500.00, 0),
(5, 16, 'CHEST PA', 'Chest PA', 165.00, 0),
(6, 16, 'CHEST (PORT)', 'CHEST (PORT)', 220.00, 0),
(7, 16, 'AP OR LAT OR LURAL', 'AP or LAT or Lural', 165.00, 0),
(8, 16, 'I.V.P. WITHOUT DYE', 'I.V.P. Without Dye', 165.00, 0),
(9, 16, 'LUMBAR SPINE AP & LAT', 'LUMBAR SPINE AP & LAT', 330.00, 0),
(10, 16, 'CERVICAL SPINE AP & LAT', 'CERVICAL SPINE AP & LAT', 330.00, 0),
(11, 17, 'BRAIN-PLAIN', 'BRAIN-PLAIN', 1760.00, 0),
(12, 17, 'BRAIN (PLAIN & CONTRAST)', 'BRAIN (PLAIN & CONTRAST)', 2200.00, 0),
(13, 17, 'NEURO CT SCAN PLAIN', 'NEURO CT SCAN PLAIN', 9900.00, 0),
(14, 17, 'NEURO CT SCAN CONTRAST', 'NEURO CT SCAN CONTRAST', 11500.00, 0),
(15, 17, 'ORBIT (PLAIN)', 'ORBIT (PLAIN)', 2200.00, 0),
(16, 3, 'AIR/WATER BED CHARGES (PER DAY)', 'Air/Water Bed Charges (per day)', 120.00, 0),
(17, 3, 'BIPAP CHARGES (PER DAY)', 'Bipap charges (per day)', 1000.00, 0),
(18, 3, 'ISSUE OF DUPLICATE DOCUMENTS', 'Issue of Duplicate Documents', 100.00, 0),
(19, 3, 'SYRINGE PUMP/ INFUSION PUMP', 'Syringe Pump/ Infusion Pump', 100.00, 0),
(20, 3, 'OXYGEN CHARGES PER HOUR', 'Oxygen Charges per hour', 20.00, 0),
(21, 3, 'OXYGEN CHARGES FULL DAY', 'Oxygen charges full day', 250.00, 0),
(22, 3, 'PLASTERING BIG', 'Plastering Big', 500.00, 0),
(23, 3, 'PLASTERING SMALL', 'Plastering Small', 150.00, 0),
(24, 3, 'VENTILATOR CHARGES (PER DAY)', 'Ventilator charges (per day)', 2000.00, 0),
(25, 3, 'CORONARY ANGIOGRAPHY', 'Coronary Angiography', 1000.00, 0),
(26, 3, 'UROLOGY', 'Urology', 300.00, 0),
(27, 3, 'I.M. INJECTION', 'I.M. Injection', 10.00, 0),
(28, 3, 'I.V. INJECTION', 'I.V. Injection', 15.00, 0),
(29, 8, 'BLEEDING TIME (B.T.)', 'Bleeding Time (B.T.)', 25.00, 0),
(30, 4, 'HOSPITAL REGISTRATION FEES', 'Hospital Registration Fees', 100.00, 0),
(31, 4, 'COMPUTER FEE', 'Computer Fee', 150.00, 0),
(32, 9, 'ACE LEVELS', 'ACE Levels', 825.00, 0),
(33, 9, 'ALFA FETO PROTIEN', 'Alfa Feto Protien', 660.00, 0),
(34, 9, 'ANA', 'ANA', 550.00, 0),
(35, 9, 'ACID PHOSPHATASE', 'Acid Phosphatase', 145.00, 0),
(36, 9, 'ALKALINE PHOSPHATASE', 'Alkaline phosphatase', 80.00, 0),
(37, 20, 'CONSULTATION', 'Consultation', 200.00, 0),
(38, 20, 'HOLTER', 'HOLTER', 800.00, 0),
(39, 20, 'SCREENING OF ECHO', 'Screening of Echo', 550.00, 0),
(40, 20, 'STRESS ECHO', 'Stress Echo', 2000.00, 0),
(41, 20, 'TISSUE DOPPLER IMAGING', 'Tissue Doppler Imaging', 1500.00, 0),
(42, 10, '24HR. URINE: CALCIUM', '24HR. Urine: Calcium', 165.00, 0),
(43, 10, '24HR. URINE: CHLORIDE', '24HR. Urine: Chloride', 145.00, 0),
(44, 10, '24HR. URINE: CREATININE', '24HR. Urine: Creatinine', 220.00, 0),
(45, 10, '24HR. URINE: POTASIUM', '24HR. Urine: Potasium', 220.00, 0),
(46, 10, '24HR. URINE: PROTEIN', '24HR. Urine: Protein', 165.00, 0),
(47, 10, '24HR. URINE: SODIUM', '24HR. Urine: Sodium', 220.00, 0),
(48, 10, 'URINE: SPECIFIC GRAVITY', 'Urine: Specific Gravity', 55.00, 0),
(49, 10, 'GASTRIC ANALYSIS ROUTINE', 'Gastric Analysis Routine', 295.00, 0),
(50, 10, 'PERITONEAL (ASCITIC) FLUID ROUTINE', 'Peritoneal (Ascitic) Fluid Routine', 165.00, 0),
(51, 27, 'ORAL PROPHYLAXIS (SCALING)', 'Oral Prophylaxis (Scaling)', 500.00, 0),
(52, 27, 'CURETTAGE', 'CURETTAGE', 300.00, 0),
(53, 27, 'FLAP SURGERY', 'FLAP SURGERY', 1500.00, 0),
(54, 27, 'FLAP SURGERY WITH BONE GRAFT', 'FLAP SURGERY WITH BONE GRAFT', 3000.00, 0),
(55, 27, 'GINGIVECTOMY / CROWN LENGTHENING', 'GINGIVECTOMY / CROWN LENGTHENING', 300.00, 0),
(56, 27, 'GINGIVOPLASTY', 'GINGIVOPLASTY', 1500.00, 0),
(57, 27, 'EXTRACTION MOBILE', 'EXTRACTION MOBILE', 100.00, 0),
(58, 27, 'EXTRACTION FIRM/ROOT STUMP', 'EXTRACTION FIRM/ROOT STUMP', 1500.00, 0),
(59, 6, 'BURNS DRESSING - I (<50%)', 'Burns Dressing - I (<50%)', 700.00, 0),
(60, 6, 'BURNS DRESSING - II (>50%)', 'Burns Dressing - II (>50%)', 1000.00, 0),
(61, 8, 'BLOOD GROUP', 'Blood Group', 45.00, 0),
(62, 8, 'BLOOD SMEAR FOR MALARIAL PARASITES', 'Blood Smear for Malarial Parasites', 35.00, 0),
(63, 8, 'BLOOD SMEAR FOR MICROFILARIA', 'Blood Smear for Microfilaria', 165.00, 0),
(64, 8, 'BONE MARROW ASPIRATION & INTERPRET', 'Bone Marrow Aspiration & interpret', 330.00, 0),
(65, 8, 'CLOTTING TIME', 'Clotting Time', 25.00, 0),
(66, 8, 'COAGULATION STUDY', 'Coagulation Study', 715.00, 0),
(67, 8, 'D-DIAMER', 'D-Diamer', 990.00, 0),
(68, 8, 'DIFFERENTIAL COUNT (DLC)', 'Differential Count (DLC)', 255.00, 0),
(69, 15, 'FNAC', 'FNAC', 220.00, 0),
(70, 15, 'FROZEN SECTION', 'Frozen section', 825.00, 0),
(71, 15, 'SMALLSPECIMEN', 'Smallspecimen', 330.00, 0),
(72, 15, 'LARGE SPECIMEN', 'Large specimen', 660.00, 0),
(73, 15, 'SKIN BIOPSY', 'Skin Biopsy', 330.00, 0),
(74, 15, 'BONE MARROW BIOPSIES', 'Bone Marrow Biopsies', 330.00, 0),
(75, 15, 'CYTOKERATIN', 'Cytokeratin', 1430.00, 0),
(76, 5, 'INTRA- ARTICULAR INJECTIONS', 'INTRA- ARTICULAR INJECTIONS', 500.00, 0),
(77, 5, 'INTRALESIONAL INJECTIONS- (ILI-001)', 'INTRALESIONAL INJECTIONS- (ILI-001)', 100.00, 0),
(78, 5, 'INTRALESIONAL INJECTIONS- ILI 002', 'INTRALESIONAL INJECTIONS- ILI 002', 200.00, 0),
(79, 5, 'INTRA ARTICULAR INJECTIONS', 'Intra Articular Injections', 100.00, 0),
(80, 5, 'INTRA ARTICULAR INJECTIONS (CNSLT.CHRG)', 'Intra Articular Injections (Cnslt.Chrg)', 150.00, 0),
(81, 11, 'AFB CULTURE: CSF', 'AFB Culture: CSF', 650.00, 0),
(82, 11, 'AFB CULTURE: PUS', 'AFB Culture: Pus', 650.00, 0),
(83, 11, 'AFB CULTURE: SERUM', 'AFB Culture: Serum', 610.00, 0),
(84, 11, 'AFB SMEAR', 'AFB Smear', 55.00, 0),
(85, 11, 'ANAEROBIC CULTURE-ANY SPECIMEN', 'Anaerobic Culture-Any specimen', 880.00, 0),
(86, 11, 'BLOOD CULTURE AEROBIC (BACT)', 'Blood Culture Aerobic (Bact)', 825.00, 0),
(87, 26, 'EEG', 'EEG', 660.00, 0),
(88, 26, 'EEG -VIDEO', 'EEG -VIDEO', 2000.00, 0),
(89, 26, 'NERVE CONDUCTION STUDY', 'NERVE CONDUCTION STUDY', 880.00, 0),
(90, 26, 'EMG-NEEDLE STUDY LEVEL - 1', 'EMG-NEEDLE STUDY LEVEL - 1', 1300.00, 0),
(91, 26, 'AEP-BERA', 'AEP-BERA', 600.00, 0),
(92, 26, 'VEP', 'VEP', 600.00, 0),
(93, 26, 'SOMETO SENSORY EVOKED POTERITIAL ( SEP)', 'Someto Sensory Evoked Poteritial ( SEP)', 1000.00, 0),
(94, 30, 'MUSCLE BIOPSY', 'Muscle Biopsy', 2500.00, 0),
(95, 30, 'NERVE BIOPSY', 'Nerve Biopsy', 2500.00, 0),
(96, 30, 'SCAR REVISION < 3 CM', 'Scar Revision < 3 cm', 3000.00, 0),
(97, 30, 'SCAR REVISION > 3 CM', 'Scar Revision > 3 cm', 6000.00, 0),
(98, 30, 'FACIAL WOUND REPAIR - I (< 5 CM)', 'Facial Wound Repair - I (< 5 cm)', 3000.00, 0),
(99, 30, 'FACIAL WOUND REPAIR - II (> 5 CM)', 'Facial Wound Repair - II (> 5 cm)', 6000.00, 0),
(100, 30, 'SINGLE EAR LOBE REPAIR', 'Single Ear Lobe Repair', 1000.00, 0),
(101, 30, 'SINGLE EAR LOBE FLAP CLOUSER', 'Single Ear Lobe Flap Clouser', 1500.00, 0),
(102, 30, 'DEBRIDEMENT WOUND - I (< 5 CM)', 'Debridement Wound - I (< 5 cm)', 3000.00, 0),
(103, 30, 'DEBRIDEMENT WOUND - II (>5 CM)', 'Debridement Wound - II (>5 cm)', 6000.00, 0),
(104, 10, 'TEST1', 'test1', 10000.00, 0),
(105, 10, 'TEST2', 'test2', 100.00, 0),
(106, 10, 'TEST3', 'test3', 100.00, 0),
(107, 10, 'TEST4', 'test5', 100.00, 0),
(108, 10, 'TEST5', 'test5', 100.00, 0),
(109, 10, 'TEST6', 'test6', 120.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('aaaa522c1e39d873bdea9947c8f66ce1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', 1403771284, '');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `company_name` varchar(150) NOT NULL,
  `company_address` text NOT NULL,
  `company_contactNo` varchar(50) NOT NULL,
  `TIN` varchar(50) NOT NULL,
  `logo` varchar(900) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`company_name`, `company_address`, `company_contactNo`, `TIN`, `logo`) VALUES
('DEMO HOSPITAL CENTER', 'Somewhere', ' 331 9233', '123-456-789', 'logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `complain_id` int(11) NOT NULL,
  `complain_name` varchar(999) NOT NULL,
  `complain_desc` text NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complain_id`, `complain_name`, `complain_desc`, `InActive`) VALUES
(3, 'ABDOMINAL AND PELVIC PAIN', 'Abdominal and pelvic pain', 0),
(4, 'ABNORMAL UTERINE BLEEDING', 'Abnormal uterine bleeding ', 0),
(5, 'ANXIETY, DEPRESSION', 'Anxiety, depression', 0),
(6, 'BACK PAIN', 'Back pain', 0),
(7, 'CHEST PAIN', 'Chest pain ', 0),
(8, 'COUGH', 'Cough', 0),
(9, 'COUGH, DYSPNEA (INFANT, NEWBORN)', 'Cough, dyspnea (infant, newborn) ', 0),
(10, 'CRYING INFANT (INCONSOLABLE)', 'Crying infant (Inconsolable) ', 0),
(11, 'DELIRIUM', 'Delirium', 0),
(12, 'DEMENTIA, MEMORY LOSS', 'Dementia, memory loss', 0),
(13, 'DIARRHEA', 'Diarrhea', 0),
(14, 'DYSPHAGIA', 'Dysphagia', 0),
(15, 'DYSPNEA, TACHYPNEA', 'Dyspnea, tachypnea ', 0),
(16, 'EAR PAIN, OTALGIA', 'Ear pain, otalgia ', 0),
(17, 'EDEMA, LEG', 'Edema, leg ', 0),
(18, 'FACIAL FLUSHING', 'Facial flushing ', 0),
(19, 'FACIAL PAIN', 'Facial pain', 0),
(20, 'FEVER (ACUTE, UNCERTAIN SOURCE)', 'Fever (acute, uncertain source) ', 0),
(21, 'FLANK PAIN', 'Flank pain ', 0),
(22, 'GENITAL SKIN LESION, GENITAL ULCER', 'Genital skin lesion, genital ulcer', 0),
(23, 'HEADACHE', 'Headache', 0),
(24, 'HEARING LOSS (DEAFNESS)', 'Hearing loss (deafness) ', 0),
(25, 'HEMATURIA', 'Hematuria', 0),
(26, 'HYPOTENSION, SHOCK', 'Hypotension, shock', 0),
(27, 'LEG PAIN, BONE PAIN, EXTREMITY PAIN', 'Leg pain, bone pain, extremity pain', 0),
(28, 'LIMP IN CHILD', 'Limp in child ', 0),
(29, 'LYMPHADENOPATHY', 'Lymphadenopathy', 0),
(30, 'MENTAL STATUS, ACUTE CHANGE (COMA,  LETHARGY)', 'Mental status, acute change (coma,  lethargy) ', 0),
(31, 'MUSCLE CRAMPS', 'Muscle cramps', 0),
(32, 'MYALGIAS, ARTHRALGIAS (GENERALIZED)', 'Myalgias, arthralgias (generalized)', 0),
(33, 'NAUSEA, VOMITING', 'Nausea, vomiting ', 0),
(34, 'NUMBNESS, SENSORY LOSS', 'Numbness, sensory loss ', 0),
(35, 'PRURITUS', 'Pruritus', 0),
(36, 'RASH, GENERALIZED', 'Rash, generalized', 0),
(37, 'RED EYE', 'Red eye ', 0),
(38, 'SCROTAL PAIN', 'Scrotal pain ', 0),
(39, 'SEIZURE', 'Seizure', 0),
(40, 'SHOULDER PAIN', 'Shoulder pain ', 0),
(41, 'SINUS TACHYCARDIA', 'Sinus tachycardia', 0),
(42, 'SYNCOPE', 'Syncope', 0),
(43, 'TINNITUS', 'Tinnitus', 0),
(44, 'TREMOR', 'Tremor', 0),
(45, 'URINARY SYMPTOMS (DYSURIA,  FREQUENCY, URGENCY)', 'Urinary symptoms (dysuria,  frequency, urgency) ', 0),
(46, 'VERTIGO', 'Vertigo', 0),
(47, 'WEAKNESS, FATIGUE, MALAISE, VAGUE  SYMPTOMS', 'Weakness, fatigue, malaise, vague  symptoms ', 0),
(48, 'WEIGHT LOSS', 'Weight loss ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `declaredor`
--

CREATE TABLE `declaredor` (
  `id` int(11) NOT NULL,
  `receipt_no` varchar(25) NOT NULL,
  `invoice_no` varchar(25) NOT NULL,
  `old_receipt_no` varchar(25) NOT NULL,
  `dDate` date NOT NULL,
  `iop_id` varchar(25) NOT NULL,
  `patient_no` varchar(25) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `discount` float(11,2) NOT NULL,
  `subtotal` float(11,2) NOT NULL,
  `total_amount` float(11,2) NOT NULL,
  `amountPaid` float(11,2) NOT NULL,
  `change` float(11,2) NOT NULL,
  `total_purchased` int(3) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `declaredor`
--

INSERT INTO `declaredor` (`id`, `receipt_no`, `invoice_no`, `old_receipt_no`, `dDate`, `iop_id`, `patient_no`, `payment_type`, `discount`, `subtotal`, `total_amount`, `amountPaid`, `change`, `total_purchased`, `InActive`) VALUES
(5, 'OR-1', 'SI-000027', 'OR-000011', '2014-07-31', 'OR-000011', '000001', 'cash', 600.00, 9600.00, 9000.00, 10000.00, 400.00, 2, 0),
(6, 'OR-02', 'SI-000028', 'OR-000012', '2014-07-31', 'OR-000012', '000011', 'cash', 55.00, 155.00, 100.00, 160.00, 5.00, 3, 1),
(7, 'OR-2', 'SI-000028', 'OR-000012', '2014-07-31', 'OR-000012', '000011', 'cash', 0.00, 150.00, 150.00, 160.00, 5.00, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `dept_code` varchar(100) NOT NULL,
  `dept_name` varchar(150) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `dept_code`, `dept_name`, `InActive`) VALUES
(1, 'MIS', 'Management Information System', 0),
(2, 'Front Desk', 'Front Desk', 0),
(3, 'asd2', 'asd23', 1),
(4, 'Cardiology', 'Cardiology', 0),
(5, 'Anaesthetics', 'Anaesthetics', 0),
(6, 'Assistants', 'Assistants', 1),
(7, 'sdf', 'sdf', 1),
(8, 'Casualty', 'Casualty', 0),
(9, 'Breast screenin', 'Breast screening', 0),
(10, 'Chaplaincy', 'Chaplaincy', 0),
(11, 'Intensive Care Unit (ICU)', 'Intensive Care Unit (ICU)', 0),
(12, 'Radiography', 'Radiography', 0),
(13, 'Discharge lounge', 'Discharge lounge', 0),
(14, 'Ear nose and throat (ENT)', 'Ear nose and throat (ENT)', 0),
(15, 'Elderly services department', 'Elderly services department', 0),
(16, 'Gastroenterology', 'Gastroenterology', 0),
(17, 'General surgery', 'General surgery', 0),
(18, 'Gynaecology', 'Gynaecology', 0),
(19, 'Maternity departments', 'Maternity departments', 0),
(20, 'Microbiology', 'Microbiology', 0),
(21, 'Neonatal unit', 'Neonatal unit', 0),
(22, 'Nephrology', 'Nephrology', 0),
(23, 'Neurology', 'Neurology', 0),
(24, 'Nutrition and dietetics', 'Nutrition and dietetics', 0),
(25, 'Obstetrics and gynaecology units', 'Obstetrics and gynaecology units', 0),
(26, 'Occupational therapy', 'Occupational therapy', 0),
(27, 'Oncology', 'Oncology', 0),
(28, 'Ophthalmology', 'Ophthalmology', 0),
(29, 'Orthopaedics', 'Orthopaedics', 0),
(30, 'Physiotherapy', 'Physiotherapy', 0),
(31, 'Radiotherapy', 'Radiotherapy', 0),
(32, 'Renal unit', 'Renal unit', 0),
(33, 'Rheumatology', 'Rheumatology', 0),
(34, 'Genitourinary Department', 'Sexual health (genitourinary medicine)', 0),
(35, 'Urology', 'Urology', 0),
(36, 'Dental Department', 'Dental Department', 0),
(37, 'a', 'a', 1),
(38, 'BILLING', 'BILLING', 0),
(39, 'IT DEPARTMENT', 'IT DEPARTMENT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designation_id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation`, `description`, `InActive`) VALUES
(1, 'System Administrator', 'System Administrator', 0),
(2, 'Receptionist', 'Receptionist', 0),
(4, 'Doctor', 'Doctor', 0),
(5, 'Nurse', 'Nurse', 0),
(6, 'Pharmacist', 'Pharmacist', 0),
(7, 'Pathologist', 'Pathologist', 0),
(8, 'CASHIER', 'CASHIER', 0);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `diagnosis_id` int(11) NOT NULL,
  `diagnosis_name` varchar(500) NOT NULL,
  `diagnosis_desc` text NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosis_id`, `diagnosis_name`, `diagnosis_desc`, `InActive`) VALUES
(1, 'ABNORMAL HEART RHYTHMS', 'Abnormal Heart Rhythms', 0),
(7, 'ASCITIES', 'Ascities', 0),
(68, 'EYE DISORDERS', 'eye disorders', 0),
(6, 'APPENDICITIES', 'Appendicities', 0),
(8, 'ASTHMA', 'Asthma', 0),
(9, 'ASTIGMATISM', 'astigmatism', 0),
(10, 'CAVITY', 'cavity', 0),
(11, 'DIARRHEA', 'diarrhea', 0),
(12, 'ACUTE PANCREATITIS', 'Acute pancreatitis', 0),
(13, 'ACUTE ENTRITIS', 'acute Entritis', 0),
(14, 'ARTHRITIS', 'arthritis', 0),
(15, 'AUTOIMMUNE DISEASES', 'autoimmune diseases', 0),
(16, 'BRAIN CANCER', 'brain cancer', 0),
(17, 'BREAST CANCER', 'breast cancer', 0),
(18, 'CANDIDIASIS', 'candidiasis', 0),
(19, 'CHRONIC ILLNESS', 'chronic illness', 0),
(20, 'COLD SORES', 'cold sores', 0),
(21, 'COLON CANCER', 'colon cancer', 0),
(22, 'CONSTIPATION', 'constipation', 0),
(23, 'FIBROMYALGIA', 'fibromyalgia', 0),
(24, 'FLU', 'flu', 0),
(25, 'FOOD POISONING', 'food poisoning', 0),
(26, 'GALLSTONES', 'Gallstones', 0),
(27, 'WHOOPING COUGH', 'whooping cough', 0),
(28, 'THYROID DISORDERS', 'thyroid disorders', 0),
(29, 'THRUSH', 'thrush', 0),
(30, 'STROKE', 'stroke', 0),
(31, 'SMOKING', 'smoking', 0),
(32, 'SLEEP DISORDERS', 'sleep disorders', 0),
(33, 'SEXUALLY TRANSMITTED DISEASES', 'sexually transmitted diseases', 0),
(34, 'SARS', 'SARS', 0),
(35, 'RAYNAUD\'S PHENOMENON', 'Raynaud\'s Phenomenon', 0),
(36, 'PROSTATE DISORDERS', 'prostate disorders', 0),
(37, 'PROSTATE CANCER', 'prostate cancer', 0),
(38, 'PREMENSTRUAL SYNDROME (PMS)', 'premenstrual syndrome (PMS)', 0),
(39, 'PREGNANCY', 'pregnancy', 0),
(40, 'PERTUSSIS', 'pertussis', 0),
(41, 'PELVIC INFLAMMATORY DISEASE', 'pelvic inflammatory disease', 0),
(42, 'PARKINSON\'S DISEASE', 'Parkinson\'s disease', 0),
(43, 'PAIN', 'pain', 0),
(44, 'OVERWEIGHT', 'overweight', 0),
(45, 'OVARIAN CANCER', 'ovarian cancer', 0),
(46, 'OTITIS MEDIA (MIDDLE EAR INFECTION)', 'otitis media (middle ear infection)', 0),
(47, 'OSTEOPOROSIS', 'osteoporosis', 0),
(48, 'OBESITY', 'obesity', 0),
(49, 'NON-HODGKIN\'S LYMPHOMA', 'Non-Hodgkin\'s lymphoma', 0),
(50, 'NARCOLEPSY', 'narcolepsy', 0),
(51, 'MUSCULAR DYSTROPHY', 'muscular dystrophy', 0),
(52, 'MULTIPLE SCLEROSIS', 'multiple sclerosis', 0),
(53, 'LUNG CANCER', 'lung cancer', 0),
(54, 'LIVER DISEASE', 'liver disease', 0),
(55, 'LIVER CANCER', 'liver cancer', 0),
(56, 'LEUKEMIA', 'leukemia', 0),
(57, 'LACTOSE INTOLERANCE', 'lactose intolerance', 0),
(58, 'KIDNEY DISEASE', 'kidney disease', 0),
(59, 'INSOMNIA', 'insomnia', 0),
(60, 'HODGKIN\'S DISEASE', 'Hodgkin\'s disease', 0),
(61, 'HIV', 'HIV', 0),
(62, 'HIGH CHOLESTEROL', 'high cholesterol', 0),
(63, 'HERPES', 'herpes', 0),
(64, 'HEPATITIS', 'hepatitis', 0),
(65, 'HEMOCHROMATOSIS', 'hemochromatosis', 0),
(66, 'HEART DISEASE', 'heart disease', 0),
(67, 'HEADACHE', 'headache', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctors_fee`
--

CREATE TABLE `doctors_fee` (
  `doctorfeeID` int(11) NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `invoice_no` varchar(25) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `completeDate` varchar(50) DEFAULT NULL,
  `feeType` varchar(25) DEFAULT NULL,
  `value` float(11,2) DEFAULT NULL,
  `totalFee` float(11,2) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors_fee`
--

INSERT INTO `doctors_fee` (`doctorfeeID`, `user_id`, `invoice_no`, `date`, `completeDate`, `feeType`, `value`, `totalFee`, `notes`) VALUES
(1, '00007', 'SI-000036', '2015-11-14', '2015-11-14 09:25:54 pm', 'percentage', 100.00, 0.00, 'cccc');

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `floor_id` int(11) NOT NULL,
  `floor_name` varchar(25) NOT NULL,
  `floor_description` text NOT NULL,
  `InActive` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`floor_id`, `floor_name`, `floor_description`, `InActive`) VALUES
(1, 'Ground Floor', 'Ground Floor', 0),
(2, '2nd Floor', '2nd Floor', 0),
(3, '3rd Floor', '3rd Floor', 0),
(4, '4th Floor', '4th Floor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `insurance_comp`
--

CREATE TABLE `insurance_comp` (
  `in_com_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `fax_no` varchar(25) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `contact_no_person` varchar(100) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `InActive` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance_comp`
--

INSERT INTO `insurance_comp` (`in_com_id`, `company_name`, `company_address`, `phone_no`, `fax_no`, `email_address`, `contact_person`, `contact_no_person`, `contact_email`, `notes`, `InActive`) VALUES
(5, 'Phil Health', '#0001 Street Salcedo Makati City', '02 456 8595', '', 'contactme@yahoo.com', 'Bobby Mendoza', '091234676454', 'bobby@yahoo.com', 'remarks of insurance company', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iop_bed_side_procedure`
--

CREATE TABLE `iop_bed_side_procedure` (
  `bed_pro_id` int(11) NOT NULL,
  `iop_id` varchar(25) NOT NULL,
  `dDate` date NOT NULL,
  `dDateTime` varchar(50) NOT NULL,
  `cItem_id` int(11) NOT NULL,
  `qty` int(5) NOT NULL,
  `notes` text NOT NULL,
  `cPreparedBy` varchar(25) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iop_billing`
--

CREATE TABLE `iop_billing` (
  `bill_id` int(11) NOT NULL,
  `receipt_no` varchar(25) NOT NULL,
  `iop_id` varchar(25) DEFAULT NULL,
  `patient_no` varchar(25) DEFAULT NULL,
  `payment_type` varchar(25) DEFAULT NULL,
  `invoice_no` varchar(50) DEFAULT NULL,
  `dDate` date DEFAULT NULL,
  `discount` float(11,2) DEFAULT NULL,
  `reason_discount` int(5) DEFAULT NULL,
  `sub_total` float(11,2) DEFAULT NULL,
  `total_amount` float(11,2) DEFAULT NULL,
  `total_purchased` float(11,2) DEFAULT NULL,
  `creditCardNo` int(11) DEFAULT NULL,
  `creditCardHolder` int(11) DEFAULT NULL,
  `insurance_company` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `InActive` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iop_billing_t`
--

CREATE TABLE `iop_billing_t` (
  `invoice_no` varchar(50) DEFAULT NULL,
  `bill_name` varchar(900) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `rate` float(11,2) DEFAULT NULL,
  `amount` float(11,2) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `InActive` int(1) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `iop_id` varchar(25) DEFAULT NULL,
  `isPackage` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iop_complaints`
--

CREATE TABLE `iop_complaints` (
  `iop_comp_id` int(11) NOT NULL,
  `iop_id` varchar(25) NOT NULL,
  `complain_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `dDate` date NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iop_complaints`
--

INSERT INTO `iop_complaints` (`iop_comp_id`, `iop_id`, `complain_id`, `remarks`, `dDate`, `InActive`) VALUES
(1, 'OP-000017', 5, 'dasd', '2017-02-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iop_diagnosis`
--

CREATE TABLE `iop_diagnosis` (
  `iop_diag_id` int(11) NOT NULL,
  `iop_id` varchar(11) NOT NULL,
  `diagnosis_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `dDate` datetime NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iop_diagnosis`
--

INSERT INTO `iop_diagnosis` (`iop_diag_id`, `iop_id`, `diagnosis_id`, `remarks`, `dDate`, `InActive`) VALUES
(1, 'OP-000017', 1, 'asdasd', '2017-02-24 08:32:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iop_discharge_summary`
--

CREATE TABLE `iop_discharge_summary` (
  `dis_id` int(11) NOT NULL,
  `iop_id` varchar(25) NOT NULL,
  `dDate` date NOT NULL,
  `dDateTime` datetime NOT NULL,
  `reason_admission` text NOT NULL,
  `condition_upon_discharge` int(11) NOT NULL,
  `admitting_impression` text NOT NULL,
  `final_diagnosis` text NOT NULL,
  `physical_exam_findings` text NOT NULL,
  `course_ward` text NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iop_discharge_summary`
--

INSERT INTO `iop_discharge_summary` (`dis_id`, `iop_id`, `dDate`, `dDateTime`, `reason_admission`, `condition_upon_discharge`, `admitting_impression`, `final_diagnosis`, `physical_exam_findings`, `course_ward`, `InActive`) VALUES
(1, 'OP-000017', '2017-02-24', '2017-02-24 08:34:11', 'asdasd', 61, 'asd', 'asd', 'asd', 'asd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iop_intake_record`
--

CREATE TABLE `iop_intake_record` (
  `intake_id` int(11) NOT NULL,
  `iop_id` varchar(25) NOT NULL,
  `particulars` varchar(500) NOT NULL,
  `IV_fluids` varchar(25) NOT NULL,
  `oral` varchar(25) NOT NULL,
  `no_stool` varchar(25) NOT NULL,
  `no_urine` varchar(25) NOT NULL,
  `dDate` date NOT NULL,
  `dDateTime` varchar(50) NOT NULL,
  `InActive` int(1) NOT NULL,
  `cPreparedBy` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iop_laboratory`
--

CREATE TABLE `iop_laboratory` (
  `io_lab_id` int(11) NOT NULL,
  `iop_id` varchar(11) NOT NULL,
  `dDate` date NOT NULL,
  `dDateTime` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `laboratory_id` int(11) NOT NULL,
  `findings` text NOT NULL,
  `result` text NOT NULL,
  `doctor` int(11) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iop_laboratory`
--

INSERT INTO `iop_laboratory` (`io_lab_id`, `iop_id`, `dDate`, `dDateTime`, `category_id`, `laboratory_id`, `findings`, `result`, `doctor`, `InActive`) VALUES
(1, 'OP-000017', '2017-02-24', '2017-02-24 08:30 AM', 8, 61, '', '', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `iop_medication`
--

CREATE TABLE `iop_medication` (
  `iop_med_id` int(11) NOT NULL,
  `iop_id` varchar(25) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `instruction` text NOT NULL,
  `advice` text NOT NULL,
  `days` int(2) NOT NULL,
  `total_qty` int(5) NOT NULL,
  `InActive` int(1) NOT NULL,
  `dDate` datetime NOT NULL,
  `cPreparedBy` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iop_medication`
--

INSERT INTO `iop_medication` (`iop_med_id`, `iop_id`, `medicine_id`, `instruction`, `advice`, `days`, `total_qty`, `InActive`, `dDate`, `cPreparedBy`) VALUES
(1, 'OP-000017', 11, '', '', 10, 10, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `iop_nurse_notes`
--

CREATE TABLE `iop_nurse_notes` (
  `nurse_notes_id` int(11) NOT NULL,
  `iop_id` varchar(25) NOT NULL,
  `dDate` date NOT NULL,
  `dDateTime` varchar(50) NOT NULL,
  `focus` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `cPreparedBy` varchar(25) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iop_operation_theater`
--

CREATE TABLE `iop_operation_theater` (
  `operation_id` int(11) NOT NULL,
  `iop_id` varchar(25) NOT NULL,
  `dDate_from` date NOT NULL,
  `dTime_from` time NOT NULL,
  `dDate_to` date NOT NULL,
  `dTime_to` time NOT NULL,
  `operation_name` varchar(250) NOT NULL,
  `bed_id` int(11) NOT NULL,
  `diagnosis` text NOT NULL,
  `name_of_surgeon` varchar(25) NOT NULL,
  `name_of_anesthesia` varchar(25) NOT NULL,
  `assistant_name1` varchar(150) NOT NULL,
  `assistant_name2` varchar(150) NOT NULL,
  `assistant_name3` varchar(150) NOT NULL,
  `assistant_name4` varchar(150) NOT NULL,
  `operation_procedure` text NOT NULL,
  `notes` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iop_output_record`
--

CREATE TABLE `iop_output_record` (
  `output_id` int(11) NOT NULL,
  `iop_id` varchar(25) NOT NULL,
  `urine` varchar(25) NOT NULL,
  `feaces` varchar(25) NOT NULL,
  `respitation` varchar(25) NOT NULL,
  `skin` varchar(25) NOT NULL,
  `dDate` date NOT NULL,
  `dDateTime` varchar(50) NOT NULL,
  `cPreparedBy` varchar(25) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iop_progress_note`
--

CREATE TABLE `iop_progress_note` (
  `progress_id` int(11) NOT NULL,
  `iop_id` varchar(25) NOT NULL,
  `dDate` date NOT NULL,
  `dDateTime` varchar(50) NOT NULL,
  `progress` text NOT NULL,
  `treatment` text NOT NULL,
  `remarks` text NOT NULL,
  `InActive` int(1) NOT NULL,
  `cPreparedBy` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iop_progress_note`
--

INSERT INTO `iop_progress_note` (`progress_id`, `iop_id`, `dDate`, `dDateTime`, `progress`, `treatment`, `remarks`, `InActive`, `cPreparedBy`) VALUES
(1, 'IP-000024', '2017-02-24', '2017-02-24 asd', 'asd', 'asd', 'asdas', 0, '00007');

-- --------------------------------------------------------

--
-- Table structure for table `iop_receipt`
--

CREATE TABLE `iop_receipt` (
  `receipt_id` int(11) NOT NULL,
  `receipt_no` varchar(15) NOT NULL,
  `invoice_no` varchar(25) NOT NULL,
  `dDate` datetime NOT NULL,
  `iop_id` varchar(25) NOT NULL,
  `patient_no` varchar(25) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `discount` float(11,2) NOT NULL,
  `subtotal` float(11,2) NOT NULL,
  `total_amount` float(11,2) NOT NULL,
  `amountPaid` float(11,2) NOT NULL,
  `change` float(11,2) NOT NULL,
  `total_purchased` int(4) NOT NULL,
  `creditCardNo` int(25) NOT NULL,
  `creditCardHolder` varchar(35) NOT NULL,
  `insurance_company` int(11) NOT NULL,
  `remarks` int(11) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iop_room_transfer`
--

CREATE TABLE `iop_room_transfer` (
  `transfer_id` int(11) NOT NULL,
  `iop_id` varchar(25) NOT NULL,
  `dDate` date NOT NULL,
  `dDateTime` varchar(50) NOT NULL,
  `room_category_id` int(3) NOT NULL,
  `room_master_id` int(3) NOT NULL,
  `bed_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `cPreparedBy` varchar(25) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iop_room_transfer`
--

INSERT INTO `iop_room_transfer` (`transfer_id`, `iop_id`, `dDate`, `dDateTime`, `room_category_id`, `room_master_id`, `bed_id`, `reason`, `cPreparedBy`, `InActive`) VALUES
(1, 'IP-000024', '2017-02-24', '2017-02-24 08:36:52 AM', 1, 7, 1, 'Patient Admitted', '00010', 0);

-- --------------------------------------------------------

--
-- Table structure for table `iop_vital_parameters`
--

CREATE TABLE `iop_vital_parameters` (
  `vital_id` int(11) NOT NULL,
  `iop_id` varchar(25) NOT NULL,
  `dDate` date NOT NULL,
  `dDateTime` varchar(50) NOT NULL,
  `pulse_rate` varchar(25) NOT NULL,
  `temperature` varchar(25) NOT NULL,
  `height` varchar(25) NOT NULL,
  `bp` varchar(25) NOT NULL,
  `respiration` varchar(25) NOT NULL,
  `weight` varchar(25) NOT NULL,
  `cPreparedBy` varchar(25) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iop_vital_parameters`
--

INSERT INTO `iop_vital_parameters` (`vital_id`, `iop_id`, `dDate`, `dDateTime`, `pulse_rate`, `temperature`, `height`, `bp`, `respiration`, `weight`, `cPreparedBy`, `InActive`) VALUES
(1, 'OP-000017', '2017-02-24', '2017-02-24 07:26:54', '10', '30', '50', '20', '40', '60', '', 0),
(2, 'OP-000017', '2017-02-24', '2017-02-24 08:33 AM', '', '', '', '', '', '', '', 0),
(3, 'OP-000018', '2017-02-24', '2017-02-24 08:35:26', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logfile`
--

CREATE TABLE `logfile` (
  `logid` bigint(11) NOT NULL,
  `user_id` varchar(25) DEFAULT NULL,
  `module` varchar(50) DEFAULT NULL,
  `event` varchar(10) DEFAULT NULL,
  `ipaddress` varchar(25) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logfile`
--

INSERT INTO `logfile` (`logid`, `user_id`, `module`, `event`, `ipaddress`, `value`, `date_time`) VALUES
(1, '00010', 'Patient Registration', 'INSERT', '127.0.0.1', 'Jenna P santos', '2016-11-01 02:34:43'),
(2, '00010', 'Patient Registration', 'INSERT', '127.0.0.1', 'Brook P Ramon', '2016-11-01 03:11:34'),
(3, '00010', 'Company Information', 'INSERT', '127.0.0.1', 'DEMO HOSPITAL CENTER', '2017-02-11 11:44:00'),
(4, '00010', 'User', 'INSERT', '127.0.0.1', 'Bayes P. Danica', '2017-02-11 11:49:01'),
(5, '00010', 'Patient Registration', 'INSERT', '127.0.0.1', 'sad asd aasd', '2017-02-23 01:52:52'),
(6, '00010', 'Patient Registration', 'INSERT', '127.0.0.1', 'Jenna P. Santos', '2017-02-24 06:17:18'),
(7, '00010', 'Patient Registration', 'INSERT', '127.0.0.1', 'Ferdinand  Dela Cruz', '2017-02-24 06:42:43'),
(8, '00010', 'User', 'UPDATE', '127.0.0.1', 'Admin A. Administrator', '2017-02-24 07:02:40'),
(9, '00010', 'Room Bed Master', 'INSERT', '127.0.0.1', '4', '2017-02-24 07:04:00'),
(10, '00010', 'Room Bed Master', 'INSERT', '127.0.0.1', '5', '2017-02-24 07:04:06'),
(11, '00010', 'Room Bed Master', 'INSERT', '127.0.0.1', '6', '2017-02-24 07:04:12'),
(12, '00010', 'Room Bed Master', 'INSERT', '127.0.0.1', '1', '2017-02-24 07:04:19'),
(13, '00010', 'Room Bed Master', 'INSERT', '127.0.0.1', '2', '2017-02-24 07:04:26'),
(14, '00010', 'Room Bed Master', 'INSERT', '127.0.0.1', '3', '2017-02-24 07:04:34'),
(15, '00010', 'Room Bed Master', 'INSERT', '127.0.0.1', '4', '2017-02-24 07:04:40'),
(16, '00010', 'Room Bed Master', 'INSERT', '127.0.0.1', '11', '2017-02-24 07:05:50'),
(17, '00010', 'Room Bed Master', 'INSERT', '127.0.0.1', '12', '2017-02-24 07:05:57'),
(18, '00010', 'Room Bed Master', 'INSERT', '127.0.0.1', 'RM-101-1', '2017-02-24 07:10:54');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `cat_id` int(11) NOT NULL,
  `med_category_name` varchar(500) NOT NULL,
  `med_category_desc` text NOT NULL,
  `InActive` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`cat_id`, `med_category_name`, `med_category_desc`, `InActive`) VALUES
(1, 'ANTI-ALLERGIC', 'ANTI-ALLERGIC', 0),
(2, 'ANTI-ANXIETY', 'ANTI-ANXIETY', 0),
(4, 'ANTI-ARRHYTHMIA', 'ANTI-ARRHYTHMIA', 0),
(5, 'ANTI-ASTHMATIC', 'ANTI-ASTHMATIC', 0),
(6, 'ANTI-BACTERIAL', 'ANTI-BACTERIAL ', 0),
(7, 'ANTI-CHOLINERGICS', 'ANTI-CHOLINERGICS', 0),
(8, 'ANTI-CHOLINESTERASES', 'ANTI-CHOLINESTERASES', 0),
(9, 'ANTI-HIV', 'ANTI-HIV', 0),
(10, 'ANTI-INFECTIVE', 'ANTI-INFECTIVE', 0),
(11, 'PHARMACY', 'PHARMACY', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_drug_name`
--

CREATE TABLE `medicine_drug_name` (
  `drug_id` int(11) NOT NULL,
  `med_cat_id` int(11) NOT NULL,
  `cType` int(11) NOT NULL,
  `drug_name` varchar(500) NOT NULL,
  `drug_desc` text NOT NULL,
  `uom` int(11) NOT NULL,
  `re_order_level` float(11,2) NOT NULL,
  `nPrice` float(11,2) NOT NULL,
  `nStock` float(11,2) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_drug_name`
--

INSERT INTO `medicine_drug_name` (`drug_id`, `med_cat_id`, `cType`, `drug_name`, `drug_desc`, `uom`, `re_order_level`, `nPrice`, `nStock`, `InActive`) VALUES
(4, 1, 51, 'CYPROHEPTADINE', '', 55, 150.00, 60.00, 1500.00, 0),
(3, 1, 51, 'DIPHENHYDRAMINE', '', 55, 100.00, 25.00, 10000.00, 0),
(5, 1, 51, 'PROMETHAZINE', '', 55, 150.00, 50.00, 1500.00, 0),
(6, 1, 51, 'PHENIRAMINE', '', 55, 150.00, 45.00, 150.00, 0),
(7, 1, 51, 'CHLORPHENIRAMINE', '', 55, 15.00, 15.00, 250.00, 0),
(8, 1, 51, 'PYRILAMINE', '', 55, 150.00, 50.00, 150.00, 0),
(9, 5, 51, 'EPINEPHRINE', '', 55, 150.00, 45.00, 54000.00, 0),
(10, 1, 51, 'NITRIC OXIDE', '', 55, 155.00, 50.00, 2500.00, 0),
(11, 1, 51, 'ATROPINE', '', 55, 500.00, 25.00, 150.00, 0),
(12, 5, 51, 'ISOPROTERENOL', '', 55, 500.00, 50.00, 5000.00, 0),
(13, 11, 52, 'MEDICINE', '', 55, 0.00, 0.00, 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_module` varchar(50) NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `page_link` varchar(50) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_module`, `page_name`, `page_link`, `InActive`) VALUES
(1, 'System Pages', 'Access to System Pages', 'pages', 0),
(2, 'System Pages', 'Add Page', 'add_page', 0),
(3, 'System Pages', 'Update Page', 'update_page', 0),
(4, 'System Pages', 'Delete Page', 'delete_page', 0),
(35, 'User Roles', 'Delete User Roles', 'delete_roles', 0),
(34, 'User Roles', 'Update User Roles', 'update_roles', 0),
(33, 'User Roles', 'Add User Roles', 'add_roles', 0),
(32, 'User Roles', 'Access to User Roles', 'roles', 0),
(28, 'Department', 'Access to Department', 'department', 0),
(29, 'Department', 'Add Department', 'add_department', 0),
(30, 'Department', 'Update Department', 'update_department', 0),
(31, 'Department', 'Delete Department', 'delete_department', 0),
(36, 'System User', 'Access to System User', 'view_user', 0),
(37, 'System User', 'Add User', 'add_user', 0),
(38, 'System User', 'Update User', 'update_user', 0),
(39, 'System User', 'Delete User', 'delete_user', 0),
(40, 'Designation', 'Access to Designation', 'designation', 0),
(41, 'Designation', 'Add Designation', 'add_designation', 0),
(42, 'Designation', 'Update Designation', 'update_designation', 0),
(43, 'Designation', 'Delete Designation', 'delete_designation', 0),
(44, 'Room Management', 'Access to Room Management', 'room_management', 0),
(45, 'Room Management', 'Add Room Management', 'add_room_management', 0),
(46, 'Room Management', 'Update Room Management', 'update_room_management', 0),
(47, 'Room Management', 'Delete Room Management', 'delete_room_management', 0),
(48, 'Patient Management', 'Add New Patient', 'add_new_patient', 0),
(49, 'Patient Management', 'Access to Patient Master', 'patient_master', 0),
(50, 'Patient Management', 'Patient Demographic', 'patient_demographic', 0),
(51, 'Patient Management', 'Modify Patient Information', 'modiffy_patient', 0),
(52, 'System Parameters', 'Access to System Parameters', 'parameters', 0),
(53, 'System Parameters', 'Add Parameters', 'add_sys_param', 0),
(54, 'System Parameters', 'Update Parameters', 'update_sys_param', 0),
(55, 'System Parameters', 'Delete Parameters', 'delete_sys_param', 0),
(56, 'Bill Group Name', 'Access to Bill Group Name', 'group_name', 0),
(57, 'Bill Group Name', 'Add Group Name', 'add_group_name', 0),
(58, 'Bill Group Name', 'Update Group Name', 'update_group_name', 0),
(59, 'Bill Group Name', 'Delete Group Name', 'delete_group_name', 0),
(60, 'Particular Bill', 'Access to Particular Bill', 'particular_bill', 0),
(61, 'Particular Bill', 'Add Particular Bill', 'add_particular_bill', 0),
(62, 'Particular Bill', 'Update Particular Bill', 'update_particular_bill', 0),
(63, 'Particular Bill', 'Delete Particular Bill', 'delete_particular_bill', 0),
(64, 'Diagnosis Master', 'Access to Diagnosis Master', 'diagnosis', 0),
(65, 'Diagnosis Master', 'Add Diagnosis Master', 'add_diagnosis', 0),
(66, 'Diagnosis Master', 'Update Diagnosis Master', 'update_diagnosis', 0),
(67, 'Diagnosis Master', 'Delete Diagnosis Master', 'delete_diagnosis', 0),
(68, 'Insurance Company', 'Access to Insurance Company', 'insurance_company', 0),
(69, 'Insurance Company', 'Add Insurance Company', 'add_insurance_company', 0),
(70, 'Insurance Company', 'Update Insurance Company', 'update_insurance_company', 0),
(71, 'Insurance Company', 'Delete Insurance Company', 'delete_insurance_company', 0),
(72, 'Complain Module', 'Access to Complain Module', 'complain', 0),
(73, 'Complain Module', 'Add Complain Module', 'add_complain', 0),
(74, 'Complain Module', 'Update Complain', 'update_complain', 0),
(75, 'Complain Module', 'Delete Complain', 'delete_complain', 0),
(76, 'Medicine Category', 'Access to Medicine Category', 'medicine_category', 0),
(77, 'Medicine Category', 'Add Medicine Category', 'add_medicine_category', 0),
(78, 'Medicine Category', 'Update Medicine Category', 'update_medical_category', 0),
(79, 'Medicine Category', 'Delete Medicine Category', 'delete_medical_category', 0),
(80, 'Drug Name Master', 'Access to Drug Name Master', 'drug_name', 0),
(81, 'Drug Name Master', 'Add Drug Name Master', 'add_drug_name', 0),
(82, 'Drug Name Master', 'Update Drug Name Master', 'update_drug_name', 0),
(83, 'Drug Name Master', 'Delete Drug Name Master', 'delete_drug_name', 0),
(84, 'Billing Module', 'Access to POS', 'pos', 0),
(85, 'Billing Module', 'Access to Billing List', 'billing_history', 0),
(86, 'OR History', 'Access to OR History', 'OR_history', 0),
(87, 'Reports', 'Daily Sales Reports', 'daily_reports', 0),
(88, 'Reports', 'Patient List Report', 'patient_list_report', 0),
(89, 'Doctor Module', 'OPD', 'doctor_opd', 0),
(90, 'Doctor Module', 'IPD', 'ipd_doctor', 0),
(91, 'Patient Management', 'OPD Registration', 'opd_registration', 0),
(92, 'Patient Management', 'OPD Enquiry', 'opd_enquiry', 0),
(93, 'Patient Management', 'IPD Registration', 'ipd_registration', 0),
(94, 'Patient Management', 'IPD Enquiry', 'ipd_enquiry', 0),
(95, 'EMR Sheet', 'OPD EMR', 'opd_emr', 0),
(96, 'EMR Sheet', 'IPD EMR', 'ipd_emr', 0),
(97, 'OPD Reports', 'Patient Diagnosis Reports', 'opd_diagnosis_reports', 0),
(98, 'Reports', 'Individual Patient  Reports', 'patient_visited_report', 0),
(99, 'Room Management', 'Room Enquiry', 'room_enquiry', 0),
(100, 'Nurse Module', 'Patient Medication', 'nurse_medication_reports', 0),
(101, 'Nurse Module', 'Intake/Output Record', 'nurse_intake_output_reports', 0),
(102, 'Nurse Module', 'Nurse Progress Note', 'nurse_progress_note_report', 0),
(103, 'Nurse Module', 'Patient Vital Sign', 'nurse_vital_sign_report', 0),
(104, 'Nurse Module', 'IP Room Transfer', 'nurse_room_transfer_report', 0),
(105, 'Nurse Module', 'Patient History', 'nurse_patientHistory_report', 0),
(106, 'Nurse Module', 'Patient Discharge Summary', 'nurse_discharge_summary_report', 0),
(107, 'Nurse Module', 'Bed Side Procedure', 'nurse_bed_side_procedure_report', 0),
(108, 'Reports', 'Out Patient Reports', 'outpatient_report', 0),
(109, 'Reports', 'Admitted Patient Reports', 'inpatient_report', 0),
(110, 'Reports', 'Discharged Patient', 'discharged_patient_report', 0),
(111, 'Company Information', 'Company Information', 'company_information', 0),
(112, 'Surgical Package', 'Access to Surgical Package', 'surgical_package', 0),
(113, 'Surgical Package', 'Add Surgical Package', 'add_surgical_package', 0),
(114, 'Surgical Package', 'Update Surgical Package', 'update_surgical_package', 0),
(115, 'Surgical Package', 'Delete Surgical Package', 'delete_surgical_package', 0),
(116, 'Billing Module', 'Surgical Quotation Costing', 'surgical_costing', 0),
(117, 'Acknowledge Receipt', 'Access to Acknowledge Receipt', 'declared_receipt', 0),
(118, 'Acknowledge Receipt', 'Delete  Acknowledge Receipt', 'delete_delaredOR', 0),
(119, 'Reports', 'Acknowledge Receipt Reports', 'declared_receipt_report', 0),
(120, 'Nurse Module', 'Nurse Diagnosis', 'nurse_diagnosis_reports', 0),
(121, 'Patient Appointment', 'Access to Appointment', 'appointment', 0),
(122, 'Patient Appointment', 'Add Appointment', 'add_appointment', 0),
(123, 'Patient Appointment', 'Edit Appointment', 'edit_appointment', 0),
(124, 'Patient Appointment', 'Delete Appointment', 'delete_appointment', 0),
(126, 'Patient Appointment', 'Check IN Patient', 'checkIN_appointment', 0),
(127, 'Backup Database', 'Create Backup of System Database', 'backup_database', 0),
(128, 'Nurse Module', 'Access to Nurse Module', 'access_nurse_module', 0),
(129, 'Doctor Module', 'Access to Doctor Module', 'access_doctor_module', 0),
(130, 'EMR Sheet', 'Access to EMR', 'access_emr_module', 0),
(131, 'Administration Module Tab', 'Access to Administration Module', 'access_administration_module', 0),
(132, 'Reports Generation Module Tab', 'Access to Reports Module', 'access_reports_module', 0),
(133, 'Reports', 'Doctor\'s Fee Report', 'doctor_fee_report', 0),
(134, 'Dashboard', 'Access to Doctors Availability', 'access_doctors_avail', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_appointment`
--

CREATE TABLE `patient_appointment` (
  `appID` bigint(20) NOT NULL,
  `patient_no` varchar(25) NOT NULL,
  `appointmentDate` date NOT NULL,
  `appHour` tinyint(2) NOT NULL,
  `appMinutes` tinyint(2) NOT NULL,
  `appAMPM` varchar(10) NOT NULL,
  `appointmentTime` time NOT NULL,
  `appointmentReason` tinytext NOT NULL,
  `consultantDoctor` varchar(10) NOT NULL,
  `dateVisit` datetime NOT NULL,
  `appointmentStatus` char(1) NOT NULL,
  `dateEntry` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_attachment`
--

CREATE TABLE `patient_attachment` (
  `attach_id` int(11) NOT NULL,
  `patient_no` varchar(25) NOT NULL,
  `date_uploaded` datetime NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `description` varchar(155) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `file_type` varchar(150) NOT NULL,
  `file_size` varchar(50) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_details_iop`
--

CREATE TABLE `patient_details_iop` (
  `id` bigint(11) NOT NULL,
  `IO_ID` varchar(15) NOT NULL,
  `patient_no` varchar(15) NOT NULL,
  `patient_type` varchar(5) NOT NULL,
  `date_visit` date NOT NULL,
  `time_visit` time NOT NULL,
  `doctor_id` varchar(15) NOT NULL,
  `refferal_doctor` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `provisional_diagnosis` text NOT NULL,
  `complaints` text NOT NULL,
  `allergies` text NOT NULL,
  `warnings` text NOT NULL,
  `social_history` text NOT NULL,
  `family_history` text NOT NULL,
  `personal_history` text NOT NULL,
  `past_medical_history` text NOT NULL,
  `pulse_rate` varchar(150) NOT NULL,
  `temperature` varchar(150) NOT NULL,
  `height` varchar(150) NOT NULL,
  `bp` varchar(150) NOT NULL,
  `respiration` varchar(150) NOT NULL,
  `weight` varchar(150) NOT NULL,
  `nStatus` varchar(15) NOT NULL,
  `InActive` int(1) NOT NULL,
  `isPaid` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_details_iop`
--

INSERT INTO `patient_details_iop` (`id`, `IO_ID`, `patient_no`, `patient_type`, `date_visit`, `time_visit`, `doctor_id`, `refferal_doctor`, `room_id`, `department_id`, `provisional_diagnosis`, `complaints`, `allergies`, `warnings`, `social_history`, `family_history`, `personal_history`, `past_medical_history`, `pulse_rate`, `temperature`, `height`, `bp`, `respiration`, `weight`, `nStatus`, `InActive`, `isPaid`) VALUES
(1, 'OP-000017', '000039', 'OPD', '2017-02-24', '07:26:54', '00007', 7, 0, 8, '', '', 'Allergies here', 'Warnings here', 'Social History here', 'Family History here', 'Personal History here', 'Past Medical History here', '10', '30', '50', '20', '40', '60', 'Discharged', 0, 0),
(2, 'OP-000018', '000039', 'OPD', '2017-02-24', '08:35:26', '00007', 7, 0, 17, '', '', 'Allergies here', 'Warnings here', 'Social History here', 'Family History here', 'Personal History here', 'Past Medical History here', '', '', '', '', '', '', 'Discharged', 0, 0),
(3, 'IP-000024', '000039', 'IPD', '2017-02-24', '08:36:52', '00007', 0, 1, 10, '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'Discharged', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_personal_info`
--

CREATE TABLE `patient_personal_info` (
  `reg_no` bigint(11) NOT NULL,
  `patient_no` varchar(15) NOT NULL,
  `title` int(11) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  `firstname` varchar(35) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `gender` int(11) NOT NULL,
  `civil_status` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `birthplace` varchar(150) NOT NULL,
  `fathers_name` varchar(150) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `age` int(3) NOT NULL,
  `religion` int(11) NOT NULL,
  `street` varchar(50) NOT NULL,
  `subd_brgy` varchar(90) NOT NULL,
  `province` varchar(90) NOT NULL,
  `phone_no` varchar(25) NOT NULL,
  `phone_no_office` varchar(25) NOT NULL,
  `mobile_no` varchar(25) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `date_entry` datetime NOT NULL,
  `blood_group` int(11) NOT NULL,
  `Insurance_comp` int(11) NOT NULL,
  `insurance_no` varchar(25) NOT NULL,
  `id_identifiers` text NOT NULL,
  `InActive` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_personal_info`
--

INSERT INTO `patient_personal_info` (`reg_no`, `patient_no`, `title`, `lastname`, `firstname`, `middlename`, `gender`, `civil_status`, `birthday`, `birthplace`, `fathers_name`, `address1`, `address2`, `age`, `religion`, `street`, `subd_brgy`, `province`, `phone_no`, `phone_no_office`, `mobile_no`, `email_address`, `picture`, `date_entry`, `blood_group`, `Insurance_comp`, `insurance_no`, `id_identifiers`, `InActive`) VALUES
(1, '000039', 7, 'Dela Cruz', 'Ferdinand', '', 1, 3, '1941-05-30', '', '', '', '', 75, 0, '', '', '', '', '', '', '', '', '2017-02-24 06:42:43', 0, 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `price_history`
--

CREATE TABLE `price_history` (
  `price_history_id` int(11) NOT NULL,
  `nRef_ID` int(11) NOT NULL,
  `price` float(11,2) NOT NULL,
  `updatedBy` varchar(11) NOT NULL,
  `dDate` datetime NOT NULL,
  `action` varchar(25) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price_history`
--

INSERT INTO `price_history` (`price_history_id`, `nRef_ID`, `price`, `updatedBy`, `dDate`, `action`, `InActive`) VALUES
(28, 38, 800.00, '00001', '2014-07-03 02:18:12', '', 0),
(27, 37, 200.00, '00001', '2014-07-03 02:17:59', '', 0),
(26, 36, 80.00, '00001', '2014-07-03 02:16:54', '', 0),
(25, 35, 145.00, '00001', '2014-07-03 02:16:44', '', 0),
(24, 34, 550.00, '00001', '2014-07-03 02:16:32', '', 0),
(23, 33, 660.00, '00001', '2014-07-03 02:16:24', '', 0),
(22, 32, 825.00, '00001', '2014-07-03 02:16:02', '', 0),
(21, 31, 150.00, '00001', '2014-07-03 02:15:17', '', 0),
(20, 30, 100.00, '00001', '2014-07-03 02:14:45', '', 0),
(19, 7, 165.00, '00001', '2014-06-24 02:27:55', '', 0),
(18, 16, 120.00, '00001', '2014-06-24 02:26:29', '', 0),
(17, 16, 100.00, '00001', '2014-06-24 02:17:39', '', 0),
(16, 29, 25.00, '00001', '2014-06-24 02:17:10', '', 0),
(29, 39, 550.00, '00001', '2014-07-03 02:18:23', '', 0),
(30, 40, 2000.00, '00001', '2014-07-03 02:18:52', '', 0),
(31, 41, 1500.00, '00001', '2014-07-03 02:19:02', '', 0),
(32, 42, 165.00, '00001', '2014-07-03 02:19:34', '', 0),
(33, 43, 145.00, '00001', '2014-07-03 02:19:45', '', 0),
(34, 44, 220.00, '00001', '2014-07-03 02:19:54', '', 0),
(35, 45, 220.00, '00001', '2014-07-03 02:20:03', '', 0),
(36, 46, 165.00, '00001', '2014-07-03 02:20:13', '', 0),
(37, 47, 220.00, '00001', '2014-07-03 02:20:23', '', 0),
(38, 48, 55.00, '00001', '2014-07-03 02:20:32', '', 0),
(39, 49, 295.00, '00001', '2014-07-03 02:20:43', '', 0),
(40, 50, 165.00, '00001', '2014-07-03 02:20:53', '', 0),
(41, 51, 500.00, '00001', '2014-07-03 02:21:31', '', 0),
(42, 52, 300.00, '00001', '2014-07-03 02:21:39', '', 0),
(43, 53, 1500.00, '00001', '2014-07-03 02:21:50', '', 0),
(44, 54, 3000.00, '00001', '2014-07-03 02:22:04', '', 0),
(45, 55, 300.00, '00001', '2014-07-03 02:22:12', '', 0),
(46, 56, 1500.00, '00001', '2014-07-03 02:22:21', '', 0),
(47, 57, 100.00, '00001', '2014-07-03 02:22:31', '', 0),
(48, 58, 1500.00, '00001', '2014-07-03 02:22:40', '', 0),
(49, 59, 700.00, '00001', '2014-07-03 02:23:33', '', 0),
(50, 60, 1000.00, '00001', '2014-07-03 02:23:42', '', 0),
(51, 61, 45.00, '00001', '2014-07-03 02:24:17', '', 0),
(52, 62, 35.00, '00001', '2014-07-03 02:24:30', '', 0),
(53, 63, 165.00, '00001', '2014-07-03 02:24:38', '', 0),
(54, 64, 330.00, '00001', '2014-07-03 02:24:48', '', 0),
(55, 65, 25.00, '00001', '2014-07-03 02:24:59', '', 0),
(56, 66, 715.00, '00001', '2014-07-03 02:25:07', '', 0),
(57, 67, 990.00, '00001', '2014-07-03 02:25:18', '', 0),
(58, 68, 255.00, '00001', '2014-07-03 02:25:28', '', 0),
(59, 69, 220.00, '00001', '2014-07-03 02:25:59', '', 0),
(60, 70, 825.00, '00001', '2014-07-03 02:26:10', '', 0),
(61, 71, 330.00, '00001', '2014-07-03 02:26:21', '', 0),
(62, 72, 660.00, '00001', '2014-07-03 02:26:31', '', 0),
(63, 73, 330.00, '00001', '2014-07-03 02:26:46', '', 0),
(64, 74, 330.00, '00001', '2014-07-03 02:26:55', '', 0),
(65, 75, 1430.00, '00001', '2014-07-03 02:27:07', '', 0),
(66, 76, 500.00, '00001', '2014-07-03 02:28:00', '', 0),
(67, 77, 100.00, '00001', '2014-07-03 02:28:12', '', 0),
(68, 78, 200.00, '00001', '2014-07-03 02:28:23', '', 0),
(69, 79, 100.00, '00001', '2014-07-03 02:28:33', '', 0),
(70, 80, 150.00, '00001', '2014-07-03 02:28:47', '', 0),
(71, 81, 650.00, '00001', '2014-07-03 02:29:19', '', 0),
(72, 82, 650.00, '00001', '2014-07-03 02:29:31', '', 0),
(73, 83, 610.00, '00001', '2014-07-03 02:29:40', '', 0),
(74, 84, 55.00, '00001', '2014-07-03 02:29:51', '', 0),
(75, 85, 880.00, '00001', '2014-07-03 02:30:00', '', 0),
(76, 86, 825.00, '00001', '2014-07-03 02:30:12', '', 0),
(77, 87, 660.00, '00001', '2014-07-03 02:30:56', '', 0),
(78, 88, 2000.00, '00001', '2014-07-03 02:31:08', '', 0),
(79, 89, 880.00, '00001', '2014-07-03 02:31:20', '', 0),
(80, 90, 1300.00, '00001', '2014-07-03 02:31:31', '', 0),
(81, 91, 600.00, '00001', '2014-07-03 02:31:46', '', 0),
(82, 92, 600.00, '00001', '2014-07-03 02:31:56', '', 0),
(83, 93, 1000.00, '00001', '2014-07-03 02:32:05', '', 0),
(84, 34, 1500.00, '00001', '2014-07-04 03:45:25', '', 0),
(85, 35, 500.00, '00001', '2014-07-23 09:39:07', '', 0),
(86, 94, 2500.00, '00001', '2014-07-23 01:21:55', '', 0),
(87, 95, 2500.00, '00001', '2014-07-23 01:22:16', '', 0),
(88, 96, 3000.00, '00001', '2014-07-23 01:22:30', '', 0),
(89, 97, 6000.00, '00001', '2014-07-23 01:22:44', '', 0),
(90, 98, 3000.00, '00001', '2014-07-23 01:22:55', '', 0),
(91, 99, 6000.00, '00001', '2014-07-23 01:23:05', '', 0),
(92, 100, 1000.00, '00001', '2014-07-23 01:23:36', '', 0),
(93, 101, 1500.00, '00001', '2014-07-23 01:23:49', '', 0),
(94, 102, 3000.00, '00001', '2014-07-23 01:23:58', '', 0),
(95, 103, 6000.00, '00001', '2014-07-23 01:24:08', '', 0),
(96, 104, 10000.00, '00001', '2014-08-12 03:00:53', '', 0),
(97, 105, 100.00, '00001', '2014-08-12 03:01:10', '', 0),
(98, 106, 100.00, '00001', '2014-08-12 03:01:23', '', 0),
(99, 107, 100.00, '00001', '2014-08-12 03:01:31', '', 0),
(100, 108, 100.00, '00001', '2014-08-12 03:01:40', '', 0),
(101, 109, 120.00, '00001', '2014-08-12 03:01:56', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_beds`
--

CREATE TABLE `room_beds` (
  `room_bed_id` int(11) NOT NULL,
  `room_master_id` int(11) NOT NULL,
  `bed_name` varchar(25) NOT NULL,
  `nStatus` varchar(15) NOT NULL,
  `patient_no` varchar(25) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_beds`
--

INSERT INTO `room_beds` (`room_bed_id`, `room_master_id`, `bed_name`, `nStatus`, `patient_no`, `InActive`) VALUES
(1, 7, 'RM-101-1', 'Vacant', '', 0),
(2, 7, 'RM-101-2', 'Vacant', '', 0),
(3, 7, 'RM-101-3', 'Vacant', '', 0),
(4, 7, 'RM-101-4', 'Vacant', '', 0),
(5, 7, 'RM-101-5', 'Vacant', '', 0),
(6, 7, 'RM-101-6', 'Vacant', '', 0),
(7, 7, 'RM-101-7', 'Vacant', '', 0),
(8, 7, 'RM-101-8', 'Vacant', '', 0),
(9, 7, 'RM-101-9', 'Vacant', '', 0),
(10, 7, 'RM-101-10', 'Vacant', '', 0),
(11, 8, 'RM-101-1', 'Vacant', '', 0),
(12, 8, 'RM-101-2', 'Vacant', '', 0),
(13, 8, 'RM-101-3', 'Vacant', '', 0),
(14, 8, 'RM-101-4', 'Vacant', '', 0),
(15, 8, 'RM-101-5', 'Vacant', '', 0),
(16, 8, 'RM-101-6', 'Vacant', '', 0),
(17, 8, 'RM-101-7', 'Vacant', '', 0),
(18, 8, 'RM-101-8', 'Vacant', '', 0),
(19, 8, 'RM-101-9', 'Vacant', '', 0),
(20, 8, 'RM-101-10', 'Vacant', '', 0),
(21, 9, 'RM-101-1', 'Vacant', '', 0),
(22, 9, 'RM-101-2', 'Vacant', '', 0),
(23, 9, 'RM-101-3', 'Vacant', '', 0),
(24, 9, 'RM-101-4', 'Vacant', '', 0),
(25, 9, 'RM-101-5', 'Vacant', '', 0),
(26, 9, 'RM-101-6', 'Vacant', '', 0),
(27, 9, 'RM-101-7', 'Vacant', '', 0),
(28, 9, 'RM-101-8', 'Vacant', '', 0),
(29, 9, 'RM-101-9', 'Vacant', '', 0),
(30, 9, 'RM-101-10', 'Vacant', '', 0),
(31, 10, 'RM-101-1', 'Vacant', '', 0),
(32, 10, 'RM-101-2', 'Vacant', '', 0),
(33, 10, 'RM-101-3', 'Vacant', '', 0),
(34, 10, 'RM-101-4', 'Vacant', '', 0),
(35, 10, 'RM-101-5', 'Vacant', '', 0),
(36, 10, 'RM-101-6', 'Vacant', '', 0),
(37, 10, 'RM-101-7', 'Vacant', '', 0),
(38, 10, 'RM-101-8', 'Vacant', '', 0),
(39, 10, 'RM-101-9', 'Vacant', '', 0),
(40, 10, 'RM-101-10', 'Vacant', '', 0),
(41, 11, 'RM-101-1', 'Vacant', '', 0),
(42, 11, 'RM-101-2', 'Vacant', '', 0),
(43, 11, 'RM-101-3', 'Vacant', '', 0),
(44, 11, 'RM-101-4', 'Vacant', '', 0),
(45, 11, 'RM-101-5', 'Vacant', '', 0),
(46, 11, 'RM-101-6', 'Vacant', '', 0),
(47, 11, 'RM-101-7', 'Vacant', '', 0),
(48, 11, 'RM-101-8', 'Vacant', '', 0),
(49, 11, 'RM-101-9', 'Vacant', '', 0),
(50, 11, 'RM-101-10', 'Vacant', '', 0),
(51, 28, 'RM-101-1', 'Vacant', '', 0),
(52, 28, 'RM-101-2', 'Vacant', '', 0),
(53, 28, 'RM-101-3', 'Vacant', '', 0),
(54, 28, 'RM-101-4', 'Vacant', '', 0),
(55, 28, 'RM-101-5', 'Vacant', '', 0),
(56, 28, 'RM-101-6', 'Vacant', '', 0),
(57, 28, 'RM-101-7', 'Vacant', '', 0),
(58, 28, 'RM-101-8', 'Vacant', '', 0),
(59, 28, 'RM-101-9', 'Vacant', '', 0),
(60, 28, 'RM-101-10', 'Vacant', '', 0),
(61, 28, 'RM-101-11', 'Vacant', '', 0),
(62, 28, 'RM-101-12', 'Vacant', '', 0),
(63, 28, 'RM-101-13', 'Vacant', '', 0),
(64, 28, 'RM-101-14', 'Vacant', '', 0),
(65, 28, 'RM-101-15', 'Vacant', '', 0),
(66, 28, 'RM-101-16', 'Vacant', '', 0),
(67, 28, 'RM-101-17', 'Vacant', '', 0),
(68, 28, 'RM-101-18', 'Vacant', '', 0),
(69, 28, 'RM-101-19', 'Vacant', '', 0),
(70, 28, 'RM-101-20', 'Vacant', '', 0),
(71, 28, 'RM-101-21', 'Vacant', '', 0),
(72, 28, 'RM-101-22', 'Vacant', '', 0),
(73, 28, 'RM-101-23', 'Vacant', '', 0),
(74, 28, 'RM-101-24', 'Vacant', '', 0),
(75, 28, 'RM-101-25', 'Vacant', '', 0),
(76, 28, 'RM-101-26', 'Vacant', '', 0),
(77, 28, 'RM-101-27', 'Vacant', '', 0),
(78, 28, 'RM-101-28', 'Vacant', '', 0),
(79, 28, 'RM-101-29', 'Vacant', '', 0),
(80, 28, 'RM-101-30', 'Vacant', '', 0),
(81, 7, 'RM-101-11', 'Vacant', '', 0),
(82, 7, 'RM-101-12', 'Vacant', '', 0),
(83, 7, 'RM-101-13', 'Vacant', '', 0),
(84, 7, 'RM-101-14', 'Vacant', '', 0),
(85, 7, 'RM-101-15', 'Vacant', '', 0),
(86, 7, 'RM-101-16', 'Vacant', '', 0),
(87, 7, 'RM-101-17', 'Vacant', '', 0),
(88, 7, 'RM-101-18', 'Vacant', '', 0),
(89, 7, 'RM-101-19', 'Vacant', '', 0),
(90, 7, 'RM-101-20', 'Vacant', '', 0),
(91, 7, 'RM-101-21', 'Vacant', '', 0),
(92, 7, 'RM-101-22', 'Vacant', '', 0),
(93, 7, 'RM-101-23', 'Vacant', '', 0),
(94, 7, 'RM-101-24', 'Vacant', '', 0),
(95, 7, 'RM-101-25', 'Vacant', '', 0),
(96, 7, 'RM-101-26', 'Vacant', '', 0),
(97, 7, 'RM-101-27', 'Vacant', '', 0),
(98, 7, 'RM-101-28', 'Vacant', '', 0),
(99, 7, 'RM-101-29', 'Vacant', '', 0),
(100, 7, 'RM-101-30', 'Vacant', '', 0),
(101, 8, 'RM-101-11', 'Vacant', '', 0),
(102, 8, 'RM-101-12', 'Vacant', '', 0),
(103, 8, 'RM-101-13', 'Vacant', '', 0),
(104, 8, 'RM-101-14', 'Vacant', '', 0),
(105, 8, 'RM-101-15', 'Vacant', '', 0),
(106, 8, 'RM-101-16', 'Vacant', '', 0),
(107, 8, 'RM-101-17', 'Vacant', '', 0),
(108, 8, 'RM-101-18', 'Vacant', '', 0),
(109, 8, 'RM-101-19', 'Vacant', '', 0),
(110, 8, 'RM-101-20', 'Vacant', '', 0),
(111, 8, 'RM-101-21', 'Vacant', '', 0),
(112, 8, 'RM-101-22', 'Vacant', '', 0),
(113, 8, 'RM-101-23', 'Vacant', '', 0),
(114, 8, 'RM-101-24', 'Vacant', '', 0),
(115, 8, 'RM-101-25', 'Vacant', '', 0),
(116, 8, 'RM-101-26', 'Vacant', '', 0),
(117, 8, 'RM-101-27', 'Vacant', '', 0),
(118, 8, 'RM-101-28', 'Vacant', '', 0),
(119, 8, 'RM-101-29', 'Vacant', '', 0),
(120, 8, 'RM-101-30', 'Vacant', '', 0),
(121, 9, 'RM-101-11', 'Vacant', '', 0),
(122, 9, 'RM-101-12', 'Vacant', '', 0),
(123, 9, 'RM-101-13', 'Vacant', '', 0),
(124, 9, 'RM-101-14', 'Vacant', '', 0),
(125, 9, 'RM-101-15', 'Vacant', '', 0),
(126, 9, 'RM-101-16', 'Vacant', '', 0),
(127, 9, 'RM-101-17', 'Vacant', '', 0),
(128, 9, 'RM-101-18', 'Vacant', '', 0),
(129, 9, 'RM-101-19', 'Vacant', '', 0),
(130, 9, 'RM-101-20', 'Vacant', '', 0),
(131, 9, 'RM-101-21', 'Vacant', '', 0),
(132, 9, 'RM-101-22', 'Vacant', '', 0),
(133, 9, 'RM-101-23', 'Vacant', '', 0),
(134, 9, 'RM-101-24', 'Vacant', '', 0),
(135, 9, 'RM-101-25', 'Vacant', '', 0),
(136, 9, 'RM-101-26', 'Vacant', '', 0),
(137, 9, 'RM-101-27', 'Vacant', '', 0),
(138, 9, 'RM-101-28', 'Vacant', '', 0),
(139, 9, 'RM-101-29', 'Vacant', '', 0),
(140, 9, 'RM-101-30', 'Vacant', '', 0),
(141, 10, 'RM-101-11', 'Vacant', '', 0),
(142, 10, 'RM-101-12', 'Vacant', '', 0),
(143, 10, 'RM-101-13', 'Vacant', '', 0),
(144, 10, 'RM-101-14', 'Vacant', '', 0),
(145, 10, 'RM-101-15', 'Vacant', '', 0),
(146, 10, 'RM-101-16', 'Vacant', '', 0),
(147, 10, 'RM-101-17', 'Vacant', '', 0),
(148, 10, 'RM-101-18', 'Vacant', '', 0),
(149, 10, 'RM-101-19', 'Vacant', '', 0),
(150, 10, 'RM-101-20', 'Vacant', '', 0),
(151, 10, 'RM-101-21', 'Vacant', '', 0),
(152, 10, 'RM-101-22', 'Vacant', '', 0),
(153, 10, 'RM-101-23', 'Vacant', '', 0),
(154, 10, 'RM-101-24', 'Vacant', '', 0),
(155, 10, 'RM-101-25', 'Vacant', '', 0),
(156, 10, 'RM-101-26', 'Vacant', '', 0),
(157, 10, 'RM-101-27', 'Vacant', '', 0),
(158, 10, 'RM-101-28', 'Vacant', '', 0),
(159, 10, 'RM-101-29', 'Vacant', '', 0),
(160, 10, 'RM-101-30', 'Vacant', '', 0),
(161, 11, 'RM-101-11', 'Vacant', '', 0),
(162, 11, 'RM-101-12', 'Vacant', '', 0),
(163, 11, 'RM-101-13', 'Vacant', '', 0),
(164, 11, 'RM-101-14', 'Vacant', '', 0),
(165, 11, 'RM-101-15', 'Vacant', '', 0),
(166, 11, 'RM-101-16', 'Vacant', '', 0),
(167, 11, 'RM-101-17', 'Vacant', '', 0),
(168, 11, 'RM-101-18', 'Vacant', '', 0),
(169, 11, 'RM-101-19', 'Vacant', '', 0),
(170, 11, 'RM-101-20', 'Vacant', '', 0),
(171, 11, 'RM-101-21', 'Vacant', '', 0),
(172, 11, 'RM-101-22', 'Vacant', '', 0),
(173, 11, 'RM-101-23', 'Vacant', '', 0),
(174, 11, 'RM-101-24', 'Vacant', '', 0),
(175, 11, 'RM-101-25', 'Vacant', '', 0),
(176, 11, 'RM-101-26', 'Vacant', '', 0),
(177, 11, 'RM-101-27', 'Vacant', '', 0),
(178, 11, 'RM-101-28', 'Vacant', '', 0),
(179, 11, 'RM-101-29', 'Vacant', '', 0),
(180, 11, 'RM-101-30', 'Vacant', '', 0),
(181, 29, 'RM-101-1', 'Vacant', '', 0),
(182, 29, 'RM-101-2', 'Vacant', '', 0),
(183, 29, 'RM-101-3', 'Vacant', '', 0),
(184, 29, 'RM-101-4', 'Vacant', '', 0),
(185, 29, 'RM-101-5', 'Vacant', '', 0),
(186, 29, 'RM-101-6', 'Vacant', '', 0),
(187, 29, 'RM-101-7', 'Vacant', '', 0),
(188, 29, 'RM-101-8', 'Vacant', '', 0),
(189, 29, 'RM-101-9', 'Vacant', '', 0),
(190, 29, 'RM-101-10', 'Vacant', '', 0),
(191, 29, 'RM-101-11', 'Vacant', '', 0),
(192, 29, 'RM-101-12', 'Vacant', '', 0),
(193, 29, 'RM-101-13', 'Vacant', '', 0),
(194, 29, 'RM-101-14', 'Vacant', '', 0),
(195, 29, 'RM-101-15', 'Vacant', '', 0),
(196, 29, 'RM-101-16', 'Vacant', '', 0),
(197, 29, 'RM-101-17', 'Vacant', '', 0),
(198, 29, 'RM-101-18', 'Vacant', '', 0),
(199, 29, 'RM-101-19', 'Vacant', '', 0),
(200, 29, 'RM-101-20', 'Vacant', '', 0),
(201, 29, 'RM-101-21', 'Vacant', '', 0),
(202, 29, 'RM-101-22', 'Vacant', '', 0),
(203, 29, 'RM-101-23', 'Vacant', '', 0),
(204, 29, 'RM-101-24', 'Vacant', '', 0),
(205, 29, 'RM-101-25', 'Vacant', '', 0),
(206, 29, 'RM-101-26', 'Vacant', '', 0),
(207, 29, 'RM-101-27', 'Vacant', '', 0),
(208, 29, 'RM-101-28', 'Vacant', '', 0),
(209, 29, 'RM-101-29', 'Vacant', '', 0),
(210, 29, 'RM-101-30', 'Vacant', '', 0),
(211, 30, 'RM-101-1', 'Vacant', '', 0),
(212, 30, 'RM-101-2', 'Vacant', '', 0),
(213, 30, 'RM-101-3', 'Vacant', '', 0),
(214, 30, 'RM-101-4', 'Vacant', '', 0),
(215, 30, 'RM-101-5', 'Vacant', '', 0),
(216, 30, 'RM-101-6', 'Vacant', '', 0),
(217, 30, 'RM-101-7', 'Vacant', '', 0),
(218, 30, 'RM-101-8', 'Vacant', '', 0),
(219, 30, 'RM-101-9', 'Vacant', '', 0),
(220, 30, 'RM-101-10', 'Vacant', '', 0),
(221, 30, 'RM-101-11', 'Vacant', '', 0),
(222, 30, 'RM-101-12', 'Vacant', '', 0),
(223, 30, 'RM-101-13', 'Vacant', '', 0),
(224, 30, 'RM-101-14', 'Vacant', '', 0),
(225, 30, 'RM-101-15', 'Vacant', '', 0),
(226, 30, 'RM-101-16', 'Vacant', '', 0),
(227, 30, 'RM-101-17', 'Vacant', '', 0),
(228, 30, 'RM-101-18', 'Vacant', '', 0),
(229, 30, 'RM-101-19', 'Vacant', '', 0),
(230, 30, 'RM-101-20', 'Vacant', '', 0),
(231, 30, 'RM-101-21', 'Vacant', '', 0),
(232, 30, 'RM-101-22', 'Vacant', '', 0),
(233, 30, 'RM-101-23', 'Vacant', '', 0),
(234, 30, 'RM-101-24', 'Vacant', '', 0),
(235, 30, 'RM-101-25', 'Vacant', '', 0),
(236, 30, 'RM-101-26', 'Vacant', '', 0),
(237, 30, 'RM-101-27', 'Vacant', '', 0),
(238, 30, 'RM-101-28', 'Vacant', '', 0),
(239, 30, 'RM-101-29', 'Vacant', '', 0),
(240, 30, 'RM-101-30', 'Vacant', '', 0),
(241, 32, 'RM-101-1', 'Vacant', '', 0),
(242, 32, 'RM-101-2', 'Vacant', '', 0),
(243, 32, 'RM-101-3', 'Vacant', '', 0),
(244, 32, 'RM-101-4', 'Vacant', '', 0),
(245, 32, 'RM-101-5', 'Vacant', '', 0),
(246, 32, 'RM-101-6', 'Vacant', '', 0),
(247, 32, 'RM-101-7', 'Vacant', '', 0),
(248, 32, 'RM-101-8', 'Vacant', '', 0),
(249, 32, 'RM-101-9', 'Vacant', '', 0),
(250, 32, 'RM-101-10', 'Vacant', '', 0),
(251, 32, 'RM-101-11', 'Vacant', '', 0),
(252, 32, 'RM-101-12', 'Vacant', '', 0),
(253, 32, 'RM-101-13', 'Vacant', '', 0),
(254, 32, 'RM-101-14', 'Vacant', '', 0),
(255, 32, 'RM-101-15', 'Vacant', '', 0),
(256, 32, 'RM-101-16', 'Vacant', '', 0),
(257, 32, 'RM-101-17', 'Vacant', '', 0),
(258, 32, 'RM-101-18', 'Vacant', '', 0),
(259, 32, 'RM-101-19', 'Vacant', '', 0),
(260, 32, 'RM-101-20', 'Vacant', '', 0),
(261, 32, 'RM-101-21', 'Vacant', '', 0),
(262, 32, 'RM-101-22', 'Vacant', '', 0),
(263, 32, 'RM-101-23', 'Vacant', '', 0),
(264, 32, 'RM-101-24', 'Vacant', '', 0),
(265, 32, 'RM-101-25', 'Vacant', '', 0),
(266, 32, 'RM-101-26', 'Vacant', '', 0),
(267, 32, 'RM-101-27', 'Vacant', '', 0),
(268, 32, 'RM-101-28', 'Vacant', '', 0),
(269, 32, 'RM-101-29', 'Vacant', '', 0),
(270, 32, 'RM-101-30', 'Vacant', '', 0),
(271, 33, 'RM-101-1', 'Vacant', '', 0),
(272, 33, 'RM-101-2', 'Vacant', '', 0),
(273, 33, 'RM-101-3', 'Vacant', '', 0),
(274, 33, 'RM-101-4', 'Vacant', '', 0),
(275, 33, 'RM-101-5', 'Vacant', '', 0),
(276, 33, 'RM-101-6', 'Vacant', '', 0),
(277, 33, 'RM-101-7', 'Vacant', '', 0),
(278, 33, 'RM-101-8', 'Vacant', '', 0),
(279, 33, 'RM-101-9', 'Vacant', '', 0),
(280, 33, 'RM-101-10', 'Vacant', '', 0),
(281, 33, 'RM-101-11', 'Vacant', '', 0),
(282, 33, 'RM-101-12', 'Vacant', '', 0),
(283, 33, 'RM-101-13', 'Vacant', '', 0),
(284, 33, 'RM-101-14', 'Vacant', '', 0),
(285, 33, 'RM-101-15', 'Vacant', '', 0),
(286, 33, 'RM-101-16', 'Vacant', '', 0),
(287, 33, 'RM-101-17', 'Vacant', '', 0),
(288, 33, 'RM-101-18', 'Vacant', '', 0),
(289, 33, 'RM-101-19', 'Vacant', '', 0),
(290, 33, 'RM-101-20', 'Vacant', '', 0),
(291, 33, 'RM-101-21', 'Vacant', '', 0),
(292, 33, 'RM-101-22', 'Vacant', '', 0),
(293, 33, 'RM-101-23', 'Vacant', '', 0),
(294, 33, 'RM-101-24', 'Vacant', '', 0),
(295, 33, 'RM-101-25', 'Vacant', '', 0),
(296, 33, 'RM-101-26', 'Vacant', '', 0),
(297, 33, 'RM-101-27', 'Vacant', '', 0),
(298, 33, 'RM-101-28', 'Vacant', '', 0),
(299, 33, 'RM-101-29', 'Vacant', '', 0),
(300, 33, 'RM-101-30', 'Vacant', '', 0),
(301, 15, 'RM-101-1', 'Vacant', '', 0),
(302, 15, 'RM-101-2', 'Vacant', '', 0),
(303, 15, 'RM-101-3', 'Vacant', '', 0),
(304, 15, 'RM-101-4', 'Vacant', '', 0),
(305, 15, 'RM-101-5', 'Vacant', '', 0),
(306, 15, 'RM-101-6', 'Vacant', '', 0),
(307, 15, 'RM-101-7', 'Vacant', '', 0),
(308, 15, 'RM-101-8', 'Vacant', '', 0),
(309, 15, 'RM-101-9', 'Vacant', '', 0),
(310, 15, 'RM-101-10', 'Vacant', '', 0),
(311, 15, 'RM-101-11', 'Vacant', '', 0),
(312, 15, 'RM-101-12', 'Vacant', '', 0),
(313, 15, 'RM-101-13', 'Vacant', '', 0),
(314, 15, 'RM-101-14', 'Vacant', '', 0),
(315, 15, 'RM-101-15', 'Vacant', '', 0),
(316, 15, 'RM-101-16', 'Vacant', '', 0),
(317, 15, 'RM-101-17', 'Vacant', '', 0),
(318, 15, 'RM-101-18', 'Vacant', '', 0),
(319, 15, 'RM-101-19', 'Vacant', '', 0),
(320, 15, 'RM-101-20', 'Vacant', '', 0),
(321, 15, 'RM-101-21', 'Vacant', '', 0),
(322, 15, 'RM-101-22', 'Vacant', '', 0),
(323, 15, 'RM-101-23', 'Vacant', '', 0),
(324, 15, 'RM-101-24', 'Vacant', '', 0),
(325, 15, 'RM-101-25', 'Vacant', '', 0),
(326, 15, 'RM-101-26', 'Vacant', '', 0),
(327, 15, 'RM-101-27', 'Vacant', '', 0),
(328, 15, 'RM-101-28', 'Vacant', '', 0),
(329, 15, 'RM-101-29', 'Vacant', '', 0),
(330, 15, 'RM-101-30', 'Vacant', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_desc` text NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`category_id`, `category_name`, `category_desc`, `InActive`) VALUES
(1, 'General Ward', 'General Ward', 0),
(3, 'Twin Sharing Room', 'Twin Sharing Room', 0),
(4, 'Semi Deluxe', 'Semi Deluxe', 0),
(5, 'Executive Deluxe', 'Executive Deluxe', 0),
(6, 'ICU', 'ICU', 0),
(7, 'Emergency Ward/ Day Care', 'Emergency Ward/ Day Care', 0),
(8, 'Operation Theater', 'For Surgery/Operation', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_master`
--

CREATE TABLE `room_master` (
  `room_master_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `floor` int(11) NOT NULL,
  `room_rates` float(11,2) NOT NULL,
  `InActive` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_master`
--

INSERT INTO `room_master` (`room_master_id`, `category_id`, `room_name`, `floor`, `room_rates`, `InActive`) VALUES
(9, 1, '103', 1, 150.00, 0),
(8, 1, '102', 1, 150.00, 0),
(7, 1, '101', 1, 150.00, 0),
(10, 1, '104', 1, 150.00, 0),
(11, 1, '105', 1, 150.00, 0),
(12, 1, '203', 2, 0.00, 0),
(13, 1, '202', 2, 0.00, 0),
(16, 1, '204', 2, 0.00, 0),
(15, 1, '201', 2, 150.00, 0),
(17, 1, '205', 2, 0.00, 0),
(18, 1, '301', 3, 0.00, 0),
(19, 1, '302', 3, 0.00, 0),
(20, 1, '303', 3, 0.00, 0),
(21, 1, '304', 3, 0.00, 0),
(22, 1, '305', 3, 0.00, 0),
(23, 1, '401', 4, 0.00, 0),
(24, 1, '402', 4, 0.00, 0),
(25, 1, '403', 4, 0.00, 0),
(26, 1, '404', 4, 0.00, 0),
(27, 1, '405', 4, 0.00, 0),
(28, 1, '106', 1, 150.00, 0),
(29, 1, '107', 1, 150.00, 0),
(30, 1, '108', 1, 150.00, 0),
(31, 1, '206', 2, 0.00, 0),
(32, 1, '109', 1, 120.00, 0),
(33, 1, '110', 1, 5.00, 0),
(34, 5, 'EXE101', 1, 1500.00, 0),
(35, 8, 'Operation Room 1', 1, 500.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `surgical_package`
--

CREATE TABLE `surgical_package` (
  `surgery_id` int(11) NOT NULL,
  `surgery_name` varchar(150) NOT NULL,
  `surgery_desc` text NOT NULL,
  `total_costs` float(11,2) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surgical_package`
--

INSERT INTO `surgical_package` (`surgery_id`, `surgery_name`, `surgery_desc`, `total_costs`, `InActive`) VALUES
(3, 'Flexible Cystoscopy', 'Flexible Cystoscopy', 9100.00, 0),
(4, 'Sample Surgery', 'Sample Surgery', 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `surgical_package_t`
--

CREATE TABLE `surgical_package_t` (
  `m_id` int(11) NOT NULL,
  `surgery_id` int(11) NOT NULL,
  `surgery_item` varchar(150) NOT NULL,
  `cDesc` text NOT NULL,
  `costs` float(11,2) NOT NULL,
  `InActive` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surgical_package_t`
--

INSERT INTO `surgical_package_t` (`m_id`, `surgery_id`, `surgery_item`, `cDesc`, `costs`, `InActive`, `date_created`) VALUES
(14, 3, '97', 'scar', 6000.00, 0, '2014-07-30 05:56:29'),
(13, 3, '76', 'Intra Articular Injections', 500.00, 0, '2014-07-30 05:56:12'),
(11, 3, '30', 'dsad', 100.00, 0, '2014-07-30 05:54:12'),
(12, 3, '94', 'Muscle Biopsy', 2500.00, 0, '2014-07-30 05:54:34'),
(10, 3, '12', 'Fdfsdf', 2200.00, 1, '2014-07-30 05:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `system_option`
--

CREATE TABLE `system_option` (
  `option_id` int(11) NOT NULL,
  `cCode` varchar(25) NOT NULL,
  `cValue` int(11) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_option`
--

INSERT INTO `system_option` (`option_id`, `cCode`, `cValue`, `InActive`) VALUES
(1, 'employee_no', 13, 0),
(2, 'patient_no', 39, 0),
(3, 'INPATIENTNO', 24, 0),
(4, 'OUTPATIENTNO', 18, 0),
(5, 'invoice_no', 40, 0),
(6, 'receipt_no', 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_parameters`
--

CREATE TABLE `system_parameters` (
  `param_id` bigint(11) NOT NULL,
  `cCode` varchar(50) NOT NULL,
  `cValue` varchar(50) NOT NULL,
  `cDesc` varchar(150) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_parameters`
--

INSERT INTO `system_parameters` (`param_id`, `cCode`, `cValue`, `cDesc`, `InActive`) VALUES
(1, 'gender', 'Male', '', 0),
(2, 'gender', 'Female', '', 0),
(3, 'civil_status', 'Single', '', 0),
(4, 'civil_status', 'Married', '', 0),
(5, 'civil_status', 'Legal Seperated', '', 0),
(6, 'civil_status', 'Divorced', '', 0),
(7, 'title_name', 'Mr.', '', 0),
(8, 'title_name', 'Ms.', '', 0),
(9, 'title_name', 'Mrs.', '', 0),
(10, 'title_name', 'Dr.', '', 0),
(11, 'religion', 'Roman Catholic', '', 0),
(12, 'religion', 'Muslim', '', 0),
(13, 'religion', 'Iglesia ni Cristo', '', 0),
(14, 'religion', 'Church of God', '', 0),
(15, 'religion', 'Evangelical', '', 0),
(16, 'religion', 'Born Again', '', 0),
(17, 'religion', 'Evangelical', '', 0),
(18, 'religion', 'El Shaddai', '', 0),
(19, 'religion', 'Church of the Nazarene', '', 0),
(20, 'religion', 'Seventh-Day Adventists', '', 0),
(21, 'religion', 'Chinese', '', 0),
(22, 'religion', 'Hindu', '', 0),
(23, 'religion', 'Judaism', '', 0),
(24, 'religion', 'Ang Dating Daan', '', 0),
(25, 'religion', 'Jehovah\'s Witnesses', '', 0),
(26, 'religion', 'Unitarian', '', 0),
(27, 'religion', 'Assemblies of God (Ilocos Norte)', '', 0),
(28, 'religion', 'Aglipayan ', '', 0),
(29, 'blood_type', 'O+', '', 0),
(30, 'blood_type', 'O-', '', 0),
(31, 'blood_type', 'A+', '', 0),
(32, 'blood_type', 'A-', '', 0),
(33, 'blood_type', 'B+', '', 0),
(34, 'blood_type', 'B-', '', 0),
(35, 'blood_type', 'AB+', '', 0),
(36, 'blood_type', 'AB-', '', 0),
(37, 'title_name', 'Dra.', 'Doctora', 0),
(45, 'gender', 'asd', '', 1),
(44, 'gender', 'x2', 'xxx2', 1),
(51, 'type_medicine', 'Generic', 'Generic', 0),
(52, 'type_medicine', 'Branded', 'Branded', 0),
(53, 'medicine_uom', 'Tablet', 'Tablet', 0),
(54, 'medicine_uom', 'Bottle', 'Bottle', 0),
(55, 'medicine_uom', 'Each', 'Each', 0),
(56, 'payment_type', 'CASH', 'CASH', 0),
(57, 'payment_type', 'CREDIT CARD', 'CREDIT CARD', 0),
(58, 'payment_type', 'INSURANCE COMPANY', 'INSURANCE COMPANY', 0),
(60, 'condition_upon_discharge', 'Improved', 'Improved', 0),
(61, 'condition_upon_discharge', 'Recovered', 'Recovered', 0),
(62, 'condition_upon_discharge', 'Expired', '', 0),
(63, 'condition_upon_discharge', 'Transferred', '', 0),
(64, 'reason_for_discount', 'Student', 'Student', 0),
(65, 'reason_for_discount', 'Senior Citizen', 'Senior Citizen', 0),
(66, 'reason_for_discount', 'Sample Reason here', 'Sample Reason here', 0),
(67, 'reason_for_discount', 'Person with Disablities', 'Person with Disablities', 0),
(68, 'reason_for_discount', 'Management Decision', 'Management Decision', 0),
(69, 'reason_for_discount', 'Below Poverty Line', 'Below Poverty Line', 0),
(70, 'reason_for_discount', 'Employee', 'Employee', 0),
(71, 'reason_for_discount', 'Member', 'Member', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `department` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `user_role` int(11) NOT NULL,
  `cType` varchar(25) NOT NULL,
  `title` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `age` int(2) NOT NULL,
  `street` varchar(50) NOT NULL,
  `subd_brgy` varchar(50) NOT NULL,
  `province` char(50) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `gender` int(1) NOT NULL,
  `civil_status` int(1) NOT NULL,
  `birthday` date NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `email_address` varchar(75) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `doctorIsIn` varchar(10) NOT NULL,
  `doctorLastIn` varchar(25) NOT NULL,
  `doctorLastOut` varchar(25) NOT NULL,
  `InActive` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `department`, `designation`, `user_role`, `cType`, `title`, `lastname`, `firstname`, `middlename`, `age`, `street`, `subd_brgy`, `province`, `phone_no`, `mobile_no`, `gender`, `civil_status`, `birthday`, `birthplace`, `email_address`, `username`, `password`, `picture`, `doctorIsIn`, `doctorLastIn`, `doctorLastOut`, `InActive`) VALUES
(5, '00002', 1, 1, 1, '', 7, 'Ramos', 'Mark', 'S', 38, '', '', '', '', '', 1, 4, '1978-03-16', 'Cavite', 'sert@serttech.com', 'ioioio', '101a6ec9f938885df0a44f20458d2eb4', '', '0', '', '', 0),
(11, '00008', 29, 5, 7, '', 8, 'Aasdo', 'Bedud', 'H.', 29, '', '', '', '', '', 2, 3, '1984-12-02', 'Cabuyao Laguna', 'tina@yahoo.com', 'nurse1', 'af9fcaae911aabd0917681d6905561ff', '', '0', '', '', 0),
(9, '00006', 2, 2, 3, '', 8, 'QWE', 'asD', 'D.', 20, '', '', '', '', '', 1, 3, '1994-06-14', '', 'maryjoypecio@yahoo.com', '00006', '7a77584182a904bb75558a6bc911dd6e', '', '0', '', '', 0),
(10, '00007', 5, 4, 5, '', 10, 'Gonzales', 'Jorge', 'L.', 60, '', '', '', '', '', 1, 4, '1954-05-19', '', 'admin@yahoo.com', 'doctor1', '45f678b147fdf275c35b60bac2360984', '', 'IN', '2015-11-17 08:08:05 AM', '2015-11-17 08:03:38 AM', 0),
(12, '00009', 2, 5, 7, '', 9, 'Sarino', 'Mary Joy', 'Samson', 25, '', '', '', '', '', 0, 0, '1990-05-09', '', 'maryjoy@yahoo.com', '00009', 'ff5df3fc5578f0ebf893269c16fe691a', '', '0', '', '', 0),
(13, '00010', 2, 1, 1, '', 7, 'Administrator', 'Admin', 'A.', 27, '', '', '', '', '', 1, 3, '1989-09-27', '', 'jasonsarino27@gmail.com', 'demo-hmsh', '8b42a1c9b8f9fde869f83c954b3d463b', '8446520.png', '0', '', '', 0),
(16, '00013', 2, 2, 3, '', 8, 'Danica', 'Bayes', 'P.', 42, '', '', '', '', '', 2, 4, '1974-05-30', '', 'receptionist@yahoo.com', 'receptionist1', '488e6ed76333594cfc50d3585a6e4916', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` int(11) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  `role_name` varchar(50) DEFAULT NULL,
  `role_description` text DEFAULT NULL,
  `InActive` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `module`, `role_name`, `role_description`, `InActive`) VALUES
(1, '0', 'Super Admin', 'Full Access of the entire system', 0),
(2, 'administrator', 'Administrator and CEO', 'Minimal supervision', 0),
(3, '0', 'Receptionist', 'Help Desk Officer', 0),
(5, 'doctor', 'Doctor', 'Doctor', 0),
(6, 'billing', 'Billing / Cashier', 'Billing / Cashier', 0),
(7, '0', 'Nurse Roles', 'Nurse Roles', 0),
(8, '0', 'hfhf', 'jgjg', 1),
(9, '0', 'IT DEPARTMENT', 'IT ADMIN', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles_pages`
--

CREATE TABLE `user_roles_pages` (
  `rollpages_id` bigint(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles_pages`
--

INSERT INTO `user_roles_pages` (`rollpages_id`, `role_id`, `page_id`) VALUES
(9259, 1, 34),
(9258, 1, 35),
(9257, 1, 33),
(9256, 1, 32),
(8892, 3, 50),
(4864, 2, 61),
(9255, 1, 38),
(9254, 1, 39),
(9253, 1, 37),
(9252, 1, 36),
(9251, 1, 54),
(9250, 1, 55),
(9249, 1, 53),
(9248, 1, 52),
(9247, 1, 3),
(9246, 1, 4),
(9245, 1, 2),
(9244, 1, 1),
(9243, 1, 114),
(9242, 1, 115),
(9241, 1, 113),
(9240, 1, 112),
(9239, 1, 46),
(9238, 1, 99),
(9237, 1, 47),
(9236, 1, 45),
(9235, 1, 44),
(9234, 1, 132),
(9233, 1, 88),
(9232, 1, 108),
(9231, 1, 98),
(9230, 1, 133),
(8891, 3, 91),
(8890, 3, 92),
(9229, 1, 110),
(9228, 1, 87),
(9227, 1, 109),
(9226, 1, 119),
(9225, 1, 50),
(8889, 3, 51),
(9224, 1, 91),
(9223, 1, 92),
(9222, 1, 51),
(9221, 1, 93),
(4863, 2, 60),
(4862, 2, 31),
(4861, 2, 28),
(4860, 2, 57),
(9220, 1, 94),
(9219, 1, 48),
(9218, 1, 49),
(9217, 1, 123),
(9216, 1, 124),
(9215, 1, 126),
(9214, 1, 122),
(9213, 1, 121),
(9212, 1, 62),
(9211, 1, 63),
(9210, 1, 61),
(9209, 1, 60),
(9208, 1, 97),
(9207, 1, 103),
(9206, 1, 100),
(9205, 1, 105),
(9204, 1, 106),
(9203, 1, 102),
(9202, 1, 120),
(9201, 1, 104),
(9200, 1, 101),
(9199, 1, 107),
(9198, 1, 128),
(9197, 1, 78),
(9196, 1, 79),
(9195, 1, 77),
(9194, 1, 76),
(9193, 1, 70),
(9192, 1, 71),
(9191, 1, 69),
(9190, 1, 68),
(9189, 1, 95),
(9188, 1, 96),
(9187, 1, 130),
(9186, 1, 82),
(9185, 1, 83),
(9184, 1, 81),
(9183, 1, 80),
(9182, 1, 89),
(9181, 1, 90),
(9180, 1, 129),
(9179, 1, 66),
(9178, 1, 67),
(9177, 1, 65),
(9176, 1, 64),
(9175, 1, 42),
(8888, 3, 93),
(8887, 3, 94),
(8886, 3, 48),
(8885, 3, 49),
(9174, 1, 43),
(4859, 2, 56),
(8880, 7, 102),
(8879, 7, 120),
(8878, 7, 104),
(8877, 7, 101),
(8876, 7, 107),
(9173, 1, 41),
(9172, 1, 40),
(9171, 1, 30),
(9170, 1, 31),
(9169, 1, 29),
(9168, 1, 28),
(9167, 1, 74),
(9166, 1, 75),
(9165, 1, 73),
(9164, 1, 72),
(9163, 1, 111),
(9162, 1, 116),
(9161, 1, 84),
(8875, 7, 128),
(9160, 1, 85),
(4858, 2, 125),
(4857, 2, 124),
(4869, 2, 4),
(4868, 2, 2),
(4867, 2, 1),
(4866, 2, 63),
(4865, 2, 62),
(4856, 2, 123),
(4855, 2, 122),
(4854, 2, 121),
(4853, 2, 118),
(4852, 2, 117),
(9159, 1, 58),
(9158, 1, 59),
(9157, 1, 57),
(9156, 1, 56),
(9155, 1, 127),
(9154, 1, 131),
(8881, 7, 106),
(8882, 7, 105),
(8883, 7, 100),
(8884, 7, 103),
(8934, 5, 89),
(8933, 5, 90),
(8932, 5, 129),
(9153, 1, 118),
(9152, 1, 117);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_group_name`
--
ALTER TABLE `bill_group_name`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `bill_particular`
--
ALTER TABLE `bill_particular`
  ADD PRIMARY KEY (`particular_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `declaredor`
--
ALTER TABLE `declaredor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diagnosis_id`);

--
-- Indexes for table `doctors_fee`
--
ALTER TABLE `doctors_fee`
  ADD PRIMARY KEY (`doctorfeeID`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`floor_id`);

--
-- Indexes for table `insurance_comp`
--
ALTER TABLE `insurance_comp`
  ADD PRIMARY KEY (`in_com_id`);

--
-- Indexes for table `iop_bed_side_procedure`
--
ALTER TABLE `iop_bed_side_procedure`
  ADD PRIMARY KEY (`bed_pro_id`);

--
-- Indexes for table `iop_billing`
--
ALTER TABLE `iop_billing`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `iop_billing_t`
--
ALTER TABLE `iop_billing_t`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iop_complaints`
--
ALTER TABLE `iop_complaints`
  ADD PRIMARY KEY (`iop_comp_id`);

--
-- Indexes for table `iop_diagnosis`
--
ALTER TABLE `iop_diagnosis`
  ADD PRIMARY KEY (`iop_diag_id`);

--
-- Indexes for table `iop_discharge_summary`
--
ALTER TABLE `iop_discharge_summary`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `iop_intake_record`
--
ALTER TABLE `iop_intake_record`
  ADD PRIMARY KEY (`intake_id`);

--
-- Indexes for table `iop_laboratory`
--
ALTER TABLE `iop_laboratory`
  ADD PRIMARY KEY (`io_lab_id`);

--
-- Indexes for table `iop_medication`
--
ALTER TABLE `iop_medication`
  ADD PRIMARY KEY (`iop_med_id`);

--
-- Indexes for table `iop_nurse_notes`
--
ALTER TABLE `iop_nurse_notes`
  ADD PRIMARY KEY (`nurse_notes_id`);

--
-- Indexes for table `iop_operation_theater`
--
ALTER TABLE `iop_operation_theater`
  ADD PRIMARY KEY (`operation_id`);

--
-- Indexes for table `iop_output_record`
--
ALTER TABLE `iop_output_record`
  ADD PRIMARY KEY (`output_id`);

--
-- Indexes for table `iop_progress_note`
--
ALTER TABLE `iop_progress_note`
  ADD PRIMARY KEY (`progress_id`);

--
-- Indexes for table `iop_receipt`
--
ALTER TABLE `iop_receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `iop_room_transfer`
--
ALTER TABLE `iop_room_transfer`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `iop_vital_parameters`
--
ALTER TABLE `iop_vital_parameters`
  ADD PRIMARY KEY (`vital_id`);

--
-- Indexes for table `logfile`
--
ALTER TABLE `logfile`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `medicine_drug_name`
--
ALTER TABLE `medicine_drug_name`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `patient_appointment`
--
ALTER TABLE `patient_appointment`
  ADD PRIMARY KEY (`appID`);

--
-- Indexes for table `patient_attachment`
--
ALTER TABLE `patient_attachment`
  ADD PRIMARY KEY (`attach_id`);

--
-- Indexes for table `patient_details_iop`
--
ALTER TABLE `patient_details_iop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_personal_info`
--
ALTER TABLE `patient_personal_info`
  ADD PRIMARY KEY (`reg_no`);

--
-- Indexes for table `price_history`
--
ALTER TABLE `price_history`
  ADD PRIMARY KEY (`price_history_id`);

--
-- Indexes for table `room_beds`
--
ALTER TABLE `room_beds`
  ADD PRIMARY KEY (`room_bed_id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `room_master`
--
ALTER TABLE `room_master`
  ADD PRIMARY KEY (`room_master_id`);

--
-- Indexes for table `surgical_package`
--
ALTER TABLE `surgical_package`
  ADD PRIMARY KEY (`surgery_id`);

--
-- Indexes for table `surgical_package_t`
--
ALTER TABLE `surgical_package_t`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `system_option`
--
ALTER TABLE `system_option`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `system_parameters`
--
ALTER TABLE `system_parameters`
  ADD PRIMARY KEY (`param_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_roles_pages`
--
ALTER TABLE `user_roles_pages`
  ADD PRIMARY KEY (`rollpages_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_group_name`
--
ALTER TABLE `bill_group_name`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `bill_particular`
--
ALTER TABLE `bill_particular`
  MODIFY `particular_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `declaredor`
--
ALTER TABLE `declaredor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `doctors_fee`
--
ALTER TABLE `doctors_fee`
  MODIFY `doctorfeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `floor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `insurance_comp`
--
ALTER TABLE `insurance_comp`
  MODIFY `in_com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iop_bed_side_procedure`
--
ALTER TABLE `iop_bed_side_procedure`
  MODIFY `bed_pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iop_billing`
--
ALTER TABLE `iop_billing`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iop_billing_t`
--
ALTER TABLE `iop_billing_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iop_complaints`
--
ALTER TABLE `iop_complaints`
  MODIFY `iop_comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iop_diagnosis`
--
ALTER TABLE `iop_diagnosis`
  MODIFY `iop_diag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iop_discharge_summary`
--
ALTER TABLE `iop_discharge_summary`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iop_intake_record`
--
ALTER TABLE `iop_intake_record`
  MODIFY `intake_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iop_laboratory`
--
ALTER TABLE `iop_laboratory`
  MODIFY `io_lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iop_medication`
--
ALTER TABLE `iop_medication`
  MODIFY `iop_med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iop_nurse_notes`
--
ALTER TABLE `iop_nurse_notes`
  MODIFY `nurse_notes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iop_operation_theater`
--
ALTER TABLE `iop_operation_theater`
  MODIFY `operation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iop_output_record`
--
ALTER TABLE `iop_output_record`
  MODIFY `output_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iop_progress_note`
--
ALTER TABLE `iop_progress_note`
  MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iop_receipt`
--
ALTER TABLE `iop_receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iop_room_transfer`
--
ALTER TABLE `iop_room_transfer`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iop_vital_parameters`
--
ALTER TABLE `iop_vital_parameters`
  MODIFY `vital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logfile`
--
ALTER TABLE `logfile`
  MODIFY `logid` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `medicine_drug_name`
--
ALTER TABLE `medicine_drug_name`
  MODIFY `drug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `patient_appointment`
--
ALTER TABLE `patient_appointment`
  MODIFY `appID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_attachment`
--
ALTER TABLE `patient_attachment`
  MODIFY `attach_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_details_iop`
--
ALTER TABLE `patient_details_iop`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_personal_info`
--
ALTER TABLE `patient_personal_info`
  MODIFY `reg_no` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `price_history`
--
ALTER TABLE `price_history`
  MODIFY `price_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `room_beds`
--
ALTER TABLE `room_beds`
  MODIFY `room_bed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room_master`
--
ALTER TABLE `room_master`
  MODIFY `room_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `surgical_package`
--
ALTER TABLE `surgical_package`
  MODIFY `surgery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surgical_package_t`
--
ALTER TABLE `surgical_package_t`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `system_option`
--
ALTER TABLE `system_option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_parameters`
--
ALTER TABLE `system_parameters`
  MODIFY `param_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_roles_pages`
--
ALTER TABLE `user_roles_pages`
  MODIFY `rollpages_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9260;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
