/* 
    - on click a tag bg must be white
    - text must be black
    - icon must be black
    - other a tags must be on default (bg blue, white text)
*/

const dashboard = document.getElementById('dashboard');
const users = document.getElementById('users');
const deceased_info = document.getElementById('deceased_info');
const explorer = document.getElementById('explorer');
const inquiries = document.getElementById('inquiries');
const reservations = document.getElementById('reservations');
const bookings = document.getElementById('bookings');
const pricing = document.getElementById('pricing');
const payments = document.getElementById('payments');

const content_div = document.getElementById('content_div');

const sidebar = [
    dashboard, 
    users, 
    deceased_info, 
    explorer, 
    inquiries, 
    reservations,
    bookings,
    pricing,
    payments
];

document.addEventListener('DOMContentLoaded', function(){
    dashboard.click();
});


sidebar.forEach(element => {
    element.addEventListener('click', function() {
        switch(element.id) {
            case 'dashboard':
                const dashboard_img = document.getElementById('dashboard_img');
                if(element === document.activeElement){
                    element.style.boxShadow = "0px 10px 10px rgba(0, 0, 0, 0.1)";
                    console.log('active', element.id)
                    dashboard_img.src = "../assets//icons//dark_dashboard_icon.png";
                    let page = element.getAttribute('href');
                    loadContent(page);
                    element.addEventListener('blur', function() {
                        dashboard_img.src = "../assets//icons//white_dashboard_icon.png";
                        element.style.boxShadow = "0px 0px 0px";
                    });
                }
                break;
            case 'users':
                const users_img = document.getElementById('users_img');
                if(element === document.activeElement){
                    element.style.boxShadow = "0px 10px 10px rgba(0, 0, 0, 0.1)";
                    console.log('active', element.id)
                    users_img.src = "../assets/icons/dark_users_icon.png";
                    let page = element.getAttribute('href');
                    loadContent(page);
                    element.addEventListener('blur', function() {
                        users_img.src = "../assets//icons//white_users_icon.png";
                        element.style.boxShadow = "0px 0px 0px";
                    });
                }
                break;
            case 'deceased_info':
                const deceased_info_img = document.getElementById('deceased_info_img');
                if(element === document.activeElement){
                    element.style.boxShadow = "0px 10px 10px rgba(0, 0, 0, 0.1)";
                    console.log('active', element.id)
                    deceased_info_img.src = "../assets/icons/dark_deceased_icon.png";
                    let page = element.getAttribute('href');
                    loadContent(page);
                    element.addEventListener('blur', function() {
                        deceased_info_img.src = "../assets//icons//white_deceased_icon.png";
                        element.style.boxShadow = "0px 0px 0px";
                    });
                }
                break;
            case 'explorer':
                const explorer_img = document.getElementById('explorer_img');
                if(element === document.activeElement){
                    element.style.boxShadow = "0px 10px 10px rgba(0, 0, 0, 0.1)";
                    console.log('active', element.id)
                    explorer_img.src = "../assets/icons/dark_explorer_icon.png";
                    let page = element.getAttribute('href');
                    loadContent(page);
                    element.addEventListener('blur', function() {
                        explorer_img.src = "../assets//icons//white_explorer_icon.png";
                        element.style.boxShadow = "0px 0px 0px";
                    });
                }
                break;
            case 'inquiries':
                const inquiries_img = document.getElementById('inquiries_img');
                if(element === document.activeElement){
                    element.style.boxShadow = "0px 10px 10px rgba(0, 0, 0, 0.1)";
                    console.log('active', element.id)
                    inquiries_img.src = "../assets/icons/dark_inquiries_icon.png";
                    let page = element.getAttribute('href');
                    loadContent(page);
                    element.addEventListener('blur', function() {
                        inquiries_img.src = "../assets//icons//white_inquiries_icon.png";
                        element.style.boxShadow = "0px 0px 0px";
                    });
                }
                break;
            case 'reservations':
                const reservations_img = document.getElementById('reservations_img');
                if(element === document.activeElement){
                    element.style.boxShadow = "0px 10px 10px rgba(0, 0, 0, 0.1)";
                    console.log('active', element.id)
                    reservations_img.src = "../assets/icons/dark_reservations_icon.png";
                    let page = element.getAttribute('href');
                    loadContent(page);
                    element.addEventListener('blur', function() {
                        reservations_img.src = "../assets//icons//white_reservations_icon.png";
                        element.style.boxShadow = "0px 0px 0px";
                    });
                }
                break;
            case 'bookings':
                const bookings_img = document.getElementById('bookings_img');
                if(element === document.activeElement){
                    element.style.boxShadow = "0px 10px 10px rgba(0, 0, 0, 0.1)";
                    console.log('active', element.id)
                    bookings_img.src = "../assets/icons/dark_bookings_icon.png";
                    let page = element.getAttribute('href');
                    loadContent(page);
                    element.addEventListener('blur', function() {
                        bookings_img.src = "../assets//icons//white_bookings_icon.png";
                        element.style.boxShadow = "0px 0px 0px";
                    });
                }
                break;
            case 'pricing':
                const pricing_img = document.getElementById('pricing_img');
                if(element === document.activeElement){
                    element.style.boxShadow = "0px 10px 10px rgba(0, 0, 0, 0.1)";
                    console.log('active', element.id)
                    pricing_img.src = "../assets/icons/dark_pricing_icon.png";
                    let page = element.getAttribute('href');
                    loadContent(page);
                    element.addEventListener('blur', function() {
                        pricing_img.src = "../assets//icons//white_pricing_icon.png";
                        element.style.boxShadow = "0px 0px 0px";
                    });
                }
                break;
            case 'payments':
                const payments_img = document.getElementById('payments_img');
                if(element === document.activeElement){
                    element.style.boxShadow = "0px 10px 10px rgba(0, 0, 0, 0.1)";
                    console.log('active', element.id)
                    payments_img.src = "../assets/icons/dark_payments_icon.png";
                    let page = element.getAttribute('href');
                    loadContent(page);
                    element.addEventListener('blur', function() {
                        payments_img.src = "../assets//icons//white_payments_icon.png";
                        element.style.boxShadow = "0px 0px 0px";
                    });
                }
                break;
        };
    });
});

/*
    - on click button content div must be changed to 
    corresponding php file 

*/

function loadContent(url) {
    fetch(url)
      .then(response => {
        if (response.ok) {
          return response.text();
        } else {
          throw new Error('Error loading content.');
        }
      })
      .then(data => {
        content_div.innerHTML = data;
      })
      .catch(error => {
        content_div.innerHTML = 'Error loading content.' + error;
      });
  }
