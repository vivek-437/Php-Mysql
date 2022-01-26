
function increaseValue() {
    var value = parseInt(document.getElementsByClassName('val').value);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementsByClassName('val').value = value;
}

function decreaseValue() {
    var value = parseInt(document.getElementsByClassName('val').value);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementsByClassName('val').value = value;
}
