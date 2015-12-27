# Define image formats.
# Important: This is only for the Backend. If you change this, you also need to
# change the image_format array in the ts setup.
TCEFORM {
    tt_content {
        image_format.addItems {
            0 = Original
            1 = 16:9
            2 = 16:10
            3 = 4:3
            4 = 2:1
            5 = 1:1
        }
    }
}   
TCAdefaults.tt_content.image_format = 0
