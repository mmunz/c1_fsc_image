<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// c1_fsc_image
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content', 'CType', [
        'LLL:EXT:c1_fsc_image/Resources/Private/Language/TCA.xlf:c1_fsc_image',
        'c1_fsc_image',
        'c1_fsc_image'
    ], 'html', 'after'
);

// Add additional fields for bullets + upload CTypes
$additionalColumns = [
    'image_format' => [
        'exclude' => true,
        'label' => 'Image Format',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
        ]
    ],
];
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $additionalColumns);
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('tt_content', 'imagelayout', 'image_layout');


$GLOBALS['TCA']['tt_content']['types']['c1_fsc_image'] = array(
    'showitem' => '
        --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
        --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.header;header,
        assets,
     --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.appearance,
        layout;LLL:EXT:cms/locallang_ttc.xlf:layout_formlabel,
        imagecols;LLL:EXT:cms/locallang_ttc.xlf:imagecols_formlabel,
        image_format;Format,
		--palette--;LLL:EXT:cms/locallang_ttc.xlf:tt_content.palette.mediaAdjustments;mediaAdjustments,
     --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
        --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.visibility;visibility,
        --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.access;access,
     --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.extended
',
// one image is required and maximum
    'columnsOverrides' => array(
        'assets' => array(
            'config' => array(
                'minitems' => 1,
                'maxitems' => 20,
                'foreign_selector_fieldTcaOverride' => array(
                    'config' => array(
                        'appearance' => array(
                            'elementBrowserType' => 'file',
                            'elementBrowserAllowed' => 'gif,jpg,jpeg,png,svg'
                        )
                    )
                )
            )
        )
    )
);
?>
