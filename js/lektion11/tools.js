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

export { removeElement, delegate };
