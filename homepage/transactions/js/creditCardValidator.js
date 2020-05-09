//Credit card number field
var creditCardNumber = document.getElementById('cardNumber');

//Common Credit Card Regular Expressions
const visaRegex = '^(?:(4[0-9]{12}(?:[0-9]{3})?))$';
const mastercardRegex = '^(?:(5[1-5][0-9]{14}))$';
const discoverRegex = '^(?:(6(?:011|5[0-9]{2})[0-9]{12}))$';
const amexRegex = '^(?:(3[47][0-9]{13}))$';

//Luhns Algorithm - open source algorithm to check if a credit card number is potentially valid
//This particular version was taken from medium.com - guide to validating and formatting credit cards
function checkLuhn(ccNumber) {
    // remove all non digit characters
    var ccNumber = ccNumber.replace(/\D/g, '');
    var sum = 0;
    var shouldDouble = false;
    // loop through values starting at the rightmost side
    for (var i = ccNumber.length - 1; i >= 0; i--) {
        var digit = parseInt(ccNumber.charAt(i));

        if (shouldDouble) {
            if ((digit *= 2) > 9) digit -= 9;
        }

        sum += digit;
        shouldDouble = !shouldDouble;
    }
    return (sum % 10) === 0;
}

//First validate the Luhn checksum, and then validate the regex to determine the card issuer
var iconButton = document.getElementById('ccIcons');
creditCardNumber.onkeyup = function(e)
{
    if(checkLuhn(e.target.value))
    {
        if (e.target.value.match(visaRegex))
            iconButton.innerHTML = '<i class="fa fa-cc-visa" id="visa" style="color:navy; font-size: 22px;"></i>';

        if(e.target.value.match(mastercardRegex))
            iconButton.innerHTML = '<i class="fa fa-cc-mastercard" id="mastercard" style="color:red; font-size: 22px;"></i>';

        if(e.target.value.match(discoverRegex))
            iconButton.innerHTML = '<i class="fa fa-cc-discover" id="discover" style="color:orange; font-size: 22px;"></i>';


        if(e.target.value.match(amexRegex))
            iconButton.innerHTML = '<i class="fa fa-cc-amex" id="amex" style="color:blue; font-size: 22px;"></i>';
    }
};

