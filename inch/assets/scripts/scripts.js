// Check if the session variable exists
console.log("first")
if ('status' in sessionStorage) {
    // Display the message
    console.log(sessionStorage.getItem('status'));

    // Remove the session after 10 seconds
    setTimeout(function() {
        sessionStorage.removeItem('status');
    }, 10);
}
