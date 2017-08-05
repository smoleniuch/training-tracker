import AjaxHandler from  'JS/support/http/ajax_handler.js';

jasmine.DEFAULT_TIMEOUT_INTERVAL = 50000;
describe('GET requests',function(){

  var ajaxHandler = new AjaxHandler();

  test('sends get request', (done) => {

    function callback(data){
      console.log(data);
      expect.anything(data)
      done();
    }
    ajaxHandler.get('http://training-tracker.com/login', callback)

  })

})
