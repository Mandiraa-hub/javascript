function sortStringAlphabetically(str) {
    // Split the string into an array, sort it, and join it back into a string
    return str.split('').sort().join('');
}
// Example usage
console.log(sortStringAlphabetically("Scripting Language")); // Output: "aacijprstv"
console.log(sortStringAlphabetically("hello")); 