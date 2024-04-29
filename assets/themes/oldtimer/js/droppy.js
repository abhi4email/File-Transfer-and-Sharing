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
        window.location.href = 'handler/changelanguage/'+lang;
    },
    errorMsg: function(msg) {
        $(document.body).find('#errorDiv').html('<div class="alert alert-danger" role="alert">' + msg + '</div>');
    },
    clearError: function() {
        $(document.body).find('#errorDiv').html('');
    },
    createCopyBtn: function() {
        var clipboard = new ClipboardJS('.copy-button');

        $('.copy-button').on('click', function() {
            $('#copyButton').hide();
            $('#okButton').show();
        });
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
                        console.log(data);

                        if (data.result == 'success') {
                            $('.contact-form').find('.alert').remove();
                            $('.contact-form').prepend('<div class="alert alert-success" role="alert">' + Lang.i.message_sent + '</div>');
                            $('.contact-form input, .contact-form textarea').val('');
                            grecaptcha.reset();

                            setTimeout(function() {
                                $('.contact-form').find('.alert').remove();
                            }, 3000);
                        }
                        else if (data.result == 'fields' || data.result == 'recaptcha') {
                            alert(Lang.i.fill_fields);
                        }
                        else {
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

var Pager = {
    settingsOpen: false,
    openInlinePage: function(click_id) {
        if (typeof ismobile !== 'undefined' && ismobile === true) {
            var click = click_id + '_body';
            $(document).ready(function() {
                $('.' + click).modal('show');
            });
        } else {
            var body = $(".settingsBodyContent");
            var nav = $(".settingsNav");
            for (var i = 0; i < body.length; i++) {
                $(body[i]).css("display","none");
            }
            for (var i = 0; i < nav.length; i++) {
                $(nav[i]).css('font-weight', 'normal');
            }

            $('#' + click_id).css('font-weight','bold');
            $('#' + click_id + '_body').css('display','block');
        }
    },
    openSettings: function() {
        if(Pager.settingsOpen === false) {
            if (typeof ismobile == 'undefined' || ismobile === false) {
                $('#uploadSettings').show();
            }
            Pager.settingsOpen = true;
        }
        else if(Pager.settingsOpen === true) {
            Pager.closeSettings();
        }
    },
    closeSettings: function() {
        if (typeof ismobile !== 'undefined' && ismobile === true) {
            $('#modalSettings').modal('toggle');
            $('#uploadSettings').hide();
        }
        else {
            $('#uploadSettings').hide();
        }
        Pager.settingsOpen = false;
    },
    uploadSettings: function() {
        $('#languageSettingsContent').hide();
        $('#termsContent').hide();
        $('#aboutContent').hide();
        $('#upload_settings_nav').css('font-weight', 'bold');
        $('#terms_nav').css('font-weight', 'normal');
        $('#about_nav').css('font-weight', 'normal');
        $('#language_settings_nav').css('font-weight', 'normal');
        $('#uploadSettingsContent').show();
    },
    languageSettings: function() {
        $('#uploadSettingsContent').hide();
        $('#termsContent').hide();
        $('#aboutContent').hide();
        $('#terms_nav').css('font-weight', 'normal');
        $('#about_nav').css('font-weight', 'normal');
        $('#upload_settings_nav').css('font-weight', 'normal');
        $('#language_settings_nav').css('font-weight', 'bold');
        $('#languageSettingsContent').show();
    },
    viewTerms: function() {
        $('#uploadSettingsContent').hide();
        $('#termsContent').show();
        $('#terms_nav').css('font-weight', 'bold');
        $('#upload_settings_nav').css('font-weight', 'normal');
        $('#language_settings_nav').css('font-weight', 'normal');
        $('#languageSettingsContent').hide();
        $('#aboutContent').hide();
        $('#about_nav').css('font-weight', 'normal');
    },
    viewAbout: function() {
        $('#uploadSettingsContent').hide();
        $('#termsContent').hide();
        $('#terms_nav').css('font-weight', 'normal');
        $('#upload_settings_nav').css('font-weight', 'normal');
        $('#language_settings_nav').css('font-weight', 'normal');
        $('#languageSettingsContent').hide();
        $('#aboutContent').show();
        $('#about_nav').css('font-weight', 'bold');
    },
    errorMode: function() {
        $('#uploadDiv').show();
        $('#uploadDivSocial').show();
        $('#uploadSettings').hide();
        $('#uploadingDiv').hide();
        $('#uploadingDivSocial').hide();
    }
};

var Form = {
    emails: [],
    receiverId: 0,
    initFormActivity: function() {
        $(document.body).on('blur', '#emailTo', function() {
            var input = $(this);
            var value = $(input).val();
            //If comma
            if(value.indexOf(',') > -1) {
                var email_array = value.split(',');

                //Make field empty
                $(input).val('');

                //Add every email to the list
                $.each(email_array, function( key, value ) {
                    $(input).val(value);
                    Form.addReceiver();
                });
            }
        });

        $(document.body).on('click', '#submitpassword', function(){
            $("#errorDiv").html("");
            $("#downloadPassword").hide();
            $("#downloadLogo").innerHTML = '<i class="fa fa-check-square-o fa-5x" style="padding-top: 100px;"></i>';
            $("#statusDownload").innerHTML = Lang.i.download_started;
        });

        $(document.body).on('click', '#submit_password', function() {
            //Getting formdata
            var downloadId=$("#download_id").val();
            var password=$("#password").val();
            var formAction = 'download';
            var dataString = 'action='+formAction+'&download_id='+downloadId+'&password='+password;

            //Checks if the password is not empty
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

        $(document.body).on('click', '#submitdownload', function() {
            $('#downloadForm').hide();
            $('#downloadSuccess').show();
            setTimeout(function() {
                $('#downloadSuccess .btn').removeAttr('disabled');
            }, 1500);
        });

        $(document.body).on('click', '#cancelUpload', function() {
            Uploader.uploadAbort();
        });
    },
    addReceiver: function() {
        var emailInput = $("#emailTo").val();
        if (General.validateEmail(emailInput)) {
            if (emailInput == '' || emailInput == null) {
                $('#receivers').addClass('shake animated has-error').one('animationEnd webkitAnimationEnd',function () { $("#receivers").removeClass('shake animated has-error'); });
            }
            else
            {
                var emailExist = Form.emails.indexOf(emailInput);
                if(emailExist == -1) {
                    Form.receiverId++;
                    Form.emails.push(emailInput);
                    var divReceivers        = $("#receiverList");
                    var divHiddenReceivers  = $("#receiverHiddenList");
                    var emailToValue        = $("#emailTo").val();

                    divReceivers.prepend('<p style="margin: 0 0 0;" id="receiver_'+Form.receiverId+'"><i class="fa fa-angle-right"></i> '+emailToValue+' <a onclick="Form.removeReceiver(\''+Form.receiverId+'\',\''+emailToValue+'\');"><i class="fa fa-trash" id="receiver_'+Form.receiverId+'"></a></p>');
                    divHiddenReceivers.prepend('<input type="hidden" name="email_to[]" class="emailToInput" id="email_to_'+Form.receiverId+'" value="'+emailToValue+'">');

                    $("#emailTo").val('');

                    if(Form.receiverId == 1) {
                        var uploadBox = $('#uploadDiv');
                        //get the current height
                        var uploadBoxHeight = uploadBox.height();
                        //Set the height of the upload div
                        uploadBox.height(uploadBoxHeight + 40);

                        if($('#uploadSettings').length) {
                            $('#uploadSettings').height(uploadBoxHeight + 40);
                        }

                        $('#ad_2_div').css('margin-top', uploadBoxHeight + 50);
                    }

                    $("#receivers").show();
                    $(divReceivers).show();
                } else {
                    $("#receivers").addClass('shake animated has-error').one('animationEnd webkitAnimationEnd',function () { $("#receivers").removeClass('shake animated has-error'); });
                    $("#emailTo").value = '';
                }
            }
        } else {
            $("#emailTo").addClass('shake animated has-error').one('animationEnd webkitAnimationEnd',function () { $("#emailTo").removeClass('shake animated has-error'); });
        }
    },
    removeReceiver: function(id, email_value) {
        Form.emails.delete(email_value);
        $("#receiver_"+id).remove();
        $("#email_to_"+id).remove();
    },
    pickShareOption: function(option) {
        if(option === 'email') {
            $('#EmailToSection').show();
            $('#EmailFromSection').show();
            $('#share').val('mail');
        }
        else if(option === 'link') {
            $('#EmailToSection').hide();
            $('#EmailFromSection').hide();
            $('#share').val('link');
        }
    },
    pickDestructOption: function(option) {
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
    largerForm: false,
    uploadForm: $(document.body).find(".uploadForm"),
    sizeLeft: maxSizeBytes,
    totalselected: 0,
    done: 0,
    initProgressBar: function() {
        $(".progressCircle").knob({
            'min':0,
            'max':100,
            'readOnly': true,
            'width': 250,
            'height': 250,
            'fgColor': '#828282',
            'thickness': 0.2,
        });
    },
    initUploader: function() {
        console.log('Init uploader');
        Uploader.elem = $(Uploader.uploadForm).fileupload({
            url: 'upload',
            dataType: 'json',
            cache: false,
            autoUpload: false,
            maxChunkSize: (maxChunkSize * 1000000), // 1MB
            maxFileSize: maxSizeBytes,
            maxNumberOfFiles: maxFiles,
            acceptFileTypes: '@',
            dropZone: $(document.body),
            recalculateProgress: false,
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
                $("#errorDiv").html("");
                $('#submit_upload').prop('disabled', false);

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

                    if(Uploader.largerForm === false) {
                        //Set the height of the upload div
                        $('#uploadDiv').height($('#uploadDiv').height() + 40);

                        if($('#uploadSettings').length) {
                            $('#uploadSettings').height($('#uploadSettings').height() + 40);
                        }

                        $('#ad_2_div').css('margin-top', $('#uploadDiv').height() + 20);

                        Uploader.largerForm = true;
                    }

                    Uploader.updateSizeLeft();

                    // Add to list
                    $('#upload-form-list').prepend('<table id="uploaded-file"><tr><td><span class="file-remove-btn" data-id="'+file.uid+'"><i class="fa fa-times-circle"></i></span></td> <td><span class="file-title">'+file.name+'</span></td></tr></table>');

                    // Remove file action
                    $(document.body).on('click', '#upload-form-list .file-remove-btn[data-id="'+file.uid+'"]', function() {
                        $(this).parent().parent().remove();

                        Uploader.sizeLeft = Uploader.sizeLeft + file.size;
                        Uploader.totalselected--;
                        file.uid = false;
                        Uploader.updateSizeLeft();
                    });
                });

                $("#submit_upload").on('startUploading', function (e) {
                    // Check if the file isn't removed from the queue
                    if(typeof data.files[0] !== 'undefined' && data.files[0].uid !== false) {
                        data.submit();
                    }
                });

                $("#cancelUpload").on('cancelUploading', function (e) {
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
                data.formData = {upload_id: Uploader.uploadID, file_uid: data.files[0].uid};
            },
            fail: function(e, data) {
                console.log('Failed, or the upload has been aborted.');
                console.log(e);
                console.log(data);
            }
        });

        $(document.body).on('click', '#submit_upload', function(e) {
            e.preventDefault();

            var btn = $(this);

            $(btn).attr('disabled', 'disabled');

            // Start uploading
            Uploader.startUploading();

            // Prevent button spamming
            setTimeout(function() {
                $(btn).removeAttr('disabled');
            }, 1000)
        });

        $(document.body).on('click', '.upload_section #select_files', function(e) {
            $("#upload_section input[type='file']").click();
            e.preventDefault();
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
    updateSizeLeft: function() {
        if(maxSizeBytes > this.sizeLeft) {
            $('#errorDiv').html('');
        }

        $(document.body).find('#total_upload_size').html("(" + Number(Math.round(this.sizeLeft / 1073741824+'e2')+'e-2')+" GB "+Lang.i.remaining + ")");
    },
    uploadStart: function() {
        var data = $(Uploader.uploadForm).serializeArray();
        data.push({name: 'upload_id', value: Uploader.uploadID});

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
                    else {
                        // Start uploading
                        $("#submit_upload").trigger("startUploading");
                        General.preventPageLeave();
                        $('#ad_2_div').css('margin-top', '420px');
                    }
                }
            });
        }
        else
        {
            General.errorMsg(Lang.i.fill_fields);
        }
    },
    uploadAbort: function() {
        $("#cancelUpload").trigger("cancelUploading");

        Uploader.executed = false;
        Uploader.done = 0;

        $('#uploadDiv').show();
        $('#uploadingDiv').hide();
        $('#uploadingDivSocial').hide();
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

                Uploader.uploadStart();
            }
        });
    },
    uploadProgress: function(progress,uploadTotal,uploadTotalSent) {
        if(!Uploader.executed) {
            Uploader.executed = true;
            Uploader.started_at = new Date();
        }

        if($('#errorDiv').length) {
            $('#errorDiv').html("");
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

        $('#uploadDiv').hide();
        if($('#uploadSettings').length) {
            $('#uploadSettings').hide();
        }
        $('#uploadingDiv').show();
        $('#uploadingDivSocial').show();

        var totalMB = (Math.round(uploadTotal * 100 / (1000 * 1000)) / 100).toFixed(1);
        var uploadedMB = (Math.round(uploadTotalSent * 100 / (1000 * 1000)) / 100).toFixed(1);
        var totalGB = (Math.round((uploadTotal * 100 / (1000 * 1000)) / 100) / 1024).toFixed(1);
        var uploadedGB = (Math.round((uploadTotalSent * 100 / (1000 * 1000)) / 100) / 1024).toFixed(1);


        if(totalMB > 1000) {
            var totalProgress = totalGB + ' GB';
        }
        else
        {
            var totalProgress = totalMB + ' MB';
        }

        if(uploadedMB > 1000) {
            var uploadedProgress = uploadedGB + ' GB';
        }
        else
        {
            var uploadedProgress = uploadedMB + ' MB';
        }

        if(seconds_elapsed < 5) {
            $('#progressMb').html('<p align="center"><i>' + uploadedProgress + ' '+Lang.i.uploaded_of+' ' + totalProgress + ' </i></p><p>'+progress_time+'</p>');
        }
        else
        {
            $('#progressMb').html('<p align="center"><i>' + uploadedProgress + ' '+Lang.i.uploaded_of+' ' + totalProgress + ' ('+(Mbits_per_seconds).toFixed(1)+' Mb/s)</i></p><p>'+progress_time+'</p>');
        }

        $("#progresscircle").val(percentComplete.toString());
        $('.progressCircle').val(percentComplete.toString()).trigger('change');
    },
    uploadComplete: function(evt) {
        Uploader.uploadFinished();

        window.onbeforeunload = null;
        setTimeout(function() {
            var shareOption = $("#share").val();
            if(shareOption === 'mail') {
                $('#emailMessage').show();
                $('#okButton').show();
            }
            if(shareOption === 'link') {
                $('#linkMessage').show();
                $('#downloadLink').html('<a href="' + siteUrl + Uploader.uploadID + '">'  + siteUrl + Uploader.uploadID + '</a>');
                $('#copyButton').html('<button class="btn btn-success btn-block btn-sm copy-button" id="copy-button" data-clipboard-text="'  + siteUrl + Uploader.uploadID + '">'+Lang.i.copy_url+'</button>');
                General.createCopyBtn();
            }
            $('#uploadProcess').hide();
            $('#uploadSuccess').show();
        }, 1000);
    },
    preventUploadLeave: function() {
        window.onbeforeunload = function() {
            return 'Are you sure you want to navigate away from this page?';
        };
    }
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

$(document).ready(function() {
    Background.init();
    Download.init();
    Lang.fetch();
    General.initExtraFunctions();
    General.contactForm();
    Form.initFormActivity();
    Uploader.initProgressBar();
    Uploader.initUploader();
});