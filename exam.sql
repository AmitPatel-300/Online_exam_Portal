-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2020 at 06:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(2, 'amit123@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `online_exam`
--

CREATE TABLE `online_exam` (
  `online_exam_id` int(255) NOT NULL,
  `online_exam_title` varchar(255) NOT NULL,
  `online_exam_datetime` datetime(6) NOT NULL,
  `total_question` int(100) NOT NULL,
  `marks_per_right_ans` varchar(100) NOT NULL,
  `marks_per_wrong_ans` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_exam`
--

INSERT INTO `online_exam` (`online_exam_id`, `online_exam_title`, `online_exam_datetime`, `total_question`, `marks_per_right_ans`, `marks_per_wrong_ans`) VALUES
(2, 'PHP test 1', '2020-10-27 13:32:41.000000', 10, '2', '1'),
(5, 'C programming test 1', '2020-10-29 18:12:17.000000', 10, '1', '1'),
(6, 'Java Programming test 1', '2020-10-29 18:32:07.000000', 10, '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ques_id` int(255) NOT NULL,
  `online_exam_id` int(255) NOT NULL,
  `ques_title` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `ansoption` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ques_id`, `online_exam_id`, `ques_title`, `option1`, `option2`, `option3`, `option4`, `ansoption`) VALUES
(11, 2, 'What does PHP stand for ?', 'Preprocessed Hypertext Page', 'Hypertext Markup Language', ' PHP: Hypertext Preprocessor', 'Hypertext Transfer protocol', 3),
(12, 2, 'What will be the value of $var ?', '0', '0.5', '1', '2', 2),
(13, 2, 'Which of the following is NOT a magic predefined constant?', ' __LINE__', ' __FILE__', '__DATE__', '__CLASS__', 3),
(17, 2, 'How do you write \"Hello World\" in PHP', 'document.write', 'hello world', 'print', 'echo \"Hello world\"', 4),
(18, 2, 'All variables in PHP start with which symbol?', '!', '&', '$', '@', 3),
(19, 2, 'What is the correct way to end a PHP statement?', 'new line', ';', '.', ',', 2),
(20, 2, 'The PHP syntax is most similar to:', 'VB Srcipt', 'perl and c', 'javascript', 'java', 1),
(21, 2, 'How do you get information from a form that is submitted using the \"get\" method?', '$_GET', 'Request.form', 'Request.queryString', 'Post', 1),
(22, 2, 'When using the POST method, variables are displayed in the URL:', 'true', 'false ', 'error', 'undef', 2),
(31, 2, 'What is the correct way to add 1 to the $count variable?', '++count', '$count++', '$count=+1', '$count+1', 3),
(32, 5, 'C language is ?', 'high level language', 'low level language', 'middle level language', 'assembly language', 2),
(33, 5, 'By default a real number is treated as a ?', 'float', 'double', 'long double', 'far double', 2),
(34, 5, ' Is the following statement a declaration or definition? extern int i;', 'Declaration', 'Definition', 'Function', 'Error', 1),
(35, 5, 'When we mention the prototype of a function?', 'Defining', 'Declaring', 'Prototyping', 'Calling', 2),
(36, 5, 'Which of the following is the correct usage of conditional operators used in C?', 'a>b ? c=30 : c=40;', 'a>b ? c=30;', 'max = a>b ? a>c?a:c:b>c?b:c', 'return (a>b)?(a:b)', 3),
(37, 5, 'Which of the following are unary operators in C? 1.!   2.sizeof  3.	~  4.	&&', '1, 2', '1, 3', '2, 4', '1, 2, 3', 4),
(38, 5, ' The maximum combined length of the command-line arguments including the spaces between adjacent arguments is', '128 characters', '256 characters', '67 characters', 'It may vary from one operating system to another', 4),
(39, 5, 'What is (void*)0?', 'Representation of NULL pointer', 'Representation of void pointer', 'Error', 'None of above', 1),
(40, 5, 'How many bytes are occupied by near, far and huge pointers (DOS)?', 'near=2 far=4 huge=4', 'near=4 far=8 huge=8', 'near=2 far=4 huge=8', 'near=4 far=4 huge=8', 1),
(41, 5, 'Which of the following cannot be checked in a switch-case statement?', 'Character', 'Integer', 'Float', 'enum', 3),
(42, 6, 'Which is a reserved word in the Java programming language?', 'method', 'native', 'subclasses', 'reference', 2),
(43, 6, 'Which is a valid keyword in java?', 'interface', 'string', 'Float', 'unsigned', 1),
(44, 6, 'Which of the following would compile without error?', 'int a = Math.abs(-5);', 'int b = Math.abs(5.0);', 'int c = Math.abs(5.5F);', 'int d = Math.abs(5L);', 1),
(45, 6, 'What is the name of the method used to start a thread execution?', 'init();', 'start();', 'run();', 'resume();', 2),
(46, 6, 'Which method must be defined by a class implementing the java.lang.Runnable interface?', 'void run()', 'public void run()', 'public void start()', 'void run(int priority)', 2),
(47, 6, 'Which will contain the body of the thread?', 'run();', 'start();', 'stop();', 'main();', 1),
(48, 6, 'Which of the following is/are advantages of packages?', 'Packages avoid name clashes', 'Classes, even though they are visible outside their package, can have fields visible to packages only', 'We can have hidden classes that are used by the packages, but not visible outside.', 'All of the above', 4),
(49, 6, 'Which one of the following is correct?', 'Java applets can not be written in any programming language', 'An applet is not a small program', 'An applet can be run on its own', 'Applets are embedded in another applications', 4),
(50, 6, 'What is a correct syntax to output \"Hello World\" in Java?', 'console.write(\"Hello world\")', 'echo(\"Hello world\")', 'print(\"Hello world\")', 'System.out.println(\"Hello world\")', 4),
(51, 6, 'Java is short for \"JavaScript\".', 'True', 'False', '0', '2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `total_marks` varchar(255) NOT NULL,
  `your_marks` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `session_id`, `exam_name`, `user_email`, `total_marks`, `your_marks`, `status`) VALUES
(3, '5f9aaf6e871ef', 'PHP test 1', 'kk@gmail.com', '20', '8', 'fail'),
(4, '5f9ac118a19bd', 'Java Programming test 1', 'kk@gmail.com', '20', '11', 'Pass'),
(5, '5f9b9d0c8d53e', 'PHP test 1', 'pankaj123@gmail.com', '20', '11', 'Pass'),
(6, '5f9b9f3fc6eb9', 'C programming test 1', 'rr12@gmail.com', '10', '2', 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `dob`, `mobile_no`, `address`) VALUES
(10, 'Amit', 'kk@gmail.com', '123', '2020-10-06', '2222222222', 'hh'),
(14, 'Pankaj', 'pankaj123@gmail.com', '456', '2020-10-13', '7856223555', 'Lucnknow'),
(15, 'Rahul', 'rr12@gmail.com', '666', '2020-10-19', '7785623255', 'Kanpur'),
(26, 'Sumit', 'shuklasumit123@gmail.com', '9999', '2020-10-09', '7855555555', 'kkk'),
(30, 'Sumit Pandey', 'sumit12@gmail.com', '12345', '2020-11-05', '8960428759', 'lucknow');

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

CREATE TABLE `user_answer` (
  `user_id` int(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `online_exam_id` int(255) NOT NULL,
  `ques_id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_ans` int(10) NOT NULL,
  `user_ans` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_answer`
--

INSERT INTO `user_answer` (`user_id`, `session_id`, `online_exam_id`, `ques_id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_ans`, `user_ans`) VALUES
(79, '5f9aaf6e871ef', 2, 11, 'What does PHP stand for ?', 'Preprocessed Hypertext Page', 'Hypertext Markup Language', ' PHP: Hypertext Preprocessor', 'Hypertext Transfer protocol', 3, 3),
(80, '5f9aaf6e871ef', 2, 12, 'What will be the value of $var ?', '0', '0.5', '1', '2', 2, 1),
(81, '5f9aaf6e871ef', 2, 13, 'Which of the following is NOT a magic predefined constant?', ' __LINE__', ' __FILE__', '__DATE__', '__CLASS__', 3, 1),
(82, '5f9aaf6e871ef', 2, 17, 'How do you write ', 'document.write', 'hello world', 'print', 'echo ', 4, 4),
(83, '5f9aaf6e871ef', 2, 18, 'All variables in PHP start with which symbol?', '!', '&', '$', '@', 3, 3),
(84, '5f9aaf6e871ef', 2, 19, 'What is the correct way to end a PHP statement?', 'new line', ';', '.', ',', 2, 2),
(85, '5f9aaf6e871ef', 2, 20, 'The PHP syntax is most similar to:', 'VB Srcipt', 'perl and c', 'javascript', 'java', 1, 2),
(86, '5f9aaf6e871ef', 2, 21, 'How do you get information from a form that is submitted using the ', '$_GET', 'Request.form', 'Request.queryString', 'Post', 1, 1),
(87, '5f9aaf6e871ef', 2, 22, 'When using the POST method, variables are displayed in the URL:', 'true', 'false ', 'error', 'undef', 2, 2),
(88, '5f9aaf6e871ef', 2, 31, 'What is the correct way to add 1 to the $count variable?', '++count', '$count++', '$count=+1', '$count+1', 2, 1),
(91, '5f9ac118a19bd', 6, 42, 'Which is a reserved word in the Java programming language?', 'method', 'native', 'subclasses', 'reference', 2, 2),
(92, '5f9ac118a19bd', 6, 43, 'Which is a valid keyword in java?', 'interface', 'string', 'Float', 'unsigned', 1, 1),
(93, '5f9ac118a19bd', 6, 44, 'Which of the following would compile without error?', 'int a = Math.abs(-5);', 'int b = Math.abs(5.0);', 'int c = Math.abs(5.5F);', 'int d = Math.abs(5L);', 1, 1),
(94, '5f9ac118a19bd', 6, 45, 'What is the name of the method used to start a thread execution?', 'init();', 'start();', 'run();', 'resume();', 2, 1),
(95, '5f9ac118a19bd', 6, 46, 'Which method must be defined by a class implementing the java.lang.Runnable interface?', 'void run()', 'public void run()', 'public void start()', 'void run(int priority)', 2, 1),
(96, '5f9ac118a19bd', 6, 47, 'Which will contain the body of the thread?', 'run();', 'start();', 'stop();', 'main();', 1, 1),
(97, '5f9ac118a19bd', 6, 48, 'Which of the following is/are advantages of packages?', 'Packages avoid name clashes', 'Classes, even though they are visible outside their package, can have fields visible to packages only', 'We can have hidden classes that are used by the packages, but not visible outside.', 'All of the above', 4, 4),
(98, '5f9ac118a19bd', 6, 49, 'Which one of the following is correct?', 'Java applets can not be written in any programming language', 'An applet is not a small program', 'An applet can be run on its own', 'Applets are embedded in another applications', 4, 4),
(99, '5f9ac118a19bd', 6, 50, 'What is a correct syntax to output ', 'console.write(', 'echo(', 'print(', 'System.out.println(', 4, 4),
(100, '5f9ac118a19bd', 6, 51, 'Java is short for ', 'True', 'False', '0', '2', 2, 4),
(102, '5f9b98785b223', 2, 11, 'What does PHP stand for ?', 'Preprocessed Hypertext Page', 'Hypertext Markup Language', ' PHP: Hypertext Preprocessor', 'Hypertext Transfer protocol', 3, 1),
(103, '5f9b9d0c8d53e', 2, 11, 'What does PHP stand for ?', 'Preprocessed Hypertext Page', 'Hypertext Markup Language', ' PHP: Hypertext Preprocessor', 'Hypertext Transfer protocol', 3, 3),
(104, '5f9b9d0c8d53e', 2, 12, 'What will be the value of $var ?', '0', '0.5', '1', '2', 2, 1),
(105, '5f9b9d0c8d53e', 2, 13, 'Which of the following is NOT a magic predefined constant?', ' __LINE__', ' __FILE__', '__DATE__', '__CLASS__', 3, 1),
(106, '5f9b9d0c8d53e', 2, 17, 'How do you write ', 'document.write', 'hello world', 'print', 'echo ', 4, 4),
(107, '5f9b9d0c8d53e', 2, 18, 'All variables in PHP start with which symbol?', '!', '&', '$', '@', 3, 3),
(108, '5f9b9d0c8d53e', 2, 19, 'What is the correct way to end a PHP statement?', 'new line', ';', '.', ',', 2, 2),
(110, '5f9b9d0c8d53e', 2, 20, 'The PHP syntax is most similar to:', 'VB Srcipt', 'perl and c', 'javascript', 'java', 1, 2),
(111, '5f9b9d0c8d53e', 2, 21, 'How do you get information from a form that is submitted using the ', '$_GET', 'Request.form', 'Request.queryString', 'Post', 1, 1),
(112, '5f9b9d0c8d53e', 2, 22, 'When using the POST method, variables are displayed in the URL:', 'true', 'false ', 'error', 'undef', 2, 2),
(113, '5f9b9d0c8d53e', 2, 31, 'What is the correct way to add 1 to the $count variable?', '++count', '$count++', '$count=+1', '$count+1', 3, 3),
(114, '5f9b9f3fc6eb9', 5, 32, 'C language is ?', 'high level language', 'low level language', 'middle level language', 'assembly language', 2, 2),
(116, '5f9b9f3fc6eb9', 5, 33, 'By default a real number is treated as a ?', 'float', 'double', 'long double', 'far double', 2, 2),
(117, '5f9b9f3fc6eb9', 5, 34, ' Is the following statement a declaration or definition? extern int i;', 'Declaration', 'Definition', 'Function', 'Error', 1, 1),
(118, '5f9b9f3fc6eb9', 5, 35, 'When we mention the prototype of a function?', 'Defining', 'Declaring', 'Prototyping', 'Calling', 2, 3),
(119, '5f9b9f3fc6eb9', 5, 36, 'Which of the following is the correct usage of conditional operators used in C?', 'a>b ? c=30 : c=40;', 'a>b ? c=30;', 'max = a>b ? a>c?a:c:b>c?b:c', 'return (a>b)?(a:b)', 3, 0),
(120, '5f9b9f3fc6eb9', 5, 37, 'Which of the following are unary operators in C? 1.!   2.sizeof  3.	~  4.	&&', '1, 2', '1, 3', '2, 4', '1, 2, 3', 4, 4),
(121, '5f9b9f3fc6eb9', 5, 38, ' The maximum combined length of the command-line arguments including the spaces between adjacent arguments is', '128 characters', '256 characters', '67 characters', 'It may vary from one operating system to another', 4, 4),
(122, '5f9b9f3fc6eb9', 5, 39, 'What is (void*)0?', 'Representation of NULL pointer', 'Representation of void pointer', 'Error', 'None of above', 1, 2),
(123, '5f9b9f3fc6eb9', 5, 40, 'How many bytes are occupied by near, far and huge pointers (DOS)?', 'near=2 far=4 huge=4', 'near=4 far=8 huge=8', 'near=2 far=4 huge=8', 'near=4 far=4 huge=8', 1, 1),
(124, '5f9b9f3fc6eb9', 5, 41, 'Which of the following cannot be checked in a switch-case statement?', 'Character', 'Integer', 'Float', 'enum', 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `online_exam`
--
ALTER TABLE `online_exam`
  ADD PRIMARY KEY (`online_exam_id`),
  ADD UNIQUE KEY `online_exam_title` (`online_exam_title`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ques_id`),
  ADD KEY `question_ibfk_1` (`online_exam_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_answer`
--
ALTER TABLE `user_answer`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `online_exam`
--
ALTER TABLE `online_exam`
  MODIFY `online_exam_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ques_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_answer`
--
ALTER TABLE `user_answer`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`online_exam_id`) REFERENCES `online_exam` (`online_exam_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
