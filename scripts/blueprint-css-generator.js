$j = jQuery.noConflict();

function get_container_width() {
    var width = 0;
    width += (($j('#column_width').valNum() + $j('#gutter_width').valNum()) * $j('#column_count').valNum()) - $j('#gutter_width').valNum();
    console.log($j('#column_width').valNum(), $j('#gutter_width').valNum(), $j('#column_count').valNum(), width);
    return width;
}

function update_container_width() {
    var container_width = get_container_width();
    $j('#container-width strong').text(container_width);
    
    if (container_width > 0) {
        $j('#grid-preview').css('width', container_width + 'px');
        $j('#grid-preview').css('margin-left', (-1*(container_width/2)) + 'px');
    }
}

function update_column_count() {
    $j('#grid-preview').empty();
    
    var column_count = $j('#column_count').valNum();
    console.log(column_count);
    for (var i = 0; i < column_count; i++) {
        $j('#grid-preview').append('<div class="grid-preview-col">&nbsp;</div>');
    }
    
    $j('#grid-preview .grid-preview-col:last-child').addClass('last');
    
    style_cols();
}

function style_cols() {
    $j('.grid-preview-col').css('width', $j('#column_width').valNum() + 'px');
    $j('.grid-preview-col').css('margin-right', $j('#gutter_width').valNum() + 'px');
}

$j(function() {
    
    $j.fn.valNum = function() {
        console.log(this.value);
        return ($j(this).val()=="") ? 0 : $j(this).val()*1;
    }
    
    $j('#bp-gen-form input[type=submit]').before('<span id="container-width">Container width: <strong></strong>px</span>');
    
    $j('#bp-gen-form input[type=text]').keydown(function(event) {
        
        if (event.keyCode == '38' || event.keyCode == '40') {
            event.preventDefault();
            if (event.keyCode == '38') {
                $j(this).val($j(this).valNum()+1);
            } else if (event.keyCode == '40') {
                $j(this).val($j(this).valNum()-1);
            }
        }
        
    });
    
    $j('#bp-gen-form').after('<div id="grid-preview"></div>');
    
    $j('#grid-preview + div').css('margin-top', '6em');
    
    update_container_width();
    
    update_column_count();
    
    $j('.grid-preview-col').css('width', $j('#column_width').valNum() + 'px');
    $j('.grid-preview-col').css('margin-right', $j('#gutter_width').valNum() + 'px');
    
    $j('#column_count').keyup(function() {
        update_column_count();
        update_container_width();
    });
    
    $j('#column_width, #gutter_width').keyup(function() {
        style_cols();
        update_container_width();
    });
    
});