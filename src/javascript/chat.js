//chat sessions, which users do we have a converstation with?

var chatSessions = [];
var ajax = new XMLHttpRequest();
ajax.onreadystatechange = function() {    
    if (ajax.readyState === 4 && ajax.status === 200) {
        chatSessions = JSON.parse(ajax.responseText);
        chatSessions.forEach(chatSession => {
            var chatIDRendered = [];//listahan sa tanan messages chatID
            //receive incoming chats
            function receiveMessage() {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {    
                    if (xhr.readyState === 4 && xhr.status === 200) { 
                        console.log(xhr.responseText);
                        var allMessages = JSON.parse(xhr.responseText); 
                        var messageContainer = document.getElementById("messages-area");
                        allMessages.forEach(element => {
                        if (chatIDRendered.indexOf(element['chatID']) == -1){
                            switch (element['SentOrReceived']) {
                            case "sent":
                                // Create the outer div element
                                var outerDiv = document.createElement('div');
                                outerDiv.className = 'flex justify-end mb-2';
                                // Create the inner div element
                                var innerDiv = document.createElement('div');
                                innerDiv.className = 'rounded py-2 px-3';
                                innerDiv.style.backgroundColor = '#E2F7CB';
                                // Create the first paragraph
                                var paragraph1 = document.createElement('p');
                                paragraph1.textContent = element['chatMessage'];
                                paragraph1.className = 'text-sm mt-1';
                                // Create the second paragraph
                                var paragraph2 = document.createElement('p');                    
                                paragraph2.textContent = convertTo12HourFormat(element['chatTimestamp'].split(' ')[1]);//display only time
                                paragraph2.className = 'text-right text-xs text-grey-dark mt-1';
                                // Append the paragraphs to the inner div
                                innerDiv.appendChild(paragraph1);
                                innerDiv.appendChild(paragraph2);
                                // Append the inner div to the outer div
                                outerDiv.appendChild(innerDiv);
                                // Add the outer div to the document body
                                messageContainer.appendChild(outerDiv);
                                break;            
                            case "received":
                                // Create the outer div element
                                console.log(element);
                                var outerDiv = document.createElement('div');
                                outerDiv.className = 'flex mb-2';
                                // Create the inner div element
                                var innerDiv = document.createElement('div');
                                innerDiv.className = 'rounded py-2 px-3';
                                innerDiv.style.backgroundColor = '#F2F2F2';
                                // Create the first paragraph SENDER NAME
                                var paragraph1 = document.createElement('p');
                                paragraph1.textContent = element['senderUID'];
                                paragraph1.className = 'text-sm text-purple';
                                // Create the second paragraph CHATMESSAGE
                                var paragraph2 = document.createElement('p');
                                paragraph2.textContent = element['chatMessage'];
                                paragraph2.className = 'text-sm mt-1';
                                // Create the third paragraph TIMESENT
                                var paragraph3 = document.createElement('p');
                                paragraph3.textContent = convertTo12HourFormat(element['chatTimestamp'].split(' ')[1]);
                                paragraph3.className = 'text-right text-xs text-grey-dark mt-1';
                                // Append the paragraphs to the inner div
                                innerDiv.appendChild(paragraph1);
                                innerDiv.appendChild(paragraph2);
                                innerDiv.appendChild(paragraph3);
                                // Append the inner div to the outer div
                                outerDiv.appendChild(innerDiv);
                                // Add the outer div to the document body
                                messageContainer.appendChild(outerDiv);
                                break;          
                            default:
                                break;
                            }          
                            chatIDRendered.push(element['chatID']);
                    }        
                    });     
                    }
                };  
                xhr.open('POST', '../server-side-process/chat-process.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');                
                xhr.send('senderUID=' + encodeURIComponent(chatSession));
            }
            setInterval(receiveMessage, 1000);
        });
                   
    }        
}  
ajax.open('GET', '../server-side-process/chat-sessions.php', true);
ajax.send();

//send message
var sendButton = document.getElementById('chat-submit');
function sendMessage() {
    var messageHTML = document.getElementById('chat-input');
    var message = messageHTML.value;
    if (message.trim() !== ""){
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../server-side-process/chat-process.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
            }
        };
        xhr.send('message=' + encodeURIComponent(message));
        var swooshSound = document.getElementById("swooshSound");
        swooshSound.play();
        messageHTML.value = "";
    }
}
inputField = document.getElementById('chat-input');
inputField.addEventListener("keyup", function(event) {
if (event.key === "Enter") {
    sendMessage();
}
});




function convertTo12HourFormat(timestamp) {
    // Split the timestamp into hours, minutes, and seconds
    var timeParts = timestamp.split(':');
    var hours = parseInt(timeParts[0]);
    var minutes = parseInt(timeParts[1]);

    // Determine the period (AM or PM)
    var period = hours >= 12 ? 'PM' : 'AM';

    // Convert hours to 12-hour format
    hours = hours % 12;
    hours = hours === 0 ? 12 : hours;

    // Construct the formatted time string
    var formattedTime = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0') + ' ' + period;

    return formattedTime;
}
