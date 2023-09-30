<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<script src="https:\\geryan.hu\randy.js"> </script>
<style>
    * {
        box-sizing: border-box;
    }

    .ARIAL {
        font-family: Arial;
    }

    .TITLE {
        color: white;
        text-align: center;
        font-size: 4em;
    }
    
    .OUTLINE
    {
        -webkit-text-stroke-width: 2px;
        -webkit-text-stroke-color: black;
    }
    
    .BETTER-OUTLINE
    {
        text-shadow: -1.25px -1.25px 0 #000, 1.25px -1.25px 0 #000, -1.25px 1.25px 0 #000, 1.25px 1.25px 0 #000;
    }

    .SMALL-TITLE {
        color: white;
        text-align: center;
        font-size: 1.3em;
    }

    .TINY-TITLE {
        color: white;
        /* font-variant: small-caps; */
    }

    .C-DEFBLUE {
        background-color: rgba(29, 42, 53, 255);
    }

    .C-DARKBLUE {
        background-color: rgba(21, 32, 43, 255);
    }

    .C-LIGHTBLUE {
        background-color: rgba(56, 68, 77, 255);
    }

    .C-WHITE {
        background-color: white;
    }

    .TC-BLACK {
        color: black;
    }

    .B-RADIUS {
        border-radius: 5px;
        padding-bottom: 5px;
    }

    .B-PADDING {
        padding: 7px;
    }

    .PLACEMENT-TOP-RIGHT {
        position: absolute;
        top: 0;
        right: 0;
        margin: 5px;
        margin-right: 10px;
        text-align: right;
        font-size: 20px;
    }

    .PLACEMENT-TOP-LEFT {
        position: absolute;
        top: 0;
        left: 0;
        margin: 5px;
        margin-right: 10px;
        text-align: right;
        font-size: 20px;
    }
    
    .PLACEMENT-BOTTOM-LEFT {
        position: absolute;
        bottom: 0;
        left: 0;
        margin: 5px;
        margin-left: 10px;
        text-align: left;
        font-size: 20px;
    }

    .PLACEMENT-BOTTOM {
        position: fixed;
        bottom: 0;
        right: 50%;
        transform: translate(50%, 50%);
        margin-bottom: 25px;
        text-align: center;
        font-size: 20px;
    }

    .COLUMN {
        display: block;
        float: left;
        width: 33.333%;
        padding: 5px;
    }

    .ROW::after {
        content: "";
        display: table;
        clear: both;
    }

    .B-BOTTOMRADIUS {
        border-radius: 0px 0px 25px 25px;
        padding: 5px;
    }

    .LIMIT-SCALE {
        min-width: 960px;
    }

    #ENG-CANVAS {
        min-width: 100%;
        border-radius: 25px;
    }

    #ENG-VARIABLES {
        min-width: 100%;
        height: 300px;
    }

    #ENG-FUNCTIONS {
        min-width: 100%;
        height: 300px;
    }

    #ENG-EXECS {
        min-width: 100%;
        height: 100px;
    }
</style>

<body class="C-DEFBLUE LIMIT-SCALE">
    <a class="PLACEMENT-TOP-RIGHT TINY-TITLE ARIAL" href="WEE_docs.html" target="_blank"> Documentation </a>
    <a class="PLACEMENT-TOP-LEFT TINY-TITLE ARIAL" href="https://geryan.hu"> Geryan.hu </a>
    <a class="PLACEMENT-BOTTOM-LEFT TINY-TITLE ARIAL" href="javascript:RANDOMIZE_PAGE()">I'm feeling randy.</a>
    <h1 class="ARIAL TITLE C-LIGHTBLUE B-RADIUS B-PADDING BETTER-OUTLINE">Worst Engine Ever</h1>
    <p class="ARIAL SMALL-TITLE C-LIGHTBLUE B-RADIUS B-PADDING BETTER-OUTLINE">Made by <b>geryan</b></p>
    <div class="ROW">
        <div class="COLUMN C-LIGHTBLUE B-BOTTOMRADIUS">
            <div style="padding: 10px;">
                <button class="ARIAL" onclick="ENG_NEW_VARIABLE()">New Variable</button>
                <button class="ARIAL" onclick="ENG_REMOVE_VARIABLE()">Remove Variable</button>
                <button class="ARIAL" onclick="ENG_SET_VARIABLE()">Set Variable</button>
            </div>
            <select name="Variables" id="ENG-VARIABLES" class="B-BOTTOMRADIUS" style="overflow-y: auto;" multiple="false">

            </select>
        </div>
        <div class="COLUMN C-LIGHTBLUE B-BOTTOMRADIUS">
            <div style="padding: 10px;">
                <button onclick="BEGINENG()" class="ARIAL TC-BLACK TINY-TITLE" id="BEGINBUTTON">Begin Engine</button>
                <button onclick="STOPENG()" class="ARIAL TC-BLACK TINY-TITLE">Stop Engine</button>
                <button onclick="COMPILE()" class="ARIAL TC-BLACK TINY-TITLE" style="float:right;">Compile</button>
                <a id="COMPILE-DOWNLOAD"></a>
            </div>
            <canvas id="ENG-CANVAS" class="C-WHITE">

            </canvas>
        </div>
        <div class="COLUMN C-LIGHTBLUE B-BOTTOMRADIUS ARIAL">
            <div style="padding: 10px;">
                <select name="Root" class="ARIAL" id="ENG-ROOT" style="width: 200px" onchange="ENG_ROOT_CHANGE()">
                    <option title="The code will be executed per tick" value="ON:TICK">ON:TICK</option>
                    <option title="The code will be executed when the engine is started" value="ON:BEGIN">ON:BEGIN</option>
                    <option title="The code will be executed when a key is pressed" value="ON:KEYPRESS">ON:KEYPRESS</option>
                    <option title="The code will be executed when a key is released" value="ON:KEYUP">ON:KEYUP</option>
                    <option title="The code will be executed when the client left clicks" value="ON:MOUSECLICK">ON:MOUSECLICK</option>
                </select>
                <span class="TINY-TITLE">TICK DELAY: <span> <input type="number" value="50" id="ENG-TICKRATE">
            </div>
            <textarea name="Functions" id="ENG-FUNCTIONS" class="B-BOTTOMRADIUS ARIAL" spellcheck="false" style="resize: none" onkeyup="ENG_TRANSLATE_CODE()"></textarea>
            <span class="TINY-TITLE ARIAL">EVENT ID</span> <input min="0" class="ARIAL" value="0" type="number" onkeyup="ENG_EVENT_CHANGE(-1)" onchange="ENG_EVENT_CHANGE(-1)" id="ENG-EVENTID"> <span class="TINY-TITLE ARIAL">EVENT NAME</span> <input id="ENG-EVENTNAME" min="0" type="text" onkeyup="ENG_TRANSLATE_EVENT()" value="EVENT">
            <textarea name="Execs" id="ENG-EXECS" class="B-BOTTOMRADIUS ARIAL" spellcheck="false" style="resize: none" onkeyup="ENG_TRANSLATE_EVENT()"> </textarea>
        </div>
        <div class="C-LIGHTBLUE B-RADIUS B-PADDING PLACEMENT-BOTTOM TINY-TITLE ARIAL" style="z-index: 11;">
            <form>
                <input type="file" id="UPLOAD-FILE" class="TINY-TITLE ARIAL" accept=".json">
                <input type="button" onclick="UPLOADCODE()" value="Upload project" class="TINY-TITLE TC-BLACK ARIAL">
            </form>
        </div>
    </div>

</body>
<script>
    var ENG_VARIABLE_LIST = [];

    var URLPARAMS = new URLSearchParams(window.location.search);

    var LOADED_IMG_LIST = [];

    var ENG_CANVAS = document.getElementById("ENG-CANVAS");
    
    var LEGACYMATHS = 0;


    function FULLSCREEN()
    {
        ENG_CANVAS.style.position = "fixed";
        ENG_CANVAS.style.top = "0";
        ENG_CANVAS.style.left = "0";
        ENG_CANVAS.style.bottom = "0";
        ENG_CANVAS.style.right = "0";
        ENG_CANVAS.style.padding = "25px";
        ENG_CANVAS.style.zIndex = "10";
        ENG_CANVAS.style.border = "";
        ENG_CANVAS.style.borderRadius = "0px";
        document.getElementById("ENG-VARIABLES").style.display = "none";
        document.getElementById("ENG-FUNCTIONS").style.display = "none";
    }

    //FULLSCREEN. IT JUST SCALES UP THE CANVAS.
    if (URLPARAMS.get('fullscreen') == "true") 
    {
        FULLSCREEN();
    }
    
    //TEMPLATING.....
    
    var HTML_VARIABLE_LIST = document.getElementById("ENG-VARIABLES");
    
    var ENG_EVENT_COLLECTION = [{
        EVENT_DATA: "Alert;",
        EVENT_NAME: "Default"
    }];
    ENG_EVENT_CHANGE(0);
    
    var ENG_CODE_COLLECTION = [{
        CODE_DATA: "",
        CODE_ROOT: "ON:TICK"
    }, {
        CODE_DATA: "",
        CODE_ROOT: "ON:BEGIN"
    }, {
        CODE_DATA: "",
        CODE_ROOT: "ON:KEYPRESS"
    }, {
        CODE_DATA: "",
        CODE_ROOT: "ON:KEYUP"
    }, {
        CODE_DATA: "",
        CODE_ROOT: "ON:MOUSECLICK"
    }];
    
    var CURRENT_ROOT = document.getElementById("ENG-ROOT").selectedOptions[0].value;
    var CURRENT_EVENT_ID = document.getElementById("ENG-EVENTID").value;
    var CURRENT_EVENT_NAME = document.getElementById("ENG-EVENTNAME").value;
    
    var CURRENT_COLOR = "rgba(0, 0, 0, 255)";
    
    let ENG_AUDLIST = [];
    
    //...UP UNTIL NOW.
    
    
    //EXPORTING GAME FILES
    function COMPILE() {
        var COMPILATION = [{
            COMPILED_EXEC: (ENG_EVENT_COLLECTION)
        },
        {
            COMPILED_CODE: (ENG_CODE_COLLECTION)
        },
        {
            COMPILED_VARS: (ENG_VARIABLE_LIST)
        },
        {
            TICKRATE: document.getElementById("ENG-TICKRATE").value
        }
    ];
    //I WISH I REMEMBERED HOW THIS WORKS.
    var data = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(COMPILATION));
    var downloader = document.getElementById("COMPILE-DOWNLOAD");
    downloader.setAttribute("href", data);
    downloader.setAttribute("download", "WEE_proj.json");
    downloader.click();
    
}

//IMPORTING GAME FILES

function UPLOADCODE() {
    const READER = new FileReader();
        var UPLFILE = document.getElementById("UPLOAD-FILE").files[0];
        READER.onload = function() {
            var exec = JSON.parse(READER.result);
            ENG_EVENT_COLLECTION = exec[0].COMPILED_EXEC;
            ENG_CODE_COLLECTION = exec[1].COMPILED_CODE;
            ENG_VARIABLE_LIST = exec[2].COMPILED_VARS;
            document.getElementById("ENG-TICKRATE").value = exec[3].TICKRATE;
            ENG_ROOT_CHANGE();
            ENG_EVENT_CHANGE(-1);
            HTML_VARIABLE_LIST.innerHTML = "";
            ENG_VARIABLE_LIST.forEach(element => {
                var NEWOPT = document.createElement("option");
                NEWOPT.text = element.ENG_VAR_NAME;
                HTML_VARIABLE_LIST.add(NEWOPT);
                if (URLPARAMS.get('fullscreen') == "true") {
                    BEGINENG();
                }
            });
        }
        READER.readAsText(UPLFILE);
    }
    
    if (URLPARAMS.has('project')) {
        <?php if ($_GET['project'] != "") { ?>
            UPLOADCUSTOMCODE(<?php echo file_get_contents($_GET['project'] . '.json'); ?>);
        <?php
        } ?>
    
    }
    
    function UPLOADCUSTOMCODE(custom) 
    {
        var exec = custom;
        ENG_EVENT_COLLECTION = exec[0].COMPILED_EXEC;
        ENG_CODE_COLLECTION = exec[1].COMPILED_CODE;
        ENG_VARIABLE_LIST = exec[2].COMPILED_VARS;
        document.getElementById("ENG-TICKRATE").value = exec[3].TICKRATE;
        ENG_ROOT_CHANGE();
        ENG_EVENT_CHANGE(-1);
        HTML_VARIABLE_LIST.innerHTML = "";
        ENG_VARIABLE_LIST.forEach(element => {
            var NEWOPT = document.createElement("option");
            NEWOPT.text = element.ENG_VAR_NAME;
            HTML_VARIABLE_LIST.add(NEWOPT);
            if (URLPARAMS.get('fullscreen') == "true") {
                BEGINENG();
            }
        });
    }

    //EVENTS (LIKE CLICKING, AND KEYPRESSES)

    var ENG_LASTKEY;
    addEventListener('keydown', function(event) {
        if (TICK_INTERVAL != null) {
            ENG_LASTKEY = event.keyCode;
            ENG_EXECUTE_CODE(ENG_CODE_COLLECTION.find(item => item.CODE_ROOT == "ON:KEYPRESS").CODE_DATA);
        }
    })
    addEventListener('keyup', function(event) {
        if (TICK_INTERVAL != null) {
            ENG_LASTKEY = event.keyCode;
            ENG_EXECUTE_CODE(ENG_CODE_COLLECTION.find(item => item.CODE_ROOT == "ON:KEYUP").CODE_DATA);
        }
    })
    var ENG_MOUSE_X;
    var ENG_MOUSE_Y;

    var ENG_LOCMOUSE_X;
    var ENG_LOCMOUSE_Y;
    addEventListener('mousemove', function(event) {
        ENG_MOUSE_X = event.clientX;
        ENG_MOUSE_Y = event.clientY;
        //ENG_EXCECUTE_CODE(ENG_CODE_COLLECTION.find(item => item.CODE_ROOT == "ON:MOUSEMOVE").CODE_DATA);
        var rect = ENG_CANVAS.getBoundingClientRect();
        scaleX = ENG_CANVAS.width / rect.width;
        scaleY = ENG_CANVAS.height / rect.height;
        ENG_LOCMOUSE_X = Math.round((event.clientX - rect.left) * scaleX);
        ENG_LOCMOUSE_Y = Math.round((event.clientY - rect.top) * scaleY);
    })
    addEventListener('mousedown', function(event) {
        if (TICK_INTERVAL != null) {
            ENG_EXECUTE_CODE(ENG_CODE_COLLECTION.find(item => item.CODE_ROOT == "ON:MOUSECLICK").CODE_DATA);
        }
    })


    var TICK_INTERVAL;

    //GAME ENGINE BASE IS RIGHT HERE!!!!

    function BEGINENG() {
        if (TICK_INTERVAL == null) {
            LOADED_IMG_LIST = [];
            var context = ENG_CANVAS.getContext("2d");
            context.clearRect(0, 0, ENG_CANVAS.width, ENG_CANVAS.height);
            TICK_INTERVAL = setInterval(ENG_UPDATE_TICK, document.getElementById("ENG-TICKRATE").value);
            document.getElementById("BEGINBUTTON").style.background = 'lightgreen';
            ENG_EXECUTE_CODE(ENG_CODE_COLLECTION.find(item => item.CODE_ROOT == "ON:BEGIN").CODE_DATA);
        }

    }

    function STOPENG() {
        clearInterval(TICK_INTERVAL);
        TICK_INTERVAL = null;
        document.getElementById("BEGINBUTTON").style.background = '';
        ENG_AUDLIST.forEach(element => {
            element.pause();
        });
        ENG_AUDLIST = [];
    }

    function ENG_UPDATE_TICK() {
        ENG_EXECUTE_CODE(ENG_CODE_COLLECTION.find(item => item.CODE_ROOT == "ON:TICK").CODE_DATA);
        ENG_VARIABLE_LIST.forEach(element => {
            console.log(element);
        });
    }
    
    //NEW VARIABLE

    function ENG_NEW_VARIABLE() {
        var NAME = prompt("Enter Variable name");
        NAME = NAME.replaceAll(" ", "");
        NAME = NAME.replaceAll("+", "");
        NAME = NAME.replaceAll("-", "");
        NAME = NAME.replaceAll("*", "");
        NAME = NAME.replaceAll("/", "");
        NAME = NAME.replaceAll(":", "");

        if (!ENG_VARIABLE_LIST.find(item => item.ENG_VAR_NAME === NAME) && NAME && NAME != "") {
            var NEWOPT = document.createElement("option");
            NEWOPT.text = NAME;
            HTML_VARIABLE_LIST.add(NEWOPT);
            ENG_VARIABLE_LIST.push({
                ENG_VAR_NAME: NAME,
                ENG_VAR_DATA: 0,
                ENG_VAR_REF: NEWOPT.value
            });
        } else if (ENG_VARIABLE_LIST.includes(ENG_VARIABLE_LIST.find(item => item.ENG_VAR_NAME === NAME))) {
            alert("Variable already exists...");
        } else if (NAME == "") {
            alert("Variable name is null");
        }
        if (NAME.toLowerCase() == "var" || NAME.toLowerCase() == "var_a" || NAME.toLowerCase() == "a")
        {
            alert("how creative..."); //I HAD TO
        }
    }

    function ENG_REMOVE_VARIABLE() {
        if (HTML_VARIABLE_LIST.selectedOptions != null) {
            ENG_VARIABLE_LIST.splice(ENG_VARIABLE_LIST.indexOf(ENG_VARIABLE_LIST.find(item => item.ENG_VAR_REF === HTML_VARIABLE_LIST.selectedOptions[0].value)), 1);
            HTML_VARIABLE_LIST.remove(HTML_VARIABLE_LIST.selectedIndex);
        } else {
            alert("No variable selected");
        }
    }

    function ENG_SET_VARIABLE() {
        var VAL = prompt("Enter Variable value (only number)");
        if (HTML_VARIABLE_LIST[HTML_VARIABLE_LIST.selectedIndex] != null && VAL) {
            ENG_VARIABLE_LIST.find(item => item.ENG_VAR_REF === HTML_VARIABLE_LIST.selectedOptions[0].value).ENG_VAR_DATA = parseInt(VAL);
            var sample = "Set:" + HTML_VARIABLE_LIST.selectedOptions[0].value + ":";
            ENG_CODE_COLLECTION[ENG_CODE_COLLECTION.findIndex(item => item.CODE_ROOT == "ON:BEGIN")].CODE_DATA += ("\n" + sample + VAL + ";");
            ENG_ROOT_CHANGE();
        }
    }

    function ENG_ROOT_CHANGE() {
        var SELECTED_ROOT = document.getElementById("ENG-ROOT").selectedOptions[0].value;
        CURRENT_ROOT = SELECTED_ROOT;
        var REF_TEXTAREA = document.getElementById("ENG-FUNCTIONS");
        REF_TEXTAREA.value = ENG_CODE_COLLECTION[ENG_CODE_COLLECTION.indexOf(ENG_CODE_COLLECTION.find(item => item.CODE_ROOT == CURRENT_ROOT))].CODE_DATA;
    }

    function CONDITION(cond) {
        var argument = "";
        if (cond.includes("<")) {
            var ARGS = cond.split("<")
            argument = "<";
        }
        if (cond.includes(">")) {
            var ARGS = cond.split(">")
            argument = ">";
        }
        if (cond.includes("==")) {
            var ARGS = cond.split("==")
            argument = "==";
        }
        if (cond.includes("!=")) {
            var ARGS = cond.split("!=")
            argument = "!=";
        }
        if (argument == "") {
            return false;
        }
        switch (argument) {
            case ">":
                return MATHS(ARGS[0]) > MATHS(ARGS[1]);
                break;
            case "<":
                return MATHS(ARGS[0]) < MATHS(ARGS[1]);
                break;
            case "==":
                return MATHS(ARGS[0]) == MATHS(ARGS[1]);
                break;
            case "!=":
                if (MATHS(ARGS[0]) == MATHS(ARGS[1])) {
                    return false;
                } else {
                    return true;
                }
                break;
        }
    }
    
    //THIS USED TO BE WORSE, BUT I'VE IMPROVED IT SINCE.

    function DYNAMIC_TOFIXED(value, dp)
    {
        return +parseFloat(value).toFixed(dp);
    }

    function MATHS(math) {
        if(LEGACYMATHS == 0)
        {
            let E_VAL 
            //console.log(math);
            try
            {
                E_VAL = eval(VAR_REPLACEALL(math));
            }
            catch (e)
            {
                console.log(e);
            }
            return DYNAMIC_TOFIXED(E_VAL, 2);
        }
        if(LEGACYMATHS == 1)
        {
            var argument;
            argument = "";
            if (math.includes("+")) {
                var ARGS = math.split("+");
                argument = "+";
            }
            if (math.includes("-")) {
                var ARGS = math.split("-");
                argument = "-";
            }
            if (math.includes("*")) {
                var ARGS = math.split("*");
                argument = "*";
            }
            if (math.includes("/")) {
                var ARGS = math.split("/");
                argument = "/";
            }
            if (argument == "") {
                return VAR_CONVERT(math);
            }
            switch (argument) {
                case "+":
                    return VAR_CONVERT(ARGS[0]) + VAR_CONVERT(ARGS[1]);
                    break;
                case "-":
                    return VAR_CONVERT(ARGS[0]) - VAR_CONVERT(ARGS[1]);
                    break;
                case "*":
                    return VAR_CONVERT(ARGS[0]) * VAR_CONVERT(ARGS[1]);
                    break;
                case "/":
                    return VAR_CONVERT(ARGS[0]) / VAR_CONVERT(ARGS[1]);
                    break;
                default:
                    break;
            }
        }
    }

    function VAR_CONVERT(conv) 
    {
        if (ENG_VARIABLE_LIST.includes(ENG_VARIABLE_LIST.find(item => item.ENG_VAR_NAME == conv))) {
            return ENG_VARIABLE_LIST.find(item => item.ENG_VAR_NAME == conv).ENG_VAR_DATA;
        } else {
            return parseInt(conv);
        }
    }

    function VAR_REPLACEALL(conv) 
    {
        let code = conv;
        ENG_VARIABLE_LIST.forEach((element) =>
        {
            code = code.replaceAll(new RegExp("\\b"+element.ENG_VAR_NAME+"\\b", "g"), element.ENG_VAR_DATA);
        });
        return code;
    }
    
    function CMD_GETUNTIL_SPECIFICATOR(element, type)
    {
        switch (type) 
        {
            case "var":
                return ENG_VARIABLE_LIST[ENG_VARIABLE_LIST.indexOf(ENG_VARIABLE_LIST.find(item => item.ENG_VAR_NAME == element.substring(element.indexOf(":") + 1)))];
                break;
            case "event":
                return ENG_EVENT_COLLECTION[ENG_EVENT_COLLECTION.indexOf(ENG_EVENT_COLLECTION.find(item => item.EVENT_NAME == element.substring(element.indexOf(":") + 1)))];
                break;
            case "varc":
                return ENG_VARIABLE_LIST[ENG_VARIABLE_LIST.indexOf(ENG_VARIABLE_LIST.find(item => item.ENG_VAR_NAME == element.substring(element.indexOf(":") + 1, element.indexOf(","))))];
                break;
        }
    }
    
    //OOOH THIS RIGHT HERE...
    //THIS IS WHAT MAKES THE ENGINE WORK.
    //ALL METHODS ARE HERE, SUCH AS DRAWING, INPUT, VARIABLE MANAGEMENT.........
    //AND IT'S REALLY REALLY LONG!!!!!
    

    function ENG_EXECUTE_CODE(code) {
        let Code = String(code).replaceAll(/\s/g, '');
        const ENG_CODE_LIST = Code.split(';');
        ENG_CODE_LIST.forEach(element => {
            if (element.substring(0, element.indexOf(":")) == "Set") {
                ENG_VARIABLE_LIST[ENG_VARIABLE_LIST.indexOf(ENG_VARIABLE_LIST.find(item => item.ENG_VAR_NAME == element.substring(element.indexOf(":") + 1, element.lastIndexOf(":"))))].ENG_VAR_DATA = MATHS(element.substring(element.lastIndexOf(":") + 1));
            }
            if (element.substring(0, element.indexOf(":")) == "Draw_Move") {
                var context = ENG_CANVAS.getContext("2d");
                context.beginPath();
                context.moveTo(MATHS(element.substring(element.indexOf(":") + 1, element.indexOf(","))), MATHS(element.substring(element.lastIndexOf(",") + 1)));
            }
            if (element.substring(0, element.indexOf(":")) == "Draw_Line") {
                var context = ENG_CANVAS.getContext("2d");
                context.strokeStyle = CURRENT_COLOR;
                context.lineTo(MATHS(element.substring(element.indexOf(":") + 1, element.indexOf(","))), MATHS(element.substring(element.lastIndexOf(",") + 1)));
            }
            if (element.substring(0, element.indexOf(":")) == "Draw_Color") {
                var args = element.split(",");
                CURRENT_COLOR = "rgba(" + MATHS(element.substring(element.indexOf(":") + 1, element.indexOf(","))) + "," + MATHS(args[1]) + "," + MATHS(args[2]) + "," + MATHS(args[3]) + ")"
            }
            if (element == "Draw_Render") {
                var context = ENG_CANVAS.getContext("2d");
                context.stroke();
            }
            if (element == "Draw_Clear") {
                var context = ENG_CANVAS.getContext("2d");
                context.clearRect(0, 0, ENG_CANVAS.width, ENG_CANVAS.height);
            }
            if (element.substring(0, element.indexOf(":")) == "Draw_Rect") {
                var args = element.split(",");
                var context = ENG_CANVAS.getContext("2d");
                context.beginPath();
                context.strokeStyle = CURRENT_COLOR;
                context.rect(MATHS(element.substring(element.indexOf(":") + 1, element.indexOf(","))), MATHS(args[1]), MATHS(args[2]), MATHS(args[3]));
            }
            if (element.substring(0, element.indexOf(":")) == "Draw_FillRect") {
                var args = element.split(",");
                var context = ENG_CANVAS.getContext("2d");
                context.beginPath();
                context.fillStyle = CURRENT_COLOR;
                context.fillRect(MATHS(element.substring(element.indexOf(":") + 1, element.indexOf(","))), MATHS(args[1]), MATHS(args[2]), MATHS(args[3]));
            }
            if (element.substring(0, element.indexOf(":")) == "Draw_Circle") {
                var args = element.split(",");
                var context = ENG_CANVAS.getContext("2d");
                context.beginPath();
                context.strokeStyle = CURRENT_COLOR;
                context.arc(MATHS(element.substring(element.indexOf(":") + 1, element.indexOf(","))), MATHS(args[1]), MATHS(args[2]), 0, 2 * Math.PI);
            }
            if (element.substring(0, element.indexOf(":")) == "Draw_FillCircle") {
                var args = element.split(",");
                var context = ENG_CANVAS.getContext("2d");
                context.beginPath();
                context.fillStyle = CURRENT_COLOR;
                context.arc(MATHS(element.substring(element.indexOf(":") + 1, element.indexOf(","))), MATHS(args[1]), MATHS(args[2]), 0, 2 * Math.PI);
                context.fill();
            }
            if (element.substring(0, element.indexOf(":")) == "Draw_Text") {
                var args = element.split(",");
                var context = ENG_CANVAS.getContext("2d");
                context.font = "30px Arial";
                context.fillText(element.substring(element.indexOf(":") + 1, element.indexOf(",")), MATHS(args[1]), MATHS(args[2]))
            }
            if (element.substring(0, element.indexOf(":")) == "Draw_Data") {
                var args = element.split(",");
                var context = ENG_CANVAS.getContext("2d");
                context.font = "30px Arial";
                context.fillText(MATHS(element.substring(element.indexOf(":") + 1, element.indexOf(","))), MATHS(args[1]), MATHS(args[2]))
            }
            if (element.substring(0, element.indexOf(":")) == "Load_Image") {
                var args = element.split(",");
                var img = new Image();
                img.onload = function() {
                    LOADED_IMG_LIST[MATHS(args[1])] = img;
                }
                img.src = element.substring(element.indexOf(":") + 1, element.indexOf(","));
                console.log(img);
            }
            if (element.substring(0, element.indexOf(":")) == "Draw_Image") {
                var args = element.split(",");
                var context = ENG_CANVAS.getContext("2d");
                var img = LOADED_IMG_LIST[MATHS((element.substring(element.indexOf(":") + 1, element.indexOf(","))))];
                if(img != null)
                {
                    context.drawImage(img, MATHS(args[1]), MATHS(args[2]), MATHS(args[3]), MATHS(args[4]));
                }
            }
            if (element.substring(0, element.indexOf(":")) == "Play_Audio" || element.substring(0, element.indexOf(":")) == "Play_Sound") {
                var args = element.split(",");
                var context = ENG_CANVAS.getContext("2d");
                var aud = new Audio(element.substring(element.indexOf(":") + 1));
                aud.play();
                ENG_AUDLIST.push(aud);
            }
            if (element == "Stop_Sound" || element == "Stop_Audio") {
                ENG_AUDLIST.forEach(element => {
                    element.pause();
                });
                ENG_AUDLIST = [];
            }
            if (element == "Alert") {
                alert("An alert was.. alerted?...");
            }
            if (element.substring(0, element.indexOf(":")) == "If") {
                var args = element.split(":");
                if (CONDITION(args[1])) 
                {
                    ENG_EXECUTE_CODE(element.substring(element.indexOf("{") + 1, element.lastIndexOf("}")));
                }
            }
            if (element.substring(0, element.indexOf(":")) == "For")
            {
                var args = element.split(":");
                for (let index = 0; index < MATHS(element.substring(element.indexOf(":") + 1, args[1])); index++) 
                {
                    ENG_EXECUTE_CODE(args[2]);
                }

            }
            if (element.substring(0, element.indexOf(":")) == "Keypress") {
                CMD_GETUNTIL_SPECIFICATOR(element, "var").ENG_VAR_DATA = ENG_LASTKEY;
            }
            if (element.substring(0, element.indexOf(":")) == "Mouse_X") {
                CMD_GETUNTIL_SPECIFICATOR(element, "var").ENG_VAR_DATA = ENG_MOUSE_X;
            }
            if (element.substring(0, element.indexOf(":")) == "Mouse_Y") {
                CMD_GETUNTIL_SPECIFICATOR(element, "var").ENG_VAR_DATA = ENG_MOUSE_Y;
            }
            if (element.substring(0, element.indexOf(":")) == "LocalMouse_X") {
                CMD_GETUNTIL_SPECIFICATOR(element, "var").ENG_VAR_DATA = ENG_LOCMOUSE_X;
            }
            if (element.substring(0, element.indexOf(":")) == "LocalMouse_Y") {
                CMD_GETUNTIL_SPECIFICATOR(element, "var").ENG_VAR_DATA = ENG_LOCMOUSE_Y;
            }
            if (element.substring(0, element.indexOf(":")) == "Event_Id") {
                ENG_EXECUTE_CODE(ENG_EVENT_COLLECTION[MATHS(element.substring(element.indexOf(":") + 1))].EVENT_DATA);
            }
            if (element.substring(0, element.indexOf(":")) == "Event") {
                ENG_EXECUTE_CODE(CMD_GETUNTIL_SPECIFICATOR(element, "event").EVENT_DATA);
            }
            if (element.substring(0, element.indexOf(":")) == "Random") {
                var args = element.split(",");
                CMD_GETUNTIL_SPECIFICATOR(element, "varc").ENG_VAR_DATA = Math.floor(Math.random() * parseInt(args[1]));
            }
            if (element.substring(0, element.indexOf(":")) == "Round") {
                var vardata = ENG_VARIABLE_LIST[ENG_VARIABLE_LIST.indexOf(ENG_VARIABLE_LIST.find(item => item.ENG_VAR_NAME == element.substring(element.indexOf(":") + 1)))].ENG_VAR_DATA;
                CMD_GETUNTIL_SPECIFICATOR(element, "var").ENG_VAR_DATA = parseInt(Math.round(vardata));
            }
        });
    }

    function ENG_TRANSLATE_CODE() {
        var REF_TEXTAREA = document.getElementById("ENG-FUNCTIONS");
        var ENG_CODE = REF_TEXTAREA.value;
        ENG_CODE_COLLECTION[ENG_CODE_COLLECTION.indexOf(ENG_CODE_COLLECTION.find(item => item.CODE_ROOT == CURRENT_ROOT))].CODE_DATA = ENG_CODE;
    }

    function ENG_EVENT_CHANGE(specid) {
        var REF_TEXTAREA = document.getElementById("ENG-EXECS");
        var REF_NAMEAREA = document.getElementById("ENG-EVENTNAME");
        var ID = document.getElementById('ENG-EVENTID').value;
        if (specid != -1) {
            ID = specid;
        }
        if (ENG_EVENT_COLLECTION[ID] == null) {
            ENG_EVENT_COLLECTION[ID] = {
                EVENT_DATA: "",
                EVENT_NAME: "NAME"
            }
        }
        REF_NAMEAREA.value = ENG_EVENT_COLLECTION[ID].EVENT_NAME;
        REF_TEXTAREA.value = ENG_EVENT_COLLECTION[ID].EVENT_DATA;
    }

    function ENG_TRANSLATE_EVENT() {
        var ID = document.getElementById('ENG-EVENTID').value;
        var NAME = document.getElementById('ENG-EVENTNAME').value;
        var REF_TEXTAREA = document.getElementById("ENG-EXECS");
        var ENG_CODE = REF_TEXTAREA.value;
        ENG_EVENT_COLLECTION[ID].EVENT_DATA = ENG_CODE;
        ENG_EVENT_COLLECTION[ID].EVENT_NAME = NAME;
    }
</script>

</html>