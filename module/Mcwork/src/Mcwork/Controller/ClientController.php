<?php
/**
 * contentinum - accessibility websites
 *
 * LICENSE
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category contentinum backend
 * @package Controller
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Controller;

use ContentinumComponents\Controller\AbstractMcworkController;
use Zend\View\Model\ViewModel;
use Mcwork\Mapper\ValueOptions;
use Mcwork\Mapper\FieldValue;

class ClientController extends AbstractMcworkController
{

    public function application($pageOptions, $defaultRole = null, $acl = null)
    {
        return $this->process($pageOptions, $defaultRole, $acl);
    }

    public function process($pageOptions, $defaultRole, $acl)
    {
        $params = $this->params()->fromPost();
        $cat = $this->params()->fromRoute('cat', null);
        
        switch ($cat) {
            case 'configure':
                if (isset($params['service']) && $this->getServiceLocator()->has($params['service'])) {
                    $view = new ViewModel(array(
                        'data' => $this->getServiceLocator()->get($params['service'])
                    ));
                    $view->setTemplate('content/response/json');
                    return $view;
                } else {
                    $view = new ViewModel(array(
                        'error' => 'Service not found or there were no parameters passed'
                    ));
                    $view->setTemplate('content/response/json');
                    return $view;
                }
                break;
            case 'valueoptions':
                if (isset($params['entity'])) {
                    $options = new ValueOptions($this->worker->getStorage());
                    $view = new ViewModel(array(
                        'data' => $options->getOptions($params)
                    ));
                    $view->setTemplate('content/response/json');
                    return $view;
                } else {
                    $view = new ViewModel(array(
                        'error' => 'Application error or there were no parameters passed'
                    ));
                    $view->setTemplate('content/response/json');
                    return $view;
                }
                break;
            case 'fieldvalue':
                if (isset($params['entity'])) {
                    $options = new FieldValue($this->worker->getStorage());
                    $view = new ViewModel(array(
                        'data' => $options->getValue($params)
                    ));
                    $view->setTemplate('content/response/json');
                    return $view;
                } else {
                    $view = new ViewModel(array(
                        'error' => 'Application error or there were no parameters passed'
                    ));
                    $view->setTemplate('content/response/json');
                    return $view;
                }
                break;
            case 'entryexists':
                if (isset($params['entity'])) {
                    $params['storage'] = $this->getWorker();
                    try {
                        $validator = new \ContentinumComponents\Validator\Doctrine\NoRecordExists($params);
                        return $validator->isValid($params['value']);
                    } catch (\Exception $e) {
                        return false;
                    }
                    return false;
                }
                break;
            case 'publishitem':
                return $this->publishitem($params);
                break;
            case 'unlockuser':
                return $this->unlockuser($params);
                break;
            case 'changeitemrang':
                try {
                    $this->changeitemrang($params);               
                    $view = new ViewModel();
                    $view->setTemplate('content/response/success');
                    return $view;
                } catch (\Exception $e) {
                    $view = new ViewModel(array(
                        'error' => 'Application error or there were no parameters passed'
                    ));
                    $view->setTemplate('content/response/json');
                    return $view;
                }
                break;
            case 'removesubmenue':
                try {
                   return $this->removesubmenue($params); 
                } catch (\Exception $e) {
                    $view = new ViewModel(array(
                        'error' => 'Application error or there were no parameters passed'
                    ));
                    $view->setTemplate('content/response/json');
                    return $view;
                }
                break;   
            case 'addsubmenue':
                return $this->addsubmenue($params);
                break;
            case 'newsgroupparams':
                $worker = new \Mcwork\Mapper\Newsgroup($this->worker->getStorage() );
                $worker->setEntity($this->getServiceLocator()->get('Entity\ContentGroups'));
                if (isset($params['id']) ) {
                    $view = new ViewModel(array(
                        'data' => $worker->fetchNewsGroupParamter($params['id'])
                    ));
                    $view->setTemplate('content/response/json');
                    return $view;
                } else {
                    $view = new ViewModel(array(
                        'error' => 'Application not found or incorrect parameter'
                    ));
                    $view->setTemplate('content/response/json');
                    return $view;
                }    
                break;
            case 'work':
                
                if (isset($params['app']) && isset($params['data']) ) {
                    try {
                        $worker = $params['app']['worker'];
                        $worker = new $worker($this->worker->getStorage());
                        $worker->setSl($this->getServiceLocator() );
                        $entity = $params['app']['entity'];
                        $worker->setEntity(new $entity);
                        $method = $params['app']['method'];
                        
                        if (true === $worker->$method($params['app'],$params['data'])){
                            $view = new ViewModel();
                            $view->setTemplate('content/response/success');
                            return $view;                            
                        } else {
                            return $this->responseError('Application error!');
                        }
                        
                        
                    } catch (\Exception $e) {
                         return $this->responseError('Application error: ' . $e->getMessage());
                    }
                } else {
                    return $this->incorrectParameter();
                }                
                
                
                break;     
            case 'alltags':
                
                if (isset($params['group']) ) {
                    $tags = new \Mcwork\Mapper\Tags($this->worker->getStorage());
                    $tags->setEntity($this->getServiceLocator()->get('Entity\Tags'));
                    return $this->responseJsonDatas($tags->fetchSpecifiedTags($params['group']));
                } else {
                    return $this->incorrectParameter();
                } 
                
                break;    
            case 'savetags':
                if (isset($params['model']) ) {
                    $tags = $this->getServiceLocator()->get($params['model']);
                    $tags->save($params['tags'], null, '', $params['ident']);
                    return $this->responseSuccess();
                } else {
                    return $this->incorrectParameter();
                } 
                break;
            case 'dirlist':
                
                $worker = new \ContentinumComponents\Storage\StorageDirectory();
                $worker->setStorage( $this->getServiceLocator()->get('Storage\Manager') );
                $worker->setEntity(new \Mcwork\Entity\FsPublic());
                return $this->responseJsonDatas($worker->getStorage()->getDirectoryTree($worker->getEntity()
                ->getCurrentPath(), true));
                
                break;
            case 'explorer':
                return $this->explorer($params);
                break;
            case 'linklist':
                
                return $this->responseJsonDatas($this->linklist());
                
                break;   

            case 'newsarchive' :
                $model = new \Mcwork\Model\News($this->worker->getStorage());
                return $this->responseJsonDatas($model->fetchContent(array()));
                break;
                
            default:
                return $this->incorrectParameter();
        }
    }
    
    /**
     * File explorer for the javascript client
     *
     * @param array $params parameters to do this
     * @return Ambigous <string, mixed>
     */
    protected function explorer($params)
    {
        $entity = new \Mcwork\Entity\FsPublic();
        $dir = '';
        if (isset($params['dir']) && $entity->getCurrentPath() != $params['dir'] . '/') {
            $dir = str_replace($entity->getCurrentPath(), '', $params['dir']);
        }
        $fs = new \Mcwork\Model\FileSystem\Explorer($this->getServiceLocator()->get('Storage\Manager'));
        $fs->setEntity($entity);
        $fs->setMediaAdministration($this->getServiceLocator()
            ->get('Mcwork\Media\Administration'));

        return $this->responseJsonDatas($fs->ls($dir));
    }    
    
    /**
     * 
     * @return \Zend\View\Model\ViewModel
     */
    private function responseSuccess()
    {
        $view = new ViewModel();
        $view->setTemplate('content/response/success');
        return $view;        
    }
    
    /**
     * 
     * @param unknown $datas
     * @return \Zend\View\Model\ViewModel
     */
    private function responseJsonDatas($datas)
    {
        $view = new ViewModel(array(
            'data' => $datas
        ));
        $view->setTemplate('content/response/json');
        return $view;
    }
    
    /**
     * 
     * @param unknown $msg
     * @return \Zend\View\Model\ViewModel
     */
    private function responseError($msg)
    {
        $view = new ViewModel(array(
            'error' => $msg
        ));
        $view->setTemplate('content/response/json');
        return $view;        
    }
    
    /**
     * 
     * @param string $msg
     * @return \Zend\View\Model\ViewModel
     */
    private function incorrectParameter($msg = 'Application not found or incorrect parameter')
    {
        $view = new ViewModel(array(
            'error' => $msg
        ));
        $view->setTemplate('content/response/json');
        return $view;
    }

    /**
     * Set a item publish or unpublish depends on current status
     *
     * @param array $params
     *            parameters to do this
     * @return Ambigous <string, mixed>
     */
    private function publishitem($params)
    {
        $worker = "Mcwork\\Model\\";
        
        if (preg_match('/_/', $params['categoryname'])) {
            $parts = explode('_', $params['categoryname']);
            foreach ($parts as $part) {
                $worker .= ucfirst($part);
            }
        } else {
            $parts = explode('\\', $params['categoryname']);
            if ( count($parts) > 2 ){
                $worker = $params['categoryname'];
            } else {
                $worker .= $params['categoryname'];
            }
        }
        $id = $params['ident'];
        $db = new $worker($this->worker->getStorage());
        $entity = $db->getPublishEntity();
        $db->setEntity(new $entity());
        try {
            $view = new ViewModel(array(
                'msg' => $db->publish($id)
            ));
            $view->setTemplate('content/response/json');
            return $view;
        } catch (\Exception $e) {
            $view = new ViewModel(array(
                'error' => $e->getMessage()
            ));
            $view->setTemplate('content/response/json');
            return $view;
        }
    }
    
    /**
     * 
     * @param unknown $params
     * @return \Zend\View\Model\ViewModel
     */
    private function unlockuser($params)
    {
        $id = $params['ident'];
        $db = new \ContentinumComponents\Mapper\Process($this->worker->getStorage());
        $db->setEntity(new \Contentinum\Entity\Users5());
        try {
            $db->save(array('tryLogin' => '0'), $db->find($id,true) );
            $view = new ViewModel(array(
                'msg' => 'Success'
            ));
            $view->setTemplate('content/response/json');
            return $view;
        } catch (\Exception $e) {
            $view = new ViewModel(array(
                'error' => $e->getMessage()
            ));
            $view->setTemplate('content/response/json');
            return $view;
        }
    }    

    /**
     * Change, update a sequence
     *
     * @param array $params
     *            parameters to do this
     * @return \Zend\View\Model\ViewModel
     */
    protected function changeitemrang($params)
    {
        $worker = "Mcwork\\Model\\";
        if (preg_match('/_/', $params['categoryname'])) {
            $parts = explode('_', $params['categoryname']);
            $template = str_replace('_', '', $params['categoryname']);
            foreach ($parts as $part) {
                $worker .= ucfirst($part);
            }
        } else {
            $parts = explode('\\', $params['categoryname']);
            if ( count($parts) > 2 ){
                $worker = $params['categoryname'];
            } else {
                $worker .= $params['categoryname'];
            }
            
            
            $template = strtolower(str_replace('\\', '', $params['categoryname']));
        }
        
        // calculate and update new squence
        $db = new $worker($this->worker->getStorage());
        $sec = new \ContentinumComponents\Mapper\Sequence($this->worker->getStorage());
        $entity = $db::ENTITY_CATEGORIES;
        $sec->setEntity(new $entity());
        if ('jump' == $params['datamove']) {
            $sec->itemjumprang($params['category'], $params['newrang'], $db::CATEGORIES_GROUP, $params['group']);
        } elseif ('moveup' == $params['datamove'] || 'movedown' == $params['datamove']) {
            $sec->itemmoverang($params['category'], $params['datamove'], $db::CATEGORIES_GROUP, $params['group']);
        }
        // get new table row sequence
        if ( method_exists($db, 'fetchContent') ){
            $result = $db->fetchContent(array(
                'id' => $params['group']
            ));
        }
        return true;
    }
    
    
    /**
     * Add an navigation branch
     *
     * @param array $params parameters to do this
     * @return Ambigous <string, mixed>
     */
    protected function addsubmenue($params)
    {
        $add = new \Mcwork\Model\Categories\Navigation($this->worker->getStorage());
        try {
            $view = new ViewModel(array(
                'data' => $add->addNavigationBranch($params)
            ));
            $view->setTemplate('content/response/json');
            return $view;            
        } catch (\Exception $e) {
            $view = new ViewModel(array(
                'error' => $e->getMessage()
            ));
            $view->setTemplate('content/response/json');
            return $view;
        }
        
    }
    
    /**
     * Remove a navigation branch
     *
     * @param array $params parameters to do this
     * @return Ambigous <string, mixed>
     */
    protected function removesubmenue($params)
    {
        $minus = new \Mcwork\Model\Categories\Navigation($this->worker->getStorage());
        if (true !==($msg = $minus->unlinkNavigationBranch($params))){
            $view = new ViewModel(array(
                'error' => $msg
            ));
            $view->setTemplate('content/response/json');
            return $view;            
        } else {
            $view = new ViewModel();
            $view->setTemplate('content/response/success');
            return $view;            
        }
    }  

    protected function linklist()
    {
        $result = array();
        $list = $this->getServiceLocator()->get('Content\LinksAndPages');
        foreach ($list as $url => $entry){
            $result[] = array('title' => $entry->name, 'value' => $url);
        }
        $medias = $this->getServiceLocator()->get('Mcwork\Media');
        foreach ($medias as $source => $entry){
            if ( preg_match('/application\//', $entry['mediaType']) && 'index' == $entry['resource']  ){
                $result[] = array('title' => $entry['mediaName'], 'value' => $entry['mediaLink']);
            }
             
        }
         
         
        return $result;
    }    
}