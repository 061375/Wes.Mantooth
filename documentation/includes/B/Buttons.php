<h2>Buttons</h2>
<div class="left">
    <section id="pill">
        <h3>pill <span> -> {Void}</span></h3>
        <h4>draws a simple pill shaped button</h4>
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
                <td>i</td>
                <td>Number</td>
                <td>reference to the canvas id</td>
            </tr>
            <tr>
                <td>x</td>
                <td>Number</td>
                <td>x coord where the button will be drawn</td>
            </tr>
            <tr>
                <td>y</td>
                <td>Number</td>
                <td>y coord where the button will be drawn</td>
            </tr>
            <tr>
                <td>width</td>
                <td>Number</td>
                <td>width of the button</td>
            </tr>
            <tr>
                <td>height</td>
                <td>Number</td>
                <td>height of the button</td>
            </tr>
            <tr>
                <td>radius</td>
                <td>Number</td>
                <td>the size of the rounded corners of the button</td>
            </tr>
            <tr>
                <td>style</td>
                <td>Object</td>
                <td>the style settings for the button
                <br />
                Available settings:
                <br />
                &nbsp;button:
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
                                color
                            </td>
                            <td>
                                String
                            </td>
                            <td>
                                hexadecimal color
                            </td>
                        </tr>
                        <tr>
                            <td>
                                fill
                            </td>
                            <td>
                                Enum
                            </td>
                            <td>
                                color the border, the background or both
                                fill , stroke, both
                            </td>
                        </tr>
                        <tr>
                            <td>
                                acolor
                            </td>
                            <td>
                                Sring
                            </td>
                            <td>
                                the color use in the hover event
                                hexadecimal color
                            </td>
                        </tr>
                        <tr>
                            <td>
                                opacity
                            </td>
                            <td>
                                Float
                            </td>
                            <td>
                                alpha value between 0 - 1
                            </td>
                        </tr>
                    </table>
                &nbsp;text:
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
                                color
                            </td>
                            <td>
                                String
                            </td>
                            <td>
                                color or the button text
                                hexadecimal color
                            </td>
                        </tr>
                        <tr>
                            <td>
                                font
                            </td>
                            <td>
                                String
                            </td>
                            <td>
                                font size, style and family
                            </td>
                        </tr>
                        <tr>
                            <td>
                                padding
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
            <tr>
                <td>text</td>
                <td>String</td>
                <td>the text to display on the button</td>
            </tr>
            <tr>
                <td>events</td>
                <td>Object</td>
                <td>event callback<br />
                possible keys: ( hover, click )</td>
            </tr>
        </table>
    </section>
</div>
<div class="right">
    <ul>
        <li>
            <a href="#pill">pill</a>
        </li>
    </ul>
</div>