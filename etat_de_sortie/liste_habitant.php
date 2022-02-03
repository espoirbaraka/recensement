<?php
require('fpdf/fpdf.php');
require_once'../class/app.php';

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('img/liste.png',2,2,206,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(30);
    // Titre
    // $this->Cell(180,10,'Titre',1,0,'C');
    // Saut de ligne
    $this->Ln(20);
}

// Tableau simple
function BasicTable($header, $data)
{
    // En-tête
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Données
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}







// function headerTable(){
//     $this->setFont('Times','B',8);
//     $this->cell(95,10,'Section: ',1,0,'L');
//     $this->Ln();
// }


function montant($app){
    $this->setFont('Arial','B',10);
        $this->cell(30,10,'Nom',1,0,'L');
        $this->cell(30,10,'Post-nom',1,0,'L');
        $this->cell(30,10,'Prenom',1,0,'L');
        $this->cell(30,10,'Naisance',1,0,'L');
        $this->cell(70,10,'Adresse',1,0,'L');
        $this->Ln();
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM t_personne
            INNER JOIN t_adresse
            ON t_personne.CodePersonne=t_adresse.CodePersonne
            INNER JOIN t_avenue
            ON t_adresse.CodeAvenue=t_avenue.CodeAvenue
            INNER JOIN t_quartier
            ON t_adresse.CodeQuartier=t_quartier.CodeQuartier
            INNER JOIN t_commune
            ON t_adresse.CodeCommune=t_commune.CodeCommune
            INNER JOIN t_ville
            ON t_adresse.CodeVille=t_ville.CodeVille
            WHERE t_adresse.CodeQuartier=$id AND Statut=1
            GROUP BY t_personne.CodePersonne";
    $req=$app->fetchPrepared($sql);
    foreach($req as $row){
        $this->setFont('Arial','B',8);
        $this->cell(30,10,$row['NomPersonne'],1,0,'L');
        $this->cell(30,10,$row['PostnomPersonne'],1,0,'L');
        $this->cell(30,10,$row['PrenomPersonne'],1,0,'L');
        $this->cell(30,10,$row['DateNaiss'],1,0,'L');
        $this->cell(70,10,$row['Numero'].', '.$row['Avenue'].', '.$row['Quartier'].', '.$row['Commune'].', '.$row['Ville'],1,0,'L');
        $this->Ln();
    }
}


function viewTable($app){
    $this->setFont('Arial','B',12);
}







}

    // Instanciation de la classe dérivée
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',8);
    $pdf->AddPage();
    // $pdf->headerTable();
    $pdf->montant($app);
    
    $pdf->viewTable($app);
    $pdf->Cell(0,8,'Fait a GOMA, le '.date('d-m-Y'),0,1);
    $pdf->Output();
?>