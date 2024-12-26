// Object Literal/Constructor
let user= new Object();
user.name='Rajni';
user.age=20;
console.log(user);

let student={
    age:20,
    name:"Rajni",
    course:'BCA',
    "Current address": 'Kathmandu',
}
console.log(student);
// Delete object item
delete student.age;
console.log(student.rollno);

// accessing key with multi words
console.log(student["Current address"]);
console.log("Name is"+ student["name"]);


