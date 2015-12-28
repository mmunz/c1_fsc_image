mod {
    web_layout.tt_content.preview.image = EXT:c1_fsc_image/Resources/Private/Templates/Preview/ResponsiveImage.html
    wizards.newContentElement.wizardItems.common {
        #header = LLL:EXT:c1_fsc_image/Resources/Private/Language/TCA.xlf:tab_images
        elements {
            image {
                iconIdentifier = c1_fsc_image
                title       = LLL:EXT:c1_fsc_image/Resources/Private/Language/TCA.xlf:c1_fsc_image
                description = LLL:EXT:c1_fsc_image/Resources/Private/Language/TCA.xlf:c1_fsc_image_description
                tt_content_defValues {
                    CType = image
                }
            }
        }
        show := addToList(image)
    }
}