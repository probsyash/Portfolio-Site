const loginBtn = document.getElementById('loginBtn');
const modal = document.getElementById('id01');

if (loginBtn) {
    loginBtn.onclick = () => {
        modal.style.display = 'block';
    };
}

if (modal) {
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
}