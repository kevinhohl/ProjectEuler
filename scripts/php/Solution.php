<?php
include(dirname(__FILE__).'/DBInterface.php');
/*
 *  Class controls the solution table 
 */
class Solution extends DBInterface {

    public function __construct() {}
    
    public function insertSolution($problem_id, $test_value, $test_answer) {
        $sql = "INSERT INTO solution (problem_id, test_value, test_answer, total_runs) VALUES ('$problem_id', '$test_value', '$test_answer', '1')";
        $this->dbUpdateOrInsert($sql);
    }
    
    public function getSolutionByProblemIdAndTestValue($problem_id, $test_value) {
        // check id and value exist
        $sql = "SELECT problem_id, test_value, total_runs FROM solution WHERE problem_id = '$problem_id' AND test_value = '$test_value'";
        $result = $this->dbQuery($sql);
        
        return $result;
    }

    public function updateSolutionTotalRuns($problem_id, $test_value, $total_runs) {
        $total_runs += 1;
        $sql = "UPDATE solution SET total_runs = '$total_runs' WHERE problem_id = '$problem_id' AND test_value = '$test_value'";
        $this->dbUpdateOrInsert($sql);
    }
    
    /*
     * Checks if test_problem exists if not then Inserts, else Updates total_runs
     */
    public function recordSolution($problem_id, $test_value, $test_answer) {
        $record = $this->getSolutionByProblemIdAndTestValue($problem_id, $test_value);

        if (empty($record)) {
            $this->insertSolution($problem_id, $test_value, $test_answer);
        } else {
            $total_runs = $record['0']['total_runs'];
            $this->updateSolutionTotalRuns($problem_id, $test_value, $total_runs);
        }
    }
}

?>

