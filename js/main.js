let closeAllBtn = document.querySelector(".js-close-all");
let frontMessage = document.querySelectorAll(".js-card");
let card = document.querySelectorAll(".js-card-content");
let front = document.querySelectorAll(".js-front");
let back = document.querySelectorAll(".js-back");
let dateNum = document.querySelectorAll(".js-date-num");
// teszthez num, valós date
let num = 25;
let d = new Date();
let date = d.getDate();
let today = date;
let dateBeforeNums = [];
let dateAfterNums = [];

// ma és az ablakhoz tartozó nap ellenőrzése
function dateToToday() {
    for( let i = 0; i < dateNum.length; i++) {
        let day = dateNum[i].innerText;
        if(day < today) {
            dateBeforeNums.push(day);
        }

        if(day > today) {
            dateAfterNums.push(day);
        }
    }
}

// ki be kapcsolja az osztályt amivel lehet nyitogatni az ablakokat
function newFlipClass() {
    dateToToday();

    // elmúlt napok ablakaira vonatkozik - ki/be nyitható/csukható
    dateBeforeNums.forEach(element => {
        front[element - 1].addEventListener("click", () => {
            front[element - 1].classList.toggle("js-old-front");
            back[element - 1].classList.toggle("js-old-back");
        })
        back[element - 1].addEventListener("click", () => {
            front[element - 1].classList.toggle("js-old-front");
            back[element - 1].classList.toggle("js-old-back");
        })
    })

    // az elkövetkezendő napokra vonatkozik - hány nap van hátra még
    dateAfterNums.forEach(element => {
        frontMessage[element - 1].addEventListener("click", () => {
            alert("Még " + (element - today) + " nap van hátra!");
        })
    })
}

// bezárja az összes nyitott ablakot
function closeAllCard() {
    for( let c of card) {
        if(c.classList.contains("js-old-front")) {
            c.classList.remove("js-old-front");
        }
        if(c.classList.contains("js-old-back")) {
            c.classList.remove("js-old-back");
        }
    }
}

function render() {
    newFlipClass();
    closeAllBtn.addEventListener("click", closeAllCard);
}

render();