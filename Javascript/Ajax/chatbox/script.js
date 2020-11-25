function get_Message() {
    const AjaxRequest = new XMLHttpRequest();
    AjaxRequest.open("GET", "handler.php");

    AjaxRequest.onload = function() {
        const resultat = JSON.parse(AjaxRequest.responseText);
        const html = resultat.reverse().map(function(message) {
            return `<div class='message m-3'>
                        <span class='date'>${message.created_at.substring(11,16)}</span>
                        <strong><span class='author'>${message.author} : </span></strong>
                        <span class='content'>${message.content}</span>
                    </div>`}).join('');

        const messages = document.querySelector('.messages');
        messages.innerHTML = html;
        chat.scrollTop = messages.scrollHeight;
    }

    AjaxRequest.send();
}

function post_Message(e) {
    e.preventDefault();

    const author = document.querySelector('#author');
    const content = document.querySelector('#content');
    const data = new FormData();
    data.append('author', author.value);
    data.append('content', content.value);

    const AjaxRequest = new XMLHttpRequest();
    AjaxRequest.open('POST', 'handler.php?task=write');

    AjaxRequest.onload = function() {
        content.value = '';
        content.focus();
        get_Message();
    };

    AjaxRequest.send(data);
}

document.querySelector('form').addEventListener('submit', post_Message);

const interval = window.setInterval(get_Message, 3000);

get_Message();