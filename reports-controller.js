 /******************************************************************************
//                     Reports Controller
//
******************************************************************************/

Dms.ReportsController = Ember.ArrayController.extend({
  sortProperties: ['dateSoldSort'],
  // months and years for drop down select
  months: ['all', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
  years: [2015, 2013, 2014, 2016],
  // Returns a list of filtered and sorted car objects
  filteredCar: function() {
    var self = this;
    var cars = self.get('arrangedContent').filter(function(car) {
      // If all is selected allowMonth will be true else compare month
      var allowMonth = self.get('selectedMonth') == 'all' || parseInt(car.get('dateSoldMonth'), 10) == parseInt(self.get('selectedMonth'), 10);
      // Check year
      var allowYear = parseInt(self.get('selectedYear'), 10) == parseInt(car.get('dateSoldYear'), 10);
      return car.get('isSold') && allowMonth && allowYear;
    });
    return cars;
  }.property('content.@each', 'content.@each.isSold', 'sortProperties', 'selectedMonth', 'selectedYear'),
  // Subtotal property is the sale price less any trade allowance
  subtotal: function() {
    var cars = this.get('filteredCar');
    for(i=0; i<cars.length; i++) {
      var car = cars[i];
      var sale = car.get('saleAmount') ? car.get('saleAmount') : 0;
      var trade = car.get('tradeInAllowance') ? car.get('tradeInAllowance') : 0;
      car.set('subtotal', (sale - trade));
    }
  }.property('saleAmount', 'tradeInAllowance'),
  // Property returns the total profit from array of filtered cars
  totalProfit: function(){
    var profit = 0;
    var cars = this.get('filteredCar');
    for(i=0; i<cars.length; i++) {
      var thisProfit = parseInt(cars[i].get('profit'), 10);
      profit += thisProfit;
    }
    return profit;
  }.property('filteredCar.@each.profit'),
  // Property returns the total sales tax from array of filtered cars
  totalTax: function(){
    var tax = 0;
    var cars = this.get('filteredCar');
    for(i=0; i<cars.length; i++) {
      var thisTax = parseInt(cars[i].get('salesTax'), 10);
      tax += thisTax;
    }
    return tax;
  }.property('filteredCar.@each.salesTax'),
  // Property returns the average profit from array of filtered cars
  averageProfit: function() {
    return Math.round(this.get('totalProfit') / this.get('filteredCar.length'));
  }.property('totalProfit', 'filteredCar.length'),
  
  actions: {
    // Select and show report - Parameter is a report name. #if helper on view shows report when name is true
    report: function(report) {
      // Hide any active reports, Gets name of active report and then sets to false
      var active = this.get('report');
      if(active) {
        this.set(active, false);
      }
      // set report name equal to true and unhides the report
      this.set(report, true);
      // sets report name so we can hide it when report actions is used again
      this.set('report', report);
    },
    linkToCar: function(car) {
      this.transitionToRoute('soldVehicle', car.id);
    },
    sortBy: function(property) {
      this.set('sortProperties', [property]);
      this.set('sortAscending', !this.get('sortAscending'));
    }
  }
});
