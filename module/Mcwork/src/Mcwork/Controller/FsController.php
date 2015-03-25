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

class FsController extends AbstractMcworkController
{

    public function application($pageOptions, $defaultRole = null, $acl = null)
    {

        return $this->process($pageOptions, $defaultRole, $acl, $this->params()->fromRoute('id', false));
    }

    public function process($pageOptions, $defaultRole, $acl, $file = null)
    {
        $datas = $this->getRequest()->getPost();
        
        
        $current = $cat = '';
        if (false !== ($cat = $this->params()->fromRoute('cat', false))) {
            $current = $cat;
            $cat = '/' . $cat;
        }        
        
        $redirectUrl = $pageOptions->getAppOption('settoroute');
        $url = $pageOptions->split($pageOptions->getQuery(),$pageOptions->getSplitQuery());
        switch ( $url  ) {
            case '/mcwork/files/makedir':
                $this->worker->setFsCurrent( str_replace('_', DS, $datas['currentpath']));
                $this->worker->setNewDirectory($datas['new-folder']);
                $this->worker->mkdir();
                $msg = 'Successfully created a new directory';
                break;
            case '/mcwork/files/rmdir':
                if (strlen($current) > 1){
                    $this->worker->setFsCurrent( $current );
                }
                $this->worker->setRemoveFsItems($file);
                $this->worker->remove();
                $msg = 'Successfully remove directory';
                break;
            default:
                break;
        }
        

        
        $this->flashMessenger()->setNamespace('mcwork-controller')->addMessage($msg);
        return $this->redirect()->toUrl($redirectUrl . $cat);
    }
}