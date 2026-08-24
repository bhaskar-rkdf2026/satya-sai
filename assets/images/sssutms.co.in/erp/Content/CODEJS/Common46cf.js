/*  
    Copyright (C) 2013 M.Taqiuzzaman

*/
var isIE = document.all ? true : false;
var myimg = new Image();
var sPos = 0;
var isTh = false;
var isNg = false;
var kbmode = "roman";
var pkbmode = "roman";
var SplKeys = new Array();
var toShowHelp = true;


/* Start ::  Script */
var message = "Sorry, right-click has been disabled";
function clickIE() {
    if (document.all) {
        swalNoti(message, 'warning');
        return false;
    }
}
function clickNS(e) {
    if (document.layers || (document.getElementById && !document.all)) {
        if (e.which === 2 || e.which === 3) {
            swalNoti(message, 'warning');
            return false;
        }
    }
}
if (document.layers) {
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown = clickNS;
}
else {
    document.onmouseup = clickNS;
    document.oncontextmenu = clickIE;
}
document.oncontextmenu = new Function("return false")

function DisableCopyPaste(e) {
    var message = "Cntrl key/ Right Click Option disabled";
    var kCode = event.keyCode || e.charCode;
    if (kCode === 17 || kCode === 2) {
        swalNoti(message, 'warning');
        return false;
    }
}

function SetWaterMark(tbNm, evnt) {
    var el = document.getElementById(tbNm);
    if (evnt === "focus")
        if (el.value.toUpperCase() === wtrmrk.toUpperCase())
            el.value = "";
        else
            el.select();
    else if (el.value === '')
        el.value = wtrmrk;

}
function charsonly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if (charCode > 33 && ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122))) {
        swalNoti("Enter Characters only in this field.", 'warning');
        return false;
    }
    return true;
}
function numbersonly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        swalNoti("Enter Number only in this field.", 'warning');
        return false;
    }
    return true;
}
function numeralsCharOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if (charCode > 33 && ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode < 44 || charCode > 57))) {
        swalNoti("No Special character allowed!", "warning");
        return false;
    }
    return true;
}
function numAnddot(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if (charCode === 46 || (charCode > 47 && charCode < 58)) {
        return true;
    }
    swalNoti("Enter Only Number with 2decimal place.", 'warning');
    return false;
}
function datematch(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if (charCode >= 47 && charCode <= 57 || charCode === 8 || charCode === 127) {
        return true;
    }
    swalNoti("Enter Valid Date Format (DD/MM/YYYY).", 'warning');
    return false;
}
function getDate(Month, day, year) {
    var DOB = "" + Month + "" + "," + "" + day + "" + "," + "" + year + "";
    var endDate = "Jan, 01, 2013";
    var d1 = new Date(DOB);
    var d2 = new Date(endDate);
    DateDiff = {
        inYears: function (d1, d2) {
            return d2.getFullYear() - d1.getFullYear();
        }
    }

    if (DateDiff.inYears(d1, d2) > 35) {
        swalNoti('Your age as on 01.01,2013 is more than 35 years. Please ensure that you are eligible for certain age relaxation as per instructions of UGC. and also ensure that you are not over-age  after such age relaxation  admissible to you. If it is found at any stage that you are over-age after allowing admissible age relaxation, your candidature shall be rejected out rightly without any notice.', 'warning');
    }
}
function email() {
    var first = document.getElementById('txtEmailAddress').value;
    var second = document.getElementById('TextBox1').value;
    if (document.getElementById('txtEmailAddress').value !== '' && document.getElementById('TextBox1').value !== '') {
        if (first === second) {
            document.getElementById('Image1').style.display = '';
            document.getElementById('Image2').style.display = 'none';
        }
        else {
            document.getElementById('Image2').style.display = '';
            document.getElementById('Image1').style.display = 'none';
            document.getElementById('txtEmailAddress').value = '';
            document.getElementById('TextBox1').value = '';
            alert("Email Address and Confirm Email Address does not match !");
        }
    }
    else {
        document.getElementById('Image2').style.display = '';
        document.getElementById('Image1').style.display = 'none';
        document.getElementById('txtEmailAddress').value = '';
        document.getElementById('TextBox1').value = '';
        alert("Email Address and Confirm Email Address does not match !");
    }
}
//Subject Master
function charsonlyCOMP_OPT(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if (charCode !== 67 && charCode !== 79) {
        swal("Enter C or O Characters only in this field.");
        return false;
    }
    return true;
}
function charsonlySUBJ_COUNT(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if (charCode !== 89 && charCode !== 78) {
        swal("Enter Y or N Characters only in this field.");
        return false;
    }
    return true;
}
function numbersonlyonezero(evt) {

    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if (charCode === 48 || charCode === 49) {
        //swal("Enter 0 or 1 Number only in this field.");
        return true;
    }
    else {
        swal("Enter 0 or 1 Number only in this field.");
        return false;
    }
}
function charsonlysubnm(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if (charCode > 32 && ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122))) {
        swal("Enter Characters only in this field.");
        return false;
    }
    return true;
}
function isIntegerWithComma(evt, val) {
    
    var dInput = val.value;
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    if (key.length == 0) return;
    var regex = /^[0-9,\b]+$/;
    if (!regex.test(key)) {

        if (theEvent.preventDefault) theEvent.preventDefault();
        swalNoti('Enter a valid number seprated with comma if you have selected mutible qualification than number seprated with comma.', 'error');
        theEvent.returnValue = false;
        return false;
    }
    return true;
}
// common validation for all page
function IsSameLetterContinued(textId, textLengthRestricted) {
    var number = textLengthRestricted === "" ? 0 : parseInt(textLengthRestricted);
    var textValue = textId.val();
    if (textValue != "") {
        if (textValue.trim().length > 0) {
            var count = 0;
            for (var i = 0; i < textValue.trim(); i++) {
                if (i > 0) {
                    if (textValue[i] == textValue[i - 1]) {
                        count = count + 1;
                        if (count < number) {
                            textId.focus();
                            swalNoti('You have entered repeated text', 'error');
                            return false;
                        }
                    }
                    else {
                        count = 0;
                    }
                }
            }
            if (count === 0) {
                return true;
            }
        }
        else {
            textId.focus();
            swalNoti('Please enter the value', 'error');
            return false;
        }
    }
    else {
        textId.focus();
        swalNoti('Please enter the value', 'error');
        return false;
    }
}

function IsPINCode(_PinCode) {
    var _pin = _PinCode.val();
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(_pin)) {
        if (_pin.length >= 6) {
            if (_pin.slice(0, 3) === "000") {
                _PinCode.val('');
                _PinCode.focus();
                swalNoti('Pin code starting digits should not be zero.', 'error');
                return false;
            }
            else {
                return true;
            }

        } else {
            _PinCode.val('');
            _PinCode.focus();
            swalNoti('Pin code should be minimum six digits', 'error');
            return false;
        }
    }
    else {
        _PinCode.val('');
        _PinCode.focus();
        swalNoti('Please enter a valid pin code', 'error');
        return false;
    }
}

function IsIFSECode(ifse) {
    var inputvalues = ifse.val();
    var reg = new RegExp('/^[As-Z|a-z]{4}[0][a-zA-Z0-9]{6}$/');
    if (inputvalues.match(reg)) {
        return true;
    }
    else {
        ifse.val("");
        swalNoti("You entered invalid IFSC code");
        return false;
    }
}
function IsDateOFbirth(date) {
    var newdate = date.val();//date dd/mm/yyyy other format not working
    var res = newdate.split("/");
    if (res[2].length == 4) {
        newdate = res[2] + '/' + res[1] + '/' + res[0];
    }
    var today = new Date();
    var birthDate = new Date(newdate);
    var age = today.getFullYear() - birthDate.getFullYear();
    if (age >= 10) {
        return true;
    }
    else {
        date.val('');
        date.focus();
        swalNoti('Please enter a valid date.', 'error');
        return false;
    }
}
function IsPassport(passport) {
    var regsaid = /[a-zA-Z]{2}[0-9]{7}/;
    if (regsaid.test(passport) == false) {
        swalNoti('Passport is not yet valid.', 'error');
    }
    else {
        return true;
    }
}
function IsAdharNo(adhar) {
    var addhar = adhar.val();
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(addhar)) {
        if (addhar.length >= 10) {
            if (addhar.slice(0, 3) === "00000") {
                adhar.val('');
                adhar.focus();
                swalNoti('Please enter a valid aadhar number', 'error');
                return false;
            }
            else {
                return true;
            }

        } else {
            adhar.val('');
            adhar.focus();
            swalNoti('Please put 11  digit aadhar number', 'error');
            return false;
        }
    }
    else {
        adhar.val('');
        adhar.focus();
        swalNoti('Not a valid aadhar', 'error');
        return false;
    }
}
function IsValidMobile(num) {
    var phoneNumber = num.val();
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
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
    debugger
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
function IsAmmount(amount) {

    if (amount.val() < 1) {
        amount.focus();
        amount.val('');
        swalNoti('Please enter a valid account number.', 'error');
        return false;
    }
    else {
        return true;
    }
}
function IsAccountNo(account) {
    if (account.val().trim() != "") {
        if (account.val() < 1) {
            account.focus();
            account.val('');
            swalNoti('Please enter a valid account number.', 'error');
            return false;
        }
        else {
            if (account.val().length < 6) {
                account.focus();
                account.val('');
                swalNoti('Please enter a valid account number.', 'error');
                return false;
            }
            return true;
        }
    }
}
function IsReceipt(Receipt) {
    if (Receipt.val().trim().length > 3) {
        if (Receipt.val() < 1) {
            Receipt.focus();
            Receipt.val('');
            swalNoti('Receipt number should be four digits. (Ex- 0001)', 'error');
            return false;
        }
        return true;
    }
    else {
        Receipt.focus();
        Receipt.val('');
        swalNoti('Please enter a valid receipt number.', 'error');
        return false;
    }
}

function IsQualificationYear(_yearText) {
    
    var _year = _yearText.val();
    if (_year != "") {
        var date = new Date();
        var fullYear = date.getFullYear();
        if (_year.length === 4) {
            if (parseInt(_year) > 1900 && parseInt(_year) <= fullYear) {
                return true;
            }
            else {
                _yearText.focus();
                _yearText.val('');
                swalNoti('Enter a valid qualification year. (Ex- 1900 to ' + fullYear + ' )', 'error');
                return false;
            }
        }
        else {
            _yearText.focus();
            _yearText.val('');
            swalNoti('Enter a valid qualification year.', 'error');
            return false;
        }
    }
    else {
        _yearText.focus();
        _yearText.val('');
        swalNoti('Enter qualification year.', 'error');
        return false;
    }
}
