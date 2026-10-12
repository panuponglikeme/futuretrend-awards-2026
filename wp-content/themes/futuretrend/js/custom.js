window.addEventListener('load', function () {
    var header = document.querySelector('#masthead')

    document.addEventListener('scroll', () => {
        addSticky()
    })

    function addSticky() {
        if ( window.scrollY > 50 ) {
            header.classList.add('sticky')
        } else {
            header.classList.remove('sticky')
        }
    }addSticky()
})

function closeModal() {
    document.documentElement.style.overflow = 'auto'
    document.querySelectorAll('.modal').forEach(function(el){
        el.style.display = 'none';
    })
}

function hiddenScrolling() {
    document.documentElement.style.overflow = 'hidden'
}

    //Open Tab Corp
    function openCorp(evt, tabID) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent-corp");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks-corp");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabID).style.display = "block";
        evt.currentTarget.className += " active";
    }
    var getEleCl = document.getElementsByClassName("awards-cl-wrapper");
    // if ( getEleCl.length ) {
    //     document.getElementById("defaultOpenCorp").click();
    //     document.getElementById("defaultOpenLead").click();
    // }

    //Open Tab Beloved
    function openBeloved(evt, tabID) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent-beloved");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks-beloved");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabID).style.display = "block";
        evt.currentTarget.className += " active";
    }

    //Open Tab Better
    function openBetter(evt, tabID) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent-better");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks-better-world");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabID).style.display = "block";
        evt.currentTarget.className += " active";
    }

    //Open Tab Lead
    function openLead(evt, tabID) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent-lead");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks-lead");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabID).style.display = "block";
        evt.currentTarget.className += " active";
    }

    //Corp & Lead tab filter
    let tabBtnCL = document.querySelectorAll('.tab-button-corp-lead');
    let tabContentCL = document.querySelectorAll('.tab-content-corp-lead');

    if ( getEleCl.length ) {
        tabBtnCL.forEach(function(el) {
            el.addEventListener('click', function(){
                document.querySelector('.tab-button-corp-lead.active').classList.remove('active');
                el.classList.add('active');

                var dataTarget = el.dataset.target
                //console.log(dataTarget);
                document.querySelector('.tab-content-corp-lead.active').classList.remove('active');

                tabContentCL.forEach(function(elc){
                    if ( elc.getAttribute("data-target") == dataTarget ) {
                        elc.classList.add('active');
                    }
                });
            });
        });
    }

jQuery(document).ready(function($){
    //Hamberger
    $('.hamberger').click(function(){
        $(this).toggleClass('active');
        $('.main-navigation').toggleClass('active');
        $('.overlay').toggleClass('active');
        $('#masthead').toggleClass('active');
    });

    $('.overlay').click(function(){
        $('.hamberger').removeClass('active');
        $('.main-navigation').removeClass('active');
        $('.overlay').removeClass('active');
    });

    //Video popup
    $('.play-video').magnificPopup({
        mainClass: 'mfp-fade',
        removalDelay: 160,
        type: 'iframe',
        iframe: {
            markup: '<div class="mfp-iframe-scaler">' +
                '<div class="mfp-close"></div>' +
                '<iframe class="mfp-iframe" frameborder="0" allow="autoplay"></iframe>' +
                '</div>',
            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: 'v=',
                    src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                }
            }
        }
    });

})