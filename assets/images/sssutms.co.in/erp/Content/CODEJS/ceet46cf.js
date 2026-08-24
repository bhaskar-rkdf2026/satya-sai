$(document).ready(function () {
    CourseType();
    $("#drpcrstype").change(function () {
        fillCourse();
    });
    $("#drpcourse").change(function () {
        fillBranch();
    });
    $("#btnNext").click(function () {
        if ($("#ch_confirm").prop('checked') === true) {
            // OTP verification method
            RegistrationPanelLoad();
            $("#formContent_div").fadeIn(900);
            $("#SearchDiv").fadeOut(900);
        } else {
            $("#formContent_div").fadeOut();
            $("#SearchDiv").fadeIn();
            if ($("#ch_confirm").prop('disable') === true) {
                //text
            }
            swalNoti('Please select confirmation.', 'error');
        }
    });
    $("#btncancel").click(function () {
        $("#formContent_div").fadeOut(900);
        $("#SearchDiv").fadeIn(900);
        $("#ch_confirm").prop('checked', false);
    });
    $("#btnSearch").click(function () {
        GetFeesStructure_collegeList();
    });
});
// Set dynamic url
var ActionFolder = ["Accounts", "Departments", "DocVerification", "Masters", "Registration", "Report",
    "ResultProcessing", "Student", "SuperAdmin", "UserRole", "Examination", "Dashboard"];
for (var i = 0; i < ActionFolder.length; i++) { ActionFolder[i] = ActionFolder[i].toLowerCase(); } var da_url = window.location.pathname.toLowerCase().split('/');
var DynomicURL = '';
if ((ActionFolder.indexOf(da_url[1].toString()) > -1) === false) {
    DynomicURL = '/' + da_url[1].toString();
};
// close dynamic url 
function CourseType() {
    $.ajax({
        type: 'GET',
        url: DynomicURL + '/student/Ceet/DropCourse_Type',
        dataType: 'json',
        data: {},
        success: function (result) {
            if (result.status === "101") {
                swalNoti("No records found", 'error');
            }
            else {
                var drpcrstype = $("#drpcrstype");
                drpcrstype.empty();
                $.each(result.Course_Type, function (i, item) {

                    drpcrstype.append(new Option(item.Text, item.Value));

                });
                //drpcrstype.val("03");
                fillCourse();
            }
        },
        error: function (ex) {
            swalNoti('Something wrong please try later', 'error');
        }
    });
}
function fillCourse() {
    $.ajax({
        url: DynomicURL + '/student/Ceet/DropCourse',
        method: 'post',
        data: { Course_Type: $('#drpcrstype').val(), choice: "student" },
        dataType: 'json',
        success: function (result) {
            $('#drpcourse').empty();
            $.each(result.Course, function (i, item) {
                $('#drpcourse').append(new Option(item.Text, item.Value));
            });
            fillBranch();
        }

    });
}
function fillBranch() {
    $.ajax({
        url: DynomicURL + '/Student/Ceet/DropBranch',
        method: 'post',
        data: { Course_Type: $('#drpcrstype').val(), EXAM_CODE: $('#drpcourse').val() },
        dataType: 'json',
        success: function (result) {
            $('#drpbranch').empty();
            $.each(result.Branch, function (i, item) {
                $('#drpbranch').append(new Option(item.Text, item.Value));
            });
        }
    });
}
function ClearText() {
    $("#txt_otp").val('');
    $("#txtMobileOTP").val('');
    $("#txtEmailOTP").val('');
    $("#ch_confirm").prop('checked', false);
}

function GetFeesStructure_collegeList() {
    $("#lblCourseName").text($("#drpcourse option:selected").text() + ' (' + $("#drpbranch option:selected").text() + ')');
    $("#feeStructureDiv").fadeIn(900);
    ClearText();
}
//partial view call for OnlineAdmission
function RegistrationPanelLoad() {
    $.showprogress('Loading', 'Loading.....', '<img src="~/Content/loadingbox/images/loadingimage.gif"/>');
    $.ajax({
        url: DynomicURL + '/student/Ceet/Registration',//FeeDeatils',
        method: 'post',
        data: {
            BRCODE: $('#drpbranch').val(),
            MOBILE: $("#txtMobileOTP").val(),
            EMAIL: $("#txtEmailOTP").val(),
            BrName: $('#drpbranch option:selected').text()
        },
        success: function (result) {
            $.hideprogress();
            swalNoti('Fill your basic information', 'info');
            $("#formPartial").html(result);

        },
        error: function (ex) {
            $.hideprogress();
            $("#formPartial").html(ex.responseText);

        }
    });
}

//Post Registration Data through partial view
function RegistrationPostData() {

    var count = 0;

    $("#AcademicDetails input,#AcademicDetails select").each(function () {

        if (($(this).val() === null ? "" : $(this).val().trim()) === "" && $(this).prop("required") === true) {
            $(this).focus();
            check = true;
            if ($(this).attr('title') !== null) {
                swal("error", 'Required ' + $(this).attr('title'), 'error');
            }
            else {
                swal("Error", 'Required ' + $(this).attr('placeholder'), 'error');
            }
            count = 1;
            return false;
        }
    });
    if (count === 0) {
        var myformData = $("#Registration").serialize();
        if (!$("#Registration").valid()) {
            swalNoti('Please fill all details.', 'error');
            return false;
        }
        if (AllValidation() === false) {
            return false
        }
        var textMessage = "Are you sure?, Do you want to submit!";
        if ($("#Nationality").val() !== '101') {
            textMessage = textMessage + " You have selected Nationality other than India.";
        }
        swal({
            title: 'Confirmation',
            text: textMessage,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0CC27E',
            cancelButtonColor: '#FF586B',
            confirmButtonText: 'Yes, Register now!',
            cancelButtonText: 'No, Cancel!',
            confirmButtonClass: 'btn btn-success mr-5',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function () {
            $.showprogress('Loading', 'Loading.....', '<img src="~/Content/loadingbox/images/loadingimage.gif"/>');
            $.ajax({
                url: DynomicURL + '/student/Ceet/RegistrationPost',//FeeDeatils',
                type: "Post",
                data: myformData,
                success: function (result) {
                    if (result.status === '102') {
                        $("#btn_regist").prop('disabled', false);
                        $.hideprogress();
                        swalNoti('You are already registered.', 'success');
                    }
                    else if (result.status !== '101' && result.status !== '102') {
                        Qualification_details(result.status);
                        if ($("#WhetherEmployed").val() === 'YES') {
                            $("#btn_regist").prop('disabled', true);
                            EmployedDetailsAdd(result.status);
                        }
                        else {
                            $("#btn_regist").prop('disabled', true);
                            SuccessRedirectNextPage();
                        }
                        $.hideprogress();
                        swal('Congratulations', 'Your form has been successfully submitted. Please pay fee to complete your application.', 'info');
                        swalNoti('Your form has been successfully submitted. Please pay fee to complete your application.', 'info');
                    }
                    else {
                        $.hideprogress();
                        swalNoti('Mobile No. or Student Details already regisistered! Please verify your details.', 'error');
                    }
                },
                error: function (ex) {
                    $.hideprogress();
                    swalNoti('Registration not completed. Please verify your details.', 'error');
                }

            });
        }, function (dismiss) {
            return false;
        });
    }
}
//2000015
function EmployedDetailsAdd(regn_no) {
    var emplyed = new Array();
    $("#dynamicrow tr").each(function () {
        var tds = $(this).find("td");
        var catList = {
            Reg_id: regn_no,
            Name_Organization: $(tds[1]).html(),
            Designation: $(tds[2]).html(),
            DateOfJoining: $(tds[3]).html(),
            DateOfExit: $(tds[4]).html(),
            TotalExp: $(tds[5]).html()
        };
        emplyed.push(catList);
    });
    $.ajax({
        url: DynomicURL + '/student/Ceet/Employed',//Employed',
        type: "Post",
        data: JSON.stringify(emplyed),
        dataType: "html",
        contentType: "application/json; charset=utf-8",
        success: function (result) {
            if (result !== '101') {
                SuccessRedirectNextPage();
                $.hideprogress();
                swalNoti('Your form has been successfully submitted', 'success');
            }
            else {
                $.hideprogress();
                swalNoti('Registration not completed', 'error');
            }
        },
        error: function (ex) {
            $.hideprogress();
            swalNoti('Registration not completed', 'error');
        }
    });
}
function Qualification_details(regn_no) { //update
    var count = 0;

    $("#AcademicDetails input,#AcademicDetails select").each(function () {

        if (($(this).val() === null ? "" : $(this).val().trim()) === "" && $(this).prop("required") === true) {
            $(this).focus();
            check = true;
            if ($(this).attr('title') !== null) {
                swal("error", 'Required ' + $(this).attr('title'), 'error');
            }
            else {
                swal("Error", 'Required ' + $(this).attr('placeholder'), 'error');
            }
            count = 1;
            return false;
        }
    });
    if (count === 0) {
        $.showprogress('Loading', 'Loading.....', '<img src="~/Content/loadingbox/images/loadingimage.gif"/>');
        var stulist = new Array();
        var cnt = 1;
        $("#ttbody tr").each(function () {
            var td = $(this).find("td");
            var tds = $(this).find("input");
            var tdd = $(this).find("select");
            //you could use the Find method to find the texbox or the dropdownlist and get the value.
            var SStudent = {
                Reg_id: regn_no,
                SRNO: cnt,
                EXAM: $(td[0]).html(),
                INSTITUTE: $(tds[0]).val(),
                YEARPASSSED: $(tds[1]).val(),
                Roll_No: $(tds[2]).val(),
                BOARD: $(tds[3]).val(),
                MARKS: $(tds[4]).val(),
                MAXMARKS: $(tds[5]).val(),
                PERCENTAGE: $(tds[6]).val(),
                DIVISION: $(tds[7]).val(),
                SUBJECTS: $(tds[8]).val()
            };
            stulist.push(SStudent);
            cnt += 1;
        });

        $.ajax({
            url: DynomicURL + '/Student/Ceet/Qualification_details',
            dataType: "html",
            data: JSON.stringify(stulist),
            type: "POST",
            contentType: "application/json; charset=utf-8",
            success: function (result) {
                swalNoti('Qualification Details Submitted Successfully', 'success');
                result = JSON.parse(result);
                var status1 = result.status;
                $.hideprogress();
            },
            error: function (err) {
                swalNoti('Record not Submited', 'error');
                console.error(err);
                $.hideprogress();
            }
        });
    }
}
function SuccessRedirectNextPage() {
    //$.ajax({
    //    url: DynomicURL + '/student/OnlineAdmission/successPost',//FeeDeatils',
    //    type: "Post",
    //    data: { id:reg_id}       
    //}); 
    $("#rednerBody").load(DynomicURL + '/student/Ceet/success');
    //window.location.href = DynomicURL + '/student/OnlineAdmission/success';

}

function CountryList() {
    $.ajax({
        url: DynomicURL + '/ResultProcessing/Alldropdown/_Country',
        method: 'Post',
        dataType: 'json',
        success: function (result) {
            $('#NATIONALITY').empty();
            $.each(result.country, function (i, item) {
                $('#NATIONALITY').append(new Option(item.Text, item.Value));
                $('#PREADDRESSCountry').append(new Option(item.Text, item.Value));
                $('#PERADDRESSCountry').append(new Option(item.Text, item.Value));
            });
            $('#NATIONALITY').val('101');
            $('#PREADDRESSCountry').val('101');
            $('#PERADDRESSCountry').val('101');
            StateListPR("21");
            StateListPE("21");
        }
    });
}
function StateListPR() {
    $.showprogress('Loading', 'Loading.....', '<img src="/Content/loadingbox/image/loadingimage.gif"/>');
    $.ajax({
        url: DynomicURL + '/ResultProcessing/Alldropdown/_State',
        method: 'Post',
        data: { country_id: $('#PREADDRESSCountry').val() },
        dataType: 'json',
        success: function (result) {
            $('#PREADDRESSSTATE').empty();
            $.each(result.state, function (i, item) {
                $('#PREADDRESSSTATE').append(new Option(item.Text, item.Value));
            });
            $.hideprogress();
        },
        error: function (ex) {
            $.hideprogress();
        }
    });
}
function CityListPR(_selected) {
    if ($('#PREADDRESSSTATE').val() === "" && parseInt($('#PREADDRESSSTATE').val()) < 0) {
        return false;
    }
    else {
        $.showprogress('Loading', 'Loading.....', '<img src="/Content/loadingbox/image/loadingimage.gif"/>');
        $.ajax({
            url: DynomicURL + '/ResultProcessing/Alldropdown/_City',
            method: 'Post',
            data: { state_id: $('#PREADDRESSSTATE').val() },
            dataType: 'json',
            success: function (result) {
                $('#PREADDRESSDIST').empty();
                $.each(result.city, function (i, item) {
                    $('#PREADDRESSDIST').append(new Option(item.Text, item.Value));
                });
                if (_selected !== "") {
                    $('#PREADDRESSDIST').val(_selected);
                }
                $.hideprogress();
            },
            error: function (ex) {
                $.hideprogress();
            }
        });
    }
}
function StateListPE(_selected) {
    $.showprogress('Loading', 'Loading.....', '<img src="/Content/loadingbox/image/loadingimage.gif"/>');
    $.ajax({
        url: DynomicURL + '/ResultProcessing/Alldropdown/_State',
        method: 'Post',
        data: { country_id: $('#PERADDRESSCountry').val() },
        dataType: 'json',
        success: function (result) {
            $('#PERADDRESSSTATE').empty();
            $.each(result.state, function (i, item) {
                $('#PERADDRESSSTATE').append(new Option(item.Text, item.Value));
            });
            if (_selected !== "") {
                $('#PERADDRESSSTATE').val(_selected);
            }
            $.hideprogress();
        },
        error: function (ex) {
            $.hideprogress();
        }
    });
}
function CityListPE(_selected) {
    if ($('#PERADDRESSSTATE').val() === "" && parseInt($('#PERADDRESSSTATE').val()) < 0) {
        return false;
    }
    $.showprogress('Loading', 'Loading.....', '<img src="/Content/loadingbox/image/loadingimage.gif"/>');
    $.ajax({
        url: DynomicURL + '/ResultProcessing/Alldropdown/_City',
        method: 'Post',
        data: { state_id: $('#PERADDRESSSTATE').val() },
        dataType: 'json',
        success: function (result) {

            $('#PERADDRESSDIST').empty();
            $.each(result.city, function (i, item) {
                $('#PERADDRESSDIST').append(new Option(item.Text, item.Value));
            });
            if (_selected !== "") {
                $('#PERADDRESSDIST').val(_selected);
            }
            $.hideprogress();
        },
        error: function (ex) {
            $.hideprogress();
        }
    });
}

//OTP send
$(document).ready(function () {
    $("#btn_otp").click(function () {
        var mobile = $("#txtMobileOTP");
        var email = $("#txtEmailOTP");
        if (IsValidEmail(email) === true) {
            if (IsValidMobile(mobile) === true) {
                $("#btn_otp").text('Sending..');
                $("#btn_otp").prop('disabled', true);
                $.showprogress('Loading', 'Loading.....', '<img src="~/Content/loadingbox/images/loadingimage.gif"/>');
                $.ajax({
                    url: DynomicURL + '/student/Ceet/GenratOTP',
                    method: 'Get',
                    data: { _mobile: mobile.val(), _email: email.val() },
                    dataType: 'json',
                    success: function (result) {

                        if (result.status !== '101' && result.status !== '102') {
                            $.hideprogress();
                            $("#div_otp").removeClass('hide');

                            swalNoti('OTP sent on your mobile & email address.', 'success');
                            swal('OTP Sent', 'OTP sent on your mobile (' + mobile.val() + ') & email address (' + email.val() + ').', 'success');
                            $("#btn_otp").prop('disabled', true);
                            $("#btn_otp").text('Resend OTP in 60 Seconds');
                            var display = $("#btn_otp");
                            startTimer(60, display);
                            setTimeout(function () {
                                $("#btn_otp").prop('disabled', false);
                                $("#btn_otp").text('Resend OTP  ');
                            }, 60 * 1000);
                            //$("#btn_otp").text('Resend OTP');
                        }
                        else {
                            if (result.status !== '102') {
                                $("#div_otp").addClass('hide');
                                $("#btn_otp").text('Send OTP');
                                swalNoti('We are getting some technical issues. We are comming back very soon.', 'error');
                            }
                            else {
                                $("#div_otp").addClass('hide');
                                $("#btn_otp").text('Send OTP');
                                swalNoti('Please enter a valid email and mobile number.', 'error');
                            }
                            $.hideprogress();
                        }
                    },
                    error: function (ex) {
                        $.hideprogress();
                        $("#div_otp").addClass('hide');
                        $("#btn_otp").text('Send OTP');
                        swalNoti('Sorry we are getting some technical error. Please try after some time.', 'error');
                    }
                });
            }
        }
        $("#btn_otp").prop('disabled', false);
    });
    $("#txt_otp").change(function () {
        var otp = $("#txt_otp").val();
        if (otp.length === 6) {
            $.showprogress('Loading', 'Loading.....', '<img src="~/Content/loadingbox/images/loadingimage.gif"/>');
            $.ajax({
                url: DynomicURL + '/student/Ceet/VerifyOTP',
                method: 'Get',
                data: { _OTP: otp },
                dataType: 'json',
                success: function (result) {
                    if (result.status !== '101') {
                        //startTimer(01, $("#btn_otp"));
                        //setTimeout(function () {
                        //    $("#btn_otp").prop('disabled', false);
                        //    $("#btn_otp").text('Resend OTP  ');
                        //}, 01 * 1000);

                        $("#btn_otp").hide();

                        $("#ch_confirm").prop('disabled', false);
                        $("#div_otp").addClass('hide').fadeOut();
                        $("#txtMobileOTP").prop('disabled', true);
                        $("#txtEmailOTP").prop('disabled', true);
                        $.hideprogress();
                        swalNoti('OTP match.', 'success');
                        $("#txt_otp").val('');


                    }
                    else {
                        $.hideprogress();
                        $("#txt_otp").val('');
                        swalNoti('Invalid One time password.', 'error');
                    }
                },
                error: function (ex) {
                    $("#txt_otp").val('');
                    $.hideprogress();
                    swalNoti('Invalid One time password.', 'error');
                }
            });
        }
        else {
            $.hideprogress();
            swal('Wrong OTP', 'You have entered wrong OTP.', 'error');
        }
    });
    $("#txtMobileOTP").change(function () {
        $("#div_otp").addClass('hide').fadeOut();
        $("#btn_otp").text('Send OTP');
    });
    $("#txtMobileOTP").change(function () {
        $("#div_otp").addClass('hide').fadeOut();
        $("#btn_otp").text('Send OTP');
    });
});


//validation mobile and email 
function AllValidation() {
    var check = true;
    if (dateOFbirth() === false) {
        check = false;
    }
    var categoryList = new Array();
    $("#dynamicrow tr").each(function () {
        var tds = $(this).find("td");
        var catList = {
            Name_Organization: $(tds[1]).html(),
            Designation: $(tds[2]).html(),
            DateOfJoining: $(tds[3]).html(),
            DateOfExit: $(tds[4]).html(),
            TotalExp: $(tds[5]).html()
        };
        categoryList.push(catList);
    });
    if (categoryList.length < 0 && $("#WhetherEmployed").val() === 'YES') {
        swalNoti('Please fill employed details', 'error');
        check = false;
    }
    return check;
}
function dateOFbirth() {
    var today = new Date();
    var birthDate = new Date($("#DOB").val());
    var age = today.getFullYear() - birthDate.getFullYear();
    if (age <= 10) {
        $("#DOB").focus();
        swalNoti('Please enter a valid date.', 'error');
        return false;
    }
    return true;
}
function IsValidMobile(num) {
    var phoneNumber = num.val();
    var filter = /^((\+[1-9]{1,4}[ \\-]*)|(\([0-9]{2,3}\)[ \\-]*)|([0-9]{2,4})[ \\-]*)*?[0-9]{3,4}?[ \\-]*[0-9]{3,4}?$/;
    if (filter.test(phoneNumber)) {
        if (phoneNumber.length === 10) {
            if (phoneNumber.slice(0, 3) === "000") {
                num.val('');
                num.focus();
                swalNoti('Please enter a valid mobile number', 'error');
                return false;
            }
            else {
                return true;
            }

        } else {
            num.val('');
            num.focus();
            swalNoti('Please put 10  digit mobile number', 'error');
            return false;
        }
    }
    else {
        num.val('');
        num.focus();
        swalNoti('Not a valid number', 'error');
        return false;
    }
}
function IsValidEmail(_email) {
    var email = _email.val();
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        _email.val('');
        _email.focus();
        swalNoti('Not a valid email address', 'error');
        return false;
    } else {
        return true;
    }
}

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var myVar = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        $(display).text('Resend OTP in : ' + seconds + ' Seconds');

        if (--timer < 0) {
            //timer = duration;
            $(display).text('Resend OTP');
            myStopFunction();
            return false;
        }
    }, 1000, 60);

    function myStopFunction() {
        clearInterval(myVar);
    }
}
function checkMarksDetails() {

    var LAST_PASSED_EXAM = $("#LAST_PASSED_EXAM").val();
    var check12 = false;
    var check13 = false;
    var check14 = false;
    var check15 = false;
    var _isAppear = $("#IsAppear").is(":visible") ? false : true;

    if (LAST_PASSED_EXAM === "02") {
        check12 = true;
    }
    if (LAST_PASSED_EXAM === "03") {
        check12 = true;
        check13 = true;
    }
    if (LAST_PASSED_EXAM === "04") {
        check12 = true;
        check13 = true;
        check14 = true;
    }
    if (LAST_PASSED_EXAM === "05") {
        check12 = true;
        check13 = true;
        check14 = true;
        check15 = true;
    }

    if (LAST_PASSED_EXAM === "02" && _isAppear === true && check12 === true) {

        $("#XIIINSTITUTE").attr("required", "true");
        $("#XIIYEARPASSSED").attr("required", "true");
        $("#XIIRoll_No").attr("required", "true");
        $("#XIIBOARD").attr("required", "true");
        $("#XIIMARKS").attr("required", "true");
        $("#XIIMARKS").attr("required", "true");
        $("#XIIPERCENTAGE").attr("required", "true");
        $("#XIIDIVISION").attr("required", "true");
        $("#XIISUBJECTS").attr("required", "true");
    }

    if (LAST_PASSED_EXAM === "03" && _isAppear === true && check13 === true) {

        $("#XIIIINSTITUTE").attr("required", "true");
        $("#XIIIYEARPASSSED").attr("required", "true");
        $("#XIIIRoll_No").attr("required", "true");
        $("#XIIIBOARD").attr("required", "true");
        $("#XIIIMARKS").attr("required", "true");
        $("#XIIIMARKS").attr("required", "true");
        $("#XIIIPERCENTAGE").attr("required", "true");
        $("#XIIIDIVISION").attr("required", "true");
        $("#XIIISUBJECTS").attr("required", "true");
    }
    if (LAST_PASSED_EXAM === "04" && _isAppear === true && check14 === true) {
        $("#XIVINSTITUTE").attr("required", "true");
        $("#XIVYEARPASSSED").attr("required", "true");
        $("#XIVRoll_No").attr("required", "true");
        $("#XIVBOARD").attr("required", "true");
        $("#XIVMARKS").attr("required", "true");
        $("#XIVMARKS").attr("required", "true");
        $("#XIVPERCENTAGE").attr("required", "true");
        $("#XIVDIVISION").attr("required", "true");
        $("#XIVSUBJECTS").attr("required", "true");
    }
    if (LAST_PASSED_EXAM === "05" && _isAppear === true && check15 === true) {
        $("#XVINSTITUTE").attr("required", "true");
        $("#XVYEARPASSSED").attr("required", "true");
        $("#XVRoll_No").attr("required", "true");
        $("#XVBOARD").attr("required", "true");
        $("#XVMARKS").attr("required", "true");
        $("#XVMARKS").attr("required", "true");
        $("#XVPERCENTAGE").attr("required", "true");
        $("#XVDIVISION").attr("required", "true");
        $("#XVSUBJECTS").attr("required", "true");
    }
}

function perX() {
    //checkMarksDetails(); //add required field
    var xMARKS = parseInt($("#XMARKS").val() === "" ? "0" : $("#XMARKS").val());
    var xXMAXMARKS = parseInt($("#XMAXMARKS").val() === "" ? "0" : $("#XMAXMARKS").val());
    var LAST_PASSED_EXAM = $("#LAST_PASSED_EXAM").val();
    var LAST_PASSED_per = $("#QualifyPer").text();
    var value = $("#xth").html();
    if (xMARKS <= xXMAXMARKS) {
        var per = (parseInt(xMARKS) * 100) / parseInt(xXMAXMARKS);
        $("#XPERCENTAGE").val(per.toFixed(2));
        if (LAST_PASSED_EXAM === "01") {
            if (parseInt(LAST_PASSED_per) === parseInt(per)) {
                $("#XPERCENTAGE").val(per.toFixed(2));
            }
            else {
                swalNoti("Qualifying Exam Per " + LAST_PASSED_per + " and Enter percentage does not match " + per + " Please check again", 'info');
                $("#XMAXMARKS").val('');
            }
        }
    }
    else {
        $("#XMAXMARKS").val('');
    }
}
function perXII() {
    var xMARKS = parseInt($("#XIIMARKS").val() === "" ? "0" : $("#XIIMARKS").val());
    var xXMAXMARKS = parseInt($("#XIIMAXMARKS").val() === "" ? "0" : $("#XIIMAXMARKS").val());
    var LAST_PASSED_EXAM = $("#LAST_PASSED_EXAM").val();
    var LAST_PASSED_per = $("#QualifyPer").text();
    if (xMARKS <= xXMAXMARKS) {
        var per = (parseInt(xMARKS) * 100) / parseInt(xXMAXMARKS);
        $("#XIIPERCENTAGE").val(per.toFixed(2));
        if (LAST_PASSED_EXAM === "02") {
            if (parseInt(LAST_PASSED_per) === parseInt(per)) {
                $("#XIIPERCENTAGE").val(per.toFixed(2));
            }
            else {
                swalNoti("Last Qualifying Exam Per " + parseInt(LAST_PASSED_per) + " and current per " + per + " Please check again", 'info');
                $("#XIIMAXMARKS").val('');
            }
        }
    }
    else {
        $("#XIIMAXMARKS").val('');
    }
}
function perXIII() {
    var xMARKS = parseInt($("#XIIIMARKS").val() === "" ? "0" : $("#XIIIMARKS").val());
    var xXMAXMARKS = parseInt($("#XIIIMAXMARKS").val() === "" ? "0" : $("#XIIIMAXMARKS").val());
    var LAST_PASSED_EXAM = $("#LAST_PASSED_EXAM").val();
    var LAST_PASSED_per = $("#QualifyPer").val();
    if (xMARKS < xXMAXMARKS) {
        var per = (parseInt(xMARKS) * 100) / parseInt(xXMAXMARKS);
        $("#XIIIPERCENTAGE").val(per.toFixed(2));

        if (LAST_PASSED_EXAM === "03") {
            if (parseInt(LAST_PASSED_per) === parseInt(per)) {
                $("#XIIIPERCENTAGE").val(per.toFixed(2));
            }
            else {
                swalNoti("Last Qualifying Exam Per " + LAST_PASSED_per + " and Enter Password does not match " + per + " Please check again", 'info');
                $("#XIIIMAXMARKS").val('');
            }
        }
    }
    else {
        $("#XIIIMAXMARKS").val('');
    }
}
function perXIV() {
    var xMARKS = parseInt($("#XIVMARKS").val() === "" ? "0" : $("#XIVMARKS").val());
    var xXMAXMARKS = parseInt($("#XIVMAXMARKS").val() === "" ? "0" : $("#XIVMAXMARKS").val());
    var LAST_PASSED_EXAM = $("#LAST_PASSED_EXAM").val();
    var LAST_PASSED_per = $("#QualifyPer").text();

    if (xMARKS < xXMAXMARKS) {
        var per = (parseInt(xMARKS) * 100) / parseInt(xXMAXMARKS);
        $("#XIVPERCENTAGE").val(per.toFixed(2));
        if (LAST_PASSED_EXAM === "04") {
            if (parseInt(LAST_PASSED_per) === parseInt(per)) {
                $("#XIIIPERCENTAGE").val(per.toFixed(2));
            }
            else {
                swalNoti("Last Qualifying Exam Per " + LAST_PASSED_per + " and Enter Password does not match " + per + " Please check again", 'info');
                $("#XIVMAXMARKS").val('');
            }
        }
    }
    else {
        $("#XIVMAXMARKS").val('');
    }
}
function perXV() {
    var xMARKS = parseInt($("#XVMARKS").val() === "" ? "0" : $("#XVMARKS").val());
    var xXMAXMARKS = parseInt($("#XVMAXMARKS").val() === "" ? "0" : $("#XVMAXMARKS").val());
    var LAST_PASSED_EXAM = $("#LAST_PASSED_EXAM").val();
    var LAST_PASSED_per = $("#QualifyPer").text();
    if (xXMAXMARKS >= xMARKS) {
        var per = (parseInt(xMARKS) * 100) / parseInt(xXMAXMARKS);
        $("#XVPERCENTAGE").val(per.toFixed(2));
        if (LAST_PASSED_EXAM === "05") {
            if (parseInt(LAST_PASSED_per) === parseInt(per)) {
                $("#XIIIPERCENTAGE").val(per.toFixed(2));
            }
            else {
                swalNoti("Last Qualifying Exam Per " + LAST_PASSED_per + " and Enter Password does not match " + per.toFixed(2) + " Please check again", 'info');
                $("#XVMAXMARKS").val('');
            }
        }
    }
    else {
        $("#XVMAXMARKS").val('');
    }
}

function PayementPanelLoad() {
    $.showprogress('Loading', 'Loading.....', '<img src="~/Content/loadingbox/images/loadingimage.gif"/>');
    //debugger
    //var dd = $("input[name='page']:checked").val();

    $.ajax({
        url: DynomicURL + '/student/Ceet/PaymentStatus',//FeeDeatils',
        method: 'post',
        data: {
            Registration_Id: $('#reg_id').val(),
            btnType: $("input[name='page']:checked").val()
        },
        success: function (result) {
            $.hideprogress();
            $("#paymentformPartial").html(result);

        },
        error: function (ex) {
            $.hideprogress();
            $("#paymentformPartial").html(ex.responseText);

        }
    });
}
function getphoto() {
    $.ajax({
        url: DynomicURL + '/Student/Ceet/GetPhoto',
        type: "POST",
        data: {
            Reg_id: $("#Reg_id").val(),
            Enrol_No: $("#Enrol_No").val()
        },
        success: function (result) {
            $("#DIVPHOTO").html(result);
            $("#profileDIVPHOTO").html(result);
            getsign();
        },
        error: function (ex) {
            $("#DIVPHOTO").html(ex.responseText);
            // alert('Photo not uploaded');
        }

    });
}
function getsign() {
    $.ajax({
        url: DynomicURL + '/Student/Ceet/GetSign',
        type: "POST",
        data: {
            Reg_id: $("#Reg_id").val(),
            Enrol_No: $("#Enrol_No").val()
        },
        success: function (result) {
            $("#DIVSIGN").html(result);
        },
        error: function (ex) {
            $("#DIVSIGN").html(ex.responseText);
            swalNoti('sign not uploaded', 'info');
        }

    });
}
function UploadImage() {

    var fileUpload = document.getElementById("FLPHOTO");
    var selectedFile = fileUpload.files[0];
    var idxDot = selectedFile.name.lastIndexOf(".") + 1;
    var extFile = selectedFile.name.substr(idxDot, selectedFile.name.length).toLowerCase();
    if (extFile === "jpg" || extFile === "jpeg") {
        //do whatever want to do
    } else {
        alert("Only jpg/jpeg files are allowed!");
        return false;
    }

    if (typeof (fileUpload.files) !== "undefined") {
        if (fileUpload.files.length < 1) {
            swalNoti("Please select image.", "error");
            return false;
        }
        var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
        if (parseInt(size) > 50) {
            swalNoti('Photo Image size should be less or equal to 50kb. Upload image size is ' + size + " KB.", 'error');
            return false;
        }
    } else {
        swalNoti("This browser does not support HTML5.", "warning");
        return false;
    }

    $.showprogress('Loading', 'Loading.....', '<img src="~/Content/loadingbox/images/loadingimage.gif"/>');
    var formData = new FormData();
    var totalFiles = document.getElementById("FLPHOTO").files.length;
    for (var i = 0; i < totalFiles; i++) {
        var file = document.getElementById("FLPHOTO").files[i];
        formData.append("PHOTO", file);
    }
    formData.append("Reg_id", $("#reg_id").val());
    $.ajax({
        //url: '/Departments/UpdateStudentDetails/DetailsPhoto',
        url: DynomicURL + '/Student/Ceet/DetailsPhoto',
        //data: { YR_MON: $("#drpsession").val(), FAC_CODE: $("#drpfaculty").val(), EXAM_CODE: $("#drpcourse").val(), BRCODE: $("#drpbranch").val(), SUB_BRCODE: $("#drpsubbranch").val(), PAPERTYPE: $("#drppapertype").val(), SEM: $("#drpsemester").val(), SUBJ_CD: $("#drpsub").val(), CATEGORY: $("#drpcategory").val() },
        type: "POST",
        contentType: false,
        processData: false,
        data: formData,
        success: function (result) {
            var status1 = result.status;
            $("#Reg_id6").val(status1);
            $("#DIVPHOTO").html(result);
            $.hideprogress();
        },
        error: function (ex) {
            $("#DIVPHOTO").html(ex.responseText);
            $.hideprogress();
        }
    });
}

function UploadSign() {
    var fileUpload = document.getElementById("FLSIGN");
    var selectedFile = fileUpload.files[0];
    var idxDot = selectedFile.name.lastIndexOf(".") + 1;
    var extFile = selectedFile.name.substr(idxDot, selectedFile.name.length).toLowerCase();
    if (extFile === "jpg" || extFile === "jpeg") {
        //do whatever want to do
    } else {
        alert("Only jpg/jpeg files are allowed!");
        return false;
    }
    if (typeof (fileUpload.files) !== "undefined") {
        if (fileUpload.files.length < 1) {
            swalNoti("Please select image.", "error");
            return false;
        }
        var size = parseFloat(fileUpload.files[0].size / 1024).toFixed(2);
        if (parseInt(size) > 50) {
            swalNoti('Signature Image size should be less or equal to 50kb. Upload image size is ' + size + " KB.", 'error');
            return false;
        }
    } else {
        swalNoti("This browser does not support HTML5.", "warning");
        return false;
    }

    $.showprogress('Loading', 'Loading.....', '<img src="~/Content/loadingbox/images/loadingimage.gif"/>');
    var formData = new FormData();
    var totalFiles = document.getElementById("FLSIGN").files.length;
    for (var i = 0; i < totalFiles; i++) {
        var file = document.getElementById("FLSIGN").files[i];
        formData.append("SIGN", file);
    }
    formData.append("Reg_id", $("#reg_id").val());
    $.ajax({
        //url: '/Departments/UpdateStudentDetails/DetailsPhoto',
        url: DynomicURL + '/Student/Ceet/DetailsSign',
        //data: { YR_MON: $("#drpsession").val(), FAC_CODE: $("#drpfaculty").val(), EXAM_CODE: $("#drpcourse").val(), BRCODE: $("#drpbranch").val(), SUB_BRCODE: $("#drpsubbranch").val(), PAPERTYPE: $("#drppapertype").val(), SEM: $("#drpsemester").val(), SUBJ_CD: $("#drpsub").val(), CATEGORY: $("#drpcategory").val() },
        type: "POST",
        contentType: false,
        processData: false,
        data: formData,
        success: function (result) {
            var status1 = result.status;
            $("#Reg_id6").val(status1);
            $("#DIVSIGN").html(result);
            $.hideprogress();
        },
        error: function (ex) {
            $("#DIVSIGN").html(ex.responseText);
            $.hideprogress();
        }
    });
}