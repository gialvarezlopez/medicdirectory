<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Services;

use AppBundle\Entity\LogsAuditoria;

/**
 * Description of servicioLogs
 *
 * @author miguel
 */
class servicioLogs {
    
    /* @var $em \Doctrine\ORM\EntityManager */
    private $em;
    
    const _INSERT_ACTION_ = "INSERT";
    const _UPDATE_ACTION_ = "UPDATE";
            
    function __construct($em) {
        $this->em = $em;
    }
    
    public function logEvent( 
        $log_action, 
        $log_table, 
        $log_field, 
        $log_user,
        $log_new_value = null,
        $log_prev_value = null
        ){
        
        /* @var $log_record \AppBundle\Entity\LogsAuditoria  */
        $log_record = new LogsAuditoria();
        
        $log_record->setLogAccion($log_action);
        $log_record->setLogTabla($log_table);
        $log_record->setLogCampo($log_field);
        $log_record->setLogUsuAccion($log_user);
        $log_record->setLogValorPrevio($log_prev_value);
        $log_record->setLogValorNuevo($log_new_value);
        
        $this->em->persist( $log_record );
        $this->em->flush();
        
    }
    
}
