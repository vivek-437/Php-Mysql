const block = document.getElementById('imgsr');
const signOut=document.getElementById('back');
const cart=document.querySelector('#cart');
let hide = document.getElementById('down').style.display = 'none';
profile.addEventListener('click',()=>{

    window.location='../php/Userprofile.php';
})
cart.addEventListener('click',()=>{


    window.location='../php/cart.php';
})
const flexer = () => {
    let hidden = document.getElementById('down');
    if (hidden.style.display === 'block') {
        hidden.style.display = "none";
    } else {
        hidden.style.display = "block";
    }
}
block.addEventListener('click', () => { flexer() });



back.addEventListener('click',()=>{
    window.location='../php/Sign Up.php';
})


function searchProduct(){
    let input=document.getElementById('getinput').value;
    input=input.toLowerCase();
    let x=document.getElementsByClassName('proname');
    let y=document.getElementsByClassName('producthideshow');

    for (let i = 0; i < x.length; i++) {
        if(!x[i].innerHTML.toLowerCase().includes(input)){
            y[i].style.display='none';
        }else{
            y[i].style.display='block';
        }
        
    }
}

