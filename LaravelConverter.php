<?php
	class Laravelconverter
	{
		public function __construct()
		{

		}
		public function locadTable($table): array
		{
			$sql = 'describe '. $table;
			$query = queryDb($sql);
			$data = $query->fetch(PDO::FETCH_ASSOC);
			print_r($data);
		}
	}

?>