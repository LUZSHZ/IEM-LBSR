<?php
require("lib/fpdf186/fpdf.php");
class PDF extends FPDF
{
    function Header()
    {
        //logotipo
        $this->Image("img/logo.jpg", 10, 8, 33);
        //tipo letra
        $this->SetFont("Arial", 'B', 15);
        //movemos a la derecha
        $this->Cell(110);
        //titulo
        $this->Cell(60, 10, 'Reporte De Categorias Existentes', 0, 0, 'C');
        //salto de linea
        $this->Ln(30);
        $this->SetFillColor(220,220,220); //color a la selda
        $this->SetTextColor(255,255,255); //color de texto
        //tipo letra
        $this->SetFont("Arial", 'B', 12);
        //encabezado de la tabla
        $this->Cell(60, 10,utf8_decode('Nombre de la Categoría'), 1, 0, 'C', true);
        //salto de linea
        $this->Ln(10);
    }
    function Footer()
    {
        $this->SetFont("Arial", 'B', 8);
        $this->Cell(0, 10, 'Pagina' .$this->PageNo(), 0, 0, 'C');
    }
}
//consulta a la base de datos
require("../servidor/conexion.php");
$consulta="SELECT * FROM categoria";
$resultado=mysqli_query($conexion,$consulta);
//hace referencia a 
$pdf=new PDF ('L');
$pdf->AddPage();
$pdf->SetFont("Arial", 'B', 10);
while($row=$resultado->fetch_assoc()){
    $pdf->Cell(60,10,utf8_decode($row['categorias']),1,0,'C');
    $pdf->Ln(10);
    
}
$pdf->Output();//permite la salida de los datos
?>