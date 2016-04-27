<?php
include(dirname(__FILE__).'/DBInterface.php');
/*
 *  Class controls the solution table 
 */
class Solution extends DBInterface {

    public function __construct() {}
    
    /* 
     * inserts a new row into the Solution table documenting a new run value
     */ 
    public function insertSolution($problem_id, $test_value, $test_answer, $total_runs) {
        $sql = "INSERT INTO solution (problem_id, test_value, test_answer, total_runs) VALUES ('$problem_id', '$test_value', '$test_answer', '$total_runs')";
        $this->dbUpdateOrInsert($sql);
    }

    /* 
     * retrieves a solution based on the problem id and test value
     */ 
    public function getSolutionByProblemIdAndTestValue($problem_id, $test_value) {
        // check id and value exist
        $sql = "SELECT problem_id, test_value, total_runs FROM solution WHERE problem_id = '$problem_id' AND test_value = '$test_value'";
        $result = $this->dbQuery($sql);
        
        return $result;
    }
    
    /* 
     * increments a solution rows total runs by 1, based on problem id and test value
     */ 
    public function updateSolutionTotalRuns($problem_id, $test_value, $total_runs) {
        $total_runs += 1;
        $sql = "UPDATE solution SET total_runs = '$total_runs' WHERE problem_id = '$problem_id' AND test_value = '$test_value'";
        $this->dbUpdateOrInsert($sql);
        return $total_runs;
    }
    
    /*
     * Checks if solution exists if not then Inserts, else updates total_runs. 
     */
    public function recordSolution($problem_id, $test_value, $test_answer) {
        $record = $this->getSolutionByProblemIdAndTestValue($problem_id, $test_value);
        $total_runs = $record['0']['total_runs'];

        if (empty($record)) {
            $total_runs = 1;
            $this->insertSolution($problem_id, $test_value, $test_answer, $total_runs);
        } else {
            $total_runs = $this->updateSolutionTotalRuns($problem_id, $test_value, $total_runs);
        }
        return $total_runs;
    }
}

?>

