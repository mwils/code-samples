  /*==================================================================================
      Matthew Wilson
      Makes the background image shift around when hoverd to grab a little attention
    ==================================================================================*/
  
Dms.moveJumbo = function(){
  // if needed change the next line to get the element
  var jumbo = $('#jumbotron');
  leftEdge = jumbo.offset().left;
  topEdge = jumbo.offset().top;
  jumWidth = jumbo.width();
  jumHeight = jumbo.height();
  var rightEdge = leftEdge + jumWidth;
  var bottomEdge = topEdge + jumHeight;
  var xCoor;
  var yCoor;
  window.onmousemove = function(e) {
    xCoor = e.clientX;
    yCoor = e.clientY;
    var withinJumbo = xCoor > leftEdge && xCoor < rightEdge && yCoor > topEdge && yCoor < bottomEdge;
    if(withinJumbo) {
      var newX = ((xCoor - leftEdge)/-20 -100) +"px ";
      var newY = ((yCoor - topEdge)/-20 -100) +"px";
      jumbo.css('background-position', newX + newY);
    }
  }
}
