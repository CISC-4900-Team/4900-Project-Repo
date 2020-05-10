//Styling the Cash or Credit button and forms
const cashButton = document.getElementById('cashButton');
const creditButton = document.getElementById('creditButton');

cashButton.onclick = function(){
    cashButton.style.color = '#006600';
    creditButton.style.color = '#0099ff';

    var creditCardField = document.getElementById('creditCardField');
    cashField.style.display = 'block';
    creditCardField.style.display = 'none';
};

creditButton.onclick = function(){
    creditButton.style.color = '#003d66';
    cashButton.style.color = '#00b300';
    var cashField = document.getElementById('cashField');
    cashField.style.display = 'none';
    creditCardField.style.display = 'block';
};

//Dynamically loading populating cart based on the product UPC without having to refresh the page
//AJAX Template function loadDoc() was taken from w3schools.com/xml/ajax_intro.asp
//Changes were made to meet our need
var totalQTY = 0; var totalPrice = 0;
function loadProduct() {
    var quantity = document.getElementById('quantity').value;
    var barcode = document.getElementById('barcode').value;
    if(barcode !== '')
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                //The resposneText result is a DOM string
                //It is split with the , separator so it can be processed
                var productResult = this.responseText.split(',');

                //create individual TD elements so they can be accessed in the DOM later on
                var productRow = document.createElement('tr');
                var tdQuantity = document.createElement('td');
                var tdProduct = document.createElement('td');
                var tdPrice = document.createElement('td');
                var voidButtonElement = document.createElement('td');
                var voidButton = document.createElement('button');

                //Creating the quantity TD cell
                tdQuantity.style.wordWrap = 'break-word';
                tdQuantity.style.width = '75px';
                tdQuantity.classList.add('quantity');
                tdQuantity.id = 'qty';
                tdQuantity.innerText = productResult[0];

                //Creating the product information TD cell
                tdProduct.style.wordWrap = 'break-word';
                tdProduct.style.width = '200px';
                tdProduct.classList.add('product');
                tdProduct.id = 'counter';
                tdProduct.innerText = productResult[1];

                //Creating the price TD cell
                tdPrice.style.wordWrap = 'break-word';
                tdPrice.style.width = '90px';
                tdPrice.classList.add('price');
                tdPrice.id = 'counter';
                tdPrice.innerText = productResult[2];

                //Creating the void button
                voidButton.className = 'void';
                voidButton.id = 'voidBtn';
                voidButton.innerText = 'X';

                //Append all TD elements to the table row
                voidButtonElement.append(voidButton);
                productRow.appendChild(tdQuantity);
                productRow.appendChild(tdProduct);
                productRow.appendChild(tdPrice);
                productRow.appendChild(voidButtonElement);
                document.getElementById('cart').appendChild(productRow);
                productRow.className = 'itemRow';

                //Calculating total quantity and price
                var totalQuantityField = document.getElementById('totalQuantity');
                totalQTY += parseFloat(productResult[0]);
                totalQuantityField.value = totalQTY;
                var totalPriceField = document.getElementById('totalCost');
                totalPrice += parseFloat(productResult[2]);
                totalPrice *= 1.08875;
                totalPriceField.value = '$' + totalPrice.toFixed(2);
            }
        };
        xhttp.open("GET", "includes/loadProduct.inc.php?p="+barcode+'&q='+quantity, true);
        xhttp.send();
    }
}

//Calculating the change to give to patient
const cashInput = document.getElementById('cashReceived');
const changeField = document.getElementById('changeField');
var change = 0;
cashInput.onkeyup = function(e)
{
    var cashReceived = e.target.value;
    console.log(cashReceived);
    change = (totalPrice - cashReceived).toFixed(2);
    if(cashReceived !== '')
        changeField.value = change;
    else
        changeField.value = 0;
};



