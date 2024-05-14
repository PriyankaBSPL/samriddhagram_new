jQuery(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;// jan=0; feb=1 .......
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    var minDate = year + '-' + month + '-' + day;
    var maxDate = year + '-' + month + '-' + day;

    jQuery('#startdate').attr('min', minDate);
    jQuery('#enddate').attr('min', minDate);
    

});
   function onlytxtuplodepdf(data) {
       
        // var myFile="";
        var myFile = data.value;
        var upld = myFile.split('.').pop();
        if (upld == 'pdf') {
            $('.'+data.id+'_error').html('');
            if (Filevalidation(data.id)) {
                return true
            }
            return false;
        } else {

            $("#txtuplode").val("");
            $('.'+data.id+'_error').html('Only PDF are allowed.');
            false;
        }
    }
    function onlytxtuplodeimg(data) {
        var myFile="";
        var myFile = data.value;
        var upld = myFile.split('.').pop();
        
        if (upld == 'jpg' || upld == 'png' || upld == 'jpeg' || upld =='webp')  {
            $('.'+data.id+'_error').html('');
            if (Filevalidation(data.id)) {
                return true
            }
            return false;
        } else {

            $("#txtimg").val("");
            $('.'+data.id+'_error').html('Only jpg,png,jpeg,webp formate are allowed.');
            false;
        }
    }
    function onlytxtuplodecsv(data) {
        var myFile="";
        var myFile = data.value;
        var upld = myFile.split('.').pop();
        
        if (upld == 'csv' || upld == 'xlsx')  {
            $('.'+data.id+'_error').html('');
            if (Filevalidation(data.id)) {
                return true
            }
            return false;
        } else {

            $("#file_path").val("");
            $('.'+data.id+'_error').html('Only csv,xlsx formate are allowed.');
            false;
        }
    }
    function maxfilesize(data) {
    var myFile = data.files[0];
    var fileSize = myFile.size; // in bytes
    var maxSize = 2 * 1024 * 1024; // 2 MB (in bytes)

    if (fileSize <= maxSize) {
        var upld = myFile.name.split('.').pop().toLowerCase();
        if (upld == 'jpg' || upld == 'png' || upld == 'jpeg' || upld =='webp') {
            $('.' + data.id + '_error').html('');
            if (Filevalidation(data.id)) {
                return true;
            }
            return false;
        } else {
            $("#" + data.id).val("");
            $('.' + data.id + '_error').html('Only jpg, png, jpeg, webp formats are allowed.');
            return false; // Return false to prevent form submission
        }
    } else {
        $("#" + data.id).val("");
        $('.' + data.id + '_error').html('Maximum file size allowed is 2MB.');
        return false; // Return false to prevent form submission
    }
}
function multiple_maxfilesize(data) {
    var files = data.files;
  
   if (files.length > 15) {
        $("#" + data.id).val(""); // Clear the file input
        $('.' + data.id + '_error').html('You can upload only up to 15 images at a time.');
        return false; // Return false to prevent form submission
    }

    for (var i = 0; i < files.length; i++) {
        var fileSize = files[i].size; // in bytes
        var maxSize = 2 * 1024 * 1024; // 2 MB (in bytes)

        if (fileSize > maxSize) {
            $("#" + data.id).val(""); // Clear the file input
            $('.' + data.id + '_error').html('Maximum file size allowed is 2MB.');
            return false; // Return false to prevent form submission
        }

        var upld = files[i].name.split('.').pop().toLowerCase();
        if (!(upld == 'jpg' || upld == 'png' || upld == 'jpeg' || upld =='webp')) {
            $("#" + data.id).val(""); // Clear the file input
            $('.' + data.id + '_error').html('Only jpg, png, jpeg, webp formats are allowed.');
            return false; // Return false to prevent form submission
        }
    }

    // If all files pass validation, clear any error messages and allow form submission
    $('.' + data.id + '_error').html('');
    return true;
}
    function onlytxtuplodeimg_and_pdf(data) {
        var myFile="";
        var myFile = data.value;
        var upld = myFile.split('.').pop();
        
        if (upld == 'jpg' || upld == 'png' || upld == 'jpeg' || upld =='webp' || upld == 'pdf')  {
            $('.'+data.id+'_error').html('');
            if (Filevalidation(data.id)) {
                return true
            }
            return false;
        } else {

            $("#txtimg_pdf").val("");
            $('.'+data.id+'_error').html('Only jpg,png,jpeg,webp and pdf formate are allowed.');
            false;
        }
    }
    Filevalidation = (id) => {
        const fi = document.getElementById(id);

        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {

                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 1024) {
                    $("#" + id).val("");
                    $('.' + id + '_error').html('File too Big.');
                
                    return false;
                }
                return true;
            }
        }
    }   
    function ValidateTodate() {

        var fromdate = $('#startdate').val();
        var todate = $('#enddate').val();
           // alert(fromdate);
        var Fromdate = new Date(fromdate);
        var Todate = new Date(todate);
        $(".startdate_error").html("");
        $(".enddate_error").html("");
        if (Fromdate > Todate) {

            $(".enddate_error").html("To Date Should Be Greater Than Start Date").addClass("error-msg");
            return false;
        }
    }
    function onlyAlphabets(e, t) {
        try {
            if (window.event) {
                var charCode = window.event.keyCode;
            } else if (e) {
                var charCode = e.which;
            } else {
                return true;
            }
            if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 32)
                return true;
            else
                return false;
        } catch (err) {
            alert(err.Description);
        }
    }

    function ValidateAlphnumeric(e) {
        const pattern = /^[a-z0-9]+$/i;

        return pattern.test(e.key)
    }
    function ValidateYearPassing(e) {
        alert(e.key);
    }
    