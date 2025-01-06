function reverseNumber(num) {
    const reversedNumber = parseFloat(num.toString().split('').reverse().join('')) * Math.sign(num);
    return reversedNumber;
}
console.log(reverseNumber(12345)); // Output: 54321
console.log(reverseNumber(-12345)); // Output: -54321
console.log(reverseNumber(123.45)); // Output: 54.321
console.log(reverseNumber(-123.45)); // Output: -54.321