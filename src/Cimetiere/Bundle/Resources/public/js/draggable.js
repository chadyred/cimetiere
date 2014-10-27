// Your original element
var ele = $('.draggable');

$('.draggable').draggable({
    helper: "clone"
});
$('.draggable').bind('dragstop', function (event, ui) {
    if ($(ui.helper).hasClass('rotator'))
        return true
    $(this).after($(ui.helper).clone().draggable());
    applyRotation();
});

// Create handle dynamically
$('<div class="rotator"></div>').appendTo(ele).addClass('handler').css({
    'position': 'absolute',
        'bottom': 5,
        'right': 5,
        'height': 10,
        'width': 10,
        'background-color': 'green'
});

ele.css('position', 'relative');

applyRotation();

function applyRotation() {
    $('.handler').draggable({
        opacity: 0.01,
        helper: 'clone',
        drag: function (event, ui) {
            var rotateCSS = 'rotate(' + ui.position.left + 'deg)';

            $(this).parent().css({
                '-moz-transform': rotateCSS,
                    '-webkit-transform': rotateCSS
            });
        }
    });
}