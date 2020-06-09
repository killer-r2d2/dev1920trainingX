const dropzone = document.querySelectorAll('.box');
for (let i = 0; i < dropzone.length; i++) {
    dropzone[i].addEventListener('dragover', over)
    dropzone[i].addEventListener('dragover', ondrop)
}



const dragBox = document.querySelectorAll('.entry');
for (let i = 0; i < dragBox.length; i++) {
    dragBox[i].addEventListener('dragstart', start);
}

function start(event) {
    event.dataTransfer.setData('Text', event.target.id);
    console.log(event.dataTransfer.getData('Text'));
}

function over(event) {
    event.preventDefault();
}

function ondrop(event) {
    event.preventDefault();
    const data = event.dataTransfer.getData ('Text');
    event.target.appendChild(document.getElementById(data));
}
