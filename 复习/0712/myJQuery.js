function getStyle(elem, attr) {
    if(elem.currentStyle){//IE
        return elem.currentStyle[attr];
    }else if(window.getComputedStyle){
        return getComputedStyle(elem, false)[attr];
    }else{
        return elem.style[attr];
    }
}

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

function $(selector, context) {
    context = context || document;
    var elements = [];
    switch(selector.charAt(0)){
        case '#': //id
            elements = [document.getElementById(selector.substring(1))];
            break;
        case '.': //class
            elements = getByClass(selector.substring(1), context);
            break;
        default: //tag
            elements = context.getElementsByTagName(selector);
            break;
    }

    return {
        click: function (fn) {
            for(var i=0; i<elements.length; i++){
                addEvent(elements[i], 'click', fn);
            }
            return this;
        },
        mouseover: function (fn) {
            for(var i=0; i<elements.length; i++){
                addEvent(elements[i], 'mouseover', fn);
            }
            return this;
        },
        mouseout: function (fn) {
            for(var i=0; i<elements.length; i++){
                addEvent(elements[i], 'mouseout', fn);
            }
            return this;
        },
        css: function (attr, value) {
            if(value){//如果给value传了值
                for(var i=0; i<elements.length; i++){
                    elements[i].style[attr] = value;
                }
                return this;
            }else{
                if(typeof attr === 'string'){
                    return getStyle(elements[0], attr);
                }else{
                    for(var p in attr){
                        switch(p){
                            case 'width':
                            case 'height':
                            case 'padding':
                            case 'paddingLeft':
                            case 'paddingRight':
                            case 'paddingTop':
                            case 'paddingBottom':
                                value = /\%/.test(attr[p])?attr[p]:Math.max(parseInt(attr[p]), 0) + 'px';
                                break;
                            case 'left':
                            case 'top':
                            case 'bottom':
                            case 'right':
                            case 'margin':
                            case 'marginLeft':
                            case 'marginRight':
                            case 'marginTop':
                            case 'marginBottom':
                                value = /\%/.test(attr[p])?attr[p]:parseInt(attr[p]) + 'px';
                                break;
                            default:
                                value = attr[p];
                        }
                        for(var i=0; i<elements.length; i++){
                            elements[i].style[p] = value;
                        }
                    }
                    return this;
                }
            }
        },
        next: function () {
            var elem = elements[0];
            do{
                elem = elem && elem.nextSibling;
            }while(elem && elem.nodeType != 1);
            return elem;
        }
    };
}