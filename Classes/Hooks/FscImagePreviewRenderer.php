<?php

namespace C1\C1FscImage\Hooks;

use TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Service\TypoScriptService;

class FscImagePreviewRenderer implements PageLayoutViewDrawItemHookInterface
{
    /**
     * Preprocesses the preview rendering of a content element of type "c1_fsc_image"
     *
     * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject Calling parent object
     * @param bool $drawItem Whether to draw the item using the default functionality
     * @param string $headerContent Header content
     * @param string $itemContent Item content
     * @param array $row Record row of tt_content
     * @return void
     */
    
    /**
     * @return ImageRenderer
     */
    public function __construct() {
        $this->settings = [];
        $this->typoScriptService = GeneralUtility::makeInstance(TypoScriptService::class);
        $this->getConfiguration();
    }
    
    /**
     * @return void
     */
    protected function getConfiguration() {
        $configurationManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Configuration\\BackendConfigurationManager');
        $configuration = $configurationManager->getTypoScriptSetup();
        $settings = $this->typoScriptService->convertTypoScriptArrayToPlainArray($configuration);
        $this->settings = is_array($settings['plugin']['tx_c1fscimage']['settings']) ? $settings['plugin']['tx_c1fscimage']['settings'] : [];

    }
    
    /**
     * @return void
     */
    protected function setPreviewHeight() {
        $image_format = $this->settings['image_format'];
        $ratio = $this->settings['image_formats'][$image_format]['ratio'];
        if ($ratio && $ratio > 0) {
            $this->settings['preview']['height'] = round($this->settings['preview']['width'] / $ratio); 
        }
    }
    
    public function preProcess(PageLayoutView &$parentObject, &$drawItem, &$headerContent, &$itemContent, array &$row)
    {
        if ($row['CType'] === 'c1_fsc_image') {
            $this->settings['preview']['width'] = 200;
            $this->settings['image_format'] = $row['image_format'];
            if (is_array($this->settings['image_formats'])) {
                $this->setPreviewHeight();
            }
            $row['settings'] = $this->settings;
            
        }
    }
}