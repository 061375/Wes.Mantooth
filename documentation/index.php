<?php
$q = isset($_GET['q']) ? $_GET['q']: false;
if('' == trim($q))$q = false;
include('includes/shortcuts.php');
?>
<!DOCTYPE html>

<html>
<head>
    <title>Wes Mantooth - Documentation</title>
    <link rel="stylesheet" href="/_/css/style.css" />
    <script src="/_/js/wes.mantooth.js"></script>
</head>

<body class="docs">
    <div class="container">
        <header>
            <h1>
                <a href="/">Wes Mantooth</a> <span>- HTML5 Canvas Game Engine - Version 2.x - by Jeremy Heminger</span>
            </h1>
        </header>
        <?php include('includes/_nav.php'); ?>
        <div class="content">
            <?php
            if(false !== $q) {
                if(file_exists('includes/'.$q.'.php'))
                    include('includes/'.$q.'.php');
            }else{
                ?>
                <div class="left">
                <p>
                    Wes Mantooth is a hobby project. It's a framework designed to automate some of the graphical aspects of visual Javascript programming, including game development.
                </p>
                <p>
                    <h3>Getting Started</h3>
                    <p>
                        Wes Mantooth uses an alias <strong>$w</strong> similar to jQuery
                    </p>
                    <pre class="brush:js">
&lt;script>/path/to/wes.mantooth.js&lt;/script>
&lt;script>
    window.onload = function(){
        $w.init.canvas();
    }
&lt;/script>
                    </pre>
                </p>
                <section id="log">
                    <h3>log <span> -> {Void}</span></h3>
                    <h4>sends a string to the browsers console</h4>
                    
                    <table>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Description
                            </th>
                        </tr>
                        <tr>
                            <td>
                                text
                            </td>
                            <td>
                                String
                            </td>
                            <td>
                                <p>The log file is deactivated by default. It can be activated in the initialization of the class or (preferably) overridden in a program</p>
                    <pre class="brush:js">
                        $w.boolLog = true;
                    </pre>
                            </td>
                        </tr>
                    </table>
                </section>
                <section id="slocation">
                    <h3>slocation <span> -> {String}</span></h3>
                    <h4>returns the URI path to the base script. Useful for includes, etc...</h4>
                    
                </section>
                <section id="makeFPS">
                    <h3>makeFPS <span> -> {Void}</span></h3>
                    <h4>creates an HTMl element to hold the FPS (frames per second) variable for display</h4>
                    
                    <table>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Description
                            </th>
                        </tr>
                        <tr>
                            <td>
                                s
                            </td>
                            <td>
                                Boolean
                            </td>
                            <td>
                                if true display the FPS variable
                            </td>
                        </tr>
                    </table>
                </section>
                <section id="upFPS">
                    <h3>upFPS <span> -> {Void}</span></h3>
                    <h4>updates the visual FPS value</h4>
                    <table>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Description
                            </th>
                        </tr>
                        <tr>
                            <td>
                                $t
                            </td>
                            <td>
                                Object
                            </td>
                            <td>
                                The target DOM node to draw the FPS
                            </td>
                        </tr>
                    </table>
                </section>
                <section id="loop">
                    <h3>loop <span> -> {Void}</span></h3>
                    <h4>loops through the game objects and preforms the loop function for each object added using add_object</h4>
                    <h5>
                        This will be modified in the future to be required. it will also have multiple functions to run as per how it is done in Game Maker.
                        <br />
                        <ul>
                            <li>
                                create
                            </li>
                            <li>
                                start loop
                            </li>
                            <li>
                                loop
                            </li>
                            <li>
                                end loop
                            </li>
                            <li>
                                destruction
                            </li>
                            <li>
                                function
                            </li>
                        </ul>
                    </h5>
                    
                </section>
                <section id="add_object">
                    <h3>add_object <span> -> {Void}</span></h3>
                    <h4>creates and instance of an object and canvas, initializes it and returns an ID</h4>
                    <table>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Description
                            </th>
                        </tr>
                        <tr>
                            <td>
                                r
                            </td>
                            <td>
                                Integer
                            </td>
                            <td>
                                the number of new objects of this type to add
                            </td>
                        </tr>
                        <tr>
                            <td>
                                o
                            </td>
                            <td>
                                Function
                            </td>
                            <td>
                                the object to duplicate
                            </td>
                        </tr>
                        <tr>
                            <td>
                                p
                            </td>
                            <td>
                                Object
                            </td>
                            <td>
                                parameters to pass to the function
                            </td>
                        </tr>
                        <tr>
                            <td>
                                $t
                            </td>
                            <td>
                                Object
                            </td>
                            <td>
                                target object to attach the canvas DOM node
                            </td>
                        </tr>
                    </table>
                </section>
                </div>
                <div class="right">
                    <ul>
                        <li>
                            <a href="#log">log</a>
                        </li>
                        <li>
                            <a href="#slocation">slocation</a>
                        </li>
                        <li>
                            <a href="#makeFPS">makeFPS</a>
                        </li>
                        <li>
                            <a href="#upFPS">upFPS</a>
                        </li>
                        <li>
                            <a href="#loop">loop</a>
                        </li>
                        <li>
                            <a href="#add_object">add_object</a>
                        </li>
                    </ul>
                </div>
                <?php
            }
                ?>
        </div>
        <footer>
            
        </footer>
    </div>
</body>
</html>