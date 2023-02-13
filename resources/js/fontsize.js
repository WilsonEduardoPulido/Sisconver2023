const MINIMUM_FONT_SIZE = 14;
const MAXIMUM_FONT_SIZE = 20;
let currentSize = parseFloat(localStorage.getItem('fontSize')) || 14;
document.documentElement.style.fontSize = currentSize + 'px';

var increaseButton = document.querySelector('.increase-font');
var decreaseButton = document.querySelector('.decrease-font');

increaseButton.addEventListener('click', incrementFont);
decreaseButton.addEventListener('click', decrementFont);

function incrementFont() {
    if(currentSize < MAXIMUM_FONT_SIZE){
        currentSize += 2;
        document.documentElement.style.fontSize = currentSize + 'px';
        localStorage.setItem('fontSize', currentSize);
    }
}

function decrementFont() {
    if(currentSize > MINIMUM_FONT_SIZE){
        currentSize -= 2;
        document.documentElement.style.fontSize = currentSize + 'px';
        localStorage.setItem('fontSize', currentSize);
    }
}

let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
});
