let user_menu = document.getElementById('user-menu');

// the user icon in the navbar

function onOpen() {
    if(user_menu.style.display === 'flex')
        user_menu.style.display = 'none';
    else 
        user_menu.style.display = 'flex';
    console.log('it works');
}

