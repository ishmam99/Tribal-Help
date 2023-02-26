/*
* ----------------------------------------------------------------------------------------
    Jquery custom code file
* ----------------------------------------------------------------------------------------
*/
    /*-------- Bangla Date -------*/

    const fullDate = new Date();
    const year = fullDate.getFullYear();
    const month = fullDate.getMonth() ;
    const date = fullDate.getDate();

    const number =['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
    const monthName = ['জানুয়ারি','ফেব্রুয়ারি ','মার্চ ','এপ্রিল ','মে','জুন','জুলাই ','আগস্ট ','সেপ্টেম্বর ','অক্টোবর','নভেম্বর ','ডিসেম্বর '];
    const convertNumber = (n)=>n.toString().split("").map(num=> number[num]).join('');
    const convertMonth = (n)=>n.toString().split("").map(num=> monthName[num]).join('');

    const datePlace = document.querySelector('span.date');
  //  datePlace.textContent = convertNumber(date) + ' ' + monthName[month] + ', ' + convertNumber(year);

$(function(){

    $('#slider_area').owlCarousel({
        loop:true,
        margin:0,
        mouseDrag:false,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        nav:false,
        dots:true,
        items:1,
        responsive : {
            // breakpoint from 0 up
            0 : {
                dots:false
            },
            600 : {
                dots:true
            }
        },
        mouseDrag:false,
        touchDrag:false,
        animateOut: 'fadeOut',
        autoplaySpeed:1500,
        smartSpeed: 1000,
        navSpeed:1500,
        navText: ['<i class="fas fa-angle-left"><i>','<i class="fas fa-angle-right"><i>'],
        navElement: 'a'
    });

    function scrollBtn() {
        let windowHeight = $(window).scrollTop(); 

        if (windowHeight > 200) {
            $('#scroll_to_top').fadeIn('400');
        }
        else {
            $('#scroll_to_top').fadeOut('400');
        }  
    }

    $(window).on('scroll', function(){
        scrollBtn();
    });
    scrollBtn();

});
