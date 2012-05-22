<?php

Yii::import('application.vendors.*');
require_once('Zend/Search/Lucene.php');

class SearchController extends Controller
{
    
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
    
        public $luceneIndex;
        private $indexedLinks;
        private $depth=0;
        public $maxDepth=5;
        
        public function actionIndex()
	{
            $q=$_GET['q'];
            $hits;
            try{
                $this->luceneIndex=Zend_Search_Lucene::open(Yii::app()->params["searchIndexPath"]);
                Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
                Zend_Search_Lucene_Analysis_Analyzer::setDefault(
                    new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive ()
                );
                $hits=$this->luceneIndex->find($q);
            }catch(Zend_Search_Lucene_Exception $e){
                Yii::log($e,'error','aplication');
            }
            $hitsArray=array();
            if(is_array($hits)){
                $hitsArray=$hits;
            }else{
                $hitsArray[0]=$hit;
            }
            $dataProvider=new CArrayDataProvider($hitsArray,
                    array(
                        'sort'=>array('attributes'=>array('score','title')),
                        'pagination'=>array(
                            'pageSize'=>10,
                        ),
                    ));
            $this->render('search',array('dataProvider'=>$dataProvider));
	}
        
        public function actionCreateIndex(){
            $lucene= Zend_Search_Lucene::create(Yii::app()->params["searchIndexPath"]);
            echo "Indice creado";
        }
        
        private function indexNewPage($url){
            
            //Add actual url al listado de url visitadas.
            array_push($this->indexedLinks,$url);
            
            for($i=0; $i<count($this->indexedLinks); $i++){
                
                $url=$this->indexedLinks[$i];
                
                //Generamos URL completa
                $Protocol = "http://";

                $urlBase = $Protocol . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . Yii::app()->params['path'];
                if(strlen($url)> strlen(Yii::app()->params['path']) )
                    if(substr_compare($url, Yii::app()->params['path'], 0,  strlen(Yii::app()->params['path']))==0)
                        $url=substr ($url, strlen(Yii::app()->params['path']) );
                $urlDoc=$urlBase . $url;

                //Abrimos fichero
                //Recogemos contenido
                $file = $this->get_web_page($urlBase . $url);

                $contentType = $file['content_type'];
                if($contentType!="text/html"){
                     $this->showMessage( "<span style='color:#900;'>No indexamos: ".$url." al no poseer formato text/html</span> <br>");
                    continue;
                }
                //Si no recibimos error en la página la indexamos.
                if($file['errno']==0 && $file['http_code']==200 ){

                    //realizamos el sumatorio md5 del archivo
                    //para pder comprobar si se ha modificado
                    $newmd5sum = md5($file['content']);
                    
                    $hits=array();
                    //$hits= $this->luceneIndex->find('url:'.$url);
                    $matched=false;
                    /*foreach($hits as $hit){
                        if($hit->md5==$newmd5sum){
                            $matched=true;
                        }else{
                            $this->luceneIndex->delete($hit);
                        }
                    }*/

                    //Mostramos por pantalla que vamos a indexar esta página
                    if(count($hits)==0)
                        $this->showMessage( "<span style='color:#080;'>Indexando Pagina: ".$url." <span style='color:#aaa;'>md5=".$newmd5sum . "</span> <span style='color:#009;'>Nivel: ".$this->depth."</span> </span><br>");
                    else{
                        if($matched)
                            $this->showMessage( "<span style='color:#008;'>No Indexando Pagina: ".$url." <span style='color:#009;'>Nivel: ".$this->depth."</span> </span><br>");
                        else {
                            $this->showMessage( "<span style='color:#a0a;'>ReIndexando Pagina: ".$url." <span style='color:#aaa;'>md5=".$newmd5sum . "</span> <span style='color:#009;'>Nivel: ".$this->depth."</span> </span><br>");
                        }
                    }
                    //Creamos el documento a indexar
                    Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
                    Zend_Search_Lucene_Analysis_Analyzer::setDefault(
                        new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive ()
                    );
            
                    $doc= Zend_Search_Lucene_Document_Html::loadHTML($file['content'],true);

                    //Añadimos dos campos más para identificar y actualizar
                    $doc->addField(Zend_Search_Lucene_Field::unIndexed('url', $url, 'utf-8'));
                    $doc->addField(Zend_Search_Lucene_Field::unIndexed('md5', $newmd5sum, 'utf-8'));

                    //Decimos a lucene que indexe la página en caso que debamos actualizarla 
                    if(!$matched){
                        $this->luceneIndex->addDocument($doc);
                        $this->showMessage( "<span style='color:#080;'>Indexando Pagina: ".$url."</span><br>");
                    }
                    //Recogemos los enlaces de la pagina
                    $linksArray = $doc->getLinks();

                    //Indexamos sus enlaces
                    foreach($linksArray as $l){
                         if(!$this->is_url_external($l))
                                 if(!in_array($l,$this->indexedLinks)){
                                    /*    
                                    if($this->depth <= $this->maxDepth){
                                        $this->depth++;
                                        $this->indexNewPage($l);
                                        $this->depth--;
                                    }
                                    */
                                     $this->indexedLinks[]=$l;
                                 }

                    }
                }
            }
            
        }
        
        public function actionSpider(){
            //Valores php iniciales para no bloquear...
            set_time_limit(0);
            ini_set("memory_limit","50M");
            
            //Añadimos enlace nulo inicialmente
            $this->indexedLinks=array();
            try{
                $this->luceneIndex=Zend_Search_Lucene::open(Yii::app()->params["searchIndexPath"]);
            }catch(Zend_Search_Lucene_Exception $e){
                try{
                    $this->showMessage( "Indice no creado. Creando indice<br/>");
                    $this->luceneIndex= Zend_Search_Lucene::create(Yii::app()->params["searchIndexPath"]);
                    
                }catch(Zend_Search_Lucene_Exception $e){
                    echo "error creating index";
                    exit(1);
                }
            }
            $this->indexNewPage('index.php');
            
            $this->showMessage("Optimizando indice<br>");
            $this->luceneIndex->optimize();
            $this->showMessage("Salvando indice<br>");
            $this->luceneIndex->commit();
            $this->showMessage("Finalizado. El indice contiene ".$this->luceneIndex->numDocs(). " documentos");
        }
        
        
        
        private function showMessage($msg){
            Yii::log($msg);
            print $msg;
            flush();
        }
        
         private function is_url_external($enlace){
            //Comprobamos que no enlace a si mismo
            if($enlace=="#")
                    return true;
            //Comprobamos que no sea un enlace a mail
            $mailto="mailto:";
            if(substr_compare($mailto, $enlace , 0,  strlen($mailto))==0){
                    return true;
            }
            $newurl=parse_url($enlace);
            if(isset($newurl['host'])){
                if($_SERVER['SERVER_NAME']==$newurl['host']){
                    return false;
                }else{
                    return true;
                }
            }else{
                return false;
            }
        }
        
        private function get_web_page( $url )
        {
                $options = array(
                        CURLOPT_RETURNTRANSFER => true,     // return web page
                        CURLOPT_HEADER         => false,    // don't return headers
                        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
                        CURLOPT_ENCODING       => "",       // handle compressed
                        CURLOPT_USERAGENT      => "spider", // who am i
                        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
                        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
                        CURLOPT_TIMEOUT        => 120,      // timeout on response
                        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
                );

                $ch      = curl_init( $url );
                curl_setopt_array( $ch, $options );
                $content = curl_exec( $ch );
                $err     = curl_errno( $ch );
                $errmsg  = curl_error( $ch );
                $header  = curl_getinfo( $ch );
                curl_close( $ch );

                $header['errno']   = $err;
                $header['errmsg']  = $errmsg;
                $header['content'] = $content;
                return $header;
        }
        
}