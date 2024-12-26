let row=prompt("Enter number or rows");
let column=prompt("Enter number or columns");

let tab='<table border="1px solid black">';
for(i=0; i<row;i++)
{
    tab+="<tr>";
    for(j=0; j<column;j++)
    {
        tab+="<td>data</td>";
    }
tab+="</tr>";
}
tab+='</table>';
document.getElementById('a').innerHTML = tab;
