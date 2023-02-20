$(window).load(function(){
$('.s2m dd').hide();
        //$('.h4ty:first').addClass('active').next().show(); //Add "active" class to first trigger, then show/open the immediate next container
        $('.s2m dt').click(function(){
        if( $(this).next().is(':hidden') ) { 
            $('.s2m dt').removeClass('active').next().slideUp("fast"); 
            $(this).toggleClass('active').next().slideDown("fast");
            //window.scrollTo(0,190);
        }else{
            $('.s2m dd').slideUp("");
        }
            return false;
        });
});//]]> 