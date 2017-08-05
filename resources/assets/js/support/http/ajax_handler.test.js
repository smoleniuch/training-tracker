import AjaxHandler from  'JS/support/http/ajax_handler.js';

jasmine.DEFAULT_TIMEOUT_INTERVAL = 50000;
describe('GET requests',function(){
  
  console.log(window.document.querySelector().getAttribute())
  var ajaxHandler = new AjaxHandler();

  test('sends get request', (done) => {

    function callback(data){
      console.log(data);
      expect.anything(data)
      done();
    }
    ajaxHandler.get('http://devinix.dev/login', callback)

  })

})
