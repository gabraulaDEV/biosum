<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		require_once "Classes/PHPExcel/IOFactory.php";
		require_once "Classes/PHPExcel/Reader/Excel2007.php";
		//$this->CI =& get_instance();
		$this->load->model('ProductoDAO');
		$this->load->model('CategoriaDAO');
		$this->load->model('ColorDAO');
	}

	/**
	*	Importa excel .xls
	*/
	public function importProductsXLS($file)
	{
		$result="";
		$results=[false,""];
		$count=0;
		try
			{
				$objReader = PHPExcel_IOFactory::load($file);
				$objReader->setActiveSheetIndex(0);
				$rows=$objReader->setActiveSheetIndex(0)->getHighestRow();
				$objWorksheet=$objReader->getActiveSheet();
				$highestColumn = $objReader->setActiveSheetIndex(0)->getHighestColumn();
				$excelImages=$objWorksheet->getDrawingCollection();
				$withImages=false;
				if(count($excelImages)>0)
				{
					if(count($excelImages)==$rows-1)
					{	
						$withImages=true;
					} 
					else
					{
						$result="Número de Imágenes no coincide con el número de registros, corrija esto en el archivo excel";
					}
				}
				else
				{
					$result="Archivo no contiene imágenes, corrija esto en el archivo excel";
				}

				if($highestColumn!='H')
				{
					$result="Formato inválido, por favor revise que la estructura del archivo que está importando sea igual al ejemplo 'Ver Template'";
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
						}

						/*Verificar que no exista el producto*/
						if(count($this->ProductoDAO->productoProRefTipo($ref,$tipo))==0)
						{
							$url_image=base_url()."assets/images/products/".$ref.".".$extension;

							/*Verificamos existencia de categoria*/
							$categoria=$this->CategoriaDAO->getIdByName($cat);
							if(count($categoria)>0)
							{
								/*obtenemos id categoria*/
								$id_cat=$categoria[0]['id'];
								//AQUI DEBE IR GUARDANDOSE LA SENTENCIA INSERT
								if($this->ProductoDAO->insertProducto2($ref,$modelo,$desc,$tipo,$price,$id_cat,$url_image))
								{
									file_put_contents($myFileName,$imageContents);
									$colores = explode(",", $color);
									if($this->ColorDAO->insertColorProducto($ref,$modelo,$tipo,$colores))
									{
										$count++;
									}
								}
							}
							
						}
						else
						{
							/* POSIBLE UPDATE PRODUCT*/
						}
						
					}
				}
				
			}
			catch(Exception $e) 
			{

			}
			if($count>0)
			{
				$result="Se agregaron ".$count." productos";
				$results[0]=true;
			}
			else
			{
				$result=$result."No se agregaron prductos nuevos";
			}
			$results[1]=$result;
			return $results;
	}

	/**
	*	Importa excel .xlsx
	*/
	public function importProductsXLSX($file)
	{
		$result="";
		$results=[false,""];
		$count=0;
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
					if(count($excelImages)==$highestRow-1)
					{	
						$withImages=true;
					} 
					else
					{
						$result="Número de Imágenes no coincide con el número de registros, corrija esto en el archivo excel";
					}
				}
				else
				{
					$result="Archivo no contiene imágenes, corrija esto en el archivo excel";
				}

				if($objPHPExcel->getActiveSheet()->getCell("H1")->getValue()!="Imagen" && $objPHPExcel->getActiveSheet()->getCell("H1")->getValue()!="imagen" && $objPHPExcel->getActiveSheet()->getCell("H1")->getValue()!="IMAGEN")
				{
					$result=$objPHPExcel->getActiveSheet()->getCell("H1")->getCalculatedValue()."Formato inválido, por favor revise que la estructura del archivo que está importando sea igual al ejemplo 'Ver Template'";
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
							
							//AQUI DEBE IR GUARDANDOSE LA SENTENCIA INSERT
							if(count($this->ProductoDAO->productoProRefTipo($ref,$tipo))==0)
							{
								$url_image=base_url()."assets/images/products/".$ref.".".$extension;

								/*Verificamos existencia de categoria*/
								$categoria=$this->CategoriaDAO->getIdByName($cat);
								if(count($categoria)>0)
								{
									/*obtenemos id categoria*/
									$id_cat=$categoria[0]['id'];
									//AQUI DEBE IR GUARDANDOSE LA SENTENCIA INSERT
									if($this->ProductoDAO->insertProducto2($ref,$modelo,$desc,$tipo,$price,$id_cat,$url_image))
									{
										file_put_contents($myFileName,$imageContents);
										$colores = explode(",", $color);
										if($this->ColorDAO->insertColorProducto($ref,$modelo,$tipo,$colores))
										{
											$count++;
										}
									}
								}
								
							}

						}
					}
				}
			}
			catch(Exception $e)
			{
				
			}

			if($count>0)
			{
				$result="Se agregaron ".$count." productos";
				$results[0]=true;
			}
			else
			{
				$result=$result."No se agregaron prductos nuevos";
			}
			$results[1]=$result;
			return $results;
	}
}
?>