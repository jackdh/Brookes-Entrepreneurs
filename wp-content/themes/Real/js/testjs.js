alert('hi');  

xhr = new XMLHttpRequest
xhr.open('GET', 'https://www.eventbrite.com/json/event_get?app_key=EHHWMU473LTVEO4JFY&id=10487792269', true)

xhr.onload = function() {
    if (this.status >= 200 && this.status < 400){
        document.body.textContent = 'SUCCESS: ' + this.response

    } else {
        alert('FAIL')
    }
}

xhr.onerror = function() {
   alert('ERROR');
};

xhr.send()