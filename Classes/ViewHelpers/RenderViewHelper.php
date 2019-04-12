<?php

namespace Pierraa\ViewhelperProblem\ViewHelpers;

class RenderViewHelper extends \FluidTYPO3\Vhs\ViewHelpers\Content\RenderViewHelper
{
  /**
  * Holds the content of hidden pid records if BE admin is logged in
  * @var null|string
  */
  protected $pierratePageContents = NULL;

  /**
     * Overwrites VHS Content/RenderViewHelper, so it shows the content
     * if a valid backend user session is found
     * Render method
     *
     * @return string
     */
    public function render()
    {
        if ('BE' === TYPO3_MODE) {
            return '';
        }

        if(isset($GLOBALS['BE_USER']) &&
                        !empty($GLOBALS['BE_USER']) &&
                        $GLOBALS['BE_USER']->isAdmin()) {
          $this->pierraPageContents = $this->getPageContentForAdmin();
        }
        $content = $this->getContentRecords();
        if (false === $this->hasArgument('as')) {
            return implode(LF, $content);
        }
        return $this->renderChildrenWithVariableOrReturnInput($content);
    }

    protected function getPageContentForAdmin() {
        $rows = \TYPO3\CMS\Backend\Utility\BackendUtility::getRecord(
            'tt_content',
            [
                'where' => '1=1 AND hidden = 0 AND deleted = 0',
                'pidInList' => $this->getPageUid(),
                'includeRecordsWithoutDefaultTranslation' => !$this->arguments['hideUntranslated']
            ]
        );
        return $rows;
    }

    /**
     * @return array
     */
    protected function getContentRecords()
    {
        if(isset($this->pierraPageContents)) {
          $contentRecords = [$this->pierraPageContents];
        } else {
          return parent::getContentRecords();
        }

        if (true === (boolean) $this->arguments['render']) {
            $contentRecords = $this->getRenderedRecords($contentRecords);
        }
        return $contentRecords;
    }
}

?>
