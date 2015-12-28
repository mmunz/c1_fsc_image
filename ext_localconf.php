<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Register Icon
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'c1_fsc_image', \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class, [
        'source' => 'EXT:c1_fsc_image/Resources/Public/Icons/c1_fsc_image.svg'
    ]
);
?>
