/*
Draggable - expetcs a .drag-zone within which elements with the .draggable class can be dragged and
.target elements into which they can be dropped.
*/

var sheet = document.createElement('style');
sheet.innerHTML = ".draggable{ border: 3px solid transparent; cursor: pointer; -webkit-user-select: none; -moz-user-select: none; -khtml-user-select: none; user-select: none; } .ghost{ border: 3px solid grey; box-shadow: 1px 1px 1px 1px lightgrey; opacity: 0.5; padding: 0.2em; position: absolute; } .draggable:hover{ border: 3px solid grey; box-shadow: 1px 1px 1px 1px lightgrey; } .drag-active{ border: 3px solid grey; box-shadow: 1px 1px 1px 1px lightgrey; } .drag-zone{ padding: 1em; } .target{ border: 3px solid black; height: 3em; -webkit-user-select: none; -moz-user-select: none; -khtml-user-select: none; user-select: none; width: 100%;}";
document.head.appendChild(sheet);
console.log(sheet);
$(function() {
    var dragging = false,
        dragee,
        ghost;

    function makeGhost(element){
        var ghost = element.clone();
        ghost.addClass('ghost');
        console.log(element);
        ghost.width = element.width;
        return ghost
    };

    function cleanDisplay(){
        $('.drag-active').removeClass('drag-active');
    };

    $('.draggable').on('mousedown', function(e){
        dragging = true;
        dragee = $(this);
        ghost = makeGhost(dragee);
        $(this).addClass('drag-active');
        $('body').prepend(ghost);
        ghost.css({'top': e.pageY - 15, 'left': e.pageX - 15});
    });

    $('.drag-zone').on('mouseup', function(e){
        if(dragging && ($(e.target).hasClass("target")) || $(e.target).parent().hasClass('target') ) {
            var $target = $(e.target).closest('.target');
            $target.children().remove();
            $target.append(ghost);
            if(ghost.hasClass('ghost')){
                ghost.removeClass('draggable drag-active ghost');
                ghost.css({'top': 0, 'left': 0, 'position': 'inherit'});
            }
            ghost = {};
        } else {
            ghost.remove();
        }
        dragging = false;
        cleanDisplay();
    });
    $('.drag-zone').on('mousemove', function(e){
        if(dragging) {
            ghost.css({'top': e.pageY - 15, 'left': e.pageX - 15});
        }
    });
    $('.drag-zone').on('mouseleave', function(e){
        if(dragging){
            dragging = false;
            ghost.remove();
            cleanDisplay();
        }
    });
    //delete the ghost if the mouseup is outside a target
    $('.draggable').on('mouseup', function(e){
        dragging = false;
        ghost.remove();
        cleanDisplay();
    });
});
