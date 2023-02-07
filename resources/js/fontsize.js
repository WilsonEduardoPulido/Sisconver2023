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