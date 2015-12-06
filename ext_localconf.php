<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Register Icon
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'fsc_responsive-image', \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class, [
        'source' => 'EXT:c1_fsc_image/Resources/Private/Icons/c1_fsc_image.svg'
    ]
);
?>
