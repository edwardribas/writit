(() => {
    const fileInput = document.querySelector('.img input[type=file]');
    const imgInput = document.querySelector('.img img');
    
    fileInput.onchange = e => {
        const source = e.target.files[0];

        if (source.type === "image/png" || source.type === "image/jpeg" || source.type === "image/jpg") {
            imgInput.src = URL.createObjectURL(e.target.files[0]);
            imgInput.onload = () => URL.revokeObjectURL(imgInput.src);
        } else {
            console.log('Arquivos inválidos.');
        }
    };
})()