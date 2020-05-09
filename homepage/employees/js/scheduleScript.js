var dateSelector = document.getElementById('dateSelector');
dateSelector.addEventListener('change', getDate);
window.addEventListener('load', getDate);

//addDays was taken from stack overflow, automatically sets the day, month, year and accounts for rolling into next month
//Gets a date and days, creates new JS date and returns it
function addDays(date, days) {
    var result = new Date(date);
    result.setDate(result.getDate() + days);
    return result;
}

//Gets the date that the user selects in the edit_schedule.php date selector
//Populates the week with the incrementing days and their days of the week
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

