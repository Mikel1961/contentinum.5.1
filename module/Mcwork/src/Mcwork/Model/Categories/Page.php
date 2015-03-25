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
 * @category Mcwork
 * @package Model
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Model\Categories;




/**
 * Page categories model
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Page extends AbstractCategories
{

    const ENTITY_ITEM = 'Contentinum\Entity\WebContentGroups';

    const ENTITY_GROUP = 'Contentinum\Entity\WebPagesParameter';

    const ENTITY_CATEGORIES = 'Contentinum\Entity\WebPagesContent';

    const CATEGORIES_GROUP = 'webPages';

    const CATEGORIES_ITEM = 'webContentgroup';

    const CATEGORY_TABLE_NAME = 'web_pages_content';

    const CATEGORY_ITEM_TABLE_NAME = 'web_content_groups';

    const CATEGORY_ITEM_PRIMARY = 'id';

    const CATEGORY_GROUP_TABLE_NAME = 'web_pages_parameter';

    const CATEGORY_GROUP_PRIMARY = 'id';

    const CATEGORY_COL_GROUP = 'web_pages_id';

    const CATEGORY_COL_ITEM = 'web_contentgroup_id';

    

}