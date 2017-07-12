function $(selector, context) {
    context = context || document;
    switch(selector.charAt(0)){
        case '#': //id
            return [document.getElementById(selector.substring(1))];
            break;
        case '.': //class
            return getByClass(selector.substring(1), context);
            break;
        default: //tag
            return context.getElementsByTagName(selector);
            break;
    }
}
/**
 * 查找符合className的元素
 * @param className
 * @param context
 * @return {Array}
 */
function getByClass(className, context) {
    context = context || document;
    var result = [];
    var arr = context.getElementsByTagName('*');
    var re = new RegExp("\\b"+className+"\\b");
    for(var i=0; i<arr.length; i++){
        if(re.test(arr[i].className)){
            result.push(arr[i]);
        }
    }
    return result;
}
/**
 * 返回指定的元素的下一个元素兄弟
 * @param elem
 * @return 指定的元素的下一个元素兄弟
 */
function next(elem) {
    do{
        elem = elem && elem.nextSibling;
    }while(elem && elem.nodeType != 1);
    return elem;
}
/**
 * 返回指定的元素的前一个元素兄弟
 * @param elem
 * @return 指定的元素的前一个元素兄弟
 */
function prev(elem) {
    do{
        elem = elem && elem.previousSibling;
    }while(elem && elem.nodeType != 1);
    return elem;
}

/**
 * 查找指定元素的第一个孩子节点
 * @param elem
 */
function first(elem) {
    elem = elem.firstChild;
    return elem && elem.nodeType == 1 ? elem : next(elem);
}

/**
 * 查找指定元素的最后一个孩子节点
 * @param elem
 */
function last(elem) {
    elem = elem.lastChild;
    return elem && elem.nodeType == 1 ? elem : prev(elem);
}

/**
 * 在给定的当前元素的前面插入一个新元素
 * @param elem
 */
function before(elem, newNode) {
    elem.parentNode.insertBefore(newNode, elem);
}

//        before(oH1, oSpan);
/**
 * 在给定的当前元素的后面面插入一个新元素
 * @param elem
 * @param newNode
 */
function after(elem, newNode) {
    if(elem.nextSibling){
        before(elem.nextSibling, newNode);
    }else{
        elem.parentNode.appendChild(newNode);
    }
}

/**
 * 删除给定的元素
 * @param elem
 */
function remove(elem) {
    elem.parentNode.removeChild(elem);
}

/**
 * @param elem 当前元素
 * @return {Array} 返回当前元素的元素节点
 */
function siblings(elem) {
    var arr = [];
    var elements = elem.parentNode.children;
    for(var i=0; i<elements.length; i++){
        if(elements[i] != elem){
            arr.push(elements[i]);
        }
    }
    return arr;
}

function cloneObj(obj) {
    var newObj = {};
    for(var p in obj){
        if(typeof obj[p] === 'object'){
            newObj[p] = arguments.callee(obj[p]);
        }else{
            newObj[p] = obj[p];
        }
    }
    return newObj;
}

/**
 * @param target 被合并的目标对象
 * @param obj 要合并的对象
 * @return 返回合并的新的对象
 */
function extend(target, obj) {
    for(var p in obj){
        if(typeof obj[p] === 'object'){
            target[p] = cloneObj(obj[p]);
        }else{
            target[p] = obj[p];
        }
    }
    return target;
}

/**
 * 去除字符串首尾空格
 * @param str
 * @return {string}
 */
function trim(str) {
    return str.replace(/^\s+|\s+$/g, '');
}

/**
 * 获取当前元素样式
 * @param elem
 * @param attr
 * @return {*}
 */
function getStyle(elem, attr) {
    //能力检测
    if(elem.currentStyle){//IE
        return elem.currentStyle[attr];
    }else if(window.getComputedStyle){//标准浏览器
        return getComputedStyle(elem, false)[attr];
    }else{
        return elem.style[attr];
    }
}

function addEvent(elem, type, fn) {
    if(elem.addEventListener){//标准
        elem.addEventListener(type, fn, false);
    }else if(elem.attachEvent){
        elem[type+fn] = function () {
            fn.call(elem);
        };
        elem.attachEvent('on'+type, elem[type+fn]);
    }else{
        elem['on' + type] = fn;
    }
}

function removeEvent(elem, type, fn) {
    if(elem.removeEventListener){
        elem.removeEventListener(type, fn, false);
    }else if(elem.detachEvent){
        elem.detachEvent('on'+type, elem[type+fn]);
    }else{
        elem['on' + type] = null;
    }
}