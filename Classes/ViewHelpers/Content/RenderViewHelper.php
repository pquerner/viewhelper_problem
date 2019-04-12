<?php

namespace Pierraa\ViewhelperProblem\ViewHelpers;


class RenderViewHelper extends \FluidTYPO3\Vhs\ViewHelpers\Content\RenderViewHelper
{

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

        var_dump($BE_USER);
        die(__METHOD__ . 'LINE : ' . __LINE__);

        $content = $this->getContentRecords();
        if (false === $this->hasArgument('as')) {
            return implode(LF, $content);
        }
        return $this->renderChildrenWithVariableOrReturnInput($content);
    }
}

?>
