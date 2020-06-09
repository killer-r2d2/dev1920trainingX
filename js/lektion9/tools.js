const removeElement = (element) => {
  element.parentNode.removeChild(element);
};

const delegate = (cssKlasse, callbackFunktion) => {
  return (event) => {
    if (event.target.matches(cssKlasse)) {
      callbackFunktion(event);
    }
  }
};

const get = (url, callback) => {
  const request = new XMLHttpRequest();
  request.open('GET', url, true); // WHAT DOES true do

  request.onload = function() {
    if (request.status >= 200 && request.status < 400) {
      const response = JSON.parse(request.responseText);
      callback(response);
    } else {
      console.log('Server Fehler');
      console.log(request);
    }
  };
  request.onerror = function(error) {
    console.log('Verbindungsfehler')
  };
  request.send();
};

const post = (url, postData, callback) => {
  const request = new XMLHttpRequest();
  request.open('POST', url, true);
  request.setRequestHeader("Content-Type", "application/json");
  const data = JSON.stringify(postData);
  request.onload = function() {
    if (request.status >= 200 && request.status < 400) {
      const response = JSON.parse(request.responseText);
      callback(response);
    } else {
      console.log('Server Fehler');
    }
  };
  request.onerror = function() {
    console.log('Verbindungsfehler')
  };
  request.send(data);
};

export { removeElement, delegate, get, post };
