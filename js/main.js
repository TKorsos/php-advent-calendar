let closeAllBtn = document.querySelector(".js-close-all");
let frontMessage = document.querySelectorAll(".card");
let card = document.querySelectorAll(".card_content");
let front = document.querySelectorAll(".front");
let back = document.querySelectorAll(".back");
let dateNum = document.querySelectorAll(".js-date-num");
// teszthez num, valós date
let num = 25;
let d = new Date();
let date = d.getDate();
let today = date;
let dateBeforeNums = [];
let dateAfterNums = [];

// ma és a nap ellenőrzése
function dateToToday() {
    for( let i = 0; i < dateNum.length; i++) {
        // dateBeforeNums.push(dateNum[i].innerText);
        let day = dateNum[i].innerText;
        if(day < today) {
            //console.log(day);
            dateBeforeNums.push(day);
        }

        if(day > today) {
            dateAfterNums.push(day);
        }
    }
    // return dateBeforeNums;
}


// ki be kapcsolja az osztályt amivel lehet nyitogatni az ablakokat
function newFlipClass() {
    dateToToday();

    dateBeforeNums.forEach(element => {
        front[element - 1].addEventListener("click", () => {
            front[element - 1].classList.toggle("old_front");
            back[element - 1].classList.toggle("old_back");
        })
        back[element - 1].addEventListener("click", () => {
            front[element - 1].classList.toggle("old_front");
            back[element - 1].classList.toggle("old_back");
        })
    })

    //
    dateAfterNums.forEach(element => {
        frontMessage[element - 1].addEventListener("click", () => {
            alert("Még " + (element - today) + " nap van hátra!");
        })
    })
}

// bezárja az összes nyitott ablakot
function closeAllCard() {
    for( let c of card) {
        if(c.classList.contains("old_front")) {
            c.classList.remove("old_front");
        }
        if(c.classList.contains("old_back")) {
            c.classList.remove("old_back");
        }
    }
}

function render() {
    newFlipClass();
    closeAllBtn.addEventListener("click", closeAllCard);
}

render();