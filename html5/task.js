self.onmessage = function(e){
    //业务逻辑代码
    self.postMessage(e.data + 'world');
}