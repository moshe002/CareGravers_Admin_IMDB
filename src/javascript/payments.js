const reservation = document.getElementById('reservation');
const burial_booking = document.getElementById('burial_booking');

const reservation_btn = document.getElementById('reservation_btn');
const burial_booking_btn = document.getElementById('burial_booking_btn');

reservation_btn.addEventListener('click', function(){
    console.log('reservation display');
    reservation.style.display = 'flex';
    burial_booking.style.display = 'none';
});

burial_booking_btn.addEventListener('click', function(){
    console.log('burial booking display');
    burial_booking.style.display = 'flex';
    reservation.style.display = 'none';
});