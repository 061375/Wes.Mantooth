<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Map Keyboard Keys to Functions</title>
    <?php require_once('scripts.php'); ?>
    <script src="../_/js/keyboard.js<?php echo $dev ?>"></script>
    <link rel="stylesheet" href="../_/css/style.css<?php echo $dev ?>" />
    <style>
        .keys {
            box-sizing: content-box;
            border-radius: 3px;
            background: #e1e1e1;
            padding: 15px;
            font-size: 55px;
            width: 215px;
            margin: 100px;
        }
        .key {
            border-radius: 15px;
            background: #c0c0c0;
            padding: 5px;
            display: inline-block;
            min-width: 60px;
            text-align: center;
            box-shadow: 1px 5px 10px #adadad;
        }
        .key.w {
            margin: 15px 73px;
        }
        .key.space {
            width: 100%;
            height: 60px;
            margin: 15px 0;
        }
        .key.down {
            background: #6658af;    
        }
    </style>
</head>
<body>
    <div class="left" id="target">
        <div class="keys">
            <div class="key w">W</div>
            <div class="key a">A</div>
            <div class="key s">S</div>
            <div class="key d">D</div>
            <div class="key space"></div>
        </div>    
    </div>
    <div class="right">
        <pre class="brush: js">
window.onload = function() {
    
    /**
     * Begin mapping the keydown and keyup events to the A key
     * */
    // assign a function called Aup to the letter A's keyup event
    $w.game.bindkeys({
        KeyA:Aup
    },"keyup");
    // assign a function called A to the letter A's keydown event
    $w.game.bindkeys({
        KeyA:A
    },"keydown");
    /**
     * @param {Object} the event
     * */
    function A(e) {
        // add a class called "down" to the a DOM node using a prototype in the shortys.js file
        document.getElementsByClassName("a")[0].addClass("down");
        $w.log(e);
    }
    /**
     * @param {Object} the event
     * */
    function Aup(e) {
        // remove a class called "down" to the a DOM node using a prototype in the shortys.js file
        document.getElementsByClassName("a")[0].removeClass("down");
        $w.log(e);
    }
    /**
     * End mapping the letter A
     * */
    
    // --------------------------------------------------
    
    /**
     * Begin mapping the keydown and keyup events to the S key
     * */
    // assign a function called Sup to the letter S's keyup event
    $w.game.bindkeys({
        KeyS:Sup
    },"keyup");
    // assign a function called S to the letter S's keydown event
    $w.game.bindkeys({
        KeyS:S
    },"keydown");
    /**
     * @param {Object} the event
     * */
    function S(e) {
        // add a class called "down" to the a DOM node using a prototype in the shortys.js file
        document.getElementsByClassName("s")[0].addClass("down");
        $w.log(e);
    }
    /**
     * @param {Object} the event
     * */
    function Sup(e) {
        // remove a class called "down" to the a DOM node using a prototype in the shortys.js file
        document.getElementsByClassName("s")[0].removeClass("down");
        $w.log(e);
    }
    /**
     * End mapping the letter S
     * */
    
    // --------------------------------------------------
    
    /**
     * Begin mapping the keydown and keyup events to the D key
     * */
    // assign a function called Dup to the letter D's keyup event
    $w.game.bindkeys({
        KeyD:Dup
    },"keyup");
    // assign a function called D to the letter D's keydown event
    $w.game.bindkeys({
        KeyD:D
    },"keydown");
    /**
     * @param {Object} the event
     * */
    function D(e) {
        // add a class called "down" to the a DOM node using a prototype in the shortys.js file
        document.getElementsByClassName("d")[0].addClass("down");
        $w.log(e);
    }
    /**
     * @param {Object} the event
     * */
    function Dup(e) {
        // remove a class called "down" to the a DOM node using a prototype in the shortys.js file
        document.getElementsByClassName("d")[0].removeClass("down");
        $w.log(e);
    }
    /**
     * End mapping the letter D
     * */
    
    // --------------------------------------------------
    
    /**
     * Begin mapping the keydown and keyup events to the W key
     * */
    // assign a function called Wup to the letter W's keyup event
    $w.game.bindkeys({
        KeyW:Wup
    },"keyup");
    // assign a function called W to the letter W's keydown event
    $w.game.bindkeys({
        KeyW:W
    },"keydown");
    /**
     * @param {Object} the event
     * */
    function W(e) {
        // add a class called "down" to the a DOM node using a prototype in the shortys.js file
        document.getElementsByClassName("w")[0].addClass("down");
        $w.log(e);
    }
    /**
     * @param {Object} the event
     * */
    function Wup(e) {
        // remove a class called "down" to the a DOM node using a prototype in the shortys.js file
        document.getElementsByClassName("w")[0].removeClass("down");
        $w.log(e);
    }
    /**
     * End mapping the letter W
     * */
    
    // --------------------------------------------------
    
    /**
     * Begin mapping the keydown and keyup events to the Space key
     * */
    // assign a function called Spaceup to the letter Space's keyup event
    $w.game.bindkeys({
        Space:Spaceup
    },"keyup");
    // assign a function called Space to the letter Space's keydown event
    $w.game.bindkeys({
        Space:Space
    },"keydown");
    /**
     * @param {Object} the event
     * */
    function Space(e) {
        // add a class called "down" to the a DOM node using a prototype in the shortys.js file
        document.getElementsByClassName("space")[0].addClass("down");
        $w.log(e);
    }
    /**
     * @param {Object} the event
     * */
    function Spaceup(e) {
        // remove a class called "down" to the a DOM node using a prototype in the shortys.js file
        document.getElementsByClassName("space")[0].removeClass("down");
        $w.log(e);
    }
    /**
     * End mapping the Space Bar
     * */
}
        </pre>
    </div>
    <?php echo $grunt; ?> 
</body>
</html>
