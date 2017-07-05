<?php
/*
     * @param {Object} a DOM object to append the canvas to
     * @param {Number} canvas container width
     * @param {Number} canvas container height
     * @param {Function} callback
     * @returns {Function(Number), Number}*/
    include('includes/shortcuts.php');
?>
<h2>Canvas</h2>
<p>
    This class handles and simplifies much of the drawing 
</p>
<div class="left">
    <section id="init">
        <h3>init <span> -> {Integer || Function}</span></h3>
        <h4>creates the canvas tag, initializes the context and returns an ID that referenes the current canvas</h4>
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
                <td>$t</td>
                <td>Object</td>
                <td>a DOM object to append the canvas to
                    <br />
                    example: document.getElemetById("target")
                    <br />
                    <span>(optional)</span> defaults to the &lt;body> tag
                </td>
            </tr>
            <tr>
                <td>w</td>
                <td>Number</td>
                <td>
                    The width of the canvas
                    <br />
                    <span>(optional)</span> defaults to browser window innerWidth
                </td>
            </tr>
            <tr>
                <td>h</td>
                <td>Number</td>
                <td>
                    The height of the canvas
                    <br />
                    <span>(optional)</span> defaults to browser window innerHeight
                </td>
            </tr>
            <tr>
                <td>callback</td>
                <td>Function</td>
                <td><span>(optional)</span> a callback function that returns the canvas ID</td>
            </tr>
        </table>
    </section>
    <section id="circle">
        <h3>circle <span> -> {Void}</span></h3>
        <h4>creates a circle ( filled, stroke or both )</h4>
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
            <?php echo $i; ?>
            <?php x(); ?>
            <?php y(); ?>
            <tr>
                <td>radius</td>
                <td>Number</td>
                <td>
                    the radius of the circle
                </td>
            </tr>
            <?php echo $color; ?>
            <?php echo $fint; ?>
        </table>
    </section>
    <section id="arc">
        <h3>arc <span> -> {Void}</span></h3>
        <h4>creates a basic arc</h4>
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
            <?php echo $i; ?>
            <?php x(); ?>
            <?php y(); ?>
            <tr>
                <td>radius</td>
                <td>Number</td>
                <td>
                    the radius of the circle
                </td>
            </tr>
            <tr>
                <td>s</td>
                <td>Number</td>
                <td>
                    start angle
                </td>
            </tr>
            <tr>
                <td>e</td>
                <td>Number</td>
                <td>
                    end angle
                </td>
            </tr>
            <tr>
                <td>cc</td>
                <td>Boolean</td>
                <td>
                    if <span>true</span> the arc is drawn counter-clockwize
                </td>
            </tr>
            <?php echo $color; ?>
            <?php echo $fint; ?>
        </table>
    </section>
    <section id="qarc">
        <h3>qArc <span> -> {Void}</span></h3>
        <h4>creates a quadratic curve</h4>
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
            <?php echo $i; ?>
            <?php x(1); ?>
            <?php y(1); ?>
            <?php x(2); ?>
            <?php y(2); ?>
            <?php x(3); ?>
            <?php y(3); ?>
            <?php echo $color; ?>
            <?php echo $fint; ?>
        </table>
    </section>
    <section id="barc">
        <h3>bArc <span> -> {Void}</span></h3>
        <h4>creates a bezier curve</h4>
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
            <?php echo $i; ?>
            <?php x(1); ?>
            <?php y(1); ?>
            <?php x(2); ?>
            <?php y(2); ?>
            <?php x(3); ?>
            <?php y(3); ?>
            <?php x(4); ?>
            <?php y(4); ?>
            <?php echo $color; ?>
            <?php echo $fint; ?>
        </table>
    </section>
    <section id="text">
        <h3>text <span> -> {Void}</span></h3>
        <h4>draws text to the canvas</h4>
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
            <?php echo $i; ?>
            <?php x(); ?>
            <?php y(); ?>
            <tr>
                <td>txt</td>
                <td>String</td>
                <td>
                    the text to display
                </td>
            </tr>
            <tr>
                <td>m</td>
                <td>Enum</td>
                <td>
                    stroke, fill
                </td>
            </tr>
            <tr>
                <td>font</td>
                <td>String</td>
                <td>
                    [font-size] [font-family] [font-style]
                    <br />
                    <span>
                        24px Arial italic
                    </span>
                </td>
            </tr>
            <?php echo $fint; ?>
        </table>
    </section>
</div>
<div class="right">
    <ul>
        <li>
            <a href="#init">init</a>
        </li>
        <li>
            <a href="#circle">circle</a>
        </li>
        <li>
            <a href="#arc">arc</a>
        </li>
        <li>
            <a href="#qarc">qarc</a>
        </li>
        <li>
            <a href="#barc">barc</a>
        </li>
        <li>
            <a href="#text">text</a>
        </li>
    </ul>
</div>