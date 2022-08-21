(() => {
    const fileInput = document.querySelector('.img input[type=file]');
    const imgInput = document.querySelector('.img img');
    
    fileInput.onchange = e => {
        const source = e.target.files[0];

        if (source.type === "image/png" || source.type === "image/jpeg" || source.type === "image/jpg") {
            const _src = URL.createObjectURL(e.target.files[0]);
            imgInput.src = _src;
            imgInput.onload = () => URL.revokeObjectURL(imgInput.src);
        } else {
            console.log('Arquivos inválidos.');
        }
    };
})()