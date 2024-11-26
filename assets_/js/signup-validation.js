document.addEventListener("DOMContentLoaded", function () {
    const usernameInput = document.getElementById("username");
    const emailInput = document.getElementById("email");
    const phoneInput = document.getElementById("phone");
    const submitButton = document.getElementById("submit-button");

    const usernameError = document.getElementById("username-error");
    const emailError = document.getElementById("email-error");
    const phoneError = document.getElementById("phone-error");

    let isUsernameValid = false;
    let isEmailValid = false;
    let isPhoneValid = false;

    const checkField = (field, value, errorElement, callback) => {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../controllers/SignupController.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (this.status === 200) {
                const response = JSON.parse(this.responseText);
                if (response.exists) {
                    errorElement.textContent = `${field.charAt(0).toUpperCase() + field.slice(1)} is already taken.`;
                    callback(false);
                } else {
                    errorElement.textContent = "";
                    callback(true);
                }
            }
        };
        xhr.send(`action=checkField&field=${field}&value=${value}`);
    };

    const validateForm = () => {
        submitButton.disabled = !(isUsernameValid && isEmailValid && isPhoneValid);
    };

    usernameInput.addEventListener("input", () => {
        checkField("username", usernameInput.value, usernameError, (isValid) => {
            isUsernameValid = isValid;
            validateForm();
        });
    });

    emailInput.addEventListener("input", () => {
        checkField("email", emailInput.value, emailError, (isValid) => {
            isEmailValid = isValid;
            validateForm();
        });
    });

    phoneInput.addEventListener("input", () => {
        checkField("phone_number", phoneInput.value, phoneError, (isValid) => {
            isPhoneValid = isValid;
            validateForm();
        });
    });
});
