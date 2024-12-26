function hide()
{
 let x=document.getElementById('img');
 x.style.display='none';

}
function show()
{
    let y=document.getElementById('img');
    y.style.display='block';
}
// function red()
// {
//     let a=document.getElementById('body');
//     a.style.background='red';
// }
// function black()
// {
//     let a=document.getElementById('body');
//     a.style.background='black';
// }
// function green()
// {
//     let a=document.getElementById('body');
//     a.style.background='green';
// }
function changeColor(col)
{
    document.body.style.backgroundColor=col;
}