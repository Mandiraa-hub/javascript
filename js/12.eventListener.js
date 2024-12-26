// addEventListener(event,Listener)
// removeEventListener(event,Listener)


// 1.
// let btn1=document.getElementById('btn1');
// btn1.addEventListener("click",function(){
//     alert("I'm Clicked");
// })


//OR

//2.
// btn1.addEventListener('click',()=>{
//     alert("I'm from arrow function");
// });



//3.
function testClick(){
    alert('I am from test click');
    this.removeEventListener("click",testClick);
}

btn1.addEventListener("click",testClick);

var like=0;
// like button state
//let likebtn= document.getElementById('like');
function likeButton(){
    like++;
   alert(like);
    likee.style.color='Blue';
    likee.removeEventListener('click',likeButton);
}
likee.addEventListener('click',likeButton);