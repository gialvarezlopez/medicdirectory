<?php

namespace Services;

class Busqueda {
    /* @var $em \Doctrine\ORM\EntityManager */

    private $em;
    private $session;
    private $sphinxsearch;

    public function __construct($em, $session, $sphinxsearch) {
        $this->em = $em;
        $this->session = $session;
        $this->sphinxsearch = $sphinxsearch;
    }

    public function buscarClientes($texto, $activos = null, $offset = 0, $limit = 1) {

        // Buscamos en el indice definido en el config.yml -> SphinxSearch
        // La configuración del indice esta en el archivo sphinx.conf del sistema
        $indexesToSearch = array('Clientes');
        $options = array(
            'result_offset' => $offset,
            'result_limit' => $limit,
        );
        $sphinxSearch = $this->sphinxsearch;
        $sphinxSearch->setMatchMode(SPH_MATCH_EXTENDED);

        // Si nos pasaron un valor de estado activo entonces lo aplicamos como filtro
        // si viene null omitimos el filtro para buscar todos
        if (null !== $activos) {
            $sphinxSearch->setFilter('cli_activo', array($activos), false);
        }
        $oResultado = $sphinxSearch->search($texto, $indexesToSearch, $options);

        $aRet = [];
        $aRet['total'] = $oResultado['total'];
        $aRet['resultados'] = [];
        $aRet['ids'] = [];

        // Si tuvimos resultados entonces devolver los IDs ( cliente -> cli_id )
        if ($aRet['total'] > 0) {
            foreach ($oResultado['matches'] as $id => $cliente){
                $aRet['ids'][] = $id;
            }

        }

        return $aRet;
    }

}
