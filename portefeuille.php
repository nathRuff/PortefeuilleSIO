<?php
	session_start();
	include('controleur/config.php');
	//On inclus la biblioth&egrave;que de fonctions FPDF
    require('fpdf.php');
    class PDF extends FPDF
    {
        // En-t?
        function Header()
        {
            // Police Arial gras 15
            $this->SetFont('Arial','',18);
			$this->text(7,7,"BTS Services Informatiques aux Organisations");

        }
		
		function Footer()
		{
			// Positionnement &agrave; 1,5 cm du bas
			$this->SetY(-15);
			// Police Arial italique 8
			$this->SetFont('Arial','I',8);
			// NumÃ©ro de page centrÃ©
			$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
			$this->SetFont('Arial','B',15);
			$this->Cell(0,10,"Session ".date("Y",time()),0,0,'R');
			
		}

		
		function afficher_tache($id_tache,$nb_tache)
		{
			include('controleur/config.php');
			$resultats=$connexion->query("SELECT * FROM tache where id_tache='".$id_tache."'"); 
			$lignes=$resultats->fetch(PDO::FETCH_OBJ);
			$date_debut=date('d/m/y',$lignes->date_debut);
			$date_fin=date('d/m/y',$lignes->date_fin);
			$intitule=stripslashes($lignes->intitule);
			$lieu=stripslashes($lignes->lieu);
			$modalite=$lignes->modalite;
			$description=utf8_decode(stripslashes($lignes->description));
			$c1=$lignes->c1;
			$c2=$lignes->c2;
			$c3=$lignes->c3;
			$c4=$lignes->c4;


			$this->AddPage();
			$this->SetFont('Arial','',16);
			$this->text(80,30,"Tâche n°".$nb_tache);
			$this->text(20,45,"Intitulé : ".ucfirst($intitule));
			$this->text(120,45,"Lieu : ".ucfirst($lieu));
			$this->text(20,53,"Date de début : ".$date_debut);
			$this->text(20,61,"Date de fin : ".$date_fin);
			$this->text(20,69,"Modalité : ".ucfirst($modalite));
			$this->SetFont('Arial','',16);
			$this->SetXY(19,71);
			$this->MultiCell(180,8,"Description : ".ucfirst($description),0,"L");
			$this->SetFont('Arial','U',16);
			$this->text(45,$this->GetY()+10,"Items en relation avec le référentiel du BTS SIO");
			$this->SetFont('Arial','',12);
			
			$resultats=$connexion->query("SELECT * FROM competence where id_tache='".$id_tache."'"); 
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			
			$this->SetXY(19,$this->GetY()+13);
			if($c1==1)
			{
				$this->SetXY(19,$this->GetY());
				$this->MultiCell(180,6,utf8_decode("C1. Participation à un projet d'évolution d'un SI (solution applicative et d'infrastructure portant prioritairement sur le domaine de spécialité du candidat)"),0,"L");
			}
			if($c2==1)
			{
				$this->SetXY(19,$this->GetY());
				$this->MultiCell(180,6,utf8_decode("C2. Prise en charge d'incidents et de demandes d'assistance liés au domaine de spécialité du candidat"),0,"L");
			}
			
			if($c3==1)
			{
				$this->SetXY(19,$this->GetY());
				$this->MultiCell(180,6,utf8_decode("C3. Élaboration de documents relatifs à la production et à la fourniture de services"),0,"L");
			}
			
			if($c4==1)
			{
				$this->SetXY(19,$this->GetY());
				$this->MultiCell(180,6,utf8_decode("C4. Productions relatives à la mise en place d'un dispositif de veille technologique et à l'étude d'une technologie, d'un composant, d'un outil ou d'une méthode"),0,"L");
			}
			$this->MultiCell(180,6,"\n",0,"L");
			while( $ligne = $resultats->fetch()) 
			{
				
				$resultats2=$connexion->query("SELECT * FROM domaine where id_domaine='".$ligne->id_activite."'"); 
				$lignes2=$resultats2->fetch(PDO::FETCH_OBJ);
				$puce=$lignes2->puce_act;
				$libelle=$lignes2->libelle_act;
				$this->SetXY(19,$this->GetY());
				$this->MultiCell(180,6,$puce." ".utf8_decode($libelle),0,"L");
			}

		}

		
		
		
	
    }
	
    //Instanciation de la classe dÃ©rivÃ©e
    $pdf = new PDF('P','mm',"A4");
	
    $pdf->AddPage();
	$pdf->SetFont('Arial','',45);
	$pdf->SetXY(25,45);
	$pdf->MultiCell(165,25,utf8_decode("Portefeuille de compétences"),1,"C");
	$pdf->SetFont('Arial','',35);
	$pdf->SetXY(0,115);
	$pdf->MultiCell(0,25,"de\n".utf8_decode(ucfirst(strtolower($_SESSION['prenomalzzke']))." ".ucfirst(strtolower($_SESSION['login']))."\n\n\nParcours ".$_SESSION['parcours']),0,"C");
    
	$nb_tache=1;
	
	$resultats=$connexion->query("SELECT * FROM tache where id_etudiant='".$_SESSION['id']."'");
	$resultats->setFetchMode(PDO::FETCH_OBJ);

	while( $ligne = $resultats->fetch()) 
    {
		$id_tache=$ligne->id_tache;
		$pdf->afficher_tache($id_tache,$nb_tache);
		$nb_tache++;
	}
	$pdf->AliasNbPages();
    $pdf->Output();
	
?>