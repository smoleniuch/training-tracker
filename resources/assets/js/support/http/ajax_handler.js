import axios from "axios";


/**
 * Stores all ajax requests this will help to manage requests.
 * @return {void}
 */
class AjaxHandler {

  constructor(){

    this.cancelToken = axios.CancelToken;
    this.source = this.cancelToken.source();
    this.axios = axios.create({

      headers: {

        'X-CSRF-TOKEN':document.querySelector('meta[name="csrf_token"]').getAttribute('content'),
        
      }

    });
  }





	/**
	 * Wrap around axios GET method.
	 * @param  {string} url         URL
	 * @param  {function} success   callback on success
	 * @param  {function} fail      callback on failure
	 * @return {void}
	 */
	get(url, success, fail = () => {}) {
		this.axios.get(url, {ancelToken: this.source.token})
			   .then((response) => {success(response.data)})
			   .catch(function(err) {
    				if (axios.isCancel(err)) {
    				} else {
    					fail();
    				}
    			});
	};


	/**
	 * Wrap around axios POST method.
	 * @param  {string} url          URL
   * @param  {function} success   callback on success
	 * @param  {function} fail      callback on failure
	 * @return {void}
	 */
	post(url, data, success, fail = () => {}) {
		this.axios({
			method: "post",
			url: url,
			data: data,
			cancelToken: this.source.token
		}).then( (response) => {
				success(response.data);
			})
			.catch((err) => {
				if (axios.isCancel(err)) {
				} else {
					fail();
				}
			});
	};

	/**
	 * Abort all axios calls.
	 * @return void
	 */
	abortAll() {
		this.source.cancel();
		// regenerate token
		this.source = this.cancelToken.source();
	};
};

export default AjaxHandler;
