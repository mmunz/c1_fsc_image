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

$GLOBALS['TCA']['tt_content']['types']['c1_fsc_image'] = array(
    'showitem' => '
        --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
        --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.header;header,
        assets,
     --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.appearance,
        layout;' . $frontendLanguageFilePrefix . 'layout_formlabel,
		--palette--;' . $languageFilePrefix . 'tt_content.palette.mediaAdjustments;mediaAdjustments,
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
                'maxitems' => 1,
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
