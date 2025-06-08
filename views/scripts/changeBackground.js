function changeBackground() { 
    const table = document.getElementById('motherTable');

    function changeTheme() {
        const theme = this.value;

        if (theme === 'light') {
            document.body.style.backgroundColor = 'white'; 
            document.body.style.color = 'black'; 
            table.style.backgroundColor = '#f3f3f3';
        } else if (theme === 'dark') {
            document.body.style.backgroundColor = 'black'; 
            document.body.style.color = 'white'; 
            table.style.backgroundColor = '#111';
        }
    }

    function changeImage() {
        document.body.style.backgroundImage = `url(${this.value})`; 
    }
    
    document.getElementById('selectTheme').addEventListener('change', changeTheme);
    document.getElementById('selectImage').addEventListener('change', changeImage);

    changeTheme();
    changeImage();

}

document.addEventListener('DOMContentLoaded', changeBackground);