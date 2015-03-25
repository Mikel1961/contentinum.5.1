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

/**
 * form controller backend add a data record in database
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class FsMultipleUploadController extends AbstractMcworkController
{

    public function application($pageOptions, $defaultRole = null, $acl = null)
    {
        $view = new ViewModel(array(
            'error' => 'Application not found or incorrect parameter'
        ));
        $view->setTemplate('content/response/json');
        return $view;
    }

    public function process($pageOptions, $defaultRole, $acl)
    {
        if (! empty($_FILES) && is_array($_FILES['file']['tmp_name'])) {
            $datas = $this->getRequest()->getPost();
            if (isset($datas['currentuploadpath']) && strlen($datas['currentuploadpath']) > 1) {
                $this->worker->setFsCurrent(str_replace('_', DS, $datas['currentuploadpath']) . DS);
            }
            
            $this->worker->setResizes(array(
                '200'
            ));
            
            $save = $this->getServiceLocator()->get('Mcwork\SaveUpload');
            $entityName = $this->getServiceLocator()->get('Entity\Name\Medias');
            foreach ($_FILES['file']['tmp_name'] as $k => $file) {
                $this->worker->multipleUpload($_FILES, $k, $file);             
                $this->worker->addInsert('resource', 'index');
                $save->save($this->worker->preparedInsert($datas->toArray())
                    ->emptyInserts(), new $entityName());
                $lastInsertId = $save->getLastInsertId();
                $saveStatus = $save->getSaveStatus();
                if (null != ($resizeImages = $this->worker->getResizesImages()) && 'insert' == $saveStatus){
                    foreach ($resizeImages as $image){
                        $inserts = $image;                    
                        $inserts['parentMedia'] = $lastInsertId;
                        $save->unsetEntity();
                        $save->save($inserts, new $entityName() , 'force');                        
                    }
                }          
                $ret[$_FILES['file']['name'][$k]]['filename'] = $this->worker->getTargetFileName();
            }
            $view = $view = new ViewModel(array(
                'data' => $ret
            ));
            $view->setTemplate($pageOptions->template);
            return $view;
        } else {
            $view = new ViewModel(array(
                'error' => 'wrong_param_to_upload_files'
            ));
            $view->setTemplate('content/response/json');
            return $view;
        }
    }
}