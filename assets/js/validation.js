// validation.js

function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;
    var phone = document.getElementById("phone").value;
    var errorMessages = "";

    try {
        if (name === "") {
            throw "Name is required.";
        } else if (!/^[A-Za-z ]{1,50}$/.test(name)) {
            throw "Only letters and white space allowed in name field.";
        }

        if (email === "") {
            throw "Email is required.";
        } else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,63}$/.test(email)) {
            throw "Invalid email format.";
        }

        if (password === "") {
            throw "Password is required.";
        }

        if (confirmPassword === "") {
            throw "Confirm password is required.";
        } else if (confirmPassword !== password) {
            throw "Passwords do not match.";
        }

        if (phone === "") {
            throw "Phone number is required.";
        } else if (!/^[0-9]+$/.test(phone)) {
            throw "Only numbers allowed in the phone number field.";
        }

        // Additional validations can be added as needed

    } catch (e) {
        errorMessages += e + "\n";
    }

    if (errorMessages !== "") {
        alert(errorMessages);
        return false; // Prevent form submission if there are errors
    }

    return true; // Allow form submission if there are no errors
}
