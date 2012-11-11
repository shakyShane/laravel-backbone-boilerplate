/**
 *
 * Person Model.
 *
 */
define(['backbone'], function (Backbone) {

  return Backbone.Model.extend({

    validate:function (attrs) {
      if (!attrs.last) {
        return 'A last name is required!';
      }
      if (!attrs.first) {
        return 'A first name is required';
      }

    },
    /** Return the Full name **/
    fullName:function () {
      return [this.get('first'), this.get('last')].join(' ');
    },
    yob : function(){
      return (new Date).getFullYear() - parseInt(this.get('age'));
    }
  });

});