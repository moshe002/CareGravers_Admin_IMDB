<?php 

echo '
<!-- sidebar (occupied) of map -->
<div id="sidebar" class="hidden flex-col h-screen p-5 absolute top-24 right-0 z-10 overflow-auto duration-200">
    <br>
    <!-- close button of sidebar map -->
    <button 
        class="absolute top-10 right-3"
        onclick="(function(){
            document.getElementById("sidebar").style.display = "none";
            document.getElementById("map").style.width = "100%";
        })();">&#10006;
    </button>    
    <br>
    <br>
    <div class="flex w-full justify-center items-center rounded-md border-2 -z-10">
        <input class="outline-none p-2 w-full rounded-md focus:outline-blue-400 duration-150" type="search" placeholder="Search here...">
        <button class="rounded-md p-2.5 bg-blue-500">
            <img class="w-5 h-5" src="../assets//icons//search_icon.png" alt="search_icon">
        </button>
    </div>
    <br>
    <div class="flex p-2 border-b-2 w-full text-sm">
    <h1>Status:</h1>
    &nbsp;
    <div class="w-full">
        <select class="w-full font-bold outline-none" id="status" onchange="updateStatus()">
            <option class="font-bold" value="occupied">Occupied</option>
            <option class="font-bold" value="available">Available</option>
            <option class="font-bold" value="reserved">Reserved</option>
        </select>
    </div>
    </div>
    <div id="nameT" class="flex flex-row items-center p-2 border-b-2 w-full text-sm">
        <h1>Name:</h1>
        <input id="name" class="p-1 outline-none w-3/4 font-bold" type="text" value="Jose Rizal" disabled />
        <img onclick="(function(){
            const edit_name = document.getElementById("name");
            edit_name.disabled = !edit_name.disabled;
        })();" class="w-5 h-5 cursor-pointer" src="../assets//icons//edit_pencil_icon.png" alt="edit_icon">
    </div>
    <div id="dobT" class="flex flex-row justify-between items-center p-2 border-b-2 w-full text-sm">
        <h1>Date of Birth:</h1>
        <input id="dob" class="hide-icon outline-none w-24 font-bold" type="date" value="2000-05-05" disabled />
        <img onclick="(function(){
            const edit_dob = document.getElementById("dob");
            edit_dob.disabled = !edit_dob.disabled;
        })();" class="w-5 h-5 cursor-pointer" src="../assets//icons//calendar_icon.png" alt="calendar_icon">
    </div>
    <div id="dodT" class="flex flex-row justify-between items-center p-2 border-b-2 w-full text-sm">
        <h1>Date of Death:</h1>
        <input id="dod" class="hide-icon outline-none w-24 font-bold" type="date" value="2010-01-10" disabled />
        <img onclick="(function(){
            const edit_dod = document.getElementById("dod");
            edit_dod.disabled = !edit_dod.disabled;
        })();" class="w-5 h-5 cursor-pointer" src="../assets//icons//calendar_icon.png" alt="calendar_icon">
    </div>
    <div class="flex flex-row justify-between items-center p-2 border-b-2 w-full text-sm">
        <h1>Block Number:</h1>
        <input id="blockNo" class="p-1 outline-none w-20 font-bold" value="2" type="number" disabled />
        <img onclick="(function(){
            const edit_blockNo = document.getElementById("blockNo");
            edit_blockNo.disabled = !edit_blockNo.disabled;
        })();" class="w-5 h-5 cursor-pointer" src="../assets//icons//edit_pencil_icon.png" alt="edit_icon">
    </div>
    <div class="flex flex-row justify-between items-center p-2 border-b-2 w-full text-sm">
        <h1>Lot Number:</h1>
        <input id="lotNo" class="p-1 outline-none w-20 font-bold" value="59" type="number" disabled />
        <img onclick="(function(){
            const edit_lotNo = document.getElementById("lotNo");
            edit_lotNo.disabled = !edit_lotNo.disabled;
        })();" class="w-5 h-5 cursor-pointer" src="../assets//icons//edit_pencil_icon.png" alt="edit_icon">
    </div>
    <div id="graveImageT" class="flex relative justify-center items-center mt-3">
        <img id="graveImage" src="../assets//images//choose_image_bg.png" class="w-52 h-40" alt="choose_img">
        <input class="absolute top-1/2 left-20 w-16 rounded-md bg-transparent text-xs border-2 border-white text-black" type="file" value="Choose image" />
    </div>
    <div class="flex flex-row items-center justify-evenly p-3">
        <button class="bg-blue-400 text-white px-3 py-1 rounded-md opacity-75 hover:opacity-100 duration-150">
            Clear</button>
        <button class="bg-blue-400 text-white px-3 py-1 rounded-md opacity-75 hover:opacity-100 duration-150">
            Save</button>
    </div>
    <br>
</div> 
<!-- end of (occupied) sidebar map -->
';

?>