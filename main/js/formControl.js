//Document element variables
const registerButton = document.getElementById('registerBtn');
const continueButton = document.getElementById('continueButton');
const backButton = document.getElementById('backBtn');
const adminForm = document.getElementById('adminForm');
const pharmacyForm = document.getElementById('pharmacyForm');

//Input field variables
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

//On clicking continue button check if the pharmacy form is filled. If the form is filled
//display the admin information form, otherwise display an error and don't allow user to continue
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

//On clicking back button, go back to the pharmacy information form
backButton.onclick = function()
{
    pharmacyForm.style.display = 'block';
    adminForm.style.display = 'none';
};

//Get the two passwords a user enters
var passField1 = document.getElementById('password');
var passField2 = document.getElementById('confirmPassword');

//Add an event listener to the password fields with a 'keyup' event
// so that the password is checked live as the user enters it
passField1.addEventListener('keyup', checkPass);
passField2.addEventListener('keyup', checkPass);

var matching = false;
//Check pass matches the password regular expression and then checks if both passwords match
//Otherwise display an error accordingly
function checkPass()
{
    var regexMatch = false;
    const regex = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\s:])([^\s]){8,}$/;
    if(passField1.value.match(regex) !== null)
    {
        document.getElementById('message1').innerText = "Password meets the required conditions";
        if(passField2.value.match(regex) !== null)
            if(passField2.value === passField1.value)
            {
                document.getElementById('message2').innerText = "Both passwords match";
                //Set matching to true so it can be checked when user tries to register
                matching = true;
            }
            else
                document.getElementById('message2').innerText = "Passwords do not match";
    }
}

//Check if all fields are filled
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