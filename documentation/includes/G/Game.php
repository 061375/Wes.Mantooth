<h2>Game</h2>
<div class="left">
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
    <section id="bindkeys">
        <h3>bindkeys <span> -> {Void}</span></h3>
        <h4>binds a function to a keyboard key</h4>
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
                    m
                </td>
                <td>
                    Object
                </td>
                <td>
                    a map of functions to bind to keys
                </td>
            </tr>
            <tr>
                <td>
                    e
                </td>
                <td>
                    String
                </td>
                <td>
                    [ keyup, keypress, keyup ] the default is keyup
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
                    target DOM node (default is document)
                </td>
            </tr>
        </table>
    </section>
    <section id="key">
        <h3>key <span> -> {Void}</span></h3>
        <h4>binds a function to a keyboard key</h4>
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
                    e
                </td>
                <td>
                    Object
                </td>
                <td>
                    the event
                </td>
            </tr>
            <tr>
                <td>
                    f
                </td>
                <td>
                    String
                </td>
                <td>
                    the event name
                </td>
            </tr>
        </table>
    </section>
</div>
<div class="right">
    <ul>
        <li>
            <a href="#add_object">add_object</a>
        </li>
        <li>
            <a href="#bindkeys">bindkeys</a>
        </li>
        <li>
            <a href="#key">key</a>
        </li>
    </ul>
</div>