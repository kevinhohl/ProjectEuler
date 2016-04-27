<?php
/*
 * PHP script to interact with the Solution class and record the solution statistics 
 * USAGE: called by AJAX
 */
include(dirname(__FILE__)."/Solution.php");
session_start();

if (!isset($_SESSION['Solution'])){
   $_SESSION['Solution'] = new Solution();
}
$class = $_SESSION['Solution']; 

$problem_id  = $_POST['problem_id'];
$test_value  = $_POST['test_value'];
$test_answer = $_POST['test_answer'];

// Record the Test Problem
if (!empty($problem_id) && !empty($test_value) && !empty($test_answer)) {
    $total_runs = $class->recordSolution($problem_id, $test_value, $test_answer);
}

echo json_encode($total_runs);
session_destroy();
?>