/**
 * Created by aabweber on 16/01/2020.
 */
class Request {
    constructor (nav) {
        this.prevRequests = {};
    }

    request (url, callback, args = {}){
        if(this.prevRequests[url]){
            this.prevRequests[url].abort();
            this.prevRequests[url] = null;
        }
        args['format'] = 'json';
        this.prevRequests[url] = $.getJSON(url, args, (data, status) => {
            this.prevRequests[url] = null;
            if(status!='success' || data.status!='ok') return;
            data = data.data;
            callback(data);
        });

    }
}


$(function(){

    $('[data-toggle="tooltip"]').tooltip();
});