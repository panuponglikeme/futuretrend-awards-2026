<?php
    $text_cmt = get_field('text_cmt','option');
?>

<div class="awards-cmt-wrapper">
    <div class="inner-wrapper">
        <?php
            if( $about_cmt_title ) {
                echo '<div class="title-wrapper"><h2>'.$about_cmt_title.'</h2></div>';
            }
        ?>

        <div id="cmt-list-wrapper" class="cmt-list-wrapper list-wrapper">Loading...</div>
    </div>
</div>

<div id="modal-cmt" class="modal modal-cmt" style="display: none;">
    <div class="modal-inner">
        <div class="inner">
            <button onclick="closeModal()" class="modal-close"></button>
            <div id="modal-stage-cmt" class="modal-stage-cmt"></div>
        </div>
    </div>
    <div onclick="closeModal()" class="modal-bg"></div>
</div>

<script>
    let cmtListWrapper = document.querySelector('#cmt-list-wrapper')

    if ( cmtListWrapper ) {
        function cmtList() {
            let requestOptions = {
                method: 'GET',
                redirect: 'follow',
            }

            let targetURL = '/wp-json/wp/v2/committee?per_page=1000'

            fetch(targetURL, requestOptions)
            .then(response => response.text())
            .then(result => {

                var resultObjCmt = JSON.parse(result)
                //console.log(resultObjCmt)

                theObjCmt = resultObjCmt

                let html = ''
                for(let i = 0; i < resultObjCmt.length; i++) {
                    let theCmts = resultObjCmt[i]

                    //<div class="listing" onclick="openModalCmt(${i})">
                    html += `
                        <div class="listing">
                            <figure><img src="${theCmts.cmt_thumbnail_img_url}"></figure>
                            <div class="details-wrapper">
                                <h3>${theCmts.cmt_name}</h3>
                                <p class="position">${theCmts.cmt_position}</p>
                            </div>
                        </div>
                    `
                }
                cmtListWrapper.innerHTML = html;

            })
            .catch(error => console.log('error', error))
        }
        cmtList()
    }

    //Modal
    function openModalCmt(index) {
        hiddenScrolling()

        postIndex = index;
        //console.log(postIndex)
        document.querySelector('#modal-cmt').style.display = 'block';

        let modalHtml = ''
        modalHtml += `
            <div class="left">
                <img src="${theObjCmt[postIndex].cmt_thumbnail_img_url}" class="thumbnail">
            </div>

            <div class="right">
                <h3 class="title"><?php echo $text_cmt; ?></h3>

                <h4 class="name">${theObjCmt[postIndex].cmt_name}</h4>

                <div class="position-wrapper">
                    <p class="position">${theObjCmt[postIndex].cmt_position}, <span class="company">${theObjCmt[postIndex].cmt_company}</span></p>
                </div>

                <div class="details-wrapper">${theObjCmt[postIndex].cmt_details}</div>

                <p class="text"><?php echo $text_cmt; ?></p>
            </div>
        `
        document.querySelector('#modal-stage-cmt').innerHTML = modalHtml;
    }
    
</script>