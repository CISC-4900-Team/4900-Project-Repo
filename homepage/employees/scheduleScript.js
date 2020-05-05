var dateSelector = document.getElementById('dateSelector');
dateSelector.addEventListener('change', getDate);
window.addEventListener('load', getDate);

//Taken from stack overflow, automatically sets the day, month, year and accounts for rolling into next month
function addDays(date, days) {
    var result = new Date(date);
    result.setDate(result.getDate() + days);
    return result;
}

function getDate(e)
{
    var date = new Date(dateSelector.value);
    date = new Date(date.getTime() + date.getTimezoneOffset() * 60000);

    for(var i = 0; i < 7; i++)
    {
        var th = document.querySelectorAll('#weekDaysHeading');
        th[i].textContent = addDays(date, i).toDateString();
    }
}

