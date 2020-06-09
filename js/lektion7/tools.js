const removeElement = (ausgangspunkt) => {
ausgangspunkt.parentNode.removeChild(ausgangspunkt);
}


const delegate = (cssKlass, funktion) => {
    console.log(cssKlass);
    console.log(funktion);
    // Beim start ausgeführt
    return function (event) {
      // Beim click ausgeführt
      if (event.target.matches(cssKlass)) {
        funktion(event);
      }
    };
  };

export { removeElement, delegate };

