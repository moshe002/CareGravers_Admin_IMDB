//chat sessions, which users do we have a converstation with?
// Fetch contacts from the database
var selectedUserID;
function fetchContacts() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // console.log(xhr.responseText);
            var contacts = JSON.parse(xhr.responseText);

            createContactList(contacts);
        }
    };
    xhr.open('GET', '../server-side-process/fetch-contacts.php', true);
    xhr.send();
}

// Create the contact list in the inbox sidebar
function createContactList(contacts) {
    contacts.forEach(contact => {
        // Create outermostDiv
        var outermostDiv = document.createElement('div');
        outermostDiv.className = 'px-3 flex items-center bg-grey-light cursor-pointer';
        // Create innerDiv
        var innerDiv = document.createElement('div');
        innerDiv.className = 'ml-4 flex-1 border-b border-grey-lighter py-4';
        // Create nameAndMessageDiv
        var nameAndMessageDiv = document.createElement('div');
        nameAndMessageDiv.className = 'flex items-bottom justify-between';
        // Create first paragraph inside nameAndMessageDiv
        var p1 = document.createElement('p');
        p1.className = 'text-grey-darkest';
        p1.textContent = contact.fName + " " + contact.lName;
        nameAndMessageDiv.appendChild(p1);
        // Create second paragraph inside nameAndMessageDiv
        var p2 = document.createElement('p');
        p2.className = 'text-xs text-grey-darkest';
        p2.id = "time-latest";
        p2.textContent = '';
        nameAndMessageDiv.appendChild(p2);
        // // Create third paragraph inside nameAndMessageDiv
        
        // innerDiv.appendChild(p3);
        // Append nameAndMessageDiv to innerDiv
        innerDiv.appendChild(nameAndMessageDiv);
        // Append innerDiv to outermostDiv
        outermostDiv.appendChild(innerDiv);
        // Append outermostDiv to the document body
        document.getElementById('contacts').appendChild(outermostDiv);
        outermostDiv.addEventListener('click', function () {
        selectContact(contact.userID);
        });
    });
}

// Display chat messages for the selected user
function selectContact(userID) {
    // Set the selected user ID
    selectedUserID = userID;

    // Clear previous chat messages
    var messagesArea = document.getElementById('messages-area');
    messagesArea.innerHTML = '';

    // Fetch and display initial chat messages for the selected user
    fetchChatMessages();

    // Refresh messages area every 1 second
}

// Fetch chat messages for the selected user
function fetchChatMessages() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
                // console.log(xhr.responseText);
            var chatMessages = JSON.parse(xhr.responseText);
            displayChatMessages(chatMessages);
        }
    };
    xhr.open('POST', '../server-side-process/chat-process.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('userID=' + encodeURIComponent(selectedUserID));
    var messagesArea = document.getElementById('messages-area');
    messagesArea.innerHTML = '';
}
// Display chat messages in the chat area
function displayChatMessages(chatMessages) {
    var messageContainer = document.getElementById("messages-area");
    chatMessages.forEach(function (message) {        
        var p3 = document.getElementById('current');
        p3.textContent = message.sender;
        switch (message['SentOrReceived']) {
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
                paragraph1.textContent = message['chatMessage'];
                paragraph1.className = 'text-sm mt-1';
                // Create the second paragraph
                var paragraph2 = document.createElement('p');
                paragraph2.textContent = convertTo12HourFormat(message['chatTimestamp'].split(' ')[1]);//display only time
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
                var outerDiv = document.createElement('div');
                outerDiv.className = 'flex mb-2';
                // Create the inner div element
                var innerDiv = document.createElement('div');
                innerDiv.className = 'rounded py-2 px-3';
                innerDiv.style.backgroundColor = '#F2F2F2';
                // Create the first paragraph SENDER NAME
                var paragraph1 = document.createElement('p');
                paragraph1.textContent = message['senderUID'];
                paragraph1.className = 'text-sm text-purple';
                // Create the second paragraph CHATMESSAGE
                var paragraph2 = document.createElement('p');
                paragraph2.textContent = message['chatMessage'];
                paragraph2.className = 'text-sm mt-1';
                // Create the third paragraph TIMESENT
                var paragraph3 = document.createElement('p');
                paragraph3.textContent = convertTo12HourFormat(message['chatTimestamp'].split(' ')[1]);
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
    });
}
// Send chat message
document.getElementById('chat-input').addEventListener('keyup', function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        var messageInput = document.getElementById('chat-input');
        var message = messageInput.value.trim();
        if (message !== '') {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                    selectContact(selectedUserID);
                }
            };
            xhr.open('POST', '../server-side-process/chat-send.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('userID=' + encodeURIComponent(selectedUserID) + '&message=' + encodeURIComponent(message));
            var swooshSound = document.getElementById("swooshSound");
            swooshSound.play();
            messageInput.value = '';
        }
    }
});

// Fetch contacts when the page loads
window.addEventListener('load', function () {
    fetchContacts();
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