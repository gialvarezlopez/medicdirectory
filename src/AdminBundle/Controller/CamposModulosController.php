<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class CamposModulosController extends Controller
{
    
    private $session;
    
    public function __construct() {
        $this->session = new Session();
    }
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $modulos = $em->getRepository('AppBundle:Modulo')->findBy(array( 'modActivo' => 1 ))
                ;
        
        $mod_id = null;
        $secc_id = null;
        
        if( null !== $this->session->get('modCampNew_mod_id') && null !== $this->session->get('modCampNew_secc_id') ){
            
            $mod_id = $this->session->get('modCampNew_mod_id');
            $secc_id = $this->session->get('modCampNew_secc_id');
            
            $this->session->remove('modCampNew_mod_id');
            $this->session->remove('modCampNew_secc_id');
        }
        
        return $this->render('AdminBundle:CamposModulos:index.html.twig', array(
            'modulos' => $modulos,
            'mod_id' => $mod_id,
            'secc_id' => $secc_id
        ));
    }
    
    private function createDeleteForm(\AppBundle\Entity\EavModCampos $campo){
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('campos_modulos_delete', array('id' => $campo->getModCampId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function editAction(Request $request, \AppBundle\Entity\EavModCampos $camp_id )
    {
        $em = $this->getDoctrine()->getManager();
            
        /* @var $campo AppBundle\EavModCampos */
        $campo = $em->getRepository('AppBundle:EavModCampos')
                ->find($camp_id);

        
        $edit_form = $this->createForm( \AdminBundle\Form\EavModCamposType::class , $campo );
        
        $edit_form->handleRequest($request);
        
        if( $edit_form->isSubmitted() && $edit_form->isValid() ){
            
            $campo->setModCampTipCampId( $edit_form->getData()->getTipoCampos()->getTipCampId() );
            $campo->setModCampFechaMod( new \DateTime() );
            
            $em->persist($campo);
            
            $flush = $em->flush( $campo );
            
            if ($flush == null){
                $msgBox = "Registro actualizado con éxito";
                $status = "success";
            } else {
                $msgBox = "No se ha podido actualizar el registro ";
                $status = "error";
            }
			
            $this->session->getFlashBag()->add($status,$msgBox);
            
            return $this->redirectToRoute('campos_modulos_edit', array('id' => $campo->getModCampId()));
        }
        
        return $this->render('AdminBundle:CamposModulos:edit.html.twig', array(
            'campo' => $camp_id,
            'edit_form' => $edit_form->createView()
        ));
    }

    public function deleteAction( Request $request )
    {
        $em = $this->getDoctrine()->getManager();
        
        $camp_id = $request->request->get('id');
        
        
        $campo = $em->getRepository('AppBundle:EavModCampos')
                ->find( $camp_id );
        
        $campo->setModCampActivo( false );
        $campo->setModCampFechaMod( new \DateTime() );
        
        $em->persist( $campo );
        $flush = $em->flush();
        
        if ($flush == null){
            echo 1;
        } else {
            echo 0;
        }
        exit;
    }

    public function newAction( Request $request )
    {
        $mod_camp = new \AppBundle\Entity\EavModCampos();
        
        $form = $this->createForm(\AdminBundle\Form\EavModCamposType::class, $mod_camp);
        
        $form->handleRequest( $request );
        
        $mod_id = null;
        $secc_id = null;
        
        if( $form->isSubmitted() && $form->isValid() ){
            $em = $this->getDoctrine()->getManager();
            
            $mod_camp->setModCampFechaCrea( new \DateTime() );

//            $mod_id = $mod_camp->getSeccionCampo()->getModSeccModId()->getModId();
//            $secc_id = $mod_camp->getSeccionCampo()->getModSeccId();
            
                        
            $em->persist($mod_camp);
            $flush = $em->flush();

            if( $flush == null ){
                    $msgBox = "Registro creado con éxito";
                    $status = "success";
            } else {
                    $msgBox = "No se pudo crear el registro ";
                    $status = "error";
            }

//            $this->session->set('modCampNew_mod_id', $mod_id);
//            $this->session->set('modCampNew_secc_id', $secc_id);
            $this->session->getFlashBag()->add($status,$msgBox);
            return $this->redirectToRoute('campos_modulos_index');
            
        }
        
        return $this->render('AdminBundle:CamposModulos:new.html.twig', array(
            'form' => $form->createView()
        ));
    }
    
    public function getSeccionesModuloAction( Request $request ){
        
        $id_mod = $request->request->get('id_mod');
        
        $em = $this->getDoctrine()->getManager();

        
        $secciones = $em->getRepository('AppBundle:EavModSeccion')
                ->findBy( array( 'modSeccModId' => $id_mod ) )
                ;
        
        $seccion_array = array();
        
        foreach( $secciones as $seccion ){
            $seccion_array[] = array(
                'id' => $seccion->getModSeccId(),
                'text' => $seccion->getModSeccSeccion()
            );
        }
        
        return new Response(
            json_encode($seccion_array)
        );
        
        ;
        
    }
    
    public function getGruposSeccionAction( Request $request ){
        $id_secc = $request->request->get( "id_secc" );
        
        $em = $this->getDoctrine()->getManager();
        
        $grupos = $em->getRepository("AppBundle:EavModSecGrupo")
                ->findBy( array("grupoSeccion" => $id_secc) )
                ;
        
        $grupos_array = array();
        
        foreach( $grupos as $grupo ){
            
            $grupos_array[] = array(
                "id" => $grupo->getSecGrId(),
                "text" => $grupo->getSecGrGrupo()
            );
            
        }
        
        return new Response(
                json_encode($grupos_array)
        );
        
    }
    
    public function tableListAction(Request $request){
        
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $get = $request->request->all();
        
        $rResult = $this->ajaxTable($get, true);//->getArrayResult(); 
        
        /* Data set length after filtering */
        $iFilteredTotal = count($rResult);
        /*
         * Output
         */
        $output = array(
            "sEcho" => intval($get['sEcho']),
            "iTotalRecords" => $iFilteredTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
//        echo '<pre>HERE2:<br>';
        foreach( $rResult as $key => $values ){
            $tmp_array = array();
            foreach( $values as $campo => $value ){
                $tmp_array[] = $value;
                //var_dump($tmp_array);
            }
            $output["aaData"][] = $tmp_array;
        }

        return new Response(
                json_encode($output)
        );
    }
    
    public function ajaxTable(array $get, $flag = false){
        
        $sQuery = "SELECT 
            mod_camp_id, mod_camp_nombre, tip.tip_camp_tipo, sec.mod_secc_seccion as seccion, gr.sec_gr_grupo as grupo,
            mod_camp_orden,
            mod_camp_es_catalogo, mod_camp_fecha_crea, mod_camp_fecha_mod, mod_camp_activo
            FROM eav_mod_campos
            LEFT JOIN eav_mod_sec_grupo gr on gr.sec_gr_id = mod_camp_sec_gr_id
            LEFT JOIN eav_mod_seccion sec on sec.mod_secc_id = gr.sec_gr_secc_id
            LEFT JOIN eav_tip_campos tip on tip.tip_camp_id = mod_camp_tip_camp_id
            WHERE mod_camp_sec_gr_id = :sec_id
        ";
        
        $em = $this->getDoctrine()->getManager();
        
        $oStatement = $em->getConnection()->prepare($sQuery);
        $oStatement->bindValue('sec_id', $get['id']);
        $oStatement->execute();
        
        $oResult = $oStatement->fetchAll();
        return $oResult;
//        echo '<pre>';
//        var_dump($oResult);
//        exit;
        
//        /* Indexed column (used for fast and accurate table cardinality) */
//        $alias = 'a';
//        /* DB table to use */
//        $tableObjectName = 'AppBundle:EavModCampos';
//        /**
//         * Set to default
//         */
//        if(!isset($get['columns']) || empty($get['columns']))
//          $get['columns'] = array('id');
//        $aColumns = array();
//        foreach($get['columns'] as $value) $aColumns[] = $alias .'.'. $value;
//
//        $cb = $this->getDoctrine()->getManager()
//          ->getRepository($tableObjectName)
//          ->createQueryBuilder($alias)
//          ->select(str_replace(" , ", " ", implode(", ", $aColumns)))
//          ->where( $alias.'.modCampSecGrId = '.$get['id'] )
//                ;
//
//        /*
//         * SQL queries
//         * Get data to display
//         */
//        $query = $cb->getQuery();
//        if($flag)
//          return $query;
//        else
//          return $query->getResult();
    }

}
