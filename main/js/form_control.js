const registerButton = document.getElementById('registerBtn');
const continueButton = document.getElementById('continueButton');
const backButton = document.getElementById('backBtn');
const adminForm = document.getElementById('adminForm');
const pharmacyForm = document.getElementById('pharmacyForm');

const pharmName  = document.getElementById('pharmName');
const pharmAddr  = document.getElementById('pharmAddr');
const pharmCity  = document.getElementById('pharmCity');
const pharmZip  = document.getElementById('pharmZip');
const pharmEmail  = document.getElementById('pharmEmail');
const pharmPhone  = document.getElementById('pharmPhone');

const empFirst = document.getElementById('empFirst');
const empLast = document.getElementById('empLast');
const empLicense = document.getElementById('empLicense');
const empAddr = document.getElementById('empAddr');
const empCity = document.getElementById('empCity');
const empZip = document.getElementById('empZip');
const empEmail = document.getElementById('empEmail');
const empPhone = document.getElementById('empPhone');
const password = document.getElementById('password');

continueButton.onclick = function()
{
    if(pharmName.value.length < 1 || pharmAddr.value.length < 1 || pharmCity.value.length < 1 ||
        pharmZip.value.length < 1 || pharmEmail.value.length < 1 ||  pharmPhone.value.length < 1)
    {
        document.getElementById('contMsg').style.display = 'block';
    }
    else
    {
        document.getElementById('contMsg').style.display = 'none';
        pharmacyForm.style.display = 'none';
        adminForm.style.display = 'block';
    }
};

backButton.onclick = function()
{
    pharmacyForm.style.display = 'block';
    adminForm.style.display = 'none';
};

var passField1 = document.getElementById('password');
var passField2 = document.getElementById('confirmPassword');

passField1.addEventListener('keyup', checkPass);
passField2.addEventListener('keyup', checkPass);
function checkPass()
{
    var regexMatch = false;
    const regex = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\s:])([^\s]){8,}$/;
    if(passField1.value.match(regex) !== null)
    {
        document.getElementById('message1').innerText = "Password meets the required conditions";
        if(passField2.value.match(regex) !== null)
            if(passField2.value === passField1.value)
                document.getElementById('message2').innerText = "Both passwords match";
            else
                document.getElementById('message2').innerText = "Passwords do not match";
    }
}


registerButton.onclick = function ()
{
    if(empFirst.value.length < 1 || empLast.value.length < 1 || empLicense.value.length < 1 ||
        empAddr.value.length < 1 || empCity.value.length < 1 || empZip.value.length < 1 ||
        empEmail.value.length < 1 || empPhone.value.length < 1 || password.value.length < 1 ||
        confirmPassword.value.length < 1)
    {
        document.getElementById('registerMsg').style.display = 'block';
    }
};