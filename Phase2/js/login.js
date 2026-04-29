const loginBtn = document.getElementById('loginBtn');
const modal = document.getElementById('id01');

loginBtn.onclick = () => {
    modal.style.display = 'block';
};

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}