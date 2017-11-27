<h2>Motion</h2>
<div class="left">
    <section id="distance_to_point">
        <h3>distance_to_point <span> -> {Number}</span></h3>
        <h4>return the distance between two poins</span></h4>
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
            <?php x(2); ?>
            <?php y(2); ?>
        </table>
    </section>
    <section id="point_direction">
        <h3>point_direction <span> -> {Number}</span></h3>
        <h4>returns the direction of x2,y2 from x1,y1 in radians or degrees </span></h4>
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
            <?php x(2); ?>
            <?php y(2); ?>
            <tr>
                <td>
                    radians
                </td>
                <td>
                    Boolean
                </td>
                <td>
                    true return radians
                    <br />
                    false return degrees
                </td>
            </tr>
        </table>
    </section>
    <section id="motion_set">
        <h3>motion_set <span> -> {Array}</span></h3>
        <h4>updates an x,y position in a direction based on speed </span></h4>
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
                    degrees
                </td>
                <td>
                    Number
                </td>
                <td>
                    If using degrees you must ensure that you are passing a whole number
                    <br />
                    A float point number will be assumed to be in radians
                </td>
            </tr>
        </table>
    </section>
</div>
<div class="right">
    <ul>
        <li>
            <a href="#distance_to_point">distance_to_point</a>
        </li>
        <li>
            <a href="#point_direction">point_direction</a>
        </li>
        <li>
            <a href="#motion_set">motion_set</a>
        </li>
    </ul>
</div>