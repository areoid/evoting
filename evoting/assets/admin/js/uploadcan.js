var maxFileSize = 4048576; //Kb

$(document).ready(function() {
  if (typeof FormData == "undefined") {
    $('#error').html('Unable to drop files').fadeIn('fast');
    $('#uploadBox').hide();
  }
  jQuery.event.props.push('dataTransfer');

  $('#uploadBox')
    .bind('dragenter', function(e) {
      $(this).addClass("active");
      e.stopPropagation();
      e.preventDefault();
    })
    .bind('dragleave', function(e) {
      $(this).removeClass("active");
      e.stopPropagation();
      e.preventDefault();
    })
    .bind('dragover', function(e) {
      e.stopPropagation();
      e.preventDefault();
    })
    .bind('drop', function(e) {
      $(this).removeClass("active");
      e.stopPropagation();
      e.preventDefault();
      var files = e.dataTransfer.files;

      var imagetype = /image.*/;

      /* Multiple Uploads */
      var xhr, provider;
      var formData = new FormData();
      var numberFiles = files.length;
      for(i = 0; i < numberFiles; ++i) {
        if (!files[i].type.match(imagetype)) {
          // display some message
          continue;
        }
        if (files[i].size > maxFileSize) {
          // display some message
          continue;
        } 
        formData.append('uploadedFile[]', files[i]);
      }
      $('#error').html('').fadeOut(0);

      $.ajax({
        cache: false,
        contentType: false,
        data: formData,
        processData: false,
        url: base_url + 'admin/candidates/upload',
        type: 'POST',
        xhr: function() {
          xhr = jQuery.ajaxSettings.xhr();
          if (xhr.upload) {
            $('#uploadStatus').show();
            xhr.upload.addEventListener('progress', function (e) {
              var p = parseInt(e.loaded/e.total*100);
              $('#progressBar').css({'width':p+'%'});
              $('#progressValue').html(p+'%');
            }, false);
          }
          return xhr;
        },
        beforeSend: function() {
          $('#progressBar').css({'width':'0%'});
          $('#progressValue').html('0%');
        }, 
        success: function(output) {
          $('#uploadBox').removeClass('hover');
          $('#picstatus').html('Picture fuond');
          $('#picstatus').removeClass('label-danger');
          $('#picstatus').addClass('label-success');
          $('#pathpic').val(output);
          $('#imgcandidate').attr('src', base_url + 'assets/admin/imagescandidates/' + output);
        },
        error: function() {
        },
      });
    });
});