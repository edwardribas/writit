(() => {
    const deleteButtons = document.querySelectorAll('.exclude > button'),
        cancelButtons = document.querySelectorAll('.confirmation > button'),
        fileInput = document.querySelector('.image input[type=file]'),
        imgInput = document.querySelector('.image img')
    ;

    deleteButtons.forEach(e => e.onclick = () => {
        e.classList.toggle('hidden', true);
        e.nextElementSibling.classList.add('visible');
    })
    cancelButtons.forEach(e => e.onclick = () => {
        e.parentElement.previousElementSibling.classList.remove('hidden')
        e.parentElement.classList.remove('visible')
    })

    
    fileInput.onchange = e => {
        const source = e.target.files[0];

        if (source.type === "image/png" || source.type === "image/jpeg" || source.type === "image/jpg") {
            const _src = URL.createObjectURL(e.target.files[0]);
            imgInput.src = _src;
            imgInput.onload = () => URL.revokeObjectURL(imgInput.src);
        }
    };
})()