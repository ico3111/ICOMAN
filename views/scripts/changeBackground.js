function changeBackground() { 
    const table = document.getElementById('motherTable');
    
    document.getElementById('selectImage').addEventListener('change', function() {
        document.body.style.backgroundImage = `url(${this.value})`; 
    });

    document.getElementById('selectTheme').addEventListener('change', function() {
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
    });
}

changeBackground();