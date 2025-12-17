<div id="speaker" class="spk-wrapper">
    <div class="inner-spk-wrapper">
        <?php
            if( $home_spk_title ) {
                echo '<h2>'.$home_spk_title.'</h2>';
            }
        ?>

        <div id="spk-list-wrapper" class="spk-list-wrapper">Loading.....</div>
    </div>

    <img src="/wp-content/themes/futuretrend/assets/images/cube-2.png" class="cube-2">
</div>

<div id="modal-spk" class="modal modal-spk" style="display: none;">
    <div class="modal-inner">
        <div class="inner">
            <button onclick="closeModal()" class="modal-close"></button>
            <div id="modal-stage-spk" class="modal-stage-spk"></div>
        </div>
    </div>
    <div onclick="closeModal()" class="modal-bg"></div>
</div>

<script>
    let speakerID = document.querySelector('#speaker')

    if ( speakerID ) {
        function spkList(){
            let requestOptions = {
                method: 'GET',
                redirect: 'follow',
            }

            let targetURL = '/wp-json/wp/v2/speaker?per_page=1000'

            fetch(targetURL, requestOptions)
            .then(response => response.text())
            .then(result => {
                var resultObjSpk = JSON.parse(result)
                //console.log(resultObjSpk)

                theObjSpk = resultObjSpk

                let html = ''
                for(let i = 0; i < resultObjSpk.length; i++) {
                    let thespks = resultObjSpk[i]
                    let spkColor = ""

                    if ( thespks.spk_color != "" ) {
                        spkColor = thespks.spk_color
                    } else {
                        spkColor = '#4c4c4c'
                    }

                    html += `
                        <div class="item" onclick="openModalSpk(${i})" style="background-color: ${spkColor}">
                            <img src="${thespks.spk_thumbnail_img_url}" class="thumbnail">
                            <figure class="logo"><img src="${thespks.spk_logo}"></figure>
                            <div class="wrapper-details">
                                <h4 class="name">${thespks.spk_name}</h4>
                                <p class="company">${thespks.spk_company_initial}</p>
                            </div>
                        </div>
                    `
                }
                document.querySelector('#spk-list-wrapper').innerHTML = html;
            })
            .catch(error => console.log('error', error))
        }
        spkList()
    }

    //Modal
    var postIndex = 0;
    function openModalSpk(index) {
        hiddenScrolling()

        postIndex = index;
        //console.log(postIndex)
        document.querySelector('#modal-spk').style.display = 'block';

        let spkColor = ""
        if ( theObjSpk[postIndex].spk_color != "" ) {
            spkColor = theObjSpk[postIndex].spk_color
        } else {
            spkColor = '#4c4c4c'
        }

        let modalHtml = ''
        modalHtml += `
            <div class="left" style="background-color: ${spkColor}">
                <img src="${theObjSpk[postIndex].spk_thumbnail_img_url}" class="thumbnail">
                <figure class="logo"><img class="spk-modal-logo" src="${theObjSpk[postIndex].spk_logo}"></figure>
                <div class="wrapper-details">
                    <h4 class="name">${theObjSpk[postIndex].spk_name}</h4>
                    <p class="company">${theObjSpk[postIndex].spk_company_initial}</p>
                </div>
            </div>
            
            <div class="right">
                <p class="top-subject">${theObjSpk[postIndex].spk_top_subject}</p>
                <h3 class="title">${theObjSpk[postIndex].spk_subject}</h3>

                <div class="position-wrapper">
                    <p class="position">${theObjSpk[postIndex].spk_position}, </p>
                    <p class="company">${theObjSpk[postIndex].spk_company_full}</p>
                </div>

                <div class="time-wrapper">
                    <p class="keynote">${theObjSpk[postIndex].spk_keynote}</p>
                    <p class="time">${theObjSpk[postIndex].spk_time}</p>
                </div>

                <p class="text">Speaker</p>
            </div>
        `
        document.querySelector('#modal-stage-spk').innerHTML = modalHtml;
    }
</script>