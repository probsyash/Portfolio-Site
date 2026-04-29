const loginBtn = document.getElementById('loginBtn');
        const modal = document.getElementById('id01');

        // Open modal on click
        loginBtn.onclick = () => {
            modal.style.display = 'block';
        };

        // Close modal if user clicks outside of it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }