/**
* @param {jQuery}
* @returns {array} array of jQuery objects
* JQuery doesn't have a reduce function, so...
*/
function jQtoArray($jQ) {
  return $.map($jQ,(j,i)=>{
    return j;
  });
}