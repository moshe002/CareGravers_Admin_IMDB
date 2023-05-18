<div class="flex flex-row h-screen w-full">
        <!-- sidebar -->
        <div class="flex flex-col items-center bg-blue-400 h-full overflow-auto w-1/4">
            <div class="flex flex-col items-center py-5 text-center w-full">
                <img src="../assets//images//admin_pic.png" alt="admin_pic">
                <h1 class="text-2xl text-white font-semibold mt-3">Admin</h1>
            </div>
            <div class="flex flex-col gap-3 py-9 w-full h-full justify-evenly items-start g-white/10">
                <button 
                    id="homepage" onClick="location.href='homepage.php'"
                    class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
                    href="../pages/homepage.php#homepage">
                    <img id="dashboard_img" src="../assets//icons//white_dashboard_icon.png" alt="dashboard_icon">
                    Dashboard</button>
                <button 
                    id="users" onClick="location.href='users.php'" 
                    class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300">
                    <img id="users_img" class="ml-0.5" src="../assets//icons//white_users_icon.png" alt="users_icon">
                    Users</button>
                <button 
                    id="deceased_info" 
                    class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
                    href="">
                    <img id="deceased_info_img" src="../assets//icons//white_deceased_icon.png" alt="deceased_icon">
                    Deceased Information</button>
                <button 
                    id="explorer" 
                    class="flex gap-4 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
                    href="">
                    <img id="explorer_img" class="ml-0.5" src="../assets//icons//white_explorer_icon.png" alt="explorer_icon">
                    Explorer</button>
                <button 
                    id="inquiries" 
                    class="flex gap-4 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
                    href="">
                    <img id="inquiries_img" class="ml-0.5" src="../assets//icons//white_inquiries_icon.png" alt="inquiries_icon">
                    User's Inquiries</button>
                <button 
                    id="reservations" 
                    class="flex gap-4 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300"  
                    href="">
                    <img id="reservations_img" class="ml-0.5" src="../assets//icons//white_reservations_icon.png" alt="reservations_icon"> 
                    Reservations</button>
                <button 
                    id="bookings" 
                    class="flex gap-2.5 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
                    href="">
                    <img id="bookings_img" class="ml-0.5" src="../assets//icons//white_bookings_icon.png" alt="bookings_icon"> 
                    Bookings</button>
                <button 
                    id="pricing" 
                    class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
                    href="">
                    <img id="pricing_img" class="ml-0.5" src="../assets//icons//white_pricing_icon.png" alt="pricing_icon"> 
                    Pricing</button>
                <button 
                    id="payments" 
                    class="flex gap-3 p-2 text-white font-semibold w-full outline-none focus:bg-white focus:text-black duration-300" 
                    href="">
                    <img id="payments_img" class="ml-0.5" src="../assets//icons//white_payments_icon.png" alt="payments_icon"> 
                    Payments</button>
            </div>
        </div>
        <!-- end of sidebar -->