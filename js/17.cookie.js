function storeCookie(){
    let key = prompt("Enter key to store cookie");
    let value = prompt("Enter value to store into cookie");
    let cookie = key + '='+ encodeURIComponent(value);
    cookie += ';max-age=' + 5*24*60*60;
    document.cookie = cookie; 
}
function readCookie(){
    let key = prompt("Enter Key to read cookie");
    var cookieArr= document.cookie.split(";");
    for(var i=0; i<cookieArr.length;i++){
        var cookiePair= cookieArr[i].split("=");
        if(cookiePair[0].trim()==key){
            alert(decodeURIComponent(cookiePair[1]));
        }
    }
}
function deleteCookie(){
    let key = prompt("Enter key to delete cookie");
document.cookie = key + '=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;';
alert("Cookie has been deleted");
}