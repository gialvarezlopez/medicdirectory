<?php

namespace EmrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;



class ConsultaController extends Controller
{
	
	public function newAction( Request $request  )
    {
		$em = $this->getDoctrine()->getManager();
		
		
		$doctor = $request->get("d");
		
		$patient = $request->get("p");
		
		//==================================================
		//get all user roles logged
		//==================================================
		$userRoles = $this->get('session')->get('userRoles');
		
		//==================================================
		//get all doctors from this establishment
		//==================================================
		/*
		$locationId = $this->get('session')->get('locationId');
		if( !$locationId )
		{
			return $this->redirectToRoute("emr_location");
		}
		*/
		$RAW_QUERY = "SELECT u.* FROM cliente_usuario cu
						
						INNER JOIN usuario u on cu.cli_usu_usu_id = u.usu_id 
						where cli_usu_cli_id =:locationId
						and cu.cli_usu_rol_id = 6 ORDER BY u.usu_nombre asc ";

		$statement = $em->getConnection()->prepare($RAW_QUERY);
		$statement->bindValue("locationId", $locationId);
		$statement->execute();
		$doctorList = $statement->fetchAll();
		
		
		
		return $this->render("EmrBundle:agenda:new.html.twig", array(
			
		));
        
    }
	
	
	public function medicalConsultationAction( Request $request )
	{
		$em = $this->getDoctrine()->getManager();
		
		$patientId = $request->get('id');
		$iLocationId = $this->get('session')->get('locationId');
		$locationName = $this->get('session')->get('locationName');
		
        $oPatient = $em->getRepository('AppBundle:Paciente')->findBy( array("pacId"=>$patientId, "pacCli"=>$iLocationId ) );
        
                $oUsuModulos = $em->getRepository('AppBundle:ClienteModulo')
                        ->findBy(
                                array( 'cliModCli' => $iLocationId, 'cliModActivo' => 1 ), 
                                array('cliModFechaCrea' => 'ASC')
                        )
                        ;
                
                $modulos = array();
                
                foreach( $oUsuModulos as $kmod => $modulo ){
                    $modulos[] = array(
                        "mod_id" => $modulo->getCliModMod()->getModId(),
                        "modulo" => $modulo->getCliModMod()->getModModulo()
                    );
                }
                
                
		
		if( !isset($patientId) || empty($patientId) )
		{
			throw $this->createNotFoundException('Debe de iniciar la consulta con un paciente válido');
		}else if( !$oPatient )
		{
			throw $this->createNotFoundException('El paciente no fue encontrado en el establecimiento: '.$locationName );
		}
		
		//echo $oPatient[0]->getPacNombre();
		
		
		$servPatient = $this->get('srv_patient');
		$patientAge = $servPatient->getAge("2000/12/12");
		
		
		
		return $this->render("EmrBundle:consulta:new.html.twig", array(
			"patient"=>$oPatient,
			"age"=>$patientAge,
                        "modulos"=>$modulos
		));
		
	}
	

}
