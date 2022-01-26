const signup = document.getElementById('signup');
const login = document.getElementById('login');
const signbtn = document.getElementById('signbtn');
let hide = document.getElementById('remove').style.display = 'none';
const Login = () => {
    let hide = document.getElementById('change');
    let show = document.getElementById('remove');
    hide.style.display = 'none';
    show.style.display = 'block';
}
const SignUp = () => {
    let show = document.getElementById('change');
    let hide = document.getElementById('remove');
    hide.style.display = 'none';
    show.style.display = 'block';
}

login.addEventListener('click', Login);
signup.addEventListener('click', SignUp);
const preventBack = () => window.history.forward();
setTimeout(() => {
    preventBack()
}, 0);
window.onunload = function () { null };







