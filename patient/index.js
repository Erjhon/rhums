const appointment_form = document.getElementById('appointment_form');
const firstname = document.getElementById('firstname');
const lastname = document.getElementById('lastname');
const username = document.getElementById('username');
const contact = document.getElementById('contact');
const gender = document.getElementById('gender');
const dob = document.getElementById('dob');
const address = document.getElementById('address');
const password = document.getElementById('password');
const cpassword = document.getElementById('password');

appointment_form.addEventListener('submit', e => {
    e.preventDefault();

    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs = () => {

    const firstnameValue = firstname.value.trim();
    const lastnameValue = lastname.value.trim();
    const usernameValue = username.value.trim();
    const contactValue = contact.value.trim();
    const genderValue = gender.value.trim();
    const dobValue = dob.value.trim();
    const passwordValue = password.value.trim();
    const cpasswordValue = cpassword.value.trim();

     if(firstnameValue === '') {
        setError(firstname, 'firstname is required');
    } else {
        setSuccess(firstname);
    }
    if(lastnameValue === '') {
        setError(lastname, 'firstname is required');
    } else {
        setSuccess(lastname);
    }
    if(usernameValue === '') {
        setError(username, 'Username is required');
    } else {
        setSuccess(username);
    }

    if(contactValue === '') {
        setError(contact, 'Email is required');
    } else if (!isValidEmail(contactValue)) {
        setError(contact, 'Provide a valid email address');
    } else {
        setSuccess(contact);
    }
     if(genderValue === '') {
        setError(gender, 'gender is required');
    } else {
        setSuccess(gender);
    }
     if(dobValue === '') {
        setError(dob, 'dob is required');
    } else {
        setSuccess(dob);
    }
    if(passwordValue === '') {
        setError(password, 'Password is required');
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Password must be at least 8 character.')
    } else {
        setSuccess(password);
    }

    if(cpasswordValue === '') {
        setError(cpassword, 'Please confirm your password');
    } else if (cpasswordValue !== passwordValue) {
        setError(cpassword, "Passwords doesn't match");
    } else {
        setSuccess(cpassword);
    }

};
