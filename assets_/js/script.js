// Open the signup modal
document.getElementById('open-signup').addEventListener('click', function() {
    document.getElementById('signup-modal').style.display = 'flex';
});

// Close the signup modal
document.getElementById('close-signup').addEventListener('click', function() {
    document.getElementById('signup-modal').style.display = 'none';
});

// Close modal if clicked outside of it
window.addEventListener('click', function(event) {
    if (event.target == document.getElementById('signup-modal')) {
        document.getElementById('signup-modal').style.display = 'none';
    }
});
