console.log("function");


//console.log(select);
let user = document.querySelectorAll('.user');
let company = document.querySelectorAll('.company');

let select = document.querySelector('.select');

const selectChange = () => {
    let option = select.options[select.selectedIndex].innerText; 
    if (option === 'User') {

        user.forEach(element => {
            element.style.display = 'block'
        });

        company.forEach(element => {
            element.style.display = 'none'
        });
    }else{
        user.forEach(element => {
            element.style.display = 'none'
          
        });
        company.forEach(element => {
            element.style.display = 'block'
        });
    }
}

selectChange();

select.onchange = selectChange;