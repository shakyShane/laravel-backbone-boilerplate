/**
 *
 * ----------------------------------------------
 * Bootstrap the App
 * ----------------------------------------------
 *
 * 'Require' all the [global] files you need here.
 *
 * Everything in this file will be loaded/compiled automatically.
 *
 *
 */
require(['public/models/Person'], function(Person){

  var p = new Person({

    first : 'Shane',
    last  : 'Osbourne'

  });

  console.log (p.fullName());
});