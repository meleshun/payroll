<?php
class Model_Payroll extends Model {

	public function getData() {
		$result = $this->db->query("SELECT * FROM payroll");

		$data = array();
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	public function setData($defaultWorker) {
		foreach ($defaultWorker as $worker) {
			$this->db->query("INSERT INTO payroll VALUES('". $worker['name'] ."', '". $worker['department'] ."', 0, 0);");
		}
	}

	public function removeData() {
		$this->db->query("DROP TABLE payroll");
	}

	public function saveData($data, $defaultWorker) {
		$this->db->query("truncate payroll");

		foreach ($defaultWorker as $key => $worker) {
			
			$amount = $data['amount'][$key];
			$salary = $data['salary'][$key];		

			$this->db->query("INSERT INTO payroll VALUES('". $worker['name'] ."', '". $worker['department'] ."', $amount, $salary);");
		}
	}
	
}