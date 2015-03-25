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



class DownloadController extends AbstractMcworkController
{
    public function application($pageOptions, $defaultRole = null, $acl = null)
    {
        $redirectUrl = $pageOptions->getAppOption('settoroute');
        $id = $this->params()->fromRoute('id', false);

        if (false !== ($file = $this->worker->downloadItem($id))){
            $sm = $this->getServiceLocator()->get('Storage\Manager');
            $file['approot'] = $sm->getDocumentRoot ();
            $view = new ViewModel($file);
            $view->setTemplate('files/download');
            return $view;            
        } else {
            $cat = '';
            if (false !== ($cat = $this->params()->fromRoute('cat', false))){
                $cat = '/'  . $cat;
            }
            
            $this->flashMessenger()->setNamespace('mcwork-controller')->addMessage('File not found');
            return $this->redirect()->toUrl( $redirectUrl . $cat );            
        }        
    }
}