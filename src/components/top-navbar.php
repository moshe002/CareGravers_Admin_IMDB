<?php 

echo '
<!-- top navbar -->
<div class="flex justify-between items-center h-1/6 w-full shadow-2xl">
    <h1 class="ml-16 font-bold text-2xl">CareGraver</h1>
    <!-- the uh, account button something nga drop down -->
    <div class="flex gap-10 items-center justify-center mr-24">
        <div class="relative">
            <button 
                class="opacity-75 text-lg font-medium p-2 rounded-md text-center inline-flex items-center text-white bg-blue-400 hover:opacity-100 focus:bg-blue-400 focus:text-white duration-150" 
                type="button" 
                onclick="onOpen()"> 
                <h1>Hello,&nbsp;</h1>
                <h1 name="username" class=""><?php   
                    //echo $loggedInUser["fName"]." ".$loggedInUser["lName"];
                ?>Admin</h1>
            </button>
            <!-- user account --> 
            <div id="user-menu" class="z-10 hidden flex-col absolute bg-white divide-y divide-gray-100 rounded-md shadow w-50 dark:bg-gray-700 w-max">
                <!-- Dropdown menu -->
                <div class="px-4 py-3 text-gray-900 dark:text-white">
                    <h1 class="text-lg">
                        <?php   
                            //echo $loggedInUser["fName"]." ".$loggedInUser["lName"];
                        ?>
                        Admin
                    </h1>
                    <h1 class="font-medium truncate text-sm ">
                        <?php 
                            //echo $loggedInUser["userEmail"];
                        ?>
                        static@pani.com
                    </h1 >
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Manage Account</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Orders</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Chats</a>
                    </li>                  
                </ul>
                <div class="py-2">
                    <a href="../../index.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                </div>
            </div>
            <!-- end of user account -->
        </div>
    </div>
    <!-- end of the uh, account button something nga drop down -->
</div>
<!-- end of top navbar -->
';

?>