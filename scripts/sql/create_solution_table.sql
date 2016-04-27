CREATE TABLE `solution` (
 `solution_id` int(19) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
 `problem_id` varchar(10) NOT NULL COMMENT 'problem id',
 `test_value` varchar(100) NOT NULL COMMENT 'value tested',
 `test_answer` varchar(100) NOT NULL COMMENT 'calculated answer',
 `total_runs` int(19) NOT NULL COMMENT 'total times value was ran',
 PRIMARY KEY (`solution_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='Solution Statistics';