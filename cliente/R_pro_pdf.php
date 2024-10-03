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
        $this->Cell(60, 10, 'Reporte De Productos Existentes', 0, 0, 'C');
        //salto de linea
        $this->Ln(30);
        $this->SetFillColor(220,220,220); //color a la selda
        $this->SetTextColor(255,255,255); //color de texto
        //tipo letra
        $this->SetFont("Arial", 'B', 12);
        //encabezado de la tabla

        $this->Cell(40, 10, utf8_decode('Nombre'), 1, 0, 'C', true);
        $this->Cell(40, 10,utf8_decode('Descripción'), 1, 0, 'C', true);
        $this->Cell(20, 10, 'Cantidad', 1, 0, 'C', true);
        $this->Cell(20, 10, 'Precio', 1, 0, 'C', true);
        $this->Cell(40, 10, 'Color', 1, 0, 'C', true);
        $this->Cell(20, 10, 'Tallas', 1, 0, 'C', true);
        $this->Cell(50, 10, 'Foto', 1, 0, 'C', true);
        $this->Cell(30, 10,utf8_decode('Categoría'), 1, 0, 'C', true);
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
$consulta="SELECT * FROM productos";
$resultado=mysqli_query($conexion,$consulta);
//hace referencia a 
$pdf=new PDF ('L');
$pdf->AddPage();
$pdf->SetFont("Arial", 'B', 10);
while($row=$resultado->fetch_assoc()){
    $pdf->Cell(40,10,utf8_decode($row['nombre']),1,0,'C');
    $pdf->Cell(40,10,utf8_decode($row['descripcion']),1,0,'C');
    $pdf->Cell(20,10,utf8_decode($row['cantidad']),1,0,'C');
    $pdf->Cell(20,10,utf8_decode($row['precio']),1,0,'C');
    $pdf->Cell(40,10,utf8_decode($row['color']),1,0,'C');
    $pdf->Cell(20,10,$row['tamanio'],1,0,'C');
    $pdf->Cell(50,10,$row['foto'],1,0,'C');
    $pdf->Cell(30,10,utf8_decode($row['idcate']),1,0,'C');
    $pdf->Ln(10);

}
$pdf->Output();//permite la salida de los datos
?>
