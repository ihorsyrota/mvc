function TextFocus()
{
    document.getElementById("reason").focus();
}

function TestSubmitForm(obj)
{
    //alert(obj);
    if (document.getElementById("reason").value.length < 10)
    {
        document.getElementById("error_form").style.visibility = 'visible';
        document.getElementById("reason").blur();
        document.getElementById("reason").style.borderColor = "#ff0000";
        return false;
    }
    z = 0;
    for (i = 1; i <= 3; i++)
        if (document.getElementById("foType" + i).checked == true)
            z++;
    if (z == 0) 
    {
        alert('Виберіть тип розблокування');
        return false;
    }
    return true;
}

function TextOnFocus()
{
    document.getElementById("error_form").style.visibility = 'hidden';
    document.getElementById("reason").style.borderColor = "#CCC";
}