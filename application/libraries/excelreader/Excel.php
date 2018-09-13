<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel
{
	public function __construct()
	{
		require_once "Classes/PHPExcel/IOFactory.php";
		require_once "Classes/PHPExcel/Reader/Excel2007.php";
	}

	public function importProductsXLS($file)
	{
		try
			{
				$objReader = PHPExcel_IOFactory::load($file);
				$objReader->setActiveSheetIndex(0);
				$rows=$objReader->setActiveSheetIndex(0)->getHighestRow();
				$objWorksheet=$objReader->getActiveSheet();
				$highestColumn = $objReader->setActiveSheetIndex(0)->getHighestColumn();
				echo "Número de filas ".$rows."<br/>";
				$excelImages=$objWorksheet->getDrawingCollection();
				$withImages=false;
				if(count($excelImages)>0)
				{
					echo "Archivo con imágenes<br/>";
					if(count($excelImages)==$rows-1)
					{	
						$withImages=true;
						echo "Imágenes coinciden con el número de filas<br/>dirigirse a readExcel/images/ para verlas<br/>";
					} 
					else
					{
						echo "Número de Imágenes no coincide con el número de registros<br/>";
					}
				}
				else
				{
					echo "Archivo no contiene imágenes<br/>";
				}

				if($highestColumn!='H')
				{
					echo "Formato inválido";
				}
				else
				{
					for($i=2;$i<=$rows;$i++)
					{
						$ref=$objReader->getActiveSheet()->getCell("A".$i)->getCalculatedValue();
						$modelo=$objReader->getActiveSheet()->getCell("B".$i)->getCalculatedValue();
						$desc=$objReader->getActiveSheet()->getCell("C".$i)->getCalculatedValue();
						$color=$objReader->getActiveSheet()->getCell("D".$i)->getCalculatedValue();
						$cat=$objReader->getActiveSheet()->getCell("E".$i)->getCalculatedValue();
						$tipo=$objReader->getActiveSheet()->getCell("F".$i)->getCalculatedValue();
						$price=$objReader->getActiveSheet()->getCell("G".$i)->getCalculatedValue();
						if($withImages)
						{

							if ($excelImages[$i-2] instanceof PHPExcel_Worksheet_MemoryDrawing)
							{
						        ob_start();
						        call_user_func(
						            $excelImages[$i-2]->getRenderingFunction(),
						            $excelImages[$i-2]->getImageResource()
						        );
						        /*Obtenemos bytes*/
						        $imageContents = ob_get_contents();
						        ob_end_clean();
						        switch ($excelImages[$i-2]->getMimeType()) {
						            case PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_PNG :
						                    $extension = 'png'; break;
						            case PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_GIF:
						                    $extension = 'gif'; break;
						            case PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_JPEG :
						                    $extension = 'jpg'; break;
						        }
						    }
						    else
						    {
						    	$zipReader = fopen($excelImages[$i-2]->getPath(),'r');
								$imageContents = "";
							    while(!feof($zipReader))
							    {
							    	/*Obtenemos bytes*/
							    	$imageContents .= fread($zipReader,1024);
							    }
							    fclose($zipReader);
							    $extension = $excelImages[$i-2]->getExtension();
						    }
						    $myFileName = $_SERVER["DOCUMENT_ROOT"]."/biosum/assets/images/products/".$ref.".".$extension;
							file_put_contents($myFileName,$imageContents);
						}
						$url_image=base_url()."assets/images/products/".$ref.".".$extension;
						//AQUI DEBE IR GUARDANDOSE LA SENTENCIA INSERT
						echo $i." REF: ".$ref." - MODELO: ".$modelo." - DEC: ".$desc." - COLOR: ".$color." - CAT: ".$cat." - TIPO: ".$tipo." - PRICE: ".$price." - URL-IMAGE: ".$url_image."<br/>";
					}
				}
				
			}
			catch(Exception $e) 
			{
				echo $e->getMessage();
			}
	}

	public function importProductsXLSX($file)
	{
		try
			{
				$objReader = PHPExcel_IOFactory::createReader('Excel2007');
				$objReader->setReadDataOnly(false);

				$objPHPExcel = $objReader->load($file);
				$objWorksheet = $objPHPExcel->getActiveSheet();
				$highestRow = $objWorksheet->getHighestRow(); // e.g. 10
				$highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
				$excelImages=$objWorksheet->getDrawingCollection();
				$withImages=false;
				if(count($excelImages)>0)
				{
					echo "Archivo con imágenes<br/>";
					if(count($excelImages)==$highestRow-1)
					{	
						$withImages=true;
						echo "Imágenes coinciden con el número de filas<br/>dirigirse a readExcel/images/ para verlas<br/>";
					} 
					else
					{
						echo "Número de Imágenes no coincide con el número de registros<br/>";
					}
				}
				else
				{
					echo "Archivo no contiene imágenes<br/>";
				}

				if($highestColumn!='H')
				{
					echo "Formato inválido";
				}
				else
				{
					$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5
					for($row=2;$row<=$highestRow;++$row)
					{
					   	$ref=$objPHPExcel->getActiveSheet()->getCell("A".$row)->getCalculatedValue();
						$modelo=$objPHPExcel->getActiveSheet()->getCell("B".$row)->getCalculatedValue();
						$desc=$objPHPExcel->getActiveSheet()->getCell("C".$row)->getCalculatedValue();
						$color=$objPHPExcel->getActiveSheet()->getCell("D".$row)->getCalculatedValue();
						$cat=$objPHPExcel->getActiveSheet()->getCell("E".$row)->getCalculatedValue();
						$tipo=$objPHPExcel->getActiveSheet()->getCell("F".$row)->getCalculatedValue();
						$price=$objPHPExcel->getActiveSheet()->getCell("G".$row)->getCalculatedValue();
						
					    if($withImages)
						{

							if ($excelImages[$row-2] instanceof PHPExcel_Worksheet_MemoryDrawing)
							{
						        ob_start();
						        call_user_func(
						            $excelImages[$row-2]->getRenderingFunction(),
						            $excelImages[$row-2]->getImageResource()
						        );
						        /*Obtenemos bytes*/
						        $imageContents = ob_get_contents();
						        ob_end_clean();
						        switch ($excelImages[$row-2]->getMimeType()) {
						            case PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_PNG :
						                    $extension = 'png'; break;
						            case PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_GIF:
						                    $extension = 'gif'; break;
						            case PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_JPEG :
						                    $extension = 'jpg'; break;
						        }
						    }
						    else
						    {
						    	$zipReader = fopen($excelImages[$row-2]->getPath(),'r');
								$imageContents = "";
							    while(!feof($zipReader))
							    {
							    	/*Obtenemos bytes*/
							    	$imageContents .= fread($zipReader,1024);
							    }
							    fclose($zipReader);
							    $extension = $excelImages[$row-2]->getExtension();
						    }
						    $myFileName = $_SERVER["DOCUMENT_ROOT"]."/biosum/assets/images/products/".$ref.".".$extension;
							file_put_contents($myFileName,$imageContents);
							$url_image=base_url()."assets/images/products/".$ref.".".$extension;
							//AQUI DEBE IR GUARDANDOSE LA SENTENCIA INSERT
							echo $row." REF: ".$ref." - MODELO: ".$modelo." - DEC: ".$desc." - COLOR: ".$color." - CAT: ".$cat." - TIPO: ".$tipo." - PRICE: ".$price." - URL-IMAGE: ".$url_image."<br/>";
					    	echo '<br/>';
						}
					}
				}
			}
			catch(Exception $e)
			{
				echo "ERROR";
			}

			echo "hecho <br/>";
	}
}
?>