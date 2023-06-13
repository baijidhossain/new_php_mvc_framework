$(function() {
    'use strict';
    // tooltip activate everywhere
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    //  sidebar submenu
    let sidebar_group = $(".sidebar-group");
    sidebar_group.on("click", function(e) {

        if ($(e.target).closest('a[href*="#"]').length > 0) {
            e.stopPropagation();
            e.preventDefault();
            sidebar_group.not(this).removeClass("open").find(".group-items").slideUp();
            $(this).toggleClass("open").find(".group-items").eq(0).slideToggle(200);
        }

    });

    //  sidebar submenu
    $('.horizontal-menu-list li').on('click', function(e) {
        if ($(e.target).closest('a[href*="#"]').length > 0) {
            e.stopPropagation();
            e.preventDefault();
            $(this).toggleClass("open").find(".sub-menu").eq(0).slideToggle(200);
        }
    });

    // menu toggle
    let menu_icon = $(".menu-icon");
    let body = $("body");
    menu_icon.on("click", function() {
        if ($(window).width() > 993) {
            body.removeClass("sidebar-open").removeClass("sidebar-closed").toggleClass("sidebar-collapse");
        } else {
            body.removeClass("sidebar-collapse").toggleClass("sidebar-open sidebar-closed");
        }

    });

    // horizontal menu toggle
    $('.has-horizontal-menu .horizontal-main .horizontal-overlapbg').on('click', function() {
        body.removeClass("sidebar-collapse").toggleClass("sidebar-open sidebar-closed");
    });

    // remove all class and if window is below lg then add class closed
    function checkWindow() {
        body.removeClass("sidebar-open sidebar-closed sidebar-collapse");
        if ($(window).width() < 993) {
            body.addClass("sidebar-closed");
        }
        setTimeout(() => $('#sidebar').removeClass('hidden_sidebar'), 1000);
    }

    // run function on resize and onload combined
    $(window).on('resize', () => checkWindow()).resize();

    // stop from resubmitting
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    //dynamic modals
    const ajaxModal = $('#ajaxModal');
    ajaxModal.on('hidden.bs.modal', function(e) {
        $(e.target).removeData('bs.modal').find('.modal-content').html('');
    })

    // select2 active on modal open if available
    ajaxModal.on('shown.bs.modal', function(e) {

        if ($.fn.select2 && $('.select2-modal').length > 0) {
            $('.select2-modal').select2({
                minimumResultsForSearch: Infinity,
                width: '100%',
                dropdownParent: ajaxModal
            });
        }

        if ($.fn.select2 && $('.select2-show-search-modal').length > 0) {
            // Select2 by showing the search
            $('.select2-show-search-modal').select2({
                minimumResultsForSearch: '',
                width: '100%',
                dropdownParent: ajaxModal
            });
        }

    })

    $(document).on("click", '[data-bs-target="#ajaxModal"]', function(e) {
        e.preventDefault();
        ajaxModal
            .find(".modal-content")
            .load($(this).attr("href"), () => console.log("Modal loaded"));
    });
    // select2 init
    if ($.fn.select2 && $('.select2').length > 0) {
        $('.select2').select2({
            minimumResultsForSearch: Infinity,
            width: '100%'
        });
    }

    if ($.fn.select2 && $('.select2-show-search').length > 0) {
        // Select2 by showing the search
        $('.select2-show-search').select2({
            minimumResultsForSearch: '',
            width: '100%'
        });
    }

    // ckeditor init
    const ckeditorConfig = {

        extraPlugins: 'codemirror',

        toolbar: [{
                name: 'document',
                items: ['Source']
            },
            {
                name: 'clipboard',
                items: ['PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
            },
            {
                name: 'basicstyles',
                groups: ['basicstyles', 'cleanup'],
                items: ['Bold', 'Italic', 'Underline', 'Strike']
            },
            {
                name: 'paragraph',
                groups: ['list', 'indent', 'blocks', 'align'],
                items: ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
            },
            {
                name: 'insert',
                items: ['Link', 'Unlink', 'Image']
            },

            {
                name: 'styles',
                items: ['Styles', 'Format', 'Font', 'FontSize']
            },
            {
                name: 'colors',
                items: ['TextColor', 'BGColor']
            },
            {
                name: 'tools',
                items: ['Maximize']
            }
        ],

        height: 560

    }
    if (typeof CKEDITOR !== 'undefined' && CODEMIRROR_PLUGIN_PATH) {
        CKEDITOR.plugins.addExternal('codemirror', CODEMIRROR_PLUGIN_PATH, 'plugin.js');

        $('.editor').each(function(e) {
            ckeditorConfig.height = $(this).data('height') || 560;
            CKEDITOR.replace(this.id, ckeditorConfig);
        });
    }

    //dynamic add data-bs-dismiss="alert" to framework generated alerts
    $("[data-dismiss='alert']").each(function() {
        $(this).attr('data-bs-dismiss', 'alert');
    });


    /* framework related codes here */

    /*
    |-------------------------------------------
    | drag and drop file upload for single image
    |-------------------------------------------
    */
    $.each($('.drop-wrapper input[type=file]'), function(key, input) {

        const dropWrapper = $(this).parent();

        $(this).on('dragenter dragleave dragover drop', function(e) {
            e.preventDefault();
            e.stopPropagation();

            if (e.type === 'dragenter') {
                dropWrapper.trigger('mouseenter');
            }

            // catch drop event
            if (e.type === 'drop') {
                // get file list
                let files = e.originalEvent.dataTransfer.files;
                // process file list
                $(input).prop('files', files);
                $(this).trigger('change');
            }
        });

        const imgViewWrapper = dropWrapper.find('.drop-preview .drop-render');

        $(input).on('change', function(e) {

            if ($(this).prop('files')) {
                // read file to preview
                const reader = new FileReader();
                const file = $(this).prop('files')[0];

                if (file.type.match('image.*')) {
                    reader.onload = function(e) {
                        imgViewWrapper.html($('<img>', { src: e.target.result }));
                        dropWrapper.addClass('has-preview');
                        dropWrapper.find('.drop-preview').css('display', 'block');
                    };

                    reader.readAsDataURL(file);
                } else {
                    console.log('File is not an image');
                }

            }
        });

        // if already has file, show preview
        const data_file = $(this).attr('data-file');
        // const data_file_name = $(this).attr('data-file-name');
        if (data_file) {
            imgViewWrapper.html($('<img>', { src: data_file }));
            dropWrapper.addClass('has-preview');
            dropWrapper.find('.drop-preview').css('display', 'block');
        }

        // remove file preview on button click
        dropWrapper.find('.drop-clear').on('click', function() {
            dropWrapper.removeClass('has-preview');
            dropWrapper.find('.drop-preview').css('display', 'none');
            $(input).prop('files', null);
            data_file && dropWrapper.find('.attachment_excluded').val(data_file.replace(/.*\//, ''));
        });
    });


    /*
    |-------------------------------------------
    | drag and drop file upload for multiple images
    |-------------------------------------------
    */
    const multiDropInputHolders = {};
    $.each($('.drop-multi-wrapper input[type=file]'), function(key, input) {

        let thisID = $(input).attr('id');
        multiDropInputHolders[thisID] = new DataTransfer();
        let img_holder = $(input).parents('.drop-multi-wrapper');

        img_holder.bind('dragleave dragover drop', function(event) {
            event.stopPropagation();
            event.preventDefault();
            if (event.type === 'drop') {
                $(input).prop('files', event.originalEvent.dataTransfer.files);
                $(input).trigger('change');

                $(this).removeClass('dragover');
            } else if (event.type === 'dragleave') {
                $(this).removeClass('dragover');
            } else {
                $(this).addClass('dragover');
            }

        });

        $(input).on('change', function(e) {

            $.each($(this).prop('files'), function(i, file) {
                if (file.type.match('image.*')) {
                    let reader = new FileReader();

                    reader.onload = function() {
                        let img = `<div data-index="${img_holder.children('[data-index]').length}" class="img_holder position-relative">
                        	<img class="img-thumbnail mb-0" style="width: 100px;height: 100px;object-fit: cover;" src="${URL.createObjectURL(new Blob([new Uint8Array(reader.result)], {type: file.type}))}" alt="">
                          <span class="drop-multi-clear"><i class="fa fa-times-circle fa-2xs" aria-hidden="true"></i></span>
                        </div>`;
                        $(img).insertBefore(img_holder.find('.img_label'));
                    };

                    reader.readAsArrayBuffer(file);
                    multiDropInputHolders[thisID].items.add(file);
                } else {
                    console.log('File not supported');
                }

            });

            if ($(this).prop('files').length) {
                $(this).prop('files', null);
            }

        });

        // remove file preview on button click
        img_holder.on('click', '.drop-multi-clear', function(e) {
            let el = $(this);
            let remove_item = el.parents('.img_holder');
            let index = remove_item.data('index');
            let fileName = remove_item.data('file');

            if (index !== undefined) {
                multiDropInputHolders[thisID].items.remove(index);
            }

            if (img_holder.find(`#${thisID}_prev`).length) {
                let prev_items = img_holder.find(`#${thisID}_prev`);
                let fileNames = prev_items.val() ? prev_items.val().split(',') : [];
                fileNames.splice(fileNames.indexOf(fileName), 1);
                prev_items.val(fileNames);
            }
            remove_item.remove();

        });

        // add files to input on submit
        $(this).parents('form').on('submit', function(e) {
            e.preventDefault();
            $.each(multiDropInputHolders, function(key, value) {
                $('#' + key).prop('files', value.files);
            });
            $(this).unbind('submit').submit();
        });
    });

    /*
    |-------------------------------------------
    | toggle visibility on basic advance toggle
    |-------------------------------------------
    */
    $('.switch-button-checkbox').on('change', function() {
        let el = $(this);
        let target = $('.show_on_advance');
        if (el.is(':checked')) {
            target.fadeIn({
                duration: 200,
                start: function() {
                    $(this).css({
                        display: "flex"
                    })
                }
            });
        } else {
            target.fadeOut(200);
        }
    });


    /*
    |-------------------------------------------
    | Change content height on click
    |-------------------------------------------
    */
    $(document).on('click', '.toggle_visible', function(e) {
        e.stopPropagation();
        $(this).addClass('normal');
    });


    /*
    |-------------------------------------------
    | 5 level deep sidebar menu active
    |-------------------------------------------
    */
    let activeLink;
    let currentPath = window.location.href;
    const navItems = $('#sidebar .nav a');

    for (let i = 0; i < 5; i++) {

        if (i > 0) {
            currentPath = currentPath.substring(0, currentPath.lastIndexOf('/'));
        }

        $.each(navItems, function(index, link) {
            let href = $(this).attr('href');
            activeLink = (href.replace(/\/$/, "") === currentPath);
            if (activeLink) {
                activeLink = $(this);
                return false;
            }
        });

        if (activeLink) {
            break;
        }
    }

    activeLink && activeLink.parents('.nav-item').addClass('active').parents('.sidebar-group').addClass('active');

    /*
    |-------------------------------------------
    | duplicate a row remove button
    |-------------------------------------------
    */

    $(document).on('click', '.duplicateClose', function() {
        $(this).parents('.row').eq(0).remove();
    });

});

// confirm modal functions
const confirmation = async(question) => {
    const ajaxModal = $('#ajaxModal');


    let template = `
            <div  id="confirm_modal">
                <div class="modal-header border-0">           
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
                <div class="modal-body pt-0">
                   <div class="text-center">
                      <div class="icon-box">
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40.1 40.1">
                            <path d="M20 12.1c1.8 0 3 1 3 2.7 0 3-5.5 3.9-5.5 7.6 0 1 .6 2 2 2 2 0 1.8-1.5 2.5-2.6 1-1.4 5.6-3 5.6-7 0-4.4-3.9-6.2-7.8-6.2-3.8 0-7.3 2.7-7.3 5.7 0 1.3 1 2 2 2 3 0 1.5-4.2 5.4-4.2zM22.1 29c0-1.4-1.1-2.6-2.5-2.6s-2.5 1.2-2.5 2.6c0 1.4 1.1 2.5 2.5 2.5s2.5-1.1 2.5-2.5z"></path>
                            <path d="M40.1 20a20 20 0 10-40.1.1 20 20 0 0040.1 0zM2 20a18 18 0 1136.2.1 18 18 0 01-36.2 0z"></path>
                         </svg>
                      </div>
                      <p class="card-text mt-3 fs-16">${question}</p>
                   </div>
                </div>
                <div class="modal-footer justify-content-center border-0 pb-4 pt-0 mb-2">
                      <button type="button" class="btn _btn btn_default py-2 px-4 fs-14" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn _btn bg_skin py-2 px-4 fs-14" data-confirm="true">Confirm</button>
                </div>
            </div>`;

    return new Promise((resolve) => {
        ajaxModal.find('.modal-content').html(template);
        ajaxModal.find('.modal-dialog').addClass('modal-400');
        ajaxModal.modal('show');

        ajaxModal.on('click', '[data-confirm]', function() {
            resolve(true);
            ajaxModal.modal('hide');
        });

        ajaxModal.on('hidden.bs.modal', function() {
            ajaxModal.find('.modal-dialog').removeClass('modal-400');
            resolve(false);
        });
    });
}


/*
|-------------------------------------------
| duplicate a row
|-------------------------------------------
*/
const duplicateRow = (rowHolderId, referenceId) => {

    // destroy select2 instance
    if ($.fn.select2 && $('.select2-show-search').length > 0) {
        // Select2 by showing the search
        $('.select2-show-search').select2('destroy');
    }

    const template = $('#' + referenceId).html();
    // insert template as last element on reference row
    $('#' + rowHolderId).append(template);

    // select2 init
    if ($.fn.select2 && $('.select2-show-search').length > 0) {
        // Select2 by showing the search
        $('.select2-show-search').select2({
            minimumResultsForSearch: '',
            width: '100%',
        });
    }
}

/*
|-------------------------------------------
| Random string generator
|-------------------------------------------
*/

const generateRandomString = (length = 32, specialChars = false) => {
    let upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    let lower = 'abcdefghijklmnopqrstuvwxyz';
    let num = '0123456789';

    let upperChars = upper.charAt(getRandomInt(0, upper.length - 1));
    let lowerChars = lower.charAt(getRandomInt(0, lower.length - 1));
    let numChars = num.charAt(getRandomInt(0, num.length - 1));

    let characters = upper + num + lower;

    let totalLength = specialChars ? length - 3 : length;

    let str = Array(totalLength - 3).fill(characters).map(x => x[Math.floor(Math.random() * x.length)]).join('');

    let result = str + upperChars + lowerChars + numChars;

    if (specialChars) {
        result += Array(3).fill('!@#$%^&*()_=+[]{}<>').map(x => x[Math.floor(Math.random() * x.length)]).join('');
    }

    return result.split('').sort(() => 0.5 - Math.random()).join('');
}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

/*
|-------------------------------------------
| Password generator
|-------------------------------------------
*/

const generatePassword = (refId, length = 10) => {
    const password = generateRandomString(length, true);
    $('#' + refId).val(password).prop('type', 'text');

}


const generateAdminPassword = (refId, length = 12) => {
    const password = generateRandomString(length, false);
    $('#' + refId).val(password).prop('type', 'text');
    $('#' + 'confirm_' + refId).val(password).prop('type', 'text');

}


/*
|-------------------------------------------
| Format money
|-------------------------------------------
*/
function _formatMoney(amount) {
    if (!amount) return 0.00;
    return parseFloat(amount)
        .toFixed(2)
        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
}