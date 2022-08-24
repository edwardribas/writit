const deleteButtons = document.querySelectorAll('.exclude > button'),
      cancelButtons = document.querySelectorAll('.confirmation > button')
;

deleteButtons.forEach(e => e.onclick = () => {
    e.classList.toggle('hidden', true);
    e.nextElementSibling.classList.add('visible');
})
cancelButtons.forEach(e => e.onclick = () => {
    e.parentElement.previousElementSibling.classList.remove('hidden')
    e.parentElement.classList.remove('visible')
})

