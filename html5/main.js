var worker = new Worker('task.js');
worker.postMessage('hello ');
worker.onmessage = function(e){
    alert(e.data);
};