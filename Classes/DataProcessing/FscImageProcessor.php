<?php

namespace C1\C1FscImage\DataProcessing;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Service\TypoScriptService;

/**
 * Class for data processing for the content element "c1_fsc_image"
 */
class FscImageProcessor implements DataProcessorInterface {

    /**
     * @return void
     */
    public function __construct() {
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
     * Process data for the content element "c1_fsc_image"
     *
     * @param ContentObjectRenderer $cObj The data of the content element or page
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array the processed data as key/value store
     */
    public function process(
    ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData
    ) {
        if (is_array($this->settings['image_formats'])) {
            $image_format = $processedData['data']['image_format'];
            $processedData['image_ratio'] = $this->settings['image_formats'][$image_format]['ratio'];
        }
        return $processedData;
    }

}
