function addition()
{

    let n=document.getElementById('num').innerText;
    if(n<100)
{
   n++;
   document.getElementById('num').innerText=n;
}
else{
    alert("Higher limit exceeded");
}
}

function substraction()
{
   
    let n=document.getElementById('num').innerText;
    if(n>0)
    {
    n--;
    document.getElementById('num').innerText=n;
    }
    else{
        alert("lower limit exceeded");
    }

}