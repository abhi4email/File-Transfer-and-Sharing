"use strict";

Array.prototype.shuffle = function() {
    var len = this.length;
    var i = len;
    while (i--) {
        var p = parseInt(Math.random()*len);
        var t = this[i];
        this[i] = this[p];
        this[p] = t;
    }
};

var General = {
    validateEmail: function(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    },
    initExtraFunctions: function() {
        Element.prototype.remove = function() {
            this.parentElement.removeChild(this);
        };
        NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
            for(var i = this.length - 1; i >= 0; i--) {
                if(this[i] && this[i].parentElement) {
                    this[i].parentElement.removeChild(this[i]);
                }
            }
        };
        Array.prototype.delete = function() {
            var what, a = arguments, L = a.length, ax;
            while (L && this.length) {
                what = a[--L];
                while ((ax = this.indexOf(what)) !== -1) {
                    this.splice(ax, 1);
                }
            }
            return this;
        };

        // Detect language change
        $(document.body).on('change', '#languagePicker', function() {
            General.changeLanguage();
        });

        // Detect navbar click
        $(document.body).on('click', '.nav.navbar-nav a', function() {
            $('.navbar .navbar-toggle').click();
        });
    },
    changeLanguage: function() {
        var lang = $('#languagePicker').val();
        window.location.href = 'handler/changelanguage/'+lang+'?redirect='+encodeURI(window.location.href);
    },
    errorMsg: function(msg, timer = true) {
        $(document.body).find('.upload-block-tooltip').addClass('active');
        $(document.body).find('.upload-block-tooltip .content.help').removeClass('active');
        $(document.body).find('.upload-block-tooltip .content.error').addClass('active');
        $(document.body).find('.upload-block-tooltip p').html(msg);

        if(timer) {
            setTimeout(function () {
                General.clearError();
            }, 3000);
        }
    },
    helpMsg: function (msg) {
        if ($(window).width() > 770) {
            $(document.body).find('.upload-block-tooltip').addClass('active');
            $(document.body).find('.upload-block-tooltip .content.error').removeClass('active');
            $(document.body).find('.upload-block-tooltip .content.help').addClass('active');
            $(document.body).find('.upload-block-tooltip p').html(msg);
        }
    },
    clearError: function() {
        $(document.body).find('.upload-block-tooltip').removeClass('active');
        $(document.body).find('.upload-block-tooltip .content').removeClass('active');
        $(document.body).find('.upload-block-tooltip p').html('');
    },
    preventPageLeave: function() {
        window.onbeforeunload = function() {
            return Lang.i.are_sure;
        };
    },
    contactForm: function() {
        $(document.body).on('click', '.contact-form button', function(ev) {
            ev.preventDefault();

            var form = $(this).parents('form');

            if(General.validateEmail($(form).find('input[name="contact_email"]').val())) {
                $.ajax({
                    url: "handler/contact",
                    type: 'post',
                    dataType: 'json',
                    data: $(form).serialize(),
                    cache: false,
                    success: function (data) {
                        if (data.result == 'success') {
                            $('.contact-form').find('.notification').remove();
                            $('.contact-form').prepend('<div class="notification is-info">' + Lang.i.message_sent + '</div>');
                            $('.contact-form input, .contact-form textarea').val('');
                            grecaptcha.reset();

                            setTimeout(function() {
                                $('.contact-form').find('.notification').remove();
                            }, 3000);
                        }
                        else if (data.result == 'fields' || data.result == 'recaptcha') {
                            $('.contact-form').find('.notification').remove();
                            $('.contact-form').prepend('<div class="notification is-info">' + Lang.i.fill_fields + '</div>');
                        } else {
                            alert('Error sending message !');
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status);
                        console.log(thrownError);
                    }
                });
            } else {
                alert(Lang.i.invalid_email);
            }
        });
    },
    round: function(num, decimalPlaces = 0) {
        num = Math.round(num + "e" + decimalPlaces);
        return Number(num + "e" + -decimalPlaces);
    }
};

var Lang = {
    str: null,
    fetch: function() {
        $.ajax({
            url: "handler/getjstranslation",
            dataType: 'json',
            cache: false,
            success: function(data) {
                Lang.i = data;
            }
        });
    }
};

var Form = {
    emails: [],
    receiverId: 0,
    initFormActivity: function() {
        $('#email-to').on('blur', function() {
            var input = $(this);
            var value = $(input).val();

            // If comma then split into emails
            var email_array = false;

            if(value.indexOf(', ') > -1) {
                email_array = value.split(', ');
            }
            else if(value.indexOf(',') > -1) {
                email_array = value.split(',');
            }
            else if(value.indexOf('; ') > -1) {
                email_array = value.split('; ');
            }
            else if(value.indexOf(';') > -1) {
                email_array = value.split(';');
            }
            else if(value.indexOf(' ') > -1) {
                email_array = value.split(' ');
            }

            if(email_array !== false) {
                // Make field empty
                $(input).val('');

                // Add every email to the list
                $.each(email_array, function( key, value ) {
                    $(input).val(value.trim());
                    Form.addReceiver();
                });
            }
        });

        $('#email-to').on('focus', function() {
            var value = $(this).val();

            if(value !== '' && value !== undefined) {
                Form.addReceiver();
            }
        });

        $('#email-to').on('keypress', function (e) {
            if(e.which === 13){
                $(this).attr("disabled", "disabled");

                Form.addReceiver();

                $(this).removeAttr("disabled");
                $(this).focus();
            }
        });

        $(document.body).on('click', '#submitpassword', function(){
            $("#errorDiv").html("");
            $("#downloadPassword").hide();
            $("#downloadLogo").innerHTML = '<i class="fa fa-check-square-o fa-5x" style="padding-top: 100px;"></i>';
            $("#statusDownload").innerHTML = Lang.i.download_started;
        });

        $(document.body).on('click', '#submit_password', function() {
            // Getting formdata
            var downloadId=$("#download_id").val();
            var password=$("#password").val();
            var formAction = 'download';
            var dataString = 'action='+formAction+'&download_id='+downloadId+'&password='+password;

            // Checks if the password is not empty
            if (password==null || password=="") {
                document.getElementById("errorDiv").innerHTML = '<div class="alert alert-danger" role="alert">'+Lang.i.fill_fields+'</div>';
            }
            else
            {
                //Make the post to the php file
                $.ajax({
                    type: "POST",
                    url: 'src/action.php',
                    dataType: 'json',
                    data: dataString,
                    cache: false,
                    success: function(data){
                        if(data.password == 'true')
                        {
                            window.location = '../../../../src/action.php';
                        }
                        if(data.password == 'false')
                        {
                            document.getElementById("errorDiv").innerHTML = '<div class="alert alert-danger" role="alert">'+Lang.i.wrong_pass+'</div>';
                        }
                    }
                });
            }
            return false;
        });

        $(document.body).on('click', '#submitpass', function() {
            if($('#password').val() !== '') {
                $('#downloadForm').hide();
                $('#downloadSuccess').show();
            }
        });

        $(document.body).on('click', '#download-form:not(.password) button', function() {
            $('#download-form').hide();
            $('#download-started').addClass('active');
        });

        $(document.body).on('click', '#cancel-upload', function() {
            Uploader.uploadAbort();
        });

        $(document.body).on('click', '.advanced-options .share-options label', function() {
            Form.pickShareOption($(this).attr('id'));
        });

        $(document.body).on('click', '.advanced-options .destruct-options label', function() {
            Form.pickDestructOption($(this).attr('id'));
        });

        $(document.body).on('mouseover', '[data-help]', function() {
            var text = $(this).data('help');

            General.helpMsg(text);
        });

        $(document.body).on('mouseout', '[data-help]', function() {
            General.clearError();
        });
    },
    addReceiver: function() {
        var emailInput = $("#email-to").val();
        if (General.validateEmail(emailInput)) {
            if (emailInput == '' || emailInput == null) {
                General.errorMsg(Lang.i.fill_fields);
            }
            else
            {
                var emailExist = Form.emails.indexOf(emailInput);
                if(emailExist == -1) {
                    Form.receiverId++;
                    Form.emails.push(emailInput);
                    var divReceivers = $(".uploadForm .recipients");
                    var uploadForm   = $(".uploadForm");
                    var emailToValue = $("#email-to").val();

                    divReceivers.prepend('<span class="tag is-light" id="receiver_'+Form.receiverId+'">'+emailToValue+' <label class="remove" onclick="Form.removeReceiver(\''+Form.receiverId+'\',\''+emailToValue+'\');">x</label></span>');
                    uploadForm.prepend('<input type="hidden" name="email_to[]" class="emailToInput" id="email_to_'+Form.receiverId+'" value="'+emailToValue+'">');

                    $("#email-to").val('');
                } else {
                    General.errorMsg(Lang.i.recipient_exists);
                    $("#email-to").value = '';
                }
            }
        } else {
            General.errorMsg(Lang.i.invalid_email);
        }
    },
    removeReceiver: function(id, email_value) {
        Form.emails.delete(email_value);
        $("#receiver_"+id).remove();
        $("#email_to_"+id).remove();
    },
    pickShareOption: function(option) {
        $('.advanced-options .share-options label').removeClass('selected');
        $('.advanced-options .share-options label#'+option).addClass('selected');

        if(option === 'mail') {
            $('#email-fields').show();
            $('#share').val('mail');
        }
        else if(option === 'link') {
            $('#email-fields').hide();
            $('#share').val('link');
        }
    },
    pickDestructOption: function(option) {
        $('.advanced-options .destruct-options label').removeClass('selected');
        $('.advanced-options .destruct-options label#'+option).addClass('selected');

        if(option === 'yes') {
            $('#destruct').val('yes');
        }
        else
        {
            $('#destruct').val('no');
        }
    }
};

var Uploader = {
    elem: null,
    uploadID: null,
    notAllowed: disallowedFiles.split(","),
    executed: false,
    started_at: 0,
    fileView: false,
    uploadForm: $(document.body).find(".uploadForm"),
    sizeLeft: maxSizeBytes,
    totalselected: 0,
    done: 0,
    retries: 0,
    maxRetries: 100,
    retryTimeout: 500,
    circle: null,
    folders: [],
    uploadBtn: null,
    initProgressBar: function() {
        if($('#progress-bar').length > 0) {
            this.circle = new ProgressBar.Circle('#progress-bar', {
                color: themeColor,
                strokeWidth: 6,
                trailWidth: 6,
                step: function (state, circle) {
                    var value = Math.round(circle.value() * 100);
                    if (value === 0) {
                        circle.setText('');
                    } else {
                        circle.setText(value + '%');
                    }

                }
            });
        }
    },
    initUploader: function() {
        console.log('Init uploader');
        Uploader.elem = $(Uploader.uploadForm).fileupload({
            url: 'upload',
            dataType: 'json',
            cache: false,
            autoUpload: false,
            maxChunkSize: (maxChunkSize * 1000000), // MB
            maxFileSize: maxSizeBytes,
            maxNumberOfFiles: maxFiles,
            limitConcurrentUploads: 10,
            acceptFileTypes: '@',
            dropZone: $(document.body),
            recalculateProgress: false,
            maxRetries: Uploader.maxRetries,
            retryTimeout: Uploader.retryTimeout,
            fail: function (e, data) {
                console.log('Failed, or the upload has been aborted.');
                console.log(data);

                var fu = $(this).data('blueimp-fileupload') || $(this).data('fileupload');
                var retry = function () {
                    $.getJSON('upload/file', { file: data.files[0].name, uid: data.files[0].uid })
                        .done(function (result) {
                            var file = result.file;
                            data.uploadedBytes = file && file.size;
                            // clear the previous data:
                            data.data = null;
                            data.submit();
                            General.clearError();
                        })
                        .fail(function () {
                            General.errorMsg(Lang.i.internet_down, false);
                            fu._trigger('fail', e, data);
                        });
                };

                if (data.errorThrown !== 'abort' && data.uploadedBytes < data.files[0].size && Uploader.retries < Uploader.maxRetries) {
                    Uploader.retries += 1;
                    window.setTimeout(retry, Uploader.retries * Uploader.retryTimeout);
                    return;
                }
                Uploader.retries = 0;

                data.abort();
                Uploader.uploadAbort();
            },
            done: function (e, data) {
                Uploader.done++;

                if(Uploader.done === Uploader.totalselected) {
                    Uploader.uploadComplete();
                }
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                Uploader.uploadProgress(progress, data.total,data.loaded);
            },
            add: function(e, data) {
                console.log(data);
                $.each(data.files, function (index, file) {
                    // Assign ID to file
                    file.uid = Math.random().toString(36).substring(2);

                    // If the file is too large
                    if((Uploader.sizeLeft - file.size) <= 0) {
                        // Remove the file
                        data.files.splice(index, 1);
                        // Return error
                        General.errorMsg(Lang.i.too_large);
                        file.uid = false;

                        return false;
                    }

                    // Check if file type is allowed
                    var fileext = file.name.split('.').pop();
                    if(Uploader.notAllowed.indexOf(fileext) > -1) {
                        // Remove the file
                        data.files.splice(index, 1);
                        // Return error
                        General.errorMsg(Lang.i.file_blocked);
                        file.uid = false;

                        return false;
                    }

                    if(Uploader.totalselected >= maxFiles) {
                        // Remove the file
                        data.files.splice(index, 1);
                        // Return error
                        General.errorMsg(Lang.i.max_files);
                        file.uid = false;

                        return false;
                    }

                    Uploader.totalselected++;
                    Uploader.sizeLeft = Uploader.sizeLeft - file.size;

                    if(Uploader.fileView === false) {
                        $('.upload-form .select-first-files').hide();
                        $('.upload-form .selected-files').addClass('active');

                        Uploader.fileView = true;
                    }

                    Uploader.updateFileDetails();

                    if(file.relativePath === undefined && file.webkitRelativePath !== undefined) {
                        file.relativePath = file.webkitRelativePath.replace(file.name, '');
                    }

                    // Add to list
                    if(file.relativePath == '') {
                        $('#selected-files ul').prepend('<li><span class="name">' + file.name + '</span><span class="size">' + Uploader.convertBytes(file.size, 1) + '</span><span class="delete" data-id="' + file.uid + '">X</span></li>');

                        // Remove file action
                        $(document.body).on('click', '#selected-files ul li .delete[data-id="'+file.uid+'"]', function() {
                            $(this).parents('li').remove();

                            Uploader.sizeLeft = Uploader.sizeLeft + file.size;
                            Uploader.totalselected--;
                            file.uid = false;
                            Uploader.updateFileDetails();
                        });
                    } else {
                        let topFolder = file.relativePath.split('/')[0]
                        if(!Uploader.folders.includes(topFolder)) {
                            Uploader.folders.push(topFolder);
                            $('#selected-files ul').prepend('<li data-folder="'+topFolder+'" data-totalsize="'+file.size+'"><span class="name"><i class="lni lni-folder"></i> ' + topFolder + '</span><span class="size">' + Uploader.convertBytes(file.size, 1) + '</span><span class="delete" data-topfolder="' + topFolder + '">X</span></li>');
                        } else {
                            let folderItem = $('#selected-files ul li[data-folder="' + topFolder + '"]');
                            let folderSize = $(folderItem).data('totalsize');
                            folderSize = folderSize + file.size;

                            $(folderItem).data('totalsize', folderSize);
                            $(folderItem).find('.size').html(Uploader.convertBytes(folderSize + file.size, 1));
                        }

                        // Remove file action
                        $(document.body).on('click', '#selected-files ul li .delete[data-topfolder="'+topFolder+'"]', function() {
                            $(this).parents('li').remove();

                            Uploader.sizeLeft = Uploader.sizeLeft + file.size;
                            Uploader.totalselected--;
                            file.uid = false;
                            Uploader.updateFileDetails();
                        });
                    }

                    $('.upload-form').scrollTop($('.upload-form')[0].scrollHeight);
                });

                $("#submit-upload").on('startUploading', function (e) {
                    // Check if the file isn't removed from the queue
                    if(typeof data.files[0] !== 'undefined' && data.files[0].uid !== false) {
                        data.submit();
                    }
                });

                $("#cancel-upload").on('cancelUploading', function (e) {
                    // Check if the file isn't removed from the queue
                    if(typeof data.files[0] !== 'undefined' && data.files[0].uid !== false) {
                        data.abort();
                        data.uploadedBytes = 0;
                    }
                });
            },
            stop: function(e) {
                //Uploader.uploadComplete();
            },
            submit: function(e, data) {
                data.formData = {upload_id: Uploader.uploadID, file_uid: data.files[0].uid, original_path: data.files[0].relativePath};
            }
        });

        $(document.body).on('click', '#submit-upload', function(e) {
            e.preventDefault();

            Uploader.uploadBtn = $(this);

            $(Uploader.uploadBtn).attr('disabled', 'disabled');

            // Start uploading
            Uploader.startUploading();
        });

        $(document.body).on('click', '.select-first-files .outside-container lord-icon, .selected-files .button#add-files', function(e) {
            e.preventDefault();

            $(".uploadForm input[type='file']#file-selector").click();
        });

        $(document.body).on('click', '.select-first-files .folder-select, .selected-files .button#add-folders', function(e) {
            e.preventDefault();

            $(".uploadForm input[type='file']#folder-selector").click();
        });

        $(document.body).on('dragover', function(e){
            $('#drop-overlay').show();
            e.preventDefault();
        });

        $(document.body).on('dragleave', function(e){
            $('#drop-overlay').hide();
            e.preventDefault();
        });

        $(document.body).on('drop', function(e){
            $('#drop-overlay').hide();
            e.preventDefault();
        });
    },
    updateFileDetails: function() {
        if(maxSizeBytes > this.sizeLeft) {
            $('#errorDiv').html('');
        }

        $(document.body).find('#stats-total').html(this.totalselected + ' / ' + maxFiles);
        $(document.body).find('#stats-selected').html(Uploader.convertBytes((maxSizeBytes - this.sizeLeft), 1));
        $(document.body).find('#stats-remaining').html(Uploader.convertBytes(this.sizeLeft, 1));
    },
    uploadStart: function(verify_code = null) {
        var data = $(Uploader.uploadForm).serializeArray();
        data.push({name: 'upload_id', value: Uploader.uploadID});

        if(verify_code !== null) {
            data.push({name: 'verify_code', value: verify_code});
        }

        if(Uploader.totalselected > 0) {
            $.ajax({
                url: "upload/register",
                dataType: 'json',
                type: 'POST',
                data: data,
                cache: false,
                success: function (data) {
                    if (data.response === 'fields') {
                        General.errorMsg(Lang.i.fill_fields);
                    }
                    else if (data.response === 'email') {
                        General.errorMsg(Lang.i.invalid_email);
                    }
                    else if(data.response === 'verify_email') {
                        // Open verify page
                        Uploader.openEmailVerify();
                    } else {
                        // Start uploading
                        $("#submit-upload").trigger("startUploading");

                        General.preventPageLeave();
                    }
                    $(Uploader.uploadBtn).attr('disabled', false);
                }
            });
        }
        else
        {
            General.errorMsg(Lang.i.fill_fields);
        }
    },
    uploadAbort: function() {
        $("#cancel-upload").trigger("cancelUploading");

        Uploader.executed = false;
        Uploader.done = 0;

        $('.upload-block-content#upload-progress').removeClass('active');
        $('.upload-block-content#upload').addClass('active');
        $('select#languagePicker').removeAttr('disabled');
    },
    uploadFinished: function() {
        var data = $(Uploader.uploadForm).serializeArray();
        data.push({name: 'upload_id', value: Uploader.uploadID});

        $.ajax({
            url: "upload/complete",
            dataType: 'json',
            type: 'POST',
            data: data,
            cache: false,
            success: function(data) {
            }
        });
    },
    startUploading: function() {
        // Request a upload ID
        $.ajax({
            url: "upload/genid",
            dataType: 'json',
            cache: false,
            success: function(data) {
                // Store upload ID
                Uploader.uploadID = data.upload_id;

                console.log('Start uploading');
                Uploader.uploadStart();
            }
        });
    },
    uploadProgress: function(progress,uploadTotal,uploadTotalSent) {
        if(!Uploader.executed) {
            Uploader.executed = true;
            Uploader.started_at = new Date();

            // Hide error block
            General.clearError();

            // Show progress screen
            $('.upload-block-content').removeClass('active');
            $('.upload-block-content#upload-progress').addClass('active');
            $('select#languagePicker').attr('disabled', 'disabled');
        }

        // Get some info about the upload
        var percentComplete = progress;

        // Append progress percentage.
        var loaded = uploadTotalSent;
        var total = uploadTotal;

        // Time Remaining
        var seconds_elapsed =   (new Date().getTime() - Uploader.started_at.getTime())/1000;

        var bytes_per_second =  (seconds_elapsed) ? (loaded / seconds_elapsed) : 0 ;
        var Mbytes_per_second = bytes_per_second / 1000000;
        var Mbits_per_seconds = bytes_per_second / 100000;
        var remaining_bytes =   total - loaded;
        var seconds_remaining = (seconds_elapsed) ? (remaining_bytes / bytes_per_second) : 'calculating' ;

        var time_sum = 0;
        var progress_time = 0;

        if(seconds_remaining > 3600) {
            time_sum = seconds_remaining / 3600;
            progress_time = '&plusmn; '+Math.round(time_sum).toFixed(1)+' '+Lang.i.hours+' '+Lang.i.remaining;
        }
        else if(seconds_remaining > 60) {
            time_sum = seconds_remaining / 60;
            progress_time = '&plusmn; '+Math.round(time_sum)+' '+Lang.i.minutes+' '+Lang.i.remaining;
        }
        else
        {
            progress_time = '&plusmn; '+Math.round(seconds_remaining)+' '+Lang.i.seconds+' '+Lang.i.remaining;
        }

        var totalMB = (Math.round(uploadTotal * 100 / (1000 * 1000)) / 100).toFixed(1);
        var uploadedMB = (Math.round(uploadTotalSent * 100 / (1000 * 1000)) / 100).toFixed(1);
        var totalGB = (Math.round((uploadTotal * 100 / (1000 * 1000)) / 100) / 1024).toFixed(1);
        var uploadedGB = (Math.round((uploadTotalSent * 100 / (1000 * 1000)) / 100) / 1024).toFixed(1);


        var totalProgress = Uploader.convertBytes(uploadTotal);
        var uploadedProgress = Uploader.convertBytes(uploadTotalSent);

        $('.upload-progress-details .size').html(uploadedProgress + ' '+Lang.i.uploaded_of+' ' + totalProgress + (seconds_elapsed < 5 ? '' : ' ('+(Mbits_per_seconds).toFixed(1)+' Mb/s)'));
        $('.upload-progress-details .time').html(progress_time);

        if(percentComplete < 1) {
            this.circle.set(0.01);
        } else {
            this.circle.animate((percentComplete / 100));
        }
    },
    uploadComplete: function(evt) {
        Uploader.uploadFinished();

        window.onbeforeunload = null;
        setTimeout(function() {
            $('.upload-block-content#upload-progress').removeClass('active');
            $('.upload-block-content#upload-finished').addClass('active');

            var shareOption = $("#share").val();
            if(shareOption === 'mail') {
                $('.upload-block-content#upload-finished .upload-finished-message#mail').addClass('active');
                $('.upload-block-content#upload-finished .button').addClass('is-okay').html(Lang.i.ok);
            }
            if(shareOption === 'link') {
                $('.upload-block-content#upload-finished .upload-finished-message#link').addClass('active');
                $('.upload-block-content#upload-finished .button').addClass('is-copy');
                $('.upload-block-content#upload-finished input').val(siteUrl + Uploader.uploadID);
            }
            $('#uploadProcess').hide();
            $('#uploadSuccess').show();

            $('select#languagePicker').removeAttr('disabled');
        }, 1000);

        // Update premium uploads list
        if (typeof updateUploadsList !== "undefined") {
            updateUploadsList();
        }
    },
    preventUploadLeave: function() {
        window.onbeforeunload = function() {
            return 'Are you sure you want to navigate away from this page?';
        };
    },
    convertBytes: function(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';

        const k = 1024;
        let dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

        const i = Math.floor(Math.log(bytes) / Math.log(k));

        if(i <= 2) {
            dm = 0;
        }

        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    },
    openEmailVerify: function() {
        $('.upload-block-content').removeClass('active');
        $('.upload-block-content#upload-verify').addClass('active');

        $('.upload-block-content#upload-verify #email-to-verify').html($(Uploader.uploadForm).find('input[name="email_from"]').val())

        $('.upload-block-content#upload-verify button').on('click', function(e) {
           Uploader.submitEmailVerify();
        });

        $('.upload-block-content#upload-verify input[type="number"]').on('keypress', function (e) {
            if(e.which === 13){
                Uploader.submitEmailVerify();
            }
        });
    },
    submitEmailVerify: function() {
        let code = $('.upload-block-content#upload-verify input').val();

        let formData = $(Uploader.uploadForm).serialize();
        formData = formData + '&code='+code;

        $.ajax({
            url: "upload/verify_email",
            dataType: 'json',
            type: 'POST',
            data: formData,
            cache: false,
            success: function(data) {
                if(data.response === 'ok') {
                    setTimeout(function() {
                        Uploader.uploadStart(code);
                    }, 100);
                } else {
                    General.errorMsg(Lang.i.incorrect_verify);
                }
            }
        });
    },
};

var Download = {
    init: function() {
        $('#downloadForm form').on('submit', function() {
            General.clearError();
        });
    }
};

var Background = {
    init: function() {
        $(document.body).on('click', '.background', function(e) {
            var url = $(this).find('.vegas-slide:not(.vegas-transition-fade-out) .vegas-slide-inner, .vegas-slide:not(.vegas-transition-fade-out) video').data('url');

            if(url !== '' && url !== 'undefined') {
                window.open(url);
            }

            e.preventDefault();
        });
    }
};

var Tooltip = {
    show: function(message) {
        $('.upload-block-tooltip').show();
        $('.upload-block-tooltip p').html(message);
    },
    hide: function() {
        $('.upload-block-tooltip').hide();
    }
}

var Tabs = {
    init: function() {
        $('.tabs#page-tabs a').on('click', function() {
            if($(this).attr('href') === undefined) {
                var target = $(this).data('target');

                $('.tabs#page-tabs li.is-active').removeClass('is-active');
                $(this).parent('li').addClass('is-active');

                Tabs.open(target);
            }
            else
            {
                $('.tab-window.active').removeClass('active');
                $('.tabs#page-tabs li.is-active').removeClass('is-active');
            }
        });

        $('.mobile-nav .navbar-item').on('click', function() {
            var target = $(this).data('target');

            $('.tabs#page-tabs li.is-active').removeClass('is-active');
            $(this).parent('li').addClass('is-active');

            Tabs.open(target);

            $(".navbar-burger").removeClass("is-active");
            $(".navbar-menu").removeClass("is-active");
        });

        $('.tab-window .close-btn').on('click', function(ev) {
            ev.preventDefault();
            $('.tab-window.active').removeClass('active');
            $('.tabs#page-tabs li.is-active').removeClass('is-active');
        });
    },
    open: function(target) {
        $('.tab-window:not(.active)').addClass('active');

        $('.tab-window .tab.active').removeClass('active');
        $('.tab-window .tab#'+target).addClass('active');
    }
}

var Navbar = {
    init: function() {
        $(".navbar-burger").click(function() {

            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");

        });
    }
}

$( document ).ready(function() {
    $(".add-files").on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
    });

    $('.upload-finished-details input').on('click', function() {
        $(this).select();
        document.execCommand("copy");
    });

    $(document.body).on('click', '.upload-block-content#upload-finished .button-block button.is-copy', function() {
        var btn = $(this);

        $('.upload-finished-details input').select();
        document.execCommand("copy");
        $(btn).html(Lang.i.copied);
        setTimeout(function() {
            $(btn).html(Lang.i.upload_more);
            $(btn).removeClass('is-copy').addClass('is-okay');
        }, 2000);
    });

    $(document.body).on('click', '.upload-block-content#upload-finished .button-block button.is-okay', function() {
        window.location.href = siteUrl;
        return false;
    });

    $(document.body).on('mouseover', '.advanced-options .input-group.disabled', function() {
        Tooltip.show('This feature is only available for premium users')
    });

    $(document.body).on('mouseout', '.advanced-options .input-group.disabled', function() {
        Tooltip.hide();
    });

    $('.button-block button.options').on('click', function() {
        if($('.upload-form .advanced-options').is(":visible")) {
            $('.upload-form .advanced-options').hide();

            $('.upload-form').scrollTop();
        }
        else
        {
            $('.upload-form .advanced-options').show();

            $('.upload-form').scrollTop($('.upload-form')[0].scrollHeight);
        }
    });

    (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
        const $notification = $delete.parentNode;

        $delete.addEventListener('click', () => {
            $notification.parentNode.removeChild($notification);
        });
    });
});

$(document).ready(function() {
    Background.init();
    Tabs.init();
    Navbar.init();
    Download.init();
    Lang.fetch();
    General.initExtraFunctions();
    General.contactForm();
    Form.initFormActivity();
    Uploader.initProgressBar();
    Uploader.initUploader();
});

if ('loading' in HTMLImageElement.prototype) {
    const images = document.querySelectorAll('img[loading="lazy"]');
    images.forEach(img => {
        img.src = img.dataset.src;
    });
} else {
    // Dynamically import the LazySizes library
    const script = document.createElement('script');
    script.src =
        'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js';
    document.body.appendChild(script);
}