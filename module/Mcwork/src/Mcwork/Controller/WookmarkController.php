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

/**
 * Wookmark controller, reload image after ajax request
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 *
 */
class WookmarkController extends AbstractMcworkController
{

    /**
     * (non-PHPdoc)
     * @see \ContentinumComponents\Controller\AbstractMcworkController::application()
     */
    public function application($pageOptions, $defaultRole = null, $acl = null)
    {
        $pictureDatabase = $this->worker;
        $pictureDatabase->init($pictureDatabase->fetchContent(), 30);
        
        $result = array(
            'success' => TRUE,
            'message' => 'Retrieved pictures',
            'data' => array()
        );
        
        $result = array(
            'success' => TRUE,
            'message' => 'Retrieved pictures',
            'data' => array()
        );
        
        $callback = $this->params()->fromQuery('callback', false);
        
        $page = 1;
        try {
            $page = intval($this->params()->fromQuery('page'));
        } catch (\Exception $e) {
            $result['success'] = FALSE;
            $result['message'] = 'Parameter page is not a number';
        }
        
        // Get data from database
        $result['data'] = $pictureDatabase->getPage($page);
        
        if (count($result['data']) == 0 || $page >= $pictureDatabase->getNumberOfPages()) {
            $result['success'] = TRUE;
            $result['message'] = 'No more pictures';
        }
        
        // Encode data as json or jsonp and return it
        if ($callback) {
            header('Content-Type: application/javascript');
            echo $callback . '(' . json_encode($result) . ')';
            exit();
        } else {
            header('Content-Type: application/json');
            echo json_encode($result);
            exit();
        }
    }

    /**
     * Process action processed a request form
     * @param Contentinum\Options\PageOptions $pageOptions Contentinum\Options\PageOptions
     * @param array $page
     * @param string $defaultRole
     * @param Zend\Permissions\Acl\Acl $acl Zend\Permissions\Acl\Acl
     */
    public function process($pageOptions, $page, $defaultRole, $acl)
    {
        return $this->application($pageOptions, $page, $defaultRole, $acl);
    }
}