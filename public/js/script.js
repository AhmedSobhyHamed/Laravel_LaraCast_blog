let theScript = (_=>{
    'use strict';
    $('.flash-message-box').delay(4000).fadeOut(1000);
    $('#logoutlink').on('click',e=>{
        e.preventDefault();
        $('#logoutform').trigger('submit');
    });
    let deleteforms = $('[url="deletePostForm"]');
    $('[href="deletePostAnchor"]').each((i,e)=>{$(e).on('click',e=>{
        e.preventDefault();
        $(deleteforms[i-1]).trigger('submit');
    })});
    // $('#commentFormID').on('submit',e=>{
    //     e.preventDefault();
    //     let resault ={};
    //     $('#commentFormID').find('input').each((i,e)=>resault[e.name]=e.value);
    //     if($('#commentFormID').find('input[type="text"]').val().length>0)
    //     fetch(e.target.action,{
    //         method: "POST",
    //         body:JSON.stringify(resault)
    //     }).then(x=>console.log(x));
    // });
});
window.addEventListener('load',theScript);