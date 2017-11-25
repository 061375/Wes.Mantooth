<h2>Collision</h2>
<div class="left">
    <section id="circle">
        <h3>circle <span> -> {Boolean}</span></h3>
        <h4>check collision with a polygon and a circle</h4>
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
                <td>p</td>
                <td>Array</td>
                <td>
                    a two dimensional array containing the coordinates of the polygon
                    <br />
                    <span>[ [ x,y ],[ x,y ],[ x,y ] ]</span>
                </td>
            </tr>
            <tr>
                <td>c</td>
                <td>Object</td>
                <td>The circle to be tested<br />
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
                                x
                            </td>
                            <td>
                                Number
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                y
                            </td>
                            <td>
                                Number
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                radius
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
        </table>
    </section>
    <section id="checkCircle">
        <h3>checkCircle <span> -> {Boolean}</span></h3>
        <h4>check collision of two circles</h4>
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
            <?php x(1); ?>
            <?php y(1); ?>
            <?php r(1); ?>
            <?php x(2); ?>
            <?php y(2); ?>
            <?php r(2); ?>
        </table>
    </section>
    <section id="insideCanvas">
        <h3>insideCanvas <span> -> {Boolean}</span></h3>
        <h4>check if target coords are inside the referenced canvas area</h4>
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
        </table>
    </section>
    <section id="inside">
        <h3>inside <span> -> {Boolean}</span></h3>
        <h4>check if polygon is inside of another polygon</h4>
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
                    point
                </td>
                <td>
                    Array
                </td>
                <td>
                    an array containing the x,y coordinates to test against
                    <br />
                    <span>[ x,y ]</span>
                </td>
            </tr>
            <tr>
                <td>
                    vs
                </td>
                <td>
                    Array
                </td>
                <td>
                    a two dimensional array containing the coordinates of the polygon
                    <br />
                    <span>[ [ x,y ],[ x,y ],[ x,y ] ]</span>
                </td>
            </tr>
        </table>
    </section>
    <section id="objectnearest">
        <h3>objectNearest <span> -> {Object}</span></h3>
        <h4>find the nearest object to x,y</h4>
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
            <?php x(1); ?>
            <?php y(1); ?>
        </table>
    </section>
</div>
<div class="right">
    <ul>
        <li>
            <a href="#circle">circle</a>
        </li>
        <li>
            <a href="#checkCircle">checkCircle</a>
        </li>
        <li>
            <a href="#insideCanvas">insideCanvas</a>
        </li>
        <li>
            <a href="#inside">inside</a>
        </li>
        <li>
            <a href="#objectnearest">objectNearest</a>
        </li>
    </ul>
</div>