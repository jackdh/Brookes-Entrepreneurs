
var $popover = $('[data-toggle=popover]').popover();
//first event handler for bad button
$('.bad').click(function () {
    alert("clicked");
});

$(document).on("click", function (e) {
    var $target = $(e.target),
        isPopover = $(e.target).is('[data-toggle=popover]'),
        inPopover = $(e.target).closest('.popover').length > 0 
    //does absolutely nothing. Only wastes memory
    $('.bad').click(function () { 
        console.log('clicked');
        return false;
    });
    
    //hide only if clicked on button or inside popover
    if (!isPopover && !inPopover) $popover.popover('hide');
});

