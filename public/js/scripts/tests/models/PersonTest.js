// Person Test
require(['public/models/Person'], function (Person) {

  describe("Person Model", function () {

    beforeEach(function () {
      this.person = new Person({

        first:'Shane',
        last:'Osbourne',
        age:27
      });

    });

    it("should exist", function () {
      expect(Person).toBeDefined();
    });

    it("Should require a First name.", function () {
      var status = this.person.set('last', '');
      expect(status).toBeFalsy();
    });

    it("Should require a Last Name  ", function () {
      var status = this.person.set('first', '');
      expect(status).toBeFalsy();
    });

    it("should return the full name", function () {
      expect(this.person.fullName()).toBe('Shane Osbourne');
    });

    it('should return the correct YOB', function(){
        expect(this.person.yob()).toBe(1985);
    });

  });
});