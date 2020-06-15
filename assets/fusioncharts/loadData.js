(function(global){
    var inc = {
        css:[],
        js:[],
        calls:[],
        loadedJs:[]
    };

    var loadData = function (obj) {
        inc.calls.push(obj);
        var head = document.getElementsByTagName("head")[0] || document.documentElement;

        if (typeof obj.css  == "string") {
            obj.css = [obj.css];
        }

        if (typeof obj.css == "object") {
            includeCssFiles(obj.css);
        }

        if (typeof obj.js  == "string") {
            obj.js = [obj.js];
        }

        if (typeof obj.js == "object") {
            includeJsFiles(obj.js);
        }else{
            obj.onload();
        }
        function includeCssFiles (cssFiles) {
            var stylesheet;
            if (cssFiles.length === 0) {
                return false;
            }
            for (var i = 0; i < cssFiles.length; i++) {

                if (inc.css.indexOf(cssFiles[i]) != -1) {
                    continue;
                }
                inc.css.push(cssFiles[i]);
                stylesheet = document.createElement("link");
                stylesheet.rel = "stylesheet";
                stylesheet.type = "text/css";
                stylesheet.href = cssFiles[i];
                head.appendChild(stylesheet);
            }
        }
        function includeJsFiles (jsFiles) {
            var script;
            if (jsFiles.length === 0) {
                obj.onload();
                return false;
            }

            if (inc.js.indexOf(jsFiles[0]) != -1) {
                if (inc.loadedJs.indexOf(jsFiles[0]) == -1) {
                    setTimeout(function () {
                        includeJsFiles(jsFiles);
                    },1);
                }else{
                    includeJsFiles(jsFiles.slice(1));
                }
                return;
            }

            inc.js.push(jsFiles[0]);
            script = document.createElement("script");
            script.src = jsFiles[0];
            head.appendChild(script);
            script.onload = function  () {
                inc.loadedJs.push(jsFiles[0]);
                head.removeChild( script );
                includeJsFiles(jsFiles.slice(1));
            };
            //TODO add script.onerror
        }

    };
    global.__inc = inc;
    global.loadData = loadData;
})(this);
