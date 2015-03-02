
Dms.NavHideView = Ember.View.extend({
  didInsertElement: function() {
      var startFade = 175;
      var endFade = 300;
      var navBar = this.$('.navbar');
    this.$(window).scroll(function (event) {
      var opacity = 1;
      var scrollPos = $(window).scrollTop();
      if(scrollPos < startFade) {
        opacity = 1;
      } else if (scrollPos > endFade) {
        opacity = 0;
      } else {
        opacity = 1 - ((scrollPos-startFade) / (endFade - startFade));
      }
      navBar.css('opacity', opacity);
      console.log(navBar.css);
    });
  }
});
