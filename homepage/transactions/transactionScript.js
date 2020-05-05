const cashButton = document.getElementById('cashButton');
const creditButton = document.getElementById('creditButton');

cashButton.onclick = function(){
    cashButton.style.color = '#00b300';
    creditButton.style.color = '#4D3EFF';
    creditButton.style.backgroundColor = '';
    var creditCardField = document.getElementById('creditCardField');
    cashField.style.display = 'block';
    creditCardField.style.display = 'none';
};


creditButton.onclick = function(){
    creditButton.style.color = '#0000b3';
    cashButton.style.color = '#b3ffb3';
    var creditCardField = document.getElementById('creditCardField');
    creditCardField.style.display = 'block';
    cashField.style.display = 'none';
};
