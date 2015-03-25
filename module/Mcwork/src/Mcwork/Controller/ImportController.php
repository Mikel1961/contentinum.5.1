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
 * Mcwork backend application controller
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class ImportController extends AbstractMcworkController
{

    public function application($pageOptions, $defaultRole = null, $acl = null)
    {
        $this->backendlayout($pageOptions, $this->getIdentity(), $defaultRole, $acl, $this->layout(), $this->getServiceLocator()
            ->get('viewHelperManager'));
        $services = array();
        $params = array(
            'id' => $this->params()->fromRoute('id', 0)
        );
        if (null !== ($getServices = $this->getServices())) {
            foreach ($getServices as $key => $service) {
                $services[$key] = $this->getServiceLocator()->get($service);
            }
        }
        $datas = $this->getImportData();
        
        $i = 0;
        $start = 414;
        $str = '';
        foreach ($datas as $row) {
            $i ++;
            $template = array();
            $template = $this->template();
            $template[1] = $start + $i;
            $template[2] = $row['contacts_id'];
            $template[13] = $row['username'];
            $template[14] = md5($row['username']);
            
            $crypt = new \ContentinumComponents\Crypt\Password();
            $template[15] = $crypt->encode($row['preparepass']);
            $template[18] = $crypt->getSalt();
            $str .= "\n(";
            foreach ($template as $values) {
                $str .= "'" . $values . "',";
            }
            $str = substr($str, 0, - 1);
            $str .= '),';
            
            if (450 === $i) {
                break;
            }
        }
        
        echo $str;
        var_dump('fin ' . $i);
        exit();
        
        return $this->buildView(array(
            'page' => $pageOptions->headTitle,
            'pagecontent' => $pageOptions,
            'entries' => $this->worker->fetchContent($params),
            'services' => $services,
            'acl' => $acl,
            'role' => $defaultRole,
            'host' => $pageOptions->getHost(),
            'protocol' => 'http',
            'usrgrps' => '',
            'category' => $this->params()
                ->fromRoute('id', 0),
            'identity' => $this->getIdentity()
        ), $pageOptions);
    }

    protected function template()
    {
        return array(
            
            1 => 10,
            2 => 55,
            3 => 7,
            4 => '',
            5 => '',
            6 => '',
            7 => '',
            8 => '',
            9 => 'de',
            10 => '',
            11 => '/mitgliederbereich',
            12 => '/',
            13 => 'Mitarbeiter HSGB',
            14 => '7f32d82ba2b9d9f781bd69fbd5286553',
            15 => '$6$31hFe4NPtJXELmMc$V9KgKWvuAogLnkcDuGDN4cSqy5UMFErl/EAZ4h7Skxlbvm3iYT3VEac5wSwvxejOQTM.bfLnA/ZKngXMtOHwj0',
            16 => '',
            17 => 0,
            18 => '31hFe4NPtJXELmMc',
            19 => 0,
            20 => '0000-00-00 00:00:00',
            21 => '0000-00-00 00:00:00',
            22 => 0,
            23 => 'yes',
            24 => 0,
            25 => 1,
            26 => 1,
            27 => '2015-03-02 23:48:08',
            28 => '2015-03-02 23:48:08'
        )
        ;
    }

    /**
     * View settings
     *
     * @param array $variables            
     * @return \Zend\View\Model\ViewModel
     */
    protected function buildView(array $variables, $pageOptions)
    {
        $view = new ViewModel($variables);
        
        $view->setVariable('customconfig', $this->getConfiguration());
        
        $view->setVariable('messages', $this->flashMessenger()
            ->setNamespace('mcwork-controller')
            ->getMessages());
        
        $view->setVariable('usergroups', $this->getServiceLocator()
            ->get('Mcwork\Groups\User'));
        
        if (isset($pageOptions->templateWidget) && strlen($pageOptions->templateWidget) >= 3) {
            $view->setVariable('widget', $pageOptions->templateWidget);
        }
        
        if (isset($pageOptions->toolbar) && 1 === $pageOptions->toolbar) {
            $view->setVariable('toolbarcontent', $this->getServiceLocator()
                ->get('Mcwork\Toolbar'));
        }
        if (isset($pageOptions->tableedit) && 1 === $pageOptions->tableedit) {
            $view->setVariable('tableeditcontent', $this->getServiceLocator()
                ->get('Mcwork\Tableedit'));
        }
        
        // var_dump($pageOptions->template);
        // exit;
        $view->setTemplate($pageOptions->template);
        return $view;
    }

    protected function getImportData()
    {
        // array( 'contacts_id' => '56', 'username' => 'Aarbergen', 'preparepass' => '5sBGZGRtGr'),
        // array( 'contacts_id' => '57', 'username' => 'Absteinach', 'preparepass' => 'DA1GDd5dZy'),
        return array(
            
            array(
                'contacts_id' => '461',
                'username' => 'Ve 01',
                'preparepass' => 'rwokuLYUbc'
            ),
            array(
                'contacts_id' => '462',
                'username' => 'Ve 02',
                'preparepass' => '4iiuOrJzlN'
            ),
            array(
                'contacts_id' => '463',
                'username' => 'Ve 03',
                'preparepass' => 'hB3TSaTlj8'
            ),
            array(
                'contacts_id' => '464',
                'username' => 'Ve 04',
                'preparepass' => 'phbuxvtCpq'
            ),
            array(
                'contacts_id' => '465',
                'username' => 'Ve 05',
                'preparepass' => 'z0XfRuB3Kh'
            ),
            array(
                'contacts_id' => '466',
                'username' => 'Ve 06',
                'preparepass' => 'KEz41SzGNv'
            ),
            array(
                'contacts_id' => '467',
                'username' => 'Ve 07',
                'preparepass' => '8XK7Qm9wla'
            ),
            array(
                'contacts_id' => '468',
                'username' => 'Ve 08',
                'preparepass' => 'Zluvqvqj4e'
            ),
            array(
                'contacts_id' => '469',
                'username' => 'Ve 09',
                'preparepass' => 'jRSMfCPRS6'
            ),
            array(
                'contacts_id' => '470',
                'username' => 'Ve 10',
                'preparepass' => 'jDvyJxmGqT'
            ),
            array(
                'contacts_id' => '471',
                'username' => 'Ve 11',
                'preparepass' => 'AKhuPyyun2'
            ),
            array(
                'contacts_id' => '472',
                'username' => 'Ve 12',
                'preparepass' => 'FqUcbnkwyi'
            ),
            array(
                'contacts_id' => '473',
                'username' => 'Ve 13',
                'preparepass' => 'CAmhcNXTkz'
            ),
            array(
                'contacts_id' => '474',
                'username' => 'Ve 14',
                'preparepass' => 'wPwsMidBsl'
            ),
            array(
                'contacts_id' => '475',
                'username' => 'Ve 15',
                'preparepass' => 'ycYODWAoYL'
            ),
            array(
                'contacts_id' => '476',
                'username' => 'Ve 16',
                'preparepass' => 'ibbughYuTP'
            ),
            array(
                'contacts_id' => '477',
                'username' => 'Ve 17',
                'preparepass' => 'vQovMKsnlx'
            ),
            array(
                'contacts_id' => '478',
                'username' => 'Ve 18',
                'preparepass' => 'TRsQZY3Mxx'
            ),
            array(
                'contacts_id' => '479',
                'username' => 'Ve 19',
                'preparepass' => 'l3pPCCbFwo'
            ),
            array(
                'contacts_id' => '480',
                'username' => 'Ve 20',
                'preparepass' => 'J1WyGSVPpD'
            ),
            array(
                'contacts_id' => '481',
                'username' => 'Ve 21',
                'preparepass' => '66dbsYb6lE'
            ),
            array(
                'contacts_id' => '482',
                'username' => 'Ve 22',
                'preparepass' => 'H5LNgUWGcB'
            ),
            array(
                'contacts_id' => '483',
                'username' => 'Ve 23',
                'preparepass' => 'kTw7KuZikU'
            ),
            array(
                'contacts_id' => '484',
                'username' => 'Ve 24',
                'preparepass' => 'v40nAj8Bck'
            ),
            array(
                'contacts_id' => '485',
                'username' => 'Ve 25',
                'preparepass' => 'e4tGbFuCGk'
            ),
            array(
                'contacts_id' => '486',
                'username' => 'Ve 26',
                'preparepass' => 'l5qSuxhPQf'
            ),
            array(
                'contacts_id' => '487',
                'username' => 'Ve 27',
                'preparepass' => 'qa7Uubq3di'
            ),
            array(
                'contacts_id' => '488',
                'username' => 'Ve 28',
                'preparepass' => 'stadt Michel'
            ),
            array(
                'contacts_id' => '489',
                'username' => 'Ve 29',
                'preparepass' => '8g3KrRXNYW'
            ),
            array(
                'contacts_id' => '490',
                'username' => 'Ve 30',
                'preparepass' => '1ZqMZbLXOX'
            ),
            array(
                'contacts_id' => '491',
                'username' => 'Ve 31',
                'preparepass' => 'Cd1XA49S6e'
            ),
            array(
                'contacts_id' => '492',
                'username' => 'Ve 32',
                'preparepass' => 'oywSQ2JFoh'
            ),
            array(
                'contacts_id' => '493',
                'username' => 'Ve 33',
                'preparepass' => 'QDzt76dXuu'
            ),
            array(
                'contacts_id' => '494',
                'username' => 'Ve 34',
                'preparepass' => 'TxVbufldYy'
            ),
            array(
                'contacts_id' => '495',
                'username' => 'Ve 35',
                'preparepass' => 'aGgqZum5Up'
            ),
            array(
                'contacts_id' => '496',
                'username' => 'Ve 36',
                'preparepass' => 'QlPlOQOkqT'
            ),
            array(
                'contacts_id' => '497',
                'username' => 'Ve 37',
                'preparepass' => 'GVjp0Njnhy'
            ),
            array(
                'contacts_id' => '498',
                'username' => 'Ve 38',
                'preparepass' => 'jYJcLuzDz7'
            ),
            array(
                'contacts_id' => '499',
                'username' => 'Ve 39',
                'preparepass' => 'YJkwAXlBhs'
            ),
            array(
                'contacts_id' => '500',
                'username' => 'Ve 40',
                'preparepass' => 'zYARkQ2t0l'
            ),
            array(
                'contacts_id' => '501',
                'username' => 'Ve 41',
                'preparepass' => 'XWhbDsNcFx'
            ),
            array(
                'contacts_id' => '502',
                'username' => 'Ve 42',
                'preparepass' => 'qaUuv5wW5U'
            ),
            array(
                'contacts_id' => '503',
                'username' => 'Ve 43',
                'preparepass' => 'Qi20SG2pjD'
            ),
            array(
                'contacts_id' => '504',
                'username' => 'Ve 44',
                'preparepass' => 'vyccuoZncO'
            ),
            array(
                'contacts_id' => '505',
                'username' => 'Ve 45',
                'preparepass' => 'S77e52ican'
            ),
            array(
                'contacts_id' => '506',
                'username' => 'Ve 46',
                'preparepass' => 'osE6712u7p'
            ),
            array(
                'contacts_id' => '507',
                'username' => 'Ve 47',
                'preparepass' => '2YOJJRH80o'
            ),
            array(
                'contacts_id' => '508',
                'username' => 'Ve 48',
                'preparepass' => '3jo5WHyDfP'
            ),
            array(
                'contacts_id' => '509',
                'username' => 'Ve 49',
                'preparepass' => 'TjpCBYdptf'
            ),
            array(
                'contacts_id' => '510',
                'username' => 'Ve 50',
                'preparepass' => 'Q1lF1DZ6Bl'
            ),
            array(
                'contacts_id' => '511',
                'username' => 'Ve 51',
                'preparepass' => 'S0w5aajAb6'
            ),
            array(
                'contacts_id' => '512',
                'username' => 'Ve 52',
                'preparepass' => 'wuceTYbD9e'
            ),
            array(
                'contacts_id' => '513',
                'username' => 'Ve 53',
                'preparepass' => '5ELlXn6atb'
            ),
            array(
                'contacts_id' => '514',
                'username' => 'Ve 54',
                'preparepass' => 'QCB5gy9nMo'
            ),
            array(
                'contacts_id' => '515',
                'username' => 'Ve 55',
                'preparepass' => 'HVV3YjXHBp'
            ),
            array(
                'contacts_id' => '516',
                'username' => 'Ve 56',
                'preparepass' => 'QlmjEAnpgs'
            ),
            array(
                'contacts_id' => '517',
                'username' => 'Ve 57',
                'preparepass' => 'OnlAmOuuwF'
            ),
            array(
                'contacts_id' => '518',
                'username' => 'Ve 58',
                'preparepass' => 'yT6NvGR1l1'
            ),
            array(
                'contacts_id' => '519',
                'username' => 'Ve 59',
                'preparepass' => 'wrSQBdM6p6'
            ),
            array(
                'contacts_id' => '520',
                'username' => 'Ve 60',
                'preparepass' => 'S3kTVhAvRO'
            ),
            array(
                'contacts_id' => '521',
                'username' => 'Ve 61',
                'preparepass' => 'Rq781nYY0W'
            ),
            array(
                'contacts_id' => '522',
                'username' => 'Ve 62',
                'preparepass' => 'QfCLQubp2D'
            ),
            array(
                'contacts_id' => '523',
                'username' => 'Ve 63',
                'preparepass' => 'jWqaElF2cJ'
            ),
            array(
                'contacts_id' => '524',
                'username' => 'Ve 64',
                'preparepass' => 'KzGxGan0PN'
            ),
            array(
                'contacts_id' => '525',
                'username' => 'Ve 65',
                'preparepass' => 'V45OczhXPY'
            ),
            array(
                'contacts_id' => '526',
                'username' => 'Ve 66',
                'preparepass' => 'QwS9yTen9k'
            ),
            array(
                'contacts_id' => '527',
                'username' => 'Ve 67',
                'preparepass' => 'gpoF4FqO3N'
            ),
            array(
                'contacts_id' => '528',
                'username' => 'Ve 68',
                'preparepass' => 'BjrQuaD8tb'
            ),
            array(
                'contacts_id' => '529',
                'username' => 'Ve 69',
                'preparepass' => '3UhQkAgERR'
            ),
            array(
                'contacts_id' => '530',
                'username' => 'Ve 70',
                'preparepass' => 'ldlOJkbrFq'
            ),
            array(
                'contacts_id' => '531',
                'username' => 'Ve 71',
                'preparepass' => 'BPLAUDvxlm'
            ),
            array(
                'contacts_id' => '532',
                'username' => 'Ve 72',
                'preparepass' => 'mS5fydCuUr'
            ),
            array(
                'contacts_id' => '533',
                'username' => 'Ve 73',
                'preparepass' => 'aXElfXU4hG'
            ),
            array(
                'contacts_id' => '535',
                'username' => 'Ve 75',
                'preparepass' => 'WWMR7XJHFc'
            ),
            array(
                'contacts_id' => '536',
                'username' => 'Ve 76',
                'preparepass' => 'cueKxTNUBq'
            ),
            array(
                'contacts_id' => '537',
                'username' => 'Ve 77',
                'preparepass' => 'ELqlzD0oJ6'
            ),
            array(
                'contacts_id' => '538',
                'username' => 'Ve 78',
                'preparepass' => '8Jrepvpwko'
            ),
            array(
                'contacts_id' => '539',
                'username' => 'Ve 79',
                'preparepass' => '7a1RmvtNK3'
            ),
            array(
                'contacts_id' => '540',
                'username' => 'Ve 80',
                'preparepass' => 'ReDOZgejse'
            ),
            array(
                'contacts_id' => '541',
                'username' => 'Ve 81',
                'preparepass' => 'lwh0c3aGz4'
            ),
            array(
                'contacts_id' => '542',
                'username' => 'Ve 82',
                'preparepass' => 'EUutK1iKxK'
            ),
            array(
                'contacts_id' => '543',
                'username' => 'Ve 83',
                'preparepass' => 'iiVAg2C9CL'
            ),
            array(
                'contacts_id' => '544',
                'username' => 'Ve 84',
                'preparepass' => 'smAfGHQlEs'
            ),
            array(
                'contacts_id' => '545',
                'username' => 'Ve 85',
                'preparepass' => 'RXiJVftjlQ'
            ),
            array(
                'contacts_id' => '546',
                'username' => 'Ve 86',
                'preparepass' => 'VT5bq1lNtl'
            ),
            array(
                'contacts_id' => '547',
                'username' => 'Ve 87',
                'preparepass' => 'BluGGN9AFX'
            ),
            array(
                'contacts_id' => '548',
                'username' => 'Ve 88',
                'preparepass' => 'aA8N33eukB'
            ),
            array(
                'contacts_id' => '549',
                'username' => 'Ve 89',
                'preparepass' => 'm1KCLS7thp'
            ),
            array(
                'contacts_id' => '550',
                'username' => 'Ve 90',
                'preparepass' => 'k21vfiU38w'
            ),
            array(
                'contacts_id' => '551',
                'username' => 'Ve 91',
                'preparepass' => 'OcfZ3w5Ftp'
            ),
            array(
                'contacts_id' => '552',
                'username' => 'Ve 92',
                'preparepass' => 'dTFmhCgfBR'
            ),
            array(
                'contacts_id' => '553',
                'username' => 'Ve 93',
                'preparepass' => 'mFp2vjTlMY'
            ),
            array(
                'contacts_id' => '554',
                'username' => 'Ve 94',
                'preparepass' => 'S9S1eVH2cC'
            ),
            array(
                'contacts_id' => '555',
                'username' => 'Ve 95',
                'preparepass' => 'ci2FCGJMcl'
            ),
            array(
                'contacts_id' => '556',
                'username' => 'Ve 96',
                'preparepass' => '7PLq8kxLOb'
            ),
            array(
                'contacts_id' => '557',
                'username' => 'Ve 97',
                'preparepass' => 'wfocOpzRyp'
            ),
            array(
                'contacts_id' => '558',
                'username' => 'Ve 98',
                'preparepass' => 'My424fFwKv'
            ),
            array(
                'contacts_id' => '559',
                'username' => 'Ve 99',
                'preparepass' => '11ATsFeLyY'
            ),
            array(
                'contacts_id' => '560',
                'username' => 'Ve 100',
                'preparepass' => 'Bou2KQToHq'
            ),
            array(
                'contacts_id' => '561',
                'username' => 'Ve 101',
                'preparepass' => 'Ms1PGPcNaA'
            ),
            array(
                'contacts_id' => '562',
                'username' => 'Ve 102',
                'preparepass' => 'OK58oNtSHn'
            ),
            array(
                'contacts_id' => '563',
                'username' => 'Ve 103',
                'preparepass' => 'iHHbUCbtlL'
            ),
            array(
                'contacts_id' => '564',
                'username' => 'Ve 104',
                'preparepass' => 'MDn8E65WEY'
            ),
            array(
                'contacts_id' => '565',
                'username' => 'Ve 105',
                'preparepass' => '0AYJKcjrzs'
            ),
            array(
                'contacts_id' => '566',
                'username' => 'Ve 106',
                'preparepass' => 'trhYs8Tbgf'
            ),
            array(
                'contacts_id' => '567',
                'username' => 'Ve 107',
                'preparepass' => 'oSE3dxbQDl'
            ),
            array(
                'contacts_id' => '568',
                'username' => 'Ve 108',
                'preparepass' => 'Aup4Lra4nh'
            ),
            array(
                'contacts_id' => '569',
                'username' => 'Ve 109',
                'preparepass' => 'qJJ0lbo8HY'
            ),
            array(
                'contacts_id' => '570',
                'username' => 'Ve 110',
                'preparepass' => '5bHpArM4gV'
            ),
            array(
                'contacts_id' => '571',
                'username' => 'Ve 111',
                'preparepass' => 'DjQe0ukF2j'
            ),
            array(
                'contacts_id' => '572',
                'username' => 'Ve 112',
                'preparepass' => '5fEvKWgkgp'
            ),
            array(
                'contacts_id' => '573',
                'username' => 'Ve 113',
                'preparepass' => 'rHkqGmYCXb'
            ),
            array(
                'contacts_id' => '575',
                'username' => 'Ve 115',
                'preparepass' => 'A1bK34ZNib'
            )
        )
        ;         

    }
}