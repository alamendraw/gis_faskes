<?php


class Mpdf { 

	function mpdf_vertical($content)
	{
		$this->mpdf = new \Mpdf\Mpdf();
		$this->mpdf->shrink_tables_to_fit = 1;
		$this->mpdf->AddPageByArray(array(
			'format' => 'A4',
			'orientation' => 'P',
			'mgl' => '25',
			'mgr' => '25',
			'mgt' => '20',
			'mgb' => '50',
			'mgh' => '10',
			'mgf' => '10',
		));
		$this->mpdf->WriteHTML($content);
		$this->mpdf->Output();
		return $this->mpdf;
	}

	function mpdf_horizontal($content)
	{
		$this->mpdf = new \Mpdf\Mpdf();
		$this->mpdf->shrink_tables_to_fit = 1;
		$this->mpdf->AddPageByArray(array(
			'format' => 'A4',
			'orientation' => 'H',
			'mgl' => '25',
			'mgr' => '25',
			'mgt' => '20',
			'mgb' => '50',
			'mgh' => '10',
			'mgf' => '10',
		));
		$this->mpdf->WriteHTML($content);
		$this->mpdf->Output();
		return $this->mpdf;
	}
 
}