$j = jQuery.noConflict();

function get_container_width() {
    var width = 0;
    width += (($j('#column_width').val()*1 + $j('#gutter_width').val()*1) * $j('#column_count').val()*1) - $j('#gutter_width').val()*1;
    return width;
}

function update_container_width() {
    $j('#container-width strong').text(get_container_width);
}

$j(function() {
    $j('#bp-gen-form input[type=submit]').parent().before('<p id="container-width">Container width: <strong></strong>px</p>');
    update_container_width();
    $j('#bp-gen-form input[type=text]').keyup(update_container_width);
    
    $j('#bp-gen-form input[type=text]').keydown(function(event) {
        
        if (event.keyCode == '38' || event.keyCode == '40') {
            event.preventDefault();
            if (event.keyCode == '38') {
                $j(this).val($j(this).val()*1+1);
            } else if (event.keyCode == '40') {
                $j(this).val($j(this).val()*1-1);
            }
        }
        
    });
    
});