/**
 * Masonry by David DeSandro. http://masonry.desandro.com
 */

jQuery(document).ready(function($) {
  // init Masonry after all images have loaded
  var $grid = $('.post-container').imagesLoaded( function() {
    $grid.masonry({
      itemSelector: '.post-wrap',
      transitionDuration: '250ms',
      percentPosition: true,
      columnWidth: '.post-wrap'
    });
  });
})


/**
 * Hamburgler by John Morris. http://johnm.io/project/hamburgler
 */

 jQuery(document).ready(function($) {
 document.getElementById('hamburgler').addEventListener('click', checkNav);
 window.addEventListener("keyup", function(e) {
   if (e.keyCode == 27) closeNav();
 }, false);
 function checkNav() {
   if (document.body.classList.contains('hamburgler-active')) {
     closeNav();
   } else {
     openNav();
   }
 }
 function closeNav() {
   document.body.classList.remove('hamburgler-active');
 }
 function openNav() {
   document.body.classList.add('hamburgler-active');
 }
 })


/**
 * Sticky by Anthony Garand. http://stickyjs.com/
 */

jQuery(document).ready(function(){
  jQuery(".sticker").sticky({ topSpacing: 0, zIndex: 999 });
});
