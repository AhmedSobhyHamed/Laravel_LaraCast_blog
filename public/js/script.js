let theScript = (_=>{
    'use strict';
    $('.flash-message-box').delay(4000).fadeOut(1000);
    $('#logoutlink').on('click',function(e){
        e.preventDefault();
        $('#logoutform').trigger('submit');
    })
});
window.addEventListener('load',theScript);