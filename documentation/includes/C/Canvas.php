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
            <?php color(); ?>
            <?php opacity(); ?>
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
            <?php color(); ?>
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
            <?php color(); ?>
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
            <?php color(); ?>
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
            <?php echo $method; ?>
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
            <?php echo color(); ?>
            <?php echo $fint; ?>
        </table>
    </section>
    <section id="line">
        <h3>line <span> -> {Void}</span></h3>
        <h4>draws a line to the canvas</h4>
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
            <?php color(); ?>
            <tr>
                <td>lineWidth</td>
                <td>Number</td>
                <td>
                    
                </td>
            </tr>
            <?php echo $fint; ?>
        </table>
    </section>
    <section id="rectangle">
        <h3>rectangle <span> -> {Void}</span></h3>
        <h4>draws a rectangle to the canvas</h4>
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
            <?php x(2,'note: this is relative to the x1 coordinate'); ?>
            <?php y(2,'note: this is relative to the y1 coordinate'); ?>
            <?php color(); ?>
            <?php echo $method; ?>
            <?php color(true); ?>
            <?php opacity(); ?>
            <?php echo $fint; ?>
        </table>
    </section>
    <section id="roundRectangle">
        <h3>roundRectangle <span> -> {Void}</span></h3>
        <h4>draws a round rectangle to the canvas</h4>
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
                <td>width</td>
                <td>Number</td>
                <td>
                    width of the rectangle
                </td>
            </tr>
            <tr>
                <td>height</td>
                <td>Number</td>
                <td>
                    height of rectangle
                </td>
            </tr>
            <?php color(); ?>
            <?php echo $method; ?>
            <?php color(true); ?>
            <?php opacity(); ?>
            <?php echo $fint; ?>
        </table>
    </section>
    <section id="polygon">
        <h3>polygon <span> -> {Void}</span></h3>
        <h4>draws a polygon to the canvas</h4>
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
            <tr>
                <td>a</td>
                <td>Array</td>
                <td>
                    a two dimensional array containing the coordinates of the polygon
                    <br />
                    <span>[ [ x,y ],[ x,y ],[ x,y ] ]</span>
                </td>
            </tr>
            <?php color(); ?>
            <?php echo $method; ?>
            <?php color(true); ?>
            <?php opacity(); ?>
            <?php echo $fint; ?>
        </table>
    </section>
    <section id="image">
        <h3>image <span> -> {Void}</span></h3>
        <h4>draws a bitmap image to the canvas</h4>
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
            <tr>
                <td>obj</td>
                <td>Object</td>
                <td>
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
                                img    
                            </td>
                            <td>
                                String
                            </td>
                            <td>
                                path to an image file: ( *.jpg, *.gif, *.png )
                            </td>
                        </tr>
                        <tr>
                            <td>
                                sx
                            </td>
                            <td>
                                Number
                            </td>
                            <td>
                                start x coord of section to be drawn
                            </td>
                        </tr>
                        <tr>
                            <td>
                                sy
                            </td>
                            <td>
                                Number
                            </td>
                            <td>
                                start y coord of section to be drawn
                            </td>
                        </tr>
                        <tr>
                            <td>
                                sWidth
                            </td>
                            <td>
                                Number
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                sHeight
                            </td>
                            <td>
                                Number
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                dx
                            </td>
                            <td>
                                Number
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                dy
                            </td>
                            <td>
                                Number
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                dWidth
                            </td>
                            <td>
                                Number
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                dHeight
                            </td>
                            <td>
                                Number
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?php echo $fint; ?>
        </table>
    </section>
    <section id="clear">
        <h3>clear <span> -> {Void}</span></h3>
        <h4>clears the referenced canvas</h4>
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
            <tr>
                <td>save</td>
                <td>Boolean</td>
                <td>
                    
                </td>
            </tr>
        </table>
    </section>
    <section id="zindex">
        <h3>zIndex <span> -> {Void}</span></h3>
        <h4>Sets the z-index of the target canvas</h4>
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
            <tr>
                <td>z</td>
                <td>Integer</td>
                <td>
                    
                </td>
            </tr>
        </table>
    </section>
    <section id="get">
        <h3>get <span> -> {Object}</span></h3>
        <h4>gets the referenced canvas or context</h4>
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
            <tr>
                <td>o</td>
                <td>Enum</td>
                <td>
                    canvas, ctx   
                </td>
            </tr>
        </table>
    </section>
    <section id="set_error">
        <h3>set_error <span> -> {Void}</span></h3>
        <h4>appends an error message to an array</h4>
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
                <td>e</td>
                <td>String</td>
                <td>
                    The error message   
                </td>
            </tr>
        </table>
    </section>
    <section id="has_error">
        <h3>has_error <span> -> {Void}</span></h3>
        <h4>if errors exist they are dumped to the console</h4>
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
        <li>
            <a href="#line">line</a>
        </li>
        <li>
            <a href="#rectangle">rectangle</a>
        </li>
        <li>
            <a href="#roundRectangle">roundRectangle</a>
        </li>
        <li>
            <a href="#polygon">polygon</a>
        </li>
        <li>
            <a href="#image">image</a>
        </li>
        <li>
            <a href="#clear">clear</a>
        </li>
        <li>
            <a href="#zindex">zIndex</a>
        </li>
        <li>
            <a href="#get">get</a>
        </li>
        <li>
            <a href="#set_error">set_error</a>
        </li>
        <li>
            <a href="#has_error">has_error</a>
        </li>
    </ul>
</div>