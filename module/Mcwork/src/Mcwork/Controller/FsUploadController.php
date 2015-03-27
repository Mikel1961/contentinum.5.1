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
use ContentinumComponents\Storage\StorageManager;

/**
 * form controller backend add a data record in database
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class FsUploadController extends AbstractMcworkController
{

    public function application($pageOptions, $defaultRole = null, $acl = null)
    {
    
        $view = new ViewModel(array('error' => 'Application not found or incorrect parameter' ));
        $view->setTemplate('content/response/json');
        return $view;                 

    }

    public function process($pageOptions, $defaultRole, $acl)
    {
        
        if (! isset($_FILES['fileUpload'])) {
            $view = new ViewModel(array('error' => 'no_file_specified' ));
            $view->setTemplate('content/response/json');
            return $view;            
            
        } else {
            $uploadedFile = $_FILES['fileUpload'];
        }
        try {
            $datas = $this->getRequest()->getPost();
            $this->worker->setStorage(new StorageManager());
            $this->worker->setMediaAttributeFields($this->getMcParameter('media_attribute_fields', 'Medias'));
            $ret = $this->worker->singleUpload($uploadedFile, $datas['newname']);
            $model = $this->worker->getParameter('model');
            $entity = $this->worker->getParameter('entity');
            if (false === $this->worker->getNotNew()){
                $save = new $model($this->getServiceLocator()->get('doctrine.entitymanager.orm_default'));
                $this->worker->addInsert('resource', 'memberresource');
                $save->save($this->worker->preparedInsert($datas->toArray())
                    ->emptyInserts(), new $entity());
            } else {
                $this->worker->emptyInserts();
            }
            
            $view = $view = new ViewModel(array('return' => $ret));
            $view->setTemplate($pageOptions->template);
            return $view;
        } catch (\Exception $e ){
            $view = new ViewModel(array('error' => 'Application error during upload' ));
            $view->setTemplate('content/response/json');
            return $view;            
        }
    }

}