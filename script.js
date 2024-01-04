const form = document.getElementById('myForm');
const popup = document.getElementById('popup');
const message = document.getElementById('message');

form.addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the form from submitting traditionally

    // You can add your form submission logic here

    // For this example, we'll simulate form submission success
    const isFormSubmitted = true;

    if (isFormSubmitted) {
        message.textContent = 'Form Submitted';
    } else {
        message.textContent = 'Form Not Submitted';
    }

    // Show the popup
    popup.style.display = 'block';

    // You can also set a timeout to hide the popup after a few seconds
    setTimeout(() => {
        popup.style.display = 'none';
    }, 3000); // Hides the popup after 3 seconds (adjust as needed)
});
