function validateForm() {
    let isValid = true;

    // Name validation
    const name = document.getElementById('name').value;
    const nameError = document.getElementById('nameError');
   //  /: The start and end delimiters for a regular expression.
   // \d: A special character class in regex that matches any digit from 0 to 9.
    if (name === '' || /\d/.test(name)) {
        nameError.textContent = 'Name cannot be empty or contain numbers';
        isValid = false;
    } else {
        nameError.textContent = '';
    }

    // Address validation
    const address = document.getElementById('address').value;
    const addressError = document.getElementById('addressError');
    if (address === '') {
        addressError.textContent = 'Address cannot be empty';
        isValid = false;
    } else {
        addressError.textContent = '';
    }

    // Username validation
    const username = document.getElementById('username').value;
    const usernameError = document.getElementById('usernameError');
    if (username === '' || /\s/.test(username) || /[^a-zA-Z0-9_]/.test(username)) {
        usernameError.textContent = 'Username cannot be empty, contain spaces, or special characters except underscore';
        isValid = false;
    } else {
        usernameError.textContent = '';
    }

    // Email validation
    const email = document.getElementById('email').value;
    const emailError = document.getElementById('emailError');
    if (email === '' || !/@/.test(email)) {
        emailError.textContent = 'Email cannot be empty and must include "@"';
        isValid = false;
    } else {
        emailError.textContent = '';
    }

    // Password validation
    const password = document.getElementById('password').value;
    const passwordError = document.getElementById('passwordError');
    const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
    if (password === '' || !passwordPattern.test(password)) {
        passwordError.textContent = 'Password must be at least 8 characters long with at least one digit, one upper case character, one lowercase character, and one special character';
        isValid = false;
    } else {
        passwordError.textContent = '';
    }

    // Phone validation
    const phone = document.getElementById('phone').value;
    const phoneError = document.getElementById('phoneError');
    const phonePattern = /^(98|97|96)\d{8}$/;
    if (phone === '' || !phonePattern.test(phone)) {
        phoneError.textContent = 'Phone cannot be empty, must contain only numbers, and start with 98, 97, or 96';
        isValid = false;
    } else {
        phoneError.textContent = '';
    }

    // Gender validation
    const gender = document.querySelector('input[name="gender"]:checked');
    const genderError = document.getElementById('genderError');
    if (!gender) {
        genderError.textContent = 'Gender cannot be empty';
        isValid = false;
    } else {
        genderError.textContent = '';
    }

    // Course validation
    const course = document.getElementById('course').value;
    const courseError = document.getElementById('courseError');
    if (course === '') {
        courseError.textContent = 'Please select a course';
        isValid = false;
    } else {
        courseError.textContent = '';
    }

    return isValid;
}
