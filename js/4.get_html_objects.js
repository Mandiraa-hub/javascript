// Query Selector
function changeHeading(){
let h1=document.getElementById('heading');
let h2=document.querySelector('#heading');
console.log(h1);
console.log(h1);
h1.style.background='red';
h1.style.borderleft="20px solid green"
}

function hidePara()
{
    let p= document.getElementById('para');
    p.style.display='none';
}
function showPara()
{
    let p=document.getElementById('para');
    p.style.display='block';
}
//3colors button and change the color accordingly