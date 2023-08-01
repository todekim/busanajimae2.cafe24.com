$(document).ready(function(){

    var winTop = $(window).scrollTop()

    $(window).scroll(function(){
        headerEvent();
        // sec16Event();
    })

    headerEvent();

    function headerEvent(){
        winTop = $(window).scrollTop();
        var navB = $('nav').hasClass('on')
        if(winTop > 0){
            $('header').addClass('on')
        }else if(winTop <= 0 && navB == false){
            $('header').removeClass('on')
        }
    }

    $('header .logo').click(function(){
        $('html, body').animate({scrollTop: 0}); 
    })

    $('nav a').click(function(){
        var lnk = $(this).attr('href');
        var hash = lnk.substring(lnk.lastIndexOf("#") + 1);
        var pageTop = $('#' + hash).offset().top
        var headerH = $('header').height();

        $('html, body').animate({scrollTop: pageTop-headerH}); 
    })

    $('footer .site-list>a').click(function(e){
        e.preventDefault();
        $(this).next().toggleClass('on');
    })

    btnTop();

    function btnTop(){
        var standard1 = $(window).scrollTop() + $(window).height();
        var standard2 = $('footer').offset().top

        if( standard2 >= standard1){
            $('#fb').removeClass('off');
        }else{
            $('#fb').addClass('off');
        }
    }
    
    $(window).scroll(function(){
        btnTop();
    })

    shopAni();
    function shopAni(){
        var listW = ($('footer .shop-list').width()*2) / $('footer .shop-list .list ul').width();
        const listFor = Math.floor(listW)

        if(listW > $(window).width()){
            $('footer .shop-list .list').append($('footer .shop-list ul').eq(0).clone())
        }else{
            for(let i = 0; i <=listFor; i++){
                $('footer .shop-list .list').append($('footer .shop-list ul').eq(0).clone())
            }
            return;
        }
    }
    
    const listNum = $('footer .shop-list li').length
    $('footer .shop-list .list').css('animation-duration',(listNum*2)+'s')

    $('#sec_story .cate li').click(function(){
        $('#sec_story .cate li').removeClass('active');
        $(this).addClass('active');
    })

    //AOS
    AOS.init({
        duration: 1000
    });
})