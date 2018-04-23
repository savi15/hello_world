$(document).ready(function () {
    $("#dob").datepicker({
        dateFormat: 'yy-mm-dd'

    });
    $("#pic_upload").on('click', (function (e) {
        e.preventDefault();
        $.ajax({
            url: 'http://127.0.0.1/projects/?route=account/pic_upload',
            type: "POST",
            data: new FormData($('form')[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {

                if (data === "") {
                    alert("Please Add Profile Picture");
                } else {
                    $('#profile_pic').attr('src', data);
                    $('#prof_pic').attr('src', data);
                }
            },
            error: function () {
            }

        });
    })
            );
    });
function check() {

    var flag = true;
    //name validation
    var Input = document.getElementById('fname');
    if (Input.value === "" || Input.value.length > 15) {
        alert('name should be 1-25 characters long');
        return false;
    }
    var Input = document.getElementById('lname');
    if (Input.value === "" || Input.value.length > 15) {
        alert('name should be 1-25 characters long');
        return false;
    }


    //password validation
    var pswd = document.getElementById('pswd');
    if (pswd.value.length < 8) {
        alert("passwords must be 8 charcters long");
        return false;
    }
    var cnfrm_pswd = document.getElementById('c_pswd');
    if (pswd.value !== cnfrm_pswd.value) {
        alert("password and confirm password must be same");
        return false;
    }
    if (!((document.getElementById("male").checked) || (document.getElementById("female").checked))) {
        alert('select one gender');
        flag = false;
    }
    return flag;
}
//password show
function show() {
    var v = document.getElementById("pswd").value;
    if (document.getElementById("pswd").type === 'password')
        document.getElementById("pswd").type = 'text'.value = v;
}
//sign-up form
function sliding()
{
    $('.sign').show();
    $('.login').hide();
    //alert("dfghjk");

}





