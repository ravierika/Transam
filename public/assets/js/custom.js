// const { cleanData } = require("jquery");

// read more toggle
function myFunction(id) {
    const dots = document.getElementById(`dots${id}`);
    const moreText = document.getElementById(`more${id}`);
    const btnText = document.getElementById(`myBtn${id}`);

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}

function infoToggle(id, infoId,text) {
    const info = document.getElementById(id);
    const infoIdFixed = document.getElementById(infoId);
    let btnText = document.getElementById(text);
    info.classList.toggle("d-none");
    infoIdFixed.classList.toggle("d-none");

    if(btnText.innerText === 'Edit'){
        btnText.innerText = 'Back'
    }else{
        btnText.innerText = 'Edit'
    }
}
// change
function buttonToggle() {
    const dot = document.getElementById("dot");
    dot.classList.toggle("active");
}

function filterToggle(id, icon) {
    const element = document.getElementById(id);
    const iconElement = document.getElementById(icon);
    element.classList.toggle("active");
    iconElement.classList.toggle("active");
}

// property filter toggle

function propertyTagToggle(btnId, dataId) {
    const button = document.getElementById(btnId);
    const data = document.getElementById(dataId);
    data.classList.remove("d-none");
    button.classList.add("d-none");
}

// hover effect toggle

// function hoverToggle(e){
//     console.log(e);
// }


function toggleValidation(allElement,condition){
    for (let i = 0; i < allElement.length; i++) {
        const idIndicator = allElement[i];
        const id = document.getElementById(idIndicator);
        if (condition === true) {
            id.classList.add('active');
        }else{
            id.classList.remove('active');
        }
    }
}



// properties create render
function propertiesRender(id,className,condition,array){
    const idName = document.getElementById(id);

    toggleValidation(array,condition)

    // all container
    const container = document.getElementsByClassName(className);
    for (let i = 0; i < container.length; i++) {
        const element = container[i];
        element.classList.add('create_render_active')
    }
    idName.classList.remove('create_render_active');
}






const element = document.getElementById('propertyType');

element.addEventListener('click', (e) => {
    const element = e.target;
    if(element.id){
        element.classList.toggle('active')
    }else{
        element.parentNode.classList.toggle('active')
    }
})


// check trip type ====> is it round or one way

function checkTripType(id){
    const radioBtn = document.getElementById(id);
    const returnDate = document.getElementById('return')
    if(radioBtn.checked = true){
        if(radioBtn.value === 'oneWay'){
            returnDate.setAttribute('readonly',true)
        }else{
            returnDate.removeAttribute('readonly')
        }
    }
}


// check ticket condition YES or NO

function ticketChecked(e) {
    const lateDateToIssue = document.getElementById('lastTickDate');
    if(e === 'no'){
        lateDateToIssue.removeAttribute('readonly');
    }else{
        lateDateToIssue.setAttribute('readonly',true)
    }
}
